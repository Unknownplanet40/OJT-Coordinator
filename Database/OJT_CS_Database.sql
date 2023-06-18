-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 11:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtcs_database`
--

CREATE DATABASE IF NOT EXISTS `ojtcs_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ojtcs_database;

------------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `ID` int(20) NOT NULL,
  `UID` int(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`ID`, `UID`, `name`, `username`, `password`, `role`, `status`) VALUES
(1, 2021, 'rjc', 'rjc123', 'rjc@123', 'administrator', 0),
(2, 985674321, 'Ryan James Capadocia', 'ryancaps123', '@Ryanjames123', 'User', 0),
(3, 2021100110, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'administrator', 0);

--
-- Triggers `tbl_accounts`
--
DELIMITER $$
CREATE TRIGGER `Update_Status_Trigger` AFTER UPDATE ON `tbl_accounts` FOR EACH ROW BEGIN
  IF NEW.role = 'user' THEN
    UPDATE tbl_trainee SET status = NEW.status WHERE UID = NEW.UID;
  ELSEIF NEW.role = 'administrator' THEN
    UPDATE tbl_admin SET status = NEW.status WHERE UID = NEW.UID;
  ELSEIF NEW.role = 'moderator' THEN
    UPDATE tbl_admin SET status = NEW.status WHERE UID = NEW.UID;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `UID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_uname` varchar(30) NOT NULL,
  `admin_pword` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `department` varchar(20) NOT NULL,
  `imagePath` varchar(50) NOT NULL DEFAULT '../Image/Profile.png',
  `role` varchar(20) DEFAULT 'moderator',
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='For Administrators';

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`UID`, `name`, `admin_uname`, `admin_pword`, `admin_email`, `department`, `imagePath`, `role`, `status`) VALUES
(2021, 'rjc', 'rjc123', 'rjc@123', 'rjc@gmail.com', 'BSIT', '../Image/Profile.png', 'administrator', 0),
(2021100110, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'capadocia@gmail.com', 'BSIT', '../Image/Profile.png', 'administrator', 0);

--
-- Triggers `tbl_admin`
--
DELIMITER $$
CREATE TRIGGER `Insert_admin` AFTER INSERT ON `tbl_admin` FOR EACH ROW BEGIN
    INSERT INTO tbl_accounts (UID, name, username, password, role)
    VALUES (NEW.UID, NEW.name, NEW.admin_uname, NEW.admin_pword, New.role);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluation`
--

CREATE TABLE `tbl_evaluation` (
  `ID` int(10) NOT NULL,
  `UID` int(10) DEFAULT NULL,
  `Q1` int(10) DEFAULT NULL,
  `Q2` int(10) DEFAULT NULL,
  `Q3` int(10) DEFAULT NULL,
  `Q4` int(10) DEFAULT NULL,
  `Q5` int(10) DEFAULT NULL,
  `Q6` int(10) DEFAULT NULL,
  `Q7` int(10) DEFAULT NULL,
  `Q8` int(10) DEFAULT NULL,
  `Q9` int(10) DEFAULT NULL,
  `Q10` int(10) DEFAULT NULL,
  `Q11` int(10) DEFAULT NULL,
  `Q12` int(10) DEFAULT NULL,
  `Q13` int(10) DEFAULT NULL,
  `Q14` int(10) DEFAULT NULL,
  `Q15` int(10) DEFAULT NULL,
  `Q16` int(10) DEFAULT NULL,
  `Q17` int(10) DEFAULT NULL,
  `Q18` int(10) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `date_Taken` date DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `evaluated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='For Trainee Evaluation';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `ID` int(10) NOT NULL,
  `eventID` int(10) DEFAULT NULL,
  `eventTitle` varchar(50) DEFAULT NULL,
  `eventDescription` text DEFAULT NULL,
  `eventImage` text NOT NULL DEFAULT '../Image/eventImage.jpg',
  `eventDate` date DEFAULT NULL,
  `eventStartTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `eventEndTime` timestamp NULL DEFAULT NULL,
  `eventType` varchar(50) DEFAULT NULL,
  `eventCompletion` date DEFAULT NULL,
  `eventEnded` varchar(10) DEFAULT 'false',
  `eventLocation` varchar(128) DEFAULT NULL,
  `eventSlots` int(10) NOT NULL DEFAULT 50,
  `eventOrganizer` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainee`
--

CREATE TABLE `tbl_trainee` (
  `UID` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `trainee_uname` varchar(30) DEFAULT NULL,
  `trainee_pword` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `status` int(5) DEFAULT 0,
  `role` varchar(50) DEFAULT 'User',
  `account_Created` date DEFAULT NULL,
  `profile_Completed` varchar(10) NOT NULL DEFAULT 'False',
  `image` varchar(50) DEFAULT '../Image/Profile.png',
  `gender` varchar(10) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `program` varchar(30) DEFAULT NULL,
  `prog_duration` varchar(20) DEFAULT NULL,
  `fulfilled_time` varchar(20) DEFAULT NULL,
  `completed` varchar(20) DEFAULT NULL,
  `evaluated` varchar(20) DEFAULT 'false',
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `postal_code` int(20) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trainee`
--

INSERT INTO `tbl_trainee` (`UID`, `name`, `trainee_uname`, `trainee_pword`, `email`, `birthdate`, `department`, `status`, `role`, `account_Created`, `profile_Completed`, `image`, `gender`, `course`, `phone`, `program`, `prog_duration`, `fulfilled_time`, `completed`, `evaluated`, `address`, `city`, `postal_code`, `province`) VALUES
(985674321, 'Ryan James Capadocia', 'ryancaps123', '@Ryanjames123', 'ryan@cvsu.edu.ph', NULL, NULL, 0, 'User', '2023-06-17', 'False', '../Image/Profile.png', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'false', NULL, NULL, NULL, NULL),
(1234567891, 'James Matthew Veloria', 'jeymssss0', 'Qwertyuiop123!', 'james123@gmail.com', NULL, NULL, 0, 'user', '2023-06-16', 'False', '../Image/Profile.png', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'false', NULL, NULL, NULL, NULL);

--
-- Triggers `tbl_trainee`
--
DELIMITER $$
CREATE TRIGGER `Insert_Trainee` AFTER INSERT ON `tbl_trainee` FOR EACH ROW BEGIN
    INSERT INTO tbl_Accounts (UID, name, username, password, role)
    VALUES (NEW.UID,  NEW.name, NEW.trainee_uname, NEW.trainee_pword, NEW.role);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_trainee`
--
ALTER TABLE `tbl_trainee`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021100111;

--
-- AUTO_INCREMENT for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_trainee`
--
ALTER TABLE `tbl_trainee`
  MODIFY `UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567892;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
