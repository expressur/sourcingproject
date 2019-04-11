<?php include 'header_admin.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des offres pour <?php   echo $modal_liste_candidat[Nom_Utilisateur].' '.$modal_liste_candidat[PNom_Utilisateur]; ?></h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                         Titre de l'offre
                        </th>
                        <th>
                          Date de début de l'offre
                        </th>
                        <th>
                          Détail complet de l'offre
                        </th>
       
                      </thead>
                      <tbody>
                          <?php
                          while ($modal_offre = $modal_liste_offre->fetch()) {
                              echo'
                        <tr>
                          <td>
                            '.$modal_offre[Titre_Offre].'
                          </td>
                          <td>
                            '.$modal_offre[Date_Debut_Offre].'
                          </td>
                          <td>
                            <a href="../../single.php?off=' . $modal_offre[Id_Offre] . '"> <FONT color="teal">Cliquez !</FONT></a>
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
              <a href='tables.php' class="btn btn-secondary btn-lg btn-block">Retour a la liste</a>
          </div>
        </div>
      </div>

 <?php include 'foot_admin.php'; ?>