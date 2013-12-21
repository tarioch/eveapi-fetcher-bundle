<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Upcoming Events table renamed and extended
 */
class Version20131222000140 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE charUpcomingEvent (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, eventID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, eventOwnerID BIGINT UNSIGNED NOT NULL, eventOwnerName VARCHAR(255) NOT NULL, eventDate DATETIME NOT NULL, eventTitle VARCHAR(255) NOT NULL, duration INT NOT NULL, importance TINYINT(1) NOT NULL, eventText LONGTEXT NOT NULL, response VARCHAR(255) NOT NULL, INDEX eventDate (eventDate), UNIQUE INDEX event_owner (eventId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE charUpcomingEvents");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("CREATE TABLE charUpcomingEvents (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, eventID BIGINT UNSIGNED NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, ownerName VARCHAR(255) NOT NULL, eventDate DATETIME NOT NULL, eventTitle VARCHAR(255) NOT NULL, duration INT NOT NULL, importance TINYINT(1) NOT NULL, eventText LONGTEXT NOT NULL, response VARCHAR(255) NOT NULL, UNIQUE INDEX event_owner (eventID, ownerID), INDEX eventDate (eventDate), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE charUpcomingEvent");
    }
}
