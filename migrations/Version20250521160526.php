<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250521160526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE artists ADD troupe_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artists ADD CONSTRAINT FK_68D3801EEF084B38 FOREIGN KEY (troupe_id) REFERENCES troupe (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_68D3801EEF084B38 ON artists (troupe_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE artists DROP FOREIGN KEY FK_68D3801EEF084B38
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_68D3801EEF084B38 ON artists
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artists DROP troupe_id
        SQL);
    }
}
