-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 05:04 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `molly_baking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_enquiries`
--

CREATE TABLE IF NOT EXISTS `customers_enquiries` (
`ID` mediumint(8) unsigned NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flavours`
--

CREATE TABLE IF NOT EXISTS `flavours` (
`ID` mediumint(8) unsigned NOT NULL,
  `Description` varchar(70) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`ID`, `Description`) VALUES
(1, 'Vanilla Cupcakes with Vanilla Bean and Chocolate Swirl Buttercream'),
(2, 'Green Tea Cupcakes with White Chocolate Buttercream'),
(3, 'Red Velvet Cupcakes with Lemon Buttercream'),
(4, 'Vanilla Cupcakes with Vanilla Icing and Hundreds and Thousands'),
(5, 'Chocolate Flavoured Cupcakes with Vanilla Buttercream'),
(6, 'Caramel Flavoured Cupcakes with PB&J Buttercream'),
(7, 'Cookies & Cream Cupcakes with Oreo Buttercream'),
(8, 'Chocolate Cupcakes with Caramel & Peanut icing'),
(9, 'Chocolate Cupcakes with Coconut Buttercream'),
(10, 'Two layer vanilla cake with semi-sweet chocolate whipped cream icing'),
(11, 'Lemon cake with lemon icing with almonds and sugared lemons for garnis'),
(12, 'Carrot Cake with vanilla icing and almonds with edible royal icing car'),
(13, 'Shortbread pastry case with raspberry coulis with fluffy meringue top'),
(14, 'Winter fruit mixed with egg custard on a crisp and flaky pastry base'),
(15, 'Nice flaky pastry with quality steak with aged Cheddar');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`ID` tinyint(3) unsigned NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Flavour` varchar(50) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_flavours`
--

CREATE TABLE IF NOT EXISTS `menu_flavours` (
`ID` tinyint(3) unsigned NOT NULL,
  `menuID` tinyint(3) unsigned NOT NULL,
  `flavourID` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE IF NOT EXISTS `menu_types` (
`ID` tinyint(3) unsigned NOT NULL,
  `menuID` tinyint(3) unsigned NOT NULL,
  `typeID` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`ID` mediumint(8) unsigned NOT NULL,
  `menuID` tinyint(3) unsigned NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`ID` tinyint(3) unsigned NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Description` varchar(160) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`ID` smallint(5) unsigned NOT NULL,
  `Type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` mediumint(8) unsigned NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Privilege` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_additional_info`
--

CREATE TABLE IF NOT EXISTS `users_additional_info` (
`ID` mediumint(8) unsigned NOT NULL,
  `userID` mediumint(8) unsigned NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL,
  `Bio` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_enquiries`
--
ALTER TABLE `customers_enquiries`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `flavours`
--
ALTER TABLE `flavours`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu_flavours`
--
ALTER TABLE `menu_flavours`
 ADD PRIMARY KEY (`ID`), ADD KEY `menuID` (`menuID`), ADD KEY `flavourID` (`flavourID`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
 ADD PRIMARY KEY (`ID`), ADD KEY `menuID` (`menuID`), ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`ID`), ADD KEY `menuID` (`menuID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
 ADD PRIMARY KEY (`ID`), ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_enquiries`
--
ALTER TABLE `customers_enquiries`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flavours`
--
ALTER TABLE `flavours`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_flavours`
--
ALTER TABLE `menu_flavours`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_flavours`
--
ALTER TABLE `menu_flavours`
ADD CONSTRAINT `menu_flavours_ibfk_1` FOREIGN KEY (`flavourID`) REFERENCES `flavours` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `menu_flavours_ibfk_2` FOREIGN KEY (`menuID`) REFERENCES `menus` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_types`
--
ALTER TABLE `menu_types`
ADD CONSTRAINT `menu_types_ibfk_1` FOREIGN KEY (`menuID`) REFERENCES `menus` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `menu_types_ibfk_2` FOREIGN KEY (`typeID`) REFERENCES `types` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`menuID`) REFERENCES `menus` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
ADD CONSTRAINT `users_additional_info_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
