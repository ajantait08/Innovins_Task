-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for innovins
CREATE DATABASE IF NOT EXISTS `innovins` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `innovins`;

-- Dumping structure for table innovins.products_task3
CREATE TABLE IF NOT EXISTS `products_task3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table innovins.products_task3: ~4 rows (approximately)
DELETE FROM `products_task3`;
INSERT INTO `products_task3` (`id`, `name`, `description`, `price`, `created_at`) VALUES
	(1, 'New Product', 'Description of the new product', 9.99, '2024-08-06 20:00:25'),
	(2, 'New Product 2', 'Description of the new product 2', 10.99, '2024-08-06 20:02:35'),
	(4, 'Product 4', 'Testing description', 19.99, '2024-08-06 20:13:38'),
	(5, 'Product 5', 'Testing description', 19.99, '2024-08-06 20:13:54');

-- Dumping structure for table innovins.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table innovins.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `created_at`) VALUES
	(3, 'Dummy User2', 'dummy@test2.com', '2024-08-07 14:02:18'),
	(4, 'Dummy User3', 'dummy@test3.com', '2024-08-07 14:02:18');

-- Dumping structure for table innovins.users_task2
CREATE TABLE IF NOT EXISTS `users_task2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table innovins.users_task2: ~9 rows (approximately)
DELETE FROM `users_task2`;
INSERT INTO `users_task2` (`id`, `username`, `email`, `password`, `reset_token`, `reset_token_expiry`) VALUES
	(1, 'bcvbcbb', 'cvbcb@dfgdg.com', '$2y$10$a07VdqRHjtLzhHmw7c6OmuceHz3JTNKLgaMdOPjdPYViQlBzG53Q6', NULL, NULL),
	(2, 'gfdgdfg', 'gd@g.com', '$2y$10$w8sEMXZybBk1dYVaq375au60worA0wkL1LEc69YTNvgGpGTuhyPsm', NULL, NULL),
	(3, 'sdfs', 'sfs@gdgd.com', '$2y$10$1EeALSRqE0NVvo1uiooKweFp6S581Wth9nzVENVg2Y9N/4jnSNjjK', NULL, NULL),
	(4, 'vdfg', 'f@gd.com', '$2y$10$VWMlY1QDtpTcXRVedD5sdejIFICNoDj8.ViBCR83Hd8N8WDzRJdlm', NULL, NULL),
	(5, 'fgdfg', 'dg@dgdg.com', '$2y$10$pe54GRw0Wnv7vTCI8.XxNOKQwcvWU1bj4wLrLTz/54OQQEZlgDdaG', NULL, NULL),
	(6, 'sdfs', 'fs@dgd.com', '$2y$10$SfT277BZxJFkpi/EccnYseY44nNDvwpjuN0/7KhuF27lObd8UrRCq', NULL, NULL),
	(7, 'dsdsf', 'asd@hj.com', '$2y$10$8iRJ7hqMKGW2zBMxl7XMVeeUe8sVBf4t7fWu.1oLRa0UclDtwKFkG', NULL, NULL),
	(8, 'Ajanta', 'ajanta.ghosh08@gmail.com', '$2y$10$DB/3yGGZ.Hp9/P53yn.hL.XWtKYd9xufqDqq6ZfVHWUAxRDv/j6ne', '1111', '2024-08-10 00:05:35'),
	(9, 'Ajanta Ghosh', 'ajanta.au@iitism.ac.in', '$2y$10$wJZQgHvqERe9SJcTj9dur.crXpqPkG9I6tqT6SdkiuzXGnl48L/7m', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
