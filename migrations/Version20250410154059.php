<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410154059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localities (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE representations (id INT AUTO_INCREMENT NOT NULL, showshow_id_id INT DEFAULT NULL, location_id_id INT DEFAULT NULL, schedule DATETIME NOT NULL, INDEX IDX_C90A401E5C09E (showshow_id_id), INDEX IDX_C90A401918DB72 (location_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401E5C09E FOREIGN KEY (showshow_id_id) REFERENCES shows (id)');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401918DB72 FOREIGN KEY (location_id_id) REFERENCES locations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401E5C09E');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401918DB72');
        $this->addSql('DROP TABLE localities');
        $this->addSql('DROP TABLE representations');
    }
}
