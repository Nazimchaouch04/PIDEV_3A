<?php

namespace App\Repository;

use App\Entity\LogEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LogEvent>
 */
class LogEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogEvent::class);
    }

    /**
     * Find all logs for a specific user
     * @return LogEvent[] Returns an array of LogEvent objects
     */
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.utilisateur = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find login and logout events for a specific user
     * @return LogEvent[] Returns an array of LogEvent objects
     */
    public function findLoginLogoutByUser(int $userId): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.utilisateur = :userId')
            ->andWhere('l.action IN (:actions)')
            ->setParameter('userId', $userId)
            ->setParameter('actions', ['Connexion réussie', 'Déconnexion'])
            ->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find all login/logout events for all users
     * @return LogEvent[] Returns an array of LogEvent objects
     */
    public function findAllLoginLogout(): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.action IN (:actions)')
            ->setParameter('actions', ['Connexion réussie', 'Déconnexion'])
            ->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
