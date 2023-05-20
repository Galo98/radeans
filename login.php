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
            <h2 class="titulos">Iniciar Sesion</h2>
            <form method="POST" action="#" class="contLogin">
                <section class="contLogin-Caja">
                    <div>
                        <label for="mail">
                            correo
                            <input class="input" type="mail" name="mail" id="mail" placeholder="correo@correo.com"
                                required
                                pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                                title="Complete correctamente su correo">
                        </label>
                    </div>
                    <div>
                        <label for="pass">
                            contraseña
                            <input id="pass" type="password">
                        </label>
                    </div>
                </section>
                <div>
                    <p><a href="">¿Has olvidado la contraseña?</a></p>
                </div>
                <div>
                    <button type="submit">Acceder</button>
                </div>
            </form>
            <article>
                <div>
                    <div class="logoR"></div>
                    <div>
                        <p>¿Aún no tienes cuenta?</p>
                    </div>
                    <div>
                        <a href="">Registrarse</a>
                    </div>
                </div>
            </article>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php";?>
    </footer>
</body>


</html>