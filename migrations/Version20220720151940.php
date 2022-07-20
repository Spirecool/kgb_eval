<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220720151940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Mission table added';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, skill_id INT DEFAULT NULL, user_id INT DEFAULT NULL, mission_code_name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, mission_type VARCHAR(50) NOT NULL, mission_status VARCHAR(40) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_9067F23C5585C142 (skill_id), INDEX IDX_9067F23CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mission');
    }
}
