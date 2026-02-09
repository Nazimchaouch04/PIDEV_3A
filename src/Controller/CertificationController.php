<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function index(Request $request): Response
    {
        // Si l'utilisateur est déjà connecté, rediriger vers dashboard
        if ($this->getUser()) {
            $this->addFlash('info', 'Vous êtes déjà connecté.');
            return $this->redirectToRoute('app_dashboard');
        }

        // Pour l'instant, afficher simplement le formulaire
        // Dans une implémentation complète, on pourrait gérer la soumission ici
        if ($request->isMethod('POST')) {
            $this->addFlash('success', 'Votre demande de certification a été soumise. Nous vous contacterons sous 48-72h.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('certification/index.html.twig');
    }
}
