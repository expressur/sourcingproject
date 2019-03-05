#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: candidat_cv
#------------------------------------------------------------

CREATE TABLE candidat_cv(
        Id_Cv          Int  Auto_increment  NOT NULL ,
        Fichier_Cv     Text NOT NULL ,
        Titre_Cv       Varchar (50) NOT NULL ,
        Description_Cv Varchar (50) NOT NULL
	,CONSTRAINT candidat_cv_PK PRIMARY KEY (Id_Cv)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cv_formations
#------------------------------------------------------------

CREATE TABLE cv_formations(
        Id_Cvf                Int  Auto_increment  NOT NULL ,
        Cv_Formation          Varchar (50) NOT NULL ,
        Ecole_Formation       Varchar (50) NOT NULL ,
        Date_D_Formation      Date NOT NULL ,
        Description_Formation Varchar (50) NOT NULL ,
        Date_F_Formation      Date NOT NULL ,
        Id_Cv                 Int NOT NULL
	,CONSTRAINT cv_formations_PK PRIMARY KEY (Id_Cvf)

	,CONSTRAINT cv_formations_candidat_cv_FK FOREIGN KEY (Id_Cv) REFERENCES candidat_cv(Id_Cv)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cv_experience
#------------------------------------------------------------

CREATE TABLE cv_experience(
        Id_CvE          Int  Auto_increment  NOT NULL ,
        Experience_CvE  Varchar (50) NOT NULL ,
        Entreprise_CvE  Varchar (50) NOT NULL ,
        Fonction_CvE    Varchar (50) NOT NULL ,
        Date_D_CvE      Date NOT NULL ,
        Date_F_CvE      Date NOT NULL ,
        Description_CvE Varchar (50) NOT NULL ,
        Id_Cv           Int NOT NULL
	,CONSTRAINT cv_experience_PK PRIMARY KEY (Id_CvE)

	,CONSTRAINT cv_experience_candidat_cv_FK FOREIGN KEY (Id_Cv) REFERENCES candidat_cv(Id_Cv)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_u
#------------------------------------------------------------

CREATE TABLE type_u(
        Id_Type          Int  Auto_increment  NOT NULL ,
        Utilisateur_Type Varchar (50) NOT NULL
	,CONSTRAINT type_u_PK PRIMARY KEY (Id_Type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: remuneration_type
#------------------------------------------------------------

CREATE TABLE remuneration_type(
        Id_Remu_Type      Int  Auto_increment  NOT NULL ,
        Remuneration_Type Varchar (50) NOT NULL
	,CONSTRAINT remuneration_type_PK PRIMARY KEY (Id_Remu_Type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresse
#------------------------------------------------------------

CREATE TABLE adresse(
        Id_Adresse    Int  Auto_increment  NOT NULL ,
        Num_Adresse   Int NOT NULL ,
        Voie_Adresse  Varchar (100) NOT NULL ,
        Dep_Adresse   Int NOT NULL ,
        Ville_Adresse Varchar (100) NOT NULL
	,CONSTRAINT adresse_PK PRIMARY KEY (Id_Adresse)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        Id_Utilisateur            Int  Auto_increment  NOT NULL ,
        Nom_Utilisateur           Varchar (50) NOT NULL ,
        PNom_Utilisateur          Varchar (50) NOT NULL ,
        Mail_Utilisateur          Varchar (100) NOT NULL ,
        Mdp_Utilisateur           Text NOT NULL ,
        NomEntreprise_Utilisateur Varchar (50) NOT NULL ,
        Id_Cv                     Int NOT NULL ,
        Id_Type                   Int NOT NULL ,
        Id_Adresse                Int NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (Id_Utilisateur)

	,CONSTRAINT utilisateur_candidat_cv_FK FOREIGN KEY (Id_Cv) REFERENCES candidat_cv(Id_Cv)
	,CONSTRAINT utilisateur_type_u0_FK FOREIGN KEY (Id_Type) REFERENCES type_u(Id_Type)
	,CONSTRAINT utilisateur_adresse1_FK FOREIGN KEY (Id_Adresse) REFERENCES adresse(Id_Adresse)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offre_type
#------------------------------------------------------------

CREATE TABLE offre_type(
        Id_OffreT   Int  Auto_increment  NOT NULL ,
        Type_OffreT Varchar (50) NOT NULL
	,CONSTRAINT offre_type_PK PRIMARY KEY (Id_OffreT)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offres
#------------------------------------------------------------

CREATE TABLE offres(
        Id_Offre                 Int  Auto_increment  NOT NULL ,
        Petite_Description_Offre Varchar (200) NOT NULL ,
        Date_Debut_Offre         Date NOT NULL ,
        Date_Fin_Offre           Date NOT NULL ,
        Remuneration_Offre       Int NOT NULL ,
        Titre_Offre              Varchar (50) NOT NULL ,
        Description_Offre        Text NOT NULL ,
        Id_Utilisateur           Int NOT NULL ,
        Id_Adresse               Int NOT NULL ,
        Id_OffreT                Int NOT NULL ,
        Id_Remu_Type             Int NOT NULL
	,CONSTRAINT offres_PK PRIMARY KEY (Id_Offre)

	,CONSTRAINT offres_utilisateur_FK FOREIGN KEY (Id_Utilisateur) REFERENCES utilisateur(Id_Utilisateur)
	,CONSTRAINT offres_adresse0_FK FOREIGN KEY (Id_Adresse) REFERENCES adresse(Id_Adresse)
	,CONSTRAINT offres_offre_type1_FK FOREIGN KEY (Id_OffreT) REFERENCES offre_type(Id_OffreT)
	,CONSTRAINT offres_remuneration_type2_FK FOREIGN KEY (Id_Remu_Type) REFERENCES remuneration_type(Id_Remu_Type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        Id_Categorie  Int  Auto_increment  NOT NULL ,
        Nom_Categorie Varchar (50) NOT NULL
	,CONSTRAINT categorie_PK PRIMARY KEY (Id_Categorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: postuler
#------------------------------------------------------------

CREATE TABLE postuler(
        Id_Utilisateur Int NOT NULL ,
        Id_Offre       Int NOT NULL
	,CONSTRAINT postuler_PK PRIMARY KEY (Id_Utilisateur,Id_Offre)

	,CONSTRAINT postuler_utilisateur_FK FOREIGN KEY (Id_Utilisateur) REFERENCES utilisateur(Id_Utilisateur)
	,CONSTRAINT postuler_offres0_FK FOREIGN KEY (Id_Offre) REFERENCES offres(Id_Offre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: creer
#------------------------------------------------------------

CREATE TABLE creer(
        Id_Offre       Int NOT NULL ,
        Id_Utilisateur Int NOT NULL
	,CONSTRAINT creer_PK PRIMARY KEY (Id_Offre,Id_Utilisateur)

	,CONSTRAINT creer_offres_FK FOREIGN KEY (Id_Offre) REFERENCES offres(Id_Offre)
	,CONSTRAINT creer_utilisateur0_FK FOREIGN KEY (Id_Utilisateur) REFERENCES utilisateur(Id_Utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: beneficier
#------------------------------------------------------------

CREATE TABLE beneficier(
        Id_Offre     Int NOT NULL ,
        Id_Categorie Int NOT NULL
	,CONSTRAINT beneficier_PK PRIMARY KEY (Id_Offre,Id_Categorie)

	,CONSTRAINT beneficier_offres_FK FOREIGN KEY (Id_Offre) REFERENCES offres(Id_Offre)
	,CONSTRAINT beneficier_categorie0_FK FOREIGN KEY (Id_Categorie) REFERENCES categorie(Id_Categorie)
)ENGINE=InnoDB;

