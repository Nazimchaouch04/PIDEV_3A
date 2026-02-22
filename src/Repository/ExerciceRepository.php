<?php

namespace App\Repository;

use App\Entity\Exercice;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exercice>
 */
class ExerciceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exercice::class);
    }

//    /**
//     * @return Exercice[] Returns an array of Exercice objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Exercice
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    // =========================================================================
    // ═══════════════════  MÉTHODES STATISTIQUES  ═════════════════════════════
    // =========================================================================

    /**
     * Tous les exercices d'un utilisateur (via ses séances)
     *
     * @return Exercice[]
     */
    public function findByUtilisateur(Utilisateur $user): array
    {
        return $this->createQueryBuilder('e')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    /**
     * Calories totales brûlées par un utilisateur
     * Calcul : caloriesParMinute × (dureeMinutes / nbExercices de la séance)
     */
    public function getCaloriesTotales(Utilisateur $user): float
    {
        $exercices = $this->findByUtilisateur($user);

        $seanceExercices = [];
        foreach ($exercices as $exercice) {
            $seanceId = $exercice->getSeance()->getId();
            $seanceExercices[$seanceId][] = $exercice;
        }

        $total = 0.0;
        foreach ($seanceExercices as $exos) {
            $duree       = $exos[0]->getSeance()->getDureeMinutes();
            $nbExos      = count($exos);
            $dureeParExo = $nbExos > 0 ? $duree / $nbExos : 0;

            foreach ($exos as $exo) {
                $total += $exo->getCaloriesParMinute() * $dureeParExo;
            }
        }

        return round($total, 2);
    }

    /**
     * Nom de l'exercice le plus pratiqué par un utilisateur
     */
    public function getExercicePlusPratique(Utilisateur $user): ?string
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.nomExercice, COUNT(e.id) as total')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->groupBy('e.nomExercice')
            ->orderBy('total', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result ? $result['nomExercice'] : null;
    }

    /**
     * Intensité la plus fréquente chez un utilisateur
     */
    public function getIntensitePlusCourante(Utilisateur $user): ?string
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.intensite, COUNT(e.id) as total')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->groupBy('e.intensite')
            ->orderBy('total', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result ? $result['intensite']->value : null;
    }

    /**
     * Moyenne des calories par minute (pour un user)
     */
    public function getCaloriesMoyennesParMinute(Utilisateur $user): float
    {
        $result = $this->createQueryBuilder('e')
            ->select('AVG(e.caloriesParMinute)')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getSingleScalarResult();

        return round((float) $result, 2);
    }

    /**
     * Répartition par intensité — graphique Doughnut (pour un user)
     */
    public function getRepartitionParIntensite(Utilisateur $user): array
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.intensite, COUNT(e.id) as total')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->groupBy('e.intensite')
            ->getQuery()
            ->getResult();

        $labels = [];
        $data   = [];
        foreach ($result as $row) {
            $labels[] = $row['intensite']->value;
            $data[]   = (int) $row['total'];
        }

        return ['labels' => $labels, 'data' => $data];
    }

    /**
     * Top 5 exercices — graphique Bar (pour un user)
     */
    public function getTop5Exercices(Utilisateur $user): array
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.nomExercice, COUNT(e.id) as total')
            ->join('e.seance', 's')
            ->where('s.utilisateur = :user')
            ->setParameter('user', $user)
            ->groupBy('e.nomExercice')
            ->orderBy('total', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        $labels = [];
        $data   = [];
        foreach ($result as $row) {
            $labels[] = $row['nomExercice'];
            $data[]   = (int) $row['total'];
        }

        return ['labels' => $labels, 'data' => $data];
    }

    // =========================================================================
    // ══════════════  MÉTHODES GLOBALES (COACH — tous users)  ═════════════════
    // =========================================================================

    /**
     * Répartition par intensité — GLOBAL pour le coach
     */
    public function getRepartitionParIntensiteGlobal(): array
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.intensite, COUNT(e.id) as total')
            ->groupBy('e.intensite')
            ->getQuery()
            ->getResult();

        $labels = [];
        $data   = [];
        foreach ($result as $row) {
            $labels[] = $row['intensite']->value;
            $data[]   = (int) $row['total'];
        }

        return ['labels' => $labels, 'data' => $data];
    }

    /**
     * Top 5 exercices — GLOBAL pour le coach
     */
    public function getTop5ExercicesGlobal(): array
    {
        $result = $this->createQueryBuilder('e')
            ->select('e.nomExercice, COUNT(e.id) as total')
            ->groupBy('e.nomExercice')
            ->orderBy('total', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        $labels = [];
        $data   = [];
        foreach ($result as $row) {
            $labels[] = $row['nomExercice'];
            $data[]   = (int) $row['total'];
        }

        return ['labels' => $labels, 'data' => $data];
    }
}