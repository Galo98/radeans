<?php

require_once "./php/cone.php";
require_once "./php/sesiones.php";
require_once "./php/sesvaliu.php";
require_once "./php/formularios.php";

    if(isset($_POST['generar']) && isset($_POST['limpiar'])){
        $mensaje = 8; // Se ha seleccionado el campo limpiar
        
    }else if(isset($_POST['generar'])){
        $mensaje = reservarTurno($_POST['turid'], $_SESSION['id']);
    }else{
        $mensaje = 0;
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> radeans | Salon de belleza </title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./img/g12.svg">
</head>

<body>
    <header>
        <?php require_once "header.php"; ?>
    </header>

    <main>

        <section class="reservaciones">
            <?php formularioReservas($mensaje); ?>
        </section>

    </main>

    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
    <script src="./js/slider.js"></script>
    <script src="./js/slidecards.js"></script>
</body>

</html>