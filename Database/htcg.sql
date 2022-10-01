-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2022 at 01:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htcg`
--

-- --------------------------------------------------------

--
-- Table structure for table `Counselor`
--

CREATE TABLE `Counselor` (
  `counselorID` int(11) NOT NULL,
  `resourceID` int(11) NOT NULL,
  `oppID` int(11) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `years_of_exp` tinyint(4) DEFAULT NULL,
  `area_of_expertise` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Counselor`
--

INSERT INTO `Counselor` (`counselorID`, `resourceID`, `oppID`, `qualification`, `years_of_exp`, `area_of_expertise`) VALUES
(16, 1, 1, 'PhD. Philosophy', 3, 'Psychotherapist'),
(16, 2, 2, 'PhD. Philosophy', 3, 'Psychotherapist'),
(17, 3, 3, 'MA. Economics', 2, 'Econometrics'),
(17, 4, 4, 'MA. Geography', 4, 'Environmental Specialist'),
(18, 5, 5, 'BS. Mathematics', 5, 'Statistical Analysis'),
(18, 6, 6, 'BS. Computer Science', 3, 'Software Dev\'t'),
(19, 7, 7, 'PhD. Ecology', 5, 'Behavioral Science'),
(19, 8, 8, 'MA. Botany', 1, 'Agricultural Engineer'),
(20, 1, 4, 'BS. Chemistry', 5, 'Mine Extraction'),
(20, 2, 5, 'BS. Taxonomy', 10, 'Animal husbandry');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `courseID` varchar(20) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `coursecredit` tinyint(4) DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`courseID`, `coursename`, `coursecredit`, `teacherID`) VALUES
('BIO210', 'Biology', 1, 11),
('CHEM222', 'Chemistry', 1, 15),
('CPS020', 'Comp. Science', 1, 13),
('ENG101', 'English', 1, 12),
('MATH333', 'Mathematics', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Opportunity`
--

CREATE TABLE `Opportunity` (
  `oppID` int(11) NOT NULL,
  `opportunityname` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `deadlineOfApplication` date DEFAULT NULL,
  `programStartDate` date DEFAULT NULL,
  `durationOfProgram_months` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `Opportunity`
--

INSERT INTO `Opportunity` (`oppID`, `opportunityname`, `category`, `deadlineOfApplication`, `programStartDate`, `durationOfProgram_months`) VALUES
(1, 'MasterCard Ashesi', 'Scholarship', '2021-08-21', '2021-01-09', 10),
(2, 'MasterCard CapeTown', 'Scholarship', '2021-08-21', '2021-01-09', 36),
(3, 'MasterCard Makerere', 'Scholarship', '2021-08-21', '2021-01-09', 36),
(4, 'Bowney', 'Internship', '2021-05-20', '2021-06-01', 2),
(5, 'Databank Group', 'Internship', '2021-05-20', '2021-06-01', 2),
(6, 'Citadel', 'Job Shadowing', '2021-04-05', '2021-09-01', 1),
(7, 'University Of Ghana', 'University Application', '2021-05-10', '2021-09-01', 36),
(8, 'MTN Ghana', 'Job offer', '2021-03-30', '2021-01-06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Parent`
--

CREATE TABLE `Parent` (
  `parentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `occupation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Parent`
--

INSERT INTO `Parent` (`parentID`, `studentID`, `qualification`, `occupation`) VALUES
(21, 1, 'High School Diploma', 'Trader'),
(22, 2, 'BS. History', 'Teacher'),
(23, 3, 'PhD. Geography', 'Lecturer'),
(24, 4, 'Primary School Diploma', 'Tailor'),
(25, 5, 'Medicine', 'Medical Practitioner');

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `personID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'student',
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT '1970-01-01',
  `gender` char(1) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `primary_language` varchar(50) DEFAULT 'English'
) ;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`personID`, `type`, `fname`, `lname`, `dob`, `gender`, `address`, `tel`, `primary_language`) VALUES
(1, 'student', 'Ngoh', 'Amah', '1999-04-11', 'M', 'Obuasi', '0559791693', 'English'),
(2, 'student', 'Awura', 'Afram', '2001-04-21', 'F', 'Takoradi', '0550091673', 'English'),
(3, 'student', 'Lois', 'Otchi', '2001-03-01', 'F', 'Berekuso', '0249791993', 'English'),
(4, 'student', 'Ebenezer', 'Amoah', '1991-11-11', 'M', 'Tarkwa', '0550000930', 'English'),
(5, 'student', 'Prince', 'Yeboah', '1998-01-12', 'M', 'Tema', '0244591693', 'English'),
(6, 'principal', 'Sylvia', 'Fombe', '1985-10-02', 'F', 'Dansoman', '0551191693', 'English'),
(7, 'principal', 'Precious', 'Njeck', '1980-11-08', 'F', 'Berekuso', '0550191693', 'English'),
(8, 'principal', 'Lekane', 'Styve', '1991-02-11', 'M', 'Ashongman', '0558891693', 'English'),
(9, 'principal', 'Junior', 'Abiringo', '1982-10-11', 'M', 'Ashongma', '0552291693', 'English'),
(10, 'principal', 'Nkeng', 'Stephen', '1988-05-20', 'M', 'Tamale', '0229791693', 'English'),
(11, 'teacher', 'Elvis', 'Dankrah', '1991-09-11', 'M', 'Ashongman', '02555791693', 'English'),
(12, 'teacher', 'Mensah', 'Acquah', '1992-02-12', 'M', 'Dansoman', '0222291693', 'English'),
(13, 'teacher', 'Emmanuel', 'Otchi', '1993-06-06', 'M', 'Berekuso', '0233391693', 'English'),
(14, 'teacher', 'Bless', 'Tibot', '1990-04-06', 'M', 'Tamale', '0511111693', 'English'),
(15, 'teacher', 'Manuella', 'Langi', '1989-04-11', 'F', 'Takoradi', '0535351693', 'English'),
(16, 'counselor', 'Ellis', 'Woodes', '1980-05-05', 'M', 'Berekuso', '0232391693', 'English'),
(17, 'counselor', 'Miriam', 'Duke', '1985-03-03', 'F', 'Accra', '0292991693', 'English'),
(18, 'counselor', 'Ayomaoh', 'Biden', '1987-12-12', 'M', 'Temale', '0554191693', 'English'),
(19, 'counselor', 'Gertrude', 'Perls', '1990-04-11', 'F', 'Kumasi', '0249991693', 'English'),
(20, 'counselor', 'Graham', 'Woodes', '1989-08-30', 'M', 'Kumasi', '0500091693', 'English'),
(21, 'parent', 'Nadine', 'Tim', '1980-09-30', 'F', 'Obuasi', '0566691693', 'Twi'),
(22, 'parent', 'Omoeibi', 'Bagsaw', '1989-07-30', 'M', 'Takoradi', '0577771693', 'Ga'),
(23, 'parent', 'Goodness', 'Amankwa', '1990-02-27', 'M', 'Berekuso', '0586131693', 'Twi'),
(24, 'parent', 'Lemfon', 'Tyrone', '1991-08-30', 'M', 'Tarkwa', '0500090213', 'English'),
(25, 'parent', 'Peter', 'Mensah', '1992-08-30', 'M', 'Tema', '0500099876', 'English'),
(26, 'student', 'Ngoh', 'Amah', '1999-04-11', 'M', 'Obuasi', '0559791693', 'English'),
(27, 'student', 'Awura', 'Afram', '2001-04-21', 'F', 'Takoradi', '0550091673', 'English'),
(28, 'student', 'Lois', 'Otchi', '2001-03-01', 'F', 'Berekuso', '0249791993', 'English'),
(29, 'student', 'Ebenezer', 'Amoah', '1991-11-11', 'M', 'Tarkwa', '0550000930', 'English'),
(30, 'student', 'Prince', 'Yeboah', '1998-01-12', 'M', 'Tema', '0244591693', 'English'),
(31, 'student', 'Sylvia', 'Fombe', '1985-10-02', 'F', 'Dansoman', '0551191693', 'English'),
(32, 'student', 'Precious', 'Njeck', '1980-11-08', 'F', 'Berekuso', '0550191693', 'English'),
(33, 'student', 'Lekane', 'Styve', '1991-02-11', 'M', 'Ashongman', '0558891693', 'English'),
(34, 'student', 'Junior', 'Abiringo', '1982-10-11', 'M', 'Ashongma', '0552291693', 'English'),
(35, 'student', 'Nkeng', 'Stephen', '1988-05-20', 'M', 'Tamale', '0229791693', 'English'),
(36, 'student', 'Elvis', 'Dankrah', '1991-09-11', 'M', 'Ashongman', '02555791693', 'English'),
(37, 'student', 'Mensah', 'Acquah', '1992-02-12', 'M', 'Dansoman', '0222291693', 'English'),
(38, 'student', 'Emmanuel', 'Otchi', '1993-06-06', 'M', 'Berekuso', '0233391693', 'English'),
(39, 'student', 'Bless', 'Tibot', '1990-04-06', 'M', 'Tamale', '0511111693', 'English'),
(40, 'student', 'Manuella', 'Langi', '1989-04-11', 'F', 'Takoradi', '0535351693', 'English'),
(41, 'student', 'Ellis', 'Woodes', '1980-05-05', 'M', 'Berekuso', '0232391693', 'English'),
(42, 'student', 'Miriam', 'Duke', '1985-03-03', 'F', 'Accra', '0292991693', 'English'),
(43, 'student', 'Ayomaoh', 'Biden', '1987-12-12', 'M', 'Temale', '0554191693', 'English'),
(44, 'student', 'Gertrude', 'Perls', '1990-04-11', 'F', 'Kumasi', '0249991693', 'English'),
(45, 'student', 'Graham', 'Woodes', '1989-08-30', 'M', 'Kumasi', '0500091693', 'English'),
(46, 'student', 'Nadine', 'Tim', '1980-09-30', 'F', 'Obuasi', '0566691693', 'Twi'),
(47, 'student', 'Omoeibi', 'Bagsaw', '1989-07-30', 'M', 'Takoradi', '0577771693', 'Ga'),
(48, 'student', 'Goodness', 'Amankwa', '1990-02-27', 'M', 'Berekuso', '0586131693', 'Twi'),
(49, 'student', 'Lemfon', 'Tyrone', '1991-08-30', 'M', 'Tarkwa', '0500090213', 'English'),
(50, 'student', 'Peter', 'Mensah', '1992-08-30', 'M', 'Tema', '0500099876', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `Principal`
--

CREATE TABLE `Principal` (
  `principalID` int(11) NOT NULL,
  `schoolID` varchar(20) NOT NULL,
  `schoolname` varchar(250) NOT NULL,
  `start_date` date DEFAULT '2021-01-01',
  `years_of_exp` tinyint(4) DEFAULT NULL,
  `qualification` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Principal`
--

INSERT INTO `Principal` (`principalID`, `schoolID`, `schoolname`, `start_date`, `years_of_exp`, `qualification`) VALUES
(6, 'ACC001', 'Gold Avenue School', '2010-01-01', 6, 'BSc. Computer Science'),
(7, 'KUM022', 'St. Andrews Senior High School', '2011-02-05', 5, 'BSc. Economics'),
(8, 'OBU044', 'University Practice High School', '2015-08-10', 10, 'PhD. Finance'),
(9, 'TEMA100', 'St. Mary\' Boys Senior High School', '2019-09-20', 11, 'PhD. Philosophy'),
(10, 'TAM102', 'Varcity Learning Centre', '2008-10-01', 14, 'MAs. Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `Recommender`
--

CREATE TABLE `Recommender` (
  `recommenderID` int(11) NOT NULL,
  `area_of_expertise` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Recommender`
--

INSERT INTO `Recommender` (`recommenderID`, `area_of_expertise`) VALUES
(11, 'Plant Engineering'),
(12, 'Grant Writing'),
(13, 'Robotics'),
(14, 'Space analyst'),
(15, 'Chemical Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentID` int(11) NOT NULL,
  `principalID` int(11) DEFAULT NULL,
  `counselorID` int(11) DEFAULT NULL,
  `major` varchar(50) NOT NULL,
  `disability` enum('yes','no') DEFAULT NULL
) ;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentID`, `principalID`, `counselorID`, `major`, `disability`) VALUES
(1, 6, 16, 'Science', 'no'),
(2, 7, 17, 'Science', 'no'),
(3, 8, 18, 'Arts', 'no'),
(4, 9, 19, 'Science', 'no'),
(5, 10, 20, 'Science', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `StudentCourse`
--

CREATE TABLE `StudentCourse` (
  `studentID` int(11) DEFAULT NULL,
  `courseID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentCourse`
--

INSERT INTO `StudentCourse` (`studentID`, `courseID`) VALUES
(2, 'MATH333'),
(3, 'ENG101'),
(4, 'BIO210'),
(5, 'CHEM222'),
(2, 'CHEM222'),
(1, 'MATH333'),
(1, 'ENG101'),
(1, 'BIO210'),
(1, 'CHEM222');

-- --------------------------------------------------------

--
-- Table structure for table `StudentOpp`
--

CREATE TABLE `StudentOpp` (
  `studentID` int(11) DEFAULT NULL,
  `oppID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentOpp`
--

INSERT INTO `StudentOpp` (`studentID`, `oppID`) VALUES
(1, 8),
(2, 2),
(3, 2),
(4, 4),
(5, 5),
(5, 3),
(2, 5),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `StudentRecommender`
--

CREATE TABLE `StudentRecommender` (
  `studentID` int(11) DEFAULT NULL,
  `recommenderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentRecommender`
--

INSERT INTO `StudentRecommender` (`studentID`, `recommenderID`) VALUES
(4, 11),
(3, 12),
(1, 13),
(2, 14),
(5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `StudentResources`
--

CREATE TABLE `StudentResources` (
  `studentID` int(11) NOT NULL,
  `resourceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentResources`
--

INSERT INTO `StudentResources` (`studentID`, `resourceID`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `StudentVoluntaryService`
--

CREATE TABLE `StudentVoluntaryService` (
  `studentID` int(11) DEFAULT NULL,
  `serviceID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentVoluntaryService`
--

INSERT INTO `StudentVoluntaryService` (`studentID`, `serviceID`) VALUES
(2, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 5),
(1, 4),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `teacherID` int(11) NOT NULL,
  `principalID` int(11) DEFAULT NULL,
  `years_of_exp` tinyint(4) DEFAULT NULL,
  `qualification` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`teacherID`, `principalID`, `years_of_exp`, `qualification`) VALUES
(11, 6, 2, 'BS. Biology'),
(12, 7, 3, 'BA. English'),
(13, 8, 10, 'BS. Computer Science'),
(14, 9, 8, 'BS. Mathematics'),
(15, 10, 7, 'BS. Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `Userlogins`
--

CREATE TABLE `Userlogins` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Userlogins`
--

INSERT INTO `Userlogins` (`userid`, `username`, `psw`) VALUES
(1, 'rodney123', 'Management2014'),
(16, 'elliswoodes', 'AwesomeGod123#');

-- --------------------------------------------------------

--
-- Table structure for table `VolunteeringService`
--

CREATE TABLE `VolunteeringService` (
  `serviceID` int(11) NOT NULL,
  `nameOfService` varchar(50) DEFAULT NULL,
  `_organization` varchar(50) NOT NULL,
  `startDate` date DEFAULT NULL,
  `duration_month` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VolunteeringService`
--

INSERT INTO `VolunteeringService` (`serviceID`, `nameOfService`, `_organization`, `startDate`, `duration_month`) VALUES
(1, 'Data Entry Personnel', 'SAYeTech', '2021-06-01', 1),
(2, 'Quality Control Personnel', 'AgricNation', '2021-07-06', 2),
(3, 'Web developer', 'MobiLine', '2021-06-01', 1),
(4, 'Maintenance Personnel', 'TrackPath', '2022-01-01', 11),
(5, 'Assistant Coordinator', 'KeepClean', '2021-11-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_Resource`
--

CREATE TABLE `_Resource` (
  `resourceID` int(11) NOT NULL,
  `resourcename` varchar(50) DEFAULT NULL,
  `date_acquired` date DEFAULT '2021-01-01',
  `category` enum('Book','Videofile','Audiofile','Software','Hardware') DEFAULT NULL,
  `purpose` enum('Further_Learning','Personal_devt','Health','Politics','Economy','SocialStudies','School_Work') DEFAULT NULL
) ;

--
-- Dumping data for table `_Resource`
--

INSERT INTO `_Resource` (`resourceID`, `resourcename`, `date_acquired`, `category`, `purpose`) VALUES
(1, 'Things Fall Apart', '2020-10-30', 'Book', 'Personal_devt'),
(2, 'Equality and Efficiency: The big tradeoff', '2019-09-21', 'Book', 'SocialStudies'),
(3, 'Laser Printer', '2017-02-22', 'Hardware', 'School_Work'),
(4, 'MatLab', '2016-01-12', 'Software', 'School_Work'),
(5, 'First_Aid_Box', '2014-03-13', 'Hardware', 'Health'),
(6, 'The Wealth of Nations', '2015-11-21', 'Book', 'Politics'),
(7, 'Dark Matter', '2005-10-18', 'Videofile', 'Further_Learning'),
(8, 'New York Times Magazine', '2021-01-18', 'Audiofile', 'Politics'),
(10, 'lsallsl', '2021-12-22', 'Audiofile', 'Politics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Counselor`
--
ALTER TABLE `Counselor`
  ADD PRIMARY KEY (`counselorID`,`resourceID`,`oppID`),
  ADD KEY `resourceID` (`resourceID`),
  ADD KEY `oppID` (`oppID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `Opportunity`
--
ALTER TABLE `Opportunity`
  ADD PRIMARY KEY (`oppID`),
  ADD KEY `opportunity_name_category_indx` (`opportunityname`,`category`);

--
-- Indexes for table `Parent`
--
ALTER TABLE `Parent`
  ADD PRIMARY KEY (`parentID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`personID`),
  ADD KEY `first_name_lastname_indx` (`fname`,`lname`);

--
-- Indexes for table `Principal`
--
ALTER TABLE `Principal`
  ADD PRIMARY KEY (`principalID`);

--
-- Indexes for table `Recommender`
--
ALTER TABLE `Recommender`
  ADD PRIMARY KEY (`recommenderID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `principalID` (`principalID`),
  ADD KEY `counselorID` (`counselorID`);

--
-- Indexes for table `StudentCourse`
--
ALTER TABLE `StudentCourse`
  ADD KEY `StudentCourse_ibfk_1` (`studentID`),
  ADD KEY `StudentCourse_ibfk_2` (`courseID`);

--
-- Indexes for table `StudentOpp`
--
ALTER TABLE `StudentOpp`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `oppID` (`oppID`);

--
-- Indexes for table `StudentRecommender`
--
ALTER TABLE `StudentRecommender`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `recommenderID` (`recommenderID`);

--
-- Indexes for table `StudentResources`
--
ALTER TABLE `StudentResources`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `resourceID` (`resourceID`);

--
-- Indexes for table `StudentVoluntaryService`
--
ALTER TABLE `StudentVoluntaryService`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `principalID` (`principalID`);

--
-- Indexes for table `Userlogins`
--
ALTER TABLE `Userlogins`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `VolunteeringService`
--
ALTER TABLE `VolunteeringService`
  ADD PRIMARY KEY (`serviceID`),
  ADD UNIQUE KEY `volunteering_organization_indx` (`_organization`);

--
-- Indexes for table `_Resource`
--
ALTER TABLE `_Resource`
  ADD PRIMARY KEY (`resourceID`),
  ADD UNIQUE KEY `resources_indx` (`resourcename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Opportunity`
--
ALTER TABLE `Opportunity`
  MODIFY `oppID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `VolunteeringService`
--
ALTER TABLE `VolunteeringService`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `_Resource`
--
ALTER TABLE `_Resource`
  MODIFY `resourceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Counselor`
--
ALTER TABLE `Counselor`
  ADD CONSTRAINT `Counselor_ibfk_1` FOREIGN KEY (`counselorID`) REFERENCES `Person` (`personID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Counselor_ibfk_2` FOREIGN KEY (`resourceID`) REFERENCES `_Resource` (`resourceID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Counselor_ibfk_3` FOREIGN KEY (`oppID`) REFERENCES `Opportunity` (`oppID`) ON UPDATE CASCADE;

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `Course_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `Teacher` (`teacherID`);

--
-- Constraints for table `Parent`
--
ALTER TABLE `Parent`
  ADD CONSTRAINT `Parent_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `Person` (`personID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Parent_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `Principal`
--
ALTER TABLE `Principal`
  ADD CONSTRAINT `Principal_ibfk_1` FOREIGN KEY (`principalID`) REFERENCES `Person` (`personID`) ON UPDATE CASCADE;

--
-- Constraints for table `Recommender`
--
ALTER TABLE `Recommender`
  ADD CONSTRAINT `Recommender_ibfk_1` FOREIGN KEY (`recommenderID`) REFERENCES `Teacher` (`teacherID`) ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`principalID`) REFERENCES `Principal` (`principalID`),
  ADD CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Person` (`personID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Student_ibfk_3` FOREIGN KEY (`counselorID`) REFERENCES `Counselor` (`counselorID`);

--
-- Constraints for table `StudentCourse`
--
ALTER TABLE `StudentCourse`
  ADD CONSTRAINT `StudentCourse_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentCourse_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `Course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `StudentOpp`
--
ALTER TABLE `StudentOpp`
  ADD CONSTRAINT `StudentOpp_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
  ADD CONSTRAINT `StudentOpp_ibfk_2` FOREIGN KEY (`oppID`) REFERENCES `Opportunity` (`oppID`) ON UPDATE CASCADE;

--
-- Constraints for table `StudentRecommender`
--
ALTER TABLE `StudentRecommender`
  ADD CONSTRAINT `StudentRecommender_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentRecommender_ibfk_2` FOREIGN KEY (`recommenderID`) REFERENCES `Recommender` (`recommenderID`) ON UPDATE CASCADE;

--
-- Constraints for table `StudentResources`
--
ALTER TABLE `StudentResources`
  ADD CONSTRAINT `StudentResources_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentResources_ibfk_2` FOREIGN KEY (`resourceID`) REFERENCES `_Resource` (`resourceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `StudentVoluntaryService`
--
ALTER TABLE `StudentVoluntaryService`
  ADD CONSTRAINT `StudentVoluntaryService_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
  ADD CONSTRAINT `StudentVoluntaryService_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `VolunteeringService` (`serviceID`) ON UPDATE CASCADE;

--
-- Constraints for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `Teacher_ibfk_1` FOREIGN KEY (`principalID`) REFERENCES `Principal` (`principalID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Teacher_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `Person` (`personID`) ON UPDATE CASCADE;

--
-- Constraints for table `Userlogins`
--
ALTER TABLE `Userlogins`
  ADD CONSTRAINT `Userlogins_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `Person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
