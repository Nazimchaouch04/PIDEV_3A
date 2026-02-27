<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260226211634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerte (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, date_alerte DATETIME NOT NULL, criticite VARCHAR(50) NOT NULL, utilisateur_id INT NOT NULL, repas_id INT NOT NULL, INDEX IDX_3AE753AFB88E14F (utilisateur_id), INDEX IDX_3AE753A1D236AAA (repas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753A1D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id)');
        $this->addSql('ALTER TABLE utilisateur DROP reset_token, DROP reset_token_expires_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753AFB88E14F');
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753A1D236AAA');
        $this->addSql('DROP TABLE alerte');
        $this->addSql('ALTER TABLE utilisateur ADD reset_token VARCHAR(255) DEFAULT NULL, ADD reset_token_expires_at DATETIME DEFAULT NULL');
    }
}
