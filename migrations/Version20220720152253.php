<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720152253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Agent table added';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, skill_id INT DEFAULT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, identification_code VARCHAR(50) NOT NULL, birthday DATE NOT NULL, nationality VARCHAR(50) NOT NULL, INDEX IDX_268B9C9DBE6CAE90 (mission_id), INDEX IDX_268B9C9D5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent');
    }
}
