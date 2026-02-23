<?php

namespace App\Controller;

use App\Entity\GroupeSoutien;
use App\Entity\EvenementSante;
use App\Entity\MembreGroupe;
use App\Repository\GroupeSoutienRepository;
use App\Repository\EvenementSanteRepository;
use App\Service\WeatherService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/community')]
class CommunityController extends AbstractController
{
    /**
     * Main community page with paginated groups and events list
     */
    #[Route('/', name: 'app_community')]
    public function index(
        Request $request, 
        GroupeSoutienRepository $groupRepo, 
        EvenementSanteRepository $eventRepo, 
        PaginatorInterface $paginator
    ): Response {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'name'); // Default sort by name

        // 1. Prepare the Query for Groups
        $queryBuilder = $groupRepo->createQueryBuilder('g');
        
        if ($search) {
            $queryBuilder->where('g.nomGroupe LIKE :q OR g.thematique LIKE :q')
                         ->setParameter('q', '%'.$search.'%');
        }

        // Apply sorting
        if ($sort === 'date') {
            $queryBuilder->orderBy('g.id', 'DESC');
        } else {
            $queryBuilder->orderBy('g.nomGroupe', 'ASC');
        }

        // 2. Paginate Groups (6 per page)
        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            6
        );

        // 3. Get upcoming events for sidebar
        $events = $eventRepo->findBy([], ['dateEvent' => 'DESC'], 10);

        // 4. Get current user's group IDs for the UI buttons
        $groupIds = [];
        foreach ($user->getMembresGroupes() as $member) {
            $groupIds[] = $member->getGroupe()->getId();
        }

        // Handle AJAX search requests
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->render('community/_group_list.html.twig', [
                'groupes' => $pagination,
                'userGroupIds' => $groupIds,
            ]);
        }

        return $this->render('community/index.html.twig', [
            'groupes' => $pagination,
            'events' => $events,
            'userGroupIds' => $groupIds,
            'search' => $search,
            'currentSort' => $sort, // <--- ADDED THIS VARIABLE
        ]);
    }

    /**
     * View specific group details + Weather widget
     */
    #[Route('/group/{id}', name: 'app_community_group')]
    public function viewGroup(int $id, GroupeSoutienRepository $groupRepo, WeatherService $weatherService): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $group = $groupRepo->find($id);
        
        if (!$group) {
            throw $this->createNotFoundException('Groupe introuvable');
        }

        $isMember = false;
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_COACH')) {
            $isMember = true;
        } else {
            foreach ($user->getMembresGroupes() as $member) {
                if ($member->getGroupe()->getId() === $id) {
                    $isMember = true;
                    break;
                }
            }
        }

        $weather = $weatherService->getWeather('Tunis');

        return $this->render('community/groupe.html.twig', [
            'group' => $group,
            'isMember' => $isMember,
            'weather' => $weather,
        ]);
    }

    /**
     * Join a group
     */
    #[Route('/join/{id}', name: 'app_community_join', methods: ['POST'])]
    public function joinGroup(int $id, GroupeSoutienRepository $groupRepo, EntityManagerInterface $entityManager): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();
        $group = $groupRepo->find($id);
        
        if (!$group || !$group->hasPlaceDisponible()) {
            $this->addFlash('error', 'Le groupe est complet ou introuvable.');
            return $this->redirectToRoute('app_community');
        }

        $membre = new MembreGroupe();
        $membre->setUtilisateur($user);
        $membre->setGroupe($group);
        $membre->setDateAdhesion(new \DateTime());
        $membre->setRoleMembre('MEMBER');

        $entityManager->persist($membre);
        $entityManager->flush();

        $this->addFlash('success', 'Bienvenue dans la communauté !');
        return $this->redirectToRoute('app_community_group', ['id' => $id]);
    }

    /**
     * Leave a group
     */
    #[Route('/leave/{id}', name: 'app_community_leave', methods: ['POST'])]
    public function leaveGroup(int $id, GroupeSoutienRepository $groupRepo, EntityManagerInterface $entityManager): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();
        
        $membership = null;
        foreach ($user->getMembresGroupes() as $member) {
            if ($member->getGroupe()->getId() === $id) {
                $membership = $member;
                break;
            }
        }

        if ($membership) {
            $entityManager->remove($membership);
            $entityManager->flush();
            $this->addFlash('success', 'Vous avez quitté le groupe.');
        }

        return $this->redirectToRoute('app_community');
    }
}