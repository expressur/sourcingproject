<!-- header -->
<?php
include 'header.php';
?>

<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span><?php echo $nb_offre['0']; ?></span> offres au total sur notre site!				
                </h1>	
                <form action="search.php" class="serach-form-area">
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
                <p class="text-white"> <span>Search by tags:</span> Tecnology, Business, Consulting, IT Company, Design, Development</p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start features Area -->
<section class="features-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Recherche</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Appliquer</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Sécurité</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-feature">
                    <h4>Notifications</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </p>
                </div>
            </div>																		
        </div>
    </div>	
</section>
<!-- End features Area -->



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
                                <a href="single.php"><h4>' . $offres[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $offres[Type_OffreT] . '</h6>					
                            </div>
                            <ul class="btns ">
                                <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                <li><a href="#">Apply</a></li>
                            </ul>
                        </div>
                        <p>'
                        . $offres[Description_Offre] .
                        '</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $offres[Num_Adresse] . ' ' . $offres[Voie_Adresse] . ', ' . $offres[Dep_Adresse] . ' ' . $offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $offres[Remuneration_Offre] . ' €</p>
                    </div>
                </div>';
                    }
                }
                ?>											

                <a class="text-uppercase loadmore-btn mx-auto d-block" href="category.php">Voir plus de job</a>

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Offre par endroit</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="category.php"><p>New York</p><span>37</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Park Montana</p><span>57</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Atlanta</p><span>33</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Arizona</p><span>36</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Florida</p><span>47</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Rocky Beach</p><span>27</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Chicago</p><span>17</span></a></li>
                    </ul>
                </div>

                <div class="single-slidebar">
                    <h4>Meilleurs offres</h4>
                    <div class="active-relatedjob-carusel">
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.php"><h4>Creative Art Designer</h4></a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.php"><h4>Creative Art Designer</h4></a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>
                        <div class="single-rated">
                            <img class="img-fluid" src="img/r1.jpg" alt="">
                            <a href="single.php"><h4>Creative Art Designer</h4></a>
                            <h6>Premium Labels Limited</h6>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                            </p>
                            <h5>Job Nature: Full time</h5>
                            <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                            <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                            <a href="#" class="btns text-uppercase">Apply job</a>
                        </div>																		
                    </div>
                </div>							

                <div class="single-slidebar">
                    <h4>Offre par catégorie</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Technology</p><span>37</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Media & News</p><span>57</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Goverment</p><span>33</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Medical</p><span>36</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Restaurants</p><span>47</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Developer</p><span>27</span></a></li>
                        <li><a class="justify-content-between d-flex" href="category.php"><p>Accounting</p><span>17</span></a></li>
                    </ul>
                </div>				
            </div>
        </div>
    </div>	
</section>
<!-- End post Area -->


<?php include 'foot.php'; ?>
<!-- End footer Area -->		

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
</body>
</php>



