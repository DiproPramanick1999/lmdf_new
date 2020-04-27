-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2020 at 11:04 AM
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
-- Database: `gym1`
--

-- --------------------------------------------------------

--
-- Table structure for table `due`
--

DROP TABLE IF EXISTS `due`;
CREATE TABLE IF NOT EXISTS `due` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `due_amt` int(11) NOT NULL,
  `date` text COLLATE latin1_general_ci NOT NULL,
  `expired` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `salary` int(11) NOT NULL,
  `joind` date NOT NULL,
  `verification` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `pic` longtext,
  `edit` int(11) DEFAULT NULL,
  `sch` int(11) NOT NULL,
  `ftimein` text,
  `ftimeout` text,
  `stimein` text,
  `stimeout` text,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `type`, `email`, `dob`, `salary`, `joind`, `verification`, `password`, `pic`, `edit`, `sch`, `ftimein`, `ftimeout`, `stimein`, `stimeout`, `token`) VALUES
(100000, 'pranav shivan', '9113521458', 'admin', 'pranav1503@gmail.com', '1999-03-15', 1000, '2020-04-25', 'none', '266f1b69b20d1cd83da08dd921f5f573dc886a462431497671d0039ffcf09eda3a2baf8b61ed6b39d7c0a15620c44f72288bfb1d1542760041efc4ebce549a4am+vkQVKVLkMpa8zV0f3pQtyBlNDwSQ==', 'default.png', NULL, 0, '', '', NULL, NULL, ''),
(100001, 'Dipro', '1234567890', 'sales', 'dipr17ec@cmrit.ac.in', '1999-03-15', 50000, '1999-04-20', '1234567890', 'c4b7b8587c889000fff876433a8426f1068049cc910d4a279691d97c5b9b421e81e857071e143ed44d968b5ce9e832c5a08169acb9becddd6cffbcbde2e6cbe3W+eTbS2kZqdMcSGGouMiD6yudzbG3Q==', '1000011587878156.png', NULL, 0, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_num`
--

DROP TABLE IF EXISTS `invoice_num`;
CREATE TABLE IF NOT EXISTS `invoice_num` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `type`) VALUES
(100000, '266f1b69b20d1cd83da08dd921f5f573dc886a462431497671d0039ffcf09eda3a2baf8b61ed6b39d7c0a15620c44f72288bfb1d1542760041efc4ebce549a4am+vkQVKVLkMpa8zV0f3pQtyBlNDwSQ==', 'admin'),
(100001, 'c4b7b8587c889000fff876433a8426f1068049cc910d4a279691d97c5b9b421e81e857071e143ed44d968b5ce9e832c5a08169acb9becddd6cffbcbde2e6cbe3W+eTbS2kZqdMcSGGouMiD6yudzbG3Q==', 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `planC` int(11) NOT NULL,
  `plans` int(11) NOT NULL,
  `joind` text NOT NULL,
  `expd` text NOT NULL,
  `discp` double NOT NULL,
  `discc` int(11) NOT NULL,
  `method` int(11) NOT NULL DEFAULT '0',
  `regd` text,
  `invoice` int(11) NOT NULL,
  `expired` int(11) NOT NULL DEFAULT '0',
  `apc` int(11) NOT NULL,
  `reason` text NOT NULL,
  `crep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `years` int(11) NOT NULL,
  `months` int(11) NOT NULL,
  `edit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_category`
--

DROP TABLE IF EXISTS `plan_category`;
CREATE TABLE IF NOT EXISTS `plan_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(1000) NOT NULL,
  `edit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pt`
--

DROP TABLE IF EXISTS `pt`;
CREATE TABLE IF NOT EXISTS `pt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `start` text COLLATE latin1_general_ci NOT NULL,
  `end` text COLLATE latin1_general_ci,
  `fb` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `fb_text` longtext COLLATE latin1_general_ci,
  `session_num` int(11) NOT NULL,
  `trainerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cgst` float NOT NULL DEFAULT '0',
  `sgst` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `emerNum` text NOT NULL,
  `emerName` text NOT NULL,
  `country` text NOT NULL,
  `verification` text NOT NULL,
  `blood` varchar(10) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `others` text NOT NULL,
  `password` text NOT NULL,
  `planC` int(11) NOT NULL,
  `plans` int(11) NOT NULL,
  `joind` text NOT NULL,
  `expd` text NOT NULL,
  `pic` longtext,
  `trainer` int(11) NOT NULL,
  `discp` double NOT NULL,
  `discc` int(11) NOT NULL,
  `method` int(11) NOT NULL DEFAULT '0',
  `pt` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `regd` text,
  `invoice` int(11) NOT NULL,
  `expired` int(11) NOT NULL DEFAULT '0',
  `apc` int(11) NOT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
