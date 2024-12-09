-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3311
-- Generation Time: Sep 26, 2023 at 05:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentist_clinic1`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(255) NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `schedule_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `appoint_date` date NOT NULL,
  `appoint_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `doctor_id`, `doctor_name`, `schedule_id`, `user_id`, `full_name`, `phone_number`, `email_id`, `city`, `appoint_date`, `appoint_time`, `status`) VALUES
(1, 1, 'ace', 2, 17, 'sejal shukla', 2147483647, 'sejalshukla985@gmail.com', 'Thane', '2023-09-26', '10:00 AM', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(100) NOT NULL,
  `user_id` int(105) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `expiration_date` varchar(255) NOT NULL,
  `cvv` int(213) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `user_id`, `card_number`, `expiration_date`, `cvv`) VALUES
(1, 16, '2147483647', '0000-00-00', 123),
(2, 16, '2147483647', '0000-00-00', 456),
(3, 17, '1212121212121212', '12/23', 123);

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `doc_id` int(255) NOT NULL,
  `full_name` varchar(28) DEFAULT NULL,
  `birthdate` int(34) DEFAULT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(58) DEFAULT NULL,
  `contact_number` int(28) DEFAULT NULL,
  `email` varchar(34) DEFAULT NULL,
  `degree` varchar(28) DEFAULT NULL,
  `doctor_speciality` varchar(28) DEFAULT NULL,
  `password` varchar(28) DEFAULT NULL,
  `confirm_password` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`doc_id`, `full_name`, `birthdate`, `Gender`, `Address`, `contact_number`, `email`, `degree`, `doctor_speciality`, `password`, `confirm_password`) VALUES
(1, 'ace', 2001, 'male', 'ssada', 2147483647, 'aks@gmail.com', NULL, 'ew', '1', '1'),
(11, 'sejal shukla', 2010, 'male', 'luiswadi mishra chwal thane 04', 2147483647, 'sejalshukla985@gmail.com', 'MBBS', 'Daat tod', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(250) NOT NULL,
  `user_id` int(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(250) NOT NULL,
  `messages` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `user_id`, `email`, `name`, `messages`) VALUES
(1, 17, 'sejalshukla985@gmail.com', 'sejal shukla', 'qwqwwqq'),
(2, 17, 'sejalshukla985@gmail.com', 'as', 'asadsadas'),
(4, 17, 'sejalshukla985@gmail.com', 'sejal shukla', 'dfdfdsfdfsf');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Doctor_name` varchar(255) DEFAULT NULL,
  `schedule_id` int(255) NOT NULL,
  `d_id` int(255) NOT NULL,
  `d_date` date NOT NULL,
  `d_start_time` varchar(255) DEFAULT NULL,
  `d_end_time` varchar(255) DEFAULT NULL,
  `d_consult_time` varchar(255) DEFAULT NULL,
  `availability` varchar(255) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Doctor_name`, `schedule_id`, `d_id`, `d_date`, `d_start_time`, `d_end_time`, `d_consult_time`, `availability`) VALUES
('ace', 2, 1, '2023-09-26', '08:00 AM', '04:00 PM', '25', 'yes'),
('sejal shukla', 3, 11, '2023-09-27', '08:00 AM', '04:00 PM', '30', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(255) NOT NULL,
  `user_id` int(111) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `payment_method` varchar(231) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'approved',
  `placed_on` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `user_id`, `service_name`, `patient_name`, `price`, `timing`, `service_date`, `payment_method`, `status`, `placed_on`, `address`, `city`, `pincode`) VALUES
(3, 17, 'cleaning and exam', 'sejal shukla', 1000, '10:00 AM - 11:00 AM', '2023-09-27', 'Credit Card', 'approved', '2023-09-26 21:25:58', 'luiswadi mishra chwal thane 04', 'Thane', 122323);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  `id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_address` varchar(40) NOT NULL,
  `user_number` varchar(30) NOT NULL,
  `u_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_type`, `id`, `user_name`, `user_email`, `user_address`, `user_number`, `u_password`) VALUES
('user', 13, 'sejal', 'sejal@gmail.com', 'hhh', '456789123', 'shu@12'),
('admin', 15, 'sas', 'sss12@gmail.com', 'ggg', '123456789', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `doc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
