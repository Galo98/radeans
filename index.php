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

    </main>
    <footer>
        <?php require_once "footer.php";?>
    </footer>
    <script src="./js/slider.js"></script>
</body>

</html>