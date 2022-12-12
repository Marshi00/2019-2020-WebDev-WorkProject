-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2019 at 09:30 AM
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
-- Database: `davin`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `addressId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `addressText` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `addressProvinceId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `addressCityId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `addressUserId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `postCode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `regDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `regTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `adminPassword` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `adminName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `adminLevel` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `adminUsername` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminPassword`, `adminName`, `adminLevel`, `adminUsername`) VALUES
('1', '7cb8cff65e6c4c950e0596f3f88ffe822dfa0bafb879d3344c0135e7bbb5e3e12f600696d5fff21cf1a34fe2e137b1cc3f5801c69c979a2dec55f03aeffc23d3', 'رسول بهمنی', '2', '5'),
('20190901124120140908', '9544837ec932c2d5e0c825af14d407d4aa4965a3e21f0e0bc12b91bbf68dfcf86c539cc2527e4abe8a64bbcbe9500b04f2924fce8cc9fa09ef784dd69df1606a', 'نیما', '1', 'مرادی'),
('20190905202757422799', '4338f60e2da6085a4a7da4c61e9f70f4090ec0a8389d6997db8bbec143b3a43a00486528c0686cc02d1b9ae30564b24f6a921db21ba7396a358a4b266edd5356', 'rasool', '1', 'rt');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brandId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `brand` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `brregTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `brregDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `brandAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brand`, `brregTime`, `brregDate`, `brandAdminId`) VALUES
('20190905203043899592', 'برند1', '20:30:43', '2019/09/05', '1'),
('20190905152606215979', 'سامسونگ', '15:26:06', '2019/09/05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `catName` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `catRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `catRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `catAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `catImg` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`, `catRegDate`, `catRegTime`, `catAdminId`, `catImg`) VALUES
('20190905152511196746', 'لوازم دیجیتال', '2019/09/05', '15:25:11', '1', 'NHwXfuFRJK6dEF2k1GCI'),
('20190905195402627758', 'لباس زنانه', '2019/09/05', '19:54:02', '1', 'DSqMI386cytbrn7jSFN1'),
('20190905195423045720', 'لباس بچگانه', '2019/09/05', '19:54:23', '1', 'YxQILWKfOUFSUq5zRh2p'),
('20190905202848018755', 'لوازم خانگی', '2019/09/05', '20:28:48', '1', 'iCOEXIt4VDdcRMEFJfaM');

-- --------------------------------------------------------

--
-- Table structure for table `categorynews`
--

DROP TABLE IF EXISTS `categorynews`;
CREATE TABLE IF NOT EXISTS `categorynews` (
  `catNewsId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `catNewsName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `catNewsRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `catNewsRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `catNewsAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`catNewsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categorynews`
--

INSERT INTO `categorynews` (`catNewsId`, `catNewsName`, `catNewsRegDate`, `catNewsRegTime`, `catNewsAdminId`) VALUES
('20190905195229811041', 'one', '2019/09/05', '19:52:29', '1'),
('20190905204847722433', 'دسته یک', '2019/09/05', '20:48:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `cityId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cityName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `cityProvinceId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`cityId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `colorId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `colorName` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `colorAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `colorRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `colorRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`colorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorId`, `colorName`, `colorAdminId`, `colorRegDate`, `colorRegTime`) VALUES
('20190905152650888422', '#8080ff', '1', '2019/09/05', '15:26:50'),
('20190905152656283312', '#00ff00', '1', '2019/09/05', '15:26:56'),
('20190905152702364649', '#400040', '1', '2019/09/05', '15:27:02'),
('20190905203454956816', '#ff8040', '1', '2019/09/05', '20:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `commentText` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `commentUserId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `commentRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `commentRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `commentAdminIdAccepted` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `commentProductId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cosiproduct`
--

DROP TABLE IF EXISTS `cosiproduct`;
CREATE TABLE IF NOT EXISTS `cosiproduct` (
  `cosiPrId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrProductId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrColorId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrSizeId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrPrice` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrCount` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `cosiPrAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`cosiPrId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cosiproduct`
--

INSERT INTO `cosiproduct` (`cosiPrId`, `cosiPrProductId`, `cosiPrColorId`, `cosiPrSizeId`, `cosiPrPrice`, `cosiPrCount`, `cosiPrRegTime`, `cosiPrRegDate`, `cosiPrAdminId`) VALUES
('20190924130053368523', '20190905203327745478', '20190905152656283312', '20190905152539970896', '1', '1', '13:00:53', '2019/09/24', '1'),
('20190924130239380093', '20190905203327745478', '20190905203454956816', '20190905152539970896', '55', '4', '13:02:39', '2019/09/24', '1'),
('20190924131316479639', '20190905203327745478', '20190905152702364649', '20190905203157918130', '123', '9', '13:13:16', '2019/09/24', '1'),
('20190924143904550935', '20190905203327745478', '20190905152650888422', '20190905203157918130', '95', '5', '14:39:04', '2019/09/24', '1'),
('20190925105841140037', '20190924151037944385', '20190905152702364649', '20190905152539970896', '635', '5', '10:58:41', '2019/09/25', '1'),
('20190926111903968360', '20190926111849670265', '20190905152650888422', '20190905152539970896', '4', '2', '11:19:03', '2019/09/26', '1'),
('20190926111914222589', '20190926111849670265', '20190905152650888422', '20190905203157918130', '1', '2', '11:19:14', '2019/09/26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

DROP TABLE IF EXISTS `factor`;
CREATE TABLE IF NOT EXISTS `factor` (
  `facId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `shbId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `prId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `count` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

DROP TABLE IF EXISTS `festival`;
CREATE TABLE IF NOT EXISTS `festival` (
  `festivalId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `festivalName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `festivalRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `festivalRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `festivalOfferPercentage` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `festivalImg` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `onOff` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`festivalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`festivalId`, `festivalName`, `festivalRegDate`, `festivalRegTime`, `festivalOfferPercentage`, `festivalImg`, `title`, `status`, `onOff`) VALUES
('20190926125618751836', 'bfdbdf', '2019/09/26', '12:56:18', '20', 'io91GmKFe8nFBhlu4ipV', 'bfghfg', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `festivalproduct`
--

DROP TABLE IF EXISTS `festivalproduct`;
CREATE TABLE IF NOT EXISTS `festivalproduct` (
  `fePrId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `fePrProductId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `fePrRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `fePrRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `fePrAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `fePrFestivalId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`fePrId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `festivalproduct`
--

INSERT INTO `festivalproduct` (`fePrId`, `fePrProductId`, `fePrRegDate`, `fePrRegTime`, `fePrAdminId`, `fePrFestivalId`) VALUES
('20190905205738634460', '20190905203327745478', '2019/09/05', '20:57:38', '1', '20190905205524395301');

-- --------------------------------------------------------

--
-- Table structure for table `footermenu`
--

DROP TABLE IF EXISTS `footermenu`;
CREATE TABLE IF NOT EXISTS `footermenu` (
  `footerMenuId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `footerMenuName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `footerMenuRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `footerMenuRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `footerMenuSort` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `footerMenuContentId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`footerMenuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `galleryImg` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `galleryRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `galleryRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `galleryStatus` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `galleryAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `galleryPrId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`galleryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryId`, `galleryImg`, `galleryRegDate`, `galleryRegTime`, `galleryStatus`, `galleryAdminId`, `galleryPrId`) VALUES
('20190905153229674182', 's7YcFE8PPT8s4XAz1pRJ', '2019/09/05', '15:32:29', '1', '1', '20190905152640229397'),
('20190925161550314674', 'V6c3CrmYlPHNJkVmou4D', '2019/09/25', '16:15:50', '1', '1', '20190925120718483056'),
('20190925234801864635', 'H1kN2YYa10vrbfYs7nAs', '2019/09/25', '23:48:01', '0', '1', '20190925234736563947'),
('20190926120611417967', 'UpnxUmA08XK35S0gKnxu', '2019/09/26', '12:06:11', '1', '1', '20190925234736563947'),
('20190926120726150941', 'zUFaCpiV5If15HwsicDL', '2019/09/26', '12:07:26', '1', '1', '20190926111849670265'),
('20190926121558753130', 'mmaoVI77sujn0sKcGWwu', '2019/09/26', '12:15:58', '0', '1', '20190925234736563947');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `newsId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `newsTitle` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `newsText` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `newsRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `newsRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `newsCatNewsId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `newsImg` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `newsTitle`, `newsText`, `newsRegDate`, `newsRegTime`, `newsCatNewsId`, `newsImg`) VALUES
('20190924132821668747', 'sss', 'ssss', '2019/09/24', '13:28:21', '20190905204847722433', 'wQHYGQh4fVpL3NQVmNyf');

-- --------------------------------------------------------

--
-- Table structure for table `offercode`
--

DROP TABLE IF EXISTS `offercode`;
CREATE TABLE IF NOT EXISTS `offercode` (
  `OCid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `OCCode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `OCRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `OCRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `OCCount` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `OCAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `OCPercentage` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `OCendDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`OCid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `offercode`
--

INSERT INTO `offercode` (`OCid`, `OCCode`, `OCRegDate`, `OCRegTime`, `OCCount`, `OCAdminId`, `OCPercentage`, `OCendDate`) VALUES
('20190905205234730322', 'dadada', '2019/09/05', '20:52:34', '2', '1', '10', ''),
('20190918151255942954', '38542853', '2019/09/18', '15:12:55', '5', '1', '10', '2020-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `productPrice` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `productName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `productRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `productRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `productAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `productSubCatid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Description` longtext COLLATE utf8_persian_ci NOT NULL,
  `offer` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `productBrandId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `guarantee` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `productCode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productPrice`, `productName`, `productRegDate`, `productRegTime`, `productAdminId`, `productSubCatid`, `Description`, `offer`, `productBrandId`, `guarantee`, `productCode`) VALUES
('20190925234736563947', '20255555', 'dd', '2019/09/25', '23:47:36', '1', '20190905152522693461', 'jdsijf', '10', '20190905203043899592', 'fr', '222'),
('20190926111849670265', 'قق', 'قق', '2019/09/26', '11:18:49', '1', '20190905152522693461', 'قق', '20', '20190905203043899592', 'یی', 'یی');

-- --------------------------------------------------------

--
-- Table structure for table `productproperties`
--

DROP TABLE IF EXISTS `productproperties`;
CREATE TABLE IF NOT EXISTS `productproperties` (
  `prPrId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `prPrPropertiesId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `prPrValue` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `prPrRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `prPrRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `proId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`prPrId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `productproperties`
--

INSERT INTO `productproperties` (`prPrId`, `prPrPropertiesId`, `prPrValue`, `prPrRegDate`, `prPrRegTime`, `proId`) VALUES
('20190905211322270868', '20190905211242953066', '2', '2019/09/05', '21:13:22', '20190905152640229397'),
('20190924144757973172', '20190924144745781372', '2', '2019/09/24', '14:47:57', '20190905152640229397'),
('20190925115614794897', '20190924151227679446', '5', '2019/09/25', '11:56:14', '20190924151037944385'),
('20190925115804163109', '20190924150536490886', '6', '2019/09/25', '11:58:04', '20190905152640229397');

-- --------------------------------------------------------

--
-- Table structure for table `productshb`
--

DROP TABLE IF EXISTS `productshb`;
CREATE TABLE IF NOT EXISTS `productshb` (
  `PSHBid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `PSHBPrId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `PSHBCount` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `PSHBRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `PSHBRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `PSHBLastPrice` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `PSHBSHBId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`PSHBid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `productshb`
--

INSERT INTO `productshb` (`PSHBid`, `PSHBPrId`, `PSHBCount`, `PSHBRegDate`, `PSHBRegTime`, `PSHBLastPrice`, `PSHBSHBId`) VALUES
('20190905201027560649', '20190905152640229397', '9', '2019/09/05', '20:10:27', '0', '20190905201027567978');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `proId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `proName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `proRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `proRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `prSubCatid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`proId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`proId`, `proName`, `proRegDate`, `proRegTime`, `prSubCatid`) VALUES
('20190901125547615237', 'ram256 ssd', '2019/09/01', '12:55:47', '20190827142619867815'),
('20190905211242953066', 'ram', '2019/09/05', '21:12:42', '20190905152522693461'),
('20190924144745781372', 'io', '2019/09/24', '14:47:45', '20190905152522693461'),
('20190924150536490886', 'jhilk', '2019/09/24', '15:05:36', '20190905152522693461'),
('20190924151227679446', 'bjl', '2019/09/24', '15:12:27', '20190905195441483187');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `provinceId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `provinceName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`provinceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceId`, `provinceName`) VALUES
('20190905210008099630', 'تهران');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbasket`
--

DROP TABLE IF EXISTS `shoppingbasket`;
CREATE TABLE IF NOT EXISTS `shoppingbasket` (
  `SHBid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `SHBUserId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `SHBModel` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `SHBRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `SHBRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `SHBPay` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `SHBGuest` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`SHBid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `shoppingbasket`
--

INSERT INTO `shoppingbasket` (`SHBid`, `SHBUserId`, `SHBModel`, `SHBRegDate`, `SHBRegTime`, `SHBPay`, `SHBGuest`) VALUES
('20190905160539922144', '', '0', '2019/09/05', '16:05:39', '0', '20190905155833852035'),
('20190905201027567978', '', '0', '2019/09/05', '20:10:27', '0', '20190905201027554974');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `sizeId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sizeName` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `sizeAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sizeRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `sizeRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`sizeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeId`, `sizeName`, `sizeAdminId`, `sizeRegDate`, `sizeRegTime`) VALUES
('20190905203124089598', 'xxxl', '1', '2019/09/05', '20:31:24'),
('20190905152539970896', 'xl', '1', '2019/09/05', '15:25:39'),
('20190905203157918130', 'پنج تا شش سال', '1', '2019/09/05', '20:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `sliderId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sliderName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderImg` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sliderRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `sliderRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `sliderLinkId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sliderLinkModel` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`sliderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderId`, `sliderName`, `sliderImg`, `sliderRegDate`, `sliderRegTime`, `sliderLinkId`, `sliderLinkModel`, `status`) VALUES
('20190905195329143510', 'two', 'iIl2ePiEin1n6HvR0egZ', '2019/09/05', '19:53:29', '20190905195244290547', '2', '1'),
('20190905210208373999', 'نام اسلایدر', '95zZWunRZk2SfDfigNBe', '2019/09/05', '21:02:08', '20190905195244290547', '2', '0'),
('20190925224031226820', 'd', 'HNYoYNzm7cnzPZkDkWBG', '2019/09/25', '22:40:31', '20190905195612319904', '1', '1'),
('20190925231834680783', '4ik', 'rmJ3nTyH3x3oHfH0V09l', '2019/09/25', '23:18:34', '20190924132821668747', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `specialoffer`
--

DROP TABLE IF EXISTS `specialoffer`;
CREATE TABLE IF NOT EXISTS `specialoffer` (
  `specialOfferid` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferProductId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferPercentage` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `specialOfferExpireDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`specialOfferid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `specialoffer`
--

INSERT INTO `specialoffer` (`specialOfferid`, `specialOfferProductId`, `specialOfferPercentage`, `specialOfferAdminId`, `specialOfferRegDate`, `specialOfferRegTime`, `specialOfferExpireDate`) VALUES
('20190905210518566769', '20190905152640229397', '50', '1', '2019/09/05', '21:05:18', '2220-02-01'),
('20190925161413532458', '20190925120718483056', '6', '1', '2019/09/25', '16:14:13', '3535-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `subName` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `subCatId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `subRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `subRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `subAdminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`subId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subId`, `subName`, `subCatId`, `subRegDate`, `subRegTime`, `subAdminId`) VALUES
('20190827143635812478', 'لوازم ورزشی  پسرانه', '20190827140256886437', '2019/08/27', '14:36:35', '1'),
('20190827143643078876', 'لوازم ورزشی  دخترانه', '20190827140256886437', '2019/08/27', '14:36:43', '1'),
('20190827160723494611', 'کمپینگ', '20190827140256886437', '2019/08/27', '16:07:23', '1'),
('20190827160752478604', 'کفش ورزشی پسرانه ', '20190827140256886437', '2019/08/27', '16:07:52', '1'),
('20190827160759580346', 'کفش ورزشی دخترانه', '20190827140256886437', '2019/08/27', '16:07:59', '1'),
('20190827160813588214', 'کفش  فوتبالی', '20190827140256886437', '2019/08/27', '16:08:13', '1'),
('20190827160821056359', 'کفش  سالنی', '20190827140256886437', '2019/08/27', '16:08:21', '1'),
('20190827160836238666', 'ساک ورزشی ', '20190827140256886437', '2019/08/27', '16:08:36', '1'),
('20190827160841623517', 'چشم بند', '20190827140256886437', '2019/08/27', '16:08:41', '1'),
('20190901124239484408', 'موبایل', '20190827122857668946', '2019/09/01', '12:42:39', '1'),
('20190905152522693461', 'لپ تاپ', '20190905152511196746', '2019/09/05', '15:25:22', '1'),
('20190905195431935431', 'مانتو', '20190905195402627758', '2019/09/05', '19:54:31', '1'),
('20190905195441483187', 'تاپ', '20190905195402627758', '2019/09/05', '19:54:41', '1'),
('20190905202951872617', 'تلویزیون', '20190905202848018755', '2019/09/05', '20:29:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `userName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `userRegDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `userRegTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `userEmail` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `userPhonenumber` varchar(14) COLLATE utf8_persian_ci NOT NULL,
  `userPassword` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
