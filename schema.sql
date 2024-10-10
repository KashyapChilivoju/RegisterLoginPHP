CREATE DATABASE IF NOT EXISTS `register_login_php`;

USE `register_login_php`;

CREATE TABLE IF NOT EXISTS `users` (
    `email` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `gender` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`email`)
    );
