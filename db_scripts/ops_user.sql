-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 10:25 AM
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
(3, 'Munirah Hussin', 2, '111.0000', 'Munirah', 'Hussin', 'munirah.hussin@gmail.com', '01-234567'),
(4, 'qqqq', 0, '111.0000', 'aaa', 'aaa', 'qq@mail.com', '09-876543');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ops_user`
--
ALTER TABLE `ops_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ops_user`
--
ALTER TABLE `ops_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
