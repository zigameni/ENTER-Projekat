-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 06:35 AM
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
-- Database: `enter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('gazishehu', '');

-- --------------------------------------------------------

--
-- Table structure for table `izvodjac`
--

DROP TABLE IF EXISTS `izvodjac`;
CREATE TABLE IF NOT EXISTS `izvodjac` (
  `username` varchar(20) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opsti_korisnik`
--

DROP TABLE IF EXISTS `opsti_korisnik`;
CREATE TABLE IF NOT EXISTS `opsti_korisnik` (
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `adresa` varchar(40) NOT NULL,
  `grad` varchar(20) NOT NULL,
  `drzava` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `validation_code` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsti_korisnik`
--

INSERT INTO `opsti_korisnik` (`username`, `password`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `email`, `validation_code`, `active`) VALUES
('admin', 'admin123', '', '', '', '', '', 'admin@enter.com', '', 0),
('gazishehu', '0192023a7bbd73250516f069df18b500', 'Gazi', 'Shehu', 'shhht', 'shhht', 'shhht', 'admin1@enter.com', '', 1),
('hola1111asd', '123', 'kadaif', 'hopa', 'sldkfj', 'lsdkjflsdkfj', 'lksdjfs', 'jola1231@jhghjsad', '', 1),
('meniiiiiiiii', '81dc9bdb52d04dc20036dbd8313ed055', 'zigaaasdads', 'laskdj', 'kasjdlkajsd', 'sldkfjdlskfj', 'lsdkfjldk', 'men2@gmail.com', '', 1),
('neli1', '81dc9bdb52d04dc20036dbd8313ed055', 'neli', 'shehu', 'lksdfjdlkf', 'lksdjfsldkfj', 'lkdsjflksdjf', 'nel@gmail.com', '7d189272ece854e029f333fe757397ff', 1),
('stupid', '10bf7277338b0f6c5e11a454bafbaaf1', 'sldjkfj', 'lksdjfs', 'iklsakdjf', 'lkasjdflk', 'slkdjf', 'stupid@gmail.com', '0', 1),
('zigameni11', '81dc9bdb52d04dc20036dbd8313ed055', 'ZIgaaa', 'Menii', '123', '12e', '213', 'tube@dlksf', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volonter`
--

DROP TABLE IF EXISTS `volonter`;
CREATE TABLE IF NOT EXISTS `volonter` (
  `username` varchar(20) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`);

--
-- Constraints for table `izvodjac`
--
ALTER TABLE `izvodjac`
  ADD CONSTRAINT `izvodjac_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `volonter`
--
ALTER TABLE `volonter`
  ADD CONSTRAINT `volonter_ibfk_1` FOREIGN KEY (`username`) REFERENCES `opsti_korisnik` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
