<?php

namespace App\Controller;

use App\Entity\SeanceSport;
use App\Form\SeanceSportType;
use App\Repository\SeanceSportRepository;
use App\Repository\ExerciceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/seance/sport')]
final class SeanceSportController extends AbstractController
{
    // =========================================================================
    // ════════════════════  CONSTANTES MÉDAILLES  ══════════════════════════════
    // =========================================================================

    private const MEDAILLES = [
        'or'       => '🥇 Or',
        'argent'   => '🥈 Argent',
        'bronze'   => '🥉 Bronze',
        'feu'      => '🔥 Feu',
        'marathon' => '⏱️ Marathon',
        'force'    => '💪 Force',
    ];

    private const DEFIS = [
        [
            'id'          => 'champion',
            'titre'       => 'Champion de la semaine',
            'description' => '7 séances cette semaine',
            'icone'       => '🥇',
            'medaille'    => '🥇 Or',
            'condition'   => 'seances_semaine',
            'valeur'      => 7,
            'couleur'     => 'gold',
        ],
        [
            'id'          => 'assidu',
            'titre'       => 'Athlète assidu',
            'description' => '5 séances cette semaine',
            'icone'       => '🥈',
            'medaille'    => '🥈 Argent',
            'condition'   => 'seances_semaine',
            'valeur'      => 5,
            'couleur'     => 'silver',
        ],
        [
            'id'          => 'regulier',
            'titre'       => 'Régularité',
            'description' => '3 séances cette semaine',
            'icone'       => '🥉',
            'medaille'    => '🥉 Bronze',
            'condition'   => 'seances_semaine',
            'valeur'      => 3,
            'couleur'     => 'bronze',
        ],
        [
            'id'          => 'bruleur',
            'titre'       => 'Brûleur de calories',
            'description' => 'Une séance avec +500 kcal brûlées',
            'icone'       => '🔥',
            'medaille'    => '🔥 Feu',
            'condition'   => 'calories_seance',
            'valeur'      => 500,
            'couleur'     => 'fire',
        ],
        [
            'id'          => 'marathonien',
            'titre'       => 'Marathonien',
            'description' => 'Une séance de plus de 90 minutes',
            'icone'       => '⏱️',
            'medaille'    => '⏱️ Marathon',
            'condition'   => 'duree_seance',
            'valeur'      => 90,
            'couleur'     => 'teal',
        ],
        [
            'id'          => 'intensif',
            'titre'       => 'Intensité maximale',
            'description' => '3 séances à intensité élevée cette semaine',
            'icone'       => '💪',
            'medaille'    => '💪 Force',
            'condition'   => 'intensite_semaine',
            'valeur'      => 3,
            'couleur'     => 'purple',
        ],
    ];

    // =========================================================================
    // ════════════════════  INDEX  ═════════════════════════════════════════════
    // =========================================================================

    #[Route('', name: 'app_seance_sport_index', methods: ['GET'])]
    public function index(SeanceSportRepository $seanceSportRepository): Response
    {
        return $this->render('seance_sport/index.html.twig', [
            'seance_sports' => $seanceSportRepository->findAll(),
        ]);
    }

    // =========================================================================
    // ════════════════════  NEW — avec attribution médaille auto  ══════════════
    // =========================================================================

    #[Route('/new', name: 'app_seance_sport_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface $httpClient
    ): Response {
        $seanceSport = new SeanceSport();
        $seanceSport->setUtilisateur($this->getUser());
        $form = $this->createForm(SeanceSportType::class, $seanceSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seanceSport);
            $entityManager->flush();

            // ── Attribution médaille automatique ──────────────────────────────
            $medaille = $this->evaluerEtAttribuerMedaille(
                $seanceSport, $seanceSportRepository, $entityManager, $httpClient
            );

            if ($medaille) {
                $this->addFlash('medaille', $medaille);
                $this->addFlash('success', "🏅 Félicitations ! Vous avez obtenu la médaille : {$medaille['medaille']}");
            } else {
                $this->addFlash('success', 'Séance créée avec succès !');
            }

            return $this->redirectToRoute('app_seance_sport_defis', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seance_sport/new.html.twig', [
            'seance_sport' => $seanceSport,
            'form'         => $form,
        ]);
    }

    // =========================================================================
    // ════════════════════  DÉFIS HEBDOMADAIRES  ═══════════════════════════════
    // =========================================================================

    #[Route('/defis', name: 'app_seance_sport_defis', methods: ['GET'])]
    public function defis(
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface   $httpClient
    ): Response {
        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');

        $toutesSeances  = $seanceSportRepository->findAll();
        $seancesSemaine = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        );

        $nbSeancesSemaine = count($seancesSemaine);

        // Calories max d'une séance cette semaine
        $maxCaloriesSeance = 0;
        $maxDureeSeance    = 0;
        $nbIntensiteElevee = 0;

        foreach ($seancesSemaine as $s) {
            $cal = $s->getTotalCaloriesBrulees();
            if ($cal > $maxCaloriesSeance) $maxCaloriesSeance = $cal;
            if ($s->getDureeMinutes() > $maxDureeSeance) $maxDureeSeance = $s->getDureeMinutes();

            // Vérifier intensité élevée via exercices
            foreach ($s->getExercices() as $e) {
                if ($e->getIntensite()->value === 'eleve') {
                    $nbIntensiteElevee++;
                    break; // 1 par séance
                }
            }
        }

        // ── Calcul progression de chaque défi ────────────────────────────────
        $defisAvecProgression = [];
        foreach (self::DEFIS as $defi) {
            $progression = 0;
            $valeurActuelle = 0;

            switch ($defi['condition']) {
                case 'seances_semaine':
                    $valeurActuelle = $nbSeancesSemaine;
                    $progression    = min(100, round(($nbSeancesSemaine / $defi['valeur']) * 100));
                    break;
                case 'calories_seance':
                    $valeurActuelle = round($maxCaloriesSeance);
                    $progression    = min(100, round(($maxCaloriesSeance / $defi['valeur']) * 100));
                    break;
                case 'duree_seance':
                    $valeurActuelle = $maxDureeSeance;
                    $progression    = min(100, round(($maxDureeSeance / $defi['valeur']) * 100));
                    break;
                case 'intensite_semaine':
                    $valeurActuelle = $nbIntensiteElevee;
                    $progression    = min(100, round(($nbIntensiteElevee / $defi['valeur']) * 100));
                    break;
            }

            $atteint = $progression >= 100;

            $defisAvecProgression[] = array_merge($defi, [
                'progression'    => $progression,
                'valeurActuelle' => $valeurActuelle,
                'atteint'        => $atteint,
            ]);
        }

        // ── Médailles obtenues cette semaine ──────────────────────────────────
        $medaillesObtenues = [];
        foreach ($seancesSemaine as $s) {
            if ($s->getMedailleObtenue()) {
                $medaillesObtenues[] = $s->getMedailleObtenue();
            }
        }
        $medaillesObtenues = array_unique($medaillesObtenues);

        // ── Message Groq si au moins un défi atteint ─────────────────────────
        $messageGroq = null;
        $defisAtteints = array_filter($defisAvecProgression, fn($d) => $d['atteint']);
        if (!empty($defisAtteints)) {
            $messageGroq = $this->getMessageFelicitationsGroq($httpClient, [
                'defisAtteints'    => array_values($defisAtteints),
                'nbSeancesSemaine' => $nbSeancesSemaine,
                'medailles'        => $medaillesObtenues,
            ]);
        }

        return $this->render('seance_sport/defis.html.twig', [
            'defis'            => $defisAvecProgression,
            'nbSeancesSemaine' => $nbSeancesSemaine,
            'medaillesObtenues'=> $medaillesObtenues,
            'messageGroq'      => $messageGroq,
            'debutSemaine'     => $debutSemaine,
            'finSemaine'       => $finSemaine,
        ]);
    }

    // =========================================================================
    // ════════════════  LOGIQUE MÉDAILLE — Attribution auto  ═══════════════════
    // =========================================================================

    private function evaluerEtAttribuerMedaille(
        SeanceSport           $seanceSport,
        SeanceSportRepository $repo,
        EntityManagerInterface $em,
        HttpClientInterface   $httpClient
    ): ?array {
        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');

        $toutesSeances  = $repo->findAll();
        $seancesSemaine = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        );
        $nbSemaine = count($seancesSemaine);

        $medailleChoisie = null;

        // Priorité : la meilleure médaille gagne
        if ($nbSemaine >= 7) {
            $medailleChoisie = ['medaille' => '🥇 Or',       'defi' => 'Champion de la semaine'];
        } elseif ($nbSemaine >= 5) {
            $medailleChoisie = ['medaille' => '🥈 Argent',   'defi' => 'Athlète assidu'];
        } elseif ($nbSemaine >= 3) {
            $medailleChoisie = ['medaille' => '🥉 Bronze',   'defi' => 'Régularité'];
        } elseif ($seanceSport->getDureeMinutes() >= 90) {
            $medailleChoisie = ['medaille' => '⏱️ Marathon', 'defi' => 'Marathonien'];
        } elseif ($seanceSport->getTotalCaloriesBrulees() >= 500) {
            $medailleChoisie = ['medaille' => '🔥 Feu',      'defi' => 'Brûleur de calories'];
        } else {
            // Vérifier intensité élevée
            $nbIntensiteElevee = 0;
            foreach ($seancesSemaine as $s) {
                foreach ($s->getExercices() as $e) {
                    if ($e->getIntensite()->value === 'eleve') { $nbIntensiteElevee++; break; }
                }
            }
            if ($nbIntensiteElevee >= 3) {
                $medailleChoisie = ['medaille' => '💪 Force', 'defi' => 'Intensité maximale'];
            }
        }

        if ($medailleChoisie) {
            $seanceSport->setMedailleObtenue($medailleChoisie['medaille']);
            $em->flush();
        }

        return $medailleChoisie;
    }

    // =========================================================================
    // ════════════  GROQ — Message félicitations personnalisé  ════════════════
    // =========================================================================

    private function getMessageFelicitationsGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return null;

        $defisNoms   = implode(', ', array_column($data['defisAtteints'], 'titre'));
        $medaillesNoms = implode(', ', $data['medailles']);

        $prompt = sprintf(
            "Tu es un coach sportif très enthousiaste. Un sportif vient d'accomplir ces défis cette semaine :
- Défis réussis : %s
- Médailles obtenues : %s
- Nombre de séances cette semaine : %d

Génère un message de félicitations court (3-4 phrases max), très motivant et personnalisé en français.
Utilise des emojis sportifs. Termine par un encouragement pour la semaine prochaine.",
            $defisNoms,
            $medaillesNoms ?: 'aucune encore',
            $data['nbSeancesSemaine']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => [
                    'model'       => 'llama-3.3-70b-versatile',
                    'messages'    => [['role' => 'user', 'content' => $prompt]],
                    'max_tokens'  => 200,
                    'temperature' => 0.8,
                ],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }

    // =========================================================================
    // ════════════════════  DEBUG GROQ  ════════════════════════════════════════
    // =========================================================================

    #[Route('/debug-groq', name: 'debug_groq', methods: ['GET'])]
    public function debugGroq(): Response
    {
        $serverKey = $_SERVER['GROQ_API_KEY'] ?? 'absent';
        $envKey    = $_ENV['GROQ_API_KEY']    ?? 'absent';
        $maskKey   = fn($k) => $k !== 'absent' ? substr($k, 0, 8).'...' : 'absent';
        dd([
            'SERVER GROQ_API_KEY' => $maskKey($serverKey),
            'ENV GROQ_API_KEY'    => $maskKey($envKey),
            'Clé trouvée ?'       => ($serverKey !== 'absent' || $envKey !== 'absent') ? '✅ OUI' : '❌ NON',
        ]);
    }

    // =========================================================================
    // ══════════════════  PRÉDICTION OBJECTIF — Coach  ═════════════════════════
    // =========================================================================

    #[Route('/objectif', name: 'app_seance_sport_objectif', methods: ['GET', 'POST'])]
    public function objectif(
        Request               $request,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface   $httpClient
    ): Response {
        $prediction    = null;
        $toutesSeances = $seanceSportRepository->findAll();
        $totalSeances  = count($toutesSeances);
        $dureeTotal    = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances));
        $dureeMoyenne  = $totalSeances > 0 ? round($dureeTotal / $totalSeances) : 0;

        $caloriesTotales = 0.0;
        foreach ($toutesSeances as $seance) {
            $caloriesTotales += $seance->getTotalCaloriesBrulees();
        }
        $caloriesTotales = round($caloriesTotales, 2);

        $now          = new \DateTime();
        $debutMois    = (clone $now)->modify('first day of this month');
        $finMois      = (clone $now)->modify('last day of this month');
        $seanceCeMois = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutMois && $s->getDateSeance() <= $finMois
        ));

        if ($request->isMethod('POST')) {
            $prediction = $this->getPredictionGroq($httpClient, [
                'totalSeances'    => $totalSeances,
                'seanceCeMois'    => $seanceCeMois,
                'dureeMoyenne'    => $dureeMoyenne,
                'caloriesTotales' => $caloriesTotales,
                'objectif'        => $request->request->get('objectif', ''),
                'seancesVoulues'  => (int) $request->request->get('seances_voulues', 5),
                'dureeVoulue'     => (int) $request->request->get('duree_voulue', 60),
                'caloriesVoulues' => (int) $request->request->get('calories_voulues', 500),
                'delai'           => $request->request->get('delai', '1 mois'),
            ]);
        }

        return $this->render('seance_sport/objectif.html.twig', [
            'prediction'      => $prediction,
            'totalSeances'    => $totalSeances,
            'seanceCeMois'    => $seanceCeMois,
            'dureeMoyenne'    => $dureeMoyenne,
            'caloriesTotales' => $caloriesTotales,
        ]);
    }

    // =========================================================================
    // ════════════════════  SHOW / EDIT / DELETE  ══════════════════════════════
    // =========================================================================

    #[Route('/{id}', name: 'app_seance_sport_show', methods: ['GET'])]
    public function show(SeanceSport $seanceSport): Response
    {
        return $this->render('seance_sport/show.html.twig', [
            'seance_sport' => $seanceSport,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_seance_sport_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        SeanceSport $seanceSport,
        EntityManagerInterface $entityManager,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface $httpClient
    ): Response {
        $form = $this->createForm(SeanceSportType::class, $seanceSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Réévaluer médaille après modification
            $this->evaluerEtAttribuerMedaille($seanceSport, $seanceSportRepository, $entityManager, $httpClient);

            $this->addFlash('success', 'Séance modifiée avec succès !');
            return $this->redirectToRoute('app_seance_sport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seance_sport/edit.html.twig', [
            'seance_sport' => $seanceSport,
            'form'         => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_seance_sport_delete', methods: ['POST'])]
    public function delete(Request $request, SeanceSport $seanceSport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seanceSport->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($seanceSport);
            $entityManager->flush();
            $this->addFlash('success', 'Séance supprimée !');
        }
        return $this->redirectToRoute('app_seance_sport_index', [], Response::HTTP_SEE_OTHER);
    }

    // =========================================================================
    // ════════════════════  STATISTIQUES COACH  ════════════════════════════════
    // =========================================================================

    #[Route('/statistiques/coach', name: 'app_seance_sport_stats', methods: ['GET'])]
    public function statistiques(
        SeanceSportRepository $seanceSportRepository,
        ExerciceRepository    $exerciceRepository,
        HttpClientInterface   $httpClient
    ): Response {
        $toutesSeances    = $seanceSportRepository->findAll();
        $totalSeances     = count($toutesSeances);
        $dureeTotal       = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances));
        $dureeMoyenne     = $totalSeances > 0 ? round($dureeTotal / $totalSeances) : 0;
        $durees           = array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances);
        $seancePlusLongue = !empty($durees) ? max($durees) : 0;
        $seancePlusCourte = !empty($durees) ? min($durees) : 0;
        $totalMedailles   = count(array_filter($toutesSeances, fn($s) => $s->getMedailleObtenue() !== null));

        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week');
        $finSemaine   = (clone $now)->modify('sunday this week');
        $debutMois    = (clone $now)->modify('first day of this month');
        $finMois      = (clone $now)->modify('last day of this month');

        $seanceCetteSemaine = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        ));
        $seanceCeMois = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutMois && $s->getDateSeance() <= $finMois
        ));

        $userCount = [];
        foreach ($toutesSeances as $s) {
            $nom = $s->getUtilisateur() ? $s->getUtilisateur()->getId() : 'Inconnu';
            $userCount[$nom] = ($userCount[$nom] ?? 0) + 1;
        }
        arsort($userCount);
        $userLePlusActif = null;
        if (!empty($userCount)) {
            $id = array_key_first($userCount);
            foreach ($toutesSeances as $s) {
                if ($s->getUtilisateur() && $s->getUtilisateur()->getId() == $id) {
                    $userLePlusActif = $s->getUtilisateur();
                    break;
                }
            }
        }

        $caloriesTotales = 0.0;
        foreach ($toutesSeances as $seance) {
            $caloriesTotales += $seance->getTotalCaloriesBrulees();
        }
        $caloriesTotales = round($caloriesTotales, 2);

        $seancesParSemaine    = $seanceSportRepository->getSeancesParSemaine();
        $dureeParMois         = $seanceSportRepository->getDureeParMois();
        $repartitionIntensite = $exerciceRepository->getRepartitionParIntensiteGlobal();
        $top5Exercices        = $exerciceRepository->getTop5ExercicesGlobal();

        $conseilIA = $this->getConseilGroqCoach($httpClient, [
            'totalSeances'       => $totalSeances,
            'seanceCetteSemaine' => $seanceCetteSemaine,
            'seanceCeMois'       => $seanceCeMois,
            'dureeTotal'         => $dureeTotal,
            'dureeMoyenne'       => $dureeMoyenne,
            'caloriesTotales'    => $caloriesTotales,
            'totalMedailles'     => $totalMedailles,
        ]);

        return $this->render('seance_sport/statistiques.html.twig', [
            'totalSeances'            => $totalSeances,
            'dureeTotal'              => $dureeTotal,
            'dureeMoyenne'            => $dureeMoyenne,
            'seancePlusLongue'        => $seancePlusLongue,
            'seancePlusCourte'        => $seancePlusCourte,
            'totalMedailles'          => $totalMedailles,
            'seanceCetteSemaine'      => $seanceCetteSemaine,
            'seanceCeMois'            => $seanceCeMois,
            'caloriesTotales'         => $caloriesTotales,
            'userLePlusActif'         => $userLePlusActif,
            'seancesParSemaineLabels' => json_encode($seancesParSemaine['labels']),
            'seancesParSemaineData'   => json_encode($seancesParSemaine['data']),
            'dureeParMoisLabels'      => json_encode($dureeParMois['labels']),
            'dureeParMoisData'        => json_encode($dureeParMois['data']),
            'intensiteLabels'         => json_encode($repartitionIntensite['labels']),
            'intensiteData'           => json_encode($repartitionIntensite['data']),
            'top5Labels'              => json_encode($top5Exercices['labels']),
            'top5Data'                => json_encode($top5Exercices['data']),
            'conseilIA'               => $conseilIA,
        ]);
    }

    // =========================================================================
    // ══════════════════  GROQ — Prédiction Objectif  ══════════════════════════
    // =========================================================================

    private function getPredictionGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Clé GROQ_API_KEY manquante dans .env";

        $prompt = sprintf(
            "Tu es un coach sportif expert et analyste de données. Voici la situation RÉELLE du groupe :

📊 DONNÉES ACTUELLES :
- Total séances effectuées : %d
- Séances ce mois-ci : %d
- Durée moyenne par séance : %d minutes
- Calories totales brûlées : %.1f kcal

🎯 OBJECTIF SOUHAITÉ :
- Objectif principal : %s
- Séances souhaitées par semaine : %d
- Durée souhaitée par séance : %d minutes
- Calories à brûler par séance : %d kcal
- Délai : %s

Génère un plan professionnel structuré en français avec :
1. 📈 Analyse de l'écart actuel vs objectif
2. 🗓️ Plan semaine par semaine
3. ⚡ 3 actions concrètes dès cette semaine
4. ⚠️ Les risques à éviter
5. 🏆 Indicateurs de succès",
            $data['totalSeances'], $data['seanceCeMois'], $data['dureeMoyenne'],
            $data['caloriesTotales'], $data['objectif'], $data['seancesVoulues'],
            $data['dureeVoulue'], $data['caloriesVoulues'], $data['delai']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => ['model' => 'llama-3.3-70b-versatile', 'messages' => [['role' => 'user', 'content' => $prompt]], 'max_tokens' => 1000, 'temperature' => 0.7],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? "Analyse indisponible.";
        } catch (\Exception $e) {
            return "❌ Erreur Groq : ".$e->getMessage();
        }
    }

    // =========================================================================
    // ════════════════════  GROQ IA — Conseils Coach  ══════════════════════════
    // =========================================================================

    private function getConseilGroqCoach(HttpClientInterface $httpClient, array $stats): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Ajoute GROQ_API_KEY dans ton .env pour activer les conseils IA !";

        $prompt = sprintf(
            "Tu es un coach sportif expert analysant les statistiques globales.
- Total séances : %d | Cette semaine : %d | Ce mois : %d
- Durée totale : %d min | Moyenne : %d min/séance
- Calories totales : %.1f kcal | Médailles attribuées : %d

Donne 3 conseils professionnels en français. Commence chaque conseil par un emoji. Max 2 phrases par conseil.",
            $stats['totalSeances'], $stats['seanceCetteSemaine'], $stats['seanceCeMois'],
            $stats['dureeTotal'], $stats['dureeMoyenne'], $stats['caloriesTotales'], $stats['totalMedailles']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => ['model' => 'llama-3.3-70b-versatile', 'messages' => [['role' => 'user', 'content' => $prompt]], 'max_tokens' => 400, 'temperature' => 0.7],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? "Continuez le bon travail ! 💪";
        } catch (\Exception $e) {
            return "💪 Erreur Groq : ".$e->getMessage();
        }
    }
}