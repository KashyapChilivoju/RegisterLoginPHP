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

CREATE TABLE IF NOT EXISTS `companies` (
    `company_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `profile_image` VARCHAR(255) DEFAULT NULL
    );

CREATE TABLE IF NOT EXISTS `employees` (
    `employee_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_email` VARCHAR(255) NOT NULL,
    `company_id` INT NOT NULL,
    `role` VARCHAR(100) NOT NULL,
    `salary` DECIMAL(10, 2) NOT NULL,
    `profile_image` VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (`user_email`) REFERENCES `users`(`email`) ON DELETE CASCADE,
    FOREIGN KEY (`company_id`) REFERENCES `companies`(`company_id`) ON DELETE CASCADE
    );

CREATE TABLE IF NOT EXISTS `roles` (
   `role_id` INT AUTO_INCREMENT PRIMARY KEY,
   `role_name` VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE IF NOT EXISTS `employee_roles` (
    `employee_id` INT NOT NULL,
    `role_id` INT NOT NULL,
    FOREIGN KEY (`employee_id`) REFERENCES `employees`(`employee_id`) ON DELETE CASCADE,
    FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`) ON DELETE CASCADE
    );