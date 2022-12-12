-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 09:19 AM
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
-- Database: `vardast`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nationalCode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `PhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Level` int(1) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nationalCode`, `Name`, `LastName`, `Password`, `Email`, `PhoneNumber`, `Level`, `Date`, `Time`, `Status`, `id`) VALUES
('1472583690', 'scary', 'scoot', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'scotscarprank892@gmail.com', '09022002029', 2, '2019-09-04', '15:23:51', 1, 11),
('7859635421', 'jaina', 'abodlhanson', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'aboflzadetr453@gmail.com', '09166445878', 2, '2019-09-04', '15:33:17', 1, 14),
('1472584521', 'amin', 'scarface', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'amincarlet453@gmail.com', '09166547852', 2, '2019-09-04', '15:38:40', 1, 17),
('1472583120', 'Tommy', 'living', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'aweqwe456@gmail.com', '09166114521', 1, '2019-09-04', '15:40:58', 1, 18),
('1472584520', 'qwew', 'wqwqwew', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'aweqwde456@gmail.com', '09166114534', 1, '2019-09-04', '15:50:14', 1, 24),
('1472578820', 'qwew', '12wqwew', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'aweqwde11456@gmail.com', '09166114524', 1, '2019-09-04', '15:51:10', 1, 25),
('369258147', 'rasol', 'rasoli', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'rasolorasolo989@gmail.com', '09166547854', 1, '2019-09-04', '15:58:03', 1, 26),
('1742318256', 'hfhf', 'rgfghrtd2222`12', '00507dcbfe2866daa2265b033a2a88ee539a9ae62bb060cd8b212666abf1c8c5dee82f6d4c91cc24c6a9da820f9c1c4553ed2e3c2cbb59fa37ee25b943ba7beb', 'rasoolrb7@gmail.com', '09036332007', 1, '2019-09-04', '16:02:28', 1, 30),
('1472586963', 'محمد عرشیان', 'qwe', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'arshiyan.mohammad28@gmail.com', '09166114758', 1, '2019-09-04', '16:10:42', 1, 36),
('1472580258', 'raease', 'rqwqqwrwqr', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'arshiyan.moh48@gmail.com', '09166332589', 1, '2019-09-04', '16:12:19', 1, 39),
('1472580288', 'raease', 'rqwqqwrwqr', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'arshiyan.moh28@gmail.com', '09166332289', 1, '2019-09-04', '16:13:44', 1, 42),
('174', 'محمد عرشیان', 'ewerw', '16f10255da18ae2b75434ba80e0ef8d65d57c435f9c08c69cc89a6e36f2c2c91e74163a9532c73c8f963fec537b2fd348e40e97ba7c24262d64af50a5e787c69', 'arshiyan.mohammad788@gmail.com', '09022002076', 1, '2019-09-04', '16:18:28', 1, 43),
('1344482010', 'ali', 'alizade', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'arman.mohammad2010@gmail.com', '09022002010', 2, '2019-09-04', '17:07:56', 1, 64),
('1452583690', 'Mary', 'Jane', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 'Spidermoviestri32@gmail.com', '09022001010', 1, '2019-09-23', '12:01:24', 1, 65);

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Address` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `tag` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`id`, `userId`, `Address`, `latitude`, `longitude`, `tag`) VALUES
(1, 3, 'far away from home', 12, 44, 'home'),
(2, 12, 'khone maman', 0, 0, 'work'),
(3, 3, 'Silvermoon-eversongwood', 44, 87, 'gameStatio'),
(4, 3, 'i see london i see france i see someones underpants', 485, 693, 'bullshit'),
(5, 3, 'kitcher', 7854, 5214, 'market');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `img`, `Status`) VALUES
(1, 'خدمات', '8499487', 1),
(2, 'تعمیرات', '12587', 1),
(3, 'بهداشتی', '948268498', 1),
(4, 'غذا', '87521', 1),
(5, 'مشاوره', '894578', 1),
(6, 'آموزش', '12587', 1),
(7, 'الکترونیک', '1313212123', 1),
(8, 'گیم', '858855', 1),
(9, 'بازی ', '13132', 1),
(10, 'خرید', '1321313', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `Comment` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderListId` varchar(30) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `workerId`, `Comment`, `Status`, `userId`, `orderListId`) VALUES
(1, 1, 'k', 1, 7, '77'),
(2, 1, '	couldnt be worse', 2, 12, '82');

-- --------------------------------------------------------

--
-- Table structure for table `commissionpayment`
--

CREATE TABLE `commissionpayment` (
  `workerId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `PaymentTrackingNumber` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `commissionpayment`
--

INSERT INTO `commissionpayment` (`workerId`, `amount`, `date`, `id`, `time`, `PaymentTrackingNumber`, `Status`) VALUES
(1, 8585, '2019-09-16', 68481653, '13:52:22', 98652235, 0),
(1, 8956232, '2019-09-16', 68481655, '13:54:14', 2143312321, 1),
(2, 8956232, '2019-09-16', 68481656, '13:54:32', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favoriteworker`
--

CREATE TABLE `favoriteworker` (
  `id` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `favoriteworker`
--

INSERT INTO `favoriteworker` (`id`, `workerId`, `userId`, `status`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgbase`
--

CREATE TABLE `imgbase` (
  `id` int(11) NOT NULL,
  `img` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `brand` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `imgbase`
--

INSERT INTO `imgbase` (`id`, `img`, `brand`, `catId`, `status`) VALUES
(1, '87521', 'CAT', 0, 0),
(2, '12587', 'CAT', 0, 0),
(3, '894578', 'CAT', 0, 0),
(4, '000032', 'SUB', 0, 1),
(5, '000069', 'SUB', 0, 1),
(6, '000084', 'SUB', 0, 1),
(7, 'hcdixuwbLfrC0NHbrGaB', 'CAT', 0, 0),
(8, 'test1', 'CAT', 0, 0),
(9, 'bingo', 'SUBCAT', 0, 1),
(10, '23bingo', 'SUBCAT', 0, 1),
(11, 'bla bla bla', 'SUBCAT', 0, 1),
(12, '02bla bla bla', 'SUBCAT', 0, 1),
(13, '02bla bla 132bla', 'SUBCAT', 6, 1),
(14, 'ali', 'EXPERT', 0, 0),
(15, '2ali', 'EXPERT', 0, 0),
(16, 'alan', 'SUBCAT', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordercancellation`
--

CREATE TABLE `ordercancellation` (
  `ocId` int(11) NOT NULL,
  `ocOrderId` varchar(30) COLLATE utf8mb4_persian_ci NOT NULL,
  `ocReason` varchar(500) COLLATE utf8mb4_persian_ci NOT NULL,
  `ocTag` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `ordercancellation`
--

INSERT INTO `ordercancellation` (`ocId`, `ocOrderId`, `ocReason`, `ocTag`) VALUES
(1, '55182984', 'cause i like it', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `submitDate` date NOT NULL,
  `submitTime` time NOT NULL,
  `neededDate` date NOT NULL,
  `neededTime` time NOT NULL,
  `status` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `details` varchar(500) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `userId`, `subcategoryId`, `submitDate`, `submitTime`, `neededDate`, `neededTime`, `status`, `workerId`, `addressId`, `details`) VALUES
('111111111', 0, 2, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('11111111111122222', 0, 2, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('123131', 0, 2, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('1312132', 0, 2, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('133131313123', 1, 1, '2019-11-05', '20:00:00', '2019-11-11', '16:00:00', 2, 1, 1, 'dw'),
('20191020151416914000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, 'iygygutf'),
('20191020153429050000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, 'weqweqe'),
('20191020155305066000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, 'ewewr1111111111111'),
('20191021113510412000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191021113804730000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191021122336690000', 3, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191021122457070000', 3, 1, '2019-10-21', '12:25:23', '2019-11-12', '00:00:00', 2, 0, 0, ''),
('20191021123511040000', 3, 1, '2019-10-21', '12:35:25', '0000-00-00', '00:00:00', 1, 0, 0, ''),
('20191023160544297000', 65, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191105152936720000', 65, 4, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191105153025683000', 65, 3, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, ''),
('20191105153124670000', 65, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 0, 0, 0, '<?php if($leveln==\'2\')echo \"selected\"?>'),
('4444', 0, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('512', 0, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('5432', 0, 4, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('55182984', 12, 3, '2019-09-03', '33:05:14', '2019-09-03', '02:50:00', 2, 1, 1, 'bla bla bla bla'),
('556', 0, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('68481651', 7, 3, '2019-09-03', '03:11:07', '2019-09-03', '00:10:00', 2, 1, 2, 'zooooooooood'),
('764', 0, 5, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, ''),
('90', 0, 1, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 2, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ordervalues`
--

CREATE TABLE `ordervalues` (
  `ovId` int(11) NOT NULL,
  `ovOrderId` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `ovQuesValId` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `ovModel` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `ovQuestionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ordervalues`
--

INSERT INTO `ordervalues` (`ovId`, `ovOrderId`, `ovQuesValId`, `ovModel`, `ovQuestionId`) VALUES
(20, '20191020125251070000', 'YES', 'CHECKBOX', 0),
(21, '20191020125251070000', 'YES', 'CHECKBOX', 0),
(22, '20191020125251070000', 'YES', 'CHECKBOX', 0),
(23, '20191020142133280000', 'YES', 'CHECKBOX', 0),
(24, '20191020142748470000', 'YES', 'CHECKBOX', 0),
(25, '20191020143003017000', 'YES', 'CHECKBOX', 0),
(26, '20191020143335790000', 'YES', 'CHECKBOX', 0),
(27, '20191020143456320000', 'YES', 'CHECKBOX', 0),
(28, '20191020143819063000', 'YES', 'CHECKBOX', 0),
(29, '20191020145906490000', 'YES', 'CHECKBOX', 0),
(30, '20191020151416914000', 'YES', 'CHECKBOX', 0),
(31, '20191020151630390000', 'YES', 'CHECKBOX', 0),
(32, '20191020153429050000', 'YES', 'CHECKBOX', 0),
(33, '20191020155305066000', 'YES', 'CHECKBOX', 0),
(34, '20191021112902885000', 'YES', 'CHECKBOX', 0),
(35, '20191021113510412000', 'YES', 'CHECKBOX', 0),
(36, '20191021113510412000', 'YES', 'CHECKBOX', 0),
(37, '20191021113804730000', 'YES', 'CHECKBOX', 0),
(38, '20191021113804730000', 'YES', 'CHECKBOX', 0),
(39, '20191021122148760000', 'YES', 'CHECKBOX', 0),
(40, '20191021122336690000', 'YES', 'CHECKBOX', 0),
(41, '20191021122457070000', 'YES', 'CHECKBOX', 0),
(42, '20191021123511040000', 'YES', 'CHECKBOX', 0),
(43, '20191023160544297000', 'YES', 'CHECKBOX', 0),
(44, '20191023160820510000', 'YES', 'CHECKBOX', 0),
(45, '20191023161021340000', 'YES', 'CHECKBOX', 0),
(46, '20191023161354375000', 'YES', 'CHECKBOX', 0),
(47, '20191023162050847000', 'YES', 'CHECKBOX', 0),
(48, '20191023162302767000', 'YES', 'CHECKBOX', 0),
(49, '20191105152936720000', 'YES', 'CHECKBOX', 0),
(50, '20191105153025683000', 'YES', 'CHECKBOX', 0),
(51, '20191105153124670000', 'YES', 'CHECKBOX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentamountlist`
--

CREATE TABLE `paymentamountlist` (
  `id` int(11) NOT NULL,
  `orderListId` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `cash` int(11) NOT NULL,
  `operatingCosts` int(11) NOT NULL,
  `finalPrice` int(11) NOT NULL,
  `Commission` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `webPayment` int(11) NOT NULL,
  `paStatus` tinyint(1) NOT NULL,
  `workStartDate` date NOT NULL,
  `workStartTime` time NOT NULL,
  `workFinishDate` date NOT NULL,
  `workFinishTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `paymentamountlist`
--

INSERT INTO `paymentamountlist` (`id`, `orderListId`, `cash`, `operatingCosts`, `finalPrice`, `Commission`, `workerId`, `webPayment`, `paStatus`, `workStartDate`, `workStartTime`, `workFinishDate`, `workFinishTime`) VALUES
(1, '55182984', 40, 40, 120, 58, 1, 40, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `points` float NOT NULL,
  `orderListId` varchar(30) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `workerId`, `userId`, `points`, `orderListId`) VALUES
(1, 1, 5, 4, '77'),
(2, 2, 12, 3, '95'),
(3, 1, 5, 2, '69'),
(4, 2, 12, 4, '78');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategory` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `subCatImg` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Commission` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `minimumCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryId`, `subcategory`, `subCatImg`, `Commission`, `Status`, `minimumCost`) VALUES
(1, 6, 'spanish', 'alan', 48, 1, 200),
(2, 6, 'alferdo', '000069', 9, 1, 0),
(3, 1, 'نظافت', 'test1', 48, 1, 25),
(4, 1, 'نظافت خانه', '111', 12, 1, 0),
(5, 1, 'a22222', '585858', 12, 1, 0),
(6, 1, 'aaaaaaaa3333', '131231', 12, 1, 0),
(7, 1, 'aaaaaaaa4', '8598298298', 12, 1, 0),
(8, 1, 'aaa66', '858582', 12, 1, 0),
(9, 2, '222a', '222121', 12, 1, 0),
(10, 2, '2sssssssss', '13123', 12, 1, 0),
(11, 2, '2ddddd', '2131', 12, 1, 0),
(12, 2, '2ggggggggggg', '233333333', 12, 1, 0),
(13, 2, '2tttttttt', '2313111', 12, 1, 0),
(14, 3, '3aaaaaaaa', '989548', 12, 1, 0),
(15, 3, '3eeeeeeee', '312e21', 12, 1, 0),
(16, 3, '3qqqqqqqqq', '12313', 12, 1, 0),
(17, 3, '3yyyyyy', '12313', 12, 1, 0),
(18, 4, '4aaaaaaaa', '12313', 12, 1, 0),
(19, 4, '4wwww', '12313', 12, 1, 0),
(20, 4, '4hhhhhhhh', '1321231', 12, 1, 0),
(21, 4, '4bbbbbbbbb', '123123', 12, 1, 0),
(22, 4, '4kkkkkkkkkk', '1231', 12, 1, 0),
(23, 5, '5tttttttttt', '123132', 12, 1, 0),
(24, 5, '5rrrrrrrrrrrrrrr', '123', 12, 1, 0),
(25, 5, '5vvvvvvvvvvv', '123132', 12, 1, 0),
(26, 5, '5ppppppppppp', '12312313123', 12, 1, 0),
(27, 1, 'qewqww', '13312', 12, 1, 0),
(28, 1, 'qewqwqw', '123312', 12, 1, 0),
(29, 1, 'wqeqweq', '12313', 12, 1, 0),
(30, 1, 'qwddwq', '132312', 12, 1, 0),
(31, 1, 'qweqeqeqeqwe', '312321', 12, 1, 0),
(32, 1, 'qweqeqwe', '1313', 12, 1, 0),
(33, 6, 'goooglle', '02bla bla 132bla', 56, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `subcategorycosts`
--

CREATE TABLE `subcategorycosts` (
  `id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `subcategorycosts`
--

INSERT INTO `subcategorycosts` (`id`, `cost`, `description`, `subcategoryId`, `status`) VALUES
(1, 60, 'تعمیر مانیتور123', 3, 1),
(2, 45, 'تعمیر موتور', 3, 1),
(3, 69, 'hala', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryinformation`
--

CREATE TABLE `subcategoryinformation` (
  `id` int(11) NOT NULL,
  `text2` text COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text COLLATE utf8mb4_persian_ci NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `text3` text COLLATE utf8mb4_persian_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `subcategoryinformation`
--

INSERT INTO `subcategoryinformation` (`id`, `text2`, `text`, `subcategoryId`, `status`, `text3`, `title`) VALUES
(1, 'سلاااااااااااااااااااااااااااااااااااام', 'اوداااااااااااااافظ', 3, 1, 'دوباره اومدددددددددددددددم', 'تمیزتر وشیک تر از همیشه با خدمات خشکشویی و اتوشویی لباس'),
(2, '123123', 'qewew', 9, 1, 'qeqw', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryquestions`
--

CREATE TABLE `subcategoryquestions` (
  `id` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `Question` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `level` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subcategoryquestions`
--

INSERT INTO `subcategoryquestions` (`id`, `subcategoryId`, `Question`, `level`, `type`) VALUES
(1, 1, 'whyyyyyyy', 1, 0),
(2, 1, 'what', 2, 0),
(3, 1, 'kitty', 60, 0),
(5, 2, 'srsly', 1, 0),
(6, 2, 'lllllllllolol', 2, 0),
(7, 1, 'something different', 56, 0),
(8, 1, 'want a hug ?', 446, 1),
(9, 1, 'are you sure you dont need a hug ?', 5557, 1),
(10, 1, 'u must get a hug', 6600, 1),
(11, 1, 'do you like it', 582992, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryquestionsvalue`
--

CREATE TABLE `subcategoryquestionsvalue` (
  `subcategoryQuestionsId` int(11) NOT NULL,
  `value` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subcategoryquestionsvalue`
--

INSERT INTO `subcategoryquestionsvalue` (`subcategoryQuestionsId`, `value`, `id`) VALUES
(1, 'just 1', 1),
(1, 'more than 5', 2),
(1, 'not known', 3),
(2, 'duhh', 4),
(2, 'bla', 5),
(2, 'bingo', 6),
(5, 'mehhhh', 7),
(5, 'come on', 8),
(5, 'enough', 9),
(3, 'meow', 10);

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryservices`
--

CREATE TABLE `subcategoryservices` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_persian_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `subcategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `subcategoryservices`
--

INSERT INTO `subcategoryservices` (`id`, `text`, `status`, `subcategoryId`) VALUES
(1, 'خشک کردن', 1, 3),
(2, 'اتو کشیدن', 1, 3),
(3, 'نظافت دیگه', 0, 3),
(4, 'chi midnam', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `PhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `id` int(11) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `token` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `verificationCode` varchar(5) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `LastName`, `PhoneNumber`, `Password`, `id`, `dateOfBirth`, `token`, `verificationCode`) VALUES
('michael', 'scofield', '09166119529', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 3, '2019-10-09', '1', '8SWe'),
('mark', 'bahmani', '09166115220', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', 5, '2012-08-21', '', ''),
('lashkari', 'johanson', '09166115222', 'Mm0123456789', 7, '2019-09-25', '', ''),
('Scarlet', 'abdolahzade', '09166589635', 'Amir1111', 12, '2018-09-12', '', ''),
('', '', '09022020202', '', 14, '0000-00-00', '', ''),
('', '', '09022002076', '', 15, '0000-00-00', '', 'r9xJ'),
('', '', '09166119530', '', 16, '0000-00-00', '', 'crea'),
('', '', '09165462358', '', 17, '0000-00-00', '', 'm5kj'),
('', '', '09165874521', '', 18, '0000-00-00', '', 'EVYE'),
('', '', '09168547123', '', 19, '0000-00-00', '', 'DMx7'),
('ada', 'adad', '09166547852', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 20, '1398-07-30', '', 'JFMq'),
('', '', '09166558514', '', 21, '0000-00-00', '', 'JJYS'),
('jaina', 'yosefi', '09165247852', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 22, '1398-07-17', '', 'mAZW'),
('', '', '09369505461', '', 23, '0000-00-00', '', 'PxGH');

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `id` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `id_user` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `action` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `description` varchar(70) COLLATE utf8_persian_ci NOT NULL,
  `ip` varchar(70) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `time` varchar(12) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`id`, `id_user`, `action`, `description`, `ip`, `date`, `time`) VALUES
('20190801054120657743', '20190801011120623738', 'insert', 'User Created An Account', NULL, '2019-08-01', '05:41:20'),
('20190801055001910505', '20190801012001985852', 'insert', 'User Created An Account', NULL, '2019-08-01', '05:50:01'),
('20190801061958426475', '20190801014958450612', 'insert', 'User Created An Account', NULL, '2019-08-01', '06:19:58'),
('20190801062050128859', '20190801015050168220', 'insert', 'User Created An Account', NULL, '2019-08-01', '06:20:50'),
('20190801062131655784', '20190801015131697503', 'insert', 'User Created An Account', NULL, '2019-08-01', '06:21:31'),
('20190801102818393377', '20190801055818310521', 'insert', 'User Created An Account', NULL, '2019-08-01', '10:28:18'),
('20190801221854936398', '20190801174854936870', 'insert', 'User Created An Account', NULL, '2019-08-01', '22:18:54'),
('20190802170251467372', '20190802123251420476', 'insert', 'User Created An Account', NULL, '2019-08-02', '17:02:51'),
('20190805184106477873', '20190805141106487007', 'insert', 'User Created An Account', NULL, '2019-08-05', '18:41:06'),
('20190805184240617602', '20190805141240696547', 'insert', 'User Created An Account', NULL, '2019-08-05', '18:42:40'),
('20190805184327950928', '20190805141327926664', 'insert', 'User Created An Account', NULL, '2019-08-05', '18:43:27'),
('20190805184525566618', '20190805141525549368', 'insert', 'User Created An Account', NULL, '2019-08-05', '18:45:25'),
('20190805184752561908', '20190805141752526889', 'insert', 'User Created An Account', NULL, '2019-08-05', '18:47:52'),
('20190807005412643947', '20190806202412692281', 'insert', 'User Created An Account', '185.22.173.86', '2019-08-07', '00:54:12'),
('20190807113324316837', '20190807070324374080', 'insert', 'User Created An Account', '185.22.173.191', '2019-08-07', '11:33:24'),
('20190807113540456155', '20190807070540473885', 'insert', 'User Created An Account', '185.22.173.191', '2019-08-07', '11:35:40'),
('20190807114255281754', '20190807071255296136', 'insert', 'User Created An Account', '212.8.249.177', '2019-08-07', '11:42:55'),
('20190903121654615334', '1741525888', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-03', '12:16:54'),
('20190904112427016205', '1741525888', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-04', '11:24:27'),
('20190904132404968364', '10', 'UPDATE', 'UPDATING ADMIN 2', '127.0.0.1', '2019-09-04', '13:24:04'),
('20190904132913842777', '10', 'UPDATE', 'UPDATING ADMIN 2', '127.0.0.1', '2019-09-04', '13:29:13'),
('20190904133810552328', '10', 'UPDATE', 'UPDATING ADMIN 1', '127.0.0.1', '2019-09-04', '13:38:10'),
('20190904143127816437', '10', 'UPDATE', 'UPDATING ADMIN 2', '127.0.0.1', '2019-09-04', '14:31:27'),
('20190904153317573904', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:33:17'),
('20190904153322340278', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:33:22'),
('20190904153642936558', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:36:42'),
('20190904153842381668', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:38:42'),
('20190904154059080613', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:40:59'),
('20190904154106834638', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:41:06'),
('20190904154136758761', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:41:36'),
('20190904154144388107', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '15:41:44'),
('20190904161136137376', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:11:36'),
('20190904161219687121', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:12:19'),
('20190904161232051817', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:12:32'),
('20190904161330479772', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:13:30'),
('20190904161344282761', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:13:44'),
('20190904161830575555', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:18:30'),
('20190904163115341392', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:31:15'),
('20190904163129825416', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:31:29'),
('20190904163258512977', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:32:58'),
('20190904163306771155', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:33:06'),
('20190904164305329304', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:43:05'),
('20190904164311479160', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:43:11'),
('20190904164345535498', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:43:45'),
('20190904164400760501', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:44:00'),
('20190904164417760873', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:44:17'),
('20190904164426573257', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:44:26'),
('20190904164652545356', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:46:52'),
('20190904164705840708', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:47:05'),
('20190904164754124774', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:47:54'),
('20190904164816143299', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:48:16'),
('20190904165747927485', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:57:47'),
('20190904165910034864', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '16:59:10'),
('20190904170220748936', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '17:02:20'),
('20190904170353279066', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '17:03:53'),
('20190904170512615174', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '17:05:12'),
('20190904170756160384', '10', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-04', '17:07:56'),
('20190905102912293828', '1472583695', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-05', '10:29:12'),
('20190905121312855916', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-05', '12:13:12'),
('20190905121427195655', '09164562874', 'UPDATING', 'UPDATING user 1', '127.0.0.1', '2019-09-05', '12:14:27'),
('20190905121440636384', '09164562874', 'UPDATING', 'UPDATING user 1', '127.0.0.1', '2019-09-05', '12:14:40'),
('20190905121503392100', '09166115222', 'UPDATING', 'UPDATING user 1', '127.0.0.1', '2019-09-05', '12:15:03'),
('20190905135304141852', '147258372', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-05', '13:53:04'),
('20190905172402030592', '48', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-05', '17:24:02'),
('20190905172414640376', '48', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-05', '17:24:14'),
('20190907095854483005', '1472580258', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-07', '09:58:54'),
('20190907110337092807', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '11:03:37'),
('20190907110406569116', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '11:04:06'),
('20190907110904181421', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '11:09:04'),
('20190907110915333241', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '11:09:15'),
('20190907131057250727', '39', 'UPDATING', 'UPDATING Comment 2', '127.0.0.1', '2019-09-07', '13:10:57'),
('20190907131113866674', '39', 'UPDATING', 'UPDATING Comment 2', '127.0.0.1', '2019-09-07', '13:11:13'),
('20190907131411955925', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '13:14:11'),
('20190907133513240001', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '13:35:13'),
('20190907133525711110', '39', 'UPDATING', 'UPDATING Comment 2', '127.0.0.1', '2019-09-07', '13:35:25'),
('20190907133641866552', '39', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-07', '13:36:41'),
('20190907133652316066', '39', 'INSERT', 'Allowing Comment1', '127.0.0.1', '2019-09-07', '13:36:52'),
('20190907165508821134', '39', 'INSERT', 'INSERTING Worker', '127.0.0.1', '2019-09-07', '16:55:08'),
('20190907172240962275', '39', 'UPDATE', 'UPDATING WOrker 1', '127.0.0.1', '2019-09-07', '17:22:40'),
('20190908115245867288', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-08', '11:52:45'),
('20190908164949133095', '42', 'INSERT', 'INSERTING Points 3', '127.0.0.1', '2019-09-08', '16:49:49'),
('20190908165000785441', '42', 'INSERT', 'INSERTING Points 3', '127.0.0.1', '2019-09-08', '16:50:00'),
('20190908165150957193', '42', 'INSERT', 'INSERTING Points 3', '127.0.0.1', '2019-09-08', '16:51:50'),
('20190908165200895388', '42', 'INSERT', 'INSERTING Points 3', '127.0.0.1', '2019-09-08', '16:52:00'),
('20190908165224864287', '42', 'INSERT', 'INSERTING Points 1', '127.0.0.1', '2019-09-08', '16:52:24'),
('20190914110133547897', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-14', '11:01:33'),
('20190914121654624172', '42', 'INSERT', 'INSERTING Category', '127.0.0.1', '2019-09-14', '12:16:54'),
('20190914121820744357', '42', 'INSERT', 'INSERTING Category', '127.0.0.1', '2019-09-14', '12:18:20'),
('20190914122305799064', '42', 'INSERT', 'INSERTING Category', '127.0.0.1', '2019-09-14', '12:23:05'),
('20190914124007179057', '42', 'UPDATE', 'UPDATEING Category 2', '127.0.0.1', '2019-09-14', '12:40:07'),
('20190914140438335151', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:04:38'),
('20190914140726732234', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:07:26'),
('20190914141114773370', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:11:14'),
('20190914141533629554', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:15:33'),
('20190914141630225813', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:16:30'),
('20190914141741360366', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:17:41'),
('20190914141749079618', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:17:49'),
('20190914141854437285', '42', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-09-14', '14:18:54'),
('20190914160140061255', '42', 'UPDATE', 'UPDATING Subcategory2', '127.0.0.1', '2019-09-14', '16:01:40'),
('20190914160952778539', '42', 'UPDATE', 'UPDATING Subcategory2', '127.0.0.1', '2019-09-14', '16:09:52'),
('20190914161014733598', '42', 'UPDATE', 'UPDATING Subcategory2', '127.0.0.1', '2019-09-14', '16:10:14'),
('20190915105756885710', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-15', '10:57:56'),
('20190916110408092749', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-16', '11:04:08'),
('20190916135005145495', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:50:05'),
('20190916135039333322', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:50:39'),
('20190916135222625961', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:52:22'),
('20190916135235050083', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:52:35'),
('20190916135414192037', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:54:14'),
('20190916135432628579', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:54:32'),
('20190916135435746313', '42', 'INSERT', 'INSERTING commissionPayment', '127.0.0.1', '2019-09-16', '13:54:35'),
('20190916150422847570', '42', 'UPDATE', 'UPDATEING commissionPayment 68481653', '127.0.0.1', '2019-09-16', '15:04:22'),
('20190916150432012998', '42', 'UPDATE', 'UPDATEING commissionPayment 68481653', '127.0.0.1', '2019-09-16', '15:04:32'),
('20190918192546591949', '1472580288', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-18', '19:25:46'),
('20190918192823178819', '42', 'INSERT', 'INSERTING WorkersPayment', '127.0.0.1', '2019-09-18', '19:28:23'),
('20190918193337457191', '42', 'UPDATE', 'UPDATING WorkersPayment 1', '127.0.0.1', '2019-09-18', '19:33:37'),
('20190918203038178811', '1472583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-18', '20:30:38'),
('20190918214712045670', '11', 'UPDATE', 'UPDATING Payment1', '127.0.0.1', '2019-09-18', '21:47:12'),
('20190918214754033196', '11', 'UPDATE', 'UPDATING Payment1', '127.0.0.1', '2019-09-18', '21:47:54'),
('20190918214835242346', '11', 'UPDATE', 'UPDATING Payment1', '127.0.0.1', '2019-09-18', '21:48:35'),
('20190918230857215531', '11', 'UPDATE', 'UPDATEING Order 55182984', '127.0.0.1', '2019-09-18', '23:08:57'),
('20190922124743431990', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-22', '12:47:43'),
('20190922153412848868', '18', 'INSERT', ' !!! INSERTING img  !!! ', '127.0.0.1', '2019-09-22', '15:34:12'),
('20190923095556137636', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-23', '09:55:56'),
('20190923120124870177', '18', 'INSERT', 'INSERTING ADMIN', '127.0.0.1', '2019-09-23', '12:01:24'),
('20190923121342020668', '18', 'INSERT', ' !!! INSERTING img  !!! ', '127.0.0.1', '2019-09-23', '12:13:42'),
('20190923124211964876', '18', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-09-23', '12:42:11'),
('20190923124519039184', '18', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-09-23', '12:45:19'),
('20190923124849174444', '18', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-09-23', '12:48:49'),
('20190923125329580960', '18', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-09-23', '12:53:29'),
('20190923125429781977', '18', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-09-23', '12:54:29'),
('20190923143115061785', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-23', '14:31:15'),
('20190923151831123751', '65', 'UPDATE', 'UPDATING subCatQuesVal6', '127.0.0.1', '2019-09-23', '15:18:31'),
('20190923151946596413', '65', 'INSERT', 'INSERTING subCatQuesVal', '127.0.0.1', '2019-09-23', '15:19:46'),
('20190923152325914238', '65', 'UPDATE', 'UPDATING SubCatQuestion3', '127.0.0.1', '2019-09-23', '15:23:25'),
('20190923152359781408', '65', 'INSERT', 'INSERTING SubCatQuestion', '127.0.0.1', '2019-09-23', '15:23:59'),
('20190923162432489982', '65', 'INSERT', 'INSERTING Points 1', '127.0.0.1', '2019-09-23', '16:24:32'),
('20190923162440765561', '65', 'INSERT', 'INSERTING Points 1', '127.0.0.1', '2019-09-23', '16:24:40'),
('20190924120650524636', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-24', '12:06:50'),
('20190924122026012803', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-24', '12:20:26'),
('20190924122045640303', '18', 'INSERT', 'Allowing Comment2', '127.0.0.1', '2019-09-24', '12:20:45'),
('20190924122106277927', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-09-24', '12:21:06'),
('20190925101321185232', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-25', '10:13:21'),
('20190928142618490619', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-28', '14:26:18'),
('20190929174452753838', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-09-29', '17:44:52'),
('20191001120218535491', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-01', '12:02:18'),
('20191001150919089372', '18', 'UPDATE', 'UPDATEING Order 68481651', '127.0.0.1', '2019-10-01', '15:09:19'),
('20191002135633147415', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-02', '13:56:33'),
('20191003115907388276', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-03', '11:59:07'),
('20191003120918165952', '18', 'UPDATE', 'UPDATING Payment1', '127.0.0.1', '2019-10-03', '12:09:18'),
('20191006112710678680', '', 'INSERT', 'INSERTING Address', '::1', '2019-10-06', '11:27:10'),
('20191006115210639440', '', 'INSERT', 'UPDATING ORDER(Cancel) 55182984', '::1', '2019-10-06', '11:52:10'),
('20191006143531373628', '5', 'UPDATING', 'UPDATING user ', '::1', '2019-10-06', '14:35:31'),
('20191006143552317214', '5', 'UPDATING', 'UPDATING user ', '::1', '2019-10-06', '14:35:52'),
('20191008123746496672', '3', 'UPDATING', 'UPDATING user(website)  3', '::1', '2019-10-08', '12:37:46'),
('20191008133800323010', 'customer', 'INSERT', 'UPDATING FavoriteWorker 1', '::1', '2019-10-08', '13:38:00'),
('20191008152228919020', '09166589635', 'login', 'login User website ', '::1', '2019-10-08', '15:22:28'),
('20191010125602044778', '09166119529', 'INSERT', 'Res Pass user', '127.0.0.1', '2019-10-10', '12:56:02'),
('20191010133312922875', '09166547852', 'INSERT', 'INSERTING user', '127.0.0.1', '2019-10-10', '13:33:12'),
('20191012160603629057', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-12', '16:06:03'),
('20191012160636753787', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-12', '16:06:36'),
('20191013111906580673', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-13', '11:19:06'),
('20191013111934390909', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-13', '11:19:34'),
('20191013112049998666', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-13', '11:20:49'),
('20191014135431312487', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-14', '13:54:31'),
('20191014140557126074', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-14', '14:05:57'),
('20191014143004517803', '18', 'INSERT', 'Allowing Comment1', '127.0.0.1', '2019-10-14', '14:30:04'),
('20191014143125168387', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-10-14', '14:31:25'),
('20191014143302799577', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-10-14', '14:33:02'),
('20191014143323094372', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-10-14', '14:33:23'),
('20191014150253021304', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-14', '15:02:53'),
('20191015111359855528', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-15', '11:13:59'),
('20191015130902997830', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-15', '13:09:02'),
('20191015132218563321', '18', 'INSERT', ' !!! INSERTING img  !!! ', '127.0.0.1', '2019-10-15', '13:22:18'),
('20191015132317871851', '18', 'INSERT', ' !!! INSERTING img  !!! ', '127.0.0.1', '2019-10-15', '13:23:17'),
('20191015143630441890', '18', 'UPDATE', 'UPDATING WOrker 1', '127.0.0.1', '2019-10-15', '14:36:30'),
('20191015150903960034', '18', 'UPDATING', 'UPDATING Comment 1', '127.0.0.1', '2019-10-15', '15:09:03'),
('20191015162031436389', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-15', '16:20:31'),
('20191015162213470047', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-15', '16:22:13'),
('20191015162340889376', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-15', '16:23:40'),
('20191015174031548633', '09166119529', 'INSERT', 'Res Pass user', '::1', '2019-10-15', '17:40:31'),
('20191015174811819494', '09165247852', 'INSERT', 'INSERTING web user ', '::1', '2019-10-15', '17:48:11'),
('20191015174900078558', '09165247852', 'INSERT', 'INSERTING user', '::1', '2019-10-15', '17:49:00'),
('20191016105011462669', '09166119529', 'INSERT', 'Res Pass user', '127.0.0.1', '2019-10-16', '10:50:11'),
('20191016112940159363', '09369505461', 'INSERT', 'INSERTING web user ', '127.0.0.1', '2019-10-16', '11:29:40'),
('20191016113356676852', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-16', '11:33:56'),
('20191016115429573401', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-16', '11:54:29'),
('20191016115623427526', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-16', '11:56:23'),
('20191016133616388800', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-16', '13:36:16'),
('20191016134422963845', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-16', '13:44:22'),
('20191017112739627613', '1472583120', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-17', '11:27:39'),
('20191017151326392693', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-17', '15:13:26'),
('20191020142714699836', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-20', '14:27:14'),
('20191020151437923850', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-20', '15:14:37'),
('20191020151521317995', '3', 'INSERT', 'UPDATING ORDER(WebSite) 20191020151416914000', '127.0.0.1', '2019-10-20', '15:15:21'),
('20191020153423867966', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-20', '15:34:23'),
('20191020153451831650', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-20', '15:34:51'),
('20191020155315057940', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-20', '15:53:15'),
('20191021112459082941', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-21', '11:24:59'),
('20191021113604689775', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-21', '11:36:04'),
('20191021113812181442', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-21', '11:38:12'),
('20191021122435585220', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-21', '12:24:35'),
('20191021122503450021', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-21', '12:25:03'),
('20191021122513451757', '', 'INSERT', 'UPDATING ORDER(WebSite-address) 20191021122457070000', '127.0.0.1', '2019-10-21', '12:25:13'),
('20191021122523739798', '', 'INSERT', 'UPDATING ORDER(WebSite-address) 20191021122457070000', '127.0.0.1', '2019-10-21', '12:25:23'),
('20191021123521571424', '3', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-21', '12:35:21'),
('20191021123525962235', '3', 'INSERT', 'UPDATING ORDER(WebSite-address) 20191021123511040000', '127.0.0.1', '2019-10-21', '12:35:25'),
('20191022155429448914', '1452583690', 'login', 'login ADMIN ', '::1', '2019-10-22', '15:54:29'),
('20191023113321291479', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-23', '11:33:21'),
('20191023123955937067', '65', 'INSERT', 'INSERTING subcategoryservices', '127.0.0.1', '2019-10-23', '12:39:55'),
('20191023124127711350', '65', 'UPDATING', 'UPDATING subcategoryservices 3', '127.0.0.1', '2019-10-23', '12:41:27'),
('20191023143019024559', '65', 'UPDATING', 'UPDATING subcategoryInfo 1', '127.0.0.1', '2019-10-23', '14:30:19'),
('20191023143026968160', '65', 'UPDATING', 'UPDATING subcategoryInfo 1', '127.0.0.1', '2019-10-23', '14:30:26'),
('20191023143110582538', '65', 'UPDATING', 'UPDATING subcategoryservices 1', '127.0.0.1', '2019-10-23', '14:31:10'),
('20191023143130244944', '65', 'UPDATING', 'UPDATING subcategoryservices 1', '127.0.0.1', '2019-10-23', '14:31:30'),
('20191023143147435386', '65', 'INSERT', 'INSERTING subcategoryservices', '127.0.0.1', '2019-10-23', '14:31:47'),
('20191023143226957026', '65', 'INSERT', 'INSERTING subcategoryInfo', '127.0.0.1', '2019-10-23', '14:32:26'),
('20191023143241759479', '65', 'UPDATING', 'UPDATING subcategoryInfo 2', '127.0.0.1', '2019-10-23', '14:32:41'),
('20191023143819328211', '65', 'UPDATING', 'UPDATING subcategoryCosts 1', '127.0.0.1', '2019-10-23', '14:38:19'),
('20191023143945436820', '65', 'INSERT', 'INSERTING subcategoryCosts', '127.0.0.1', '2019-10-23', '14:39:45'),
('20191023145935548835', '65', 'UPDATE', 'UPDATING Subcategory1', '127.0.0.1', '2019-10-23', '14:59:35'),
('20191023150345234078', '65', 'INSERT', 'INSERTING Subcategory', '127.0.0.1', '2019-10-23', '15:03:45'),
('20191023155819721813', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-23', '15:58:19'),
('20191023160027377962', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-23', '16:00:27'),
('20191023160120964883', '65', 'INSERT', ' !!! INSERTING SubCat img  !!! ', '127.0.0.1', '2019-10-23', '16:01:20'),
('20191023160144125695', '65', 'UPDATE', 'UPDATING Subcategory1', '127.0.0.1', '2019-10-23', '16:01:44'),
('20191023160632683498', '65', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-10-23', '16:06:32'),
('20191023160805327884', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-23', '16:08:05'),
('20191023161747650119', '09166119529', 'login', 'login User website ', '127.0.0.1', '2019-10-23', '16:17:47'),
('20191023162424987996', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-23', '16:24:24'),
('20191024154904685061', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-10-24', '15:49:04'),
('20191024155730215602', '65', 'INSERT', 'INSERTING SubCatQuestion', '127.0.0.1', '2019-10-24', '15:57:30'),
('20191105145433462285', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-05', '14:54:33'),
('20191105145901381377', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-05', '14:59:01'),
('20191105153004459812', '65', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-11-05', '15:30:04'),
('20191105153116588629', '65', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-11-05', '15:31:16'),
('20191105153206298382', '65', 'INSERT', 'INSERTING Order(webSite)', '127.0.0.1', '2019-11-05', '15:32:06'),
('20191105183311456224', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-05', '18:33:11'),
('20191110114243024370', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-10', '11:42:43'),
('20191110114243063796', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-10', '11:42:43'),
('20191111114138498380', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-11', '11:41:38'),
('20191113114724178740', '1452583690', 'login', 'login ADMIN ', '127.0.0.1', '2019-11-13', '11:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `versioncheck`
--

CREATE TABLE `versioncheck` (
  `id` int(11) NOT NULL,
  `appVersion` float NOT NULL,
  `devise` varchar(30) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `versioncheck`
--

INSERT INTO `versioncheck` (`id`, `appVersion`, `devise`) VALUES
(1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `referenceNumber` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Action` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `time`, `date`, `referenceNumber`, `Action`, `status`, `amount`, `method`, `userId`) VALUES
(1, '00:13:00', '2019-10-15', '85995', 'Withdrawal', 1, 1000, 'card', 3),
(2, '22:00:00', '2019-10-02', '00325', 'Deposit', 1, 1900, 'card', 3),
(3, '14:00:00', '2019-10-04', '963528', 'Deposit', 1, 1400, 'card', 3),
(4, '15:00:00', '2019-09-03', '77784', 'Withdrawal', 1, 200, 'cash', 3);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `phoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `nationalCode` int(11) NOT NULL,
  `password` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `fixedPhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `maritalStatus` tinyint(1) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `token` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `verificationCode` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `WorkersImg` varchar(250) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`name`, `lastName`, `phoneNumber`, `dateOfBirth`, `address`, `nationalCode`, `password`, `fixedPhoneNumber`, `date`, `time`, `status`, `id`, `gender`, `maritalStatus`, `subCategoryId`, `token`, `verificationCode`, `WorkersImg`) VALUES
('nima', 'moradi', '09022002021', '1398-06-07', 'piratil.co', 1741455623, 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', '06165656262', '2019-09-05', '07:09:04', 1, 1, 1, 0, 2, '', '', 'ali'),
('Arthas', 'Washi', '09106006060', '1398-06-20', 'madison Square', 1741450258, 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', '06133323332', '2019-09-07', '16:55:08', 1, 2, 1, 0, 3, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workerspayment`
--

CREATE TABLE `workerspayment` (
  `id` int(11) NOT NULL,
  `workerId` int(11) NOT NULL,
  `PaymentTrackingNumber` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `paymentAmount` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `workerspayment`
--

INSERT INTO `workerspayment` (`id`, `workerId`, `PaymentTrackingNumber`, `paymentAmount`, `date`, `time`, `Status`) VALUES
(1, 1, '1', 1, '2019-09-03', '07:06:05', 1),
(2, 1, '88928487', 333333, '2019-09-07', '07:09:11', 1),
(3, 2, '88928487333', 333333, '2019-09-03', '07:09:04', 0),
(4, 1, '32', 33333, '2019-09-18', '19:28:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `ID(national code)` (`nationalCode`);

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissionpayment`
--
ALTER TABLE `commissionpayment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PaymentTrackingNumber` (`PaymentTrackingNumber`);

--
-- Indexes for table `favoriteworker`
--
ALTER TABLE `favoriteworker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgbase`
--
ALTER TABLE `imgbase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercancellation`
--
ALTER TABLE `ordercancellation`
  ADD PRIMARY KEY (`ocId`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordervalues`
--
ALTER TABLE `ordervalues`
  ADD PRIMARY KEY (`ovId`);

--
-- Indexes for table `paymentamountlist`
--
ALTER TABLE `paymentamountlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategorycosts`
--
ALTER TABLE `subcategorycosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategoryinformation`
--
ALTER TABLE `subcategoryinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategoryId` (`subcategoryId`);

--
-- Indexes for table `subcategoryquestions`
--
ALTER TABLE `subcategoryquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategoryquestionsvalue`
--
ALTER TABLE `subcategoryquestionsvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategoryservices`
--
ALTER TABLE `subcategoryservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `versioncheck`
--
ALTER TABLE `versioncheck`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appVersion` (`appVersion`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referenceNumber` (`referenceNumber`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fixedPhoneNumber` (`fixedPhoneNumber`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `nationalCode` (`nationalCode`);

--
-- Indexes for table `workerspayment`
--
ALTER TABLE `workerspayment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PaymentTrackingNumber` (`PaymentTrackingNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commissionpayment`
--
ALTER TABLE `commissionpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68481658;

--
-- AUTO_INCREMENT for table `favoriteworker`
--
ALTER TABLE `favoriteworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imgbase`
--
ALTER TABLE `imgbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ordercancellation`
--
ALTER TABLE `ordercancellation`
  MODIFY `ocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordervalues`
--
ALTER TABLE `ordervalues`
  MODIFY `ovId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `paymentamountlist`
--
ALTER TABLE `paymentamountlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subcategorycosts`
--
ALTER TABLE `subcategorycosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategoryinformation`
--
ALTER TABLE `subcategoryinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategoryquestions`
--
ALTER TABLE `subcategoryquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategoryquestionsvalue`
--
ALTER TABLE `subcategoryquestionsvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategoryservices`
--
ALTER TABLE `subcategoryservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `versioncheck`
--
ALTER TABLE `versioncheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workerspayment`
--
ALTER TABLE `workerspayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
