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
            $_POST['profs'] = " ";
            $_POST['semana'] = " ";
            $_POST['horario'] = " ";
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

        var_dump($_POST['horario']);

        echo "<input type='checkbox' name='limpiar'>Limpiar Campos";
        if(isset($_POST['semana'])&& $_POST['semana'] != " "){
            echo "<button type='submit'>Generar Turnos</button>";
        }else{
            echo "<button type='submit'>Siguiente</button>";
        }
        ?>



    </form>
</body>

</html>