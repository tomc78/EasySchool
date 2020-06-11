<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611113745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, start_hour TIME NOT NULL, end_hour TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_subject (planning_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_26A363913D865311 (planning_id), INDEX IDX_26A3639123EDC87 (subject_id), PRIMARY KEY(planning_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profils (id INT AUTO_INCREMENT NOT NULL, rank_id INT NOT NULL, name VARCHAR(255) NOT NULL, function VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, INDEX IDX_75831F5E7616678F (rank_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rank (id INT AUTO_INCREMENT NOT NULL, grade VARCHAR(255) NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, coefficient VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A363913D865311 FOREIGN KEY (planning_id) REFERENCES planning (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE planning_subject ADD CONSTRAINT FK_26A3639123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profils ADD CONSTRAINT FK_75831F5E7616678F FOREIGN KEY (rank_id) REFERENCES rank (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A363913D865311');
        $this->addSql('ALTER TABLE profils DROP FOREIGN KEY FK_75831F5E7616678F');
        $this->addSql('ALTER TABLE planning_subject DROP FOREIGN KEY FK_26A3639123EDC87');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE planning_subject');
        $this->addSql('DROP TABLE profils');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE subject');
    }
}
