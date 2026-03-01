<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;

class QuizService
{
    private HttpClientInterface $httpClient;
    private LoggerInterface $logger;
    private string $quizApiUrl;
    private string $apiKey;

    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger,
        string $quizApiUrl,
        string $apiKey
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->quizApiUrl = rtrim($quizApiUrl, '/');
        $this->apiKey = $apiKey;
    }

    /**
     * Récupère des questions de quiz selon les critères
     *
     * @return array<int, mixed>
     */
    public function getQuestions(
        string $category = null,
        int $limit = 10,
        string $difficulty = null
    ): array {
        try {
            $queryParams = [
                'apiKey' => $this->apiKey,
                'limit'  => $limit,
            ];

            if ($category) {
                $queryParams['category'] = $category;
            }
            if ($difficulty) {
                $queryParams['difficulty'] = strtolower($difficulty);
            }

            $response = $this->httpClient->request(
                'GET',
                $this->quizApiUrl . '/questions',
                [
                    'query'   => $queryParams,
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]
            );

            if ($response->getStatusCode() !== Response::HTTP_OK) {
                throw new \Exception('Erreur lors de la récupération des questions');
            }

            return $response->toArray();

        } catch (\Exception $e) {
            $this->logger->error('Erreur QuizService: ' . $e->getMessage());
            throw new \RuntimeException('Impossible de récupérer les questions. Veuillez réessayer plus tard.');
        }
    }

    /**
     * Récupère les catégories disponibles
     *
     * @return array<int, mixed>
     */
    public function getCategories(): array
    {
        try {
            $response = $this->httpClient->request(
                'GET',
                $this->quizApiUrl . '/categories',
                [
                    'query'   => ['apiKey' => $this->apiKey],
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]
            );

            if ($response->getStatusCode() !== Response::HTTP_OK) {
                throw new \Exception('Erreur lors de la récupération des catégories');
            }

            return $response->toArray();

        } catch (\Exception $e) {
            $this->logger->error('Erreur QuizService (getCategories): ' . $e->getMessage());
            throw new \RuntimeException('Impossible de récupérer les catégories.');
        }
    }
}