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

#[Route('/community')]
class CommunityController extends AbstractController
{
    #[Route('', name: 'app_community')]
    public function index(
        Request $request,
        GroupeSoutienRepository $groupRepo,
        EvenementSanteRepository $eventRepo,
        HttpClientInterface $httpClient
    ): Response {
        $searchTerm = $request->query->get('search');
        $sort = $request->query->get('sort', 'date'); // 'date' par défaut

        // --- TRI ET RECHERCHE GROUPES ---
        // On trie les groupes par nom (A-Z) par défaut
        if ($searchTerm) {
            $groupes = $groupRepo->findByThematique($searchTerm);
        } else {
            $groupes = $groupRepo->findBy([], ['nomGroupe' => 'ASC']);
        }

        // --- TRI ÉVÉNEMENTS ---
        $order = ($sort === 'name') ? ['titreEvent' => 'ASC'] : ['dateEvent' => 'ASC'];
        $upcomingEvents = $eventRepo->findBy([], $order);

        // Détection AJAX
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->render('community/_group_list.html.twig', ['groupes' => $groupes]);
        }

        // API Sunrise
        try {
            $response = $httpClient->request('GET', 'https://api.sunrise-sunset.org/json?lat=36.8065&lng=10.1815&formatted=0');
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
    public function leaveGroupe(Request $request, int $id, GroupeSoutienRepository $groupRepo, MembreGroupeRepository $memberRepo, EntityManagerInterface $em): Response {
        $groupe = $groupRepo->find($id);
        $user = $this->getUser();
        $membership = $memberRepo->findMembership($user, $groupe);
        if ($membership) {
            $user->setScoreGlobal(max(0, $user->getScoreGlobal() - 50));
            $em->remove($membership);
            $em->flush();
            $this->addFlash('success', 'Vous avez quitté le groupe.');
        }
        return $this->redirectToRoute('app_community');
    }
}