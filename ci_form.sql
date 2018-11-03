-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 07:35 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `role` tinyint(4) DEFAULT '0',
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `address`, `role`, `shop_name`, `shop_address`) VALUES
(1, 'Pavel Parvej', 'pavel@admin.com', '202cb962ac59075b964b07152d234b70', 'Bangladesh', 'Mohakhali, Dhaka 1206', 1, '', ''),
(2, 'Rasel Munshi', 'rasel@example.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Bangladesh', 'Mohakhali DOHS, Dhaka 1206', 2, 'EasyStore', 'Banani, Dhaka'),
(3, 'SM Moni', 'moni@example.com', '202cb962ac59075b964b07152d234b70', 'Bangladesh', 'Mohakhali', 0, '', ''),
(5, 'dsfgdsfgf ', 'gsdgdsg', 'sgsgsdg', 'dgsdzfg', 'dfgfdgdfg', 0, NULL, NULL),
(6, 'Ahmmed Sujon', 'me@email.com', '202cb962ac59075b964b07152d234b70', 'Bangladesh', 'Dhaka', 0, '', ''),
(8, 'Ahsan Ullah', 'ahsan@example.com', '202cb962ac59075b964b07152d234b70', 'Bangladesh', 'Comilla', 2, 'BackShop', 'Comilla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
