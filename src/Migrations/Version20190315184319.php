<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190315184319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_FC31C36855B33108 ON department_email');
        $this->addSql('ALTER TABLE usercredentials ADD CONSTRAINT FK_3E291E9AAE80F5DF FOREIGN KEY (department_id) REFERENCES department_email (id)');
        $this->addSql('CREATE INDEX IDX_3E291E9AAE80F5DF ON usercredentials (department_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_FC31C36855B33108 ON department_email (name_department)');
        $this->addSql('ALTER TABLE usercredentials DROP FOREIGN KEY FK_3E291E9AAE80F5DF');
        $this->addSql('DROP INDEX IDX_3E291E9AAE80F5DF ON usercredentials');
    }
}
