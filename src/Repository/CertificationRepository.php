<?php

namespace App\Repository;

use App\Entity\Certification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Certification>
 */
class CertificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Certification::class);
    }

    /**
     * @return Certification[] Retourne les demandes en attente
     */
    public function findPending(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.statut = :val')
            ->setParameter('val', 'PENDING')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
