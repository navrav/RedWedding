-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2014 at 09:52 PM
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
-- Structure for view `CheckInDecay`
--
DROP TABLE IF EXISTS `CheckInDecay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `CheckInDecay` AS select `CheckIn`.`chk_ID` AS `chk_ID`,`CheckIn`.`u_ID` AS `u_ID`,`CheckIn`.`timestamp` AS `timestamp`,`CheckIn`.`room` AS `room`,`CheckIn`.`tag1` AS `tag1`,`CheckIn`.`tag2` AS `tag2`,`CheckIn`.`tag3` AS `tag3`,`CheckIn`.`tag4` AS `tag4`,`CheckIn`.`tag5` AS `tag5`,`CheckIn`.`withFriend` AS `withFriend`,`CheckIn`.`comment` AS `comment`,exp((-(0.2) * (to_days(now()) - to_days(`CheckIn`.`timestamp`)))) AS `decayFactor` from `CheckIn` where (`CheckIn`.`timestamp` > timestamp(now(),'-336:00:00'));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
