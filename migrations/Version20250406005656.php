<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406005656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation ADD show_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representation ADD CONSTRAINT FK_29D5499ED0C1FC64 FOREIGN KEY (show_id) REFERENCES `show` (id)');
        $this->addSql('CREATE INDEX IDX_29D5499ED0C1FC64 ON representation (show_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation DROP FOREIGN KEY FK_29D5499ED0C1FC64');
        $this->addSql('DROP INDEX IDX_29D5499ED0C1FC64 ON representation');
        $this->addSql('ALTER TABLE representation DROP show_id');
    }
}
