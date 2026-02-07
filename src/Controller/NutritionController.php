<?php

namespace App\Controller;

use App\Entity\Repas;
use App\Entity\Aliment;
use App\Form\RepasType;
use App\Repository\RepasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nutrition')]
class NutritionController extends AbstractController
{
    #[Route('', name: 'app_nutrition')]
    public function index(RepasRepository $repasRepository): Response
    {
        $user = $this->getUser();
        $repas = $repasRepository->findByUtilisateur($user);
        $todayRepas = $repasRepository->findTodayByUtilisateur($user);

        $totalCaloriesToday = 0;
        foreach ($todayRepas as $r) {
            $totalCaloriesToday += $r->getTotalCalories();
        }

        return $this->render('nutrition/index.html.twig', [
            'repas' => $repas,
            'todayRepas' => $todayRepas,
            'totalCaloriesToday' => $totalCaloriesToday,
        ]);
    }

    #[Route('/new', name: 'app_nutrition_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repas = new Repas();
        $repas->setUtilisateur($this->getUser());

        $form = $this->createForm(RepasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repas);
            $entityManager->flush();

            $this->addFlash('success', 'Repas ajoute avec succes!');
            return $this->redirectToRoute('app_nutrition');
        }

        return $this->render('nutrition/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutrition_show', methods: ['GET'])]
    public function show(Repas $repas): Response
    {
        if ($repas->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('nutrition/show.html.twig', [
            'repas' => $repas,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutrition_edit')]
    public function edit(Request $request, Repas $repas, EntityManagerInterface $entityManager): Response
    {
        if ($repas->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(RepasType::class, $repas);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Repas modifie avec succes!');
            return $this->redirectToRoute('app_nutrition');
        }

        return $this->render('nutrition/edit.html.twig', [
            'repas' => $repas,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_nutrition_delete', methods: ['POST'])]
    public function delete(Request $request, Repas $repas, EntityManagerInterface $entityManager): Response
    {
        if ($repas->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete'.$repas->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($repas);
            $entityManager->flush();
            $this->addFlash('success', 'Repas supprime!');
        }

        return $this->redirectToRoute('app_nutrition');
    }
}
