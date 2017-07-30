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
-- Database: `brd13_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `S.no` int(50) NOT NULL,
  `Device_ID` varchar(30) NOT NULL,
  `Designation` varchar(8) NOT NULL,
  `Service No.` varchar(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Current Status` tinyint(1) NOT NULL,
  `Access` varchar(8) NOT NULL DEFAULT 'Admin',
  `Last Active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`S.no`, `Device_ID`, `Designation`, `Service No.`, `Username`, `Current Status`, `Access`, `Last Active`) VALUES
(1, '4EE1BC6', 'SQN LDR', '12345', 'XYZ', 1, 'Admin', '2017-07-26 16:35:44'),
(2, '3DC2F3A', 'WO', '47512', 'ABC', 0, 'Admin', '2017-07-26 16:36:55'),
(4, 'AE12BC6', 'WG CDR', '45712', 'PQR', 0, 'Admin', '2017-07-27 09:52:21'),
(6, 'AE32BC6', 'WG CDR', '45712', 'LMN', 0, 'Admin', '2017-07-27 10:03:55'),
(11, 'AE32BF6', 'WG CDR', '45712', 'LMN', 0, 'Admin', '2017-07-27 10:06:12'),
(26, 'A122BC6', 'WG CDR', '45712', 'LMN', 0, 'Admin', '2017-07-27 19:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `rfid_db`
--

CREATE TABLE `rfid_db` (
  `S_no.` int(30) NOT NULL,
  `UID` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL DEFAULT 'VoIP Phones',
  `Dept` varchar(30) NOT NULL DEFAULT 'Universal',
  `Serviceability` varchar(30) NOT NULL,
  `Reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid_db`
--

INSERT INTO `rfid_db` (`S_no.`, `UID`, `Name`, `Dept`, `Serviceability`, `Reg_time`) VALUES
(1, 'EB F1 C3 46 9D', 'PC', 'ER Dept', 'CAT A', '2017-07-26 07:13:51'),
(2, 'AC 43 5B 6A EE', 'Printer', 'Planning ', 'CAT B', '2017-07-26 07:16:58'),
(3, 'EB 12 4C BD E1', 'PC2 ', 'Radar ', 'CAT B', '2017-07-26 07:18:35'),
(4, 'AD CA 12 3E F1', 'scanner', 'planning', 'CAT C', '2017-07-26 08:50:20'),
(99, 'AD CA A2 CE F1', 'scanner', 'Aviation', 'CAT D', '2017-07-27 10:36:11'),
(102, 'BD CA A2 CE F1', 'scanner', 'Aviation', 'CAT C', '2017-07-27 10:37:08'),
(104, '74 CA A2 CE F1', 'scanner', 'Aviation', 'CAT C', '2017-07-27 10:37:20'),
(131, '74 CA 66 CE F1', 'scanner', 'Aviation', 'CAT C', '2017-07-27 15:27:43'),
(2611, '', '', '', '', '2017-07-27 21:25:33'),
(2626, 'AC 43 5B 6A F1', 'qwery', 'Electronics Repair Lab', 'CAT C ', '2017-07-28 00:00:24'),
(2637, 'AB CD ED AD CB', 'Qaaab', 'Radar Lab', 'CAT A', '2017-07-28 03:38:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`S.no`),
  ADD UNIQUE KEY `Device_ID` (`Device_ID`),
  ADD UNIQUE KEY `Device_ID_2` (`Device_ID`);

--
-- Indexes for table `rfid_db`
--
ALTER TABLE `rfid_db`
  ADD PRIMARY KEY (`S_no.`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `S.no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `rfid_db`
--
ALTER TABLE `rfid_db`
  MODIFY `S_no.` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2638;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
