<?php include 'header_admin.php';

if (!empty($_POST)) {
    $error = false;

    // NOM
    if (empty($_POST["Id_Utilisateur_entreprise"])) {
        echo "Aucune entreprise rentrée";
        $error = true;
    }

    // PRENOM
    if (empty($_POST["Id_OffreT"])) {
        if ($error == false) {
            echo "Aucun type d'offre entré";
            $error = true;
        }
    }

    // TYPE UTILISATEUR
    if (empty($_POST["Id_Remu_Type"])) {
        if ($error == false) {
            echo "Type : Aucun type de rémuneration entré";
            $error = true;
        }
    }
    
    // TYPE UTILISATEUR
    if (empty($_POST["Titre_Offre"])) {
        if ($error == false) {
            echo "Aucun titre entré";
            $error = true;
        }
    }
    
    // TYPE UTILISATEUR
    if (empty($_POST["Date_Debut_Offre"])) {
        if ($error == false) {
            echo "Aucune date entrée";
            $error = true;
        }
    }

     if (empty($_POST["Petite_Description_Offre"])) {
        if ($error == false) {
            echo "Petite description abscente";
            $error = true;
        }
    }
    
    if (empty($_POST["Description_Offre"])) {
        if ($error == false) {
            echo "Description abscente";
            $error = true;
        }
    }
    
    
    // TYPE UTILISATEUR
    if (empty($_POST["Remuneration_Offre"])) {
        if ($error == false) {
            echo "Aucune rémuneration entré";
            $error = true;
        }
    }

    // NUM ADRESSE
    if (empty($_POST["Num_Adresse"])) {
        if ($error == false) {
            echo "Numéro d'adresse : Aucun numéro d'adresse n'a été entré";
            $error = true;
        }
    }

    // VOIE ADRESSE
    if (empty($_POST["Voie_Adresse"])) {
        if ($error == false) {
            echo "Voie d'adresse : Aucune voie d'adresse n'a été entré";
            $error = true;
        }
    }

    // DEP ADRESSE
    if (empty($_POST["Dep_Adresse"])) {
        if ($error == false) {
            echo "Departement : Aucun département n'a été entré";
            $error = true;
        }
    }

    // VILLE
    if (empty($_POST["Ville_Adresse"])) {
        if ($error == false) {
            echo "Ville : Aucune Ville n'a été entré";
            $error = true;
        }
    }

    
   
    // INSCRIPTION
    if ($error == false) {
        
        
        
        $insc = $bdd->prepare("INSERT INTO adresse (Num_Adresse, Voie_Adresse, Dep_Adresse, Ville_Adresse) VALUES (? , ? , ? , ? )");
        $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));
        
        $id_adresse = $bdd->lastInsertId();

        sleep(1);
        
        if(empty($_POST["Date_Fin_Offre"])){
        
        $id_date = NULL;
            
        $requete = $bdd->prepare("INSERT INTO offres (Petite_Description_Offre, Date_Debut_Offre,Date_Fin_Offre, Remuneration_Offre,Titre_Offre , Description_Offre,Id_Utilisateur_entreprise,Id_OffreT, Id_Remu_Type, Id_Adresse) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )");
        $requete->execute(array($_POST['Petite_Description_Offre'], $_POST["Date_Debut_Offre"],$id_date, $_POST['Remuneration_Offre'], $_POST['Titre_Offre'],$_POST['Description_Offre'],$_POST['Id_Utilisateur_entreprise'],$_POST['Id_OffreT'],$_POST['Id_Remu_Type'], $id_adresse));
        
        
        }else{
        sleep(1);
        $req_offre = $bdd->prepare("INSERT INTO offres (Petite_Description_Offre, Date_Debut_Offre,Date_Fin_Offre, Remuneration_Offre,Titre_Offre , Description_Offre,Id_Utilisateur_entreprise,Id_OffreT, Id_Remu_Type, Id_Adresse) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )");
        $req_offre->execute(array($_POST['Petite_Description_Offre'], $_POST["Date_Debut_Offre"], $_POST["Date_Fin_Offre"], $_POST['Remuneration_Offre'], $_POST['Titre_Offre'],$_POST['Description_Offre'],$_POST['Id_Utilisateur_entreprise'],$_POST['Id_OffreT'],$_POST['Id_Remu_Type'], $id_adresse));
        }
        sleep(1);
        header('Location:ajout_offres.php');
    }
}
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Création d'une offre</h4>
                        <p class="card-category">Avant de crée une offre veuillez tout d'abord crée une <a href="user.php">entreprise</a>.</p>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="Id_OffreT" id="Id_OffreT" class="form-control form-control-sm">
                                        <option  value="0">Type d'offre</option>
                                        <?php
                                            while ($type_offre = $offre_type ->fetch()){
                                                echo '<option value="'.$type_offre[Id_OffreT].'">'.$type_offre[Type_OffreT].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="Id_Utilisateur_entreprise" id="Id_Utilisateur_entreprise" class="form-control form-control-sm">
                                        <option>Entreprise</option>
                                        <?php
                                            while ($entreprise = $nom_entreprise ->fetch()){
                                                echo '<option value="'.$entreprise[Id_Utilisateur].'">'.$entreprise[NomEntreprise_Utilisateur].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <select name="Id_Remu_Type" id="Id_Remu_Type" class="form-control form-control-sm">
                                        <option>Type de rémuneration</option>
                                        <?php
                                            while ($remu_type = $type_remu ->fetch()){
                                                echo '<option value="'.$remu_type[Id_Remu_Type].'">'.$remu_type[Remuneration_Type].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                        </div>
                            </br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Rémuneratuion (en €)</label>
                                        <input name="Remuneration_Offre" id="Remuneration_Offre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Titre de l'offre </label>
                                        <input name="Titre_Offre" id="Titre_Offre" type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date de debut</label>
                                        <input name="Date_Debut_Offre" id="Date_Debut_Offre" type="date" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date de fin (non obligatoire)</label>
                                        <input name="Date_Fin_Offre" id="Date_Fin_Offre" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Numero d'adresse</label>
                                        <input name="Num_Adresse" id="Num_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Voie</label>
                                        <input name="Voie_Adresse" id="Voie_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Ville</label>
                                        <input name="Ville_Adresse" id="Ville_Adresse" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Code postale</label>
                                        <input name="Dep_Adresse" id="Dep_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <div class="col-md-12">

                                            <div class="col-md-13">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Petite description</label>
                                                    <input name="Petite_Description_Offre" id="Petite_Description_Offre" type="text" class="form-control" rows="5">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Grande description.</label>
                                            <textarea name="Description_Offre" id="Description_Offre" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Crée une offre!</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <?php include 'foot_admin.php'; ?>