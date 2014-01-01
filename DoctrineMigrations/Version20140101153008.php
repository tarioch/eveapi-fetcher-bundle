<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Use syntethic key in more tables.
 */
class Version20140101153008 extends AbstractMigration
{

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE corpIndustryJob DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpIndustryJob ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
        $this->addSql("CREATE UNIQUE INDEX job_owner ON corpIndustryJob (jobId, ownerId)");
        $this->addSql("ALTER TABLE corpIndustryJob ADD PRIMARY KEY (ID)");

        $this->addSql("ALTER TABLE corpWalletTransaction DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpWalletTransaction ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
        $this->addSql("CREATE UNIQUE INDEX transaction_owner ON corpWalletTransaction (transactionId, ownerId)");

        $this->addSql("ALTER TABLE corpWalletJournal DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpWalletJournal ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
        $this->addSql("CREATE UNIQUE INDEX entry_owner ON corpWalletJournal (refId, ownerId)");

        $this->addSql("ALTER TABLE charWalletTransaction DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charWalletTransaction ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
        $this->addSql("CREATE UNIQUE INDEX transaction_owner ON charWalletTransaction (transactionId, ownerId)");

        $this->addSql("ALTER TABLE charWalletJournal DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charWalletJournal ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
        $this->addSql("CREATE UNIQUE INDEX entry_owner ON charWalletJournal (refId, ownerId)");

        $this->addSql("ALTER TABLE charContract DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charContract ADD ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY FIRST");
    }

    /**
     * @inheritdoc
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");

        $this->addSql("ALTER TABLE charContract DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charContract DROP ID");
        $this->addSql("ALTER TABLE charContract ADD PRIMARY KEY (contractID)");
        $this->addSql("DROP INDEX entry_owner ON charWalletJournal");
        $this->addSql("ALTER TABLE charWalletJournal DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charWalletJournal DROP ID");
        $this->addSql("ALTER TABLE charWalletJournal ADD PRIMARY KEY (refID)");
        $this->addSql("DROP INDEX transaction_owner ON charWalletTransaction");
        $this->addSql("ALTER TABLE charWalletTransaction DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE charWalletTransaction DROP ID");
        $this->addSql("ALTER TABLE charWalletTransaction ADD PRIMARY KEY (transactionID)");
        $this->addSql("DROP INDEX job_owner ON corpIndustryJob");
        $this->addSql("ALTER TABLE corpIndustryJob DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpIndustryJob DROP ID");
        $this->addSql("ALTER TABLE corpIndustryJob ADD PRIMARY KEY (jobID)");
        $this->addSql("DROP INDEX entry_owner ON corpWalletJournal");
        $this->addSql("ALTER TABLE corpWalletJournal DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpWalletJournal DROP ID");
        $this->addSql("ALTER TABLE corpWalletJournal ADD PRIMARY KEY (refID)");
        $this->addSql("DROP INDEX transaction_owner ON corpWalletTransaction");
        $this->addSql("ALTER TABLE corpWalletTransaction DROP PRIMARY KEY");
        $this->addSql("ALTER TABLE corpWalletTransaction DROP ID");
        $this->addSql("ALTER TABLE corpWalletTransaction ADD PRIMARY KEY (transactionID)");
    }
}
