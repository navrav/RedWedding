-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 11:29 AM
-- Server version: 5.5.33
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aeb`
--
CREATE DATABASE IF NOT EXISTS `aeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `aeb`;

-- --------------------------------------------------------

--
-- Table structure for table `Achievements`
--

CREATE TABLE IF NOT EXISTS `Achievements` (
  `a_ID` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT 'achieve_default',
  `description` text NOT NULL,
  PRIMARY KEY (`a_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Achievements`
--

INSERT INTO `Achievements` (`a_ID`, `name`, `description`) VALUES
(1, 'Winter is Coming', 'Feeling cold'),
(2, 'Hear Me Roar', 'Made a post for the first time'),
(3, 'Family, Duty, Honor', 'Made 10 check ins'),
(4, 'Fire and Blood', 'Feeling hot'),
(5, 'Ours is the Fury', 'Made 50 unhappy check ins');

-- --------------------------------------------------------

--
-- Table structure for table `CheckIn`
--

CREATE TABLE IF NOT EXISTS `CheckIn` (
  `chk_ID` int(10) NOT NULL AUTO_INCREMENT,
  `u_ID` mediumint(7) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room` varchar(4) NOT NULL,
  `tag1` varchar(16) DEFAULT NULL,
  `tag2` varchar(16) DEFAULT NULL,
  `tag3` varchar(16) DEFAULT NULL,
  `tag4` varchar(16) DEFAULT NULL,
  `tag5` varchar(16) DEFAULT NULL,
  `withFriend` mediumint(7) DEFAULT NULL COMMENT '0 = not with a friend',
  `comment` text,
  PRIMARY KEY (`chk_ID`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=279 ;

--
-- Dumping data for table `CheckIn`
--

INSERT INTO `CheckIn` (`chk_ID`, `u_ID`, `timestamp`, `room`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `withFriend`, `comment`) VALUES
(1, 1, '2014-05-21 16:45:44', '301', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, '2014-05-21 16:49:49', '301', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, '2014-05-21 16:50:02', '305', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, '2014-05-21 16:51:45', '305', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, '2014-05-21 16:51:54', '307', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, '2014-05-21 16:52:04', '307', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 2, '2014-05-29 03:04:00', '316', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, '2014-05-29 03:04:12', '316', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, '2014-05-29 03:23:24', '301', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 3, '2014-05-29 03:23:24', '301', 'noisy', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, '2014-05-29 11:18:17', '301', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, '2014-05-29 11:18:17', '301', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, '2014-05-29 11:18:17', '301', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, '2014-05-29 13:00:44', '301', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, '2014-05-29 13:00:51', '305', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, '2014-05-29 13:01:00', '307', 'dark', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, '2014-05-29 15:19:42', '316', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, '2014-05-29 15:19:42', '316', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 1, '2014-06-04 03:52:33', '402', 'dark', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 1, '2014-06-04 03:52:43', '104', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 1, '2014-06-04 03:54:02', '104', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 1, '2014-06-04 03:54:18', '102', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 1, '2014-06-04 03:54:18', '102', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(108, 1, '2014-06-04 03:54:18', '102', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(109, 1, '2014-06-04 03:57:21', '102', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 1, '2014-06-04 04:03:07', '101', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 1, '2014-06-04 04:03:07', '101', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(112, 1, '2014-06-04 04:03:07', '101', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(113, 1, '2014-06-04 04:06:09', '204', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 1, '2014-06-04 04:06:09', '204', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 1, '2014-06-04 04:06:09', '204', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(116, 1, '2014-06-04 04:06:23', '204', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(117, 1, '2014-06-04 04:06:23', '204', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(118, 1, '2014-06-04 04:06:23', '204', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(119, 1, '2014-06-04 04:54:43', '316', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 1, '2014-06-04 04:54:43', '316', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(121, 1, '2014-06-04 06:20:13', '302', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(122, 1, '2014-06-04 06:20:13', '302', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(123, 1, '2014-06-04 06:20:23', '302', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(124, 1, '2014-06-04 06:20:23', '302', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 1, '2014-06-04 07:04:52', '316', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(126, 1, '2014-06-04 07:04:52', '316', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(127, 1, '2014-06-04 07:17:03', '302', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(128, 1, '2014-06-04 07:17:03', '302', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(129, 1, '2014-06-04 07:17:13', '302', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(130, 1, '2014-06-04 07:17:13', '302', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(131, 1, '2014-06-05 02:59:01', '317', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 1, '2014-06-05 02:59:01', '317', 'dark', NULL, NULL, NULL, NULL, NULL, NULL),
(133, 1, '2014-06-05 02:59:01', '317', 'peaceful', NULL, NULL, NULL, NULL, NULL, NULL),
(134, 1, '2014-06-05 03:02:48', '317', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(135, 1, '2014-06-05 03:02:48', '317', 'dark', NULL, NULL, NULL, NULL, NULL, NULL),
(136, 1, '2014-06-05 03:02:48', '317', 'peaceful', NULL, NULL, NULL, NULL, NULL, NULL),
(137, 1, '2014-06-05 03:34:17', '305', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(138, 1, '2014-06-05 05:22:21', '103', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(139, 1, '2014-06-05 05:22:21', '103', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(140, 1, '2014-06-05 05:22:21', '103', 'crowded', NULL, NULL, NULL, NULL, NULL, NULL),
(141, 1, '2014-06-06 13:18:14', '203', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(142, 1, '2014-06-11 10:53:45', '316', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(143, 1, '2014-06-11 10:53:45', '316', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(144, 1, '2014-06-11 10:53:45', '316', 'peaceful', NULL, NULL, NULL, NULL, NULL, NULL),
(145, 1, '2014-06-12 07:14:38', '202', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(146, 1, '2014-06-13 02:42:20', '103', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(147, 1, '2014-06-13 03:30:09', '204', 'bright', NULL, NULL, NULL, NULL, NULL, NULL),
(148, 1, '2014-06-13 06:22:45', '101', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(149, 1, '2014-06-13 06:24:11', '101', 'comfy', NULL, NULL, NULL, NULL, NULL, NULL),
(150, 1, '2014-06-13 06:43:44', '202', NULL, 'comfy', NULL, NULL, NULL, NULL, NULL),
(151, 1, '2014-06-13 06:44:21', '202', NULL, 'comfy', NULL, NULL, NULL, NULL, NULL),
(152, 1, '2014-06-13 07:46:27', '202', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(153, 1, '2014-06-13 07:46:27', '202', NULL, 'dark', NULL, NULL, NULL, NULL, NULL),
(154, 1, '2014-06-14 06:17:50', '202', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(155, 1, '2014-06-14 06:17:50', '202', NULL, 'bright', NULL, NULL, NULL, NULL, NULL),
(156, 1, '2014-06-14 06:17:50', '202', NULL, NULL, 'crowded', NULL, NULL, NULL, NULL),
(157, 1, '2014-06-14 06:18:52', '202', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, '2014-06-14 06:18:52', '202', NULL, 'bright', NULL, NULL, NULL, NULL, NULL),
(159, 1, '2014-06-14 06:18:52', '202', NULL, NULL, 'crowded', NULL, NULL, NULL, NULL),
(160, 1, '2014-06-14 06:37:22', '202', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, '2014-06-14 06:37:22', '202', NULL, 'dark', NULL, NULL, NULL, NULL, NULL),
(162, 1, '2014-06-14 06:37:22', '202', NULL, NULL, 'peaceful', NULL, NULL, NULL, NULL),
(163, 1, '2014-06-14 06:37:25', '202', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(164, 1, '2014-06-14 06:37:25', '202', NULL, 'dark', NULL, NULL, NULL, NULL, NULL),
(165, 1, '2014-06-14 06:37:25', '202', NULL, NULL, 'peaceful', NULL, NULL, NULL, NULL),
(166, 1, '2014-06-14 08:30:30', '202', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 1, '2014-06-14 08:30:30', '202', NULL, 'comfy', NULL, NULL, NULL, NULL, NULL),
(168, 1, '2014-06-14 12:12:40', '316', NULL, 'comfy', NULL, NULL, NULL, NULL, NULL),
(169, 1, '2014-06-14 12:13:56', '202', NULL, NULL, 'crowded', NULL, NULL, NULL, NULL),
(173, 1, '2014-06-16 03:03:55', '209', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(174, 1, '2014-08-14 11:38:54', '209', 'hot', NULL, NULL, NULL, NULL, NULL, NULL),
(175, 1, '2014-08-14 11:39:00', '209', 'cold', NULL, NULL, NULL, NULL, NULL, NULL),
(176, 1, '2014-08-15 03:59:42', '202', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(177, 1, '2014-08-15 03:59:47', '202', 'warm', NULL, NULL, NULL, NULL, NULL, NULL),
(178, 1, '2014-09-29 10:02:38', '101', 'hot', 'comfy', 'peaceful', NULL, NULL, NULL, ''),
(179, 1, '2014-09-29 10:05:30', '317', 'hot', 'dark', 'crowded', NULL, NULL, NULL, ''),
(180, 1, '2014-09-29 10:40:35', '318', 'cold', 'bright', 'peaceful', NULL, NULL, NULL, ''),
(181, 1, '2014-09-29 10:50:56', '319', 'warm', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(182, 1, '2014-09-29 10:51:26', '407', 'warm', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(183, 1, '2014-09-29 10:51:57', '318', 'hot', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(184, 1, '2014-09-29 10:55:47', '205', 'hot', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(185, 1, '2014-09-29 10:58:51', '318', 'hot', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(186, 1, '2014-09-29 11:02:27', '318', 'warm', 'dark', 'peaceful', NULL, NULL, NULL, ''),
(187, 1, '2014-09-29 11:07:15', '317', 'cold', 'bright', 'peaceful', NULL, NULL, NULL, ''),
(188, 1, '2014-09-29 11:08:42', '317', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, ''),
(189, 36, '2014-09-29 11:16:49', '405', 'cold', 'dark', 'peaceful', NULL, NULL, NULL, ''),
(190, 36, '2014-09-29 11:20:54', '319', 'cold', 'bright', 'crowded', NULL, NULL, NULL, 'HELLO WORLD!'),
(191, 36, '2014-09-29 11:55:48', '316', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, 'Make sure you connect up Add Friend sometime.'),
(192, 36, '2014-10-01 14:24:29', '203', 'hot', 'dark', 'peaceful', NULL, NULL, NULL, ''),
(193, 36, '2014-10-01 14:27:03', '204', 'hot', 'bright', 'crowded', NULL, NULL, NULL, 'Functional Test'),
(194, 36, '2014-10-05 06:17:44', '406', 'cold', '', '', NULL, NULL, NULL, ''),
(195, 36, '2014-10-17 03:05:26', '204', '', '', '', NULL, NULL, NULL, ''),
(196, 36, '2014-10-17 03:08:12', '205', 'warm', 'comfy', 'crowded', NULL, NULL, NULL, ''),
(197, 36, '2014-10-17 03:09:59', '318', 'cold', 'dark', '', NULL, NULL, NULL, ''),
(198, 36, '2014-10-17 03:10:21', '407', 'cold', 'dark', '', NULL, NULL, NULL, ''),
(200, 36, '2014-10-17 03:11:17', '205', '', '', '', NULL, NULL, NULL, ''),
(203, 2, '2014-10-17 03:36:36', '407', 'hot', 'bright', 'crowded', NULL, NULL, NULL, 'Nice Day'),
(204, 14, '2014-10-17 03:41:06', '316', '', '', '', NULL, NULL, NULL, 'Comment tester'),
(205, 14, '2014-10-17 03:41:36', '203', 'hot', '', '', NULL, NULL, NULL, 'Do my checkins appear?'),
(206, 36, '2014-10-20 04:42:46', '203', 'cold', 'bright', 'peaceful', NULL, NULL, NULL, 'alex'),
(210, 36, '2014-10-21 05:30:46', '318', '', '', '', NULL, NULL, NULL, ''),
(211, 36, '2014-10-21 05:31:01', '205', '', '', '', NULL, NULL, NULL, ''),
(212, 36, '2014-10-21 05:35:12', '301', 'cold', 'comfy', 'peaceful', NULL, NULL, NULL, 'Should have 35 AEBux now.'),
(213, 36, '2014-10-21 13:00:19', '519', 'hot', 'comfy', 'crowded', NULL, NULL, NULL, 'Hello World!'),
(214, 36, '2014-10-21 13:04:43', '317', 'hot', 'dark', 'peaceful', NULL, NULL, NULL, 'Hello World!'),
(215, 36, '2014-10-21 13:08:36', '316', 'hot', 'comfy', 'crowded', NULL, NULL, NULL, 'Hello World!'),
(216, 36, '2014-10-22 12:39:04', '318', 'hot', '', '', NULL, NULL, NULL, ''),
(217, 36, '2014-10-22 15:22:48', '17', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, 'Room list is implemented.'),
(218, 36, '2014-10-22 15:26:16', '12', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, 'Room is now varchar(4).'),
(219, 36, '2014-10-22 15:29:56', '316A', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, 'Room codes should be properly stored into the database now.'),
(220, 36, '2014-10-22 15:58:48', '301B', 'warm', 'comfy', 'peaceful', NULL, NULL, NULL, 'Room list complete.'),
(221, 36, '2014-10-23 05:59:57', '207', 'hot', 'comfy', 'peaceful', NULL, NULL, NULL, ''),
(222, 36, '2014-10-23 10:24:38', '510A', 'warm', 'comfy', 'peaceful', NULL, NULL, 0, 'Selected Jorah as friend'),
(223, 36, '2014-10-23 10:33:03', '301A', 'warm', 'comfy', 'peaceful', NULL, NULL, 0, ''),
(224, 36, '2014-10-23 10:36:01', '401D', 'warm', 'comfy', 'peaceful', NULL, NULL, 0, ''),
(225, 36, '2014-10-23 10:46:26', '401B', 'warm', 'comfy', 'peaceful', NULL, NULL, 2, 'Tyrion this time (ID=2)'),
(226, 36, '2014-10-23 11:02:15', '200B', 'warm', 'comfy', 'peaceful', NULL, NULL, 0, 'Alone'),
(227, 36, '2014-10-23 11:04:41', '200A', 'warm', 'comfy', 'peaceful', NULL, NULL, 0, 'Tyrion'),
(228, 36, '2014-10-23 11:09:25', '301B', 'hot', 'bright', 'crowded', NULL, NULL, 0, 'Jorah'),
(229, 36, '2014-10-23 11:46:02', '200A', 'warm', 'bright', 'crowded', NULL, NULL, 3, ''),
(230, 36, '2014-10-23 11:46:21', '106B', 'warm', 'comfy', 'crowded', NULL, NULL, 2, ''),
(231, 36, '2014-10-23 11:46:41', '200B', 'warm', 'dark', 'peaceful', NULL, NULL, 0, ''),
(232, 36, '2014-10-24 02:07:25', '305', 'hot', 'dark', 'crowded', NULL, NULL, 0, 'WORK!!!'),
(235, 36, '2014-10-24 02:40:38', '304', 'cold', 'comfy', 'peaceful', NULL, NULL, 0, 'alert(''THIS SHOULDNT WORK'')'),
(236, 89, '2014-10-24 05:15:20', '101', 'hot', 'bright', 'peaceful', NULL, NULL, 0, ''),
(237, 36, '2014-10-24 06:16:56', '301A', 'cold', 'dark', 'peaceful', 'fine', 'normal', 2, '5 tags now (adding Tyrion for the hell of it)'),
(238, 36, '2014-10-24 07:01:50', '301A', 'cold', 'comfy', 'crowded', 'fine', 'dry', 89, 'ALL GOOD! HOT DAYUM'),
(239, 36, '2014-10-25 11:32:16', '407', 'warm', 'comfy', 'crowded', 'fine', 'humid', 3, '9:32pm'),
(240, 36, '2014-10-25 11:54:33', '206', '', '', '', '', '', 89, ''),
(241, 36, '2014-10-26 12:39:46', '310', 'hot', 'dark', 'peaceful', 'fine', 'normal', 0, ''),
(242, 36, '2014-10-26 13:59:48', '101', '', '', '', '', '', 0, 'Good Work to the people still working on the app! It''s really coming together... for Midnight the night before it''s due! haha'),
(243, 36, '2014-10-26 14:04:41', '620', '', '', '', '', '', 0, 'In the highest room of the tallest tower!'),
(244, 36, '2014-10-26 14:05:55', '101', 'cold', 'dark', 'peaceful', '', 'humid', 67, 'In the dungeons for potions. Way too damp down here.'),
(245, 36, '2014-10-26 14:06:48', '310', 'warm', 'comfy', 'peaceful', 'fine', 'normal', 3, 'All good in the central rooms of the building'),
(246, 93, '2014-10-26 15:33:02', '212', 'cold', '', '', '', '', 0, 'My first checkin!'),
(247, 93, '2014-10-26 15:33:33', '211', '', '', '', '', 'dry', 0, 'Earning those AEBuxs!'),
(248, 94, '2014-10-27 03:22:03', '106B', 'cold', 'comfy', 'crowded', 'fine', 'dry', 0, ''),
(249, 94, '2014-10-27 03:28:57', '107', 'hot', 'dark', 'crowded', 'noisy', 'humid', 0, ''),
(250, 36, '2014-10-27 04:36:17', '595', 'cold', 'comfy', 'crowded', 'quiet', 'humid', 0, ''),
(251, 89, '2014-10-27 04:42:07', '202', 'warm', 'bright', 'peaceful', 'quiet', 'normal', 0, ''),
(252, 36, '2014-10-27 05:00:11', '200B', 'cold', 'comfy', 'crowded', 'fine', 'humid', 0, 'nice'),
(253, 89, '2014-10-27 05:06:53', '101', 'hot', 'dark', 'peaceful', 'fine', 'humid', 0, ''),
(254, 36, '2014-10-27 05:07:05', '204', 'hot', '', '', '', '', 0, ''),
(255, 89, '2014-10-27 05:17:48', '105', 'hot', 'comfy', 'crowded', 'fine', 'normal', 0, ''),
(256, 89, '2014-10-27 05:17:55', '301A', 'cold', 'bright', 'crowded', '', 'humid', 0, ''),
(257, 36, '2014-10-27 05:31:48', '106', 'warm', 'comfy', 'peaceful', 'fine', 'normal', 2, 'Good'),
(258, 89, '2014-10-27 05:32:27', '202', 'cold', 'comfy', 'crowded', 'fine', 'dry', 0, ''),
(259, 36, '2014-10-27 05:36:41', '304', 'hot', '', 'peaceful', 'fine', '', 0, ''),
(260, 89, '2014-10-27 05:38:15', '204', 'cold', '', 'peaceful', '', 'humid', 0, ''),
(261, 89, '2014-10-27 05:46:41', '620A', 'hot', 'dark', 'peaceful', 'fine', 'humid', 36, 'This place sucks'),
(262, 36, '2014-10-27 05:52:07', '205', '', 'dark', 'crowded', 'fine', 'dry', 0, ''),
(263, 89, '2014-10-27 05:52:14', '208', 'hot', 'comfy', 'crowded', 'fine', 'normal', 0, ''),
(264, 89, '2014-10-27 06:01:14', '202', 'warm', 'comfy', '', '', '', 0, ' alert("YONG!") '),
(265, 89, '2014-10-27 06:01:44', '301B', '', 'comfy', '', '', '', 0, '?>  alert("YONG!")  '),
(266, 36, '2014-10-27 06:09:12', '699', 'hot', 'comfy', 'crowded', '', '', 0, ''),
(267, 89, '2014-10-27 06:18:13', '257', '', '', 'peaceful', 'noisy', '', 0, ''),
(268, 89, '2014-10-27 06:29:01', '102', 'cold', 'comfy', '', '', '', 0, ''),
(269, 89, '2014-10-27 06:36:47', '301B', 'cold', 'comfy', 'peaceful', 'fine', 'normal', 0, ''),
(270, 36, '2014-10-31 04:38:39', '101', 'hot', 'dark', 'crowded', 'noisy', 'humid', 0, ''),
(271, 36, '2014-10-31 04:38:55', '101', 'hot', 'dark', 'crowded', 'noisy', 'humid', 0, ''),
(272, 36, '2014-10-31 04:39:11', '101', 'hot', 'dark', 'crowded', 'noisy', 'humid', 0, ''),
(273, 36, '2014-10-31 04:40:13', '101', 'hot', 'dark', 'crowded', 'noisy', 'humid', 0, ''),
(274, 95, '2014-11-06 10:26:09', '307', 'warm', 'comfy', 'peaceful', 'quiet', 'humid', 0, 'alert("Testing script injection.");'),
(275, 36, '2014-11-08 15:20:20', '307', 'cold', 'comfy', '', '', '', 0, 'Earning those $$$$$$$'),
(276, 36, '2014-11-08 15:22:37', '102', '', '', '', '', '', 0, ''),
(277, 36, '2014-11-09 20:21:13', '503', 'hot', 'comfy', 'peaceful', 'fine', 'normal', 0, ''),
(278, 36, '2014-11-09 20:22:28', '208', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `CheckInDecay`
--
CREATE TABLE IF NOT EXISTS `CheckInDecay` (
`chk_ID` int(10)
,`u_ID` mediumint(7)
,`timestamp` timestamp
,`room` varchar(4)
,`tag1` varchar(16)
,`tag2` varchar(16)
,`tag3` varchar(16)
,`tag4` varchar(16)
,`tag5` varchar(16)
,`withFriend` mediumint(7)
,`comment` text
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `ID_1` mediumint(7) NOT NULL,
  `ID_2` mediumint(7) NOT NULL,
  PRIMARY KEY (`ID_1`,`ID_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`ID_1`, `ID_2`) VALUES
(1, 2),
(1, 5),
(1, 6),
(2, 1),
(2, 3),
(2, 36),
(3, 2),
(5, 1),
(6, 1),
(36, 2),
(36, 43),
(36, 67),
(36, 84),
(36, 94),
(43, 36),
(43, 89),
(67, 36),
(84, 36),
(89, 43),
(89, 94),
(94, 36),
(94, 89);

-- --------------------------------------------------------

--
-- Table structure for table `Hat`
--

CREATE TABLE IF NOT EXISTS `Hat` (
  `h_ID` varchar(9) NOT NULL,
  `s_ID` smallint(5) NOT NULL,
  PRIMARY KEY (`h_ID`),
  UNIQUE KEY `s_ID` (`s_ID`),
  UNIQUE KEY `s_ID_2` (`s_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hat`
--

INSERT INTO `Hat` (`h_ID`, `s_ID`) VALUES
('hat3.png', 21),
('hat4.png', 22),
('hat5.png', 23),
('hat6.png', 24),
('hat7.png', 25),
('hat8.png', 26),
('hat9.png', 27),
('hat10.png', 28);

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE IF NOT EXISTS `Rooms` (
  `room` varchar(4) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '6',
  `description` text,
  PRIMARY KEY (`room`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`room`, `level`, `description`) VALUES
('101', 1, NULL),
('102', 1, NULL),
('105', 1, NULL),
('106', 1, NULL),
('106A', 1, NULL),
('106B', 1, NULL),
('106C', 1, NULL),
('106D', 1, NULL),
('107', 1, NULL),
('108', 1, NULL),
('109', 1, NULL),
('109A', 1, NULL),
('110', 1, NULL),
('111A', 1, NULL),
('111B', 1, NULL),
('111C', 1, NULL),
('111D', 1, NULL),
('112', 1, NULL),
('113', 1, NULL),
('114', 1, NULL),
('115', 1, NULL),
('115A', 1, NULL),
('116', 1, NULL),
('117', 1, NULL),
('118', 1, NULL),
('119', 1, NULL),
('120', 1, NULL),
('121', 1, NULL),
('121A', 1, NULL),
('122', 1, NULL),
('122A', 1, NULL),
('123', 1, NULL),
('125', 1, NULL),
('129', 1, NULL),
('130', 1, NULL),
('132', 1, NULL),
('140', 1, NULL),
('142', 1, NULL),
('143', 1, NULL),
('144', 1, NULL),
('145', 1, NULL),
('146A', 1, NULL),
('147', 1, NULL),
('148', 1, NULL),
('149', 1, NULL),
('152', 1, NULL),
('161', 1, NULL),
('162', 1, NULL),
('163', 1, NULL),
('164', 1, NULL),
('200', 2, NULL),
('200A', 2, NULL),
('200B', 2, NULL),
('202', 2, NULL),
('204', 2, NULL),
('205', 2, NULL),
('206', 2, NULL),
('207', 2, NULL),
('208', 2, NULL),
('209', 2, NULL),
('211', 2, NULL),
('212', 2, NULL),
('212A', 2, NULL),
('213', 2, NULL),
('214', 2, NULL),
('215', 2, NULL),
('216', 2, NULL),
('216A', 2, NULL),
('217', 2, NULL),
('218', 2, NULL),
('218A', 2, NULL),
('219', 2, NULL),
('220', 2, NULL),
('221', 2, NULL),
('221A', 2, NULL),
('222', 2, NULL),
('222A', 2, NULL),
('222B', 2, NULL),
('225', 2, NULL),
('226', 2, NULL),
('227', 2, NULL),
('227A', 2, NULL),
('229', 2, NULL),
('230', 2, NULL),
('231', 2, NULL),
('232', 2, NULL),
('233', 2, NULL),
('233A', 2, NULL),
('234', 2, NULL),
('237', 2, NULL),
('238', 2, NULL),
('239', 2, NULL),
('240', 2, NULL),
('241', 2, NULL),
('244', 2, NULL),
('245', 2, NULL),
('246', 2, NULL),
('247', 2, NULL),
('248', 2, NULL),
('249', 2, NULL),
('250', 2, NULL),
('251', 2, NULL),
('252', 2, NULL),
('253', 2, NULL),
('254', 2, NULL),
('255', 2, NULL),
('257', 2, NULL),
('258A', 2, NULL),
('260', 2, NULL),
('261', 2, NULL),
('262', 2, NULL),
('265', 2, NULL),
('266', 2, NULL),
('270', 2, NULL),
('271', 2, NULL),
('272', 2, NULL),
('273', 2, NULL),
('274', 2, NULL),
('275', 2, NULL),
('293', 2, NULL),
('294', 2, NULL),
('297', 2, NULL),
('298', 2, NULL),
('299', 2, NULL),
('301', 3, NULL),
('301A', 3, NULL),
('301B', 3, NULL),
('302', 3, NULL),
('304', 3, NULL),
('305', 3, NULL),
('306', 3, NULL),
('307', 3, NULL),
('308', 3, NULL),
('309', 3, NULL),
('310', 3, NULL),
('310A', 3, NULL),
('312', 3, NULL),
('313', 3, NULL),
('313A', 3, NULL),
('313B', 3, NULL),
('316', 3, NULL),
('316A', 3, NULL),
('317', 3, NULL),
('317A', 3, NULL),
('320', 3, NULL),
('321', 3, NULL),
('322', 3, NULL),
('323', 3, NULL),
('324', 3, NULL),
('326', 3, NULL),
('327', 3, NULL),
('328', 3, NULL),
('330A', 3, NULL),
('330B', 3, NULL),
('332', 3, NULL),
('333', 3, NULL),
('337', 3, NULL),
('394', 3, NULL),
('395', 3, NULL),
('396', 3, NULL),
('397', 3, NULL),
('398', 3, NULL),
('399', 3, NULL),
('401', 4, NULL),
('401A', 4, NULL),
('401B', 4, NULL),
('401D', 4, NULL),
('402', 4, NULL),
('403', 4, NULL),
('404', 4, NULL),
('405', 4, NULL),
('406', 4, NULL),
('407', 4, NULL),
('407A', 4, NULL),
('408', 4, NULL),
('409', 4, NULL),
('410', 4, NULL),
('410A', 4, NULL),
('411', 4, NULL),
('411A', 4, NULL),
('412', 4, NULL),
('413', 4, NULL),
('413A', 4, NULL),
('414', 4, NULL),
('415', 4, NULL),
('416', 4, NULL),
('417', 4, NULL),
('418', 4, NULL),
('419', 4, NULL),
('419A', 4, NULL),
('419B', 4, NULL),
('420', 4, NULL),
('421', 4, NULL),
('423', 4, NULL),
('424', 4, NULL),
('425', 4, NULL),
('426', 4, NULL),
('428', 4, NULL),
('429', 4, NULL),
('431', 4, NULL),
('432', 4, NULL),
('434', 4, NULL),
('435', 4, NULL),
('436', 4, NULL),
('437', 4, NULL),
('438', 4, NULL),
('439', 4, NULL),
('440', 4, NULL),
('441', 4, NULL),
('442', 4, NULL),
('443', 4, NULL),
('444', 4, NULL),
('445', 4, NULL),
('446', 4, NULL),
('446A', 4, NULL),
('447', 4, NULL),
('447A', 4, NULL),
('447B', 4, NULL),
('448', 4, NULL),
('448B', 4, NULL),
('449', 4, NULL),
('450', 4, NULL),
('461', 4, NULL),
('462', 4, NULL),
('463', 4, NULL),
('464', 4, NULL),
('465', 4, NULL),
('467', 4, NULL),
('470', 4, NULL),
('471', 4, NULL),
('472', 4, NULL),
('480', 4, NULL),
('482', 4, NULL),
('487', 4, NULL),
('496', 4, NULL),
('497', 4, NULL),
('501', 5, NULL),
('502', 5, NULL),
('503', 5, NULL),
('504', 5, NULL),
('505', 5, NULL),
('506', 5, NULL),
('507', 5, NULL),
('508', 5, NULL),
('509', 5, NULL),
('510', 5, NULL),
('510A', 5, NULL),
('512', 5, NULL),
('513', 5, NULL),
('514', 5, NULL),
('515', 5, NULL),
('516', 5, NULL),
('517', 5, NULL),
('517A', 5, NULL),
('518', 5, NULL),
('519', 5, NULL),
('519A', 5, NULL),
('520', 5, NULL),
('521', 5, NULL),
('522', 5, NULL),
('523', 5, NULL),
('524', 5, NULL),
('524A', 5, NULL),
('525', 5, NULL),
('525A', 5, NULL),
('526', 5, NULL),
('526A', 5, NULL),
('527', 5, NULL),
('528', 5, NULL),
('529', 5, NULL),
('530', 5, NULL),
('531', 5, NULL),
('531A', 5, NULL),
('532', 5, NULL),
('534', 5, NULL),
('535', 5, NULL),
('535A', 5, NULL),
('537', 5, NULL),
('538', 5, NULL),
('540', 5, NULL),
('541', 5, NULL),
('542', 5, NULL),
('543', 5, NULL),
('544', 5, NULL),
('545', 5, NULL),
('546', 5, NULL),
('547', 5, NULL),
('548', 5, NULL),
('549', 5, NULL),
('550', 5, NULL),
('551', 5, NULL),
('552', 5, NULL),
('553', 5, NULL),
('555', 5, NULL),
('558', 5, NULL),
('560', 5, NULL),
('561', 5, NULL),
('567', 5, NULL),
('569', 5, NULL),
('570', 5, NULL),
('571', 5, NULL),
('572', 5, NULL),
('573', 5, NULL),
('574', 5, NULL),
('575', 5, NULL),
('577', 5, NULL),
('579', 5, NULL),
('580', 5, NULL),
('581', 5, NULL),
('582', 5, NULL),
('582B', 5, NULL),
('588', 5, NULL),
('594', 5, NULL),
('595', 5, NULL),
('596', 5, NULL),
('597', 5, NULL),
('598', 5, NULL),
('599', 5, NULL),
('601', 6, NULL),
('603', 6, NULL),
('604', 6, NULL),
('605', 6, NULL),
('606', 6, NULL),
('607', 6, NULL),
('608', 6, NULL),
('609', 6, NULL),
('610', 6, NULL),
('610A', 6, NULL),
('612', 6, NULL),
('613', 6, NULL),
('614', 6, NULL),
('615', 6, NULL),
('616', 6, NULL),
('617', 6, NULL),
('618', 6, NULL),
('619', 6, NULL),
('620', 6, NULL),
('620A', 6, NULL),
('621', 6, NULL),
('622', 6, NULL),
('623', 6, NULL),
('624', 6, NULL),
('625', 6, NULL),
('626', 6, NULL),
('627', 6, NULL),
('628', 6, NULL),
('629', 6, NULL),
('630', 6, NULL),
('631', 6, NULL),
('632', 6, NULL),
('633', 6, NULL),
('634', 6, NULL),
('636', 6, NULL),
('637', 6, NULL),
('639', 6, NULL),
('640', 6, NULL),
('641', 6, NULL),
('642', 6, NULL),
('643', 6, NULL),
('644', 6, NULL),
('647', 6, NULL),
('648', 6, NULL),
('649', 6, NULL),
('650', 6, NULL),
('651', 6, NULL),
('651A', 6, NULL),
('652', 6, NULL),
('653', 6, NULL),
('654', 6, NULL),
('655', 6, NULL),
('656', 6, NULL),
('660', 6, NULL),
('661', 6, NULL),
('663', 6, NULL),
('664', 6, NULL),
('665', 6, NULL),
('666', 6, NULL),
('667', 6, NULL),
('669', 6, NULL),
('670', 6, NULL),
('673', 6, NULL),
('685', 6, NULL),
('687', 6, NULL),
('693', 6, NULL),
('694', 6, NULL),
('695', 6, NULL),
('696', 6, NULL),
('699', 6, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `RoomTrends`
--
CREATE TABLE IF NOT EXISTS `RoomTrends` (
`room` varchar(4)
,`numberCheckins` bigint(21)
,`trendRating` double(19,2)
);
-- --------------------------------------------------------

--
-- Table structure for table `Secrets`
--

CREATE TABLE IF NOT EXISTS `Secrets` (
  `s_ID` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text,
  `cost` smallint(5) NOT NULL,
  `isHat` tinyint(1) NOT NULL,
  PRIMARY KEY (`s_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `Secrets`
--

INSERT INTO `Secrets` (`s_ID`, `name`, `description`, `cost`, `isHat`) VALUES
(1, 'Auditorium - Seating', 'The GHD Auditorium measures the weight of a section of seating.', 60, 0),
(2, 'Walkways - Vibrations', 'Walkways above the mezzanine measure the vibrations as people walk across it.', 60, 0),
(3, 'Building - Water Level Sensor', 'There is a sensor that measures the water level underneath the building, so as to check if there will be any negative effect on the foundation.', 75, 0),
(4, 'Auditorium - No Microphones', 'In the GHD Auditorium, there is no need of a microphone to talk to the audience. The presenter can simply talk using their normal voice and everyone within the auditorium will be able to hear.', 30, 0),
(5, 'Auditorium - Hemisphere Record', 'The GHD Auditorium is the largest wooden structure in the southern hemisphere.', 45, 0),
(6, 'Building - Green Rating', 'The building has a 5-star green rating.', 15, 0),
(7, 'Building - Orange Panels', 'The orange panels on the facade of the building are actually used for light diffusion into the rooms inside.', 15, 0),
(8, 'Building - Air', 'The air that is circulated into the rooms runs through a laboratory under the building in order to condition it. The air is cooled and the humidity is reduced.', 45, 0),
(9, 'Building - Air Cooling System', 'The air cooling system cools individual people instead of the whole room.', 45, 0),
(10, 'Building - Louvers', 'The louvers (blinds) inside the rooms are controlled by a system that measures the weather outside and the climate inside.', 45, 0),
(11, 'Building - Site', 'The AEB is built on the site of the old Civil Engineering Building (48).', 15, 0),
(12, 'Building - Concrete', 'There are 11 clauses of Australian Standard of Building Code, on the concrete alone.', 30, 0),
(13, 'Concrete - Specifications', 'The concrete for the building was required to pass a prototype, where a small structure was built to ensure the contractor could meet the high quality\r\nspecification. The colour of the concrete was very important to the architects and finish.', 30, 0),
(14, 'Building - Concrete Reinforcing Bar', 'The concrete reinforcing bar in the superlab columns and the stony floor are 32mm diameter compared to a normal slab reinforcing of 12mm.', 60, 0),
(15, 'Building - Design Companies', 'The building was designed by two companies: Richard Kirk Architect and Hassell.', 15, 0),
(16, 'Building - Level 1 Facilities', 'There is a bike shelter and showers on level 1.', 15, 0),
(17, 'Orange Panels - Terracotta', 'The orange panels on the outside of the building are made of terracotta, which was imported from Italy.', 45, 0),
(18, 'Auditorium - Roof', 'The glass used on the roof of the GHD Auditorium is 18mm thick. It is laminated and heat strengthened.', 60, 0),
(19, 'Building - Lake Proximity', 'Lake water saturates the ground under the building at the lake level.', 45, 0),
(20, 'Building - Levels', 'There is no cow level. No seriously, there''s no such level in the building. Don''t go looking for it or anything. You have been warned.', 120, 0),
(21, 'Secret Hat for Avatar', '3', 15, 1),
(22, 'Secret Hat for Avatar', '4', 25, 1),
(23, 'Secret Hat for Avatar', '5', 30, 1),
(24, 'Secret Hat for Avatar', '6', 40, 1),
(25, 'Secret Hat for Avatar', '7', 25, 1),
(26, 'Secret Hat for Avatar', '8', 55, 1),
(27, 'Secret Hat for Avatar', '9', 50, 1),
(28, 'Secret Hat for Avatar', '10', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Survey`
--

CREATE TABLE IF NOT EXISTS `Survey` (
  `svy_ID` int(10) NOT NULL AUTO_INCREMENT,
  `u_ID` mediumint(7) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room` varchar(4) NOT NULL,
  `temp` tinyint(2) DEFAULT NULL COMMENT '1 to 9',
  `humid` tinyint(2) DEFAULT NULL COMMENT '1 to 9',
  `noise` tinyint(2) DEFAULT NULL COMMENT '1 to 9',
  `light` tinyint(2) DEFAULT NULL COMMENT '1 to 9',
  `crowd` tinyint(2) DEFAULT NULL COMMENT '1 to 9',
  `comment` text,
  PRIMARY KEY (`svy_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `Survey`
--

INSERT INTO `Survey` (`svy_ID`, `u_ID`, `timestamp`, `room`, `temp`, `humid`, `noise`, `light`, `crowd`, `comment`) VALUES
(40, 36, '2014-10-22 06:37:28', '318', 4, 3, 6, 10, 0, ''),
(41, 36, '2014-10-22 06:40:58', '205', 5, 0, 6, 5, 0, 'Changed scale from tags to numeric (1-9)'),
(42, 36, '2014-10-22 15:40:51', '447', 1, 3, 5, 7, 9, 'Botched up the styles somehow.'),
(43, 36, '2014-10-22 15:41:29', '310A', 7, 5, 3, 9, 0, ''),
(44, 36, '2014-10-22 15:58:32', '401D', 9, 7, 5, 3, 0, 'Room list complete.'),
(45, 36, '2014-10-24 04:01:28', '306', 3, 6, 2, 6, 4, 'alert(''Hello'');'),
(46, 89, '2014-10-24 05:12:08', '101', 8, 9, 9, 1, 0, ''),
(47, 89, '2014-10-27 04:43:04', '101', 5, 3, 7, 6, 5, ''),
(48, 36, '2014-10-27 06:23:17', '505', 8, 6, 5, 4, 5, 'Hey'),
(49, 36, '2014-10-27 06:24:36', '200', 9, 9, 5, 1, 0, ''),
(55, 36, '2014-11-09 20:24:45', '202', 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `SurveySummary`
--
CREATE TABLE IF NOT EXISTS `SurveySummary` (
`room` varchar(4)
,`timestamp` timestamp
,`temp` tinyint(2)
,`humid` tinyint(2)
,`noise` tinyint(2)
,`light` tinyint(2)
,`crowd` tinyint(2)
,`comment` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag1Preprocess`
--
CREATE TABLE IF NOT EXISTS `Tag1Preprocess` (
`timestamp` timestamp
,`tag1` varchar(16)
,`room` varchar(4)
,`score` double
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag1Rating`
--
CREATE TABLE IF NOT EXISTS `Tag1Rating` (
`room` varchar(4)
,`TagScore` double
,`RecentBadCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag2Preprocess`
--
CREATE TABLE IF NOT EXISTS `Tag2Preprocess` (
`timestamp` timestamp
,`tag2` varchar(16)
,`room` varchar(4)
,`score` double
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag2Rating`
--
CREATE TABLE IF NOT EXISTS `Tag2Rating` (
`room` varchar(4)
,`TagScore` double
,`RecentBadCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag3Preprocess`
--
CREATE TABLE IF NOT EXISTS `Tag3Preprocess` (
`timestamp` timestamp
,`tag3` varchar(16)
,`room` varchar(4)
,`score` double
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag3Rating`
--
CREATE TABLE IF NOT EXISTS `Tag3Rating` (
`room` varchar(4)
,`TagScore` double
,`RecentBadCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag4Preprocess`
--
CREATE TABLE IF NOT EXISTS `Tag4Preprocess` (
`timestamp` timestamp
,`tag4` varchar(16)
,`room` varchar(4)
,`score` double
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag4Rating`
--
CREATE TABLE IF NOT EXISTS `Tag4Rating` (
`room` varchar(4)
,`TagScore` double
,`RecentBadCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag5Preprocess`
--
CREATE TABLE IF NOT EXISTS `Tag5Preprocess` (
`timestamp` timestamp
,`tag5` varchar(16)
,`room` varchar(4)
,`score` double
,`decayFactor` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Tag5Rating`
--
CREATE TABLE IF NOT EXISTS `Tag5Rating` (
`room` varchar(4)
,`TagScore` double
,`RecentBadCount` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE IF NOT EXISTS `Tags` (
  `tag` varchar(16) NOT NULL,
  `type` varchar(32) DEFAULT NULL,
  `score` double NOT NULL,
  PRIMARY KEY (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tags`
--

INSERT INTO `Tags` (`tag`, `type`, `score`) VALUES
('bright', 'lighting', 1),
('cold', 'temperature', -1),
('comfy', 'lighting', 0),
('cool', 'temperature', -0.5),
('crowded', 'crowd', 1),
('dark', 'lighting', -1),
('dry', 'humidity', -1),
('fine', 'noise', 0),
('hot', 'temperature', 1),
('humid', 'humidity', 1),
('mild', 'temperature', 0),
('noisy', 'noise', 1),
('normal', 'humidity', 0),
('peaceful', 'crowd', 0),
('quiet', 'noise', -1),
('warm', 'temperature', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `UserAchievements`
--

CREATE TABLE IF NOT EXISTS `UserAchievements` (
  `u_ID` mediumint(7) NOT NULL,
  `a_ID` smallint(5) NOT NULL,
  PRIMARY KEY (`u_ID`,`a_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserAchievements`
--

INSERT INTO `UserAchievements` (`u_ID`, `a_ID`) VALUES
(1, 1),
(1, 2),
(3, 1),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `u_ID` mediumint(7) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `f_name` varchar(32) NOT NULL,
  `l_name` varchar(32) NOT NULL,
  `gender` char(1) NOT NULL,
  `pic` varchar(32) NOT NULL DEFAULT 'default',
  `AEBux` mediumint(7) NOT NULL DEFAULT '5',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Boolean = Tinyint(1)',
  `rank` mediumint(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`u_ID`, `email`, `pass`, `f_name`, `l_name`, `gender`, `pic`, `AEBux`, `isAdmin`, `rank`) VALUES
(1, 'johnsnow@nightswatch.com', 'sha256:1000:KPNlxW2ZcToe49jRFsnw2wVGqPjSGtn+:PunedIJ5UgiBR3YfZnw2efq9/LauY1/t', 'John', 'Snow', 'm', 'm2.png', 100, 0, 5),
(2, 'tyrion@kingslanding.com', 'sha256:1000:KPNlxW2ZcToe49jRFsnw2wVGqPjSGtn+:PunedIJ5UgiBR3YfZnw2efq9/LauY1/t', 'Tyrion', 'Lannister', 'm', 'm4.png', 1000, 0, 10),
(3, 'jmormont@khaleesi.com', 'sha256:1000:KPNlxW2ZcToe49jRFsnw2wVGqPjSGtn+:PunedIJ5UgiBR3YfZnw2efq9/LauY1/t', 'Jorah', 'Mormont', 'm', 'm5.png', 1, 0, 3),
(36, 'deco@3801.com', 'sha256:1000:rGq8OgHEgrr6yKEdOi6vIQR5AhS/sp/T:9FHJniuoc500zPPy1vghMMRrKf6mSIry', 'Tom', 'Koorts', 'm', 'm6.png', 60, 1, 777),
(82, 'Testingit@hash.com', 'sha256:1000:Gucf+LdGNX17hgXniBeyN/0J7VemimuS:B9oriv2NwV2YrKWrZr8z6+0vYHnRn7r6', 'Password', 'Hashing', 'm', 'm.png', 5, 0, 0),
(83, 'p@p.com', 'sha256:1000:1wsoBiR/SyGvcn5d4J4lJWcUmu6dXdAl:YpJpGYzaF9j8YO3Brl0OoIUN9cdkT8Uw', 'p', 'p', 'm', 'm.png', 5, 0, 0),
(84, 'deco@3802.com', 'sha256:1000:rGq8OgHEgrr6yKEdOi6vIQR5AhS/sp/T:9FHJniuoc500zPPy1vghMMRrKf6mSIry', 'Debug', 'User', 'm', 'm.png', 5, 0, 0),
(85, 'come@onwork.com', 'sha256:1000:58r7PxzCowo6XLvSD19psfpt73AOlBt2:AL1ANtNbbcQ1uPiffhNscOk0svx1barr', 'please', 'work', 'm', 'm.png', 5, 0, 0),
(89, 'admin@admin.com', 'sha256:1000:UwPwsQiRO/SkAeKWk5R3YkSJZLrYC+lO:ZLMW1jNqVIHdumsS4zj8zRRTc0QScelc', 'Ad', 'Ministrator', 'm', 'm3.png', 1900, 1, 0),
(90, 'Hello@hello.com', 'sha256:1000:+1fYG5P/h5/0droNmz8cTzUOqtuUOzNJ:nNlxmvNs7SthDmTXF9ox0Vj0DNg9QNMw', 'Hello', 'Hello', 'm', 'm.png', 5, 0, 0),
(91, 'treter@uq.com', 'sha256:1000:HFHrCE/BXMXS9dQufwUV/+SH9SGUkPVG:g/PZfZ9jcp6FXwycM3B07/xWqzKmLTh9', 'Trial', 'Person', 'm', 'm.png', 5, 0, 0),
(92, 'cyanide.or.happiness@gmail.com', 'sha256:1000:MovYec4Vvf6gd+nb4AsRRuSlII41VM4y:k+NWgZEaAPMMGa/Cz5NxDYwN5WYKyMBp', 'Nikita', 'Noles', 'f', 'f.png', 5, 0, 0),
(93, 'debug@d.bug', 'sha256:1000:ttAM7yhHiN1LdRk0opL91hkGZzj1da65:b3tvbeir9rRe/UCsIj1cEyRNhfisyLod', 'Debug', 'User', 'm', 'm.png', 0, 0, 0),
(94, 'demo@peter.com', 'sha256:1000:cjrzH40zuDORc7cI4I2gn53R0YemC2G5:AJeUvCarIBEtT3JIe9N1H9m6syHxn4CM', 'peter', 'phillpotts', 'm', 'm.png', 15, 0, 0),
(95, 'FAQ@user.com', 'sha256:1000:aVV7/UJxp2sh1fa2/dZIEVpe+2pT9W5X:u3BnMBIIlhpqkKk4xzmwwO5UXgCVf1ga', 'FAQ', 'User', 'f', 'f.png', 20, 0, 0),
(96, 'pass@word.com', 'sha256:1000:KPNlxW2ZcToe49jRFsnw2wVGqPjSGtn+:PunedIJ5UgiBR3YfZnw2efq9/LauY1/t', 'Add', 'this ', 'm', 'm.png', 5, 0, 0),
(97, 'deco@3800.com', 'sha256:1000:jowIlDG/6O/yCZx94fvagwqdTsuLdcD5:ZLKwcb5ARgGGP4jkLxbRIfNTy3NpCt4y', 'Deco', '3800', 'f', 'f.png', 5, 0, 0),
(99, 'working@work.com', 'sha256:1000:aeNLQf4wLfN7Xl5uxQrrEzXNLPe0ydIp:37lUgYO32nhWPScnF/ikHZm8/2gt0w7F', 'work', 'alert(''john'')', 'm', 'm.png', 5, 0, 0),
(100, 'nomore@email.com', 'sha256:1000:gZvDsl3rWerwSjQfKGGO8hf6GHTdfkcW:kH6i95HYvlz7S1uhEL2/IfOLafo8OjrY', '''OR 1=1', 'Test', 'm', 'm.png', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `UserSecrets`
--

CREATE TABLE IF NOT EXISTS `UserSecrets` (
  `u_ID` mediumint(7) NOT NULL,
  `s_ID` smallint(5) NOT NULL,
  PRIMARY KEY (`u_ID`,`s_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserSecrets`
--

INSERT INTO `UserSecrets` (`u_ID`, `s_ID`) VALUES
(1, 1),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(1, 20),
(1, 22),
(2, 10),
(14, 6),
(14, 7),
(14, 15),
(36, 6),
(36, 7),
(36, 11),
(36, 13),
(36, 15),
(53, 6),
(89, 4),
(89, 6),
(89, 7),
(89, 8),
(89, 11),
(89, 12),
(89, 15),
(89, 16),
(89, 19),
(89, 21),
(89, 22),
(89, 23),
(89, 25),
(93, 21),
(100, 4),
(100, 6),
(100, 7),
(100, 11),
(100, 15),
(100, 200),
(222, 120),
(400, 6),
(500, 500);

-- --------------------------------------------------------

--
-- Stand-in structure for view `UserSpending`
--
CREATE TABLE IF NOT EXISTS `UserSpending` (
`u_ID` mediumint(7)
,`Spent` decimal(27,0)
);
-- --------------------------------------------------------

--
-- Structure for view `CheckInDecay`
--
DROP TABLE IF EXISTS `CheckInDecay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CheckInDecay` AS select `CheckIn`.`chk_ID` AS `chk_ID`,`CheckIn`.`u_ID` AS `u_ID`,`CheckIn`.`timestamp` AS `timestamp`,`CheckIn`.`room` AS `room`,`CheckIn`.`tag1` AS `tag1`,`CheckIn`.`tag2` AS `tag2`,`CheckIn`.`tag3` AS `tag3`,`CheckIn`.`tag4` AS `tag4`,`CheckIn`.`tag5` AS `tag5`,`CheckIn`.`withFriend` AS `withFriend`,`CheckIn`.`comment` AS `comment`,exp((-(0.2) * (to_days(now()) - to_days(`CheckIn`.`timestamp`)))) AS `decayFactor` from `CheckIn` where (`CheckIn`.`timestamp` > timestamp(now(),'-336:00:00'));

-- --------------------------------------------------------

--
-- Structure for view `RoomTrends`
--
DROP TABLE IF EXISTS `RoomTrends`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `RoomTrends` AS select `CheckInDecay`.`room` AS `room`,count(0) AS `numberCheckins`,round(sum(`CheckInDecay`.`decayFactor`),2) AS `trendRating` from `CheckInDecay` where (`CheckInDecay`.`timestamp` > timestamp(now(),'-196:00:00')) group by `CheckInDecay`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `SurveySummary`
--
DROP TABLE IF EXISTS `SurveySummary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `SurveySummary` AS select `Survey`.`room` AS `room`,`Survey`.`timestamp` AS `timestamp`,`Survey`.`temp` AS `temp`,`Survey`.`humid` AS `humid`,`Survey`.`noise` AS `noise`,`Survey`.`light` AS `light`,`Survey`.`crowd` AS `crowd`,`Survey`.`comment` AS `comment` from `Survey`;

-- --------------------------------------------------------

--
-- Structure for view `Tag1Preprocess`
--
DROP TABLE IF EXISTS `Tag1Preprocess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag1Preprocess` AS select `CheckInDecay`.`timestamp` AS `timestamp`,`CheckInDecay`.`tag1` AS `tag1`,`CheckInDecay`.`room` AS `room`,`Tags`.`score` AS `score`,`CheckInDecay`.`decayFactor` AS `decayFactor` from (`CheckInDecay` join `Tags`) where (`CheckInDecay`.`tag1` = `Tags`.`tag`);

-- --------------------------------------------------------

--
-- Structure for view `Tag1Rating`
--
DROP TABLE IF EXISTS `Tag1Rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag1Rating` AS select `Tag1Preprocess`.`room` AS `room`,(sum((`Tag1Preprocess`.`score` * `Tag1Preprocess`.`decayFactor`)) / (sum(`Tag1Preprocess`.`decayFactor`) + 1)) AS `TagScore`,count(0) AS `RecentBadCount` from `Tag1Preprocess` where (`Tag1Preprocess`.`score` <> 0) group by `Tag1Preprocess`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `Tag2Preprocess`
--
DROP TABLE IF EXISTS `Tag2Preprocess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag2Preprocess` AS select `CheckInDecay`.`timestamp` AS `timestamp`,`CheckInDecay`.`tag2` AS `tag2`,`CheckInDecay`.`room` AS `room`,`Tags`.`score` AS `score`,`CheckInDecay`.`decayFactor` AS `decayFactor` from (`CheckInDecay` join `Tags`) where (`CheckInDecay`.`tag2` = `Tags`.`tag`);

-- --------------------------------------------------------

--
-- Structure for view `Tag2Rating`
--
DROP TABLE IF EXISTS `Tag2Rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag2Rating` AS select `Tag2Preprocess`.`room` AS `room`,(sum((`Tag2Preprocess`.`score` * `Tag2Preprocess`.`decayFactor`)) / (sum(`Tag2Preprocess`.`decayFactor`) + 1)) AS `TagScore`,count(0) AS `RecentBadCount` from `Tag2Preprocess` where (`Tag2Preprocess`.`score` <> 0) group by `Tag2Preprocess`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `Tag3Preprocess`
--
DROP TABLE IF EXISTS `Tag3Preprocess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag3Preprocess` AS select `CheckInDecay`.`timestamp` AS `timestamp`,`CheckInDecay`.`tag3` AS `tag3`,`CheckInDecay`.`room` AS `room`,`Tags`.`score` AS `score`,`CheckInDecay`.`decayFactor` AS `decayFactor` from (`CheckInDecay` join `Tags`) where (`CheckInDecay`.`tag3` = `Tags`.`tag`);

-- --------------------------------------------------------

--
-- Structure for view `Tag3Rating`
--
DROP TABLE IF EXISTS `Tag3Rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag3Rating` AS select `Tag3Preprocess`.`room` AS `room`,(sum((`Tag3Preprocess`.`score` * `Tag3Preprocess`.`decayFactor`)) / (sum(`Tag3Preprocess`.`decayFactor`) + 1)) AS `TagScore`,count(0) AS `RecentBadCount` from `Tag3Preprocess` where (`Tag3Preprocess`.`score` <> 0) group by `Tag3Preprocess`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `Tag4Preprocess`
--
DROP TABLE IF EXISTS `Tag4Preprocess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag4Preprocess` AS select `CheckInDecay`.`timestamp` AS `timestamp`,`CheckInDecay`.`tag4` AS `tag4`,`CheckInDecay`.`room` AS `room`,`Tags`.`score` AS `score`,`CheckInDecay`.`decayFactor` AS `decayFactor` from (`CheckInDecay` join `Tags`) where (`CheckInDecay`.`tag4` = `Tags`.`tag`);

-- --------------------------------------------------------

--
-- Structure for view `Tag4Rating`
--
DROP TABLE IF EXISTS `Tag4Rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag4Rating` AS select `Tag4Preprocess`.`room` AS `room`,(sum((`Tag4Preprocess`.`score` * `Tag4Preprocess`.`decayFactor`)) / (sum(`Tag4Preprocess`.`decayFactor`) + 1)) AS `TagScore`,count(0) AS `RecentBadCount` from `Tag4Preprocess` where (`Tag4Preprocess`.`score` <> 0) group by `Tag4Preprocess`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `Tag5Preprocess`
--
DROP TABLE IF EXISTS `Tag5Preprocess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag5Preprocess` AS select `CheckInDecay`.`timestamp` AS `timestamp`,`CheckInDecay`.`tag5` AS `tag5`,`CheckInDecay`.`room` AS `room`,`Tags`.`score` AS `score`,`CheckInDecay`.`decayFactor` AS `decayFactor` from (`CheckInDecay` join `Tags`) where (`CheckInDecay`.`tag5` = `Tags`.`tag`);

-- --------------------------------------------------------

--
-- Structure for view `Tag5Rating`
--
DROP TABLE IF EXISTS `Tag5Rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Tag5Rating` AS select `Tag5Preprocess`.`room` AS `room`,(sum((`Tag5Preprocess`.`score` * `Tag5Preprocess`.`decayFactor`)) / (sum(`Tag5Preprocess`.`decayFactor`) + 1)) AS `TagScore`,count(0) AS `RecentBadCount` from `Tag5Preprocess` where (`Tag5Preprocess`.`score` <> 0) group by `Tag5Preprocess`.`room`;

-- --------------------------------------------------------

--
-- Structure for view `UserSpending`
--
DROP TABLE IF EXISTS `UserSpending`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `UserSpending` AS select `Users`.`u_ID` AS `u_ID`,sum(`Secrets`.`cost`) AS `Spent` from ((`Users` left join `UserSecrets` on((`Users`.`u_ID` = `UserSecrets`.`u_ID`))) left join `Secrets` on((`UserSecrets`.`s_ID` = `Secrets`.`s_ID`))) group by `Users`.`u_ID`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Hat`
--
ALTER TABLE `Hat`
  ADD CONSTRAINT `Hat_ibfk_1` FOREIGN KEY (`s_ID`) REFERENCES `Secrets` (`s_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
