-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 11:17 PM
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
-- Database: `ashpark_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `slots` varchar(20) DEFAULT NULL,
  `status` enum('Available','Unavailable') NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `check_in_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_out_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `slots`, `status`, `user_id`, `check_in_time`, `check_out_time`) VALUES
(1, 'PN001', 'Available', 1, '2024-03-17 21:40:30', '2024-03-17 21:40:30'),
(2, 'PN002', 'Unavailable', NULL, '2024-03-17 21:40:30', '2024-03-17 21:40:30'),
(3, 'PN003', 'Available', NULL, '2024-03-17 21:40:29', '2024-03-17 21:40:29'),
(4, 'PN004', 'Unavailable', NULL, '2024-03-17 21:40:27', '2024-03-17 21:40:27'),
(5, 'PN005', 'Available', NULL, '2024-03-17 21:40:25', '2024-03-17 21:40:25'),
(6, 'PN006', 'Available', NULL, '2024-03-17 21:40:23', '2024-03-17 21:40:23'),
(7, 'PN007', 'Available', NULL, '2024-03-17 21:40:22', '2024-03-17 21:40:22'),
(8, 'PN008', 'Available', NULL, '2024-03-17 21:40:21', '2024-03-17 21:40:21'),
(9, 'PN009', 'Available', NULL, '2024-03-17 21:40:20', '2024-03-17 21:40:20'),
(10, 'PN010', 'Available', NULL, '2024-03-17 21:40:19', '2024-03-17 21:40:19'),
(11, 'PN011', 'Available', NULL, '2024-03-17 21:40:17', '2024-03-17 21:40:17'),
(12, 'PN012', 'Available', NULL, '2024-03-17 21:40:16', '2024-03-17 21:40:16'),
(13, 'PN013', 'Available', NULL, '2024-03-17 21:40:15', '2024-03-17 21:40:15'),
(14, 'PN014', 'Available', NULL, '2024-03-17 21:40:14', '2024-03-17 21:40:14'),
(15, 'PN015', 'Available', NULL, '2024-03-17 21:40:13', '2024-03-17 21:40:13'),
(16, 'PN016', 'Unavailable', NULL, '2024-03-17 21:41:05', '2024-03-17 21:41:05'),
(17, 'PN017', 'Available', NULL, '2024-03-17 21:40:10', '2024-03-17 21:40:10'),
(18, 'PN018', 'Available', NULL, '2024-03-17 21:40:09', '2024-03-17 21:40:09'),
(19, 'PN019', 'Available', NULL, '2024-03-17 21:40:08', '2024-03-17 21:40:08'),
(20, 'PN020', 'Available', NULL, '2024-03-17 21:40:07', '2024-03-17 21:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `role_name`) VALUES
(1, 'student'),
(2, 'faculty'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_info`
--

CREATE TABLE `subscription_info` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `day_issued` date DEFAULT NULL,
  `day_expiration` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`plan_id`, `plan_name`, `price`) VALUES
(1, 'Daily plan', 15.00),
(2, 'Semester plan', 180.00),
(3, 'Yearly plan', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  `ID_number` varchar(20) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `firstname`, `lastname`, `roleid`, `ID_number`, `tel`, `email`, `password`, `plan_id`) VALUES
(1, 'Bowl', 'Soil', 1, '19922933', '8320891212', 'soil@gmail.com', '$2y$10$2f8rgOYwTipxHIuX6GSiQe.WGjX0gA/3vsx0XM.ZnKQJWx74IALdy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `subscription_info`
--
ALTER TABLE `subscription_info`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_info`
--
ALTER TABLE `subscription_info`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `subscription_info`
--
ALTER TABLE `subscription_info`
  ADD CONSTRAINT `subscription_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`),
  ADD CONSTRAINT `subscription_info_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`plan_id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `roles` (`roleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
