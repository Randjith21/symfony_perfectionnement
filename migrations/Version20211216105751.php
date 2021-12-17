<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216105751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, user_id INT DEFAULT NULL, product VARCHAR(255) NOT NULL, many_to_one VARCHAR(255) NOT NULL, INDEX IDX_AC6340B34584665A (product_id), INDEX IDX_AC6340B3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B34584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE command_product MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE command_product DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE command_product ADD command_id INT NOT NULL, ADD product_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE command_product ADD CONSTRAINT FK_3C20574E33E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE command_product ADD CONSTRAINT FK_3C20574E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_3C20574E33E1689A ON command_product (command_id)');
        $this->addSql('CREATE INDEX IDX_3C20574E4584665A ON command_product (product_id)');
        $this->addSql('ALTER TABLE command_product ADD PRIMARY KEY (command_id, product_id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `like`');
        $this->addSql('ALTER TABLE command_product DROP FOREIGN KEY FK_3C20574E33E1689A');
        $this->addSql('ALTER TABLE command_product DROP FOREIGN KEY FK_3C20574E4584665A');
        $this->addSql('DROP INDEX IDX_3C20574E33E1689A ON command_product');
        $this->addSql('DROP INDEX IDX_3C20574E4584665A ON command_product');
        $this->addSql('ALTER TABLE command_product ADD id INT AUTO_INCREMENT NOT NULL, DROP command_id, DROP product_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE roles roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE password password DOUBLE PRECISION NOT NULL');
    }
}
