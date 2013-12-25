<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Enable MapSovereignty api
 */
class Version20131223232707 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `api` VALUES(5, NULL, 'TariochEveapiFetcherEveWorker', 'map', 'Sovereignty', 60);");
        $this->addSql("INSERT INTO `apiCall` SET apiID=5, active=1");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM `api` WHERE apiID IN (5);");
    }
}
