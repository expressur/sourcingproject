<?php include 'header_admin.php'; 
$nombres_offres = $nb_offre[0]?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des candidat ayant postuler pour une offre</h4>
                  
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
                          CV
                        </th>
                        <th>
                          Nombre d'offres
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_candidat = $liste_candidature ->fetch()) {
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
                          CV
                        </td>
                          <td><a  href="liste_offre.php?modal='.$id_candidat.'&idcandidat='.$id_candidat.'">
                           '.$liste_candidat[nombre].'
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
              
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des offres</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                      <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nom de l'offre
                        </th>
                        <th>
                          Voir l'offre en entier
                        </th>
                        <th>
                          Supprimer l'offre
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_supprimer = $liste_supprimer_offre->fetch()) {
                              echo'
                        <tr>
                          <td class="text-primary">
                            '.$liste_supprimer[Titre_Offre].'
                          </td>
                          
                          <td>
                            <a href="../../single.php?off=' . $liste_supprimer[Id_Offre] . '"> <FONT color="teal">Cliquez !</FONT></a>
                          </td>
                          <td>
                          
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$i.'">
                          Supprimer l\'offre
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <center><b> Etes vous sur de vouoir supprimer cette offre? </br> Vous ne pourrez pas revenir en arrière!</b></center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <a href="supprimer_offre.php?off='.$liste_supprimer[Id_Offre].'" class="btn btn-danger">Supprimer l\' offre</a>
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
              
          </div>
        </div>
      </div>
      
      <?php include 'foot_admin.php'; ?>