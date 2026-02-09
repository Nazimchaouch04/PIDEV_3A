<?php

namespace App\Repository;

use App\Entity\EvenementSante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EvenementSante>
 */
class EvenementSanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvenementSante::class);
    }

    /**
     * @return EvenementSante[]
     */
    public function findUpcoming(): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.dateEvent > :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('e.dateEvent', 'ASC')
            ->getQuery()
            ->getResult();
    }
}