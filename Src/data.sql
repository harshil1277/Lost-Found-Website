-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2014 at 08:11 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lostandfound`
--
CREATE DATABASE IF NOT EXISTS `lostandfound` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lostandfound`;

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE IF NOT EXISTS `adminmaster` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `EmailID` varchar(60) NOT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `ProPic` blob,
  `LastLoggedIn` date DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`AdminID`, `FirstName`, `LastName`, `UserName`, `Password`, `EmailID`, `MobileNumber`, `LastLoggedIn`) VALUES
(1, 'Harshil', 'Kaneria', 'Harshil_Kaneria', '123456789', 'kaneria.1@iitj.ac.in', '7276464726', '11-05-2023')

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE IF NOT EXISTS `categorymaster` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(40) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


-- --------------------------------------------------------

--
-- Table structure for table `citymaster`
--

CREATE TABLE IF NOT EXISTS `citymaster` (
  `CountryID` varchar(50) NOT NULL,
  `StateID` varchar(50) NOT NULL,
  `CityID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(50) NOT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


--
-- Table structure for table `countrymaster`
--

CREATE TABLE IF NOT EXISTS `countrymaster` (
  `CountryID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL,
  `CountryCode` varchar(5) NOT NULL,
  PRIMARY KEY (`CountryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Table structure for table `foundmaster`
--

CREATE TABLE IF NOT EXISTS `foundmaster` (
  `FoundID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `FoundFrom` varchar(100) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `EmailAdd` varchar(50) NOT NULL,
  `PersonName` varchar(50) NOT NULL,
  PRIMARY KEY (`FoundID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;


-- --------------------------------------------------------

--
-- Table structure for table `imagegallerymaster`
--

CREATE TABLE IF NOT EXISTS `imagegallerymaster` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) NOT NULL,
  `UploadedDate` date NOT NULL,
  `UploadedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lostmaster`
--

CREATE TABLE IF NOT EXISTS `lostmaster` (
  `LostID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `LostFrom` varchar(100) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `EmailAdd` varchar(50) NOT NULL,
  `PersonName` varchar(50) NOT NULL,
  PRIMARY KEY (`LostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


-- --------------------------------------------------------

--
-- Table structure for table `querymaster`
--

CREATE TABLE IF NOT EXISTS `querymaster` (
  `QueryID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonName` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Query` varchar(400) NOT NULL,
  `Subject` varchar(25) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`QueryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

--
-- Table structure for table `replaymaster`
--

CREATE TABLE IF NOT EXISTS `replaymaster` (
  `ReplayID` int(11) NOT NULL AUTO_INCREMENT,
  `MessageTo` varchar(50) NOT NULL,
  `MessageFrom` varchar(50) NOT NULL,
  `Message` varchar(250) NOT NULL,
  PRIMARY KEY (`ReplayID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `statemaster`
--

CREATE TABLE IF NOT EXISTS `statemaster` (
  `CountryID` varchar(50) NOT NULL,
  `StateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(50) NOT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE IF NOT EXISTS `usermaster` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Address1` varchar(50) NOT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `ProPic` varchar(255) DEFAULT NULL,
  `ConfirmationCode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

