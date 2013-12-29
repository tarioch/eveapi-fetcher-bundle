<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp industry job, wallet transaction and wallet journal
 */
class Version20131230001216 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpIndustryJob (jobID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, assemblyLineID BIGINT UNSIGNED NOT NULL, containerID BIGINT UNSIGNED NOT NULL, containerLocationID BIGINT UNSIGNED NOT NULL, containerTypeID BIGINT UNSIGNED NOT NULL, installedInSolarSystemID BIGINT UNSIGNED NOT NULL, installedItemCopy BIGINT UNSIGNED NOT NULL, installedItemID BIGINT UNSIGNED NOT NULL, installedItemLocationID BIGINT UNSIGNED NOT NULL, installedItemQuantity BIGINT UNSIGNED NOT NULL, installedItemTypeID BIGINT UNSIGNED NOT NULL, installerID BIGINT UNSIGNED NOT NULL, outputLocationID BIGINT UNSIGNED NOT NULL, outputTypeID BIGINT UNSIGNED NOT NULL, runs BIGINT UNSIGNED NOT NULL, licensedProductionRuns BIGINT NOT NULL, installedItemMaterialLevel BIGINT NOT NULL, installedItemProductivityLevel BIGINT NOT NULL, installedItemLicensedProductionRunsRemaining BIGINT NOT NULL, beginProductionTime DATETIME NOT NULL, endProductionTime DATETIME NOT NULL, installTime DATETIME NOT NULL, pauseProductionTime DATETIME NOT NULL, completed TINYINT(1) NOT NULL, activityID SMALLINT UNSIGNED NOT NULL, completedStatus SMALLINT UNSIGNED NOT NULL, completedSuccessfully SMALLINT UNSIGNED NOT NULL, installedItemFlag SMALLINT UNSIGNED NOT NULL, outputFlag SMALLINT UNSIGNED NOT NULL, materialMultiplier NUMERIC(4, 2) NOT NULL, charMaterialMultiplier NUMERIC(4, 2) NOT NULL, charTimeMultiplier NUMERIC(4, 2) NOT NULL, timeMultiplier NUMERIC(4, 2) NOT NULL, PRIMARY KEY(jobID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE corpWalletTransaction (transactionID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, characterID BIGINT UNSIGNED DEFAULT NULL, characterName VARCHAR(255) DEFAULT NULL, clientID BIGINT UNSIGNED DEFAULT NULL, clientName VARCHAR(255) DEFAULT NULL, journalTransactionID BIGINT UNSIGNED NOT NULL, price NUMERIC(17, 2) NOT NULL, quantity BIGINT UNSIGNED NOT NULL, stationID BIGINT UNSIGNED DEFAULT NULL, stationName VARCHAR(255) DEFAULT NULL, transactionDateTime DATETIME NOT NULL, transactionFor VARCHAR(255) NOT NULL, transactionType VARCHAR(255) NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, clientTypeID BIGINT UNSIGNED DEFAULT NULL, PRIMARY KEY(transactionID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE corpWalletJournal (refID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, amount NUMERIC(17, 2) NOT NULL, argID1 BIGINT UNSIGNED DEFAULT NULL, argName1 VARCHAR(255) DEFAULT NULL, balance NUMERIC(17, 2) NOT NULL, date DATETIME NOT NULL, ownerID1 BIGINT UNSIGNED DEFAULT NULL, ownerID2 BIGINT UNSIGNED DEFAULT NULL, ownerName1 VARCHAR(255) DEFAULT NULL, ownerName2 VARCHAR(255) DEFAULT NULL, reason LONGTEXT DEFAULT NULL, refTypeID SMALLINT UNSIGNED NOT NULL, owner1TypeID BIGINT UNSIGNED DEFAULT NULL, owner2TypeID BIGINT UNSIGNED DEFAULT NULL, PRIMARY KEY(refID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(14, 128, 'TariochEveapiFetcherEveWorker', 'corp', 'IndustryJobs', 5);");
        $this->addSql("INSERT INTO `api` VALUES(15, 1048576, 'TariochEveapiFetcherEveWorker', 'corp', 'WalletJournal', 5);");
        $this->addSql("INSERT INTO `api` VALUES(16, 2097152, 'TariochEveapiFetcherEveWorker', 'corp', 'WalletTransactions', 5);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE corpIndustryJob");
        $this->addSql("DROP TABLE corpWalletTransaction");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (14, 15, 16)");
        $this->addSql("DROP TABLE corpWalletJournal");
    }
}
