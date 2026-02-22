<?php

namespace App\EventSubscriber;

use App\Service\ActivityLogger;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;

/**
 * Logs failed login attempts
 */
class LoginFailureSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ActivityLogger $activityLogger,
        private EntityManagerInterface $entityManager
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            LoginFailureEvent::class => 'onLoginFailure',
        ];
    }

    public function onLoginFailure(LoginFailureEvent $event): void
    {
        // Get the username/email that was used for the failed attempt
        $passport = $event->getPassport();
        $userIdentifier = $passport?->getUser()?->getUserIdentifier() ?? 'unknown';

        // Try to find the user by email
        $user = $this->entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $userIdentifier]);

        // Log the failed login attempt
        if ($user) {
            $this->activityLogger->log('Connexion échouée', $user);
        } else {
            // Log without user if user not found
            $this->activityLogger->log('Connexion échouée (utilisateur non trouvé: ' . $userIdentifier . ')', null);
        }
    }
}
