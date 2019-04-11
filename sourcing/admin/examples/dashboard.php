    <?php include 'header_admin.php'; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Nombre d'offre</p>
                  <h3 class="card-title"><?php echo $nb_offre['0']; ?>
                    <small></small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
              
              <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Nombre de candidat</p>
                  <h3 class="card-title"><?php echo $nb_candidat['0']; ?>
                    <small></small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
              
           
            
        
          </div>
            
          
         
        </div>
      </div>
      <?php include 'foot_admin.php'; ?>