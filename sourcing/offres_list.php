<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$requete = $requete_offres;
if (isset($PAGE) && $PAGE == 'index') {
    $requete = $requete_offres . ' LIMIT 10';
}

$resultat = $bdd->query($requete);
while ($offres = $resultat->fetch() /* $offres = $les_offres->fetch() */) {
    $requete_categorie = $requet_categorie_offre.' '.$offres[Id_Offre].')';
    
    $resultat_categories = $bdd->query($requete_categorie);
    echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/post.png" alt="">
                        <ul class="tags">';
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
                            }
                       echo' </ul>
                    </div>
                    <div class="details">
                        <div class="title d-flex flex-row justify-content-between">
                            <div class="titles">
                                <a href="single.php?off=' . $offres[Id_Offre] . '"><h4>' . $offres[Titre_Offre] . '</h4></a>
                                <h6> Type de contrat : ' . $offres[Type_OffreT] . '</h6>					
                            </div>
                              <div class="title text-center">
                           
                            <ul class="btns ">
                                <li><a href="candidater.php?off=' . $offres[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'] . '">Postuler</a></li>
                            
                            </ul>
                            </div>
                        </div>
                        <p>'. $offres[Petite_Description_Offre].'</p>
                       
                        <p class="address"><span class="lnr lnr-map"></span> ' . $offres[Num_Adresse] . ' ' . $offres[Voie_Adresse] . ', ' . $offres[Dep_Adresse] . ' ' . $offres[Ville_Adresse] . '</p>
                        <p class="address"><span class="lnr lnr-database"></span> ' . $offres[Remuneration_Offre] . ' € ' . $offres[Remuneration_Type] . '</p>
                        <p class="address"> Date de debut : ' . $offres[Date_Debut_Offre] . '</p>
                        <p class="address"> Date de fin : ' . $offres[Date_Fin_Offre] . '</p>
                        
                    </div>
                </div>';
}
?>					
