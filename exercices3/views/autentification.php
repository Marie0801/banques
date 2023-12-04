<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p{
          text-align: center;
        }
      body{

            background-image:linear-gradient(rgba(19, 0, 75, 0.952), rgb(5, 0, 0)), url('../photos/appart1.jpg');
    
            background-repeat:no-repeat;
            background-size: cover;
            background-attachment: fixed;

    
        }
    </style>
    <title>autentification</title>
</head>
<body>
    
<?php include_once "../includes/fromwork.php"?>
<?php include_once "../includes/fromwork2.php"?>
        
<section style="border:1px solid">
        
          <h5 style="text-align: center; color:beige">Entrer les parametres de connections</h5>

        <form action="../controllers/autentification.php" method="POST" enctype="multipart/form-data">
            <section class="row" style="margin: 15px; color:white">
              <div class="col-4"></div>
                  <div class="col-4">
                    <label class="form-label" >email</label>
                    <input type="text" class="form-control" name="email" required style="background-color: black;"><br>
                    <label class="form-label">mot de passe</label>
                    <input type="password" class="form-control" name="motDePasse" required style="background-color: black;"><br>
                    

                   
                    
            </section>
                <button type="sumit" value="seconnecter" class="btn btn-block" style="background-color:blue; color:white; width:200px; margin-left:auto; margin-right:auto;">Se connecter</button><br>
          
        </form>
        <p style="color: white;">vous n'avez pas encore de compte? <a href="inscription.php"> inscrivez-vous</a></p>
</section>       
</body>
</html>