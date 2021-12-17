<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215105125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_9474526C4584665A ON comment (product_id)');
        $this->addSql('ALTER TABLE media ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_6A2CA10C4584665A ON media (product_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY product_ibfk_2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY product_ibfk_1');
        $this->addSql('ALTER TABLE product CHANGE type_id type_id INT DEFAULT NULL, CHANGE brand_id brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_D34A04ADC54C8C93 ON product (type_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD44F5D008 ON product (brand_id)');
        $this->addSql('ALTER TABLE type MODIFY type_id INT NOT NULL');
        $this->addSql('ALTER TABLE type DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE type CHANGE type_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE type ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4584665A');
        $this->addSql('DROP INDEX IDX_9474526C4584665A ON comment');
        $this->addSql('ALTER TABLE comment DROP product_id');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C4584665A');
        $this->addSql('DROP INDEX IDX_6A2CA10C4584665A ON media');
        $this->addSql('ALTER TABLE media DROP product_id');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC54C8C93');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('DROP INDEX IDX_D34A04ADC54C8C93 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD44F5D008 ON product');
        $this->addSql('ALTER TABLE product CHANGE type_id type_id INT NOT NULL, CHANGE brand_id brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT product_ibfk_2 FOREIGN KEY (id) REFERENCES type (type_id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT product_ibfk_1 FOREIGN KEY (id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE type MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE type DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE type CHANGE id type_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE type ADD PRIMARY KEY (type_id)');
    }
}
