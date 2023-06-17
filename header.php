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
<div class="navLog">
    <?php if (isset($_SESSION['rol'])){
    switch ($_SESSION['rol']) {
        default: ?>
            <a href="login.php" class="logAcc">iniciar sesion</a>
            <a href="registro.php" class="logReg">registrarse</a>
        <?php break;
        case 1: /* Administrador */ ?>
            <div>
                <p>Menu</p>
                <div>
                    <a href="">Gestionar Profesionales</a>
                    <a href="">Gestionar Turnos</a>
                    <a href="">Lista de turnos</a>
                    <a href="">Cerrar Sesion</a>
                </div>
            </div>
        <?php break;
        case 2: /* Cliente */ ?>
            <div>
                <p>Menu</p>
                <div>
                    <a href="">Perfil</a>
                    <a href="">Reservar</a>
                    <a href="">Calificar</a>
                    <a href="">Cerrar Sesion</a>
                </div>
            </div>
    <?php break;
    }
    }?>



</div>