<?php

namespace App\Security;

use App\Entity\Utilisateur;
use App\Repository\CertificationRepository;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    private CertificationRepository $certificationRepository;

    public function __construct(CertificationRepository $certificationRepository)
    {
        $this->certificationRepository = $certificationRepository;
    }

    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof Utilisateur) {
            return;
        }

        // Check if the user has a pending certification
        $pendingCert = $this->certificationRepository->findOneBy([
            'utilisateur' => $user,
            'statut' => 'PENDING'
        ]);

        if ($pendingCert) {
            // Throw a custom exception to block login
            throw new CustomUserMessageAccountStatusException(
                'Votre compte est bloqué en attente de la validation de votre certification par un administrateur.'
            );
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // No checks needed here
    }
}
