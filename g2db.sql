-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 07:01 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apmt`
--

CREATE TABLE `apmt` (
  `apmt_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `cost` varchar(30) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `date`, `name`, `cost`, `amount`) VALUES
(10, '2018-06-05 17:46:06', 'Hair cut - Long', '40', '3'),
(5, '2018-06-05 15:56:58', 'Wash & Blow', '20', '1'),
(4, '2018-05-30 15:37:18', 'hair cut -woman short', '35', '1'),
(6, '2018-06-05 17:03:59', 'Wash & Blow', '20', '1'),
(7, '2018-06-05 17:03:59', 'Loreal Hair Shampoo', '30.25', '1'),
(8, '2018-06-05 17:04:57', 'Wash & Blow', '20', '1'),
(9, '2018-06-05 17:08:05', 'Wash & Blow', '20', '1'),
(11, '2018-06-07 11:20:43', 'Loreal Hair Shampoo', '30.25', '1'),
(12, '2018-06-11 01:26:46', 'Loreal Hair Shampoo', '30.25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(1) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `name`) VALUES
(1, 'Payment'),
(2, 'Timetable'),
(3, 'Report'),
(4, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cost`, `type`) VALUES
(1, 'Loreal Hair Shampoo', '30.25', 'product'),
(2, 'Loreal Hair Pack', '42.55', 'product'),
(3, 'Loreal Conditioner', '22.68', 'product'),
(4, 'Loreal Hair Dye', '38.22', 'product'),
(5, 'Hair cut - Short', '30', 'service'),
(6, 'Hair cut - Long', '40', 'service'),
(7, 'Hair coloring', '138', 'service'),
(8, 'Hair & Scalp Treatment', '158', 'service'),
(9, 'Rebonding & Perm', '148', 'service'),
(11, 'Aesop Rinse', '62.00', 'product'),
(14, 'Aesop Shampoo', '66.28', 'product'),
(15, 'Wash & Blow', '20', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `list_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `name`, `description`, `list_id`) VALUES
(1, 'Sales report', 'report for overall sales', 3),
(2, 'Purchase report', 'report for purchases', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `contact`, `dob`) VALUES
(2, 'Jackson', 'jacky@gmail.com', '87654321', '1988-02-16'),
(5, 'Daniel Ibrahim', 'Dan11@gmail.com', '64528315', '1990-08-01'),
(6, 'Park Byoung Jun', 'pbj408@gmail.com', '89027055', '1994-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeslot_id` int(11) NOT NULL,
  `extent` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeslot_id`, `extent`) VALUES
(1, '9am'),
(2, '10am'),
(3, '11am'),
(4, '1pm'),
(5, '2pm'),
(6, '3pm'),
(7, '4pm'),
(8, '5pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apmt`
--
ALTER TABLE `apmt`
  ADD PRIMARY KEY (`apmt_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeslot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apmt`
--
ALTER TABLE `apmt`
  MODIFY `apmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
