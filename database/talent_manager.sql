-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 08 Février 2019 à 14:59
-- Version du serveur :  5.7.25-0ubuntu0.18.10.2
-- Version de PHP :  7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `adresse` (
  `Id_Adresse` int(11) NOT NULL,
  `Num_Adresse` int(11) NOT NULL,
  `Voie_Adresse` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Dep_Adresse` int(11) NOT NULL,
  `Ville_Adresse` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`Id_Adresse`, `Num_Adresse`, `Voie_Adresse`, `Dep_Adresse`, `Ville_Adresse`) VALUES
(1, 216, 'rue de la mare a gondre', 77000, 'vaux le penil'),
(2, 3, 'quai de gaillon', 78700, 'conflan st honorine'),
(4, 45, 'rue des champs', 77000, 'Vaux Le Penil'),
(5, 45, 'rue d un endroit', 75015, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `candidat_cv`
--

CREATE TABLE `candidat_cv` (
  `Id_Cv` int(11) NOT NULL,
  `Ficher_Cv` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Titre_Cv` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Description_Cv` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cv_experience`
--

CREATE TABLE `cv_experience` (
  `Id_CvE` int(11) NOT NULL,
  `Experience_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Entreprise_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Fonction_CvE` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_CvE` date NOT NULL,
  `Date_Fin_Cve` date NOT NULL,
  `Description_CvE` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Id_Cv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `cv_formation`
--

CREATE TABLE `cv_formation` (
  `Id_Formation` int(11) NOT NULL,
  `Cv_Formation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Ecole_Formation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_Formation` date NOT NULL,
  `Date_Fin_Formation` date NOT NULL,
  `Description_Formation` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Id_Cv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id_Offre` int(11) NOT NULL,
  `Petite_Description_Offre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Date_Debut_Offre` date NOT NULL,
  `Date_Fin_Offre` date DEFAULT NULL,
  `Remuneration_Offre` int(11) NOT NULL,
  `Remuneration_Type_Offre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Titre_Offre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Id_Adresse` int(11) NOT NULL,
  `Id_OffreT` int(11) NOT NULL,
  `Description_Offre` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`Id_Offre`, `Petite_Description_Offre`, `Date_Debut_Offre`, `Date_Fin_Offre`, `Remuneration_Offre`, `Remuneration_Type_Offre`, `Titre_Offre`, `Id_Adresse`, `Id_OffreT`, `Description_Offre`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2019-01-01', '2019-04-24', 4500, 'Par mois', 'Offre de test', 1, 1, ''),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2019-01-20', NULL, 2300, 'Par mois', 'Offre de test 2', 2, 2, ''),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2019-01-08', NULL, 3502, 'Par mois', 'Offre de test 3', 4, 2, ''),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2019-01-01', '2019-01-31', 200, 'Par Jour', 'Offre de test 4', 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n\r\n\r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.');

-- --------------------------------------------------------

--
-- Structure de la table `offres_type`
--

CREATE TABLE `offres_type` (
  `Id_OffreT` int(11) NOT NULL,
  `Type_OffreT` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `offres_type`
--

INSERT INTO `offres_type` (`Id_OffreT`, `Type_OffreT`) VALUES
(1, 'CDD'),
(2, 'CDI'),
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

CREATE TABLE `postuler` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_u`
--

CREATE TABLE `type_u` (
  `Id_Type` int(11) NOT NULL,
  `Utilisateur_Type` varchar(11) COLLATE utf8_bin NOT NULL,
  `Description_Type` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `type_u`
--

INSERT INTO `type_u` (`Id_Type`, `Utilisateur_Type`, `Description_Type`) VALUES
(1, 'ADMIN', 'Administrateur'),
(2, 'INTERNE', 'Interne'),
(3, 'ENTREPRISE', 'Entreprise'),
(4, 'CANDIDAT', 'Candidat');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Nom_Utilisateur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PNom_Utilisateur` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Mail_Utilisateur` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Mdp_Utilisateur` text CHARACTER SET latin1 NOT NULL,
  `Id_Adresse` int(11) DEFAULT NULL,
  `Id_Offre` int(11) DEFAULT NULL,
  `Id_Offre_OFFRES` int(11) DEFAULT NULL,
  `Id_Type` int(11) DEFAULT NULL,
  `Id_Cv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `Nom_Utilisateur`, `PNom_Utilisateur`, `Mail_Utilisateur`, `Mdp_Utilisateur`, `Id_Adresse`, `Id_Offre`, `Id_Offre_OFFRES`, `Id_Type`, `Id_Cv`) VALUES
(4, 'Bakari', 'Naïm', 'bak77200@gmail.com', '$2y$10$tbo9Q51MAK.VKwiZ8X7UIOYmLgPTZT6.ifnzsZlk7LsT23KU0AyK2', NULL, NULL, NULL, 4, NULL),
(5, 'ROOT', 'Admin', 'root@gmail.com', '$2y$10$Xso5E4C9Z0BAtl7hxO/LguT1rBqke9dljP4/Upu6VgmnNQN.b8Fz2', NULL, NULL, NULL, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`Id_Adresse`);

--
-- Index pour la table `candidat_cv`
--
ALTER TABLE `candidat_cv`
  ADD PRIMARY KEY (`Id_Cv`);

--
-- Index pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  ADD PRIMARY KEY (`Id_CvE`),
  ADD KEY `_CV_EXPERIENCE_CANDIDAT_CV_FK` (`Id_Cv`);

--
-- Index pour la table `cv_formation`
--
ALTER TABLE `cv_formation`
  ADD PRIMARY KEY (`Id_Formation`),
  ADD KEY `CV_FORMATION_CANDIDAT_CV_FK` (`Id_Cv`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`Id_Offre`),
  ADD UNIQUE KEY `OFFRES_ADRESSE_AK` (`Id_Adresse`),
  ADD KEY `OFFRES_OFFRES_TYPE0_FK` (`Id_OffreT`);

--
-- Index pour la table `offres_type`
--
ALTER TABLE `offres_type`
  ADD PRIMARY KEY (`Id_OffreT`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`Id_Offre`,`Id_Utilisateur`),
  ADD KEY `POSTULER_UTILISATEUR0_FK` (`Id_Utilisateur`);

--
-- Index pour la table `type_u`
--
ALTER TABLE `type_u`
  ADD PRIMARY KEY (`Id_Type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD UNIQUE KEY `UTILISATEUR_ADRESSE_AK` (`Id_Adresse`),
  ADD KEY `UTILISATEUR_OFFRES0_FK` (`Id_Offre`),
  ADD KEY `UTILISATEUR_OFFRES1_FK` (`Id_Offre_OFFRES`),
  ADD KEY `UTILISATEUR_TYPE_U2_FK` (`Id_Type`),
  ADD KEY `UTILISATEUR_CANDIDAT_CV3_FK` (`Id_Cv`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `Id_Adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `candidat_cv`
--
ALTER TABLE `candidat_cv`
  MODIFY `Id_Cv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  MODIFY `Id_CvE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cv_formation`
--
ALTER TABLE `cv_formation`
  MODIFY `Id_Formation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id_Offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `offres_type`
--
ALTER TABLE `offres_type`
  MODIFY `Id_OffreT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `type_u`
--
ALTER TABLE `type_u`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
