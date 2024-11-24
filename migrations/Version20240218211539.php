<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218211539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (idblog INT AUTO_INCREMENT NOT NULL, titleblog VARCHAR(30) NOT NULL, contentblog VARCHAR(1000) NOT NULL, likesblog INT DEFAULT NULL, categorie VARCHAR(30) NOT NULL, idcountry INT NOT NULL, iduser INT NOT NULL, INDEX IDX_C01551435E5C27E9 (iduser), PRIMARY KEY(idblog)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE commande (`references` INT AUTO_INCREMENT NOT NULL, datecommande DATE NOT NULL, etatcommande VARCHAR(30) NOT NULL, idproduit INT NOT NULL, coupon VARCHAR(10) DEFAULT NULL, iduser INT NOT NULL, INDEX IDX_6EEAA67D5E5C27E9 (iduser), PRIMARY KEY(`references`)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE comments (idcomment INT AUTO_INCREMENT NOT NULL, likescomment INT DEFAULT NULL, contentcomment VARCHAR(255) NOT NULL, datecomment DATE NOT NULL, idblog INT NOT NULL, iduser INT NOT NULL, INDEX IDX_5F9E962A13DAA0E3 (idblog), INDEX IDX_5F9E962A5E5C27E9 (iduser), PRIMARY KEY(idcomment)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE continent (idcontinent INT AUTO_INCREMENT NOT NULL, namecontinent VARCHAR(30) NOT NULL, descriptioncontinent VARCHAR(601) NOT NULL, PRIMARY KEY(idcontinent)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE country (idcountry INT AUTO_INCREMENT NOT NULL, namecountry VARCHAR(30) NOT NULL, descriptioncountry VARCHAR(601) NOT NULL, idcontinent INT NOT NULL, INDEX IDX_5373C96612DCA589 (idcontinent), PRIMARY KEY(idcountry)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE event (id_event INT AUTO_INCREMENT NOT NULL, name_event VARCHAR(30) NOT NULL, description_event VARCHAR(601) NOT NULL, start_event DATETIME NOT NULL, dateendevent DATETIME NOT NULL, locationevent VARCHAR(30) NOT NULL, idorganiser INT NOT NULL, nbattendees INT DEFAULT NULL, idcountry INT NOT NULL, INDEX IDX_3BAE0AA78C779B08 (idcountry), PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE offre (idpost INT AUTO_INCREMENT NOT NULL, idcountry INT NOT NULL, prixpost DOUBLE PRECISION NOT NULL, descriptionpost VARCHAR(200) DEFAULT NULL, likespost INT DEFAULT NULL, photopost VARCHAR(1000) DEFAULT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, iduser INT NOT NULL, INDEX IDX_AF86866F5E5C27E9 (iduser), PRIMARY KEY(idpost)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE payement (idpayement INT AUTO_INCREMENT NOT NULL, typepayement VARCHAR(30) NOT NULL, montant DOUBLE PRECISION NOT NULL, datereglement DATE NOT NULL, reference VARCHAR(255) NOT NULL, PRIMARY KEY(idpayement)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE product (idproduct INT AUTO_INCREMENT NOT NULL, categorieproduct VARCHAR(30) NOT NULL, nomproduct VARCHAR(30) NOT NULL, prixproduct DOUBLE PRECISION NOT NULL, stockproduct INT NOT NULL, promotionproduct INT DEFAULT NULL, idcountry INT NOT NULL, INDEX IDX_D34A04AD8C779B08 (idcountry), PRIMARY KEY(idproduct)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE reservation (idreservation INT AUTO_INCREMENT NOT NULL, idpost INT NOT NULL, iduser INT NOT NULL, INDEX IDX_42C8495589459D2D (idpost), INDEX IDX_42C849555E5C27E9 (iduser), PRIMARY KEY(idreservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (iduser INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(30) DEFAULT NULL, lastname VARCHAR(30) DEFAULT NULL, phonenumber INT NOT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(50) NOT NULL, dob DATE DEFAULT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(iduser)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C01551435E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D5E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A13DAA0E3 FOREIGN KEY (idblog) REFERENCES blog (idblog)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4B700002 FOREIGN KEY (idcomment) REFERENCES comments (idcomment)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A5E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C96612DCA589 FOREIGN KEY (idcontinent) REFERENCES continent (idcontinent)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA78C779B08 FOREIGN KEY (idcountry) REFERENCES country (idcountry)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F5E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD8C779B08 FOREIGN KEY (idcountry) REFERENCES country (idcountry)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495589459D2D FOREIGN KEY (idpost) REFERENCES offre (idpost)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849555E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C01551435E5C27E9');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D5E5C27E9');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A13DAA0E3');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A4B700002');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A5E5C27E9');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C96612DCA589');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA78C779B08');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F5E5C27E9');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD8C779B08');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495589459D2D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849555E5C27E9');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE payement');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE user');
    }
}
