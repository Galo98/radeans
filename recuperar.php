<?php

require_once "./php/cone.php";
require_once "./php/sesiones.php";
require_once "./php/usuario.php";

if (isset($_POST['mail'])) {
    $veri = Usuarios::verificarEmail($_POST['mail']);
    if ($veri[0] == 1) {
    }
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
        <?php if (!isset($_GET['RC'])) : ?>
            <section>
                <form action="" method="POST" class="contLogin">
                    <div>
                        <h1 class="subtitulos">Ingrese su correo electronico</h1>
                    </div>
                    <div class="contLogin-Caja">
                        <div>
                            <label for="mail">
                                Correo
                                <input class="input" type="email" name="mail" id="mail" placeholder="correo@correo.com" required pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" title="Complete correctamente su correo">
                            </label>
                        </div>
                        
                        <?php if (isset($veri) && $veri[0] == 2) : ?>
                            <div>
                                <?php echo $veri[1]; ?>
                            </div>
                        <?php elseif ($veri[0] == 1) : ?>
                            <div>
                                <p><?php echo "Se ha enviado un email a $veri[1]." ?></p>
                            </div>
                        <?php endif ?>
                        <div class="contLogin-Botonera">
                            <button class="accederBTN recBtn" type="submit">Enviar codigo</button>
                        </div>
                    </div>
                </form>
            </section>
        <?php else : ?>
            <section>
                <form action="" method="POST" class="contLogin">
                    <div>
                        <h1 class="subtitulos">Recuperación de contraseña</h1>
                    </div>
                    <div class="contLogin-Caja">
                        <div>
                            <label for="nContra">
                                Nueva contraseña
                                <input type="password" name="newPass" id="nContra">
                            </label>
                        </div>
                        <div>
                            <label for="cContra">
                                Confirmar contraseña
                                <input type="password" name="valiPass" id="cContra">
                            </label>
                        </div>
                        <div class="contLogin-Botonera">
                            <button class="accederBTN recBtn" type="submit">Cambiar Contraseña</button>
                        </div>
                    </div>
                </form>
            </section>
        <?php endif ?>


    </main>

    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</body>

</html>