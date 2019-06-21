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

    // PASSWORD
      if(empty($_POST["Mdp_Utilisateur"])){
      if ($error == false) {
      echo "Mot de passe : Aucun mot de passe n'a été rentré";
      $error = true;
      }
      } elseif ($_POST["Mdp_Utilisateur"] == $_POST["Mdp"]) {
      $u_password = password_hash($_POST["Mdp_Utilisateur"], PASSWORD_DEFAULT);
      }
      else {
            echo "Mot de passe :Les mots de passe ne corresponde pas";
            $error = true; 
            
      }
    // INSCRIPTION
    if ($error == false) {
        
        $insc = $bdd->prepare("INSERT INTO adresse (Num_Adresse, Voie_Adresse, Dep_Adresse, Ville_Adresse) VALUES (? , ? , ? , ? )");
        $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));
        
        $identifiant = $bdd->lastInsertId();

        sleep(1);
        $req = $bdd->prepare("INSERT INTO utilisateur (Nom_Utilisateur, PNom_Utilisateur,Mdp_Utilisateur, Mail_Utilisateur, Id_Type , NomEntreprise_Utilisateur,numéro_utilisateur, Id_Adresse) VALUES ( ? , ? , ? , ? , ? , ? , ? , ?)");
        $req->execute(array($_POST['Nom_Utilisateur'], $_POST['PNom_Utilisateur'], $u_password, $_POST['Mail_Utilisateur'], $_POST['Id_Type'], $_POST['NomEntreprise_Utilisateur'], $_POST['numero'], $identifiant));
        sleep(1);
        header('Location: add.php');
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Type d'utilisateur</label>
                                        <div class="form-group">
                                            <div class="col-lg-3 form-cols">
                                                <div class="default-select" id="default-selects">
                                                    <select class="form-control form-control-sm" required name="Id_Type" id="Id_Type">
                                                        <option >Selectionnez un type</option>
                                                        <?php if ($_SESSION['Id_Type'] == 1)
                                                        {
                                                            echo'
                                                            <option value="1">Administrateur</option>
                                                            <option value="2">Interne</option>
                                                            <option value="3">Entreprise</option>';
                                                        } elseif($_SESSION['Id_Type'] == 2)
                                                            { 
                                                            echo '<option value="3">Entreprise</option>';
                                                            }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Entreprise</label>
                                        <input  name="NomEntreprise_Utilisateur" id="NomEntreprise_Utilisateur"type="text" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Numéro de téléphone </label>
                                        <input required name="numero" id="numero" type="tel" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input required name="Mail_Utilisateur" id="Mail_Utilisateur" type="email" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mot de passe</label>
                                        <input required name="Mdp_Utilisateur" id="Mdp_Utilisateur" type="password" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirmer le mot de passe</label>
                                        <input required name="Mdp" id="Mdp" type="password" class="form-control">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Prenom</label>
                                        <input required name="PNom_Utilisateur" id="PNom_Utilisateur" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nom</label>
                                        <input required  name="Nom_Utilisateur" id="Nom_Utilisateur" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Numero d'adresse</label>
                                        <input required name="Num_Adresse" id="Num_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Voie</label>
                                        <input required name="Voie_Adresse" id="Voie_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Ville</label>
                                        <input required name="Ville_Adresse" id="Ville_Adresse" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Code postale</label>
                                        <input required name="Dep_Adresse" id="Dep_Adresse" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                            <div class="clearfix"></div>
                        </form>


                    </div>
                </div>
            </div>
             <?php if ($_SESSION['Id_Type'] == 1 )
            {?>
             <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des entreprise partenaire</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom de l'entreprise
                        </th>
                        <th>
                          Nom du responssable
                        </th>
                        <th>
                          Prénom du responssable
                        </th>
                        <th>
                          Email
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_des_entreprise = $liste_entreprise ->fetch()) {
                              echo'
                        <tr>
                          <td class="text-primary">
                            '.$liste_des_entreprise[NomEntreprise_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_des_entreprise[Nom_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_des_entreprise[PNom_Utilisateur].'
                          </td>
                          <td>
                           '.$liste_des_entreprise[Mail_Utilisateur].'
                          </td>
                        </tr>';
                          }
                          ?>
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>
            </div>
           
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des utilisateur deja existant</h4>
                  
                </div>
            <div class="card-body">
                  <div class="table-responsive">
                    
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom 
                        </th>
                        <th>
                          Prénom
                        </th>
                        <th>
                          Numéro de téléphone
                        </th>
                        <th>
                          Mail
                        </th>
                        <th>
                          Type d'utilisateur
                        </th>
                        <th>
                          Supprimer l'utilisateur
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_utilisateur = $liste_des_utilisateurs->fetch()) {
                              echo'
                        <tr>
                          <td class="text-primary">
                            '.$liste_utilisateur[Nom_Utilisateur].'
                          </td>
                          
                           <td class="text-primary">
                            '.$liste_utilisateur[PNom_Utilisateur].'
                          </td>
                           <td class="text-primary">
                            0'.$liste_utilisateur[numéro_utilisateur].'
                          </td>
                          <td class="text-primary">
                            '.$liste_utilisateur[Mail_Utilisateur].'
                          </td>
                          <td class="text-primary">
                            '.$liste_utilisateur[Utilisateur_Type].'
                          </td>
                          <td>
                          
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$i.'">
                          Supprimer l\'utilisateur
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Suppression</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <center><b> Etes vous sur de vouoir supprimer cet utilisateur? </br> Vous ne pourrez pas revenir en arrière!</b></center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a href="supprimer_user.php?user='.$liste_utilisateur[Id_Utilisateur].'" class="btn btn-danger">Supprimer l\' utilisateur</a>
                              </div>
                            </div>
                          </div>
                        </div>
                          </td>
                        </tr>';
                          $i++;
                          }
                          ?>
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
            
                    </div>
                </div>
            </div>
</div>

            <?php include 'foot_admin.php'; ?>