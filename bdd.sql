CREATE DATABASE IF NOT EXISTS pokedex;

USE pokedex;

CREATE TABLE pokemon(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(128),
    pv INTEGER,
    attaque INTEGER,
    defense INTEGER,
    vitesse INTEGER,
    image VARCHAR(128),
    id_user INTEGER REFERENCES user(id)
);

CREATE TABLE user(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(60),
    email VARCHAR(128),
    password VARCHAR(128),
    image VARCHAR(128)
);
