CREATE DATABASE IF NOT EXISTS `register_login_php`;

USE `register_login_php`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `gender` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
    );
