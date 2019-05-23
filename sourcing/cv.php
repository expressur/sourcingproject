<!-- header -->
<?php
include 'header.php';
if (empty($_SESSION['Id_Utilisateur'])) {
    header('Location: index.php');
}
$extensions_valides = array( 'doc' , 'pdf' , 'docx' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['cv']['name'], '.')  ,1)  );
$nom = 'CV_de_'.$_SESSION['PNom_Utilisateur'].'_'.$_SESSION['Nom_Utilisateur'].'_'. md5(uniqid(rand(), true));
mkdir('cv/', 0777, true);
$resultat = move_uploaded_file($_FILES['cv']['tmp_name'],$nom);
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
    <div class="container">
        <div class="row justify-content-center d-flex">
            <?php echo $nom; ?>
            <div class="col-lg-8 post-list">
                <form method="post">
                    <label for="description">Titre du CV</label><br />
                    <input type="text" name="titre" id="titre" /><br />
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <label for="cv">CV(PDF, DOC, DOCX | Max 5 MO) :</label><br/>
                    <input type="file" name="cv" id="icone" /><br />

                    <label for="description">Description de votre CV :</label><br />
                    <textarea name="description" id="description"></textarea><br />
                    <input type="submit" name="submit" value="Envoyer" />
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