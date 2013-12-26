<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp account balance
 */
class Version20131226225126 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpAccountBalance (accountID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, balance NUMERIC(17, 2) NOT NULL, UNIQUE INDEX owner_account (ownerId, accountKey), PRIMARY KEY(accountID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(9, 1, 'TariochEveapiFetcherEveWorker', 'corp', 'AccountBalance', 60);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE corpAccountBalance");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (9);");
    }
}
