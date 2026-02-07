<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use App\Repository\SpecialisteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/medical')]
class MedicalController extends AbstractController
{
    #[Route('', name: 'app_medical')]
    public function index(
        RendezVousRepository $rendezVousRepository,
        SpecialisteRepository $specialisteRepository
    ): Response {
        $user = $this->getUser();
        $rendezVous = $rendezVousRepository->findByUtilisateur($user);
        $upcomingRdv = $rendezVousRepository->findUpcomingByUtilisateur($user);
        $specialistes = $specialisteRepository->findAll();

        return $this->render('medical/index.html.twig', [
            'rendezVous' => $rendezVous,
            'upcomingRdv' => $upcomingRdv,
            'specialistes' => $specialistes,
        ]);
    }

    #[Route('/new', name: 'app_medical_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rdv = new RendezVous();
        $rdv->setUtilisateur($this->getUser());

        $form = $this->createForm(RendezVousType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rdv);
            $entityManager->flush();

            $this->addFlash('success', 'Rendez-vous cree avec succes!');
            return $this->redirectToRoute('app_medical');
        }

        return $this->render('medical/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medical_show', methods: ['GET'])]
    public function show(RendezVous $rdv): Response
    {
        if ($rdv->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('medical/show.html.twig', [
            'rdv' => $rdv,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medical_edit')]
    public function edit(Request $request, RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(RendezVousType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Rendez-vous modifie avec succes!');
            return $this->redirectToRoute('app_medical');
        }

        return $this->render('medical/edit.html.twig', [
            'rdv' => $rdv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_medical_delete', methods: ['POST'])]
    public function delete(Request $request, RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete'.$rdv->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rdv);
            $entityManager->flush();
            $this->addFlash('success', 'Rendez-vous supprime!');
        }

        return $this->redirectToRoute('app_medical');
    }

    #[Route('/{id}/honor', name: 'app_medical_honor', methods: ['POST'])]
    public function markAsHonored(Request $request, RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('honor'.$rdv->getId(), $request->getPayload()->getString('_token'))) {
            $rdv->setEstHonore(true);
            $entityManager->flush();
            $this->addFlash('success', 'Rendez-vous marque comme honore!');
        }

        return $this->redirectToRoute('app_medical');
    }
}
