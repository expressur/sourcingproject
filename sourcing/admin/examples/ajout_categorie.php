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
                </div>
            </div>

            <?php include 'foot_admin.php'; ?>