<a class="ancLogo" href="index.php">
    <div class="logo"></div>
</a>
<nav>
    <ul>
        <li><a href="index.php">inicio</a></li>
        <li><a href="index.php#nosotros">nosotros</a></li>
        <li><a href="servicios.php">servicios</a></li>
        <li><a href="index.php#puntuaciones">puntuacion</a></li>
        <li><a href="#contacto">contacto</a></li>
    </ul>
</nav>
<?php if (isset($_SESSION['rol'])) { ?>
    <div class="dropmenu">
        <div class="menuBTN">
            <p class="pmenuBTN">
                menu <i class="fa-solid fa-chevron-down"></i>
            </p>
        </div>
        <div class="cajaMenu">
            <?php switch ($_SESSION['rol']) {
                case 1: /* Administrador */ ?>
                    <a href="">Gestionar Profesionales</a>
                    <a href="">Gestionar Turnos</a>
                    <a href="">Lista de turnos</a>
                    <a href="index.php?cl=1">Cerrar Sesion</a>
                <?php break;
                case 2: /* Cliente */ ?>
                    <a href="">Perfil</a>
                    <a href="">Reservar</a>
                    <a href="">Calificar</a>
                    <a href="index.php?cl=1">Cerrar Sesion</a>
            <?php break;
            } ?>
        </div>
    </div>
<?php } else { ?>
    <div class="navLog">
        <a href="login.php" class="logAcc">iniciar sesion</a>
        <a href="registro.php" class="logReg">registrarse</a>
    </div>
<?php } ?>

