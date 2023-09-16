<?php

require_once "./php/cone.php";
require_once "./php/sesiones.php";
require_once "./php/sesvalia.php";
require_once "./php/cierreTurnos.php";
require_once "./php/formularios.php";

if (isset($_POST['ediEst']) && isset($_POST['ediID'])) {
    $codEdiEst = actEstado($_POST['ediID'], $_POST['ediEst']);
}

if (isset($_POST['eliTur'])) {
    $codSelEli = eliTurSelec($_POST['eliTur']);
}

if (isset($_GET['eliFor'])) {
    $codSelEli = eliTurSelec($_GET['eliFor']);
}
if(isset($_GET['ate'])){
    $codAten = turnoAtendido($_GET['ate']);
}

if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
        case "ct":
            $cod = CierreTurnos(1);
            break;
        case "vt":
            $codDel = vaciadoTurnos(1);
            break;
    }
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

        <form method="POST" class="listados">



            <?php
            #region Cod
            if (isset($cod)) {
                echo "<div class='MensajesLista'>";
                if ($cod == 3) {
                    echo "No se pudo ejecutar el Cierre de Turnos correctamente";
                } else if ($cod == 1) {
                    echo "Cierre de turnos ejecutado con exito";
                } else if ($cod == 2) {
                    echo "Cierre de Turnos ejecutado. No hubo cambios ya que no hay turnos para cerrar";
                }
                $_GET = array();
                $_POST = array();
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "listado.php";
                            }, 3000);
                      </script>';
                echo "</div>";
            }
            #endregion

            #region ColDel
            if (isset($codDel)) {
                echo "<div class='MensajesLista'>";
                if ($codDel == 3) {
                    echo "No se pudo ejecutar el Vaciado de Turnos correctamente";
                } else if ($codDel == 1) {
                    echo "Vaciado de Turnos ejecutado con exito";
                } else if ($codDel == 2) {
                    echo "Vaciado de Turnos ejecutado. No hubo cambios ya que no hay turnos para vaciar";
                }
                $_GET = array();
                $_POST = array();
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "listado.php";
                    }, 3000); 
                  </script>';
                echo "</div>";
            }
            #endregion

            #region CodSelEli
            if (isset($codSelEli)) {
                echo "<div class='MensajesLista'>";
                if ($codSelEli == 3) {
                    echo "No se pudo ejecutar la Eliminacion de Turnos Seleccionados correctamente";
                } else if ($codSelEli == 1) {
                    echo "Eliminacion de Turnos Seleccionados ejecutado con exito";
                } else if ($codSelEli == 2) {
                    echo "Eliminacion de Turnos Seleccionados ejecutado. No hubo cambios ya que no se selecciono ningun turno";
                }
                $_GET = array();
                $_POST = array();
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "listado.php";
                    }, 3000); 
                  </script>';
                echo "</div>";
            }
            #endregion

            #region CodEdiEst
            if (isset($codEdiEst)) {
                echo "<div class='MensajesLista'>";
                if ($codEdiEst == 3) {
                    echo "No se pudo ejecutar la Actualizacion de Estados correctamente";
                } else if ($codEdiEst == 1) {
                    echo "Actualizacion de Estados ejecutado con exito";
                } else if ($codEdiEst == 2) {
                    echo "Actualizacion de Estados ejecutado. No hubo cambios ya que no se selecciono ningun turno";
                }
                $_GET = array();
                $_POST = array();
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "listado.php";
                    }, 3000); 
                  </script>';
                echo "</div>";
            }
            #endregion

            #region codAten
            if (isset($codAten)) {
                echo "<div class='MensajesLista'>";
                if ($codAten == 3) {
                    echo "Error al intentar marcar el turno como atendido";
                } else if ($codAten == 1) {
                    echo "Turno Atendido";
                } else if ($codAten == 2) {
                    echo "No se detecto el turno para marcalo como atendido";
                }
                $_GET = array();
                $_POST = array();
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "listado.php";
                    }, 3000); 
                  </script>';
                echo "</div>";
            }
            #endregion
            
            ?>

            </div>

            <div class="botoneraLista">
                <a class="btnBotonera" href="listado.php?opc=ct">Cierre de Turnos</a>
                <a class="btnBotonera" href="listado.php?opc=vt">Vaciado de Turnos</a>
                <button type="submit" class='btnBotonera'>Eliminar Turnos Seleccionados</button>
            </div>

                <?php listadoDeTurnos(null); ?>
        </form>

    </main>

    <script src=" ./js/autoScrollListado.js"></script>
</body>

</html>