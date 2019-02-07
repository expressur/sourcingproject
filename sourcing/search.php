<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Job Listing</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">					
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

        <!-- header -->
        <?php
        include 'header.php'
        ?>


        <!-- start banner Area -->
        <section class="banner-area relative" id="home">	
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row search-page-top d-flex align-items-center justify-content-center">
                    <div class="banner-content col-lg-12">
                        <h1 class="text-white">
                            Recherche d'offre				
                        </h1>
                        <p class="text-white link-nav">
                            <a href="index.html">Acceuil </a> <span class="lnr lnr-arrow-right"></span> <a> Recherche d'offre</a>
                        </p>	
                        <form action="#" class="serach-form-area">
                            <div class="row justify-content-center form-wrap">
                                <div class="col-lg-4 form-cols">
                                    <input type="text" class="form-control" name="search" placeholder="what are you looging for?">
                                </div>
                                <div class="col-lg-3 form-cols">
                                    <div class="default-select" id="default-selects"">
                                        <select>
                                            <option value="1">Select area</option>
                                            <option value="2">Dhaka</option>
                                            <option value="3">Rajshahi</option>
                                            <option value="4">Barishal</option>
                                            <option value="5">Noakhali</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 form-cols">
                                    <div class="default-select" id="default-selects2">
                                        <select>
                                            <option value="1">All Category</option>
                                            <option value="2">Medical</option>
                                            <option value="3">Technology</option>
                                            <option value="4">Goverment</option>
                                            <option value="5">Development</option>
                                        </select>
                                    </div>										
                                </div>
                                <div class="col-lg-2 form-cols">
                                    <button type="button" class="btn btn-info">
                                        <span class="lnr lnr-magnifier"></span> Search
                                    </button>
                                </div>								
                            </div>
                        </form>	
                        <p class="text-white">49 resultat trouver pour <span>"Web developer"</span></p>
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
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    while ($offres = $les_offres->fetch()) {
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
                                <a href="single.php?off='.$offres[Id_Offre].'"><h4>' . $offres[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $offres[Type_OffreT] . '</h6>					
                            </div>
                            <ul class="btns ">
                                
                                <li><a href="#">Candidater</a></li>
                            </ul>
                        </div>
                        <p>'
                        . $offres[Petite_Description_Offre] .
                        '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $offres[Num_Adresse] . ' ' . $offres[Voie_Adresse] . ', ' . $offres[Dep_Adresse] . ' ' . $offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $offres[Remuneration_Offre] . ' €</p>
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
        <!-- End post Area -->
<?php include 'foot.php'; ?>		

    </body>
</html>



