<?php

include '../configuration/config.php';
include '../models/compte.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numTel = $_POST['numTel'];
    $email = $_POST['email'];

$compte = new Compte ($nom, $prenom, $numTel, $email);
// var_dump($locataire);
if ($compte -> creerCompte()){
    header("Location:../views/creerCompte.php");
}
?>