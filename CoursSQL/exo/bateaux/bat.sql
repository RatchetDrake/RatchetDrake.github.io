-- Nous souhaitons développer une application permettant à un propriétaire de gérer ses bateaux. 

-- Pour simplifier, un bateau est caractérisé uniquement par un nom, un modèle, une taille 
-- et un propriétaire. 
-- Chaque bateau possède un carnet de maintenance permettant de gérer le suivi de l'entretien. 
-- L'entretien est composé d'un ensemble de catégories : moteur, électricité, électronique, 
-- circuit eau douce, coque, gréement (pour les voiliers uniquement). 
-- Chaque catégorie est caractérisée par sa périodicité en année, les dates de la dernière 
-- et prochaine vérification. 
-- Le bateau possède aussi un carnet de bord indiquant l'ensemble des trajets effectués. 
-- Un trajet est caractérisé par une liste de ports, ainsi qu'une liste de coordonnées GPS. 
-- La liste de ports est au minimum de 2 avec le port d'arrivée et de départ (qui peuvent être les mêmes). 

-- Faite un diagramme UML de ce résumé
-- Puis le code SQL 

CREATE DATABASE bateau;

USE bateau;

CREATE TABLE IF NOT EXISTS bateaux (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    modele VARCHAR(255) NOT NULL,
    taille FLOAT NOT NULL, 
    proprietaire VARCHAR(255) NOT NULL,
    id_carnet INT(11) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS carnet_entretien (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    type ENUM("moteur", "éléctricité", "électronique", "circuit eau douce", "coque", "gréement") NOT NULL,
    periodicite INT(11) NOT NULL,
    last DATE,
    next DATE NOT NULL,
    id_bateau INT(11) NOT NULL,
    CONSTRAINT FK_BateauExist FOREIGN KEY (id_bateau) REFERENCES bateaux (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS ports (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS trajets (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_bateau INT(11) NOT NULL,
    id_ports_depart INT(11) NOT NULL,
    id_ports_arrivee INT(11) NOT NULL,
    longitude DECIMAL(11, 8),
    latitude DECIMAL(10, 8),
    CONSTRAINT FK_BateauExists2 FOREIGN KEY (id_bateau) REFERENCES bateaux (id),
    CONSTRAINT FK_PortDepartExist FOREIGN KEY (id_ports_depart) REFERENCES ports (id),
    CONSTRAINT FK_PortArriveeExist FOREIGN KEY (id_ports_arrivee) REFERENCES ports (id)
) ENGINE = InnoDB;



