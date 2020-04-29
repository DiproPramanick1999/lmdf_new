-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2020 at 09:59 AM
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
(100001, 'Dipro', '1234567890', 'sales', 'dipr17ec@cmrit.ac.in', '1999-03-15', 50000, '1999-04-20', '1234567890', 'c4b7b8587c889000fff876433a8426f1068049cc910d4a279691d97c5b9b421e81e857071e143ed44d968b5ce9e832c5a08169acb9becddd6cffbcbde2e6cbe3W+eTbS2kZqdMcSGGouMiD6yudzbG3Q==', '1000011587878156.png', NULL, 0, NULL, NULL, NULL, NULL, ''),
(100002, 'Dipro', '1234567891', 'admin', 'sdf@dsf.com', '1999-09-10', 5000, '2020-04-27', '123456', '078bcefc7ef06d72ef83e5fffce55e142149db3643ff7389422cd8e926da57779b50a7df898399da52a6d8787caf8fe83781b43f39b5426d02f4a0211b4fdebdQJz2p3rxKeC/t/kGD/37K1vAa9Hz5g==', 'default.png', NULL, 0, NULL, NULL, NULL, NULL, '');

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
(1000, '25983210ba53867b707e060986f0d6aab5082f1d3d674b1f50e8aa96de3cf57342511bf25885e4d9ff246f9846166ea03b3238d026fa064e1d40a12aa0c64656p6xA6yBVudhjRGWBM6Jp/3chyUc=', 'user'),
(1001, '0c9f2adea88bf762ba52f4124f81e9e722a76754cacef27b2793950db75210df172817c9093ac94ee093c3c7893d2a97cb1d014a414e66507d7d1d29cdafead4yGo5F4rOsrH4gcAjC8KDg0EH/eM=', 'user'),
(100000, '266f1b69b20d1cd83da08dd921f5f573dc886a462431497671d0039ffcf09eda3a2baf8b61ed6b39d7c0a15620c44f72288bfb1d1542760041efc4ebce549a4am+vkQVKVLkMpa8zV0f3pQtyBlNDwSQ==', 'admin'),
(100001, 'c4b7b8587c889000fff876433a8426f1068049cc910d4a279691d97c5b9b421e81e857071e143ed44d968b5ce9e832c5a08169acb9becddd6cffbcbde2e6cbe3W+eTbS2kZqdMcSGGouMiD6yudzbG3Q==', 'sales'),
(100002, '078bcefc7ef06d72ef83e5fffce55e142149db3643ff7389422cd8e926da57779b50a7df898399da52a6d8787caf8fe83781b43f39b5426d02f4a0211b4fdebdQJz2p3rxKeC/t/kGD/37K1vAa9Hz5g==', 'admin');

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
  `gender` varchar(8) DEFAULT NULL,
  `address` text,
  `email` text,
  `dob` date DEFAULT NULL,
  `emerNum` text,
  `emerName` text,
  `relation` text,
  `country` text,
  `verification` text,
  `blood` varchar(10) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `others` text,
  `password` text,
  `planC` int(11) DEFAULT NULL,
  `plans` int(11) DEFAULT NULL,
  `joind` text,
  `expd` text,
  `pic` longtext,
  `trainer` int(11) DEFAULT NULL,
  `discp` double DEFAULT NULL,
  `discc` int(11) DEFAULT NULL,
  `method` int(11) DEFAULT NULL,
  `pt` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `regd` text,
  `invoice` int(11) DEFAULT NULL,
  `expired` int(11) DEFAULT NULL,
  `apc` int(11) DEFAULT NULL,
  `token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `gender`, `address`, `email`, `dob`, `emerNum`, `emerName`, `relation`, `country`, `verification`, `blood`, `height`, `weight`, `others`, `password`, `planC`, `plans`, `joind`, `expd`, `pic`, `trainer`, `discp`, `discc`, `method`, `pt`, `status`, `regd`, `invoice`, `expired`, `apc`, `token`) VALUES
(1000, 'pranav', '1234567890', 'Male', 'maj house', 'pranav@sfd.com', '1999-03-15', '1234567890', 'moni', 'hus', 'IN', NULL, 'A+', 130, 50, 'none', '25983210ba53867b707e060986f0d6aab5082f1d3d674b1f50e8aa96de3cf57342511bf25885e4d9ff246f9846166ea03b3238d026fa064e1d40a12aa0c64656p6xA6yBVudhjRGWBM6Jp/3chyUc=', NULL, NULL, NULL, NULL, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1001, 'dipro', '9876543210', 'Male', 'qwertyuiop', 'ygfj@hgtf.com', '1999-09-10', '23456789', 'cgvhbnjkml', 'edrtfcgvhj', 'PK', NULL, 'A+', 130, 1000, 'none', '0c9f2adea88bf762ba52f4124f81e9e722a76754cacef27b2793950db75210df172817c9093ac94ee093c3c7893d2a97cb1d014a414e66507d7d1d29cdafead4yGo5F4rOsrH4gcAjC8KDg0EH/eM=', NULL, NULL, NULL, NULL, 'default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

DROP TABLE IF EXISTS `workout`;
CREATE TABLE IF NOT EXISTS `workout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `muscle` varchar(50) NOT NULL,
  `week` int(11) NOT NULL,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`id`, `muscle`, `week`, `link`) VALUES
(2, 'Chest', 1, NULL),
(3, 'Chest', 2, ''),
(4, 'Chest', 3, NULL),
(5, 'Chest', 4, NULL),
(6, 'Biceps', 1, NULL),
(7, 'Biceps', 2, NULL),
(8, 'Biceps', 3, NULL),
(9, 'Biceps', 4, NULL),
(10, 'Triceps', 1, NULL),
(11, 'Triceps', 2, NULL),
(12, 'Triceps', 3, NULL),
(13, 'Triceps', 4, NULL),
(14, 'Back', 1, NULL),
(15, 'Back', 2, NULL),
(16, 'Back', 3, NULL),
(17, 'Back', 4, NULL),
(18, 'Shoulders', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JRtMR5Kjn3c\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(19, 'Shoulders', 2, NULL),
(20, 'Shoulders', 3, NULL),
(21, 'Shoulders', 4, NULL),
(22, 'Legs', 1, NULL),
(23, 'Legs', 2, NULL),
(24, 'Legs', 3, NULL),
(25, 'Legs', 4, NULL),
(26, 'Abs', 1, NULL),
(27, 'Abs', 2, NULL),
(28, 'Abs', 3, NULL),
(29, 'Abs', 4, NULL),
(30, 'Tabata', 1, ''),
(31, 'Tabata', 2, NULL),
(32, 'Tabata', 3, NULL),
(33, 'Tabata', 4, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
