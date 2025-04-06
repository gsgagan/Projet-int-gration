<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406005455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation DROP FOREIGN KEY FK_29D5499EEFD836C1');
        $this->addSql('DROP INDEX IDX_29D5499EEFD836C1 ON representation');
        $this->addSql('ALTER TABLE representation CHANGE related_show_id location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representation ADD CONSTRAINT FK_29D5499E64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_29D5499E64D218E ON representation (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation DROP FOREIGN KEY FK_29D5499E64D218E');
        $this->addSql('DROP INDEX IDX_29D5499E64D218E ON representation');
        $this->addSql('ALTER TABLE representation CHANGE location_id related_show_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representation ADD CONSTRAINT FK_29D5499EEFD836C1 FOREIGN KEY (related_show_id) REFERENCES `show` (id)');
        $this->addSql('CREATE INDEX IDX_29D5499EEFD836C1 ON representation (related_show_id)');
    }
}
