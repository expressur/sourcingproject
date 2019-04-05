<?php include 'header_admin.php'; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Liste des utilisateur ayant postuler pour une offre</h4>
                  
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
                          Titre de l'offre
                        </th>
                        <th>
                          Date de debut
                        </th>
                        <th>
                          Rémuneration
                        </th>
                        <th>
                          Lien vers l'offre
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_candidat = $liste_candidature ->fetch()) {
                              echo'
                        <tr>
                          <td>
                            '.$liste_candidat[Nom_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_candidat[PNom_Utilisateur].'
                          </td>
                          <td>
                            '.$liste_candidat[Titre_Offre].'
                          </td>
                          <td>
                           '.$liste_candidat[Date_Debut_Offre].'
                          </td>
                          <td class="text-primary">
                            '.$liste_candidat[Remuneration_Offre].' € '.$liste_candidat[Remuneration_Type].'
                          </td>
                          <td>
                            <a href="../../single.php?off=' . $liste_candidat[Id_Offre] . '"> <FONT color="teal">Cliquez !</FONT></a>
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
              
           
          </div>
        </div>
      </div>
      <?php include 'foot_admin.php'; ?>