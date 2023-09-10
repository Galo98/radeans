<?php 

    if(!isset($_SESSION['id']) || $_SESSION['rol'] != 1){
        header('Location: login.php');
        exit();
    }

?>