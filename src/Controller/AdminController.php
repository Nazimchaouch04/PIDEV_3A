<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\AdminUserType;
use App\Repository\CertificationRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin-dashboard', name: 'app_admin_dashboard')]
    public function index(UtilisateurRepository $userRepo, CertificationRepository $certRepo): Response
    {
        return $this->render('admin_dashboard.html.twig', [
            'totalUsers' => $userRepo->count([]),
            'totalQuizzes' => 42,
            'totalQuestions' => 150,
            'pendingCertsCount' => $certRepo->count(['statut' => 'PENDING']),
            'recentUsers' => $userRepo->findBy([], ['dateInscription' => 'DESC'], 5),
        ]);
    }

    #[Route('/admin-users', name: 'app_admin_users')]
    public function listUsers(UtilisateurRepository $userRepo, Request $request): Response
    {
        // Récupération des paramètres de recherche et tri depuis la requête
        $q = $request->query->get('q');           // Terme de recherche (nom ou email)
        $sort = $request->query->get('sort', 'id');     // Champ de tri (défaut: id)
        $direction = $request->query->get('direction', 'ASC'); // Direction de tri (défaut: ASC)

        // Construction de la requête Doctrine pour filtrer et trier les utilisateurs
        $queryBuilder = $userRepo->createQueryBuilder('u');

        // Ajout du filtre de recherche si un terme est fourni
        if ($q) {
            $queryBuilder->where('u.nomComplet LIKE :q OR u.email LIKE :q')
                ->setParameter('q', '%' . $q . '%');  // Recherche partielle (LIKE %terme%)
        }

        // Application du tri selon le champ et la direction spécifiés
        $queryBuilder->orderBy('u.' . $sort, $direction);

        // GESTION AJAX pour recherche et tri dynamique
        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            // Retour JSON avec le HTML du tableau pour mise à jour sans rechargement
            return $this->json([
                'usersHtml' => $this->renderView('admin/_user_list.html.twig', [
                    'users' => $queryBuilder->getQuery()->getResult(),
                    'current_q' => $q,
                    'current_sort' => $sort,
                    'current_direction' => $direction,
                ])
            ]);
        }

        // Retour normal avec rendu complet de la page
        return $this->render('admin_users.html.twig', [
            'users' => $queryBuilder->getQuery()->getResult(),
            'current_q' => $q,
            'current_sort' => $sort,
            'current_direction' => $direction,
        ]);
    }

    #[Route('/admin-user-view/{id}', name: 'app_admin_user_show')]
    public function showUser(Utilisateur $user): Response
    {
        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'isAdminView' => true,
        ]);
    }

    #[Route('/admin-certifications', name: 'app_admin_certifications')]
    public function listCertifications(CertificationRepository $certRepo): Response
    {
        return $this->render('admin_certifications.html.twig', [
            'certifications' => $certRepo->findBy(['statut' => 'PENDING']),
        ]);
    }

    #[Route('/admin-cert-approve/{id}', name: 'app_admin_cert_approve')]
    public function approveCert($id, CertificationRepository $certRepo, EntityManagerInterface $em): Response
    {
        $cert = $certRepo->find($id);

        if ($cert) {
            // 1. Mettre à jour le statut de la certification
            $cert->setStatut('APPROVED');

            // 2. Récupérer l'utilisateur lié
            $user = $cert->getUtilisateur();

            // 3. Attribuer le rôle spécifique selon le choix de l'utilisateur
            if ($cert->getType() === 'COACH') {
                $user->setRoles(['ROLE_COACH']);
            } elseif ($cert->getType() === 'SPECIALISTE') {
                $user->setRoles(['ROLE_SPECIALISTE']);
            } else {
                // Fallback (sécurité si le type est vide, ce qui ne devrait pas arriver)
                $user->setRoles(['ROLE_PRO']);
            }

            $em->flush();
            $this->addFlash('success', 'Certification approuvée ! L\'utilisateur est maintenant ' . $cert->getType());
        }

        return $this->redirectToRoute('app_admin_certifications');
    }

    #[Route('/admin-user-delete/{id}', name: 'app_admin_user_delete')]
    public function deleteUser(Utilisateur $user, EntityManagerInterface $em): Response
    {
        if ($user !== $this->getUser()) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('success', 'Utilisateur supprimé.');
        }
        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/admin-user-new', name: 'app_admin_user_new')]
    public function newUser(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        // Création d'une nouvelle instance d'utilisateur
        $user = new Utilisateur();
        
        // Création du formulaire avec champ mot de passe obligatoire
        $form = $this->createForm(AdminUserType::class, $user, ['include_password' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hachage sécurisé du mot de passe avant sauvegarde
            $plainPassword = $form->get('plainPassword')->getData();
            $user->setMotDePasse(
                $passwordHasher->hashPassword(
                    $user,
                    $plainPassword
                )
            );

            // Persistance de l'utilisateur en base de données
            $em->persist($user);
            $em->flush();

            // Message de succès et redirection vers la liste
            $this->addFlash('success', 'Utilisateur créé avec succès.');
            return $this->redirectToRoute('app_admin_users');
        }

        // Affichage du formulaire si non soumis ou invalide
        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Créer un utilisateur',
            'user' => $user
        ]);
    }

    #[Route('/admin-user-edit/{id}', name: 'app_admin_user_edit')]
    public function editUser(Utilisateur $user, Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        // Création du formulaire pour l'utilisateur existant avec mot de passe optionnel
        $form = $this->createForm(AdminUserType::class, $user, ['include_password' => true, 'password_required' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mise à jour du mot de passe uniquement si un nouveau est fourni
            $plainPassword = $form->get('plainPassword')->getData();
            if ($plainPassword) {
                $user->setMotDePasse(
                    $passwordHasher->hashPassword(
                        $user,
                        $plainPassword
                    )
                );
            }

            // Sauvegarde des modifications
            $em->flush();
            $this->addFlash('success', 'Utilisateur mis à jour avec succès.');
            return $this->redirectToRoute('app_admin_users');
        }

        // Affichage du formulaire avec données existantes
        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Modifier un utilisateur',
            'user' => $user
        ]);
    }

    #[Route('/admin-users/pdf', name: 'app_admin_users_pdf', methods: ['GET'])]
    public function exportUsersPdf(UtilisateurRepository $userRepo): Response
    {
        // Configuration de Dompdf pour la génération PDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        // Récupération de tous les utilisateurs pour l'export
        $users = $userRepo->findAll();
        
        // Génération du HTML à partir du template
        $html = $this->renderView('admin/users_pdf.html.twig', [
            'users' => $users,
            'date' => new \DateTime()
        ]);
        
        // Conversion HTML vers PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Génération du nom de fichier avec timestamp
        $filename = 'utilisateurs_' . date('Y-m-d_H-i-s') . '.pdf';
        
        // Envoi du PDF en téléchargement
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
}
