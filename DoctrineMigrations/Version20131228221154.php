<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp Member Tracking
 */
class Version20131228221154 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpMemberTracking (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, characterID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, startDateTime DATETIME NOT NULL, baseID BIGINT UNSIGNED NOT NULL, base VARCHAR(255) NOT NULL, title LONGTEXT NOT NULL, logonDateTime DATETIME NOT NULL, logoffDateTime DATETIME NOT NULL, locationID BIGINT UNSIGNED NOT NULL, location VARCHAR(255) NOT NULL, shipTypeID BIGINT UNSIGNED NOT NULL, shipType VARCHAR(255) NOT NULL, roles BIGINT UNSIGNED NOT NULL, grantableRoles BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql("INSERT INTO `api` VALUES(12, 2048, 'TariochEveapiFetcherEveWorker', 'corp', 'MemberTracking', 180);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE corpMemberTracking");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (12)");
    }
}
