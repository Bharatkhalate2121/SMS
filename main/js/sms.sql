-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 07:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `s_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`s_no`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_status` enum('Present','Absent') NOT NULL,
  `attendance_date` date NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `attendance_status`, `attendance_date`, `teacher_id`) VALUES
(1, 1, 'Present', '2021-06-27', 2),
(2, 4, 'Present', '2021-06-27', 2),
(3, 6, 'Present', '2021-06-27', 3),
(4, 6, 'Present', '2021-06-28', 3),
(5, 6, 'Present', '2021-06-30', 3),
(6, 6, 'Present', '2021-07-01', 3),
(7, 1, 'Present', '2021-07-01', 2),
(8, 4, 'Present', '2021-07-01', 2),
(9, 1, 'Absent', '2021-07-06', 2),
(10, 2, 'Present', '2021-07-01', 2),
(11, 4, 'Present', '2021-07-01', 2),
(12, 1, 'Absent', '2021-07-01', 2),
(13, 2, 'Absent', '2021-07-01', 2),
(14, 4, 'Present', '2021-07-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'IF - 1'),
(2, 'IF - 2'),
(3, 'IF - 3');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_class` int(11) NOT NULL,
  `file_file` varchar(250) NOT NULL,
  `file_uid` int(11) NOT NULL,
  `file_ud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `file_class`, `file_file`, `file_uid`, `file_ud`) VALUES
(1, 'c ', 2, 'resource/1625151136.png', 2, 1),
(4, 'as', 2, 'resource/1625153324.png', 1, 0),
(6, 'cpp project', 2, 'resource/1625156911.docx', 1, 0),
(7, 'js', 1, 'resource/1625156959.js', 1, 0),
(8, 'gn', 2, 'resource/1625164390.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `msg_class` int(250) NOT NULL,
  `msg_uid` int(250) NOT NULL,
  `msg_ud` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msg_id`, `msg`, `msg_class`, `msg_uid`, `msg_ud`) VALUES
(1, 'hi\n', 2, 1, 2),
(2, 'by\n', 2, 1, 2),
(3, 'gn\n', 2, 1, 2),
(4, '.....\n', 2, 2, 1),
(5, 'hi prepare for cpp\n', 2, 1, 0),
(6, 'hi sir\n', 2, 4, 2),
(7, 'hi students\n', 3, 1, 0),
(8, 'hi\n', 1, 3, 1),
(9, 'hi sir\n', 1, 6, 2),
(10, 'gn\n', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `s_roll` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_gender` varchar(50) NOT NULL,
  `s_dob` date NOT NULL,
  `s_class` varchar(200) NOT NULL,
  `s_mobile` varchar(255) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_password` varchar(100) NOT NULL,
  `s_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_roll`, `s_name`, `s_gender`, `s_dob`, `s_class`, `s_mobile`, `s_email`, `s_password`, `s_image`) VALUES
(1, 1, 'Vishal Gangji', 'male', '2002-09-22', '2', '8275484781', 'vishal@gmail.com', 'pass@123', 'upload/userdefault.png'),
(2, 3, 'abhishek korachgoa', 'male', '2002-04-05', '2', '131231231', 'abhishek@gmail.com', 'pass@123', 'upload/userdefault.png'),
(3, 2, 'yogesh adki', 'male', '2002-06-05', '1', '131231231', 'yogesh@gmail.com', 'pass@123', 'upload/userdefault.png'),
(4, 2, 'vidya gangji', 'female', '2005-10-19', '2', '9359675420', 'vidya@gmail.com', 'pass@123', 'upload/alexandru-acea-XEB8y0nRRP4-unsplash (2).jpg'),
(5, 3, 'shubham gangji', 'male', '2000-06-05', '1', '131231231', 'shubham@gmail.com', 'pass@123', 'upload/userdefault.png'),
(6, 1, 'nagesh gangji', 'male', '2000-04-28', '1', '8275484781', 'nagesh@gmail.com', 'pass@123', 'upload/unnamed (1).png'),
(7, 1, 'rani chavan', '', '2000-06-12', '3', '1234567890', 'rani@gmail.com', 'pass@123', 'upload/userdefault.png');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `t_class` varchar(100) NOT NULL,
  `t_address` varchar(250) NOT NULL,
  `t_image` varchar(250) NOT NULL,
  `t_email` varchar(200) NOT NULL,
  `t_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `t_name`, `t_class`, `t_address`, `t_image`, `t_email`, `t_password`) VALUES
(1, 'Amar gangji', '3', 'soalpur', 'teacher_upload/1624778065.png', 'amar@gmail.com', 'pass@123'),
(2, 'narayan gangji', '2', 'solapur', 'teacher_upload/1625129847.png', 'narayan@gmail.com', 'pass@123'),
(3, 'sager gangji', '1', 'soalpur', 'teacher_upload/1625129859.png', 'sager@gmail.com', 'pass@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
