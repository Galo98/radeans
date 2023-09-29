<?php


if (isset($_POST['mail'])) {
    require_once "./php/cone.php";
    require_once "./php/usuario.php";

    $usuario = new Usuarios(null, $_POST['nombre'], $_POST['apellido'], $_POST['mail'], null, null, $_POST['pass'],null, null);

    $mensaje = "";

    $mensaje = $usuario->validacion();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> radeans | Inicio de Sesion </title>
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
        <section class="log">
            <div class="divVacio"></div>
            <form method="POST" action="#" class="contLogin">
                <div class="logT">
                    <h1 class="subtitulos">Iniciar Sesion</h1>
                </div>
                <section class="contLogin-Caja">
                    <div>
                        <label for="mail">
                            Correo
                            <input class="input" type="email" name="mail" id="mail" placeholder="correo@correo.com" required pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" title="Complete correctamente su correo">
                        </label>
                    </div>
                    <div>
                        <label for="pass">
                            Contraseña
                            <input id="pass" type="password" name="pass" required>
                        </label>
                    </div>
                </section>
                <div>
                    <div class="contLogin-Botonera">
                        <p><a class="contLogin-Contra" href="recuperar.php">¿Has olvidado la contraseña?</a></p>
                        <div>
                            <button class="accederBTN" type="submit">Acceder</button>
                        </div>
                    </div>
                </div>
            </form>

            <article class="contlog2">
                <div class="contlog2-Caja">
                    <?php if (isset($mensaje)) { ?>
                        <div class="cajaMensaje">
                            <p class="subtitulos">
                                <?php echo $mensaje; ?>
                            </p>
                        </div>
                    <?php } ?>
                    <div class="contlog2-Caja">
                        <div class="logoR"></div>
                        <div>
                            <p class="contlog2-msj">¿Aún no tienes cuenta?</p>
                        </div>
                        <div>
                            <p><a class="contLogin-Contra2" href="registro.php">Registrarse</a></p>
                        </div>
                    </div>
            </article>
            <div class="divVacio"></div>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</body>


</html>