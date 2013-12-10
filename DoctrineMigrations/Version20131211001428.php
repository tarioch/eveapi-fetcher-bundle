<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131211001428 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `api` VALUES(1, NULL, 'TarioEveToolBundleWorkerEveWorker', 'server', 'ServerStatus', 5);");
	$this->addSql("INSERT INTO `api` VALUES(2, 33554432, 'TarioEveToolBundleWorkerEveWorker', 'account', 'AccountStatus', 120);");
	$this->addSql("INSERT INTO `api` VALUES(3, 1, 'TarioEveToolBundleWorkerEveWorker', 'account', 'APIKeyInfo', 60);");
    }

    public function down(Schema $schema)
    {
	$this->addSql("DELETE FROM `api` WHERE apiID IN (1, 2, 3);");
    }
}
