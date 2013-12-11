<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Api data 
 */
class Version20131211001428 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `api` VALUES(1, NULL, 'TariochEveapiFetcherBundleComponentWorkerTariochEveapiFetcherEveWorker', 'server', 'ServerStatus', 5);");
	$this->addSql("INSERT INTO `api` VALUES(2, 33554432, 'TariochEveapiFetcherBundleComponentWorkerTariochEveapiFetcherEveWorker', 'account', 'AccountStatus', 120);");
	$this->addSql("INSERT INTO `api` VALUES(3, 1, 'TariochEveapiFetcherBundleComponentWorkerTariochEveapiFetcherEveWorker', 'account', 'APIKeyInfo', 60);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
	$this->addSql("DELETE FROM `api` WHERE apiID IN (1, 2, 3);");
    }
}
