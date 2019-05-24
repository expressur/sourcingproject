<?php include 'header.php';?>
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h2 class="text-white">
                    Vous voulez enregistrer une offres ? Remplissez le formulaire !			
                </h2>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a><span class="lnr lnr-arrow-right"></span> <a>Demande d'inscription d'une entreprise </a> 
            </div>											
        </div>
    </div>
</section>
<!-- Start contact-page Area -->
        <section class="contact-page-area section-gap">
            <div class="container">
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                        <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
                            <div class="row">	
                                <div class="col-lg-12 form-group">
                                    <input name="nom" placeholder="Entez votre nom"  class="common-input mb-20 form-control" required="" type="text">

                                    <input name="email" placeholder="Entez votre email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  class="common-input mb-20 form-control" required="" type="email">

                                    <input name="entreprise" placeholder="Entez le nom de votre entreprise"  class="common-input mb-20 form-control" required="" type="text">
                                    <input name="offre" placeholder="Entez le nom de votre offre"  class="common-input mb-20 form-control" required="" type="text">
                                    <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Entrez quelque details important de l'offre"  required=""></textarea>
                                    <button type="submit" class="primary-btn mt-20 text-white" style="float: right;">Envoyer la demande</button>
                                    <div class="mt-20 alert-msg" style="text-align: left;"></div>
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>	
        </section>

<!-- End calto-action Area -->

<!-- Start download Area -->

<!-- End download Area -->

<!-- start footer Area -->		
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
                <a href="mailto:contact@expressur.fr">contact@expressur.fr</a></br>
                Téléphone :<a href="tel:0983340019">  09.83.34.00.19</a></br>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>	
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>			
<script src="js/parallax.min.js"></script>		
<script src="js/mail-script.js"></script>	
<script src="js/main.js"></script>
<script type="text/javascript">
    $(function () {
        $("#monBouton").click(function () {
            $("html, body").animate({scrollTop: 0}, "slow");
        });

    });
    

</script>



