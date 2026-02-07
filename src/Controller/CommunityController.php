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
use Symfony\Component\Routing\Attribute\Route;

#[Route('/community')]
class CommunityController extends AbstractController
{
    #[Route('', name: 'app_community')]
    public function index(
        GroupeSoutienRepository $groupeSoutienRepository,
        EvenementSanteRepository $evenementSanteRepository,
        MembreGroupeRepository $membreGroupeRepository
    ): Response {
        $user = $this->getUser();
        $groupes = $groupeSoutienRepository->findAll();
        $upcomingEvents = $evenementSanteRepository->findUpcoming();
        $myMemberships = $membreGroupeRepository->findByUtilisateur($user);

        $myGroupIds = [];
        foreach ($myMemberships as $membership) {
            $myGroupIds[] = $membership->getGroupe()->getId();
        }

        return $this->render('community/index.html.twig', [
            'groupes' => $groupes,
            'upcomingEvents' => $upcomingEvents,
            'myMemberships' => $myMemberships,
            'myGroupIds' => $myGroupIds,
        ]);
    }

    #[Route('/groupe/{id}', name: 'app_community_groupe')]
    public function showGroupe(
        int $id,
        GroupeSoutienRepository $groupeSoutienRepository,
        MembreGroupeRepository $membreGroupeRepository
    ): Response {
        $groupe = $groupeSoutienRepository->find($id);
        if (!$groupe) {
            throw $this->createNotFoundException('Groupe non trouve');
        }

        $user = $this->getUser();
        $membership = $membreGroupeRepository->findMembership($user, $groupe);

        return $this->render('community/groupe.html.twig', [
            'groupe' => $groupe,
            'isMember' => $membership !== null,
            'membership' => $membership,
        ]);
    }

    #[Route('/groupe/{id}/join', name: 'app_community_join', methods: ['POST'])]
    public function joinGroupe(
        Request $request,
        int $id,
        GroupeSoutienRepository $groupeSoutienRepository,
        MembreGroupeRepository $membreGroupeRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $groupe = $groupeSoutienRepository->find($id);
        if (!$groupe) {
            throw $this->createNotFoundException('Groupe non trouve');
        }

        $user = $this->getUser();

        if (!$this->isCsrfTokenValid('join'.$id, $request->getPayload()->getString('_token'))) {
            $this->addFlash('error', 'Token invalide');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }

        $existingMembership = $membreGroupeRepository->findMembership($user, $groupe);
        if ($existingMembership) {
            $this->addFlash('error', 'Vous etes deja membre de ce groupe');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }

        if (!$groupe->hasPlaceDisponible()) {
            $this->addFlash('error', 'Ce groupe est complet');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }

        $membre = new MembreGroupe();
        $membre->setUtilisateur($user);
        $membre->setGroupe($groupe);

        $entityManager->persist($membre);
        $entityManager->flush();

        $this->addFlash('success', 'Vous avez rejoint le groupe!');
        return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
    }

    #[Route('/groupe/{id}/leave', name: 'app_community_leave', methods: ['POST'])]
    public function leaveGroupe(
        Request $request,
        int $id,
        GroupeSoutienRepository $groupeSoutienRepository,
        MembreGroupeRepository $membreGroupeRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $groupe = $groupeSoutienRepository->find($id);
        if (!$groupe) {
            throw $this->createNotFoundException('Groupe non trouve');
        }

        $user = $this->getUser();

        if (!$this->isCsrfTokenValid('leave'.$id, $request->getPayload()->getString('_token'))) {
            $this->addFlash('error', 'Token invalide');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }

        $membership = $membreGroupeRepository->findMembership($user, $groupe);
        if (!$membership) {
            $this->addFlash('error', 'Vous n\'etes pas membre de ce groupe');
            return $this->redirectToRoute('app_community_groupe', ['id' => $id]);
        }

        $entityManager->remove($membership);
        $entityManager->flush();

        $this->addFlash('success', 'Vous avez quitte le groupe');
        return $this->redirectToRoute('app_community');
    }
}
