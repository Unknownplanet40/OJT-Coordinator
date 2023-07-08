-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: April 21, 2021 at 12:15 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `ID` bigint(20) NOT NULL,
  `UID` bigint(10) DEFAULT NULL,
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
(1, 1, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'administrator', 0),
(2, 2, 'James Veloria', 'jamesveloria', '@Veloria123', 'moderator', 0),
(3, 1000000000, 'Lorenzo Asis', 'lorenzoasis', 'Lorenzo.asis2023', 'User', 1),
(4, 2000000000, 'Brandon Logon', 'brandon23', 'Brandon.logon4sale', 'User', 0),
(5, 3000000000, 'Jeric Dayandante', 'jeric20', 'Jeric@4sale', 'User', 1),
(6, 3, 'Administrator Account', 'admin01', '@dmin_Account-1', 'administrator', 0),
(13, 1234567825, 'Joseph Contador', 'josephpogi23', 'Joseph@pogi23', 'User', 0);

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
  `UID` bigint(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_uname` varchar(30) NOT NULL,
  `admin_pword` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `department` varchar(20) NOT NULL,
  `imagePath` varchar(512) DEFAULT '../Image/Profile.gif',
  `date_created` date DEFAULT NULL,
  `last_login` time DEFAULT NULL,
  `role` varchar(20) DEFAULT 'moderator',
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='For Administrators';

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`UID`, `name`, `admin_uname`, `admin_pword`, `admin_email`, `department`, `imagePath`, `date_created`, `last_login`, `role`, `status`) VALUES
(1, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'rj.caps@cvsu.edu.ph', 'BSIT', '../Image/Profile.gif', '2023-06-30', '21:40:58', 'administrator', 0),
(2, 'James Veloria', 'jamesveloria', '@Veloria123', 'james@gmail.com', 'BSIT', '../Image/Profile.gif', '2023-06-30', NULL, 'moderator', 0),
(3, 'Administrator Account', 'admin01', '@dmin_Account-1', 'Example@Domain.com', 'BSCS', '../uploads/admin01_Credentials/admin01_Profile_ljfma.gif', '2023-06-28', '19:49:22', 'administrator', 0);

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
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `ID` int(1) NOT NULL,
  `Title` varchar(128) DEFAULT 'announcement',
  `Description` text NOT NULL,
  `PostedBy` text DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `DateEnd` date NOT NULL,
  `isEnded` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='This if For Announcement For all Trainee';

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`ID`, `Title`, `Description`, `PostedBy`, `DateAdded`, `DateEnd`, `isEnded`) VALUES
(1, 'Announcement', 'For all the Trainees, please be reminded that the deadline for the submission of your requirements is on August 15, 2023. Thank you!', 'Company A', '2023-06-15', '2023-07-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluation`
--

CREATE TABLE `tbl_evaluation` (
  `ID` int(10) NOT NULL,
  `UID` bigint(10) DEFAULT NULL,
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
  `QoW` int(100) DEFAULT NULL,
  `Prod` int(100) DEFAULT NULL,
  `WHTS` int(100) DEFAULT NULL,
  `IWR` int(100) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `date_Taken` datetime DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `evaluated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='For Trainee Evaluation';

--
-- Dumping data for table `tbl_evaluation`
--

INSERT INTO `tbl_evaluation` (`ID`, `UID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `Q14`, `Q15`, `Q16`, `Q17`, `Q18`, `QoW`, `Prod`, `WHTS`, `IWR`, `Total`, `date_Taken`, `feedback`, `evaluated_by`) VALUES
(4, 1000000000, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 60, 60, 60, 60, 68, '2023-07-03 09:12:23', 'syet ang sarap na kaka wet sobra cap daks 10 inch mabuhok sa dulo yummy cum inside me daddy ugh ugh syetttt....... ughhh.........', 'Ryan James Capadocia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `ID` int(10) NOT NULL,
  `eventID` int(10) DEFAULT NULL,
  `eventTitle` varchar(50) DEFAULT NULL,
  `eventDescription` text DEFAULT NULL,
  `eventImage` varchar(512) DEFAULT '../Image/eventImage.jpg',
  `eventDate` date DEFAULT NULL,
  `eventStartTime` time DEFAULT NULL,
  `eventEndTime` time DEFAULT NULL,
  `eventType` varchar(50) DEFAULT NULL,
  `eventCompletion` date DEFAULT NULL,
  `eventEnded` varchar(10) DEFAULT 'false',
  `eventLocation` varchar(128) DEFAULT NULL,
  `eventSlots` int(10) NOT NULL DEFAULT 50,
  `eventOrganizer` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`ID`, `eventID`, `eventTitle`, `eventDescription`, `eventImage`, `eventDate`, `eventStartTime`, `eventEndTime`, `eventType`, `eventCompletion`, `eventEnded`, `eventLocation`, `eventSlots`, `eventOrganizer`) VALUES
(1, 123, 'Annual Charity Run', 'Join us for our annual charity run to raise funds for a local nonprofit organization.', '../Image/eventImage.jpg', '2023-08-15', '21:26:51', '00:27:07', 'Sports/Charity', '2023-07-06', 'false', 'Central Park', 50, 'Community Sports Club');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `ID` int(10) NOT NULL,
  `progID` int(128) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `slots` int(50) NOT NULL DEFAULT 10,
  `department` varchar(512) DEFAULT NULL,
  `hours` int(50) DEFAULT 600,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`ID`, `progID`, `title`, `description`, `start_date`, `end_date`, `slots`, `department`, `hours`, `start_time`, `end_time`, `Duration`, `closed`) VALUES
(1, 12345, 'Introduction to Programming', 'This course introduces the basics of programming and computer science concepts.', '2023-09-01', '2023-12-15', 30, 'BSIT', 600, '09:00:00', '12:00:00', '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainee`
--

CREATE TABLE `tbl_trainee` (
  `UID` bigint(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `trainee_uname` varchar(30) DEFAULT NULL,
  `trainee_pword` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `status` int(5) DEFAULT 0,
  `role` varchar(50) DEFAULT 'User',
  `account_Created` date DEFAULT NULL,
  `profile_Completed` varchar(10) DEFAULT 'false',
  `vaccine_Completed` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(512) DEFAULT '../Image/Profile.png',
  `gender` varchar(10) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `program` varchar(30) DEFAULT NULL,
  `prog_duration` varchar(20) DEFAULT NULL,
  `fulfilled_time` varchar(20) DEFAULT NULL,
  `completed` varchar(20) DEFAULT NULL,
  `evaluated` varchar(20) DEFAULT 'false',
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `postal_code` int(20) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `Join_an_Event` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-false, 1-true',
  `EventID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trainee`
--

INSERT INTO `tbl_trainee` (`UID`, `name`, `trainee_uname`, `trainee_pword`, `email`, `birthdate`, `age`, `department`, `status`, `role`, `account_Created`, `profile_Completed`, `vaccine_Completed`, `image`, `gender`, `course`, `phone`, `program`, `prog_duration`, `fulfilled_time`, `completed`, `evaluated`, `address`, `city`, `postal_code`, `province`, `Join_an_Event`, `EventID`) VALUES
(1000000000, 'Lorenzo Asis', 'lorenzoasis', 'Lorenzo.asis2023', 'Lorenzo@gail.co', '2023-06-30', 23, 'BSCS', 1, 'User', '2023-06-30', 'true', 0, '../uploads/lorenzoasis_Credentials/lorenzoasis_Profile_HJTSZ.gif', 'male', 'BSCS-2B', '09876543219', NULL, NULL, NULL, NULL, 'true', 'Queenstown Molino 3', 'Bacoor', 4102, 'Cavite', 0, NULL),
(1234567825, 'Joseph Contador', 'josephpogi23', 'Joseph@pogi23', 'joseph.contador@cvsu.edu.ph', '2004-02-09', NULL, 'BSIT', 0, 'User', '2023-07-03', 'true', 1, '../uploads/josephpogi23_Credentials/josephpogi23_Profile_Tq3UZ.jpg', 'male', 'BSIT-2B', '09687363887', NULL, NULL, NULL, NULL, 'false', 'DASMA PALIRARAN BACOOR CAVITE', 'DASMA', 404, 'Dasma', 0, NULL),
(2000000000, 'Brandon Logon', 'brandon23', 'Brandon.logon4sale', 'Brandon@gmail.com', '2023-06-29', 21, 'BSIT', 0, 'User', '2023-06-30', 'false', 0, '../Image/Profile.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false', NULL, NULL, NULL, NULL, 0, NULL),
(3000000000, 'Jeric Dayandante', 'jeric20', 'Jeric@4sale', 'jeric@outlook.com', '2023-06-30', 20, 'BSIT', 1, 'User', '2023-06-30', 'true', 1, '../Image/Profile.png', 'male', 'BSIT-2B', '09675453124', NULL, NULL, NULL, NULL, 'false', 'Taga Prima banda sa imus', 'Imus', 4102, 'Cavite', 0, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `ID` int(10) NOT NULL,
  `UID` bigint(255) NOT NULL,
  `vaccineName` varchar(128) DEFAULT NULL,
  `vaccineType` varchar(128) DEFAULT NULL,
  `vaccineDose` varchar(128) DEFAULT NULL,
  `vaccineLoc` varchar(512) NOT NULL,
  `vaccineImage` varchar(512) DEFAULT '../Image/Vaccination_Image.jpg',
  `VaccDoseOne` varchar(128) NOT NULL,
  `VaccDosetwo` varchar(128) NOT NULL,
  `VaccDoseBooster` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='For  Vaccination Details off Trainee';

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`ID`, `UID`, `vaccineName`, `vaccineType`, `vaccineDose`, `vaccineLoc`, `vaccineImage`, `VaccDoseOne`, `VaccDosetwo`, `VaccDoseBooster`) VALUES
(1, 3000000000, 'Johnson', '2', 'one', 'Sa prima diko alam  san banda', '../uploads/jeric20_Credentials/jeric20_Vaccine/jeric20_VaccineCard.jpg', '2023-07-01', '', ''),
(2, 1234567825, 'Johnson', '1', 'booster', 'DASMA PALA PALA OPEN COURT', '../uploads/josephpogi23_Credentials/josephpogi23_Vaccine/josephpogi23_VaccineCard.png', '2019-12-02', '2020-12-03', '2021-02-04');

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
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_trainee`
--
ALTER TABLE `tbl_trainee`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `UID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_trainee`
--
ALTER TABLE `tbl_trainee`
  MODIFY `UID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000000001;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
