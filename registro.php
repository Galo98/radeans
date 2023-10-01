<?php

require "./php/cone.php";
require "./php/usuario.php";

if (isset($_POST['confirmacion'])) {

    $cliente = new Usuarios(null, $_POST['nombre'], $_POST['apellido'], $_POST['mail'], $_POST['mail2'], $_POST['telefono'], $_POST['pass'], $_POST['pass2'], 2);

    $mensaje = "";

    $mensaje = $cliente->validacion();
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
        <section class="reg">
            <div class="divVacio"></div>
            <form method="POST" action="#" class="contLogin">
                <div class="logT">
                    <h2 class="subtitulos">Registración</h2>
                </div>
                <section class="contLogin-Caja">
                    <div>
                        <label for="nombre">
                            Nombre
                            <input class="input" type="text" name="nombre" id="nombre" placeholder="" required minlength="3" maxlength="20" pattern="[a-zA-Z ]+" title="solo letras" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                                                        echo $_POST['nombre'];
                                                                                                                                                                                                    } ?>">
                        </label>
                    </div>
                    <div>
                        <label for="apellido">
                            Apellido
                            <input class="input" type="text" name="apellido" id="apellido" placeholder="" required minlength="3" maxlength="20" pattern="[a-zA-Z ]+" title="solo letras" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                                                            echo $_POST['apellido'];
                                                                                                                                                                                                        } ?>">
                        </label>
                    </div>
                    <div>
                        <label for="telefono">
                            Telefono
                            <input class="input" type="text" name="telefono" id="telefono" placeholder="1512341234" required pattern="[0-9]+" minlength="10" maxlength="10" title="El telefono solo puede contener numero" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                                                                                        echo $_POST['telefono'];
                                                                                                                                                                                                                                    } ?>">
                        </label>
                    </div>
                    <div>
                        <label for="mail">
                            Email
                            <input class="input" type="email" name="mail" id="mail" placeholder="correo@correo.com" required pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" title="Complete correctamente su correo" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                                                                                                                                                                                echo $_POST['mail'];
                                                                                                                                                                                                                                                                                                                            } ?>">
                        </label>
                    </div>
                    <div>
                        <label for="mail2">
                            Repetir Email
                            <input class="input" type="email" name="mail2" id="mail2" placeholder="correo@correo.com" required pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" title="Complete correctamente su correo" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                                                                                                                                                                                    echo $_POST['mail2'];
                                                                                                                                                                                                                                                                                                                                } ?>">
                        </label>
                    </div>

                    <div>
                        <label for="pass">
                            Contraseña
                            <input id="pass" type="password" name="pass" required title="Ingrese mas de 8 caracteres" minlength="8" maxlength="30" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                echo $_POST['pass'];
                                                                                                                                                            } ?>">
                        </label>
                    </div>
                    <div>
                        <label for="pass2">
                            Repetir Contraseña
                            <input id="pass2" type="password" name="pass2" required title="Verifique que sus contraseñas coincidan" minlength="8" maxlength="30" value="<?php if (isset($_POST['confirmacion'])) {
                                                                                                                                                                            echo $_POST['pass2'];
                                                                                                                                                                        } ?>">
                        </label>
                    </div>
                </section>
                <div class="cond">
                    <input type="checkbox" name="confirmacion" class="checkReg" required>
                    <a class="contLogin-Contra" href="">He leido y acepto los términos y condiciones</a>
                </div>
                <div>
                    <button class="accederBTN regbtn" type="submit">Registrarse</button>
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
                    <div class="logoR"></div>
                    <div>
                        <p class="contlog2-msj">¿Ya tienes cuenta?</p>
                    </div>
                    <div>
                        <a class="contLogin-Contra2" href="login.php">Iniciar Sesión</a>
                    </div>
                </div>
            </article>
            <div class="divVacio"></div>
        </section>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</body>

</html>