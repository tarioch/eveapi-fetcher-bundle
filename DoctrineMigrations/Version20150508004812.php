<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add corp blueprint
 */
class Version20150508004812 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("INSERT INTO `api` VALUES(28, 128, 'TariochEveapiFetcherEveWorker', 'corp', 'IndustryJobsHistory', 360);");
        $this->addSql("DROP INDEX job_owner ON corpIndustryJob;");
        $this->addSql("ALTER TABLE corpIndustryJob ADD ownerID BIGINT UNSIGNED NOT NULL, CHANGE installerName installerName VARCHAR(255) NOT NULL, CHANGE solarSystemName solarSystemName VARCHAR(255) NOT NULL, CHANGE blueprintTypeName blueprintTypeName VARCHAR(255) NOT NULL, CHANGE productTypeName productTypeName VARCHAR(255) NOT NULL;");
        $this->addSql("CREATE UNIQUE INDEX job_owner ON corpIndustryJob (jobId, ownerId);");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
