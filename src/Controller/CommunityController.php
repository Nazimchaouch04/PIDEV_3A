<?php

namespace App\Controller;

use App\Entity\GroupeSoutien;
use App\Entity\MembreGroupe;
use App\Entity\Utilisateur;
use App\Repository\EvenementSanteRepository;
use App\Repository\GroupeSoutienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/community')]
class CommunityController extends AbstractController
{
    #[Route('', name: 'app_community', methods: ['GET'])]
    public function index(Request $request, GroupeSoutienRepository $groupeRepo, EvenementSanteRepository $eventRepo): Response
    {
        $search = $request->query->get('search');
        $sort   = $request->query->get('sort', 'date');

        if ($search) {
            $groupes = $groupeRepo->createQueryBuilder('g')
                ->where('g.nomGroupe LIKE :q OR g.thematique LIKE :q')
                ->setParameter('q', '%' . $search . '%')
                ->getQuery()
                ->getResult();
        } else {
            $order   = ($sort === 'name') ? ['nomGroupe' => 'ASC'] : ['id' => 'DESC'];
            $groupes = $groupeRepo->findBy([], $order);
        }

        $upcomingEvents = $eventRepo->createQueryBuilder('e')
            ->where('e.dateEvent >= :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('e.dateEvent', 'ASC')
            ->getQuery()
            ->getResult();

        $sunData = ['sunrise' => new \DateTime('06:00:00')];

        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return new Response($this->renderView('community/_group_list.html.twig', [
                'groupes' => $groupes,
            ]));
        }

        return $this->render('community/index.html.twig', [
            'groupes'        => $groupes,
            'upcomingEvents' => $upcomingEvents,
            'currentSort'    => $sort,
            'sunData'        => $sunData,
        ]);
    }

    #[Route('/{id}', name: 'app_community_groupe', methods: ['GET'])]
    public function show(GroupeSoutien $groupe, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $membership = null;
        if ($user) {
            $membership = $em->getRepository(MembreGroupe::class)->findOneBy([
                'groupe'      => $groupe,
                'utilisateur' => $user,
            ]);
        }

        return $this->render('community/groupe.html.twig', [
            'groupe'     => $groupe,
            'isMember'   => $membership !== null,
            'membership' => $membership,
        ]);
    }

    #[Route('/{id}/join', name: 'app_community_join', methods: ['POST'])]
    public function join(Request $request, GroupeSoutien $groupe, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->isCsrfTokenValid('join' . $groupe->getId(), $request->request->get('_token'))) {
            $existing = $em->getRepository(MembreGroupe::class)->findOneBy([
                'groupe'      => $groupe,
                'utilisateur' => $user,
            ]);

            if (!$existing && $groupe->hasPlaceDisponible()) {
                $membership = new MembreGroupe();
                $membership->setGroupe($groupe);

                // FIX :98 — cast UserInterface → Utilisateur
                /** @var Utilisateur $user */
                $membership->setUtilisateur($user);
                $membership->setRoleMembre('membre');
                $membership->setDateAdhesion(new \DateTime());

                $em->persist($membership);
                $em->flush();

                $this->addFlash('success', 'Vous avez rejoint le groupe avec succès !');
            }
        }

        return $this->redirectToRoute('app_community_groupe', ['id' => $groupe->getId()]);
    }

    #[Route('/{id}/leave', name: 'app_community_leave', methods: ['POST'])]
    public function leave(Request $request, GroupeSoutien $groupe, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->isCsrfTokenValid('leave' . $groupe->getId(), $request->request->get('_token'))) {
            $membership = $em->getRepository(MembreGroupe::class)->findOneBy([
                'groupe'      => $groupe,
                'utilisateur' => $user,
            ]);

            if ($membership) {
                $em->remove($membership);
                $em->flush();

                $this->addFlash('success', 'Vous avez quitté le groupe.');
            }
        }

        return $this->redirectToRoute('app_community_groupe', ['id' => $groupe->getId()]);
    }
}
