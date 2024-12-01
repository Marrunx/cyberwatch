-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:32 AM
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
-- Database: `computerrental`
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
  `Password` varchar(255) NOT NULL,
  `Position` enum('Admin','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminstaff_tbl`
--

INSERT INTO `adminstaff_tbl` (`ID`, `Name`, `Address`, `Birthday`, `MobileNumber`, `TelNumber`, `Username`, `Password`, `Position`) VALUES
(1, 'Sanatos, Jared  Albare ', 'B6 L23, Bloomfields Subdivision, Alapan St, Alapan 1-B, Imus City', '2003-03-10', '127', '127', 'JaredSantos', '$2y$10$HSOvvewfdJpiCgK600rTueDjsr4uwnNIYXWEXbny4uNIX6vBMhYYS', 'Admin'),
(2, 'Santos, Juan Carlos Albare ', 'B6 L23 , Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2003-03-10', '09684152794', '454-8941', 'juanCa', '$2y$10$2omjt2rgckrU8tIbowS7ROzmaxaRrinw.mr2aOlon3dH.v5a87lXO', 'Admin'),
(3, 'Santos, Carlo Albare ', 'B6 L23, Ayala Village, Roses St., San Isidro, Pasay City', '2003-11-22', '09684152794', '454-8941', 'carlosantos', '$2y$10$NOYixrFXdNddPBBq5yeBVO8umJ84/pLW/O3jaKAFMfRC3mU79sdx.', 'Admin'),
(4, 'Dela Cruz, Juan Reyes ', 'B1 L1, Greenwoods Subdivision, Gumamela St., San Isidro II, Taguig City', '2024-11-19', '09123456789', '123-4567', 'adminstaff123', '$2y$10$OP9VwGWkLSCRpKtXvvWAEO5MwRxsIiEDfo6kxSSYUEfSRqB6gs6..', 'Admin'),
(5, 'Dover, Ben Richard ', '123, Orchards Village, Waters St, Barangay 80, Pasay City', '2001-03-10', '09123456789', '123-4567', 'richard@123', '$2y$10$C7ZWErt7wgjcnlnYclTZK.k2go3IetzT1qCzo.qZl7uYUrbWGui3W', 'Admin'),
(6, 'Santos, Jared Dylan Albare ', 'B6 L23, Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2024-12-25', '09123345678', '123-4567', 'jaredsantos', '$2y$10$nwtK8V6MJXtj1i0yyM7R1OtS95Xyt2cXb8COGZSHppgf95ACIZq52', 'Admin'),
(7, 'Fraizer , Soren Kline ', '4118, Camella Homes Subdivision, Kahel St., Molino 4, Bacoor City', '2001-11-10', '09123456789', '123-4567', 'sorenfraizer', '$2y$10$TLAU0XG2roAkX.Y0iAEqle.Qfpqo8wmXHAOQkvMc8mTnpoAOahBQO', 'Admin'),
(8, 'Locke, John Jasper ', '114, , Howard St., Panapaan 4, Bacoor', '2001-11-19', '09123445678', '112-3456', 'jLocke', '$2y$10$4JF0EG/kDSt8gywV1eff8eUmnfrJwfSu0FTnZWEymVG4oCgLj367K', 'Admin'),
(9, 'Santos, Angela ', '61, Baguio Hills, 21st, Paanan , Baguio City', '2002-11-15', '09123456789', '123-4567', 'angela.santos', '$2y$10$h.YDkbVogcqOu03IBmfVFuVgRW9LlTjmuUM53iO6uWBG7/upAi86q', 'Admin'),
(10, 'Santos, Jared Dylan Albare', 'B5 L29, La Villa, Dandelions St., Molino 4, Bacoor City', '2003-03-10', '09684152794', '454-8941', 'jsantos', '$2y$10$RImuP3pNX/2WUVDWS/DU8eFmCsxE8iwY5Cks1EQRRIV42eUQ3P/NW', 'Admin'),
(12, 'Santos, Jared Dylan Albare', 'B1 L1, Bloomfields Subdivision, Alapan St., Alapan 1-B, Imus City', '2003-03-10', '09684152794', '454-8945', 'jsantoss', '$2y$10$xpVUsCjdHsbf5NqCFjl9XO.8CGYh4axo0XEF.oFMtRZPDRjV5AWPS', 'Admin'),
(14, 'Santos, Jared Albare ', 'B6 L23 , Bloomfields Subdivision, , Alapan 1-B, , Cavite', '2003-03-10', '09668415279', '454-8941', 'newjared', '$2y$10$5GI3x3uQeVrSroY13T1i0ethVBZbXyKi750kvY6oxs1LxVNd0CbCO', 'Admin'),
(15, 'Santos, Jared Albare ', 'B6 L23 , Bloomfields Subdivision, , Alapan 1-B, , Cavite', '2003-03-10', '09668415279', '454-8941', 'newjared', '$2y$10$ZE3nY/VFqSpTGIOyeoBJyO7i0xZgPp6Ge59NQHPt0K4j/Yup4RJ7q', 'Admin'),
(16, 'Santos, Jared Albare ', '008, Dimasalang Subdivision, Advincula Rd, Toclong 1-A, Imus City, Cavite', '2000-11-29', '09684152794', '454-8941', 'jarednew', '$2y$10$y5FD6q7eV7VyBogWie6JfOU1ffF2IZ932ayzlTlrCpXyCRUXsk1OC', 'Admin'),
(17, 'Santarin, Ian  ', '021, , Anabu St, Anabu 1-A, Imus City, Cavite', '2003-03-10', '09684152794', '454-8941', 'ian.santarin', '$2y$10$hWZBfxRpRt1al4lNMhU2C.z6RxPu5Dv4oooHohDKgbE3t08RpytI.', 'Admin'),
(18, 'Santos, Jared Dylan Albare ', 'B6 L23, Bloomfields Subdivision, , Alapan 1-B, Imus City, Cavite', '2003-03-10', '09684152794', '454-8941', 'jaredAdmin', '$2y$10$GBsNcePWTysrd2IDxDhUMOLSoexvcaxVX9ri//3Amp4enwtFaNnpe', 'Admin'),
(19, 'Santos, Jared Albare ', 'B6 L23, Bloomfields Subdivision, , Alapan 1-B, Imus City, Cavite', '2003-03-10', '09684152794', '454-8941', 'jaredStaff', '$2y$10$iyfnJQYE/CWhfSqUuAM8v.bilq.IXJKsU..qXOlVOVVqlNMmu8SpW', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `customerregister_tbl`
--

CREATE TABLE `customerregister_tbl` (
  `ID` int(11) NOT NULL,
  `UID` varchar(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `promo` int(5) DEFAULT NULL,
  `pc_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerregister_tbl`
--

INSERT INTO `customerregister_tbl` (`ID`, `UID`, `Username`, `balance`, `promo`, `pc_number`) VALUES
(2, '336D9CC9', 'xx_Dark_Slayer_xx', 200, 0, 1),
(3, '5993E479', 'Marlon', 10, 0, NULL),
(1, 'B7F64763', 'Marrun', 19860, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `desktop_tbl`
--

CREATE TABLE `desktop_tbl` (
  `pc_number` int(2) NOT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `user_uid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desktop_tbl`
--

INSERT INTO `desktop_tbl` (`pc_number`, `time_start`, `time_end`, `status`, `user_uid`) VALUES
(1, NULL, NULL, 'off', NULL),
(2, NULL, NULL, 'off', NULL);

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
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `ID` int(11) NOT NULL,
  `TransactionID` varchar(21) NOT NULL,
  `CustomerUID` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `Type` enum('Card Purchase','Card Reload','PC Rental','Promo Deal') NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`ID`, `TransactionID`, `CustomerUID`, `amount`, `Type`, `Date`, `Time`) VALUES
(1, '0', '0', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(2, '0', '0', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(3, '2147483647', '952643709', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(4, '2147483647', '952643709', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(5, '2147483647', '928823705', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(6, '2147483647', '140655984', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(7, '2147483647', '579739024', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(8, '2147483647', '579739024', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(9, '2147483647', '564027350', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(10, '2147483647', '452599509', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(11, '512104958822', '609300695', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(12, '', '0', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(13, '394336454464', '698702337', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(14, '359767748995', '429101584', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(15, '359767748995', '429101584', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(16, '359767748995', '429101584', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(17, '', '233639688', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(18, '529682394257', '956005612', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(19, '966094493337', '424169916', 50.00, 'Card Purchase', '2024-11-22', '11:09:09'),
(20, '580479775343', '410216995', 50.00, 'Card Purchase', '2024-11-22', '11:17:10'),
(21, '273010414067564770000', '203681331', 50.00, 'Card Purchase', '2024-11-22', '11:18:30'),
(22, '821839945904425500000', '295543835', 50.00, 'Card Purchase', '2024-11-22', '11:58:50'),
(23, '600696865710597200', '354941247', 50.00, 'Card Purchase', '2024-11-22', '21:48:30'),
(24, '363130988884292300', '768501229', 50.00, 'Card Purchase', '2024-11-22', '21:58:52'),
(25, '756326647482862100', '288262895', 50.00, 'Card Purchase', '2024-11-22', '22:01:16'),
(26, '823671388062301600', '164505310', 50.00, 'Card Purchase', '2024-11-22', '22:35:16'),
(27, 'TNCIMUS-2302061815886', '982054300', 50.00, 'Card Purchase', '2024-11-22', '22:50:48'),
(28, 'TNCIMUS-7612961632962', '185862771', 50.00, 'Card Purchase', '2024-11-22', '22:53:05'),
(29, 'TNCIMUS-1893674976927', '572951136', 50.00, 'Card Purchase', '2024-11-22', '22:59:06'),
(30, 'TNCIMUS-6219307073287', '374391305', 50.00, 'Card Purchase', '2024-11-22', '23:00:04'),
(31, 'TNCIMUS-1205349627488', '893384719', 50.00, 'Card Purchase', '2024-11-22', '23:03:05'),
(32, 'TNCIMUS-3368236000656', '112226969', 50.00, 'Card Purchase', '2024-11-22', '23:06:38'),
(33, 'TNCIMUS-5324289715832', '472986542', 50.00, 'Card Purchase', '2024-11-22', '23:10:32'),
(34, 'TNCIMUS-6895731759431', '908130874', 50.00, 'Card Purchase', '2024-11-22', '23:20:55'),
(35, 'TNCIMUS-4895043877948', '610033829', 50.00, 'Card Purchase', '2024-11-22', '23:22:10'),
(36, 'TNCIMUS-3490678164829', '933424981', 50.00, 'Card Purchase', '2024-11-22', '23:29:34'),
(37, 'TNCIMUS-4483432298851', '589686159', 50.00, 'Card Purchase', '2024-11-22', '23:32:05'),
(38, 'TNCIMUS-4569210109615', '589686159', 40.00, '', '2024-11-22', '23:32:10'),
(39, 'TNCIMUS-3473494945386', '178560481', 50.00, 'Card Purchase', '2024-11-23', '13:25:56'),
(40, 'TNCIMUS-2410515807043', '568289907', 50.00, 'Card Purchase', '2024-11-23', '13:57:17'),
(41, 'TNCIMUS-5664280147812', '812588778', 50.00, 'Card Purchase', '2024-11-23', '13:58:27'),
(42, 'TNCIMUS-2303987691528', '489248676', 50.00, 'Card Purchase', '2024-11-23', '14:05:30'),
(43, 'TNCIMUS-6741599030694', '222023827', 50.00, 'Card Purchase', '2024-11-23', '14:11:15'),
(44, 'TNCIMUS-1007067059701', '119112852', 50.00, 'Card Purchase', '2024-11-23', '14:22:51'),
(45, 'TNCIMUS-8232531174119', '761445123', 50.00, 'Card Purchase', '2024-11-23', '15:27:38'),
(46, 'TNCIMUS-3101829670383', '653465784', 50.00, 'Card Purchase', '2024-11-23', '15:33:26'),
(47, 'TNCIMUS-5043781918051', '653465784', 20.00, 'Card Reload', '2024-11-23', '15:34:17'),
(48, 'TNCIMUS-7086064208958', '853401170', 50.00, 'Card Purchase', '2024-11-23', '15:36:36'),
(49, 'TNCIMUS-9454907819465', '770123786', 50.00, 'Card Purchase', '2024-11-23', '22:15:55'),
(50, 'TNCIMUS-6179570905914', '370062742', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(51, 'TNCIMUS-6179570905914', '370062742', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(52, 'TNCIMUS-9677874443711', '943174280', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(53, 'TNCIMUS-7101294525767', '519703759', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(54, 'TNCIMUS-3206594242052', '106286583', 50.00, 'Card Purchase', '2024-11-24', '04:12:23'),
(55, 'TNCIMUS-3163024249678', '848860277', 50.00, 'Card Purchase', '2024-11-24', '11:20:26'),
(56, 'TNCIMUS-5651234291190', '653465784', 20.00, 'Card Reload', '2024-11-24', '14:59:16'),
(57, 'TNCIMUS-3974399689621', '653465784', 20.00, 'Card Reload', '2024-11-24', '15:00:42'),
(58, 'TNCIMUS-4766771657089', '653465784', 20.00, 'Card Reload', '2024-11-24', '15:12:44'),
(59, 'TNCIMUS-4766771657089', '653465784', 20.00, 'Card Reload', '2024-11-24', '15:13:23'),
(60, 'TNCIMUS-9801939482367', '116570863', 50.00, 'Card Purchase', '2024-11-25', '23:29:52'),
(61, 'TNCIMUS-5675061898595', '116570863', 20.00, 'Card Reload', '2024-11-25', '23:30:41'),
(62, 'TNCIMUS-2311767552232', '311207219', 50.00, 'Card Purchase', '2024-11-25', '23:35:25'),
(63, 'TNCIMUS-6030593092865', '513648109', 50.00, 'Card Purchase', '2024-11-25', '23:52:58'),
(64, 'TNCIMUS-8300042217375', '513648109', 20.00, 'Card Reload', '2024-11-25', '23:53:14'),
(65, 'TNCIMUS-8603194177311', '513648109', 20.00, 'Card Reload', '2024-11-25', '23:53:18'),
(66, 'TNCIMUS-3394137807332', '513648109', 20.00, 'Card Reload', '2024-11-25', '23:53:22'),
(67, 'TNCIMUS-8197147008167', '714472595', 50.00, 'Card Purchase', '2024-11-26', '00:01:59'),
(68, 'TNCIMUS-4681298665428', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:02:27'),
(69, 'TNCIMUS-4061739255049', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:02:31'),
(70, 'TNCIMUS-8623781262568', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:02:35'),
(71, 'TNCIMUS-5097541537215', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:02:38'),
(72, 'TNCIMUS-6852403921058', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:02:42'),
(73, 'TNCIMUS-6668859856962', '714472595', 20.00, 'Card Reload', '2024-11-26', '00:38:01'),
(74, 'TNCIMUS-5325586537804', '316373295', 50.00, 'Card Purchase', '2024-11-26', '11:03:22'),
(75, 'TNCIMUS-2936242999008', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:03:57'),
(76, 'TNCIMUS-2044421877858', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:04:00'),
(77, 'TNCIMUS-7644926023363', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:04:04'),
(78, 'TNCIMUS-8577951171294', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:04:08'),
(79, 'TNCIMUS-8802584503197', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:04:13'),
(80, 'TNCIMUS-3633469908797', '316373295', 20.00, 'Card Reload', '2024-11-26', '11:04:16'),
(81, 'TNCIMUS-5489380101321', '773947330', 50.00, 'Card Purchase', '2024-11-26', '11:17:41'),
(82, 'TNCIMUS-9098048300241', '773947330', 20.00, 'Card Reload', '2024-11-26', '11:17:59'),
(83, 'TNCIMUS-9807767381088', '773947330', 20.00, 'Card Reload', '2024-11-26', '11:22:56'),
(84, 'TNCIMUS-3074010803930', '773947330', 20.00, 'Card Reload', '2024-11-26', '11:23:01'),
(85, 'TNCIMUS-8592205216638', '773947330', 20.00, 'Card Reload', '2024-11-26', '11:37:38'),
(86, 'TNCIMUS-2444427297976', '168168025', 50.00, 'Card Purchase', '2024-11-26', '11:58:25'),
(87, 'TNCIMUS-3619851301788', '168168025', 20.00, 'Card Reload', '2024-11-26', '11:58:45'),
(88, 'TNCIMUS-2550904569887', '168168025', 20.00, 'Card Reload', '2024-11-26', '11:58:49'),
(89, 'TNCIMUS-2747263674258', '168168025', 20.00, 'Card Reload', '2024-11-26', '11:58:53'),
(90, 'TNCIMUS-1312508341797', '168168025', 20.00, 'Card Reload', '2024-11-26', '12:02:10'),
(91, 'TNCIMUS-3984479618518', '168168025', 20.00, 'Card Reload', '2024-11-26', '12:02:36'),
(92, 'TNCIMUS-5770924209206', '168168025', 20.00, 'Card Reload', '2024-11-26', '12:02:49'),
(93, 'TNCIMUS-8082296143182', '118314054', 50.00, 'Card Purchase', '2024-11-26', '12:12:07'),
(94, 'TNCIMUS-4202257716009', '118314054', 20.00, 'Card Reload', '2024-11-26', '12:12:29'),
(95, 'TNCIMUS-4559509550874', '118314054', 20.00, 'Card Reload', '2024-11-26', '12:12:32'),
(96, 'TNCIMUS-6748710475264', '118314054', 20.00, 'Card Reload', '2024-11-26', '12:12:35'),
(97, 'TNCIMUS-8407906582896', '118314054', 20.00, 'Card Reload', '2024-11-26', '12:17:01'),
(98, 'TNCIMUS-8336762792290', '118314054', 20.00, 'Card Reload', '2024-11-26', '12:17:14'),
(99, 'TNCIMUS-4743832879538', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:02'),
(100, 'TNCIMUS-5387130501329', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:05'),
(101, 'TNCIMUS-3007434971828', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:09'),
(102, 'TNCIMUS-8365729553041', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:10'),
(103, 'TNCIMUS-4908222031122', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:11'),
(104, 'TNCIMUS-6419909078963', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:13'),
(105, 'TNCIMUS-8729351681304', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:14'),
(106, 'TNCIMUS-1045562487603', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:15'),
(107, 'TNCIMUS-9695777618395', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:16'),
(108, 'TNCIMUS-4846110417895', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:46:17'),
(109, 'TNCIMUS-9580704003918', '118314054', 20.00, 'Card Reload', '2024-11-26', '13:47:42'),
(110, 'TNCIMUS-9809038006096', '670538937', 50.00, 'Card Purchase', '2024-11-27', '15:35:07'),
(111, 'TNCIMUS-1656192709062', '670538937', 20.00, 'Card Reload', '2024-11-27', '15:36:39'),
(112, 'TNCIMUS-8936518508474', '670538937', 20.00, 'Card Reload', '2024-11-27', '15:37:02'),
(113, 'TNCIMUS-4262237241654', '670538937', 20.00, 'Card Reload', '2024-11-27', '15:39:45'),
(114, 'TNCIMUS-5547951881165', '316373295', 20.00, 'Card Reload', '2024-11-28', '20:50:42'),
(115, 'TNCIMUS-4080328314650', '316373295', 20.00, 'Card Reload', '2024-11-28', '20:50:54'),
(116, 'TNCIMUS-7274609461110', '316373295', 20.00, 'Card Reload', '2024-11-28', '21:20:35'),
(117, 'TNCIMUS-7888330170632', '316373295', 20.00, 'Card Reload', '2024-11-28', '21:20:54'),
(118, 'TNC', '2147483647', 0.00, '', '2024-12-01', '08:50:24'),
(119, 'TNC', '2147483647', 0.00, '', '2024-12-01', '08:52:11'),
(120, 'TNC', '2147483647', 0.00, '', '2024-12-01', '08:54:57'),
(121, 'TNC', '0', 0.00, '', '2024-12-01', '08:57:49'),
(122, 'TNC', '0', 0.00, '', '2024-12-01', '08:58:05'),
(123, 'TNC', '2147483647', 20.00, '', '2024-12-01', '09:01:09'),
(124, 'TNC', '2147483647', 20.00, 'Promo Deal', '2024-12-01', '09:03:26'),
(125, 'TNC', '2147483647', 20.00, 'Promo Deal', '2024-12-01', '09:04:23'),
(126, '', '2147483647', 20.00, 'Promo Deal', '2024-12-01', '09:06:58'),
(127, 'TNC', '336', 20.00, 'Promo Deal', '2024-12-01', '09:08:52'),
(128, 'TNC', '336D9CC9', 20.00, 'Promo Deal', '2024-12-01', '09:09:44'),
(129, 'cc', '336D9CC9', 20.00, 'Promo Deal', '2024-12-01', '09:31:58'),
(130, 'TNCIMUS-398450314216', '336D9CC9', 20.00, 'Promo Deal', '2024-12-01', '09:33:25'),
(131, 'TNCIMUS-327338462533', '336D9CC9', 40.00, 'Promo Deal', '2024-12-01', '09:55:10'),
(132, 'TNCIMUS-127721821882', '336D9CC9', 60.00, 'Promo Deal', '2024-12-01', '11:29:40');

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
-- Indexes for table `adminstaff_tbl`
--
ALTER TABLE `adminstaff_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customerregister_tbl`
--
ALTER TABLE `customerregister_tbl`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `desktop_tbl`
--
ALTER TABLE `desktop_tbl`
  ADD PRIMARY KEY (`pc_number`);

--
-- Indexes for table `esp`
--
ALTER TABLE `esp`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `adminstaff_tbl`
--
ALTER TABLE `adminstaff_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customerregister_tbl`
--
ALTER TABLE `customerregister_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

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
