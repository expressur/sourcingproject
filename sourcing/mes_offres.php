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
                    Les offres où j'ai postuler				
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Accueil </a><span class="lnr lnr-arrow-right"></span> <a href="profil.php">Mon profil </a> <span class="lnr lnr-arrow-right"></span>  <a> Les offres où j'ai postuler</a></p>
            </div>											
        </div>
    </div>
</section>
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    while ($m_offres = $mes_offres ->fetch()) {
                        echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/post.png" alt="">
                        <ul class="tags">
                            <li>
                                <a href="#">Art</a>
                            </li>
                            <li>
                                <a href="#">Media</a>
                            </li>
                            <li>
                                <a href="#">Design</a>					
                            </li>
                        </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="single.php?off=' . $m_offres[Id_Offre] . '"><h4>' . $m_offres[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $m_offres[Type_OffreT] . '</h6>					
                            </div>
                            <ul class="btns ">
                                
                                <li><a href="#" id="#supprimer">Supprimer</a></li>
                            </ul>
                        </div>
                        <p>'
                        . $m_offres[Petite_Description_Offre] .
                        '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $m_offres[Num_Adresse] . ' ' . $m_offres[Voie_Adresse] . ', ' . $m_offres[Dep_Adresse] . ' ' . $m_offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $m_offres[Remuneration_Offre] . ' € '. $m_offres[Remuneration_Type].'</p>
                        <p class="address"> Date de fin : ' . $m_offres[Date_Fin_Offre] . '</p>
                        <p class="address"> Date de debut : ' . $m_offres[Date_Debut_Offre] . '</p>
                    </div>
                </div>';
                    }
                }
                ?>											
            </div>
            <?php include 'lateral.php'; ?>					
        </div>
    </div>
</div>	
</section>

<!-- start footer Area -->		
<?php include 'foot.php'; ?>
<!-- End footer Area -->		

</body>
</html>