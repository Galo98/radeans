<?php

require_once "./php/sesiones.php";

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
        <section>
            <div class="cajaSlider">
                <div class="contenedorSlider">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <div class="slider">
                        <img src="./img/inicio/ini1.jpg" alt="" draggable="false" />
                        <img src="./img/inicio/ini2.png" alt="" draggable="false" />
                        <img src="./img/inicio/ini3.jpg" alt="" draggable="false" />
                        <img src="./img/004.png" alt="" draggable="false" />
                        <img src="./img/005.png" alt="" draggable="false" />
                        <img src="./img/006.png" alt="" draggable="false" />
                    </div>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </section>

        <section class="nosotros" id="nosotros">

            <h2 class="titulos">Nosotros</h2>

            <p class="nosotrosTexto">
                Somos un Salón de Belleza con 10 años de experiencia que cuenta con un selecto grupo de profesionales altamente capacitados para ofrecer el mejor servicio a nuestros Clientes. Contamos con un lugar mágico donde obtienes la atención, asesoría y calidad que garantizan nuestros expertos en peluqueria, manicura y pedicura, peinados y barbería.
                Además Trabajamos con productos de máxima calidad y con equipos de última generación.

            </p>
            <h3 class="titulos">Misión</h3>
            <p class="nosotrosTexto">
                Satisfacer las necesidades de belleza de nuestros clientes mediante servicios de la mejor calidad, brindado por nuestro personal altamente calificado que inspira confianza y seriedad, permitiéndonos superar las expectativas de nuestros clientes.
            </p>
            <h4 class="titulos">Visión</h4>
            <p class="nosotrosTexto">
                Convertirnos en una cadena de salones caracterizados por brindar un excelente servicio personalizado en un ambiente cálido y acogedor.
            </p>

        </section>

        <!--         <section class="punt" id="puntuaciones">
            <div class="punt-tit">
                <h2 class="titulos">conoce a nuestros profesionales</h2>
            </div>
            <div class="sliderCards">
                <div class="slider-containerCards">
                    <div class="card active">
                        <div class="cajaContenidosCard">
                            <h2 class="nombreP"> Galo Olguin </h2>
                            <div class="fotoP" style="background-image: url('');"></div>
                            <p class="servP">Peluquero</p>
                            <p class="puntP"> 7 / 10</p>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="nombreP"> Galo </h2>
                        <div class="fotoP"></div>
                        <p class="servP">Peluquero</p>
                        <p class="puntP"> 7 / 10</p>
                    </div>
                    <div class="card">
                        <h2 class="nombreP"> Olguin </h2>
                        <div class="fotoP"></div>
                        <p class="servP">Peluquero</p>
                        <p class="puntP"> 7 / 10</p>
                    </div>
                    <div class="card">
                        <h2 class="nombreP"> Luciano </h2>
                        <div class="fotoP"></div>
                        <p class="servP">Peluquero</p>
                        <p class="puntP"> 7 / 10</p>
                    </div>
                </div>
                <i class="prev-slide fa-solid fa-angle-left" style="display:flex;" onclick="prevSlide()"></i>
                <i class="next-slide fa-solid fa-angle-right" style="display:flex;" onclick="nextSlide()"></i>

            </div>
        </section> -->

    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
    <script src="./js/sliderInicio.js"></script>
</body>

</html>