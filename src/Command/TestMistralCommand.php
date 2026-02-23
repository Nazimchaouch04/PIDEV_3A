<?php

namespace App\Command;

use App\Service\MistralService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test-mistral',
    description: 'Vérifie l\'intégration de l\'API Mistral en générant une question de quiz.',
)]
class TestMistralCommand extends Command
{
    public function __construct(
        private MistralService $mistralService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Test de l\'API Mistral');

        if (!$this->mistralService->isConfigured()) {
            $io->error('L\'API Mistral n\'est pas configurée. Vérifiez votre fichier .env.');
            return Command::FAILURE;
        }

        $io->info('Appel à l\'API Mistral pour générer une question...');

        try {
            $question = $this->mistralService->generateQuizQuestion();

            if ($question) {
                $io->success('Question générée avec succès !');
                $io->table(
                    ['Clé', 'Valeur'],
                    [
                        ['Énoncé', $question['enonce']],
                        ['Réponse Correcte', $question['reponse_correcte']],
                        ['Options Fausses', implode(', ', $question['options_fausses'])],
                        ['Points', $question['points_valeur']],
                    ]
                );
                return Command::SUCCESS;
            } else {
                $io->error('Échec de la génération de la question. Vérifiez les logs PHP.');
                return Command::FAILURE;
            }
        } catch (\Exception $e) {
            $io->error('Exception : ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
