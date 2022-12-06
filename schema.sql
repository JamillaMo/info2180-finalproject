DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

-- Table structure for `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int(11) NOT NULL auto_increment,
    `firstname` VARCHAR(250) NOT NULL default ' ',
    `lastname` VARCHAR(250) NOT NULL default ' ',
    `password` VARCHAR(15) NOT NULL,
    `email` VARCHAR(50) NOT NULL default ' ',
    `role` VARCHAR (50) NOT NULL default ' ',
    `created_at` DATETIME,
PRIMARY KEY (`id`)
);

INSERT INTO `users` (`email`, `password`) 
VALUES ('admin@project2.com', PASSWORD('password123'));

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
    `id` int(11) NOT NULL auto_increment,
    `title` VARCHAR(50) NOT NULL default ' ',
    `firstname` VARCHAR(250) NOT NULL default ' ',
    `lastname` VARCHAR(250) NOT NULL default ' ',
    `email` VARCHAR(50) NOT NULL default ' ',
    `telephone` VARCHAR (15) NOT NULL default ' ',
    `company` VARCHAR(250) NOT NULL default ' ',
    `type` VARCHAR(15) NOT NULL default ' ',
    `assigned_to` int(11) NOT NULL,
    `created_by` int(11) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
PRIMARY KEY (`id`),
FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`),
FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
);

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes`(
    `id` int(11) NOT NULL auto_increment,
    `contact_id` int(11) NOT NULL,
    `comment` TEXT NOT NULL default ' ',
    `created_by` int(11) NOT NULL,
    `created_at` DATETIME,
PRIMARY KEY (`id`),
FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
);
