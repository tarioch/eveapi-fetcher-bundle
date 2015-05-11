<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Initial Creation 
 */
class Version20150102001202 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apiKey (keyID BIGINT UNSIGNED NOT NULL, vCode VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, errorCount INT NOT NULL, PRIMARY KEY(keyID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apiCall (apiCallID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, earliestNextCall DATETIME DEFAULT NULL, cachedUntil DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, errorCount SMALLINT UNSIGNED DEFAULT 0 NOT NULL, ownerID BIGINT UNSIGNED DEFAULT NULL, apiID INT NOT NULL, keyID BIGINT UNSIGNED DEFAULT NULL, INDEX IDX_6255DFCEDB30DDED (ownerID), INDEX IDX_6255DFCE1E438816 (apiID), INDEX IDX_6255DFCE2F12946A (keyID), INDEX cachedUntil (cachedUntil), PRIMARY KEY(apiCallID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accountCharacter (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, characterID BIGINT UNSIGNED NOT NULL, characterName VARCHAR(255) NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, keyID BIGINT UNSIGNED NOT NULL, INDEX IDX_478595412F12946A (keyID), INDEX characterID (characterId), INDEX corporationID (corporationId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE api (apiID INT AUTO_INCREMENT NOT NULL, mask INT DEFAULT NULL, worker VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, callInterval INT DEFAULT 0 NOT NULL, PRIMARY KEY(apiID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accountAccountStatus (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, createDate DATETIME NOT NULL, logonCount BIGINT UNSIGNED NOT NULL, logonMinutes BIGINT UNSIGNED NOT NULL, paidUntil DATETIME NOT NULL, keyID BIGINT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_B0E66ADD2F12946A (keyID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charSkill (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, level SMALLINT UNSIGNED NOT NULL, skillpoints BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, published TINYINT(1) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_B21CC534DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCharacterSheet (characterID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, DoB DATETIME NOT NULL, race VARCHAR(255) NOT NULL, bloodLine VARCHAR(255) NOT NULL, ancestry VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, allianceID BIGINT UNSIGNED DEFAULT NULL, allianceName VARCHAR(255) DEFAULT NULL, cloneName VARCHAR(255) DEFAULT NULL, cloneSkillPoints BIGINT UNSIGNED NOT NULL, taxRate NUMERIC(17, 2) NOT NULL, attributesId BIGINT UNSIGNED DEFAULT NULL, UNIQUE INDEX UNIQ_D6AB6EBE1235B5DC (attributesId), PRIMARY KEY(characterID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpIndustryJob (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, jobID BIGINT UNSIGNED NOT NULL, installerID BIGINT UNSIGNED NOT NULL, installerName VARCHAR(255) NOT NULL, facilityID BIGINT UNSIGNED NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, solarSystemName VARCHAR(255) NOT NULL, stationID BIGINT UNSIGNED NOT NULL, activityID SMALLINT UNSIGNED NOT NULL, blueprintID BIGINT UNSIGNED NOT NULL, blueprintTypeID BIGINT UNSIGNED NOT NULL, blueprintTypeName VARCHAR(255) NOT NULL, blueprintLocationID BIGINT UNSIGNED NOT NULL, outputLocationID BIGINT UNSIGNED NOT NULL, runs BIGINT UNSIGNED NOT NULL, cost BIGINT UNSIGNED NOT NULL, teamID BIGINT UNSIGNED NOT NULL, licensedRuns BIGINT UNSIGNED NOT NULL, probability BIGINT UNSIGNED NOT NULL, productTypeID BIGINT UNSIGNED NOT NULL, productTypeName VARCHAR(255) NOT NULL, status SMALLINT UNSIGNED NOT NULL, timeInSeconds BIGINT UNSIGNED NOT NULL, startDate DATETIME NOT NULL, endDate DATETIME NOT NULL, pauseDate DATETIME NOT NULL, completedDate DATETIME NOT NULL, completedCharacterID BIGINT UNSIGNED NOT NULL, successfulRuns BIGINT UNSIGNED NOT NULL, UNIQUE INDEX job_owner (jobId, installerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charAccountBalance (accountID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, balance NUMERIC(17, 2) NOT NULL, UNIQUE INDEX owner_account (ownerId, accountKey), PRIMARY KEY(accountID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mapSovereignty (solarSystemID BIGINT UNSIGNED NOT NULL, allianceID BIGINT UNSIGNED NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, factionID BIGINT UNSIGNED NOT NULL, solarSystemName VARCHAR(255) NOT NULL, PRIMARY KEY(solarSystemID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpAccountBalance (accountID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, balance NUMERIC(17, 2) NOT NULL, UNIQUE INDEX owner_account (ownerId, accountKey), PRIMARY KEY(accountID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpMemberTracking (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, characterID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, startDateTime DATETIME NOT NULL, baseID BIGINT UNSIGNED NOT NULL, base VARCHAR(255) NOT NULL, title LONGTEXT NOT NULL, logonDateTime DATETIME NOT NULL, logoffDateTime DATETIME NOT NULL, locationID BIGINT UNSIGNED NOT NULL, location VARCHAR(255) NOT NULL, shipTypeID BIGINT UNSIGNED NOT NULL, shipType VARCHAR(255) NOT NULL, roles BIGINT UNSIGNED NOT NULL, grantableRoles BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accountAPIKeyInfo (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accessMask BIGINT UNSIGNED NOT NULL, expires DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, keyID BIGINT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_199C99BF2F12946A (keyID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charMailMessage (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, messageID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, senderID BIGINT UNSIGNED NOT NULL, sentDate DATETIME NOT NULL, title LONGTEXT DEFAULT NULL, body LONGTEXT DEFAULT NULL, toCharacterIDs LONGTEXT DEFAULT NULL, toCorpOrAllianceId LONGTEXT DEFAULT NULL, toListId LONGTEXT DEFAULT NULL, UNIQUE INDEX message_owner (ownerId, messageId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charMailingList (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, listID BIGINT UNSIGNED NOT NULL, displayName VARCHAR(255) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eveMemberCorporation (corporationID BIGINT UNSIGNED NOT NULL, startDate DATETIME NOT NULL, allianceID BIGINT UNSIGNED NOT NULL, INDEX IDX_80874C9F2CBDFC7A (allianceID), PRIMARY KEY(corporationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporationRole (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_F4E3617ADB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charAsset (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, quantity BIGINT NOT NULL, rawQuantity BIGINT DEFAULT NULL, flag INT NOT NULL, singleton TINYINT(1) NOT NULL, lft BIGINT UNSIGNED NOT NULL, rgt BIGINT UNSIGNED NOT NULL, lvl BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporateContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporationTitle (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, titleID BIGINT UNSIGNED NOT NULL, titleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_3622E2E4DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charContract (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, contractID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, issuerID BIGINT UNSIGNED NOT NULL, issuerCorpID BIGINT UNSIGNED NOT NULL, assigneeID BIGINT UNSIGNED NOT NULL, acceptorID BIGINT UNSIGNED NOT NULL, startStationID BIGINT UNSIGNED NOT NULL, endStationID BIGINT UNSIGNED NOT NULL, type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, forCorp TINYINT(1) NOT NULL, availability VARCHAR(255) NOT NULL, dateIssued DATETIME NOT NULL, dateExpired DATETIME NOT NULL, dateAccepted DATETIME DEFAULT NULL, numDays SMALLINT NOT NULL, dateCompleted DATETIME DEFAULT NULL, price NUMERIC(17, 2) NOT NULL, reward NUMERIC(17, 2) NOT NULL, collateral NUMERIC(17, 2) NOT NULL, buyout NUMERIC(17, 2) NOT NULL, volume BIGINT UNSIGNED NOT NULL, INDEX dateIssues (dateIssued), INDEX dateExpired (dateExpired), INDEX dateAccepted (dateAccepted), INDEX dateCompleted (dateCompleted), INDEX owner (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eveAlliance (allianceID BIGINT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, shortName VARCHAR(255) NOT NULL, executorCorpID BIGINT UNSIGNED NOT NULL, memberCount BIGINT UNSIGNED NOT NULL, startDate DATETIME NOT NULL, PRIMARY KEY(allianceID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charUpcomingEvent (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, eventID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, eventOwnerID BIGINT UNSIGNED NOT NULL, eventOwnerName VARCHAR(255) NOT NULL, eventDate DATETIME NOT NULL, eventTitle LONGTEXT NOT NULL, duration INT NOT NULL, importance TINYINT(1) NOT NULL, eventText LONGTEXT NOT NULL, response VARCHAR(255) NOT NULL, INDEX eventDate (eventDate), UNIQUE INDEX event_owner (eventId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charAllianceContact (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, contactID BIGINT UNSIGNED NOT NULL, contactName VARCHAR(255) NOT NULL, standing SMALLINT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpDivision (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, description VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_69697632DB30DDED (ownerID), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpLogo (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, graphicId INT UNSIGNED NOT NULL, shape1 INT UNSIGNED NOT NULL, shape2 INT UNSIGNED NOT NULL, shape3 INT UNSIGNED NOT NULL, color1 INT UNSIGNED NOT NULL, color2 INT UNSIGNED NOT NULL, color3 INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporationRoleAtBase (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_40BAF5A6DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charWalletJournal (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, refID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, amount NUMERIC(17, 2) NOT NULL, argID1 BIGINT UNSIGNED DEFAULT NULL, argName1 VARCHAR(255) DEFAULT NULL, balance NUMERIC(17, 2) NOT NULL, date DATETIME NOT NULL, ownerID1 BIGINT UNSIGNED DEFAULT NULL, ownerID2 BIGINT UNSIGNED DEFAULT NULL, ownerName1 VARCHAR(255) DEFAULT NULL, ownerName2 VARCHAR(255) DEFAULT NULL, reason LONGTEXT DEFAULT NULL, refTypeID SMALLINT UNSIGNED NOT NULL, owner1TypeID BIGINT UNSIGNED DEFAULT NULL, owner2TypeID BIGINT UNSIGNED DEFAULT NULL, taxReceiverID BIGINT UNSIGNED DEFAULT NULL, taxAmount NUMERIC(17, 2) NOT NULL, INDEX entryDate (date), INDEX owner (ownerID, accountKey), INDEX owner1 (ownerID1), INDEX owner2 (ownerID2), INDEX refType (refTypeID), UNIQUE INDEX entry_owner (refId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpCorporationSheet (corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, ticker VARCHAR(255) NOT NULL, ceoID BIGINT UNSIGNED NOT NULL, ceoName VARCHAR(255) NOT NULL, stationID BIGINT UNSIGNED NOT NULL, stationName VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url LONGTEXT DEFAULT NULL, allianceID BIGINT UNSIGNED DEFAULT NULL, allianceName VARCHAR(255) DEFAULT NULL, taxRate NUMERIC(5, 2) NOT NULL, memberCount BIGINT UNSIGNED NOT NULL, memberLimit BIGINT UNSIGNED NOT NULL, shares BIGINT UNSIGNED NOT NULL, logoId BIGINT UNSIGNED DEFAULT NULL, UNIQUE INDEX UNIQ_C00F919B5B889CB4 (logoId), PRIMARY KEY(corporationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eveConquerableStation (stationID BIGINT UNSIGNED NOT NULL, stationName VARCHAR(255) NOT NULL, stationTypeID BIGINT UNSIGNED NOT NULL, solarSystemID BIGINT UNSIGNED NOT NULL, corporationID BIGINT UNSIGNED NOT NULL, corporationName VARCHAR(255) NOT NULL, PRIMARY KEY(stationID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpWalletJournal (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, refID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, amount NUMERIC(17, 2) NOT NULL, argID1 BIGINT UNSIGNED DEFAULT NULL, argName1 VARCHAR(255) DEFAULT NULL, balance NUMERIC(17, 2) NOT NULL, date DATETIME NOT NULL, ownerID1 BIGINT UNSIGNED DEFAULT NULL, ownerID2 BIGINT UNSIGNED DEFAULT NULL, ownerName1 VARCHAR(255) DEFAULT NULL, ownerName2 VARCHAR(255) DEFAULT NULL, reason LONGTEXT DEFAULT NULL, refTypeID SMALLINT UNSIGNED NOT NULL, owner1TypeID BIGINT UNSIGNED DEFAULT NULL, owner2TypeID BIGINT UNSIGNED DEFAULT NULL, INDEX entryDate (date), INDEX owner (ownerID, accountKey), INDEX owner1 (ownerID1), INDEX owner2 (ownerID2), INDEX refType (refTypeID), UNIQUE INDEX entry_owner (refId, ownerId, accountKey), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charWalletTransaction (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, transactionID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, clientID BIGINT UNSIGNED DEFAULT NULL, clientName VARCHAR(255) DEFAULT NULL, journalTransactionID BIGINT UNSIGNED NOT NULL, price NUMERIC(17, 2) NOT NULL, quantity BIGINT UNSIGNED NOT NULL, stationID BIGINT UNSIGNED DEFAULT NULL, stationName VARCHAR(255) DEFAULT NULL, transactionDateTime DATETIME NOT NULL, transactionFor VARCHAR(255) NOT NULL, transactionType VARCHAR(255) NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, clientTypeID BIGINT UNSIGNED DEFAULT NULL, INDEX transactionDate (transactionDateTime), INDEX owner (ownerID, accountKey), INDEX journalTransactionID (journalTransactionID), INDEX transactionType (transactionType), INDEX typeID (typeID), UNIQUE INDEX transaction_owner (transactionId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporationRoleAtHq (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_CCA2D3AADB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpStarbase (itemID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, moonID BIGINT UNSIGNED NOT NULL, state INT UNSIGNED NOT NULL, stateTimestamp DATETIME NOT NULL, onlineTimestamp DATETIME NOT NULL, standingOwnerID BIGINT UNSIGNED NOT NULL, PRIMARY KEY(itemID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charAttributes (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, charisma INT UNSIGNED NOT NULL, intelligence INT UNSIGNED NOT NULL, memory INT UNSIGNED NOT NULL, perception INT UNSIGNED NOT NULL, willpower INT UNSIGNED NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpWalletDivision (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, accountKey BIGINT UNSIGNED NOT NULL, description VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_715C1244DB30DDED (ownerID), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpWalletTransaction (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, transactionID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, accountKey SMALLINT UNSIGNED NOT NULL, characterID BIGINT UNSIGNED DEFAULT NULL, characterName VARCHAR(255) DEFAULT NULL, clientID BIGINT UNSIGNED DEFAULT NULL, clientName VARCHAR(255) DEFAULT NULL, journalTransactionID BIGINT UNSIGNED NOT NULL, price NUMERIC(17, 2) NOT NULL, quantity BIGINT UNSIGNED NOT NULL, stationID BIGINT UNSIGNED DEFAULT NULL, stationName VARCHAR(255) DEFAULT NULL, transactionDateTime DATETIME NOT NULL, transactionFor VARCHAR(255) NOT NULL, transactionType VARCHAR(255) NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, clientTypeID BIGINT UNSIGNED DEFAULT NULL, INDEX transactionDate (transactionDateTime), INDEX owner (ownerID, accountKey), INDEX journalTransactionID (journalTransactionID), INDEX transactionType (transactionType), INDEX typeID (typeID), UNIQUE INDEX transaction_owner (transactionId, ownerId, accountKey), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serverServerStatus (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, serverOpen TINYINT(1) NOT NULL, onlinePlayers BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eveRefType (refTypeID BIGINT UNSIGNED NOT NULL, refTypeName VARCHAR(255) NOT NULL, PRIMARY KEY(refTypeID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charCorporationRoleAtOther (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, roleID BIGINT UNSIGNED NOT NULL, roleName VARCHAR(255) NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, INDEX IDX_DCD86C38DB30DDED (ownerID), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corpAsset (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, quantity BIGINT NOT NULL, rawQuantity BIGINT DEFAULT NULL, flag INT NOT NULL, singleton TINYINT(1) NOT NULL, lft BIGINT UNSIGNED NOT NULL, rgt BIGINT UNSIGNED NOT NULL, lvl BIGINT UNSIGNED NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apiCall ADD CONSTRAINT FK_6255DFCEDB30DDED FOREIGN KEY (ownerID) REFERENCES accountCharacter (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apiCall ADD CONSTRAINT FK_6255DFCE1E438816 FOREIGN KEY (apiID) REFERENCES api (apiID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apiCall ADD CONSTRAINT FK_6255DFCE2F12946A FOREIGN KEY (keyID) REFERENCES apiKey (keyID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accountCharacter ADD CONSTRAINT FK_478595412F12946A FOREIGN KEY (keyID) REFERENCES apiKey (keyID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accountAccountStatus ADD CONSTRAINT FK_B0E66ADD2F12946A FOREIGN KEY (keyID) REFERENCES apiKey (keyID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charSkill ADD CONSTRAINT FK_B21CC534DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charCharacterSheet ADD CONSTRAINT FK_D6AB6EBE1235B5DC FOREIGN KEY (attributesId) REFERENCES charAttributes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accountAPIKeyInfo ADD CONSTRAINT FK_199C99BF2F12946A FOREIGN KEY (keyID) REFERENCES apiKey (keyID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eveMemberCorporation ADD CONSTRAINT FK_80874C9F2CBDFC7A FOREIGN KEY (allianceID) REFERENCES eveAlliance (allianceID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charCorporationRole ADD CONSTRAINT FK_F4E3617ADB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charCorporationTitle ADD CONSTRAINT FK_3622E2E4DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE corpDivision ADD CONSTRAINT FK_69697632DB30DDED FOREIGN KEY (ownerID) REFERENCES corpCorporationSheet (corporationID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charCorporationRoleAtBase ADD CONSTRAINT FK_40BAF5A6DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE corpCorporationSheet ADD CONSTRAINT FK_C00F919B5B889CB4 FOREIGN KEY (logoId) REFERENCES corpLogo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charCorporationRoleAtHq ADD CONSTRAINT FK_CCA2D3AADB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE corpWalletDivision ADD CONSTRAINT FK_715C1244DB30DDED FOREIGN KEY (ownerID) REFERENCES corpCorporationSheet (corporationID) ON DELETE CASCADE');
	$this->addSql('ALTER TABLE charCorporationRoleAtOther ADD CONSTRAINT FK_DCD86C38DB30DDED FOREIGN KEY (ownerID) REFERENCES charCharacterSheet (characterID) ON DELETE CASCADE');

	// data
	$this->addSql('INSERT INTO api VALUES(1, NULL, "TariochEveapiFetcherEveWorker", "server", "ServerStatus", 5);');
	$this->addSql('INSERT INTO api VALUES(2, 33554432, "TariochEveapiFetcherEveWorker", "account", "AccountStatus", 120);');
	$this->addSql('INSERT INTO api VALUES(3, NULL, "TariochEveapiFetcherEveWorker", "account", "APIKeyInfo", 60);');
	$this->addSql('INSERT INTO apiCall SET apiID=1, active=1;');
	$this->addSql('INSERT INTO api VALUES(4, 1048576, "TariochEveapiFetcherEveWorker", "char", "UpcomingCalendarEvents", 30);');
	$this->addSql('INSERT INTO api VALUES(5, NULL, "TariochEveapiFetcherEveWorker", "map", "Sovereignty", 60);');
	$this->addSql('INSERT INTO apiCall SET apiID=5, active=1');
	$this->addSql('INSERT INTO api VALUES(6, NULL, "TariochEveapiFetcherEveWorker", "eve", "RefTypes", 60);');
	$this->addSql('INSERT INTO apiCall SET apiID=6, active=1');
	$this->addSql('INSERT INTO api VALUES(7, NULL, "TariochEveapiFetcherEveWorker", "eve", "ConquerableStationList", 60);');
	$this->addSql('INSERT INTO apiCall SET apiID=7, active=1');
	$this->addSql('INSERT INTO api VALUES(8, NULL, "TariochEveapiFetcherEveWorker", "eve", "AllianceList", 60);');
	$this->addSql('INSERT INTO apiCall SET apiID=8, active=1');
	$this->addSql('INSERT INTO api VALUES(9, 1, "TariochEveapiFetcherEveWorker", "corp", "AccountBalance", 60);');
	$this->addSql('INSERT INTO api VALUES(10, 8, "TariochEveapiFetcherEveWorker", "corp", "CorporationSheet", 360);');
	$this->addSql('INSERT INTO api VALUES(11, 524288, "TariochEveapiFetcherEveWorker", "corp", "StarbaseList", 360);');
	$this->addSql('INSERT INTO api VALUES(12, 2048, "TariochEveapiFetcherEveWorker", "corp", "MemberTracking", 180);');
	$this->addSql('INSERT INTO api VALUES(13, 2, "TariochEveapiFetcherEveWorker", "corp", "AssetList", 180);');
	$this->addSql('INSERT INTO api VALUES(14, 128, "TariochEveapiFetcherEveWorker", "corp", "IndustryJobs", 5);');
	$this->addSql('INSERT INTO api VALUES(15, 1048576, "TariochEveapiFetcherEveWorker", "corp", "WalletJournal", 5);');
	$this->addSql('INSERT INTO api VALUES(16, 2097152, "TariochEveapiFetcherEveWorker", "corp", "WalletTransactions", 5);');
	$this->addSql('INSERT INTO api VALUES(17, 8, "TariochEveapiFetcherEveWorker", "char", "CharacterSheet", 60)');
	$this->addSql('INSERT INTO api VALUES(18, 1, "TariochEveapiFetcherEveWorker", "char", "AccountBalance", 60)');
	$this->addSql('INSERT INTO api VALUES(19, 2, "TariochEveapiFetcherEveWorker", "char", "AssetList", 360)');
	$this->addSql('INSERT INTO api VALUES(20, 16, "TariochEveapiFetcherEveWorker", "char", "ContactList", 1380)');
	$this->addSql('INSERT INTO api VALUES(21, 67108864, "TariochEveapiFetcherEveWorker", "char", "Contracts", 60)');
	$this->addSql('INSERT INTO api VALUES(22, 2048, "TariochEveapiFetcherEveWorker", "char", "MailMessages", 1380)');
	$this->addSql('INSERT INTO api VALUES(23, 512, "TariochEveapiFetcherEveWorker", "char", "MailBodies", 1380)');
	$this->addSql('INSERT INTO api VALUES(24, 1024, "TariochEveapiFetcherEveWorker", "char", "MailingLists", 60)');
	$this->addSql('INSERT INTO api VALUES(25, 2097152, "TariochEveapiFetcherEveWorker", "char", "WalletJournal", 30)');
	$this->addSql('INSERT INTO api VALUES(26, 4194304, "TariochEveapiFetcherEveWorker", "char", "WalletTransactions", 60)');
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apiCall DROP FOREIGN KEY FK_6255DFCE2F12946A');
        $this->addSql('ALTER TABLE accountCharacter DROP FOREIGN KEY FK_478595412F12946A');
        $this->addSql('ALTER TABLE accountAccountStatus DROP FOREIGN KEY FK_B0E66ADD2F12946A');
        $this->addSql('ALTER TABLE accountAPIKeyInfo DROP FOREIGN KEY FK_199C99BF2F12946A');
        $this->addSql('ALTER TABLE apiCall DROP FOREIGN KEY FK_6255DFCEDB30DDED');
        $this->addSql('ALTER TABLE apiCall DROP FOREIGN KEY FK_6255DFCE1E438816');
        $this->addSql('ALTER TABLE charSkill DROP FOREIGN KEY FK_B21CC534DB30DDED');
        $this->addSql('ALTER TABLE charCorporationRole DROP FOREIGN KEY FK_F4E3617ADB30DDED');
        $this->addSql('ALTER TABLE charCorporationTitle DROP FOREIGN KEY FK_3622E2E4DB30DDED');
        $this->addSql('ALTER TABLE charCorporationRoleAtBase DROP FOREIGN KEY FK_40BAF5A6DB30DDED');
        $this->addSql('ALTER TABLE charCorporationRoleAtHq DROP FOREIGN KEY FK_CCA2D3AADB30DDED');
        $this->addSql('ALTER TABLE charCorporationRoleAtOther DROP FOREIGN KEY FK_DCD86C38DB30DDED');
        $this->addSql('ALTER TABLE eveMemberCorporation DROP FOREIGN KEY FK_80874C9F2CBDFC7A');
        $this->addSql('ALTER TABLE corpCorporationSheet DROP FOREIGN KEY FK_C00F919B5B889CB4');
        $this->addSql('ALTER TABLE corpDivision DROP FOREIGN KEY FK_69697632DB30DDED');
        $this->addSql('ALTER TABLE corpWalletDivision DROP FOREIGN KEY FK_715C1244DB30DDED');
        $this->addSql('ALTER TABLE charCharacterSheet DROP FOREIGN KEY FK_D6AB6EBE1235B5DC');
        $this->addSql('DROP TABLE apiKey');
        $this->addSql('DROP TABLE apiCall');
        $this->addSql('DROP TABLE accountCharacter');
        $this->addSql('DROP TABLE api');
        $this->addSql('DROP TABLE accountAccountStatus');
        $this->addSql('DROP TABLE charSkill');
        $this->addSql('DROP TABLE charCharacterSheet');
        $this->addSql('DROP TABLE charContact');
        $this->addSql('DROP TABLE corpIndustryJob');
        $this->addSql('DROP TABLE charAccountBalance');
        $this->addSql('DROP TABLE mapSovereignty');
        $this->addSql('DROP TABLE corpAccountBalance');
        $this->addSql('DROP TABLE corpMemberTracking');
        $this->addSql('DROP TABLE accountAPIKeyInfo');
        $this->addSql('DROP TABLE charMailMessage');
        $this->addSql('DROP TABLE charMailingList');
        $this->addSql('DROP TABLE eveMemberCorporation');
        $this->addSql('DROP TABLE charCorporationRole');
        $this->addSql('DROP TABLE charAsset');
        $this->addSql('DROP TABLE charCorporateContact');
        $this->addSql('DROP TABLE charCorporationTitle');
        $this->addSql('DROP TABLE charContract');
        $this->addSql('DROP TABLE eveAlliance');
        $this->addSql('DROP TABLE charUpcomingEvent');
        $this->addSql('DROP TABLE charAllianceContact');
        $this->addSql('DROP TABLE corpDivision');
        $this->addSql('DROP TABLE corpLogo');
        $this->addSql('DROP TABLE charCorporationRoleAtBase');
        $this->addSql('DROP TABLE charWalletJournal');
        $this->addSql('DROP TABLE corpCorporationSheet');
        $this->addSql('DROP TABLE eveConquerableStation');
        $this->addSql('DROP TABLE corpWalletJournal');
        $this->addSql('DROP TABLE charWalletTransaction');
        $this->addSql('DROP TABLE charCorporationRoleAtHq');
        $this->addSql('DROP TABLE corpStarbase');
        $this->addSql('DROP TABLE charAttributes');
        $this->addSql('DROP TABLE corpWalletDivision');
        $this->addSql('DROP TABLE corpWalletTransaction');
        $this->addSql('DROP TABLE serverServerStatus');
        $this->addSql('DROP TABLE eveRefType');
        $this->addSql('DROP TABLE charCorporationRoleAtOther');
	$this->addSql('DROP TABLE corpAsset');
    }
}
