<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250420201949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, show_id_id INT DEFAULT NULL, tag VARCHAR(20) NOT NULL, INDEX IDX_6FBC94267DF5FA8B (show_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267DF5FA8B FOREIGN KEY (show_id_id) REFERENCES shows (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94267DF5FA8B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE tags
        SQL);
    }
}
