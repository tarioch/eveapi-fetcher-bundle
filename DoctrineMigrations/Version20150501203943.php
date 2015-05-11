<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add corp blueprint
 */
class Version20150501203943 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE corpBlueprint (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ownerID BIGINT UNSIGNED NOT NULL, itemID BIGINT UNSIGNED NOT NULL, locationID BIGINT UNSIGNED NOT NULL, typeID BIGINT UNSIGNED NOT NULL, typeName VARCHAR(255) NOT NULL, quantity BIGINT NOT NULL, flag INT NOT NULL, timeEfficiency INT UNSIGNED NOT NULL, materialEfficiency INT UNSIGNED NOT NULL, runs INT NOT NULL, INDEX owner (ownerID), UNIQUE INDEX entry_owner (itemId, ownerId), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('INSERT INTO api VALUES(27, 2, "TariochEveapiFetcherEveWorker", "corp", "Blueprints", 1440);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
