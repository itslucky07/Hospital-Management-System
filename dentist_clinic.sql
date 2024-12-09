-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 04, 2023 at 05:52 PM
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
-- Database: `dentist_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` int(28) DEFAULT NULL,
  `email_id` varchar(28) DEFAULT NULL,
  `city` varchar(58) DEFAULT NULL,
  `appoint_date` date NOT NULL,
  `appoint_time` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `user_id`, `full_name`, `phone_number`, `email_id`, `city`, `appoint_date`, `appoint_time`, `status`) VALUES
(1, 0, 'acex', 2147483647, 'a@gmail.com', 'mulund', '2023-09-28', '15:03 PM', 'accepted'),
(2, 0, 'acex', 2147483647, 'ba@gmail.com', 'thane', '2023-09-14', '03:08 PM', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `doc_id` int(11) NOT NULL,
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
(2, 'sejal shukla', 2023, 'male', 'ass', 1111256666, 'a@gmail.com', NULL, 'sdss', '1234', '1234'),
(3, 'ff', 2023, 'male', 'ddsds', 2147483647, 'sms@gmail.com', NULL, 'sdss', '3564', '3564'),
(4, 'skk', 2023, 'male', 'qqq', 324568, 'syy@gmail.com', NULL, 'dds', 'shukla', 'shukla'),
(5, 'anaaa', 2023, 'female', 'wwww', 22, 'anna@gmail.com', NULL, 'eee', 'hi', 'hi'),
(6, 'kkk', 2023, 'male', 'kk', 66, 'll@gmail.com', NULL, 'hh', '0000', '0000'),
(7, 'hhh', 2023, 'female', 'gg', 2147483647, 'aaaa@gmail.com', NULL, 'kkl', '888', '888'),
(9, 'ss', 2023, 'male', 'll', 8956, 'lra@gmail.com', NULL, NULL, '$2y$10$OXIGFw4wJVSaoAX.i8d19', NULL),
(10, 'asasasa', 2023, 'male', 'luiswadi mishra chwal thane 04', 2147483647, 'sejalshukla985@gmail.com', NULL, 'Daat tod', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `user_id`, `email`, `name`, `messages`) VALUES
(1, 6, 'a@gmail.com', 'sejal', 'sdpsdfdpfldspfl'),
(2, 6, 'a@gmail.com', 'sejal', ''),
(3, 6, 'a@gmail.com', 'sejal', ''),
(4, 6, 'a@gmail.com', 'sejal', 'ndndndjsksksncndsdkdskskcc'),
(5, 6, 'a@gmail.com', 'sejal', 'ssdsdfdsfdfdsfsd'),
(6, 6, 'a@gmail.com', 'sejal', 'ssdsdfdsfdfdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthdate` int(12) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` int(28) DEFAULT NULL,
  `email` varchar(28) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`first_name`, `last_name`, `birthdate`, `Gender`, `address`, `contact_number`, `email`, `profile_image`) VALUES
('kk', 'll', 2023, 'male', 'ii', 896532, 'l@gmail.com', NULL),
('hhh', 'loo', 2023, 'male', 'lloo', 63987, 'se@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Doctor_Name` varchar(100) NOT NULL,
  `d_id` int(58) NOT NULL,
  `d_date` date NOT NULL,
  `d_start_time` varchar(50) NOT NULL,
  `d_end_time` varchar(50) NOT NULL,
  `d_consult_time` int(5) NOT NULL,
  `d_sch_status` varchar(78) NOT NULL DEFAULT 'in progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Doctor_Name`, `d_id`, `d_date`, `d_start_time`, `d_end_time`, `d_consult_time`, `d_sch_status`) VALUES
('ananas', 0, '2023-09-06', '14:30', '15:27', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `full_name` varchar(28) DEFAULT NULL,
  `birthdate` int(58) DEFAULT NULL,
  `Address` varchar(28) DEFAULT NULL,
  `Gender` varchar(58) DEFAULT NULL,
  `email` varchar(28) DEFAULT NULL,
  `password` varchar(58) DEFAULT NULL,
  `confirm_password` varchar(28) DEFAULT NULL,
  `contact_number` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('user', 6, 'ab', 'ab@gmail.com', '123mnfnfffnf', '8998977927', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `contact_number` (`full_name`);

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
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
