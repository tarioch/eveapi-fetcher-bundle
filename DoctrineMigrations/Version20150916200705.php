<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Add charSkillInTraining api
 */
class Version20150916200705 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE charSkillInTraining (characterID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, skillInTraining TINYINT(1) NOT NULL, trainingStartTime DATETIME, trainingEndTime DATETIME, trainingTypeID BIGINT UNSIGNED, trainingStartSp BIGINT UNSIGNED, trainingDestinationSp BIGINT UNSIGNED, trainingToLevel INT UNSIGNED, PRIMARY KEY(characterID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('INSERT INTO api VALUES(null, 131072, "TariochEveapiFetcherEveWorker", "char", "SkillInTraining", 60);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DELETE ROM api WHERE name="SkillInTraining";');
        $this->addSql('DROP TABLE charSkillInTraining');
    }
}
