<!-- header -->
<?php
include 'header.php';
if ($_SESSION['Id_Utilisateur'] == NULL) {
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
                <p class="text-white link-nav"><a href="index.html">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a> Mon profil</a></p>
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
                <a href="#">
                    <div class="single-service">
                        <h4><span class="lnr lnr-user"></span>Modifier mes infos personel</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
               <?php echo' <a href="mes_offres.php?candidat='.$_SESSION['Id_Utilisateur'].'"> '?>
                    <div class="single-service">
                        <h4><span class="lnr lnr-license"></span>Les offres où j'ai postuler</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>								
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#">
                    <div class="single-service">
                        <h4><span class="lnr lnr-phone"></span>Mon cv</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>								
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#">
                    <div class="single-service">
                        <h4><span class="lnr lnr-rocket"></span>EUH</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>				
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#">
                    <div class="single-service">
                        <h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>								
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#">
                    <div class="single-service">
                        <h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
                        <p class="profil_txt">
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
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




