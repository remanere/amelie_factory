<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201142455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_invoice (id INT AUTO_INCREMENT NOT NULL, invoice_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, price_product INT NOT NULL, INDEX IDX_4F6DCEF72989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, purchase_id INT NOT NULL, total INT NOT NULL, is_payed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_90651744558FBEB9 (purchase_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_invoice ADD CONSTRAINT FK_4F6DCEF72989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_invoice DROP FOREIGN KEY FK_4F6DCEF72989F1FD');
        $this->addSql('DROP TABLE content_invoice');
        $this->addSql('DROP TABLE invoice');
    }
}
