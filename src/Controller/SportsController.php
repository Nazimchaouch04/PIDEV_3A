<?php

namespace App\Controller;

use App\Entity\SeanceSport;
use App\Form\SeanceSportType;
use App\Repository\SeanceSportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sports')]
class SportsController extends AbstractController
{
    #[Route('', name: 'app_sports')]
    public function index(SeanceSportRepository $seanceSportRepository): Response
    {
        $user = $this->getUser();
        $seances = $seanceSportRepository->findByUtilisateur($user);
        $weekSeances = $seanceSportRepository->findThisWeekByUtilisateur($user);

        $totalMinutes = 0;
        foreach ($weekSeances as $seance) {
            $totalMinutes += $seance->getDureeMinutes();
        }

        return $this->render('sports/index.html.twig', [
            'seances' => $seances,
            'weekSeances' => $weekSeances,
            'totalMinutesWeek' => $totalMinutes,
        ]);
    }

    #[Route('/new', name: 'app_sports_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $seance = new SeanceSport();
        $seance->setUtilisateur($this->getUser());

        $form = $this->createForm(SeanceSportType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seance);
            $entityManager->flush();

            $this->addFlash('success', 'Seance ajoutee avec succes!');
            return $this->redirectToRoute('app_sports');
        }

        return $this->render('sports/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sports_show', methods: ['GET'])]
    public function show(SeanceSport $seance): Response
    {
        if ($seance->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('sports/show.html.twig', [
            'seance' => $seance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sports_edit')]
    public function edit(Request $request, SeanceSport $seance, EntityManagerInterface $entityManager): Response
    {
        if ($seance->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(SeanceSportType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Seance modifiee avec succes!');
            return $this->redirectToRoute('app_sports');
        }

        return $this->render('sports/edit.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_sports_delete', methods: ['POST'])]
    public function delete(Request $request, SeanceSport $seance, EntityManagerInterface $entityManager): Response
    {
        if ($seance->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete'.$seance->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($seance);
            $entityManager->flush();
            $this->addFlash('success', 'Seance supprimee!');
        }

        return $this->redirectToRoute('app_sports');
    }
}
