-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 12:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `codex`
--
-- --------------------------------------------------------
--
-- Table structure for table `brands`
--
Drop schema if exists TheDigCrafts;
create schema TheDigCrafts;
use TheDigCrafts;
CREATE TABLE IF NOT EXISTS `brands` (
    `brand_id` int(11) NOT NULL AUTO_INCREMENT,
    `brand_name` varchar(100) NOT NULL,
    PRIMARY KEY (`brand_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `brands`
--
INSERT INTO `brands` (`brand_id`, `brand_name`)
VALUES (1, 'Adinkrahene'),
    (2, 'Akoma'),
    (3, 'Nteasee'),
    (4, 'Duafe'),
    (5, 'Nyansapo');
-- --------------------------------------------------------
--
-- Table structure for table `cart`
--
CREATE TABLE IF NOT EXISTS `cart` (
    `p_id` int(11) NOT NULL,
    `ip_add` varchar(50) NOT NULL,
    `c_id` int(11) DEFAULT NULL,
    `quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `categories`
--
CREATE TABLE IF NOT EXISTS `categories` (
    `cat_id` int(11) NOT NULL AUTO_INCREMENT,
    `cat_name` varchar(100) NOT NULL,
    PRIMARY KEY (`cat_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `categories`
--
INSERT INTO `categories` (`cat_id`, `cat_name`)
VALUES (1, 'Keyholders'),
    (2, 'Bookmarks'),
    (3, 'Hairclips'),
    (4, 'Necklace'),
    (5, 'Comb'),
    (6, 'Pendant'),
    (7, 'Earrings');
-- --------------------------------------------------------
--
-- Table structure for table `orderdetails`
--
CREATE TABLE IF NOT EXISTS `orderdetails` (
    `order_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    KEY `order_id` (`order_id`),
    KEY `product_id` (`product_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `orders`
--
CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `invoice_no` int(11) NOT NULL,
    `order_date` datetime NOT NULL,
    `order_status` varchar(100) NOT NULL,
    PRIMARY KEY (`order_id`),
    KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `payment`
--
CREATE TABLE IF NOT EXISTS `payment` (
    `payment_id` int(11) NOT NULL AUTO_INCREMENT,
    `amount` double NOT NULL,
    `user_id` int(11) NOT NULL,
    `order_id` int(11) NOT NULL,
    `currency` text NOT NULL,
    `payment_date` datetime NOT NULL,
    PRIMARY KEY (`payment_id`),
    KEY `order_id` (`order_id`),
    KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `products`
--
CREATE TABLE IF NOT EXISTS `products` (
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_cat` int(11) NOT NULL,
    `product_brand` int(11) NOT NULL,
    `product_title` varchar(255) NOT NULL,
    `product_price` double NOT NULL,
    `product_desc` varchar(500) NOT NULL,
    `product_image` varchar(100) NOT NULL,
    `product_keywords` varchar(150) NOT NULL,
    `stock` int(11) NOT NULL,
    PRIMARY KEY (`product_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `product_review`
--
CREATE TABLE IF NOT EXISTS `product_review` (
    `review_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `review` varchar(250) NOT NULL,
    `p_date` date DEFAULT NULL,
    PRIMARY KEY (`review_id`),
    KEY `user_id` (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_fname` varchar(100) NOT NULL,
    `user_lname` varchar(100) NOT NULL,
    `user_email` varchar(50) NOT NULL,
    `user_pass` varchar(150) NOT NULL,
    `user_contact` varchar(15) NOT NULL,
    `user_role` int(11) DEFAULT 2,
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `wishlist`
--
CREATE TABLE IF NOT EXISTS `wishlist` (
    `p_id` int(11) NOT NULL,
    `ip_add` varchar(50) NOT NULL,
    `c_id` int(11) DEFAULT NULL,
    `quantity` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
    ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
    ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;