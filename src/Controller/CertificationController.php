<?php

namespace App\Controller;

use App\Entity\Certification;
use App\Entity\Utilisateur;
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
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Veuillez vous inscrire ou vous connecter pour demander une certification.');
            return $this->redirectToRoute('app_register');
        }

        $certification = new Certification();
        $form = $this->createForm(CertificationType::class, $certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // FIX :39 — cast UserInterface → Utilisateur
            /** @var Utilisateur $user */
            $certification->setUtilisateur($user);
            $certification->setStatut('PENDING');

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

            $entityManager->persist($certification);
            $entityManager->flush();

            $this->addFlash('success', 'Votre demande a été enregistrée avec succès. Votre compte est en attente de validation par un administrateur.');

            return $this->redirectToRoute('app_logout');
        }

        return $this->render('certification/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}