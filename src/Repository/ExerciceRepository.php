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
            // FIX ligne 82 : on utilise max() pour éviter la comparaison "> 0 toujours vraie"
            $dureeParExo = $duree / max($nbExos, 1);

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
     *
     * @return array{labels: string[], data: int[]}
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
     *
     * @return array{labels: string[], data: int[]}
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
     *
     * @return array{labels: string[], data: int[]}
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
     *
     * @return array{labels: string[], data: int[]}
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

    // =========================================================================
    // ══════════════  MÉTHODES DE RECHERCHE / FILTRAGE / TRI  ═════════════════
    // =========================================================================

    /**
     * Recherche avancée multi-critères
     * FIX : 5 paramètres pour correspondre aux appels du controller
     *
     * @return Exercice[]
     */
    public function advancedSearch(
        ?string $nom = null,
        ?string $intensite = null,
        ?float  $minCalories = null,
        ?float  $maxCalories = null,
        ?int    $seanceId = null
    ): array {
        $qb = $this->createQueryBuilder('e');

        if ($nom !== null && $nom !== '') {
            $qb->andWhere('e.nomExercice LIKE :nom')
               ->setParameter('nom', '%' . $nom . '%');
        }

        if ($intensite !== null && $intensite !== '') {
            $qb->andWhere('e.intensite = :intensite')
               ->setParameter('intensite', $intensite);
        }

        if ($minCalories !== null) {
            $qb->andWhere('e.caloriesParMinute >= :minCal')
               ->setParameter('minCal', $minCalories);
        }

        if ($maxCalories !== null) {
            $qb->andWhere('e.caloriesParMinute <= :maxCal')
               ->setParameter('maxCal', $maxCalories);
        }

        if ($seanceId !== null) {
            $qb->join('e.seance', 's')
               ->andWhere('s.id = :seanceId')
               ->setParameter('seanceId', $seanceId);
        }

        return $qb->orderBy('e.nomExercice', 'ASC')
                  ->getQuery()
                  ->getResult();
    }

    /**
     * Filtrer par intensité
     *
     * @return Exercice[]
     */
    public function filterByIntensite(string $intensite): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.intensite = :intensite')
            ->setParameter('intensite', $intensite)
            ->orderBy('e.nomExercice', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Filtrer par séance
     *
     * @return Exercice[]
     */
    public function filterBySeance(int $seanceId): array
    {
        return $this->createQueryBuilder('e')
            ->join('e.seance', 's')
            ->where('s.id = :seanceId')
            ->setParameter('seanceId', $seanceId)
            ->orderBy('e.nomExercice', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trier par nom avec ordre configurable
     * FIX : accepte le paramètre $order pour correspondre aux appels du controller
     *
     * @return Exercice[]
     */
    public function sortByNom(string $order = 'ASC'): array
    {
        $direction = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        return $this->createQueryBuilder('e')
            ->orderBy('e.nomExercice', $direction)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trier par intensité avec ordre configurable
     * FIX : accepte le paramètre $order pour correspondre aux appels du controller
     *
     * @return Exercice[]
     */
    public function sortByIntensite(string $order = 'ASC'): array
    {
        $direction = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        return $this->createQueryBuilder('e')
            ->orderBy('e.intensite', $direction)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trier par calories avec ordre configurable
     * FIX : accepte le paramètre $order pour correspondre aux appels du controller
     *
     * @return Exercice[]
     */
    public function sortByCalories(string $order = 'DESC'): array
    {
        $direction = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';

        return $this->createQueryBuilder('e')
            ->orderBy('e.caloriesParMinute', $direction)
            ->getQuery()
            ->getResult();
    }
}
