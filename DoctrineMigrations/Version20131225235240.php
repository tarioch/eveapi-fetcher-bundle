<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Eve Conquerable Stations
 */
class Version20131225235240 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE eveConquerableStation (stationID BIGINT UNSIGNED NOT NULL, stationName VARCHAR(255) NOT NULL, stationTypeID BIGINT UNSIGNED NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, PRIMARY KEY(stationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(7, NULL, 'TariochEveapiFetcherEveWorker', 'eve', 'ConquerableStationList', 60);");
        $this->addSql("INSERT INTO `apiCall` SET apiID=7, active=1");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE eveConquerableStation");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (7);");
    }
}
