<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../views/style.css"?></style>
    <title>versement</title>
</head>
<body>
    
<?php include_once "../includes/fromwork.php"?>
<?php include_once "../includes/fromwork2.php"?>
<?php include_once "../controllers/getListeCompte.php"?>
<?php include_once "../includes/header.php"?>
<?php include_once "../controllers/depotListe.php"?>
<style>

body{
    color: black;
}
</style>

        
<section style="border:1px solid">
        <h3 style="text-align: center; color:rgba(19, 0, 75, 0.952);margin-top:5px"><strong>Deposer l'argent</strong></h3>

        <form action="../controllers/DeposerArgent.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px;">
            <div class="col-4"></div>
                <div class="col-4">
                    <label class="form-label">client</label>
                    <select  name="numCompte" class="form-control">
                    
                    <?php
                    foreach ($com = getListeCompte() as $comp) {

                    echo "<option value = ".$comp->getNumCompte().">".$comp->getNom()." ".$comp->getPrenom()." ".$comp->getNumTel()."
                     </option>";
                        }
                            ?><br>
                        </select><br>
                    <label class="form-label">Date</label>
                    <input type="date" class=form-control name="dateV" required>
                    <label class="form-label">Montant</label>
                    <input type="number" class=form-control name="montant" required>
                    <label class="form-label">Operation</label>
                    <select name="operation" class="form-control">
                        <option value="depot">Depot</option>
                        <option value="retrait">retrait</option>
                    </select>
            </section>
            <a href="deposerArgent.php"><button type="sumit" value="envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">Depot</button></a> <br>
            <a href="retirerArgent.php"><button type="sumit" value="envoyer" class="btn btn-block" style="background-color:rgba(19, 0, 75, 0.952); color:white; width:200px; margin-left:auto; margin-right:auto;">Retrait</button></a><br>
        </form>

</section>

<table class="table table-striped">
        <thead class="table-dark">
            <tr>
            <th>id</th>
            <th>numCompte</th>
            <th>Date</th>
            <th>montant</th>
            <th>solde</th>
            </tr>

        </thead>
            <?php
        $versement = depotListe();

        for($i = 0; $i < count($versement); $i++) {
            $num=$versement[$i]->getNumCompte();
            echo "<tr>";
            echo "<th scope =\"row\">".$versement[$i]->getId()."</th>";
            echo "<td>".$versement[$i]->getNumCompte()."</td>";
            echo "<td>".$versement[$i]->getDate()."</td>";
            echo "<td>".$versement[$i]->getMontant()."</td>";
            echo "<td>".Depot::montantTotale($num)."</td>";
        }
            ?>
        </table>
</body>
</html>