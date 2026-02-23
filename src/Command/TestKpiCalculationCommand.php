<?php

namespace App\Command;

use App\Service\MentalKPIService;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test-kpi-calculation',
    description: 'Test the Mental Health KPI calculations',
)]
class TestKpiCalculationCommand extends Command
{
    public function __construct(
        private MentalKPIService $kpiService,
        private UtilisateurRepository $utilisateurRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Test des KPIs Mental Wellness Correlation');

        $user = $this->utilisateurRepository->findOneBy([]);
        if (!$user) {
            $io->error('Aucun utilisateur trouvé.');
            return Command::FAILURE;
        }

        $io->info('Utilisateur : ' . $user->getEmail());

        // 1. Resilience
        $resilience = $this->kpiService->calculateResilienceScore($user);
        $io->success('Indice de Résilience : ' . $resilience);

        // 2. Engagement
        $engagement = $this->kpiService->getEngagementIndex($user);
        $io->success('Indice d\'Engagement : ' . $engagement . '%');

        // 3. Correlations
        $correlations = $this->kpiService->getNutritionAgilityCorrelation($user);
        $io->section('Corrélations Nutrition/Agilité (derniers quiz)');
        foreach ($correlations as $c) {
            $io->text("- [{$c['date']}] Agilité: {$c['agilite']} | Calories: {$c['calories']} kcal | Prot: {$c['proteines']}g");
        }

        return Command::SUCCESS;
    }
}
