<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer Compte</title>
</head>
<body>
<?php include_once "../includes/fromwork.php"?>
<?php include_once "../includes/fromwork2.php"?>
<?php include_once "../controllers/getListeCompte.php"?>
<?php include_once "../includes/header.php"?>
<style>

body{
    color: black;
}
</style>

        
<section style="border:1px solid">
        <h3 style="text-align: center; color:rgba(19, 0, 75, 0.952);margin-top:5px"><strong>Supprimer un compte</strong></h3>

        <form action="../controllers/delete.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px;">
            <div class="col-4"></div>
                <div class="col-4">
                    <label class="form-label">numCompte</label>
                    <select  name="numCompte" class="form-control">
                    
                    <?php
                    foreach ($com = getListeCompte() as $comp) {

                    echo "<option value = ".$comp->getNumCompte().">".$comp->getNom()." ".$comp->getPrenom()." ".$comp->getNumTel()." </option>";
                    
                        }
                            ?><br>
                        </select><br>
        
                        <a href="delete.php"><button type="sumit" value="envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">Supprimer</button></a> <br>
                        </form>
                    </body>
</html>