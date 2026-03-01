<?php

namespace App\Service;

use ReCaptcha\ReCaptcha;
use Psr\Log\LoggerInterface;

class RecaptchaService
{
    private ReCaptcha $recaptcha;
    private LoggerInterface $logger;
    /** @phpstan-ignore property.onlyWritten */
    private string $secretKey;

    public function __construct(LoggerInterface $logger, string $recaptchaSecretKey)
    {
        $this->logger = $logger;
        $this->secretKey = $recaptchaSecretKey;
        $this->recaptcha = new ReCaptcha($recaptchaSecretKey);
    }

    public function verify(string $token, ?string $remoteIp = null): bool
    {
        try {
            $response = $this->recaptcha->setExpectedHostname($_SERVER['HTTP_HOST'] ?? null)
                ->verify($token, $remoteIp);

            if ($response->isSuccess()) {
                $this->logger->info('reCAPTCHA verification successful', [
                    'score' => $response->getScore(),
                    'hostname' => $response->getHostname(),
                    'action' => $response->getAction()
                ]);
                return true;
            } else {
                $this->logger->warning('reCAPTCHA verification failed', [
                    'error_codes' => $response->getErrorCodes(),
                    'hostname' => $response->getHostname()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            $this->logger->error('reCAPTCHA verification error: ' . $e->getMessage());
            return false;
        }
    }

    public function verifyWithScore(string $token, float $minScore = 0.5, ?string $remoteIp = null): bool
    {
        try {
            $response = $this->recaptcha->setExpectedHostname($_SERVER['HTTP_HOST'] ?? null)
                ->verify($token, $remoteIp);

            if ($response->isSuccess() && $response->getScore() >= $minScore) {
                $this->logger->info('reCAPTCHA verification successful with score', [
                    'score' => $response->getScore(),
                    'min_score' => $minScore,
                    'hostname' => $response->getHostname(),
                    'action' => $response->getAction()
                ]);
                return true;
            } else {
                $this->logger->warning('reCAPTCHA verification failed - score too low', [
                    'score' => $response->getScore(),
                    'min_score' => $minScore,
                    'error_codes' => $response->getErrorCodes(),
                    'hostname' => $response->getHostname()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            $this->logger->error('reCAPTCHA verification error: ' . $e->getMessage());
            return false;
        }
    }

    public function getSiteKey(): string
    {
        return $_ENV['RECAPTCHA_SITE_KEY'] ?? '';
    }

    public function renderScript(string $action = 'homepage'): string
    {
        $siteKey = $this->getSiteKey();

        return "
        <script src=\"https://www.google.com/recaptcha/api.js?render={$siteKey}\"></script>
        <script>
        function executeRecaptcha(action) {
            return grecaptcha.execute('{$siteKey}', {action: action}).then(function(token) {
                var recaptchaResponse = document.getElementById('recaptcha-response');
                if (recaptchaResponse) {
                    recaptchaResponse.value = token;
                }
                return token;
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            executeRecaptcha('{$action}');
        });
        </script>";
    }

    public function renderHiddenField(): string
    {
        return '<input type="hidden" id="recaptcha-response" name="recaptcha_response">';
    }
}