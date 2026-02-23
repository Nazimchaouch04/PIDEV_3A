<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260217120607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add missing certification table and fix specialist table';
    }

    public function up(Schema $schema): void
    {
        // Create certification table
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, specialite VARCHAR(100) NOT NULL, numero_enregistrement VARCHAR(100) NOT NULL, diplome_filename VARCHAR(255) DEFAULT NULL, motivation TEXT NOT NULL, statut VARCHAR(20) NOT NULL, utilisateur_id INT NOT NULL, UNIQUE INDEX UNIQ_AE5D6F4CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        
        // Add foreign key for certification
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_AE5D6F4CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        
        // Add utilisateur_id column to specialiste table
        $this->addSql('ALTER TABLE specialiste ADD utilisateur_id INT NOT NULL');
        
        // Add foreign key for specialiste
        $this->addSql('ALTER TABLE specialiste ADD CONSTRAINT FK_95D19117FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        
        // Make utilisateur_id unique in specialiste table
        $this->addSql('ALTER TABLE specialiste ADD UNIQUE INDEX UNIQ_95D19117FB88E14F (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // Remove foreign keys
        $this->addSql('ALTER TABLE specialiste DROP FOREIGN KEY FK_95D19117FB88E14F');
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_AE5D6F4CFB88E14F');
        
        // Drop tables
        $this->addSql('DROP TABLE certification');
        
        // Remove utilisateur_id column from specialiste
        $this->addSql('ALTER TABLE specialiste DROP INDEX UNIQ_95D19117FB88E14F');
        $this->addSql('ALTER TABLE specialiste DROP COLUMN utilisateur_id');
    }
}
