<?php
    $konek = new mysqli("localhost", "root", "", "sosialnet");

    if($konek->connect_error){
        echo "Db Rusak";
        die("Eror cuk");
    }

