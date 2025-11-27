<?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "sosialnet";
    
    
    $konek = new mysqli($host , $user , $pass, $db);

    if($konek->connect_error){
        echo "Db Rusak";
    }