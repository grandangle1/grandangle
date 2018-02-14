#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Contact
#------------------------------------------------------------

CREATE TABLE Contact(
        idContact      int (11) Auto_increment  NOT NULL ,
        nameContact    Varchar (100) NOT NULL ,
        surnameContact Varchar (100) NOT NULL ,
        email          Varchar (150) NOT NULL ,
        telephone      Varchar (25) NOT NULL ,
        address        Varchar (100) NOT NULL ,
        city           Varchar (100) NOT NULL ,
        idExpo         Int ,
        PRIMARY KEY (idContact )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: exposition
#------------------------------------------------------------

CREATE TABLE exposition(
        idExpo         int (11) Auto_increment  NOT NULL ,
        week           Varchar (25) NOT NULL ,
        generalDescrFR Varchar (5000) NOT NULL ,
        generalDescrEN Varchar (5000) NOT NULL ,
        idContact      Int ,
        idArtist       Int ,
        PRIMARY KEY (idExpo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: artist
#------------------------------------------------------------

CREATE TABLE artist(
        idArtist      int (11) Auto_increment  NOT NULL ,
        nameArtist    Varchar (100) NOT NULL ,
        surnameArtist Varchar (100) NOT NULL ,
        birthDate     Date NOT NULL ,
        descrArtistFR Varchar (2000) NOT NULL ,
        descrArtistEN Varchar (2000) NOT NULL ,
        idExpo        Int ,
        PRIMARY KEY (idArtist )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: oeuvre
#------------------------------------------------------------

CREATE TABLE oeuvre(
        idOeuvre      int (11) Auto_increment  NOT NULL ,
        nomOeuvre     Varchar (100) NOT NULL ,
        urlFile       Varchar (200) NOT NULL ,
        descrArtistFR Varchar (2000) NOT NULL ,
        descrArtistEN Varchar (2000) NOT NULL ,
        idExpo        Int ,
        PRIMARY KEY (idOeuvre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: compteur
#------------------------------------------------------------

CREATE TABLE compteur(
        fail    Int NOT NULL ,
        zdazdaz int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (zdazdaz )
)ENGINE=InnoDB;

ALTER TABLE Contact ADD CONSTRAINT FK_Contact_idExpo FOREIGN KEY (idExpo) REFERENCES exposition(idExpo);
ALTER TABLE exposition ADD CONSTRAINT FK_exposition_idContact FOREIGN KEY (idContact) REFERENCES Contact(idContact);
ALTER TABLE exposition ADD CONSTRAINT FK_exposition_idArtist FOREIGN KEY (idArtist) REFERENCES artist(idArtist);
ALTER TABLE artist ADD CONSTRAINT FK_artist_idExpo FOREIGN KEY (idExpo) REFERENCES exposition(idExpo);
ALTER TABLE oeuvre ADD CONSTRAINT FK_oeuvre_idExpo FOREIGN KEY (idExpo) REFERENCES exposition(idExpo);
