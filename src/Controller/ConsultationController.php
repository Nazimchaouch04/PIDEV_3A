<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\RendezVous;
use App\Form\ConsultationType;
use App\Repository\ConsultationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/consultation')]
class ConsultationController extends AbstractController
{
    #[Route('/new/{id}', name: 'app_consultation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RendezVous $rendezVous, EntityManagerInterface $em): Response
    {
        // Vérifier que le RDV est confirmé et n'a pas déjà de consultation
        if ($rendezVous->getStatut() !== 'CONFIRME' || $rendezVous->getConsultation()) {
            return $this->redirectToRoute('app_specialiste');
        }

        $consultation = new Consultation();
        $consultation->setRendezVous($rendezVous);

        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mettre à jour le statut du RDV
            $rendezVous->setStatut('REALISE');
            
            $em->persist($consultation);
            $em->flush();

            // Redirect directly to prescription creation with AI data
            return $this->redirectToRoute('app_prescription_new', [
                'id' => $consultation->getId(),
                'ai_generate' => 'true',
                'symptoms' => $consultation->getSymptomes() ?: '',
                'diagnostic' => $consultation->getDiagnostic() ?: ''
            ]);
        }

        return $this->render('consultation/new.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/{id}', name: 'app_consultation_show', methods: ['GET'])]
    public function show(Consultation $consultation): Response
    {
        return $this->render('consultation/show.html.twig', [
            'consultation' => $consultation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_consultation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Consultation $consultation, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_specialiste');
        }

        return $this->render('consultation/edit.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_consultation_delete', methods: ['POST'])]
    public function delete(Request $request, Consultation $consultation, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consultation->getId(), $request->getPayload()->get('_token'))) {
            $em->remove($consultation);
            $em->flush();
        }

        return $this->redirectToRoute('app_specialiste');
    }
}
