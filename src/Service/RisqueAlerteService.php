<?php

namespace App\Service;

use App\Entity\SeanceSport;
use App\Repository\SeanceSportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RisqueAlerteService
{
    public function __construct(
        private SeanceSportRepository $seanceRepo,
        private EntityManagerInterface $em,
        private CaloriePredictionService $mlService,
        private HttpClientInterface $httpClient
    ) {}

    // =========================================================================
    // ════════════  Vérifie toutes les séances actives du jour  ═══════════════
    // =========================================================================

    /**
     * @return array<int, array<string, mixed>>
     */
    public function verifierAlertes(): array
    {
        $alertes    = [];
        $maintenant = new \DateTime();

        // Récupère toutes les séances d'aujourd'hui démarrées
        $seances = $this->seanceRepo->findSeancesActivesAujourdhui();

        foreach ($seances as $seance) {
            if ($seance->getHeureDebutReelle() === null) continue;
            if ($seance->isAlerteEnvoyee()) continue;

            // ✅ CORRECTION — calcul précis avec timestamps (évite le bug diff())
            $secondesEcoulees = $maintenant->getTimestamp() - $seance->getHeureDebutReelle()->getTimestamp();
            $minutesEcoulees  = (int)($secondesEcoulees / 60);
            $depassement      = $minutesEcoulees - (int)$seance->getDureeMinutes();

            // On alerte seulement si dépassement >= 0
            if ($depassement < 0) continue;

            // ── Appel modèle ML pour calories prédites ──
            $caloriesPredites = null;
            $profil = $seance->getUtilisateur()?->getProfilSante();
            if ($profil && $profil->getAge() && $profil->getPoids()) {
                $firstExercice = $seance->getExercices()->first();
                if ($firstExercice) {
                    try {
                        $mlResult = $this->mlService->predict(
                            ['age' => $profil->getAge(), 'poids' => $profil->getPoids()],
                            [
                                'intensite'          => $firstExercice->getIntensite()->value,
                                'calorie_par_minute' => $firstExercice->getCaloriesParMinute(),
                                'duree'              => $seance->getDureeMinutes(),
                            ]
                        );
                        if (isset($mlResult['calories_predites'])) {
                            $caloriesPredites = (float) $mlResult['calories_predites'];
                        }
                    } catch (\Exception $e) {
                        // ML non disponible — on continue sans calories
                        $caloriesPredites = null;
                    }
                }
            }

            // ── Score de risque multi-facteurs ──
            $score  = $seance->calculerScoreRisque($caloriesPredites);
            $niveau = $seance->getNiveauAlerte($caloriesPredites);

            // On n'alerte pas si tout est normal
            if ($niveau === 'normal') continue;

            $alertes[] = [
                'seance_id'         => $seance->getId(),
                'nom'               => $seance->getNomSeance(),
                'utilisateur'       => $seance->getUtilisateur()?->getNomComplet() ?? 'Inconnu',
                'duree_prevue'      => $seance->getDureeMinutes(),
                'minutes_ecoulees'  => $minutesEcoulees,
                'depassement'       => $depassement,
                'score'             => $score,
                'niveau'            => $niveau,
                'calories_predites' => $caloriesPredites ? round($caloriesPredites) : null,
                'message'           => $this->genererMessage($seance, $score, $niveau, $depassement, $caloriesPredites),
            ];

            // NOTE : on ne marque pas alerteEnvoyee pour que l'alerte reste visible
            // $seance->setAlerteEnvoyee(true);
            // $this->em->persist($seance);
        }

        // $this->em->flush();

        return $alertes;
    }

    // =========================================================================
    // ════════════  Démarre une séance (enregistre l'heure réelle)  ═══════════
    // =========================================================================

    public function demarrerSeance(SeanceSport $seance): void
    {
        $seance->setHeureDebutReelle(new \DateTime());
        $seance->setAlerteEnvoyee(false);
        $this->em->persist($seance);
        $this->em->flush();
    }

    // =========================================================================
    // ════════════  Génère un message d'alerte intelligent  ═══════════════════
    // =========================================================================

    private function genererMessage(
        SeanceSport $seance,
        int $score,
        string $niveau,
        int $depassement,
        ?float $caloriesPredites
    ): string {
        $nom    = $seance->getNomSeance();
        $user   = $seance->getUtilisateur()?->getNomComplet() ?? 'l\'utilisateur';
        $profil = $seance->getUtilisateur()?->getProfilSante();
        $age    = $profil?->getAge() ?? 0;

        if ($niveau === 'critique') {
            $msg = "🚨 CRITIQUE — Séance \"{$nom}\" de {$user} dépasse de {$depassement} min";
            if ($caloriesPredites) $msg .= " · {$caloriesPredites} kcal prédites";
            if ($age > 50) $msg .= " · ⚠️ Profil senior ({$age} ans)";
            $msg .= " · Score risque : {$score}/100";
        } else {
            $msg = "⚠️ ATTENTION — Séance \"{$nom}\" de {$user} dépasse de {$depassement} min";
            if ($caloriesPredites) $msg .= " · {$caloriesPredites} kcal prédites";
            $msg .= " · Score risque : {$score}/100";
        }

        return $msg;
    }
}
