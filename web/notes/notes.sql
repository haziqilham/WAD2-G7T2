-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2021 at 07:58 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `nid` int(11) NOT NULL,
  `cid` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `item` varchar(256) NOT NULL,
  `info` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`nid`, `cid`, `username`, `item`, `info`) VALUES
(1, 'is210', '@bossaw', 'Prof Ke Ping Fan\'s slides', 'All 13 weeks of Prof Ke\'s slides alongside some tips');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `sid` varchar(256) NOT NULL,
  `cid` varchar(256) NOT NULL,
  `cname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`sid`, `cid`, `cname`) VALUES
('scis', 'is210', 'Business Process Analysis and Solutioning'),
('scis', 'is216', 'Web Application Development II');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sid` varchar(256) NOT NULL,
  `sname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sid`, `sname`) VALUES
('scis', 'School of Computing and Information Systems'),
('sol', 'School of Law');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;