CREATE DATABASE `blog` CHARACTER SET utf8;

USE `blog`;


#------------------------------------------------------------
# Table: Roles
#------------------------------------------------------------

CREATE TABLE Roles(
        id        Int  Auto_increment  NOT NULL ,
        nom       Varchar (255) NOT NULL
	,CONSTRAINT Roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------

CREATE TABLE utilisateurs(
        id         Int  Auto_increment  NOT NULL ,
        email      Varchar (255) NOT NULL ,
        MotDepasse Varchar (255) NOT NULL ,
        pseudo     Varchar (255) NOT NULL ,
        id_Roles   Int NOT NULL
	,CONSTRAINT utilisateurs_PK PRIMARY KEY (id)

	,CONSTRAINT utilisateurs_Roles_FK FOREIGN KEY (id_Roles) REFERENCES Roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Articles
#------------------------------------------------------------

CREATE TABLE Articles(
        id                Int  Auto_increment  NOT NULL ,
        textes            Longtext NOT NULL ,
        id_utilisateurs Int NOT NULL
	,CONSTRAINT Articles_PK PRIMARY KEY (id)

	,CONSTRAINT Articles_utilisateurs_FK FOREIGN KEY (id_utilisateurs) REFERENCES utilisateurs(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaires
#------------------------------------------------------------

CREATE TABLE Commentaires(
        id                Int  Auto_increment  NOT NULL ,
        commentaire       Longtext NOT NULL ,
        id_utilisateurs Int NOT NULL ,
        id_Articles       Int
	,CONSTRAINT Commentaires_PK PRIMARY KEY (id)

	,CONSTRAINT Commentaires_utilisateurs_FK FOREIGN KEY (id_utilisateurs) REFERENCES utilisateurs(id)
	,CONSTRAINT Commentaires_Articles0_FK FOREIGN KEY (id_Articles) REFERENCES Articles(id)
)ENGINE=InnoDB;
