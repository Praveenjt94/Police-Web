-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 01:14 PM
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
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
`id` int(4) NOT NULL,
  `user_id` int(4) DEFAULT NULL,
  `driver_id` varchar(255) DEFAULT NULL,
  `points_count` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
`id` int(4) NOT NULL,
  `driver_id` int(4) DEFAULT NULL,
  `officer_id` int(4) DEFAULT NULL,
  `fine_rule_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fine_rules`
--

CREATE TABLE IF NOT EXISTS `fine_rules` (
`id` int(4) NOT NULL,
  `rule` varchar(255) DEFAULT NULL,
  `points` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `telephone`, `email`, `password`, `created_at`) VALUES
(1, 'Buwaneka Boralessa', '950292318V', '0771489617', 'buwanekab@gmail.com', '123', '2017-04-25 15:33:13'),
(2, 'P.N.D.Samarasinghe', '950292318V', '0771489617', 'buwanekab@gmail.com', '123', '2017-04-25 15:33:36');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fine_rules`
--
ALTER TABLE `fine_rules`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `police_officer`
--
ALTER TABLE `police_officer`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
