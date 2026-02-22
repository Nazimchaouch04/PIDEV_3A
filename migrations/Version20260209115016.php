<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260209115016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, date_consultation DATETIME NOT NULL, symptomes LONGTEXT DEFAULT NULL, diagnostic LONGTEXT DEFAULT NULL, recommandations LONGTEXT DEFAULT NULL, rendez_vous_id INT NOT NULL, UNIQUE INDEX UNIQ_964685A691EF7EAA (rendez_vous_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, nom_medicament VARCHAR(100) NOT NULL, dose VARCHAR(255) NOT NULL, frequence VARCHAR(100) NOT NULL, duree INT NOT NULL, instructions LONGTEXT DEFAULT NULL, consultation_id INT NOT NULL, INDEX IDX_1FBFB8D962FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A691EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D962FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AFB88E14F');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6F1A5C10');
        $this->addSql('DROP INDEX IDX_65E8AA0AFB88E14F ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD statut VARCHAR(50) NOT NULL, ADD mode VARCHAR(50) NOT NULL, DROP est_honore, CHANGE motif motif VARCHAR(255) NOT NULL, CHANGE date_heure_rdv date_heure DATETIME NOT NULL, CHANGE utilisateur_id patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A6B899279 ON rendez_vous (patient_id)');
        $this->addSql('ALTER TABLE specialiste ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialiste ADD CONSTRAINT FK_55C86B15FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55C86B15FB88E14F ON specialiste (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A691EF7EAA');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D962FF6CDF');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6F1A5C10');
        $this->addSql('DROP INDEX IDX_65E8AA0A6B899279 ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD est_honore TINYINT(1) NOT NULL, DROP statut, DROP mode, CHANGE motif motif LONGTEXT NOT NULL, CHANGE date_heure date_heure_rdv DATETIME NOT NULL, CHANGE patient_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES specialiste (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0AFB88E14F ON rendez_vous (utilisateur_id)');
        $this->addSql('ALTER TABLE specialiste DROP FOREIGN KEY FK_55C86B15FB88E14F');
        $this->addSql('DROP INDEX UNIQ_55C86B15FB88E14F ON specialiste');
        $this->addSql('ALTER TABLE specialiste DROP utilisateur_id');
    }
}
