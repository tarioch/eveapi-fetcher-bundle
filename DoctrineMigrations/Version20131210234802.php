<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Initial data loading 
 */
class Version20131210234802 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE apiCall (apiCallID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED DEFAULT NULL, earliestNextCall DATETIME DEFAULT NULL, cachedUntil DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, errorCount SMALLINT UNSIGNED DEFAULT '0' NOT NULL, apiID INT NOT NULL, INDEX IDX_6255DFCE1E438816 (apiID), INDEX ownerId (ownerId), INDEX cachedUntil (cachedUntil), PRIMARY KEY(apiCallID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE accountAccountStatus (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, createDate DATETIME NOT NULL, logonCount BIGINT UNSIGNED NOT NULL, logonMinutes BIGINT UNSIGNED NOT NULL, paidUntil DATETIME NOT NULL, keyID BIGINT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_B0E66ADD2F12946A (keyID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charUpcomingEvents (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, eventID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, ownerName VARCHAR(255) NOT NULL, eventDate DATETIME NOT NULL, eventTitle VARCHAR(255) NOT NULL, duration INT NOT NULL, importance TINYINT(1) NOT NULL, eventText LONGTEXT NOT NULL, response VARCHAR(255) NOT NULL, INDEX eventDate (eventDate), UNIQUE INDEX event_owner (eventId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE api (apiID INT AUTO_INCREMENT NOT NULL, mask INT DEFAULT NULL, worker VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, callInterval INT DEFAULT 0 NOT NULL, PRIMARY KEY(apiID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE accountCharacter (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, characterID BIGINT UNSIGNED NOT NULL, characterName VARCHAR(255) NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, keyID BIGINT UNSIGNED NOT NULL, INDEX IDX_478595412F12946A (keyID), INDEX characterID (characterId), INDEX corporationID (corporationId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE serverServerStatus (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, serverOpen TINYINT(1) NOT NULL, onlinePlayers BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE accountAPIKeyInfo (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accessMask BIGINT UNSIGNED NOT NULL, expires DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, keyID BIGINT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_199C99BF2F12946A (keyID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE apiKey (keyID BIGINT UNSIGNED NOT NULL, vCode VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, errorCount INT NOT NULL, PRIMARY KEY(keyID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE apiCall ADD CONSTRAINT FK_6255DFCE1E438816 FOREIGN KEY (apiID) REFERENCES api (apiID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE accountAccountStatus ADD CONSTRAINT FK_B0E66ADD2F12946A FOREIGN KEY (keyID) REFERENCES `apiKey` (keyID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE accountCharacter ADD CONSTRAINT FK_478595412F12946A FOREIGN KEY (keyID) REFERENCES `apiKey` (keyID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE accountAPIKeyInfo ADD CONSTRAINT FK_199C99BF2F12946A FOREIGN KEY (keyID) REFERENCES `apiKey` (keyID) ON DELETE CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE apiCall DROP FOREIGN KEY FK_6255DFCE1E438816");
        $this->addSql("ALTER TABLE accountAccountStatus DROP FOREIGN KEY FK_B0E66ADD2F12946A");
        $this->addSql("ALTER TABLE accountCharacter DROP FOREIGN KEY FK_478595412F12946A");
        $this->addSql("ALTER TABLE accountAPIKeyInfo DROP FOREIGN KEY FK_199C99BF2F12946A");
        $this->addSql("DROP TABLE apiCall");
        $this->addSql("DROP TABLE accountAccountStatus");
        $this->addSql("DROP TABLE charUpcomingEvents");
        $this->addSql("DROP TABLE api");
        $this->addSql("DROP TABLE accountCharacter");
        $this->addSql("DROP TABLE serverServerStatus");
        $this->addSql("DROP TABLE accountAPIKeyInfo");
        $this->addSql("DROP TABLE apiKey");
    }
}
