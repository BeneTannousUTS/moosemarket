CREATE TABLE IF NOT EXISTS `order_details` (
    `prod_ID` INT(10) NOT NULL,
    `prod_name` VARCHAR(255) NOT NULL,
    `quantity` INT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL
);