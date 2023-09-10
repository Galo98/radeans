<?php 

    if(!isset($_SESSION['id']) || $_SESSION['rol'] != 2){
        header('Location: login.php');
        exit();
    }

?>