<?php
include 'header_admin.php';

if (!empty($_POST)) {
    $error = false;

  
    // INSCRIPTION
    if ($error == false) {
        
        $ajout1 = $bdd->prepare("INSERT INTO categorie (Nom_Categorie) VALUES (?)");
        $ajout1->execute(array($_POST['ajout1']));
        sleep(1);
        $ajout2 = $bdd->prepare("INSERT INTO categorie (Nom_Categorie) VALUES (?)");
        $ajout2->execute(array($_POST['ajout2']));
        sleep(1);
        $ajout3 = $bdd->prepare("INSERT INTO categorie (Nom_Categorie) VALUES (?)");
        $ajout3->execute(array($_POST['ajout3']));
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
                        <h4 class="card-title">Ajouter une catégorie</h4>
                        <p>Au moins une catégorie à inscrire.</p>

                    </div>
                    <div class="card-body">


                        <form method="post">
                            
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Le nom de la catégorie a ajouter</label>
                                        <input required="" name="ajout1" id="NomEntreprise_Utilisateur"type="text" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Le nom de la catégorie a ajouter</label>
                                        <input  name="ajout2" id="NomEntreprise_Utilisateur"type="text" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Le nom de la catégorie a ajouter</label>
                                        <input  name="ajout3" id="NomEntreprise_Utilisateur"type="text" class="form-control" >
                                    </div>
                                </div>
                               
                            </div>
                
                            <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                            <div class="clearfix"></div>
                        </form>


                    </div>
                </div>
            </div>
                    </div>
        
        <?php if ($_SESSION['Id_Type'] == 1 )
            {?>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste de toutes les catégories</h4>
                  
                </div>
            <div class="card-body">
                  <div class="table-responsive">
                    
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom de la catégorie
                        </th>
                        <th>
                          Supprimer la catégorie
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_categorie = $liste_des_categorie->fetch()) {
                              echo'
                        <tr>
                          <td class="text-primary">
                            '.$liste_categorie[Nom_Categorie].'
                          </td>
                          <td>
                          
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$i.'">
                          Supprimer la catégorie
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
                               <center><b> Etes vous sur de vouoir supprimer cette catégorie? </br> Vous ne pourrez pas revenir en arrière!</b></center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a href="supprimer_categorier.php?cat='.$liste_categorie[Id_Categorie].'" class="btn btn-danger">Supprimer la catégorie</a>
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

            <?php include 'foot_admin.php'; ?>