-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 05:54 AM
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
-- Table structure for table `adminssion`
--

CREATE TABLE `adminssion` (
  `adminssion_id` varchar(10) NOT NULL,
  `admission_patient` varchar(10) NOT NULL,
  `admission_doctor_assigned` varchar(10) NOT NULL,
  `admission_nurse_assigned` varchar(10) NOT NULL,
  `admission_date` date NOT NULL,
  `admission_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` varchar(10) NOT NULL,
  `appointment_for` varchar(10) NOT NULL,
  `appointment_by` varchar(10) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `appointment_status` tinyint(1) NOT NULL,
  `appointment_slot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_for`, `appointment_by`, `appointment_date`, `appointment_reg_date`, `appointment_status`, `appointment_slot`) VALUES
('18_apmt_0', '18_dctr_7', '18_ptnt_20', '2018-01-29', '2018-02-12 18:33:03.016218', 0, '10-11'),
('18_apmt_1', '18_dctr_10', '18_ptnt_15', '2018-02-13', '2018-02-12 18:38:49.409773', 0, '03-04'),
('18_apmt_10', '18_dctr_10', '18_ptnt_21', '2018-02-13', '2018-02-12 19:04:51.901960', 0, '01-02'),
('18_apmt_2', '18_dctr_10', '18_ptnt_20', '2018-02-13', '2018-02-12 18:44:54.805281', 0, '03-04'),
('18_apmt_3', '18_dctr_10', '18_ptnt_15', '2018-02-13', '2018-02-12 18:52:22.536726', 0, '10-11'),
('18_apmt_4', '18_dctr_10', '18_ptnt_15', '2018-02-13', '2018-02-12 18:58:24.499617', 0, '08-09'),
('18_apmt_5', '18_dctr_10', '18_ptnt_15', '2018-02-13', '2018-02-12 18:59:24.222273', 0, '08-09'),
('18_apmt_6', '18_dctr_10', '18_ptnt_15', '2018-02-13', '2018-02-12 19:00:14.033796', 0, '08-09'),
('18_apmt_7', '18_dctr_10', '18_ptnt_19', '2018-02-13', '2018-02-12 19:03:54.233015', 0, '09-10'),
('18_apmt_8', '18_dctr_10', '18_ptnt_19', '2018-02-13', '2018-02-12 19:04:15.806257', 0, '10-11'),
('18_apmt_9', '18_dctr_10', '18_ptnt_19', '2018-02-13', '2018-02-12 19:04:37.010359', 0, '11-12');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` varchar(10) NOT NULL,
  `designation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES
('18_dsgn_0', 'Orthopedic'),
('18_dsgn_1', 'Gynecologist'),
('18_dsgn_2', 'Dentist'),
('18_dsgn_3', 'Surgeon');

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
  `doj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `slot_id` varchar(10) NOT NULL,
  `doctor_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_dob`, `doctor_gender`, `doctor_phone`, `doctor_city`, `doctor_address`, `doctor_designation`, `doctor_email`, `doctor_password`, `doj`, `slot_id`, `doctor_exist`) VALUES
('18_dctr_10', 'mrs.pannaben', '1977-02-21', 'Female', '7896541231', 'Bhuj', 'pramukhswami nagar', 'Gynecologist', 'panna_rudani@gmail.com', 'pannaben@123', '2018-02-06 18:14:01.241210', '18_slot_1', 0),
('18_dctr_9', 'Dr.strange', '1995-02-15', 'Male', '1212121212', 'Bhuj', 'dark dimension', 'Surgeon', 'dr.strange@gmail.com', 'strange@123', '2018-02-06 17:41:20.870117', '18_slot_0', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `s1` tinyint(1) NOT NULL,
  `s2` tinyint(1) NOT NULL,
  `s3` tinyint(1) NOT NULL,
  `s4` tinyint(1) NOT NULL,
  `s5` tinyint(1) NOT NULL,
  `s6` tinyint(1) NOT NULL,
  `s7` tinyint(1) NOT NULL,
  `s8` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `doctor_id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`) VALUES
('18_slot_0', '18_dctr_9', 0, 0, 1, 1, 0, 0, 0, 0),
('18_slot_1', '18_dctr_10', 1, 1, 1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(10) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_phone` varchar(15) NOT NULL,
  `staff_city` varchar(30) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staff_type` varchar(30) NOT NULL,
  `staff_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_dob`, `staff_gender`, `staff_phone`, `staff_city`, `staff_address`, `staff_email`, `staff_password`, `doj`, `staff_type`, `staff_exist`) VALUES
('18_staf_1', 'mr.staff', '1990-02-23', 'Male', '1236445455', 'ahemdabad', 'paldi', 'staff@gmail.com', 'staff@123', '2018-02-12 17:45:44', 'Nurse', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` varchar(10) NOT NULL,
  `ward_name` varchar(10) NOT NULL,
  `ward_capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adminssion`
--
ALTER TABLE `adminssion`
  ADD PRIMARY KEY (`adminssion_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

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
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

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
