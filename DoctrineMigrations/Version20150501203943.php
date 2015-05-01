<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add corp blueprint
 */
class Version20150501203943 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("CREATE TABLE corpBlueprint (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, quantity BIGINT NOT NULL, flag INT NOT NULL, timeEfficiency INT UNSIGNED NOT NULL, materialEfficiency INT UNSIGNED NOT NULL, runs INT NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (itemId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;");
        $this->addSql("DROP INDEX job_owner ON corpIndustryJob;");
        $this->addSql("ALTER TABLE corpIndustryJob ADD installerName VARCHAR(255) NOT NULL, ADD facilityID BIGINT UNSIGNED NOT NULL, ADD solarSystemID BIGINT UNSIGNED NOT NULL, ADD solarSystemName VARCHAR(255) NOT NULL, ADD stationID BIGINT UNSIGNED NOT NULL, ADD blueprintID BIGINT UNSIGNED NOT NULL, ADD blueprintTypeID BIGINT UNSIGNED NOT NULL, ADD blueprintTypeName VARCHAR(255) NOT NULL, ADD blueprintLocationID BIGINT UNSIGNED NOT NULL, ADD cost BIGINT UNSIGNED NOT NULL, ADD teamID BIGINT UNSIGNED NOT NULL, ADD licensedRuns BIGINT UNSIGNED NOT NULL, ADD probability BIGINT UNSIGNED NOT NULL, ADD productTypeID BIGINT UNSIGNED NOT NULL, ADD productTypeName VARCHAR(255) NOT NULL, ADD status SMALLINT UNSIGNED NOT NULL, ADD timeInSeconds BIGINT UNSIGNED NOT NULL, ADD startDate DATETIME NOT NULL, ADD endDate DATETIME NOT NULL, ADD pauseDate DATETIME NOT NULL, ADD completedDate DATETIME NOT NULL, ADD completedCharacterID BIGINT UNSIGNED NOT NULL, ADD successfulRuns BIGINT UNSIGNED NOT NULL, DROP ownerID, DROP assemblyLineID, DROP containerID, DROP containerLocationID, DROP containerTypeID, DROP installedInSolarSystemID, DROP installedItemCopy, DROP installedItemID, DROP installedItemLocationID, DROP installedItemQuantity, DROP installedItemTypeID, DROP outputTypeID, DROP licensedProductionRuns, DROP installedItemMaterialLevel, DROP installedItemProductivityLevel, DROP installedItemLicensedProductionRunsRemaining, DROP beginProductionTime, DROP endProductionTime, DROP installTime, DROP pauseProductionTime, DROP completed, DROP completedStatus, DROP completedSuccessfully, DROP installedItemFlag, DROP outputFlag, DROP materialMultiplier, DROP charMaterialMultiplier, DROP charTimeMultiplier, DROP timeMultiplier;");
        $this->addSql("CREATE UNIQUE INDEX job_owner ON corpIndustryJob (jobId, installerId)");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
