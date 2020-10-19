-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2020 at 08:00 PM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- --------------------------------------------------------

--
-- Table structure for table `autocomplete`
--

CREATE TABLE `autocomplete` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(13) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sent_on` datetime DEFAULT NULL,
  `message` text NOT NULL,
  `msg_pic` varchar(100) NOT NULL,
  `msg_audio` varchar(100) NOT NULL,
  `msg_video` varchar(100) NOT NULL,
  `msg_file` varchar(100) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `seen_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender_id`, `sent_on`, `message`, `msg_pic`, `msg_audio`, `msg_video`, `msg_file`, `reciver_id`, `seen`, `seen_on`) VALUES
(170, 10, '2016-09-04 00:14:50', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 16, 1, '2016-09-04 20:45:06'),
(171, 10, '2016-09-04 00:19:31', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 17, 1, '2016-09-09 01:52:54'),
(172, 10, '2016-09-04 00:19:48', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 18, 1, '2016-09-08 23:20:20'),
(173, 10, '2016-09-04 00:20:00', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 19, 0, '0000-00-00 00:00:00'),
(176, 10, '2016-09-04 00:20:34', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 53, 1, '2016-09-04 20:54:32'),
(177, 10, '2016-09-04 00:20:44', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 56, 1, '2016-09-09 02:15:27'),
(178, 10, '2016-09-04 00:20:54', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 57, 1, '2016-09-09 03:15:05'),
(179, 10, '2016-09-04 00:21:08', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 58, 0, '0000-00-00 00:00:00'),
(187, 10, '2016-09-07 19:08:01', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 59, 1, '2016-09-07 19:08:25'),
(205, 10, '2017-01-30 09:24:19', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 60, 1, '2017-01-30 09:24:20'),
(209, 10, '2017-02-21 10:32:18', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 61, 1, '2017-02-21 10:32:18'),
(210, 10, '2017-03-06 09:26:02', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 62, 1, '2017-03-06 09:26:02'),
(211, 10, '2017-03-06 09:27:06', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 63, 1, '2017-03-06 09:27:06'),
(216, 10, '2017-04-21 10:46:40', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 64, 1, '2017-04-21 10:46:41'),
(218, 10, '2017-04-21 11:05:57', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 65, 1, '2017-04-21 11:05:57'),
(219, 10, '2017-04-21 11:06:54', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 66, 1, '2017-04-21 11:06:55'),
(220, 10, '2017-04-21 11:09:13', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 67, 1, '2017-04-21 11:09:14'),
(221, 10, '2017-04-21 11:12:42', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 68, 1, '2017-04-21 11:12:42'),
(222, 10, '2017-04-21 11:13:53', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 69, 1, '2017-04-21 11:13:54'),
(223, 10, '2017-04-21 11:19:38', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 70, 1, '2017-04-21 11:19:38'),
(224, 10, '2017-04-21 11:29:26', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 71, 1, '2017-04-21 11:29:26'),
(225, 10, '2017-04-21 11:36:11', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 72, 1, '2017-04-21 11:36:12'),
(226, 10, '2017-04-22 06:41:58', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 75, 1, '2017-04-22 06:41:58'),
(227, 10, '2017-04-22 06:45:36', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 76, 1, '2017-04-22 06:45:37'),
(230, 16, '2017-05-21 13:13:34', 'troll', '170521131334000000.jpeg', '', '', '', 18, 1, '2017-05-21 13:28:37'),
(234, 40, '2017-05-21 15:04:28', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 75, 0, '0000-00-00 00:00:00'),
(235, 40, '2017-05-21 15:14:45', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 76, 0, '0000-00-00 00:00:00'),
(236, 40, '2017-05-21 15:16:21', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 77, 0, '0000-00-00 00:00:00'),
(237, 80, '2017-05-21 15:19:42', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 78, 0, '0000-00-00 00:00:00'),
(238, 80, '2017-05-21 15:20:38', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 79, 1, '2017-05-21 15:20:38'),
(239, 40, '2017-05-21 15:35:05', 'Hello, Welcome to chaton. If you need any support chat with me on chaton Support.', '', '', '', '', 80, 1, '2017-05-21 15:35:29'),
(244, 16, '2017-05-21 21:07:28', 'zczxcxzzxcz', '', '', '', '', 80, 0, '0000-00-00 00:00:00'),
(245, 18, '2017-05-21 21:40:50', 'assadasd', '', '', '', '', 17, 1, '2020-06-02 10:52:00'),
(246, 18, '2017-05-21 21:41:25', '', '', '', '', '170521214125000000.zip', 17, 1, '2020-06-02 10:52:00'),
(247, 18, '2017-05-21 21:43:28', 'sdfgsdf', '', '', '', '', 16, 1, '2017-05-23 19:48:47'),
(248, 18, '2017-05-21 22:06:17', 'sdfssadf', '', '', '', '', 16, 1, '2017-05-23 19:48:47'),
(249, 18, '2017-05-21 22:06:38', 'zcFsfd', '', '', '', '', 79, 1, '2017-05-21 22:33:14'),
(250, 79, '2017-05-21 22:33:17', 'dgdsgsdg', '', '', '', '', 18, 1, '2017-05-21 22:33:52'),
(251, 79, '2017-05-23 19:27:20', 'dfgsdgd', '', '', '', '', 16, 1, '2017-05-23 19:38:12'),
(252, 16, '2017-05-23 19:49:32', 'pro', '170523194932000000.png', '', '', '', 18, 1, '2020-10-18 18:37:19'),
(253, 10, '2017-05-23 22:16:50', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 81, 1, '2017-05-23 22:16:52'),
(254, 79, '2017-05-23 22:22:38', 'ok thanks', '', '', '', '', 80, 0, '0000-00-00 00:00:00'),
(255, 10, '2017-05-23 23:12:33', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 82, 1, '2017-05-23 23:12:33'),
(256, 10, '2017-05-23 23:21:00', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 83, 1, '2017-05-23 23:21:00'),
(257, 16, '2017-05-29 11:25:49', 'dsfsafa', '', '', '', '', 18, 1, '2020-10-18 18:37:19'),
(258, 10, '2017-05-29 11:33:03', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 86, 1, '2017-05-29 11:33:04'),
(259, 86, '2017-05-29 11:45:13', 'Hey it\'s Ahmad', '', '', '', '', 16, 1, '2017-05-29 11:47:35'),
(260, 16, '2017-05-29 11:48:03', 'trump', '170529114803000000.png', '', '', '', 86, 1, '2017-05-29 11:55:08'),
(261, 16, '2017-05-29 11:48:28', 'hello...', '', '', '', '', 86, 1, '2017-05-29 11:55:08'),
(262, 17, '2020-06-02 10:53:00', '', '200602105300000000.jpeg', '', '', '', 18, 0, '0000-00-00 00:00:00'),
(263, 17, '2020-10-15 17:52:57', 'hello rajat', '', '', '', '', 19, 0, '0000-00-00 00:00:00'),
(264, 17, '2020-10-15 17:54:21', 'dfgdsfgdsfgsd', '201015175421000000.jpg', '', '', '', 19, 0, '0000-00-00 00:00:00'),
(265, 17, '2020-10-15 17:55:32', 'file', '', '', '', '201015175532000000.docx', 19, 0, '0000-00-00 00:00:00'),
(266, 17, '2020-10-16 09:33:53', 'fghdgfhf', '', '', '', '', 61, 0, '0000-00-00 00:00:00'),
(267, 17, '2020-10-16 09:43:00', 'tbbt', '201016094300000000.jpg', '', '', '', 61, 0, '0000-00-00 00:00:00'),
(268, 10, '2020-10-18 14:20:20', 'Hello, Welcome to HelpMiii. If you need any support chat with me on HelpMiii Support.', '', '', '', '', 87, 1, '2020-10-18 14:20:20'),
(269, 87, '2020-10-18 14:21:18', 'hi', '', '', '', '', 16, 0, '0000-00-00 00:00:00'),
(270, 10, '2020-10-18 15:53:14', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 88, 1, '2020-10-18 15:53:15'),
(271, 10, '2020-10-18 15:56:25', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 89, 1, '2020-10-18 15:56:25'),
(272, 10, '2020-10-18 15:57:13', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 90, 1, '2020-10-18 15:57:14'),
(273, 10, '2020-10-18 15:58:05', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 91, 1, '2020-10-18 15:58:06'),
(274, 10, '2020-10-18 17:03:55', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 92, 0, '0000-00-00 00:00:00'),
(275, 10, '2020-10-18 17:14:13', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 93, 0, '0000-00-00 00:00:00'),
(276, 10, '2020-10-18 17:24:14', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 94, 1, '2020-10-18 18:32:14'),
(277, 10, '2020-10-18 17:41:49', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 95, 0, '0000-00-00 00:00:00'),
(278, 10, '2020-10-18 17:43:28', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 96, 0, '0000-00-00 00:00:00'),
(279, 10, '2020-10-18 17:45:14', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 97, 1, '2020-10-18 17:45:41'),
(280, 10, '2020-10-18 18:38:04', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 98, 1, '2020-10-18 18:38:43'),
(281, 10, '2020-10-18 19:05:35', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 99, 1, '2020-10-18 19:13:10'),
(282, 10, '2020-10-18 19:06:21', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 100, 1, '2020-10-18 19:14:11'),
(283, 10, '2020-10-18 19:07:45', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 101, 1, '2020-10-18 19:14:45'),
(284, 10, '2020-10-18 19:08:10', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 102, 1, '2020-10-18 19:15:04'),
(285, 10, '2020-10-18 19:08:34', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', '', '', '', '', 103, 1, '2020-10-18 19:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(9) NOT NULL,
  `comment` mediumtext NOT NULL,
  `cpid` int(9) NOT NULL,
  `cmt_hm_id` int(11) NOT NULL,
  `commented_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `comment`, `cpid`, `cmt_hm_id`, `commented_date`) VALUES
(1, 'u know what is inno..?\r\n\r\n?', 146, 16, '2016-09-04 02:44:11'),
(2, '.\r\n .\r\n  .\r\n    . ', 146, 16, '2016-09-04 02:44:51'),
(16, 'dfsdfas', 176, 16, '2016-09-05 18:18:04'),
(17, 'dfsdfas', 176, 16, '2016-09-05 18:18:04'),
(22, 'treytr', 228, 16, '2016-09-07 18:49:18'),
(25, 'hvhj', 299, 16, '2016-09-13 19:58:22'),
(31, 'awesome look...', 228, 16, '2016-09-13 20:08:38'),
(32, 'what a view...', 318, 16, '2016-09-13 20:24:13'),
(35, 'dasfsf', 332, 16, '2016-11-04 21:51:37'),
(37, 'fffdsgfg', 334, 16, '2016-11-05 12:51:28'),
(39, 'fsdfsdfas', 169, 16, '2016-11-09 19:02:19'),
(41, 'fyyryr', 329, 16, '2016-11-15 16:23:42'),
(42, 'Great man...', 351, 16, '2017-02-07 06:54:17'),
(43, 'Our first step, and we are ready for the jump...', 357, 16, '2017-04-20 18:54:03'),
(44, 'good\r\n', 375, 86, '2017-05-29 12:12:20'),
(45, 'hello 2020\r\n', 377, 17, '2020-06-02 10:56:18'),
(46, '            hello...\r\n\r\n', 379, 17, '2020-10-18 13:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(3) NOT NULL,
  `countries` varchar(45) NOT NULL,
  `users_count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dishes_hm`
--

CREATE TABLE `dishes_hm` (
  `dish_hm_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `dish_hm_dp_id` int(11) DEFAULT NULL,
  `veg_status_id` tinyint(1) NOT NULL,
  `cooked_by_id` int(11) NOT NULL,
  `dish_form_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ingredients` varchar(200) DEFAULT NULL,
  `racipe_steps` blob DEFAULT NULL,
  `view_count` int(7) DEFAULT NULL,
  `vote_count` int(6) DEFAULT NULL,
  `reviews_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish_hm_reviews`
--

CREATE TABLE `dish_hm_reviews` (
  `review_id` int(11) NOT NULL,
  `r_dish_hm_id` int(11) NOT NULL,
  `reviews` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `d_h_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish_hm_review_vote_hm`
--

CREATE TABLE `dish_hm_review_vote_hm` (
  `d_h_review_id` int(11) NOT NULL,
  `d_h_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish_hm_shares`
--

CREATE TABLE `dish_hm_shares` (
  `share_id` int(11) NOT NULL,
  `s_dish_hm_id` int(11) NOT NULL,
  `d_hm_sharer_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish_hm_share_hm`
--

CREATE TABLE `dish_hm_share_hm` (
  `d_h_share_id` int(11) NOT NULL,
  `d_h_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dish_hm_vote_hm`
--

CREATE TABLE `dish_hm_vote_hm` (
  `v_dish_hm_id` int(11) NOT NULL,
  `d_h_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` int(1) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for gender';

-- --------------------------------------------------------

--
-- Table structure for table `hm_friend`
--

CREATE TABLE `hm_friend` (
  `friendship_id` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `action_user_id` int(11) NOT NULL,
  `date_of_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hm_friend`
--

INSERT INTO `hm_friend` (`friendship_id`, `user_id_1`, `user_id_2`, `status`, `action_user_id`, `date_of_update`) VALUES
(12, 53, 18, 0, 53, '2016-09-09 01:56:25'),
(21, 16, 58, 1, 16, '2016-09-09 00:00:44'),
(40, 16, 19, 1, 16, '2016-09-09 16:31:05'),
(47, 10, 16, 1, 16, '2016-09-09 02:35:28'),
(50, 53, 17, 1, 17, '2016-09-09 01:50:34'),
(55, 53, 16, 0, 53, '2016-09-09 01:56:35'),
(63, 16, 56, 1, 56, '2016-09-09 02:18:31'),
(67, 53, 56, 1, 56, '2016-09-09 02:18:10'),
(71, 18, 59, 1, 59, '2016-09-09 02:21:35'),
(75, 18, 16, 1, 16, '2016-09-09 02:39:15'),
(76, 16, 57, 1, 57, '2016-09-09 03:16:07'),
(78, 18, 10, 1, 10, '2016-09-09 01:58:13'),
(79, 18, 58, 0, 18, '2016-09-09 01:47:44'),
(80, 18, 17, 1, 17, '2016-09-09 01:51:59'),
(81, 18, 19, 0, 18, '2016-09-09 01:48:26'),
(82, 17, 56, 1, 56, '2016-09-09 02:17:55'),
(84, 17, 10, 1, 10, '2016-09-09 01:58:31'),
(85, 17, 59, 1, 59, '2016-09-09 02:22:20'),
(86, 17, 58, 0, 17, '2016-09-09 01:51:41'),
(87, 17, 19, 0, 17, '2016-09-09 01:52:14'),
(88, 17, 57, 1, 57, '2016-09-09 03:17:02'),
(90, 53, 10, 1, 10, '2016-09-09 01:58:37'),
(91, 53, 59, 1, 59, '2016-09-09 02:22:30'),
(92, 53, 58, 0, 53, '2016-09-09 01:56:12'),
(93, 53, 19, 0, 53, '2016-09-09 01:56:42'),
(94, 53, 57, 1, 57, '2016-09-09 03:15:54'),
(95, 10, 59, 1, 59, '2016-09-09 02:21:47'),
(96, 10, 57, 1, 57, '2016-09-09 03:15:42'),
(97, 10, 56, 1, 56, '2016-09-09 02:17:30'),
(98, 10, 58, 0, 10, '2016-09-09 01:59:27'),
(101, 10, 19, 0, 10, '2016-09-09 01:59:49'),
(113, 56, 59, 1, 59, '2016-09-09 02:21:57'),
(114, 56, 58, 0, 56, '2016-09-09 02:17:45'),
(115, 56, 18, 0, 56, '2016-09-09 02:18:01'),
(116, 56, 19, 0, 56, '2016-09-09 02:18:37'),
(117, 56, 57, 1, 57, '2016-09-09 03:15:30'),
(125, 16, 59, 0, 16, '2016-11-06 17:03:49'),
(130, 16, 60, 0, 16, '2017-04-22 06:59:16'),
(131, 16, 74, 0, 16, '2017-05-23 18:32:30'),
(132, 16, 79, 1, 16, '2017-05-23 19:50:44'),
(133, 86, 16, 1, 16, '2017-05-29 11:46:23'),
(134, 90, 92, 0, 90, '2020-10-18 18:19:42'),
(135, 89, 98, 1, 98, '2020-10-18 18:44:13'),
(136, 89, 94, 1, 94, '2020-10-18 18:42:21'),
(137, 94, 98, 1, 98, '2020-10-18 18:44:24'),
(138, 90, 99, 1, 99, '2020-10-18 19:13:25'),
(139, 90, 100, 1, 100, '2020-10-18 19:14:18'),
(140, 90, 103, 1, 103, '2020-10-18 19:15:39'),
(141, 90, 98, 1, 98, '2020-10-18 19:16:33'),
(142, 90, 94, 1, 94, '2020-10-18 19:17:19'),
(143, 89, 99, 1, 99, '2020-10-18 19:13:41'),
(144, 89, 102, 1, 102, '2020-10-18 19:15:11'),
(145, 89, 103, 1, 103, '2020-10-18 19:15:45'),
(146, 91, 98, 1, 98, '2020-10-18 19:16:40'),
(147, 91, 94, 1, 94, '2020-10-18 19:17:25'),
(148, 91, 103, 1, 103, '2020-10-18 19:15:50'),
(149, 91, 101, 1, 101, '2020-10-18 19:14:51'),
(150, 91, 99, 1, 99, '2020-10-18 19:13:47'),
(151, 91, 100, 1, 100, '2020-10-18 19:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `hm_post`
--

CREATE TABLE `hm_post` (
  `post_id` int(11) NOT NULL,
  `post_hm_id` int(11) NOT NULL,
  `post_content` varchar(1000) DEFAULT NULL,
  `post_attach` varchar(45) DEFAULT NULL,
  `loc_id` int(11) DEFAULT NULL,
  `friend_tag_id` int(11) DEFAULT NULL,
  `hash_tag_id` int(11) DEFAULT NULL,
  `working_id` int(11) DEFAULT NULL,
  `post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hm_post`
--

INSERT INTO `hm_post` (`post_id`, `post_hm_id`, `post_content`, `post_attach`, `loc_id`, `friend_tag_id`, `hash_tag_id`, `working_id`, `post_time`) VALUES
(55, 16, 'kp', '20140209_202759.jpg', 6, 8, 1, 3, '2016-03-24 13:28:53'),
(56, 16, 'io', '20140209_202759.jpg', 4, 3, 1, 2, '2016-03-24 13:29:58'),
(57, 16, 'go', '20140209_130603.jpg', 5, 9, 1, 0, '2016-03-24 13:31:49'),
(58, 16, 'A masjid in Malasia...', 'IMG_20308615454985.jpeg', 4, 3, 1, 5, '2016-03-25 09:52:54'),
(59, 16, 'I luv ISLAM...', 'IMG_65813830863203.jpeg', 3, 2, 5, 4, '2016-03-25 10:07:46'),
(60, 16, 'My desktop monitor ...', '20130912_105104.jpg', 7, 5, 9, 7, '2016-03-25 12:23:07'),
(61, 16, 'India gate...at night.', '20130101_084419.jpg', 6, 6, 0, 8, '2016-03-25 12:24:57'),
(62, 16, 'My lappiii... HP Envy X2', '20131112_184746.jpg', 3, 2, 0, 6, '2016-03-25 23:57:36'),
(73, 16, 'my desk...', '160326081212000000.jpg', 5, 4, 7, 6, '2016-03-26 12:42:15'),
(74, 16, 'india...gate', '160326081523000000.jpg', 4, 3, 7, 5, '2016-03-26 12:45:25'),
(75, 16, 'me...', '160326081630000000.jpg', 4, 3, 6, 5, '2016-03-26 12:46:38'),
(76, 16, 'In KIET...', '160328035725000000.jpg', 4, 2, 2, 5, '2016-03-28 07:27:32'),
(77, 18, 'hi bro...', '160328052740000000.jpg', 5, 4, 7, 7, '2016-03-28 08:57:49'),
(79, 16, 'pic...', '160329074827000000.jpg', 4, 3, 6, 5, '2016-03-29 11:18:27'),
(80, 16, 'some more...', '160329074941000000.jpg', 4, 3, 2, 3, '2016-03-29 11:19:41'),
(82, 16, 'i got that...', '', 3, 1, 5, 4, '2016-03-30 07:07:02'),
(83, 18, 'dsfffas', '', 0, 0, 0, 0, '2016-08-15 23:32:33'),
(84, 16, 'gdsfgsdgsdfg', '', 0, 0, 0, 0, '2016-08-19 12:03:30'),
(85, 16, '', 'feedly-512.png', 0, 0, 0, 0, '2016-08-19 12:03:53'),
(86, 16, '', 'feedly-512.png', 0, 0, 0, 0, '2016-08-19 12:16:27'),
(87, 16, '', '160819121705000000.png', 0, 0, 0, 0, '2016-08-19 12:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `hm_post_like`
--

CREATE TABLE `hm_post_like` (
  `like_post_id` int(11) NOT NULL,
  `like_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hm_post_like`
--

INSERT INTO `hm_post_like` (`like_post_id`, `like_hm_id`) VALUES
(307, 16),
(230, 16),
(229, 16),
(198, 16),
(318, 16),
(319, 16),
(304, 16),
(311, 16),
(320, 16),
(322, 16),
(323, 16),
(316, 16),
(315, 16),
(310, 16),
(324, 16),
(326, 16),
(313, 16),
(291, 16),
(309, 16),
(331, 16),
(330, 16),
(327, 16),
(334, 16),
(333, 16),
(332, 16),
(328, 16),
(314, 16),
(301, 16),
(146, 16),
(298, 16),
(298, 17),
(335, 17),
(336, 16),
(335, 16),
(338, 16),
(170, 16),
(329, 16),
(346, 16),
(339, 16),
(345, 16),
(347, 16),
(348, 16),
(349, 16),
(204, 16),
(349, 25),
(351, 16),
(352, 16),
(356, 16),
(357, 16),
(369, 81),
(373, 79),
(282, 17),
(374, 16),
(375, 16),
(375, 86);

-- --------------------------------------------------------

--
-- Table structure for table `hm_post_tag`
--

CREATE TABLE `hm_post_tag` (
  `post_tag_id` int(11) NOT NULL,
  `tag_post_id` int(11) NOT NULL,
  `tag_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hm_post_vote`
--

CREATE TABLE `hm_post_vote` (
  `post_vote_id` int(11) NOT NULL,
  `vote_post_id` int(11) NOT NULL,
  `vote_hm_id` int(11) NOT NULL,
  `vote_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hm_post_vote`
--

INSERT INTO `hm_post_vote` (`post_vote_id`, `vote_post_id`, `vote_hm_id`, `vote_no`) VALUES
(1, 309, 18, 3),
(2, 308, 18, 3),
(3, 307, 18, 3),
(4, 306, 18, 4),
(5, 305, 18, 3),
(6, 304, 18, 5),
(7, 303, 18, 3),
(8, 300, 18, 5),
(9, 298, 18, 3),
(10, 297, 18, 4),
(11, 296, 18, 4),
(12, 295, 18, 3),
(13, 303, 16, 5),
(15, 310, 16, 2),
(16, 309, 16, 5),
(17, 311, 16, 2),
(18, 312, 16, 3),
(19, 312, 18, 4),
(20, 302, 16, 5),
(21, 302, 18, 5),
(22, 301, 16, 4),
(23, 301, 18, 3),
(24, 230, 16, 5),
(25, 229, 16, 3),
(26, 224, 16, 4),
(27, 313, 16, 3),
(28, 282, 16, 3),
(29, 231, 16, 3),
(30, 228, 16, 5),
(31, 314, 16, 4),
(32, 307, 16, 3),
(33, 306, 16, 3),
(34, 316, 16, 5),
(35, 318, 16, 4),
(36, 317, 16, 4),
(37, 315, 16, 4),
(38, 203, 16, 4),
(39, 201, 16, 4),
(40, 202, 16, 4),
(41, 198, 16, 2),
(42, 300, 16, 4),
(43, 304, 16, 2),
(44, 297, 16, 4),
(45, 319, 16, 3),
(46, 322, 16, 3),
(47, 323, 16, 4),
(48, 320, 16, 4),
(49, 321, 16, 5),
(50, 324, 16, 5),
(51, 325, 16, 2),
(52, 326, 16, 4),
(53, 327, 16, 4),
(54, 328, 16, 5),
(55, 291, 16, 3),
(56, 332, 16, 4),
(57, 331, 16, 3),
(58, 330, 16, 5),
(59, 334, 16, 4),
(60, 333, 16, 4),
(61, 329, 16, 4),
(62, 146, 16, 4),
(63, 298, 16, 4),
(64, 298, 17, 3),
(65, 335, 17, 5),
(66, 336, 16, 4),
(67, 335, 16, 4),
(68, 338, 16, 5),
(69, 339, 16, 5),
(70, 170, 16, 4),
(71, 347, 16, 4),
(72, 346, 16, 5),
(73, 345, 16, 4),
(74, 348, 16, 4),
(75, 349, 16, 4),
(76, 204, 16, 4),
(77, 350, 16, 4),
(78, 343, 16, 4),
(79, 351, 16, 4),
(80, 352, 16, 2),
(81, 356, 16, 3),
(82, 357, 16, 4),
(83, 369, 81, 2),
(84, 373, 79, 4),
(85, 374, 16, 5),
(86, 375, 16, 4),
(87, 375, 86, 3),
(88, 351, 17, 1),
(89, 282, 17, 1),
(90, 161, 17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hm_profile`
--

CREATE TABLE `hm_profile` (
  `hm_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mobile_no1` varchar(13) NOT NULL,
  `mobile_no2` varchar(13) NOT NULL,
  `address1` varchar(80) NOT NULL,
  `address2` varchar(80) NOT NULL,
  `last_seen` datetime NOT NULL,
  `user_quote` varchar(100) NOT NULL,
  `user_aim` varchar(100) NOT NULL,
  `user_idea` varchar(50) NOT NULL,
  `d_o_b` date NOT NULL,
  `about_me` varchar(150) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `profile_pic` varchar(60) NOT NULL,
  `profile_type` tinyint(2) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `matrimonial_status_id` tinyint(1) NOT NULL,
  `religion_id` tinyint(2) NOT NULL,
  `gender_id` tinyint(1) NOT NULL,
  `online_status` tinyint(1) NOT NULL,
  `date_of_join` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Main table of helpmiii db.';

--
-- Dumping data for table `hm_profile`
--

INSERT INTO `hm_profile` (`hm_id`, `first_name`, `last_name`, `id_proof`, `password`, `mobile_no1`, `mobile_no2`, `address1`, `address2`, `last_seen`, `user_quote`, `user_aim`, `user_idea`, `d_o_b`, `about_me`, `pin_code`, `profile_pic`, `profile_type`, `location_id`, `city`, `state`, `country`, `lat`, `lon`, `matrimonial_status_id`, `religion_id`, `gender_id`, `online_status`, `date_of_join`) VALUES
(10, 'Schoolic', 'Support', 'support@schoolic.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '9454910640', '8175986604', 'Near KIET College', 'Muradnagar', '2016-09-09 03:14:23', 'HelpMiii will help you.', 'To provide support each and every human being.', 'Help every one and ALLAH will help you Insha ALLAH', '2016-08-25', 'I am the support section of HelpMiii', 201206, 'helpmiiilogo.png', 2, 2, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2016-08-25 00:00:00'),
(16, 'rahatullah', 'ansari', 'rahatullah19@kiet.edu', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '94549 10640', '8126060900', 'Near K.I.E.T College', 'Muradnagar', '2017-06-08 13:12:34', 'Nsha pila ke girana to sabhi ko aata hai, mza to tab aata hai jab girte hua ko tham lo.', 'To be the Founder & CEO of Chaton', 'Be creative.', '1994-05-09', 'I am, what i am.', 4656464, '12105802_1732024657025566_7808685663300186998_n.jpg', 1, 1, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 1, 0, '2015-11-14 21:36:44'),
(17, 'rahat', 'ansari', 'rahatullah.1310107@kiet.edu', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '9454910640', '8318700061', 'gorari', 'khetasarai', '2020-10-18 14:19:07', '', 'i m rahat', '', '0000-00-00', '', 0, 'badge.png', 3, NULL, 'jaunpur', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 1, 0, '2015-11-14 21:55:57'),
(18, 'rahat', 'ullah', 'rahatullha@gmail.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '94549 10640', '94159 93738', 'gorari', 'khetasarai', '2020-10-18 18:38:23', '', 'i m rahat ullah\r\n\r\nRUA', '', '0000-00-00', 'jhgfghfdrtrt', 0, 'Koala.jpg', 4, NULL, 'jaunpur', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 1, 0, '2015-11-14 23:50:27'),
(19, 'RAJAT', 'SARAWAGI', 'sarawagirajat07@gmail.com', 'a08aad349b988de863f942624e50f39646583ae1', '88608 34234', '89606 86317', 'kiet', 'kiet', '0000-00-00 00:00:00', '', '', '', '1994-09-17', 'hi,i am friends with rahat..\r\nhelp him become billionarie!!!\r\ngreetings', 0, 'Koala.jpg', 0, NULL, 'gorakhpur', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 1, 0, '2015-11-16 21:15:20'),
(53, 'Rahat', 'Helpmiii', 'rahat@helpmiii.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '80046 95200', '80046 95200', 'near KIET College', 'Muradnagar', '2016-09-09 01:57:15', '', 'i m an inno...@RUA', '', '1994-05-09', 'i m a dates company', 201206, 'feedly-512.png', 0, NULL, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2016-08-27 14:42:07'),
(59, 'Helpmiii', 'Dates', 'dates@helpmiii.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '80046 95200', '80046 95200', 'Near KIET Clg', 'Muradnagar', '2016-09-09 03:13:50', '', 'To be the dates Founder ', '', '1994-05-09', 'I m the HelpMiii Company', 201206, 'profile.png', 0, NULL, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2016-09-07 19:08:01'),
(60, 'Ahmad', 'Jamal', 'invincible.saiz@gmail.com', '7ffba4c387e03dec31aaac78e6c727ee3ed78ee4', '74171 70977', '', 'KIET', 'College', '2017-01-30 11:43:37', '', '', '', '1995-05-25', 'Somewhere beneath the fading mountains and the drowning suns.', 201206, '1656197_631544143559949_2100529680_n.jpg', 0, NULL, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2017-01-30 09:24:19'),
(61, 'zainab', 'fatima', 'zainab@gmail.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '9415993435', '', 'sayida polyclinic', 'gorari', '2017-02-26 18:30:48', '', '', '', '2000-07-16', '', 222193, 'header_badge.png', 0, NULL, 'jaunpur', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2017-02-21 10:32:18'),
(64, 'juned', 'azam', 'junedazam36@gmail.com', 'defbc6426044dc623b642fc77d6bf9f84c34adde', '94549 10640', '94549 10649', 'ghfghfgh', 'hghjfghghg', '2017-04-21 10:53:34', '', '', '', '1997-10-17', 'hi i m azam', 0, '160330171605000000.png', 0, NULL, 'ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2017-04-21 10:46:40'),
(74, 'nasir', 'iqbal', 'nash2hack@gmail.com', '8dd9f7859d82943eff42cff3d8a6b528fd2a40ae', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', '', 0, '', 0, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2017-04-22 01:02:14'),
(79, 'nasir', 'iqbal', 'nasir@gmail.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2017-05-25 09:28:06', '', 'Hi i m nasir', '', '0000-00-00', '', 0, '', 0, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 1, 0, '2017-05-21 15:20:38'),
(80, 'ChatOn', 'Support', 'support@chaton.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '9454910640', '8126060900', 'Near KIET college', 'Muradnagar', '2017-05-21 15:41:44', '', '', '', '2015-05-09', 'I am ChatOn support.', 0, 'ChatOn.jpg', 0, NULL, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 1, 0, '2017-05-21 15:35:05'),
(84, 'Nasir', 'Iqbal', 'nash2ham@gmail.com', '702eb17675db0b13ca291c753932a576d7122939', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', '', 0, '', 0, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2017-05-28 22:02:32'),
(85, 'sdfasdf', 'sdfasf', 'safsadfasd@s', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', '', 0, '', 0, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2017-05-28 22:15:29'),
(86, 'Ahmad', 'Jamal', 'ahmad.1310010@kiet.edu', 'f048955988dd60bd056df48413513b001c3dd219', '92050 82177', '', 'KIET', 'Muradnagar', '2017-05-29 12:30:33', '', '', '', '0000-00-00', '', 0, '1656197_631544143559949_2100529680_n.jpg', 0, NULL, 'Ghaziabad', 'Uttar Pradesh', 'India', 0.000000, 0.000000, 0, 0, 0, 0, '2017-05-29 11:33:03'),
(87, 'Rua', 'Dates', 'ruadates@kiet.edu', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 14:31:58', '', '', '', '0000-00-00', '', 0, '', 0, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 14:20:20'),
(88, 'rua', '', 'dates@gmail.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 15:54:20', '', '', '', '0000-00-00', '', 0, '', 1, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 15:53:14'),
(89, 'Student', '', 'student@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:26:00', '', '', '', '0000-00-00', '', 0, '', 1, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 15:56:25'),
(90, 'Teacher', '', 'teacher@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:26:33', '', '', '', '0000-00-00', '', 0, '', 2, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 15:57:13'),
(91, 'Parent', '', 'parent@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:28:36', '', '', '', '0000-00-00', '', 0, '', 3, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 1, '2020-10-18 15:58:05'),
(92, 'Python', '', 'python@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', '', 0, '', 5, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:03:55'),
(93, 'PHP', '', 'php@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', 'php', 0, '', 5, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:14:13'),
(94, 'sjs', '', 'sjs@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '9454910640', '', '', '', '2020-10-18 19:17:28', '', '', '', '0000-00-00', 'sjs', 0, '', 4, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:24:14'),
(95, 'html', '', 'html@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', 'html', 0, '', 5, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:41:49'),
(96, 'css', '', 'css@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00', 'css', 0, '', 5, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:43:28'),
(97, 'dalimss', '', 'dal@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '2020-10-18 17:55:07', '', '', '', '0000-00-00', 'dal', 0, '', 4, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 17:45:14'),
(98, 'Group', '', 'group@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '2020-10-18 19:17:00', '', '', '', '0000-00-00', 'group', 0, '', 5, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 18:38:04'),
(99, 'Mathematics', '', 'm@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '2020-10-18 19:13:58', '', '', '', '0000-00-00', 'maths', 0, '', 6, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 19:05:35'),
(100, 'Science', '', 's@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '8004695200', '', '', '', '2020-10-18 19:14:31', '', '', '', '0000-00-00', 'science', 0, '', 6, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 19:06:21'),
(101, 'English', '', 'e@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:14:55', '', '', '', '0000-00-00', 'english', 0, '', 6, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 19:07:45'),
(102, 'Hindi', '', 'h@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:15:13', '', '', '', '0000-00-00', '', 0, '', 6, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 19:08:10'),
(103, 'Computer', '', 'c@g.com', 'bd068826ccd4bbcd7d155ece8cff026132a0a589', '', '', '', '', '2020-10-18 19:16:02', '', '', '', '0000-00-00', '', 0, '', 6, NULL, '', '', '', 0.000000, 0.000000, 0, 0, 0, 0, '2020-10-18 19:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `hm_shop_category`
--

CREATE TABLE `hm_shop_category` (
  `shop_category_id` int(11) NOT NULL,
  `shop_category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_photos`
--

CREATE TABLE `item_photos` (
  `p_item_id` int(11) NOT NULL,
  `i_photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `cities` varchar(45) NOT NULL,
  `states` varchar(45) NOT NULL,
  `country_id` int(3) NOT NULL,
  `pincode` varchar(45) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `users_count` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_status`
--

CREATE TABLE `marriage_status` (
  `marriage_status_id` int(1) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for marriage status';

-- --------------------------------------------------------

--
-- Table structure for table `novels`
--

CREATE TABLE `novels` (
  `novel_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `discription` varchar(100) DEFAULT NULL,
  `date_of_publication` date DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `reader_count` int(6) DEFAULT NULL,
  `view_count` int(8) DEFAULT NULL,
  `type_id` int(2) DEFAULT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `cover_photo_id` int(11) DEFAULT NULL,
  `review_count` int(3) DEFAULT NULL,
  `vote_count` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `novel_chapters`
--

CREATE TABLE `novel_chapters` (
  `chapter_id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `chapter_title` varchar(20) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `view_count` int(6) DEFAULT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `novel_charter_reviews`
--

CREATE TABLE `novel_charter_reviews` (
  `n_c_review_id` int(11) NOT NULL,
  `r_charter_id` int(11) NOT NULL,
  `reviews` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `n_c_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `novel_review`
--

CREATE TABLE `novel_review` (
  `review_id` int(11) NOT NULL,
  `r_novel_id` int(11) NOT NULL,
  `review` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `n_reviewer_id` int(11) DEFAULT NULL,
  `vote_count` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `novel_types`
--

CREATE TABLE `novel_types` (
  `type_id` int(2) NOT NULL,
  `types` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `novel_vote_hm`
--

CREATE TABLE `novel_vote_hm` (
  `v_novel_id` int(11) NOT NULL,
  `n_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n_chapter_review_hm`
--

CREATE TABLE `n_chapter_review_hm` (
  `n_c_review_id` int(11) NOT NULL,
  `n_c_r_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n_chapter_vote_hm`
--

CREATE TABLE `n_chapter_vote_hm` (
  `v_n_chapter_id` int(11) NOT NULL,
  `n_c_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `n_review_hm`
--

CREATE TABLE `n_review_hm` (
  `n_review_id` int(11) NOT NULL,
  `n_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `caption` varchar(20) DEFAULT NULL,
  `upload_datetime` datetime NOT NULL,
  `hm_id` int(11) NOT NULL,
  `view_count` int(10) DEFAULT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for photos';

-- --------------------------------------------------------

--
-- Table structure for table `photo_reviews`
--

CREATE TABLE `photo_reviews` (
  `review_id` int(11) NOT NULL,
  `r_photo__id` int(11) NOT NULL,
  `reviews` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  `p_reviewer_id` int(11) DEFAULT NULL,
  `vote_count` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_share`
--

CREATE TABLE `photo_share` (
  `share_id` int(11) NOT NULL,
  `s_photo_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `sharer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_vote_hm`
--

CREATE TABLE `photo_vote_hm` (
  `v_photo_id` int(11) NOT NULL,
  `p_vote_hm_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(9) NOT NULL,
  `post_hm_id` int(11) NOT NULL,
  `desc` mediumtext NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `vid_url` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `block` varchar(1) NOT NULL,
  `special` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `post_hm_id`, `desc`, `image_url`, `vid_url`, `date`, `block`, `special`) VALUES
(146, 16, 'i m Rahatullah Ansari\r\n\r\ni m inno...', '', '', '2016-09-04 02:43:39', '', ''),
(160, 17, 'sdafsadfsaf', '20131122_222752.jpg', '', '2016-09-05 14:31:39', '', ''),
(161, 17, 'Tajdar-e-haram...by Atif Aslam', '', 'https://www.youtube.com/watch?v=a18py61_F_w', '2016-09-05 14:33:11', '', ''),
(169, 17, 'fgfhfhhgh', '20130101_084120.jpg', '', '2016-09-05 15:10:30', '', ''),
(176, 16, 'ewrfwrf', '20130101_084419.jpg', '', '2016-09-05 17:56:51', '', ''),
(180, 16, 'gffghfg', '20131023_205353.jpg', '', '2016-09-05 18:15:30', '', ''),
(188, 16, 'my laptop...envy', '20131103_191025.jpg', '', '2016-09-05 18:19:01', '', ''),
(189, 16, 'my laptop...envy', '20131103_191025.jpg', '', '2016-09-05 18:19:01', '', ''),
(198, 53, 'hey coolll...', '', '', '2016-09-05 22:26:09', '', ''),
(204, 53, 'metro station...', '20131030_162224.jpg', '', '2016-09-05 23:31:50', '', ''),
(228, 16, 'R.U.A.', 'FB_IMG_1454510805954.jpg', '', '2016-09-06 23:07:41', '', '1'),
(282, 59, 'Joined HelpMiii on <br><br>Wednesday 7th of Septem...\n', '', '', '2016-09-07 23:06:28', '', '1'),
(299, 16, '&amp;#xe348', '', '', '2016-09-10 00:01:47', '', ''),
(301, 16, 'my room\r\n', 'photo-1455994972514-4624f7f224a7.jpg', '', '2016-09-10 20:19:05', '', ''),
(315, 16, 'at igi', 'DSC_0007.JPG', '', '2016-09-13 20:17:25', '', ''),
(316, 16, 'indigo...', 'DSC_0008.JPG', '', '2016-09-13 20:19:38', '', ''),
(317, 16, 'in plane...', 'DSC_0012.JPG', '', '2016-09-13 20:20:52', '', ''),
(318, 16, 'view outside the plane...', 'DSC_0030.JPG', '', '2016-09-13 20:22:09', '', ''),
(324, 16, 'dll kare by atif...', '', 'https://youtu.be/XG67k-ICAaY', '2016-09-29 15:18:57', '', ''),
(326, 16, 'HELLO....', 'Screenshot (4).png', '', '2016-10-05 11:56:54', '', ''),
(327, 16, 'hello...', '', '', '2016-10-24 17:08:29', '', ''),
(329, 16, 'logo...', 'profile.png', '', '2016-11-03 18:41:44', '', ''),
(330, 16, 'rua...', 'rua_cover.jpg', '', '2016-11-03 18:42:47', '', ''),
(331, 16, 'ani', 'Koala.jpg', '', '2016-11-03 18:47:38', '', ''),
(332, 16, 'rahat', 'IMG-20140328-WA0003.jpg', '', '2016-11-03 18:50:31', '', ''),
(334, 16, 'helpmiii logo', 'helpmiiilogo.png', '', '2016-11-05 11:57:06', '', ''),
(341, 16, 'dfgsgdfgs', 'feedly-512.png', '', '2016-11-10 07:24:37', '', ''),
(342, 16, 'ertwrterte', 'bg-Ansari-Rahatullah (2014_03_11 12_45_14 UTC).png', '', '2016-11-10 07:28:31', '', ''),
(343, 16, 'erfewrfwe', 'helpmiiilogo.png', '', '2016-11-10 07:33:05', '', ''),
(348, 16, 'hello', '', '', '2016-11-18 11:09:09', '', ''),
(350, 16, 'I m alive', '', 'https://www.youtube.com/watch?v=-R5YWh45s6I', '2016-11-28 09:35:02', '', ''),
(351, 60, 'Joined HelpMiii on <br><br>Monday 30th of January 2017', '', '', '2017-01-30 09:24:19', '', '1'),
(352, 16, 'hi man i m here', '', '', '2017-02-20 18:25:29', '', ''),
(353, 61, 'Joined KietOn on <br><br>Tuesday 21st of February 2017', '', '', '2017-02-21 10:32:18', '', '1'),
(354, 62, 'Joined KietOn on <br><br>Monday 6th of March 2017', '', '', '2017-03-06 09:26:02', '', '1'),
(355, 63, 'Joined KietOn on <br><br>Monday 6th of March 2017', '', '', '2017-03-06 09:27:06', '', '1'),
(356, 16, 'Web App for Lost Child... ( UDAY KI AASHA )', '170416085800000000.png', '', '2017-04-16 08:59:54', '', ''),
(357, 16, 'Our first startup... EAGSULA MEDIA\r\n\r\nIt is India\'s first regional language podcast network.', '170420185101000000.png', '', '2017-04-20 18:53:01', '', ''),
(358, 64, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 10:46:40', '', '1'),
(359, 65, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:05:57', '', '1'),
(360, 66, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:06:54', '', '1'),
(361, 67, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:09:13', '', '1'),
(362, 68, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:12:42', '', '1'),
(363, 69, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:13:53', '', '1'),
(364, 70, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:19:38', '', '1'),
(365, 71, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:29:26', '', '1'),
(366, 72, 'Joined KietOn on <br><br>Friday 21st of April 2017', '', '', '2017-04-21 11:36:11', '', '1'),
(367, 75, 'Joined KietOn on <br><br>Saturday 22nd of April 2017', '', '', '2017-04-22 06:41:58', '', '1'),
(368, 76, 'Joined KietOn on <br><br>Saturday 22nd of April 2017', '', '', '2017-04-22 06:45:36', '', '1'),
(369, 81, 'Joined KietOn on <br><br>Tuesday 23rd of May 2017', '', '', '2017-05-23 22:16:50', '', '1'),
(370, 82, 'Joined KietOn on <br><br>Tuesday 23rd of May 2017', '', '', '2017-05-23 23:12:33', '', '1'),
(371, 83, 'Joined KietOn on <br><br>Tuesday 23rd of May 2017', '', '', '2017-05-23 23:21:00', '', '1'),
(372, 16, 'A 12-year-old app developer', '', 'https://www.youtube.com/watch?v=Fkd9TWUtFm0', '2017-05-23 23:39:55', '', ''),
(373, 16, 'UdayKiAasha- A project for a good cause.', '170523234136000000.png', '', '2017-05-23 23:43:02', '', ''),
(374, 86, 'Joined KietOn on <br><br>Monday 29th of May 2017', '', '', '2017-05-29 11:33:03', '', '1'),
(375, 86, 'Welcome !!!\r\n', '', '', '2017-05-29 11:34:49', '', ''),
(376, 16, 'DR. FARHATULLAH ANSARI\r\n\r\nFather\'s name- Dr. Sibghatullah Ansari (BUMMS, AMU, Aligarh)\r\nRetired Divisional Unani Officer , Varanasi Division, UP.\r\n\r\nMother\'s name- Dr. Sayida Bano (B.Ed, M.Ed in Sociology, Kashi Vidyapeeth, Varanasi &amp; DUMMS, Ibn-E-Sina Tibbiya College, Beenapara, Azamgarh)\r\n\r\nPermanent Address- Sayida Polyclinic, Gorari, Khetasarai, Jaunpur, UP.\r\n\r\nPresent Address- SDM College of Medical Sciences and Hospital, Sattur, Dharwad, Karnataka.\r\n\r\nDate of birth- 11 Nov 1987\r\n\r\nHeight-  5\' 3&quot;\r\n\r\nEducational Qualification-\r\nGraduation\r\nCourse: MBBS\r\nYear of Passing: 2017\r\nInstitute: SDM College of Medical Sciences and Hospital, Sattur, Dharwad, Karnataka-580009\r\nCourse: B.Sc in Chemistry Honours (Dropout for Medical preparation)\r\nYear of Passing: 2008\r\nInstitute: AMU, Aligarh, UP\r\nIntermediate (2004 - 05)\r\nStream: PCB\r\nBoard: ICSE\r\nSchool: St. John\'s School, Jaunpur.\r\nHigh School  (2002 - 03)\r\nBoard: ICSE\r\nSchool: St. Johna€™s School, Jaunpur.\r\n\r\nBrother\'s Details- \r\nRahatullah Ansari (Younger)\r\nB.Tech in Computer Science, KIET College, Ghaziabad, UP.\r\n\r\nSister\'s Details-\r\nZainab Fatima (Younger)\r\nStudying in 12th class, JMD School, Jaunpur, UP.\r\n\r\nContact Info-\r\nMobile no: 9415993738, 7897177312\r\nWhatsapp no: 9454910610\r\n', '', '', '2017-06-08 12:41:51', '', ''),
(377, 17, 'in 2020\r\n', '', '', '2020-06-02 10:55:55', '', ''),
(378, 17, 'Rua', '201016093959000000.jpg', '', '2020-10-16 09:40:19', '', ''),
(379, 17, '                  ryreyryretyrt', '', '', '2020-10-18 13:33:31', '', ''),
(380, 87, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 14:20:20', '', '1'),
(381, 88, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 15:53:14', '', '1'),
(382, 89, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 15:56:25', '', '1'),
(383, 90, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 15:57:13', '', '1'),
(384, 91, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 15:58:05', '', '1'),
(385, 92, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:03:55', '', '1'),
(386, 93, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:14:13', '', '1'),
(387, 94, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:24:14', '', '1'),
(388, 95, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:41:49', '', '1'),
(389, 96, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:43:28', '', '1'),
(390, 97, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 17:45:14', '', '1'),
(391, 98, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 18:38:04', '', '1'),
(392, 99, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 19:05:35', '', '1'),
(393, 100, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 19:06:21', '', '1'),
(394, 101, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 19:07:45', '', '1'),
(395, 102, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 19:08:10', '', '1'),
(396, 103, 'Joined Schoolic on <br><br>Sunday 18th of October 2020', '', '', '2020-10-18 19:08:34', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `p_review_hm`
--

CREATE TABLE `p_review_hm` (
  `review_id` int(11) NOT NULL,
  `p_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_share_hm`
--

CREATE TABLE `p_share_hm` (
  `share_id` int(11) NOT NULL,
  `p_s_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `religion_id` int(2) NOT NULL,
  `religion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for religions';

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `s_p_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `year_of_est` year(4) DEFAULT NULL,
  `s_p_location_id` int(11) NOT NULL,
  `s_p_pro_pic_id` int(11) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL,
  `speciality` varchar(45) DEFAULT NULL,
  `contact_no1` int(10) DEFAULT NULL,
  `contact_no2` int(10) DEFAULT NULL,
  `s_p_type_id` int(2) DEFAULT NULL,
  `s_p_category_id` int(3) DEFAULT NULL,
  `visitors_count` int(7) DEFAULT NULL,
  `s_p_admin_id` int(11) NOT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_photos`
--

CREATE TABLE `service_provider_photos` (
  `p_s_p_id` int(11) NOT NULL,
  `s_p_photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `year_of_est` year(4) DEFAULT NULL,
  `speciality` varchar(50) DEFAULT NULL,
  `pro_pic_id` int(11) DEFAULT NULL,
  `contact_no1` int(10) DEFAULT NULL,
  `contact_no2` int(10) DEFAULT NULL,
  `s_location_id` int(11) DEFAULT NULL,
  `s_type_id` int(2) DEFAULT NULL,
  `s_category_id` int(3) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL,
  `visitors_count` int(7) DEFAULT NULL,
  `s_admin_id` int(11) NOT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_categorys`
--

CREATE TABLE `shop_categorys` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `item_id` int(11) NOT NULL,
  `i_shop_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `viewer_count` int(5) DEFAULT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_photos`
--

CREATE TABLE `shop_photos` (
  `p_shop_id` int(11) NOT NULL,
  `shop_photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_reviews`
--

CREATE TABLE `shop_reviews` (
  `review_id` int(11) NOT NULL,
  `r_shop_id` int(11) NOT NULL,
  `reviews` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_review_vote_hm`
--

CREATE TABLE `shop_review_vote_hm` (
  `s_review_id` int(11) NOT NULL,
  `s_r_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_shares`
--

CREATE TABLE `shop_shares` (
  `share_id` int(11) NOT NULL,
  `s_shop_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `s_sharer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_share_hm`
--

CREATE TABLE `shop_share_hm` (
  `s_share_id` int(11) NOT NULL,
  `s_s_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_types`
--

CREATE TABLE `shop_types` (
  `type_id` int(1) NOT NULL,
  `type_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_votes`
--

CREATE TABLE `shop_votes` (
  `v_shop_id` int(11) NOT NULL,
  `s_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `sport_id` int(2) NOT NULL,
  `sport` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table for sports';

-- --------------------------------------------------------

--
-- Table structure for table `swap`
--

CREATE TABLE `swap` (
  `user_id` int(13) NOT NULL,
  `box_0` int(13) NOT NULL,
  `box_1` int(13) NOT NULL,
  `box_2` int(13) NOT NULL,
  `box_3` int(13) NOT NULL,
  `box_4` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `swap`
--

INSERT INTO `swap` (`user_id`, `box_0`, `box_1`, `box_2`, `box_3`, `box_4`) VALUES
(16, 86, 53, 18, 17, 61),
(17, 64, 19, 61, 74, 86),
(18, 16, 17, 79, 19, 0),
(19, 10, 0, 0, 0, 0),
(53, 10, 0, 0, 0, 0),
(56, 10, 0, 0, 0, 0),
(57, 10, 0, 0, 0, 0),
(58, 10, 0, 0, 0, 0),
(59, 10, 0, 0, 0, 0),
(60, 16, 10, 0, 0, 0),
(61, 10, 0, 0, 0, 0),
(62, 10, 0, 0, 0, 0),
(63, 10, 0, 0, 0, 0),
(64, 10, 0, 0, 0, 0),
(65, 10, 0, 0, 0, 0),
(66, 10, 0, 0, 0, 0),
(67, 10, 0, 0, 0, 0),
(68, 10, 0, 0, 0, 0),
(69, 10, 0, 0, 0, 0),
(70, 10, 0, 0, 0, 0),
(71, 10, 0, 0, 0, 0),
(72, 10, 0, 0, 0, 0),
(75, 10, 0, 0, 0, 0),
(76, 16, 10, 0, 0, 0),
(77, 40, 0, 0, 0, 0),
(78, 0, 0, 0, 0, 0),
(79, 80, 16, 18, 0, 0),
(80, 0, 0, 0, 0, 0),
(81, 10, 0, 0, 0, 0),
(82, 10, 0, 0, 0, 0),
(83, 10, 0, 0, 0, 0),
(86, 16, 10, 0, 0, 0),
(87, 16, 0, 0, 0, 0),
(88, 10, 0, 0, 0, 0),
(89, 10, 0, 0, 0, 0),
(90, 10, 0, 0, 0, 0),
(91, 94, 10, 0, 0, 0),
(92, 10, 0, 0, 0, 0),
(93, 10, 0, 0, 0, 0),
(94, 10, 0, 0, 0, 0),
(95, 10, 0, 0, 0, 0),
(96, 10, 0, 0, 0, 0),
(97, 10, 0, 0, 0, 0),
(98, 10, 0, 0, 0, 0),
(99, 10, 0, 0, 0, 0),
(100, 10, 0, 0, 0, 0),
(101, 10, 0, 0, 0, 0),
(102, 10, 0, 0, 0, 0),
(103, 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_item_reviews`
--

CREATE TABLE `s_item_reviews` (
  `review_id` int(11) NOT NULL,
  `r_s_item_id` int(11) NOT NULL,
  `reviews` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_i_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_item_review_hm`
--

CREATE TABLE `s_item_review_hm` (
  `i_review_id` int(11) NOT NULL,
  `s_i_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_item_shares`
--

CREATE TABLE `s_item_shares` (
  `share_id` int(11) NOT NULL,
  `s_item_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `s_i_sharer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_item_share_hm`
--

CREATE TABLE `s_item_share_hm` (
  `i_share_id` int(11) NOT NULL,
  `i_s_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_item_votes`
--

CREATE TABLE `s_item_votes` (
  `v_s_item_id` int(11) NOT NULL,
  `s_i_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_owners_hm`
--

CREATE TABLE `s_owners_hm` (
  `shop_id` int(11) NOT NULL,
  `s_owner_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_categories`
--

CREATE TABLE `s_p_categories` (
  `category_id` int(11) NOT NULL,
  `categories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_owner_hm`
--

CREATE TABLE `s_p_owner_hm` (
  `service_p_id` int(11) NOT NULL,
  `s_p_owner_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_reviews`
--

CREATE TABLE `s_p_reviews` (
  `review_id` int(11) NOT NULL,
  `r_s_p_id` int(11) NOT NULL,
  `reviews` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_p_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_review_vote_hm`
--

CREATE TABLE `s_p_review_vote_hm` (
  `s_p_review_id` int(11) NOT NULL,
  `s_p_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_services`
--

CREATE TABLE `s_p_services` (
  `service_id` int(11) NOT NULL,
  `service_s_p_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `viewer_count` int(6) DEFAULT NULL,
  `vote_count` int(5) DEFAULT NULL,
  `review_count` int(4) DEFAULT NULL,
  `share_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_service_photos`
--

CREATE TABLE `s_p_service_photos` (
  `p_service_id` int(11) NOT NULL,
  `s_p_s_photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_shares`
--

CREATE TABLE `s_p_shares` (
  `share_id` int(11) NOT NULL,
  `s_s_p_id` int(11) NOT NULL,
  `s_p_sharer_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_share_hm`
--

CREATE TABLE `s_p_share_hm` (
  `s_p_share_id` int(11) NOT NULL,
  `s_p_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_s_reviews`
--

CREATE TABLE `s_p_s_reviews` (
  `review_id` int(11) NOT NULL,
  `r_service_id` int(11) NOT NULL,
  `reviews` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_p_s_reviewer_id` int(11) NOT NULL,
  `vote_count` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_s_review_vote_hm`
--

CREATE TABLE `s_p_s_review_vote_hm` (
  `s_p_s_review_id` int(11) NOT NULL,
  `s_p_s_r_vote_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_s_shares`
--

CREATE TABLE `s_p_s_shares` (
  `share_id` int(11) NOT NULL,
  `s_service_id` int(11) NOT NULL,
  `s_p_s_sharer_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_s_share_hm`
--

CREATE TABLE `s_p_s_share_hm` (
  `s_p_s_share_id` int(11) NOT NULL,
  `s_p_s_hm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_s_votes_hm`
--

CREATE TABLE `s_p_s_votes_hm` (
  `v_service_id` int(11) NOT NULL,
  `s_p_s_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_types`
--

CREATE TABLE `s_p_types` (
  `types_id` int(2) NOT NULL,
  `types` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `s_p_votes_hm`
--

CREATE TABLE `s_p_votes_hm` (
  `v_s_p_id` int(11) NOT NULL,
  `s_p_vote_hm_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `veg_status`
--

CREATE TABLE `veg_status` (
  `veg_status_id` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autocomplete`
--
ALTER TABLE `autocomplete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cpid` (`cpid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `dishes_hm`
--
ALTER TABLE `dishes_hm`
  ADD PRIMARY KEY (`dish_hm_id`),
  ADD KEY `dish_hm_dp_id_idx` (`dish_hm_dp_id`),
  ADD KEY `veg_status_id_idx` (`veg_status_id`),
  ADD KEY `cooked_by_id_idx` (`cooked_by_id`),
  ADD KEY `dish_from_id_idx` (`dish_form_id`);

--
-- Indexes for table `dish_hm_reviews`
--
ALTER TABLE `dish_hm_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_dish_hm_id_idx` (`r_dish_hm_id`),
  ADD KEY `d_h_reviewer_id_idx` (`d_h_reviewer_id`);

--
-- Indexes for table `dish_hm_review_vote_hm`
--
ALTER TABLE `dish_hm_review_vote_hm`
  ADD PRIMARY KEY (`d_h_review_id`,`d_h_r_vote_hm_id`),
  ADD KEY `d_h_r_vote_hm_id_idx` (`d_h_r_vote_hm_id`);

--
-- Indexes for table `dish_hm_shares`
--
ALTER TABLE `dish_hm_shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `s_dish_hm_id_idx` (`s_dish_hm_id`),
  ADD KEY `d_hm_sharer_id_idx` (`d_hm_sharer_id`);

--
-- Indexes for table `dish_hm_share_hm`
--
ALTER TABLE `dish_hm_share_hm`
  ADD PRIMARY KEY (`d_h_share_id`,`d_h_hm_id`),
  ADD KEY `d_h_hm_id_idx` (`d_h_hm_id`);

--
-- Indexes for table `dish_hm_vote_hm`
--
ALTER TABLE `dish_hm_vote_hm`
  ADD PRIMARY KEY (`v_dish_hm_id`,`d_h_vote_hm_id`),
  ADD KEY `d_h_vote_hm_id_idx` (`d_h_vote_hm_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `hm_friend`
--
ALTER TABLE `hm_friend`
  ADD PRIMARY KEY (`friendship_id`);

--
-- Indexes for table `hm_post`
--
ALTER TABLE `hm_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `hm_post_tag`
--
ALTER TABLE `hm_post_tag`
  ADD PRIMARY KEY (`post_tag_id`);

--
-- Indexes for table `hm_post_vote`
--
ALTER TABLE `hm_post_vote`
  ADD PRIMARY KEY (`post_vote_id`);

--
-- Indexes for table `hm_profile`
--
ALTER TABLE `hm_profile`
  ADD PRIMARY KEY (`hm_id`),
  ADD KEY `location_id_idx` (`location_id`);

--
-- Indexes for table `hm_shop_category`
--
ALTER TABLE `hm_shop_category`
  ADD PRIMARY KEY (`shop_category_id`);

--
-- Indexes for table `item_photos`
--
ALTER TABLE `item_photos`
  ADD PRIMARY KEY (`p_item_id`,`i_photo_id`),
  ADD KEY `i_photo_id_idx` (`i_photo_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `country_id_idx` (`country_id`);

--
-- Indexes for table `marriage_status`
--
ALTER TABLE `marriage_status`
  ADD PRIMARY KEY (`marriage_status_id`);

--
-- Indexes for table `novels`
--
ALTER TABLE `novels`
  ADD PRIMARY KEY (`novel_id`),
  ADD KEY `auther_id_idx` (`auther_id`),
  ADD KEY `cover_photo_id_idx` (`cover_photo_id`),
  ADD KEY `type_id_idx` (`type_id`);

--
-- Indexes for table `novel_chapters`
--
ALTER TABLE `novel_chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `novel_id_idx` (`novel_id`);

--
-- Indexes for table `novel_charter_reviews`
--
ALTER TABLE `novel_charter_reviews`
  ADD PRIMARY KEY (`n_c_review_id`),
  ADD KEY `r_chapter_id_idx` (`r_charter_id`),
  ADD KEY `n_c_reviewer_id_idx` (`n_c_reviewer_id`);

--
-- Indexes for table `novel_review`
--
ALTER TABLE `novel_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_novel_id_idx` (`r_novel_id`),
  ADD KEY `n_reviewer_id_idx` (`n_reviewer_id`);

--
-- Indexes for table `novel_types`
--
ALTER TABLE `novel_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `novel_vote_hm`
--
ALTER TABLE `novel_vote_hm`
  ADD PRIMARY KEY (`v_novel_id`,`n_vote_hm_id`),
  ADD KEY `n_vote_hm_id_idx` (`n_vote_hm_id`);

--
-- Indexes for table `n_chapter_review_hm`
--
ALTER TABLE `n_chapter_review_hm`
  ADD PRIMARY KEY (`n_c_review_id`,`n_c_r_hm_id`),
  ADD KEY `n_c_r_hm_id_idx` (`n_c_r_hm_id`);

--
-- Indexes for table `n_chapter_vote_hm`
--
ALTER TABLE `n_chapter_vote_hm`
  ADD PRIMARY KEY (`v_n_chapter_id`,`n_c_vote_hm_id`),
  ADD KEY `n_c_vote_hm_id_idx` (`n_c_vote_hm_id`);

--
-- Indexes for table `n_review_hm`
--
ALTER TABLE `n_review_hm`
  ADD PRIMARY KEY (`n_review_id`,`n_r_vote_hm_id`),
  ADD KEY `n_r_vote_hm_id_idx` (`n_r_vote_hm_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `hm_id_idx` (`hm_id`);

--
-- Indexes for table `photo_reviews`
--
ALTER TABLE `photo_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_photo_id_idx` (`r_photo__id`),
  ADD KEY `p_reviewer_id_idx` (`p_reviewer_id`);

--
-- Indexes for table `photo_share`
--
ALTER TABLE `photo_share`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `photo_id_idx` (`s_photo_id`),
  ADD KEY `sharer_id_idx` (`sharer_id`);

--
-- Indexes for table `photo_vote_hm`
--
ALTER TABLE `photo_vote_hm`
  ADD PRIMARY KEY (`v_photo_id`,`p_vote_hm_id`),
  ADD KEY `p_vote_hm_id_idx` (`p_vote_hm_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `p_review_hm`
--
ALTER TABLE `p_review_hm`
  ADD PRIMARY KEY (`review_id`,`p_r_vote_hm_id`),
  ADD KEY `p_r_hm_id_idx` (`p_r_vote_hm_id`);

--
-- Indexes for table `p_share_hm`
--
ALTER TABLE `p_share_hm`
  ADD PRIMARY KEY (`share_id`,`p_s_hm_id`),
  ADD KEY `s_hm_id_idx` (`p_s_hm_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`s_p_id`),
  ADD KEY `s_p_location_id_idx` (`s_p_location_id`),
  ADD KEY `s_p_pro_pic_id_idx` (`s_p_pro_pic_id`),
  ADD KEY `s_p_type_id_idx` (`s_p_type_id`),
  ADD KEY `s_p_catogery_idx` (`s_p_category_id`);

--
-- Indexes for table `service_provider_photos`
--
ALTER TABLE `service_provider_photos`
  ADD PRIMARY KEY (`p_s_p_id`,`s_p_photo_id`),
  ADD KEY `s_p_photo_id_idx` (`s_p_photo_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `pro_pic_id_idx` (`pro_pic_id`),
  ADD KEY `admin_id_idx` (`s_admin_id`),
  ADD KEY `type_id_idx` (`s_type_id`),
  ADD KEY `category_id_idx` (`s_category_id`),
  ADD KEY `location_id_idx` (`s_location_id`);

--
-- Indexes for table `shop_categorys`
--
ALTER TABLE `shop_categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `shop_items`
--
ALTER TABLE `shop_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `i_shop_id_idx` (`i_shop_id`);

--
-- Indexes for table `shop_photos`
--
ALTER TABLE `shop_photos`
  ADD PRIMARY KEY (`p_shop_id`,`shop_photo_id`),
  ADD KEY `shop_photo_id_idx` (`shop_photo_id`);

--
-- Indexes for table `shop_reviews`
--
ALTER TABLE `shop_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_shop_id_idx` (`r_shop_id`),
  ADD KEY `s_reviewer_id_idx` (`s_reviewer_id`);

--
-- Indexes for table `shop_review_vote_hm`
--
ALTER TABLE `shop_review_vote_hm`
  ADD PRIMARY KEY (`s_review_id`,`s_r_hm_id`),
  ADD KEY `s_r_hm_id_idx` (`s_r_hm_id`);

--
-- Indexes for table `shop_shares`
--
ALTER TABLE `shop_shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `s_shop_id_idx` (`s_shop_id`),
  ADD KEY `s_sharer_id_idx` (`s_sharer_id`);

--
-- Indexes for table `shop_share_hm`
--
ALTER TABLE `shop_share_hm`
  ADD PRIMARY KEY (`s_share_id`,`s_s_hm_id`),
  ADD KEY `s_s_hm_id_idx` (`s_s_hm_id`);

--
-- Indexes for table `shop_types`
--
ALTER TABLE `shop_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `shop_votes`
--
ALTER TABLE `shop_votes`
  ADD PRIMARY KEY (`v_shop_id`,`s_vote_hm_id`),
  ADD KEY `s_vote_hm_id_idx` (`s_vote_hm_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `swap`
--
ALTER TABLE `swap`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `s_item_reviews`
--
ALTER TABLE `s_item_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_s_item_id_idx` (`r_s_item_id`),
  ADD KEY `s_i_reviewer_id_idx` (`s_i_reviewer_id`);

--
-- Indexes for table `s_item_review_hm`
--
ALTER TABLE `s_item_review_hm`
  ADD PRIMARY KEY (`i_review_id`,`s_i_r_vote_hm_id`),
  ADD KEY `s_i_r_vote_hm_id_idx` (`s_i_r_vote_hm_id`);

--
-- Indexes for table `s_item_shares`
--
ALTER TABLE `s_item_shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `s_item_id_idx` (`s_item_id`),
  ADD KEY `s_i_sharer_id_idx` (`s_i_sharer_id`);

--
-- Indexes for table `s_item_share_hm`
--
ALTER TABLE `s_item_share_hm`
  ADD PRIMARY KEY (`i_share_id`,`i_s_hm_id`),
  ADD KEY `i_s_hm_id_idx` (`i_s_hm_id`);

--
-- Indexes for table `s_item_votes`
--
ALTER TABLE `s_item_votes`
  ADD PRIMARY KEY (`v_s_item_id`,`s_i_vote_hm_id`),
  ADD KEY `s_i_vote_hm_id_idx` (`s_i_vote_hm_id`);

--
-- Indexes for table `s_owners_hm`
--
ALTER TABLE `s_owners_hm`
  ADD PRIMARY KEY (`shop_id`,`s_owner_hm_id`),
  ADD KEY `s_owner_hm_id_idx` (`s_owner_hm_id`);

--
-- Indexes for table `s_p_categories`
--
ALTER TABLE `s_p_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `s_p_owner_hm`
--
ALTER TABLE `s_p_owner_hm`
  ADD PRIMARY KEY (`service_p_id`,`s_p_owner_hm_id`),
  ADD KEY `s_p_owner_hm_id_idx` (`s_p_owner_hm_id`);

--
-- Indexes for table `s_p_reviews`
--
ALTER TABLE `s_p_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_s_p_id_idx` (`r_s_p_id`),
  ADD KEY `s_p_reviewer_id_idx` (`s_p_reviewer_id`);

--
-- Indexes for table `s_p_review_vote_hm`
--
ALTER TABLE `s_p_review_vote_hm`
  ADD PRIMARY KEY (`s_p_review_id`,`s_p_r_vote_hm_id`),
  ADD KEY `s_p_r_vote_hm_id_idx` (`s_p_r_vote_hm_id`);

--
-- Indexes for table `s_p_services`
--
ALTER TABLE `s_p_services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_s_p_id_idx` (`service_s_p_id`);

--
-- Indexes for table `s_p_service_photos`
--
ALTER TABLE `s_p_service_photos`
  ADD PRIMARY KEY (`p_service_id`,`s_p_s_photo_id`),
  ADD KEY `s_p_s_photo_id_idx` (`s_p_s_photo_id`);

--
-- Indexes for table `s_p_shares`
--
ALTER TABLE `s_p_shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `s_s_p_id_idx` (`s_s_p_id`),
  ADD KEY `s_p_sharer_id_idx` (`s_p_sharer_id`);

--
-- Indexes for table `s_p_share_hm`
--
ALTER TABLE `s_p_share_hm`
  ADD PRIMARY KEY (`s_p_share_id`,`s_p_hm_id`),
  ADD KEY `s_p_hm_id_idx` (`s_p_hm_id`);

--
-- Indexes for table `s_p_s_reviews`
--
ALTER TABLE `s_p_s_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `r_service_id_idx` (`r_service_id`),
  ADD KEY `s_p_s_reviewer_id_idx` (`s_p_s_reviewer_id`);

--
-- Indexes for table `s_p_s_review_vote_hm`
--
ALTER TABLE `s_p_s_review_vote_hm`
  ADD PRIMARY KEY (`s_p_s_review_id`,`s_p_s_r_vote_hm_id`),
  ADD KEY `s_p_s_r_vote_hm_id_idx` (`s_p_s_r_vote_hm_id`);

--
-- Indexes for table `s_p_s_shares`
--
ALTER TABLE `s_p_s_shares`
  ADD PRIMARY KEY (`share_id`),
  ADD KEY `s_service_id_idx` (`s_service_id`),
  ADD KEY `s_p_s_sharer_id_idx` (`s_p_s_sharer_id`);

--
-- Indexes for table `s_p_s_share_hm`
--
ALTER TABLE `s_p_s_share_hm`
  ADD PRIMARY KEY (`s_p_s_share_id`,`s_p_s_hm_id`),
  ADD KEY `s_p_s_s_hm_id_idx` (`s_p_s_hm_id`);

--
-- Indexes for table `s_p_s_votes_hm`
--
ALTER TABLE `s_p_s_votes_hm`
  ADD PRIMARY KEY (`v_service_id`,`s_p_s_vote_hm_id`),
  ADD KEY `s_p_s_vote_hm_id_idx` (`s_p_s_vote_hm_id`);

--
-- Indexes for table `s_p_types`
--
ALTER TABLE `s_p_types`
  ADD PRIMARY KEY (`types_id`);

--
-- Indexes for table `s_p_votes_hm`
--
ALTER TABLE `s_p_votes_hm`
  ADD PRIMARY KEY (`v_s_p_id`,`s_p_vote_hm_id`),
  ADD KEY `s_p_vote_hm_id_idx` (`s_p_vote_hm_id`);

--
-- Indexes for table `veg_status`
--
ALTER TABLE `veg_status`
  ADD PRIMARY KEY (`veg_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autocomplete`
--
ALTER TABLE `autocomplete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishes_hm`
--
ALTER TABLE `dishes_hm`
  MODIFY `dish_hm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dish_hm_reviews`
--
ALTER TABLE `dish_hm_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dish_hm_shares`
--
ALTER TABLE `dish_hm_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hm_friend`
--
ALTER TABLE `hm_friend`
  MODIFY `friendship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `hm_post`
--
ALTER TABLE `hm_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `hm_post_tag`
--
ALTER TABLE `hm_post_tag`
  MODIFY `post_tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hm_post_vote`
--
ALTER TABLE `hm_post_vote`
  MODIFY `post_vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `hm_profile`
--
ALTER TABLE `hm_profile`
  MODIFY `hm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `hm_shop_category`
--
ALTER TABLE `hm_shop_category`
  MODIFY `shop_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marriage_status`
--
ALTER TABLE `marriage_status`
  MODIFY `marriage_status_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novel_chapters`
--
ALTER TABLE `novel_chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novel_vote_hm`
--
ALTER TABLE `novel_vote_hm`
  MODIFY `v_novel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_reviews`
--
ALTER TABLE `photo_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_share`
--
ALTER TABLE `photo_share`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `religion_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `s_p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_reviews`
--
ALTER TABLE `shop_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_shares`
--
ALTER TABLE `shop_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `sport_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swap`
--
ALTER TABLE `swap`
  MODIFY `user_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `s_p_categories`
--
ALTER TABLE `s_p_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_p_shares`
--
ALTER TABLE `s_p_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_p_s_reviews`
--
ALTER TABLE `s_p_s_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_p_s_shares`
--
ALTER TABLE `s_p_s_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_p_types`
--
ALTER TABLE `s_p_types`
  MODIFY `types_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `veg_status`
--
ALTER TABLE `veg_status`
  MODIFY `veg_status_id` tinyint(1) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`cpid`) REFERENCES `posts` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dishes_hm`
--
ALTER TABLE `dishes_hm`
  ADD CONSTRAINT `cooked_by_id` FOREIGN KEY (`cooked_by_id`) REFERENCES `hm_profile` (`hm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_from_id` FOREIGN KEY (`dish_form_id`) REFERENCES `locations` (`location_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_hm_dp_id` FOREIGN KEY (`dish_hm_dp_id`) REFERENCES `photos` (`photo_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `veg_status_id` FOREIGN KEY (`veg_status_id`) REFERENCES `veg_status` (`veg_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dish_hm_reviews`
--
ALTER TABLE `dish_hm_reviews`
  ADD CONSTRAINT `d_h_reviewer_id` FOREIGN KEY (`d_h_reviewer_id`) REFERENCES `hm_profile` (`hm_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_dish_hm_id` FOREIGN KEY (`r_dish_hm_id`) REFERENCES `dishes_hm` (`dish_hm_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dish_hm_review_vote_hm`
--
ALTER TABLE `dish_hm_review_vote_hm`
  ADD CONSTRAINT `d_h_r_vote_hm_id` FOREIGN KEY (`d_h_r_vote_hm_id`) REFERENCES `hm_profile` (`hm_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `d_h_review_id` FOREIGN KEY (`d_h_review_id`) REFERENCES `dish_hm_reviews` (`review_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dish_hm_shares`
--
ALTER TABLE `dish_hm_shares`
  ADD CONSTRAINT `d_hm_sharer_id` FOREIGN KEY (`d_hm_sharer_id`) REFERENCES `hm_profile` (`hm_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `s_dish_hm_id` FOREIGN KEY (`s_dish_hm_id`) REFERENCES `dishes_hm` (`dish_hm_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dish_hm_share_hm`
--
ALTER TABLE `dish_hm_share_hm`
  ADD CONSTRAINT `d_h_hm_id` FOREIGN KEY (`d_h_hm_id`) REFERENCES `hm_profile` (`hm_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `d_h_share_id` FOREIGN KEY (`d_h_share_id`) REFERENCES `dish_hm_shares` (`share_id`) ON UPDATE CASCADE;

--
-- Constraints for table `dish_hm_vote_hm`
--
ALTER TABLE `dish_hm_vote_hm`
  ADD CONSTRAINT `d_h_vote_hm_id` FOREIGN KEY (`d_h_vote_hm_id`) REFERENCES `hm_profile` (`hm_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `v_dish_hm_id` FOREIGN KEY (`v_dish_hm_id`) REFERENCES `dishes_hm` (`dish_hm_id`) ON UPDATE CASCADE;

--
-- Constraints for table `item_photos`
--
ALTER TABLE `item_photos`
  ADD CONSTRAINT `i_photo_id` FOREIGN KEY (`i_photo_id`) REFERENCES `photos` (`photo_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p_item_id` FOREIGN KEY (`p_item_id`) REFERENCES `shop_items` (`item_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
