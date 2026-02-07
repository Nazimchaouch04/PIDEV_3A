<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260205190612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_sante DROP lien_reunion');
        $this->addSql('ALTER TABLE groupe_soutien ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz_mental ADD statut VARCHAR(20) DEFAULT \'disponible\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_sante ADD lien_reunion VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE groupe_soutien DROP image');
        $this->addSql('ALTER TABLE quiz_mental DROP statut');
    }
}
