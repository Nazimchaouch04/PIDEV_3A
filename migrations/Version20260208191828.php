<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260208191828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A63345E0A3');
        $this->addSql('DROP INDEX UNIQ_964685A63345E0A3 ON consultation');
        $this->addSql('ALTER TABLE consultation DROP rendezvous_id');
        $this->addSql('ALTER TABLE specialiste ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialiste ADD CONSTRAINT FK_55C86B15FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55C86B15FB88E14F ON specialiste (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD rendezvous_id INT NOT NULL');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A63345E0A3 FOREIGN KEY (rendezvous_id) REFERENCES rendez_vous (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_964685A63345E0A3 ON consultation (rendezvous_id)');
        $this->addSql('ALTER TABLE specialiste DROP FOREIGN KEY FK_55C86B15FB88E14F');
        $this->addSql('DROP INDEX UNIQ_55C86B15FB88E14F ON specialiste');
        $this->addSql('ALTER TABLE specialiste DROP utilisateur_id');
    }
}
