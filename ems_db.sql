-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 04:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensedetails`
--

CREATE TABLE `absensedetails` (
  `id` varchar(7) NOT NULL,
  `module` varchar(6) NOT NULL,
  `message` varchar(2047) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensedetails`
--

INSERT INTO `absensedetails` (`id`, `module`, `message`) VALUES
('1111111', 'CE1022', '<p>i was sick</p>'),
('1111111', 'CS1032', '<p>s</p>'),
('1111111', 'CS2012', '<p>a</p>'),
('160000X', 'CS1032', '<p>fdfdfdf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(7) NOT NULL,
  `val` varchar(1023) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `val`, `pwd`) VALUES
('1111111', 'O:5:\"Admin\":3:{s:9:\"\0Admin\0id\";s:7:\"1111111\";s:11:\"\0Admin\0name\";s:15:\" Andres Iniesta\";s:15:\"\0Admin\0priority\";s:1:\"1\";}', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `convocationrequests`
--

CREATE TABLE `convocationrequests` (
  `id` varchar(7) NOT NULL,
  `val` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `convocationrequests`
--

INSERT INTO `convocationrequests` (`id`, `val`) VALUES
('1111111', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2018\";s:17:\"\0Student\0semester\";i:2;s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:1:{i:1;a:4:{i:0;s:6:\"CE1022\";i:1;s:6:\"CS1032\";i:2;s:6:\"EE1012\";i:3;s:6:\"ME1032\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:1;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"1111111\";s:10:\"\0User\0name\";s:5:\"Binod\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:9:\"716611642\";s:11:\"\0User\0email\";s:15:\"binod@gmail.com\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}'),
('140000X', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2014\";s:17:\"\0Student\0semester\";s:1:\"8\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:0:{}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"140000X\";s:10:\"\0User\0name\";s:9:\"Leo Messi\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:10:\"0702106819\";s:11:\"\0User\0email\";s:9:\"fgg@l.com\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` varchar(7) NOT NULL,
  `val` varchar(1023) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `val`, `pwd`) VALUES
('1111111', 'O:8:\"Lecturer\":8:{s:17:\"\0Lecturer\0modules\";a:1:{i:0;s:6:\"CS1032\";}s:8:\"\0User\0id\";s:7:\"1111111\";s:10:\"\0User\0name\";s:4:\"Xavi\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:9:\"702106819\";s:11:\"\0User\0email\";s:9:\"fgg@l.com\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', '81dc9bdb52d04dc20036dbd8313ed055'),
('2222222', 'O:8:\"Lecturer\":8:{s:17:\"\0Lecturer\0modules\";a:3:{i:0;s:6:\"CS2022\";i:1;s:6:\"CS2052\";i:2;s:6:\"CS2062\";}s:8:\"\0User\0id\";s:7:\"2222222\";s:10:\"\0User\0name\";s:4:\"John\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` varchar(6) NOT NULL,
  `val` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `val`) VALUES
('AS2344', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"AS2344\";s:12:\"\0Module\0name\";s:4:\"ffff\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:5:\"33333\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:5:\"FALSE\";}'),
('CE1022', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CE1022\";s:12:\"\0Module\0name\";s:15:\"Fluid Mechanics\";s:16:\"\0Module\0semester\";s:1:\"1\";s:15:\"\0Module\0credits\";s:1:\"2\";s:18:\"\0Module\0department\";s:3:\"civ\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS1032', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS1032\";s:12:\"\0Module\0name\";s:24:\"Programming Fundamentals\";s:16:\"\0Module\0semester\";s:1:\"1\";s:15:\"\0Module\0credits\";s:1:\"3\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS1962', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS1962\";s:12:\"\0Module\0name\";s:29:\"Engineering Skill Development\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:3:\"1.5\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:5:\"FALSE\";}'),
('CS2012', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS2012\";s:12:\"\0Module\0name\";s:41:\"Principles of Object Oriented Programming\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:1:\"3\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS2022', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS2022\";s:12:\"\0Module\0name\";s:30:\"Data Structures and Algorithms\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:3:\"2.5\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS2052', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS2052\";s:12:\"\0Module\0name\";s:21:\"Computer Architecture\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:1:\"3\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS2062', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS2062\";s:12:\"\0Module\0name\";s:36:\"Object Oriented Software Development\";s:16:\"\0Module\0semester\";s:1:\"3\";s:15:\"\0Module\0credits\";s:1:\"3\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('CS2952', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"CS2952\";s:12:\"\0Module\0name\";s:20:\"Communication Skills\";s:16:\"\0Module\0semester\";s:1:\"2\";s:15:\"\0Module\0credits\";s:3:\"1.5\";s:18:\"\0Module\0department\";s:3:\"cse\";s:18:\"\0Module\0compulsory\";s:5:\"FALSE\";}'),
('EE1012', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"EE1012\";s:12:\"\0Module\0name\";s:22:\"Electrical Engineering\";s:16:\"\0Module\0semester\";s:1:\"1\";s:15:\"\0Module\0credits\";s:1:\"2\";s:18:\"\0Module\0department\";s:3:\"ele\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}'),
('ME1032', 'O:6:\"Module\":6:{s:10:\"\0Module\0id\";s:6:\"ME1032\";s:12:\"\0Module\0name\";s:10:\"Meachanics\";s:16:\"\0Module\0semester\";s:1:\"1\";s:15:\"\0Module\0credits\";s:1:\"2\";s:18:\"\0Module\0department\";s:3:\"mec\";s:18:\"\0Module\0compulsory\";s:4:\"TRUE\";}');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` varchar(6) NOT NULL,
  `year` varchar(4) NOT NULL,
  `val` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `year`, `val`) VALUES
('CE1022', '2015', 'O:5:\"Paper\":5:{s:9:\"\0Paper\0id\";s:6:\"CE1022\";s:11:\"\0Paper\0year\";s:4:\"2015\";s:15:\"\0Paper\0semester\";N;s:17:\"\0Paper\0department\";N;s:11:\"\0Paper\0link\";N;}'),
('CS1032', '2005', 'O:5:\"Paper\":5:{s:9:\"\0Paper\0id\";s:6:\"CS1032\";s:11:\"\0Paper\0year\";s:4:\"2005\";s:15:\"\0Paper\0semester\";N;s:17:\"\0Paper\0department\";N;s:11:\"\0Paper\0link\";N;}'),
('CS1032', '2011', 'O:5:\"Paper\":5:{s:9:\"\0Paper\0id\";s:6:\"CS1032\";s:11:\"\0Paper\0year\";s:4:\"2011\";s:15:\"\0Paper\0semester\";N;s:17:\"\0Paper\0department\";N;s:11:\"\0Paper\0link\";N;}'),
('CS1032', '2017', 'O:5:\"Paper\":5:{s:9:\"\0Paper\0id\";s:6:\"CS1032\";s:11:\"\0Paper\0year\";s:4:\"2017\";s:15:\"\0Paper\0semester\";N;s:17:\"\0Paper\0department\";N;s:11:\"\0Paper\0link\";N;}'),
('CS2022', '2017', 'O:5:\"Paper\":5:{s:9:\"\0Paper\0id\";s:6:\"CS2022\";s:11:\"\0Paper\0year\";s:4:\"2017\";s:15:\"\0Paper\0semester\";s:1:\"2\";s:17:\"\0Paper\0department\";N;s:11:\"\0Paper\0link\";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `recorrectionrequests`
--

CREATE TABLE `recorrectionrequests` (
  `mid` varchar(6) NOT NULL,
  `sid` varchar(7) NOT NULL,
  `val` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repeatexamrequests`
--

CREATE TABLE `repeatexamrequests` (
  `id` varchar(7) NOT NULL,
  `module` varchar(6) NOT NULL,
  `val` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repeatexamrequests`
--

INSERT INTO `repeatexamrequests` (`id`, `module`, `val`) VALUES
('', 'CS1032', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2016\";s:17:\"\0Student\0semester\";i:2;s:16:\"\0Student\0results\";a:1:{s:6:\"CS1032\";s:3:\"iwe\";}s:16:\"\0Student\0modules\";a:2:{i:1;a:4:{i:0;s:6:\"CE1022\";i:1;s:6:\"CS1032\";i:2;s:6:\"EE1012\";i:3;s:6:\"ME1032\";}i:2;a:1:{i:0;s:6:\"AS2344\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:1;i:2;b:1;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"160000X\";s:10:\"\0User\0name\";s:9:\"Tony Romo\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}'),
('', 'CS2022', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2014\";s:17:\"\0Student\0semester\";i:2;s:16:\"\0Student\0results\";a:1:{s:6:\"CS2022\";s:3:\"iwe\";}s:16:\"\0Student\0modules\";a:1:{i:2;a:1:{i:0;s:6:\"CS2022\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:1;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"140000X\";s:10:\"\0User\0name\";s:9:\"Leo Messi\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"civ\";}');

-- --------------------------------------------------------

--
-- Table structure for table `studentqueries`
--

CREATE TABLE `studentqueries` (
  `id` varchar(7) NOT NULL,
  `time` varchar(127) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `message` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentqueries`
--

INSERT INTO `studentqueries` (`id`, `time`, `year`, `month`, `message`) VALUES
('1111111', '2018 07 09 02:01:26', '2018', '07', 'hi admin'),
('140000X', '2018 07 10 07:28:13', '2018', '07', 'fjfh');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(7) NOT NULL,
  `val` varchar(1023) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `val`, `pwd`) VALUES
('1200000', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2018\";s:17:\"\0Student\0semester\";s:1:\"1\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:0:{}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"1200000\";s:10:\"\0User\0name\";s:6:\"jjhhnm\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('140000X', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2014\";s:17:\"\0Student\0semester\";s:1:\"8\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:0:{}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"140000X\";s:10:\"\0User\0name\";s:9:\"Leo Messi\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('160000X', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2016\";s:17:\"\0Student\0semester\";i:2;s:16:\"\0Student\0results\";a:1:{s:6:\"CS1032\";s:3:\"iwe\";}s:16:\"\0Student\0modules\";a:2:{i:1;a:4:{i:0;s:6:\"CE1022\";i:1;s:6:\"CS1032\";i:2;s:6:\"EE1012\";i:3;s:6:\"ME1032\";}i:2;a:1:{i:0;s:6:\"AS2344\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:1;i:2;b:1;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"160000X\";s:10:\"\0User\0name\";s:9:\"Tony Romo\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('170000X', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2017\";s:17:\"\0Student\0semester\";i:2;s:16:\"\0Student\0results\";a:1:{s:6:\"CS1032\";s:2:\"C+\";}s:16:\"\0Student\0modules\";a:1:{i:1;a:4:{i:0;s:6:\"CE1022\";i:1;s:6:\"CS1032\";i:2;s:6:\"EE1012\";i:3;s:6:\"ME1032\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:1;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"170000X\";s:10:\"\0User\0name\";s:17:\"Cristiano Ronaldo\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('180000X', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2018\";s:17:\"\0Student\0semester\";s:1:\"1\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:0:{}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"180000X\";s:10:\"\0User\0name\";s:12:\"David Bechum\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('4444444', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2018\";s:17:\"\0Student\0semester\";s:1:\"1\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:1:{i:1;a:1:{i:0;s:6:\"CE1022\";}}s:21:\"\0Student\0registration\";a:8:{i:1;b:1;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"4444444\";s:10:\"\0User\0name\";s:3:\"jjj\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:0:\"\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba'),
('5555555', 'O:7:\"Student\":12:{s:14:\"\0Student\0batch\";s:4:\"2018\";s:17:\"\0Student\0semester\";s:1:\"1\";s:16:\"\0Student\0results\";a:0:{}s:16:\"\0Student\0modules\";a:0:{}s:21:\"\0Student\0registration\";a:8:{i:1;b:0;i:2;b:0;i:3;b:0;i:4;b:0;i:5;b:0;i:6;b:0;i:7;b:0;i:8;b:0;}s:8:\"\0User\0id\";s:7:\"5555555\";s:10:\"\0User\0name\";s:4:\"asdf\";s:9:\"\0User\0nic\";s:0:\"\";s:12:\"\0User\0mobile\";s:0:\"\";s:11:\"\0User\0email\";s:9:\"fgg@l.com\";s:13:\"\0User\0faculty\";s:2:\"en\";s:16:\"\0User\0department\";s:3:\"cse\";}', 'b59c67bf196a4758191e42f76670ceba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensedetails`
--
ALTER TABLE `absensedetails`
  ADD PRIMARY KEY (`id`,`module`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convocationrequests`
--
ALTER TABLE `convocationrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`,`year`);

--
-- Indexes for table `recorrectionrequests`
--
ALTER TABLE `recorrectionrequests`
  ADD PRIMARY KEY (`mid`,`sid`);

--
-- Indexes for table `repeatexamrequests`
--
ALTER TABLE `repeatexamrequests`
  ADD PRIMARY KEY (`id`,`module`);

--
-- Indexes for table `studentqueries`
--
ALTER TABLE `studentqueries`
  ADD PRIMARY KEY (`id`,`time`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
