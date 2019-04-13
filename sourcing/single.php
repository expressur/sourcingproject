<?php
include 'header.php'
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
                                <a href="#"><h4><?php echo $d_offre[Titre_Offre]; ?> </h4></a>
                                <h6> Type de contrat : <?php echo $d_offre[Type_OffreT]; ?></h6>					
                            </div>
                            <ul class="btns">
                                 <li><a href="candidater.php?off=<?php echo $d_offre[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'];?>">Postuler</a></li>
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
                <div class="single-post job-experience">
                    <h4 class="single-title">Experience requis</h4>
                    <ul>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>	
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>																											
                    </ul>
                </div>
                <div class="single-post job-experience">
                    <h4 class="single-title">Job Features & Overviews</h4>
                    <ul>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>	
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>													
                    </ul>
                </div>	
                <div class="single-post job-experience">
                    <h4 class="single-title">Education Requirements</h4>
                    <ul>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>																										
                    </ul>
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



