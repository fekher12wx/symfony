<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114130032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment DROP FOREIGN KEY FK_CD632DF0B7EE414B');
        $this->addSql('DROP INDEX UNIQ_CD632DF0B7EE414B ON appartment');
        $this->addSql('ALTER TABLE appartment ADD date_of_publish DATETIME NOT NULL, DROP listingId');
        $this->addSql('ALTER TABLE listing ADD appartment_id INT NOT NULL');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D42714DC20 FOREIGN KEY (appartment_id) REFERENCES appartment (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_CB0048D42714DC20 ON listing (appartment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment ADD listingId INT NOT NULL, DROP date_of_publish');
        $this->addSql('ALTER TABLE appartment ADD CONSTRAINT FK_CD632DF0B7EE414B FOREIGN KEY (listingId) REFERENCES listing (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CD632DF0B7EE414B ON appartment (listingId)');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D42714DC20');
        $this->addSql('DROP INDEX IDX_CB0048D42714DC20 ON listing');
        $this->addSql('ALTER TABLE listing DROP appartment_id');
    }
}
