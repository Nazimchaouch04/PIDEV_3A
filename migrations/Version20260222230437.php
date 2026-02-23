<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260222230437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP ai_summary');
        $this->addSql('ALTER TABLE rendez_vous ADD niveau_urgence INT DEFAULT NULL, DROP ai_priority');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD ai_summary LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD ai_priority VARCHAR(20) DEFAULT NULL, DROP niveau_urgence');
    }
}
