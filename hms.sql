-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 06:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_role`) VALUES
('18_admn_1', 'super_admin', '.--..--..-.', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` varchar(15) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `doctor_dob` date NOT NULL,
  `doctor_gender` varchar(10) NOT NULL,
  `doctor_phone` varchar(15) NOT NULL,
  `doctor_city` varchar(20) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `doctor_designation` varchar(30) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_password` varchar(50) NOT NULL,
  `doj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_dob`, `doctor_gender`, `doctor_phone`, `doctor_city`, `doctor_address`, `doctor_designation`, `doctor_email`, `doctor_password`, `doj`) VALUES
('18_dctr_6', 'pannaben', '1997-01-01', 'Female', '1212121212', 'Bhuj', 'bhuj', 'gynechologist@gmail', 'panna_rudani@gmail.com', 'panna_mf', '2018-01-26 13:19:14.940429');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `count` int(10) NOT NULL,
  `patient_id` varchar(15) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_type` tinyint(1) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `patient_password` varchar(50) NOT NULL,
  `relative_name` varchar(30) NOT NULL,
  `relative_contact` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `doj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`count`, `patient_id`, `patient_name`, `patient_gender`, `patient_email`, `patient_phone`, `patient_dob`, `patient_type`, `patient_address`, `patient_password`, `relative_name`, `relative_contact`, `added_by`, `doj`) VALUES
(34, '18_ptnt_15', 'captain america', 'Male', 'patellaxit8@gmail.com', '9726412461', '1997-12-22', 0, 'Bhuj~Madhapar', 'anushka@123', 'bucky', '8989898989', '', '2018-01-20 14:24:51.630859'),
(40, '18_ptnt_18', 'captain america               ', 'Male', 'patellaxit8@gmail.com', '9726412461', '1997-12-23', 0, 'Bhuj~Madhapar is <3', '8460892026', 'bucky', '8989898989', 'Admin', '2018-01-25 09:42:52.693359'),
(41, '18_ptnt_19', 'captain america', 'Male', 'patellaxit8@gmail.com', '9726412461', '1995-12-23', 0, 'Bhuj~Madhapar', 'loki@123', 'bucky', '8989898989', 'Admin', '2018-01-25 10:41:21.675781'),
(42, '18_ptnt_20', 'laxit patel', 'Male', 'patellaxit8@gmail.com', '9726412461', '1997-12-23', 0, 'Bhuj~vardhman nagar', '123456', 'manish', '8989898989', 'Admin', '2018-01-26 11:30:53.527343'),
(43, '18_ptnt_21', 'elon musk', 'Male', 'elon_roks@gmail.com', '9726412461', '2018-01-18', 0, 'Bhuj~silocon valley', 'elon@123', 'nasa kun', '123465', 'self', '2018-01-26 15:49:02.075195');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `receptionist_id` varchar(10) NOT NULL,
  `receptionist_name` varchar(30) NOT NULL,
  `receptionist_dob` date NOT NULL,
  `receptionist_gender` varchar(10) NOT NULL,
  `receptionist_phone` varchar(15) NOT NULL,
  `receptionist_city` varchar(30) NOT NULL,
  `receptionist_address` varchar(100) NOT NULL,
  `receptionist_email` varchar(50) NOT NULL,
  `receptionist_password` varchar(50) NOT NULL,
  `doj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`receptionist_id`, `receptionist_name`, `receptionist_dob`, `receptionist_gender`, `receptionist_phone`, `receptionist_city`, `receptionist_address`, `receptionist_email`, `receptionist_password`, `doj`) VALUES
('18_rcst_4', 'beast boy', '1999-01-09', 'Male', '1121221222', 'Bhuj', 'jugnle', 'beasty@gmail.com', 'beasty@123', '2018-01-26 16:46:33.704101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `count` (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `count` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
