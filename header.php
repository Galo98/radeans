<div class="desk">
    <a class="ancLogo" href="index.php">
        <div class="logo"></div>
    </a>
    <nav>
        <ul>
            <li><a href="./index.php">inicio</a></li>
            <li><a href="./index.php#nosotros">nosotros</a></li>
            <li><a href="./servicios.php">servicios</a></li>
            <!-- <li><a href="index.php#puntuaciones">puntuacion</a></li> -->
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
                        <!-- <a href="">Gestionar Profesionales</a> -->
                        <a href="./gestion.php">Gestionar Turnos</a>
                        <a href="./listado.php">Lista de turnos</a>
                        <a href="./index.php?cl=1">Cerrar Sesion</a>
                    <?php break;
                    case 2: /* Cliente */ ?>
                        <!-- <a href="">Perfil</a> -->
                        <a href="./reserva.php">Reservar</a>
                        <a href="./misturnos.php">Mis Turnos</a>
                        <a href="./index.php?cl=1">Cerrar Sesion</a>
                <?php break;
                } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="navLog">
            <a href="./login.php" class="logAcc">iniciar sesion</a>
            <a href="./registro.php" class="logReg">registrarse</a>
        </div>
    <?php } ?>
</div>

<div class="mobile">
    <a class="ancLogo" href="index.php">
        <div class="mobLogo"></div>
    </a>
    <div class="mobMenu">
        <div class="mobMenuBTN">
            <p class="mobPmenuBTN">menu <i class="fa-solid fa-chevron-down"></i></p>
        </div>
        <div class="mobCajaMenu">
            <a class="mobA" href="./index.php">inicio</a>
            <a class="mobA" href="./index.php#nosotros">nosotros</a>
            <a class="mobA" href="./servicios.php">servicios</a>
            <!-- <a class="mobA" href="index.php#puntuaciones">puntuacion</a> -->
            <a class="mobA" href="#contacto">contacto</a>
            <?php if (isset($_SESSION['rol'])) { ?>
                <?php switch ($_SESSION['rol']) {
                    case 1: /* Administrador */ ?>
                        <!-- <a class="mobA" href="">Gestionar Profesionales</a> -->
                        <a class="mobA" href="./gestion.php">Gestionar Turnos</a>
                        <a class="mobA" href="./listado.php">Lista de turnos</a>
                        <a class="mobA" href="./index.php?cl=1">Cerrar Sesion</a>
                    <?php break;
                    case 2: /* Cliente */ ?>
                        <!-- <a class="mobA" href="">Perfil</a> -->
                        <a class="mobA" href="./reserva.php">Reservar</a>
                        <a class="mobA" href="./misturnos.php">Mis Turnos</a>
                        <a class="mobA" href="./index.php?cl=1">Cerrar Sesion</a>
                <?php break;
                } ?>
            <?php } else { ?>
                <a class="mobA" href="./login.php" class="logAcc">iniciar sesion</a>
                <a class="mobA" href="./registro.php" class="logReg">registrarse</a>
            <?php } ?>
        </div>
    </div>
</div>