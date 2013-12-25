<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * EveRefType call
 */
class Version20131225005358 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE eveRefType (refTypeID BIGINT UNSIGNED NOT NULL, refTypeName VARCHAR(255) NOT NULL, PRIMARY KEY(refTypeID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(6, NULL, 'TariochEveapiFetcherEveWorker', 'eve', 'RefTypes', 60);");
        $this->addSql("INSERT INTO `apiCall` SET apiID=6, active=1");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE eveRefType");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (6);");
    }
}
