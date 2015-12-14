-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Nov 29. 15:31
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `szakdolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
--

DROP TABLE IF EXISTS `foglalas`;
CREATE TABLE IF NOT EXISTS `foglalas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `szoba_id` int(11) NOT NULL,
  `mettol` datetime NOT NULL,
  `meddig` datetime NOT NULL,
  `igeny` text COLLATE utf8_hungarian_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szallas_id` int(11) NOT NULL,
  `kepnev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=9 ;

--
-- A tábla adatainak kiíratása `galeria`
--

INSERT INTO `galeria` (`id`, `szallas_id`, `kepnev`) VALUES
(1, 1, '1/3.jpg'),
(2, 1, '1/8.jpg'),
(3, 3, '3/1.jpg'),
(4, 3, '3/2.jpg'),
(5, 3, '3/3.jpg'),
(6, 3, '3/4.jpg'),
(7, 3, '3/5.jpg'),
(8, 3, '3/6.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szallasok`
--

DROP TABLE IF EXISTS `szallasok`;
CREATE TABLE IF NOT EXISTS `szallasok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci,
  `opciok` varchar(11) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kiemelt` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=4 ;

--
-- A tábla adatainak kiíratása `szallasok`
--

INSERT INTO `szallasok` (`id`, `nev`, `varos`, `cim`, `leiras`, `opciok`, `kiemelt`) VALUES
(1, 'Teszt Apartman', 'Pécs', 'Boszorkány utca 2', 'nagyon pöpec ám ez :D', '1;1;1;1;1;1', 1),
(2, 'Zsirkirály Apartman ****', 'Pécs', 'Rókus utca 6.', 'Mit is mondjak róla? talán azt, hogy jó kis hely a kikapcsolódásra.', '1;1;1;1;1;0', 1),
(3, 'Batthyány Kastély Villapark', 'Zalacsány', 'Fő út 2.', 'Villaparkunk apartmanjai\n\nApartmanjaink a fák és lombok csendet és nyugalmat sugalló árnyékában helyezkedne el. Itt mindenki megtalálja a kikapcsolódásához szükséges atmoszférát.\n\nAz apartmanházak 4 különbejáratú nagy és tágas lakással rendelkeznek. Területük 53-60 m2. Exkluzív berendezésű apartmanjaink a következő helyiségeket foglalják magukba:\n\n- amerikai konyha komplett berendezéssel,\n- étkező,nappali,\n- fürdőszoba sarokkáddal és/vagy zuhanyzóval,\n- két hálószoba,\n- földszinti lakásokhoz terasz,\n- emeleti apartmanokhoz előtér.\n\nWellness Centrum szolgáltatásainak kínálata\n\nTermál és élményfürdő Finn Szauna Gőzkabin Edzőterem Sóbarlang Masszázs Dr. Babor Kozmetikai Szalon\n\nWellness Centrum szolgáltatásainak kínálata\n\nTermál és élményfürdő Finn Szauna Gőzkabin Edzőterem Sóbarlang Masszázs Dr. Babor Kozmetikai Szalon\n\nWellness Centrum szolgáltatásainak kínálata\n\nTermál és élményfürdő Finn Szauna Gőzkabin Edzőterem Sóbarlang Masszázs Dr. Babor Kozmetikai Szalon\n\nWellness Centrum szolgáltatásainak kínálata\n\nTermál és élményfürdő Finn Szauna Gőzkabin Edzőterem Sóbarlang Masszázs Dr. Babor Kozmetikai Szalon', '1;1;1;1;1;1', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szobak`
--

DROP TABLE IF EXISTS `szobak`;
CREATE TABLE IF NOT EXISTS `szobak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szallas_id` int(11) NOT NULL,
  `szobaszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `fo` int(2) NOT NULL,
  `ar` int(6) NOT NULL,
  `legter` int(1) NOT NULL,
  `agyak` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `szobak`
--

INSERT INTO `szobak` (`id`, `szallas_id`, `szobaszam`, `fo`, `ar`, `legter`, `agyak`) VALUES
(1, 1, '101', 2, 4990, 2, 2),
(2, 1, '102', 3, 5990, 2, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_hungarian_ci NOT NULL,
  `salt` int(5) NOT NULL,
  `jog` int(1) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `utolsoBelep` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `salt`, `jog`, `nev`, `utolsoBelep`) VALUES
(1, 'g.danika@gmail.com', '1c236d9e01b12cb503306dce8e493625', 12312, 2, 'Gécseg Dániel', '2015-11-29 13:38:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
