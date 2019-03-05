<?php
include 'header_admin.php';

if (!empty($_POST)) {
    $error = false;

    // NOM
    if (empty($_POST["Nom_Utilisateur"])) {
        echo "Nom : Aucun nom n'a été entré";
        $error = true;
    }

    // PRENOM
    if (empty($_POST["PNom_Utilisateur"])) {
        if ($error == false) {
            echo "Prénom : Aucun prénom n'a été entré";
            $error = true;
        }
    }


    // TYPE UTILISATEUR
    if (empty($_POST["Id_Type"])) {
        if ($error == false) {
            echo "Type : Aucun type n'a été entré";
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

    // IDENTIFIANT
    if (empty($_POST["Mail_Utilisateur"])) {
        if ($error == false) {
            echo "Identifiant : Aucun identifiant n'a été entré";
            $error = true;
        }
    } else {
        $check_u_login = $bdd->prepare("SELECT Id_Utilisateur FROM utilisateur WHERE Mail_Utilisateur = ?");
        $check_u_login->execute([$_POST["Mail_Utilisateur"]]);
        $u_login = $check_u_login->fetch();
        if ($u_login) {
            if ($error == false) {
                echo "Identifiant : Cet identifiant est déjà utilisé";
                $error = true;
            }
        }
    }

    /* // PASSWORD
      if(empty($_POST["Mdp_Utilisateur"])){
      if ($error == false) {
      echo "Mot de passe : Aucun mot de passe n'a été rentré";
      $error = true;
      }
      } else {
      $u_password = password_hash($_POST["Mdp_Utilisateur"], PASSWORD_DEFAULT);
      } */
    // INSCRIPTION
    if ($error == false) {
        
        $insc = $bdd->prepare("INSERT INTO adresse (Num_Adresse, Voie_Adresse, Dep_Adresse, Ville_Adresse) VALUES (? , ? , ? , ? )");
        $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));
        
        $identifiant = $bdd->lastInsertId();

        sleep(1);
        $req = $bdd->prepare("INSERT INTO utilisateur (Nom_Utilisateur, PNom_Utilisateur, Mail_Utilisateur, Id_Type , NomEntreprise_Utilisateur, Id_Adresse) VALUES ( ? , ? , ? , ? , ? , ?)");
        $req->execute(array($_POST['Nom_Utilisateur'], $_POST['PNom_Utilisateur'], $_POST['Mail_Utilisateur'], $_POST['Id_Type'], $_POST['NomEntreprise_Utilisateur'], $identifiant));
        sleep(1);
        header("Refresh:0");
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
                        <h4 class="card-title">Ajouter un utilisateur</h4>

                    </div>
                    <div class="card-body">


                        <form method="post">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Entreprise</label>
                                        <input name="NomEntreprise_Utilisateur" id="NomEntreprise_Utilisateur"type="text" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input name="Mail_Utilisateur" id="Mail_Utilisateur" type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Prenom</label>
                                        <input name="PNom_Utilisateur" id="PNom_Utilisateur" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nom</label>
                                        <input name="Nom_Utilisateur" id="Nom_Utilisateur" type="text" class="form-control">
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
                                        <label>Type d'utilisateur</label>
                                        <div class="form-group">
                                            <div class="col-lg-3 form-cols">
                                                <div class="default-select" id="default-selects"">
                                                    <select name="Id_Type" id="Id_Type">
                                                        <option value="0">Selectionnez un type</option>
                                                        <?php
                                                        while ($type_u = $type_utilisateur->fetch()) {
                                                            echo'<option value="'.$type_u[Id_Type].'">' . $type_u[Utilisateur_Type] . '</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                            <div class="clearfix"></div>
                        </form>



                    </div>
                </div>
            </div>

            <?php include 'foot_admin.php'; ?>