<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191102233951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE statistic DROP FOREIGN KEY FK_649B469C296CD8AE');
        $this->addSql('ALTER TABLE statistic DROP FOREIGN KEY FK_649B469C7F656CDC');
        $this->addSql('DROP INDEX IDX_649B469C7F656CDC ON statistic');
        $this->addSql('DROP INDEX IDX_649B469C296CD8AE ON statistic');
        $this->addSql('ALTER TABLE statistic ADD team VARCHAR(255) NOT NULL, ADD opponent VARCHAR(255) NOT NULL, DROP team_id, DROP opponent_id, CHANGE total_rebounds total_rebounds INT DEFAULT NULL, CHANGE assists assists INT DEFAULT NULL, CHANGE steals steals INT DEFAULT NULL, CHANGE blocks blocks INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE statistic ADD team_id INT NOT NULL, ADD opponent_id INT DEFAULT NULL, DROP team, DROP opponent, CHANGE total_rebounds total_rebounds INT DEFAULT NULL, CHANGE assists assists INT DEFAULT NULL, CHANGE steals steals INT DEFAULT NULL, CHANGE blocks blocks INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statistic ADD CONSTRAINT FK_649B469C296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE statistic ADD CONSTRAINT FK_649B469C7F656CDC FOREIGN KEY (opponent_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_649B469C7F656CDC ON statistic (opponent_id)');
        $this->addSql('CREATE INDEX IDX_649B469C296CD8AE ON statistic (team_id)');
    }
}
