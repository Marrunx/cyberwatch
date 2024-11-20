-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 02:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arduino`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerregister_tbl`
--

CREATE TABLE `customerregister_tbl` (
  `ID` int(11) NOT NULL,
  `UID` varchar(11) NOT NULL,
  `CardNumber` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `Amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerregister_tbl`
--

INSERT INTO `customerregister_tbl` (`ID`, `UID`, `CardNumber`, `Name`, `Birthday`, `Amount`) VALUES
(34, '12344', 2147483647, 'josh', 'oct 11 2000', 20),
(32, 'AC77A433', 2147483647, 'josh', 'oct 13 2002', 30),
(33, 'B7F64763', 2147483647, 'xxx_marlon_xxx', 'sept 10 2002', 40);

-- --------------------------------------------------------

--
-- Table structure for table `esp`
--

CREATE TABLE `esp` (
  `uid` varchar(20) NOT NULL,
  `bal` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esp`
--

INSERT INTO `esp` (`uid`, `bal`) VALUES
('1832467199', 10),
('AC 77 A4 33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_tbl`
--

CREATE TABLE `sale_tbl` (
  `id` int(20) NOT NULL,
  `uid` int(30) NOT NULL,
  `sales_bal` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(20) NOT NULL,
  `uid` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `balance` int(100) NOT NULL,
  `contact_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerregister_tbl`
--
ALTER TABLE `customerregister_tbl`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `esp`
--
ALTER TABLE `esp`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sale_tbl`
--
ALTER TABLE `sale_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerregister_tbl`
--
ALTER TABLE `customerregister_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sale_tbl`
--
ALTER TABLE `sale_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `sale_tbl` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
