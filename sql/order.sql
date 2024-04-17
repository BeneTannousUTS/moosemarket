CREATE DATABASE IF NOT EXISTS `assignment_1`;
USE `assignment_1`;

-- Create a new table named 'order_details'
CREATE TABLE IF NOT EXISTS `order_details` (
    `product_id` INT(10) NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `quantity` INT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL
);