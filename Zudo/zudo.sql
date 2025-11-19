-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2025 at 06:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zudo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `userno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`userno`, `name`, `username`, `password`) VALUES
(1, 'Admin1', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product id` int(11) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product id` int(11) NOT NULL,
  `product name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` double(12,2) NOT NULL,
  `available size` varchar(30) NOT NULL,
  `product image` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `userno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product id`, `product name`, `category`, `price`, `available size`, `product image`, `status`, `userno`) VALUES
(1, 'Mens T Shirt', 'mens', 26.00, 's,m,l', 'mens1.jpg', 'in-stock', 1),
(2, 'Mens T Shirt', 'mens', 23.00, 's,m,xl', 'mens2.jpg', 'in-stock', 1),
(3, 'Girls Dress', 'girls', 18.00, 'm,l,xxl', 'girls-dresses3.jpg', 'out of stock', 1),
(4, 'Girls Dress', 'girls', 30.00, 's,m,l,xxl', 'girls-dresses1.jpg', 'in-stock', 1),
(5, 'Girls Bottom', 'girls', 30.00, 'm,l,xxl', 'gb4.jpg', 'out of stock', 1),
(6, 'Girls Bottom', 'girls', 26.20, 's,m', 'girls-bottom1.jpg', 'in-stock', 1),
(7, 'Girls Bottom', 'girls', 22.00, 's,m,xl', 'girls-bottom.jpg', 'in-stock', 1),
(8, 'Girls Bottom', 'girls', 23.00, 'm,l,xxl', 'girls-bottom3.jpg', 'out of stock', 1),
(9, 'Girls Bottom', 'girls', 23.00, 's,m,l', 'girls-bottom2.jpg', 'out of stock', 1),
(10, 'Mens T Shirt', 'mens', 26.00, 's,m,l,xxl', 'mens3.jpg', 'in-stock', 1),
(11, 'Mens T Shirt', 'mens', 30.00, 'm,l,xxl', 'mens4.jpg', 'out of stock', 1),
(12, 'Mens Printed Shirt', 'mens', 30.00, 's,m,xl', 'shirts.jpg', 'in-stock', 1),
(13, 'Mens Printed Shirt', 'mens', 26.00, 's,m', 'shirts1.jpg', 'out of stock', 1),
(14, 'Mens Printed Shirt', 'mens', 26.20, 'm,l,xxl', 'shirts2.jpg', 'in-stock', 1),
(15, 'Mens Printed Shirt', 'mens', 22.00, 's,m,l,xxl', 'shirts3.jpg', 'out of stock', 1),
(16, 'Mens Printed Shirt', 'mens', 26.20, 's,m,xl', 'shirts4.jpg', 'in-stock', 1),
(17, 'Womens dress', 'womens', 44.00, 's,m,l,xxl', 'dresses.jpg', 'in-stock', 1),
(18, 'Womens dress', 'womens', 45.00, 's,m,xl', 'dresses1.jpg', 'in-stock', 1),
(19, 'Womens dress', 'womens', 35.00, 's,m,l', 'dresses2.jpg', 'out of stock', 1),
(20, 'Womens dress', 'womens', 56.00, 's,m,l,xxl', 'dresses3.jpg', 'in-stock', 1),
(21, 'Womens dress', 'womens', 26.00, 's,m,l', 'dresses4.jpg', 'out of stock', 1),
(22, 'Boys Shirt', 'boys', 30.00, 's,m,xl', 'boys-top.jpg', 'in-stock', 1),
(23, 'Boys Shirt', 'boys', 23.00, 's,m,l,xxl', 'boys-top1.jpg', 'out of stock', 1),
(24, 'Boys Shirt', 'boys', 26.20, 's,m,xl', 'boys-top2.jpg', 'in-stock', 1),
(25, 'Boys Shirt', 'boys', 22.00, 's,m,l', 'boys-top3.jpg', 'in-stock', 1),
(26, 'Boys Shirt', 'boys', 26.00, 's,m', 'boys-top4.jpg', 'out of stock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userno`, `name`, `username`, `password`) VALUES
(1, 'Fidha Parvin', 'Fidha', 'da3eb44fdd403dd25c8b0795e0d334b5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`userno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `userno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
