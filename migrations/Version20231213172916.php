<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213172916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE old_language (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(255) DEFAULT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE original_text (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, old_language_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, text_img LONGBLOB DEFAULT NULL, century VARCHAR(255) NOT NULL, insert_date DATE NOT NULL, hits INT NOT NULL, oldlanguage_id INT NOT NULL, INDEX IDX_31FECCF1DA6A219 (place_id), INDEX IDX_31FECCF1E9EE530 (old_language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, place VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE translated_text (id INT AUTO_INCREMENT NOT NULL, original_text_id INT DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, text VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, insert_date DATE NOT NULL, revision INT DEFAULT NULL, originaltext_id INT NOT NULL, INDEX IDX_678AA343EF0D9BBF (original_text_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE original_text ADD CONSTRAINT FK_31FECCF1DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE original_text ADD CONSTRAINT FK_31FECCF1E9EE530 FOREIGN KEY (old_language_id) REFERENCES old_language (id)');
        $this->addSql('ALTER TABLE translated_text ADD CONSTRAINT FK_678AA343EF0D9BBF FOREIGN KEY (original_text_id) REFERENCES original_text (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE original_text DROP FOREIGN KEY FK_31FECCF1DA6A219');
        $this->addSql('ALTER TABLE original_text DROP FOREIGN KEY FK_31FECCF1E9EE530');
        $this->addSql('ALTER TABLE translated_text DROP FOREIGN KEY FK_678AA343EF0D9BBF');
        $this->addSql('DROP TABLE old_language');
        $this->addSql('DROP TABLE original_text');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE translated_text');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
