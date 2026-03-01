<?php

namespace App\Controller;

use App\Entity\Exercice;
use App\Entity\SeanceSport;
use App\Form\ExerciceType;
use App\Repository\ExerciceRepository;
use App\Repository\SeanceSportRepository;
use App\Service\CalorieNinjasService;
use App\Service\CaloriePredictionService;
use App\Service\ExerciseDBService;
use App\Service\ProgrammeIAService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/exercice')]
final class ExerciceController extends AbstractController
{
    // =========================================================================
    // ════════════════  DÉFIS HEBDOMADAIRES — User/Exercice  ═══════════════════
    // =========================================================================

    private const DEFIS_EXERCICE = [
        [
            'id'          => 'champion',
            'titre'       => 'Champion de la semaine',
            'description' => '5 exercices différents cette semaine',
            'icone'       => '🥇',
            'medaille'    => '🥇 Or',
            'condition'   => 'exercices_differents',
            'valeur'      => 5,
            'couleur'     => 'gold',
        ],
        [
            'id'          => 'actif',
            'titre'       => 'Athlète actif',
            'description' => '3 exercices différents cette semaine',
            'icone'       => '🥈',
            'medaille'    => '🥈 Argent',
            'condition'   => 'exercices_differents',
            'valeur'      => 3,
            'couleur'     => 'silver',
        ],
        [
            'id'          => 'debutant',
            'titre'       => 'Premier pas',
            'description' => '1 exercice ajouté cette semaine',
            'icone'       => '🥉',
            'medaille'    => '🥉 Bronze',
            'condition'   => 'exercices_semaine',
            'valeur'      => 1,
            'couleur'     => 'bronze',
        ],
        [
            'id'          => 'bruleur',
            'titre'       => 'Brûleur de calories',
            'description' => 'Un exercice avec +10 kcal/min',
            'icone'       => '🔥',
            'medaille'    => '🔥 Feu',
            'condition'   => 'calories_minute',
            'valeur'      => 10,
            'couleur'     => 'fire',
        ],
        [
            'id'          => 'intensif',
            'titre'       => 'Guerrier de l\'intensité',
            'description' => '3 exercices à intensité élevée',
            'icone'       => '💪',
            'medaille'    => '💪 Force',
            'condition'   => 'intensite_elevee',
            'valeur'      => 3,
            'couleur'     => 'purple',
        ],
        [
            'id'          => 'marathonien',
            'titre'       => 'Marathonien',
            'description' => 'Séance de +90 min avec exercices',
            'icone'       => '⏱️',
            'medaille'    => '⏱️ Marathon',
            'condition'   => 'duree_seance',
            'valeur'      => 90,
            'couleur'     => 'teal',
        ],
    ];

    // =========================================================================
    // ════════════════════  DÉFIS — Route principale  ══════════════════════════
    // =========================================================================

    #[Route('/defis', name: 'app_exercice_defis', methods: ['GET'])]
    public function defis(
        ExerciceRepository    $exerciceRepository,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface   $httpClient
    ): Response {
        $now          = new \DateTime();
        $debutSemaine = (clone $now)->modify('monday this week 00:00:00');
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');

        $tousExercices    = $exerciceRepository->findAll();
        $exercicesSemaine = array_filter($tousExercices, function ($e) use ($debutSemaine, $finSemaine) {
            $date = $e->getSeance()->getDateSeance();
            return $date >= $debutSemaine && $date <= $finSemaine;
        });

        $nbExercicesSemaine = count($exercicesSemaine);

        $nomsUniques  = array_unique(array_map(fn($e) => $e->getNomExercice(), $exercicesSemaine));
        $nbDifferents = count($nomsUniques);

        $maxCaloriesMinute = 0;
        foreach ($exercicesSemaine as $e) {
            if ($e->getCaloriesParMinute() > $maxCaloriesMinute) {
                $maxCaloriesMinute = $e->getCaloriesParMinute();
            }
        }

        $nbIntensiteElevee = count(array_filter($exercicesSemaine,
            fn($e) => $e->getIntensite()->value === 'elevee'
        ));

        $toutesSeances  = $seanceSportRepository->findAll();
        $maxDureeSeance = 0;
        foreach ($toutesSeances as $s) {
            if ($s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine) {
                if ($s->getDureeMinutes() > $maxDureeSeance) {
                    $maxDureeSeance = $s->getDureeMinutes();
                }
            }
        }

        $defisAvecProgression = [];
        foreach (self::DEFIS_EXERCICE as $defi) {
            $valeurActuelle = 0;
            switch ($defi['condition']) {
                case 'exercices_semaine':    $valeurActuelle = $nbExercicesSemaine;          break;
                case 'exercices_differents': $valeurActuelle = $nbDifferents;                break;
                case 'calories_minute':      $valeurActuelle = round($maxCaloriesMinute, 1); break;
                case 'intensite_elevee':     $valeurActuelle = $nbIntensiteElevee;           break;
                case 'duree_seance':         $valeurActuelle = $maxDureeSeance;              break;
            }
            $progression = min(100, round(($valeurActuelle / $defi['valeur']) * 100));
            $atteint     = $progression >= 100;
            $defisAvecProgression[] = array_merge($defi, [
                'progression'    => $progression,
                'valeurActuelle' => $valeurActuelle,
                'atteint'        => $atteint,
            ]);
        }

        $medaillesObtenues = [];
        foreach ($toutesSeances as $s) {
            if ($s->getDateSeance() >= $debutSemaine
                && $s->getDateSeance() <= $finSemaine
                && $s->getMedailleObtenue()) {
                $medaillesObtenues[] = $s->getMedailleObtenue();
            }
        }
        $medaillesObtenues = array_unique($medaillesObtenues);

        $messageGroq   = null;
        $defisAtteints = array_filter($defisAvecProgression, fn($d) => $d['atteint']);
        if (!empty($defisAtteints)) {
            $messageGroq = $this->getMessageFelicitationsGroq($httpClient, [
                'defisAtteints'      => array_values($defisAtteints),
                'nbExercicesSemaine' => $nbExercicesSemaine,
                'medailles'          => $medaillesObtenues,
            ]);
        }

        return $this->render('exercice/defis.html.twig', [
            'defis'              => $defisAvecProgression,
            'nbExercicesSemaine' => $nbExercicesSemaine,
            'medaillesObtenues'  => array_values($medaillesObtenues),
            'messageGroq'        => $messageGroq,
            'debutSemaine'       => $debutSemaine,
            'finSemaine'         => $finSemaine,
        ]);
    }

    // =========================================================================
    // ════════════════  GROQ — Message félicitations Exercice  ════════════════
    // =========================================================================

    /**
     * @param array<string, mixed> $data
     */
    private function getMessageFelicitationsGroq(HttpClientInterface $httpClient, array $data): ?string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return null;

        $defisNoms     = implode(', ', array_column($data['defisAtteints'], 'titre'));
        $medaillesNoms = implode(', ', $data['medailles']);

        $prompt = sprintf(
            "Tu es un coach sportif très enthousiaste. Un sportif vient d'accomplir ces défis cette semaine :
- Défis réussis : %s
- Médailles obtenues : %s
- Nombre d'exercices pratiqués cette semaine : %d

Génère un message de félicitations court (3-4 phrases max), très motivant et personnalisé en français.
Utilise des emojis sportifs. Termine par un encouragement pour la semaine prochaine.",
            $defisNoms,
            $medaillesNoms ?: 'aucune encore',
            $data['nbExercicesSemaine']
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
    // ════  ROUTES FIXES (avant /{id} !)  ══════════════════════════════════════
    // =========================================================================

    #[Route(name: 'app_exercice_index', methods: ['GET'])]
    public function index(ExerciceRepository $exerciceRepository, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $exerciceRepository->findAll(),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_exercice_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $exercice = new Exercice();
        $form     = $this->createForm(ExerciceType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($exercice);
            $entityManager->flush();
            return $this->redirectToRoute('app_exercice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exercice/new.html.twig', [
            'exercice' => $exercice,
            'form'     => $form,
        ]);
    }

    #[Route('/search/advanced', name: 'app_exercice_advanced_search', methods: ['GET'])]
    public function advancedSearch(Request $request, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        $nom         = $request->query->get('nom');
        $intensite   = $request->query->get('intensite');
        $minCalories = $request->query->get('minCalories');
        $minCalories = $minCalories !== null && $minCalories !== '' ? (float) $minCalories : null;
        $maxCalories = $request->query->get('maxCalories');
        $maxCalories = $maxCalories !== null && $maxCalories !== '' ? (float) $maxCalories : null;
        $seanceId    = $request->query->get('seanceId');
        $seanceId    = $seanceId !== null && $seanceId !== '' ? (int) $seanceId : null;

        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->advancedSearch($nom, $intensite, $minCalories, $maxCalories, $seanceId),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/filter/intensite/{intensite}', name: 'app_exercice_filter_intensite', methods: ['GET'])]
    public function filterByIntensite(string $intensite, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->filterByIntensite($intensite),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/filter/seance/{id}', name: 'app_exercice_filter_seance', methods: ['GET'])]
    public function filterBySeance(int $id, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->filterBySeance($id),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/sort/nom/{order}', name: 'app_exercice_sort_nom', methods: ['GET'])]
    public function sortByNom(string $order, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->sortByNom($order),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/sort/intensite/{order}', name: 'app_exercice_sort_intensite', methods: ['GET'])]
    public function sortByIntensite(string $order, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->sortByIntensite($order),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/sort/calories/{order}', name: 'app_exercice_sort_calories', methods: ['GET'])]
    public function sortByCalories(string $order, ExerciceRepository $repo, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/index.html.twig', [
            'exercices' => $repo->sortByCalories($order),
            'seances'   => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/calories', name: 'app_exercice_calories', methods: ['GET'])]
    public function calculerCalories(Request $request, CalorieNinjasService $calorieService): JsonResponse
    {
        $activite = $request->query->get('activite', 'running');
        $duree    = (int) $request->query->get('duree', 30);
        return $this->json($calorieService->getCaloriesBrulees($activite, $duree));
    }

    #[Route('/recommandations', name: 'app_exercice_recommandations', methods: ['GET'])]
    public function recommandations(Request $request, CalorieNinjasService $calorieService): Response
    {
        $muscle = $request->query->get('muscle', 'biceps');
        return $this->render('exercice/recommandations.html.twig', [
            'exercices'    => $calorieService->getExercicesByMuscle($muscle),
            'muscleChoisi' => $muscle,
        ]);
    }

    #[Route('/programme', name: 'app_exercice_programme', methods: ['GET', 'POST'])]
    public function programme(
        Request              $request,
        CalorieNinjasService $calorieService,
        ProgrammeIAService   $programmeService
    ): Response {
        $programme = null;
        $exercices = [];

        if ($request->isMethod('POST')) {
            $age      = (int) $request->request->get('age', 25);
            $poids    = (float) $request->request->get('poids', 70);
            $taille   = (float) $request->request->get('taille', 170);
            $objectif = $request->request->get('objectif', 'remise en forme');
            $niveau   = $request->request->get('niveau', 'débutant');
            $jours    = (int) $request->request->get('jours', 3);
            $muscle   = $request->request->get('muscle', 'biceps');

            $exercices = $calorieService->getExercicesByMuscle($muscle);
            $programme = $programmeService->genererProgramme(
                $age, $poids, $taille, $objectif, $niveau, $jours, $muscle
            );
        }

        return $this->render('exercice/programme.html.twig', [
            'programme' => $programme,
            'exercices' => $exercices,
        ]);
    }

    // =========================================================================
    // ══════════  STATISTIQUES USER — Groq IA + ExerciseDB  ═══════════════════
    // =========================================================================

    #[Route('/statistiques/user', name: 'app_exercice_stats', methods: ['GET'])]
    public function statistiques(
        ExerciceRepository    $exerciceRepository,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface   $httpClient,
        ExerciseDBService     $exerciseDBService
    ): Response {
        $exercices      = $exerciceRepository->findAll();
        $totalExercices = count($exercices);

        $caloriesTotales = 0.0;
        foreach ($exercices as $e) {
            $nbExosSeance = $e->getSeance()->getExercices()->count();
            $dureeParExo  = $nbExosSeance > 0 ? $e->getSeance()->getDureeMinutes() / $nbExosSeance : 0;
            $caloriesTotales += $e->getCaloriesParMinute() * $dureeParExo;
        }
        $caloriesTotales = round($caloriesTotales, 2);

        $caloriesMoyennesParMinute = 0.0;
        if ($totalExercices > 0) {
            $totalCal = array_sum(array_map(fn($e) => $e->getCaloriesParMinute(), $exercices));
            $caloriesMoyennesParMinute = round($totalCal / $totalExercices, 2);
        }

        $nomCount = [];
        foreach ($exercices as $e) {
            $nomCount[$e->getNomExercice()] = ($nomCount[$e->getNomExercice()] ?? 0) + 1;
        }
        arsort($nomCount);
        $exercicePlusPratique = !empty($nomCount) ? array_key_first($nomCount) : null;

        $intensiteCount = [];
        foreach ($exercices as $e) {
            $val = $e->getIntensite()->value;
            $intensiteCount[$val] = ($intensiteCount[$val] ?? 0) + 1;
        }
        arsort($intensiteCount);
        $intensitePlusCourante = !empty($intensiteCount) ? array_key_first($intensiteCount) : null;

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
        $finSemaine   = (clone $now)->modify('sunday this week 23:59:59');
        $debutMois    = (clone $now)->modify('first day of this month');
        $finMois      = (clone $now)->modify('last day of this month 23:59:59');

        $seanceCetteSemaine = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutSemaine && $s->getDateSeance() <= $finSemaine
        ));
        $seanceCeMois = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutMois && $s->getDateSeance() <= $finMois
        ));

        $exercicesEnrichis = $exerciseDBService->enrichirExercices($exercices);
        $exerciseDBActive  = !empty($_SERVER['RAPIDAPI_KEY'] ?? $_ENV['RAPIDAPI_KEY'] ?? '');

        $seancesParSemaine    = $seanceSportRepository->getSeancesParSemaine();
        $dureeParMois         = $seanceSportRepository->getDureeParMois();
        $repartitionIntensite = $exerciceRepository->getRepartitionParIntensiteGlobal();
        $top5Exercices        = $exerciceRepository->getTop5ExercicesGlobal();

        $conseilIA = $this->getConseilGroqUser($httpClient, [
            'totalSeances'              => $totalSeances,
            'seanceCetteSemaine'        => $seanceCetteSemaine,
            'seanceCeMois'              => $seanceCeMois,
            'dureeTotal'                => $dureeTotal,
            'dureeMoyenne'              => $dureeMoyenne,
            'caloriesTotales'           => $caloriesTotales,
            'intensitePlusCourante'     => $intensitePlusCourante,
            'exercicePlusPratique'      => $exercicePlusPratique,
            'caloriesMoyennesParMinute' => $caloriesMoyennesParMinute,
        ]);

        return $this->render('exercice/statistiques.html.twig', [
            'totalSeances'              => $totalSeances,
            'dureeTotal'                => $dureeTotal,
            'dureeMoyenne'              => $dureeMoyenne,
            'seanceCetteSemaine'        => $seanceCetteSemaine,
            'seanceCeMois'              => $seanceCeMois,
            'seancePlusLongue'          => $seancePlusLongue,
            'seancePlusCourte'          => $seancePlusCourte,
            'totalMedailles'            => $totalMedailles,
            'caloriesTotales'           => $caloriesTotales,
            'intensitePlusCourante'     => $intensitePlusCourante,
            'exercicePlusPratique'      => $exercicePlusPratique,
            'caloriesMoyennesParMinute' => $caloriesMoyennesParMinute,
            'exercicesEnrichis'         => $exercicesEnrichis,
            'exerciseDBActive'          => $exerciseDBActive,
            'seancesParSemaineLabels'   => json_encode($seancesParSemaine['labels']),
            'seancesParSemaineData'     => json_encode($seancesParSemaine['data']),
            'dureeParMoisLabels'        => json_encode($dureeParMois['labels']),
            'dureeParMoisData'          => json_encode($dureeParMois['data']),
            'intensiteLabels'           => json_encode($repartitionIntensite['labels']),
            'intensiteData'             => json_encode($repartitionIntensite['data']),
            'top5Labels'                => json_encode($top5Exercices['labels']),
            'top5Data'                  => json_encode($top5Exercices['data']),
            'conseilIA'                 => $conseilIA,
        ]);
    }

    // =========================================================================
    // ══════════════════  OBJECTIF IA — User  ══════════════════════════════════
    // =========================================================================

    #[Route('/objectif', name: 'app_exercice_objectif', methods: ['GET', 'POST'])]
    public function objectif(
        Request               $request,
        ExerciceRepository    $exerciceRepository,
        SeanceSportRepository $seanceSportRepository,
        HttpClientInterface   $httpClient
    ): Response {
        $prediction     = null;
        $exercices      = $exerciceRepository->findAll();
        $totalExercices = count($exercices);

        $caloriesTotales = 0.0;
        foreach ($exercices as $e) {
            $nbExosSeance = $e->getSeance()->getExercices()->count();
            $dureeParExo  = $nbExosSeance > 0 ? $e->getSeance()->getDureeMinutes() / $nbExosSeance : 0;
            $caloriesTotales += $e->getCaloriesParMinute() * $dureeParExo;
        }
        $caloriesTotales = round($caloriesTotales, 2);

        $caloriesMoyennesParMinute = 0.0;
        if ($totalExercices > 0) {
            $totalCal = array_sum(array_map(fn($e) => $e->getCaloriesParMinute(), $exercices));
            $caloriesMoyennesParMinute = round($totalCal / $totalExercices, 2);
        }

        $nomCount = [];
        foreach ($exercices as $e) {
            $nomCount[$e->getNomExercice()] = ($nomCount[$e->getNomExercice()] ?? 0) + 1;
        }
        arsort($nomCount);
        $exercicePlusPratique = !empty($nomCount) ? array_key_first($nomCount) : null;

        $intensiteCount = [];
        foreach ($exercices as $e) {
            $val = $e->getIntensite()->value;
            $intensiteCount[$val] = ($intensiteCount[$val] ?? 0) + 1;
        }
        arsort($intensiteCount);
        $intensitePlusCourante = !empty($intensiteCount) ? array_key_first($intensiteCount) : null;

        $toutesSeances = $seanceSportRepository->findAll();
        $totalSeances  = count($toutesSeances);
        $dureeTotal    = array_sum(array_map(fn($s) => $s->getDureeMinutes(), $toutesSeances));
        $dureeMoyenne  = $totalSeances > 0 ? round($dureeTotal / $totalSeances) : 0;

        $now          = new \DateTime();
        $debutMois    = (clone $now)->modify('first day of this month');
        $finMois      = (clone $now)->modify('last day of this month 23:59:59');
        $seanceCeMois = count(array_filter($toutesSeances,
            fn($s) => $s->getDateSeance() >= $debutMois && $s->getDateSeance() <= $finMois
        ));

        if ($request->isMethod('POST')) {
            $prediction = $this->getPredictionGroqUser($httpClient, [
                'totalSeances'              => $totalSeances,
                'seanceCeMois'              => $seanceCeMois,
                'dureeMoyenne'              => $dureeMoyenne,
                'caloriesTotales'           => $caloriesTotales,
                'caloriesMoyennesParMinute' => $caloriesMoyennesParMinute,
                'exercicePlusPratique'      => $exercicePlusPratique,
                'intensitePlusCourante'     => $intensitePlusCourante,
                'objectif'                  => $request->request->get('objectif', ''),
                'seancesVoulues'            => (int) $request->request->get('seances_voulues', 4),
                'dureeVoulue'               => (int) $request->request->get('duree_voulue', 45),
                'caloriesVoulues'           => (int) $request->request->get('calories_voulues', 400),
                'delai'                     => $request->request->get('delai', '1 mois'),
            ]);
        }

        return $this->render('exercice/objectif.html.twig', [
            'prediction'                => $prediction,
            'totalSeances'              => $totalSeances,
            'seanceCeMois'              => $seanceCeMois,
            'dureeMoyenne'              => $dureeMoyenne,
            'caloriesTotales'           => $caloriesTotales,
            'caloriesMoyennesParMinute' => $caloriesMoyennesParMinute,
            'exercicePlusPratique'      => $exercicePlusPratique,
            'intensitePlusCourante'     => $intensitePlusCourante,
        ]);
    }

    // =========================================================================
    // ════════════════  MOTIVATION & SUIVI PSYCHOLOGIQUE — User  ══════════════
    // =========================================================================

    #[Route('/motivation', name: 'app_exercice_motivation', methods: ['GET'])]
    public function motivationForm(): Response
    {
        return $this->render('exercice/motivation.html.twig');
    }

    #[Route('/motivation/analyser', name: 'app_exercice_motivation_analyser', methods: ['POST'])]
    public function motivationAnalyser(
        Request             $request,
        HttpClientInterface $httpClient
    ): Response {
        $humeur  = $request->request->get('humeur');
        $energie = $request->request->get('energie');
        $sommeil = $request->request->get('sommeil');
        $stress  = $request->request->get('stress');

        $resultat = $this->getMotivationGroq($httpClient, [
            'humeur'  => $humeur,
            'energie' => $energie,
            'sommeil' => $sommeil,
            'stress'  => $stress,
        ]);

        return $this->render('exercice/motivation_resultat.html.twig', [
            'resultat' => $resultat,
            'humeur'   => $humeur,
            'energie'  => $energie,
            'sommeil'  => $sommeil,
            'stress'   => $stress,
        ]);
    }

    // =========================================================================
    // ════════════  ML — Prédiction Calories Personnalisée  ════════════════════
    // =========================================================================

    #[Route('/prediction/calories/{id}', name: 'app_exercice_calories_prediction', methods: ['GET'])]
    public function caloriesPrediction(
        int $id,
        CaloriePredictionService $predictionService,
        Security $security,
        ExerciceRepository $exerciceRepository
    ): JsonResponse {
        /** @var \App\Entity\Utilisateur $user */
        $user   = $security->getUser();
        $profil = $user?->getProfilSante();

        if (!$profil || !$profil->getAge() || !$profil->getPoids()) {
            return $this->json([
                'status'  => 'error',
                'message' => 'Complète ton Profil Santé pour voir la prédiction'
            ]);
        }

        $exercice = $exerciceRepository->find($id);
        if (!$exercice) {
            return $this->json(['status' => 'error', 'message' => 'Exercice introuvable'], 404);
        }

        $result = $predictionService->predict(
            [
                'age'   => $profil->getAge(),
                'poids' => $profil->getPoids(),
            ],
            [
                'intensite'          => $exercice->getIntensite()->value,
                'calorie_par_minute' => $exercice->getCaloriesParMinute(),
                'duree'              => $exercice->getSeance()->getDureeMinutes() ?? 30,
            ]
        );

        return $this->json($result);
    }

    // =========================================================================
    // ════  ROUTES /{id} — TOUJOURS EN DERNIER  ════════════════════════════════
    // =========================================================================

    #[Route('/{id}', name: 'app_exercice_show', methods: ['GET'])]
    public function show(Exercice $exercice, EntityManagerInterface $entityManager): Response
    {
        return $this->render('exercice/show.html.twig', [
            'exercice' => $exercice,
            'seances'  => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exercice_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exercice $exercice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExerciceType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_exercice_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exercice/edit.html.twig', [
            'exercice' => $exercice,
            'form'     => $form,
            'seances'  => $entityManager->getRepository(SeanceSport::class)->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_exercice_delete', methods: ['POST'])]
    public function delete(Request $request, Exercice $exercice, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exercice->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($exercice);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_exercice_index', [], Response::HTTP_SEE_OTHER);
    }

    // =========================================================================
    // ════════════════════  GROQ — Prédiction Objectif User  ═══════════════════
    // =========================================================================

    /**
     * @param array<string, mixed> $data
     */
    private function getPredictionGroqUser(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Clé GROQ_API_KEY manquante dans .env";

        $prompt = sprintf(
            "Tu es un coach sportif personnel bienveillant et expert. Voici le profil RÉEL de l'utilisateur :
📊 Séances totales : %d | Ce mois : %d | Durée moyenne : %d min
🔥 Calories totales : %.1f kcal | Cal/min : %.2f
💪 Exercice favori : %s | Intensité habituelle : %s
🎯 Objectif : %s | Séances/semaine : %d | Durée/séance : %d min | Calories/séance : %d kcal | Délai : %s

Génère un plan motivant en français avec :
1. 📈 Analyse progression vs objectif
2. 🗓️ Plan hebdomadaire adapté
3. ⚡ 3 actions concrètes immédiates
4. 💪 Exercices recommandés
5. 🏆 Comment mesurer la réussite",
            $data['totalSeances'], $data['seanceCeMois'], $data['dureeMoyenne'],
            $data['caloriesTotales'], $data['caloriesMoyennesParMinute'],
            $data['exercicePlusPratique'] ?? 'Non défini',
            $data['intensitePlusCourante'] ?? 'Non défini',
            $data['objectif'], $data['seancesVoulues'], $data['dureeVoulue'],
            $data['caloriesVoulues'], $data['delai']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => ['model' => 'llama-3.3-70b-versatile', 'messages' => [['role' => 'user', 'content' => $prompt]], 'max_tokens' => 1000, 'temperature' => 0.7],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? "Plan indisponible.";
        } catch (\Exception $e) {
            return "❌ Erreur Groq : ".$e->getMessage();
        }
    }

    // =========================================================================
    // ════════════════════  GROQ IA — Conseils User  ═══════════════════════════
    // =========================================================================

    /**
     * @param array<string, mixed> $stats
     */
    private function getConseilGroqUser(HttpClientInterface $httpClient, array $stats): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Ajoute GROQ_API_KEY dans ton .env pour activer les conseils IA !";

        $prompt = sprintf(
            "Tu es un coach sportif bienveillant. Statistiques :
- Séances : %d | Cette semaine : %d | Ce mois : %d
- Durée totale : %d min | Moyenne : %d min/séance
- Calories : %.1f kcal | Cal/min : %.2f
- Exercice favori : %s | Intensité : %s
Donne 3 conseils courts et motivants en français. Emoji sportif par conseil. Max 2 phrases.",
            $stats['totalSeances'], $stats['seanceCetteSemaine'], $stats['seanceCeMois'],
            $stats['dureeTotal'], $stats['dureeMoyenne'],
            $stats['caloriesTotales'], $stats['caloriesMoyennesParMinute'],
            $stats['exercicePlusPratique'] ?? 'Non défini',
            $stats['intensitePlusCourante'] ?? 'Non défini'
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => ['Authorization' => 'Bearer '.$groqApiKey, 'Content-Type' => 'application/json'],
                'json'    => ['model' => 'llama-3.3-70b-versatile', 'messages' => [['role' => 'user', 'content' => $prompt]], 'max_tokens' => 400, 'temperature' => 0.7],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? "Continuez vos efforts ! 💪";
        } catch (\Exception $e) {
            return "💪 Erreur Groq : ".$e->getMessage();
        }
    }

    // =========================================================================
    // ════════════════  GROQ — Motivation & Suivi Psychologique  ══════════════
    // =========================================================================

    /**
     * @param array<string, mixed> $data
     */
    private function getMotivationGroq(HttpClientInterface $httpClient, array $data): string
    {
        $groqApiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? null;
        if (!$groqApiKey) return "💡 Clé GROQ_API_KEY manquante dans .env";

        $prompt = sprintf(
            "Tu es un coach sportif et psychologue du sport bienveillant.
L'utilisateur veut faire une séance de sport avec cet état :
- Humeur : %s
- Niveau d'énergie : %s/5
- Heures de sommeil : %s heures
- Niveau de stress : %s

Génère une réponse structurée avec exactement ces 4 sections :
1. 💬 MESSAGE MOTIVANT : (message personnalisé selon son humeur)
2. 🏋️ SÉANCE ADAPTÉE : (exercices adaptés à son état du moment)
3. ⏱️ DURÉE RECOMMANDÉE : (durée conseillée en minutes)
4. 😴 CONSEIL RÉCUPÉRATION : (conseil bien-être si fatigué ou stressé)

Réponds en français, de manière bienveillante et encourageante. Utilise des emojis.",
            $data['humeur'],
            $data['energie'],
            $data['sommeil'],
            $data['stress']
        );

        try {
            $response = $httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer '.$groqApiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'       => 'llama-3.3-70b-versatile',
                    'messages'    => [['role' => 'user', 'content' => $prompt]],
                    'max_tokens'  => 500,
                    'temperature' => 0.8,
                ],
            ]);
            $d = $response->toArray();
            return $d['choices'][0]['message']['content'] ?? "Résultat indisponible.";
        } catch (\Exception $e) {
            return "❌ Erreur Groq : ".$e->getMessage();
        }
    }
}