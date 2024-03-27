-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 27.Mar 2024, 13:09
-- Verzia serveru: 10.4.24-MariaDB
-- Verzia PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `cerny3a2`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'filip', '$2y$10$k1kMgKBzi0mscjq9FFEbpebR4x.Hd1.YwIs.e3Y0PB0ZION/IuI3u', 'filip@filip.com'),
(2, 'ferko', 'heslo', 'ferko@ferko.com'),
(3, 'anicka', '$2y$10$MXQIC3ZyAyuU9g5GKVzD1OYlRLAIkWAxZJw5BU0sM.Oz5hEiyE65q', 'FILIP@jano.com'),
(4, 'jojzo', '$2y$10$7xFL1/9wvgefBmbUGbrCPuPDsJNOysC.D.kBdzyQ3GA97ujX/ckOC', 'dacdafyacasfvs@fafsdfsdf'),
(5, 'oliver', '$2y$10$8Ob7RtsBtHUpzGOpnql6.uVMwZbVrCnpv41Im6VdEGo3tWpMNTo5O', 'sleyak@sleyak.com');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
