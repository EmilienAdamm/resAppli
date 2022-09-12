-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 mars 2022 à 16:19
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
  `RESMotif` varchar(255) NOT NULL,
  `RESFormateur` varchar(255) DEFAULT NULL,
  `USEREmail` varchar(255) NOT NULL,
  PRIMARY KEY (`RESId`),
  KEY `USEREmail` (`USEREmail`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`RESId`, `RESParticipant`, `RESTypeReservation`, `RESDateDebut`, `RESDateFin`, `RESMotif`, `RESFormateur`, `USEREmail`) VALUES
(3, 5, 'Reunion', '2022-03-01 12:54:27', '2022-03-01 14:24:27', 'peizpofpsf', NULL, 'blabla@gmail.com'),
(4, 5, 'Reunion', '2022-02-24 15:18:06', '2022-02-24 15:18:06', 'motifi alpha', NULL, 'admin@mail.com'),
(5, 5, 'Formation', '2022-03-26 15:02:00', '2022-03-26 16:02:00', 'forma', 'michem', 'admin@mail.com'),
(8, 6, 'Reunion', '2022-03-26 15:30:00', '2022-03-26 16:30:00', 'reun en meme temps', '', 'blabla@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `PRIVILEGEId` int(11) NOT NULL AUTO_INCREMENT,
  `PRIVILEGENom` varchar(255) NOT NULL,
  PRIMARY KEY (`PRIVILEGEId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `USERFormateur` tinyint(1) NOT NULL,
  `PRIVILEGEId` int(11) NOT NULL,
  PRIMARY KEY (`USEREmail`),
  KEY `PRIVILEGEId` (`PRIVILEGEId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`USEREmail`, `USERPassWord`, `USERRSocial`, `USERAdresse`, `USERCodePostal`, `USERVille`, `USERPays`, `USERTelFix`, `USERTelMobile`, `USERFormateur`, `PRIVILEGEId`) VALUES
('admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'adress', '69001', 'dijon', 'france', '0451786598', '0601456922', 0, 1),
('adrien.barrat91@gmail.com', '0f22b8ad50630e087b8f240acb6a785d', 'nom_societex', 'adresse 23', '75016', 'paris', 'france', '0169854569', '0601456922', 0, 3),
('alou@gmail.com', '63d869d65fb0f2290e8f3e9f893a7a4b', 'chomage', '23 rue pierre castor', '69004', 'venissieux', 'France', '0514586325', '0605010301', 0, 3),
('blabla@gmail.com', 'df5ea29924d39c3be8785734f13169c6', 'blabla', 'adress', '69001', 'dijon', 'france', '0451786598', '0601456922', 0, 3),
('mail@mail.mail', 'b83a886a5c437ccd9ac15473fd6f1788', 'mail', 'mail 26', '59871', 'Ville', 'Pays', '0514586325', '0601456922', 0, 3),
('michel@michel.michel', 'd780182f77b121450849c2b088a444f0', 'michel', '23 rue du michel', '9100', 'Evry', 'France', '0514586325', '0605010301', 1, 3),
('test@mail.com', '098f6bcd4621d373cade4e832627b4f6', 'nom', 'adresse23', '69002', 'lyon', 'France', '0456982354', '0601456922', 0, 3),
('user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'adress', '69001', 'dijon', 'france', '0451786598', '0601456922', 0, 2);

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
