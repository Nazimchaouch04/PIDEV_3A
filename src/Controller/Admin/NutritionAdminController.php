<?php

namespace App\Controller\Admin;

use App\Entity\Repas;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/admin')]
class NutritionAdminController extends AbstractController
{
    #[Route('/users', name: 'admin_users_index', methods: ['GET'])]
    public function users(UtilisateurRepository $utilisateurRepository): Response
    {
        // Récupérer uniquement les utilisateurs (pas les admins/coaches)
        $users = $utilisateurRepository->createQueryBuilder('u')
            ->where('u.roles NOT LIKE :admin')
            ->andWhere('u.roles NOT LIKE :coach')
            ->setParameter('admin', '%ROLE_ADMIN%')
            ->setParameter('coach', '%ROLE_COACH%')
            ->getQuery()
            ->getResult();

        return $this->render('dashboard/dashboard_repas_users.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/users/pdf', name: 'admin_users_pdf', methods: ['GET'])]
    public function exportUsersPdf(UtilisateurRepository $utilisateurRepository): Response
    {
        // Configure Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        // Get only users (not admins/coaches) with their meals
        $users = $utilisateurRepository->createQueryBuilder('u')
            ->where('u.roles NOT LIKE :admin')
            ->andWhere('u.roles NOT LIKE :coach')
            ->setParameter('admin', '%ROLE_ADMIN%')
            ->setParameter('coach', '%ROLE_COACH%')
            ->getQuery()
            ->getResult();
        
        // Generate HTML
        $html = $this->renderView('dashboard/users_pdf.html.twig', [
            'users' => $users,
            'date' => new \DateTime()
        ]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate filename
        $filename = 'utilisateurs_repas_' . date('Y-m-d_H-i-s') . '.pdf';
        
        // Download PDF
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }

    #[Route('/users/{id}/repas', name: 'admin_user_meals', methods: ['GET'])]
    public function userMeals(Utilisateur $user): Response
    {
        return $this->render('dashboard/dashboard_repas_user_meals.html.twig', [
            'user' => $user,
            'repasList' => $user->getRepas(),
        ]);
    }

    #[Route('/repas/{id}/aliments', name: 'admin_meal_foods', methods: ['GET'])]
    public function mealFoods(Repas $repas): Response
    {
        return $this->render('dashboard/dashboard_repas_meal_foods.html.twig', [
            'repas' => $repas,
            'aliments' => $repas->getAliments(),
        ]);
    }
}
