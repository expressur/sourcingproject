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


//$tableau = array(9,6,12,20);
//echo 'tableau de zero : '.$tableau[0].'</br>';
 if (empty($_SESSION['Id_Utilisateur'])) {
     
     $resultat = $bdd->query($requete);
while ($offres = $resultat->fetch() /* $offres = $les_offres->fetch() */) {
    $requete_categorie = $requet_categorie_offre.' '.$offres[Id_Offre].')';
    
    $resultat_categories = $bdd->query($requete_categorie);
    echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/job.png" alt="">
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
                                     <h5> Nom de l\'entreprise : <b>'.$offres[NomEntreprise_Utilisateur].' </b></h5>
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
     
 }
else{
    $i=0;
$resultat_postuler = $bdd->query ($requete_candidat_postuler . $_SESSION['Id_Utilisateur']);
$tableau = array();
//secho $requete_candidat_postuler . $_SESSION["Id_Utilisateur"].'</br>';
while($check_postuler = $resultat_postuler->fetch())
{
    //echo $check_postuler[Id_Offre].'</br>';
    $tableau[$i] = $check_postuler[Id_Offre];
    $i ++;
}
$resultat = $bdd->query($requete);
while ($offres = $resultat->fetch() /* $offres = $les_offres->fetch() */) {
    $requete_categorie = $requet_categorie_offre.' '.$offres[Id_Offre].')';
    
    $resultat_categories = $bdd->query($requete_categorie);
    echo'<div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="img/job.png" alt="">
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
                                    <h5> Nom de l\'entreprise : <b>'.$offres[NomEntreprise_Utilisateur].' </b></h5>
                                <h6> Type de contrat : ' . $offres[Type_OffreT] . '</h6>					
                            </div>
                              <div class="title text-center">
                           
                            <ul class="btns ">';
                       $trouver = FALSE;
                       
                      for($i=0;$i<count($tableau);$i++)
                       {
                           
                           if($offres[Id_Offre] == $tableau[$i]) 
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
                           echo' <li><a href="candidater.php?off=' . $offres[Id_Offre] . '&candidat=' . $_SESSION['Id_Utilisateur'] . '">Postuler</a></li>';    
                           echo' </ul>
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
}
?>					
