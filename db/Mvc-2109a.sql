  ---Lazar Zongana---

  -- phpMyAdmin SQL Dump
  -- version 5.2.0
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1:3306
  -- Gegenereerd op: 12 jan 2023 om 16:51
  -- Serverversie: 5.7.36
  -- PHP-versie: 8.1.10

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `Mvc-2109a`
  --

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `auto`
  --

  DROP TABLE IF EXISTS `auto`;
  CREATE TABLE IF NOT EXISTS `auto` (
    `Id` int(11) NOT NULL AUTO_INCREMENT,
    `Kenteken` varchar(8) NOT NULL,
    `Type` varchar(100) NOT NULL,
    `InstructeurId` int(11) NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `InstructeurId` (`InstructeurId`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `auto`
  --

  INSERT INTO `auto` (`Id`, `Kenteken`, `Type`, `InstructeurId`) VALUES
  (1, 'AU-67-IO', 'Golf', 3),
  (2, 'TH-78-KL', 'Ferrari', 2),
  (3, '90-KL-TR', 'Fiat 500', 4),
  (4, 'YY-OP-78', 'Mercedes', 5),
  (5, 'ST-FZ-28', 'Citroen', 1);

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `country`
  --

  DROP TABLE IF EXISTS `country`;
  CREATE TABLE IF NOT EXISTS `country` (
    `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Name` varchar(100) NOT NULL,
    `CapitalCity` varchar(100) NOT NULL,
    `Continent` enum('Europa','Azi&euml;','Noord-Amerika','Zuid-Amerika','Oceani&euml;','Antarctica','Afrika') NOT NULL,
    `Population` int(11) NOT NULL,
    PRIMARY KEY (`Id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `country`
  --

  INSERT INTO `country` (`Id`, `Name`, `CapitalCity`, `Continent`, `Population`) VALUES
  (5, 'Belgi&euml;', 'Brussel', 'Europa', 1600000);

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `instructeur`
  --

  DROP TABLE IF EXISTS `instructeur`;
  CREATE TABLE IF NOT EXISTS `instructeur` (
    `Id` int(11) NOT NULL AUTO_INCREMENT,
    `Naam` varchar(100) NOT NULL,
    `Email` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `instructeur`
  --

  INSERT INTO `instructeur` (`Id`, `Naam`, `Email`) VALUES
  (1, 'Groen', 'groen@gmail.com'),
  (2, 'Manhoi', 'manhoi@gmail.com'),
  (3, 'Zoyi', 'zoyi@gmail.com'),
  (4, 'Berthold', 'berthold@gmail.com'),
  (5, 'Denekamp', 'denekamp@gmail.com');

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `instructeur1`
  --

  DROP TABLE IF EXISTS `instructeur1`;
  CREATE TABLE IF NOT EXISTS `instructeur1` (
    `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Email` varchar(255) NOT NULL,
    `Naam` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `instructeur1`
  --

  INSERT INTO `instructeur1` (`Id`, `Email`, `Naam`) VALUES
  (1, 'groen@gmail.com', 'Groen'),
  (2, 'manhoi@gmail.com', 'Manhoi'),
  (3, 'zoyi@gmail.com', 'Zoyi'),
  (4, 'berthold@gmail.com', 'Berthold'),
  (5, 'denekamp@gmail.com', 'Denekamp');

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `leerling`
  --

  DROP TABLE IF EXISTS `leerling`;
  CREATE TABLE IF NOT EXISTS `leerling` (
    `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Naam` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `leerling`
  --

  INSERT INTO `leerling` (`Id`, `Naam`) VALUES
  (3, 'Konijn'),
  (4, 'Slavink'),
  (6, 'Otto');

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `les`
  --

  DROP TABLE IF EXISTS `les`;
  CREATE TABLE IF NOT EXISTS `les` (
    `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `DatumTijd` datetime NOT NULL,
    `LeerlingId` smallint(5) UNSIGNED NOT NULL,
    `InstructeurId` smallint(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `FK_Les_InstructeurId_Instructeur_Id` (`InstructeurId`),
    KEY `FK_Les_LeerlingId_Leerling_Id` (`LeerlingId`)
  ) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `les`
  --

  INSERT INTO `les` (`Id`, `DatumTijd`, `LeerlingId`, `InstructeurId`) VALUES
  (45, '2022-05-20 09:31:14', 3, 1),
  (46, '2022-05-20 14:00:00', 6, 3),
  (47, '2022-05-21 15:00:00', 4, 2),
  (48, '2022-05-21 18:30:00', 6, 3),
  (49, '2022-05-22 21:00:00', 3, 1),
  (50, '2022-06-28 12:00:00', 4, 2),
  (51, '2022-06-01 09:36:06', 3, 2),
  (52, '2022-06-12 16:30:00', 3, 1),
  (53, '2022-06-22 16:30:00', 3, 1);

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `mankement`
  --

  DROP TABLE IF EXISTS `mankement`;
  CREATE TABLE IF NOT EXISTS `mankement` (
    `Id` int(11) NOT NULL AUTO_INCREMENT,
    `AutoId` int(11) NOT NULL,
    `Datum` date NOT NULL,
    `Mankement` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `Autoid` (`AutoId`)
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `mankement`
  --

  INSERT INTO `mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
  (1, 4, '2023-01-04', 'Profiel rechterband minder dan 2mm'),
  (2, 2, '2023-01-02', 'Rechter achterlicht kapot'),
  (3, 1, '2023-01-02', 'Spiegel links afgebroken'),
  (4, 2, '2023-01-06', 'Bumper rechtsachter ingedeukt'),
  (5, 2, '2023-01-08', 'Radio kapot');

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `onderwerp`
  --

  DROP TABLE IF EXISTS `onderwerp`;
  CREATE TABLE IF NOT EXISTS `onderwerp` (
    `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `LesId` smallint(5) UNSIGNED NOT NULL,
    `Onderwerp` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `FK_Onderwerp_LesId` (`LesId`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2357 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `onderwerp`
  --

  INSERT INTO `onderwerp` (`Id`, `LesId`, `Onderwerp`) VALUES
  (2343, 45, 'File Parkeren'),
  (2344, 46, 'Achteruit rijden'),
  (2345, 49, 'File parkeren'),
  (2346, 49, 'Invoegen snelweg'),
  (2347, 50, 'Achteruit rijden'),
  (2348, 52, 'Achteruit rijden'),
  (2349, 52, 'Invoegen snelweg'),
  (2350, 52, 'File parkeren'),
  (2356, 50, 'Test123RRA');

  -- --------------------------------------------------------

  --
  -- Tabelstructuur voor tabel `opmerking`
  --

  DROP TABLE IF EXISTS `opmerking`;
  CREATE TABLE IF NOT EXISTS `opmerking` (
    `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    `LesId` smallint(5) UNSIGNED NOT NULL,
    `Opmerking` varchar(255) NOT NULL,
    PRIMARY KEY (`Id`),
    KEY `FK_Opmerking_LesId` (`LesId`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1130 DEFAULT CHARSET=latin1;

  --
  -- Gegevens worden geëxporteerd voor tabel `opmerking`
  --

  INSERT INTO `opmerking` (`Id`, `LesId`, `Opmerking`) VALUES
  (1123, 45, 'File parkeren kan beter'),
  (1124, 46, 'Beter in de spiegel kijken'),
  (1125, 49, 'Opletten op aankomend verkeer'),
  (1126, 49, 'Langer doorrijden bij invoegen'),
  (1127, 50, 'Langzaam aan'),
  (1128, 52, 'Beter in de spiegels kijken'),
  (1129, 52, 'Richtingaanwijzer aan');

  --
  -- Beperkingen voor geëxporteerde tabellen
  --

  --
  -- Beperkingen voor tabel `auto`
  --
  ALTER TABLE `auto`
    ADD CONSTRAINT `InstructeurId` FOREIGN KEY (`InstructeurId`) REFERENCES `instructeur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Beperkingen voor tabel `les`
  --
  ALTER TABLE `les`
    ADD CONSTRAINT `FK_Les_InstructeurId_Instructeur_Id` FOREIGN KEY (`InstructeurId`) REFERENCES `instructeur1` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_Les_LeerlingId_Leerling_Id` FOREIGN KEY (`LeerlingId`) REFERENCES `leerling` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Beperkingen voor tabel `mankement`
  --
  ALTER TABLE `mankement`
    ADD CONSTRAINT `Autoid` FOREIGN KEY (`AutoId`) REFERENCES `auto` (`Id`);

  --
  -- Beperkingen voor tabel `onderwerp`
  --
  ALTER TABLE `onderwerp`
    ADD CONSTRAINT `FK_Onderwerp_LesId` FOREIGN KEY (`LesId`) REFERENCES `les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Beperkingen voor tabel `opmerking`
  --
  ALTER TABLE `opmerking`
    ADD CONSTRAINT `FK_Opmerking_LesId` FOREIGN KEY (`LesId`) REFERENCES `les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;