-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 juin 2019 à 17:29
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
  `Voie_Adresse` varchar(100) NOT NULL,
  `Dep_Adresse` int(11) NOT NULL,
  `Ville_Adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `beneficier`
--

DROP TABLE IF EXISTS `beneficier`;
CREATE TABLE IF NOT EXISTS `beneficier` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_Offre`,`Id_Categorie`),
  KEY `beneficier_categorie0_FK` (`Id_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_cv`
--

DROP TABLE IF EXISTS `candidat_cv`;
CREATE TABLE IF NOT EXISTS `candidat_cv` (
  `Id_Cv` int(11) NOT NULL AUTO_INCREMENT,
  `Fichier_Cv` text NOT NULL,
  `Titre_Cv` varchar(50) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Cv`),
  KEY `candidat_cv_utilisateur_FK` (`Id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `Id_Offre` int(11) NOT NULL AUTO_INCREMENT,
  `Petite_Description_Offre` varchar(200) NOT NULL,
  `Date_Debut_Offre` date NOT NULL,
  `Date_Fin_Offre` date DEFAULT NULL,
  `Remuneration_Offre` int(11) NOT NULL,
  `Titre_Offre` varchar(50) NOT NULL,
  `Description_Offre` text NOT NULL,
  `Id_Utilisateur_entreprise` int(11) NOT NULL,
  `Id_Adresse` int(11) NOT NULL,
  `Id_OffreT` int(11) NOT NULL,
  `Id_Remu_Type` int(11) NOT NULL,
  PRIMARY KEY (`Id_Offre`),
  KEY `offres_utilisateur_FK` (`Id_Utilisateur_entreprise`),
  KEY `offres_adresse0_FK` (`Id_Adresse`),
  KEY `offres_offre_type1_FK` (`Id_OffreT`),
  KEY `offres_remuneration_type2_FK` (`Id_Remu_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre_type`
--

DROP TABLE IF EXISTS `offre_type`;
CREATE TABLE IF NOT EXISTS `offre_type` (
  `Id_OffreT` int(11) NOT NULL AUTO_INCREMENT,
  `Type_OffreT` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_OffreT`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre_type`
--

INSERT INTO `offre_type` (`Id_OffreT`, `Type_OffreT`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'CTT'),
(4, 'Contrat d’apprentissage'),
(5, 'Contrat de professionnalisation'),
(6, 'CUI'),
(7, 'CAE'),
(8, 'CIE');

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

DROP TABLE IF EXISTS `postuler`;
CREATE TABLE IF NOT EXISTS `postuler` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Offre` int(11) NOT NULL,
  PRIMARY KEY (`Id_Utilisateur`,`Id_Offre`),
  KEY `postuler_offres0_FK` (`Id_Offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `remuneration_type`
--

DROP TABLE IF EXISTS `remuneration_type`;
CREATE TABLE IF NOT EXISTS `remuneration_type` (
  `Id_Remu_Type` int(11) NOT NULL AUTO_INCREMENT,
  `Remuneration_Type` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Remu_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remuneration_type`
--

INSERT INTO `remuneration_type` (`Id_Remu_Type`, `Remuneration_Type`) VALUES
(1, 'Par mois'),
(2, 'Par jours'),
(3, 'Par semaines'),
(4, 'Par heure');

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Utilisateur_suivre` int(11) NOT NULL,
  `Date_suivi` date NOT NULL,
  `Description_suivi` text,
  PRIMARY KEY (`Id_Utilisateur`,`Id_Utilisateur_suivre`),
  KEY `suivre_utilisateur0_FK` (`Id_Utilisateur_suivre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_u`
--

DROP TABLE IF EXISTS `type_u`;
CREATE TABLE IF NOT EXISTS `type_u` (
  `Id_Type` int(11) NOT NULL AUTO_INCREMENT,
  `Utilisateur_Type` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_u`
--

INSERT INTO `type_u` (`Id_Type`, `Utilisateur_Type`) VALUES
(1, 'ADMIN'),
(2, 'INTERNE'),
(3, 'ENTREPRISE'),
(4, 'CANDIDAT');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Utilisateur` varchar(50) NOT NULL,
  `PNom_Utilisateur` varchar(50) NOT NULL,
  `Mail_Utilisateur` varchar(100) NOT NULL,
  `Mdp_Utilisateur` text NOT NULL,
  `NomEntreprise_Utilisateur` varchar(50) DEFAULT NULL,
  `Id_Type` int(11) NOT NULL,
  `Id_Adresse` int(11) DEFAULT NULL,
  `numéro_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`Id_Utilisateur`),
  KEY `utilisateur_type_u_FK` (`Id_Type`),
  KEY `utilisateur_adresse0_FK` (`Id_Adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beneficier`
--
ALTER TABLE `beneficier`
  ADD CONSTRAINT `beneficier_categorie0_FK` FOREIGN KEY (`Id_Categorie`) REFERENCES `categorie` (`Id_Categorie`),
  ADD CONSTRAINT `beneficier_offres_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`);

--
-- Contraintes pour la table `candidat_cv`
--
ALTER TABLE `candidat_cv`
  ADD CONSTRAINT `candidat_cv_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_adresse0_FK` FOREIGN KEY (`Id_Adresse`) REFERENCES `adresse` (`Id_Adresse`),
  ADD CONSTRAINT `offres_offre_type1_FK` FOREIGN KEY (`Id_OffreT`) REFERENCES `offre_type` (`Id_OffreT`),
  ADD CONSTRAINT `offres_remuneration_type2_FK` FOREIGN KEY (`Id_Remu_Type`) REFERENCES `remuneration_type` (`Id_Remu_Type`),
  ADD CONSTRAINT `offres_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur_entreprise`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `postuler_offres0_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `postuler_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `suivre_utilisateur0_FK` FOREIGN KEY (`Id_Utilisateur_suivre`) REFERENCES `utilisateur` (`Id_Utilisateur`),
  ADD CONSTRAINT `suivre_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_adresse0_FK` FOREIGN KEY (`Id_Adresse`) REFERENCES `adresse` (`Id_Adresse`),
  ADD CONSTRAINT `utilisateur_type_u_FK` FOREIGN KEY (`Id_Type`) REFERENCES `type_u` (`Id_Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
