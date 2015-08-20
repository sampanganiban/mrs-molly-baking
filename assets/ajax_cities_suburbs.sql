-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2015 at 06:20 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajax_cities_suburbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `cityID` int(3) NOT NULL AUTO_INCREMENT,
  `cityName` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `cityName`) VALUES
(1, 'Auckland'),
(2, 'Christchurch'),
(3, 'Wellington'),
(4, 'Dunedin');

-- --------------------------------------------------------

--
-- Table structure for table `suburbs`
--

CREATE TABLE IF NOT EXISTS `suburbs` (
  `suburbID` int(3) NOT NULL AUTO_INCREMENT,
  `cityID` int(3) NOT NULL,
  `suburbName` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`suburbID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `suburbs`
--

INSERT INTO `suburbs` (`suburbID`, `cityID`, `suburbName`) VALUES
(1, 1, 'Avondale'),
(2, 1, 'CBD'),
(3, 1, 'Epsom'),
(4, 1, 'Grey Lynn'),
(5, 1, 'Hillsborough'),
(6, 1, 'Kohimarama'),
(7, 1, 'Mt Albert'),
(8, 1, 'Mt Eden'),
(9, 1, 'Mt Roskill'),
(10, 1, 'Mt Wellington'),
(11, 1, 'Newmarket'),
(12, 1, 'Onehunga'),
(13, 1, 'Otahuhu'),
(14, 1, 'Parnell'),
(15, 1, 'Ponsonby'),
(16, 1, 'Three Kings'),
(17, 1, 'Waterview'),
(18, 2, 'Avonhead'),
(19, 2, 'Bishopsdale'),
(20, 2, 'Burnside'),
(21, 2, 'Cashmere'),
(22, 2, 'CBD'),
(23, 2, 'Fendalton'),
(24, 2, 'Halswell'),
(25, 2, 'Linwood'),
(26, 2, 'Merivale'),
(27, 2, 'New Brighton'),
(28, 2, 'Papanui'),
(29, 2, 'Riccarton'),
(30, 2, 'St Albans'),
(31, 2, 'Woolston'),
(32, 2, 'Yaldhurst'),
(33, 3, 'Aro Valley'),
(34, 3, 'Brooklyn'),
(35, 3, 'Churton Park'),
(36, 3, 'Hataitai'),
(37, 3, 'Island Bay'),
(38, 3, 'Johnsonville'),
(39, 3, 'Karori'),
(40, 3, 'Kelburn'),
(41, 3, 'Kilbirnie'),
(42, 3, 'Miramar'),
(43, 3, 'Mt Cook'),
(44, 3, 'Mt Victoria'),
(45, 3, 'Newtown'),
(46, 3, 'Northland'),
(47, 3, 'Oriental Bay'),
(48, 3, 'Roseneath'),
(49, 3, 'Seatoun'),
(50, 3, 'Te Aro'),
(51, 3, 'Thorndon'),
(52, 4, 'Abbotsford'),
(53, 4, 'Brighton'),
(54, 4, 'Caversham'),
(55, 4, 'CBD'),
(56, 4, 'Fairfield'),
(57, 4, 'Green Island'),
(58, 4, 'Highcliff'),
(59, 4, 'Kenmure'),
(60, 4, 'Kew'),
(61, 4, 'Maori Hill'),
(62, 4, 'Mornington'),
(63, 4, 'Opoho'),
(64, 4, 'Otakou'),
(65, 4, 'Portobello'),
(66, 4, 'St Kilda');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;