<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Eve Alliance List.
 */
class Version20131226003030 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE eveMemberCorporation (corporationID BIGINT UNSIGNED NOT NULL, startDate DATETIME NOT NULL, allianceID BIGINT UNSIGNED NOT NULL, INDEX IDX_80874C9F2CBDFC7A (allianceID), PRIMARY KEY(corporationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE eveAlliance (allianceID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, shortName VARCHAR(255) NOT NULL, executorCorpID BIGINT UNSIGNED NOT NULL, memberCount BIGINT UNSIGNED NOT NULL, startDate DATETIME NOT NULL, PRIMARY KEY(allianceID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE eveMemberCorporation ADD CONSTRAINT FK_80874C9F2CBDFC7A FOREIGN KEY (allianceID) REFERENCES eveAlliance (allianceID) ON DELETE CASCADE");

        $this->addSql("INSERT INTO `api` VALUES(8, NULL, 'TariochEveapiFetcherEveWorker', 'eve', 'AllianceList', 60);");
        $this->addSql("INSERT INTO `apiCall` SET apiID=8, active=1");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE eveMemberCorporation DROP FOREIGN KEY FK_80874C9F2CBDFC7A");
        $this->addSql("DROP TABLE eveMemberCorporation");
        $this->addSql("DROP TABLE eveAlliance");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (8);");
    }
}
