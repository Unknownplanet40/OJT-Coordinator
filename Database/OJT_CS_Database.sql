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
(1, 1, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'administrator', 1),
(2, 2, 'James Veloria', 'jamesveloria', '@Veloria123', 'moderator', 0),
(3, 1000000000, 'Lorenzo Asis', 'lorenzoasis', 'Lorenzo.asis2023', 'User', 1),
(4, 2000000000, 'Brandon Logon', 'brandon23', 'Brandon.logon4sale', 'User', 0),
(5, 3000000000, 'Jeric Dayandante', 'jeric20', 'Jeric@4sale', 'User', 0),
(13, 1234567825, 'Joseph Contador', 'josephpogi23', 'Joseph@pogi23', 'User', 0),
(14, 10, 'Administers According', 'adminaccs', '@Admin2023', 'administrator', 0);

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
(1, 'Ryan James Capadocia', 'ryanjames', '@Capadocia123', 'rj.caps@cvsu.edu.ph', 'BSIT', '../uploads/ryanjames_Credentials/Profile/dSKde_ryanjames_Profile.gif', '2023-06-30', '08:52:34', 'administrator', 1),
(2, 'James Veloria', 'jamesveloria', '@Veloria123', 'james@gmail.com', 'BSIT', '../uploads/jamesveloria_Credentials/Profile/fJUg1_jamesveloria_Profile.gif', '2023-06-30', '01:43:14', 'moderator', 0),
(10, 'Administers According', 'adminaccs', '@Admin2023', 'Admin+Accordingly@gmail.com', 'BSIT', '../uploads/adminaccs_Credentials/Profile/7sXsF_adminaccs_Profile.gif', '2023-07-08', '22:15:07', 'administrator', 0);

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
(1, 'Important Meeting Announcement', 'There will be an important meeting for all employees to discuss the upcoming project.', 'Ryan James Capadocia', '2023-07-15', '2023-07-22', 0);

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
(4, 1000000000, 3, 4, 5, 4, 4, 4, 5, 3, 4, 4, 5, 4, 5, 4, 4, 5, 4, 5, 80, 85, 83, 90, 88, '2023-07-12 04:37:46', 'Congratulations on completing the OJT program! Your dedication and hard work throughout the internship were truly commendable. It was evident that you approached each task with enthusiasm and a strong desire to learn. Your ability to adapt to new challenges and proactively seek solutions was impressive. Moreover, your attention to detail and the quality of your work consistently exceeded expectations.', 'Ryan James Capadocia');

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
(1, 123, 'Annual Charity Run', 'Join us for our annual charity run to raise funds for a local nonprofit organization.', '../Image/eventImage.jpg', '2023-08-15', '21:26:51', '00:27:07', 'Sports/Charity', '2023-07-15', 'true', 'Central Park', 49, 'Community Sports Club'),
(4, 124, 'Science Fair', 'he Science Fair is an annual event where students showcase their scientific knowledge and present their innovative projects to the school community. It promotes scientific inquiry and encourages creativity in the field of science. No outsider allowed inside school.', '../uploads/Science Fair_Event/Eventimg/jngiu_Eventimg(Science Fair).jpg', '2023-07-12', '09:00:00', '12:00:00', 'other', '2023-07-30', 'false', 'School Gymnasium', 49, 'Science Department'),
(5, 125, 'Cultural Diversity Day', 'Cultural Diversity Day celebrates the rich and diverse cultures within our school community. It includes various activities, performances, and displays representing different countries and traditions. Students and staff come together to foster inclusivity and appreciation for cultural differences.', '../uploads/Cultural Diversity Day_Event/Eventimg/dmpuk_Eventimg(Cultural Diversity Day).jpg', '2023-07-13', '10:00:00', '14:00:00', 'other', '2023-07-20', 'false', 'School Courtyard', 45, 'School Courtyard');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `ID` int(10) NOT NULL,
  `progID` bigint(255) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  `progimage` varchar(512) NOT NULL DEFAULT '''../Image/Programoffer.jpg''',
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progloc` text DEFAULT NULL,
  `department` varchar(512) DEFAULT NULL,
  `hours` int(50) DEFAULT 600,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL,
  `Supervisor` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`ID`, `progID`, `title`, `progimage`, `description`, `start_date`, `end_date`, `progloc`, `department`, `hours`, `start_time`, `end_time`, `Duration`, `Supervisor`) VALUES
(2, 2000000000, 'Name', '\'../Image/Programoffer.jpg\'', 'This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API. This is a long paragraph written to show how the line-height of an element is affected by our', '2023-07-11', '2023-10-31', 'Sa Cabite  Malapit sa Molino', NULL, 640, '09:00:00', '17:00:00', '16', 'CapsLock'),
(3, 3000000000, 'Web Development Internship', '\'../Image/Programoffer.jpg\'', 'This OJT program provides students with hands-on experience in web development, equipping them with practical skills and knowledge in HTML, CSS, and JavaScript. Participants will work on real-world projects and collaborate with experienced developers to create responsive and dynamic websites.', '2023-07-01', '2023-08-26', 'School of Computer Science, XYZ University', NULL, 320, '09:00:00', '13:00:00', '8', 'John Smith (Senior Web Developer)'),
(4, 1000000000, 'Marketing Internship', '\'../Image/Programoffer.jpg\'', 'The Marketing Internship provides students with practical experience in various aspects of marketing, including market research, social media management, and campaign development. Participants will work closely with the marketing team and gain valuable insights into the field while contributing to real-world projects.', '2023-06-01', '2023-06-29', 'School of Business, XYZ University', NULL, 160, '09:00:00', '12:00:00', '4', 'Jane Johnson');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resource`
--

CREATE TABLE `tbl_resource` (
  `ID` int(100) NOT NULL,
  `UID` bigint(255) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `placement` text DEFAULT NULL,
  `Birth` text DEFAULT NULL,
  `MoA` text DEFAULT NULL,
  `Waiver` text DEFAULT NULL,
  `MedCert` text DEFAULT NULL,
  `GMCert` text DEFAULT NULL,
  `RegForm` text DEFAULT NULL,
  `consent` text DEFAULT NULL,
  `Evaform` text DEFAULT NULL,
  `NarraForm` text DEFAULT NULL,
  `TimeCard` text DEFAULT NULL,
  `COC` text DEFAULT NULL,
  `Doc1_date` date DEFAULT NULL,
  `Doc2_date` date DEFAULT NULL,
  `Doc3_date` date DEFAULT NULL,
  `Doc4_date` date DEFAULT NULL,
  `Doc5_date` date DEFAULT NULL,
  `Doc6_date` date DEFAULT NULL,
  `Doc7_date` date DEFAULT NULL,
  `Doc8_date` date DEFAULT NULL,
  `Doc9_date` date DEFAULT NULL,
  `Doc10_date` date DEFAULT NULL,
  `Doc11_date` date DEFAULT NULL,
  `Doc12_date` date DEFAULT NULL,
  `Doc13_date` date DEFAULT NULL,
  `Doc1_stat` int(3) NOT NULL DEFAULT 0,
  `Doc2_stat` int(3) NOT NULL DEFAULT 0,
  `Doc3_stat` int(3) NOT NULL DEFAULT 0,
  `Doc4_stat` int(3) NOT NULL DEFAULT 0,
  `Doc5_stat` int(3) NOT NULL DEFAULT 0,
  `Doc6_stat` int(3) DEFAULT 0,
  `Doc7_stat` int(3) NOT NULL DEFAULT 0,
  `Doc8_stat` int(3) NOT NULL DEFAULT 0,
  `Doc9_stat` int(3) NOT NULL DEFAULT 0,
  `Doc10_stat` int(3) NOT NULL DEFAULT 0,
  `Doc11_stat` int(3) NOT NULL DEFAULT 0,
  `Doc12_stat` int(3) NOT NULL DEFAULT 0,
  `Doc13_stat` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='for Trainee Douments';

--
-- Dumping data for table `tbl_resource`
--

INSERT INTO `tbl_resource` (`ID`, `UID`, `resume`, `placement`, `Birth`, `MoA`, `Waiver`, `MedCert`, `GMCert`, `RegForm`, `consent`, `Evaform`, `NarraForm`, `TimeCard`, `COC`, `Doc1_date`, `Doc2_date`, `Doc3_date`, `Doc4_date`, `Doc5_date`, `Doc6_date`, `Doc7_date`, `Doc8_date`, `Doc9_date`, `Doc10_date`, `Doc11_date`, `Doc12_date`, `Doc13_date`, `Doc1_stat`, `Doc2_stat`, `Doc3_stat`, `Doc4_stat`, `Doc5_stat`, `Doc6_stat`, `Doc7_stat`, `Doc8_stat`, `Doc9_stat`, `Doc10_stat`, `Doc11_stat`, `Doc12_stat`, `Doc13_stat`) VALUES
(1, 2000000000, '../uploads/brandon23_Credentials/Resume/zCcJj_brandon23_Resume.jpg', '../uploads/brandon23_Credentials/PlacementForm/kL3Zs_brandon23_PlacementForm.jpg', '../uploads/brandon23_Credentials/BirthCertificate/EGd6x_brandon23_BirthCertificate.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-11', '2023-07-11', '2023-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1000000000, '../uploads/lorenzoasis_Credentials/Resume/iTgCg_lorenzoasis_Resume.png', '../uploads/lorenzoasis_Credentials/PlacementForm/4CNSJ_lorenzoasis_PlacementForm.pdf', '../uploads/lorenzoasis_Credentials/BirthCertificate/qkBby_lorenzoasis_BirthCertificate.jpg', '../uploads/lorenzoasis_Credentials/MemorandumOfAgreement/yXcDh_lorenzoasis_MemorandumOfAgreement.jpg', '../uploads/lorenzoasis_Credentials/Waiver/0YWty_lorenzoasis_Waiver.png', '../uploads/lorenzoasis_Credentials/MedicalCertificate/3XJ6I_lorenzoasis_MedicalCertificate.jpg', '../uploads/lorenzoasis_Credentials/GoodMoralCertificate/gFyoN_lorenzoasis_GoodMoralCertificate.png', '../uploads/lorenzoasis_Credentials/RegistrationForm/CXKwt_lorenzoasis_RegistrationForm.jpg', NULL, '../uploads/lorenzoasis_Credentials/EvaluationForm/V0Qjc_lorenzoasis_EvaluationForm.pdf', '../uploads/lorenzoasis_Credentials/NarrativeReport/46I7x_lorenzoasis_NarrativeReport.pdf', '../uploads/lorenzoasis_Credentials/DailyTimeRecord/x26dI_lorenzoasis_DailyTimeRecord.pdf', '../uploads/lorenzoasis_Credentials/CertificateOfCompletion/cXuj5_lorenzoasis_CertificateOfCompletion.pdf', '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', NULL, '2023-07-12', '2023-07-12', '2023-07-12', '2023-07-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3000000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1234567825, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `EventID` int(11) DEFAULT NULL,
  `Program_stat` int(3) DEFAULT 0 COMMENT '0 - pending. 1- Approved, 2 - Denied',
  `Resource_Completed` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trainee`
--

INSERT INTO `tbl_trainee` (`UID`, `name`, `trainee_uname`, `trainee_pword`, `email`, `birthdate`, `age`, `department`, `status`, `role`, `account_Created`, `profile_Completed`, `vaccine_Completed`, `image`, `gender`, `course`, `phone`, `program`, `prog_duration`, `fulfilled_time`, `completed`, `evaluated`, `address`, `city`, `postal_code`, `province`, `Join_an_Event`, `EventID`, `Program_stat`, `Resource_Completed`) VALUES
(1000000000, 'Lorenzo Asis', 'lorenzoasis', 'Lorenzo.asis2023', 'Lorenzo.asis2023', '1970-01-01', 23, 'BSCS', 1, 'User', '2023-06-30', 'true', 0, '../uploads/lorenzoasis_Credentials/lorenzoasis_Profile_HJTSZ.gif', '', 'BSCS-2B', '09876543219', 'Marketing Internship', '4', '160', 'true', 'true', 'Queenstown Molino 3', 'Bacoor', 4102, 'Cavite', 0, NULL, 0, 1),
(1234567825, 'Joseph Contador', 'josephpogi23', 'Joseph@pogi23', 'joseph.contador@cvsu.edu.ph', '2004-02-09', 23, 'BSIT', 0, 'User', '2023-07-03', 'true', 1, '../uploads/josephpogi23_Credentials/josephpogi23_Profile_Tq3UZ.jpg', 'male', 'BSIT-2B', '09687363887', NULL, NULL, NULL, NULL, 'false', 'DASMA PALIRARAN BACOOR CAVITE', 'DASMA', 404, 'Dasma', 0, NULL, 0, 0),
(2000000000, 'Brandon Logon', 'brandon23', 'Brandon.logon4sale', 'Brandon@gmail.com', '2023-07-06', 21, 'BSCS', 0, 'User', '2023-06-30', 'true', 0, '../Image/Profile.png', 'male', 'BSCS-2B', '09897867564', 'Name', '16', '640', NULL, 'false', 'Ohio', 'Columbus', 4300, 'Ohio', 0, NULL, 0, 0),
(3000000000, 'Jeric Dayandante', 'jeric20', 'Jeric@4sale', 'jeric@outlook.com', '2023-06-30', 20, 'BSIT', 0, 'User', '2023-06-30', 'true', 1, '../Image/Profile.png', 'male', 'BSIT-2B', '09675453124', 'Web Development Internship', '8', '320', NULL, 'false', 'Taga Prima banda sa imus', 'Imus', 4102, 'Cavite', 1, 124, 0, 0);

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
-- Indexes for table `tbl_resource`
--
ALTER TABLE `tbl_resource`
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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `UID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_resource`
--
ALTER TABLE `tbl_resource`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
