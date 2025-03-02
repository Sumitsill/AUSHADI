-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 06:48 PM
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
-- Database: `herbalplant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `serial` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`serial`, `name`, `speciality`, `fee`, `location`, `phone`, `image`) VALUES
(1, 'Priya Sharma', 'Ayurvedic Specialist', '800', 'Kolkata', '+91 98765 43210', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
(2, 'Rajesh Patel', 'Homeopathy Expert', '600', 'Kalyani', '+91 87654 32109', 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
(3, 'Anjali Gupta', 'Naturopathy Practitioner', '750', 'Kharagpur', '+91 76543 21098', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
(4, 'Sunil Verma', 'Herbal Medicine Specialist', '900', 'Howrah', '+91 65432 10987', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `serial` bigint(20) UNSIGNED NOT NULL,
  `hindi_name` varchar(100) NOT NULL,
  `eng_name` varchar(100) NOT NULL,
  `botanical_name` varchar(100) NOT NULL,
  `uses` varchar(1000) NOT NULL,
  `purchase_link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `hindi_name`, `eng_name`, `botanical_name`, `uses`, `purchase_link`) VALUES
(1, 'ashgandh', 'winter cherry', 'withania somnifera dunal', 'stress tolerance, immunity, joint pains, skin health', 'https://www.patanjaliayurved.net/product/ayurvedic-medicine/churna/divya-ashwagandha-churna/21'),
(2, 'ashok', 'sorrowless tree', 'saraca indica', 'menstrual irregularities, uterine stimulant', 'https://www.baidyanath.co.in/ashokarishta-pd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `serial` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `signup_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`serial`, `full_name`, `username`, `email`, `password`, `signup_time`) VALUES
(1, 'aa', 'aa', 's@s', 'a0f1490a20d0211c997b44bc357e1972deab8ae3', '2025-02-27 20:07:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD UNIQUE KEY `serial` (`serial`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `serial` (`serial`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `serial` (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `serial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `serial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `serial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
