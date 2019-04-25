<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180210181754 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, site VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, phone VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reaction (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, rezume_id INT DEFAULT NULL, send_time DATETIME NOT NULL, reaction DATETIME NOT NULL, UNIQUE INDEX UNIQ_A4D707F7979B1AD6 (company_id), UNIQUE INDEX UNIQ_A4D707F747FAEADA (rezume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rezume (id INT AUTO_INCREMENT NOT NULL, position VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1DC99F2A462CE4F5 (position), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F7979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F747FAEADA FOREIGN KEY (rezume_id) REFERENCES rezume (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F7979B1AD6');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F747FAEADA');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE reaction');
        $this->addSql('DROP TABLE rezume');
    }
}
