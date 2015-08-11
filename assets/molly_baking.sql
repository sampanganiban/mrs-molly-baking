-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2015 at 06:53 am
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
  `Description` varchar(70) NOT NULL,
  `Quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`ID`, `Description`, `Quantity`) VALUES
(1, 'Vanilla Cupcakes with Vanilla Bean and Chocolate Swirl Buttercream', 6),
(2, 'Green Tea Cupcakes with White Chocolate Buttercream', 6),
(3, 'Red Velvet Cupcakes with Lemon Buttercream', 6),
(4, 'Vanilla Cupcakes with Vanilla Icing and Hundreds and Thousands', 6),
(5, 'Chocolate Flavoured Cupcakes with Vanilla Buttercream', 6),
(6, 'Caramel Flavoured Cupcakes with PB&J Buttercream', 6),
(7, 'Cookies & Cream Cupcakes with Oreo Buttercream', 6),
(8, 'Chocolate Cupcakes with Caramel & Peanut icing', 6),
(9, 'Chocolate Cupcakes with Coconut Buttercream', 6),
(10, 'Two layer vanilla cake with semi-sweet chocolate whipped cream icing', 6),
(11, 'Lemon cake with lemon icing with almonds and sugared lemons for garnis', 6),
(12, 'Carrot Cake with vanilla icing and almonds with edible royal icing car', 6),
(13, 'Shortbread pastry case with raspberry coulis with fluffy meringue top', 6),
(14, 'Winter fruit mixed with egg custard on a crisp and flaky pastry base', 6),
(15, 'Nice flaky pastry with quality steak with aged Cheddar', 6);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`ID` tinyint(3) unsigned NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`ID`, `Name`, `Price`) VALUES
(1, 'Fancy Feast', '0'),
(2, 'Mainstream Munch', '0'),
(3, 'Party Time', '0'),
(4, 'Vanilla Cake', '0'),
(5, 'Lemon Cake', '0'),
(6, 'Carrot Cake', '0'),
(7, 'Classic Raspberry Pie', '0'),
(8, 'Fruit Pie', '0'),
(9, 'Steak & Cheese Pie', '0');

-- --------------------------------------------------------

--
-- Table structure for table `menu_flavours`
--

CREATE TABLE IF NOT EXISTS `menu_flavours` (
`ID` tinyint(3) unsigned NOT NULL,
  `menuID` tinyint(3) unsigned NOT NULL,
  `flavourID` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu_flavours`
--

INSERT INTO `menu_flavours` (`ID`, `menuID`, `flavourID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE IF NOT EXISTS `menu_types` (
`ID` tinyint(3) unsigned NOT NULL,
  `menuID` tinyint(3) unsigned NOT NULL,
  `typeID` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`ID`, `menuID`, `typeID`) VALUES
(1, 1, 1),
(6, 2, 1),
(7, 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `menuID`, `FirstName`, `LastName`, `Email`, `Message`) VALUES
(11, 3, 'Ham', 'Cheese', 'ham@cheese.com', 'I want cheese on it.');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`ID` tinyint(3) unsigned NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Description` varchar(160) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `Title`, `Description`, `Name`) VALUES
(1, 'Mrs Molly Baking | Home', 'Homepage for a baking goods catering website that has cupcakes, cakes and pies', 'home'),
(2, 'Mrs Molly Baking | About Us', 'Learn more about Mrs Molly Baking ', 'about'),
(3, 'Mrs Molly Baking | Contact Us', 'Please contact us for any questions, we''re ready to answer your questions', 'contact'),
(4, 'Mrs Molly Baking | Place an Order', 'You can place your order here for your choice of delicious cupcakes, cakes or pies', 'order'),
(5, 'Mrs Molly Baking | Registration Page', 'Register an account with us for a member discount on your order', 'register'),
(6, 'Mrs Molly Baking | Login Page', 'Login to your account so that you will be updated and given an exclusive discount on your order', 'login'),
(7, 'Mrs Molly Baking | Account Page', 'This is your account page to Mrs Molly Baking', 'account');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`ID` smallint(5) unsigned NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`ID`, `Type`) VALUES
(1, 'Cupcake'),
(2, 'Cake'),
(3, 'Pie');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Privilege`) VALUES
(3, 'iambatman', '$2y$10$A15ymxAJgU.79FtHwCxFQexEy0iAfy2ZqwvoRPNArHi7Cb/pIJzde', 'batman@cave.com', 'user'),
(4, 'admin', '$2y$10$1sE7gbSaxx8NmAn67WYO3eqbj2FkF448UFJuLRK/SQCdHTna5Py2u', 'admin@admin.com', 'admin'),
(5, 'user', '$2y$10$vAydDlV4OKx07Gei7tgHme.SmyUTcXyemgI1Yk0oNNEgyh5NJITYK', 'user@user.com', 'user');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_additional_info`
--

INSERT INTO `users_additional_info` (`ID`, `userID`, `FirstName`, `LastName`, `ProfileImage`, `Bio`) VALUES
(1, 4, 'Admin', 'Admin', 'default.jpg', 'I am the admin.						\r\n					'),
(2, 5, 'Jane', 'Smith', '', 'Jane Smith.');

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
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menu_flavours`
--
ALTER TABLE `menu_flavours`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
