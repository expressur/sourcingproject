<?php
include 'header.php';
$requete_categorie = $requet_categorie_offre.' '.$d_offre[Id_Offre].')';
$resultat_categories = $bdd->query($requete_categorie);
$i=0;
if (!empty($_SESSION["Id_Utilisateur"]))
{
    $resultat_postuler = $bdd->query ($requete_candidat_postuler . $_SESSION['Id_Utilisateur']);
    $tableau = array();
    //secho $requete_candidat_postuler . $_SESSION["Id_Utilisateur"].'</br>';
    while($check_postuler = $resultat_postuler->fetch())
    {
        //echo $check_postuler[Id_Offre].'</br>';
        $tableau[$i] = $check_postuler[Id_Offre];
        $i ++;
    } 
}

$resultat = $bdd->query($requete);
?>


<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Details de l'offre				
                </h1>	
                <p class="text-white link-nav"><a href="index.php">Acceuil </a>  <span class="lnr lnr-arrow-right"></span>  <a> Détails de l'offre</a></p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/job.png" alt="">
                        <ul class="tags">
                            <?php
                           if($requet_categorie_offre!= NULL){
                                while ($cat_offre = $resultat_categories->fetch()){
                                 echo '<li>
                                    <a>'.$cat_offre[Nom_Categorie].'</a>
                                </li>';
                                } // end while
                            } else {
                              echo '<li>
                                    <a>-VIDE-</a>
                                </li>';  
                            }?>
                        </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="#"><h4><?php echo $d_offre[Titre_Offre]; ?> </h4></a>
                                <h5> Nom de l'entreprise : <b><?php echo $d_offre[NomEntreprise_Utilisateur];?> </b></h5>
                                <h6> Type de contrat : <?php echo $d_offre[Type_OffreT]; ?></h6>					
                            </div>
                            <ul class="btns">
                                <?php 
                                $trouver = FALSE;
                       
                      for($i=0;$i<count($tableau);$i++)
                       {
                           
                           if($d_offre[Id_Offre] == $tableau[$i]) 
                           {
                               $trouver = TRUE;
                               
                               break;
                           }
                       }
                       
                        if($trouver)
                        {
                        echo '<button id="postuler" type="submit" class="genric-btn disable" >A Déjà postuler</button>';
                        }
                       else 
                       { ?> <li><a href="candidater.php?off=<?php echo $d_offre[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'];?>">Postuler</a></li>
                       <?php
                       } ?>
                                
                                 
                            </ul>
                        </div>
                        <p>
                            <?php echo $d_offre[Petite_Description_Offre]; ?>
                        </p>
                        <p class="address"><span class="lnr lnr-map"></span> <?php echo $d_offre[Num_Adresse] . ' ' . $d_offre[Voie_Adresse] . ', ' . $d_offre[Dep_Adresse] . ' ' . $d_offre[Ville_Adresse]; ?></p>
                        <p class="address"><span class="lnr lnr-database"></span> <?php echo $d_offre[Remuneration_Offre] . ' € ' . $d_offre[Remuneration_Type]; ?></p>
                        <p class="address">Date de debut :  <?php echo $d_offre[Date_Debut_Offre]; ?></p>
                        <p class="address">Date de fin :  <?php echo $d_offre[Date_Fin_Offre]; ?></p>
                    </div>
                </div>	
                <div class="single-post job-details">
                    <h4 class="single-title">Cette offre consicte à : </h4>
                    <p>
                        <?php echo $d_offre[Description_Offre]; ?>
                    </p>

                </div>
													
            </div>
            <?php include 'lateral.php'; ?>
        </div>
    </div>	
</section>
<!-- End post Area -->
<?php include 'foot.php'; ?>
<!-- End footer Area -->		

</body>
</html>



