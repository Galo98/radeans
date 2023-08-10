<?php

require_once "php/cone.php";
require_once "php/usuario.php";
require_once "php/objetos.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <?php

        if(isset($_POST['limpiar'])){
            $_POST['cat'] = " ";
            $_POST['serv'] = " ";
        }

        Objetos::categoria();



        if(isset($_POST['cat']) && $_POST['cat'] != " "){
            Objetos::servicio($_POST['cat']);
        }

        if (isset($_POST['serv']) && $_POST['serv'] != " ") {
            Objetos::profesional();
        }

        if (isset($_POST['profs']) && $_POST['profs'] != " ") {
            Objetos::semana();
        }

        if (isset($_POST['semana']) && $_POST['semana'] != " ") {
            Objetos::horarios($_POST['semana']);
        }


        ?>

        <br>
        <input type="checkbox" name="limpiar">Limpiar
        <br>
        <button type="submit">continuar</button>

    </form>
</body>

</html>