<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611114835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE exams (id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, INDEX IDX_6931132823EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exams_profils (exams_id INT NOT NULL, profils_id INT NOT NULL, INDEX IDX_266AC0A7602E93A9 (exams_id), INDEX IDX_266AC0A7B9881AFB (profils_id), PRIMARY KEY(exams_id, profils_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exams ADD CONSTRAINT FK_6931132823EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE exams_profils ADD CONSTRAINT FK_266AC0A7602E93A9 FOREIGN KEY (exams_id) REFERENCES exams (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exams_profils ADD CONSTRAINT FK_266AC0A7B9881AFB FOREIGN KEY (profils_id) REFERENCES profils (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exams_profils DROP FOREIGN KEY FK_266AC0A7602E93A9');
        $this->addSql('DROP TABLE exams');
        $this->addSql('DROP TABLE exams_profils');
    }
}
