<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106153114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE body_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, mark_id INT NOT NULL, engine_size_id INT NOT NULL, body_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, year DATETIME NOT NULL, INDEX IDX_773DE69D4290F12B (mark_id), INDEX IDX_773DE69DDBBE054C (engine_size_id), INDEX IDX_773DE69D2CBA3505 (body_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine_size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mark (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D4290F12B FOREIGN KEY (mark_id) REFERENCES mark (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DDBBE054C FOREIGN KEY (engine_size_id) REFERENCES engine_size (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D2CBA3505 FOREIGN KEY (body_type_id) REFERENCES body_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D2CBA3505');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DDBBE054C');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D4290F12B');
        $this->addSql('DROP TABLE body_type');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE engine_size');
        $this->addSql('DROP TABLE mark');
    }
}
