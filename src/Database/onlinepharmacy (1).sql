-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 09:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinepharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` bigint(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pasword` varchar(500) NOT NULL,
  `is_user` tinyint(1) NOT NULL,
  `is_pharmacy` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `pasword`, `is_user`, `is_pharmacy`, `is_admin`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'chala', 'binarybeast@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 0, 0, 0, NULL, NULL),
(2, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, 1, 0, 0, '2022-05-15 16:50:20', '2022-05-15 16:50:20'),
(3, 'chalapharma', 'chalapharma@gmail.com', '54919ea0470e2568054fdf92b5b09a08', 0, 1, 0, 0, 0, '2022-05-17 16:44:18', '2022-05-17 16:44:18'),
(4, 'chalaa', 'chalaa@gmail.com', 'a42f4f673b8ca7e67f037065a18623fe', 1, 0, 0, 1, 0, '2022-05-17 16:45:28', '2022-05-17 16:45:28'),
(5, 'kuma', 'kuma@gmail.com', '8c9d806c6d2e80e87b60e1e860042303', 0, 1, 0, 0, 0, '2022-05-19 15:25:39', '2022-05-19 15:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_Id` bigint(10) NOT NULL,
  `acc_id` bigint(10) DEFAULT NULL,
  `F_name` varchar(100) NOT NULL,
  `M_name` varchar(100) NOT NULL,
  `L_name` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(10) NOT NULL,
  `user_id` bigint(10) DEFAULT NULL,
  `pharmacy_id` bigint(10) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id` bigint(10) NOT NULL,
  `chat_id` bigint(10) DEFAULT NULL,
  `Sender_id` bigint(10) DEFAULT NULL,
  `reciver_id` bigint(10) DEFAULT NULL,
  `message` bigint(10) DEFAULT NULL,
  `prev_message` bigint(10) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug_img`
--

CREATE TABLE `drug_img` (
  `id` bigint(10) NOT NULL,
  `drug_id` bigint(10) DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug_info`
--

CREATE TABLE `drug_info` (
  `id` bigint(10) NOT NULL,
  `pharmacy_id` bigint(10) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `manufacture_date` datetime DEFAULT NULL,
  `form` varchar(250) NOT NULL,
  `strength` varchar(250) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `is_avilable` tinyint(1) NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(10) NOT NULL,
  `user_id` bigint(10) DEFAULT NULL,
  `drug_id` bigint(10) DEFAULT NULL,
  `pharmacy_id` bigint(10) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_contact`
--

CREATE TABLE `pharmacy_contact` (
  `id` bigint(10) NOT NULL,
  `pharmacy_id` bigint(10) DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `telegram` varchar(500) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_info`
--

CREATE TABLE `pharmacy_info` (
  `id` bigint(10) NOT NULL,
  `acc_id` bigint(10) DEFAULT NULL,
  `Pharmacy_Name` varchar(50) DEFAULT NULL,
  `Loocation` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL,
  `Updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy_info`
--

INSERT INTO `pharmacy_info` (`id`, `acc_id`, `Pharmacy_Name`, `Loocation`, `phone`, `is_deleted`, `Created_at`, `Updated_at`) VALUES
(4, 5, 'Kumaa Pharma', 'Adama', '092714073145', 0, '2022-05-19 18:44:24', '2022-05-19 18:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(10) NOT NULL,
  `acc_id` bigint(10) DEFAULT NULL,
  `F_name` varchar(100) NOT NULL,
  `M_name` varchar(100) NOT NULL,
  `L_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pharmacy_id` (`pharmacy_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `drug_img`
--
ALTER TABLE `drug_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_id` (`drug_id`);

--
-- Indexes for table `drug_info`
--
ALTER TABLE `drug_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy_id` (`pharmacy_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `drug_id` (`drug_id`),
  ADD KEY `pharmacy_id` (`pharmacy_id`);

--
-- Indexes for table `pharmacy_contact`
--
ALTER TABLE `pharmacy_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy_id` (`pharmacy_id`);

--
-- Indexes for table `pharmacy_info`
--
ALTER TABLE `pharmacy_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `User_Id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_img`
--
ALTER TABLE `drug_img`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_info`
--
ALTER TABLE `drug_info`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy_contact`
--
ALTER TABLE `pharmacy_contact`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy_info`
--
ALTER TABLE `pharmacy_info`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacy_info` (`id`);

--
-- Constraints for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD CONSTRAINT `chat_message_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`);

--
-- Constraints for table `drug_img`
--
ALTER TABLE `drug_img`
  ADD CONSTRAINT `drug_img_ibfk_1` FOREIGN KEY (`drug_id`) REFERENCES `drug_info` (`id`);

--
-- Constraints for table `drug_info`
--
ALTER TABLE `drug_info`
  ADD CONSTRAINT `drug_info_ibfk_1` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacy_info` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drug_info` (`id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacy_info` (`id`);

--
-- Constraints for table `pharmacy_contact`
--
ALTER TABLE `pharmacy_contact`
  ADD CONSTRAINT `pharmacy_contact_ibfk_1` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacy_info` (`id`);

--
-- Constraints for table `pharmacy_info`
--
ALTER TABLE `pharmacy_info`
  ADD CONSTRAINT `pharmacy_info_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
