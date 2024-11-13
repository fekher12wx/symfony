<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241113130001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment MODIFY appartement_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON appartment');
        $this->addSql('ALTER TABLE appartment CHANGE appartement_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE appartment ADD CONSTRAINT FK_CD632DF0B7EE414B FOREIGN KEY (listingId) REFERENCES listing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartment ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE booking MODIFY booking_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON booking');
        $this->addSql('ALTER TABLE booking CHANGE booking_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE64B64DCC FOREIGN KEY (userId) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEB7EE414B FOREIGN KEY (listingId) REFERENCES listing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE listing MODIFY listing_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON listing');
        $this->addSql('ALTER TABLE listing CHANGE listing_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D4CF60E67C FOREIGN KEY (owner) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE listing ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE payment MODIFY payment_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON payment');
        $this->addSql('ALTER TABLE payment CHANGE payment_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DEBBDD5AA FOREIGN KEY (bookingId) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE payment ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE review MODIFY review_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON review');
        $this->addSql('ALTER TABLE review CHANGE review_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C664B64DCC FOREIGN KEY (userId) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6B7EE414B FOREIGN KEY (listingId) REFERENCES listing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user MODIFY user_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON user');
        $this->addSql('ALTER TABLE user CHANGE user_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE appartment DROP FOREIGN KEY FK_CD632DF0B7EE414B');
        $this->addSql('DROP INDEX `PRIMARY` ON appartment');
        $this->addSql('ALTER TABLE appartment CHANGE id appartement_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE appartment ADD PRIMARY KEY (appartement_id)');
        $this->addSql('ALTER TABLE booking MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE64B64DCC');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEB7EE414B');
        $this->addSql('DROP INDEX `PRIMARY` ON booking');
        $this->addSql('ALTER TABLE booking CHANGE id booking_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD PRIMARY KEY (booking_id)');
        $this->addSql('ALTER TABLE listing MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D4CF60E67C');
        $this->addSql('DROP INDEX `PRIMARY` ON listing');
        $this->addSql('ALTER TABLE listing CHANGE id listing_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE listing ADD PRIMARY KEY (listing_id)');
        $this->addSql('ALTER TABLE payment MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DEBBDD5AA');
        $this->addSql('DROP INDEX `PRIMARY` ON payment');
        $this->addSql('ALTER TABLE payment CHANGE id payment_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE payment ADD PRIMARY KEY (payment_id)');
        $this->addSql('ALTER TABLE review MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C664B64DCC');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6B7EE414B');
        $this->addSql('DROP INDEX `PRIMARY` ON review');
        $this->addSql('ALTER TABLE review CHANGE id review_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE review ADD PRIMARY KEY (review_id)');
        $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON user');
        $this->addSql('ALTER TABLE user CHANGE id user_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (user_id)');
    }
}
