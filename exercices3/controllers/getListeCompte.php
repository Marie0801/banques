<?php

include '../configuration/config.php';
include '../models/compte.php';


function getListeCompte(){
     return Compte :: getComptes();
}

?>