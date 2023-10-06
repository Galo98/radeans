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
                    <a class="contLogin-Contra" id="condiciones">He leido y acepto los términos y condiciones</a>
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

        <section class="tyc off" id="secTYC">
            <div class="tycDivCie">
                <p class="tycTit">Terminos y Condiciones</p>
                <a class="tycCierre" id="btnCierre"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="tycDivT">
                <p class="tycParrafo">
                    1- Los turnos agendados son un compromiso, solicitamos responsabilidad al tomar el mismo.Deberás confirmar tu asistencia por medio de WhatsApp pagando una seña de $1500 al alias: salonDeBellezaradeans dicha seña es descontada del total de los servicios al asistir a su turno
                </p>
                <p class="tycParrafo">
                    2- Si tuvieras algún inconveniente para abonar informarnos sobre ello. Si ya la realizaste te solicitamos que nos envíes por WhatsApp al 11- 555-1234 una captura del comprobante o bien el número de operación para adjuntarlo a tu turno, si no recibimos el comprobante, ni dicho número de operación el turno será cancelado. Si no recibimos respuesta alguna al mensaje de confirmación del turno será cancelado automáticamente.
                </p>
                <p class="tycParrafo">
                    3- Las cancelaciones de los turnos, se permitirán hasta 24hs de anticipación al mismo.
                </p>
                <p class="tycParrafo">
                    4-Leer siempre la descripción de los diferentes servicios que ofrecemos. Podes obtenerla en nuestra web www.radeans.com.ar sección servicios.
                </p>
                <p class="tycParrafo">
                    5- Ante cualquier consulta, sugerencia o cancelación de turnos, nuestros medios de comunicación son: WhatsApp 11- 555-1234 o al email: radeans.com.ar@gmail.com ||
                </p>
                <p class="tycParrafo">
                    6- Trabajamos con una tolerancia máxima de 15 minutos, a partir de la hora estipulada del turno. Caso contrario se cancela el turno y deberá obtener otro turno.
                </p>
                <p class="tycParrafo">
                    7- Menores de 18 años sin excepción deberán presentarse al salón con el acompañamiento de un adulto responsable y se firmará un consentimiento, caso contrario no serán atendidos.
                </p>
                <p class="tycParrafo">
                    8- Los tratamientos anti frizz tiene una durabilidad de hasta 3 meses.
                </p>
                <p class="tycParrafo">
                    9- Los colores fantasía según el cabello, el color, y las variadas condiciones: pueden durar entre 1 y 10 lavados.
                </p>
                <p class="tycParrafo">
                    10- Si vas a realizarte un trabajo de coloración (tintura: tono sobre tono o tinte tradicional) podes venir con el cabello lavado o sin lavar.
                </p>
                <p class="tycParrafo">
                    11- Si vas a realizarte un trabajo técnico con decoloración (Hightlights, Babylights y o cualquier trabajo que requiera decoloración que no sea global es ideal traer el cabello limpio y sin restos de producto) de ser necesario tendremos que lavar el cabello previamente y secarlo para comenzar con el servicio, éstos serán servicios que se cobrarán como adicionales.
                </p>
                <p class="tycParrafo">
                    12- Si vas a realizarte una decoloración global (desde la raíz a las puntas) es ideal que estés al menos un día sin lavarte el cabello antes de visitarnos.
                </p>
                <p class="tycParrafo">
                    13- Para cualquier servicio de decoloración es muy importante que sepas qué tipos de tratamientos tienes en tu pelo. Todos los productos con derivados para controlar el frizz influyen directamente en todos los trabajos técnicos de color y por ende en su resultado.
                </p>
                <p class="tycParrafo">
                    14- Es muy importante saber que: si te realizaste un alisado, un anti-frizz o una keratina recientemente o en los últimos 3 años, debés consultarnos sobre las posibilidades de realizar cualquier tipo de servicio de color ya que no será responsabilidad de los resultados no esperados sobre lo mencionado.
                </p>
                <p class="tycParrafo">
                    15- Es muy importante que sepas que si tu frecuencia de cualquier servicio de color es regular y ha sido interrumpida y dejaste más tiempo pasar es muy probable que no quede de la misma forma que siempre. Consulta con nuestros profesionales.
                </p>
                <p class="tycParrafo">
                    16- Los valores de referencia de S, M, L y XL no solo hacen alusión al largo sino a la cantidad de producto que usemos y la cantidad de cabello que tengas, ante cualquier duda sobre este tema te sugerimos siempre pedir un presupuesto antes de realizarte el trabajo requerido
                </p>
                <p class="tycParrafo">
                    17- El profesional puede solicitar a la usuaria la firma de un consentimiento para avanzar con el trabajo técnico según corresponda.
                </p>
                <p class="tycParrafo">
                    18- Para mejor entendimiento y posterior labor del profesional, es importante llegar al salón con fotos referentes al servicio que será solicitado.
                </p>
                <p class="tycParrafo">
                    19- Para brindar una óptima atención y mejorar nuestro servicio al momento de ser reservado un turno el usuario/a acepta de manera consciente y tácita dichos términos y condiciones. Más información en y en nuestro WhatsApp 11- 555-1234.
                </p>
            </div>
        </section>

    </main>
    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
    <script src="js/termycondi.js"></script>
</body>

</html>