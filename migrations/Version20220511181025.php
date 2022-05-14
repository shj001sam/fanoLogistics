<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511181025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acceuil (id INT AUTO_INCREMENT NOT NULL, banner_img VARCHAR(255) NOT NULL, banner_title VARCHAR(255) NOT NULL, banner_text LONGTEXT NOT NULL, desc_vtc_img VARCHAR(255) NOT NULL, desc_vtc_title VARCHAR(255) NOT NULL, desc_vtc_text LONGTEXT NOT NULL, desc_liv_img VARCHAR(255) NOT NULL, desc_liv_title VARCHAR(255) NOT NULL, desc_liv_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apropos (id INT AUTO_INCREMENT NOT NULL, desc_img VARCHAR(255) NOT NULL, desc_title VARCHAR(255) NOT NULL, desc_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, number1 INT NOT NULL, number2 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, banner_img VARCHAR(255) NOT NULL, banner_title VARCHAR(255) NOT NULL, banner_text LONGTEXT NOT NULL, desc_img VARCHAR(255) NOT NULL, desc_title VARCHAR(255) NOT NULL, desc_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vtc (id INT AUTO_INCREMENT NOT NULL, banner_img VARCHAR(255) NOT NULL, banner_title VARCHAR(255) NOT NULL, banner_text LONGTEXT NOT NULL, desc_img VARCHAR(255) NOT NULL, desc_title VARCHAR(255) NOT NULL, desc_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE acceuil');
        $this->addSql('DROP TABLE apropos');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE vtc');
    }
}
