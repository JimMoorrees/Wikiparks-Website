-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 mei 2017 om 11:27
-- Serverversie: 10.1.22-MariaDB
-- PHP-versie: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE `login` (
  `Username` varchar(100) NOT NULL,
  `Password` binary(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`Username`, `Password`) VALUES
('admin', 0x24326124313024654c52765330777473746139594273384166636a444f632f717537796455697a466463756d5178645551535232493063314277414b),
('sampleuser1', 0x73616d706c6570617373776f726400000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('sampleuser2', 0x74657374696e670000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('testuser1', 0x7465737470617373776f7264000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('admin', 0x243261243130242f352f426c4e546d354a7571637545744438305568755174314c6f4547326c502f6c76432e776b344c7147586c575966316d624d4f),
('admin', 0x2432612431302465342f6f70564c58747761376b5044396c346b45387576306d6e4668547a6b59592e6e594e52444234564c65467354674a65305657);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'Stan', '$2y$10$X7ZBySJzkpfk8JSvXSKTmuBpYsEIMvYvVvtJxMCZWVfqTWvxsGKoO', 'stanrutten242@hotmail.com', 'ce1eb68af71d480a0e4b0a199b306b04', NULL, 'No');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `park`
--

CREATE TABLE `park` (
  `ParkId` int(50) NOT NULL,
  `ParkNaam` varchar(50) NOT NULL,
  `ParkLocatie` varchar(50) NOT NULL,
  `ParkOpeningsDagen` varchar(50) NOT NULL,
  `ParkOpeningsTijden` int(11) NOT NULL,
  `ParkPrijzen` varchar(50) NOT NULL,
  `ParkLeeftijden` int(11) NOT NULL,
  `ParkTags` varchar(50) NOT NULL,
  `ParkBeschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `park`
--

INSERT INTO `park` (`ParkId`, `ParkNaam`, `ParkLocatie`, `ParkOpeningsDagen`, `ParkOpeningsTijden`, `ParkPrijzen`, `ParkLeeftijden`, `ParkTags`, `ParkBeschrijving`) VALUES
(4, 'Efteling', 'Noord-Brabant - Kaatsheuvel', 'De Efteling is alle dagen van het jaar geopend', 10, '€35,50 - €37,50', 0, '0', 'yes'),
(5, 'stomp', 'mark', 'helemaal', 12, '12', 12, 'home,mark,faillekr,fakkgit', 'kaas is goet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(12, 'stanrutten242@hotmail.com', '$2y$10$v1LGvUdohWdLLLLenfWfLOINyKmVGk3bLdlXgq8x45EWIZ7ZMSErm');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexen voor tabel `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`ParkId`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `park`
--
ALTER TABLE `park`
  MODIFY `ParkId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
