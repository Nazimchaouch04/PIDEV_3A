<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MotivationController extends AbstractController
{
    // FIX :13 — type explicite au lieu de $httpClient sans type
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/motivation', name: 'motivation_form')]
    public function formulaire(): Response
    {
        return $this->render('motivation/formulaire.html.twig');
    }

    #[Route('/motivation/analyser', name: 'motivation_analyser', methods: ['POST'])]
    public function analyser(Request $request): Response
    {
        $humeur  = $request->request->get('humeur');
        $energie = $request->request->get('energie');
        $sommeil = $request->request->get('sommeil');
        $stress  = $request->request->get('stress');

        $response = $this->httpClient->request('POST', 'http://localhost:5000/motivation', [
            'json' => [
                'humeur'  => $humeur,
                'energie' => $energie,
                'sommeil' => $sommeil,
                'stress'  => $stress,
            ],
        ]);

        $data = $response->toArray();

        return $this->render('motivation/resultat.html.twig', [
            'resultat' => $data['resultat'],
            'humeur'   => $humeur,
        ]);
    }
}
