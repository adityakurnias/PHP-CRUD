<?php
    $konek = new mysqli("localhost", "root", "", "crud_satria");

    if($konek->connect_error){
        echo "Db Rusak";
        die("Eror cuk");
    }

