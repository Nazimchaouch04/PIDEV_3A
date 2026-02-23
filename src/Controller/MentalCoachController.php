<?php

namespace App\Controller;

use App\Entity\MentalCheckIn;
use App\Entity\Utilisateur;
use App\Service\MentalAIService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentalCoachController extends AbstractController
{
    public function __construct(
        private MentalAIService $aiService,
        private EntityManagerInterface $em
    ) {}

    #[Route('/mental/coach', name: 'app_mental_coach')]
    public function index(): Response
    {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        
        $fatigue = $this->aiService->getFatigueAnalysis($user);
        $prediction = $this->aiService->getPerformancePrediction($user);

        return $this->render('mental/coach/index.html.twig', [
            'fatigue' => $fatigue,
            'prediction' => $prediction,
            'checkins' => $user->getMentalCheckIns()
        ]);
    }

    #[Route('/mental/coach/checkin', name: 'app_mental_coach_checkin', methods: ['POST'])]
    public function checkin(Request $request): Response
    {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        
        $humeur = $request->request->get('humeur', 'calme');
        $energie = (int)$request->request->get('energie', 5);
        $note = $request->request->get('note', '');

        $checkin = new MentalCheckIn();
        $checkin->setUtilisateur($user);
        $checkin->setHumeur($humeur);
        $checkin->setNiveauEnergie($energie);
        $checkin->setNotePersonnelle($note);

        // Obtenir le conseil de l'IA
        $advice = $this->aiService->getCoachAdvice($user, $note ?: "Je me sens {$humeur} aujourd'hui.");
        $checkin->setReponseCoach($advice);

        $this->em->persist($checkin);
        $this->em->flush();

        $this->addFlash('success', 'Check-in enregistré ! Ton coach t\'a répondu.');

        return $this->redirectToRoute('app_mental_coach');
    }
}
