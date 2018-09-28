-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 12:06 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_with_us`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_teacher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`user_id`, `course_id`, `course_name`, `course_teacher`) VALUES
(1, 1, 'PHP', 'teacher'),
(1, 2, 'Web Development', 'teacher'),
(1, 3, 'Cyber Security', 'teacher'),
(1, 4, 'Laravel', 'teacher'),
(1, 5, 'Punjabi', 'teacher'),
(3, 6, 'English', 'Khurram');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` enum('male','femal') NOT NULL,
  `user_role` char(7) NOT NULL,
  `user_image` text NOT NULL,
  `user_time` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_role`, `user_image`, `user_time`, `user_token`) VALUES
(1, 'teacher', 't@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'male', 'Teacher', '1_(1).gif', '2018-09-27 23:23:56', ''),
(2, 'student', 's@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'male', 'Student', '1_(5).jpg', '2018-09-27 23:24:31', ''),
(3, 'Khurram', 'k@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'male', 'Teacher', '', '2018-09-28 14:52:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `user_id` int(3) NOT NULL,
  `course_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`user_id`, `course_id`) VALUES
(2, 2),
(2, 1),
(2, 0),
(2, 3),
(2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
