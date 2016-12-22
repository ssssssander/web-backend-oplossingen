-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 dec 2016 om 00:59
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdracht-mail`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `time_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `message`, `time_sent`) VALUES
(1, 'aa@ddd.com', 'aaa', '2016-12-21 20:36:46'),
(2, 'emailvoornetflix@gmail.com', 'aaa', '2016-12-21 20:41:23'),
(3, 'emailvoornetflix@gmail.com', 'aaa', '2016-12-21 20:45:30'),
(4, '', '', '2016-12-21 20:46:03'),
(5, '', '', '2016-12-21 20:46:50'),
(6, '', '', '2016-12-21 23:40:54'),
(7, 'r@r.r', 'gfgfgf', '2016-12-21 23:41:04'),
(8, 'aa@ddd.com', 'zz', '2016-12-21 23:41:54'),
(9, 'aa@ddd.com', 'eeee', '2016-12-21 23:42:28'),
(10, 'aa@ddd.com', 'eeee', '2016-12-21 23:42:31'),
(11, 'aa@ddd.com', 'eeeeeee', '2016-12-21 23:42:33'),
(12, 'aa@ddd.com', 'eeeeeeedddd', '2016-12-21 23:42:34'),
(13, 'aa@ddd.comffff', 'eeeeeeedddd', '2016-12-21 23:42:36'),
(14, 'aa@ddd.comffff', 'eff', '2016-12-21 23:42:38'),
(15, 'aa@ddd.comffff', 'eff', '2016-12-21 23:42:39'),
(16, 'aa@ddd.comffff', 'eff', '2016-12-21 23:42:40'),
(17, 'aa@ddd.comffff', 'eff', '2016-12-21 23:42:42'),
(18, '', '', '2016-12-21 23:56:35'),
(19, 'emailvoornetflix@gmail.com', 'abc123', '2016-12-21 23:59:29'),
(20, 'emailvoornetflix@gmail.com', '<p style="color:red;">Hallo!</p>', '2016-12-22 00:01:55'),
(21, 'emailvoornetflix@gmail.com', 'zzz', '2016-12-22 00:05:03'),
(22, 'emailvoornetflix@gmail.com', 'zddz', '2016-12-22 00:05:09'),
(23, 'sander.borret@student.kdg.be', '<h1>hhh</h1>', '2016-12-22 00:05:59'),
(24, 'youtube96@hotmail.be', 'aa', '2016-12-22 00:07:13'),
(25, 'youtube96@hotmail.be', '<h1>aa</h1>', '2016-12-22 00:24:28'),
(26, '', '', '2016-12-22 00:33:48'),
(27, 'l53467@mvrht.com', '<h1>aaa</h1>', '2016-12-22 00:55:22');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
