-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 09:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusfather`
--

CREATE TABLE `cusfather` (
  `id` int(11) NOT NULL,
  `cFather` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cusfather`
--

INSERT INTO `cusfather` (`id`, `cFather`, `cid`) VALUES
(2, 'owais raza', 3),
(3, 'shahanshah hussain', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cushusband`
--

CREATE TABLE `cushusband` (
  `id` int(11) NOT NULL,
  `cHusband` varchar(255) DEFAULT NULL,
  `hid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cushusband`
--

INSERT INTO `cushusband` (`id`, `cHusband`, `hid`) VALUES
(2, 'rajesh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `emi`
--

CREATE TABLE `emi` (
  `id` int(11) NOT NULL,
  `pay_emi` bigint(20) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `emidate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emi`
--

INSERT INTO `emi` (`id`, `pay_emi`, `cid`, `emidate`) VALUES
(1, 3014, 3, 1658927743),
(2, 3014, 3, 1658927822),
(3, 3014, 3, 1658927945),
(4, 120, 5, 1658979752),
(5, 120, 5, 1658979816),
(6, 120, 5, 1658979839),
(7, 120, 5, 1658979943),
(8, 120, 5, 1658979948);

-- --------------------------------------------------------

--
-- Table structure for table `loan_amount`
--

CREATE TABLE `loan_amount` (
  `id` int(11) NOT NULL,
  `loan` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `loan_time_year` int(11) DEFAULT NULL,
  `loan_time_month` int(11) DEFAULT NULL,
  `emi` varchar(255) DEFAULT NULL,
  `loandate` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_amount`
--

INSERT INTO `loan_amount` (`id`, `loan`, `rate`, `loan_time_year`, `loan_time_month`, `emi`, `loandate`, `cid`) VALUES
(1, 30000, 22, 2, NULL, 'Monthly', 1658896294, 3),
(2, 3340, 22, 1, NULL, 'Monthly', 1658896808, 5),
(3, 40000, 35, 1, NULL, 'Quaterly', 1658897037, 4);

-- --------------------------------------------------------

--
-- Table structure for table `owneraccount`
--

CREATE TABLE `owneraccount` (
  `id` int(3) NOT NULL,
  `ownerName` varchar(255) DEFAULT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `date` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owneraccount`
--

INSERT INTO `owneraccount` (`id`, `ownerName`, `userName`, `userEmail`, `userPassword`, `date`) VALUES
(1, 'parvez alam', 'parvez alam', 'saif@gmail.com', '666666', 1657881492);

-- --------------------------------------------------------

--
-- Table structure for table `registeraccount`
--

CREATE TABLE `registeraccount` (
  `rid` int(3) NOT NULL,
  `accountNumber` bigint(25) DEFAULT NULL,
  `cName` varchar(255) DEFAULT NULL,
  `cAge` int(3) DEFAULT NULL,
  `tAddress` varchar(255) DEFAULT NULL,
  `pAddress` varchar(255) DEFAULT NULL,
  `cMobile` varchar(255) DEFAULT NULL,
  `cEmail` varchar(255) DEFAULT NULL,
  `aadharNo` bigint(30) DEFAULT NULL,
  `cGender` varchar(255) DEFAULT NULL,
  `cDOB` int(11) DEFAULT NULL,
  `cPhoto` int(30) DEFAULT NULL,
  `date` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeraccount`
--

INSERT INTO `registeraccount` (`rid`, `accountNumber`, `cName`, `cAge`, `tAddress`, `pAddress`, `cMobile`, `cEmail`, `aadharNo`, `cGender`, `cDOB`, `cPhoto`, `date`) VALUES
(3, 43434, 'zahida fatma', 24, 'NTA', 'allahabad', '34343434', 'zahida@gmail.com', 7789765465465, 'Female', 1055196000, 1658315876, 1658315876),
(4, 109232834, '', 25, 'NTA', 'zahid pur lalgopal ganj', '8896426636', 'saif@gmail.com', 77045789651, 'Male', 798156000, 1658371348, 1658371348),
(5, 140055, 'pooja', 24, 'NTA', 'prayagraj', '7493749374', 'temp@gmail.com', 8976456654654, 'Female', 858034800, 1658371456, 1658371456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusfather`
--
ALTER TABLE `cusfather`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cushusband`
--
ALTER TABLE `cushusband`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `emi`
--
ALTER TABLE `emi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `loan_amount`
--
ALTER TABLE `loan_amount`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `owneraccount`
--
ALTER TABLE `owneraccount`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `registeraccount`
--
ALTER TABLE `registeraccount`
  ADD UNIQUE KEY `rid` (`rid`),
  ADD UNIQUE KEY `accountNumber` (`accountNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusfather`
--
ALTER TABLE `cusfather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cushusband`
--
ALTER TABLE `cushusband`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emi`
--
ALTER TABLE `emi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_amount`
--
ALTER TABLE `loan_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owneraccount`
--
ALTER TABLE `owneraccount`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registeraccount`
--
ALTER TABLE `registeraccount`
  MODIFY `rid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emi`
--
ALTER TABLE `emi`
  ADD CONSTRAINT `emi_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `registeraccount` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
