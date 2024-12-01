-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 03:05 AM
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
-- Database: `sales_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `rfid_users_tbl`
--

CREATE TABLE `rfid_users_tbl` (
  `ID` int(255) NOT NULL,
  `UID_Number` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfid_users_tbl`
--

INSERT INTO `rfid_users_tbl` (`ID`, `UID_Number`, `Name`, `Username`, `Balance`) VALUES
(1, 0, 'Jared Dylan A. Santos', '', 0.00),
(2, 0, 'Jared Dylan A. Santos', '', 0.00),
(3, 952643709, 'Jared Dylan', 'JwanZero', 0.00),
(4, 952643709, 'Jared Dylan', 'JwanZero', 0.00),
(5, 928823705, 'Jared Dylan Santos', 'JwanZero', 0.00),
(6, 140655984, 'Unknown', 'redduu', 0.00),
(7, 579739024, 'Jared Dylan Santos', 'JaredDylan', 0.00),
(8, 579739024, 'Jared Dylan Santos', 'JaredDylan', 0.00),
(9, 564027350, 'redred', 'redduu', 0.00),
(10, 410868348, 'carlo', 'noname', 0.00),
(11, 441944479, 'noname', 'noname', 0.00),
(12, 452599509, 'Elon Musk', 'eloMusk', 0.00),
(13, 609300695, 'Bill Gates', 'bill.gates', 0.00),
(14, 0, 'dylan', 'jared.dylan', 0.00),
(15, 698702337, 'Mark Zuckerberg ', 'markzuckerberg@31', 0.00),
(16, 429101584, 'JaredDylan', 'redduuu', 0.00),
(17, 429101584, 'JaredDylan', 'redduuu', 0.00),
(18, 429101584, 'JaredDylan', 'redduuu', 0.00),
(19, 233639688, 'Jared', 'JwanZero', 0.00),
(20, 956005612, 'Jared Dylan', 'Jared.santos', 0.00),
(21, 424169916, 'Jared Santos', 'redduuu', 0.00),
(22, 410216995, 'dylansantos', 'dylandylan', 0.00),
(23, 203681331, 'Lebron James', 'lbjames', 0.00),
(24, 295543835, 'Pewdiepie', 'pewpew', 0.00),
(25, 354941247, 'Jared Dylan A. Santos', 'JaredDylan10', 0.00),
(26, 768501229, 'Jared Santos', '10z', 0.00),
(27, 288262895, 'Jared Dylan Santos', 'jaredsantos', 0.00),
(28, 164505310, 'Donald Trump', 'donaldjtrump', 0.00),
(29, 982054300, 'Max Verstappen', 'max.verstapp', 0.00),
(30, 185862771, 'Kim Minji', 'kim.minji09', 0.00),
(31, 572951136, 'Hanni Pham', 'hann.pham', 0.00),
(32, 374391305, 'Hanni Pham', 'hanni', 0.00),
(33, 893384719, 'Kang Haerin', 'khaerin', 0.00),
(34, 112226969, 'Jared', 'tenz', 0.00),
(35, 472986542, 'Joe Biden', 'jBiden', 0.00),
(36, 908130874, 'Kim Dahyun', 'kimdubu', 0.00),
(37, 610033829, 'Chou Tzuyu', 'chou.tzuyu', 0.00),
(38, 933424981, 'Justin Bieber', 'justinbieber', 60.00),
(39, 589686159, 'Liam Payne', 'liamPayne', 60.00),
(40, 178560481, 'Jared Santos', 'Username1', 60.00),
(41, 568289907, 'Santos', 'santos', 0.00),
(42, 812588778, 'Santos', 'santosjared', 0.00),
(43, 489248676, 'Santos', 'santosj', 0.00),
(44, 222023827, 'red', 'redred', 0.00),
(45, 119112852, 'Jared Dylan', 'dyylan', 20.00),
(46, 761445123, 'Jared ', 'redsantos', 100.00),
(47, 653465784, 'Jared', 'jsdasd', 180.00),
(48, 853401170, 'Jared', 'kljdalk', 20.00),
(49, 770123786, 'Jose Rizal', 'joserizal30', 20.00),
(50, 0, '', 'Santos', 20.00),
(51, 576839316, 'Jared', 'Santos', 20.00),
(52, 370062742, 'Jared', 'jrdsnts', 20.00),
(53, 370062742, 'Jared', 'jrdsnts', 20.00),
(54, 943174280, 'Lebron James', 'lebronjems', 20.00),
(55, 519703759, 'Jared Santos', 'dydydy', 20.00),
(56, 106286583, 'Danielle ', 'danidani', 20.00),
(57, 848860277, 'Tom Cruise', 'tomcruise', 20.00),
(58, 116570863, 'Michael Jordan', 'MichaelJordan23', 40.00),
(59, 311207219, 'Kobe Bryant', 'kobe24', 20.00),
(60, 513648109, 'Cristiano Ronaldo', 'cr7', 80.00),
(61, 714472595, 'Klay Thompson', 'klay11', 140.00),
(62, 316373295, 'malupiton', 'boss', 220.00),
(63, 773947330, 'Stephen Curry', 'stephcurry30', 100.00),
(64, 168168025, 'Kyrie Irving', 'kyrie1170', 140.00),
(65, 118314054, 'Ariana Grande', 'arianagrande', 340.00),
(66, 670538937, 'Edicel', 'edicel123', 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `ID` int(11) NOT NULL,
  `TransactionID` varchar(21) NOT NULL,
  `CustomerUID` int(255) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `Type` enum('Card Purchase','Card Reload','PC Rental','') NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`ID`, `TransactionID`, `CustomerUID`, `CustomerName`, `Username`, `amount`, `Type`, `Date`, `Time`) VALUES
(1, '0', 0, 'Jared Dylan A. Santos', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(2, '0', 0, 'Jared Dylan A. Santos', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(3, '2147483647', 952643709, 'Jared Dylan', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(4, '2147483647', 952643709, 'Jared Dylan', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(5, '2147483647', 928823705, 'Jared Dylan Santos', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(6, '2147483647', 140655984, 'Unknown', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(7, '2147483647', 579739024, 'Jared Dylan Santos', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(8, '2147483647', 579739024, 'Jared Dylan Santos', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(9, '2147483647', 564027350, 'redred', '', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(10, '2147483647', 452599509, 'Elon Musk', 'eloMusk', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(11, '512104958822', 609300695, 'Bill Gates', 'bill.gates', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(12, '', 0, 'dylan', 'jared.dylan', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(13, '394336454464', 698702337, 'Mark Zuckerberg ', 'markzuckerberg@31', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(14, '359767748995', 429101584, 'JaredDylan', 'redduuu', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(15, '359767748995', 429101584, 'JaredDylan', 'redduuu', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(16, '359767748995', 429101584, 'JaredDylan', 'redduuu', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(17, '', 233639688, 'Jared', 'JwanZero', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(18, '529682394257', 956005612, 'Jared Dylan', 'Jared.santos', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(19, '966094493337', 424169916, 'Jared Santos', 'redduuu', 50.00, 'Card Purchase', '2024-11-22', '11:09:09'),
(20, '580479775343', 410216995, 'dylansantos', 'dylandylan', 50.00, 'Card Purchase', '2024-11-22', '11:17:10'),
(21, '273010414067564770000', 203681331, 'Lebron James', 'lbjames', 50.00, 'Card Purchase', '2024-11-22', '11:18:30'),
(22, '821839945904425500000', 295543835, 'Pewdiepie', 'pewpew', 50.00, 'Card Purchase', '2024-11-22', '11:58:50'),
(23, '600696865710597200', 354941247, 'Jared Dylan A. Santos', 'JaredDylan10', 50.00, 'Card Purchase', '2024-11-22', '21:48:30'),
(24, '363130988884292300', 768501229, 'Jared Santos', '10z', 50.00, 'Card Purchase', '2024-11-22', '21:58:52'),
(25, '756326647482862100', 288262895, 'Jared Dylan Santos', 'jaredsantos', 50.00, 'Card Purchase', '2024-11-22', '22:01:16'),
(26, '823671388062301600', 164505310, 'Donald Trump', 'donaldjtrump', 50.00, 'Card Purchase', '2024-11-22', '22:35:16'),
(27, 'TNCIMUS-2302061815886', 982054300, 'Max Verstappen', 'max.verstapp', 50.00, 'Card Purchase', '2024-11-22', '22:50:48'),
(28, 'TNCIMUS-7612961632962', 185862771, 'Kim Minji', 'kim.minji09', 50.00, 'Card Purchase', '2024-11-22', '22:53:05'),
(29, 'TNCIMUS-1893674976927', 572951136, 'Hanni Pham', 'hann.pham', 50.00, 'Card Purchase', '2024-11-22', '22:59:06'),
(30, 'TNCIMUS-6219307073287', 374391305, 'Hanni Pham', 'hanni', 50.00, 'Card Purchase', '2024-11-22', '23:00:04'),
(31, 'TNCIMUS-1205349627488', 893384719, 'Kang Haerin', 'khaerin', 50.00, 'Card Purchase', '2024-11-22', '23:03:05'),
(32, 'TNCIMUS-3368236000656', 112226969, 'Jared', 'tenz', 50.00, 'Card Purchase', '2024-11-22', '23:06:38'),
(33, 'TNCIMUS-5324289715832', 472986542, 'Joe Biden', 'jBiden', 50.00, 'Card Purchase', '2024-11-22', '23:10:32'),
(34, 'TNCIMUS-6895731759431', 908130874, 'Kim Dahyun', 'kimdubu', 50.00, 'Card Purchase', '2024-11-22', '23:20:55'),
(35, 'TNCIMUS-4895043877948', 610033829, 'Chou Tzuyu', 'chou.tzuyu', 50.00, 'Card Purchase', '2024-11-22', '23:22:10'),
(36, 'TNCIMUS-3490678164829', 933424981, 'Justin Bieber', 'justinbieber', 50.00, 'Card Purchase', '2024-11-22', '23:29:34'),
(37, 'TNCIMUS-4483432298851', 589686159, 'Liam Payne', 'liamPayne', 50.00, 'Card Purchase', '2024-11-22', '23:32:05'),
(38, 'TNCIMUS-4569210109615', 589686159, '', '', 40.00, '', '2024-11-22', '23:32:10'),
(39, 'TNCIMUS-3473494945386', 178560481, 'Jared Santos', 'Username1', 50.00, 'Card Purchase', '2024-11-23', '13:25:56'),
(40, 'TNCIMUS-2410515807043', 568289907, 'Santos', 'santos', 50.00, 'Card Purchase', '2024-11-23', '13:57:17'),
(41, 'TNCIMUS-5664280147812', 812588778, 'Santos', 'santosjared', 50.00, 'Card Purchase', '2024-11-23', '13:58:27'),
(42, 'TNCIMUS-2303987691528', 489248676, 'Santos', 'santosj', 50.00, 'Card Purchase', '2024-11-23', '14:05:30'),
(43, 'TNCIMUS-6741599030694', 222023827, 'red', 'redred', 50.00, 'Card Purchase', '2024-11-23', '14:11:15'),
(44, 'TNCIMUS-1007067059701', 119112852, 'Jared Dylan', 'dyylan', 50.00, 'Card Purchase', '2024-11-23', '14:22:51'),
(45, 'TNCIMUS-8232531174119', 761445123, 'Jared ', 'redsantos', 50.00, 'Card Purchase', '2024-11-23', '15:27:38'),
(46, 'TNCIMUS-3101829670383', 653465784, 'Jared', 'jsdasd', 50.00, 'Card Purchase', '2024-11-23', '15:33:26'),
(47, 'TNCIMUS-5043781918051', 653465784, 'jsdasd', 'Jared', 20.00, 'Card Reload', '2024-11-23', '15:34:17'),
(48, 'TNCIMUS-7086064208958', 853401170, 'Jared', 'kljdalk', 50.00, 'Card Purchase', '2024-11-23', '15:36:36'),
(49, 'TNCIMUS-9454907819465', 770123786, 'Jose Rizal', 'joserizal30', 50.00, 'Card Purchase', '2024-11-23', '22:15:55'),
(50, 'TNCIMUS-6179570905914', 370062742, 'Jared', 'jrdsnts', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(51, 'TNCIMUS-6179570905914', 370062742, 'Jared', 'jrdsnts', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(52, 'TNCIMUS-9677874443711', 943174280, 'Lebron James', 'lebronjems', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(53, 'TNCIMUS-7101294525767', 519703759, 'Jared Santos', 'dydydy', 50.00, 'Card Purchase', '0000-00-00', '00:00:00'),
(54, 'TNCIMUS-3206594242052', 106286583, 'Danielle ', 'danidani', 50.00, 'Card Purchase', '2024-11-24', '04:12:23'),
(55, 'TNCIMUS-3163024249678', 848860277, 'Tom Cruise', 'tomcruise', 50.00, 'Card Purchase', '2024-11-24', '11:20:26'),
(56, 'TNCIMUS-5651234291190', 653465784, '', '', 20.00, 'Card Reload', '2024-11-24', '14:59:16'),
(57, 'TNCIMUS-3974399689621', 653465784, 'Jared', '', 20.00, 'Card Reload', '2024-11-24', '15:00:42'),
(58, 'TNCIMUS-4766771657089', 653465784, 'Jared', 'jsdasd', 20.00, 'Card Reload', '2024-11-24', '15:12:44'),
(59, 'TNCIMUS-4766771657089', 653465784, 'Jared', 'jsdasd', 20.00, 'Card Reload', '2024-11-24', '15:13:23'),
(60, 'TNCIMUS-9801939482367', 116570863, 'Michael Jordan', 'MichaelJordan23', 50.00, 'Card Purchase', '2024-11-25', '23:29:52'),
(61, 'TNCIMUS-5675061898595', 116570863, 'Michael Jordan', 'MichaelJordan23', 20.00, 'Card Reload', '2024-11-25', '23:30:41'),
(62, 'TNCIMUS-2311767552232', 311207219, 'Kobe Bryant', 'kobe24', 50.00, 'Card Purchase', '2024-11-25', '23:35:25'),
(63, 'TNCIMUS-6030593092865', 513648109, 'Cristiano Ronaldo', 'cr7', 50.00, 'Card Purchase', '2024-11-25', '23:52:58'),
(64, 'TNCIMUS-8300042217375', 513648109, 'Cristiano Ronaldo', 'cr7', 20.00, 'Card Reload', '2024-11-25', '23:53:14'),
(65, 'TNCIMUS-8603194177311', 513648109, 'Cristiano Ronaldo', 'cr7', 20.00, 'Card Reload', '2024-11-25', '23:53:18'),
(66, 'TNCIMUS-3394137807332', 513648109, 'Cristiano Ronaldo', 'cr7', 20.00, 'Card Reload', '2024-11-25', '23:53:22'),
(67, 'TNCIMUS-8197147008167', 714472595, 'Klay Thompson', 'klay11', 50.00, 'Card Purchase', '2024-11-26', '00:01:59'),
(68, 'TNCIMUS-4681298665428', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:02:27'),
(69, 'TNCIMUS-4061739255049', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:02:31'),
(70, 'TNCIMUS-8623781262568', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:02:35'),
(71, 'TNCIMUS-5097541537215', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:02:38'),
(72, 'TNCIMUS-6852403921058', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:02:42'),
(73, 'TNCIMUS-6668859856962', 714472595, 'Klay Thompson', 'klay11', 20.00, 'Card Reload', '2024-11-26', '00:38:01'),
(74, 'TNCIMUS-5325586537804', 316373295, 'malupiton', 'boss', 50.00, 'Card Purchase', '2024-11-26', '11:03:22'),
(75, 'TNCIMUS-2936242999008', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:03:57'),
(76, 'TNCIMUS-2044421877858', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:04:00'),
(77, 'TNCIMUS-7644926023363', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:04:04'),
(78, 'TNCIMUS-8577951171294', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:04:08'),
(79, 'TNCIMUS-8802584503197', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:04:13'),
(80, 'TNCIMUS-3633469908797', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-26', '11:04:16'),
(81, 'TNCIMUS-5489380101321', 773947330, 'Stephen Curry', 'stephcurry30', 50.00, 'Card Purchase', '2024-11-26', '11:17:41'),
(82, 'TNCIMUS-9098048300241', 773947330, 'Stephen Curry', 'stephcurry30', 20.00, 'Card Reload', '2024-11-26', '11:17:59'),
(83, 'TNCIMUS-9807767381088', 773947330, 'Stephen Curry', 'stephcurry30', 20.00, 'Card Reload', '2024-11-26', '11:22:56'),
(84, 'TNCIMUS-3074010803930', 773947330, 'Stephen Curry', 'stephcurry30', 20.00, 'Card Reload', '2024-11-26', '11:23:01'),
(85, 'TNCIMUS-8592205216638', 773947330, 'Stephen Curry', 'stephcurry30', 20.00, 'Card Reload', '2024-11-26', '11:37:38'),
(86, 'TNCIMUS-2444427297976', 168168025, 'Kyrie Irving', 'kyrie1170', 50.00, 'Card Purchase', '2024-11-26', '11:58:25'),
(87, 'TNCIMUS-3619851301788', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '11:58:45'),
(88, 'TNCIMUS-2550904569887', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '11:58:49'),
(89, 'TNCIMUS-2747263674258', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '11:58:53'),
(90, 'TNCIMUS-1312508341797', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '12:02:10'),
(91, 'TNCIMUS-3984479618518', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '12:02:36'),
(92, 'TNCIMUS-5770924209206', 168168025, 'Kyrie Irving', 'kyrie1170', 20.00, 'Card Reload', '2024-11-26', '12:02:49'),
(93, 'TNCIMUS-8082296143182', 118314054, 'Ariana Grande', 'arianagrande', 50.00, 'Card Purchase', '2024-11-26', '12:12:07'),
(94, 'TNCIMUS-4202257716009', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '12:12:29'),
(95, 'TNCIMUS-4559509550874', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '12:12:32'),
(96, 'TNCIMUS-6748710475264', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '12:12:35'),
(97, 'TNCIMUS-8407906582896', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '12:17:01'),
(98, 'TNCIMUS-8336762792290', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '12:17:14'),
(99, 'TNCIMUS-4743832879538', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:02'),
(100, 'TNCIMUS-5387130501329', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:05'),
(101, 'TNCIMUS-3007434971828', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:09'),
(102, 'TNCIMUS-8365729553041', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:10'),
(103, 'TNCIMUS-4908222031122', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:11'),
(104, 'TNCIMUS-6419909078963', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:13'),
(105, 'TNCIMUS-8729351681304', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:14'),
(106, 'TNCIMUS-1045562487603', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:15'),
(107, 'TNCIMUS-9695777618395', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:16'),
(108, 'TNCIMUS-4846110417895', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:46:17'),
(109, 'TNCIMUS-9580704003918', 118314054, 'Ariana Grande', 'arianagrande', 20.00, 'Card Reload', '2024-11-26', '13:47:42'),
(110, 'TNCIMUS-9809038006096', 670538937, 'Edicel', 'edicel123', 50.00, 'Card Purchase', '2024-11-27', '15:35:07'),
(111, 'TNCIMUS-1656192709062', 670538937, 'Edicel', 'edicel123', 20.00, 'Card Reload', '2024-11-27', '15:36:39'),
(112, 'TNCIMUS-8936518508474', 670538937, 'Edicel', 'edicel123', 20.00, 'Card Reload', '2024-11-27', '15:37:02'),
(113, 'TNCIMUS-4262237241654', 670538937, 'Edicel', 'edicel123', 20.00, 'Card Reload', '2024-11-27', '15:39:45'),
(114, 'TNCIMUS-5547951881165', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-28', '20:50:42'),
(115, 'TNCIMUS-4080328314650', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-28', '20:50:54'),
(116, 'TNCIMUS-7274609461110', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-28', '21:20:35'),
(117, 'TNCIMUS-7888330170632', 316373295, 'malupiton', 'boss', 20.00, 'Card Reload', '2024-11-28', '21:20:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rfid_users_tbl`
--
ALTER TABLE `rfid_users_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rfid_users_tbl`
--
ALTER TABLE `rfid_users_tbl`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
