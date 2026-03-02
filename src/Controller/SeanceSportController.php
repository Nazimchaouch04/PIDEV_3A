<?php

namespace App\Controller;

use App\Entity\SeanceSport;
use App\Entity\Utilisateur;
use App\Form\SeanceSportType;
use App\Repository\SeanceSportRepository;
use App\Repository\ExerciceRepository;
use App\Service\RisqueAlerteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        /** @var Utilisateur $user */
        $user = $this->getUser();

        return $this->render('seance_sport/index.html.twig', [
            // ✅ CORRIGÉ : findAll() → findByUtilisateur() — uniquement les séances de l'utilisateur connecté
            'seance_sports' => $seanceSportRepository->findByUtilisateur($user),
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

        /** @var Utilisateur $user */
        $user = $this->getUser();
        $seanceSport->setUtilisateur($user);

        $form = $this->createForm(SeanceSportType::class, $seanceSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seanceSport);
            $entityManager->flush();

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
        /** @var Utilisateur $user */
        $user = $this->getUser();

        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');

        // ✅ CORRIGÉ : findAll() → findByUtilisateur()
        $toutesSeances  = $seanceSportRepository->findByUtilisateur($user);
        $seancesSemaine = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        );

        $nbSeancesSemaine  = count($seancesSemaine);
        $maxCaloriesSeance = 0;
        $maxDureeSeance    = 0;
        $nbIntensiteElevee = 0;

        foreach ($seancesSemaine as $s) {
            $cal = $s->getTotalCaloriesBrulees();
            if ($cal > $maxCaloriesSeance) $maxCaloriesSeance = $cal;
            if ($s->getDureeMinutes() > $maxDureeSeance) $maxDureeSeance = $s->getDureeMinutes();
            foreach ($s->getExercices() as $e) {
                if ($e->getIntensite()->value === 'elevee') { $nbIntensiteElevee++; break; }
            }
        }

        $defisAvecProgression = [];
        foreach (self::DEFIS as $defi) {
            $progression    = 0;
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
            $defisAvecProgression[] = array_merge($defi, [
                'progression'    => $progression,
                'valeurActuelle' => $valeurActuelle,
                'atteint'        => $progression >= 100,
            ]);
        }

        $medaillesObtenues = [];
        foreach ($seancesSemaine as $s) {
            if ($s->getMedailleObtenue()) $medaillesObtenues[] = $s->getMedailleObtenue();
        }
        $medaillesObtenues = array_unique($medaillesObtenues);

        $messageGroq   = null;
        $defisAtteints = array_filter($defisAvecProgression, fn($d) => $d['atteint']);
        if (!empty($defisAtteints)) {
            $messageGroq = $this->getMessageFelicitationsGroq($httpClient, [
                'defisAtteints'    => array_values($defisAtteints),
                'nbSeancesSemaine' => $nbSeancesSemaine,
                'medailles'        => $medaillesObtenues,
            ]);
        }

        return $this->render('seance_sport/defis.html.twig', [
            'defis'             => $defisAvecProgression,
            'nbSeancesSemaine'  => $nbSeancesSemaine,
            'medaillesObtenues' => $medaillesObtenues,
            'messageGroq'       => $messageGroq,
            'debutSemaine'      => $debutSemaine,
            'finSemaine'        => $finSemaine,
        ]);
    }

    // =========================================================================
    // ════════════════  LOGIQUE MÉDAILLE — Attribution auto  ═══════════════════
    // =========================================================================

    /**
     * @return array<string, string>|null
     */
    private function evaluerEtAttribuerMedaille(
        SeanceSport            $seanceSport,
        SeanceSportRepository  $repo,
        EntityManagerInterface $em,
        HttpClientInterface    $httpClient
    ): ?array {
        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');

        // ✅ CORRIGÉ : findAll() → findByUtilisateur() avec l'objet Utilisateur
        $utilisateur    = $seanceSport->getUtilisateur();
        $toutesSeances  = $repo->findByUtilisateur($utilisateur);
        $seancesSemaine = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        );
        $nbSemaine = count($seancesSemaine);

        $medailleChoisie = null;
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
            $nbIntensiteElevee = 0;
            foreach ($seancesSemaine as $s) {
                foreach ($s->getExercices() as $e) {
                    if ($e->getIntensite()->value === 'elevee') { $nbIntensiteElevee++; break; }
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

    /**
     * @param array<string, mixed> $data
     */
    private function getMessageFelicitationsGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return '🏅 Bravo ! Vous avez relevé vos défis cette semaine, continuez sur cette lancée !';

        $defisNoms     = implode(', ', array_column($data['defisAtteints'], 'titre'));
        $medaillesNoms = implode(', ', $data['medailles']);

        $prompt = sprintf(
            "Tu es un coach sportif très enthousiaste. Un sportif vient d'accomplir ces défis cette semaine :
- Défis réussis : %s
- Médailles obtenues : %s
- Nombre de séances cette semaine : %d
Génère un message de félicitations court (3-4 phrases max), très motivant et personnalisé en français.
Utilise des emojis sportifs. Termine par un encouragement pour la semaine prochaine.",
            $defisNoms, $medaillesNoms ?: 'aucune encore', $data['nbSeancesSemaine']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => ['model' => 'llama-3.3-70b-versatile', 'messages' => [['role' => 'user', 'content' => $prompt]], 'max_tokens' => 200, 'temperature' => 0.8],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? '🏅 Félicitations pour tes défis cette semaine !';
        } catch (\Exception $e) {
            return '💪 Excellent travail cette semaine ! Continue sur cette dynamique !';
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
        /** @var Utilisateur $user */
        $user = $this->getUser();

        $prediction = null;

        // ✅ CORRIGÉ : findAll() → findByUtilisateur()
        $toutesSeances   = $seanceSportRepository->findByUtilisateur($user);
        $totalSeances    = count($toutesSeances);
        $dureeTotal      = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances));
        $dureeMoyenne    = $totalSeances > 0 ? round($dureeTotal / $totalSeances) : 0;
        $caloriesTotales = 0.0;
        foreach ($toutesSeances as $seance) { $caloriesTotales += $seance->getTotalCaloriesBrulees(); }
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
    // ═══════════  🚨 ALERTE INTELLIGENTE — Vérification temps réel  ══════════
    // =========================================================================

    #[Route('/alertes/check', name: 'app_seance_alertes_check', methods: ['GET'])]
    public function checkAlertes(RisqueAlerteService $alerteService): JsonResponse
    {
        $alertes = $alerteService->verifierAlertes();
        return $this->json([
            'alertes' => $alertes,
            'count'   => count($alertes),
        ]);
    }

    // =========================================================================
    // ═══════════  ▶ DÉMARRER une séance — enregistre heure réelle  ═══════════
    // =========================================================================

    #[Route('/{id}/demarrer', name: 'app_seance_sport_demarrer', methods: ['POST'])]
    public function demarrer(
        SeanceSport         $seanceSport,
        RisqueAlerteService $alerteService
    ): JsonResponse {
        $alerteService->demarrerSeance($seanceSport);
        return $this->json([
            'status'  => 'success',
            'message' => 'Séance démarrée à ' . (new \DateTime())->format('H:i'),
        ]);
    }

    // =========================================================================
    // ═══════════  ✅ TERMINER une séance depuis l'alerte  ════════════════════
    // ✅ NOUVEAU — Stoppe l'alerte + son définitivement via DB
    // =========================================================================

    #[Route('/{id}/terminer', name: 'app_seance_sport_terminer', methods: ['POST'])]
    public function terminer(
        SeanceSport         $seanceSport,
        RisqueAlerteService $alerteService
    ): JsonResponse {
        $alerteService->terminerSeance($seanceSport);
        return $this->json([
            'status'  => 'success',
            'message' => 'Séance terminée avec succès',
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
        Request                $request,
        SeanceSport            $seanceSport,
        EntityManagerInterface $entityManager,
        SeanceSportRepository  $seanceSportRepository,
        HttpClientInterface    $httpClient
    ): Response {
        $form = $this->createForm(SeanceSportType::class, $seanceSport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
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
        /** @var Utilisateur $user */
        $user = $this->getUser();

        // ✅ CORRIGÉ : findAll() → findByUtilisateur()
        $toutesSeances    = $seanceSportRepository->findByUtilisateur($user);
        $totalSeances     = count($toutesSeances);
        $dureeTotal       = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances));
        $dureeMoyenne     = $totalSeances > 0 ? round($dureeTotal / $totalSeances) : 0;
        $durees           = array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances);
        $seancePlusLongue = !empty($durees) ? max($durees) : 0;
        $seancePlusCourte = !empty($durees) ? min($durees) : 0;
        $totalMedailles   = count(array_filter($toutesSeances, fn($s) => $s->getMedailleObtenue() !== null));

        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');
        $debutMois    = (clone $now)->modify('first day of this month 00:00:00');
        $finMois      = (clone $now)->modify('last day of this month 23:59:59');

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
        foreach ($toutesSeances as $seance) { $caloriesTotales += $seance->getTotalCaloriesBrulees(); }
        $caloriesTotales = round($caloriesTotales, 2);

        // =====================================================================
        // 📈 ANALYSE DE PROGRESSION — Semaine courante vs semaine précédente
        // =====================================================================

        $debutSemPrecedente = (clone $debutSemaine)->modify('-7 days');
        $finSemPrecedente   = (clone $finSemaine)->modify('-7 days');

        $seancesSemCourante   = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        );
        $seancesSemPrecedente = array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemPrecedente && $s->getDateSeance() <= $finSemPrecedente
        );

        $dureeSemCourante   = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $seancesSemCourante));
        $dureeSemPrecedente = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $seancesSemPrecedente));

        $calSemCourante = 0.0;
        foreach ($seancesSemCourante as $s) { $calSemCourante += $s->getTotalCaloriesBrulees(); }
        $calSemCourante = round($calSemCourante, 1);

        $calSemPrecedente = 0.0;
        foreach ($seancesSemPrecedente as $s) { $calSemPrecedente += $s->getTotalCaloriesBrulees(); }
        $calSemPrecedente = round($calSemPrecedente, 1);

        $diffSeances  = count($seancesSemCourante) - count($seancesSemPrecedente);
        $diffDuree    = $dureeSemCourante - $dureeSemPrecedente;
        $diffCalories = round($calSemCourante - $calSemPrecedente, 1);

        $scoreSeances     = $diffSeances > 0  ? 40 : ($diffSeances == 0  ? 20 : 0);
        $scoreDuree       = $diffDuree > 0    ? 30 : ($diffDuree == 0    ? 15 : 0);
        $scoreCalories    = $diffCalories > 0 ? 30 : ($diffCalories == 0 ? 15 : 0);
        $scoreProgression = min(100, $scoreSeances + $scoreDuree + $scoreCalories);

        $progressionData = [
            'score'                => $scoreProgression,
            'diffSeances'          => $diffSeances,
            'diffDuree'            => $diffDuree,
            'diffCalories'         => $diffCalories,
            'dureeSemaineCourante' => $dureeSemCourante,
            'calSemaineCourante'   => $calSemCourante,
        ];

        $progressionLabels     = [];
        $progressionCalories   = [];
        $progressionSeancesX10 = [];
        for ($i = 7; $i >= 0; $i--) {
            $debut = (clone $debutSemaine)->modify("-{$i} weeks");
            $fin   = (clone $finSemaine)->modify("-{$i} weeks");
            $progressionLabels[] = 'Sem ' . $debut->format('d/m');

            $seancesSem = array_filter($toutesSeances,
                fn($s) => $s->getDateSeance() >= $debut && $s->getDateSeance() <= $fin
            );
            $calSem = 0.0;
            foreach ($seancesSem as $s) { $calSem += $s->getTotalCaloriesBrulees(); }
            $progressionCalories[]   = round($calSem, 1);
            $progressionSeancesX10[] = count($seancesSem) * 10;
        }

        $seancesParSemaine    = $seanceSportRepository->getSeancesParSemaine($user);
        $dureeParMois         = $seanceSportRepository->getDureeParMois($user);
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

        $analyseProgression = $this->getAnalyseProgressionGroq($httpClient, [
            'scoreProgression'   => $scoreProgression,
            'diffSeances'        => $diffSeances,
            'diffDuree'          => $diffDuree,
            'diffCalories'       => $diffCalories,
            'seanceCetteSemaine' => $seanceCetteSemaine,
            'dureeSemCourante'   => $dureeSemCourante,
            'calSemCourante'     => $calSemCourante,
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
            'progressionData'         => $progressionData,
            'progressionLabels'       => json_encode($progressionLabels),
            'progressionCalories'     => json_encode($progressionCalories),
            'progressionSeancesX10'   => json_encode($progressionSeancesX10),
            'analyseProgression'      => $analyseProgression,
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

    /**
     * @param array<string, mixed> $data
     */
    private function getPredictionGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Clé GROQ_API_KEY manquante dans .env";

        $prompt = sprintf(
            "Tu es un coach sportif expert et analyste de données. Voici la situation RÉELLE du groupe :
📊 DONNÉES ACTUELLES :
- Total séances effectuées : %d | Séances ce mois-ci : %d
- Durée moyenne par séance : %d minutes | Calories totales brûlées : %.1f kcal
🎯 OBJECTIF SOUHAITÉ :
- Objectif principal : %s | Séances souhaitées par semaine : %d
- Durée souhaitée par séance : %d minutes | Calories à brûler par séance : %d kcal | Délai : %s
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

    /**
     * @param array<string, mixed> $stats
     */
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

    // =========================================================================
    // ════════════  🤖 GROQ — Analyse de Progression IA  ══════════════════════
    // =========================================================================

    /**
     * @param array<string, mixed> $data
     */
    private function getAnalyseProgressionGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return '';

        $tendance = $data['scoreProgression'] >= 60 ? 'en progression'
                  : ($data['scoreProgression'] >= 30 ? 'stable' : 'en régression');

        $prompt = sprintf(
            "Tu es un coach sportif expert. Voici l'analyse de progression hebdomadaire :
- Score de progression : %d/100 — le groupe est %s
- Évolution séances : %+d cette semaine vs semaine précédente (%d séances au total)
- Évolution durée : %+d minutes (%d min cette semaine)
- Évolution calories : %+.1f kcal (%.1f kcal brûlées cette semaine)

Donne une analyse courte (3-4 phrases) en français :
1. Évalue si c'est une bonne ou mauvaise semaine
2. Identifie le point fort et le point faible
3. Donne 1 conseil concret pour la semaine prochaine
Utilise des emojis. Sois direct et motivant.",
            $data['scoreProgression'], $tendance,
            $data['diffSeances'], $data['seanceCetteSemaine'],
            $data['diffDuree'], $data['dureeSemCourante'],
            $data['diffCalories'], $data['calSemCourante']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => [
                    'model'       => 'llama-3.3-70b-versatile',
                    'messages'    => [['role' => 'user', 'content' => $prompt]],
                    'max_tokens'  => 250,
                    'temperature' => 0.7,
                ],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? '';
        } catch (\Exception $e) {
            return '💪 Continuez sur cette dynamique et visez la progression chaque semaine !';
        }
    }
}