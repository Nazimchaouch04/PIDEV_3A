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
        $endOfWeek = new \DateTime('sunday this week 23:59:59');

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
}
