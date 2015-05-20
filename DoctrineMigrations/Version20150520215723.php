<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add Corp Facility 
 */
class Version20150520215723 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');


        $this->addSql('CREATE TABLE corpCustomsOffice (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, reinforceHour INT UNSIGNED NOT NULL, allowAlliance TINYINT(1) NOT NULL, allowStandings TINYINT(1) NOT NULL, standingLevel NUMERIC(17, 2) NOT NULL, taxRateAlliance NUMERIC(17, 2) NOT NULL, taxRateCorp NUMERIC(17, 2) NOT NULL, taxRateStandingHigh NUMERIC(17, 2) NOT NULL, taxRateStandingGood NUMERIC(17, 2) NOT NULL, taxRateStandingNeutral NUMERIC(17, 2) NOT NULL, taxRateStandingBad NUMERIC(17, 2) NOT NULL, taxRateStandingHorrible NUMERIC(17, 2) NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (itemId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('INSERT INTO api VALUES(30, 2, "TariochEveapiFetcherEveWorker", "corp", "CustomsOffices", 60);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
