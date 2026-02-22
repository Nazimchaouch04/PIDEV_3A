<?php

namespace App\Command;

use App\Service\CognitiveInsightService;
use App\Service\WellnessService;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test-new-apis',
    description: 'Test the cognitive analysis and wellness APIs',
)]
class TestNewApisCommand extends Command
{
    public function __construct(
        private CognitiveInsightService $insightService,
        private WellnessService $wellnessService,
        private UtilisateurRepository $utilisateurRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Test des Nouvelles APIs BioSync');

        // 1. Test Wellness
        $io->section('1. Test Wellness API (ZenQuotes)');
        $quote = $this->wellnessService->getDailyQuote();
        $io->success("Quote du jour : \"" . $quote['text'] . "\" - " . $quote['author']);

        // 2. Test Cognitive Analysis
        $io->section('2. Test Analyse Cognitive (Mistral)');
        $user = $this->utilisateurRepository->findOneBy([]);
        if (!$user) {
            $io->warning('Aucun utilisateur trouvé pour tester l\'analyse.');
        } else {
            $io->note('Analyse en cours pour l\'utilisateur : ' . $user->getEmail());
            $insight = $this->insightService->generateInsightForUser($user);
            if ($insight) {
                $io->success('Analyse générée avec succès !');
                $io->info('Humeur prédite : ' . $insight->getHumeurPredite());
                $io->text($insight->getAnalyse());
            } else {
                $io->error('Échec de la génération de l\'analyse (Pas assez de données de quiz ?)');
            }
        }

        return Command::SUCCESS;
    }
}
