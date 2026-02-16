<?php

namespace App\Service;

use Mailjet\Client;
use Mailjet\Resources;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MailjetService
{
    private Client $client;
    private string $fromEmail;
    private string $fromName;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->client = new Client(
            $_ENV['MAILJET_API_KEY'],
            $_ENV['MAILJET_SECRET_KEY'],
            true,
            ['version' => 'v3.1']
        );

        $this->fromEmail = $_ENV['MAILJET_FROM_EMAIL'];
        $this->fromName = $_ENV['MAILJET_FROM_NAME'];
    }

    /**
     * Envoie un email
     */
    public function sendEmail(string $to, string $subject, string $htmlContent, string $textContent = null): bool
    {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $this->fromEmail,
                        'Name' => $this->fromName
                    ],
                    'To' => [
                        [
                            'Email' => $to
                        ]
                    ],
                    'Subject' => $subject,
                    'HTMLPart' => $htmlContent,
                    'TextPart' => $textContent
                ]
            ]
        ];

        try {
            $response = $this->client->post(Resources::$Email, ['body' => $body]);
            
            return $response->success();
        } catch (\Exception $e) {
            // En développement, vous pouvez logger l'erreur
            error_log('Mailjet Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Envoie un email de réinitialisation de mot de passe
     */
    public function sendPasswordResetEmail(string $to, string $resetUrl, string $userName): bool
    {
        $subject = 'Réinitialisation de votre mot de passe - BioSync';
        
        $htmlContent = $this->getPasswordResetHtmlTemplate($resetUrl, $userName);
        $textContent = $this->getPasswordResetTextTemplate($resetUrl, $userName);

        return $this->sendEmail($to, $subject, $htmlContent, $textContent);
    }

    private function getPasswordResetHtmlTemplate(string $resetUrl, string $userName): string
    {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Réinitialisation de mot de passe - BioSync</title>
            <style>
                body {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background: #f8fafc;
                }
                .container {
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }
                .header {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    padding: 30px;
                    text-align: center;
                }
                .header h1 {
                    color: white;
                    margin: 0;
                    font-size: 28px;
                    font-weight: 700;
                }
                .content {
                    padding: 40px 30px;
                }
                .greeting {
                    font-size: 18px;
                    font-weight: 600;
                    color: #1a202c;
                    margin-bottom: 20px;
                }
                .message {
                    font-size: 16px;
                    color: #64748b;
                    margin-bottom: 30px;
                    line-height: 1.7;
                }
                .reset-button {
                    display: inline-block;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    text-decoration: none;
                    padding: 16px 32px;
                    border-radius: 12px;
                    font-weight: 600;
                    font-size: 16px;
                    text-align: center;
                    margin: 30px 0;
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
                    transition: all 0.3s ease;
                }
                .reset-button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
                }
                .link-text {
                    font-size: 14px;
                    color: #64748b;
                    text-align: center;
                    margin-top: 20px;
                    padding-top: 20px;
                    border-top: 1px solid #e5e7eb;
                }
                .link-text a {
                    color: #667eea;
                    text-decoration: none;
                    font-weight: 600;
                }
                .link-text a:hover {
                    color: #764ba2;
                    text-decoration: underline;
                }
                .footer {
                    background: #f8fafc;
                    padding: 20px 30px;
                    text-align: center;
                    font-size: 14px;
                    color: #64748b;
                    border-top: 1px solid #e5e7eb;
                }
                .security-note {
                    background: #fef3c7;
                    border: 1px solid #f59e0b;
                    border-radius: 8px;
                    padding: 15px;
                    margin: 20px 0;
                    font-size: 14px;
                    color: #92400e;
                }
                .logo {
                    width: 40px;
                    height: 40px;
                    background: white;
                    border-radius: 50%;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 15px;
                    font-weight: bold;
                    font-size: 18px;
                    color: #667eea;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <div class='logo'>B</div>
                    <h1>Réinitialisation de mot de passe</h1>
                </div>
                
                <div class='content'>
                    <p class='greeting'>Bonjour {$userName},</p>
                    
                    <p class='message'>
                        Vous avez demandé la réinitialisation de votre mot de passe BioSync. 
                        Pour définir un nouveau mot de passe, cliquez sur le bouton ci-dessous :
                    </p>
                    
                    <div style='text-align: center;'>
                        <a href='{$resetUrl}' class='reset-button'>
                            Réinitialiser mon mot de passe
                        </a>
                    </div>
                    
                    <div class='security-note'>
                        ⚠️ <strong>Important :</strong> Ce lien expire dans 1 heure pour des raisons de sécurité.
                    </div>
                    
                    <div class='link-text'>
                        Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :<br>
                        <a href='{$resetUrl}'>{$resetUrl}</a>
                    </div>
                </div>
                
                <div class='footer'>
                    <p>Si vous n'avez pas demandé cette réinitialisation, ignorez cet email.</p>
                    <p><strong>L'équipe BioSync</strong></p>
                    <p style='color: #667eea; font-size: 12px; margin-top: 10px;'>
                        🌱 Santé, Science & Bien-être
                    </p>
                </div>
            </div>
        </body>
        </html>";
    }

    private function getPasswordResetTextTemplate(string $resetUrl, string $userName): string
    {
        return "
Bonjour {$userName},

Vous avez demandé la réinitialisation de votre mot de passe BioSync.

Pour définir un nouveau mot de passe, veuillez copier-coller ce lien dans votre navigateur :
{$resetUrl}

Ce lien expire dans 1 heure.

Si vous n'avez pas demandé cette réinitialisation, ignorez cet email.

L'équipe BioSync
        ";
    }
}
