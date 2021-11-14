-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 14, 2021 at 08:33 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wad_g7`

CREATE DATABASE IF NOT EXISTS   `wad_t7` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE  `wad_t7`;
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS  `items` (
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
(1, 'is210', '@bossaw', 'Prof Ke Ping Fan\'s slides', 'All 13 weeks of Prof Ke\'s slides alongside some tips'),
(2, 'is211', '@daiwei98', 'IDP Project Videos', 'Youtube link to all Past IDP videos'),
(3, 'is216', '@haziq', 'WAD Past Projects', 'Past projects');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--
DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `id` int(11) NOT NULL,
  `listname` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `listname`, `price`, `description`) VALUES
(16, 'Financial Services Technlogy Textbook', '15', 'Financial Services Technology – Processes, Architecture and Solutions, Randall E. Duran, (2013), for IS215 Digital Business.'),
(17, 'Spreadsheet Modelling And Analysis Textbook', '$10', 'Selling used COR1305 textbook. lightly used, good condition.'),
(18, 'Leadership and Team Building Textbook', '$12', 'LTB textbook for sale, still in good condition.'),
(19, 'Economics and Society Textbook', '$5', 'econs and society textbook for sale. Tele: @student3');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--
DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `sid` varchar(256) NOT NULL,
  `cid` varchar(256) NOT NULL,
  `cname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`sid`, `cid`, `cname`) VALUES
('cor', 'cor3301', 'Ethics & Social Responsibility'),
('sob', 'fnce101', 'Finance'),
('sob', 'fnce102', 'Financial Markets and Investments'),
('scis', 'is210', 'Business Process Analysis and Solutioning'),
('scis', 'is216', 'Web Application Development II');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `create_timestamp` datetime DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `entry` text,
  `mood` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `create_timestamp`, `update_timestamp`, `subject`, `entry`, `mood`) VALUES
(1, '2019-01-23 22:00:00', '2019-01-23 22:00:00', 'Term Starts Again', 'Another term started omg i wanna die alrdy...', 'Sad'),
(2, '2019-01-25 23:59:02', '2019-01-25 23:59:02', 'I Suck', 'I got F on my quiz I am terrible', 'Sad'),
(3, '2019-01-29 09:15:00', '2019-01-29 09:15:00', 'My Puppy', 'Mummy says she will give away my dog because he pees everywhere', 'Angry'),
(4, '2019-02-05 21:00:00', '2019-02-05 21:00:00', 'CNY Homework', 'This crazy woman gave us CNY homework omg can she pliz go enjoy CNY and leave us alone?', 'Angry'),
(5, '2019-02-14 13:12:00', '2019-02-14 13:25:00', 'My First Love', 'A very handsome boy gave me roses for Vday and asked me out!', 'Happy');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--
DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `reply_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(256) NOT NULL,
  `reply` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `likes`, `reply_id`, `date`, `username`, `reply`) VALUES
(2, 2, 3, '2021-11-07 05:56:14', '@aoyang', 'I love Korea'),
(17, 0, 7, '2021-11-07 06:42:53', '@sabrina', 'Taekwando is fun!'),
(41, 0, 8, '2021-11-07 07:36:13', '@jiawei', 'Please tell me more about the syllabus'),
(1, 3, 9, '2021-11-08 21:22:07', '@weijun', 'iPhone is the best'),
(1, 3, 10, '2021-11-08 21:22:54', '@weijun', 'iPhone is the best'),
(1, 2, 11, '2021-11-08 21:23:46', '@samsung', 'Samsung is the best.'),
(1, 0, 16, '2021-11-09 04:50:36', '@bossaw', 'I love WAD2 '),
(1, 1, 17, '2021-11-09 04:54:00', '@bossaw', 'I love WAD'),
(1, 0, 18, '2021-11-09 04:54:00', '@bossaw', 'I love WAD'),
(2, 0, 19, '2021-11-09 04:55:49', '@bossaw', 'I love WAD2'),
(2, 0, 20, '2021-11-09 04:55:49', '@bossaw', 'I love WAD2'),
(10, 0, 21, '2021-11-09 04:56:46', '@bossaw', 'I love Nalgene.'),
(1, 0, 22, '2021-11-09 11:57:46', '@bossaw', '3:57am'),
(1, 0, 23, '2021-11-11 03:22:38', '@ronnie', 'I love Man Utd'),
(17, NULL, 24, '2021-11-11 03:24:39', '@bossaw', 'Is it because of the ppl inside?'),
(17, 0, 25, '2021-11-11 03:49:58', '@chingwen', 'Weird'),
(80, 0, 26, '2021-11-13 08:03:29', '@hansiong', 'Haha funny'),
(84, 40, 27, '2021-11-13 11:24:44', '@bossaw', 'You should eat at Pasta Express'),
(86, 18, 28, '2021-11-13 12:21:07', 'bossaw', 'I finally did it!!!'),
(86, 8, 29, '2021-11-13 12:23:26', '@bossaw', 'Maybe?'),
(86, 3, 30, '2021-11-13 12:26:08', '@bossaw', 'Yes I finally did it!'),
(86, 2, 31, '2021-11-13 21:17:32', '@testing', 'Trying'),
(87, 0, 32, '2021-11-13 21:28:23', '@', 'fpfewpow'),
(89, 0, 33, '2021-11-14 08:15:13', '@ouewof', 'oivnepie');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--
DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `sid` varchar(256) NOT NULL,
  `sname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sid`, `sname`) VALUES
('cor', 'SMU Core Curriculum'),
('scis', 'School of Computing and Information Systems'),
('soa', 'School of Accountancy'),
('sob', 'School of Business'),
('soe', 'School of Economics '),
('sol', 'School of Law'),
('sosci', 'School of Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--
DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(256) NOT NULL,
  `threadName` varchar(256) NOT NULL,
  `content` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `date`, `username`, `threadName`, `content`) VALUES
(1, '2021-11-06 10:04:06', '@shah', 'WAD2 Reflection', 'Let me know if you have any feedbacks'),
(17, '2021-11-06 10:04:11', '@beeqi', 'I love Taekwando', 'I hate Taekwando'),
(29, '2021-11-06 13:56:29', 'Hi', 'Hi', 'Hi'),
(30, '2021-11-06 13:57:31', '@kyong', 'WAD2 Feedback', 'Please give me feedback!'),
(32, '2021-11-07 03:50:36', '@tripleshaiting', 'Shanghai', 'I love my time in Shanghai'),
(33, '2021-11-07 05:27:55', '@josephiswhite', '1', ''),
(34, '2021-11-07 05:28:59', '@scis', 'Changing Information Systems to Digital Transformation', 'Just an announcement, not a question.'),
(35, '2021-11-07 05:32:48', '@sol', 'Law School', 'We are the best'),
(36, '2021-11-07 05:35:45', 'Hi', 'Hi', 'Hi'),
(37, '2021-11-07 05:42:15', 'oewfewfn', 'oenpven', 'pv[ve[ee'),
(38, '2021-11-07 05:43:12', 'Laksa', 'CHicken rice', 'edwdw'),
(41, '2021-11-07 07:35:25', '@tankianwee', 'Physio @ SIT is amazing', 'Join Physiotherapy @ SIT!'),
(42, '2021-11-07 21:05:45', '@weijun09', 'Please let this be right', 'Just checking.'),
(43, '2021-11-07 21:09:49', 'ionp', 'pndpv ', ' vdk v[dd'),
(44, '2021-11-07 21:11:02', 'kjhgrjf ejor', 'nr[en[o', 'nrmn[rn[rr'),
(45, '2021-11-07 21:37:05', 'kjhgrjf ejor', 'nr[en[o', 'nrmn[rn[rr'),
(46, '2021-11-07 21:44:54', '@pen', 'Checking again', 'finwifw'),
(47, '2021-11-07 22:01:38', 'weijun120@hotmail.com', 'diowdpw', 'djowdow'),
(48, '2021-11-08 01:06:34', '@luketheng', 'IDP Amazing', 'Some content to try '),
(49, '2021-11-08 22:33:45', '@gabbychang', 'IDP Amazing', 'I love Darren'),
(50, '2021-11-09 03:48:57', '@ikhon', 'WAD2 Reflection', 'I am interested in taking this next semester!'),
(51, '2021-11-09 03:50:54', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(52, '2021-11-09 03:51:31', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(53, '2021-11-09 03:53:28', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(54, '2021-11-09 03:53:31', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(55, '2021-11-09 03:53:36', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(56, '2021-11-09 03:55:04', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(57, '2021-11-09 03:55:04', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(58, '2021-11-09 03:57:30', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(59, '2021-11-09 03:57:30', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(60, '2021-11-09 04:00:33', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(61, '2021-11-09 04:00:33', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(62, '2021-11-09 04:00:35', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(63, '2021-11-09 04:00:35', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(64, '2021-11-09 04:05:22', '@weijun98', 'Trying this again', 'Let this be right.'),
(65, '2021-11-09 04:05:22', '@weijun98', 'Trying this again', 'Let this be right.'),
(66, '2021-11-09 04:05:38', '@weijun98', 'Trying this again', 'Let this be right.'),
(67, '2021-11-09 04:10:48', '@weijun98', 'Trying this again', 'Let this be right.'),
(68, '2021-11-09 04:14:00', '@weijun98', 'Trying this again', 'Let this be right.'),
(69, '2021-11-09 04:14:27', '@weijun98', 'Trying this again', 'Let this be right.'),
(70, '2021-11-09 04:19:20', '@weijun98', 'WAD2 Reflection', 'Let this be right.'),
(71, '2021-11-09 04:21:59', '@bossaw', 'WAD2 Reflection', 'Let this be right.'),
(72, '2021-11-09 04:23:02', '@weijun98', 'WAD2 Reflection', 'Let this be right.'),
(73, '2021-11-09 04:24:57', '@kyong', 'WAD2 Reflection', 'I love my teaching style.'),
(74, '2021-11-09 04:38:54', 'Hi', 'Hi', 'Hi'),
(75, '2021-11-09 04:39:24', '', '', ''),
(76, '2021-11-09 04:43:19', 'oewfnowqq', 'feofpeip e', 'venvep'),
(77, '2021-11-09 04:53:46', '@gabbychang', 'I love Red Light Green Light', 'The game is scary.'),
(78, '2021-11-09 04:57:18', '@bossaw', 'I love Nalgene', 'Check at 8:47pm'),
(79, '2021-11-09 11:11:15', '@yjy', 'I hate Volleyball', 'Stickies for life'),
(80, '2021-11-09 11:58:11', '@mariotey', 'I love NUS', 'I love NUs'),
(81, '2021-11-10 08:21:29', '@kostas', 'Exchange to Greece', 'Anyone been on an exchange to Greece before? Let me know please!'),
(82, '2021-11-11 23:40:08', '@juunkit', 'Saturday not free', 'I got church'),
(83, '2021-11-12 23:54:18', '', '', ''),
(84, '2021-11-13 08:03:11', '@fabinho', 'Exchange Student', 'Hi I am coming to SMU'),
(85, '2021-11-13 08:18:50', '@juunkit', 'I love school', 'Ipopw'),
(86, '2021-11-13 10:39:13', '@bossaw', 'Hi', 'Hi'),
(88, '2021-11-13 23:47:45', '@testing3', 'Time Check', 'Please'),
(89, '2021-11-14 08:15:02', '@admin3', 'Username', 'Content');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`; 
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `hashed_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `first_name`, `last_name`, `hashed_password`) VALUES
('jjtan.2020@scis.smu.edu.sg', 'Jun Jie', 'Tan', '$2y$10$TpC20LPtcjLYhiyMxrpdT.eBncXHtPoWPJFyVQLBosdTz9ng8nqu2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;