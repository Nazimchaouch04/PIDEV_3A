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

    /**
     * Find logs with advanced filters (role, action type, date range)
     * @param string|null $role Filter by user role (e.g., 'ROLE_ADMIN', 'ROLE_USER')
     * @param string|null $actionType Filter by action type (e.g., 'login', 'logout', 'failed')
     * @param \DateTimeInterface|null $dateFrom Start date filter
     * @param \DateTimeInterface|null $dateTo End date filter
     * @return LogEvent[] Returns an array of LogEvent objects
     */
    public function findWithFilters(
        ?string $role = null,
        ?string $actionType = null,
        ?\DateTimeInterface $dateFrom = null,
        ?\DateTimeInterface $dateTo = null
    ): array {
        $qb = $this->createQueryBuilder('l')
            ->leftJoin('l.utilisateur', 'u')
            ->addSelect('u');

        // Filter by role
        if ($role) {
            $qb->andWhere('u.roles LIKE :role')
               ->setParameter('role', '%' . $role . '%');
        }

        // Filter by action type
        if ($actionType) {
            switch ($actionType) {
                case 'login':
                    $qb->andWhere('l.action = :action')
                       ->setParameter('action', 'Connexion réussie');
                    break;
                case 'logout':
                    $qb->andWhere('l.action = :action')
                       ->setParameter('action', 'Déconnexion');
                    break;
                case 'failed':
                    $qb->andWhere('l.action LIKE :action')
                       ->setParameter('action', '%échouée%');
                    break;
                case 'password':
                    $qb->andWhere('l.action LIKE :action')
                       ->setParameter('action', '%mot de passe%');
                    break;
                case 'suspicious':
                    $qb->andWhere('l.action LIKE :action OR l.action LIKE :suspicious')
                       ->setParameter('action', '%bloqué%')
                       ->setParameter('suspicious', '%suspect%');
                    break;
            }
        }

        // Filter by date range
        if ($dateFrom) {
            $qb->andWhere('l.createdAt >= :dateFrom')
               ->setParameter('dateFrom', $dateFrom);
        }
        if ($dateTo) {
            $qb->andWhere('l.createdAt <= :dateTo')
               ->setParameter('dateTo', $dateTo);
        }

        return $qb->orderBy('l.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
