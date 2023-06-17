<?php 
$_SESSION['rol'] = 1;
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
                        <img src="./img/001.png" alt="" draggable="false" />
                        <img src="./img/002.png" alt="" draggable="false" />
                        <img src="./img/003.png" alt="" draggable="false" />
                    </div>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </section>

        <section class="nosotros" id="nosotros">

            <h2 class="titulos">Sobre nosotros</h2>

            <p class="nosotrosTexto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, maxime obcaecati
                molestias a
                iste neque
                aperiam nulla cupiditate saepe nostrum corrupti odio quidem minus quaerat quibusdam? Aliquam molestias
                quo vero.
                Laudantium nulla aspernatur quas, repudiandae earum facere eveniet laborum ex aut pariatur officiis in
                error cumque, id ipsum. Dolorum, praesentium voluptatibus! Facere reiciendis laborum dolorum non velit
                magni voluptatibus necessitatibus?
                Enim quisquam quae ipsa ex repellat. Ducimus quos omnis architecto amet adipisci deleniti illo,
                reprehenderit nam pariatur magni eligendi dolores fugiat placeat animi minus ut molestias quaerat odio
                libero aliquam.
                blanditiis voluptas incidunt.
            </p>
            <p class="nosotrosTexto">
                Fugit, in tempore. Repudiandae quas excepturi, magnam dolorum quaerat nam, sequi debitis hic sint eaque
                harum laborum. Explicabo repudiandae in nulla quos vel fugit, ex assumenda impedit placeat! Beatae,
                expedita.
                Mollitia nostrum explicabo laboriosam. Neque at saepe omnis alias asperiores quae excepturi? Corporis
                quae, non et suscipit ex inventore labore odio reiciendis architecto aspernatur esse harum quas
            </p>

        </section>

        <section class="punt" id="puntuaciones">
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
                    <!-- Agrega más tarjetas según sea necesario -->
                </div>
                <i class="prev-slide fa-solid fa-angle-left" style="display:flex;" onclick="prevSlide()"></i>
                <i class="next-slide fa-solid fa-angle-right" style="display:flex;" onclick="nextSlide()"></i>

            </div>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
    <script src="./js/slider.js"></script>
    <script src="./js/slidecards.js"></script>
</body>

</html>