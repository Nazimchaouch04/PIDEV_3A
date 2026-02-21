<?php

namespace App\Service;

use App\Entity\LogEvent;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class ActivityLogger
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function log(string $action, ?Utilisateur $user = null): void
    {
        $log = new LogEvent();
        $log->setAction($action);
        $log->setUtilisateur($user);
        $log->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }
}
