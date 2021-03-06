-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 09:56 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `police_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `dmc`
--

CREATE TABLE IF NOT EXISTS `dmc` (
`id` int(4) NOT NULL,
  `driver_no` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dmc`
--

INSERT INTO `dmc` (`id`, `driver_no`, `fname`, `lname`, `address`, `category`) VALUES
(1, '123', 'amila', 'kamal', '123 asdfasd asds', 'A'),
(2, '321', 'sunil', 'sanil', '1234 3423432 432s', 'B'),
(3, '444', 'kapila', 'ridma', '123 sqd asds dfasfd', 'A'),
(4, '1234', 'SDSDD', 'QWQW', 'qweqe wqeqw eqw', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
`id` int(4) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `driver_id` varchar(255) DEFAULT NULL,
  `points_count` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `user_id`, `driver_id`, `points_count`) VALUES
(1, 8, '1234', 2),
(2, 9, '444', -2);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
`id` int(4) NOT NULL,
  `driver_id` int(4) DEFAULT NULL,
  `officer_id` int(4) DEFAULT NULL,
  `vehicle_no` varchar(255) DEFAULT NULL,
  `date_of_offence` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `fine_rule_id` int(4) DEFAULT NULL,
  `valid_from` varchar(255) DEFAULT NULL,
  `valid_to` varchar(255) DEFAULT NULL,
  `court` varchar(255) DEFAULT NULL,
  `court_date` varchar(255) DEFAULT NULL,
  `police_station` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`id`, `driver_id`, `officer_id`, `vehicle_no`, `date_of_offence`, `time`, `location`, `fine_rule_id`, `valid_from`, `valid_to`, `court`, `court_date`, `police_station`, `image_path`) VALUES
(1, 1, 1, '122123', '2017-04-13T18:30:00.000Z', '1969-12-31T20:31:00.000Z', '1sadfa dfasd', 3, '2017-04-27T18:30:00.000Z', '2017-04-28T18:30:00.000Z', 'sdafsdfafds', '2017-04-29T18:30:00.000Z', '1asda', NULL),
(2, 1, 1, '122123', '2017-04-13T18:30:00.000Z', '1969-12-31T20:31:00.000Z', '1sadfa dfasd', 3, '2017-04-27T18:30:00.000Z', '2017-04-28T18:30:00.000Z', 'sdafsdfafds', '2017-04-29T18:30:00.000Z', '1asda', NULL),
(3, 1, 1, '2321313', '', '', 'qweqweqwe', 1, '', '', 'qwqweqwe', '', 'qweqewqew', NULL),
(4, 1, 1, '2321313', '', '', 'qweqweqwe', 1, '', '', 'qwqweqwe', '', 'qweqewqew', NULL),
(5, 1, 1, '2321313', '2017-04-19T18:30:00.000Z', '1970-01-01T08:31:00.000Z', 'qweqweqwe', 1, '2017-04-24T18:30:00.000Z', '', 'qwqweqwe', '2017-04-29T18:30:00.000Z', 'qweqewqew', NULL),
(8, 1, 1, 'wewerwer', '2017-04-20T18:30:00.000Z', '1970-01-01T09:32:00.000Z', 'wersasdfdsf', 4, '2017-04-26T18:30:00.000Z', '2017-04-28T18:30:00.000Z', 'czxczxc', '2017-04-29T18:30:00.000Z', 'asadasds', NULL),
(9, 1, 1, '1212312', '2017-04-19T18:30:00.000Z', '1970-01-01T07:33:00.000Z', 'ewrewrwer', 2, '2017-04-27T18:30:00.000Z', '2017-04-28T18:30:00.000Z', 'qdasdad', '2017-04-29T18:30:00.000Z', '12321asdsad', NULL),
(13, 2, 9, '32424', '2017-04-18T18:30:00.000Z', '1969-12-31T22:33:00.000Z', 'Colombo', 4, '2017-04-21T18:30:00.000Z', '2017-04-21T18:30:00.000Z', 'wrwerwr', '2017-04-21T18:30:00.000Z', 'sdf sfds fs', NULL),
(16, 2, 1, '', '', '', '', 0, '', '', '', '', '', 'fine_591b2f13ccac9.png'),
(17, 2, 1, '35345', '2017-05-16T18:30:00.000Z', '1969-12-31T20:33:00.000Z', 'sdsfdsdfs', 3, '2017-05-23T18:30:00.000Z', '2017-05-26T18:30:00.000Z', 'dwrwerwer', '2017-05-30T18:30:00.000Z', 'werewrwr', 'fine_591b2f7b917f5.jpg'),
(18, 2, 1, 'NH-7777', '2017-05-16T18:30:00.000Z', '1969-12-31T20:33:00.000Z', 'sdsfdsdfs', 1, '2017-05-23T18:30:00.000Z', '2017-05-26T18:30:00.000Z', 'dwrwerwer', '2017-05-30T18:30:00.000Z', 'werewrwr', 'fine_591b2fcf9ba06.jpg'),
(19, 2, 2, 'CAA-3457', '2017-05-10T18:30:00.000Z', '1970-01-01T17:00:00.000Z', 'Colombo', 2, '2017-05-15T18:30:00.000Z', '2017-05-25T18:30:00.000Z', 'mM', '2017-05-30T18:30:00.000Z', 'Ddd', 'fine_591b3075de44e.jpg'),
(20, 2, 2, 'GG-8765', '2017-05-16T00:00:00.000Z', '1970-01-01T22:34:00.000Z', 'Gg', 4, '2017-05-16T00:00:00.000Z', '2017-05-25T00:00:00.000Z', 'Hhh', '2017-05-30T00:00:00.000Z', 'Aaa', 'fine_591b314fb179c.jpg'),
(21, 2, 2, 'HS-3423', '2017-05-16T00:00:00.000Z', '1970-01-01T22:36:00.000Z', 'Hhhh', 2, '2017-05-16T00:00:00.000Z', '2017-05-23T00:00:00.000Z', 'Hhhk', '2017-05-30T00:00:00.000Z', 'Hjsj', 'fine_591b31c5cf0f4.png'),
(22, 1, 2, 'KK-5467', '2017-05-16T00:00:00.000Z', '1970-01-01T22:39:00.000Z', 'Ddd', 1, '2017-05-16T00:00:00.000Z', '2017-05-23T00:00:00.000Z', 'Hhh', '2017-05-31T00:00:00.000Z', 'Jjj', 'fine_591b326e5e581.jpg'),
(23, 1, 1, 'DF-3434', '2017-05-15T18:30:00.000Z', '1969-12-31T19:30:00.000Z', 'sdfdsfds', 1, '2017-05-18T18:30:00.000Z', '2017-05-25T18:30:00.000Z', 'ewrwer', '2017-05-30T18:30:00.000Z', 'ewrewr', 'fine_591b32ebc8897.jpg'),
(24, 1, 2, 'CAB-4567', '2017-05-18T00:00:00.000Z', '1970-01-01T22:43:00.000Z', 'Bfbxjx', 4, '2017-05-16T00:00:00.000Z', '2017-05-23T00:00:00.000Z', 'Bxhjx', '2017-05-30T00:00:00.000Z', 'Bxhxh', 'fine_591b335da565c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fine_rules`
--

CREATE TABLE IF NOT EXISTS `fine_rules` (
`id` int(4) NOT NULL,
  `rule` varchar(255) DEFAULT NULL,
  `points` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine_rules`
--

INSERT INTO `fine_rules` (`id`, `rule`, `points`) VALUES
(1, 'AAAAAAAAAA', 5),
(2, 'BBBBBBBBB', 3),
(3, 'CCCCCCCCC', 6),
(4, 'DDDDDDDDD', 4),
(5, 'EEEEEEEEE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(4) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `driver` tinyint(1) DEFAULT '0',
  `officer` tinyint(1) DEFAULT '0',
  `message` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `admin`, `driver`, `officer`, `message`, `created_at`) VALUES
(6, 1, 0, 1, 'yrytry', '2017-05-16 17:25:05'),
(7, 0, 1, 1, 'Hello>>>>>', '2017-05-16 17:25:17'),
(8, 0, 0, 1, 'WEWE', '2017-05-16 17:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `police_officer`
--

CREATE TABLE IF NOT EXISTS `police_officer` (
`id` int(4) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `officer_id` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_officer`
--

INSERT INTO `police_officer` (`id`, `user_id`, `officer_id`, `type`) VALUES
(1, 1, '234234', 'admin'),
(2, 2, '1231313', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(4) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `telephone`, `email`, `password`, `created_at`) VALUES
(1, 'Buwaneka Boralessa', '950292318V', '0771489617', 'buwanekab@gmail.com', '123', '2017-04-25 15:33:13'),
(2, 'P.N.D.Samarasinghe', '950292318V', '0771489617', 'buwanekab@gmail.com', '123', '2017-04-25 15:33:36'),
(5, 'amila kamal', NULL, NULL, NULL, '123', NULL),
(6, 'sunil sanil', NULL, NULL, NULL, '321', '2017-04-26 02:17:09'),
(8, 'amila kamal', NULL, NULL, NULL, '123', '2017-04-26 02:36:36'),
(9, 'harsha', 'perera', NULL, NULL, '345', '2017-04-26 08:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dmc`
--
ALTER TABLE `dmc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_rules`
--
ALTER TABLE `fine_rules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_officer`
--
ALTER TABLE `police_officer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dmc`
--
ALTER TABLE `dmc`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `fine_rules`
--
ALTER TABLE `fine_rules`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `police_officer`
--
ALTER TABLE `police_officer`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
