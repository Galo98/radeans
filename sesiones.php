<?php 
    session_start();

    if(isset($_GET['cl'])){
        switch($_GET['cl']){
            case 1:
                session_destroy();
                header("Location: index.php");
        }
    }
?>