<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260203232743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aliment (id INT AUTO_INCREMENT NOT NULL, nom_aliment VARCHAR(100) NOT NULL, calories INT NOT NULL, index_glycemique INT NOT NULL, est_excitant TINYINT NOT NULL, repas_id INT NOT NULL, INDEX IDX_70FF972B1D236AAA (repas_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE evenement_sante (id INT AUTO_INCREMENT NOT NULL, titre_event VARCHAR(100) NOT NULL, date_event DATETIME NOT NULL, lien_reunion VARCHAR(255) NOT NULL, points_participation INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_5CA29E937A45358C (groupe_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, nom_exercice VARCHAR(100) NOT NULL, intensite VARCHAR(255) NOT NULL, calories_par_minute DOUBLE PRECISION NOT NULL, seance_id INT NOT NULL, INDEX IDX_E418C74DE3797A94 (seance_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE groupe_soutien (id INT AUTO_INCREMENT NOT NULL, nom_groupe VARCHAR(100) NOT NULL, thematique VARCHAR(50) NOT NULL, capacite_max INT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE membre_groupe (id INT AUTO_INCREMENT NOT NULL, date_adhesion DATETIME NOT NULL, role_membre VARCHAR(50) NOT NULL, utilisateur_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_9EB01998FB88E14F (utilisateur_id), INDEX IDX_9EB019987A45358C (groupe_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE profil_sante (id INT AUTO_INCREMENT NOT NULL, age INT NOT NULL, poids DOUBLE PRECISION NOT NULL, heure_reveil TIME NOT NULL, utilisateur_id INT NOT NULL, UNIQUE INDEX UNIQ_8104E92FFB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, enonce LONGTEXT NOT NULL, reponse_correcte VARCHAR(255) NOT NULL, options_fausses LONGTEXT NOT NULL, points_valeur INT NOT NULL, quiz_id INT NOT NULL, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE quiz_mental (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, niveau_stress_cible INT NOT NULL, score_resultat INT NOT NULL, medaille_quiz VARCHAR(50) DEFAULT NULL, date_quiz DATETIME NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_9DD826AFB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, date_heure_rdv DATETIME NOT NULL, motif LONGTEXT NOT NULL, est_honore TINYINT NOT NULL, specialiste_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_65E8AA0A6F1A5C10 (specialiste_id), INDEX IDX_65E8AA0AFB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, titre_repas VARCHAR(50) NOT NULL, type_moment VARCHAR(255) NOT NULL, date_consommation DATETIME NOT NULL, points_gagnes INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_A8D351B3FB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE seance_sport (id INT AUTO_INCREMENT NOT NULL, nom_seance VARCHAR(100) NOT NULL, heure_debut TIME NOT NULL, duree_minutes INT NOT NULL, medaille_obtenue VARCHAR(50) DEFAULT NULL, date_seance DATE NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_593FC9EFB88E14F (utilisateur_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE specialiste (id INT AUTO_INCREMENT NOT NULL, nom_docteur VARCHAR(100) NOT NULL, specialite VARCHAR(100) NOT NULL, telephone VARCHAR(20) NOT NULL, disponibilite VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, score_global INT NOT NULL, date_inscription DATE NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE aliment ADD CONSTRAINT FK_70FF972B1D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id)');
        $this->addSql('ALTER TABLE evenement_sante ADD CONSTRAINT FK_5CA29E937A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DE3797A94 FOREIGN KEY (seance_id) REFERENCES seance_sport (id)');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB01998FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB019987A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id)');
        $this->addSql('ALTER TABLE profil_sante ADD CONSTRAINT FK_8104E92FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz_mental (id)');
        $this->addSql('ALTER TABLE quiz_mental ADD CONSTRAINT FK_9DD826AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES specialiste (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE repas ADD CONSTRAINT FK_A8D351B3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE seance_sport ADD CONSTRAINT FK_593FC9EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment DROP FOREIGN KEY FK_70FF972B1D236AAA');
        $this->addSql('ALTER TABLE evenement_sante DROP FOREIGN KEY FK_5CA29E937A45358C');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DE3797A94');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB01998FB88E14F');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB019987A45358C');
        $this->addSql('ALTER TABLE profil_sante DROP FOREIGN KEY FK_8104E92FFB88E14F');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE quiz_mental DROP FOREIGN KEY FK_9DD826AFB88E14F');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6F1A5C10');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AFB88E14F');
        $this->addSql('ALTER TABLE repas DROP FOREIGN KEY FK_A8D351B3FB88E14F');
        $this->addSql('ALTER TABLE seance_sport DROP FOREIGN KEY FK_593FC9EFB88E14F');
        $this->addSql('DROP TABLE aliment');
        $this->addSql('DROP TABLE evenement_sante');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE groupe_soutien');
        $this->addSql('DROP TABLE membre_groupe');
        $this->addSql('DROP TABLE profil_sante');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz_mental');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE seance_sport');
        $this->addSql('DROP TABLE specialiste');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
