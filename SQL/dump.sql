-- Active: 1682060498345@@127.0.0.1@3306@shiporent

DROP TABLE ship_planet;

DROP TABLE ship;

DROP TABLE planet;

CREATE TABLE
    `planet` (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(80) NOT NULL,
        `description` TEXT NOT NULL,
        `distance_from_earth` iNT NOT NULL,
        `picturePath` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `ship` (
        `id` int NOT NULL AUTO_INCREMENT,
        `model` VARCHAR(255) NOT NULL,
        `cost_in_credits` INT NOT NULL,
        `hyperdrive_rating` FLOAT NOT NULL,
        `crew` INT NOT NULL,
        `passengers` INT NOT NULL,
        `cargo_capacity` INT NOT NULL,
        `picturePath` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `ship_planet` (
        `ship_id` INT NOT NULL,
        `planet_id` INT NOT NULL
    );