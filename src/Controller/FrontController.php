<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Accueil',
        ]);
    }

    #[Route('/features', name: 'app_features')]
    public function features(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Fonctionnalités',
        ]);
    }

    #[Route('/pricing', name: 'app_pricing')]
    public function pricing(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Tarifs',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'À propos',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Contact',
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('front/dashboard.html.twig');
    }

    #[Route('/front/dashboard', name: 'app_front_dashboard')]
    public function frontDashboardAlias(): Response
    {
        return $this->redirectToRoute('app_dashboard');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Mon profil',
        ]);
    }

    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Paramètres',
        ]);
    }

    #[Route('/pro/dashboard', name: 'app_pro_dashboard')]
    public function proDashboard(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Espace pro',
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('front/auth/login.html.twig', [
            'error' => null,
            'success' => null,
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('front/auth/register.html.twig');
    }

    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Mot de passe oublié',
        ]);
    }

    #[Route('/pro/login', name: 'app_pro_login')]
    public function proLogin(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Accès professionnel',
        ]);
    }

    #[Route('/pro/certification', name: 'app_pro_certification')]
    public function proCertification(): Response
    {
        return $this->render('front/auth/pro_certification.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): Response
    {
        return $this->redirectToRoute('app_home');
    }

    #[Route('/legal/privacy', name: 'app_privacy')]
    public function privacy(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Politique de confidentialité',
        ]);
    }

    #[Route('/legal/terms', name: 'app_terms')]
    public function terms(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Conditions générales',
        ]);
    }

    #[Route('/legal/cookies', name: 'app_cookies')]
    public function cookies(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Gestion des cookies',
        ]);
    }

    #[Route('/legal', name: 'app_legal')]
    public function legal(): Response
    {
        return $this->render('front/static.html.twig', [
            'page_title' => 'Mentions légales',
        ]);
    }

    #[Route('/mental/quizzes', name: 'app_mental_quiz_list')]
    public function mentalQuizList(): Response
    {
        return $this->render('front/mental/quiz_list.html.twig');
    }

    #[Route('/mental/quizzes/play', name: 'app_front_mental_quiz_player')]
    public function mentalQuizPlayer(): Response
    {
        return $this->render('front/mental/quiz_player.html.twig', [
            'quiz' => [
                'title' => 'Quiz Démo',
                'description' => 'Quiz de démonstration.',
                'duration' => 10,
                'category' => 'Santé mentale',
                'questions' => [
                    ['id' => 1],
                    ['id' => 2],
                    ['id' => 3],
                ],
            ],
        ]);
    }

    #[Route('/nutrition/meals', name: 'app_nutrition_meals')]
    public function nutritionMeals(): Response
    {
        return $this->render('front/nutrition/meals.html.twig');
    }

    #[Route('/nutrition/meals/add', name: 'app_nutrition_add_meal')]
    public function nutritionAddMeal(): Response
    {
        return $this->render('front/nutrition/add_meal.html.twig');
    }

    #[Route('/sport/sessions', name: 'app_sport_sessions')]
    public function sportSessions(): Response
    {
        return $this->render('front/sport/sessions.html.twig');
    }

    #[Route('/sport/sessions/add', name: 'app_sport_add_session')]
    public function sportAddSession(): Response
    {
        return $this->render('front/sport/add_session.html.twig');
    }

    #[Route('/community/groups', name: 'app_community_groups')]
    public function communityGroups(): Response
    {
        return $this->render('front/community/groups.html.twig');
    }

    #[Route('/agenda/appointments', name: 'app_agenda_appointments')]
    public function agendaAppointments(): Response
    {
        return $this->render('front/agenda/appointments.html.twig');
    }
}
