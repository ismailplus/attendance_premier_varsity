-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 06:20 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects_to_teachers`
--

CREATE TABLE `assign_subjects_to_teachers` (
  `id` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_subjects_to_teachers`
--

INSERT INTO `assign_subjects_to_teachers` (`id`, `sub_code`, `teacher_id`) VALUES
(1, 'PHY-1102', 1),
(2, 'Che-1101', 2),
(3, 'PHY-1102', 2),
(4, 'Che-1101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `is_present` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_sub_by_students`
--

CREATE TABLE `reg_sub_by_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_sub_by_students`
--

INSERT INTO `reg_sub_by_students` (`id`, `student_id`, `sub_code`) VALUES
(2, 2, 'PHY-1102'),
(3, 2, 'Che-1101');

-- --------------------------------------------------------

--
-- Table structure for table `start_classes`
--

CREATE TABLE `start_classes` (
  `id` int(11) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `start_classes`
--

INSERT INTO `start_classes` (`id`, `sub_code`, `teacher_id`, `start_time`, `end_time`, `status`) VALUES
(6, 'Che-1101', 2, '2019-02-26 21:10:00', '2019-02-26 22:10:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rf_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `rf_id`, `password`) VALUES
(1, 'dd', 'dd', 'dd', 'dd'),
(2, 'ismail hossain', 'ismail@gmail.com', '', 'seccret');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `sub_code`) VALUES
(1, 'Physics', 'PHY-1102'),
(2, 'Chemistry', 'Che-1101');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rf_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `rf_id`, `password`) VALUES
(1, 'ss', 'ss', 'ss', 'ss'),
(2, 'ssda', 'ismail@gmail.com', '', 'secret');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_subjects_to_teachers`
--
ALTER TABLE `assign_subjects_to_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_sub_by_students`
--
ALTER TABLE `reg_sub_by_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `start_classes`
--
ALTER TABLE `start_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_subjects_to_teachers`
--
ALTER TABLE `assign_subjects_to_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reg_sub_by_students`
--
ALTER TABLE `reg_sub_by_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `start_classes`
--
ALTER TABLE `start_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
