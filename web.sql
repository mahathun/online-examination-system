-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2014 at 04:01 AM
-- Server version: 5.5.37-35.0
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mahathun_msc`
--

-- --------------------------------------------------------

--
-- Table structure for table `answeres`
--

CREATE TABLE IF NOT EXISTS `answeres` (
  `examId` int(11) NOT NULL,
  `qId` int(11) NOT NULL,
  `qType` varchar(15) NOT NULL,
  `registrantEmail` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`examId`,`qId`,`registrantEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answeres`
--

INSERT INTO `answeres` (`examId`, `qId`, `qType`, `registrantEmail`, `answer`) VALUES
(1, 1, 'mcq', 'upuli@gmail.com', 'ans2'),
(1, 2, 'mcq', 'upuli@gmail.com', '2'),
(1, 3, 'mcq', 'upuli@gmail.com', 'Germany'),
(1, 4, 'mcq', 'upuli@gmail.com', 'Angelo Mathews'),
(2, 5, 'mcq', 'upuli@gmail.com', 'Bio effect'),
(2, 6, 'mcq', 'upuli@gmail.com', 'Hera Pheri');

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE IF NOT EXISTS `essay` (
  `essayId` int(11) NOT NULL AUTO_INCREMENT,
  `examId` int(11) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`essayId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `examQuestions`
--

CREATE TABLE IF NOT EXISTS `examQuestions` (
  `examId` int(11) NOT NULL,
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `qType` varchar(15) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `examQuestions`
--

INSERT INTO `examQuestions` (`examId`, `qId`, `qType`) VALUES
(1, 1, 'mcq'),
(1, 2, 'mcq'),
(1, 3, 'mcq'),
(1, 4, 'mcq'),
(2, 5, 'mcq'),
(2, 6, 'mcq');

-- --------------------------------------------------------

--
-- Table structure for table `examRegistration`
--

CREATE TABLE IF NOT EXISTS `examRegistration` (
  `examId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL,
  PRIMARY KEY (`examId`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examRegistration`
--

INSERT INTO `examRegistration` (`examId`, `email`, `approval`) VALUES
(1, 'senake@gmail.com', 0),
(1, 'upuli@gmail.com', 0),
(2, 'senake@gmail.com', 0),
(2, 'upuli@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `examId` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `courseCode` varchar(15) NOT NULL,
  `courseTitle` text NOT NULL,
  `examinationType` set('quiz','mid','end','') NOT NULL,
  `timeAllowed` int(11) NOT NULL,
  `total` int(15) NOT NULL,
  `instructorEmail` text NOT NULL,
  PRIMARY KEY (`examId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`examId`, `year`, `semester`, `subject`, `courseCode`, `courseTitle`, `examinationType`, `timeAllowed`, `total`, `instructorEmail`) VALUES
(1, 1, 'I', 'Mathematics', 'MT101', 'Graph Theory', 'quiz', 60, 30, 'mahathun.online@gmail.com'),
(2, 1, 'I', 'Mathematics', 'MT103', 'Differential Equation', 'mid', 30, 50, 'mahathun.online@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `examId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`examId`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE IF NOT EXISTS `mcq` (
  `mcqId` int(11) NOT NULL AUTO_INCREMENT,
  `examId` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correctAnswer` text NOT NULL,
  `instructorEmail` text NOT NULL,
  PRIMARY KEY (`mcqId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`mcqId`, `examId`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correctAnswer`, `instructorEmail`) VALUES
(1, 1, 'This is the 1st question with multiple ansers', 'ans1', 'ans2', 'ans3', 'ans4-correct', 'ans4-correct', 'mahathun.online@gmail.com'),
(2, 1, '2nd Q', '1', '2', '3', '4', '1', 'mahathun.online@gmail.com'),
(3, 1, 'Who won the FIFA world cup', 'Brazile', 'Germany', 'Argentina', 'Netherland', 'Germany', 'mahathun.online@gmail.com'),
(4, 1, 'Who is the captain of the sri lankan ODI cricket team', 'Angelo Mathews', 'Tissara Perera', 'Lasith Malinga', 'TM Dilshan', 'Angelo Mathews', 'mahathun.online@gmail.com'),
(5, 2, 'Best Game', 'BF3', 'COD4', 'Bio effect', 'AOE', 'COD4', 'mahathun.online@gmail.com'),
(6, 2, 'Favorite Movie', 'Inception', 'Fast & the Furious 7', 'Hera Pheri', 'Ishqia', 'Fast & the Furious 7', 'mahathun.online@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `regNo` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `degreeCode` varchar(15) NOT NULL,
  `year` int(5) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `subjects` set('Physics','Chemistry','Mathematics','Botany','Computer Science','Geology','Molecular Biology','Statistics and Zoolgoy') NOT NULL,
  `coursesRegistered` set('MT100','MT101','MT102','PH100','PH101','PH103') NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regNo`, `dob`, `degreeCode`, `year`, `semester`, `subjects`, `coursesRegistered`, `email`) VALUES
('S/08/403', '1990-03-11', '3', 4, 'II', 'Mathematics', 'MT100,MT102', 'james@gmail.com'),
('s/08/400', '1997-02-11', '1', 1, 'I', 'Physics,Mathematics,Computer Science', 'MT100,MT101,PH100,PH101,PH103', 'senake@gmail.com'),
('S/08/402', '1990-03-11', '1', 1, 'I', 'Physics,Chemistry,Mathematics,Computer Science', 'MT100,MT101,MT102,PH100,PH101,PH103', 'upuli@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `maritalStatus` enum('single','married','widowed','divorced') NOT NULL,
  `NICNo` varchar(10) NOT NULL,
  `title` varchar(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `coursesAssigned` text NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`maritalStatus`, `NICNo`, `title`, `department`, `coursesAssigned`, `email`) VALUES
('married', '', 'SL II', 'Department of Mathematics', 'MT100', 'andrew@gmail.com'),
('single', '', 'Prof.', 'Department of Chemistry', 'MT100', 'chand@gmail.com'),
('single', '', 'Prof.', 'Department of Physics', 'MT100,MT101,MT102', 'mahathun.online@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tempstudents`
--

CREATE TABLE IF NOT EXISTS `tempstudents` (
  `regNo` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `degreeCode` varchar(15) NOT NULL,
  `year` int(5) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `subjects` set('Physics','Chemistry','Mathematics','Botany','Computer Science','Geology','Molecular Biology','Statistics and Zoolgoy') NOT NULL,
  `coursesRegistered` set('MT100','MT101','MT102','PH100','PH101','PH103') NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempteacher`
--

CREATE TABLE IF NOT EXISTS `tempteacher` (
  `maritalStatus` enum('single','married','widowed','divorced') NOT NULL,
  `NICNo` varchar(10) NOT NULL,
  `title` varchar(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `coursesAssigned` text NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempusers`
--

CREATE TABLE IF NOT EXISTS `tempusers` (
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(29) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userType` varchar(15) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(29) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userType` varchar(15) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `mname`, `lname`, `gender`, `password`, `email`, `userType`) VALUES
('admin', '', '', '', 'admin', 'admin', 'Admin'),
('Andrew', '', 'Mathews', 'Male', 'andrew', 'andrew@gmail.com', 'Teacher'),
('Jane', '', 'Chand', 'Female', '1234', 'chand@gmail.com', 'Teacher'),
('James', '', 'Smith', 'Male', 'james', 'james@gmail.com', 'Student'),
('Tharindu', 'Dan', 'Mahavithana', 'Male', 'dan', 'mahathun.online@gmail.com', 'Teacher'),
('Senaka', '', 'Rathnayake', 'Male', 'senake', 'senake@gmail.com', 'Student'),
('Sheryl', '', 'peter', 'Female', 'sheryl', 'upuli@gmail.com', 'Student');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempstudents`
--
ALTER TABLE `tempstudents`
  ADD CONSTRAINT `tempstudents_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tempusers` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempteacher`
--
ALTER TABLE `tempteacher`
  ADD CONSTRAINT `tempteacher_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tempusers` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
