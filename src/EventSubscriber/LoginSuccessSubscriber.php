<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Redirects users to the correct dashboard based on their role after login.
 *
 * Priority rules (first match wins):
 *   ROLE_ADMIN       → /admin-dashboard
 *   ROLE_COACH       → /dashboard
 *   ROLE_SPECIALISTE → /dashboard
 *   ROLE_USER        → /dashboard
 */
class LoginSuccessSubscriber implements EventSubscriberInterface
{
    use TargetPathTrait;

    public function __construct(private UrlGeneratorInterface $urlGenerator) {}

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => 'onLoginSuccess',
        ];
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $request = $event->getRequest();
        
        // Check if there is a target path saved in the session for the 'main' firewall
        $targetPath = $this->getTargetPath($request->getSession(), 'main');
        if ($targetPath) {
            $event->setResponse(new RedirectResponse($targetPath));
            return;
        }

        $user = $event->getUser();
        $roles = $user->getRoles();

        if (in_array('ROLE_ADMIN', $roles, true)) {
            $url = $this->urlGenerator->generate('app_admin_dashboard');
        } else {
            // ROLE_COACH, ROLE_SPECIALISTE, and regular ROLE_USER all go to the main dashboard
            $url = $this->urlGenerator->generate('app_dashboard');
        }

        $event->setResponse(new RedirectResponse($url));
    }
}
