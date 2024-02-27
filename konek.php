<?php
    $konek = new mysqli("localhost", "root", "", "notesweb");

    if($konek->connect_error){
        echo "Db Rusak";
        die("Eror cuk");
    }

