<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406010453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, price NUMERIC(10, 2) NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE representation_reservation (id INT AUTO_INCREMENT NOT NULL, representation_id INT NOT NULL, reservation_id INT NOT NULL, price_id INT NOT NULL, seats INT NOT NULL, INDEX IDX_A3F4FD3646CE82F4 (representation_id), INDEX IDX_A3F4FD36B83297E7 (reservation_id), INDEX IDX_A3F4FD36D614C7E7 (price_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD3646CE82F4 FOREIGN KEY (representation_id) REFERENCES representation (id)');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD36B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE representation_reservation ADD CONSTRAINT FK_A3F4FD36D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD3646CE82F4');
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD36B83297E7');
        $this->addSql('ALTER TABLE representation_reservation DROP FOREIGN KEY FK_A3F4FD36D614C7E7');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE representation_reservation');
    }
}
