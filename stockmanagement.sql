-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 10:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `productname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`) VALUES
(006, 'shirt'),
(007, 't-shirt'),
(008, 'jacket'),
(009, 'jumper'),
(011, 'shoes'),
(013, 'jordan');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `pid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`pid`, `date`, `quantity`, `unitprice`, `totalprice`) VALUES
(006, '2024-05-29', 10, 1000, 10000),
(007, '2024-05-29', 10, 900, 9000),
(008, '2024-05-29', 30, 7000, 210000),
(008, '2024-05-29', 100, 8000, 800000),
(006, '2024-05-30', 40, 900, 36000),
(008, '2024-05-30', 10, 3000, 30000),
(006, '2024-05-30', 2, 1000, 2000),
(009, '2024-05-30', 5, 6000, 30000),
(011, '2024-05-31', 40, 7000, 280000),
(011, '2024-05-31', 40, 7009, 280360),
(009, '2024-05-31', 40, 8900, 356000),
(006, '2024-05-31', 30, 1200, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `pid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`pid`, `date`, `quantity`, `unitprice`, `totalprice`) VALUES
(006, '2024-05-29', 2, 20, 40),
(008, '2024-05-29', 40, 10000, 400000),
(007, '2024-05-29', 4, 700, 2800),
(008, '2024-05-30', 10, 1400, 14000),
(006, '2024-05-30', 30, 333, 9990),
(006, '2024-05-30', 2, 2000, 4000),
(009, '2024-05-30', 1, 10000, 10000),
(011, '2024-05-31', 20, 7800, 156000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `useid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`useid`, `username`, `password`) VALUES
(1, 'egide', '12345678'),
(2, 'arry', '123'),
(3, 'kanamu', '123'),
(4, 'Nathan', '1'),
(5, 'ishfab', '12345'),
(6, 'pivot', '123456'),
(7, 'desire', '121212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`useid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `useid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stockin`
--
ALTER TABLE `stockin`
  ADD CONSTRAINT `stockin_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockout`
--
ALTER TABLE `stockout`
  ADD CONSTRAINT `stockout_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
