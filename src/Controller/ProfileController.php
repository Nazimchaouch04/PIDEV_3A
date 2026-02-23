<?php

namespace App\Controller;

use App\Entity\ProfilSante;
use App\Form\ProfilSanteType;
use App\Form\UtilisateurEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/profile')]
#[IsGranted('ROLE_USER')] // Sécurise toutes les méthodes de ce contrôleur
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
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();

        $form = $this->createForm(UtilisateurEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Profil mis à jour avec succès !');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/photo', name: 'app_profile_photo', methods: ['POST'])]
    public function uploadPhoto(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();

        $photoFile = $request->files->get('photo');

        if ($photoFile) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($photoFile->getMimeType(), $allowedMimeTypes)) {
                $this->addFlash('error', 'Format de fichier non autorisé. Utilisez JPG, PNG, GIF ou WEBP.');
                return $this->redirectToRoute('app_profile');
            }

            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoFile->guessExtension();

            try {
                $photoFile->move(
                    $this->getParameter('photos_directory'),
                    $newFilename
                );

                // Delete old photo if exists
                if ($user->getPhoto()) {
                    $oldPhotoPath = $this->getParameter('photos_directory') . '/' . $user->getPhoto();
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }

                $user->setPhoto($newFilename);
                $entityManager->flush();

                $this->addFlash('success', 'Photo de profil mise à jour !');
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur lors du téléchargement de la photo.');
            }
        } else {
            $this->addFlash('error', 'Aucun fichier sélectionné.');
        }

        return $this->redirectToRoute('app_profile');
    }

    #[Route('/health', name: 'app_profile_health')]
    public function health(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();

        // On récupère le profil existant ou on en crée un nouveau
        $profilSante = $user->getProfilSante() ?? new ProfilSante();

        // Si c'est un nouveau profil, on lie l'utilisateur
        if (!$profilSante->getUtilisateur()) {
            $profilSante->setUtilisateur($user);
        }

        $form = $this->createForm(ProfilSanteType::class, $profilSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($profilSante);
            $entityManager->flush();

            $this->addFlash('success', 'Profil santé mis à jour !');
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/health.html.twig', [
            'form' => $form,
        ]);
    }
}
