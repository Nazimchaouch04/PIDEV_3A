<?php

namespace App\Repository;

use App\Entity\CognitiveInsight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CognitiveInsight>
 */
class CognitiveInsightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CognitiveInsight::class);
    }

    /**
     * @return CognitiveInsight[] Returns an array of CognitiveInsight objects
     */
    public function findByUtilisateur($utilisateur): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.utilisateur = :val')
            ->setParameter('val', $utilisateur)
            ->orderBy('c.dateAnalyse', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
