            <div class="col-lg-4 sidebar">
                <div  class="single-slidebar">
                    <h4>Offre par endroit</h4>
                    <ul class="cat-list">
                        <?php 
                        while ($li_offre = $lieu->fetch())
                        {
                            echo'<li><a class="justify-content-between d-flex" href="search.php?lieu='.$li_offre[Ville_Adresse].'#ancre"><p>'.$li_offre[Ville_Adresse].'</p></a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="single-slidebar">
                    <h4>Offre par catégorie</h4>
                    <ul class="cat-list">
                        <?php
                        while ($cat = $categorie->fetch())
                        {
                            echo'<li><a class="justify-content-between d-flex" href="search.php?categorie='.$cat[Nom_Categorie].'#ancre"><p>'.$cat[Nom_Categorie].'</p></a></li>';
                        }
                        ?>
                    </ul>
                </div>				
            </div>
