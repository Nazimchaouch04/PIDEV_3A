<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\AdminUserType;
use App\Repository\UtilisateurRepository;
use App\Repository\CertificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
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
        $q = $request->query->get('q');
        $sort = $request->query->get('sort', 'id');
        $direction = $request->query->get('direction', 'ASC');

        $queryBuilder = $userRepo->createQueryBuilder('u');

        if ($q) {
            $queryBuilder->where('u.nomComplet LIKE :q OR u.email LIKE :q')
                ->setParameter('q', '%' . $q . '%');
        }

        $queryBuilder->orderBy('u.' . $sort, $direction);

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
        $user = new Utilisateur();
        $form = $this->createForm(AdminUserType::class, $user, ['include_password' => true]);
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

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Utilisateur créé avec succès.');
            return $this->redirectToRoute('app_admin_users');
        }

        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Créer un utilisateur',
            'user' => $user
        ]);
    }

    #[Route('/admin-user-edit/{id}', name: 'app_admin_user_edit')]
    public function editUser(Utilisateur $user, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AdminUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Utilisateur mis à jour avec succès.');
            return $this->redirectToRoute('app_admin_users');
        }

        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Modifier un utilisateur',
            'user' => $user
        ]);
    }
}
