<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add Corp Facility 
 */
class Version20150523215723 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE charPlanetaryColony (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, ownerName VARCHAR(255) NOT NULL, planetID BIGINT UNSIGNED NOT NULL, planetName VARCHAR(255) NOT NULL, planetTypeID BIGINT UNSIGNED NOT NULL, planetTypeName VARCHAR(255) NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, solarSystemName VARCHAR(255) NOT NULL, upgradeLevel INT UNSIGNED NOT NULL, numberOfPins INT UNSIGNED NOT NULL, lastUpdate DATETIME NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (planetId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE charPlanetaryPin (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, planetID BIGINT UNSIGNED NOT NULL, pinID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, schematicID BIGINT UNSIGNED NOT NULL, lastLaunchTime DATETIME NOT NULL, cycleTime BIGINT UNSIGNED NOT NULL, quantityPerCycle BIGINT UNSIGNED NOT NULL, installTime DATETIME NOT NULL, expiryTime DATETIME NOT NULL, contentTypeID BIGINT UNSIGNED NOT NULL, contentTypeName VARCHAR(255) NOT NULL, contentQuantity BIGINT UNSIGNED NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (pinId, ownerId, planetId, contentTypeId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE charPlanetaryRoute (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, planetID BIGINT UNSIGNED NOT NULL, routeID BIGINT UNSIGNED NOT NULL, sourcePinID BIGINT UNSIGNED NOT NULL, destinationPinID BIGINT UNSIGNED NOT NULL, contentTypeID BIGINT UNSIGNED NOT NULL, contentTypeName VARCHAR(255) NOT NULL, quantity BIGINT UNSIGNED NOT NULL, waypoint1 BIGINT UNSIGNED NOT NULL, waypoint2 BIGINT UNSIGNED NOT NULL, waypoint3 BIGINT UNSIGNED NOT NULL, waypoint4 BIGINT UNSIGNED NOT NULL, waypoint5 BIGINT UNSIGNED NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (routeId, ownerId, planetId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE charPlanetaryLink (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, planetID BIGINT UNSIGNED NOT NULL, sourcePinID BIGINT UNSIGNED NOT NULL, destinationPinID BIGINT UNSIGNED NOT NULL, linkLevel INT UNSIGNED NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (planetId, sourcePinID, destinationPinID, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');

        $this->addSql('INSERT INTO api VALUES(31, 2, "TariochEveapiFetcherEveWorker", "char", "PlanetaryColonies", 60);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
