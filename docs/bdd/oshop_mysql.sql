CREATE DATABASE IF NOT EXISTS `OSHOP` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8_general_ci;
USE `OSHOP`;

CREATE TABLE `APP_USER` (
  `user_id` VARCHAR(42),
  `email` VARCHAR(42),
  `password` VARCHAR(42),
  `firstname` VARCHAR(42),
  `lastname` VARCHAR(42),
  `role` VARCHAR(42),
  `status` VARCHAR(42),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `BRAND` (
  `brand_id` VARCHAR(42),
  `brand_name` VARCHAR(42),
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `CATEGORY` (
  `category_id` VARCHAR(42),
  `category_name` VARCHAR(42),
  `subtitle` VARCHAR(42),
  `picture` VARCHAR(42),
  `home_order` VARCHAR(42),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `PRODUCT` (
  `product_id` VARCHAR(42),
  `product_name` VARCHAR(42),
  `description` VARCHAR(42),
  `picture` VARCHAR(42),
  `price` VARCHAR(42),
  `rate` VARCHAR(42),
  `status` VARCHAR(42),
  `brand_id` VARCHAR(42),
  `category_id` VARCHAR(42),
  `type_id` VARCHAR(42),
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `TAG` (
  `tag_id` VARCHAR(42),
  `tag_name` VARCHAR(42),
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `TYPE` (
  `type_id` VARCHAR(42),
  `type_name` VARCHAR(42),
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `PRODUCT_HAS_TAG` (
  `tag_id` VARCHAR(42),
  `product_id` VARCHAR(42),
  PRIMARY KEY (`tag_id`, `product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`type_id`) REFERENCES `TYPE` (`type_id`);
ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`category_id`) REFERENCES `CATEGORY` (`category_id`);
ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`brand_id`) REFERENCES `BRAND` (`brand_id`);
ALTER TABLE `PRODUCT_HAS_TAG` ADD FOREIGN KEY (`product_id`) REFERENCES `PRODUCT` (`product_id`);
ALTER TABLE `PRODUCT_HAS_TAG` ADD FOREIGN KEY (`tag_id`) REFERENCES `TAG` (`tag_id`);