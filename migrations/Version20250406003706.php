<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406003706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `show` (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, slug VARCHAR(30) NOT NULL, title VARCHAR(255) NOT NULL, poster_url VARCHAR(255) NOT NULL, duration INT NOT NULL, created_in INT NOT NULL, bookable TINYINT(1) NOT NULL, INDEX IDX_320ED90164D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED90164D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('DROP TABLE shows');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shows (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, poster_url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, duration INT NOT NULL, created_in INT NOT NULL, bookable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED90164D218E');
        $this->addSql('DROP TABLE `show`');
    }
}
