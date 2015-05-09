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
        $this->addSql("ALTER TABLE corpIndustryJob ADD ownerID BIGINT UNSIGNED NOT NULL;");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
