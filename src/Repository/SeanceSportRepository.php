<?php

namespace App\Repository;

use App\Entity\SeanceSport;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SeanceSport>
 */
class SeanceSportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeanceSport::class);
    }

    // =========================================================================
    // ═══════════════════  MÉTHODES EXISTANTES  ═══════════════════════════════
    // =========================================================================

    /**
     * @return SeanceSport[]
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->orderBy('s.dateSeance', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return SeanceSport[]
     */
    public function findThisWeekByUtilisateur(Utilisateur $utilisateur): array
    {
        $startOfWeek = new \DateTime('monday this week');
        $endOfWeek   = new \DateTime('sunday this week 23:59:59');

        return $this->createQueryBuilder('s')
            ->andWhere('s.utilisateur = :user')
            ->andWhere('s.dateSeance >= :start')
            ->andWhere('s.dateSeance <= :end')
            ->setParameter('user', $utilisateur)
            ->setParameter('start', $startOfWeek)
            ->setParameter('end', $endOfWeek)
            ->orderBy('s.dateSeance', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // =========================================================================
    // ═══════════════════  MÉTHODES STATISTIQUES  ═════════════════════════════
    // =========================================================================

    /**
     * Durée totale en minutes pour un utilisateur
     */
    public function getDureeTotal(Utilisateur $user): int
    {
        $seances = $this->findByUtilisateur($user);
        return array_sum(array_map(fn($s) => $s->getDureeMinutes(), $seances));
    }

    /**
     * Nombre de séances cette semaine pour un utilisateur
     */
    public function countSeancesThisWeek(Utilisateur $user): int
    {
        $debut = new \DateTime('monday this week 00:00:00');
        $fin   = new \DateTime('sunday this week 23:59:59');

        return (int) $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.utilisateur = :user')
            ->andWhere('s.dateSeance BETWEEN :debut AND :fin')
            ->setParameter('user', $user)
            ->setParameter('debut', $debut)
            ->setParameter('fin',   $fin)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Nombre de séances ce mois pour un utilisateur
     */
    public function countSeancesThisMonth(Utilisateur $user): int
    {
        $debut = new \DateTime('first day of this month 00:00:00');
        $fin   = new \DateTime('last day of this month 23:59:59');

        return (int) $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.utilisateur = :user')
            ->andWhere('s.dateSeance BETWEEN :debut AND :fin')
            ->setParameter('user', $user)
            ->setParameter('debut', $debut)
            ->setParameter('fin',   $fin)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Séances par semaine — graphique Line (PHP natif, sans YEAR/WEEK DQL)
     * $user = null → toutes les séances (coach)
     * $user = Utilisateur → ses séances (user)
     */
    public function getSeancesParSemaine(?Utilisateur $user = null): array
    {
        $debut = new \DateTime('-8 weeks');

        $qb = $this->createQueryBuilder('s')
            ->where('s.dateSeance >= :debut')
            ->setParameter('debut', $debut)
            ->orderBy('s.dateSeance', 'ASC');

        if ($user) {
            $qb->andWhere('s.utilisateur = :user')->setParameter('user', $user);
        }

        $seances = $qb->getQuery()->getResult();

        // Grouper par semaine en PHP
        $grouped = [];
        foreach ($seances as $s) {
            $cle = $s->getDateSeance()->format('Y-W'); // ex: "2026-08"
            $grouped[$cle] = ($grouped[$cle] ?? 0) + 1;
        }

        $labels = [];
        $data   = [];
        foreach ($grouped as $semaine => $total) {
            // Afficher "Sem 08" à partir de "2026-08"
            $labels[] = 'Sem ' . explode('-', $semaine)[1];
            $data[]   = $total;
        }

        return ['labels' => $labels, 'data' => $data];
    }

    /**
     * Durée par mois — graphique Bar (PHP natif, sans MONTH DQL)
     * $user = null → toutes les séances (coach)
     * $user = Utilisateur → ses séances (user)
     */
    public function getDureeParMois(?Utilisateur $user = null): array
    {
        $debut = new \DateTime('-6 months');

        $qb = $this->createQueryBuilder('s')
            ->where('s.dateSeance >= :debut')
            ->setParameter('debut', $debut)
            ->orderBy('s.dateSeance', 'ASC');

        if ($user) {
            $qb->andWhere('s.utilisateur = :user')->setParameter('user', $user);
        }

        $seances = $qb->getQuery()->getResult();

        // Grouper par mois en PHP
        $moisNoms = ['', 'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        $grouped  = [];
        foreach ($seances as $s) {
            $cle = $s->getDateSeance()->format('Y-m'); // ex: "2026-02"
            $grouped[$cle] = ($grouped[$cle] ?? 0) + $s->getDureeMinutes();
        }

        $labels = [];
        $data   = [];
        foreach ($grouped as $moisCle => $total) {
            $moisNum  = (int) explode('-', $moisCle)[1];
            $labels[] = $moisNoms[$moisNum];
            $data[]   = $total;
        }

        return ['labels' => $labels, 'data' => $data];
    }
}