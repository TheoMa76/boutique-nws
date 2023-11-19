CREATE DATABASE IF NOT EXISTS boutiquenws;
USE boutiquenws;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    createdAt DATE,
    lastLogin DATE
);

CREATE TABLE produit (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom VARCHAR(100) NOT NULL,
    shortDesc VARCHAR(250) NOT NULL,
    description TEXT,
    prix FLOAT NOT NULL,
    quantite INT NOT NULL,
    enAvant BOOL NOT NULL DEFAULT FALSE
);

CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom VARCHAR(100) NOT NULL,
    adresse TEXT NOT NULL,
    telephone VARCHAR(20)
);

CREATE TABLE commandes_produit (
    commande_id INT,
    produit_id INT,
    FOREIGN KEY (commande_id) REFERENCES commandes(id),
    FOREIGN KEY (produit_id) REFERENCES produits(id),
    PRIMARY KEY (commande_id, produit_id)
);

ALTER TABLE users 
ADD COLUMN role VARCHAR(10) NOT NULL AFTER `password`, 
ADD COLUMN updatedAt DATE AFTER `createdAt`;