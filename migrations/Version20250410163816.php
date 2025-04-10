<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410163816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role_user (id INT AUTO_INCREMENT NOT NULL, role_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, INDEX IDX_332CA4DD88987678 (role_id_id), INDEX IDX_332CA4DD9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DD88987678 FOREIGN KEY (role_id_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DD9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DD88987678');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DD9D86650F');
        $this->addSql('DROP TABLE role_user');
    }
}
