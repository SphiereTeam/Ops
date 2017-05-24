-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2017 at 03:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dars`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`leave_app_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `leave_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
