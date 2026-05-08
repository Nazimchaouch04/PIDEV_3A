<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Twilio\Rest\Client;

#[AsCommand(name: 'app:test-sms')]
class TestSmsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $sid = $_ENV['TWILIO_SID'] ?? null;
        $token = $_ENV['TWILIO_AUTH_TOKEN'] ?? null;
        $from = $_ENV['TWILIO_PHONE_NUMBER'] ?? null;
        $to = $_ENV['COACH_PHONE_NUMBER'] ?? null;

        $output->writeln("TWILIO_SID: " . ($sid ? 'défini' : 'NON défini'));
        $output->writeln("TWILIO_AUTH_TOKEN: " . ($token ? 'défini' : 'NON défini'));
        $output->writeln("TWILIO_PHONE_NUMBER: " . $from);
        $output->writeln("COACH_PHONE_NUMBER: " . $to);

        if (!$sid || !$token || !$from || !$to) {
            $output->writeln("<error>Configuration manquante!</error>");
            return Command::FAILURE;
        }

        try {
            $client = new Client($sid, $token);
            $message = $client->messages->create(
                $to,
                [
                    'from' => $from,
                    'body' => 'Test SMS BioSync - ' . date('H:i:s')
                ]
            );
            $output->writeln("<info>SMS envoyé! SID: " . $message->sid . "</info>");
            $output->writeln("Status: " . $message->status);
            $output->writeln("ErrorCode: " . ($message->errorCode ?? 'aucun'));
            $output->writeln("ErrorMessage: " . ($message->errorMessage ?? 'aucune'));
        } catch (\Exception $e) {
            $output->writeln("<error>Erreur: " . $e->getMessage() . "</error>");
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
