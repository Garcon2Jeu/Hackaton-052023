-- Active: 1682060498345@@127.0.0.1@3306@shiporent

CREATE TABLE
    `planet` (
        `id` int NOT NULL,
        `Name` VARCHAR(80) NOT NULL,
        `description` TEXT NOT NULL,
        `distance_from_earth` iNT NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `ship` (
        `id` int NOT NULL,
        `model` VARCHAR(255) NOT NULL,
        `cost_in_credit` INT NOT NULL,
        `hyperdrive_rating` FLOAT NOT NULL,
        `crew` INT NOT NULL,
        `passenger` INT NOT NULL,
        `cargo_capacity` INT NOT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    `ship_planet` (
        `ship_id` INT NOT NULL,
        `planet_id` INT NOT NULL
    );

ALTER TABLE `ship_planet`
ADD
    CONSTRAINT `fk_ship_planet_ship_id` FOREIGN KEY(`ship_id`) REFERENCES `planet` (`id`);

ALTER TABLE `ship_planet`
ADD
    CONSTRAINT `fk_ship_planet_planet_id` FOREIGN KEY(`planet_id`) REFERENCES `ship` (`id`);