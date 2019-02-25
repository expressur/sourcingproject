-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 22 Février 2019 à 10:42
-- Version du serveur :  5.7.25-0ubuntu0.18.10.2
-- Version de PHP :  7.2.15-0ubuntu0.18.10.1

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
  `Voie_Adresse` varchar(100) NOT NULL,
  `Dep_Adresse` int(11) NOT NULL,
  `Ville_Adresse` varchar(100) NOT NULL,
  `Id_Utilisateur` int(11) DEFAULT NULL,
  `Id_Offre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`Id_Adresse`, `Num_Adresse`, `Voie_Adresse`, `Dep_Adresse`, `Ville_Adresse`, `Id_Utilisateur`, `Id_Offre`) VALUES
(1, 216, 'rue de la mare a gondre', 77000, 'Vaux le Penil', NULL, 1),
(2, 3, 'Quai de gaillon', 78700, 'Conflans ste Honorine', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_cv`
--

CREATE TABLE `candidat_cv` (
  `Id_Cv` int(11) NOT NULL,
  `Fichier_Cv` text NOT NULL,
  `Titre_Cv` varchar(50) NOT NULL,
  `Description_Cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `Id_Categorie` int(11) NOT NULL,
  `Nom_Categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `creer`
--

CREATE TABLE `creer` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cv_experience`
--

CREATE TABLE `cv_experience` (
  `Id_CvE` int(11) NOT NULL,
  `Experience_CvE` varchar(50) NOT NULL,
  `Entreprise_CvE` varchar(50) NOT NULL,
  `Fonction_CvE` varchar(50) NOT NULL,
  `Date_D_CvE` date NOT NULL,
  `Date_F_CvE` date NOT NULL,
  `Description_CvE` varchar(50) NOT NULL,
  `Id_Cv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cv_formations`
--

CREATE TABLE `cv_formations` (
  `Id_Cvf` int(11) NOT NULL,
  `Cv_Formation` varchar(50) NOT NULL,
  `Ecole_Formation` varchar(50) NOT NULL,
  `Date_D_Formation` date NOT NULL,
  `Description_Formation` varchar(50) NOT NULL,
  `Date_F_Formation` date NOT NULL,
  `Id_Cv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detenir_categorie`
--

CREATE TABLE `detenir_categorie` (
  `Id_Offre` int(11) NOT NULL,
  `Id_Categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `Id_Offre` int(11) NOT NULL,
  `Petite_Description_Offre` varchar(200) NOT NULL,
  `Date_Debut_Offre` date NOT NULL,
  `Date_Fin_Offre` date DEFAULT NULL,
  `Remuneration_Offre` int(11) NOT NULL,
  `Titre_Offre` varchar(50) NOT NULL,
  `Description_Offre` text NOT NULL,
  `Id_OffreT` int(11) NOT NULL,
  `Id_Remu_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offres`
--

INSERT INTO `offres` (`Id_Offre`, `Petite_Description_Offre`, `Date_Debut_Offre`, `Date_Fin_Offre`, `Remuneration_Offre`, `Titre_Offre`, `Description_Offre`, `Id_OffreT`, `Id_Remu_Type`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2018-10-29', NULL, 2300, 'Offre de test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n\r\n\r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.', 1, 1),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing.', '2019-01-01', '2019-03-31', 25, 'Offre de test 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\n\r\n\r\nexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `offre_type`
--

CREATE TABLE `offre_type` (
  `Id_OffreT` int(11) NOT NULL,
  `Type_OffreT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `offre_type`
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

CREATE TABLE `postuler` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `remuneration_type`
--

CREATE TABLE `remuneration_type` (
  `Id_Remu_Type` int(11) NOT NULL,
  `Remuneration_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `remuneration_type`
--

INSERT INTO `remuneration_type` (`Id_Remu_Type`, `Remuneration_Type`) VALUES
(1, 'Par mois'),
(2, 'Par jours'),
(3, 'Par semaines'),
(4, 'Par heure');

-- --------------------------------------------------------

--
-- Structure de la table `type_u`
--

CREATE TABLE `type_u` (
  `Id_Type` int(11) NOT NULL,
  `Utilisateur_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_u`
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

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Nom_Utilisateur` varchar(50) NOT NULL,
  `PNom_Utilisateur` varchar(50) NOT NULL,
  `Mail_Utilisateur` varchar(100) NOT NULL,
  `Mdp_Utilisateur` text NOT NULL,
  `Id_Cv` int(11) DEFAULT NULL,
  `Id_Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `Nom_Utilisateur`, `PNom_Utilisateur`, `Mail_Utilisateur`, `Mdp_Utilisateur`, `Id_Cv`, `Id_Type`) VALUES
(1, 'Bakari', 'Naïm', 'bak77200@gmail.com', '$2y$10$sA3Si2P6Le.D1UC7Y5a6KuiaOVqiCw8tRP0c0TDIq2mQ4MK6FpJAi', NULL, 4),
(2, 'ROOT', 'Admin', 'root@gmail.com', '$2y$10$s3t8sokRBOP/udZ6z/WW4ubF44sQvcmRuU/heG/2OAMx5vrN2K4He', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `valider`
--

CREATE TABLE `valider` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`Id_Adresse`),
  ADD KEY `adresse_utilisateur_FK` (`Id_Utilisateur`),
  ADD KEY `adresse_offres0_FK` (`Id_Offre`);

--
-- Index pour la table `candidat_cv`
--
ALTER TABLE `candidat_cv`
  ADD PRIMARY KEY (`Id_Cv`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id_Categorie`);

--
-- Index pour la table `creer`
--
ALTER TABLE `creer`
  ADD PRIMARY KEY (`Id_Offre`,`Id_Utilisateur`),
  ADD KEY `creer_utilisateur0_FK` (`Id_Utilisateur`);

--
-- Index pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  ADD PRIMARY KEY (`Id_CvE`),
  ADD KEY `cv_experience_candidat_cv_FK` (`Id_Cv`);

--
-- Index pour la table `cv_formations`
--
ALTER TABLE `cv_formations`
  ADD PRIMARY KEY (`Id_Cvf`),
  ADD KEY `cv_formations_candidat_cv_FK` (`Id_Cv`);

--
-- Index pour la table `detenir_categorie`
--
ALTER TABLE `detenir_categorie`
  ADD PRIMARY KEY (`Id_Offre`,`Id_Categorie`),
  ADD KEY `detenir_categorie_categorie0_FK` (`Id_Categorie`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`Id_Offre`),
  ADD KEY `offres_offre_type_FK` (`Id_OffreT`),
  ADD KEY `offres_remuneration_type0_FK` (`Id_Remu_Type`);

--
-- Index pour la table `offre_type`
--
ALTER TABLE `offre_type`
  ADD PRIMARY KEY (`Id_OffreT`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`Id_Utilisateur`,`Id_Offre`),
  ADD KEY `postuler_offres0_FK` (`Id_Offre`);

--
-- Index pour la table `remuneration_type`
--
ALTER TABLE `remuneration_type`
  ADD PRIMARY KEY (`Id_Remu_Type`);

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
  ADD KEY `utilisateur_candidat_cv_FK` (`Id_Cv`),
  ADD KEY `utilisateur_type_u0_FK` (`Id_Type`);

--
-- Index pour la table `valider`
--
ALTER TABLE `valider`
  ADD PRIMARY KEY (`Id_Utilisateur`,`Id_Offre`),
  ADD KEY `valider_offres0_FK` (`Id_Offre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `Id_Adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `candidat_cv`
--
ALTER TABLE `candidat_cv`
  MODIFY `Id_Cv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Id_Categorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  MODIFY `Id_CvE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cv_formations`
--
ALTER TABLE `cv_formations`
  MODIFY `Id_Cvf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `Id_Offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `offre_type`
--
ALTER TABLE `offre_type`
  MODIFY `Id_OffreT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `remuneration_type`
--
ALTER TABLE `remuneration_type`
  MODIFY `Id_Remu_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_u`
--
ALTER TABLE `type_u`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_offres0_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `adresse_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `creer`
--
ALTER TABLE `creer`
  ADD CONSTRAINT `creer_offres_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `creer_utilisateur0_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `cv_experience`
--
ALTER TABLE `cv_experience`
  ADD CONSTRAINT `cv_experience_candidat_cv_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`);

--
-- Contraintes pour la table `cv_formations`
--
ALTER TABLE `cv_formations`
  ADD CONSTRAINT `cv_formations_candidat_cv_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`);

--
-- Contraintes pour la table `detenir_categorie`
--
ALTER TABLE `detenir_categorie`
  ADD CONSTRAINT `detenir_categorie_categorie0_FK` FOREIGN KEY (`Id_Categorie`) REFERENCES `categorie` (`Id_Categorie`),
  ADD CONSTRAINT `detenir_categorie_offres_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_offre_type_FK` FOREIGN KEY (`Id_OffreT`) REFERENCES `offre_type` (`Id_OffreT`),
  ADD CONSTRAINT `offres_remuneration_type0_FK` FOREIGN KEY (`Id_Remu_Type`) REFERENCES `remuneration_type` (`Id_Remu_Type`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `postuler_offres0_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `postuler_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_candidat_cv_FK` FOREIGN KEY (`Id_Cv`) REFERENCES `candidat_cv` (`Id_Cv`),
  ADD CONSTRAINT `utilisateur_type_u0_FK` FOREIGN KEY (`Id_Type`) REFERENCES `type_u` (`Id_Type`);

--
-- Contraintes pour la table `valider`
--
ALTER TABLE `valider`
  ADD CONSTRAINT `valider_offres0_FK` FOREIGN KEY (`Id_Offre`) REFERENCES `offres` (`Id_Offre`),
  ADD CONSTRAINT `valider_utilisateur_FK` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;