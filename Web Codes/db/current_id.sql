-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 11:43 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_id`
--

CREATE TABLE `current_id` (
  `s` int(5) NOT NULL,
  `cuid` varchar(30) NOT NULL,
  `scantime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_id`
--

INSERT INTO `current_id` (`s`, `cuid`, `scantime`) VALUES
(1, 'AB CE ED CE 12', '2017-07-30 09:38:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_id`
--
ALTER TABLE `current_id`
  ADD PRIMARY KEY (`s`),
  ADD UNIQUE KEY `cuid` (`cuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
