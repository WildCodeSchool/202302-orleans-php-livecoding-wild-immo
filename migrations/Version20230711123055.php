<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711123055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE estate_caracteristic (id INT AUTO_INCREMENT NOT NULL, caracteristic_id INT DEFAULT NULL, estate_id INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_79D0FD4881194CF4 (caracteristic_id), INDEX IDX_79D0FD48900733ED (estate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE estate_caracteristic ADD CONSTRAINT FK_79D0FD4881194CF4 FOREIGN KEY (caracteristic_id) REFERENCES caracteristic (id)');
        $this->addSql('ALTER TABLE estate_caracteristic ADD CONSTRAINT FK_79D0FD48900733ED FOREIGN KEY (estate_id) REFERENCES estate (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estate_caracteristic DROP FOREIGN KEY FK_79D0FD4881194CF4');
        $this->addSql('ALTER TABLE estate_caracteristic DROP FOREIGN KEY FK_79D0FD48900733ED');
        $this->addSql('DROP TABLE estate_caracteristic');
    }
}
