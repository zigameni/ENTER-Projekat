-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2019 at 07:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_poruke`
--

DROP TABLE IF EXISTS `admin_poruke`;
CREATE TABLE IF NOT EXISTS `admin_poruke` (
  `porukaID` int(14) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `posiljalac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`porukaID`),
  KEY `posiljalac` (`posiljalac`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_poruke`
--

INSERT INTO `admin_poruke` (`porukaID`, `naslov`, `sadrzaj`, `posiljalac`) VALUES
(8, 'yo wassup', 'my man', 'RJD2'),
(10, 'got a minute?', 'need assistance', 'Com Truise'),
(11, 'got more sole', 'than a sock with a hole', 'MF DOOM'),
(12, 'yeeee', 'haaaaw', 'RJD2'),
(13, 'asdf', 'fdsa', 'Sajsi MC'),
(14, 'sfdf', 'you dumb', 'Bad Copy');

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
  `potvrdjen` int(2) NOT NULL,
  PRIMARY KEY (`dogadjajID`),
  UNIQUE KEY `terminID` (`terminID`),
  KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dogadjaj`
--

INSERT INTO `dogadjaj` (`dogadjajID`, `naziv`, `opis`, `terminID`, `username`, `potvrdjen`) VALUES
(7, 'Zabavnjaci vece', 'Samo veselo!', 6, 'MF DOOM', 1),
(8, 'Electronica', '0010 0011', 12, 'Com Truise', 1),
(10, 'Rejv zurka', 'Brza muzika za brze ljude', 14, 'RJD2', 1),
(11, 'Chill zona', 'Just relax', 15, 'Boards of Canada', 0),
(12, 'Rap vece', 'Rhymes for dimes', 16, 'MF DOOM', 0),
(14, 'Reggae zurka', 'Opusteno nasmejano', 2, 'MF DOOM', 0),
(15, 'Hip hop histerija', 'Maksimalno sirovo', 3, 'Bad Copy', 0),
(16, 'Drum n bass zurka', 'Da, jos uvek postoji', 4, 'Com Truise', 0),
(18, 'Vaporwave vece', 'e s t e t i k a', 13, 'Bad Copy', 0),
(23, 'EUROBEAT zurka', 'ITALIA FORZA', 18, 'Bad Copy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `izvodjac`
--

DROP TABLE IF EXISTS `izvodjac`;
CREATE TABLE IF NOT EXISTS `izvodjac` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `izvodjac`
--

INSERT INTO `izvodjac` (`username`) VALUES
('Bad Copy'),
('Boards of Canada'),
('Com Truise'),
('MF DOOM'),
('RJD2'),
('Sajsi MC');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karta`
--

INSERT INTO `karta` (`kartaID`, `naziv`, `opis`, `cena`, `kolicina`) VALUES
(5, 'Standard', 'Nista specijalno', 1000, 500),
(6, 'Deluks', 'Prvi red', 6000, 100),
(7, 'VIP', 'Backroom access ;)', 10000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`username`) VALUES
('korisnik_1'),
('korisnik_2');

-- --------------------------------------------------------

--
-- Table structure for table `kupljena_karta`
--

DROP TABLE IF EXISTS `kupljena_karta`;
CREATE TABLE IF NOT EXISTS `kupljena_karta` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `kartaID` int(7) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `grad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `drzava` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opsti_korisnik`
--

INSERT INTO `opsti_korisnik` (`username`, `password`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `email`) VALUES
('Bad Copy', '123', 'Vladan', 'Aksentijevic', 'Kotez', 'Beograd', 'Srbija', '43kotez@gmail.com'),
('Boards of Canada', '123', 'Boban', 'Nabob', 'Vojvode Stepe', 'Ontario', 'Kanada', 'boc@gmail.com'),
('Com Truise', '123', 'Bobi', 'Gromada', 'Ulica', 'Worcestershire', 'Great Britain', 'comtruise@gmail.com'),
('korisnik_1', '123', 'Korisnik1', 'Korisnik1', '1001', 'Beograd', 'Serbija', 'korisnik_1@gmail.com'),
('korisnik_2', '123', 'Korisnik2', 'Korisnik2', '10002', 'Beograd', 'Serbija', 'korisnik_2@gmail.com'),
('MF DOOM', '123', 'Stephen', 'Dumile', '1300 kaplara', 'New York', 'USA', 'allcaps@gmail.com'),
('RJD2', '123', 'Adam', 'Savage', 'omladinskih brigada', 'Boston', 'USA', 'rjd2@gmail.com'),
('Sajsi MC', '123', 'Ivana', 'Rasic', 'Blokovi', 'Beograd', 'Srbija', 'sighcee@gmail.com'),
('volonter_1', '123', 'Volonter1', 'Volonter1', '11000', 'Beograd', 'Serbija', 'volonter_1@gmail.com'),
('volonter_2', '123', 'Volonter2', 'Volonter2', '11000', 'Beograd', 'Serbija', 'volonter_2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

DROP TABLE IF EXISTS `poruke`;
CREATE TABLE IF NOT EXISTS `poruke` (
  `porukaID` int(14) NOT NULL AUTO_INCREMENT,
  `primalac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `posiljalac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naslov` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`porukaID`),
  KEY `primalac` (`primalac`),
  KEY `posiljalac` (`posiljalac`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`porukaID`, `primalac`, `posiljalac`, `naslov`, `sadrzaj`) VALUES
(2, 'MF DOOM', NULL, 'gde si legendo', 'sta se radi'),
(3, 'RJD2', NULL, 'od admina', 'reci baki'),
(4, 'Bad Copy', NULL, 'im here', 'what\'s the problem'),
(5, 'Com Truise', NULL, 'from admin', 'hey thanks!'),
(6, 'Bad Copy', NULL, 'obi wan here', 'huan'),
(7, 'Sajsi MC', NULL, 'hey Sajsi', 'what\'s up'),
(8, 'Bad Copy', NULL, 'help', 'is on the way'),
(9, 'Bad Copy', NULL, 'YOU STUPIDDDDD', 'YOU DUMBER THAN STUPID');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`terminID`, `datum`, `vreme`, `rezervisan`) VALUES
(1, '2019-06-05', '20:00:00', 0),
(2, '2019-06-04', '20:00:00', 0),
(3, '2019-06-05', '22:00:00', 0),
(4, '2019-06-05', '18:00:00', 0),
(5, '2019-06-04', '18:00:00', 0),
(6, '2019-06-04', '22:00:00', 1),
(12, '0232-02-23', '14:03:00', 1),
(13, '0212-12-12', '02:31:00', 0),
(14, '0231-03-21', '02:13:00', 1),
(15, '0213-03-12', '02:12:00', 0),
(16, '0021-12-12', '00:02:00', 0),
(17, '0012-12-12', '00:12:00', 0),
(18, '0012-12-12', '12:12:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `volonter`
--

DROP TABLE IF EXISTS `volonter`;
CREATE TABLE IF NOT EXISTS `volonter` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `volonter`
--

INSERT INTO `volonter` (`username`) VALUES
('volonter_1'),
('volonter_2');

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
-- Dumping data for table `volontira`
--

INSERT INTO `volontira` (`username`, `dogadjajID`) VALUES
('volonter_1', 8),
('volonter_2', 23);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_poruke`
--
ALTER TABLE `admin_poruke`
  ADD CONSTRAINT `admin_poruke_ibfk_1` FOREIGN KEY (`posiljalac`) REFERENCES `opsti_korisnik` (`username`);

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
-- Constraints for table `poruke`
--
ALTER TABLE `poruke`
  ADD CONSTRAINT `poruke_ibfk_1` FOREIGN KEY (`primalac`) REFERENCES `opsti_korisnik` (`username`),
  ADD CONSTRAINT `poruke_ibfk_2` FOREIGN KEY (`posiljalac`) REFERENCES `opsti_korisnik` (`username`);

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
