-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 04:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `davin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID(national code)` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `PhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Level` int(1) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Branch` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID(national code)`, `Name`, `LastName`, `Password`, `Email`, `PhoneNumber`, `Level`, `Date`, `Time`, `Status`, `Branch`) VALUES
('1741525888', 'Tom', 'Tommy', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'Tommy4558@gmail.com', '09166119592', 1, '2019-08-24', '30:09:17', 1, 'pars'),
('1741744564', 'majid', 'hamidid', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'jimmidjid458@gmail.com', '09022005609', 1, '2019-08-07', '17:16:38', 1, 'pars'),
('1742174876', 'ذلقابلبذ', 'بیبلیلی', '98da6f8d5b79f2d56b5e02d216b792711f8fcea61cc633bb1d615a0d6127f0b082eba4e13671784087b4f1a722e6965734d440c830178a8c581178407e5638ba', 'aminab38@yahoo.com', '09333333333', 1, '2019-08-07', '16:53:35', 1, 'aa'),
('1742583696', 'mmd', 'hamidi', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'mmdi2323@gmail.com', '09166115456', 1, '2019-08-07', '16:45:29', 1, 'kiyanabad'),
('1742589887', 'majid', 'moradi', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'sacarei78@gmail.com', '09166119587', 1, '2019-08-07', '16:47:04', 1, 'zeyton'),
('1745821548', 'mmd', 'mmdi', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'mmdjavadi232@gmail.com', '09022004565', 1, '2019-08-07', '17:09:21', 1, 'pars'),
('1745826545', 'amin', 'amini', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'amin5657@gmail.com', '09166115842', 1, '2019-08-07', '17:04:36', 1, 'pars'),
('1745826987', 'Majid', 'Drinkwater', 'Mm0123456789', 'Drinkwater8978$hotmail.com', '09166589635', 2, '2019-08-12', '15:18:10', 1, 'Pars'),
('1745896358', 'mmd', 'hamidi', 'e82847a12e9c26925beef3586e6c653af75b3d18fa85a9a5b4012ee1879c7e8521bd7c59b1fb3d16138fa09043ed30262c31ddb29f8155a88c14e1a26c86def8', 'mid2345@gmail.com', '09166119529', 1, '2019-08-07', '16:43:42', 1, 'padad'),
('1900404826', 'میلاد', 'یوسفی', 'd02580fe941f2b3824c673da753a1d730712b633bbc85f17bf2b99e8f7a178da9da4ddb65bc991db910c4ec67abb30ee773d4282488ecf93680e9414fe2979f2', 'sr.yousefi.com@gmail.com', '09372174474', 20, '2019-08-08', '14:56:39', 1, 'نادری');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `ID` int(11) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `CompanyRegistrationNumber` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `CompanyNationalID` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `EconomicCode` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `FixedPhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Province` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `City` varchar(25) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `CompanyName`, `CompanyRegistrationNumber`, `CompanyNationalID`, `EconomicCode`, `FixedPhoneNumber`, `Province`, `City`) VALUES
(1, 'piratil', '1232321313321321222', '321321212132332222', '13223211231232222', '06133353844', 'london', 'paris'),
(2, 'qwe', 'q2', '321', '1232', '06133353341', '12341', 'sq'),
(3, 'qwe', 'qwe', 'eqwe', 'qweqw', '45612332112', 'eqweqwe', 'qweqw'),
(4, 'پیراتیل', '365555', '852852', '65565', '06133188586', 'خوزستان', 'اهواز'),
(5, 'پیراتیل', '74161653', '231414', '51651', '06133335654', 'خوزستان', 'اهواز');

-- --------------------------------------------------------

--
-- Table structure for table `companycontract`
--

CREATE TABLE `companycontract` (
  `ID` int(11) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `InstallmentPeriod` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `ExpDate` date NOT NULL,
  `PaymentAmount` int(11) NOT NULL,
  `InstallmentNumbers` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `companycontract`
--

INSERT INTO `companycontract` (`ID`, `CompanyName`, `CompanyID`, `InstallmentPeriod`, `StartDate`, `ExpDate`, `PaymentAmount`, `InstallmentNumbers`) VALUES
(1, 'piratil', 1, 1111, '1398-05-07', '1398-05-09', 111111, 111),
(2, 'jahancop', 1, 6, '2019-08-08', '2019-08-31', 500000, 6),
(3, 'piratill', 1, 50, '1398-05-01', '1398-05-12', 50, 6),
(4, 'پیراتیل', 4, 5, '1398-05-16', '1398-05-16', 10000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `contractusers`
--

CREATE TABLE `contractusers` (
  `NationalCode` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `PhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `DateOfMarriage` date NOT NULL,
  `Adress` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `FixedPhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `ContractID` int(11) NOT NULL,
  `CompanyName` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `contractusers`
--

INSERT INTO `contractusers` (`NationalCode`, `Name`, `LastName`, `PhoneNumber`, `DateOfMarriage`, `Adress`, `Gender`, `FixedPhoneNumber`, `CompanyID`, `ContractID`, `CompanyName`) VALUES
('1741545454', 'sabt', 'sabtiiii', '09022002076', '1398-05-17', 'digiland', 0, '06178787854', 4, 0, 'پیراتیل'),
('1741520301', 'lashkari', 'lashkariii', '09100902323', '1398-05-17', 'Digiland', 1, '06133323133', 4, 0, 'پیراتیل'),
('1741586963', 'Amber', 'Viciious', '09122001270', '1398-05-06', 'qweqeqeeq', 1, '06133323130', 1, 0, 'piratil'),
('1741520880', 'jack', 'sparrow', '09162101410', '1398-05-13', 'qweqe', 1, '06133333333', 1, 1, 'piratil'),
('1741589636', 'mmx', 'asas', '09166113669', '1398-05-12', 'assa', 1, '06133353232', 0, 0, 'piratill'),
('1741525823', 'Majid', 'Jahangiri', '09166589635', '2019-08-22', '132321', 0, '06133353896', 123321, 787878, 'piratill');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `ExpireDate` date NOT NULL,
  `Multiplier` float NOT NULL,
  `EventName` char(20) COLLATE utf8_persian_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `StartDate`, `ExpireDate`, `Multiplier`, `EventName`, `Status`) VALUES
(1, '2019-08-08', '2019-08-29', 2, 'amir jahangirizade', 0),
(2, '2019-08-13', '2019-08-30', 3, 'khosravi', 1),
(6, '1398-05-09', '1398-05-17', 1111, 'minamidane', 0);

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `FactorID` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `UserID` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `EarnedCredit` int(10) NOT NULL,
  `UsedCredit` int(10) NOT NULL,
  `AdminID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `PaymentMethod` tinyint(1) NOT NULL,
  `PaymentStatues` tinyint(1) NOT NULL,
  `ContractID` int(4) NOT NULL,
  `finalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`FactorID`, `UserID`, `EarnedCredit`, `UsedCredit`, `AdminID`, `Date`, `Time`, `PaymentMethod`, `PaymentStatues`, `ContractID`, `finalPrice`) VALUES
('0000000000000000', '09022002076', 3, 0, '1741525888', '2019-08-15', '17:33:36', 1, 1, 0, 500000),
('00000000111111111', '09022002076', 1, 0, '1741525888', '2019-08-17', '10:55:21', 1, 1, 0, 500000),
('01234567899876543210', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:00:12', 1, 1, 0, 500000),
('0900209020902', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:12:55', 1, 1, 0, 500000),
('09022002076', '09022002076', 1, 0, '1741525888', '2019-08-15', '17:38:27', 1, 1, 0, 500000),
('091609160916', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:09:11', 1, 1, 0, 500000),
('10000000000000000000', '09022002076', 1, 0, '1741525888', '2019-08-15', '17:37:09', 1, 1, 0, 500000),
('1091609160916', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:09:31', 1, 1, 0, 500000),
('10916209160916', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:09:51', 1, 1, 0, 500000),
('1091622309160916', '09022002076', 1, 0, '1741525888', '2019-08-17', '11:10:26', 1, 1, 0, 500000),
('113151', '95290916611', 2147483647, 21115, '1741744564', '2019-08-17', '17:22:05', 1, 1, 2, 0),
('21211e22', '09022002076', 0, 0, '1741525888', '2019-08-17', '12:41:37', 1, 1, 0, 50),
('221211e22', '09022002076', 0, 0, '1741525888', '2019-08-17', '12:42:11', 1, 1, 0, 50),
('44444444', '09166119529', 5, 6, '1741525888', '2019-08-13', '14:28:47', 1, 1, 0, 2350000),
('444444444444', '09166119529', 2, 0, '1741525888', '2019-08-13', '14:30:43', 1, 1, 0, 1190000),
('4747441414741', '09022002076', 3, 0, '1741525888', '2019-08-17', '11:14:32', 1, 1, 0, 500000),
('551000000045', '09166119526', 22, 50, '1741744564', '2019-08-08', '16:58:11', 1, 1, 2, 0),
('646454', '', 0, 0, '', '2019-08-24', '12:21:15', 0, 0, 0, 0),
('646454877887', '09022002076', 0, 0, '', '2019-08-10', '09:23:09', 0, 0, 0, 0),
('6464549', '09022002076', 0, 0, '', '2019-08-22', '09:15:25', 0, 0, 0, 0),
('654654654654', '', 0, 0, '', '2019-08-14', '14:28:12', 0, 0, 0, 0),
('787878789', '09166119529', 6, 2, '1741525888', '2019-08-13', '14:03:13', 1, 1, 0, 3200000),
('789789789789789', '09022002076', 1, 0, '1741525888', '2019-08-15', '17:31:18', 1, 1, 0, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `factordata`
--

CREATE TABLE `factordata` (
  `ID` int(10) NOT NULL,
  `FactorID` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `ProductID` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `NumbersProduct` int(5) NOT NULL,
  `FinalPrice` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `factordata`
--

INSERT INTO `factordata` (`ID`, `FactorID`, `ProductID`, `NumbersProduct`, `FinalPrice`, `Status`) VALUES
(1, '6464549', '412358', 2, 0, 0),
(2, '646454877887', '5486598', 3, 0, 0),
(3, '6464549', '5486598', 7, 0, 0),
(4, '6464549', '87874548', 85, 2147483647, 0),
(5, '6464549', '87874548', 85, 2147483647, 0),
(6, '6464549', '87874548', 2, 2147483647, 0),
(7, '6464549', '5486598', 5, 2147483647, 0),
(8, '6464549', '87874548', 2, 90000, 0),
(9, '6464549', '5486598', 4, 800, 1),
(10, '444444444444', '5486598', 15, 3000, 1),
(11, '444444444444', '87874548', 40, 1800000, 0),
(12, '113151', '3123212313', 3, 18600, 1),
(13, '113151', '5486598', 4, 800, 1),
(14, '113151', '555454', 3, 2100, 1),
(15, '0000000000000000', '11111111222222', 3, 900, 1),
(16, '0000000000000000', '3123212313', 4, 24800, 1),
(17, '0000000000000000', '11111111222222', 9, 2700, 1),
(18, '0000000000000000', '4', 2, 0, 1),
(19, '0000000000000000', '11111111222222', 3, 900, 1),
(20, '0000000000000000', '3123212313', 7, 43400, 1),
(21, '0000000000000000', '0000000000000000', 2, 0, 1),
(22, '0000000000000000', '0000000000000000', 2, 0, 1),
(23, '0000000000000000', '0000000000000000', 2, 0, 1),
(24, '0000000000000000', '0000000000000000', 2, 0, 1),
(25, '00000000111111111', '0000000000000000', 3, 0, 1),
(26, '01234567899876543210', '11111111222222', 2, 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `installmentlist`
--

CREATE TABLE `installmentlist` (
  `ID` int(11) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `PaymentAmount` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ContractUserID` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `FactorID` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `installmentlist`
--

INSERT INTO `installmentlist` (`ID`, `PaymentStatus`, `PaymentAmount`, `PaymentDate`, `DueDate`, `ContractUserID`, `FactorID`) VALUES
(1, 1, 50000, '2019-08-21', '2019-08-24', '09166114563', '');

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE `lottery` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `MinPoints` int(5) NOT NULL,
  `NumberOfWinners` int(3) NOT NULL,
  `Prize` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`ID`, `Name`, `Date`, `Time`, `MinPoints`, `NumberOfWinners`, `Prize`) VALUES
(1, 'Scarlet', '2019-08-12', '22:09:27', 0, 4, '22222'),
(2, 'Jaina', '2019-08-30', '28:36:09', 45, 5, '50000'),
(3, '111111111', '1398-05-16', '13:12:00', 111111111, 11111111, '1111111'),
(4, 'boshqab', '0000-00-00', '00:00:00', 50, 3, '50000000');

-- --------------------------------------------------------

--
-- Table structure for table `otherpoints`
--

CREATE TABLE `otherpoints` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Points` int(5) NOT NULL,
  `AdminID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Reason` varchar(500) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `otherpoints`
--

INSERT INTO `otherpoints` (`ID`, `UserID`, `Points`, `AdminID`, `Date`, `Time`, `Reason`) VALUES
(1, '09022002076', 50, '1741525888', '2019-08-07', '15:24:13', 'دلیل را وارد کنید'),
(2, '09022002076', 50, '1741525888', '2019-08-07', '15:24:31', 'دلیل را وارد کنید'),
(3, '09022002076', 50, '1741525888', '2019-08-07', '15:24:42', 'دلیل را وارد کنید'),
(4, '09022002076', 50, '1741525888', '2019-08-07', '15:29:40', 'دلیل را وارد کنید'),
(5, '09022002076', 50, '1741525888', '2019-08-07', '15:32:54', 'سالگرد ازدواج'),
(6, '09022002076', 50, '1741525888', '2019-08-07', '17:11:31', 'تولد'),
(7, '09022002076', 50, '1741525888', '2019-08-14', '12:23:08', 'تولد'),
(8, '09166119529', 20, '1741525889', '2019-08-12', '24:10:00', ''),
(9, '09166119529', 45, '1741525889', '2019-08-12', '14:28:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `pointexchange`
--

CREATE TABLE `pointexchange` (
  `ID` int(11) NOT NULL,
  `Value` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pointvalue`
--

CREATE TABLE `pointvalue` (
  `ID` int(20) NOT NULL,
  `Point` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `pointvalue`
--

INSERT INTO `pointvalue` (`ID`, `Point`) VALUES
(1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `ProductName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Multiplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Price`, `Multiplier`) VALUES
('11111111222222', 'mina moradi', 300, 3),
('13231321', 'mina', 50000, 3),
('3123212313', 'sina', 6200, 3),
('412358', 'mina', 2147483647, 3),
('5486598', 'majid', 200, 3),
('555454', 'mmd', 700, 3),
('87874548', 'shorts', 45000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `NationalCode` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `PhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `InviterID` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `DateOfMarriage` date NOT NULL,
  `Address` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `FixedPhoneNumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `DateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `LastName`, `NationalCode`, `PhoneNumber`, `Password`, `InviterID`, `DateOfMarriage`, `Address`, `Gender`, `FixedPhoneNumber`, `DateOfBirth`) VALUES
('mmd', 'mmdi', '1741525890', '09022002076', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', '', '0000-00-00', 'weewweeweweewewweew', 1, '06133358967', '1398-05-25'),
('', '', '', '09166115220', '2ae56964a10893e9759852f9c796bf55862b3b8b17e904bd4517bc4c64dd7d719415280b16a05f3d685b808a532ff6a7535fd5a9113e2e02e577fa6d6f26bc74', '', '0000-00-00', '', 0, '', '0000-00-00'),
('mostafa', 'mayahi', '1741525892', '09166119529', 'lalalala', '', '2019-08-21', 'nezam mohansedi khiaban esfand', 1, '06133353892', '1379-06-07'),
('Scarlet', 'abdolahzade', '1741525899', '09166589635', 'Amir1111', '', '2019-08-12', 'jbjb', 1, '06133358965', '2019-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `winnerstable`
--

CREATE TABLE `winnerstable` (
  `WinnerId` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `ID` int(11) NOT NULL,
  `LotteryId` int(11) NOT NULL,
  `DeliveryDate` date NOT NULL,
  `DeliveryTime` time NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `winnerstable`
--

INSERT INTO `winnerstable` (`WinnerId`, `ID`, `LotteryId`, `DeliveryDate`, `DeliveryTime`, `Status`) VALUES
('09166119349', 1, 312, '0000-00-00', '00:01:32', 1),
('09026119529', 2, 2, '2019-08-03', '20:24:11', 0),
('09166119529', 3, 1, '2019-08-21', '15:16:09', 0),
('09166119529', 4, 1, '1398-05-16', '00:12:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID(national code)`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companycontract`
--
ALTER TABLE `companycontract`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contractusers`
--
ALTER TABLE `contractusers`
  ADD PRIMARY KEY (`PhoneNumber`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`FactorID`);

--
-- Indexes for table `factordata`
--
ALTER TABLE `factordata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `installmentlist`
--
ALTER TABLE `installmentlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `otherpoints`
--
ALTER TABLE `otherpoints`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `pointexchange`
--
ALTER TABLE `pointexchange`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pointvalue`
--
ALTER TABLE `pointvalue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`PhoneNumber`),
  ADD UNIQUE KEY `NationalCode` (`NationalCode`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `FixedPhoneNumber` (`FixedPhoneNumber`);

--
-- Indexes for table `winnerstable`
--
ALTER TABLE `winnerstable`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companycontract`
--
ALTER TABLE `companycontract`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `factordata`
--
ALTER TABLE `factordata`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `installmentlist`
--
ALTER TABLE `installmentlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otherpoints`
--
ALTER TABLE `otherpoints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pointexchange`
--
ALTER TABLE `pointexchange`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pointvalue`
--
ALTER TABLE `pointvalue`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `winnerstable`
--
ALTER TABLE `winnerstable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
