<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Corp Sheet
 */
class Version20131227015438 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE corpLogo (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, graphicId INT UNSIGNED NOT NULL, shape1 INT UNSIGNED NOT NULL, shape2 INT UNSIGNED NOT NULL, shape3 INT UNSIGNED NOT NULL, color1 INT UNSIGNED NOT NULL, color2 INT UNSIGNED NOT NULL, color3 INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE corpCorporationSheet (corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, ticker VARCHAR(255) NOT NULL, ceoID BIGINT UNSIGNED NOT NULL, ceoName VARCHAR(255) NOT NULL, stationID BIGINT UNSIGNED NOT NULL, stationName VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url LONGTEXT, allianceID BIGINT UNSIGNED, allianceName VARCHAR(255), taxRate NUMERIC(5, 2) NOT NULL, memberCount BIGINT UNSIGNED NOT NULL, memberLimit BIGINT UNSIGNED NOT NULL, shares BIGINT UNSIGNED NOT NULL, logoId BIGINT UNSIGNED DEFAULT NULL, UNIQUE INDEX UNIQ_C00F919B5B889CB4 (logoId), PRIMARY KEY(corporationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE corpDivision (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, description VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_69697632DB30DDED (ownerID), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE corpWalletDivision (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, description VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_715C1244DB30DDED (ownerID), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE corpCorporationSheet ADD CONSTRAINT FK_C00F919B5B889CB4 FOREIGN KEY (logoId) REFERENCES corpLogo (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE corpDivision ADD CONSTRAINT FK_69697632DB30DDED FOREIGN KEY (ownerID) REFERENCES corpCorporationSheet (corporationID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE corpWalletDivision ADD CONSTRAINT FK_715C1244DB30DDED FOREIGN KEY (ownerID) REFERENCES corpCorporationSheet (corporationID) ON DELETE CASCADE");

        $this->addSql("INSERT INTO `api` VALUES(10, 8, 'TariochEveapiFetcherEveWorker', 'corp', 'CorporationSheet', 360);");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE corpCorporationSheet DROP FOREIGN KEY FK_C00F919B5B889CB4");
        $this->addSql("ALTER TABLE corpDivision DROP FOREIGN KEY FK_69697632DB30DDED");
        $this->addSql("ALTER TABLE corpWalletDivision DROP FOREIGN KEY FK_715C1244DB30DDED");
        $this->addSql("DROP TABLE corpLogo");
        $this->addSql("DROP TABLE corpCorporationSheet");
        $this->addSql("DROP TABLE corpDivision");
        $this->addSql("DROP TABLE corpWalletDivision");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (10);");
    }
}
