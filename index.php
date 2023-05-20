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
        <div class="logo"></div>
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
            <div class="cajaSlider">
                <div class="contenedorSlider">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <div class="slider">
                        <img src="./img/001.png" alt="" draggable="false" />
                        <img src="./img/002.png" alt="" draggable="false" />
                        <img src="./img/003.png" alt="" draggable="false" />
                    </div>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </section>

        <section>
            <h2 class="titulos">Sobre nosotros</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam luctus
                est a massa pellentesque consectetur. Sed consequat augue eu faucibus
                pharetra. Sed sit amet mi at nibh commodo dignissim id vitae est. Nam
                quis leo eros. Morbi imperdiet varius luctus. Ut dignissim justo eget
                dolor placerat, vel commodo elit commodo. Praesent bibendum vitae elit
                eget facilisis. Donec ac ornare ex.
            </p>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php";?>
    </footer>
    <script src="./js/slider.js"></script>
</body>

</html>