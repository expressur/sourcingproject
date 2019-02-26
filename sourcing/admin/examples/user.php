<?php include 'header_admin.php'; ?>
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
                  <form>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Entreprise</label>
                          <input type="text" class="form-control" >
                        </div>
                      </div>
                     
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Prenom</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nom</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Numero d'adresse</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                        <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Voie</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ville</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code postale</label>
                          <input type="text" class="form-control">
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
                                <select>
                                    <option value="0">Selectionnez un type</option>
                                    <?php
                                        while ($type_u = $type_utilisateur->fetch()) {
                                            echo'<option value="' . $type_u[Id_Type] . '">' . $type_u[Utilisateur_Type] . '</option>';
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