<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719180255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Hideout added';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hideout (id INT AUTO_INCREMENT NOT NULL, code_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(50) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('CREATE INDEX IDX_9067F23C5585C142 ON mission (skill_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hideout');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C5585C142');
        $this->addSql('DROP INDEX IDX_9067F23C5585C142 ON mission');
        $this->addSql('ALTER TABLE mission DROP skill_id');
    }
}
