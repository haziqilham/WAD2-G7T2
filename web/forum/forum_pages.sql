-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2021 at 07:46 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `forum_pages`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
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

CREATE TABLE `replies` (
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
(2, 0, 3, '2021-11-07 13:56:14', '@aoyang', 'I love Korea'),
(17, 0, 7, '2021-11-07 14:42:53', '@sabrina', 'Taekwando is fun!'),
(41, 0, 8, '2021-11-07 15:36:13', '@jiawei', 'Please tell me more about the syllabus'),
(1, 0, 9, '2021-11-09 05:22:07', '@weijun', 'iPhone is the best'),
(1, 0, 10, '2021-11-09 05:22:54', '@weijun', 'iPhone is the best'),
(1, 0, 11, '2021-11-09 05:23:46', '@samsung', 'Samsung is the best.'),
(1, 0, 16, '2021-11-09 12:50:36', '@bossaw', 'I love WAD2 '),
(1, 0, 17, '2021-11-09 12:54:00', '@bossaw', 'I love WAD'),
(1, 0, 18, '2021-11-09 12:54:00', '@bossaw', 'I love WAD'),
(2, 0, 19, '2021-11-09 12:55:49', '@bossaw', 'I love WAD2'),
(2, 0, 20, '2021-11-09 12:55:49', '@bossaw', 'I love WAD2'),
(10, 0, 21, '2021-11-09 12:56:46', '@bossaw', 'I love Nalgene.'),
(1, 0, 22, '2021-11-09 19:57:46', '@bossaw', '3:57am'),
(1, NULL, 23, '2021-11-11 11:22:38', '@ronnie', 'I love Man Utd'),
(17, NULL, 24, '2021-11-11 11:24:39', '@bossaw', 'Is it because of the ppl inside?'),
(17, 0, 25, '2021-11-11 11:49:58', '@chingwen', 'Weird');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
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
(1, '2021-11-06 18:04:06', '@shah', 'WAD2 Reflection', 'Let me know if you have any feedbacks'),
(17, '2021-11-06 18:04:11', '@beeqi', 'I love Taekwando', 'I hate Taekwando'),
(29, '2021-11-06 21:56:29', 'Hi', 'Hi', 'Hi'),
(30, '2021-11-06 21:57:31', '@kyong', 'WAD2 Feedback', 'Please give me feedback!'),
(32, '2021-11-07 11:50:36', '@tripleshaiting', 'Shanghai', 'I love my time in Shanghai'),
(33, '2021-11-07 13:27:55', '@josephiswhite', '1', ''),
(34, '2021-11-07 13:28:59', '@scis', 'Changing Information Systems to Digital Transformation', 'Just an announcement, not a question.'),
(35, '2021-11-07 13:32:48', '@sol', 'Law School', 'We are the best'),
(36, '2021-11-07 13:35:45', 'Hi', 'Hi', 'Hi'),
(37, '2021-11-07 13:42:15', 'oewfewfn', 'oenpven', 'pv[ve[ee'),
(38, '2021-11-07 13:43:12', 'Laksa', 'CHicken rice', 'edwdw'),
(41, '2021-11-07 15:35:25', '@tankianwee', 'Physio @ SIT is amazing', 'Join Physiotherapy @ SIT!'),
(42, '2021-11-08 05:05:45', '@weijun09', 'Please let this be right', 'Just checking.'),
(43, '2021-11-08 05:09:49', 'ionp', 'pndpv ', ' vdk v[dd'),
(44, '2021-11-08 05:11:02', 'kjhgrjf ejor', 'nr[en[o', 'nrmn[rn[rr'),
(45, '2021-11-08 05:37:05', 'kjhgrjf ejor', 'nr[en[o', 'nrmn[rn[rr'),
(46, '2021-11-08 05:44:54', '@pen', 'Checking again', 'finwifw'),
(47, '2021-11-08 06:01:38', 'weijun120@hotmail.com', 'diowdpw', 'djowdow'),
(48, '2021-11-08 09:06:34', '@luketheng', 'IDP Amazing', 'Some content to try '),
(49, '2021-11-09 06:33:45', '@gabbychang', 'IDP Amazing', 'I love Darren'),
(50, '2021-11-09 11:48:57', '@ikhon', 'WAD2 Reflection', 'I am interested in taking this next semester!'),
(51, '2021-11-09 11:50:54', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(52, '2021-11-09 11:51:31', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(53, '2021-11-09 11:53:28', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(54, '2021-11-09 11:53:31', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(55, '2021-11-09 11:53:36', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(56, '2021-11-09 11:55:04', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(57, '2021-11-09 11:55:04', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(58, '2021-11-09 11:57:30', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(59, '2021-11-09 11:57:30', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(60, '2021-11-09 12:00:33', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(61, '2021-11-09 12:00:33', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(62, '2021-11-09 12:00:35', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(63, '2021-11-09 12:00:35', '@bossaw', 'OOP ', 'Which prof should I bid for?'),
(64, '2021-11-09 12:05:22', '@weijun98', 'Trying this again', 'Let this be right.'),
(65, '2021-11-09 12:05:22', '@weijun98', 'Trying this again', 'Let this be right.'),
(66, '2021-11-09 12:05:38', '@weijun98', 'Trying this again', 'Let this be right.'),
(67, '2021-11-09 12:10:48', '@weijun98', 'Trying this again', 'Let this be right.'),
(68, '2021-11-09 12:14:00', '@weijun98', 'Trying this again', 'Let this be right.'),
(69, '2021-11-09 12:14:27', '@weijun98', 'Trying this again', 'Let this be right.'),
(70, '2021-11-09 12:19:20', '@weijun98', 'WAD2 Reflection', 'Let this be right.'),
(71, '2021-11-09 12:21:59', '@bossaw', 'WAD2 Reflection', 'Let this be right.'),
(72, '2021-11-09 12:23:02', '@weijun98', 'WAD2 Reflection', 'Let this be right.'),
(73, '2021-11-09 12:24:57', '@kyong', 'WAD2 Reflection', 'I love my teaching style.'),
(74, '2021-11-09 12:38:54', 'Hi', 'Hi', 'Hi'),
(75, '2021-11-09 12:39:24', '', '', ''),
(76, '2021-11-09 12:43:19', 'oewfnowqq', 'feofpeip e', 'venvep'),
(77, '2021-11-09 12:53:46', '@gabbychang', 'I love Red Light Green Light', 'The game is scary.'),
(78, '2021-11-09 12:57:18', '@bossaw', 'I love Nalgene', 'Check at 8:47pm'),
(79, '2021-11-09 19:11:15', '@yjy', 'I hate Volleyball', 'Stickies for life'),
(80, '2021-11-09 19:58:11', '@mariotey', 'I love NUS', 'I love NUs'),
(81, '2021-11-10 16:21:29', '@kostas', 'Exchange to Greece', 'Anyone been on an exchange to Greece before? Let me know please!'),
(82, '2021-11-12 07:40:08', '@juunkit', 'Saturday not free', 'I got church');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;