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
        // Rediriger si l'utilisateur est déjà connecté
        if ($this->getUser()) {
            $user = $this->getUser();
            
            // Si l'utilisateur est admin, rediriger vers le dashboard admin
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                return $this->redirectToRoute('app_admin_dashboard');
            }
            
            // Vérifier si c'est un flux de certification
            $session = $request->getSession();
            if ($session->get('certif_flow')) {
                $session->remove('certif_flow');
                return $this->redirectToRoute('app_certification');
            }
            // Vérifier si c'est un flux premium
            if ($session->get('premium_flow')) {
                $session->remove('premium_flow');
                $this->addFlash('success', 'Bienvenue ! Vous pouvez maintenant demander votre certification Premium.');
                return $this->redirectToRoute('app_certification');
            }
            
            return $this->redirectToRoute('app_dashboard');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Vérifier si c'est une auto-connexion pour certification
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

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Cette méthode sera interceptée par la clé logout du firewall dans security.yaml
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/premium-flow', name: 'app_premium_flow')]
    public function premiumFlow(Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            // Stocker l'intention de devenir premium en session
            $session = $request->getSession();
            $session->set('premium_flow', true);
            
            $this->addFlash('info', 'Connectez-vous d\'abord, puis vous pourrez demander votre certification Premium.');
            return $this->redirectToRoute('app_login');
        }
        
        // Si déjà connecté, rediriger vers certification
        return $this->redirectToRoute('app_certification');
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        // Empêcher un utilisateur connecté de s'inscrire à nouveau
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }

        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hachage du mot de passe
            $plainPassword = $form->get('plainPassword')->getData();
            $user->setMotDePasse(
                $passwordHasher->hashPassword(
                    $user,
                    $plainPassword
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // Vérifier si c'est un flux de certification
            $flow = $request->query->get('flow');
            
            if ($flow === 'certif') {
                // Flux certification : stocker les infos en session et rediriger vers login
                $session = $request->getSession();
                $session->set('certif_flow', true);
                $session->set('certif_email', $user->getEmail());
                
                $this->addFlash('success', 'Votre compte a été créé avec succès ! Vous allez être connecté automatiquement pour demander votre certification.');
                
                // Rediriger vers login avec les identifiants en session
                return $this->redirectToRoute('app_login', ['auto_login' => 'certif']);
            } else {
                // Flux normal : rediriger vers login
                $this->addFlash('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
                return $this->redirectToRoute('app_login');
            }
        }

        // Si le formulaire est invalide, Symfony renvoie automatiquement les erreurs à Twig
        return $this->render('security/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
