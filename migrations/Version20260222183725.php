<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260222183725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aliment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_aliment VARCHAR(100) NOT NULL, calories INTEGER NOT NULL, index_glycemique INTEGER DEFAULT NULL, est_excitant BOOLEAN NOT NULL, type_aliment VARCHAR(50) DEFAULT NULL, multi_score DOUBLE PRECISION DEFAULT NULL, nutri_score VARCHAR(1) DEFAULT NULL, proteines DOUBLE PRECISION DEFAULT NULL, glucides DOUBLE PRECISION DEFAULT NULL, lipides DOUBLE PRECISION DEFAULT NULL, repas_id INTEGER DEFAULT NULL, CONSTRAINT FK_70FF972B1D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_70FF972B1D236AAA ON aliment (repas_id)');
        $this->addSql('CREATE TABLE certification (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type VARCHAR(20) NOT NULL, specialite VARCHAR(100) NOT NULL, numero_enregistrement VARCHAR(100) NOT NULL, diplome_filename VARCHAR(255) NOT NULL, motivation CLOB NOT NULL, statut VARCHAR(20) NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_6C3C6D75FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C3C6D75FB88E14F ON certification (utilisateur_id)');
        $this->addSql('CREATE TABLE consultation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_consultation DATETIME NOT NULL, symptomes CLOB DEFAULT NULL, diagnostic CLOB DEFAULT NULL, recommandations CLOB DEFAULT NULL, rendez_vous_id INTEGER NOT NULL, CONSTRAINT FK_964685A691EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_964685A691EF7EAA ON consultation (rendez_vous_id)');
        $this->addSql('CREATE TABLE evenement_sante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre_event VARCHAR(100) NOT NULL, date_event DATETIME NOT NULL, points_participation INTEGER NOT NULL, groupe_id INTEGER NOT NULL, CONSTRAINT FK_5CA29E937A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_5CA29E937A45358C ON evenement_sante (groupe_id)');
        $this->addSql('CREATE TABLE exercice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_exercice VARCHAR(100) NOT NULL, intensite VARCHAR(255) NOT NULL, calories_par_minute DOUBLE PRECISION NOT NULL, seance_id INTEGER NOT NULL, CONSTRAINT FK_E418C74DE3797A94 FOREIGN KEY (seance_id) REFERENCES seance_sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E418C74DE3797A94 ON exercice (seance_id)');
        $this->addSql('CREATE TABLE groupe_soutien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_groupe VARCHAR(100) NOT NULL, thematique VARCHAR(50) NOT NULL, capacite_max INTEGER NOT NULL, description CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE log_event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, "action" VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, utilisateur_id INTEGER DEFAULT NULL, CONSTRAINT FK_1BD0E1FAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1BD0E1FAFB88E14F ON log_event (utilisateur_id)');
        $this->addSql('CREATE TABLE membre_groupe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_adhesion DATETIME NOT NULL, role_membre VARCHAR(50) NOT NULL, utilisateur_id INTEGER NOT NULL, groupe_id INTEGER NOT NULL, CONSTRAINT FK_9EB01998FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9EB019987A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9EB01998FB88E14F ON membre_groupe (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_9EB019987A45358C ON membre_groupe (groupe_id)');
        $this->addSql('CREATE TABLE prescription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_medicament VARCHAR(100) NOT NULL, dose VARCHAR(255) NOT NULL, frequence VARCHAR(100) NOT NULL, duree INTEGER NOT NULL, instructions CLOB DEFAULT NULL, consultation_id INTEGER NOT NULL, CONSTRAINT FK_1FBFB8D962FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1FBFB8D962FF6CDF ON prescription (consultation_id)');
        $this->addSql('CREATE TABLE profil_sante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, age INTEGER NOT NULL, poids DOUBLE PRECISION NOT NULL, heure_reveil TIME NOT NULL, utilisateur_id INTEGER DEFAULT NULL, CONSTRAINT FK_8104E92FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8104E92FFB88E14F ON profil_sante (utilisateur_id)');
        $this->addSql('CREATE TABLE question (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enonce CLOB NOT NULL, reponse_correcte VARCHAR(255) NOT NULL, options_fausses CLOB NOT NULL, points_valeur INTEGER NOT NULL, quiz_id INTEGER NOT NULL, CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz_mental (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_B6F7494E853CD175 ON question (quiz_id)');
        $this->addSql('CREATE TABLE quiz_mental (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, niveau_stress_cible INTEGER NOT NULL, score_resultat INTEGER NOT NULL, medaille_quiz VARCHAR(50) DEFAULT NULL, date_quiz DATETIME NOT NULL, statut VARCHAR(20) DEFAULT \'disponible\' NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_9DD826AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9DD826AFB88E14F ON quiz_mental (utilisateur_id)');
        $this->addSql('CREATE TABLE rendez_vous (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_heure DATETIME NOT NULL, motif VARCHAR(255) NOT NULL, statut VARCHAR(50) NOT NULL, mode VARCHAR(50) NOT NULL, patient_id INTEGER NOT NULL, specialiste_id INTEGER NOT NULL, CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A6B899279 ON rendez_vous (patient_id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A6F1A5C10 ON rendez_vous (specialiste_id)');
        $this->addSql('CREATE TABLE repas (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre_repas VARCHAR(50) NOT NULL, type_moment VARCHAR(255) NOT NULL, date_consommation DATETIME NOT NULL, points_gagnes INTEGER NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_A8D351B3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A8D351B3FB88E14F ON repas (utilisateur_id)');
        $this->addSql('CREATE TABLE seance_sport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_seance VARCHAR(100) NOT NULL, heure_debut TIME NOT NULL, duree_minutes INTEGER NOT NULL, medaille_obtenue VARCHAR(50) DEFAULT NULL, date_seance DATE NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_593FC9EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_593FC9EFB88E14F ON seance_sport (utilisateur_id)');
        $this->addSql('CREATE TABLE specialiste (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_docteur VARCHAR(100) NOT NULL, specialite VARCHAR(100) NOT NULL, telephone VARCHAR(20) NOT NULL, disponibilite VARCHAR(255) NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_55C86B15FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55C86B15FB88E14F ON specialiste (utilisateur_id)');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_complet VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, score_global INTEGER NOT NULL, date_inscription DATE NOT NULL, roles CLOB NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, reset_token_expires_at DATETIME DEFAULT NULL, face_encoding CLOB DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 ON messenger_messages (queue_name, available_at, delivered_at, id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE aliment');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE evenement_sante');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE groupe_soutien');
        $this->addSql('DROP TABLE log_event');
        $this->addSql('DROP TABLE membre_groupe');
        $this->addSql('DROP TABLE prescription');
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
