<?php
include '../bdd.php';
if ($_SESSION['Id_Type'] == 1)
{
    header('Location: ../admin/examples/dashboard.html');
}
elseif ($_SESSION['Id_Type'] == 2) 
{
    //header('Location: ../index.php');
}
elseif ($_SESSION['Id_Type'] == 3) 
{
    //header('Location: ../index.php');
}
elseif ($_SESSION['Id_Type'] == 4)
{
    header('Location: ../index.php');
}

?>

