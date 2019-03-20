-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2019 at 09:11 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv`
--

-- --------------------------------------------------------

--
-- Table structure for table `csv`
--

DROP TABLE IF EXISTS `csv`;
CREATE TABLE IF NOT EXISTS `csv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18265 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csv`
--

INSERT INTO `csv` (`id`, `firstName`, `lastName`) VALUES
(18231, 'First Name', 'Last Name'),
(18232, 'firstname1', 'lastname1'),
(18233, 'firstname2', 'lastname2'),
(18234, 'firstname3', 'lastname3'),
(18235, 'firstname4', 'lastname4'),
(18236, 'firstname5', 'lastname5'),
(18237, 'firstname6', 'lastname6'),
(18238, 'firstname7', 'lastname7'),
(18239, 'firstname8', 'lastname8'),
(18240, 'firstname9', 'lastname9'),
(18241, 'firstname10', 'lastname10'),
(18242, 'firstname11', 'lastname11'),
(18243, 'firstname12', 'lastname12'),
(18244, 'firstname13', 'lastname13'),
(18245, 'firstname14', 'lastname14'),
(18246, 'firstname15', 'lastname15'),
(18247, 'firstname16', 'lastname16'),
(18248, 'First Name', 'Last Name'),
(18249, 'firstname1', 'lastname1'),
(18250, 'firstname2', 'lastname2'),
(18251, 'firstname3', 'lastname3'),
(18252, 'firstname4', 'lastname4'),
(18253, 'firstname5', 'lastname5'),
(18254, 'firstname6', 'lastname6'),
(18255, 'firstname7', 'lastname7'),
(18256, 'firstname8', 'lastname8'),
(18257, 'firstname9', 'lastname9'),
(18258, 'firstname10', 'lastname10'),
(18259, 'firstname11', 'lastname11'),
(18260, 'firstname12', 'lastname12'),
(18261, 'firstname13', 'lastname13'),
(18262, 'firstname14', 'lastname14'),
(18263, 'firstname15', 'lastname15'),
(18264, 'firstname16', 'lastname16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
