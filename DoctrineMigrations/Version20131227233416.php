<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp starbase list
 */
class Version20131227233416 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpStarbase (itemID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, moonID BIGINT UNSIGNED NOT NULL, state INT UNSIGNED NOT NULL, stateTimestamp DATETIME NOT NULL, onlineTimestamp DATETIME NOT NULL, standingOwnerID BIGINT UNSIGNED NOT NULL, PRIMARY KEY(itemID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(11, 524288, 'TariochEveapiFetcherEveWorker', 'corp', 'StarbaseList', 360);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE corpStarbase");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (11);");
    }
}
