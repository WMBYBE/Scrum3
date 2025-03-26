-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2025 at 02:32 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `village`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

DROP TABLE IF EXISTS `farm`;
CREATE TABLE IF NOT EXISTS `farm` (
  `FarmId` int NOT NULL AUTO_INCREMENT,
  `Crop` varchar(200) NOT NULL,
  `size` int NOT NULL,
  `price` double NOT NULL,
  `BuildDate` date NOT NULL,
  PRIMARY KEY (`FarmId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`FarmId`, `Crop`, `size`, `price`, `BuildDate`) VALUES
(1, 'Corn', 12, 9.99, '2025-03-04'),
(2, 'Tomato', 11, 5.89, '2025-03-04'),
(3, 'wheat', 16, 2.99, '2025-03-04'),
(4, 'potato', 55, 12.99, '2025-03-04'),
(5, 'kiwi', 99, 20, '2025-03-04'),
(6, 'strawberry', 5, 99.99, '2025-03-04'),
(7, 'oat', 100, 0.99, '2025-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `HouseId` int NOT NULL AUTO_INCREMENT,
  `Address` varchar(200) NOT NULL,
  `Owner` varchar(60) NOT NULL,
  `Value` double NOT NULL,
  `Build Date` date NOT NULL,
  PRIMARY KEY (`HouseId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`HouseId`, `Address`, `Owner`, `Value`, `Build Date`) VALUES
(1, '1 main street', 'bob', 999.99, '2025-03-04'),
(2, '2 main street', 'bob', 11.11, '2016-03-16'),
(3, '1 side street', 'peter', 112, '2025-03-11'),
(4, '2 side street', 'peter', 99999.99, '2025-03-10'),
(5, '3 main street', 'will', 10.99, '2025-03-10'),
(6, '52 house ave', 'John', 99.99, '2024-11-03'),
(7, '123 fake st', 'alvin', 10000000, '2014-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `villagers`
--

DROP TABLE IF EXISTS `villagers`;
CREATE TABLE IF NOT EXISTS `villagers` (
  `VillagerId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `Height` int NOT NULL,
  `Job` varchar(50) NOT NULL,
  PRIMARY KEY (`VillagerId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `villagers`
--

INSERT INTO `villagers` (`VillagerId`, `Name`, `Birthdate`, `Height`, `Job`) VALUES
(1, 'John', '2016-09-01', 51, 'Blacksmith'),
(2, 'Alvin', '2002-02-05', 55, 'Singer'),
(3, 'Bob', '2001-03-11', 61, 'Waiter'),
(4, 'Lorenzo', '1997-06-10', 49, 'Knight'),
(5, 'will', '2025-03-02', 66, 'Banker'),
(6, 'Blade', '2020-10-21', 58, 'Hunter'),
(7, 'Peter', '2007-10-18', 77, 'Farmer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
