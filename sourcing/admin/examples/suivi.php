<?php include 'header_admin.php'; ?>
 <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Nouveau candidat a suivre</h4>                
                </div>
                <div class="card-body">
                  <div class="table-responsive">              
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom
                        </th>
                        <th>
                          Prenom
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Numéro de téléphone
                        </th>
                        <th>
                          CV
                        </th>
                        <th>
                         Les suivres
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_candidat = $liste_des_non_suivi ->fetch()) {
                              $id_candidat = $liste_candidat[Id_Utilisateur];
                              echo'
                        <tr>
                          <td>
                            '.$liste_candidat[Nom_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_candidat[PNom_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_candidat[Mail_Utilisateur].'
                          </td>
                           <td>
                            0'.$liste_candidat[numéro_utilisateur].'
                          </td>
                          <td>
                          <a class="btn btn-dark" href="dl_cv.php?id_user='.$liste_candidat[Id_Utilisateur].'">CV</a>
                        </td>
                          <td><a class="btn btn-dark" href="add_suivi.php?idcandidat='.$id_candidat.'">
                          Ajouter a ma liste des suivi
                          </a></td>                     
                        </tr>';                    
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des candidat que je suit</h4>                
                </div>
                <div class="card-body">
                  <div class="table-responsive">              
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom
                        </th>
                        <th>
                          Prenom
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Numéro de téléphone
                        </th>
                        <th>
                          CV
                        </th>
                        <th>
                         Les notes
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($mes_suivi = $liste_mes_suivi ->fetch()) {
                              $id_candidat = $mes_suivi[Id_Utilisateur];
                              echo'
                        <tr>
                          <td>
                            '.$mes_suivi[Nom_Utilisateur].'
                          </td>
                          <td>
                            '.$mes_suivi[PNom_Utilisateur].'
                          </td>
                          <td>
                            '.$mes_suivi[Mail_Utilisateur].'
                          </td>
                           <td>
                            0'.$mes_suivi[numéro_utilisateur].'
                          </td>
                          
                          <td>
                          <a class="btn btn-dark" href="dl_cv.php?id_user='.$mes_suivi[Id_Utilisateur].'">CV</a>
                        </td>
                          <td><a class="btn btn-dark" href="liste_offre.php?modal='.$id_candidat.'&idcandidat='.$id_candidat.'">
                          Voir/Ajouter une note
                          </a></td>                      
                        </tr>';                    
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des candidat que d'autres suivent</h4>                
                </div>
                <div class="card-body">
                  <div class="table-responsive">              
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom
                        </th>
                        <th>
                          Prenom
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Numéro de téléphone
                        </th>
                        <th>
                          CV
                        </th>
                        <th>
                          Les notes
                        </th>
                        
                      </thead>
                      <tbody>
                          <?php
                          while ($pas_suivi = $liste_pas_mes_suivi ->fetch()) {
                              $id_candidate = $pas_suivi[Id_Utilisateur];
                              echo'
                        <tr>
                          <td>
                            '.$pas_suivi[Nom_Utilisateur].'
                          </td>
                          <td>
                            '.$pas_suivi[PNom_Utilisateur].'
                          </td>
                          <td>
                            '.$pas_suivi[Mail_Utilisateur].'
                          </td>
                          <td>
                            0'.$pas_suivi[numéro_utilisateur].'
                          </td>
                         <td>
                          <a class="btn btn-dark" href="dl_cv.php?id_user='.$pas_suivi[Id_Utilisateur].'">CV</a>
                        </td>
                          <td><a class="btn btn-dark" href="liste_offre.php?modal='.$id_candidate.'&idcandidat='.$id_candidate.'">
                           Voir/Ajouter une note
                          </a></td> 
                           
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
