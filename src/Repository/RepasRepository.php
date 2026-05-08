<?php

namespace App\Repository;

use App\Entity\Repas;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Repas>
 */
class RepasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repas::class);
    }

    /**
     * @return Repas[]
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->orderBy('r.dateConsommation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Repas[]
     */
    public function findTodayByUtilisateur(Utilisateur $utilisateur): array
    {
        $today = new \DateTime('today');
        $tomorrow = new \DateTime('tomorrow');

        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :user')
            ->andWhere('r.dateConsommation >= :today')
            ->andWhere('r.dateConsommation < :tomorrow')
            ->setParameter('user', $utilisateur)
            ->setParameter('today', $today)
            ->setParameter('tomorrow', $tomorrow)
            ->orderBy('r.dateConsommation', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Retourne tous les repas d'un utilisateur pour la semaine contenant la date donnée.
     *
     * @return Repas[]
     */
    public function findByUtilisateurAndWeek(Utilisateur $utilisateur, \DateTimeInterface $dateReference): array
    {
        // Lundi 00:00 de la semaine de la date de référence
        $startOfWeek = (clone $dateReference)->setTime(0, 0, 0);
        // Ajuster au lundi
        $dayOfWeek = (int) $startOfWeek->format('N'); // 1 (lundi) à 7 (dimanche)
        if ($dayOfWeek > 1) {
            $startOfWeek->modify('-' . ($dayOfWeek - 1) . ' days');
        }

        // Lundi suivant
        $endOfWeek = (clone $startOfWeek)->modify('+7 days');

        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :user')
            ->andWhere('r.dateConsommation >= :start')
            ->andWhere('r.dateConsommation < :end')
            ->setParameter('user', $utilisateur)
            ->setParameter('start', $startOfWeek)
            ->setParameter('end', $endOfWeek)
            ->orderBy('r.dateConsommation', 'ASC')
            ->getQuery()
            ->getResult();
    }
}