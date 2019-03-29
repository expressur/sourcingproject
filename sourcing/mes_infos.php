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
                    Modifier mes infos personel			
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a><span class="lnr lnr-arrow-right"></span> <a href="profil.php">Mon profil </a> <span class="lnr lnr-arrow-right"></span>  <a> Modifier mes infos personel</a></p>
            </div>											
        </div>
    </div>
</section>
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 col-md-8">
                <h3 class="mb-30">Modifier les informations</h3>
                <form action="#">
                    <div class="mt-10">
                        <input type="text" name="Pnom" placeholder="<?php echo $infoP[PNom_Utilisateur] ?>"  class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'" required="" class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="nom" placeholder="<?php echo $infoP[Nom_Utilisateur] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'" required="" class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="emai" name="mail" placeholder="<?php echo $infoP[Mail_Utilisateur] ?>" class="single-input-accent" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adresse Mail'" required="" class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="mdp" placeholder="Mot de passe" class="single-input-accent" >
                    </div>
                    <div class="mt-10">
                        <input type="password" name="mdp" placeholder="Confirmer mot de passe" class="single-input-accent">
                    </div>
                    <div class="mt-20">
                        <h5><i class="fa fa-thumb-tack" aria-hidden="true"></i>  Adresse</h5>
                    </div>
                    <div class="mt-15">
                        <input type="text" name="numero" placeholder="<?php echo $infoP[Num_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numéro'" required="" class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="voie" placeholder="<?php echo $infoP[Voie_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Voie'" required="" class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="departement" placeholder="<?php echo $infoP[Dep_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Département'" required="" class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="ville" placeholder="<?php echo $infoP[Ville_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ville'" required="" class="single-input">
                    </div>
                        <a type="submit"  class="genric-btn success-border circle arrow">Modifier<span class="lnr lnr-arrow-right"></span></a>
                </form>
            </div>
            <?php //include 'lateral.php'; ?>					
        </div>
    </div>
</div>	
</section>

<!-- start footer Area -->		
<?php include 'foot.php'; ?>
<!-- End footer Area -->

</body>
</html>