<?php

require_once "./php/sesiones.php";
if (!isset($_GET['s'])) {
    $serv = "p";
} else {
    $serv = $_GET['s'];
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

        <section class="servicios" id="servicios">

            <div class="serviciosMenu">
                <div>
                    <a class="btnMenuServ pelu <?php if (isset($_GET['s']) && $_GET['s'] == "p") {
                                                    echo "activo";
                                                } else if (!isset($_GET['s'])) {
                                                    echo "activo";
                                                } ?>" href="servicios.php?s=p"><!-- <img src="./img/corte-de-pelo.png" alt="peluqueria"> --> </a>
                </div>
                <div>
                    <a class="btnMenuServ barb <?php if (isset($_GET['s']) && $_GET['s'] == "b") {
                                                    echo "activo";
                                                } ?>" href="servicios.php?s=b"> </a>
                </div>
                <div>
                    <a class="btnMenuServ mani <?php if (isset($_GET['s']) && $_GET['s'] == "m") {
                                                    echo "activo";
                                                } ?>" href="servicios.php?s=m"> </a>
                </div>
                <div>
                    <a class="btnMenuServ pedi <?php if (isset($_GET['s']) && $_GET['s'] == "ped") {
                                                    echo "activo";
                                                } ?>" href="servicios.php?s=ped"> </a>
                </div>
            </div>
            <?php switch ($serv) {
                case "p":
            ?>
                    <article>
                        <h2 class="titulos">Peluqueria</h2>
                        <div>
                            <h3 class="subtitulos">Balayage</h3>
                            <p class="nosotrosTexto">Si quieres renovar tu melena con un resultado natural y favorecedor, las mechas balayage son la solución. <br>
                                Tengas el pelo corto, largo, media melena, seas rubia, castaña, morena o pelirroja...
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos">Alisado Permanente</h3>
                            <p class="nosotrosTexto">Conseguir una melena lisa sin tener que usar a diario la planchita de pelo es un cumplido con el alisado permanente.<br>
                                El alisado permanente ofrece una serie de beneficios para aquellos que desean tener un cabello liso, manejar el encrespamiento y el frizz de manera segura.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos">Tintura</h3>
                            <p class="nosotrosTexto">Contamos con un equipo de estilistas altamente capacitados y experimentados en el arte de la coloración capilar.<br>
                                Están al tanto de las últimas tendencias en tintura y pueden crear resultados increíbles que complementen tu estilo y personalidad.
                                Además trabajamos con una amplia gama de colores y productos de calidad que están diseñados para proteger y cuidar tu cabello. Nuestros tintes contienen ingredientes nutritivos que minimizan el daño y mantienen la salud del cabello, incluso después de la tintura. Valoramos la salud de tu cabello y nos aseguramos de que tengas un resultado hermoso y saludable.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos">Corte Mujer</h3>
                            <p class="nosotrosTexto">Corte Mujer
                                Nuestro equipo está al tanto de las últimas tendencias en cortes de pelo para mujeres.
                                Desde los estilos clásicos y pulidos hasta los cortes más modernos y desestructurados, podemos brindarte una amplia gama de opciones para que elijas la que más te guste.
                            </p>
                        </div>
                    </article>
                <?php break;
                case "m":
                ?>
                    <article>
                        <h2 class="titulos">Manicura</h2>
                        <div>
                            <h3 class="subtitulos">Kapping Gel o Acrílico </h3>
                            <p class="nosotrosTexto">Si tienes las uñas frágiles o quebradizas existe un método hecho para ti.
                                La manicura kapping consiste en aplicar una fina capa de acrílico o gel fortificador sobre la uña que actúa como una barrera protectora.
                                Este baño en gel kapping no alarga la uña natural sino que acompaña el crecimiento de la misma y dura hasta unos 20 días.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos">Manicura Semipermanente </h3>
                            <p class="nosotrosTexto">Si deseas tener las uñas impecables e embellecidas no podes perderte el procedimiento más usado.
                                La manicura semipermanente dura por 15 días aportando dureza y brillo a tus uñas en todo momento.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Uñas Esculpidas </h3>
                            <p class="nosotrosTexto">¿Amas las uñas largas pero sientes que tardan una eternidad en crecer naturalmente o se rompen a mitad del proceso?
                                Las uñas esculpidas son ideales para aquellas personas que deseen tener uñas más largas, fuertes y bellezas.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Nails Art </h3>
                            <p class="nosotrosTexto">Nuestros profesionales están capacitados en las últimas tendencias para brindar los diseños más hermosos, coloridos y llamativos para tus uñas.
                                No dudes en dejar volar tu imaginación y personalizar tus uñas con diseños únicos y creativos.
                            </p>
                        </div>
                    </article>
                <?php break;
                case "b":
                ?>
                    <article>
                        <h2 class="titulos">Barberia</h2>
                        <div>
                            <h3 class="subtitulos"> Afeitado de Barba </h3>
                            <p class="nosotrosTexto">Un afeitado clásico con navaja, aplicación de productos de cuidado de la barba, recorte y alineación de barba, y masajes faciales para un tratamiento completo.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos">Recorte de barba y bigote </h3>
                            <p class="nosotrosTexto">Dar forma a la barba y bigote, recortar los vellos sueltos, hacer líneas definidas y aplicar productos para mantenerlos limpios y suaves.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Diseños y Delineados </h3>
                            <p class="nosotrosTexto">Diseños y delineados en la barba para dar un aspecto más detallado y personalizado. Esto puede incluir líneas nítidas en los bordes, patrones geométricos o cualquier otro diseño creativo que desees.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Coloración </h3>
                            <p class="nosotrosTexto">Coloración de barba para hombres que desean cambiar su apariencia o cubrir las canas.
                            </p>
                        </div>
                    </article>
                <?php break;
                case "ped": ?>
                    <article>
                        <h2 class="titulos">Pedicura</h2>
                        <div>
                            <h3 class="subtitulos"> Pedicura Simple </h3>
                            <p class="nosotrosTexto">Deseas lucir unos bellos pies este verano? Que estas esperando para hacerte una pedicura simple que consta del limado, cortado y pintado de uñas del color que más te guste para tener unos pies encantadores.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Pedicura Clásica </h3>
                            <p class="nosotrosTexto">Dale más que belleza a tus pies, cuidado con la Pedicura clásica.
                                La pedicura clásica incluye limpieza de pies ( con remojo en una bañerita de agua tibia para pies), eliminación de durezas de talones y pulgares el torno (que no hace ningún daño), limado y cortado de uñas (prestando atención a futuros problemas como el encarnamiento de uñas) y esmaltado de uñas.
                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Pedicura Completa </h3>
                            <p class="nosotrosTexto">La pedicura spa es la más avanzada y sofisticadas de las pedicuras.
                                La pedicura spa incluye la pedicura de piedras, un tipo de pedicura que se sofistica al incluir un agradable masaje con piedras calientes. Además de incluir la limpieza, eliminación de durezas e imperfecciones, retirada de cutículas, limado, cortado y esmaltado de uñas.
                                Es un tratamiento de bienestar antes que estético: no solo se centra en la apariencia, sino que consigue mejorar la salud del pie, activar la circulación y reducir las tensiones.

                            </p>
                        </div>
                        <div>
                            <h3 class="subtitulos"> Pedicura Simple Francesa </h3>
                            <p class="nosotrosTexto">La pedicura francesa finaliza con un acabado a la francesa.Es decir consiste en pintar las uñas de los pies con una base clarita (tipo rosa palo, nude, etc.) y aplicar al final de la uña un reborde blanco.
                            Quedan muy bellas y delicadas para cualquier ocasión.
                            </p>
                        </div>
                    </article>
            <?php break;
            }
            ?>
        </section>



    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</body>

</html>