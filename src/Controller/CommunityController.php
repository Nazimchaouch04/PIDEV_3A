<?php

namespace App\Controller;

use App\Entity\MembreGroupe;
use App\Repository\EvenementSanteRepository;
use App\Repository\GroupeSoutienRepository;
use App\Repository\MembreGroupeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/community')]
class CommunityController extends AbstractController
{
    private function isCoachOrAdmin(): bool
    {
        $user = $this->getUser();
        if (!$user) {
            return false;
        }
        
        $roles = $user->getRoles();
        return in_array('ROLE_COACH', $roles) || in_array('ROLE_ADMIN', $roles);
    }

    private function canManageMembers(): bool
    {
        return $this->isCoachOrAdmin();
    }

    private function canViewAllGroups(): bool
    {
        return $this->isCoachOrAdmin();
    }

    #[Route('', name: 'app_community')]
    public function index(
        Request $request,
        GroupeSoutienRepository $groupRepo,
        EvenementSanteRepository $eventRepo,
        HttpClientInterface $httpClient
    ): Response {
        $searchTerm = $request->query->get('search');
        $sort = $request->query->get('sort', 'date');

        // Recherche Groupes
        if ($searchTerm) {
            $groupes = $groupRepo->findByThematique($searchTerm);
        } else {
            $groupes = $groupRepo->findBy([], ['nomGroupe' => 'ASC']);
        }

        // Tri Événements
        $order = ($sort === 'name') ? ['titreEvent' => 'ASC'] : ['dateEvent' => 'ASC'];
        $upcomingEvents = $eventRepo->findBy([], $order);

        // AJAX Detection
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->render('community/_group_list.html.twig', ['groupes' => $groupes]);
        }

        // API Sunrise
        try {
            $response = $httpClient->request('GET', 'https://api.sunrise-sunset.org/json?lat=36.8&lng=10.1&formatted=0');
            $sunData = $response->toArray()['results'];
        } catch (\Exception $e) {
            $sunData = ['sunrise' => '07:00:00', 'sunset' => '18:00:00'];
        }

        return $this->render('community/index.html.twig', [
            'groupes' => $groupes,
            'upcomingEvents' => $upcomingEvents,
            'sunData' => $sunData,
            'searchTerm' => $searchTerm,
            'currentSort' => $sort
        ]);
    }

    #[Route('/groupe/{id}', name: 'app_community_groupe')]
    public function showGroupe(int $id, GroupeSoutienRepository $groupRepo, MembreGroupeRepository $memberRepo): Response {
        $groupe = $groupRepo->find($id);
        if (!$groupe) throw $this->createNotFoundException('Groupe non trouvé');
        $user = $this->getUser();
        $membership = $memberRepo->findMembership($user, $groupe);
        return $this->render('community/groupe.html.twig', [
            'groupe' => $groupe,
            'isMember' => $membership !== null,
            'membership' => $membership,
        ]);
    }

    #[Route('/groupe/{id}/join', name: 'app_community_join', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function joinGroupe(Request $request, int $id, GroupeSoutienRepository $groupRepo, MembreGroupeRepository $memberRepo, EntityManagerInterface $em): Response {
        $groupe = $groupRepo->find($id);
        $user = $this->getUser();
        if (!$this->isCsrfTokenValid('join'.$id, $request->getPayload()->getString('_token'))) {
            $this->addFlash('error', 'Token invalide');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }
        
        $membre = new MembreGroupe();
        $membre->setUtilisateur($user);
        $membre->setGroupe($groupe);
        $membre->setDateAdhesion(new \DateTime());
        $membre->setRoleMembre('Membre');
        $user->setScoreGlobal($user->getScoreGlobal() + 50);
        $em->persist($membre);
        $em->flush();
        $this->addFlash('success', 'Bienvenue ! +50 points.');
        return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
    }

    #[Route('/groupe/{id}/leave', name: 'app_community_leave', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function leaveGroupe(Request $request, int $id, GroupeSoutienRepository $groupRepo, MembreGroupeRepository $memberRepo, EntityManagerInterface $em): Response {
        $groupe = $groupRepo->find($id);
        $membership = $memberRepo->findMembership($this->getUser(), $groupe);
        if ($membership) {
            $this->getUser()->setScoreGlobal(max(0, $this->getUser()->getScoreGlobal() - 50));
            $em->remove($membership);
            $em->flush();
            $this->addFlash('success', 'Vous avez quitté le groupe.');
        }
        return $this->redirectToRoute('app_community');
    }

    #[Route('/admin/community', name: 'app_admin_community_index')]
    public function adminIndex(
        Request $request,
        GroupeSoutienRepository $groupRepo,
        EvenementSanteRepository $eventRepo
    ): Response {
        // Vérification manuelle des permissions
        if (!$this->isCoachOrAdmin()) {
            throw $this->createAccessDeniedException('Accès réservé aux coachs et administrateurs');
        }
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'recent');

        // Recherche Groupes
        if ($search) {
            $groupes = $groupRepo->createQueryBuilder('g')
                ->where('g.nomGroupe LIKE :q OR g.thematique LIKE :q')
                ->setParameter('q', '%'.$search.'%')
                ->getQuery()->getResult();
            
            // Recherche par titre d'événement
            $events = $eventRepo->createQueryBuilder('e')
                ->where('e.titreEvent LIKE :q')
                ->setParameter('q', '%'.$search.'%')
                ->orderBy('e.dateEvent', 'DESC')
                ->getQuery()->getResult();
        } else {
            $groupes = $groupRepo->findBy([], ['nomGroupe' => 'ASC']);
            
            $order = ($sort === 'name') ? ['titreEvent' => 'ASC'] : ($sort === 'oldest' ? ['dateEvent' => 'ASC'] : ['dateEvent' => 'DESC']);
            $events = $eventRepo->findBy([], $order);
        }

        // GESTION AJAX
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->json([
                'groupsHtml' => $this->renderView('community_admin/_group_list_admin.html.twig', ['groupes' => $groupes]),
                'eventsHtml' => $this->renderView('community_admin/_event_list_admin.html.twig', ['events' => $events])
            ]);
        }

        return $this->render('community_admin/index.html.twig', [
            'groupes' => $groupes,
            'events' => $events,
            'currentSort' => $sort,
            'search' => $search
        ]);
    }
}