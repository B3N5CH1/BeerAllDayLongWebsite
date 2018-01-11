-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jan 2018 um 10:21
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `beerbeerbeer`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `client`
--

CREATE TABLE `client` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client` varchar(50) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description_de` varchar(4000) NOT NULL,
  `description_fr` varchar(4000) NOT NULL,
  `description_en` varchar(4000) NOT NULL,
  `size` int(11) NOT NULL,
  `price` float NOT NULL,
  `percentage` float NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `waitingorders`
--

CREATE TABLE `waitingorders` (
  `id` int(11) NOT NULL,
  `client` varchar(55) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product` (`product`),
  ADD KEY `fk_email_client` (`client`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `waitingorders`
--
ALTER TABLE `waitingorders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT für Tabelle `waitingorders`
--
ALTER TABLE `waitingorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`name`, `description_de`, `description_fr`, `description_en`, `size`, `price`, `percentage`, `brand`, `type`, `nationality`) VALUES
('Lapin Kulta', 'Bier', 'Bière', 'Beer', 33, 3.4, 5.2, 'Lapin Kulta', 'Blonde', 'FIN'),
('Becks', 'Bier', 'Bière', 'Beer', 50, 2.5, 4.9, 'Becks', 'Blonde', 'GER'),
('Becks', 'Bier', 'Bière', 'Beer', 3000, 125, 4.9, 'Becks', 'Blonde', 'GER'),
('Flensburger Winterbock', 'Bier', 'Bière', 'Beer', 33, 3.5, 7, 'Flensburger', 'Special', 'GER'),
('Paulaner Hefe', 'Bier', 'Bière', 'Beer', 50, 3.2, 5.5, 'Paulaner', 'White', 'GER'),
('Schneider Weisse', 'Bier', 'Bière', 'Beer', 50, 3.1, 5.4, 'Schneider', 'White', 'GER'),
('Aare Amber', 'Bier', 'Bière', 'Beer', 30, 2.4, 5, 'Aare Bier', 'Blonde', 'SWI'),
('Burgdorfer Helles', 'Bier', 'Bière', 'Beer', 50, 3.6, 4.9, 'Burgdorfer', 'Blonde', 'SWI'),
('Doppelleu Chopfab Hell', 'Bier', 'Bière', 'Beer', 33, 2.4, 5, 'Doppelleu', 'Blonde', 'SWI'),
('Boon Framboise', 'Bier', 'Bière', 'Beer', 37, 4.5, 5, 'F. Boon', 'Fruit', 'BEL'),
('Chimay Blonde', 'Bier', 'Bière', 'Beer', 33, 3.4, 8, 'Chimay', 'Blonde', 'BEL'),
('Hoegaarden Blanche', 'Bier', 'Bière', 'Beer', 33, 2.8, 4.9, 'Hoegaarden', 'White', 'BEL'),
('Hoegaarden Blanche', 'Bier', 'Bière', 'Beer', 75, 4.1, 4.9, 'Hoegaarden', 'White', 'BEL'),
('Duvel Blonde', 'Bier', 'Bière', 'Beer', 33, 3.5, 8.5, 'Duvel', 'Blonde', 'BEL'),
('BierBienne 1', 'Bier', 'Bière', 'Beer', 33, 2.5, 5.2, 'BierBienne', 'Blonde', 'SWI'),
('BierBienne 2', 'Bier', 'Bière', 'Beer', 33, 2.7, 5, 'BierBienne', 'Blonde', 'SWI'),
('BierBienne 2', 'Bier', 'Bière', 'Beer', 2000, 110, 5.8, 'BierBienne', 'Blonde', 'SWI'),
('BierBienne 3', 'Bier', 'Bière', 'Beer', 33, 2.8, 5.8, 'BierBienne', 'IPA', 'SWI'),
('BierBienne 3', 'Bier', 'Bière', 'Beer', 2000, 120, 5.8, 'BierBienne', 'IPA', 'SWI'),
('Guinness', 'Bier', 'Bière', 'Beer', 50, 4.2, 4.1, 'Guinness', 'Dark', 'IRL');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
