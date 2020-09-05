-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2019 at 06:42 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--
CREATE DATABASE IF NOT EXISTS `userinfo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `userinfo`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `username`, `first_name`, `last_name`) VALUES
('alice@aaa.com', '123', 'alice', 'Alice', 'Goh'),
('bob@bbb.com', '234', 'bob', 'Bob', 'Ng'),
('calvin@ccc.com', '345', 'calvin', 'Calvin', 'Lim');
COMMIT;

--
-- Table structure for table `T_Dollars`
--

DROP TABLE IF EXISTS `T_Dollars`;
CREATE TABLE IF NOT EXISTS `T_Dollars` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `T_Dollars` int(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `T_Dollars`
--

INSERT INTO `T_Dollars` (`email`, `username`, `T_Dollars`) VALUES
('alice@aaa.com', 'alice', 10),
('bob@bbb.com', 'bob', 20),
('calvin@ccc.com', 'calvin', 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
