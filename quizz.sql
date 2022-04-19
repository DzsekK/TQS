-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 19. 10:53
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `quizz`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalo_nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` char(150) COLLATE utf8_hungarian_ci NOT NULL,
  `pontszam` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalo_nev`, `email`, `password`, `pontszam`) VALUES
(1, 'potyi', 'teszt@example.com', '$2y$10$kw4wP3SEW3cofRp6zY.Bi.JoV5imfYne3Up3zkCa5amMf/.W.TtI6', 1000),
(12, 'Robot11', 'prob12@gmail.com', '$2y$10$UmKWbAZdWVNFyGG81kz1o.XmL1.sv/t2XBXAirLEGQPEjBLqyAQFu', 800),
(4, 'teszt', 'teszt@teszt.com', '$2y$10$RMFwk/NhR4e28YEuXZT6xOanBBohX.Zf1RCACvsQZwNCvNLrZSj8S', 500),
(11, 'Valamiii', 'proba@gmail.com', '$2y$10$9yE7jcPsB.15h79lXNRHheNQsWlSjUK3Syi6JXJEb4GKPd0zL7dYy', 350),
(9, 'example', 'example@teszt.com', '$2y$10$kTKCkqQJoVRON7htzY9AVO2XDj8xoljQPtIgWyqmCL1LacKcSoyJK', 900),
(10, 'Admin', 'Admin@example.com', '$2y$10$MVWg.XaBApU6faMF4njU3unKIpHf1wwF12ZZwUmv8xCizwbRrX0Zq', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek`
--

CREATE TABLE `kerdesek` (
  `id` int(11) NOT NULL,
  `leiras` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `temakor_id` int(11) NOT NULL,
  `nehezsegiszint_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kerdesek`
--

INSERT INTO `kerdesek` (`id`, `leiras`, `temakor_id`, `nehezsegiszint_id`) VALUES
(1, 'Melyik városunk viselte a Campona nevet a római biroldalom idején?', 1, 1),
(2, 'Melyik városunk viselte a Matrica nevet a római biroldalom idején?', 1, 1),
(3, 'Melyik városunk viselte a Aegopolis nevet a római biroldalom idején?', 1, 2),
(4, 'Melyik városunk viselte a Intercisa nevet a római biroldalom idején?', 1, 3),
(5, 'Melyik városunk viselte a Lavia nevet a római biroldalom idején?', 1, 3),
(6, 'Honnan származik a Westie?', 2, 1),
(7, 'Honnan származik a Malinois?', 2, 3),
(8, 'Honnan származik a Szamojed?', 2, 2),
(12, 'Melyik rendező vett részt a 70-es évek Colombo sorozatának néhány részének rendezésében?', 3, 4),
(11, 'Honnan származik a Beauceron?', 2, 1),
(13, 'Melyik nem Hitchcock film?', 3, 1),
(14, 'ez itt egy kérdés', 1, 1),
(15, 'fsdfdhggfdas', 1, 1),
(16, 'csfdfdg', 1, 1),
(17, 'yíxccmn', 1, 1),
(18, 'A leghúségesebb barát?', 2, 1),
(19, 'dsdfdg', 1, 1),
(20, 'fdgdgfh', 1, 1),
(21, 'sfdsdg', 2, 2),
(22, 'xygfdhgf', 1, 1),
(23, 'dfg', 1, 1),
(24, 'scxvcb', 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nehezsegiszint`
--

CREATE TABLE `nehezsegiszint` (
  `id` int(11) NOT NULL,
  `leiras` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `pont` int(11) NOT NULL,
  `valaszido` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `nehezsegiszint`
--

INSERT INTO `nehezsegiszint` (`id`, `leiras`, `pont`, `valaszido`) VALUES
(1, 'kezdő', 10, 60),
(2, 'haladó', 50, 70),
(3, 'nehéz', 100, 80),
(4, 'profi', 500, 100);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `quizzek`
-- (Lásd alább az aktuális nézetet)
--
CREATE TABLE `quizzek` (
`id` int(11)
,`leiras` varchar(255)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `quizzkview`
-- (Lásd alább az aktuális nézetet)
--
CREATE TABLE `quizzkview` (
`id` int(11)
,`leiras` varchar(255)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `temakorok`
--

CREATE TABLE `temakorok` (
  `id` int(11) NOT NULL,
  `leiras` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `temakorok`
--

INSERT INTO `temakorok` (`id`, `leiras`) VALUES
(1, 'Pannonia'),
(2, 'Fajta'),
(3, 'Rendezők'),
(4, '80-as évek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `valaszok`
--

CREATE TABLE `valaszok` (
  `id` int(11) NOT NULL,
  `leiras` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `kerdes_id` int(11) DEFAULT NULL,
  `helyes` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `valaszok`
--

INSERT INTO `valaszok` (`id`, `leiras`, `kerdes_id`, `helyes`) VALUES
(1, 'Gyöngyös', 1, 0),
(2, 'Dombóvár', 1, 0),
(3, 'Kaposvár', 1, 0),
(4, 'Nagytétény', 1, 1),
(5, 'Százhalombatta', 2, 1),
(6, 'Badacsony', 2, 0),
(7, 'Csopak', 2, 0),
(8, 'Pécs', 2, 0),
(9, 'Dombóvár', 3, 0),
(10, 'Kecskemét', 3, 1),
(11, 'Zalaegerszeg', 3, 0),
(12, 'Badacsony', 3, 0),
(13, 'Dunaújváros', 4, 1),
(14, 'Pécs', 4, 0),
(15, 'Dombóvár', 4, 0),
(16, 'Kecskemét', 4, 0),
(17, 'Kecskemét', 4, 0),
(18, 'Dombóvár', 4, 1),
(19, 'Eger', 4, 0),
(20, 'Pécs', 4, 0),
(21, 'Nagy-Brittania', 6, 1),
(22, 'Franciaország', 6, 0),
(23, 'Írország', 6, 0),
(24, 'Skócia', 6, 0),
(25, 'Belgium', 7, 1),
(26, 'Franciaország', 7, 0),
(27, 'Nagy-Brittania', 7, 0),
(28, 'Kanada', 7, 0),
(29, 'Franciaország', 8, 0),
(30, 'Oroszország', 8, 1),
(31, 'Kanada', 8, 0),
(32, 'Egyesült Államok', 8, 0),
(33, 'Belgium', 9, 0),
(34, 'Franciaország', 9, 1),
(35, 'Kanada', 9, 0),
(36, 'Svájc', 9, 0),
(37, 'Francis Ford Coppola', 10, 0),
(38, 'Martin Scorsese', 10, 0),
(39, 'Steven Spliberg', 10, 1),
(40, 'Peter Jackson', 10, 0),
(41, 'Ördöngösök', 11, 1),
(42, 'Hátsó ablak', 11, 0),
(43, 'Szédülés', 11, 0),
(44, 'Topáz', 11, 0),
(45, 'fedfgfgh', 15, 1),
(46, 'cydvxfc', 1, 1),
(47, 'dfgfjhgkjhg', 24, 1);

-- --------------------------------------------------------

--
-- Nézet szerkezete `quizzek`
--
DROP TABLE IF EXISTS `quizzek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quizzek`  AS   (select `kerdesek`.`id` AS `id`,`nehezsegiszint`.`leiras` AS `leiras` from (`kerdesek` join `nehezsegiszint` on(`kerdesek`.`nehezsegiszint_id` = `nehezsegiszint`.`id`)))  ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `quizzkview`
--
DROP TABLE IF EXISTS `quizzkview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quizzkview`  AS   (select `kerdesek`.`id` AS `id`,`nehezsegiszint`.`leiras` AS `leiras` from (`kerdesek` join `nehezsegiszint` on(`kerdesek`.`nehezsegiszint_id` = `nehezsegiszint`.`id`)))  ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalo_nev` (`felhasznalo_nev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `kerdesek`
--
ALTER TABLE `kerdesek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temakor_id` (`temakor_id`),
  ADD KEY `nehezsegiszint_id` (`nehezsegiszint_id`);

--
-- A tábla indexei `nehezsegiszint`
--
ALTER TABLE `nehezsegiszint`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `temakorok`
--
ALTER TABLE `temakorok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `valaszok`
--
ALTER TABLE `valaszok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kerdes_id` (`kerdes_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `kerdesek`
--
ALTER TABLE `kerdesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `nehezsegiszint`
--
ALTER TABLE `nehezsegiszint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `temakorok`
--
ALTER TABLE `temakorok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `valaszok`
--
ALTER TABLE `valaszok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
