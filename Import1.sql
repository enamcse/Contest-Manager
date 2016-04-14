-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 01:43 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1123183`
--

-- --------------------------------------------------------

--
-- Table structure for table `clarification`
--

CREATE TABLE `clarification` (
  `clarification_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `requester` varchar(40) NOT NULL,
  `contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clarification`
--

INSERT INTO `clarification` (`clarification_id`, `status`, `question`, `answer`, `requester`, `contest_id`) VALUES
(1, 'ASKING', 'What is the time limit of problem A?', 'Read the problem statement very carefully you moron!', 'manetsus', 4),
(2, 'ASKING', 'mind your language. i will Quit the contest...', '', 'mamunsust', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contest_id` int(11) NOT NULL,
  `contest_name` varchar(40) NOT NULL,
  `no_of_problems` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '1800000',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `standings_file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`contest_id`, `contest_name`, `no_of_problems`, `duration`, `start_time`, `standings_file_path`) VALUES
(1, 'Demo Contest 2016', 5, 18000000, '2016-03-27 08:02:00', 'C:\\Users\\enam\\Desktop\\TestData\\contest1.txt'),
(2, 'Sample Contest', 0, 18000000, '2016-03-27 22:00:00', ''),
(3, 'Super Nap 2016', 0, 1500000, '2016-03-28 05:00:00', ''),
(4, 'Evan Hossain Charity Contest', 0, 18000000, '2016-03-29 10:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `input` varchar(500) NOT NULL,
  `output` varchar(500) NOT NULL,
  `sample_input` varchar(500) NOT NULL,
  `sample_output` varchar(500) NOT NULL,
  `time_limit` int(11) NOT NULL DEFAULT '1000',
  `input_file_path` varchar(100) NOT NULL,
  `output_file_path` varchar(100) NOT NULL,
  `problem_no` varchar(4) NOT NULL,
  `contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problem_id`, `problem_name`, `description`, `input`, `output`, `sample_input`, `sample_output`, `time_limit`, `input_file_path`, `output_file_path`, `problem_no`, `contest_id`) VALUES
(1, 'SU+ST = SUST', 'Add given two numbers and show output', 'Two numbers', 'The sum of the two numbers', '2 -3', '-1', 1000, 'C:\\Users\\enam\\Desktop\\TestData\\inputA.txt', 'C:\\Users\\enam\\Desktop\\TestData\\outputA.txt', 'A', 1),
(2, 'SUST - ST = SU', 'Subtract second number from the first number. You would be given two numbers.', 'Two integers', 'The result of subtraction', '2 -3', '5', 10000, 'C:\\Users\\enam\\Desktop\\TestData\\inputB.txt', 'C:\\Users\\enam\\Desktop\\TestData\\outputB.txt', 'B', 1),
(3, 'print SUST', 'Just print ''Hello SUST'' in the standard output', 'No input', 'Just print the output in one line.', '', '', 1000, '<nyd>', '<nyd>', 'C', 1),
(4, 'print WYG', 'Take a line from the standard input and print it to the standard output', 'A line.', 'Line given in input.', 'Hellow SUST', 'Hellow SUST', 1000, 'C:\\Users\\enam\\Desktop\\TestData\\inputD.txt', 'C:\\Users\\enam\\Desktop\\TestData\\outputD.txt', 'D', 1),
(6, 'Go', 'Do', 'Do', 'Do', 'Do', 'DoDo', 10000, 'i', 'o', 'A', 45),
(7, 'Sth', 'Add', '1 2', '3', '1 2', '3', 1000, 'C:\\Users\\enam\\Desktop\\TestData\\InputA.cpp', 'C:\\Users\\enam\\Desktop\\TestData\\OutputA.cpp', 'A', 2),
(8, 'asd', '', '', '', '', '', 0, '', '', 'B', 1),
(9, 'dfsef', 'sdf', '', '', '', '', 111, '', '', 'C', 1),
(10, '23432ssdfs', '', '', 'sdf', '', '', 222, '', '', 'D', 1),
(11, '3', 'sd', '', '', '', '', 33333, '', '', 'F', 1),
(12, 'sadf', 'sdfsda', '', '', '', '', 23232, '', '', 'E', 1),
(13, 'asdf', 'sdsda', '', '', '', '', 4444, '', '', 'E', 1),
(14, 'Evan Hossain in Google', 'Evan Hossain was a great programmer of SUST who got chance in google. Now he is the CEO of Google.', 'Two integers.\r\n', 'Summation of the two numbers given in input.', '2 3 ', '5', 1000, 'E:\\Dropbox\\Koding.com\\TestData\\inputA.txt', 'E:\\Dropbox\\Koding.com\\TestData\\outputA.txt', 'A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submission_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(100) NOT NULL,
  `execution_time` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `verdict` varchar(50) NOT NULL,
  `language` varchar(20) NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code_file_path` varchar(200) NOT NULL,
  `output_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submission_id`, `username`, `problem_id`, `problem_name`, `execution_time`, `contest_id`, `verdict`, `language`, `submission_time`, `code_file_path`, `output_file`) VALUES
(1, 'gaurab', 14, 'Evan Hossain in Google', 0, 4, 'TIME LIMIT EXCEEDED', 'C++', '2016-03-29 10:26:03', 'D:/Study/CodeIgniter/XAMPP/htdocs/CodeIgniter/uploads/sub_1.cpp', ''),
(2, 'manetsus', 14, 'Evan Hossain in Google', 0, 4, 'COMPILE ERROR', 'C++', '2016-03-29 10:27:04', 'D:/Study/CodeIgniter/XAMPP/htdocs/CodeIgniter/uploads/sub_2.cpp', ''),
(3, 'gaurab', 14, 'Evan Hossain in Google', 0, 4, 'TIME LIMIT EXCEEDED', 'C++', '2016-03-29 11:53:48', 'D:/Study/CodeIgniter/XAMPP/htdocs/CodeIgniter/uploads/sub_3.cpp', ''),
(4, 'gaurab', 14, 'Evan Hossain in Google', 0, 4, 'TIME LIMIT EXCEEDED', 'C++', '2016-03-29 11:54:16', 'D:/Study/CodeIgniter/XAMPP/htdocs/CodeIgniter/uploads/sub_4.cpp', ''),
(5, 'mamunsust', 14, 'Evan Hossain in Google', 0, 4, 'COMPILE ERROR', 'C++', '2016-03-29 11:55:09', '', ''),
(6, 'mamunsust', 14, 'Evan Hossain in Google', 0, 4, 'ACCEPTED', 'C++', '2016-03-29 11:57:13', 'D:/Study/CodeIgniter/XAMPP/htdocs/CodeIgniter/uploads/sub_6.cpp', 'D:\\Study\\CodeIgniter\\XAMPP\\htdocs\\CodeIgniter\\uploads\\sub_6.cpp6.txt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Contestant',
  `email` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `password`, `role`, `email`, `created`) VALUES
(1, 'mamun', 'Mohammad Mamun', 'Hossain', '$2y$10$Khk9u2sMjfofjkZEQOEiH.o3alP7IiA0.dTZaPwkeyOOkyZJQZZQC', 'Contestant', '71.mamun@gmail.com', '2016-03-25 00:06:21'),
(2, 'manetsus', 'Enamul', 'Hassan', '$2y$10$I3bi03zSx0dB6J8xDMc55uVvR0AzDNUYGsqMs4zxwcgIWwy2V0BX6', 'Judge', 'enamsustcse@gmail.com', '2016-03-25 00:06:40'),
(3, 'gaurab', 'Md. Khairullah', 'Gaurab', '$2y$10$qcin4di/6.juRla8qN.ri.4ibnzLa4PINgxZZoxNmE8T5eYvro6S6', 'Contestant', 'mkgaurabsarkar@gmail.com', '2016-03-25 00:07:19'),
(4, 'Faurab', 'Md.', 'Khairullah Gaurab', '$2y$10$EWNUlr1tK5Mv9CzHjnSsXeIUDC5m.hiwysLA4yb0iG0X4lFqLTBbS', 'Judge', 'mkgaurabsarkar@gmail.com', '2016-03-25 05:33:51'),
(5, 'mamunsust', 'mamun', 'hossain', '$2y$10$GLlXBWGygSqnJr/E768QCeoYksT1Eq5fp058Db2oOVW06NTYN3RRO', 'Contestant', 'mamun@gmail.com', '2016-03-29 11:54:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clarification`
--
ALTER TABLE `clarification`
  ADD PRIMARY KEY (`clarification_id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`contest_id`),
  ADD UNIQUE KEY `contest_name_idx` (`contest_name`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_idx` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clarification`
--
ALTER TABLE `clarification`
  MODIFY `clarification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
