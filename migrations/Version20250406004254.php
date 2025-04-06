<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406004254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representation (id INT AUTO_INCREMENT NOT NULL, related_show_id INT DEFAULT NULL, schedule DATETIME NOT NULL, INDEX IDX_29D5499EEFD836C1 (related_show_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representation ADD CONSTRAINT FK_29D5499EEFD836C1 FOREIGN KEY (related_show_id) REFERENCES `show` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation DROP FOREIGN KEY FK_29D5499EEFD836C1');
        $this->addSql('DROP TABLE representation');
    }
}
