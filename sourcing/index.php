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
                <form method="post" action="search.php" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-7 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="Recherche par mot-clé">
                        </div>
                        
                        <div class="col-lg-2 form-cols">
                            <button type="button" class="btn btn-info">
                                <span class="lnr"></span><font color="#000000">Recherche</font>
                            </button>
                        </div>								
                    </div>
                </form>	
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start post Area -->
<section id="ancre_postuler" class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-8 post-list">
                <?php
                $PAGE='index';
                include 'offres_list.php';
                ?>						
                <a class="text-uppercase loadmore-btn mx-auto d-block" href="search.php"><font color="#000000">Voir plus de job</font></a>
            </div>
            
            <?php include 'lateral.php'; ?>
            
        </div>
    </div>	
</section>
<!-- End post Area -->


    <?php include 'foot.php'; ?>
		


</body>

