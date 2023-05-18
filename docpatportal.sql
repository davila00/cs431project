-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 08:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs431`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttable`
--

CREATE TABLE `appointmenttable` (
  `PatientEmail` varchar(255) NOT NULL,
  `DoctorEmail` varchar(255) NOT NULL,
  `PatientName` varchar(255) NOT NULL,
  `DoctorName` varchar(255) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `ShortDescription` varchar(512) DEFAULT NULL,
  `Advice` varchar(512) DEFAULT NULL,
  `PatientAge` int(255) NOT NULL,
  `Slot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmenttable`
--

INSERT INTO `appointmenttable` (
  `PatientEmail`,
  `DoctorEmail`,
  `PatientName`,
  `DoctorName`,
  `AppointmentDate`,
  `ShortDescription`,
  `Advice`,
  `PatientAge`,
  `Slot`
) VALUES (
  'testpatient@gmail.com',
  'testdoctor@gmail.com',
  'Test Patient',
  'Test Doctor',
  '2023-05-17',
  'I have a slight headache, I just need some Ibuprofen ',
  ' Okay, I will contact the nearby provider to get you the needed medicine',
  22,
  '9:00 - 5:00'
),
(
  'testpatient@gmail.com',
  'testdoctor@gmail.com',
  'Test Patient',
  'Test Doctor',
  '2023-05-18',
  'This is my message to Test Doctor',
  ' This is my message to Test Patient',
  22,
  '9:00 - 5:00'
);

-- --------------------------------------------------------

--
-- Table structure for table `doctorrequest_table`
--

CREATE TABLE `doctorrequest_table` (
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorrequest_table`
--

INSERT INTO `doctorrequest_table` (
  `Name`,
  `Address`,
  `Gender`,
  `MobileNo`,
  `Email`,
  `Password`,
  `Department`,
  `Location`,
  `FileName`
) VALUES (
  'John Adams',
  '4367 Pickleberry Cir,',
  'Male',
  1234567890,
  'johnadams@gmail.com',
  'japickle',
  'Nephrologist',
  ' Dreamers, CA',
  'doctor/'
);

-- --------------------------------------------------------

--
-- Table structure for table `maindoctable`
--

CREATE TABLE `maindoctable` (
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Department` text NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Slot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maindoctable`
--

INSERT INTO `maindoctable` (
  `Name`,
  `Address`,
  `Gender`,
  `MobileNo`,
  `Email`,
  `Department`,
  `Location`,
  `Password`,
  `Slot`
) VALUES (
  'Test Doctor',
  '213 Narda St',
  'Male',
  2147483647,
  'testdoctor@gmail.com',
  'medicine',
  'Westminster, CA',
  '123',
  '9:00 - 5:00'
);

-- --------------------------------------------------------

--
-- Table structure for table `mainpatienttable`
--

CREATE TABLE `mainpatienttable` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mainpatienttable`
--

INSERT INTO `mainpatienttable` (
  `Name`,
  `Email`,
  `Birth_Date`,
  `Gender`,
  `Location`,
  `Password`
) VALUES (
  'Test Patient',
  'testpatient@gmail.com',
  '2000-01-01',
  'male',
  'Anaheim, CA',
  '123'
);

-- --------------------------------------------------------

--
-- Table structure for table `patientrequest_table`
--

CREATE TABLE `patientrequest_table` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientrequest_table`
--

INSERT INTO `patientrequest_table` (
  `Name`,
  `Email`,
  `Birth_Date`,
  `Gender`,
  `Location`,
  `Password`
) VALUES (
  'Shasha Pines',
  'sashap@gmail.com',
  '1996-06-14',
  'Female',
  ' Fullerton, CA',
  'sp1996'
);

-- --------------------------------------------------------

--
-- Table structure for table `provider_table`
--

CREATE TABLE `provider_table` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider_table`
--

INSERT INTO `provider_table` (
  `Name`,
  `Email`,
  `Password`,
  `Location`
) VALUES (
  'AltaMed',
  'altamed@gmail.com',
  '123',
  'Garden Grove, CA'
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorrequest_table`
--
ALTER TABLE `doctorrequest_table` ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `mainpatienttable`
--
ALTER TABLE `mainpatienttable` ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `patientrequest_table`
--
ALTER TABLE `patientrequest_table` ADD PRIMARY KEY (`Email`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;