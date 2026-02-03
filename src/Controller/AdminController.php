<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
final class AdminController extends AbstractController
{
    #[Route('', name: 'app_admin_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('back/dashboard.html.twig', [
            'pending_pro_requests' => 0,
            'unread_notifications' => 0,
        ]);
    }

    #[Route('/users', name: 'app_admin_users')]
    public function users(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Gestion des utilisateurs',
        ]);
    }

    #[Route('/pro-requests', name: 'app_admin_pro_requests')]
    public function proRequests(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Demandes pro',
            'pending_pro_requests' => 0,
        ]);
    }

    #[Route('/nutrition', name: 'app_admin_nutrition')]
    public function nutrition(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Nutrition',
        ]);
    }

    #[Route('/sport', name: 'app_admin_sport')]
    public function sport(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Sport',
        ]);
    }

    #[Route('/mental', name: 'app_admin_mental')]
    public function mental(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Quiz & Mental',
        ]);
    }

    #[Route('/appointments', name: 'app_admin_appointments')]
    public function appointments(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Rendez-vous',
        ]);
    }

    #[Route('/community', name: 'app_admin_community')]
    public function community(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Communauté',
        ]);
    }

    #[Route('/settings', name: 'app_admin_settings')]
    public function settings(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Paramètres',
        ]);
    }

    #[Route('/logs', name: 'app_admin_logs')]
    public function logs(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Logs',
        ]);
    }

    #[Route('/analytics', name: 'app_admin_analytics')]
    public function analytics(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Analytics',
        ]);
    }

    #[Route('/profile', name: 'app_admin_profile')]
    public function profile(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Mon profil (Admin)',
        ]);
    }

    #[Route('/user/create', name: 'app_admin_user_create')]
    public function userCreate(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Ajouter un utilisateur',
        ]);
    }

    #[Route('/nutrition/food/create', name: 'app_admin_nutrition_food_create')]
    public function nutritionFoodCreate(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Ajouter un aliment',
        ]);
    }

    #[Route('/sport/exercise/create', name: 'app_admin_sport_exercise_create')]
    public function sportExerciseCreate(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Ajouter un exercice',
        ]);
    }

    #[Route('/mental/quiz/create', name: 'app_admin_mental_quiz_create')]
    public function mentalQuizCreate(): Response
    {
        return $this->render('back/placeholder.html.twig', [
            'title' => 'Créer un quiz',
        ]);
    }
}
