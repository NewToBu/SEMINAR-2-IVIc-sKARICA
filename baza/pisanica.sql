-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 10:07 AM
-- Server version: 5.5.35
-- PHP Version: 5.5.10-1~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pisanica`
--

-- --------------------------------------------------------

--
-- Table structure for table `boje`
--

CREATE TABLE IF NOT EXISTS `boje` (
  `id` int(1) NOT NULL,
  `boja` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boje`
--

INSERT INTO `boje` (`id`, `boja`) VALUES
(1, 'Plava'),
(2, 'Crvena'),
(3, 'Žuta'),
(4, 'Zelena'),
(5, 'Narančasta'),
(6, 'Ljubičasta'),
(7, 'Bijela'),
(8, 'Crna');

-- --------------------------------------------------------

--
-- Table structure for table `brojNoge`
--

CREATE TABLE IF NOT EXISTS `brojNoge` (
  `id` int(5) NOT NULL,
  `broj` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brojNoge`
--

INSERT INTO `brojNoge` (`id`, `broj`) VALUES
(1, 16),
(2, 17),
(3, 18),
(4, 19),
(5, 20),
(6, 21),
(7, 22),
(8, 23),
(9, 24),
(10, 25),
(11, 26),
(12, 27),
(13, 28),
(14, 29),
(15, 30),
(16, 31),
(17, 32),
(18, 33),
(19, 34),
(20, 35),
(21, 36),
(22, 37),
(23, 38),
(24, 39),
(25, 40),
(26, 41),
(27, 42),
(28, 43),
(29, 44),
(30, 45);

-- --------------------------------------------------------

--
-- Table structure for table `karakteristike`
--

CREATE TABLE IF NOT EXISTS `karakteristike` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `karakteristike`
--

INSERT INTO `karakteristike` (`id`, `naziv`) VALUES
(1, 'Boja'),
(2, 'Broj noge'),
(3, 'Materijal'),
(4, 'Velicina');

-- --------------------------------------------------------

--
-- Table structure for table `kombinacije`
--

CREATE TABLE IF NOT EXISTS `kombinacije` (
  `id` int(5) NOT NULL,
  `idProizvoda` int(11) NOT NULL,
  `idKarakteristike` int(11) NOT NULL,
  `vrijednost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kombinacije`
--

INSERT INTO `kombinacije` (`id`, `idProizvoda`, `idKarakteristike`, `vrijednost`) VALUES
(1, 16, 1, 1),
(2, 17, 3, 7),
(4, 18, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `korisnickoIme` varchar(20) NOT NULL,
  `sifra` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mjesto` varchar(100) NOT NULL,
  `postBr` int(5) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `narudba` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `korisnickoIme`, `sifra`, `email`, `mjesto`, `postBr`, `adresa`, `narudba`) VALUES
(49, 'administrator', '', 'admin', '17b3ee86cb27c61997fe12afc3f6f1e9504dafe9', '', '', 0, '', ''),
(50, 'Tomislav', 'dfdsf', 'tomo', '05198be8104d24eb444d06f9cc37de76a6c26610', 'tivic@tvz.hr', 'rrrrrrrrrrrrrrrrrrrrrrrr', 34564, '2w', 'cart|a:1:{i:0;s:2:"18";}neki|a:1:{i:0;a:2:{s:2:"id";s:2:"18";s:8:"kolicina";s:1:"1";}}pac|s:4:"tomo";'),
(51, 'Branimir', 'Škarica', 'brane', 'c43b0a1cccfa21a084b4e74ecc9ce907afbc54d9', 'brane@gmail.com', 'tre', 33333, '22e', 'pac|s:5:"brane";cart|a:1:{i:0;s:2:"19";}neki|a:1:{i:0;a:2:{s:2:"id";s:2:"19";s:8:"kolicina";s:1:"1";}}'),
(52, 'Petar', 'Perić', 'perko', '6ee4311f39c767654b75aa0e1ed7e808e3016847', 'pero@gmail.com', 'P', 33332, 'P', ''),
(53, 'Mate', 'Križanac', 'mate', '2fd09751ff7f5ef91c4a0839832cbcf24fed683c', 'mkrizanac@tvz.hr', 'm', 33, 'm', 'cart|a:6:{i:0;s:2:"18";i:1;s:2:"19";i:2;s:2:"19";i:3;s:2:"19";i:4;s:2:"19";i:5;s:2:"24";}neki|a:3:{i:0;a:2:{s:2:"id";s:2:"18";s:8:"kolicina";s:1:"1";}i:1;a:2:{s:2:"id";s:2:"19";s:8:"kolicina";i:4;}i:2;a:2:{s:2:"id";s:2:"24";s:8:"kolicina";s:1:"1";}}pac|s:4:"mate";'),
(54, 'bova', 'bovica', 'bovki', '15aab50aafda80f99d18b6c592621418514a55a9', 'bova@portalzabove.com', 'more', 0, 'uvalabovica2', 'cart|a:8:{i:0;s:2:"26";i:1;s:2:"26";i:2;s:2:"20";i:3;s:2:"28";i:4;s:2:"19";i:5;s:2:"25";i:6;s:2:"16";i:7;s:2:"29";}neki|a:7:{i:0;a:2:{s:2:"id";s:2:"26";s:8:"kolicina";i:2;}i:1;a:2:{s:2:"id";s:2:"20";s:8:"kolicina";s:1:"1";}i:2;a:2:{s:2:"id";s:2:"28";s:8:"kolicina";s:1:"1";}i:3;a:2:{s:2:"id";s:2:"19";s:8:"kolicina";s:1:"1";}i:4;a:2:{s:2:"id";s:2:"25";s:8:"kolicina";s:1:"1";}i:5;a:2:{s:2:"id";s:2:"16";s:8:"kolicina";s:1:"1";}i:6;a:2:{s:2:"id";s:2:"29";s:8:"kolicina";s:1:"1";}}pac|s:5:"bovki";'),
(55, 'name', 'lastname', 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'email@gmail.com', 'bangladeš', 34564, 'libanonska35', 'pac|s:8:"username";cart|a:1:{i:0;s:2:"18";}neki|a:1:{i:0;a:2:{s:2:"id";s:2:"18";s:8:"kolicina";s:1:"1";}}'),
(56, 'Dominik', 'Heštera', 'dodonjax', '0dd6132ec60aac675c1e8cecd87605edde4aa339', 'gmail@punoimeiprezime.com', 'štala', 65225, 'venerina28', 'cart|a:2:{i:0;s:1:"2";i:1;s:2:"21";}neki|a:2:{i:0;a:2:{s:2:"id";s:1:"2";s:8:"kolicina";s:1:"1";}i:1;a:2:{s:2:"id";s:2:"21";s:8:"kolicina";s:1:"1";}}pac|s:8:"dodonjax";'),
(57, 'Tomislav', 'Tomić', 'tomek', '9c4e354b7877521ede0345cfb71b667fbc957dc5', 'tivic@tvz.hr', 'Šibenik', 55555, 'iza3', 'pac|s:5:"tomek";cart|a:31:{i:0;s:1:"2";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";i:4;s:1:"4";i:5;s:1:"5";i:6;s:1:"6";i:7;s:1:"7";i:8;s:1:"8";i:9;s:1:"9";i:10;s:2:"10";i:11;s:2:"11";i:12;s:2:"12";i:13;s:2:"13";i:14;s:2:"14";i:15;s:2:"15";i:16;s:2:"16";i:17;s:2:"17";i:18;s:2:"18";i:19;s:2:"19";i:20;s:2:"20";i:21;s:2:"21";i:22;s:2:"30";i:23;s:2:"29";i:24;s:2:"28";i:25;s:2:"27";i:26;s:2:"26";i:27;s:2:"25";i:28;s:2:"24";i:29;s:2:"23";i:30;s:2:"22";}neki|a:30:{i:0;a:2:{s:2:"id";s:1:"2";s:8:"kolicina";i:2;}i:1;a:2:{s:2:"id";s:1:"1";s:8:"kolicina";s:1:"1";}i:2;a:2:{s:2:"id";s:1:"3";s:8:"kolicina";s:1:"1";}i:3;a:2:{s:2:"id";s:1:"4";s:8:"kolicina";s:1:"1";}i:4;a:2:{s:2:"id";s:1:"5";s:8:"kolicina";s:1:"1";}i:5;a:2:{s:2:"id";s:1:"6";s:8:"kolicina";s:1:"1";}i:6;a:2:{s:2:"id";s:1:"7";s:8:"kolicina";s:1:"1";}i:7;a:2:{s:2:"id";s:1:"8";s:8:"kolicina";s:1:"1";}i:8;a:2:{s:2:"id";s:1:"9";s:8:"kolicina";s:1:"1";}i:9;a:2:{s:2:"id";s:2:"10";s:8:"kolicina";s:1:"1";}i:10;a:2:{s:2:"id";s:2:"11";s:8:"kolicina";s:1:"1";}i:11;a:2:{s:2:"id";s:2:"12";s:8:"kolicina";s:1:"1";}i:12;a:2:{s:2:"id";s:2:"13";s:8:"kolicina";s:1:"1";}i:13;a:2:{s:2:"id";s:2:"14";s:8:"kolicina";s:1:"1";}i:14;a:2:{s:2:"id";s:2:"15";s:8:"kolicina";s:1:"1";}i:15;a:2:{s:2:"id";s:2:"16";s:8:"kolicina";s:1:"1";}i:16;a:2:{s:2:"id";s:2:"17";s:8:"kolicina";s:1:"1";}i:17;a:2:{s:2:"id";s:2:"18";s:8:"kolicina";s:1:"1";}i:18;a:2:{s:2:"id";s:2:"19";s:8:"kolicina";s:1:"1";}i:19;a:2:{s:2:"id";s:2:"20";s:8:"kolicina";s:1:"1";}i:20;a:2:{s:2:"id";s:2:"21";s:8:"kolicina";s:1:"1";}i:21;a:2:{s:2:"id";s:2:"30";s:8:"kolicina";s:1:"1";}i:22;a:2:{s:2:"id";s:2:"29";s:8:"kolicina";s:1:"1";}i:23;a:2:{s:2:"id";s:2:"28";s:8:"kolicina";s:1:"1";}i:24;a:2:{s:2:"id";s:2:"27";s:8:"kolicina";s:1:"1";}i:25;a:2:{s:2:"id";s:2:"26";s:8:"kolicina";s:1:"1";}i:26;a:2:{s:2:"id";s:2:"25";s:8:"kolicina";s:1:"1";}i:27;a:2:{s:2:"id";s:2:"24";s:8:"kolicina";s:1:"1";}i:28;a:2:{s:2:"id";s:2:"23";s:8:"kolicina";s:1:"1";}i:29;a:2:{s:2:"id";s:2:"22";s:8:"kolicina";s:1:"1";}}');

-- --------------------------------------------------------

--
-- Table structure for table `materijali`
--

CREATE TABLE IF NOT EXISTS `materijali` (
  `id` int(2) NOT NULL,
  `materijal` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materijali`
--

INSERT INTO `materijali` (`id`, `materijal`) VALUES
(1, 'Plastika'),
(2, 'Drvo'),
(3, 'Svila'),
(4, 'Koža'),
(5, 'Keramika'),
(6, 'Stakloplastika'),
(7, 'Guma');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE IF NOT EXISTS `proizvodi` (
  `id` int(5) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `opis` varchar(100) NOT NULL,
  `cijena` int(3) NOT NULL,
  `valutaId` int(5) NOT NULL,
  `vrsta` int(10) NOT NULL,
  `slika` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `ime`, `opis`, `cijena`, `valutaId`, `vrsta`, `slika`) VALUES
(1, 'Kratka majica', 'Crna majica s uzorkom', 30, 1, 1, '../images/Proizvodi/Muška/Majice/1.png'),
(2, 'Kratka majica', 'Bijela prozračna majica', 120, 1, 1, '../images/Proizvodi/Muška/Majice/2.png'),
(3, 'Majica bez rukava', 'Lagana majica bez rukava za plažu', 65, 1, 1, '../images/Proizvodi/Muška/Majice/3.png'),
(4, 'Kratke hlače', 'Moderne kratke hlače za svaku priliku', 150, 1, 2, '../images/Proizvodi/Muška/Hlače/1.png'),
(5, 'Duge hlače', 'Hlače za večerašnju šetnju', 220, 1, 2, '../images/Proizvodi/Muška/Hlače/2.png'),
(6, 'Hlače ispod koljena', 'Hlače koje su malo do ispod koljena', 90, 1, 2, '../images/Proizvodi/Muška/Hlače/3.png'),
(7, 'Kupaće gaće', 'Kupaće gaćice za muškarce', 40, 1, 3, '../images/Proizvodi/Muška/Kupaći/1.png'),
(8, 'Kupaće Hlače', 'Kratke kupaće hlače za kupanje', 80, 1, 3, '../images/Proizvodi/Muška/Kupaći/2.png'),
(9, 'Havajke', 'Šarene hlače za kupanje', 110, 1, 3, '../images/Proizvodi/Muška/Kupaći/3.png'),
(10, 'Kratka majica', 'Kratka majica s otvorom', 70, 1, 4, '../images/Proizvodi/Ženska/Majice/1.png'),
(11, 'Dugi rukav', 'Majica dugih rukava, prozračna', 120, 1, 4, '../images/Proizvodi/Ženska/Majice/2.png'),
(12, 'Majica bez rukava', 'Majica bez rukava ,otvorena', 70, 1, 4, '../images/Proizvodi/Ženska/Majice/3.png'),
(13, 'Kratke hlače', 'Kratke traper hlače za plažu', 130, 1, 5, '../images/Proizvodi/Ženska/Hlače/1.png'),
(14, 'Duge hlače', 'Dugačke traperice u svim bojama', 140, 1, 5, '../images/Proizvodi/Ženska/Hlače/2.png'),
(15, 'Haljina', 'Prozračna haljina', 180, 1, 5, '../images/Proizvodi/Ženska/Hlače/3.png'),
(16, 'Badić', 'Šareni badići u svim bojama i veličinama', 75, 1, 6, '../images/Proizvodi/Ženska/Kupaći/1.png'),
(17, 'Kupaći kostim', 'Jednodjelni kupaći kostim ', 130, 1, 6, '../images/Proizvodi/Ženska/Kupaći/2.png'),
(18, 'Kupaći', 'Dvodjelni kupaći kostim', 130, 1, 6, '../images/Proizvodi/Ženska/Kupaći/3.png'),
(19, 'Japanke', 'Japanke za sve uzraste ', 90, 1, 7, '../images/Proizvodi/Obuća/Japanke/1.png'),
(20, 'Kroksice', 'Muške, ženske , dječje. Za sve uzraste', 70, 1, 8, '../images/Proizvodi/Obuća/Kroksice/1.png'),
(21, 'Naočale za ronjenje', 'Naočale za pod vodu', 80, 1, 9, '../images/Proizvodi/Ronilačka/Maske/1.png'),
(22, 'Maska', 'Maska za ronjenje s dihalicom', 130, 1, 9, '../images/Proizvodi/Ronilačka/Maske/2.png'),
(23, 'Peraje', 'Profesionalne peraje za ronjenje', 190, 1, 10, '../images/Proizvodi/Ronilačka/Peraje/1.png'),
(24, 'Lopta', 'Lopta za napuhavanje u boji', 60, 1, 11, '../images/Proizvodi/Igračke/Pijesak/1.png'),
(25, 'Kantica', 'Kantica i lopatica za pijesak', 40, 1, 11, '../images/Proizvodi/Igračke/Pijesak/2.png'),
(26, 'Luftić', 'Luftić za napuhavanje', 75, 1, 12, '../images/Proizvodi/Igračke/Luftići/1.png'),
(27, 'Suncobran', 'Veliki suncobran koji štiti od sunca', 180, 1, 13, '../images/Proizvodi/Dodaci/Suncobrani/1.png'),
(28, 'Naočale', 'Sunčane naočale UV', 150, 1, 14, '../images/Proizvodi/Dodaci/Naočale/1.png'),
(29, 'Šešir', 'Slamnati šešir za plažu', 60, 1, 15, '../images/Proizvodi/Dodaci/Šeširi/1.png'),
(30, 'Ručnik', 'Veliki šareni pamučni ručnik za plažu', 100, 1, 16, '../images/Proizvodi/Dodaci/Ručnici/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodien`
--

CREATE TABLE IF NOT EXISTS `proizvodien` (
  `id` int(5) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `opis` varchar(100) NOT NULL,
  `cijena` int(3) NOT NULL,
  `valutaId` int(5) NOT NULL,
  `vrsta` int(10) NOT NULL,
  `slika` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proizvodien`
--

INSERT INTO `proizvodien` (`id`, `ime`, `opis`, `cijena`, `valutaId`, `vrsta`, `slika`) VALUES
(1, 'Short shirt', 'Black shirt with a pattern', 6, 1, 1, '../images/Proizvodi/Muška/Majice/1.png'),
(2, 'Short shirt', 'White breathable shirt', 24, 1, 1, '../images/Proizvodi/Muška/Majice/2.png'),
(3, 'Sleeveless shirt', 'Light shirt without sleeves for beach', 12, 1, 1, '../images/Proizvodi/Muška/Majice/3.png'),
(4, 'Short pants', 'Modern shorts for every occasion', 30, 1, 2, '../images/Proizvodi/Muška/Hlače/1.png'),
(5, 'Long pants', 'Pants for evening walk', 44, 1, 2, '../images/Proizvodi/Muška/Hlače/2.png'),
(6, 'Pants below the knee', 'Pants that are just long enough to cover your knees', 18, 1, 2, '../images/Proizvodi/Muška/Hlače/3.png'),
(7, 'Trunks', 'Trunks for men', 8, 1, 3, '../images/Proizvodi/Muška/Kupaći/1.png'),
(8, 'Swimming pants', 'Short swimming pants', 16, 1, 3, '../images/Proizvodi/Muška/Kupaći/2.png'),
(9, 'Hawaii pants', 'Hawaii pants for swimming', 22, 1, 3, '../images/Proizvodi/Muška/Kupaći/3.png'),
(10, 'Short shirt', 'Short shirt with a hole', 14, 1, 4, '../images/Proizvodi/Ženska/Majice/1.png'),
(11, 'Shirt with long sleeves', 'Has long sleeves but still airy', 24, 1, 4, '../images/Proizvodi/Ženska/Majice/2.png'),
(12, 'Sleeveless shirt', 'Open sleeveless shirt', 14, 1, 4, '../images/Proizvodi/Ženska/Majice/3.png'),
(13, 'Short jeans', 'Short jeans for beach', 26, 1, 5, '../images/Proizvodi/Ženska/Hlače/1.png'),
(14, 'Long pants', 'Long jeans in all colors', 28, 1, 5, '../images/Proizvodi/Ženska/Hlače/2.png'),
(15, 'Dress', 'Airy dress', 36, 1, 5, '../images/Proizvodi/Ženska/Hlače/3.png'),
(16, 'Bikini', 'Colorful bikini in all sizes', 15, 1, 6, '../images/Proizvodi/Ženska/Kupaći/1.png'),
(17, 'Swimming suit', 'One-piece swimming suit', 26, 1, 6, '../images/Proizvodi/Ženska/Kupaći/2.png'),
(18, 'Swimming suit', 'Two-piece swimming suit', 26, 1, 6, '../images/Proizvodi/Ženska/Kupaći/3.png'),
(19, 'Flip flops', 'Flip flops for all ages', 18, 1, 7, '../images/Proizvodi/Obuća/Japanke/1.png'),
(20, 'Crocs', 'For all genders and ages', 14, 1, 8, '../images/Proizvodi/Obuća/Kroksice/1.png'),
(21, 'Diving glasses', 'Diving glasses for diving', 16, 1, 9, '../images/Proizvodi/Ronilačka/Maske/1.png'),
(22, 'Diving mask', 'Diving mask with snorkel', 26, 1, 9, '../images/Proizvodi/Ronilačka/Maske/2.png'),
(23, 'Flippers', 'Proffesional diving flippers', 38, 1, 10, '../images/Proizvodi/Ronilačka/Peraje/1.png'),
(24, 'Ball', 'Beach inflatable ball', 12, 1, 11, '../images/Proizvodi/Igračke/Pijesak/1.png'),
(25, 'Beach play set', 'Bucket and shovel for sand', 8, 1, 11, '../images/Proizvodi/Igračke/Pijesak/2.png'),
(26, 'Mattress', 'Beach mattress', 15, 1, 12, '../images/Proizvodi/Igračke/Luftići/1.png'),
(27, 'Parasol', 'Big parasol for sun protection', 35, 1, 13, '../images/Proizvodi/Dodaci/Suncobrani/1.png'),
(28, 'Sunglasses', 'Sunglasses for beach', 30, 1, 14, '../images/Proizvodi/Dodaci/Naočale/1.png'),
(29, 'Hat', 'Straw hat for beach', 12, 1, 15, '../images/Proizvodi/Dodaci/Šeširi/1.png'),
(30, 'Towel', 'Big colourful cotton beach towel', 20, 1, 16, '../images/Proizvodi/Dodaci/Ručnici/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `valute`
--

CREATE TABLE IF NOT EXISTS `valute` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `valuta` varchar(15) NOT NULL,
  `valuta kratko` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `valute`
--

INSERT INTO `valute` (`id`, `valuta`, `valuta kratko`) VALUES
(1, 'Kuna', 'Kn'),
(2, 'Euro', '€'),
(3, 'Dolar', '$');

-- --------------------------------------------------------

--
-- Table structure for table `velicine`
--

CREATE TABLE IF NOT EXISTS `velicine` (
  `id` int(1) NOT NULL,
  `velicina` varchar(3) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `velicine`
--

INSERT INTO `velicine` (`id`, `velicina`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `vrste`
--

CREATE TABLE IF NOT EXISTS `vrste` (
  `id` int(2) NOT NULL,
  `vrsta` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrste`
--

INSERT INTO `vrste` (`id`, `vrsta`) VALUES
(1, 'Muške majice'),
(2, 'Muške hlače'),
(3, 'Muški kupaći'),
(4, 'Ženske majice'),
(5, 'Ženske hlače'),
(6, 'Ženski kupaći'),
(7, 'Japanke'),
(8, 'Kroksice'),
(9, 'Maske i disaljke'),
(10, 'Peraje'),
(11, 'Igračke za pijesak'),
(12, 'Luftići'),
(13, 'Suncobrani'),
(14, 'Naočale'),
(15, 'Šeširi'),
(16, 'Ručnici');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
