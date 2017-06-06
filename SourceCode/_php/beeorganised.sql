-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 03:04 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beeorganised`
--

-- --------------------------------------------------------

--
-- Table structure for table `beeuser`
--

CREATE TABLE IF NOT EXISTS `beeuser` (
  `idbeeUser` int(11) NOT NULL,
  `vname` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `psw` varchar(45) NOT NULL,
  `usr` varchar(45) NOT NULL,
  `telnr` varchar(45) NOT NULL,
  `gebtag` varchar(50) NOT NULL,
  `geschl` varchar(1) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beeuser`
--

INSERT INTO `beeuser` (`idbeeUser`, `vname`, `fname`, `email`, `psw`, `usr`, `telnr`, `gebtag`, `geschl`, `comment`) VALUES
(1, 'Anxhela', 'Mjacaj', 'anxmja12@htl-shkoder.com', '123456', 'anxmja12', '09876543', '1999-01-01', 'w', ''),
(2, 'Elidon', 'Bala', 'elibal12@htl-shkoder.com', '09876554321', 'elibal12', '0694488375', '1999-02-02', 'm', '');

-- --------------------------------------------------------

--
-- Table structure for table `bienenstock`
--

CREATE TABLE IF NOT EXISTS `bienenstock` (
  `idbienenstock` int(11) NOT NULL,
  `ort` varchar(45) NOT NULL,
  `beeUser_idbeeUser` int(11) NOT NULL,
  `gewichtsensor_idgewichtsensor` int(11) NOT NULL,
  `temperatur_idtemperatur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gewichtsensor`
--

CREATE TABLE IF NOT EXISTS `gewichtsensor` (
  `idgewichtsensor` int(11) NOT NULL,
  `gewichtDerBStock` float NOT NULL,
  `gesamtGewicht` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temperatur`
--

CREATE TABLE IF NOT EXISTS `temperatur` (
  `idtemperatur` int(11) NOT NULL,
  `innenTemp` int(11) NOT NULL,
  `aussenTemp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beeuser`
--
ALTER TABLE `beeuser`
  ADD PRIMARY KEY (`idbeeUser`);

--
-- Indexes for table `bienenstock`
--
ALTER TABLE `bienenstock`
  ADD PRIMARY KEY (`idbienenstock`),
  ADD KEY `fk_bienenstock_beeUser_idx` (`beeUser_idbeeUser`),
  ADD KEY `fk_bienenstock_gewichtsensor1_idx` (`gewichtsensor_idgewichtsensor`),
  ADD KEY `fk_bienenstock_temperatur1_idx` (`temperatur_idtemperatur`);

--
-- Indexes for table `gewichtsensor`
--
ALTER TABLE `gewichtsensor`
  ADD PRIMARY KEY (`idgewichtsensor`);

--
-- Indexes for table `temperatur`
--
ALTER TABLE `temperatur`
  ADD PRIMARY KEY (`idtemperatur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beeuser`
--
ALTER TABLE `beeuser`
  MODIFY `idbeeUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bienenstock`
--
ALTER TABLE `bienenstock`
  ADD CONSTRAINT `fk_bienenstock_beeUser` FOREIGN KEY (`beeUser_idbeeUser`) REFERENCES `beeuser` (`idbeeUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bienenstock_gewichtsensor1` FOREIGN KEY (`gewichtsensor_idgewichtsensor`) REFERENCES `gewichtsensor` (`idgewichtsensor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bienenstock_temperatur1` FOREIGN KEY (`temperatur_idtemperatur`) REFERENCES `temperatur` (`idtemperatur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
