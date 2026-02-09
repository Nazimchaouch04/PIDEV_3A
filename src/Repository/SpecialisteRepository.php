<?php

namespace App\Repository;

use App\Entity\Specialiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialiste>
 */
class SpecialisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialiste::class);
    }

    /**
     * @return Specialiste[]
     */
    public function findBySpecialite(string $specialite): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.specialite LIKE :spec')
            ->setParameter('spec', '%' . $specialite . '%')
            ->orderBy('s.nomDocteur', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
