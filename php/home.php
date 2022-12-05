<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])){
    ?>
    
    //insert code here// 

    <?php
}
else{
    header("Location: index.php");
    exit();
}
?>