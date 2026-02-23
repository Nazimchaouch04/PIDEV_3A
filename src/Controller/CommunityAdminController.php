<?php

namespace App\Controller;

use App\Entity\GroupeSoutien;
use App\Entity\EvenementSante;
use App\Form\GroupeSoutienType;
use App\Form\EvenementSanteType;
use App\Repository\GroupeSoutienRepository;
use App\Repository\EvenementSanteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/community')]
class CommunityAdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_community_index', methods: ['GET'])]
    public function index(Request $request, GroupeSoutienRepository $groupRepo, EvenementSanteRepository $eventRepo): Response
    {
        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'recent');

        if ($search) {
            $groupes = $groupRepo->createQueryBuilder('g')
                ->where('g.nomGroupe LIKE :q OR g.thematique LIKE :q')
                ->setParameter('q', '%'.$search.'%')->getQuery()->getResult();
            $events = $eventRepo->createQueryBuilder('e')
                ->where('e.titreEvent LIKE :q')
                ->setParameter('q', '%'.$search.'%')->orderBy('e.dateEvent', 'DESC')->getQuery()->getResult();
        } else {
            $groupes = $groupRepo->findBy([], ['nomGroupe' => 'ASC']);
            $order = ($sort === 'name') ? ['titreEvent' => 'ASC'] : ($sort === 'oldest' ? ['dateEvent' => 'ASC'] : ['dateEvent' => 'DESC']);
            $events = $eventRepo->findBy([], $order);
        }

        if ($request->headers->get('X-Requested-With') === 'XMLHttpRequest') {
            return $this->json([
                'groupsHtml' => $this->renderView('community_admin/_group_list_admin.html.twig', ['groupes' => $groupes]),
                'eventsHtml' => $this->renderView('community_admin/_event_list_admin.html.twig', ['events' => $events]),
            ]);
        }

        return $this->render('community_admin/index.html.twig', [
            'groupes' => $groupes,
            'events' => $events,
            'currentSort' => $sort,
        ]);
    }

    #[Route('/group/new', name: 'app_admin_group_new', methods: ['GET', 'POST'])]
    public function newGroup(Request $request, EntityManagerInterface $em): Response {
        $group = new GroupeSoutien();
        $form = $this->createForm(GroupeSoutienType::class, $group);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { $em->persist($group); $em->flush(); return $this->redirectToRoute('app_admin_community_index'); }
        return $this->render('community_admin/new_group.html.twig', ['form' => $form->createView(), 'title' => 'Nouveau Groupe']);
    }

    #[Route('/group/edit/{id}', name: 'app_admin_group_edit', methods: ['GET', 'POST'])]
    public function editGroup(Request $request, GroupeSoutien $group, EntityManagerInterface $em): Response {
        $form = $this->createForm(GroupeSoutienType::class, $group);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { $em->flush(); return $this->redirectToRoute('app_admin_community_index'); }
        return $this->render('community_admin/new_group.html.twig', ['form' => $form->createView(), 'title' => 'Modifier Groupe']);
    }

    #[Route('/group/delete/{id}', name: 'app_admin_group_delete', methods: ['POST'])]
    public function deleteGroup(Request $request, GroupeSoutien $group, EntityManagerInterface $em): Response {
        if ($this->isCsrfTokenValid('delete'.$group->getId(), $request->request->get('_token'))) { $em->remove($group); $em->flush(); }
        return $this->redirectToRoute('app_admin_community_index');
    }

    #[Route('/event/new', name: 'app_admin_event_new', methods: ['GET', 'POST'])]
    public function newEvent(Request $request, EntityManagerInterface $em): Response {
        $event = new EvenementSante();
        $form = $this->createForm(EvenementSanteType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { $em->persist($event); $em->flush(); return $this->redirectToRoute('app_admin_community_index'); }
        return $this->render('community_admin/new_event.html.twig', ['form' => $form->createView(), 'title' => 'Nouvel Événement']);
    }

    #[Route('/event/edit/{id}', name: 'app_admin_event_edit', methods: ['GET', 'POST'])]
    public function editEvent(Request $request, EvenementSante $event, EntityManagerInterface $em): Response {
        $form = $this->createForm(EvenementSanteType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { $em->flush(); return $this->redirectToRoute('app_admin_community_index'); }
        return $this->render('community_admin/new_event.html.twig', ['form' => $form->createView(), 'title' => 'Modifier Événement']);
    }

    #[Route('/event/delete/{id}', name: 'app_admin_event_delete', methods: ['POST'])]
    public function deleteEvent(Request $request, EvenementSante $event, EntityManagerInterface $em): Response {
        if ($this->isCsrfTokenValid('delete_event'.$event->getId(), $request->request->get('_token'))) { $em->remove($event); $em->flush(); }
        return $this->redirectToRoute('app_admin_community_index');
    }
}