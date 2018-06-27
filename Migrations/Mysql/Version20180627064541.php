<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20180627064541 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library ADD zippedlibraryfile VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library ADD CONSTRAINT FK_48621E7A37A14920 FOREIGN KEY (zippedlibraryfile) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_48621E7A37A14920 ON sandstorm_neosh5p_domain_model_library (zippedlibraryfile)');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library DROP FOREIGN KEY FK_48621E7A37A14920');
        $this->addSql('DROP INDEX UNIQ_48621E7A37A14920 ON sandstorm_neosh5p_domain_model_library');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library DROP zippedlibraryfile');
    }
}