<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410164746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locations ADD locality_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locations ADD CONSTRAINT FK_17E64ABABEC99553 FOREIGN KEY (locality_id_id) REFERENCES localities (id)');
        $this->addSql('CREATE INDEX IDX_17E64ABABEC99553 ON locations (locality_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locations DROP FOREIGN KEY FK_17E64ABABEC99553');
        $this->addSql('DROP INDEX IDX_17E64ABABEC99553 ON locations');
        $this->addSql('ALTER TABLE locations DROP locality_id_id');
    }
}
