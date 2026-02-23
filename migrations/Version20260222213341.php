<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260222213341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cognitive_insight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, analyse CLOB NOT NULL, humeur_predite VARCHAR(50) NOT NULL, scores_evolution CLOB NOT NULL, date_analyse DATETIME NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_470C59A1FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_470C59A1FB88E14F ON cognitive_insight (utilisateur_id)');
        $this->addSql('ALTER TABLE quiz_mental ADD COLUMN temps_moyen_reponse DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz_mental ADD COLUMN agilite_cognitive VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cognitive_insight');
        $this->addSql('CREATE TEMPORARY TABLE __temp__quiz_mental AS SELECT id, titre, niveau_stress_cible, score_resultat, medaille_quiz, date_quiz, statut, utilisateur_id FROM quiz_mental');
        $this->addSql('DROP TABLE quiz_mental');
        $this->addSql('CREATE TABLE quiz_mental (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, niveau_stress_cible INTEGER NOT NULL, score_resultat INTEGER NOT NULL, medaille_quiz VARCHAR(50) DEFAULT NULL, date_quiz DATETIME NOT NULL, statut VARCHAR(20) DEFAULT \'disponible\' NOT NULL, utilisateur_id INTEGER NOT NULL, CONSTRAINT FK_9DD826AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO quiz_mental (id, titre, niveau_stress_cible, score_resultat, medaille_quiz, date_quiz, statut, utilisateur_id) SELECT id, titre, niveau_stress_cible, score_resultat, medaille_quiz, date_quiz, statut, utilisateur_id FROM __temp__quiz_mental');
        $this->addSql('DROP TABLE __temp__quiz_mental');
        $this->addSql('CREATE INDEX IDX_9DD826AFB88E14F ON quiz_mental (utilisateur_id)');
    }
}
