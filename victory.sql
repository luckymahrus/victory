-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 03:03 AM
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
  `role` enum('admin','manager','sales') NOT NULL,
  `address` text,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `username`, `password`, `role`, `address`, `email`, `phone`, `photo`, `outlet_id`) VALUES
(1, 'admin', 'admin', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'admin', NULL, 'admin@k-signature.xyz', '081316878995', '', 0),
(2, 'Vano', 'kemenangan', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', '', 1),
(3, 'Felita', 'asia', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', '', 2),
(7, 'Reyner', 'gethassee', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'manager', NULL, '', '', NULL, 4),
(8, 'Josua Reynaldo', 'jos', '909d0a3efbb2c0d7c5bd869a1c4089cc81105ddbf9fb9cda08d0dda36ee376954edc71e822f187b68205805473f6974dea64a46fc106376221de5e5a77c49d0a', 'sales', 'GGL', '', '08132148129', 'uploads/photo/sales/jos//sales-Jos.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` char(1) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `type_id`) VALUES
(1, 'Cincin', 'C', 1),
(2, 'Kalung', 'K', 2),
(3, 'Kalung MK', 'K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`, `count`) VALUES
(1, 'KMK1', 4),
(2, 'KMC1', 3),
(3, 'KMK2', 2),
(4, 'KMMUT', 6),
(5, 'ASC1', 2),
(6, 'ASMUT', 5);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `primary_color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `primary_color`) VALUES
(1, '#7d93b3');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `value`, `last_update`) VALUES
(1, 'Dollar', 13000, '2016-11-29 02:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `currency_history`
--

CREATE TABLE `currency_history` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_history`
--

INSERT INTO `currency_history` (`id`, `currency_id`, `value`, `date`) VALUES
(1, 1, 13000, '2016-11-29 02:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `type` enum('Member','Regular') NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `address`, `type`, `outlet_id`) VALUES
(3, 'Setyawan', '081316361519', 'setyawansusanto99@outlook.com', 'Apartemen Puri ParkView\r\n', 'Regular', 0),
(4, 'Felita', '081316361514', 'felita_31895@gmail.com', 'Gading Kirana', 'Member', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gold_amount`
--

CREATE TABLE `gold_amount` (
  `id` int(11) NOT NULL,
  `type` enum('K','P') NOT NULL,
  `original` double NOT NULL,
  `marked_up` double NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gold_amount`
--

INSERT INTO `gold_amount` (`id`, `type`, `original`, `marked_up`, `price`) VALUES
(1, 'K', 70, 80, 384000),
(2, 'P', 75, 75, 432000);

-- --------------------------------------------------------

--
-- Table structure for table `mutation`
--

CREATE TABLE `mutation` (
  `id` int(11) NOT NULL,
  `mutation_code` varchar(200) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `from_outlet` int(11) NOT NULL,
  `to_outlet` int(11) NOT NULL,
  `status` enum('Pending','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutation`
--

INSERT INTO `mutation` (`id`, `mutation_code`, `product_qty`, `date`, `from_outlet`, `to_outlet`, `status`) VALUES
(2, 'KMMUT00001', 2, '2016-12-14 11:12:25', 1, 2, 'Diterima'),
(4, 'KMMUT00003', 1, '2016-12-14 11:23:05', 1, 4, 'Pending'),
(7, 'ASMUT00002', 1, '2016-12-15 08:39:38', 2, 1, 'Pending'),
(8, 'KMMUT00004', 1, '2016-12-15 08:44:28', 1, 4, 'Pending'),
(9, 'KMMUT00005', 1, '2016-12-15 08:45:36', 1, 2, 'Diterima'),
(10, 'ASMUT00004', 2, '2016-12-15 17:34:12', 2, 1, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `mutation_product`
--

CREATE TABLE `mutation_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `mutation_code` varchar(200) NOT NULL,
  `status` enum('OK','Rusak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutation_product`
--

INSERT INTO `mutation_product` (`id`, `product_code`, `mutation_code`, `status`) VALUES
(1, 'KMK100001', 'KMMUT00001', 'OK'),
(2, 'KMC100001', 'KMMUT00001', 'OK'),
(3, 'KMK100002', 'KMMUT00001', 'OK'),
(4, 'KMC100002', 'KMMUT00003', 'OK'),
(7, 'ASC100001', 'ASMUT00002', 'OK'),
(8, 'KMK100003', 'KMMUT00004', 'OK'),
(9, 'KMK200001', 'KMMUT00005', 'OK'),
(10, 'KMK100001', 'ASMUT00004', 'OK'),
(11, 'KMK100002', 'ASMUT00004', 'OK');

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
(2, 'AS', 'Toko Asia', '081316283912', 'Cijantung', 'Felita', 30),
(4, 'HA', 'Hassee', '081316283912', 'Gading', 'Reyner', 70);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` enum('Emas','Berlian') NOT NULL,
  `category` varchar(30) NOT NULL,
  `real_weight` double NOT NULL,
  `rounded_weight` double NOT NULL,
  `purchase_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `buyback` int(11) NOT NULL,
  `gold_amount` int(11) NOT NULL,
  `tray_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `status` enum('available','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `name`, `type`, `category`, `real_weight`, `rounded_weight`, `purchase_price`, `selling_price`, `buyback`, `gold_amount`, `tray_id`, `photo`, `outlet_id`, `status`) VALUES
(2, 'KMK100001', 'Kalung MK Hello Kitty', 'Emas', 'Kalung MK', 2.67, 2.7, 0, 829440, 0, 1, 1, 'uploads/photo/product/1/KMK100001.jpg', 1, 'available'),
(3, 'KMK100002', 'Kalung MK Merah', 'Emas', 'Kalung MK', 2.89, 2.9, 0, 890880, 0, 1, 1, 'uploads/photo/product/1/KMK100002.jpg', 1, 'available'),
(4, 'KMK100003', 'Kalung MK', 'Emas', 'Kalung MK', 4.87, 4.9, 0, 1505280, 0, 1, 1, 'uploads/photo/product/1/KMK100003.jpg', 1, 'pending'),
(5, 'KMC100001', 'Cincin Emas Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 4, 'uploads/photo/product/2/KMC100001.jpg', 2, 'available'),
(6, 'KMC100002', 'Cincin Hello Kitty', 'Emas', 'Cincin', 2.33, 2.35, 0, 721920, 0, 1, 2, 'uploads/photo/product/2/KMC100002.jpg', 1, 'pending'),
(7, 'KMK200001', 'Kalung Elora', 'Berlian', 'Kalung', 5.21, 5.25, 0, 1701000, 0, 2, 5, 'uploads/photo/product/3/KMK200001.jpg', 2, 'available'),
(8, 'ASC100001', 'Cincin Kawin', 'Emas', 'Cincin', 1.36, 1.4, 0, 430080, 0, 1, 4, 'uploads/photo/product/4/ASC100001.jpg', 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tray`
--

CREATE TABLE `tray` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tray`
--

INSERT INTO `tray` (`id`, `code`, `outlet_id`, `name`, `category_id`) VALUES
(1, 'K1', 1, 'Baki Kalung', 3),
(2, 'C1', 1, 'Baki Cincin', 1),
(3, 'K2', 1, 'Kalung Berlian', 2),
(4, 'C1', 2, 'Cincin Emas', 1),
(5, 'K1', 2, 'Kalung Panjang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `code`) VALUES
(1, 'Emas', 'G'),
(2, 'Berlian', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_history`
--
ALTER TABLE `currency_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gold_amount`
--
ALTER TABLE `gold_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutation_product`
--
ALTER TABLE `mutation_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tray`
--
ALTER TABLE `tray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency_history`
--
ALTER TABLE `currency_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gold_amount`
--
ALTER TABLE `gold_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mutation`
--
ALTER TABLE `mutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mutation_product`
--
ALTER TABLE `mutation_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tray`
--
ALTER TABLE `tray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
