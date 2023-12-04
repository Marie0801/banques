<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>accueil</title>
        <?php include_once "../includes/fromwork.php"?>
        <style>
                    p{
            text-align: center;

        }
        body{
            background-image:linear-gradient(rgba(19, 0, 75, 0.952), rgb(5, 0, 0)), url('../photos/appart1.jpg');
            /* linear-gradient(rgb(43, 4, 4)rgb(155, 104, 104)), */
            background-repeat:no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        
        </style>
        
    
    </head>

    <body>

            
            
            <div class="content" style="text-align: center;">

                <h1 style="text-align: center; color:white; margin-top: 190px;">APPLICATION BANCAIRE BASE</h1><br>

                <a href="creerCompte.php"  style="text-align: center; color:black; margin-top: 250px;">
                <button class="btn btn-block" style="background-color:black; color:white; width:200px; margin-left:auto; margin-right:auto;">COMMENCER</button></a>
            
                <?php include_once "../includes/fromwork2.php" ?>
            </div>

    </body>

</html>