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
}