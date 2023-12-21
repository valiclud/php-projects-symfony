<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221104242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE old_language CHANGE language language VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE original_text CHANGE text text VARCHAR(255) NOT NULL, CHANGE century century VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE original_text RENAME INDEX place_id TO IDX_31FECCF1DA6A219');
        $this->addSql('ALTER TABLE original_text RENAME INDEX old_language_id TO IDX_31FECCF1E9EE530');
        $this->addSql('ALTER TABLE translated_text CHANGE text text VARCHAR(255) DEFAULT NULL, CHANGE insert_date insert_date DATE NOT NULL');
        $this->addSql('ALTER TABLE translated_text RENAME INDEX original_text_id TO IDX_678AA343EF0D9BBF');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE old_language CHANGE language language VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE translated_text CHANGE text text LONGTEXT DEFAULT NULL, CHANGE insert_date insert_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE translated_text RENAME INDEX idx_678aa343ef0d9bbf TO original_text_id');
        $this->addSql('ALTER TABLE original_text CHANGE text text LONGTEXT NOT NULL, CHANGE century century INT NOT NULL');
        $this->addSql('ALTER TABLE original_text RENAME INDEX idx_31feccf1da6a219 TO place_id');
        $this->addSql('ALTER TABLE original_text RENAME INDEX idx_31feccf1e9ee530 TO old_language_id');
    }
}
