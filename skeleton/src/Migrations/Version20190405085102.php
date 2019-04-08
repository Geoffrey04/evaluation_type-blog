<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190405085102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments ADD user_id INT NOT NULL, ADD art_id INT NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A1FFD30F4 FOREIGN KEY (art_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A9D86650F ON comments (user_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A1FFD30F4 ON comments (art_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A9D86650F');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A1FFD30F4');
        $this->addSql('DROP INDEX IDX_5F9E962A9D86650F ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A1FFD30F4 ON comments');
        $this->addSql('ALTER TABLE comments DROP user_id, DROP art_id');
    }
}
