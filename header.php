<div class="desk">
    <a class="ancLogo" href="index.php">
        <div class="logo"></div>
    </a>
    <nav>
        <ul>
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="./index.php#nosotros">Nosotros</a></li>
            <li><a href="./servicios.php">Servicios</a></li>
            <!-- <li><a href="index.php#puntuaciones">puntuacion</a></li> -->
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>
    <?php if (isset($_SESSION['rol'])) { ?>
        <div class="dropmenu">
            <div class="menuBTN">
                <p class="pmenuBTN">
                    Menu <i class="fa-solid fa-chevron-down"></i>
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
            <a href="./login.php" class="logAcc">Iniciar Sesion</a>
            <a href="./registro.php" class="logReg">Registrarse</a>
        </div>
    <?php } ?>
</div>

<div class="mobile">
    <a class="ancLogo" href="index.php">
        <div class="mobLogo"></div>
    </a>
    <div class="mobMenu">
        <div class="mobMenuBTN">
            <p class="mobPmenuBTN">Menu <i class="fa-solid fa-chevron-down"></i></p>
        </div>
        <div class="mobCajaMenu">
            <a class="mobA" href="./index.php">Inicio</a>
            <a class="mobA" href="./index.php#nosotros">Nosotros</a>
            <a class="mobA" href="./servicios.php">Servicios</a>
            <!-- <a class="mobA" href="index.php#puntuaciones">puntuacion</a> -->
            <a class="mobA" href="#contacto">Contacto</a>
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
                        <a class="mobA mreg" href="./index.php?cl=1">Cerrar Sesion</a>
                <?php break;
                } ?>
            <?php } else { ?>
                <a class="mobA mlog" href="./login.php">Iniciar Sesion</a>
                <a class="mobA mreg" href="./registro.php">Registrarse</a>
            <?php } ?>
        </div>
    </div>
</div>