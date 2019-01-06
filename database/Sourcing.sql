-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 jan. 2019 à 13:59
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
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `Id_Adresse` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Adresse` int(11) NOT NULL,
  `Voie_Adresse` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Dep_Adresse` int(11) NOT NULL,
  `Ville_Adresse` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_Adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_cv`
--

DROP TABLE IF EXISTS `candidat_cv`;
CREATE TABLE IF NOT EXISTS `candidat_cv` (
  `Id_Cv` int(11) NOT NULL AUTO_INCREMENT,
  `Ficher_Cv` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Titre_Cv` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Description_Cv` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_Cv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cv_experience`
--

DROP TABLE IF EXISTS `cv_experience`;
CREATE TABLE IF NOT EXISTS `cv_experience` (
  `Id_CvE` int(11) NOT NULL AUTO_INCREMENT,
  `Experience_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Entreprise_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Fonction_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_CvE` date NOT NULL,
  `Date_Fin_Cve` date NOT NULL,
  `Description_CvE` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Id_Cv` int(11) NOT NULL,
  PRIMARY KEY (`Id_CvE`),
  KEY `_CV_EXPERIENCE_CANDIDAT_CV_FK` (`Id_Cv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cv_formation`
--

DROP TABLE IF EXISTS `cv_formation`;
CREATE TABLE IF NOT EXISTS `cv_formation` (
  `Id_Formation` int(11) NOT NULL AUTO_INCREMENT,
  `Cv_Formation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Ecole_Formation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_Formation` date NOT NULL,
  `Date_Fin_Formation` date NOT NULL,
  `Description_Formation` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Id_Cv` int(11) NOT NULL,
  PRIMARY KEY (`Id_Formation`),
  KEY `CV_FORMATION_CANDIDAT_CV_FK` (`Id_Cv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `Id_Offre` int(11) NOT NULL AUTO_INCREMENT,
  `Description_Offre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_Offre` date NOT NULL,
  `Date_Fin_Offre` date NOT NULL,
  `Remuneration_Offre` int(11) NOT NULL,
  `Remuneration_Type_Offre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Titre_Offre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Id_Adresse` int(11) NOT NULL,
  `Id_OffreT` int(11) NOT NULL,
  PRIMARY KEY (`Id_Offre`),
  UNIQUE KEY `OFFRES_ADRESSE_AK` (`Id_Adresse`),
  KEY `OFFRES_OFFRES_TYPE0_FK` (`Id_OffreT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `offres_type`
--

DROP TABLE IF EXISTS `offres_type`;
CREATE TABLE IF NOT EXISTS `offres_type` (
  `Id_OffreT` int(11) NOT NULL AUTO_INCREMENT,
  `Type_OffreT` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_OffreT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

DROP TABLE IF EXISTS `postuler`;
CREATE TABLE IF NOT EXISTS `postuler` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Offre`,`Id_Utilisateur`),
  KEY `POSTULER_UTILISATEUR0_FK` (`Id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_u`
--

DROP TABLE IF EXISTS `type_u`;
CREATE TABLE IF NOT EXISTS `type_u` (
  `Id_Type` int(11) NOT NULL AUTO_INCREMENT,
  `Utilisateur_Type` int(11) NOT NULL,
  `Description_Type` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_u`
--

INSERT INTO `type_u` (`Id_Type`, `Utilisateur_Type`, `Description_Type`) VALUES
(1, 0, 'ADMIN'),
(2, 1, 'INTERNE');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  ADD CONSTRAINT `_CV_EXPERIENCE_CANDIDAT_CV_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`);

--
-- Contraintes pour la table `cv_formation`
--
ALTER TABLE `cv_formation`
  ADD CONSTRAINT `CV_FORMATION_CANDIDAT_CV_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `OFFRES_ADRESSE_FK` FOREIGN KEY (`Id_Adresse`) REFERENCES `adresse` (`Id_Adresse`),
  ADD CONSTRAINT `OFFRES_OFFRES_TYPE0_FK` FOREIGN KEY (`Id_OffreT`) REFERENCES `offres_type` (`Id_OffreT`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `POSTULER_OFFRES_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `POSTULER_UTILISATEUR0_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

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