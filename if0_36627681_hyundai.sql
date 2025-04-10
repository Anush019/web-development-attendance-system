-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.byetcluster.com
-- Generation Time: May 28, 2024 at 10:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36627681_hyundai`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(20) NOT NULL,
  `Employee_id` int(20) NOT NULL,
  `First_Section` varchar(20) NOT NULL,
  `Second_Section` varchar(20) NOT NULL,
  `Shift` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `In_Time` time NOT NULL,
  `Out_Time` time NOT NULL,
  `Day_Status` varchar(100) NOT NULL,
  `Total_Hours` time NOT NULL,
  `Late_In` varchar(10) NOT NULL,
  `Early_Out` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `Employee_id`, `First_Section`, `Second_Section`, `Shift`, `Date`, `In_Time`, `Out_Time`, `Day_Status`, `Total_Hours`, `Late_In`, `Early_Out`) VALUES
(531, 246, 'Present', 'Present', '1', '2024-01-01', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(532, 246, 'Present', 'Present', '1', '2024-01-02', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(533, 246, 'Present', 'Present', '1', '2024-01-03', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(534, 246, 'Present', 'Present', '1', '2024-01-04', '08:00:00', '18:00:00', 'Absent', '10:00:00', 'No', 'No'),
(535, 246, 'Present', 'Present', '1', '2024-01-05', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(536, 246, 'Present', 'Present', '1', '2024-01-06', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(537, 246, 'Present', 'Present', '1', '2024-01-07', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(538, 246, 'Present', 'Present', '1', '2024-01-08', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(539, 246, 'Present', 'Present', '1', '2024-01-09', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(540, 246, 'Present', 'Present', '1', '2024-01-10', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(541, 246, 'Present', 'Present', '1', '2024-01-11', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(542, 246, 'Present', 'Present', '1', '2024-01-12', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(543, 246, 'Present', 'Present', '1', '2024-01-13', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(544, 246, 'Present', 'Present', '1', '2024-01-14', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(545, 246, 'Present', 'Present', '1', '2024-01-15', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(546, 246, 'Present', 'Present', '1', '2024-01-16', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(547, 246, 'Present', 'Present', '1', '2024-01-17', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(548, 246, 'Present', 'Present', '1', '2024-01-18', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(549, 246, 'Present', 'Present', '1', '2024-01-19', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(550, 246, 'Present', 'Present', '1', '2024-01-20', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(551, 246, 'Present', 'Present', '1', '2024-01-21', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(552, 246, 'Present', 'Present', '1', '2024-01-22', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(553, 246, 'Present', 'Present', '1', '2024-01-23', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(554, 246, 'Present', 'Present', '1', '2024-01-24', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(555, 246, 'Present', 'Present', '1', '2024-01-25', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(556, 246, 'Present', 'Present', '1', '2024-01-26', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(557, 246, 'Present', 'Present', '1', '2024-01-27', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(558, 246, 'Present', 'Present', '1', '2024-01-28', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(559, 246, 'Present', 'Present', '1', '2024-01-29', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(560, 246, 'Present', 'Present', '1', '2024-01-30', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(561, 246, 'Present', 'Present', '1', '2024-01-31', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(562, 246, 'Present', 'Present', '1', '2024-02-01', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(563, 246, 'Present', 'Present', '1', '2024-02-02', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(564, 246, 'Present', 'Present', '1', '2024-02-03', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(565, 246, 'Present', 'Present', '1', '2024-02-04', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(566, 246, 'Present', 'Present', '1', '2024-02-05', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(567, 246, 'Present', 'Present', '1', '2024-02-06', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(568, 246, 'Present', 'Present', '1', '2024-02-07', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(569, 246, 'Present', 'Present', '1', '2024-02-08', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(570, 246, 'Present', 'Present', '1', '2024-02-09', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(571, 246, 'Present', 'Present', '1', '2024-02-10', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(572, 246, 'Present', 'Present', '1', '2024-02-11', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(573, 246, 'Present', 'Present', '1', '2024-02-12', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(574, 246, 'Present', 'Present', '1', '2024-02-13', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(575, 246, 'Present', 'Present', '1', '2024-02-14', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(576, 246, 'Present', 'Present', '1', '2024-02-15', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(577, 246, 'Present', 'Present', '1', '2024-02-16', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(578, 246, 'Present', 'Present', '1', '2024-02-17', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(579, 246, 'Present', 'Present', '1', '2024-02-18', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(580, 246, 'Present', 'Present', '1', '2024-02-19', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(581, 246, 'Present', 'Present', '1', '2024-02-20', '08:00:00', '18:00:00', 'Absent', '10:00:00', 'No', 'No'),
(582, 246, 'Present', 'Present', '1', '2024-02-21', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(583, 246, 'Present', 'Present', '1', '2024-02-22', '08:00:00', '18:00:00', 'Absent', '10:00:00', 'No', 'No'),
(584, 246, 'Present', 'Present', '1', '2024-02-23', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(585, 246, 'Present', 'Present', '1', '2024-02-24', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(586, 246, 'Present', 'Present', '1', '2024-02-25', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(587, 246, 'Present', 'Present', '1', '2024-02-26', '08:00:00', '18:00:00', 'Absent', '10:00:00', 'No', 'No'),
(588, 246, 'Present', 'Present', '1', '2024-02-27', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(589, 246, 'Present', 'Present', '1', '2024-02-28', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(590, 246, 'Present', 'Present', '1', '2024-02-29', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(591, 246, 'Present', 'Present', '1', '2024-03-01', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(592, 246, 'Present', 'Present', '1', '2024-03-02', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(593, 246, 'Present', 'Present', '1', '2024-03-03', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(594, 246, 'Present', 'Present', '1', '2024-03-04', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(595, 246, 'Present', 'Present', '1', '2024-03-05', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(596, 246, 'Present', 'Present', '1', '2024-03-06', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(597, 246, 'Present', 'Present', '1', '2024-03-07', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(598, 246, 'Present', 'Present', '1', '2024-03-08', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(599, 246, 'Present', 'Present', '1', '2024-03-09', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(600, 246, 'Present', 'Present', '1', '2024-03-10', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(601, 246, 'Present', 'Present', '1', '2024-03-11', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(602, 246, 'Present', 'Present', '1', '2024-03-12', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(603, 246, 'Present', 'Present', '1', '2024-03-13', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(604, 246, 'Present', 'Present', '1', '2024-03-14', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(605, 246, 'Present', 'Present', '1', '2024-03-15', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(606, 246, 'Present', 'Present', '1', '2024-03-16', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(607, 246, 'Present', 'Present', '1', '2024-03-17', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(608, 246, 'Present', 'Present', '1', '2024-03-18', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(609, 246, 'Present', 'Present', '1', '2024-03-19', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(610, 246, 'Present', 'Present', '1', '2024-03-20', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(611, 246, 'Present', 'Present', '1', '2024-03-21', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(612, 246, 'Present', 'Present', '1', '2024-03-22', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(613, 246, 'Present', 'Present', '1', '2024-03-23', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(614, 246, 'Present', 'Present', '1', '2024-03-24', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(615, 246, 'Present', 'Present', '1', '2024-03-25', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(616, 246, 'Present', 'Present', '1', '2024-03-26', '08:00:00', '18:00:00', 'Absent', '10:00:00', 'No', 'No'),
(617, 246, 'Present', 'Present', '1', '2024-03-27', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No'),
(618, 246, 'Present', 'Present', '1', '2024-03-28', '08:00:00', '18:00:00', 'Present', '10:00:00', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `compoff`
--

CREATE TABLE `compoff` (
  `c_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Date_of_Joining` date NOT NULL,
  `NO_of_Days` int(11) NOT NULL,
  `Leave_From` date NOT NULL,
  `Leave_To` date NOT NULL,
  `Overtime_Date_Hours` varchar(255) NOT NULL,
  `Reporting_Officer` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compoff`
--

INSERT INTO `compoff` (`c_id`, `username`, `Employee_id`, `Shift`, `Date_of_Joining`, `NO_of_Days`, `Leave_From`, `Leave_To`, `Overtime_Date_Hours`, `Reporting_Officer`, `status`) VALUES
(1, 'anush', 1452, '1', '2024-05-23', 12, '2024-05-09', '2024-05-16', '12/03/2024 - 5:30hrs', 'officer1', 'Pending'),
(2, 'anush', 1452, '1', '2024-05-25', 2, '2024-05-02', '2024-05-30', '12/03/2024 - 5:30hrs', 'officer1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `user_id`, `date`, `status`) VALUES
(1, 233, '2024-02-19', 'present'),
(2, 233, '2024-02-20', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `Employee_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `D.O.B` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`Employee_id`, `username`, `user_type`, `D.O.B`, `contact_info`, `Department`, `Address`) VALUES
(246, 'Dhanush Hariharan', 'Admin', '2004-04-11', '9360560852', 'AI-DS', 'Panimalar Engineering College'),
(233, 'anush', 'user', '2024-03-13', '5645655', 'sjnasjf', ' n ,m klnclkassnlkawnw');

-- --------------------------------------------------------

--
-- Table structure for table `regularization`
--

CREATE TABLE `regularization` (
  `a_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Date_of_Joining` date NOT NULL,
  `Absent_Date` varchar(100) NOT NULL,
  `Punch_In_Time` time NOT NULL,
  `Punch_Out_Time` time NOT NULL,
  `reporting_officer` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regularization`
--

INSERT INTO `regularization` (`a_id`, `username`, `Employee_id`, `Shift`, `Date_of_Joining`, `Absent_Date`, `Punch_In_Time`, `Punch_Out_Time`, `reporting_officer`, `status`) VALUES
(1, 'anush', 15151, '3', '2024-05-15', '0000-00-00', '20:11:00', '20:11:00', 'officer3', 'Pending'),
(2, 'anush', 15151, '1', '2024-05-10', '0000-00-00', '20:09:00', '20:09:00', 'officer1', 'Pending'),
(3, 'anu', 1452, '2', '2024-05-23', '22-02-2024', '20:10:00', '20:12:00', 'officer1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Date_of_Joining` date NOT NULL,
  `No_of_days` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `reporting_officer` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE `team_info` (
  `Employee_id` int(100) NOT NULL,
  `shift` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `schedule` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_info`
--

INSERT INTO `team_info` (`Employee_id`, `shift`, `department`, `manager`, `members`, `schedule`) VALUES
(246, 0, 'AI-DS', 'Vivek.C', 'Challapalli Manikantaa\r\nArshad\r\nkamalesh', 'Tuesday, thursday. friday, sunday');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Employee_id` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Employee_id`, `password`, `user_type`) VALUES
(246, '1144', 'Admin'),
(233, '1122', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compoff`
--
ALTER TABLE `compoff`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `regularization`
--
ALTER TABLE `regularization`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;

--
-- AUTO_INCREMENT for table `compoff`
--
ALTER TABLE `compoff`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regularization`
--
ALTER TABLE `regularization`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
