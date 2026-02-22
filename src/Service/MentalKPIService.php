<?php

namespace App\Service;

use App\Entity\Utilisateur;
use App\Entity\QuizMental;
use App\Entity\SeanceSport;
use App\Entity\Repas;
use Doctrine\ORM\EntityManagerInterface;

class MentalKPIService
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    /**
     * Calcule un score de résilience basé sur la corrélation Sport / Mental
     * Formule : (Score moyen Quiz) * log(Nombre de séances sport + 1)
     */
    public function calculateResilienceScore(Utilisateur $user, int $days = 30): float
    {
        $since = new \DateTime("-{$days} days");

        $avgScore = $this->em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('AVG(q.scoreResultat)')
            ->where('q.utilisateur = :user')
            ->andWhere('q.dateQuiz >= :since')
            ->setParameter('user', $user)
            ->setParameter('since', $since)
            ->getQuery()
            ->getSingleScalarResult();

        $sportCount = $this->em->getRepository(SeanceSport::class)
            ->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.utilisateur = :user')
            ->andWhere('s.dateSeance >= :since')
            ->setParameter('user', $user)
            ->setParameter('since', $since)
            ->getQuery()
            ->getSingleScalarResult();

        if (!$avgScore) return 0.0;

        // On utilise log(n+1) pour l'impact du sport
        return round($avgScore * log($sportCount + 1, 2), 1);
    }

    /**
     * Analyse l'impact de la nutrition sur l'agilité cognitive
     */
    public function getNutritionAgilityCorrelation(Utilisateur $user): array
    {
        $quizzes = $this->em->getRepository(QuizMental::class)
            ->findBy(['utilisateur' => $user], ['dateQuiz' => 'DESC'], 5);

        $correlations = [];

        foreach ($quizzes as $quiz) {
            $date = $quiz->getDateQuiz();
            $dayStart = (clone $date)->setTime(0, 0, 0);
            $dayEnd = (clone $date)->setTime(23, 59, 59);

            $repas = $this->em->getRepository(Repas::class)
                ->createQueryBuilder('r')
                ->where('r.utilisateur = :user')
                ->andWhere('r.dateConsommation BETWEEN :start AND :end')
                ->setParameter('user', $user)
                ->setParameter('start', $dayStart)
                ->setParameter('end', $dayEnd)
                ->getQuery()
                ->getResult();

            $totalCals = 0;
            $totalProts = 0;
            foreach ($repas as $r) {
                $totalCals += $r->getTotalCalories();
                $totalProts += $r->getTotalProteines();
            }

            $correlations[] = [
                'date' => $date->format('d/m'),
                'agilite' => $quiz->getAgiliteCognitive(),
                'calories' => $totalCals,
                'proteines' => $totalProts,
                'temps_reponse' => $quiz->getTempsMoyenReponse()
            ];
        }

        return $correlations;
    }

    /**
     * Score d'engagement global
     */
    public function getEngagementIndex(Utilisateur $user): int
    {
        $since = new \DateTime("-7 days");
        
        $actions = 0;
        $actions += $this->em->getRepository(QuizMental::class)->createQueryBuilder('q')->select('COUNT(q.id)')->where('q.utilisateur = :u')->andWhere('q.dateQuiz >= :s')->setParameter('u', $user)->setParameter('s', $since)->getQuery()->getSingleScalarResult();
        $actions += $this->em->getRepository(SeanceSport::class)->createQueryBuilder('s')->select('COUNT(s.id)')->where('s.utilisateur = :u')->andWhere('s.dateSeance >= :s')->setParameter('u', $user)->setParameter('s', $since)->getQuery()->getSingleScalarResult();
        $actions += $this->em->getRepository(Repas::class)->createQueryBuilder('r')->select('COUNT(r.id)')->where('r.utilisateur = :u')->andWhere('r.dateConsommation >= :s')->setParameter('u', $user)->setParameter('s', $since)->getQuery()->getSingleScalarResult();

        return min(100, $actions * 5); // Max 100
    }
}
