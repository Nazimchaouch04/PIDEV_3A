<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_redirect_after_login');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $session = $request->getSession();
        $certifEmail = $session->get('certif_email');
        $autoLogin = $request->query->get('auto_login');

        if ($autoLogin === 'certif' && $certifEmail) {
            $lastUsername = $certifEmail;
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'auto_login' => $autoLogin === 'certif' && $certifEmail ? true : false,
            'premium_flow' => $session->get('premium_flow') ? true : false,
        ]);
    }

    #[Route('/redirect', name: 'app_redirect_after_login')]
    public function redirectAfterLogin(Request $request): Response
    {
        // ⚠️ TOUJOURS Admin en premier car il hérite de Coach et User
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        if ($this->isGranted('ROLE_COACH')) {
            return $this->redirectToRoute('app_seance_sport_index');
        }

        // Flux spéciaux
        $session = $request->getSession();
        if ($session->get('certif_flow')) {
            $session->remove('certif_flow');
            return $this->redirectToRoute('app_certification');
        }
        if ($session->get('premium_flow')) {
            $session->remove('premium_flow');
            $this->addFlash('success', 'Bienvenue ! Vous pouvez maintenant demander votre certification Premium.');
            return $this->redirectToRoute('app_certification');
        }

        // User → gestion exercices
        return $this->redirectToRoute('app_exercice_index');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/premium-flow', name: 'app_premium_flow')]
    public function premiumFlow(Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $session = $request->getSession();
            $session->set('premium_flow', true);
            $this->addFlash('info', 'Connectez-vous d\'abord, puis vous pourrez demander votre certification Premium.');
            return $this->redirectToRoute('app_login');
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin_dashboard');
        }

        if ($this->isGranted('ROLE_COACH')) {
            return $this->redirectToRoute('app_seance_sport_index');
        }

        return $this->redirectToRoute('app_certification');
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_redirect_after_login');
        }

        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $user->setMotDePasse(
                $passwordHasher->hashPassword($user, $plainPassword)
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $flow = $request->query->get('flow');

            if ($flow === 'certif') {
                $session = $request->getSession();
                $session->set('certif_flow', true);
                $session->set('certif_email', $user->getEmail());
                $this->addFlash('success', 'Votre compte a été créé avec succès !');
                return $this->redirectToRoute('app_login', ['auto_login' => 'certif']);
            } else {
                $this->addFlash('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('security/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}