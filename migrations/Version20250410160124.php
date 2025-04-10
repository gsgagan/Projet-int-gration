<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410160124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_type (id INT AUTO_INCREMENT NOT NULL, artist_id_id INT DEFAULT NULL, type_id_id INT DEFAULT NULL, INDEX IDX_141633AA1F48AE04 (artist_id_id), INDEX IDX_141633AA714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA1F48AE04 FOREIGN KEY (artist_id_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artiste_type ADD CONSTRAINT FK_141633AA714819A0 FOREIGN KEY (type_id_id) REFERENCES types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA1F48AE04');
        $this->addSql('ALTER TABLE artiste_type DROP FOREIGN KEY FK_141633AA714819A0');
        $this->addSql('DROP TABLE artiste_type');
    }
}
