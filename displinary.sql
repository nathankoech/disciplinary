-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2015 at 06:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `displinary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `birth` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `usertype` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `birth`, `gender`, `status`, `usertype`) VALUES
(1, 'admin', 'admindan', 'Admin', 'Admin', 'Admin', '04/01/1992', 'Male', 'Single', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE IF NOT EXISTS `dean` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `birth` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `usertype` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `occupation`, `birth`, `gender`, `status`, `usertype`) VALUES
(1, 'dean', 'deanchuo', 'Dean', 'Dean', 'Dean', 'Dean of SET and Maths', '04/01/1979', 'Male', 'Single', '1'),
(2, 'jajaja', 'jajajajaja', 'Jaduong', 'Lallang', 'Jaduong', 'Dean School of TEA', '04/01/1940', 'male', 'married', ''),
(4, 'deandean', 'deandeandean', 'Dean', 'Dean', 'Dean', 'Dean School of LAW', '04/01/1979', 'male', 'married', '');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE IF NOT EXISTS `incident` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `regno` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `offender` varchar(150) NOT NULL,
  `incidentcategory` varchar(150) NOT NULL,
  `context` varchar(150) NOT NULL,
  `campuslocation` varchar(150) NOT NULL,
  `outsidelocation` varchar(150) NOT NULL,
  `incidenttime` varchar(150) NOT NULL,
  `date` varchar(150) NOT NULL,
  `month` varchar(150) NOT NULL,
  `year` varchar(150) NOT NULL,
  `reportedby` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date_added` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `regno`, `username`, `fname`, `mname`, `lname`, `subject`, `offender`, `incidentcategory`, `context`, `campuslocation`, `outsidelocation`, `incidenttime`, `date`, `month`, `year`, `reportedby`, `message`, `date_added`) VALUES
(5, 'cs/m/0665/05/10', 'student', 'Student', 'Student', 'Student', 'Incident Report', 'Kevin whoop', 'Exam Malpractices', 'Inside Campus', 'LECTURE HALLS', 'RAFIKI', '9.00am', '12', 'DEC', '2014', '', 'He cheated in Exam.', '2014-12-09 12:32:18'),
(6, 'cs/m/0665/05/10', 'student', 'Student', 'Student', 'Student', 'Incident Report', 'Kevin whoop', 'Drinking Alcohol', 'Inside Campus', 'ADMINISTRATION OFFICES', 'RAFIKI', '9.00am', '1', 'JAN', '2010', 'referee', 'He was Drunk.', '2014-12-09 12:37:09'),
(7, 'cs/m/0665/05/10', 'student', 'Student', 'Student', 'Student', 'stole ma laptop', 'Dan Sawyer', 'Stealing/Theft', 'Inside Campus', 'HOSTEL', 'NONE', '11:00pm', '3', 'APR', '2014', 'victim', 'he broke ma room and stole ma laptop which was on the table...', '2014-12-09 21:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `regno` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(150) NOT NULL,
  `date_added` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `regno`, `subject`, `message`, `date_added`) VALUES
(1, 'cs/m/0665/05/10', 'Incident Report and Meeting', 'As the dean of this great institution. I would like to say I do not condone misbehavior in the school. Wafula Evans has sent me a message saying you s', '2014-11-26 15:01:39'),
(2, '1240', 'Incident Report and Meeting', 'Incident Report and meeting on tuesday 11 2014.', '2014-11-27 08:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lecid` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `occupation` varchar(150) NOT NULL,
  `birth` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `usertype` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `lecid`, `username`, `password`, `fname`, `mname`, `lname`, `occupation`, `birth`, `gender`, `status`, `usertype`) VALUES
(1, '1240', 'staff', 'staffchuo', 'Staff', 'Staff', 'Staff', 'Lecturer of English Maths', '04/01/1979', 'Female', 'Single', '1'),
(3, '1241', 'staffstaff', 'staffchuo', 'Staff', 'Staff', 'Staff', 'Lecturer of Computer Science', '04/01/1979', 'male', 'relationship', '1'),
(4, '', 'sawyer', 'sawyerchuo', 'Sawyer', 'Sawyer', 'Sawyer', 'Lecturer in Maths', '07/04/2014', 'male', 'married', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `regno` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `birth` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `accepted` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regno` (`regno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `regno`, `fname`, `mname`, `lname`, `birth`, `gender`, `status`, `accepted`) VALUES
(1, 'student', 'studentdan', 'cs/m/0665/05/10', 'Student', 'Student', 'Student', '04/01/1992', 'Male', 'Single', '1'),
(6, 'studentstudent', 'studentdd', 'cs/m/0222/10/10', 'Student', 'Student', 'Student', '04/01/1992', 'male', 'married', '1'),
(7, 'Jkimani', 'jkimani1', 'cm-m-0867-09-11', 'John', 'Njoroge', 'Kimani', '20/3/1994', 'male', 'single', '1');
