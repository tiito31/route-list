-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 03:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `route-list`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_ix`
--

CREATE TABLE `ams_ix` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `as_number` int(10) NOT NULL,
  `ip_peering` varchar(15) NOT NULL,
  `ip_peering_2` varchar(15) DEFAULT NULL,
  `ipv6_peering` varchar(50) DEFAULT NULL,
  `community` varchar(15) NOT NULL,
  `ix_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ams_ix`
--

INSERT INTO `ams_ix` (`id`, `name`, `as_number`, `ip_peering`, `ip_peering_2`, `ipv6_peering`, `community`, `ix_name`) VALUES
(1, 'MegaFon', 31133, '80.249.208.125', '', '', '17451:22231', 'ams_ix'),
(2, 'InterConnect', 9150, '80.249.208.139', NULL, NULL, '17451:22232', 'ams_ix'),
(3, 'Globale', 39591, '80.249.208.152', NULL, NULL, '17451:22233', 'ams_ix');

-- --------------------------------------------------------

--
-- Table structure for table `equinix`
--

CREATE TABLE `equinix` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `as_number` int(10) NOT NULL,
  `ip_peering` varchar(15) NOT NULL,
  `ip_peering_2` varchar(15) DEFAULT NULL,
  `ipv6_peering` varchar(50) DEFAULT NULL,
  `community` varchar(15) NOT NULL,
  `ix_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ix_list`
--

CREATE TABLE `ix_list` (
  `id` int(11) NOT NULL,
  `ix_name` varchar(25) NOT NULL,
  `ix_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ix_list`
--

INSERT INTO `ix_list` (`id`, `ix_name`, `ix_desc`) VALUES
(1, 'ams_ix', 'Amsterdam Internet Exchange'),
(2, 'paix', 'PA Internet Exchange'),
(3, 'equinix sydney', 'Equinix Internet Exchange Sydney'),
(4, 'myix', 'Malaysia Internet Exchange');

-- --------------------------------------------------------

--
-- Table structure for table `myix`
--

CREATE TABLE `myix` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `as_number` int(10) NOT NULL,
  `ip_peering` varchar(15) NOT NULL,
  `ip_peering_2` varchar(15) DEFAULT NULL,
  `ipv6_peering` varchar(50) DEFAULT NULL,
  `community` varchar(15) NOT NULL,
  `ix_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paix`
--

CREATE TABLE `paix` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `as_number` int(10) NOT NULL,
  `ip_peering` varchar(15) NOT NULL,
  `ip_peering_2` varchar(15) DEFAULT NULL,
  `ipv6_peering` varchar(50) DEFAULT NULL,
  `community` varchar(15) NOT NULL,
  `ix_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ams_ix`
--
ALTER TABLE `ams_ix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equinix`
--
ALTER TABLE `equinix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ix_list`
--
ALTER TABLE `ix_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myix`
--
ALTER TABLE `myix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paix`
--
ALTER TABLE `paix`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ams_ix`
--
ALTER TABLE `ams_ix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equinix`
--
ALTER TABLE `equinix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ix_list`
--
ALTER TABLE `ix_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myix`
--
ALTER TABLE `myix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paix`
--
ALTER TABLE `paix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
