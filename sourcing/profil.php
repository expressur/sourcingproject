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
                    Mon profil				
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a> Mon profil</a></p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-40 header-text">
                <h1>Modifier mon profil</h1>

            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6">
               <?php echo' <a href="mes_infos.php?info='.$id_user.'"> '?>
                    <div class="single-service">
                        <h4><span class="lnr lnr-user"></span>Modifier mes infos personel</h4>
                        <p class="profil_txt">
                            Cliquez ici pour pouvoir modifier vos informations personel.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
               <?php echo' <a href="mes_offres.php?candidat='.$_SESSION['Id_Utilisateur'].'"> '?>
                    <div class="single-service">
                        <h4><span class="lnr lnr-license"></span>Les offres où j'ai postuler</h4>
                        <p class="profil_txt">
                            Cliquez ici pour voir toutes les offres où vous avez postulé.
                        </p>								
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <?php echo' <a href="cv.php?cv='.$_SESSION['Id_Utilisateur'].'"> '?>
                    <div class="single-service">
                        <h4><span class="lnr lnr-phone"></span>Mon cv</h4>
                        <p class="profil_txt">
                            Cliquez ici pour voir ou envoyer votre CV.
                        </p>								
                    </div>
                </a>
            </div>						
        </div>
    </div>	
</section>



<!-- End testimonial Area -->


<!-- start footer Area -->		
<?php include 'foot.php'; ?>
<!-- End footer Area -->		

</body>
</html>




