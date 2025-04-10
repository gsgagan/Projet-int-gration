<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410164154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representation_reservation (id INT AUTO_INCREMENT NOT NULL, representation_id_id INT DEFAULT NULL, reservation_id_id INT DEFAULT NULL, price_id_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_A3F4FD36A1E50B04 (representation_id_id), INDEX IDX_A3F4FD363C3B4EF0 (reservation_id_id), INDEX IDX_A3F4FD36548D9637 (price_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD36A1E50B04 FOREIGN KEY (representation_id_id) REFERENCES representations (id)');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD363C3B4EF0 FOREIGN KEY (reservation_id_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD36548D9637 FOREIGN KEY (price_id_id) REFERENCES prices (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD36A1E50B04');
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD363C3B4EF0');
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD36548D9637');
        $this->addSql('DROP TABLE representation_reservation');
    }
}
