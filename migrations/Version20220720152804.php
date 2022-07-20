<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720152804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Target table added';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE target (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, target_code_name VARCHAR(255) NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, nationality VARCHAR(50) NOT NULL, INDEX IDX_466F2FFCBE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFCBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE target');
    }
}
