<?php

namespace App\Controller;

use App\Entity\ProfilSante;
use App\Form\ProfilSanteType;
use App\Form\UtilisateurEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('', name: 'app_profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UtilisateurEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Profil mis a jour avec succes!');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/health', name: 'app_profile_health')]
    public function health(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $profilSante = $user->getProfilSante();

        if (!$profilSante) {
            $profilSante = new ProfilSante();
            $profilSante->setUtilisateur($user);
        }

        $form = $this->createForm(ProfilSanteType::class, $profilSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($profilSante);
            $entityManager->flush();
            $this->addFlash('success', 'Profil sante mis a jour!');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/health.html.twig', [
            'form' => $form,
        ]);
    }
}
