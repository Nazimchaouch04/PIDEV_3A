<?php

namespace App\Repository;

use App\Entity\GroupeSoutien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroupeSoutien>
 */
class GroupeSoutienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeSoutien::class);
    }

    /**
     * @return GroupeSoutien[]
     */
    public function findByThematique(string $thematique): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.thematique LIKE :theme')
            ->setParameter('theme', '%' . $thematique . '%')
            ->orderBy('g.nomGroupe', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return GroupeSoutien[]
     */
    public function findWithAvailablePlaces(): array
    {
        return $this->createQueryBuilder('g')
            ->leftJoin('g.membres', 'm')
            ->groupBy('g.id')
            ->having('COUNT(m.id) < g.capaciteMax')
            ->orderBy('g.nomGroupe', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
