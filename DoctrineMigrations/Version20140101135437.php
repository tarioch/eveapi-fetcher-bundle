<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Various tables added
 */
class Version20140101135437 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE charAttributeEnhancer (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, augmentatorValue INT UNSIGNED NOT NULL, augmentatorName VARCHAR(255) NOT NULL, bonusName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_2B6C1A96DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporationRole (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_F4E3617ADB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporateContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charAttributes (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, charisma INT UNSIGNED NOT NULL, intelligence INT UNSIGNED NOT NULL, memory INT UNSIGNED NOT NULL, perception INT UNSIGNED NOT NULL, willpower INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charAllianceContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charAccountBalance (accountID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, balance NUMERIC(17, 2) NOT NULL, UNIQUE INDEX owner_account (ownerId, accountKey), PRIMARY KEY(accountID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCharacterSheet (characterID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, DoB DATETIME NOT NULL, race VARCHAR(255) NOT NULL, bloodLine VARCHAR(255) NOT NULL, ancestry VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, allianceID BIGINT UNSIGNED DEFAULT NULL, allianceName VARCHAR(255) DEFAULT NULL, cloneName VARCHAR(255) DEFAULT NULL, cloneSkillPoints BIGINT UNSIGNED NOT NULL, taxRate NUMERIC(17, 2) NOT NULL, attributesId BIGINT UNSIGNED DEFAULT NULL, UNIQUE INDEX UNIQ_D6AB6EBE1235B5DC (attributesId), PRIMARY KEY(characterID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charWalletTransaction (transactionID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, clientID BIGINT UNSIGNED DEFAULT NULL, clientName VARCHAR(255) DEFAULT NULL, journalTransactionID BIGINT UNSIGNED NOT NULL, price NUMERIC(17, 2) NOT NULL, quantity BIGINT UNSIGNED NOT NULL, stationID BIGINT UNSIGNED DEFAULT NULL, stationName VARCHAR(255) DEFAULT NULL, transactionDateTime DATETIME NOT NULL, transactionFor VARCHAR(255) NOT NULL, transactionType VARCHAR(255) NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, clientTypeID BIGINT UNSIGNED DEFAULT NULL, INDEX transactionDate (transactionDateTime), INDEX owner (ownerID, accountKey), INDEX journalTransactionID (journalTransactionID), INDEX transactionType (transactionType), INDEX typeID (typeID), PRIMARY KEY(transactionID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporationRoleAtHq (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_CCA2D3AADB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporationRoleAtBase (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_40BAF5A6DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporationRoleAtOther (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_DCD86C38DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charMailMessage (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, messageID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, senderID BIGINT UNSIGNED NOT NULL, sentDate DATETIME NOT NULL, title LONGTEXT DEFAULT NULL, body LONGTEXT DEFAULT NULL, toCharacterIDs LONGTEXT DEFAULT NULL, toCorpOrAllianceId LONGTEXT DEFAULT NULL, toListId LONGTEXT DEFAULT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charCorporationTitle (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, titleID BIGINT UNSIGNED NOT NULL, titleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_3622E2E4DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charMailingList (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, listID BIGINT UNSIGNED NOT NULL, displayName VARCHAR(255) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charWalletJournal (refID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, amount NUMERIC(17, 2) NOT NULL, argID1 BIGINT UNSIGNED DEFAULT NULL, argName1 VARCHAR(255) DEFAULT NULL, balance NUMERIC(17, 2) NOT NULL, date DATETIME NOT NULL, ownerID1 BIGINT UNSIGNED DEFAULT NULL, ownerID2 BIGINT UNSIGNED DEFAULT NULL, ownerName1 VARCHAR(255) DEFAULT NULL, ownerName2 VARCHAR(255) DEFAULT NULL, reason LONGTEXT DEFAULT NULL, refTypeID SMALLINT UNSIGNED NOT NULL, owner1TypeID BIGINT UNSIGNED DEFAULT NULL, owner2TypeID BIGINT UNSIGNED DEFAULT NULL, taxReceiverID BIGINT UNSIGNED DEFAULT NULL, taxAmount NUMERIC(17, 2) NOT NULL, INDEX entryDate (date), INDEX owner (ownerID, accountKey), INDEX owner1 (ownerID1), INDEX owner2 (ownerID2), INDEX refType (refTypeID), PRIMARY KEY(refID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charAsset (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, quantity BIGINT NOT NULL, rawQuantity BIGINT DEFAULT NULL, flag INT NOT NULL, singleton TINYINT(1) NOT NULL, lft BIGINT UNSIGNED NOT NULL, rgt BIGINT UNSIGNED NOT NULL, lvl BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charContract (contractID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, issuerID BIGINT UNSIGNED NOT NULL, issuerCorpID BIGINT UNSIGNED NOT NULL, assigneeID BIGINT UNSIGNED NOT NULL, acceptorID BIGINT UNSIGNED NOT NULL, startStationID BIGINT UNSIGNED NOT NULL, endStationID BIGINT UNSIGNED NOT NULL, type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, forCorp TINYINT(1) NOT NULL, availability VARCHAR(255) NOT NULL, dateIssued DATETIME NOT NULL, dateExpired DATETIME NOT NULL, dateAccepted DATETIME DEFAULT NULL, numDays SMALLINT NOT NULL, dateCompleted DATETIME DEFAULT NULL, price NUMERIC(17, 2) NOT NULL, reward NUMERIC(17, 2) NOT NULL, collateral NUMERIC(17, 2) NOT NULL, buyout NUMERIC(17, 2) NOT NULL, volume BIGINT UNSIGNED NOT NULL, INDEX dateIssues (dateIssued), INDEX dateExpired (dateExpired), INDEX dateAccepted (dateAccepted), INDEX dateCompleted (dateCompleted), INDEX owner (ownerID), PRIMARY KEY(contractID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE charSkill (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, level SMALLINT UNSIGNED NOT NULL, skillpoints BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, published TINYINT(1) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_B21CC534DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE charAttributeEnhancer ADD CONSTRAINT FK_2B6C1A96DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCorporationRole ADD CONSTRAINT FK_F4E3617ADB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCharacterSheet ADD CONSTRAINT FK_D6AB6EBE1235B5DC FOREIGN KEY (attributesId) REFERENCES charAttributes (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCorporationRoleAtHq ADD CONSTRAINT FK_CCA2D3AADB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCorporationRoleAtBase ADD CONSTRAINT FK_40BAF5A6DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCorporationRoleAtOther ADD CONSTRAINT FK_DCD86C38DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charCorporationTitle ADD CONSTRAINT FK_3622E2E4DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE charSkill ADD CONSTRAINT FK_B21CC534DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE");

        $this->addSql("INSERT INTO `api` VALUES(17, 8, 'TariochEveapiFetcherEveWorker', 'char', 'CharacterSheet', 60)");
        $this->addSql("INSERT INTO `api` VALUES(18, 1, 'TariochEveapiFetcherEveWorker', 'char', 'AccountBalance', 60)");
        $this->addSql("INSERT INTO `api` VALUES(19, 2, 'TariochEveapiFetcherEveWorker', 'char', 'AssetList', 360)");
        $this->addSql("INSERT INTO `api` VALUES(20, 16, 'TariochEveapiFetcherEveWorker', 'char', 'ContactList', 1380)");
        $this->addSql("INSERT INTO `api` VALUES(21, 67108864, 'TariochEveapiFetcherEveWorker', 'char', 'Contracts', 60)");
        $this->addSql("INSERT INTO `api` VALUES(22, 2048, 'TariochEveapiFetcherEveWorker', 'char', 'MailMessages', 1380)");
        $this->addSql("INSERT INTO `api` VALUES(23, 512, 'TariochEveapiFetcherEveWorker', 'char', 'MailBodies', 1380)");
        $this->addSql("INSERT INTO `api` VALUES(24, 1024, 'TariochEveapiFetcherEveWorker', 'char', 'MailingLists', 60)");
        $this->addSql("INSERT INTO `api` VALUES(25, 2097152, 'TariochEveapiFetcherEveWorker', 'char', 'WalletJournal', 30)");
        $this->addSql("INSERT INTO `api` VALUES(26, 4194304, 'TariochEveapiFetcherEveWorker', 'char', 'WalletTransactions', 60)");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE charCharacterSheet DROP FOREIGN KEY FK_D6AB6EBE1235B5DC");
        $this->addSql("ALTER TABLE charAttributeEnhancer DROP FOREIGN KEY FK_2B6C1A96DB30DDED");
        $this->addSql("ALTER TABLE charCorporationRole DROP FOREIGN KEY FK_F4E3617ADB30DDED");
        $this->addSql("ALTER TABLE charCorporationRoleAtHq DROP FOREIGN KEY FK_CCA2D3AADB30DDED");
        $this->addSql("ALTER TABLE charCorporationRoleAtBase DROP FOREIGN KEY FK_40BAF5A6DB30DDED");
        $this->addSql("ALTER TABLE charCorporationRoleAtOther DROP FOREIGN KEY FK_DCD86C38DB30DDED");
        $this->addSql("ALTER TABLE charCorporationTitle DROP FOREIGN KEY FK_3622E2E4DB30DDED");
        $this->addSql("ALTER TABLE charSkill DROP FOREIGN KEY FK_B21CC534DB30DDED");
        $this->addSql("DROP TABLE charAttributeEnhancer");
        $this->addSql("DROP TABLE charCorporationRole");
        $this->addSql("DROP TABLE charCorporateContact");
        $this->addSql("DROP TABLE charAttributes");
        $this->addSql("DROP TABLE charAllianceContact");
        $this->addSql("DROP TABLE charAccountBalance");
        $this->addSql("DROP TABLE charCharacterSheet");
        $this->addSql("DROP TABLE charWalletTransaction");
        $this->addSql("DROP TABLE charCorporationRoleAtHq");
        $this->addSql("DROP TABLE charCorporationRoleAtBase");
        $this->addSql("DROP TABLE charCorporationRoleAtOther");
        $this->addSql("DROP TABLE charContact");
        $this->addSql("DROP TABLE charMailMessage");
        $this->addSql("DROP TABLE charCorporationTitle");
        $this->addSql("DROP TABLE charMailingList");
        $this->addSql("DROP TABLE charWalletJournal");
        $this->addSql("DROP TABLE charAsset");
        $this->addSql("DROP TABLE charContract");
        $this->addSql("DROP TABLE charSkill");

        $this->addSql("DELETE FROM `api` WHERE apiID IN (17, 18, 19, 20, 21, 22, 23, 24, 25, 26)");
    }
}
