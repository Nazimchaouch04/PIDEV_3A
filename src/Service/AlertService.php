<?php

namespace App\Service;

use App\Entity\Alerte;
use App\Entity\Repas;
use App\Repository\AlerteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Twilio\Rest\Client;

class AlertService
{
    private EntityManagerInterface $em;
    private AlerteRepository $alerteRepository;
    private ?Client $twilioClient;
    private string $coachPhoneNumber;
    private string $twilioPhoneNumber;

    public function __construct(
        EntityManagerInterface $em,
        AlerteRepository $alerteRepository,
        string $twilioSid,
        string $twilioAuthToken,
        string $twilioPhoneNumber,
        string $coachPhoneNumber
    ) {
        $this->em = $em;
        $this->alerteRepository = $alerteRepository;
        $this->twilioClient = ($twilioSid && $twilioAuthToken) ? new Client($twilioSid, $twilioAuthToken) : null;
        $this->twilioPhoneNumber = $twilioPhoneNumber;
        $this->coachPhoneNumber = $coachPhoneNumber;
    }

    public function checkRepasAlerts(Repas $repas): void
    {
        $hour = (int) $repas->getDateConsommation()->format('H');
        
        // Only care if consumed strictly after 16:00 (16h00)
        if ($hour < 16) {
            return;
        }

        $excitants = [];
        foreach ($repas->getAliments() as $aliment) {
            if ($aliment->isEstExcitant()) {
                $excitants[] = $aliment->getNomAliment();
            }
        }

        if (empty($excitants)) {
            return;
        }

        $user = $repas->getUtilisateur();
        
        // Check if an alert was already logged today (anti-spam 1 per day rule limit)
        $today = new \DateTime();
        $today->setTime(0, 0, 0);
        
        $todaysAlertsCount = $this->alerteRepository->createQueryBuilder('a')
            ->select('count(a.id)')
            ->where('a.utilisateur = :user')
            ->andWhere('a.dateAlerte >= :today')
            ->setParameter('user', $user)
            ->setParameter('today', $today)
            ->getQuery()
            ->getSingleScalarResult();

        if ($todaysAlertsCount > 0) {
            // Anti-spam: We already alerted today for this user.
            // TEMPORARILY DISABLED FOR TESTING
            // return;
        }

        // Tendance Hebdomadaire (more than 2 times this week)
        $lastWeek = (new \DateTime())->modify('-7 days');
        $weeklyAlertsCount = $this->alerteRepository->createQueryBuilder('a')
            ->select('count(a.id)')
            ->where('a.utilisateur = :user')
            ->andWhere('a.dateAlerte >= :week')
            ->setParameter('user', $user)
            ->setParameter('week', $lastWeek)
            ->getQuery()
            ->getSingleScalarResult();

        $tendanceMsg = "";
        $criticite = 'JAUNE';
        if ($weeklyAlertsCount >= 2) {
            $criticite = 'ROUGE';
            $tendanceMsg = "\n⚠️ Tendance critique: 3e fois cette semaine.";
        }

        $excitantsStr = implode(', ', $excitants);
        $timeStr = $repas->getDateConsommation()->format('H:i');
        
        // Log to database
        $alerte = new Alerte();
        $alerte->setUtilisateur($user);
        $alerte->setType('EXCITANT_TARDIF');
        $alerte->setDateAlerte(new \DateTime());
        $alerte->setCriticite($criticite);
        $alerte->setMessage(sprintf(
            "Consommation d'excitant(s) tardive (%s) à %s.",
            $excitantsStr,
            $timeStr
        ));
        $alerte->setRepas($repas);

        $this->em->persist($alerte);
        // Flush happens outside or we do it here if standalone.
        // Assuming the controller does a final flush, but to be sure the ID is generated:
        $this->em->flush();

        // Send SMS
        if ($this->twilioClient && $this->coachPhoneNumber) {
            $smsBody = sprintf(
                "🚨 Alerte ChronoNutrition\nPatient: %s\nAliments: %s\nHeure: %s%s\n💡 Conseil: Suggérer un repas léger ou tisane relaxante ce soir.",
                $user->getNomComplet(),
                $excitantsStr,
                $timeStr,
                $tendanceMsg
            );

            try {
                $this->twilioClient->messages->create(
                    $this->coachPhoneNumber,
                    [
                        'from' => $this->twilioPhoneNumber,
                        'body' => $smsBody
                    ]
                );
            } catch (\Exception $e) {
                // Pour voir l'erreur Twilio à l'écran :
                throw $e;
            }
        }
    }
}
