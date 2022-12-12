-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 11:15 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
