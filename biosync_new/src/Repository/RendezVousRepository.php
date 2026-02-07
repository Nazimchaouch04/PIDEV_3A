<?php

namespace App\Repository;

use App\Entity\RendezVous;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RendezVous>
 */
class RendezVousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RendezVous::class);
    }

    /**
     * @return RendezVous[]
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->orderBy('r.dateHeureRdv', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return RendezVous[]
     */
    public function findUpcomingByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.utilisateur = :user')
            ->andWhere('r.dateHeureRdv > :now')
            ->setParameter('user', $utilisateur)
            ->setParameter('now', new \DateTime())
            ->orderBy('r.dateHeureRdv', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
