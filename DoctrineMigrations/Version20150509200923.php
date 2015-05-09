<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add Corp Facility 
 */
class Version20150509200923 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE corpFacility (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, facilityID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, solarSystemName BIGINT UNSIGNED NOT NULL, regionID BIGINT UNSIGNED NOT NULL, regionName BIGINT UNSIGNED NOT NULL, starbaseModifier INT NOT NULL, tax INT NOT NULL, INDEX owner (ownerID), UNIQUE INDEX facility_owner (facilityId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql("INSERT INTO api VALUES(29, 128, 'TariochEveapiFetcherEveWorker', 'corp', 'Facilities', 15);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
