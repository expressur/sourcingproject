<?php
include '../bdd.php';
if ($_SESSION['Id_Type'] == 1)
{
    header('Location: ../admin/examples/dashboard.php');
}
elseif ($_SESSION['Id_Type'] == 2) 
{
    header('Location: ../admin/examples/dashboard.php');
}
elseif ($_SESSION['Id_Type'] == 3) 
{
    header('Location: ../admin/examples/dashboard.php');
}
elseif ($_SESSION['Id_Type'] == 4)
{
    header('Location: ../index.php');
}

?>

