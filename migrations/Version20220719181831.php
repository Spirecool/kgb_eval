<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719181831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Agent added';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, identification_code VARCHAR(50) NOT NULL, birthday DATE NOT NULL, nationality VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent_mission (agent_id INT NOT NULL, mission_id INT NOT NULL, INDEX IDX_423490963414710B (agent_id), INDEX IDX_42349096BE6CAE90 (mission_id), PRIMARY KEY(agent_id, mission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent_skill (agent_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_6793CC0F3414710B (agent_id), INDEX IDX_6793CC0F5585C142 (skill_id), PRIMARY KEY(agent_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_mission ADD CONSTRAINT FK_423490963414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_mission ADD CONSTRAINT FK_42349096BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_skill ADD CONSTRAINT FK_6793CC0F3414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_skill ADD CONSTRAINT FK_6793CC0F5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_mission DROP FOREIGN KEY FK_423490963414710B');
        $this->addSql('ALTER TABLE agent_skill DROP FOREIGN KEY FK_6793CC0F3414710B');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE agent_mission');
        $this->addSql('DROP TABLE agent_skill');
    }
}
