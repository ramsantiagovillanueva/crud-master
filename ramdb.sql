-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 06:39 AM
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
-- Database: `ramdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Cid` int(11) NOT NULL,
  `Cname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Ccontact` varchar(255) COLLATE utf8_bin NOT NULL,
  `Caddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `CdateAdded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Cid`, `Cname`, `Ccontact`, `Caddress`, `CdateAdded`) VALUES
(1, 'ramjed', '2135181', 'mabolo', 9092019),
(2, 'johncena', '245464651', 'cebu', 9092019);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL,
  `Ono` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Oquantity` int(11) NOT NULL,
  `Odate` int(11) NOT NULL,
  `Uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `Ono`, `Pid`, `Cid`, `Oquantity`, `Odate`, `Uid`) VALUES
(1, 1, 1, 1, 1, 9072019, 1),
(2, 2, 2, 2, 2, 9072019, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Pid` int(11) NOT NULL,
  `Pname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Pdesc` varchar(255) COLLATE utf8_bin NOT NULL,
  `Pprice` float NOT NULL,
  `Pstock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Pid`, `Pname`, `Pdesc`, `Pprice`, `Pstock`) VALUES
(1, 'Speaker', 'bluetooth', 500, 150),
(2, 'HD monitor', 'smart tv', 21000, 5),
(3, 'monitor', '', 3500, 5),
(4, 'Laptop', '', 25000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uid` int(11) NOT NULL,
  `Uusername` varchar(255) COLLATE utf8_bin NOT NULL,
  `Upassword` varchar(255) COLLATE utf8_bin NOT NULL,
  `UdateAdded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `Uusername`, `Upassword`, `UdateAdded`) VALUES
(1, 'ramjed', '123', 9092019),
(2, 'johndoy', '123', 9092019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
