<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260221180719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE log_event (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, utilisateur_id INT DEFAULT NULL, INDEX IDX_1BD0E1FAFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE log_event ADD CONSTRAINT FK_1BD0E1FAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log_event DROP FOREIGN KEY FK_1BD0E1FAFB88E14F');
        $this->addSql('DROP TABLE log_event');
    }
}
