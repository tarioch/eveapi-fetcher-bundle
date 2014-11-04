<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141104205214 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE charAttributeEnhancer');
        $this->addSql('DROP INDEX entry_owner ON charWalletJournal');
        $this->addSql('CREATE UNIQUE INDEX entry_owner ON charWalletJournal (refId, ownerId)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE charAttributeEnhancer (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, augmentatorValue INT UNSIGNED NOT NULL, augmentatorName VARCHAR(255) NOT NULL, bonusName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_2B6C1A96DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE charAttributeEnhancer ADD CONSTRAINT FK_2B6C1A96DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('DROP INDEX entry_owner ON charWalletJournal');
        $this->addSql('CREATE UNIQUE INDEX entry_owner ON charWalletJournal (refID, ownerID, accountKey)');
    }
}
