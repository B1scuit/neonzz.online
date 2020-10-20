-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.23-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for customer
CREATE DATABASE IF NOT EXISTS `customer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `customer`;

-- Dumping structure for table customer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `createIP` varchar(50) NOT NULL DEFAULT '',
  `Priv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table customer.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `first_name`, `last_name`, `createIP`, `Priv`) VALUES
	(2, 'neonzz', 'treble.6@live.co.uk', '$2y$10$jmfXRFjtQS0emNDtHl22SOtKJa9/iTPD0WNH6qMsALyocSrBZkzC2', '2020-09-11 12:18:38', 'Daniel', 'Young', '77.68.77.51', 255),
	(5, 'IsRWSiHlkpdqXyQ', 'oughlesedrx@gmail.com', '$2y$10$eQ8QF45TdLWQFy0g1oG.seLYwrG5lhqtkbkN5.wr4xRHh1p85yUyK', '2020-10-18 11:54:27', 'lexnUSRoLNigMWC', 'WJrZITnAdDsvpE', '202.168.201.123', 0),
	(6, 'hiArQvDkwpM', '', '$2y$10$iNhuNA9tBQ/3UPEBUWG5ieFMowCoIB3T0UkzNT7s4dQw4LiielbNe', '2020-10-18 11:54:29', 'VQxSXnGYLl', 'YmAEXxHWqij', '202.168.201.123', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
