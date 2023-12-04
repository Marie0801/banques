<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../views/style.css"?></style>
    <title>creation du compte client</title>
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
      
        <h5 style="text-align: center;">Entrer les parametres de creation du compte client</h5>

        <form action="../controllers/creerCompte.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px;">
            <div class="col-4"></div>
                <div class="col-4">
                    <label class="form-label">nom</label>
                    <input type="text" class=form-control name="nom" required>
                    <label class="form-label">prenom</label>
                    <input type="text" class=form-control name="prenom" required>
                    <label class="form-label">numero Telephone</label>
                    <input type="number" class=form-control name="numTel" required>
                    <label class="form-label">email</label>
                    <input type="text" class=form-control name="email" required>
            </section>
                <button type="sumit" value="s'inscrire" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:black; width:200px; margin-left:auto; margin-right:auto;">Enregistrer</button><br>

        </form>

</section>

<table class="table table-striped">
        <thead class="table-dark">
            <tr>
            <th>Numero Compte</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>numero de Telephone</th>
            <th>email</th>
            </tr>

        </thead>
            <?php
        $compte = getListeCompte();
        for($i = 0; $i < count($compte); $i++) {
            echo "<tr>";
            echo "<th scope =\"row\">".$compte[$i]->getNumCompte()."</th>";
            echo "<td>".$compte[$i]->getNom()."</td>";
            echo "<td>".$compte[$i]->getPrenom()."</td>";
            echo "<td>".$compte[$i]->getNumTel()."</td>";
            echo "<td>".$compte[$i]->getEmail()."</td>";
        }
            ?>
        </table>
</body>
</html>