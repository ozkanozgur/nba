<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191102233019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, short_name VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistic (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, opponent_id INT DEFAULT NULL, player VARCHAR(150) NOT NULL, date DATE NOT NULL, total_rebounds INT DEFAULT NULL, assists INT DEFAULT NULL, steals INT DEFAULT NULL, blocks INT DEFAULT NULL, points INT DEFAULT NULL, INDEX IDX_649B469C296CD8AE (team_id), INDEX IDX_649B469C7F656CDC (opponent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statistic ADD CONSTRAINT FK_649B469C296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE statistic ADD CONSTRAINT FK_649B469C7F656CDC FOREIGN KEY (opponent_id) REFERENCES team (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE statistic DROP FOREIGN KEY FK_649B469C296CD8AE');
        $this->addSql('ALTER TABLE statistic DROP FOREIGN KEY FK_649B469C7F656CDC');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE statistic');
    }
}
