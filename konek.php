<?php
    $konek = new mysqli("127.0.0.1", "root", "root", "sosialnet");

    if($konek->connect_error){
        echo "Db Rusak";
        die("Eror cuk");
    }

