<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109151444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_begin DATE DEFAULT NULL, date_end DATE DEFAULT NULL, INDEX IDX_77E0ED58A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_time_zone (ad_id INT NOT NULL, time_zone_id INT NOT NULL, INDEX IDX_8B6F03F34F34D596 (ad_id), INDEX IDX_8B6F03F3CBAB9ECD (time_zone_id), PRIMARY KEY(ad_id, time_zone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_area (ad_id INT NOT NULL, area_id INT NOT NULL, INDEX IDX_6F5B6F0D4F34D596 (ad_id), INDEX IDX_6F5B6F0DBD0F409C (area_id), PRIMARY KEY(ad_id, area_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_html (id INT AUTO_INCREMENT NOT NULL, date_begin DATE DEFAULT NULL, date_end DATE DEFAULT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_picture (id INT AUTO_INCREMENT NOT NULL, date_begin DATE DEFAULT NULL, date_end DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stop (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_B95616B6BD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_zone (id INT AUTO_INCREMENT NOT NULL, start_time INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ad_time_zone ADD CONSTRAINT FK_8B6F03F34F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ad_time_zone ADD CONSTRAINT FK_8B6F03F3CBAB9ECD FOREIGN KEY (time_zone_id) REFERENCES time_zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ad_area ADD CONSTRAINT FK_6F5B6F0D4F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ad_area ADD CONSTRAINT FK_6F5B6F0DBD0F409C FOREIGN KEY (area_id) REFERENCES area (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stop ADD CONSTRAINT FK_B95616B6BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad_time_zone DROP FOREIGN KEY FK_8B6F03F34F34D596');
        $this->addSql('ALTER TABLE ad_area DROP FOREIGN KEY FK_6F5B6F0D4F34D596');
        $this->addSql('ALTER TABLE ad_area DROP FOREIGN KEY FK_6F5B6F0DBD0F409C');
        $this->addSql('ALTER TABLE stop DROP FOREIGN KEY FK_B95616B6BD0F409C');
        $this->addSql('ALTER TABLE ad_time_zone DROP FOREIGN KEY FK_8B6F03F3CBAB9ECD');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58A76ED395');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE ad_time_zone');
        $this->addSql('DROP TABLE ad_area');
        $this->addSql('DROP TABLE ad_html');
        $this->addSql('DROP TABLE ad_picture');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE stop');
        $this->addSql('DROP TABLE time_zone');
        $this->addSql('DROP TABLE user');
    }
}
