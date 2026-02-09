<?php

namespace App\Repository;

use App\Entity\GroupeSoutien;
use App\Entity\MembreGroupe;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MembreGroupe>
 */
class MembreGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MembreGroupe::class);
    }

    public function findMembership(Utilisateur $utilisateur, GroupeSoutien $groupe): ?MembreGroupe
    {
        return $this->findOneBy([
            'utilisateur' => $utilisateur,
            'groupe' => $groupe,
        ]);
    }

    /**
     * @return MembreGroupe[]
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->orderBy('m.dateAdhesion', 'DESC')
            ->getQuery()
            ->getResult();
    }
}