<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250521160342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE troupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, logo_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating DROP FOREIGN KEY FK_D8892622AD7ED998
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D8892622AD7ED998 ON rating
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating CHANGE score score INT DEFAULT NULL, CHANGE shows_id spectacle_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD CONSTRAINT FK_D8892622C682915D FOREIGN KEY (spectacle_id) REFERENCES shows (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D8892622C682915D ON rating (spectacle_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE troupe
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating DROP FOREIGN KEY FK_D8892622C682915D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D8892622C682915D ON rating
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating CHANGE score score INT NOT NULL, CHANGE spectacle_id shows_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rating ADD CONSTRAINT FK_D8892622AD7ED998 FOREIGN KEY (shows_id) REFERENCES shows (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D8892622AD7ED998 ON rating (shows_id)
        SQL);
    }
}
