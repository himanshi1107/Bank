-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2021 at 02:28 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `amount`, `datetime`) VALUES
(1, 'Bhoomi Ghagre', 'Mansi Dharpure', '400', '2021-05-15 22:26:57'),
(2, 'Reshma Bhagatkar', 'Sakshi Khapekar', '500', '2021-05-15 22:30:41'),
(3, 'Bhoomi Ghagre', 'Nikhil Pawar', '100', '2021-05-16 14:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_name`, `email`, `amount`) VALUES
(1, 'Sayee Sarodaya', 'sayee22@gmail.com', '10000'),
(2, 'Vaibhavi Pande', 'vaibhavi@gmail.com', '18000'),
(3, 'Himanshi Bobde', 'bobdehimanshi00@gmail.com', '20000'),
(4, 'Mansi Dharpure', 'mansi26@gmail.com', '12300'),
(5, 'Reshma Bhagatkar', 'reshmabh18@gmail.com', '16800'),
(6, 'Nikhil Pawar', 'nikhil0103@gmail.com', '15800'),
(7, 'Sakshi Khapekar', 'sakshikhapekar06@gmail.com', '11700'),
(8, 'Dhananjay Bobde', 'dhananjay2015@gmail.com', '8790'),
(9, 'Jyoti Jain', 'jyoti10@gmail.com', '19500'),
(10, 'Bhoomi Ghagre', 'bhoomigh2015@gmail.com', '14000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
