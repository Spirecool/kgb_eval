<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721091848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_268B9C9DEFD2C16A ON agent');
        $this->addSql('ALTER TABLE agent DROP mission_id_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638EFD2C16A');
        $this->addSql('DROP INDEX IDX_4C62E638EFD2C16A ON contact');
        $this->addSql('ALTER TABLE contact DROP mission_id_id');
        $this->addSql('ALTER TABLE hideout DROP FOREIGN KEY FK_2C2FE159EFD2C16A');
        $this->addSql('DROP INDEX IDX_2C2FE159EFD2C16A ON hideout');
        $this->addSql('ALTER TABLE hideout DROP mission_id_id');
        $this->addSql('ALTER TABLE target DROP FOREIGN KEY FK_466F2FFCEFD2C16A');
        $this->addSql('DROP INDEX IDX_466F2FFCEFD2C16A ON target');
        $this->addSql('ALTER TABLE target DROP mission_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD mission_id_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_268B9C9DEFD2C16A ON agent (mission_id_id)');
        $this->addSql('ALTER TABLE contact ADD mission_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638EFD2C16A FOREIGN KEY (mission_id_id) REFERENCES mission (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638EFD2C16A ON contact (mission_id_id)');
        $this->addSql('ALTER TABLE hideout ADD mission_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hideout ADD CONSTRAINT FK_2C2FE159EFD2C16A FOREIGN KEY (mission_id_id) REFERENCES mission (id)');
        $this->addSql('CREATE INDEX IDX_2C2FE159EFD2C16A ON hideout (mission_id_id)');
        $this->addSql('ALTER TABLE target ADD mission_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFCEFD2C16A FOREIGN KEY (mission_id_id) REFERENCES mission (id)');
        $this->addSql('CREATE INDEX IDX_466F2FFCEFD2C16A ON target (mission_id_id)');
    }
}
