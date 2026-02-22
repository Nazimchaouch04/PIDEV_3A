<?php

namespace App\Controller;

use App\Entity\Certification;
use App\Form\CertificationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        // 1. L'utilisateur doit être connecté pour lier la demande à son compte
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Veuillez vous inscrire ou vous connecter pour demander une certification.');
            return $this->redirectToRoute('app_register');
        }

        // Si l'utilisateur a déjà une certification en attente ou validée, on peut le bloquer ici
        // (Optionnel, selon votre logique)

        $certification = new Certification();
        $form = $this->createForm(CertificationType::class, $certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // 2. Lier la certification à l'utilisateur
            $certification->setUtilisateur($user);
            $certification->setStatut('PENDING'); // Toujours en attente au début

            // 3. Gestion de l'upload du diplôme
            $diplomeFile = $form->get('diplomeFilename')->getData();
            if ($diplomeFile) {
                $originalFilename = pathinfo($diplomeFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $diplomeFile->guessExtension();

                try {
                    $diplomeFile->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads/diplomes',
                        $newFilename
                    );
                    $certification->setDiplomeFilename($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload du fichier.');
                    return $this->render('certification/index.html.twig', [
                        'form' => $form->createView(),
                    ]);
                }
            }

            // 4. Sauvegarde en Base de Données
            $entityManager->persist($certification);
            $entityManager->flush();

            // 5. Message de succès et Déconnexion forcée
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès. Votre compte est en attente de validation par un administrateur.');

            // On redirige vers le logout pour empêcher l'accès au dashboard
            return $this->redirectToRoute('app_logout');
        }

        return $this->render('certification/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
