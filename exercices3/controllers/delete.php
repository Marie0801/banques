<?php



include '../configuration/config.php';
include '../models/compte.php';

$numCompte=$_POST['numCompte'];

;
if (Compte :: supprimer($numCompte)) {
echo "vous avez supprimer le compte numero: $numCompte";
}


?>
