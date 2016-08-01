-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 06:00 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midtrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `t_id` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `title`, `t_id`) VALUES
(1, 'webtech', '09-12345-3'),
(3, 'C#', '09-12345-3');

-- --------------------------------------------------------

--
-- Table structure for table `course_and_student`
--

CREATE TABLE `course_and_student` (
  `cas_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_and_student`
--

INSERT INTO `course_and_student` (`cas_id`, `c_id`, `s_id`, `attendance`) VALUES
(53, 3, '12-22473-3', 0),
(52, 1, '12-22358-3', 16),
(55, 1, '12-22473-3', 16),
(54, 3, '12-22358-3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_1`
--

CREATE TABLE `quiz_1` (
  `id` int(11) NOT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_1`
--

INSERT INTO `quiz_1` (`id`, `s_id`, `c_id`, `marks`) VALUES
(21, '12-22358-3', 1, 20),
(22, '12-22473-3', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_2`
--

CREATE TABLE `quiz_2` (
  `id` int(11) NOT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_2`
--

INSERT INTO `quiz_2` (`id`, `s_id`, `c_id`, `marks`) VALUES
(6, '12-22358-3', 1, 20),
(7, '12-22473-3', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_3`
--

CREATE TABLE `quiz_3` (
  `id` int(11) NOT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_3`
--

INSERT INTO `quiz_3` (`id`, `s_id`, `c_id`, `marks`) VALUES
(5, '12-22358-3', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(15) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_cgpa` double NOT NULL,
  `s_address` varchar(100) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_contact` varchar(15) NOT NULL,
  `s_dept` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_cgpa`, `s_address`, `s_email`, `s_contact`, `s_dept`) VALUES
('12-22473-3', 'kaizar tariq', 3.31, 'khilkhet', 'inan_bd@yahoo.com', '01741497189', 'SE'),
('13-24530-2', 'toukir ahamed pigeon', 3.99, 'khilkhet', 'toukir@gmail.com', '01914229922', 'CSSE'),
('12-22358-3', 'Nazifa Tasnim', 3.99, 'uttara', 'tasnim.naz21@gmail.com', '01755186108', 'SE'),
('12-333333-3', 'Nazmus Sazid Khan', 3.22, 'kishoreganj', 'ishan@gamil.com', '01755526252', 'SE'),
('13-23059-1', 'Ali Ahmed', 2.5, 'dvdvdf', 'aliahmedbd1234@hotmail.com', '01681849871', 'CSSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(15) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_email` varchar(50) NOT NULL,
  `t_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `t_contact`) VALUES
('09-12345-3', 'teacher', 'teacher@teacher.edu', '01741497189'),
('09-54321-3', 'faculty', 'faculty@faculty.edu', '0199223344');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `s_id` varchar(15) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `s_id`, `c_id`, `marks`) VALUES
(5, '12-22358-3', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `type`) VALUES
('12-22473-3', 'asd', 1),
('13-23059-1', '1234', 1),
('09-54321-3', 'asd', 2),
('09-12345-3', 'asd', 2),
('12-22358-3', 'asd', 1),
('13-24530-2', 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_and_student`
--
ALTER TABLE `course_and_student`
  ADD PRIMARY KEY (`cas_id`);

--
-- Indexes for table `quiz_1`
--
ALTER TABLE `quiz_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_2`
--
ALTER TABLE `quiz_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_3`
--
ALTER TABLE `quiz_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_and_student`
--
ALTER TABLE `course_and_student`
  MODIFY `cas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `quiz_1`
--
ALTER TABLE `quiz_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `quiz_2`
--
ALTER TABLE `quiz_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `quiz_3`
--
ALTER TABLE `quiz_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
