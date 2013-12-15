<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Key reference in ApiCall
 */
class Version20131215221507 extends AbstractMigration
{
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE apiCall ADD keyID BIGINT UNSIGNED DEFAULT NULL");
        $this->addSql("ALTER TABLE apiCall ADD CONSTRAINT FK_6255DFCE2F12946A FOREIGN KEY (keyID) REFERENCES apiKey (keyID) ON DELETE CASCADE");
        $this->addSql("CREATE INDEX IDX_6255DFCE2F12946A ON apiCall (keyID)");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE apiCall DROP FOREIGN KEY FK_6255DFCE2F12946A");
        $this->addSql("DROP INDEX IDX_6255DFCE2F12946A ON apiCall");
        $this->addSql("ALTER TABLE apiCall DROP keyID");
    }
}
