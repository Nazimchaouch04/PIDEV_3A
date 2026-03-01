<?php

namespace App\Command;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-users',
    description: 'Crée des utilisateurs de test'
)]
class CreateUsersCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = [
            [
                'email' => 'dhia@gmail.com',
                'password' => 'password123',
                'nom_complet' => 'Dhia Hajjouni',
                'roles' => ['ROLE_USER']
            ],
            [
                'email' => 'monji@gmail.com',
                'password' => 'password123',
                'nom_complet' => 'Monji Test',
                'roles' => ['ROLE_USER']
            ]
        ];

        foreach ($users as $userData) {
            // Vérifier si l'utilisateur existe déjà
            $existingUser = $this->em->getRepository(Utilisateur::class)->findOneBy(['email' => $userData['email']]);
            
            if ($existingUser) {
                $output->writeln("<comment>⚠️  L'utilisateur {$userData['email']} existe déjà</comment>");
                continue;
            }

            $user = new Utilisateur();
            $user->setEmail($userData['email']);
            $user->setNomComplet($userData['nom_complet']);
            $user->setRoles($userData['roles']);
            $user->setDateInscription(new \DateTime());
            
            $hashedPassword = $this->passwordHasher->hashPassword($user, $userData['password']);
            $user->setMotDePasse($hashedPassword);
            
            $this->em->persist($user);
            
            $output->writeln("<info>✅ Utilisateur {$userData['email']} créé</info>");
        }

        $this->em->flush();

        $output->writeln('<info>✅ Utilisateurs créés avec succès !</info>');
        $output->writeln('<info>📧 Emails disponibles:</info>');
        foreach ($users as $userData) {
            $output->writeln("<info>   - {$userData['email']} (mot de passe: {$userData['password']})</info>");
        }

        return Command::SUCCESS;
    }
}
