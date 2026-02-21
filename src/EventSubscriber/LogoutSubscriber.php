<?php

namespace App\EventSubscriber;

use App\Service\ActivityLogger;
use App\Entity\Utilisateur;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

/**
 * Logs user logout events
 */
class LogoutSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ActivityLogger $activityLogger
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            LogoutEvent::class => 'onLogout',
        ];
    }

    public function onLogout(LogoutEvent $event): void
    {
        $user = $event->getToken()->getUser();

        // Log the logout event
        if ($user instanceof Utilisateur) {
            $this->activityLogger->log('Déconnexion', $user);
        }
    }
}
