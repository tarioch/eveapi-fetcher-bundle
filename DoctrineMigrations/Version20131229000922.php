<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp Asset List
 */
class Version20131229000922 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpAsset (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED, typeID BIGINT UNSIGNED NOT NULL, quantity BIGINT NOT NULL, rawQuantity BIGINT, flag INT NOT NULL, singleton TINYINT(1) NOT NULL, lft BIGINT UNSIGNED NOT NULL, rgt BIGINT UNSIGNED NOT NULL, lvl BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(13, 2, 'TariochEveapiFetcherEveWorker', 'corp', 'AssetList', 180);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE corpAsset");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (13)");
    }
}
