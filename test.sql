-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 02:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SN` int(6) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Poll_Name` varchar(30) NOT NULL,
  `poll_pass` varchar(500) NOT NULL,
  `admin_pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SN`, `Firstname`, `Lastname`, `Poll_Name`, `poll_pass`, `admin_pass`) VALUES
(95, 'rupesh', 'ghorashainee', 'test', '$2y$10$oe6eVLBoIiiaeU8fyyBGDuat1KJnjb9.vPERvl4UM79Qd8eAWP9Fa', '$2y$10$0tav8VJwsiRs2llD4dcxM.XG.MNFb7RBCXjv87X.VrBb5aN.sQ/HK');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(0, 99, 95, 'hello', '2021-02-24 13:55:25', 1),
(0, 95, 99, 'hi', '2021-02-24 13:55:31', 1),
(0, 95, 99, 'may i know the pass', '2021-02-24 13:55:55', 1),
(0, 95, 99, 'i have been banned', '2021-02-24 13:56:17', 1),
(0, 99, 95, 'call me to confirm', '2021-02-24 13:56:29', 1),
(0, 95, 99, 'sure', '2021-02-24 13:56:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `Poll_Name` varchar(255) NOT NULL,
  `Poll_Type` varchar(255) NOT NULL,
  `Total_Entries` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `c1` varchar(250) NOT NULL,
  `c2` varchar(250) NOT NULL,
  `c3` varchar(250) DEFAULT NULL,
  `c4` varchar(250) DEFAULT NULL,
  `c5` varchar(250) DEFAULT NULL,
  `c1_value` int(11) NOT NULL,
  `c2_value` int(11) NOT NULL,
  `c3_value` int(11) NOT NULL,
  `c4_value` int(11) NOT NULL,
  `c5_value` int(11) NOT NULL,
  `c1_image` varchar(255) NOT NULL,
  `c2_image` varchar(255) NOT NULL,
  `c3_image` varchar(255) NOT NULL,
  `c4_image` varchar(255) NOT NULL,
  `c5_image` varchar(255) NOT NULL,
  `Creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Reg_deadline` timestamp NOT NULL DEFAULT current_timestamp(),
  `poll_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `poll_end` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `Poll_Name`, `Poll_Type`, `Total_Entries`, `Password`, `c1`, `c2`, `c3`, `c4`, `c5`, `c1_value`, `c2_value`, `c3_value`, `c4_value`, `c5_value`, `c1_image`, `c2_image`, `c3_image`, `c4_image`, `c5_image`, `Creation_time`, `Reg_deadline`, `poll_start`, `poll_end`) VALUES
(1, 'test', 'Controlled', 5, '$2y$10$oe6eVLBoIiiaeU8fyyBGDuat1KJnjb9.vPERvl4UM79Qd8eAWP9Fa', '1', '2', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '2021-02-24 13:48:15', '2021-02-25 13:47:00', '2021-02-26 13:47:00', '2021-02-28 17:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `otp` varchar(500) NOT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `password`, `otp`, `verification`) VALUES
(95, 'rupesh', 'ghorashainee', 'rupeshghorashainee@gmail.com', '$2y$10$.12JCaFSB3i..NuZGR7RAODqlrxE604C1qiD59VLTeucU8MErhjCO', '900535', 1),
(96, 'rizuta', 'pokhrel', 'rshiju11@gmail.com', '$2y$10$NAtfa7i5yDFyMO2Fti1Xk.keJRsBcZbKvjT.GWZV/lKwxWRb2nEfa', '752856', 1),
(97, 'shreya', 'shrestha', 'shreya.shrestha1999@gmail.com', '$2y$10$pPCwcFAlzc5LF/SmXrSBP.LIyws96nFDuOD17z/nfcNHXLxYp29Jm', '963429', 1),
(98, 'samip', 'khanal', 'Sameepkhanal77@gmail.com', '$2y$10$9T4wn5ZWunSHh.q3sCvjYOL1UFYnAuIAbpdCfm0crS6gXnSAdFQUe', '882874', 1),
(99, 'asmin', 'thapa', 'thapa27asmin@gmail.com', '$2y$10$OqHoYPcDXDi3CtMQRvwOO..EykZ0izrK7hde8MKbcXprMW45bYb/G', '$2y$10$tM8dViRszG9crezZo/3LW.C5VbWtaOzOzyd4RLIYaS0dwAj9dRtwO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Id` int(11) DEFAULT NULL,
  `votername` varchar(30) DEFAULT NULL,
  `voterlastname` varchar(30) DEFAULT NULL,
  `vote_status` tinyint(1) DEFAULT 0,
  `ban_status` tinyint(1) DEFAULT 0,
  `active_status` tinyint(1) DEFAULT 0,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Id`, `votername`, `voterlastname`, `vote_status`, `ban_status`, `active_status`, `last_activity`) VALUES
(99, 'asmin', 'thapa', 0, 0, 0, '2021-02-24 13:56:40'),
(96, 'rizuta', 'pokhrel', 0, 0, 0, '2021-02-24 13:49:51'),
(97, 'shreya', 'shrestha', 0, 0, 0, '2021-02-24 13:50:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Poll_Name`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
