-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2019 at 05:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'mobile',
  `postcode` varchar(14) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image_name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `phonenumber` (`phonenumber`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `name`, `lastname`, `phonenumber`, `type`, `postcode`, `email`, `image_name`, `user_id`) VALUES
(9, 'Mahsa', 'Shafiee', '0996455736', 'mobile', '1144565576', 'mahsa@mahsa.mahsa', 'Kim, Hyung-Jung_My soul is on something else_Z0ViSGpf.jpg', 2),
(6, 'Darya', 'Shokri', '43564356', 'mobile', '1223445311', 'darya@darya.darya', 'hhgj.jpg', 2),
(4, 'Shirin', 'Ghoddousi', '983636995', 'mobile', '144357668', 'shirin@shirin.shirin', 'art.jpg', 2),
(7, 'Fatemeh', 'Aram', '887556547', 'work', '1443255678', 'fateme@fateme.fateme', 'Kim.jpg', 2),
(8, 'Zahra', 'Shafiee', '0887365275', 'mobile', '1334344345', 'zahra@zahra.zahra', 'Kimyu.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`) VALUES
(1, 'mahsashafiee6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'mahsashafiee4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'mahsashafie4@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
