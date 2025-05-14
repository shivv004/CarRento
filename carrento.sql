-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 08:47 PM
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
-- Database: `carrento`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_cars`
--

CREATE TABLE `booked_cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `num_of_days` int(11) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_cars`
--

INSERT INTO `booked_cars` (`id`, `user_id`, `car_id`, `num_of_days`, `start_date`) VALUES
(2, 15, 22, 17, '2028-08-20'),
(3, 15, 23, 17, '2027-06-28'),
(27, 12, 27, 11, '2024-06-13'),
(28, 12, 25, 3, '2024-04-18'),
(29, 12, 23, 18, '2024-06-17'),
(30, 12, 21, 9, '2025-04-17'),
(32, 15, 21, 8, '2024-10-16'),
(33, 15, 27, 15, '2026-08-16'),
(34, 15, 25, 12, '2024-10-17'),
(35, 12, 22, 15, '2025-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_number` varchar(30) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `rent_per_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `vehicle_model`, `vehicle_number`, `seating_capacity`, `rent_per_day`) VALUES
(20, 14, 'Chevrolet Tahoe', 'JKL202', 7, 8000),
(21, 14, 'BMW X5', 'MNO303', 5, 10000),
(22, 14, 'Volkswagen Golf', 'PQR404', 4, 2500),
(23, 14, 'Mercedes-Benz E-Class', 'STU505', 5, 12000),
(24, 13, 'Toyota Camry', 'ABC123', 5, 3500),
(25, 13, 'Honda Civic', 'XYZ456', 4, 3000),
(26, 13, 'Ford Mustang', 'DEF789', 2, 5500),
(27, 13, 'Nissan Altima', 'GHI101', 5, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `agencyName` varchar(100) NOT NULL,
  `isAgency` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `agencyName`, `isAgency`, `email`, `password`) VALUES
(12, 'Shiv Shankar', '', 0, 'shivshank019@gmail.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(13, 'John Doe', 'ABC Car Rentals', 1, 'john.doe@example.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(14, 'Sarah Lee', 'Ocean Drive Rentals', 1, 'sarah.lee@example.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13'),
(15, 'SK Singh', '', 0, 'shiv.singh1104@gmail.com', 'a3de1cb0b2e062608a7764f46eaa105ee0259e13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_cars`
--
ALTER TABLE `booked_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD CONSTRAINT `booked_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booked_cars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
