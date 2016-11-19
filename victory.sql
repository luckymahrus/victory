-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 08:19 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','manager','sales','') NOT NULL,
  `address` text,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `username`, `password`, `role`, `address`, `email`, `phone`, `photo`, `outlet_id`) VALUES
(1, 'admin', 'admin', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'admin', NULL, 'admin@k-signature.xyz', '081316878995', '', 1),
(2, 'Vano', 'kemenangan', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', '', 1),
(3, 'Felita', 'asia', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `type` enum('Member','Regular','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `telephone`, `email`, `address`, `type`) VALUES
(3, 'Setyawan', '081316361519', 'setyawansusanto99@outlook.com', 'Apartemen Puri ParkView\r\n', 'Regular'),
(4, 'Felita', '081316361514', 'felita_31895@gmail.com', 'Gading Kirana', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` text,
  `store_manager` varchar(200) NOT NULL,
  `margin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `code`, `name`, `phone`, `address`, `store_manager`, `margin`) VALUES
(1, 'KM', 'Kemenangan', '081316283912', 'Cijantung', 'Vano', 20),
(2, 'AS', 'Toko Asia', '081316283912', 'Cijantung', 'Felita', 30);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
