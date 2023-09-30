-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 11:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodsample`
--

CREATE TABLE `bloodsample` (
  `SampleID` int(11) NOT NULL,
  `HospitalID` int(11) DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodsample`
--

INSERT INTO `bloodsample` (`SampleID`, `HospitalID`, `BloodGroup`, `Quantity`) VALUES
(4, 1, 'A', 4),
(5, 1, 'A+', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `HospitalID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`HospitalID`, `Name`, `Username`, `Password`) VALUES
(1, 'Abhishek', 'abhi12', '123');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `ReceiverID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`ReceiverID`, `Name`, `BloodGroup`, `Username`, `Password`) VALUES
(1, 'Abhishek kr', 'A+', 'abhishek9640', '123456'),
(2, 'Gyan', 'O', 'gyaan12', '123456'),
(3, 'Abhishek kumar', 'B', 'abhishek964', '123'),
(5, 'Pritam', 'O+', 'pritam123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `RequestID` int(11) NOT NULL,
  `ReceiverID` int(11) DEFAULT NULL,
  `SampleID` int(11) DEFAULT NULL,
  `RequestDate` datetime DEFAULT NULL,
  `Status` enum('Pending','Approved','Rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`RequestID`, `ReceiverID`, `SampleID`, `RequestDate`, `Status`) VALUES
(1, 1, 5, '2023-09-30 12:20:28', 'Pending'),
(2, 1, 5, '2023-09-30 13:48:52', 'Pending'),
(3, 1, 5, '2023-09-30 13:50:21', 'Pending'),
(5, 1, 4, '2023-09-30 14:29:07', 'Pending'),
(6, 1, 5, '2023-09-30 14:40:44', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodsample`
--
ALTER TABLE `bloodsample`
  ADD PRIMARY KEY (`SampleID`),
  ADD KEY `HospitalID` (`HospitalID`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`ReceiverID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `ReceiverID` (`ReceiverID`),
  ADD KEY `SampleID` (`SampleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodsample`
--
ALTER TABLE `bloodsample`
  MODIFY `SampleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `ReceiverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodsample`
--
ALTER TABLE `bloodsample`
  ADD CONSTRAINT `bloodsample_ibfk_1` FOREIGN KEY (`HospitalID`) REFERENCES `hospital` (`HospitalID`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`ReceiverID`) REFERENCES `receivers` (`ReceiverID`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`SampleID`) REFERENCES `bloodsample` (`SampleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
