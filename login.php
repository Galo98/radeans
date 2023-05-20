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
        <a href="index.html">
            <div class="logo">Logo</div>
        </a>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <div class="log">Acceder</div>
    </header>

    <main>
        <section>
            <form method="POST" action="#" class="contLogin">
                <section class="contLogin-Caja">
                    <div>
                        <label for="mail">
                            <input class="input" type="mail" name="mail" id="mail" placeholder="correo@correo.com"
                                required
                                pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                                title="Complete correctamente su correo">
                        </label>
                    </div>
                    <div>
                        <label for="pass">
                            <input id="pass" type="password">
                        </label>
                    </div>
                </section>
            </form>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php";?>
    </footer>
</body>


</html>