<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627122131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estate ADD estate_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE estate ADD CONSTRAINT FK_8C4A1AAC74A72EF8 FOREIGN KEY (estate_category_id) REFERENCES estate_category (id)');
        $this->addSql('CREATE INDEX IDX_8C4A1AAC74A72EF8 ON estate (estate_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estate DROP FOREIGN KEY FK_8C4A1AAC74A72EF8');
        $this->addSql('DROP INDEX IDX_8C4A1AAC74A72EF8 ON estate');
        $this->addSql('ALTER TABLE estate DROP estate_category_id');
    }
}
