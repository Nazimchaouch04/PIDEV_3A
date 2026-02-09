<?php

namespace App\Controller;

use App\Entity\Prescription;
use App\Entity\Consultation;
use App\Form\PrescriptionType;
use App\Repository\PrescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/prescription')]
final class PrescriptionController extends AbstractController
{
    // LIST
    #[Route(name: 'app_prescription_index', methods: ['GET'])]
    public function index(PrescriptionRepository $prescriptionRepository): Response
    {
        return $this->render('prescription/index.html.twig', [
            'prescriptions' => $prescriptionRepository->findAll(),
        ]);
    }

    // CREATE FROM CONSULTATION
    #[Route('/new/{id}', name: 'app_prescription_new', methods: ['GET','POST'])]
    public function new(
        Consultation $consultation,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        // security doctor owner
        if ($consultation->getRendezVous()->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $prescription = new Prescription();
        $prescription->setConsultation($consultation);

        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($prescription);
            $entityManager->flush();

            return $this->redirectToRoute('app_consultation_show', [
                'id' => $consultation->getId()
            ]);
        }

        return $this->render('prescription/new.html.twig', [
            'prescription' => $prescription,
            'form' => $form->createView(),
        ]);
    }

    // SHOW
    #[Route('/{id}', name: 'app_prescription_show', methods: ['GET'])]
    public function show(Prescription $prescription): Response
    {
        return $this->render('prescription/show.html.twig', [
            'prescription' => $prescription,
        ]);
    }

    // EDIT
    #[Route('/{id}/edit', name: 'app_prescription_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Prescription $prescription,
        EntityManagerInterface $entityManager
    ): Response {

        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_prescription_show', [
                'id' => $prescription->getId()
            ]);
        }

        return $this->render('prescription/edit.html.twig', [
            'prescription' => $prescription,
            'form' => $form->createView(),
        ]);
    }

    // DELETE
    #[Route('/{id}', name: 'app_prescription_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Prescription $prescription,
        EntityManagerInterface $entityManager
    ): Response {

        if ($this->isCsrfTokenValid('delete'.$prescription->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prescription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prescription_index');
    }
}