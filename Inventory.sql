-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2016 at 02:04 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `emp_dept` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `emp_contact` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `equipments_list` text COLLATE armscii8_bin
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_dept`, `emp_contact`, `equipments_list`) VALUES
(2, 'David', 'IT', '03336655998', NULL),
(5, 'Wafa Khan Rizwi', 'HR', '033355448987', NULL),
(6, 'Shahid', 'IT', '03334875819917', 'Laptop,Screw,Comb');

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `equipment_id` int(11) NOT NULL,
  `equ_name` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `equ_category` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `equ_no_items` varchar(45) COLLATE armscii8_bin DEFAULT NULL,
  `Equ_details` text COLLATE armscii8_bin,
  `date` text COLLATE armscii8_bin
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`equipment_id`, `equ_name`, `equ_category`, `equ_no_items`, `Equ_details`, `date`) VALUES
(2, 'Macbook Pro', 'Laptop', '3', NULL, NULL),
(3, 'Macbook Pro', 'Laptop', '3', NULL, NULL),
(4, 'Screw Driver', 'Tools', '4', 'Used to open up Screwed, Iam.', NULL),
(5, 'Ranch', 'Tools', '4', 'Wheel Opener', '2016-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `lendequipment`
--

CREATE TABLE `lendequipment` (
  `lend_id` int(11) NOT NULL,
  `employee_name` text,
  `equipment_name` text,
  `equipement_category` text,
  `quantity` text,
  `lend_date` text,
  `return_date` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lendequipment`
--

INSERT INTO `lendequipment` (`lend_id`, `employee_name`, `equipment_name`, `equipement_category`, `quantity`, `lend_date`, `return_date`) VALUES
(1, 'Wowie', 'disk', 'Hardone', '2', NULL, '2016-08-12'),
(2, 'Rihanna', 'Guitar', 'Musical', '2', NULL, '2016-08-12'),
(3, 'volvo', 'volvo', 'volvo', '2', NULL, '2016-08-12'),
(4, 'volvo', 'volvo', 'volvo', '2', NULL, '2016-08-12'),
(5, 'test', 'Laptop', 'Computers', '3', NULL, '2016-08-12'),
(6, 'David', 'Macbook Pro', 'Tools', '3', '2016-08-12', '2016-08-12'),
(7, 'Wafa Khan Rizwi', 'Screw Driver', 'Tools', '4', '2016-08-12', '2016-08-12'),
(8, 'Shahid', 'Ranch', 'Tools', '4', '2016-08-12', '2016-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `emp_id` int(11) NOT NULL,
  `emp_password` varchar(10) COLLATE armscii8_bin DEFAULT NULL,
  `emp_username` varchar(10) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `emp_password`, `emp_username`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `lendequipment`
--
ALTER TABLE `lendequipment`
  ADD PRIMARY KEY (`lend_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lendequipment`
--
ALTER TABLE `lendequipment`
  MODIFY `lend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
