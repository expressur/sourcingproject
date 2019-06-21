<!-- header -->
<?php
include 'header.php';
if (empty($_SESSION['Id_Utilisateur'])) {
    header('Location: index.php');
}
?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Mon CV			
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a><span class="lnr lnr-arrow-right"></span> <a href="profil.php">Mon profil </a> <span class="lnr lnr-arrow-right"></span>  <a> Mon CV</a></p>
            </div>											
        </div>
    </div>
</section>
<section class="post-area section-gap">
   <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Envoie d'un cv</h4>

                    </div>
                    <div class="card-body">
                        <form method="post" action="up_cv.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Titre du cv :</label><br/>
                                    <input class="form-control" type="text" name="titre_cv" /><br>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                    <label class="bmd-label-floating" for="doc">Document (DOC, DOCX | Max 3 MO) :</label><br/>
                                    <input class="form-controlclass btn btn-secondary" type="file" name="doc" id="icone" /><br>
                                    <button type="submit" class="btn btn-secondary pull-right">Envoyer mon dernier cv!</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card-body">
                  <div class="table-responsive" >
                    
                      <table class="table">
                      <thead class=" text-secondary">
                        <th>
                        <center> Titre du cv</center>
                        </th>
                      </thead>
                      <tbody>
                          <?php
                          while ($liste_cv = $liste_des_cv ->fetch()) {?>
                           
                        <tr>
                          <td>
                              <form method="post" action="telecharger_cv.php">
                                  <input hidden="" name="id_cv" value="<?php echo $liste_cv[Id_Cv];?>">
                                  <input hidden="" name="check" value="1">
                                  <center> <button class="btn btn-secondary"> <?php echo $liste_cv[Titre_Cv]; ?></button></center>
                              </form>
                          </td>
                        </tr>
                         
                         <?php }?>
                      </tbody>
                    </table>
                      
                  </div>
                </div>
        </div>
    </div>
</div>
    
</section>

<!-- start footer Area -->		
<?php include 'foot.php'; ?>
<!-- End footer Area -->

</body>
</html>