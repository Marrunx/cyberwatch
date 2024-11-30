-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 02:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uidlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `custuid_tbl`
--

CREATE TABLE `custuid_tbl` (
  `ID` int(255) NOT NULL,
  `UID` int(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custuid_tbl`
--

INSERT INTO `custuid_tbl` (`ID`, `UID`, `Date`, `Time`) VALUES
(1, 111222, '2024-10-08', '10:36:09'),
(2, 555666, '2024-10-08', '13:03:03'),
(3, 999111, '2024-10-08', '13:49:21'),
(4, 555666, '2024-10-08', '13:52:20'),
(5, 555555, '2024-10-08', '13:59:03'),
(6, 123123, '2024-10-08', '14:49:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custuid_tbl`
--
ALTER TABLE `custuid_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custuid_tbl`
--
ALTER TABLE `custuid_tbl`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
