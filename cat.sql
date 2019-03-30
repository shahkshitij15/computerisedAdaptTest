-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 11:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `q_id` int(11) NOT NULL,
  `statement` longtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `a` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `b` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `c` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `d` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `value` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `answer` char(2) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `maths`
--

INSERT INTO `maths` (`q_id`, `statement`, `a`, `b`, `c`, `d`, `value`, `marks`, `answer`) VALUES
(100, 'Ram had 342 coins in his collection. How would you write 342?', 'Three four two', 'Three forty two', 'Three hundred forty two', 'Three hundred four two', -1, 5, 'c'),
(101, 'A shop keeper puts an even number of chocolates in a jar. How many chocolates could he have put in the jar?', '999', '900', '901\r\n', '905', 0, 10, 'b'),
(102, 'Which number would make the number sentence correct? * > 789\r\n', '798\r\n', '700\r\n', '704\r\n\r\n\r\n', '740\r\n', 1, 20, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pwd`, `type`) VALUES
('bhavik718', 'admin', 'admin'),
('kshitij15', 'admin', 'admin'),
('saurabh41', 'admin', 'admin'),
('student1', 'student', 'student'),
('teacher1', 'teacher', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
