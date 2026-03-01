<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Entity\Utilisateur;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ConsultationRepository;

#[Route('/medical')]
class MedicalController extends AbstractController
{
    #[Route('/dossier', name: 'app_medical_dossier')]
    public function dossier(
        RendezVousRepository   $rdvRepo,
        ConsultationRepository $consultRepo
    ): Response {
        $user = $this->getUser();

        return $this->render('medical/dossier.html.twig', [
            'rdvs'          => $rdvRepo->findBy(['patient' => $user]),
            'consultations' => $consultRepo->createQueryBuilder('c')
                ->join('c.rendezVous', 'r')
                ->where('r.patient = :patient')
                ->setParameter('patient', $user)
                ->getQuery()
                ->getResult(),
        ]);
    }

    #[Route('', name: 'app_medical')]
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        $user = $this->getUser();

        $rendezVous = $rendezVousRepository->findBy(
            ['patient'  => $user],
            ['dateHeure' => 'DESC']
        );

        return $this->render('medical/index.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/new', name: 'app_medical_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rdv = new RendezVous();

        // FIX :60 — cast UserInterface → Utilisateur
        /** @var Utilisateur $user */
        $user = $this->getUser();
        $rdv->setPatient($user);
        $rdv->setStatut('DEMANDE');

        $form = $this->createForm(RendezVousType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rdv->setSpecialiste($form->get('specialiste')->getData());
            $entityManager->persist($rdv);
            $entityManager->flush();

            return $this->redirectToRoute('app_medical');
        }

        return $this->render('medical/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id<\d+>}', name: 'app_medical_show', methods: ['GET'])]
    public function show(RendezVous $rdv): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('medical/show.html.twig', [
            'rdv' => $rdv,
        ]);
    }

    #[Route('/{id}/realise', name: 'app_medical_realise', methods: ['POST'])]
    public function markAsRealised(RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $rdv->setStatut('REALISE');
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous marqué comme réalisé');

        return $this->redirectToRoute('app_medical');
    }

    #[Route('/{id}/annule', name: 'app_medical_annule', methods: ['POST'])]
    public function cancel(RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $rdv->setStatut('ANNULE');
        $entityManager->flush();

        $this->addFlash('warning', 'Rendez-vous annulé');

        return $this->redirectToRoute('app_medical');
    }

    #[Route('/{id}/delete', name: 'app_medical_delete', methods: ['POST'])]
    public function delete(Request $request, RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete' . $rdv->getId(), $request->request->get('_token'))) {
            $entityManager->remove($rdv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medical');
    }

    #[Route('/{id}/confirme', name: 'app_medical_confirme', methods: ['POST'])]
    public function confirme(RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        $rdv->setStatut('CONFIRME');
        $entityManager->flush();

        return $this->redirectToRoute('app_medical');
    }

    #[Route('/{id}/edit', name: 'app_medical_edit')]
    public function edit(
        Request                $request,
        RendezVous             $rdv,
        EntityManagerInterface $entityManager
    ): Response {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(RendezVousType::class, $rdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_medical');
        }

        return $this->render('medical/edit.html.twig', [
            'form' => $form->createView(),
            'rdv'  => $rdv,
        ]);
    }
}