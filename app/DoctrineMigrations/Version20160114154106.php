<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160114154106 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE science_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE board_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE resource_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE power_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE card_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE direction_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE benefit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE wonder_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE card_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE science (id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_671731A8C53D045F ON science (image)');
        $this->addSql('CREATE TABLE board (id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58562B47C53D045F ON board (image)');
        $this->addSql('CREATE TABLE resource (id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BC91F416C53D045F ON resource (image)');
        $this->addSql('CREATE TABLE power (id INT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE card_type (id INT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE direction (id INT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE benefit (id INT NOT NULL, golds INT NOT NULL, victory_points INT NOT NULL, military_forces INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE benefit_science (benefit_id INT NOT NULL, science_id INT NOT NULL, PRIMARY KEY(benefit_id, science_id))');
        $this->addSql('CREATE INDEX IDX_3F503583B517B89 ON benefit_science (benefit_id)');
        $this->addSql('CREATE INDEX IDX_3F503583F4A44BFA ON benefit_science (science_id)');
        $this->addSql('CREATE TABLE benefit_power (benefit_id INT NOT NULL, power_id INT NOT NULL, PRIMARY KEY(benefit_id, power_id))');
        $this->addSql('CREATE INDEX IDX_8CCCBB9CB517B89 ON benefit_power (benefit_id)');
        $this->addSql('CREATE INDEX IDX_8CCCBB9CAB4FC384 ON benefit_power (power_id)');
        $this->addSql('CREATE TABLE benefit_direction (benefit_id INT NOT NULL, direction_id INT NOT NULL, PRIMARY KEY(benefit_id, direction_id))');
        $this->addSql('CREATE INDEX IDX_4F57B084B517B89 ON benefit_direction (benefit_id)');
        $this->addSql('CREATE INDEX IDX_4F57B084AF73D997 ON benefit_direction (direction_id)');
        $this->addSql('CREATE TABLE benefit_resource (benefit_id INT NOT NULL, resource_id INT NOT NULL, PRIMARY KEY(benefit_id, resource_id))');
        $this->addSql('CREATE INDEX IDX_10754A52B517B89 ON benefit_resource (benefit_id)');
        $this->addSql('CREATE INDEX IDX_10754A5289329D25 ON benefit_resource (resource_id)');
        $this->addSql('CREATE TABLE wonder (id INT NOT NULL, board_id INT DEFAULT NULL, benefit_id INT DEFAULT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8E211078E7EC5785 ON wonder (board_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8E211078B517B89 ON wonder (benefit_id)');
        $this->addSql('CREATE TABLE wonder_resource (wonder_id INT NOT NULL, resource_id INT NOT NULL, PRIMARY KEY(wonder_id, resource_id))');
        $this->addSql('CREATE INDEX IDX_E8E1A6103A08FE59 ON wonder_resource (wonder_id)');
        $this->addSql('CREATE INDEX IDX_E8E1A61089329D25 ON wonder_resource (resource_id)');
        $this->addSql('CREATE TABLE card (id INT NOT NULL, type_id INT DEFAULT NULL, benefit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, min_players INT NOT NULL, image VARCHAR(255) DEFAULT NULL, age INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_161498D3C53D045F ON card (image)');
        $this->addSql('CREATE INDEX IDX_161498D3C54C8C93 ON card (type_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_161498D3B517B89 ON card (benefit_id)');
        $this->addSql('CREATE TABLE card_chain (id INT NOT NULL, chain_id INT NOT NULL, PRIMARY KEY(id, chain_id))');
        $this->addSql('CREATE INDEX IDX_8936E90CBF396750 ON card_chain (id)');
        $this->addSql('CREATE INDEX IDX_8936E90C966C2F62 ON card_chain (chain_id)');
        $this->addSql('CREATE TABLE card_resource (card_id INT NOT NULL, resource_id INT NOT NULL, PRIMARY KEY(card_id, resource_id))');
        $this->addSql('CREATE INDEX IDX_5A03A954ACC9A20 ON card_resource (card_id)');
        $this->addSql('CREATE INDEX IDX_5A03A9589329D25 ON card_resource (resource_id)');
        $this->addSql('ALTER TABLE benefit_science ADD CONSTRAINT FK_3F503583B517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_science ADD CONSTRAINT FK_3F503583F4A44BFA FOREIGN KEY (science_id) REFERENCES science (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_power ADD CONSTRAINT FK_8CCCBB9CB517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_power ADD CONSTRAINT FK_8CCCBB9CAB4FC384 FOREIGN KEY (power_id) REFERENCES power (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_direction ADD CONSTRAINT FK_4F57B084B517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_direction ADD CONSTRAINT FK_4F57B084AF73D997 FOREIGN KEY (direction_id) REFERENCES direction (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_resource ADD CONSTRAINT FK_10754A52B517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE benefit_resource ADD CONSTRAINT FK_10754A5289329D25 FOREIGN KEY (resource_id) REFERENCES resource (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wonder ADD CONSTRAINT FK_8E211078E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wonder ADD CONSTRAINT FK_8E211078B517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wonder_resource ADD CONSTRAINT FK_E8E1A6103A08FE59 FOREIGN KEY (wonder_id) REFERENCES wonder (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wonder_resource ADD CONSTRAINT FK_E8E1A61089329D25 FOREIGN KEY (resource_id) REFERENCES resource (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3C54C8C93 FOREIGN KEY (type_id) REFERENCES card_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3B517B89 FOREIGN KEY (benefit_id) REFERENCES benefit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_chain ADD CONSTRAINT FK_8936E90CBF396750 FOREIGN KEY (id) REFERENCES card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_chain ADD CONSTRAINT FK_8936E90C966C2F62 FOREIGN KEY (chain_id) REFERENCES card (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_resource ADD CONSTRAINT FK_5A03A954ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE card_resource ADD CONSTRAINT FK_5A03A9589329D25 FOREIGN KEY (resource_id) REFERENCES resource (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE benefit_science DROP CONSTRAINT FK_3F503583F4A44BFA');
        $this->addSql('ALTER TABLE wonder DROP CONSTRAINT FK_8E211078E7EC5785');
        $this->addSql('ALTER TABLE benefit_resource DROP CONSTRAINT FK_10754A5289329D25');
        $this->addSql('ALTER TABLE wonder_resource DROP CONSTRAINT FK_E8E1A61089329D25');
        $this->addSql('ALTER TABLE card_resource DROP CONSTRAINT FK_5A03A9589329D25');
        $this->addSql('ALTER TABLE benefit_power DROP CONSTRAINT FK_8CCCBB9CAB4FC384');
        $this->addSql('ALTER TABLE card DROP CONSTRAINT FK_161498D3C54C8C93');
        $this->addSql('ALTER TABLE benefit_direction DROP CONSTRAINT FK_4F57B084AF73D997');
        $this->addSql('ALTER TABLE benefit_science DROP CONSTRAINT FK_3F503583B517B89');
        $this->addSql('ALTER TABLE benefit_power DROP CONSTRAINT FK_8CCCBB9CB517B89');
        $this->addSql('ALTER TABLE benefit_direction DROP CONSTRAINT FK_4F57B084B517B89');
        $this->addSql('ALTER TABLE benefit_resource DROP CONSTRAINT FK_10754A52B517B89');
        $this->addSql('ALTER TABLE wonder DROP CONSTRAINT FK_8E211078B517B89');
        $this->addSql('ALTER TABLE card DROP CONSTRAINT FK_161498D3B517B89');
        $this->addSql('ALTER TABLE wonder_resource DROP CONSTRAINT FK_E8E1A6103A08FE59');
        $this->addSql('ALTER TABLE card_chain DROP CONSTRAINT FK_8936E90CBF396750');
        $this->addSql('ALTER TABLE card_chain DROP CONSTRAINT FK_8936E90C966C2F62');
        $this->addSql('ALTER TABLE card_resource DROP CONSTRAINT FK_5A03A954ACC9A20');
        $this->addSql('DROP SEQUENCE science_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE board_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE resource_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE power_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE card_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE direction_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE benefit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE wonder_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE card_id_seq CASCADE');
        $this->addSql('DROP TABLE science');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE card_type');
        $this->addSql('DROP TABLE direction');
        $this->addSql('DROP TABLE benefit');
        $this->addSql('DROP TABLE benefit_science');
        $this->addSql('DROP TABLE benefit_power');
        $this->addSql('DROP TABLE benefit_direction');
        $this->addSql('DROP TABLE benefit_resource');
        $this->addSql('DROP TABLE wonder');
        $this->addSql('DROP TABLE wonder_resource');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE card_chain');
        $this->addSql('DROP TABLE card_resource');
    }
}
