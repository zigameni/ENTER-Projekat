-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2019 at 11:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterfestival`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Adminov username',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Adminov password',
  PRIMARY KEY (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clanovi_benda`
--

DROP TABLE IF EXISTS `clanovi_benda`;
CREATE TABLE IF NOT EXISTS `clanovi_benda` (
  `clanID` int(14) NOT NULL AUTO_INCREMENT,
  `ime` text COLLATE utf8_unicode_ci NOT NULL,
  `prezime` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`clanID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dogadjaj`
--

DROP TABLE IF EXISTS `dogadjaj`;
CREATE TABLE IF NOT EXISTS `dogadjaj` (
  `dogadjajID` int(14) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Dobar provod vas ceka!',
  `terminID` int(14) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dogadjajID`),
  UNIQUE KEY `terminID` (`terminID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `izvodjac`
--

DROP TABLE IF EXISTS `izvodjac`;
CREATE TABLE IF NOT EXISTS `izvodjac` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karta`
--

DROP TABLE IF EXISTS `karta`;
CREATE TABLE IF NOT EXISTS `karta` (
  `kartaID` int(14) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(70) COLLATE utf8_unicode_ci DEFAULT 'Odlicna ponuda!',
  `cena` float NOT NULL,
  `kolicina` int(20) NOT NULL,
  PRIMARY KEY (`kartaID`),
  UNIQUE KEY `naziv` (`naziv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kupljena_karta`
--

DROP TABLE IF EXISTS `kupljena_karta`;
CREATE TABLE IF NOT EXISTS `kupljena_karta` (
  `kartaID` int(14) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`kartaID`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opsti_korisnik`
--

DROP TABLE IF EXISTS `opsti_korisnik`;
CREATE TABLE IF NOT EXISTS `opsti_korisnik` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ime` text COLLATE utf8_unicode_ci NOT NULL,
  `prezime` text COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grad` int(20) NOT NULL,
  `drzava` int(20) DEFAULT NULL,
  `email` int(40) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

DROP TABLE IF EXISTS `termin`;
CREATE TABLE IF NOT EXISTS `termin` (
  `terminID` int(14) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `vreme` time NOT NULL,
  `rezervisan` int(2) NOT NULL,
  PRIMARY KEY (`terminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volonter`
--

DROP TABLE IF EXISTS `volonter`;
CREATE TABLE IF NOT EXISTS `volonter` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volontira`
--

DROP TABLE IF EXISTS `volontira`;
CREATE TABLE IF NOT EXISTS `volontira` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dogadjajID` int(14) NOT NULL,
  PRIMARY KEY (`username`,`dogadjajID`),
  KEY `dogadjajID` (`dogadjajID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanovi_benda`
--
ALTER TABLE `clanovi_benda`
  ADD CONSTRAINT `clanovi_benda_ibfk_1` FOREIGN KEY (`username`) REFERENCES `izvodjac` (`username`);

--
-- Constraints for table `dogadjaj`
--
ALTER TABLE `dogadjaj`
  ADD CONSTRAINT `dogadjaj_ibfk_1` FOREIGN KEY (`terminID`) REFERENCES `termin` (`terminID`),
  ADD CONSTRAINT `dogadjaj_ibfk_2` FOREIGN KEY (`username`) REFERENCES `izvodjac` (`username`);

--
-- Constraints for table `izvodjac`
--
ALTER TABLE `izvodjac`
  ADD CONSTRAINT `izvodjac_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`);

--
-- Constraints for table `kupljena_karta`
--
ALTER TABLE `kupljena_karta`
  ADD CONSTRAINT `kupljena_karta_ibfk_1` FOREIGN KEY (`kartaID`) REFERENCES `karta` (`kartaID`),
  ADD CONSTRAINT `kupljena_karta_ibfk_2` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`);

--
-- Constraints for table `volonter`
--
ALTER TABLE `volonter`
  ADD CONSTRAINT `volonter_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`);

--
-- Constraints for table `volontira`
--
ALTER TABLE `volontira`
  ADD CONSTRAINT `volontira_ibfk_1` FOREIGN KEY (`dogadjajID`) REFERENCES `dogadjaj` (`dogadjajID`),
  ADD CONSTRAINT `volontira_ibfk_2` FOREIGN KEY (`username`) REFERENCES `volonter` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
