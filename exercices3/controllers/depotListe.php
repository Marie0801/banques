<?php

include '../configuration/config.php';
include '../models/depot.php';


function depotListe(){
    return Depot :: getDepots();
}

?>