<?php

namespace App\Controller;

use App\Service\WellnessService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/zen')]
class WellnessController extends AbstractController
{
    #[Route('', name: 'app_wellness_zen_zone')]
    public function zenZone(WellnessService $wellnessService): Response
    {
        $quote = $wellnessService->getDailyQuote();
        $resources = $wellnessService->getRelaxationResources();

        return $this->render('mental/wellness/zen_zone.html.twig', [
            'quote' => $quote,
            'resources' => $resources,
        ]);
    }
}
