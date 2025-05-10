<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250510193654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE tag_shows (tag_id INT NOT NULL, shows_id INT NOT NULL, INDEX IDX_4ED7E842BAD26311 (tag_id), INDEX IDX_4ED7E842AD7ED998 (shows_id), PRIMARY KEY(tag_id, shows_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag_shows ADD CONSTRAINT FK_4ED7E842BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag_shows ADD CONSTRAINT FK_4ED7E842AD7ED998 FOREIGN KEY (shows_id) REFERENCES shows (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag ADD relation VARCHAR(255) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE tag_shows DROP FOREIGN KEY FK_4ED7E842BAD26311
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag_shows DROP FOREIGN KEY FK_4ED7E842AD7ED998
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE tag_shows
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag DROP relation
        SQL);
    }
}
