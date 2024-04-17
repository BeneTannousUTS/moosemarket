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

-- Produce category
INSERT INTO `products` VALUES (1000, 'Pink Lady Apple', 2.50, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1001, 'Granny Smith Apple', 3.00, 2.50, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1002, 'Strawberries', 7.50, 5.00, '200 Grams', 20, 'Produce');
INSERT INTO `products` VALUES (1003, 'Hass Avocado', 2.00, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1004, 'Cavendish Bananas', 1.00, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1005, 'Papaya', 3.50, NULL, '1 Unit', 30, 'Produce');
INSERT INTO `products` VALUES (1006, 'Dragonfruit', 6.50, 5.00, '1 Unit', 10, 'Produce');
INSERT INTO `products` VALUES (1007, 'Navel Orange', 1.00, NULL, '1 Unit', 40, 'Produce');
INSERT INTO `products` VALUES (1008, 'Mandarin', 1.50, NULL, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1009, 'Rock Melon', 4.50, 3.00, '1 Unit', 50, 'Produce');
INSERT INTO `products` VALUES (1010, 'Watermelon', 5.00, NULL, '1 Unit', 25, 'Produce');
INSERT INTO `products` VALUES (1011, 'Pineapple', 4.50, NULL, '1 Unit', 30, 'Produce');
INSERT INTO `products` VALUES (1012, 'Red Grapes', 6.00, 4.50, '500 Grams', 20, 'Produce');
INSERT INTO `products` VALUES (1013, 'Blueberries', 8.00, 6.50, '250 Grams', 15, 'Produce');
INSERT INTO `products` VALUES (1014, 'Raspberries', 9.00, 7.00, '250 Grams', 15, 'Produce');

-- Dairy category
INSERT INTO `products` VALUES (1015, 'Milk', 3.50, NULL, '1 Liter', 40, 'Dairy');
INSERT INTO `products` VALUES (1016, 'Eggs', 2.00, NULL, 'Dozen', 50, 'Dairy');
INSERT INTO `products` VALUES (1017, 'Cheese', 7.00, 5.50, '200 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1018, 'Butter', 4.00, NULL, '200 Grams', 35, 'Dairy');
INSERT INTO `products` VALUES (1019, 'Yogurt', 2.50, 2.00, '500 Grams', 30, 'Dairy');
INSERT INTO `products` VALUES (1020, 'Cream', 6.00, NULL, '250 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1021, 'Ice Cream', 8.00, 6.50, '1 Liter', 15, 'Dairy');
INSERT INTO `products` VALUES (1022, 'Sour Cream', 3.00, NULL, '200 Grams', 25, 'Dairy');
INSERT INTO `products` VALUES (1023, 'Cottage Cheese', 5.00, 4.00, '250 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1024, 'Mozzarella', 6.50, NULL, '200 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1025, 'Parmesan', 9.00, 7.50, '200 Grams', 15, 'Dairy');
INSERT INTO `products` VALUES (1026, 'Feta', 7.50, NULL, '200 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1027, 'Ricotta', 6.00, NULL, '200 Grams', 20, 'Dairy');
INSERT INTO `products` VALUES (1028, 'Whipped Cream', 4.50, NULL, '250 Grams', 20, 'Dairy');

-- Meat category
INSERT INTO `products` VALUES (1029, 'Chicken Breast', 10.00, NULL, '500 Grams', 30, 'Meat');
INSERT INTO `products` VALUES (1030, 'Beef Steak', 15.00, NULL, '500 Grams', 25, 'Meat');
INSERT INTO `products` VALUES (1031, 'Pork Chops', 12.00, NULL, '500 Grams', 28, 'Meat');
INSERT INTO `products` VALUES (1032, 'Lamb Rack', 20.00, NULL, '500 Grams', 20, 'Meat');
INSERT INTO `products` VALUES (1033, 'Turkey', 18.00, NULL, '4 Kg', 15, 'Meat');
INSERT INTO `products` VALUES (1034, 'Duck', 16.00, NULL, '1 Unit', 15, 'Meat');
INSERT INTO `products` VALUES (1035, 'Bacon', 9.00, NULL, '200 Grams', 35, 'Meat');
INSERT INTO `products` VALUES (1036, 'Sausages', 7.50, NULL, '500 Grams', 40, 'Meat');
INSERT INTO `products` VALUES (1037, 'Salmon Fillet', 14.00, NULL, '500 Grams', 20, 'Meat');
INSERT INTO `products` VALUES (1038, 'Tuna Steak', 12.00, NULL, '500 Grams', 20, 'Meat');
INSERT INTO `products` VALUES (1039, 'Shrimp', 20.00, NULL, '500 Grams', 18, 'Meat');
INSERT INTO `products` VALUES (1040, 'Lobster', 30.00, NULL, '1 Unit', 10, 'Meat');
INSERT INTO `products` VALUES (1041, 'Crab', 25.00, NULL, '1 Unit', 12, 'Meat');
INSERT INTO `products` VALUES (1042, 'Scallops', 22.00, NULL, '500 Grams', 15, 'Meat');

-- Bakery category
INSERT INTO `products` VALUES (1043, 'Bread', 2.50, NULL, 'Loaf', 50, 'Bakery');
INSERT INTO `products` VALUES (1044, 'Baguette', 3.00, NULL, '1 Unit', 40, 'Bakery');
INSERT INTO `products` VALUES (1045, 'Croissant', 1.50, NULL, '1 Unit', 60, 'Bakery');
INSERT INTO `products` VALUES (1046, 'Muffin', 2.00, NULL, '1 Unit', 45, 'Bakery');
INSERT INTO `products` VALUES (1047, 'Donut', 1.00, NULL, '1 Unit', 55, 'Bakery');
INSERT INTO `products` VALUES (1048, 'Cake', 20.00, 15.00, '1 Unit', 10, 'Bakery');
INSERT INTO `products` VALUES (1049, 'Cookies', 4.00, 3.00, '500 Grams', 30, 'Bakery');
INSERT INTO `products` VALUES (1050, 'Brownies', 5.00, 4.00, '500 Grams', 25, 'Bakery');
INSERT INTO `products` VALUES (1051, 'Pie', 12.00, 10.00, '1 Unit', 15, 'Bakery');
INSERT INTO `products` VALUES (1052, 'Tart', 8.00, 6.50, '1 Unit', 20, 'Bakery');
INSERT INTO `products` VALUES (1053, 'Sourdough', 4.00, NULL, 'Loaf', 35, 'Bakery');
INSERT INTO `products` VALUES (1054, 'Pita Bread', 2.00, NULL, '1 Unit', 40, 'Bakery');
INSERT INTO `products` VALUES (1055, 'Cinnamon Roll', 2.50, NULL, '1 Unit', 50, 'Bakery');
INSERT INTO `products` VALUES (1056, 'Bagel', 1.50, NULL, '1 Unit', 45, 'Bakery');