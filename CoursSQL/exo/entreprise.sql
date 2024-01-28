CREATE DATABASE entreprise;

USE entreprise; 

CREATE TABLE PERSONNE (
    Personneid INT PRIMARY KEY,
    PersonneCode VARCHAR(255),
    AdresseCourriel VARCHAR(255)
);

CREATE TABLE COLLABORATEUR (
    Matricule INT,
    NIR VARCHAR(255),
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    DateEmbauche DATE,
    Salaire FLOAT,
    PersonneId INT,
    FOREIGN KEY (PersonneId) REFERENCES PERSONNE(Personneid)
);

CREATE TABLE SERVICE (
    ServiceId INT PRIMARY KEY,
    ServiceCode VARCHAR(255),
    ServiceLibelle VARCHAR(255)
);

CREATE TABLE EMPLOYE (
    PersonneId INT,
    Profil VARCHAR(255),
    FOREIGN KEY (PersonneId) REFERENCES PERSONNE(Personneid)
);

CREATE TABLE DIRECTEUR (
    PersonneId INT PRIMARY KEY,
    PrimeBilan FLOAT,
    FOREIGN KEY (PersonneId) REFERENCES PERSONNE(Personneid)
);

CREATE TABLE TIERS (
    NoSiret INT(11) PRIMARY KEY,
    RaisonSociale VARCHAR(255)
);

CREATE TABLE ADRESSE (
    Adresseld INT PRIMARY KEY,
    AdresseLigne2 VARCHAR(255),
    AdresseLigne3 VARCHAR(255),
    AdresseLigne4 VARCHAR(255),
    AdresseCodePostal VARCHAR(255),
    Personneid INT,
    FOREIGN KEY (Personneid) REFERENCES PERSONNE(Personneid)
);