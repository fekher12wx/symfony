<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241101134755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment ADD CONSTRAINT FK_CD632DF0B7EE414B FOREIGN KEY (listingId) REFERENCES listing (listingId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE64B64DCC FOREIGN KEY (userId) REFERENCES user (userId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEB7EE414B FOREIGN KEY (listingId) REFERENCES listing (listingId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D4CF60E67C FOREIGN KEY (owner) REFERENCES user (userId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DEBBDD5AA FOREIGN KEY (bookingId) REFERENCES booking (bookingId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C664B64DCC FOREIGN KEY (userId) REFERENCES user (userId) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6B7EE414B FOREIGN KEY (listingId) REFERENCES listing (listingId) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment DROP FOREIGN KEY FK_CD632DF0B7EE414B');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D4CF60E67C');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C664B64DCC');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6B7EE414B');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE64B64DCC');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEB7EE414B');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DEBBDD5AA');
    }
}
