<?php 
include '../../bdd.php';
if ($_SESSION['Id_Type'] == 1 || $_SESSION['Id_Type'] == 2 || $_SESSION['Id_Type'] == 3)
{
    $admin = $_SESSION['Id_Type'];
}
if (empty($admin))
{
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Administration
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
          <a href="../../index.php" class="simple-text logo-normal">
          Index du site
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
             <?php if ($_SESSION['Id_Type'] == 1) 
                {?>
          <li class="nav-item ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
                <?php }?>
          <?php if ($_SESSION['Id_Type'] == 1 || $_SESSION['Id_Type'] == 2) 
                {?>
          <li class="nav-item ">
              <a class="nav-link" href="./suivi.php">
              <i class="material-icons">S</i>
              <p>Suivi</p>
            </a>
          </li>
          
          <li class="nav-item ">
              <a class="nav-link" href="./ajout_categorie.php">
              <i class="material-icons">A</i>
              <p>Ajouter une catégorie</p>
            </a>
          </li>
          
          <li class="nav-item ">
              <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>Ajouter des utilisateurs</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Les listes</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="./ajout_offres.php">
              <i class="material-icons">library_books</i>
              <p>Ajouter des offres</p>
            </a>
          </li>
          <?php }?>
          <?php if ($_SESSION['Id_Type'] == 3) 
                {?>
          <li class="nav-item ">
              <a class="nav-link" href="./envoie_offre.php">
              <i class="material-icons">person</i>
              <p>Envoie d'offre</p>
            </a>
          </li>
          
          <li class="nav-item ">
              <a class="nav-link" href="./entreprise_offre.php">
              <i class="material-icons">content_paste</i>
              <p>Liste de mes offres</p>
            </a>
          </li>
                <?php }?>
          
          
          
          <!--<li class="nav-item ">
            <a class="nav-link" href="./typography.php">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.php">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>-->
          
       
          
        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
         
            <ul class="navbar-nav">
     
           
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <?php
                    if ($_SESSION['Id_Type'] == 3) {
                        echo'<a class="dropdown-item" href="../../mes_infos.php">Modifier mon profil entreprise</a>
                        <div class="dropdown-divider"></div>';
                    }
                        
                    ?>
                    <a class="dropdown-item" href="../../deco.php">Déconnexion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
