-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 09:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_resourses`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_table_form`
--

CREATE TABLE `hotel_table_form` (
  `Hid` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_table_form`
--

INSERT INTO `hotel_table_form` (`Hid`, `name`, `destination`, `address`, `phone_number`) VALUES
('H1', 'Pahan Lanka', 'Kandy', 'No.16,lake road,kandy', '0392232310'),
('H2', 'Queens', 'Ella', 'NO.02,station road,Ella', '0716677336'),
('H3', 'Manadara', 'Nittabuwa', 'No:10, Nittabuwa', '0312231450');

-- --------------------------------------------------------

--
-- Table structure for table `hotl_manager`
--

CREATE TABLE `hotl_manager` (
  `Manager_ID` varchar(15) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Hotel_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL CHECK (`Email` like '%_@_%._%')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotl_manager`
--

INSERT INTO `hotl_manager` (`Manager_ID`, `Name`, `Hotel_Name`, `Email`) VALUES
('HM01', 'Ravindu', 'ABC', 'ravindu@gmail.com'),
('HM02', 'Hasala Shehan', 'Pahan Lanka', 'hasala@gmail.com'),
('HM03', 'Amantha', 'ABC', 'amantha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `DOB` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pw` varchar(255) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staffmember_ID` varchar(15) NOT NULL,
  `S_Name` varchar(50) DEFAULT NULL,
  `Hotel_name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL CHECK (`Email` like '%_@_%._%')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staffmember_ID`, `S_Name`, `Hotel_name`, `Email`) VALUES
('S01', 'Dilshan', 'ABC', 'dilshan@gmail.com'),
('S02', 'nawod', 'Pahan Lanka', 'nawod@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(2, 'sathsara', 'ridmasathsara2@gmail.com', 'ed1cf14b786cf144393a5271c5c4d445', 'admin'),
(3, 'Tharusha', 'tharusha@gmail.com', '969fb11d48bd5ec660a285787ad615f9', 'user'),
(6, 'Gihan Ishara', 'gihanishara3@gmail.com', 'e577ddbfbf2ad0bc491a5b090ed2754b', 'admin'),
(7, 'kanishka', 'kanishka@gmail.com', '4599e9127fe462a9d4b90085e257cc83', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_table_form`
--

CREATE TABLE `vehicle_table_form` (
  `VNO` varchar(50) NOT NULL CHECK (`VNO` like 'V%'),
  `Vehicle_type` enum('Bike','Car','Van','3 Wheel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_table_form`
--

INSERT INTO `vehicle_table_form` (`VNO`, `Vehicle_type`) VALUES
('V01', 'Bike'),
('V02', 'Van'),
('V03', ''),
('V04', 'Car'),
('V05', ''),
('V06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel_table_form`
--
ALTER TABLE `hotel_table_form`
  ADD PRIMARY KEY (`Hid`);

--
-- Indexes for table `hotl_manager`
--
ALTER TABLE `hotl_manager`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staffmember_ID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
