<?php

include '../configuration/config.php';
include '../models/depot.php';
    $numCompte = $_POST['numCompte'];
    $date = $_POST['dateV'];
    $montant = $_POST['montant'];
    $operation = $_POST['operation'];


$versement = new Depot ($numCompte, $date, $montant, $operation);
// var_dump($locataire);
if ($versement -> Depot()){
    header("Location:../views/deposerArgent.php");
}
?>