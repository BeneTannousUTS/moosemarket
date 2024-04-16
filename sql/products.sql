CREATE DATABASE IF NOT EXISTS `assignment_1`;
USE `assignment_1`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
    `prod_ID` int(10) unsigned AUTO_INCREMENT PRIMARY KEY,
    `prod_name` varchar(30) NOT NULL,
    `unit_price` float(8,2),
    `unit_promo_price` float(8,2),
    `quantity` varchar(15) NOT NULL,
    `in_stock` int(10) unsigned NOT NULL,
    `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` VALUES (1000, 'Pink Lady Apple', 2.50, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1001, 'Granny Smith Apple', 3.00, 2.50, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1002, 'Strawberries', 7.50, 5.00, '200 Grams', 20, 'Produce');
INSERT INTO `products` VALUES (1003, 'Hass Avocado', 2.00, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1004, 'Cavendish Bananas', 1.00, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1005, 'Papaya', 3.50, NULL, '1 Unit', 30, 'Produce');
INSERT INTO `products` VALUES (1006, 'Dragonfruit', 6.50, 5, '1 Unit', 10, 'Produce');
INSERT INTO `products` VALUES (1007, 'Navel Orange', 1.00, NULL, '1 Unit', 40, 'Produce');
INSERT INTO `products` VALUES (1008, 'Mandarin', 1.50, NULL, '1 Unit', 50, 'Produce');