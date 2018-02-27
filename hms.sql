-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 04:25 AM
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
('18_apmt_0', '18_dctr_0', '18_ptnt_3', '2018-02-25', '2018-02-25 17:00:33.253906', 0, '08-09'),
('18_apmt_1', '18_dctr_0', '18_ptnt_5', '2018-02-25', '2018-02-25 17:01:07.097656', 0, '09-10'),
('18_apmt_2', '18_dctr_0', '18_ptnt_6', '2018-02-25', '2018-02-25 17:01:50.566406', 0, '04-05'),
('18_apmt_3', '18_dctr_3', '18_ptnt_5', '2018-02-25', '2018-02-25 17:25:41.986328', 0, '10-11'),
('18_apmt_4', '18_dctr_3', '18_ptnt_5', '2018-02-25', '2018-02-25 17:25:55.751953', 0, '04-05'),
('18_apmt_5', '18_dctr_2', '18_ptnt_6', '2018-02-26', '2018-02-25 19:46:51.394085', 0, '11-12');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `bed_id` varchar(10) NOT NULL,
  `ward_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `bed_status` tinyint(1) NOT NULL,
  `bed_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`bed_id`, `ward_id`, `patient_id`, `doctor_id`, `staff_id`, `bed_status`, `bed_exist`) VALUES
('18_bedd_0', '18_ward_0', '', '', '', 0, 0),
('18_bedd_1', '18_ward_0', '', '', '', 0, 0),
('18_bedd_10', '18_ward_2', '', '', '', 0, 1),
('18_bedd_11', '18_ward_2', '', '', '', 0, 1),
('18_bedd_12', '18_ward_2', '', '', '', 0, 1),
('18_bedd_13', '18_ward_3', '', '', '', 0, 1),
('18_bedd_14', '18_ward_1', '', '', '', 0, 0),
('18_bedd_15', '18_ward_1', '', '', '', 0, 0),
('18_bedd_16', '18_ward_1', '', '', '', 0, 0),
('18_bedd_17', '18_ward_0', '', '', '', 0, 0),
('18_bedd_18', '18_ward_0', '', '', '', 0, 0),
('18_bedd_19', '18_ward_4', '', '', '', 0, 0),
('18_bedd_2', '18_ward_0', '', '', '', 0, 1),
('18_bedd_20', '18_ward_5', '', '', '', 0, 0),
('18_bedd_3', '18_ward_0', '', '', '', 0, 1),
('18_bedd_4', '18_ward_0', '', '', '', 0, 0),
('18_bedd_5', '18_ward_1', '', '', '', 0, 0),
('18_bedd_6', '18_ward_3', '', '', '', 0, 1),
('18_bedd_7', '18_ward_3', '', '', '', 0, 1),
('18_bedd_8', '18_ward_3', '', '', '', 0, 1),
('18_bedd_9', '18_ward_2', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` varchar(10) NOT NULL,
  `designation_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES
('18_dsgn_0', 'Orthopedic'),
('18_dsgn_1', 'Gynecologist');

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
('18_dctr_0', 'pannabhai mbbs', '1979-02-22', 'Male', '457849865', 'Bhuj kachch', 'pramukhswami nagar', 'Orthopedic', 'panna_bhai@gmail.com', 'pannabhai@123', '2018-02-25 13:34:21.351562', '18_slot_0', 0),
('18_dctr_1', 'pannaben', '1979-02-21', 'Female', '1234564566', 'Bhuj kachch', 'pramukhswami nagar', 'Gynecologi', 'panna_rudani@gmail.com', '123', '2018-02-25 16:04:53.246093', '18_slot_1', 1),
('18_dctr_2', 'mrs.dipali', '1991-02-21', 'Female', '1234564566', 'Bhuj kachch', 'madhapar', 'Gynecologist', 'dipali@gmail.com', 'dipali@123', '2018-02-25 17:23:13.151367', '18_slot_2', 0),
('18_dctr_3', 'damodar kheta', '1980-02-14', 'Male', '457849865', 'Bhuj kachch', 'pramukhswami nagar', 'Orthopedic', 'damodar@gmail.com', 'damodar@123', '2018-02-25 17:24:52.839843', '18_slot_3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
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
  `doj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `patient_exist` tinyint(1) NOT NULL,
  `patient_blood_group` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_gender`, `patient_email`, `patient_phone`, `patient_dob`, `patient_type`, `patient_address`, `patient_password`, `relative_name`, `relative_contact`, `added_by`, `doj`, `patient_exist`, `patient_blood_group`) VALUES
('18_ptnt_0', 'laxit', 'Male', 'patellaxit8@gmail.com', '9726412461', '0000-00-00', 0, 'Bhuj~bhujodi', '8460892026', ' manish bhanushali', '8989898989', 'Admin', '2018-02-25 13:39:22.672851', 1, ''),
('18_ptnt_1', 'parth', 'Male', 'parth@gmail.com', '8989898989', '0000-00-00', 0, 'Bhuj~vardhman nagar', 'parth@123', 'odin', '8989898989', 'Admin', '2018-02-25 13:43:34.110351', 1, ''),
('18_ptnt_2', 'hiten', 'Male', 'hiten@gmail.com', '8989898989', '0000-00-00', 0, 'Bhuj~Madhapar', '8460892026', 'odin', '8989898989', 'Admin', '2018-02-25 13:46:56.877929', 1, ''),
('18_ptnt_3', 'Anushka', 'Female', 'anushka@gmail.com', '9726412461', '2001-02-22', 0, 'Bhuj~kolkata', '8460892026', 'laxit', '9726412461', 'Admin', '2018-02-25 15:27:29.034179', 0, ''),
('18_ptnt_4', 'taniya', 'Female', '', '9726412461', '1999-02-15', 0, 'Bhuj~howrah bridge,kolkata', '', 'laxit', '8989898989', 'Admin', '2018-02-25 15:43:23.785156', 0, 'S'),
('18_ptnt_5', 'jyoti', 'Female', '', '8141458601', '1989-02-15', 0, 'Bhuj~ranchi', '', 'laxit', '8989898989', 'Admin', '2018-02-25 15:44:40.628906', 0, 'S'),
('18_ptnt_6', 'mamta ben', 'Female', '', '8989898989', '1979-02-21', 0, 'Bhuj~Madhapar', '', 'laxit', '9726412461', 'Admin', '2018-02-25 15:49:23.678710', 0, 'O-'),
('18_ptnt_7', 'laxit', 'Male', 'patellaxit8@gmail.com', '9726412461', '1997-02-10', 0, 'Bhuj~bhujodi', '8460892026', '', '', 'self', '2018-02-26 04:06:46.190429', 0, '');

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
  `s8` tinyint(1) NOT NULL,
  `slot_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_id`, `doctor_id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `slot_exist`) VALUES
('18_slot_0', '18_dctr_0', 1, 1, 0, 0, 0, 0, 0, 1, 0),
('18_slot_1', '18_dctr_1', 0, 0, 0, 0, 0, 0, 0, 0, 1),
('18_slot_2', '18_dctr_2', 0, 0, 0, 1, 0, 0, 0, 0, 0),
('18_slot_3', '18_dctr_3', 0, 0, 1, 0, 0, 0, 0, 1, 0);

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
  `staff_exist` tinyint(1) NOT NULL,
  `allocation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_dob`, `staff_gender`, `staff_phone`, `staff_city`, `staff_address`, `staff_email`, `staff_password`, `doj`, `staff_type`, `staff_exist`, `allocation`) VALUES
('18_staff_0', 'nina maclaren', '2018-02-23', 'Female', '1236445455', 'ahemdabad paldi', 'paldi chowk', 'staff@gmail.com', 'staff@123', '2018-02-25 19:33:41', 'Nurse', 0, ''),
('18_staff_1', 'pramod misra', '1997-02-28', 'Male', '1236445455', 'bhuj', 'rto circle', 'pramod@gmail.com', 'pramod@123', '2018-02-25 19:44:53', 'Wardboy', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` varchar(10) NOT NULL,
  `ward_name` varchar(38) NOT NULL,
  `ward_type` varchar(30) NOT NULL,
  `ward_capacity` int(3) NOT NULL,
  `ward_exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `ward_type`, `ward_capacity`, `ward_exist`) VALUES
('18_ward_0', '1_General_0', 'General', 0, 0),
('18_ward_1', '2_General_1', 'General', 0, 0),
('18_ward_2', '3_General_2', 'General', 0, 1),
('18_ward_3', '4_General_3', 'General', 0, 1),
('18_ward_4', '1_ICU_4', 'ICU', 0, 0),
('18_ward_5', '1_Maternity_5', 'Maternity', 0, 0);

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
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
