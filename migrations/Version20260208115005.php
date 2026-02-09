<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260208115005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment ADD type_aliment VARCHAR(50) DEFAULT NULL, ADD multi_score DOUBLE PRECISION DEFAULT NULL, ADD nutri_score VARCHAR(1) DEFAULT NULL, ADD proteines DOUBLE PRECISION DEFAULT NULL, ADD glucides DOUBLE PRECISION DEFAULT NULL, ADD lipides DOUBLE PRECISION DEFAULT NULL, CHANGE index_glycemique index_glycemique INT DEFAULT NULL, CHANGE repas_id repas_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment DROP type_aliment, DROP multi_score, DROP nutri_score, DROP proteines, DROP glucides, DROP lipides, CHANGE index_glycemique index_glycemique INT NOT NULL, CHANGE repas_id repas_id INT NOT NULL');
    }
}
