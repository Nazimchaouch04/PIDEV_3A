<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260301090723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_sante DROP FOREIGN KEY FK_5CA29E937A45358C');
        $this->addSql('ALTER TABLE evenement_sante ADD CONSTRAINT FK_5CA29E937A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB01998FB88E14F');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB019987A45358C');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB01998FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB019987A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_mental DROP FOREIGN KEY FK_9DD826AFB88E14F');
        $this->addSql('ALTER TABLE quiz_mental ADD CONSTRAINT FK_9DD826AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6F1A5C10');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_sport DROP FOREIGN KEY FK_593FC9EFB88E14F');
        $this->addSql('ALTER TABLE seance_sport ADD CONSTRAINT FK_593FC9EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_sante DROP FOREIGN KEY FK_5CA29E937A45358C');
        $this->addSql('ALTER TABLE evenement_sante ADD CONSTRAINT FK_5CA29E937A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id)');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB01998FB88E14F');
        $this->addSql('ALTER TABLE membre_groupe DROP FOREIGN KEY FK_9EB019987A45358C');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB01998FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB019987A45358C FOREIGN KEY (groupe_id) REFERENCES groupe_soutien (id)');
        $this->addSql('ALTER TABLE quiz_mental DROP FOREIGN KEY FK_9DD826AFB88E14F');
        $this->addSql('ALTER TABLE quiz_mental ADD CONSTRAINT FK_9DD826AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6F1A5C10');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE seance_sport DROP FOREIGN KEY FK_593FC9EFB88E14F');
        $this->addSql('ALTER TABLE seance_sport ADD CONSTRAINT FK_593FC9EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }
}
