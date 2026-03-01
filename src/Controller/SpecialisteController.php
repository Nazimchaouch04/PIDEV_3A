<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/specialiste')]
final class SpecialisteController extends AbstractController
{
    // 1️⃣ LIST RDVs FOR DOCTOR
    #[Route('', name: 'app_specialiste')]
    public function index(RendezVousRepository $repo): Response
    {
        // Si l'utilisateur est admin, il voit tous les rendez-vous
        if ($this->isGranted('ROLE_ADMIN')) {
            $rendezVous = $repo->findBy(
                [],
                ['dateHeure' => 'ASC']
            );
        } else {
            // Sinon, le spécialiste ne voit que ses rendez-vous
            $rendezVous = $repo->findBy(
                ['specialiste' => $this->getUser()],
                ['dateHeure' => 'ASC']
            );
        }

        return $this->render('specialiste/index.html.twig', [
            'rendezVous' => $rendezVous,
            'isAdmin' => $this->isGranted('ROLE_ADMIN'),
        ]);
    }

    // 2️⃣ CONFIRM RDV
    #[Route('/rdv/{id}/confirme', name: 'app_specialiste_confirme', methods: ['POST'])]
    public function confirme(RendezVous $rdv, EntityManagerInterface $em): Response
    {
        if ($rdv->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($rdv->getStatut() !== 'DEMANDE') {
            return $this->redirectToRoute('app_specialiste');
        }

        $rdv->setStatut('CONFIRME');
        $em->flush();

        return $this->redirectToRoute('app_specialiste');
    }

    // 3️⃣ CANCEL RDV
    #[Route('/rdv/{id}/annule', name: 'app_specialiste_annule', methods: ['POST'])]
    public function annule(RendezVous $rdv, EntityManagerInterface $em): Response
    {
        if ($rdv->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if (in_array($rdv->getStatut(), ['REALISE', 'ANNULE'])) {
            return $this->redirectToRoute('app_specialiste');
        }

        $rdv->setStatut('ANNULE');
        $em->flush();

        return $this->redirectToRoute('app_specialiste');
    }
}