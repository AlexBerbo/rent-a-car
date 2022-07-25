-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 09:04 PM
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
-- Database: `carrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `idcar` int(11) NOT NULL,
  `naziv` varchar(80) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `cena` int(11) NOT NULL,
  `idkategorija` int(11) NOT NULL,
  `slika` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`idcar`, `naziv`, `opis`, `cena`, `idkategorija`, `slika`) VALUES
(1, 'Tesla Model S', 'Potpuno električni Tesla Model S je impresivno kompetentan luksuzni elektricni automobil sa visokim performansama, udobnosti i dometa.', 600, 1, 'tesla.jpg'),
(2, 'Porsche Taycan TURBO S', 'Impresivne, ponovljive vrhunske performanse i revolucionarna tehnologija.', 700, 1, 'taycan.jpg'),
(3, 'Audi RS E-Tron GT', 'RS e-tron GT je napravljen zajedno sa legendarnim Audijem R8 u fabrici Bollinger Hofe u Nemačkoj, gde se pažnja posvećena detaljima susreće sa preciznošću i kvalitetom.', 600, 1, 'e tron.jpg'),
(4, 'BMW i4', 'Električni BMW i4 limuzina je važan deo BMW-ovog portfolija elektricnih vozila. Grand Coupe serije 4 sa baterijskim pogonom i veoma udobnim i sportskim manirima na putu.', 650, 1, 'i4.jpg'),
(5, 'Lamborghini Huracan Performant', 'Huracan Performante je preradio koncept super sportskih automobila i podigao pojam performansi na nivoe nikada ranije.', 600, 2, 'huracan.jpg'),
(6, 'Audi R8', 'Audi R8 performance Coupe pokazuje svoj motorsportski DNK sa V10 motorom od 610 KS.', 550, 2, 'r8.jpg'),
(7, 'Nismo GTR', 'Otkrijte Nissan GT-R NISMO 2021: sportski automobil sa 4 sedišta sa legendarnim istorijskim trkačkim nasleđem.', 700, 2, 'nismo.jpg'),
(8, 'McLaren P1', 'Otkrijte McLaren P1 sportski automobil - dizajniran, projektovan i napravljen da bude najbolji automobil za vozače na svetu, inspirisan legendarnim F1 modelom.', 1000, 2, 'p1.jpg'),
(9, 'VW Passat', 'Volkswagen Passat 2022 ima dobro izrađen luksuzni enterijer koji će pružiti udobnost celoj vašoj posadi.', 150, 3, 'passat.jpg'),
(10, 'Audi RS6', 'Sa snažnim konjskim snagama i puno prostora za prtljag, 2022 RS6 Avant donosi fuziju sporta, korisnosti i udobnosti za celu vašu posadu.', 300, 3, 'rs6.jpg'),
(11, 'Audi RS4', 'Performanse superautomobila i praktičnost Audi Avant-a. Ova dva različita kvaliteta su savršeno kombinovana u novom Audiju RS 4 Avant.', 250, 3, 'rs4.jpg'),
(12, 'Skoda Superb', 'Škoda Superb 2022 ima dobro izrađen luksuzni enterijer koji će pružiti udobnost celoj vašoj posadi.', 125, 3, 'superb.jpg'),
(13, 'BMW M760Li', 'BMW Serije 7 limuzina danas ispunjava zahteve sutrašnjice kao nijedno drugo vozilo: bilo da se radi o luksuzu, udobnosti ili vodećim inovacijama.', 1400, 4, 'm760.jpg'),
(14, 'Mercedes Benz S63s AMG', 'Na mnogo načina, Mercedes-Benz S-klasa predstavlja najbolje od najboljih ako ste na tržištu za veliki luksuzni automobil.', 1000, 4, 's63.jpg'),
(15, 'Audi S8', 'Brza i razigrana sportska limuzina izuzetno velike veličine, Audi S8 kombinuje udobnost unutrašnjosti sa snažnim performansama koje spajaju najbolje iz oba sveta.', 900, 4, 's8.jpg'),
(18, 'Rolls Royse Phantom Series II', 'Vrhunski Rolls-Roice, Phantom Series II je legendarni maverick i ikona neponovljivog savršenstva.', 4500, 2, 'roys.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idkategorija` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idkategorija`, `naziv`, `opis`) VALUES
(1, 'Elektricni Automobili', 'Poptuno elektricni automobili sa visokim nivoom komfora i performansi.'),
(2, 'Motor Sport Automobili', 'Motor Sport DNK legalan za javne puteve za najbolje performanse za stazu i autobahn.'),
(3, 'Autobahn Kruzeri', 'Automobili maksimalnog komfora, ekonomičnosti, snage i praktičnosti za porodična i duga putovanja.\r\n'),
(4, 'Luksuzne Limuzine', 'Najluksuzniji automobili sa najvecim nivoom komfora i nove tehnologije.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idkorisnik` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idkorisnik`, `ime`, `prezime`, `email`, `username`, `password`) VALUES
(2, 'Bojan', 'Gtr', 'bojan@sarkic.com', 'bojansarkic', 'bojansarkic'),
(3, 'Mima', 'Berbo', 'mima@berbo.com', 'mimaberbo', 'mimaberbo'),
(4, 'alex', 'berbo', 'alex@email.com', 'alex', '123');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idkorpa` int(11) NOT NULL,
  `datum` date NOT NULL,
  `idkorisnik` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `username`, `password`) VALUES
(1, 'petarpetar', 'petarpetar'),
(2, 'aleksa', 'aleksa1');

-- --------------------------------------------------------

--
-- Table structure for table `rezrvacija`
--

CREATE TABLE `rezrvacija` (
  `idrezervacija` int(11) NOT NULL,
  `datum` date NOT NULL,
  `ukupno` int(11) NOT NULL,
  `idkorisnik` int(11) NOT NULL,
  `idcar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezrvacija`
--

INSERT INTO `rezrvacija` (`idrezervacija`, `datum`, `ukupno`, `idkorisnik`, `idcar`) VALUES
(67, '2022-08-04', 64, 4, 4),
(71, '2022-08-07', 70, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idkategorija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idkorisnik`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idkorpa`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezrvacija`
--
ALTER TABLE `rezrvacija`
  ADD PRIMARY KEY (`idrezervacija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idkategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idkorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idkorpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rezrvacija`
--
ALTER TABLE `rezrvacija`
  MODIFY `idrezervacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
