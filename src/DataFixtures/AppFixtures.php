<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Compte utilisateur normal (Front Office)
        $userNormal = new Utilisateur();
        $userNormal->setEmail('user@biosync.com');
        $userNormal->setNomComplet('Marie Dupont');
        $userNormal->setRoles(['ROLE_USER']);
        $userNormal->setScoreGlobal(150);
        $hashedPassword = $this->passwordHasher->hashPassword($userNormal, 'password123');
        $userNormal->setMotDePasse($hashedPassword);
        $manager->persist($userNormal);

        // Compte professionnel certifié (Back Office)
        $userPro = new Utilisateur();
        $userPro->setEmail('pro@biosync.com');
        $userPro->setNomComplet('Dr. Sophie Martin');
        $userPro->setRoles(['ROLE_USER', 'ROLE_PROFESSIONAL']);
        $userPro->setScoreGlobal(500);
        $hashedPasswordPro = $this->passwordHasher->hashPassword($userPro, 'password123');
        $userPro->setMotDePasse($hashedPasswordPro);
        $manager->persist($userPro);

        // Compte admin (optionnel)
        $admin = new Utilisateur();
        $admin->setEmail('admin@biosync.com');
        $admin->setNomComplet('Admin BioSync');
        $admin->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $admin->setScoreGlobal(1000);
        $hashedPasswordAdmin = $this->passwordHasher->hashPassword($admin, 'admin123');
        $admin->setMotDePasse($hashedPasswordAdmin);
        $manager->persist($admin);

        $manager->flush();

        // ============================================
        // FIXTURES MODULE MENTAL - Questions & Quiz
        // ============================================

        // Quiz Bank pour stocker les questions
        $quizBank = new \App\Entity\QuizMental();
        $quizBank->setUtilisateur($admin);
        $quizBank->setTitre('Question Bank');
        $quizBank->setNiveauStressCible(5);
        $quizBank->setScoreResultat(0);
        $quizBank->setDateQuiz(new \DateTime());
        $manager->persist($quizBank);

        // Questions variées sur le mental/stress/bien-être
        $questionsData = [
            [
                'enonce' => 'Comment gérez-vous le stress au quotidien ?',
                'reponse' => 'Je pratique la méditation et la respiration profonde',
                'options' => ['Je regarde la télévision', 'J\'ignore le problème', 'Je dors toute la journée'],
                'points' => 10
            ],
            [
                'enonce' => 'Que faites-vous pour améliorer votre humeur ?',
                'reponse' => 'Je fais de l\'exercice physique régulièrement',
                'options' => ['Je mange des sucreries', 'Je reste au lit', 'Je me plains'],
                'points' => 10
            ],
            [
                'enonce' => 'Comment réagissez-vous face à une situation difficile ?',
                'reponse' => 'J\'analyse calmement la situation et cherche des solutions',
                'options' => ['Je panique immédiatement', 'Je fuis la situation', 'Je blâme les autres'],
                'points' => 15
            ],
            [
                'enonce' => 'Quelle est votre routine du soir pour bien dormir ?',
                'reponse' => 'Je me déconnecte des écrans 1h avant et lis un livre',
                'options' => ['Je regarde mon téléphone jusqu\'à m\'endormir', 'Je bois du café', 'Je ne fais rien de spécial'],
                'points' => 10
            ],
            [
                'enonce' => 'Comment maintenez-vous vos relations sociales ?',
                'reponse' => 'Je consacre du temps de qualité à mes proches',
                'options' => ['Je reste isolé', 'Je communique uniquement par SMS', 'J\'évite les gens'],
                'points' => 10
            ],
            [
                'enonce' => 'Quelle technique utilisez-vous pour vous relaxer ?',
                'reponse' => 'Le yoga et les exercices de pleine conscience',
                'options' => ['Aucune technique particulière', 'Je fume', 'Je bois de l\'alcool'],
                'points' => 15
            ],
            [
                'enonce' => 'Comment organisez-vous votre journée ?',
                'reponse' => 'Je planifie mes tâches et prends des pauses régulières',
                'options' => ['Je procrastine tout', 'Je travaille sans arrêt', 'Je n\'organise rien'],
                'points' => 10
            ],
            [
                'enonce' => 'Que faites-vous quand vous vous sentez anxieux ?',
                'reponse' => 'Je parle à quelqu\'un de confiance ou écris mes pensées',
                'options' => ['Je me renferme sur moi-même', 'Je fais semblant que tout va bien', 'J\'évite d\'y penser'],
                'points' => 15
            ],
            [
                'enonce' => 'Comment prenez-vous soin de votre santé mentale ?',
                'reponse' => 'Je consulte un professionnel si nécessaire',
                'options' => ['Je n\'y pense jamais', 'Je me soigne moi-même', 'Je considère ça comme une faiblesse'],
                'points' => 15
            ],
            [
                'enonce' => 'Quelle est votre attitude face aux défis ?',
                'reponse' => 'Je les vois comme des opportunités d\'apprendre',
                'options' => ['Je les évite à tout prix', 'Je me décourage facilement', 'Je pense que c\'est injuste'],
                'points' => 10
            ],
        ];

        $questions = [];
        foreach ($questionsData as $data) {
            $question = new \App\Entity\Question();
            $question->setEnonce($data['enonce']);
            $question->setReponseCorrecte($data['reponse']);
            $question->setOptionsFaussesFromArray($data['options']);
            $question->setPointsValeur($data['points']);
            $question->setQuiz($quizBank);
            $manager->persist($question);
            $questions[] = $question;
        }

        $manager->flush();

        // Quiz complétés par l'utilisateur normal
        // Quiz 1 - Score élevé (Expert Santé)
        $quiz1 = new \App\Entity\QuizMental();
        $quiz1->setUtilisateur($userNormal);
        $quiz1->setTitre('Mental Health Assessment - ' . (new \DateTime('-5 days'))->format('d/m/Y'));
        $quiz1->setNiveauStressCible(3);
        $quiz1->setScoreResultat(60);
        $quiz1->setMedailleQuiz('Expert Santé');
        $quiz1->setDateQuiz(new \DateTime('-5 days'));
        $manager->persist($quiz1);

        // Quiz 2 - Score moyen (Connaisseur)
        $quiz2 = new \App\Entity\QuizMental();
        $quiz2->setUtilisateur($userNormal);
        $quiz2->setTitre('Mental Health Assessment - ' . (new \DateTime('-3 days'))->format('d/m/Y'));
        $quiz2->setNiveauStressCible(5);
        $quiz2->setScoreResultat(40);
        $quiz2->setMedailleQuiz('Connaisseur');
        $quiz2->setDateQuiz(new \DateTime('-3 days'));
        $manager->persist($quiz2);

        // Quiz 3 - Score faible (Apprenti)
        $quiz3 = new \App\Entity\QuizMental();
        $quiz3->setUtilisateur($userNormal);
        $quiz3->setTitre('Mental Health Assessment - ' . (new \DateTime('-1 day'))->format('d/m/Y'));
        $quiz3->setNiveauStressCible(7);
        $quiz3->setScoreResultat(25);
        $quiz3->setMedailleQuiz('Apprenti');
        $quiz3->setDateQuiz(new \DateTime('-1 day'));
        $manager->persist($quiz3);

        // Quiz 4 - Aucune médaille
        $quiz4 = new \App\Entity\QuizMental();
        $quiz4->setUtilisateur($userNormal);
        $quiz4->setTitre('Mental Health Assessment - ' . (new \DateTime())->format('d/m/Y'));
        $quiz4->setNiveauStressCible(6);
        $quiz4->setScoreResultat(15);
        $quiz4->setMedailleQuiz(null);
        $quiz4->setDateQuiz(new \DateTime());
        $manager->persist($quiz4);

        $manager->flush();
    }
}
