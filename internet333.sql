-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 08:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internet333`
--
CREATE DATABASE IF NOT EXISTS `internet333` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `internet333`;

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `usersID` int(11) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `dID` int(11) DEFAULT NULL,
  `mfID` int(11) DEFAULT NULL,
  `sfID` int(11) DEFAULT NULL,
  `qty` smallint(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`usersID`, `type`, `dID`, `mfID`, `sfID`, `qty`) VALUES
(2, 2, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `drinkanddesserts`
--

CREATE TABLE `drinkanddesserts` (
  `dID` int(11) NOT NULL,
  `dName` varchar(64) NOT NULL,
  `dSize` varchar(2) DEFAULT NULL,
  `dPrice` decimal(5,3) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `imgD` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinkanddesserts`
--

INSERT INTO `drinkanddesserts` (`dID`, `dName`, `dSize`, `dPrice`, `Type`, `imgD`) VALUES
(1, 'Pepsi', 'M', '0.400', 'drink', '22.jpg'),
(2, 'Pepsi', 'L', '0.600', 'drink', '22.jpg'),
(3, '7 UP', 'M', '0.400', 'drink', '619087d102f3c3.30669604.jpg'),
(5, '7 UP', 'L', '0.600', 'drink', '619087d102f3c3.30669604.jpg'),
(6, 'orange juice', 'M', '0.400', 'drink', '44.jpg'),
(7, 'orange juice', 'L', '0.600', 'drink', '44.jpg'),
(8, 'Mix-in Lotus', NULL, '0.900', 'dessert', 'lotus.jpg'),
(9, 'Mix-in KitKat', NULL, '0.900', 'dessert', 'kitkat.png'),
(10, 'Mix-in Oreo', NULL, '0.900', 'dessert', 'oreo.jpg'),
(11, 'Chocolate Sundae', NULL, '0.600', 'dessert', 'sundaech.jpg'),
(12, 'Strawberry Sundae', NULL, '0.600', 'dessert', 'sandaes.jpg'),
(13, 'Caramel Sundae', NULL, '0.600', 'desert', 'sandaec.jpg'),
(14, 'Vanilla Sundae Cone', NULL, '0.200', 'dessert', 'vsundaecone.png'),
(15, 'Apple Pie', NULL, '0.600', 'dessert', 'applepie.jpg'),
(16, 'Chocolate Cookie', NULL, '0.600', 'dessert', ''),
(17, 'Double Chocolate Cookie', NULL, '0.600', 'dessert', 'cookie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mealfood`
--

CREATE TABLE `mealfood` (
  `mfID` int(11) NOT NULL,
  `mfName` varchar(64) NOT NULL,
  `mfType` varchar(32) NOT NULL,
  `mfPrice` decimal(5,3) NOT NULL,
  `mfCategory` varchar(64) NOT NULL,
  `imgM` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mealfood`
--

INSERT INTO `mealfood` (`mfID`, `mfName`, `mfType`, `mfPrice`, `mfCategory`, `imgM`) VALUES
(1, 'Mighty Chicken Meal', 'regular', '2.400', 'chicken', '11.jpg'),
(3, 'Mighty Chicken Meal', 'spicy', '2.400', 'chicken', '11.jpg'),
(4, 'Chickee Chicken Meal', 'regular', '2.100', 'chicken', '619086cc4e5c12.01822436.png'),
(5, 'Chickee Chicken Meal', 'spicy', '2.100', 'chicken', '619086cc4e5c12.01822436.png'),
(6, 'Big J meal', 'regular', '2.800', 'beef', '33.jpg'),
(7, 'Big J meal', 'spicy', '2.800', 'beef', '33.jpg'),
(8, 'chicken wrap meal', 'regular', '2.300', 'chicken', '55.jpg'),
(9, 'chicken wrap meal', 'spicy', '2.300', 'chicken', '55.jpg'),
(10, 'Kids Chicken Nuggets Meal', 'regular', '1.400', 'Chicken', '66.jpg'),
(11, 'Kids Chicken Nuggets Meal', 'spicy', '1.400', 'Chicken', '66.jpg'),
(12, 'Kids cheeseburger Meal', 'regular', '1.500', 'Chicken', '66.jpg'),
(13, 'Kids cheeseburger Meal', 'spicy', '1.500', 'chicken', '66.jpg'),
(14, 'Mushroom Supreme Meal', 'regular', '2.500', 'beef', '1.jpg'),
(15, 'Mushroom Supreme Meal', 'spicy', '2.500', 'beef', '1.jpg'),
(16, 'Special J Meal', 'regular', '2.300', 'beef', '00.jpg'),
(17, 'Special J Meal', 'spicy', '2.300', 'beef', '00.jpg'),
(18, 'Chillidog Meal', 'regular', '1.800', 'hotdog', '5.jpg'),
(19, 'Chillidog Meal', 'spicy', '1.800', 'hotdog', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderID` bigint(20) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `dID` int(11) DEFAULT NULL,
  `mfID` int(11) DEFAULT NULL,
  `sfID` int(11) DEFAULT NULL,
  `pricePerUnit` int(10) UNSIGNED NOT NULL,
  `qty` smallint(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderID`, `type`, `dID`, `mfID`, `sfID`, `pricePerUnit`, `qty`) VALUES
(3, 2, NULL, NULL, 1, 2, 3),
(4, 2, NULL, NULL, 1, 2, 1),
(4, 2, NULL, NULL, 5, 2, 1),
(4, 0, 1, NULL, NULL, 0, 5),
(5, 2, NULL, NULL, 1, 2, 3),
(6, 2, NULL, NULL, 1, 2, 3),
(7, 2, NULL, NULL, 1, 2, 4),
(7, 2, NULL, NULL, 3, 2, 3),
(0, 0, 5, NULL, NULL, 1, 1),
(0, 2, NULL, NULL, 1, 2, 3),
(0, 2, NULL, NULL, 5, 2, 1),
(0, 1, NULL, 3, NULL, 2, 1),
(0, 0, 2, NULL, NULL, 1, 3),
(0, 1, NULL, 13, NULL, 2, 2),
(0, 2, NULL, NULL, 1, 2, 1),
(0, 0, 12, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usersID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `oPlacedDate` timestamp NULL DEFAULT NULL,
  `total` decimal(5,3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `usersID`, `status`, `oPlacedDate`, `total`) VALUES
(1, 7, 'Completed', '2021-12-21 10:05:28', '0.000'),
(2, 7, 'acknowledged', '2021-12-21 10:06:30', '0.000'),
(3, 7, 'Completed', '2021-12-21 10:07:03', '2.000'),
(4, 7, 'acknowledged', '2021-12-21 10:07:51', '4.000'),
(5, 7, 'acknowledged', '2021-12-21 10:10:57', '1.800'),
(6, 7, 'acknowledged', '2021-12-21 10:11:35', '5.400'),
(7, 7, 'acknowledged', '2021-12-21 10:12:24', '12.000'),
(8, 3, 'In Process', '2021-12-21 15:39:36', '3.000'),
(9, 3, 'In Process', '2021-12-21 16:27:58', '3.000');

-- --------------------------------------------------------

--
-- Table structure for table `singlefood`
--

CREATE TABLE `singlefood` (
  `sfID` int(11) NOT NULL,
  `sfName` varchar(64) NOT NULL,
  `sfType` varchar(32) NOT NULL,
  `sfPrice` decimal(5,3) NOT NULL,
  `sfCategory` varchar(64) NOT NULL,
  `imgS` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singlefood`
--

INSERT INTO `singlefood` (`sfID`, `sfName`, `sfType`, `sfPrice`, `sfCategory`, `imgS`) VALUES
(1, 'Mighty Chicken', 'regular', '1.800', 'chicken', '11.jpg'),
(3, 'Chickee Chicken', 'regular', '1.600', 'chicken', ''),
(4, 'Mighty Chicken', 'spicy', '1.800', 'chicken', '11.jpg'),
(5, 'Spicy Chickee Chicken', 'spicy', '1.600', 'chicken', '619085a95de469.51629001.png'),
(6, 'Big J', 'regular', '2.200', 'beef', '33.jpg'),
(7, 'Big J', 'spicy', '2.200', 'beef', '33.jpg'),
(8, 'chicken wrap meal', 'regular', '1.600', 'chicken', '55.jpg'),
(9, 'chicken wrap meal', 'spicy', '1.600', 'chicken', '55.jpg'),
(10, 'Mushroom Supreme ', 'regular', '1.800', 'beef', 'mushrromSup.jpg'),
(11, 'Mushroom Supreme ', 'spicy', '1.800', 'beef', '10.jpg'),
(12, 'Special J', 'regular', '1.600', 'beef', '0.jpg'),
(13, 'Special J', 'spicy', '1.600', 'beef', '0.jpg'),
(14, 'Chillidog', 'regular', '1.300', 'hotdog', '50.jpg'),
(15, 'Chillidog', 'spicy', '1.300', 'hotdog', '50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` int(10) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPhone` varchar(8) NOT NULL,
  `usersType` varchar(10) NOT NULL DEFAULT 'user',
  `usersPWD` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersID`, `usersName`, `usersEmail`, `usersPhone`, `usersType`, `usersPWD`) VALUES
(1, 'Mahmood', 'mahmood@gmail.com', '34176583', 'Admin', '$2y$10$BbJx.zZo6PeOaMaiYOp4BOp7s.mRxKu8.QYn1vacBUvzq57SUL8O2'),
(2, 'TAdmin', 'tadmin@gmail.com', '34176581', 'Admin', '$2y$10$POHShDUGQOM1sTdLJG1z0.oOrLU8MvmzvUUGQM4YAKq3ZuDvtV7Im'),
(3, 'Maryam09', 'mariamalqarmazi@gmail.com', '33546676', 'user', '$2y$10$4Mxfp../U9cAt2In9POi9.SbKXrDUpw94agwX79k1TcF0sNvNrFsC'),
(4, 'fatema', '27fatima9@gmail.com', '12345678', 'Staff', '$2y$10$OC.x2pLgzwphCcU3fxih2.438lwXQG6SiG4g.lfTM7ZDcK.rFHj4.'),
(5, 'Bayan', 'Bayan@gmail.com', '12345623', 'user', '$2y$10$XDU4PQ.pzLdYbP3MUUcTDem/li.inOKDjXLDgC5g4YP..NrMbNY6.'),
(6, 'ebtisam', 'ebtisamalnshmi@gmail.com', '34090597', 'Staff', '$2y$10$fRXXrKKATyTc1tnwe7R4nuIPSusk3ctiReQ4293sO7K0sKQCWSHoK'),
(7, 'KroosX4V', 'g@gmail.com', '33336666', 'user', '$2y$10$eLb.cDQ5UasmlTbXNwCTuuZISUNYVZ/eKf8JkXuzy/eWAdqYKhGru'),
(8, 'testStaff', 'staff@gmail.com', '34176583', 'Staff', '$2y$10$xj2WRllbNsms5N5GqpwnSuNJhFi9TAqrNysXTGjEpZj1NnuMzZk8W'),
(9, 'testUser', 'user@gmail.com', '33335555', 'user', '$2y$10$BcnMea5Axn8W65xcTIWD7u4G0KiDLKUqP3tbhf7ck7AaviskciEVK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD UNIQUE KEY `usersID` (`usersID`,`dID`),
  ADD UNIQUE KEY `usersID_2` (`usersID`,`mfID`),
  ADD UNIQUE KEY `usersID_3` (`usersID`,`sfID`),
  ADD KEY `mfID` (`mfID`),
  ADD KEY `sfID` (`sfID`);

--
-- Indexes for table `drinkanddesserts`
--
ALTER TABLE `drinkanddesserts`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `mealfood`
--
ALTER TABLE `mealfood`
  ADD PRIMARY KEY (`mfID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singlefood`
--
ALTER TABLE `singlefood`
  ADD PRIMARY KEY (`sfID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinkanddesserts`
--
ALTER TABLE `drinkanddesserts`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mealfood`
--
ALTER TABLE `mealfood`
  MODIFY `mfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `singlefood`
--
ALTER TABLE `singlefood`
  MODIFY `sfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
