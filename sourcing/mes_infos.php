<!-- header -->
<?php
include 'header.php';
if (empty($_SESSION['Id_Utilisateur'])) {
    header('Location: index.php');
}


$req = $bdd->prepare("UPDATE utilisateur SET Nom_Utilisateur=?, PNom_Utilisateur=?, Mail_Utilisateur=? WHERE Id_Utilisateur =".$_SESSION['Id_Utilisateur']);
$req->execute(array($_POST['nom'], $_POST['Pnom'], $_POST['mail']));
if(empty($_POST['mdp']))
{
    sleep(1);
}
else
{
    sleep(1);
    $u_password = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $sql = $bdd->prepare("UPDATE utilisateur SET Mdp_Utilisateur=? WHERE Id_Utilisateur =".$_SESSION['Id_Utilisateur']);
    $sql->execute(array($u_password));
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
                <form method="post">
                    <div class="mt-10">
                        <input type="text" name="Pnom" value="<?php echo $infoP[PNom_Utilisateur] ?>"  class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="nom" value="<?php echo $infoP[Nom_Utilisateur] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="emai" name="mail" value="<?php echo $infoP[Mail_Utilisateur] ?>" class="single-input-accent" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adresse Mail'"  class="single-input">
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
                        <input type="text" name="numero" value="<?php echo $infoP[Num_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numéro'"  class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="voie" value="<?php echo $infoP[Voie_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Voie'"  class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="departement" value="<?php echo $infoP[Dep_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Département'" class="single-input">
                    </div>
                    <div class="mt-15">
                        <input type="text" name="ville" value="<?php echo $infoP[Ville_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ville'"  class="single-input">
                    </div>
                    <button type="submit"  class="genric-btn success-border circle arrow">Modifier<span class="lnr lnr-arrow-right"></span></button>
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