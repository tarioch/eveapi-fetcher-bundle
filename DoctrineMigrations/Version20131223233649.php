<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Map Sovereignty
 */
class Version20131223233649 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE mapSovereignty (solarSystemID BIGINT UNSIGNED NOT NULL, allianceID BIGINT UNSIGNED NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, factionID BIGINT UNSIGNED NOT NULL, solarSystemName VARCHAR(255) NOT NULL, PRIMARY KEY(solarSystemID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("DROP TABLE mapSovereignty");
    }
}
