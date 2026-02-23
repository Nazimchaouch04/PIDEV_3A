<?php

namespace App\Controller;

use App\Entity\GroupeSoutien;
use App\Entity\EvenementSante;
use App\Form\GroupeSoutienType;
use App\Form\EvenementSanteType;
use App\Repository\GroupeSoutienRepository;
use App\Repository\EvenementSanteRepository;
use App\Service\AIService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/community')]
class CommunityAdminController extends AbstractController
{
    /**
     * Display the list of groups (paginated) and events.
     */
    #[Route('/', name: 'app_admin_community_index', methods: ['GET'])]
    public function index(
        Request $request, 
        GroupeSoutienRepository $groupRepo, 
        EvenementSanteRepository $eventRepo,
        PaginatorInterface $paginator
    ): Response {
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'name');

        // 1. Prepare Group Query for Pagination
        $queryBuilder = $groupRepo->createQueryBuilder('g');

        if ($search) {
            $queryBuilder->where('g.nomGroupe LIKE :q OR g.thematique LIKE :q')
                         ->setParameter('q', '%'.$search.'%');
        }

        // Apply sorting to the query
        if ($sort === 'name') {
            $queryBuilder->orderBy('g.nomGroupe', 'ASC');
        } else {
            $queryBuilder->orderBy('g.id', 'DESC');
        }

        // 2. Paginate Groups (8 per page)
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            8
        );

        // 3. Get Events (Sorted by date)
        $events = $eventRepo->findBy([], ['dateEvent' => 'DESC']);

        // Handle AJAX for dynamic search
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->json([
                'groupsHtml' => $this->renderView('community_admin/_group_list_admin.html.twig', ['groupes' => $pagination]),
                'eventsHtml' => $this->renderView('community_admin/_event_list_admin.html.twig', ['events' => $events]),
            ]);
        }

        return $this->render('community_admin/index.html.twig', [
            'groupes' => $pagination,
            'events' => $events,
            'currentSort' => $sort,
        ]);
    }

    /**
     * Test AI services
     */
    #[Route('/ai/test', name: 'app_admin_ai_test', methods: ['GET'])]
    public function testAI(AIService $aiService): Response
    {
        $testResults = [];
        
        // Test text generation
        try {
            $text = $aiService->generateDescription('Test Group', 'fitness');
            $testResults['text'] = [
                'success' => true,
                'result' => substr($text, 0, 100) . '...',
                'length' => strlen($text)
            ];
        } catch (\Exception $e) {
            $testResults['text'] = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        // Test image generation
        try {
            $image = $aiService->generateImage('yoga');
            $testResults['image'] = [
                'success' => $image !== null,
                'size' => $image ? strlen($image) : 0,
                'preview' => $image ? 'data:image/svg+xml;base64,' . substr($image, 0, 50) . '...' : null
            ];
        } catch (\Exception $e) {
            $testResults['image'] = [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

        // Test API connection
        $testResults['connection'] = [
            'api_key' => !empty($_ENV['HUGGINGFACE_TOKEN']) ? 'Set' : 'Missing',
            'test' => $aiService->testConnection()
        ];

        return $this->json($testResults);
    }

    /**
     * Route for AI-powered description generation
     */
    #[Route('/ai/generate-description', name: 'app_admin_ai_generate', methods: ['POST'])]
    public function generateAIDescription(Request $request, AIService $aiService): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $name = $data['name'] ?? '';
            $theme = $data['theme'] ?? '';

            if (empty($name) || empty($theme)) {
                return $this->json(['error' => 'Nom et thématique requis'], 400);
            }

            $description = $aiService->generateDescription($name, $theme);

            return $this->json(['description' => $description]);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Erreur IA: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Create a new support group
     */
    #[Route('/ai/generate-image', name: 'app_admin_ai_image', methods: ['POST'])]
    public function generateAIImage(Request $request, AIService $aiService): Response
    {
        $data = json_decode($request->getContent(), true);
        $theme = $data['theme'] ?? 'nature';
        
        $base64Image = $aiService->generateImage($theme);

        if (!$base64Image) {
            return $this->json(['error' => 'L\'IA est surchargée. Réessayez dans quelques secondes.'], 500);
        }

        return $this->json(['image' => $base64Image]);
    }
    #[Route('/group/new', name: 'app_admin_group_new', methods: ['GET', 'POST'])]
    public function newGroup(Request $request, EntityManagerInterface $em): Response {
        $group = new GroupeSoutien();
        $form = $this->createForm(GroupeSoutienType::class, $group);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            error_log('Form submitted - Valid: ' . ($form->isValid() ? 'YES' : 'NO'));
            
            if (!$form->isValid()) {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[] = $error->getMessage();
                }
                error_log('Form errors: ' . implode(', ', $errors));
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($group);
            $em->flush();
            $this->addFlash('success', 'Groupe créé avec succès.');
            return $this->redirectToRoute('app_admin_community_index');
        }

        return $this->render('community_admin/new_group.html.twig', [
            'form' => $form->createView(),
            'title' => 'Nouveau Groupe'
        ]);
    }

    /**
     * Edit an existing group
     */
    #[Route('/group/edit/{id}', name: 'app_admin_group_edit', methods: ['GET', 'POST'])]
    public function editGroup(Request $request, GroupeSoutien $group, EntityManagerInterface $em): Response {
        $form = $this->createForm(GroupeSoutienType::class, $group);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Groupe mis à jour.');
            return $this->redirectToRoute('app_admin_community_index');
        }

        return $this->render('community_admin/new_group.html.twig', [
            'form' => $form->createView(),
            'title' => 'Modifier Groupe'
        ]);
    }

    /**
     * Delete a group
     */
    #[Route('/group/delete/{id}', name: 'app_admin_group_delete', methods: ['POST'])]
    public function deleteGroup(Request $request, GroupeSoutien $group, EntityManagerInterface $em): Response {
        if ($this->isCsrfTokenValid('delete'.$group->getId(), $request->request->get('_token'))) {
            $em->remove($group);
            $em->flush();
            $this->addFlash('success', 'Groupe supprimé.');
        }
        return $this->redirectToRoute('app_admin_community_index');
    }

    /**
     * Create a new health event
     */
    #[Route('/event/new', name: 'app_admin_event_new', methods: ['GET', 'POST'])]
    public function newEvent(Request $request, EntityManagerInterface $em): Response {
        $event = new EvenementSante();
        $form = $this->createForm(EvenementSanteType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($event);
            $em->flush();
            $this->addFlash('success', 'Événement programmé.');
            return $this->redirectToRoute('app_admin_community_index');
        }

        return $this->render('community_admin/new_event.html.twig', [
            'form' => $form->createView(),
            'title' => 'Nouvel Événement'
        ]);
    }

    /**
     * Edit an existing event
     */
    #[Route('/event/edit/{id}', name: 'app_admin_event_edit', methods: ['GET', 'POST'])]
    public function editEvent(Request $request, EvenementSante $event, EntityManagerInterface $em): Response {
        $form = $this->createForm(EvenementSanteType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Événement mis à jour.');
            return $this->redirectToRoute('app_admin_community_index');
        }

        return $this->render('community_admin/new_event.html.twig', [
            'form' => $form->createView(),
            'title' => 'Modifier Événement'
        ]);
    }

    /**
     * Cancel/Delete an event
     */
    #[Route('/event/delete/{id}', name: 'app_admin_event_delete', methods: ['POST'])]
    public function deleteEvent(Request $request, EvenementSante $event, EntityManagerInterface $em): Response {
        if ($this->isCsrfTokenValid('delete_event'.$event->getId(), $request->request->get('_token'))) {
            $em->remove($event);
            $em->flush();
            $this->addFlash('success', 'Événement annulé.');
        }
        return $this->redirectToRoute('app_admin_community_index');
    }
}