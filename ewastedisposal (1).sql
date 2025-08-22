-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 06:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ewastedisposal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `acc_no` varchar(50) NOT NULL,
  `ownername` varchar(100) NOT NULL,
  `ifsccode` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`acc_no`, `ownername`, `ifsccode`, `amount`) VALUES
('1111111111111111', 'qwe', '1234', '330'),
('1234567890', 'ABC', '12345', '11481'),
('12345678901', 'ADMIN', '1111', '191210');

-- --------------------------------------------------------

--
-- Table structure for table `company_category`
--

CREATE TABLE IF NOT EXISTS `company_category` (
`cmp_cat_id` int(11) NOT NULL,
  `cmp_cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_category`
--

INSERT INTO `company_category` (`cmp_cat_id`, `cmp_cat_name`) VALUES
(2, 'Hospital'),
(4, 'School'),
(5, 'Textiles'),
(6, 'Restaurent'),
(7, 'Airport office'),
(9, 'Railway Office'),
(10, 'clinic'),
(11, 'showroom'),
(12, 'College');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`cust_id` int(11) NOT NULL,
  `com_cat_id` int(11) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `com_cat_id`, `pincode`, `company_name`, `location`, `state`, `city`, `phone`, `added_by`, `email`) VALUES
(1, 2, '896689', 'st thomas', 'Kottayam', 'Kerala', 'chy', '7867867863', 'admin@gmail.com', 'stthomas@gmail.com'),
(2, 12, '987877', 'Assumption college changanseery', 'Alappuzha', 'Kerala', 'cht', '6898969866', 'admin@gmail.com', 'assunption@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`emp_id` int(11) NOT NULL,
  `employee_type` varchar(200) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `employee_type`, `emp_name`, `phone`, `gender`, `city`, `email`, `district`) VALUES
(1, '', 'manu', '9874563211', 'Female', 'chy', 'manu@gmail.com', 'Kottayam'),
(2, '', 'Thanu', '9897786786', 'Female', 'trissur', 'thanu@gmail.com', 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `ewaste_category`
--

CREATE TABLE IF NOT EXISTS `ewaste_category` (
`catid` int(11) NOT NULL,
  `catname` varchar(60) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewaste_category`
--

INSERT INTO `ewaste_category` (`catid`, `catname`, `price`) VALUES
(1, 'recovery', '500'),
(3, 'Recycling', '1000'),
(4, 'disposal', '200');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE IF NOT EXISTS `forgotpassword` (
`forgotpassword_id` int(11) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `random_number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`forgotpassword_id`, `email_id`, `random_number`) VALUES
(1, 'admin@gmail.com', 958015),
(2, 'admin@gmail.com', 959652),
(3, 'amlachirayil123@gmail.com', 929125),
(4, 'amlachirayil123@gmail.com', 891182),
(5, 'amlachirayil123@gmail.com', 889629),
(6, 'amlachirayil123@gmail.com', 952640),
(7, 'scm.maheshspillai@gmai.com', 906508),
(8, 'amla.faithinfo@gmail.com', 913313),
(9, 'amla.faithinfo@gmail.com', 990173),
(10, 'scm.maheshspillai@gmai.com', 955668),
(11, 'scm.maheshspillai@gmai.com', 929271),
(12, 'amla.faithinfo@gmail.com', 957509);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `usertype`, `status`) VALUES
('admin@gmail.com', 'admin', 'admin', 'active'),
('assunption@gmail.com', 'abc123', 'company', 'active'),
('manu@gmail.com', '9874563211', 'fieldofficer', 'active'),
('stthomas@gmail.com', '123456', 'company', 'active'),
('thanu@gmail.com', '9897786786', 'fieldofficer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `request_items`
--

CREATE TABLE IF NOT EXISTS `request_items` (
`req_item_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `item_title` varchar(70) NOT NULL,
  `e_cat_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`req_item_id`, `req_id`, `item_title`, `e_cat_id`, `description`, `qty`, `amount`) VALUES
(1, 1, 'e waste manner', 1, 'one year garanteed computer small problems', 3, 400),
(2, 2, 'paper waste', 3, 'news paperwaste', 10, 900),
(3, 2, 'Electronic waste', 1, 'nvb', 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_employee`
--

CREATE TABLE IF NOT EXISTS `schedule_employee` (
`sch_emp_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sch_date` date NOT NULL,
  `collected_date` date DEFAULT NULL,
  `sch_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_employee`
--

INSERT INTO `schedule_employee` (`sch_emp_id`, `req_id`, `emp_id`, `sch_date`, `collected_date`, `sch_status`) VALUES
(1, 1, 1, '2022-10-27', '2022-10-27', 'completed'),
(2, 2, 1, '2023-01-06', '2023-01-15', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `selling_request`
--

CREATE TABLE IF NOT EXISTS `selling_request` (
`request_id` int(11) NOT NULL,
  `comp_email` varchar(200) NOT NULL,
  `req_date` date NOT NULL,
  `req_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling_request`
--

INSERT INTO `selling_request` (`request_id`, `comp_email`, `req_date`, `req_status`) VALUES
(1, 'assunption@gmail.com', '2022-10-27', 'collected'),
(2, 'stthomas@gmail.com', '2022-10-27', 'collected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `company_category`
--
ALTER TABLE `company_category`
 ADD PRIMARY KEY (`cmp_cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `ewaste_category`
--
ALTER TABLE `ewaste_category`
 ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
 ADD PRIMARY KEY (`forgotpassword_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
 ADD PRIMARY KEY (`req_item_id`);

--
-- Indexes for table `schedule_employee`
--
ALTER TABLE `schedule_employee`
 ADD PRIMARY KEY (`sch_emp_id`);

--
-- Indexes for table `selling_request`
--
ALTER TABLE `selling_request`
 ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_category`
--
ALTER TABLE `company_category`
MODIFY `cmp_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ewaste_category`
--
ALTER TABLE `ewaste_category`
MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
MODIFY `forgotpassword_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
MODIFY `req_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule_employee`
--
ALTER TABLE `schedule_employee`
MODIFY `sch_emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `selling_request`
--
ALTER TABLE `selling_request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
