-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: Ne 20.Jan 2019, 12:13
-- Verzia serveru: 10.1.31-MariaDB
-- Verzia PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `id8508724_0000000000`
--
CREATE DATABASE IF NOT EXISTS `id8508724_0000000000` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id8508724_0000000000`;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `sensors_table`
--

CREATE TABLE `sensors_table` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temperature1` int(11) NOT NULL DEFAULT '-100',
  `temperature2` int(11) NOT NULL DEFAULT '-100',
  `humidity1` int(11) NOT NULL DEFAULT '-100',
  `humidity2` int(11) NOT NULL DEFAULT '-100',
  `location` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `sensors_table`
--

INSERT INTO `sensors_table` (`time`, `temperature1`, `temperature2`, `humidity1`, `humidity2`, `location`) VALUES
('2019-01-19 23:41:12', 29, -100, 30, -100, 'heater'),
('2019-01-19 23:56:13', 29, -100, 30, -100, 'heater'),
('2019-01-20 00:11:14', 29, -100, 28, -100, 'heater'),
('2019-01-20 00:26:14', 32, -100, 22, -100, 'heater'),
('2019-01-20 00:56:30', 34, -100, 20, -100, 'heater'),
('2019-01-20 01:11:31', 30, -100, 28, -100, 'heater'),
('2019-01-20 01:26:31', 30, -100, 29, -100, 'heater'),
('2019-01-20 01:41:31', 32, -100, 24, -100, 'heater'),
('2019-01-20 01:56:32', 31, -100, 26, -100, 'heater'),
('2019-01-20 02:11:33', 29, -100, 31, -100, 'heater'),
('2019-01-20 02:26:33', 26, -100, 33, -100, 'heater'),
('2019-01-20 02:41:34', 26, -100, 33, -100, 'heater'),
('2019-01-20 02:56:34', 34, -100, 19, -100, 'heater'),
('2019-01-20 03:11:35', 43, -100, 15, -100, 'heater'),
('2019-01-20 03:26:35', 36, -100, 17, -100, 'heater'),
('2019-01-20 03:41:36', 31, -100, 28, -100, 'heater'),
('2019-01-20 03:56:36', 28, -100, 31, -100, 'heater'),
('2019-01-20 04:11:37', 28, -100, 29, -100, 'heater'),
('2019-01-20 04:26:38', 28, -100, 29, -100, 'heater'),
('2019-01-20 04:41:38', 33, -100, 24, -100, 'heater'),
('2019-01-20 04:56:39', 32, -100, 25, -100, 'heater'),
('2019-01-20 05:11:39', 31, -100, 28, -100, 'heater'),
('2019-01-20 05:26:40', 28, -100, 30, -100, 'heater'),
('2019-01-20 05:41:40', 31, -100, 27, -100, 'heater'),
('2019-01-20 05:56:41', 31, -100, 28, -100, 'heater'),
('2019-01-20 06:11:41', 30, -100, 29, -100, 'heater'),
('2019-01-20 06:26:42', 28, -100, 31, -100, 'heater'),
('2019-01-20 06:41:43', 26, -100, 36, -100, 'heater'),
('2019-01-20 06:56:43', 26, -100, 36, -100, 'heater'),
('2019-01-20 07:11:44', 31, -100, 28, -100, 'heater'),
('2019-01-20 07:26:44', 30, -100, 28, -100, 'heater'),
('2019-01-20 07:41:45', 34, -100, 22, -100, 'heater'),
('2019-01-20 07:56:46', 32, -100, 25, -100, 'heater'),
('2019-01-20 08:11:46', 29, -100, 30, -100, 'heater'),
('2019-01-20 08:26:47', 32, -100, 26, -100, 'heater'),
('2019-01-20 08:57:02', 31, -100, 29, -100, 'heater'),
('2019-01-20 09:12:03', 28, -100, 32, -100, 'heater'),
('2019-01-20 09:27:03', 26, -100, 36, -100, 'heater'),
('2019-01-20 09:42:04', 27, -100, 34, -100, 'heater'),
('2019-01-20 09:57:04', 29, -100, 32, -100, 'heater'),
('2019-01-20 10:27:20', 33, -100, 26, -100, 'heater'),
('2019-01-20 10:42:21', 30, -100, 29, -100, 'heater'),
('2019-01-20 10:57:21', 29, -100, 32, -100, 'heater'),
('2019-01-20 11:12:22', 30, -100, 29, -100, 'heater'),
('2019-01-20 11:27:23', 28, -100, 31, -100, 'heater'),
('2019-01-20 11:42:23', 26, -100, 32, -100, 'heater'),
('2019-01-20 11:57:23', 30, -100, 27, -100, 'heater'),
('2019-01-20 12:12:24', 30, -100, 26, -100, 'heater');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `sensors_table`
--
ALTER TABLE `sensors_table`
  ADD PRIMARY KEY (`time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
