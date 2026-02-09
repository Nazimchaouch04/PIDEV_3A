<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\RendezVous;
use App\Form\ConsultationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/consultation')]
final class ConsultationController extends AbstractController
{

    #[Route('/new/{id}', name: 'app_consultation_new', methods: ['GET'])]
    public function newFromRdv(
        RendezVous $rdv,
        EntityManagerInterface $entityManager
    ): Response {

        if ($rdv->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($rdv->getConsultation()) {
            return $this->redirectToRoute(
                'app_consultation_edit',
                ['id' => $rdv->getConsultation()->getId()]
            );
        }

        $consultation = new Consultation();
        $consultation->setRendezVous($rdv);
        $consultation->setDateConsultation(new \DateTime());

        $entityManager->persist($consultation);
        $entityManager->flush();

        return $this->redirectToRoute(
            'app_consultation_edit',
            ['id' => $consultation->getId()]
        );
    }

    #[Route('/{id}/edit', name: 'app_consultation_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Consultation $consultation,
        EntityManagerInterface $entityManager
    ): Response {

        if ($consultation->getRendezVous()->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $consultation->getRendezVous()->setStatut('REALISE');
            $entityManager->flush();

            return $this->redirectToRoute('app_specialiste');
        }

        return $this->render('consultation/edit.html.twig', [
            'consultation' => $consultation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_consultation_show', methods: ['GET'])]
    public function show(Consultation $consultation): Response
    {
        if ($consultation->getRendezVous()->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('consultation/show.html.twig', [
            'consultation' => $consultation,
        ]);
    }
}
