<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191103121041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, team VARCHAR(5) NOT NULL, opponent VARCHAR(5) NOT NULL, result VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statistic CHANGE total_rebounds total_rebounds INT DEFAULT NULL, CHANGE assists assists INT DEFAULT NULL, CHANGE steals steals INT DEFAULT NULL, CHANGE blocks blocks INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE game');
        $this->addSql('ALTER TABLE statistic CHANGE total_rebounds total_rebounds INT DEFAULT NULL, CHANGE assists assists INT DEFAULT NULL, CHANGE steals steals INT DEFAULT NULL, CHANGE blocks blocks INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
    }
}
