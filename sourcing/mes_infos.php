<!-- header -->
<?php
include 'header.php';
if (empty($_SESSION['Id_Utilisateur'])) {
    header('Location: index.php');
}

if(!empty($_POST)){
$req = $bdd->prepare("UPDATE utilisateur SET Nom_Utilisateur=?, PNom_Utilisateur=?, Mail_Utilisateur=?, numéro_utilisateur=? WHERE Id_Utilisateur =".$_SESSION['Id_Utilisateur']);
$req->execute(array($_POST['nom'], $_POST['Pnom'], $_POST['mail'],$_POST['telephone']));
if(empty($_POST['mdp1']))
{
    sleep(1);
}
elseif($_POST['mdp1'] == $_POST['mdp2'])
{    
    $u_password = password_hash($_POST["mdp1"], PASSWORD_DEFAULT);
    $sql = $bdd->prepare("UPDATE utilisateur SET Mdp_Utilisateur=? WHERE Id_Utilisateur = ?");
    $sql->execute(array($u_password, $_SESSION['Id_Utilisateur']));
    
    $_SESSION['nvpass'] = '0';
}
 else{ 
    echo 'Probleme de mot de passe';  
    }
    $addresse = $bdd->query("SELECT Id_Adresse FROM utilisateur WHERE Id_Utilisateur =".$id_user);
    $check_addresse = $addresse->fetch();
    
    if($check_addresse[Id_Adresse] === NULL)
    {
        $insc = $bdd->prepare("INSERT INTO adresse (Num_Adresse, Voie_Adresse, Dep_Adresse, Ville_Adresse) VALUES (? , ? , ? , ? )");
        $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));    
        $id = $bdd->lastInsertId();
        
        $sql =  $bdd->prepare("UPDATE utilisateur SET Id_Adresse=? WHERE Id_Utilisateur =".$_SESSION['Id_Utilisateur']);
        $sql->execute(array($id));
    }
    else
    {
        $id = $check_addresse[Id_Adresse];
        $insc = $bdd->prepare("UPDATE adresse SET Num_Adresse=?, Voie_Adresse=?, Dep_Adresse=?, Ville_Adresse=? WHERE Id_Adresse=".$id);
        $insc->execute(array($_POST['Num_Adresse'], $_POST['Voie_Adresse'], $_POST['Dep_Adresse'], $_POST['Ville_Adresse']));
    }
    header('Location: profil.php');
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
                        <label class="bmd-label-floating">Prénom</label><br/>
                        <input type="text" name="Pnom" value="<?php echo $infoP[PNom_Utilisateur] ?>"  class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Prénom'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <label class="bmd-label-floating">Nom de famille</label><br/>
                        <input type="text" name="nom" value="<?php echo $infoP[Nom_Utilisateur] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <label class="bmd-label-floating">Mail</label><br/>
                        <input type="emai" name="mail" value="<?php echo $infoP[Mail_Utilisateur] ?>" class="single-input-accent" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adresse Mail'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <label class="bmd-label-floating">Numéro de téléphone</label><br/>
                        <input type="text" name="telephone" value="0<?php echo $infoP[numéro_utilisateur] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numéro de téléphone'"  class="single-input">
                    </div>
                    <div class="mt-10">
                        <label class="bmd-label-floating">Mot de passe</label><br/>
                        <input type="password" name="mdp1" placeholder="Mot de passe" class="single-input-accent" >
                    </div>
                    <div class="mt-10">
                        <label class="bmd-label-floating">Confirmer le mot de passe</label><br/>
                        <input type="password" name="mdp2" placeholder="Confirmer mot de passe" class="single-input-accent">
                    </div>
                    <div class="mt-20">
                        <h5><i class="fa fa-thumb-tack" aria-hidden="true"></i>  Adresse</h5>
                    </div>
                    <div class="mt-15">
                        <label class="bmd-label-floating">Numéro d'adresse</label><br/>
                        <input type="text" name="Num_Adresse" value="<?php echo $infoA[Num_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Numéro'"  class="single-input">
                    </div>
                    <div class="mt-15">
                        <label class="bmd-label-floating">Voie</label><br/>
                        <input type="text" name="Voie_Adresse" value="<?php echo $infoA[Voie_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Voie'"  class="single-input">
                    </div>
                    <div class="mt-15">
                        <label class="bmd-label-floating">Département</label><br/>
                        <input type="text" name="Dep_Adresse" value="<?php echo $infoA[Dep_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Département'" class="single-input">
                    </div>
                    <div class="mt-15">
                        <label class="bmd-label-floating">Ville</label><br/>
                        <input type="text" name="Ville_Adresse" value="<?php echo $infoA[Ville_Adresse] ?>"  class="single-input-primary" class="single-input-primary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ville'"  class="single-input">
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