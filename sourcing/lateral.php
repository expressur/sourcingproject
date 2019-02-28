            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Offre par endroit</h4>
                    <ul class="cat-list">
                        <?php 
                        while ($li_offre = $lieu->fetch())
                        {
                            echo'<li><a class="justify-content-between d-flex" href="search.php?lieu='.$li_offre[Id_Adresse].'"><p>'.$li_offre[Ville_Adresse].'</p></a></li>';
                        }
                        ?>
                    </ul>
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
