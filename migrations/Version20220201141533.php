<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201141533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_list_product (id INT AUTO_INCREMENT NOT NULL, list_product_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_B8DD51F9FA91286 (list_product_id), INDEX IDX_B8DD51F4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_product (id INT AUTO_INCREMENT NOT NULL, purchase_id INT NOT NULL, UNIQUE INDEX UNIQ_F05D9A0558FBEB9 (purchase_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_list_product ADD CONSTRAINT FK_B8DD51F9FA91286 FOREIGN KEY (list_product_id) REFERENCES list_product (id)');
        $this->addSql('ALTER TABLE content_list_product ADD CONSTRAINT FK_B8DD51F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE list_product ADD CONSTRAINT FK_F05D9A0558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_list_product DROP FOREIGN KEY FK_B8DD51F9FA91286');
        $this->addSql('DROP TABLE content_list_product');
        $this->addSql('DROP TABLE list_product');
    }
}
