<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "dolphin_crm";

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if(!$conn){
        echo "Connection Failed";
    }
    ?>