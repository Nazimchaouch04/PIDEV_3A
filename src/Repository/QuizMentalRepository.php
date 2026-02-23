<?php

namespace App\Repository;

use App\Entity\QuizMental;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuizMental>
 */
class QuizMentalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizMental::class);
    }

    /**
     * @return QuizMental[]
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->orderBy('q.dateQuiz', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
