-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 11:50 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yasasmedilab`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `time` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_test`
--

CREATE TABLE `appointment_test` (
  `appointment_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(30) NOT NULL,
  `metric` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `bill_test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_test`
--

CREATE TABLE `bill_test` (
  `bill_test_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `precentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

CREATE TABLE `discount_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `contact_number`) VALUES
(1, 'Dumithra', 'Kahangamage', '076443222'),
(2, 'Frank', 'Fonseka', '77888553');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_f_name` varchar(100) NOT NULL,
  `employee_l_name` varchar(100) NOT NULL,
  `nic_number` varchar(15) NOT NULL DEFAULT '0000000V',
  `gender` int(11) NOT NULL,
  `dob` date NOT NULL,
  `epf_number` varchar(20) NOT NULL,
  `etf_number` varchar(20) NOT NULL,
  `date_joined` date NOT NULL,
  `employee_image_url` varchar(50) NOT NULL,
  `employee_status` int(11) NOT NULL DEFAULT 1,
  `employee_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_f_name`, `employee_l_name`, `nic_number`, `gender`, `dob`, `epf_number`, `etf_number`, `date_joined`, `employee_image_url`, `employee_status`, `employee_role`) VALUES
(1, 'Yoshitha', 'Prabodhana', '973091514V', 0, '1997-11-04', '1', '2', '2020-10-02', '1604147732_96302.jpg', 1, 1),
(2, 'demon', 'Prabodhana', '', 0, '1997-11-04', '0', '0', '0000-00-00', '1601023618_96302.jpg', 1, 1),
(3, 'yozz1', 'prabo', '', 0, '1997-11-11', '0', '0', '0000-00-00', '1604147904_Emo-Pic-Wallpapers-018.jpg', 1, 1),
(4, 'Samantha', 'Kumara', '', 0, '1989-11-04', '0', '0', '0000-00-00', '1604148575_Dark-Wallpapers-Full-HD-1080p-1-3.jpg', 1, 2),
(5, 'saman', 'saman', '', 0, '1989-11-04', '0', '0', '0000-00-00', '1601027729_1.jpg', 1, 2),
(6, 'saman', 'saman', '', 0, '1989-11-04', '0', '0', '0000-00-00', '1601028165_1.jpg', 1, 2),
(7, 'saman', 'saman', '', 0, '1989-11-04', '0', '0', '0000-00-00', '1601028366_1.jpg', 1, 2),
(8, 'Evoan', 'Alex', '973091518V', 1, '1997-04-04', '0', '0', '2020-10-09', '1604153138_Emo-Pic-Wallpapers-018.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `employee_add_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `house_no` varchar(8) NOT NULL,
  `street` varchar(30) NOT NULL,
  `town` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_address`
--

INSERT INTO `employee_address` (`employee_add_id`, `employee_id`, `house_no`, `street`, `town`) VALUES
(1, 1, '488/2A', 'Kulathunga Mw, Makumbura', 'Pannipitiya'),
(2, 3, '444', 'Sumudu Mw, Makumbura', 'Pannipitiya'),
(3, 4, '220', 'Yakkala', 'Kadana'),
(4, 5, '220', 'Yakkala', 'Kadana'),
(5, 6, '220', 'Yakkala', 'Kadana'),
(6, 7, '220', 'Yakkala', 'Kadana'),
(7, 8, '220', 'Temple Rd', 'Hatton');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

CREATE TABLE `employee_contact` (
  `employee_con_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `telephone_number` varchar(14) NOT NULL,
  `telephone_number_2` varchar(14) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`employee_con_id`, `employee_id`, `telephone_number`, `telephone_number_2`, `email`) VALUES
(1, 1, '0112468455', '0762486365', 'yoshithaprabo@gmail.com'),
(2, 2, '+94112759732', '0762486365', 'yoshitha@gmail.com'),
(3, 3, '+94112759731', '0762486365', 'yozz@mailinator.com'),
(4, 4, '+94112896899', '0762486365', 'saman@email.com'),
(5, 5, '+94112896899', '0762486365', 'saman1@email.com'),
(6, 6, '+94112896899', '0762486365', 'saman2@email.com'),
(7, 7, '+94112896899', '0762486365', 'saman3@email.com'),
(8, 8, '+94112759732', '0762486365', 'evoan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `employee_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `first_login` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `password_changed` int(11) NOT NULL DEFAULT 0,
  `previous_loged` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`employee_id`, `login_id`, `employee_email`, `emp_password`, `first_login`, `last_login`, `password_changed`, `previous_loged`) VALUES
(1, 2, 'yoshitha@gmail.com', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2020-10-24 11:48:11', '2020-12-10 20:07:17', 1, 1),
(3, 3, 'yozz@mailinator.com', '73a63b57b58e245ef9e458a03fb68392fb223ad0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 4, 'saman@email.com', 'b3aef6321a03dde8014e69efff54ba4edd933b4d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 5, 'saman1@email.com', '25534b2343d05c33d9a56709946b81af7cc0c9b4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 6, 'saman2@email.com', 'cd9ce613b79f70b46293335e989728c5cacfaed3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 7, 'saman3@email.com', 'a3ee2a41707ed12e5398e3b6aa36c257b54c6ddf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 8, 'evoan@gmail.com', '7684bf438e50cad96b44d6b302862a80432b2e28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_logs`
--

CREATE TABLE `employee_logs` (
  `employee_id` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` date NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `function_id` int(11) NOT NULL,
  `function_name` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `function_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function_user`
--

CREATE TABLE `function_user` (
  `function_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(100) NOT NULL,
  `commission` float(10,2) NOT NULL,
  `lab_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_name`, `commission`, `lab_status`) VALUES
(1, 'Yasas Medi Lab', 0.00, 1),
(2, 'Asiri Medi Lab', 0.25, 1),
(3, 'Durdans', 0.25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_contact`
--

CREATE TABLE `lab_contact` (
  `lab_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `collector_no` varchar(100) NOT NULL,
  `telephone_number_1` varchar(100) NOT NULL DEFAULT '000000',
  `telephone_number_2` varchar(100) NOT NULL DEFAULT '000000',
  `address_no` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_contact`
--

INSERT INTO `lab_contact` (`lab_id`, `email`, `collector_no`, `telephone_number_1`, `telephone_number_2`, `address_no`, `street`, `town`) VALUES
(1, 'yasas.medilab@gmail.com', '0779608533', '0762486365', '7589356475', '80', 'Yasas Medi Lab,Colombo Rd,', 'Padukka'),
(2, 'asiri@asiri.com', '000000000', '000000000000', '00000000000', '00', 'Asiri Hospital', 'Colombo'),
(3, 'durdans@durdans.com', '0783968073', '0783968073', '0783968073', '488/2A', 'Kulathunga Mw', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledger_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(40) NOT NULL,
  `module_path` varchar(40) NOT NULL,
  `module_image` varchar(40) NOT NULL,
  `module_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_path`, `module_image`, `module_status`) VALUES
(1, 'Patient Management', 'patient.php', 'patient.png', 1),
(2, 'Appointment Management', 'appointment.php', 'appointment.png', 1),
(3, 'Third Party Management', 'third_party.php', 'third_party.png', 1),
(4, 'Employee Management', 'employee.php', 'employee.jpg', 1),
(5, 'Stock Mangement', 'stock.php', 'stock.png', 1),
(6, 'Medical Reporting', 'medical_reporting.php', 'medical_reporting.png', 1),
(7, 'Finance Management', 'finance.php', 'finance.png', 1),
(8, 'Billing', 'billing.php', 'billing.png', 1),
(9, 'Equipment Maintenance', 'equipment.php', 'equipment.png', 1),
(10, 'User Management', 'user.php', 'user.png', 1),
(11, 'Logs Management', 'logs.php', 'logs.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`role_id`, `module_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
(2, 8),
(1, 1),
(1, 4),
(1, 10),
(1, 11),
(3, 6),
(3, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 9),
(6, 7),
(6, 8),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_f_name` varchar(30) NOT NULL,
  `patient_l_name` varchar(30) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` int(11) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `date_joined` date NOT NULL,
  `patient_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_f_name`, `patient_l_name`, `d_o_b`, `gender`, `nic`, `contact_id`, `image_url`, `date_joined`, `patient_status`) VALUES
(1, 'Yoshithaz', 'Prabodhanaz', '1997-11-04', 0, '973091514V', 0, 'defaultImage.jpg', '0000-00-00', 1),
(2, 'Evoan', 'Alex', '1997-12-01', 1, '974567896V', 0, 'defaultImage.jpg', '2020-11-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_address`
--

CREATE TABLE `patient_address` (
  `address_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_address`
--

INSERT INTO `patient_address` (`address_id`, `patient_id`, `house_no`, `street`, `town`) VALUES
(1, 1, '488/2A,', 'Kulathunga Mw, Makumbura', 'Pannipitiya'),
(2, 2, '488/2A,', 'Kulathunga Mw, Makumbura', 'Pannipitiya');

-- --------------------------------------------------------

--
-- Table structure for table `patient_contact`
--

CREATE TABLE `patient_contact` (
  `contact_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `telephone_number_2` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_contact`
--

INSERT INTO `patient_contact` (`contact_id`, `patient_id`, `email`, `telephone_number`, `telephone_number_2`, `address_id`) VALUES
(1, 1, 'yoshithaprabo@gmail.com', 762486365, 762486365, 0),
(2, 2, 'evoan@gmail.com', 762486365, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_login`
--

CREATE TABLE `patient_login` (
  `patient_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `first_login` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `password_changed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_login`
--

INSERT INTO `patient_login` (`patient_id`, `login_id`, `email`, `patient_password`, `first_login`, `last_login`, `password_changed`) VALUES
(1, 1, 'yoshithaprabo@gmail.com', '26370dd55a38a0a711d163806a3c03c7e88eb98d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 2, 'evoan@gmail.com', 'c3582a28836e7bf8598a02903a82feb253507134', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_logs`
--

CREATE TABLE `patient_logs` (
  `patient_id` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `test_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Admin', 1),
(2, 'Cashier', 1),
(3, 'Patient', 1),
(4, 'Stock Keeper', 1),
(5, 'Data Entry Clerk', 1),
(6, 'Accountant', 1),
(7, 'MLT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_category`
--

CREATE TABLE `stock_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `metric` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `category_id`) VALUES
(1, 'B.S.S', 1),
(2, 'BT,CT', 1),
(3, 'EGFR', 1),
(4, 'Serum Createnine', 1),
(5, 'ESR', 1),
(6, 'WBC,DC', 1),
(7, 'FBC', 1),
(8, 'FBS', 1),
(9, 'GCT', 1),
(10, 'HB', 1),
(11, 'Blood Group', 1),
(12, 'VDRL', 1),
(13, 'HBA1C', 1),
(14, 'L.F.T', 1),
(15, 'LIPID PROFILE', 1),
(16, 'O.G.T.T', 1),
(17, 'P.A.P', 1),
(18, 'PLATELET', 1),
(19, 'PCV', 1),
(20, 'PREGNENCY', 2),
(21, 'S.A.T', 1),
(22, 'S. PROTEIN', 1),
(23, 'S.A.F.B', 1),
(24, 'S.BILRUBIN', 1),
(25, 'S.CALSIUM', 1),
(26, 'S.E', 1),
(27, 'S.F.A', 1),
(28, 'SEMINAL', 5),
(29, 'S.F.R', 3),
(30, 'U.F.R', 2),
(31, 'U.M.A.L', 2),
(32, 'UREA', 1),
(33, 'CRP', 1),
(34, 'RH.FACTOR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_attribute`
--

CREATE TABLE `test_attribute` (
  `test_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`category_id`, `category_name`) VALUES
(1, 'blood'),
(2, 'urine'),
(3, 'stool'),
(4, 'stem'),
(5, 'semen');

-- --------------------------------------------------------

--
-- Table structure for table `test_price`
--

CREATE TABLE `test_price` (
  `test_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`employee_add_id`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`employee_con_id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_address`
--
ALTER TABLE `patient_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `patient_contact`
--
ALTER TABLE `patient_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `patient_login`
--
ALTER TABLE `patient_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_address`
--
ALTER TABLE `employee_address`
  MODIFY `employee_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `employee_con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_login`
--
ALTER TABLE `employee_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_address`
--
ALTER TABLE `patient_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_contact`
--
ALTER TABLE `patient_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_login`
--
ALTER TABLE `patient_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
