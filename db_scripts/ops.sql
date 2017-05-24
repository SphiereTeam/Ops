-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 09:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `EmpNo` int(11) NOT NULL,
  `Year` varchar(5) NOT NULL,
  `Month` varchar(12) NOT NULL,
  `Punch_card_upload` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `EmpNo`, `Year`, `Month`, `Punch_card_upload`, `created`, `status`) VALUES
(11, 1, '2017', '1', '', '2017-04-21', '1'),
(12, 3, '2017', '1', '', '2017-04-21', '1'),
(13, 1, '2017', '2', '', '2017-04-21', '1'),
(14, 2, '2017', '1', '', '2017-04-27', '2'),
(15, 3, '2017', '2', '', '2017-04-27', '3'),
(16, 3, '2017', '3', '', '2017-04-27', '1'),
(17, 9, '2017', '3', '', '2017-04-27', '1'),
(18, 1, '2017', '3', '', '2017-04-28', '1'),
(20, 1, '2017', '4', '', '2017-04-29', '1'),
(21, 1, '', '', '', '0000-00-00', '1'),
(22, 1, '', '', '', '0000-00-00', '1'),
(23, 1, '', '', '', '0000-00-00', '1'),
(24, 1, '', '', '', '0000-00-00', '1'),
(25, 3, '', '', '', '0000-00-00', '3'),
(26, 1, '', '', '', '0000-00-00', '1'),
(27, 1, '', '', '', '0000-00-00', '1'),
(28, 1, '', '', '', '0000-00-00', '1'),
(29, 1, '', '', '', '0000-00-00', '1'),
(30, 1, '', '', '', '0000-00-00', '1'),
(31, 1, '', '', '', '0000-00-00', '1'),
(32, 1, '', '', '', '0000-00-00', '1'),
(33, 1, '', '', '', '0000-00-00', '1'),
(34, 1, '', '', '', '0000-00-00', '1'),
(35, 1, '', '', '', '0000-00-00', '1'),
(36, 1, '', '', '', '0000-00-00', '1'),
(37, 1, '', '', '', '0000-00-00', '1'),
(38, 1, '', '', '', '0000-00-00', '1'),
(39, 1, '', '', '', '0000-00-00', '1'),
(40, 1, '', '', '', '0000-00-00', '1'),
(41, 1, '', '', '', '0000-00-00', '1'),
(42, 1, '', '', '', '0000-00-00', '1'),
(43, 1, '', '', '', '0000-00-00', '1'),
(44, 1, '', '', '', '0000-00-00', '1'),
(45, 1, '', '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_calculate`
--

CREATE TABLE `attendance_calculate` (
  `att_cal_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `no_of_days` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `tap` varchar(255) NOT NULL,
  `scp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_calculate`
--

INSERT INTO `attendance_calculate` (`att_cal_id`, `attendance_id`, `student_id`, `no_of_days`, `payment`, `overtime`, `tap`, `scp`, `status`) VALUES
(1, 11, '1', '1.5', '75', '', '', '', 'active'),
(2, 12, '3', '2', '60', '', '', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `attendance_details_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `AM_IN` time DEFAULT NULL,
  `AM_OUT` time DEFAULT NULL,
  `PM_IN` time DEFAULT NULL,
  `PM_OUT` time DEFAULT NULL,
  `OT_IN` time DEFAULT NULL,
  `OT_OUT` time DEFAULT NULL,
  `2nd_OT_IN` time NOT NULL,
  `2nd_OT_OUT` time NOT NULL,
  `Norm_hrs` double NOT NULL,
  `OT_hrs` double NOT NULL,
  `OT_off_day_less_4hrs` varchar(255) NOT NULL,
  `OT_off_day_over_4hrs` varchar(255) NOT NULL,
  `OT_off_day_over_8hrs` varchar(255) NOT NULL,
  `late_hrs` double NOT NULL,
  `Remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`attendance_details_id`, `attendance_id`, `date`, `AM_IN`, `AM_OUT`, `PM_IN`, `PM_OUT`, `OT_IN`, `OT_OUT`, `2nd_OT_IN`, `2nd_OT_OUT`, `Norm_hrs`, `OT_hrs`, `OT_off_day_less_4hrs`, `OT_off_day_over_4hrs`, `OT_off_day_over_8hrs`, `late_hrs`, `Remarks`) VALUES
(182, 11, '2017-01-01', '07:00:00', '12:00:00', '13:00:00', '13:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 4.5, 0, '', '', '', 0, ''),
(183, 11, '2017-01-02', '07:00:00', '23:00:00', '14:30:00', '17:45:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6.75, 0, '', '', '', 0, ''),
(184, 12, '2017-01-01', '19:00:00', '22:00:00', '14:00:00', '15:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 8, 0, '', '', '', 0, ''),
(185, 12, '2017-01-02', '20:00:00', '12:45:00', '13:00:00', '12:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 9, 0, '', '', '', 0, ''),
(186, 13, '1970-01-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(187, 14, '2017-01-01', '07:00:00', '12:00:00', '13:00:00', '16:30:00', '16:30:00', '20:30:00', '00:00:00', '00:00:00', 7, 4, '', '', '', 0, 'Function'),
(188, 14, '2017-01-02', '08:00:00', '12:00:00', '14:30:00', '20:40:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6.75, 0, '', '', '', 0, ''),
(189, 14, '2017-01-03', '09:00:00', '14:30:00', '15:00:00', '21:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.25, 0, '', '', '', 0, ''),
(190, 14, '2017-01-04', '09:00:00', '15:23:00', '17:06:00', '18:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 3.25, 0, '', '', '', 0, ''),
(191, 14, '2017-01-05', '06:00:00', '09:00:00', '10:00:00', '15:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 2.5, 0, '', '', '', 0, ''),
(192, 14, '2017-01-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, 'off day'),
(193, 14, '2017-01-07', '08:00:00', '10:00:00', '13:00:00', '17:30:00', '17:30:00', '20:00:00', '00:00:00', '00:00:00', 5.75, 2.5, '', '', '', 0, 'function'),
(194, 14, '2017-01-08', '09:00:00', '14:00:00', '15:00:00', '17:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5, 0, '', '', '', 0, ''),
(195, 14, '2017-01-09', '09:00:00', '11:00:00', '16:00:00', '21:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 3.25, 0, '', '', '', 0, ''),
(196, 14, '2017-01-10', '10:00:00', '12:00:00', '14:00:00', '18:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.25, 0, '', '', '', 0, ''),
(197, 14, '2017-01-11', '09:00:00', '12:00:00', '14:00:00', '17:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6.25, 0, '', '', '', 0, ''),
(198, 14, '2017-01-12', '10:00:00', '12:04:00', '13:00:00', '16:45:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.25, 0, '', '', '', 0, ''),
(199, 14, '2017-01-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, 'off day'),
(200, 14, '2017-01-14', '09:00:00', '12:00:00', '13:00:00', '15:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 4.5, 0, '', '', '', 0, ''),
(201, 14, '2017-01-15', '10:00:00', '12:00:00', '14:00:00', '18:45:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.25, 0, '', '', '', 0, ''),
(202, 14, '2017-01-16', '07:00:00', '11:45:00', '14:00:00', '16:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6.25, 0, '', '', '', 0, ''),
(203, 14, '2017-01-17', '07:07:00', '11:00:00', '13:00:00', '15:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5, 0, '', '', '', 0, ''),
(204, 14, '2017-01-18', '06:45:00', '11:02:00', '14:02:00', '16:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.5, 0, '', '', '', 0, ''),
(205, 14, '2017-01-19', '07:40:00', '11:00:00', '13:30:00', '17:23:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6.75, 0, '', '', '', 0, ''),
(206, 14, '2017-01-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, 'off day'),
(207, 14, '2017-01-21', '16:00:00', '21:30:00', '13:00:00', '16:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 7, 0, '', '', '', 0, ''),
(208, 14, '2017-01-22', '09:00:00', '10:00:00', '13:30:00', '16:45:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 4.25, 0, '', '', '', 0, ''),
(209, 14, '2017-01-23', '10:00:00', '11:00:00', '13:30:00', '17:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 4.5, 0, '', '', '', 0, ''),
(210, 14, '2017-01-24', '07:00:00', '11:45:00', '15:00:00', '19:40:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6, 0, '', '', '', 0, ''),
(211, 14, '2017-01-25', '08:30:00', '11:00:00', '16:00:00', '20:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 3.75, 0, '', '', '', 0, ''),
(212, 14, '2017-01-26', '07:07:00', '11:45:00', '16:00:00', '20:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5, 0, '', '', '', 0, ''),
(213, 14, '2017-01-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, 'off day'),
(214, 14, '2017-01-28', '06:06:00', '11:00:00', '13:00:00', '16:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 6, 0, '', '', '', 0, ''),
(215, 14, '2017-01-29', '09:00:00', '11:00:00', '15:00:00', '17:00:00', '18:06:00', '21:00:00', '00:00:00', '00:00:00', 4, 3, '', '', '', 0, 'function'),
(216, 14, '2017-01-30', '08:00:00', '11:00:00', '13:00:00', '15:00:00', '17:30:00', '00:00:00', '00:00:00', '00:00:00', 4.5, 0, '', '', '', 0, ''),
(217, 14, '2017-01-31', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, 'off day'),
(218, 15, '2017-02-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(219, 15, '2017-02-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(220, 15, '2017-02-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(221, 15, '2017-02-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(222, 15, '2017-02-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(223, 15, '2017-02-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(224, 15, '2017-02-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(225, 15, '2017-02-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(226, 15, '2017-02-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(227, 15, '2017-02-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(228, 15, '2017-02-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(229, 15, '2017-02-12', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(230, 15, '2017-02-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(231, 15, '2017-02-14', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(232, 15, '2017-02-15', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(233, 15, '2017-02-16', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(234, 15, '2017-02-17', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(235, 15, '2017-02-18', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(236, 15, '2017-02-19', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(237, 15, '2017-02-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(238, 15, '2017-02-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(239, 15, '2017-02-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(240, 15, '2017-02-23', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(241, 15, '2017-02-24', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(242, 15, '2017-02-25', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(243, 15, '2017-02-26', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(244, 15, '2017-02-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(245, 15, '2017-02-28', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(246, 16, '2017-03-01', '06:00:00', '23:00:00', '13:00:00', '18:00:00', '18:00:00', '19:00:00', '00:00:00', '00:00:00', 7.75, 1, '', '', '', 0, 'function'),
(247, 16, '2017-03-02', '07:00:00', '12:00:00', '13:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 7.75, 0, '', '', '', 0, ''),
(248, 17, '2017-03-01', '07:00:00', '12:00:00', '13:03:00', '17:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 7.75, 0, '', '', '', 0, ''),
(249, 17, '2017-03-02', '07:39:00', '11:00:00', '14:30:00', '17:15:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 5.75, 0, '', '', '', 0, ''),
(250, 18, '2017-03-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(251, 18, '2017-03-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(253, 20, '2017-04-01', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(254, 20, '2017-04-02', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(255, 20, '2017-04-03', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(256, 20, '2017-04-04', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(257, 20, '2017-04-05', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(258, 20, '2017-04-06', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(259, 20, '2017-04-07', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(260, 20, '2017-04-08', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(261, 20, '2017-04-09', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(262, 20, '2017-04-10', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(263, 20, '2017-04-11', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(264, 20, '2017-04-12', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(265, 20, '2017-04-13', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(266, 20, '2017-04-14', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(267, 20, '2017-04-15', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(268, 20, '2017-04-16', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(269, 20, '2017-04-17', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(270, 20, '2017-04-18', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(271, 20, '2017-04-19', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(272, 20, '2017-04-20', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(273, 20, '2017-04-21', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(274, 20, '2017-04-22', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(275, 20, '2017-04-23', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(276, 20, '2017-04-24', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(277, 20, '2017-04-25', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(278, 20, '2017-04-26', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(279, 20, '2017-04-27', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(280, 20, '2017-04-28', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(281, 20, '2017-04-29', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, ''),
(282, 20, '2017-04-30', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_flow`
--

CREATE TABLE `attendance_flow` (
  `attendance_flow` int(11) NOT NULL,
  `flow_name` varchar(20) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_status`
--

CREATE TABLE `attendance_status` (
  `att_appr_id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `1_status` varchar(20) NOT NULL,
  `1_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `1_remarks` varchar(255) NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `pointer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_status`
--

INSERT INTO `attendance_status` (`att_appr_id`, `attendance_id`, `1`, `1_status`, `1_timestamp`, `1_remarks`, `current_status`, `pointer`) VALUES
(12, 11, 1, 'approved', '2017-04-26 12:49:16', '', 'ready', 1),
(14, 12, 1, 'approved', '2017-04-26 12:57:59', '', 'ready', 1),
(15, 11, 1, 'approved', '2017-04-26 12:26:37', '', 'ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empapprover`
--

CREATE TABLE `empapprover` (
  `ApproverEmpID` int(11) NOT NULL,
  `ApproverEmpNo` varchar(255) DEFAULT NULL,
  `EmpNo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empapprover`
--

INSERT INTO `empapprover` (`ApproverEmpID`, `ApproverEmpNo`, `EmpNo`) VALUES
(1, '1', '1'),
(9, '9', '9');

-- --------------------------------------------------------

--
-- Table structure for table `empsupervisor`
--

CREATE TABLE `empsupervisor` (
  `EmpSupervisorID` int(11) NOT NULL,
  `EmpNo` varchar(255) DEFAULT NULL,
  `EmpSuperNo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `leave_app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_day` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `leave_reason` text NOT NULL,
  `date_applied` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_remarks` varchar(250) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`leave_app_id`, `user_id`, `start_date`, `end_date`, `no_of_day`, `type`, `leave_reason`, `date_applied`, `status`, `status_remarks`, `comments`) VALUES
(34, 25, '2015-12-04', '2015-12-12', 7, 'Annual Leave Entitlement', 'vacation with family', '2015-11-03', 'approved', 'approved by Mimi', ''),
(35, 10, '2015-11-26', '2015-11-27', 2, 'Others', 'Dental Appointment', '2015-11-03', 'approved', 'approved by Zaldy', ''),
(36, 34, '2015-12-03', '2015-12-06', 2, 'Annual Leave Entitlement', 'Attend sister wedding', '2015-11-03', 'approved', 'approved by Mimi', ''),
(37, 34, '2015-12-10', '2015-12-13', 2, 'Annual Leave Entitlement', 'sister reception wedding', '2015-11-03', 'approved', 'approved by Mimi', ''),
(38, 22, '0000-00-00', '0000-00-00', 1, 'Annual Leave Entitlement', 'Half day ', '2015-11-03', 'declined', 'declined by Mimi', 'i cannot go back to the past'),
(40, 22, '2015-11-28', '2015-11-29', 1, 'Annual Leave Entitlement', 'half day', '2015-11-03', 'approved', 'approved by Mimi', ''),
(43, 8, '2015-11-06', '2015-11-06', 1, 'Others', 'Dental appointment', '2015-11-04', 'approved', 'approved by Zaldy', ''),
(44, 28, '2015-11-09', '2015-11-16', 7, 'Annual Leave Entitlement', '', '2015-11-05', 'approved', 'approved by Mimi', ''),
(45, 22, '2015-12-26', '2016-01-03', 6, 'Annual Leave Entitlement', '5 Days', '2015-11-05', 'approved', 'approved by Mimi', ''),
(46, 15, '2015-11-07', '2015-11-09', 1, 'Others', 'Family matters', '2015-11-05', 'approved', 'approved by Zaldy', ''),
(47, 14, '2015-11-07', '2015-11-07', 1, 'Emergency Leave', 'emergency leave reason: dependant falls ill.', '2015-11-08', 'approved', 'approved by PHNorraPHR', ''),
(48, 23, '2015-12-03', '2015-12-05', 2, 'Annual Leave Entitlement', 'request 2 off day after 5/12/2015', '2015-11-09', 'approved', 'approved by PHNorraPHR', ''),
(49, 29, '2015-12-08', '2015-12-31', 21, 'Annual Leave Entitlement', '', '2015-11-09', 'approved', 'approved by Mimi', ''),
(50, 13, '2015-12-14', '2016-01-03', 18, 'Annual Leave Entitlement', 'Going to Australia from 14th December 2015 until 30th December 2015. Will be back to work on 4th January 2016. That will be 21 Days of Leave, including 15 Days of Paid Leave, 4 Off Days and 2 Public Holidays.', '2015-11-09', 'approved', 'approved by Zaldy', ''),
(51, 17, '2015-12-01', '2015-12-02', 2, 'Others', 'vacation', '2015-11-10', 'approved', 'approved by PHNorraPHR', ''),
(52, 17, '2015-12-28', '2015-12-31', 4, 'Others', 'vacation', '2015-11-10', 'approved', 'approved by PHNorraPHR', ''),
(53, 9, '2015-11-25', '2015-11-26', 2, 'Annual Leave Entitlement', 'Off day. Cutting down the remaining on leave balance.', '2015-11-12', 'approved', 'approved by Zaldy', ''),
(54, 18, '2015-11-12', '2015-11-12', 1, 'Sick Leave Entitlement', 'painful both thighs, MC issued ', '2015-11-13', 'approved', 'approved by Mimi', ''),
(55, 12, '2015-11-28', '2015-12-05', 6, 'Annual Leave Entitlement', '', '2015-11-16', 'approved', 'approved by Zaldy', ''),
(56, 33, '2015-11-28', '2015-11-30', 1, 'Others', '', '2015-11-16', 'approved', 'approved by PHNorraPHR', ''),
(57, 28, '2015-12-21', '2015-12-31', 10, 'Annual Leave Entitlement', '', '2015-11-18', 'declined', 'declined by Mimi', 'cancelled'),
(58, 28, '2015-12-01', '2015-12-05', 5, 'Annual Leave Entitlement', '', '2015-11-18', 'approved', 'approved by Mimi', ''),
(59, 8, '2015-11-17', '2015-11-18', 2, 'Sick Leave Entitlement', '', '2015-11-19', 'approved', 'approved by Zaldy', ''),
(60, 28, '2015-12-07', '2015-12-24', 16, 'Annual Leave Entitlement', '', '2015-11-19', 'declined', 'declined by Mimi', 'wrong entry'),
(61, 28, '2015-12-07', '2015-12-21', 13, 'Annual Leave Entitlement', '', '2015-11-21', 'approved', 'approved by Mimi', ''),
(62, 6, '2015-12-14', '2015-12-16', 3, 'Annual Leave Entitlement', 'Vacation', '2015-11-23', 'approved', 'approved by PHNorraPHR', ''),
(63, 7, '2015-12-21', '2016-01-02', 11, 'Annual Leave Entitlement', 'Stress Release', '2015-11-24', 'approved', 'approved by Zaldy', ''),
(64, 8, '2015-12-05', '2015-12-07', 2, 'Annual Leave Entitlement', '', '2015-11-28', 'approved', 'approved by Zaldy', ''),
(65, 9, '2015-12-25', '2015-12-26', 1, 'Annual Leave Entitlement', 'last on leave balance.', '2015-12-10', 'approved', 'approved by Zaldy', ''),
(66, 9, '2015-12-31', '2015-12-31', 1, 'Annual Leave Entitlement', 'last on leave balance.', '2015-12-10', 'approved', 'approved by Zaldy', ''),
(67, 15, '2015-12-19', '2015-12-21', 1, 'Others', '', '2015-12-15', 'approved', 'approved by Zaldy', ''),
(68, 12, '2015-12-23', '2016-02-09', 0, 'Others', '', '2015-12-19', 'approved', 'approved by Zaldy', ''),
(69, 14, '2015-12-15', '2015-12-16', 2, 'Compasssionate Leave', 'Father passed away', '2015-12-21', 'pending', '', ''),
(70, 14, '2015-12-17', '2015-12-19', 2, 'Emergency Leave', 'paid leave, personal emergency leave', '2015-12-21', 'pending', '', ''),
(71, 8, '2015-12-28', '2015-12-28', 1, 'Annual Leave Entitlement', '', '2015-12-23', 'approved', 'approved by Zaldy', ''),
(72, 33, '2016-01-13', '2016-01-14', 2, 'Annual Leave Entitlement', '', '2015-12-29', 'pending', '', ''),
(73, 22, '2016-02-06', '2016-02-14', 6, 'Annual Leave Entitlement', 'Chinese New Year Leave', '2016-01-04', 'pending', '', ''),
(74, 10, '2016-01-07', '2016-01-07', 1, 'Others', 'Dental Appointment', '2016-01-04', 'approved', 'approved by Zaldy', ''),
(75, 13, '2016-02-08', '2016-02-13', 5, 'Annual Leave Entitlement', 'I plan to go to Taiwan to celebrate Chinese New Year with my father.', '2016-01-06', 'approved', 'approved by Zaldy', ''),
(76, 28, '2016-01-30', '2016-02-02', 2, 'Annual Leave Entitlement', '', '2016-01-11', 'pending', '', ''),
(77, 22, '2016-03-25', '2016-03-28', 2, 'Annual Leave Entitlement', '', '2016-01-13', 'pending', '', ''),
(78, 15, '2016-01-30', '2016-02-04', 4, 'Others', '', '2016-01-18', 'approved', 'approved by Zaldy', ''),
(79, 14, '0000-00-00', '0000-00-00', 1, 'Annual Leave Entitlement', 'Personal Leave', '2016-02-04', 'pending', '', ''),
(80, 32, '0000-00-00', '0000-00-00', 1, 'Annual Leave Entitlement', '', '2016-02-13', 'pending', '', ''),
(81, 14, '2028-03-20', '2029-03-20', 2, 'Annual Leave Entitlement', 'personal leave', '2016-03-21', 'pending', '', ''),
(82, 8, '2016-03-23', '2016-03-26', 3, 'Annual Leave Entitlement', '', '2016-03-22', 'approved', 'approved by Zaldy', ''),
(83, 12, '2016-03-26', '2016-03-26', 0, 'Others', '', '2016-03-24', 'approved', 'approved by Zaldy', ''),
(84, 14, '0000-00-00', '0000-00-00', 2, 'Annual Leave Entitlement', 'leave reason: personal leave.', '2016-04-14', 'pending', '', ''),
(85, 14, '2012-09-20', '2020-09-20', 8, 'Annual Leave Entitlement', 'personal leave', '2016-07-18', 'pending', '', ''),
(86, 0, '0000-00-00', '0000-00-00', 1, 'Sick Leave Entitlement', '3dad', '2016-09-30', 'pending', '', ''),
(87, 0, '2016-09-14', '2016-09-21', 0, 'Compasssionate Leave', 'd', '2016-09-30', 'pending', '', ''),
(88, 7, '2017-05-23', '2017-06-13', 22, '', 'sakit kepala ', '2017-05-23', 'pending', '', ''),
(89, 7, '2017-05-23', '2017-05-26', 4, '', 'test ', '2017-05-23', 'pending', '', ''),
(90, 6, '2017-12-31', '2017-12-31', 1, '', 'sakit kepala ', '2017-05-23', 'pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `name`) VALUES
(1, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `ops_user`
--

CREATE TABLE `ops_user` (
  `user_id` int(5) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_salary` decimal(13,4) NOT NULL,
  `user_username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_ic` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ops_user`
--

INSERT INTO `ops_user` (`user_id`, `user_fullname`, `user_type`, `user_salary`, `user_username`, `user_password`, `user_email`, `user_ic`) VALUES
(3, 'Munirah Hussin', 2, '111.0000', 'Munirah', 'Hussin', 'munirah.hussin@gmail.com', '01234567');

-- --------------------------------------------------------

--
-- Table structure for table `payrolldate`
--

CREATE TABLE `payrolldate` (
  `PayrollDateID` int(11) NOT NULL,
  `PayrolMonth` int(2) NOT NULL,
  `PayrollYear` varchar(20) NOT NULL,
  `PayrolStart` date NOT NULL,
  `PayrolCalculationUpto` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payrolldate`
--

INSERT INTO `payrolldate` (`PayrollDateID`, `PayrolMonth`, `PayrollYear`, `PayrolStart`, `PayrolCalculationUpto`, `status`) VALUES
(1, 1, '2017', '2017-01-01', '2017-01-31', ''),
(2, 2, '2017', '2017-02-01', '2017-02-28', ''),
(3, 3, '2017', '2017-03-01', '2017-03-02', ''),
(13, 4, '2017', '2017-04-01', '2017-04-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_formula`
--

CREATE TABLE `payroll_formula` (
  `formula_id` int(11) NOT NULL,
  `formula_name` varchar(255) NOT NULL,
  `shift` int(3) NOT NULL,
  `norm_rate` varchar(11) NOT NULL,
  `off_hrs_4_less` varchar(11) NOT NULL,
  `off_hrs_4_over` varchar(11) NOT NULL,
  `off_hrs_8_more` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_formula`
--

INSERT INTO `payroll_formula` (`formula_id`, `formula_name`, `shift`, `norm_rate`, `off_hrs_4_less`, `off_hrs_4_over`, `off_hrs_8_more`) VALUES
(1, '', 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `EmpPosID` int(11) NOT NULL DEFAULT '0',
  `EmpPos` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `EmpNo` int(11) NOT NULL DEFAULT '0',
  `EmpFullName` varchar(255) DEFAULT NULL,
  `IcNumber` varchar(11) NOT NULL,
  `JoinDate` date NOT NULL,
  `EmpPos` varchar(255) DEFAULT NULL,
  `EmpEmail` varchar(255) DEFAULT NULL,
  `EmpStatus` varchar(255) DEFAULT NULL,
  `EmpUsername` varchar(255) DEFAULT NULL,
  `Company` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usercompany`
--

CREATE TABLE `usercompany` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `workstation` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usercompany`
--

INSERT INTO `usercompany` (`userid`, `username`, `company`, `workstation`) VALUES
(1, 'munirah hussin', 'CA Mohamed', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `EmpNo` int(11) NOT NULL DEFAULT '0',
  `FirstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `IcNumber` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `ContractStartDate` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `CorporateTitle` varchar(255) DEFAULT NULL,
  `Company` varchar(100) NOT NULL,
  `workstation` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `CardID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`EmpNo`, `FirstName`, `lastName`, `FullName`, `Title`, `IcNumber`, `Gender`, `DOJ`, `ContractStartDate`, `Email`, `UserName`, `pwd`, `CorporateTitle`, `Company`, `workstation`, `level`, `CardID`) VALUES
(1, 'Munirah', 'Hussin', 'Munirah Hussin', 'Dayang', '01-010333', 'Female', '2013-09-16', NULL, 'moony@cam.com', 'munirah.hussin', 'P@ssw0rd', 'Supervisor', 'CA Mohammed', 'Gadong', '9', 0),
(3, 'Latifah', 'Latif', 'Latifah Latip', 'Dayang', '01-002123', 'Female', '2017-03-01', NULL, 'Latidah@cam.com', 'Latifah', 'abcde', 'Waiter', 'CA Mohammed', 'Gadong', '', 0),
(2, 'Rahimin', 'Halim', 'Rahimin Halim', 'Awang', '00123456', 'Male', '2016-02-20', NULL, 'Rahiminh@cam.com', 'Rahimin', 'abcde', 'Project Coordinator', 'CA Mohammed', 'Gadong', '', 0),
(9, 'Hazimah', 'Sanusi', 'Hazimah Sanusi', 'Dk', '01123489', 'Female', '2016-05-14', NULL, 'HazimaSan@cam.com', 'Hazimah', 'P@ssw0rd', 'Assistant supervisor', 'CA Mohd', 'Gadong', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersallary`
--

CREATE TABLE `usersallary` (
  `usID` int(11) NOT NULL,
  `EmpNo` int(11) DEFAULT '0',
  `BasicSallary` varchar(255) DEFAULT NULL,
  `Allowance` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersallary`
--

INSERT INTO `usersallary` (`usID`, `EmpNo`, `BasicSallary`, `Allowance`) VALUES
(1, 1, '1000', ''),
(9, 9, '700.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertemp`
--

CREATE TABLE `usertemp` (
  `UserTempId` int(11) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `UserPwd` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `card_details` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL,
  `pay_per_day` varchar(255) NOT NULL,
  `dp_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertemp`
--

INSERT INTO `usertemp` (`UserTempId`, `User_name`, `UserId`, `UserPwd`, `level`, `card_details`, `user_type`, `pay_per_day`, `dp_picture`) VALUES
(1, 'Munirah', 'munirah.hussin', 'P@ssw0rd', '', '', 1, '50.00', '1'),
(2, 'Latifah', 'Latifah', 'abcde', '', '', 1, '30.00', '3'),
(3, 'Liyana', 'Liyana', 'abcde', '', '', 1, '30.00', '4'),
(6, 'Alaina', 'Alaina', 'abcde', '', '', 1, '90.00', ''),
(9, 'Hazimah', 'Hazimah', 'P@ssw0rd', '', '', 1, '80.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertempapprover`
--

CREATE TABLE `usertempapprover` (
  `UserTempApproverId` int(11) NOT NULL,
  `UserTempId` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `Current_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertempapprover`
--

INSERT INTO `usertempapprover` (`UserTempApproverId`, `UserTempId`, `1`, `state`, `Current_status`) VALUES
(1, 1, 1, '1', 'Test'),
(2, 2, 2, '2', ''),
(3, 3, 1, '1', ''),
(9, 9, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usertemplevel`
--

CREATE TABLE `usertemplevel` (
  `UserTempLevelId` int(11) NOT NULL,
  `UserTempLevel_name` varchar(255) NOT NULL,
  `payroll_formula` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertemplevel`
--

INSERT INTO `usertemplevel` (`UserTempLevelId`, `UserTempLevel_name`, `payroll_formula`) VALUES
(1, 'Temporary', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendance_calculate`
--
ALTER TABLE `attendance_calculate`
  ADD PRIMARY KEY (`att_cal_id`);

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`attendance_details_id`);

--
-- Indexes for table `attendance_flow`
--
ALTER TABLE `attendance_flow`
  ADD PRIMARY KEY (`attendance_flow`);

--
-- Indexes for table `attendance_status`
--
ALTER TABLE `attendance_status`
  ADD PRIMARY KEY (`att_appr_id`);

--
-- Indexes for table `empapprover`
--
ALTER TABLE `empapprover`
  ADD PRIMARY KEY (`ApproverEmpID`);

--
-- Indexes for table `empsupervisor`
--
ALTER TABLE `empsupervisor`
  ADD PRIMARY KEY (`EmpSupervisorID`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`leave_app_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `ops_user`
--
ALTER TABLE `ops_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payrolldate`
--
ALTER TABLE `payrolldate`
  ADD PRIMARY KEY (`PayrollDateID`);

--
-- Indexes for table `payroll_formula`
--
ALTER TABLE `payroll_formula`
  ADD PRIMARY KEY (`formula_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`EmpPosID`);

--
-- Indexes for table `usercompany`
--
ALTER TABLE `usercompany`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EmpNo`);

--
-- Indexes for table `usersallary`
--
ALTER TABLE `usersallary`
  ADD PRIMARY KEY (`usID`);

--
-- Indexes for table `usertemp`
--
ALTER TABLE `usertemp`
  ADD PRIMARY KEY (`UserTempId`);

--
-- Indexes for table `usertempapprover`
--
ALTER TABLE `usertempapprover`
  ADD PRIMARY KEY (`UserTempApproverId`);

--
-- Indexes for table `usertemplevel`
--
ALTER TABLE `usertemplevel`
  ADD PRIMARY KEY (`UserTempLevelId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `attendance_calculate`
--
ALTER TABLE `attendance_calculate`
  MODIFY `att_cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `attendance_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;
--
-- AUTO_INCREMENT for table `attendance_flow`
--
ALTER TABLE `attendance_flow`
  MODIFY `attendance_flow` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance_status`
--
ALTER TABLE `attendance_status`
  MODIFY `att_appr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `leave_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `ops_user`
--
ALTER TABLE `ops_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payrolldate`
--
ALTER TABLE `payrolldate`
  MODIFY `PayrollDateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payroll_formula`
--
ALTER TABLE `payroll_formula`
  MODIFY `formula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usersallary`
--
ALTER TABLE `usersallary`
  MODIFY `usID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertemp`
--
ALTER TABLE `usertemp`
  MODIFY `UserTempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertempapprover`
--
ALTER TABLE `usertempapprover`
  MODIFY `UserTempApproverId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usertemplevel`
--
ALTER TABLE `usertemplevel`
  MODIFY `UserTempLevelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
