-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 fév. 2022 à 15:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `calendar`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `RESId` int(11) NOT NULL AUTO_INCREMENT,
  `RESParticipant` int(30) NOT NULL,
  `RESTypeReservation` varchar(50) NOT NULL,
  `RESDateDebut` datetime NOT NULL,
  `RESDateFin` datetime NOT NULL,
  `RESMotif` mediumtext NOT NULL,
  `USEREmail` varchar(255) NOT NULL,
  PRIMARY KEY (`RESId`),
  KEY `USEREmail` (`USEREmail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`RESId`, `RESParticipant`, `RESTypeReservation`, `RESDateDebut`, `RESDateFin`, `RESMotif`, `USEREmail`) VALUES
(3, 5, 'Reunion', '2022-02-28 15:24:27', '2022-02-28 16:24:27', 'peizpofpsf', 'blabla@gmail.com'),
(4, 5, 'Reunion', '2022-02-24 15:18:06', '2022-02-24 15:18:06', 'motifi alpha', 'admin@mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `PRIVILEGEId` int(11) NOT NULL AUTO_INCREMENT,
  `PRIVILEGENom` varchar(255) NOT NULL,
  PRIMARY KEY (`PRIVILEGEId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `privilege`
--

INSERT INTO `privilege` (`PRIVILEGEId`, `PRIVILEGENom`) VALUES
(1, 'admin'),
(2, 'secretary'),
(3, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `USEREmail` varchar(255) NOT NULL,
  `USERPassWord` varchar(255) NOT NULL,
  `USERRSocial` varchar(255) NOT NULL,
  `USERAdresse` varchar(255) NOT NULL,
  `USERCodePostal` varchar(16) NOT NULL,
  `USERVille` varchar(255) NOT NULL,
  `USERPays` varchar(255) NOT NULL,
  `USERTelFix` varchar(32) DEFAULT NULL,
  `USERTelMobile` varchar(32) NOT NULL,
  `PRIVILEGEId` int(11) NOT NULL,
  PRIMARY KEY (`USEREmail`),
  KEY `PRIVILEGEId` (`PRIVILEGEId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`USEREmail`, `USERPassWord`, `USERRSocial`, `USERAdresse`, `USERCodePostal`, `USERVille`, `USERPays`, `USERTelFix`, `USERTelMobile`, `PRIVILEGEId`) VALUES
('admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'adress', '69001', 'dijon', 'france', '0451786598', '0601456922', 1),
('test@mail.com', '098f6bcd4621d373cade4e832627b4f6', 'nom', 'adresse23', '69002', 'lyon', 'France', '0456982354', '0601456922', 3),
('user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'adress', '69001', 'dijon', 'france', '0451786598', '0601456922', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`USEREmail`) REFERENCES `users` (`USEREmail`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `PRIVILEGEId` FOREIGN KEY (`PRIVILEGEId`) REFERENCES `privilege` (`PRIVILEGEId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`PRIVILEGEId`) REFERENCES `privilege` (`PRIVILEGEId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
