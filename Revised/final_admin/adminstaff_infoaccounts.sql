-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 03:06 AM
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
-- Database: `adminstaff_infoaccounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstaff_tbl`
--

CREATE TABLE `adminstaff_tbl` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Birthday` date NOT NULL,
  `MobileNumber` varchar(11) NOT NULL,
  `TelNumber` varchar(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminstaff_tbl`
--

INSERT INTO `adminstaff_tbl` (`ID`, `Name`, `Address`, `Birthday`, `MobileNumber`, `TelNumber`, `Username`, `Password`) VALUES
(1, 'Sanatos, Jared  Albare ', 'B6 L23, Bloomfields Subdivision, Alapan St, Alapan 1-B, Imus City', '2003-03-10', '127', '127', 'JaredSantos', '$2y$10$HSOvvewfdJpiCgK600rTueDjsr4uwnNIYXWEXbny4uNIX6vBMhYYS'),
(2, 'Santos, Juan Carlos Albare ', 'B6 L23 , Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2003-03-10', '09684152794', '454-8941', 'juanCa', '$2y$10$2omjt2rgckrU8tIbowS7ROzmaxaRrinw.mr2aOlon3dH.v5a87lXO'),
(3, 'Santos, Carlo Albare ', 'B6 L23, Ayala Village, Roses St., San Isidro, Pasay City', '2003-11-22', '09684152794', '454-8941', 'carlosantos', '$2y$10$NOYixrFXdNddPBBq5yeBVO8umJ84/pLW/O3jaKAFMfRC3mU79sdx.'),
(4, 'Dela Cruz, Juan Reyes ', 'B1 L1, Greenwoods Subdivision, Gumamela St., San Isidro II, Taguig City', '2024-11-19', '09123456789', '123-4567', 'adminstaff123', '$2y$10$OP9VwGWkLSCRpKtXvvWAEO5MwRxsIiEDfo6kxSSYUEfSRqB6gs6..'),
(5, 'Dover, Ben Richard ', '123, Orchards Village, Waters St, Barangay 80, Pasay City', '2001-03-10', '09123456789', '123-4567', 'richard@123', '$2y$10$C7ZWErt7wgjcnlnYclTZK.k2go3IetzT1qCzo.qZl7uYUrbWGui3W'),
(6, 'Santos, Jared Dylan Albare ', 'B6 L23, Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2024-12-25', '09123345678', '123-4567', 'jaredsantos', '$2y$10$nwtK8V6MJXtj1i0yyM7R1OtS95Xyt2cXb8COGZSHppgf95ACIZq52'),
(7, 'Fraizer , Soren Kline ', '4118, Camella Homes Subdivision, Kahel St., Molino 4, Bacoor City', '2001-11-10', '09123456789', '123-4567', 'sorenfraizer', '$2y$10$TLAU0XG2roAkX.Y0iAEqle.Qfpqo8wmXHAOQkvMc8mTnpoAOahBQO'),
(8, 'Locke, John Jasper ', '114, , Howard St., Panapaan 4, Bacoor', '2001-11-19', '09123445678', '112-3456', 'jLocke', '$2y$10$4JF0EG/kDSt8gywV1eff8eUmnfrJwfSu0FTnZWEymVG4oCgLj367K'),
(9, 'Santos, Angela ', '61, Baguio Hills, 21st, Paanan , Baguio City', '2002-11-15', '09123456789', '123-4567', 'angela.santos', '$2y$10$h.YDkbVogcqOu03IBmfVFuVgRW9LlTjmuUM53iO6uWBG7/upAi86q'),
(10, 'Santos, Jared Dylan Albare', 'B5 L29, La Villa, Dandelions St., Molino 4, Bacoor City', '2003-03-10', '09684152794', '454-8941', 'jsantos', '$2y$10$RImuP3pNX/2WUVDWS/DU8eFmCsxE8iwY5Cks1EQRRIV42eUQ3P/NW'),
(12, 'Santos, Jared Dylan Albare', 'B1 L1, Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2003-03-10', '09684152794', '454-8945', 'jsantoss', '$2y$10$xpVUsCjdHsbf5NqCFjl9XO.8CGYh4axo0XEF.oFMtRZPDRjV5AWPS'),
(14, 'Santos, Jared Albare ', 'B6 L23 , Bloomfields Subdivision, , Alapan 1-B, , Cavite', '2003-03-10', '09668415279', '454-8941', 'newjared', '$2y$10$5GI3x3uQeVrSroY13T1i0ethVBZbXyKi750kvY6oxs1LxVNd0CbCO'),
(15, 'Santos, Jared Albare ', 'B6 L23 , Bloomfields Subdivision, , Alapan 1-B, , Cavite', '2003-03-10', '09668415279', '454-8941', 'newjared', '$2y$10$ZE3nY/VFqSpTGIOyeoBJyO7i0xZgPp6Ge59NQHPt0K4j/Yup4RJ7q'),
(16, 'Santos, Jared Albare ', '008, Dimasalang Subdivision, Advincula Rd, Toclong 1-A, Imus City, Cavite', '2000-11-29', '09684152794', '454-8941', 'jarednew', '$2y$10$y5FD6q7eV7VyBogWie6JfOU1ffF2IZ932ayzlTlrCpXyCRUXsk1OC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstaff_tbl`
--
ALTER TABLE `adminstaff_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminstaff_tbl`
--
ALTER TABLE `adminstaff_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
