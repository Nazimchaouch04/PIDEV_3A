<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Créer un utilisateur de test
        $user = new Utilisateur();
        $user->setNomComplet('Test User');
        $user->setEmail('test@test.com');
        $user->setScoreGlobal(0);
        
        // Hasher le mot de passe
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'test123'
        );
        $user->setMotDePasse($hashedPassword);

        $manager->persist($user);
        $manager->flush();

        echo "✅ Utilisateur créé avec succès !\n";
        echo "📧 Email: test@test.com\n";
        echo "🔑 Mot de passe: test123\n";
    }
}
