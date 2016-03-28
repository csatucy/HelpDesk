-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: dbserver.in.cs.ucy.ac.cy
-- Generation Time: Mar 24, 2016 at 03:54 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrators`
--

CREATE TABLE IF NOT EXISTS `Administrators` (
  `techid` tinyint(6) NOT NULL AUTO_INCREMENT,
  `techemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `techname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `techPhone` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `working` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `techlogin` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  UNIQUE KEY `techid` (`techid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `author` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sent_to` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `authoremail` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `indate` date NOT NULL DEFAULT '2000-01-01',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `state` enum('active','obsolete') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `up-date` date DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `up-date` (`up-date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=0 COMMENT='Announcements' AUTO_INCREMENT=314 ;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `answerid` int(11) NOT NULL AUTO_INCREMENT,
  `problemid` int(11) NOT NULL DEFAULT '0',
  `techdescr` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `techemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `indate_ans` date NOT NULL DEFAULT '0000-00-00',
  `intime_ans` time NOT NULL,
  `name_ans` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  KEY `answerid` (`answerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17266 ;

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE IF NOT EXISTS `assigned` (
  `assignedID` int(11) NOT NULL AUTO_INCREMENT,
  `techname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `problemid` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`assignedID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5583 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `jobid` int(11) NOT NULL AUTO_INCREMENT,
  `indate` date NOT NULL DEFAULT '0000-00-00',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `assigned` int(11) NOT NULL DEFAULT '0',
  `solvedstate` int(11) NOT NULL DEFAULT '0',
  `urgency` int(11) NOT NULL,
  PRIMARY KEY (`jobid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=1 AUTO_INCREMENT=724 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobsanswers`
--

CREATE TABLE IF NOT EXISTS `jobsanswers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` int(11) NOT NULL DEFAULT '0',
  `techdescr` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `techemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `indate_ans` date NOT NULL DEFAULT '0000-00-00',
  `name_ans` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=938 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobsassigned`
--

CREATE TABLE IF NOT EXISTS `jobsassigned` (
  `assignedID` int(11) NOT NULL AUTO_INCREMENT,
  `techname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `jobid` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`assignedID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=777 ;

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `problemid` int(11) NOT NULL AUTO_INCREMENT,
  `indate` date NOT NULL DEFAULT '0000-00-00',
  `intime` time NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `assigned` int(11) NOT NULL DEFAULT '0',
  `solvedstate` int(11) NOT NULL DEFAULT '0',
  `urgency` int(11) NOT NULL DEFAULT '0',
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`problemid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci PACK_KEYS=1 AUTO_INCREMENT=8943 ;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE IF NOT EXISTS `technicians` (
  `techid` int(11) NOT NULL AUTO_INCREMENT,
  `techemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `techname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `techPhone` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `working` int(11) NOT NULL DEFAULT '0',
  `techlogin` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`techid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=101 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
