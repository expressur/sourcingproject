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
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_offre_entreprise = $liste_offre->fetch()) {
                              echo'
                        <tr>
                          <td>
                            '.$liste_offre_entreprise[Titre_Offre].'
                          </td>
                          <td>
                            '.$liste_offre_entreprise[Date_Debut_Offre].'
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
          </div>
        </div>
      </div>

<?php include 'foot_admin.php'; ?>