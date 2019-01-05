-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 jan. 2019 à 19:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `talent_manager`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Utilisateur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PNom_Utilisateur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Mail_Utilisateur` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Mdp_Utilisateur` text CHARACTER SET latin1 NOT NULL,
  `Id_Adresse` int(11) DEFAULT NULL,
  `Id_Offre` int(11) DEFAULT NULL,
  `Id_Offre_OFFRES` int(11) DEFAULT NULL,
  `Id_Type` int(11) DEFAULT NULL,
  `Id_Cv` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Utilisateur`),
  UNIQUE KEY `UTILISATEUR_ADRESSE_AK` (`Id_Adresse`),
  KEY `UTILISATEUR_OFFRES0_FK` (`Id_Offre`),
  KEY `UTILISATEUR_OFFRES1_FK` (`Id_Offre_OFFRES`),
  KEY `UTILISATEUR_TYPE_U2_FK` (`Id_Type`),
  KEY `UTILISATEUR_CANDIDAT_CV3_FK` (`Id_Cv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `UTILISATEUR_ADRESSE_FK` FOREIGN KEY (`Id_Adresse`) REFERENCES `adresse` (`Id_Adresse`),
  ADD CONSTRAINT `UTILISATEUR_CANDIDAT_CV3_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`),
  ADD CONSTRAINT `UTILISATEUR_OFFRES0_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `UTILISATEUR_OFFRES1_FK` FOREIGN KEY (`Id_Offre_OFFRES`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `UTILISATEUR_TYPE_U2_FK` FOREIGN KEY (`Id_Type`) REFERENCES `type_u` (`Id_Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
