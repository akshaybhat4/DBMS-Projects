-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 01:52 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPrivatePatients` ()  SELECT * FROM pripatient$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(5) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dage` int(3) NOT NULL,
  `dsex` varchar(1) NOT NULL,
  `dqualification` varchar(20) NOT NULL,
  `dphno` varchar(10) NOT NULL,
  `specialisation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `dage`, `dsex`, `dqualification`, `dphno`, `specialisation`) VALUES
(11, 'Dr. Suma', 27, 'f', 'MBBS,MD', '9483239125', 'Anesthesiologist'),
(12, 'Dr. Mohan', 34, 'm', 'MBBS, DO', '9848562569', 'Allergist'),
(13, 'Dr. Arun Prasad', 56, 'm', 'MBBS,MD', '8150844584', 'Hematologist'),
(14, 'Dr. Malini', 32, 'f', 'MBBS', '9483239100', 'Obstetrician'),
(15, 'Dr.Shashidhar', 45, 'm', 'MBBS, DO', '9884500023', 'Cardiologist '),
(16, 'Dr. Nandini', 25, 'f', 'MBBS,MD', '9008992623', 'Dermatologist'),
(17, 'Dr. Arjun Reddy', 28, 'm', 'MBBS,DM(Neurology)', '9535970897', 'Neurologist'),
(18, 'Dr. Preethi', 21, 'f', 'MBBS', '8589457889', 'Emergency Medicine');

--
-- Triggers `doctor`
--
DELIMITER $$
CREATE TRIGGER `deleteTrigger` BEFORE DELETE ON `doctor` FOR EACH ROW INSERT into log VALUES(null,old.dname,old.dphno,'Deleted',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `generalbill`
--

CREATE TABLE `generalbill` (
  `mname` varchar(40) NOT NULL,
  `quantity` int(3) NOT NULL,
  `amount` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genpatient`
--

CREATE TABLE `genpatient` (
  `pid` int(5) NOT NULL,
  `roomno` int(3) DEFAULT NULL,
  `pname` varchar(30) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(1) NOT NULL,
  `pphno` varchar(10) NOT NULL,
  `paddress` varchar(30) NOT NULL,
  `admitdate` date DEFAULT NULL,
  `problem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genpatient`
--

INSERT INTO `genpatient` (`pid`, `roomno`, `pname`, `page`, `psex`, `pphno`, `paddress`, `admitdate`, `problem`) VALUES
(457, 201, 'Anup', 29, 'M', '9008992627', 'Banglore', '2018-11-22', 'muscular dystrophy'),
(458, 201, 'Amar', 30, 'M', '9658777777', 'Mysore', '2018-11-21', 'skin cancer'),
(459, 201, 'Anusha', 26, 'F', '9988992623', 'Banglore', '2018-11-07', 'Traumatic injury'),
(460, 202, 'Amarnath', 50, 'M', '9658777236', 'Mysore', '2018-11-20', 'eczema'),
(461, 202, 'Amardeep', 23, 'M', '9632369896', 'Banglore', '2018-11-14', 'Sinusitis');

--
-- Triggers `genpatient`
--
DELIMITER $$
CREATE TRIGGER `deleteGPTrigger` AFTER DELETE ON `genpatient` FOR EACH ROW INSERT into log values(null,old.pname,old.pphno,'DELETED',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `action` varchar(20) DEFAULT NULL,
  `cdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `name`, `phone`, `action`, `cdate`) VALUES
(3, 'Dr. William A. Abdu', '9008009090', 'Deleted', '2018-12-04'),
(4, 'Dr. AMar', '9874563210', 'Deleted', '2019-03-29'),
(5, 'xyz', '1111111111', 'DELETED', '2019-03-29'),
(6, 'Dr. Shalini', '7895955600', 'Deleted', '2019-03-29'),
(7, 'a', '2', 'Deleted', '2019-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `id` int(3) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`id`, `user`, `pass`) VALUES
(1, 'Akshay', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nid` int(5) NOT NULL,
  `nname` varchar(30) NOT NULL,
  `nage` int(3) NOT NULL,
  `nsex` varchar(1) NOT NULL,
  `nqualification` varchar(20) NOT NULL,
  `nphno` varchar(10) NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nid`, `nname`, `nage`, `nsex`, `nqualification`, `nphno`, `shift`) VALUES
(501, 'Suma', 23, 'F', 'BSN', '9885858201', 'S-1'),
(502, 'Medha', 25, 'F', 'ADN', '9632123210', 'S-3'),
(503, 'Bhoomika', 26, 'F', 'ADN', '9741254563', 'S-1'),
(504, 'Sumathi', 30, 'F', 'BSN', '9483239125', 'S-2');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `mid` int(5) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `mcost` int(5) NOT NULL,
  `use_in` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `manufactureDate` date NOT NULL,
  `expiryDate` date NOT NULL,
  `avlquantity` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`mid`, `mname`, `mcost`, `use_in`, `type`, `manufactureDate`, `expiryDate`, `avlquantity`) VALUES
(1, 'Paracetamol', 12, 'fever', 'Tablet', '2018-11-16', '2018-11-30', 45),
(2, 'Acyclovir Injection', 20, 'infection of the skin', 'Injections', '2018-11-15', '2023-02-23', 90),
(3, 'Acetaminophen', 45, 'Headache', 'Liquid', '2018-11-09', '2024-11-24', 90),
(4, 'Cortizone 10', 90, 'mild rashes', 'Cream', '2018-11-16', '2026-03-01', 100),
(5, 'Chlor-Trimeton', 120, 'Allergy', 'Tablet', '2018-11-09', '2022-10-15', 500),
(6, 'Pepto-Bismol', 56, 'Mild diarrhea', 'Liquid', '2018-11-16', '2023-02-03', 120),
(7, 'Enfalyte ', 89, 'Dehydration', 'Liquid', '2019-10-23', '2024-01-31', 150);

-- --------------------------------------------------------

--
-- Table structure for table `pripatient`
--

CREATE TABLE `pripatient` (
  `pid` int(5) NOT NULL,
  `roomno` int(3) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(1) NOT NULL,
  `pphno` varchar(10) NOT NULL,
  `paddress` varchar(30) NOT NULL,
  `admitdate` date DEFAULT NULL,
  `problem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pripatient`
--

INSERT INTO `pripatient` (`pid`, `roomno`, `pname`, `page`, `psex`, `pphno`, `paddress`, `admitdate`, `problem`) VALUES
(1, 100, 'anu', 19, 'F', '9008992623', 'Banglore', '2018-11-14', 'Traumatic injury'),
(2, 101, 'Amar', 23, 'M', '9865325698', 'Mysore', '2018-11-21', 'nail infections'),
(3, 102, 'Samara simha', 45, 'M', '9865325689', 'Nellur', '2018-12-13', 'Atherosclerosis'),
(4, 103, 'Kamal Reddy', 30, 'M', '8658777236', 'Telangana', '2018-11-17', 'congestive heart failure'),
(5, 104, 'Vaishnavi', 26, 'F', '9088992623', 'Banglore', '2018-11-06', 'Pregnant'),
(6, 105, 'Sumalatha', 40, 'F', '9658521456', 'Mysore', '2018-11-20', ' Acute coronary syndrome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `generalbill`
--
ALTER TABLE `generalbill`
  ADD PRIMARY KEY (`mname`);

--
-- Indexes for table `genpatient`
--
ALTER TABLE `genpatient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `pripatient`
--
ALTER TABLE `pripatient`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `roomno` (`roomno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `genpatient`
--
ALTER TABLE `genpatient`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `mid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pripatient`
--
ALTER TABLE `pripatient`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
