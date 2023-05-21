
<?php 

require "./php/usuario.php";

if(isset($_POST['confirmacion'])){

$cliente=new Usuarios(null,$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['mail'],$_POST['mail2'],$_POST['pass'],$_POST['pass2'],2);

$mensaje="";

$mensaje=$cliente->validacion();
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
            <h2 class="titulos">Registración</h2>
            <form method="POST" action="#" class="contLogin">
                <section class="contLogin-Caja">
                    <div>
                        <label for="nombre">
                            Nombre
                            <input class="input" type="text" name="nombre" id="nombre" placeholder="Nombre" required
                                minlength="3" maxlength="20" pattern="[a-zA-Z ]+" title="solo letras">
                        </label>
                    </div>
                    <div>
                        <label for="apellido">
                            Apellido
                            <input class="input" type="text" name="apellido" id="apellido" placeholder="Apellido"
                                required minlength="3" maxlength="20" pattern="[a-zA-Z ]+" title="solo letras">
                        </label>
                    </div>
                    <div>
                        <label for="telefono">
                            Telefono
                            <input class="input" type="text" name="telefono" id="telefono" placeholder="1512341234"
                                required pattern="[0-9]+" minlength="10" maxlength="10"
                                title="El telefono solo puede contener numero">
                        </label>
                    </div>
                    <div>
                        <label for="mail">
                            Email
                            <input class="input" type="mail" name="mail" id="mail" placeholder="correo@correo.com"
                                required
                                pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                                title="Complete correctamente su correo">
                        </label>
                    </div>
                    <div>
                        <label for="mail2">
                            Repetir Email
                            <input class="input" type="mail" name="mail2" id="mail2" placeholder="correo@correo.com"
                                required
                                pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                                title="Complete correctamente su correo">
                        </label>
                    </div>
                    <div>
                        <label for="pass">
                            Contraseña
                            <input id="pass" type="password" name="pass" required title="Ingrese mas de 8 caracteres"
                                minlength="8" maxlength="30">
                        </label>
                    </div>
                    <div>
                        <label for="pass2">
                            Repetir Contraseña
                            <input id="pass2" type="password" name="pass2" required
                                title="Verifique que sus contraseñas coincidan" minlength="8" maxlength="30">
                        </label>
                    </div>
                </section>
                <div>
                    <p><input type="checkbox" name="confirmacion" required><a href="">He leido y acepto los términos y
                            condiciones</a>
                    </p>
                </div>
                <div>
                    <button type="submit">Registrarse</button>
                </div>
            </form>
            <article>
                <div>
                    <div class="logoR"></div>
                    <div>
                        <p>¿Ya tienes cuenta?</p>
                    </div>
                    <div>
                        <a href="">Iniciar Sesión</a>
                    </div>
                </div>
            </article>
        </section>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php";?>
    </footer>
</body>

</html>