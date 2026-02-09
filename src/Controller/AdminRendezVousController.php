<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/rendez-vous')]
class AdminRendezVousController extends AbstractController
{
    #[Route('', name: 'app_admin_rendez_vous_index')]
    public function index(RendezVousRepository $repo): Response
    {
        $rendezVous = $repo->findBy(
            [],
            ['dateHeure' => 'ASC']
        );

        // Grouper par spécialiste
        $rendezVousBySpecialiste = [];
        foreach ($rendezVous as $rdv) {
            $specialisteId = $rdv->getSpecialiste()->getId();
            if (!isset($rendezVousBySpecialiste[$specialisteId])) {
                $rendezVousBySpecialiste[$specialisteId] = [
                    'specialiste' => $rdv->getSpecialiste(),
                    'rendezVous' => []
                ];
            }
            $rendezVousBySpecialiste[$specialisteId]['rendezVous'][] = $rdv;
        }

        return $this->render('admin/rendez_vous/index.html.twig', [
            'rendezVousBySpecialiste' => $rendezVousBySpecialiste,
        ]);
    }

    #[Route('/new', name: 'app_admin_rendez_vous_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $rendezVous = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rendezVous->setStatut('DEMANDE');
            $em->persist($rendezVous);
            $em->flush();

            return $this->redirectToRoute('app_admin_rendez_vous_index');
        }

        return $this->render('admin/rendez_vous/new.html.twig', [
            'rendezVous' => $rendezVous,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_rendez_vous_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RendezVous $rendezVous, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_admin_rendez_vous_index');
        }

        return $this->render('admin/rendez_vous/edit.html.twig', [
            'rendezVous' => $rendezVous,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_rendez_vous_delete', methods: ['POST'])]
    public function delete(Request $request, RendezVous $rendezVous, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezVous->getId(), $request->getPayload()->get('_token'))) {
            $em->remove($rendezVous);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_rendez_vous_index');
    }

    #[Route('/{id}/confirmer', name: 'app_admin_rendez_vous_confirmer', methods: ['POST'])]
    public function confirmer(RendezVous $rendezVous, EntityManagerInterface $em): Response
    {
        if ($rendezVous->getStatut() === 'DEMANDE') {
            $rendezVous->setStatut('CONFIRME');
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_rendez_vous_index');
    }

    #[Route('/{id}/annuler', name: 'app_admin_rendez_vous_annuler', methods: ['POST'])]
    public function annuler(RendezVous $rendezVous, EntityManagerInterface $em): Response
    {
        if (!in_array($rendezVous->getStatut(), ['REALISE', 'ANNULE'])) {
            $rendezVous->setStatut('ANNULE');
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_rendez_vous_index');
    }
}
