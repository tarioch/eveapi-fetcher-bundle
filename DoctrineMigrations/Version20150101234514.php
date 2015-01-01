<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Various missing migrations 
 */
class Version20150101234514 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE charAttributeEnhancer');
        $this->addSql('DROP INDEX job_owner ON corpIndustryJob');
        $this->addSql('ALTER TABLE corpIndustryJob ADD installerName VARCHAR(255) NOT NULL, ADD facilityID BIGINT UNSIGNED NOT NULL, ADD solarSystemID BIGINT UNSIGNED NOT NULL, ADD solarSystemName VARCHAR(255) NOT NULL, ADD stationID BIGINT UNSIGNED NOT NULL, ADD blueprintID BIGINT UNSIGNED NOT NULL, ADD blueprintTypeID BIGINT UNSIGNED NOT NULL, ADD blueprintTypeName VARCHAR(255) NOT NULL, ADD blueprintLocationID BIGINT UNSIGNED NOT NULL, ADD cost BIGINT UNSIGNED NOT NULL, ADD teamID BIGINT UNSIGNED NOT NULL, ADD licensedRuns BIGINT UNSIGNED NOT NULL, ADD probability BIGINT UNSIGNED NOT NULL, ADD productTypeID BIGINT UNSIGNED NOT NULL, ADD productTypeName VARCHAR(255) NOT NULL, ADD status SMALLINT UNSIGNED NOT NULL, ADD timeInSeconds BIGINT UNSIGNED NOT NULL, ADD startDate DATETIME NOT NULL, ADD endDate DATETIME NOT NULL, ADD pauseDate DATETIME NOT NULL, ADD completedDate DATETIME NOT NULL, ADD completedCharacterID BIGINT UNSIGNED NOT NULL, ADD successfulRuns BIGINT UNSIGNED NOT NULL, DROP ownerID, DROP assemblyLineID, DROP containerID, DROP containerLocationID, DROP containerTypeID, DROP installedInSolarSystemID, DROP installedItemCopy, DROP installedItemID, DROP installedItemLocationID, DROP installedItemQuantity, DROP installedItemTypeID, DROP outputTypeID, DROP licensedProductionRuns, DROP installedItemMaterialLevel, DROP installedItemProductivityLevel, DROP installedItemLicensedProductionRunsRemaining, DROP beginProductionTime, DROP endProductionTime, DROP installTime, DROP pauseProductionTime, DROP completed, DROP completedStatus, DROP completedSuccessfully, DROP installedItemFlag, DROP outputFlag, DROP materialMultiplier, DROP charMaterialMultiplier, DROP charTimeMultiplier, DROP timeMultiplier');
        $this->addSql('CREATE UNIQUE INDEX job_owner ON corpIndustryJob (jobId, installerId)');
        $this->addSql('CREATE UNIQUE INDEX message_owner ON charMailMessage (ownerId, messageId)');
        $this->addSql('CREATE UNIQUE INDEX entry_owner ON charWalletJournal (refId, ownerId)');
        $this->addSql('CREATE UNIQUE INDEX entry_owner ON corpWalletJournal (refId, ownerId, accountKey)');
        $this->addSql('CREATE UNIQUE INDEX transaction_owner ON charWalletTransaction (transactionId, ownerId)');
        $this->addSql('CREATE UNIQUE INDEX transaction_owner ON corpWalletTransaction (transactionId, ownerId, accountKey)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE charAttributeEnhancer (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, augmentatorValue INT UNSIGNED NOT NULL, augmentatorName VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, bonusName VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_2B6C1A96DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE charAttributeEnhancer ADD CONSTRAINT FK_2B6C1A96DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('DROP INDEX message_owner ON charMailMessage');
        $this->addSql('DROP INDEX entry_owner ON charWalletJournal');
        $this->addSql('DROP INDEX transaction_owner ON charWalletTransaction');
        $this->addSql('DROP INDEX job_owner ON corpIndustryJob');
        $this->addSql('ALTER TABLE corpIndustryJob ADD ownerID BIGINT UNSIGNED NOT NULL, ADD assemblyLineID BIGINT UNSIGNED NOT NULL, ADD containerID BIGINT UNSIGNED NOT NULL, ADD containerLocationID BIGINT UNSIGNED NOT NULL, ADD containerTypeID BIGINT UNSIGNED NOT NULL, ADD installedInSolarSystemID BIGINT UNSIGNED NOT NULL, ADD installedItemCopy BIGINT UNSIGNED NOT NULL, ADD installedItemID BIGINT UNSIGNED NOT NULL, ADD installedItemLocationID BIGINT UNSIGNED NOT NULL, ADD installedItemQuantity BIGINT UNSIGNED NOT NULL, ADD installedItemTypeID BIGINT UNSIGNED NOT NULL, ADD outputTypeID BIGINT UNSIGNED NOT NULL, ADD licensedProductionRuns BIGINT NOT NULL, ADD installedItemMaterialLevel BIGINT NOT NULL, ADD installedItemProductivityLevel BIGINT NOT NULL, ADD installedItemLicensedProductionRunsRemaining BIGINT NOT NULL, ADD beginProductionTime DATETIME NOT NULL, ADD endProductionTime DATETIME NOT NULL, ADD installTime DATETIME NOT NULL, ADD pauseProductionTime DATETIME NOT NULL, ADD completed TINYINT(1) NOT NULL, ADD completedSuccessfully SMALLINT UNSIGNED NOT NULL, ADD installedItemFlag SMALLINT UNSIGNED NOT NULL, ADD outputFlag SMALLINT UNSIGNED NOT NULL, ADD materialMultiplier NUMERIC(4, 2) NOT NULL, ADD charMaterialMultiplier NUMERIC(4, 2) NOT NULL, ADD charTimeMultiplier NUMERIC(4, 2) NOT NULL, ADD timeMultiplier NUMERIC(4, 2) NOT NULL, DROP installerName, DROP facilityID, DROP solarSystemID, DROP solarSystemName, DROP stationID, DROP blueprintID, DROP blueprintTypeID, DROP blueprintTypeName, DROP blueprintLocationID, DROP cost, DROP teamID, DROP licensedRuns, DROP probability, DROP productTypeID, DROP productTypeName, DROP timeInSeconds, DROP startDate, DROP endDate, DROP pauseDate, DROP completedDate, DROP completedCharacterID, DROP successfulRuns, CHANGE status completedStatus SMALLINT UNSIGNED NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX job_owner ON corpIndustryJob (jobID, ownerID)');
        $this->addSql('DROP INDEX entry_owner ON corpWalletJournal');
        $this->addSql('DROP INDEX transaction_owner ON corpWalletTransaction');
    }
}
