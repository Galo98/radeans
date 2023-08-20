<?php

/* ----------------------- Admin ----------------------- */

#region Select categoria
function categoria()
{
    $query = mysqli_query(conectar(), 'select DISTINCT serv_nombre from servicios;');

    echo "<label class='tlabel'>Seleccione la categoria";
    echo "<select class='fselect' required name='cat' id='SLTCAT'>";
        echo "<option  value='";
            if (isset($_POST['cat']) && $_POST['cat'] != "---") {
                            echo $_POST['cat'];
                        } else {
                            echo "---";
                        }
        echo "'>";
            if (isset($_POST['cat']) && $_POST['cat'] != "---") {
                                    echo $_POST['cat'];
                                } else {
                                    echo "---";
                                }
        echo "</option>";
        while ($data = mysqli_fetch_assoc($query)) {
            if ($data['serv_nombre'] != $_POST['cat']) {
                echo "<option  value='" . $data['serv_nombre'] . "'>" . $data['serv_nombre'] . "</option>";
            }
        }
        echo "</select>";
        echo "</label>";


}
#endregion

#region Select Servicio
    function servicio($cat)
    {
        $servicios = array();
        $query2 = mysqli_query(conectar(), 'select * from servicios where serv_nombre = "' . $cat . '" ');
        while ($data2 = mysqli_fetch_assoc($query2)) {
            array_push($servicios,$data2);
        }

        echo "<label class='tlabel'>Seleccione el servicio";
        echo "<select class='fselect' required name='serv' id='SLTSRV'>";
            echo "<option  value='";
                            if (isset($_POST['serv']) && $_POST['serv'] != "---") {
                                echo $_POST['serv'];
                            } else {
                                echo "---";
                            }
            echo "'>";
                     if (isset($_POST['serv']) && $_POST['serv'] != "---") {
                        foreach($servicios as $data2) {
                            if ($data2['serv_id'] == $_POST['serv']) {
                                echo $data2['serv_desc'];
                                break;
                            }
                        }
                    } else {
                        echo "---";
                    }
            echo "</option>";
            foreach ($servicios as $data2){ 
                if($data2['serv_id'] != $_POST['serv']){
                    echo "<option  value='" .$data2['serv_id'] ."'>";
                    echo $data2['serv_desc']; 
                    echo  "</option>";
                }
            } 
            echo "</select>";
            echo "</label>";

    }
    #endregion

#region Select Profesional
    function profesional()
    {
        $profesionales = array();
        $query3 = mysqli_query(conectar(), 'select * from profesionales');
        while ($data2 = mysqli_fetch_assoc($query3)) {
            array_push($profesionales,$data2);
        }

        echo "<label class='tlabel'>Seleccione al profesional";
        echo "<select class='fselect' required name='profs' id='SLTSRV'>";
            echo "<option  value='";
                    if (isset($_POST['profs']) && $_POST['profs'] != "---") {
                        echo $_POST['profs'];
                    } else {
                        echo "---";
                    }
            echo "'>";
                   if (isset($_POST['profs']) && $_POST['profs'] != "---") {
                       foreach ($profesionales as $data3) {
                           if ($data3['prof_id'] == $_POST['profs']) {
                               echo $data3['prof_nombre'] . " " . $data3['prof_apellido'];
                               break;
                           }
                       }
                   } else {
                       echo "---";
                   }
            echo "</option>";
            foreach($profesionales as $data3) { 
                if($data3['prof_id'] != $_POST['profs']){
                    echo "<option  value='".$data3['prof_id'] ."'>" .$data3['prof_nombre'] . " " . $data3['prof_apellido'] ."</option>";
                }
            }
            echo "</select>";
            echo "</label>";

    }
    #endregion

#region generarSabados
function generarSabados()
    {
        $sabados = array();

        // Obtener el primer día del mes actual
        $primerDiaDelMes = new DateTime('first day of this month');

        // Obtener el último día del mes actual
        $ultimoDiaDelMes = new DateTime('last day of this month');

        // Obtener la fecha actual
        $fechaActual = new DateTime();

        // Iterar a través de los días para encontrar los sábados
        $fechaIterador = clone $primerDiaDelMes; // Clonar para no afectar la fecha original
        while ($fechaIterador <= $ultimoDiaDelMes) {
            if ($fechaIterador->format('N') == 6 && $fechaIterador >= $fechaActual) { // 6 representa el sábado
                $sabados[] = $fechaIterador->format('Y-m-d');
            }
            $fechaIterador->modify('+1 day'); // Mover al siguiente día
        }

        $mesSiguiente = clone $fechaActual;
        $mesSiguiente->modify('+1 month');

        // Obtener el primer día del mes siguiente
        $primerDiaDelMesSiguiente = new DateTime('first day of ' . $mesSiguiente->format('F Y'));

        // Iterar a través de los días para encontrar el primer sábado
        $fechaActual = $primerDiaDelMesSiguiente;
        while ($fechaActual->format('N') != 6) { // 6 representa el sábado
            $fechaActual->modify('+1 day'); // Mover al siguiente día
        }

        $sabados[] = $fechaActual->format('Y-m-d');

        return $sabados;
    }
#endregion

#region obtenerSemana
function generarSemana($fecha)
    {
        
        $sieteDiasPrevios = array();

        // Crear un objeto DateTime a partir de la fecha dada
        $fechaObj = new DateTime($fecha);

        // Obtener la fecha actual
        $fechaActual = new DateTime();

        // Iterar para obtener siete días previos
        for ($i = 0; $i < 5; $i++) {
            if ($fechaObj >= $fechaActual) {
                $sieteDiasPrevios[] = $fechaObj->format('Y-m-d');
            }
            $fechaObj->modify('-1 day'); // Mover al día anterior
        }

        return array_reverse($sieteDiasPrevios); // Invertir el orden para tener los más cercanos primero
    }
#endregion

#region Select Semana
    function semana()
    {

        $fechas = generarSabados();

        echo "<label class='tlabel'>Seleccione una semana";
        echo "<select class='fselect' required name='semana' id='SLTSRV'>";
            echo "<option  value='";
                 if (isset($_POST['semana']) && $_POST['semana'] != "---") {
                     echo $_POST['semana'];
                 } else {
                     echo "---";
                 }
            echo "'>";
                     if (isset($_POST['semana']) && $_POST['semana'] != "---") {
                         echo $_POST['semana'];
                     } else {
                         echo "---";
                     }
            echo "</option>";
            foreach ($fechas as $semana) {
                if ($semana != $_POST['semana']) {
                    echo "<option  value='" . $semana . "'>" . $semana . "</option>";
                }
            }
            echo "</select>";
            echo "</label>";

    }
    #endregion

#region Horarios
function horarios($fecha)
    {

        echo "<p class='tlabel'>Seleccione los horarios correspondientes a cada turno</p>";

        $horarios = array(' 08:00:00', ' 10:00:00', ' 12:00:00', ' 14:00:00', ' 16:00:00', ' 18:00:00');
        $conn = conectar();
        $semana = generarSemana($fecha);
        $iSemana = $semana[0] . $horarios[0];
        $fSemana = $semana[count($semana) - 1]  .$horarios[5];
        $tebd = array();
        $qprof = $_POST['profs'];
        $sql = "select tur_fecha from turnos where prof_id = $qprof and tur_fecha BETWEEN '$iSemana' and '$fSemana';";
        $query = mysqli_query($conn,$sql);
        while($info = mysqli_fetch_assoc($query)){
            array_push($tebd,$info['tur_fecha']);
        }
            
        echo "<table class='tabGes'>";
        echo "<tr class='tabGesTr'>";
        echo "<th class='tabGesTh'>Horario</th>";
        foreach ($semana as $dia) {
            $evaluar = $dia; // Fecha en formato 'Año-Mes-Día'
            $objEvaluar = new DateTime($evaluar);
            $diaSemana = $objEvaluar->format('N'); // Devuelve un número del 1 al 7, donde 1 es lunes y 7 es domingo
            switch ($diaSemana) {
                case 2:
                    echo "<th class='tabGesTh'>Martes</th>";
                    break;
                case 3:
                    echo "<th class='tabGesTh'>Miércoles</th>";
                    break;
                case 4:
                    echo "<th class='tabGesTh'>Jueves</th>";
                    break;
                case 5:
                    echo "<th class='tabGesTh'>Viernes</th>";
                    break;
                case 6:
                    echo "<th class='tabGesTh'>Sábado</th>";
                    break;
            }
        }
        echo "</tr>";
        foreach ($horarios as $hora) {
            echo "<tr class='tabGesTr'>";
            echo "<td class='tabGesTd'> $hora </td>";
                foreach ($semana as $dia) {
                    foreach($tebd as $datos){
                        if($datos == $dia . $hora){
                            $hacer = 1;
                            break;
                        }else{
                            $hacer = 0;
                        }
                    }
                    if($hacer == 0){
                        echo "<td class='tabGesTd'><input type='checkbox' name='horario[]' value='$dia$hora'></td>";
                    }else{
                        echo "<td class='tabGesTd'></td>";
                    }
                } 
            echo "</tr>";
        }
        echo "</table>";
    }
#endregion

#region generarTurnos
function generarTurnos($mensaje)
{
    echo "<div class='gTurnos'>";
    echo " <h2 class='titulos'>Apertura de la grilla de turnos</h2>";
    echo "<form method='POST' class='fTurnos'>";

    if (isset($_POST['limpiar'])) {
        $_POST['cat'] = "---";
        $_POST['serv'] = "---";
        $_POST['profs'] = "---";
        $_POST['semana'] = "---";
        $_POST['horario'] = "---";
    }

    echo "<div class='cajaSelects'>";
    echo "<div class='formCat'>";
    categoria();
    echo "</div>";

    if (isset($_POST['cat']) && $_POST['cat'] != "---") {
        echo "<div class='formServ'>";
            servicio($_POST['cat']);
        echo "</div>";
    }

    if (isset($_POST['serv']) && $_POST['serv'] != "---") {
        echo "<div class='formProf'>";
            profesional();
        echo "</div>";
    }

    if (isset($_POST['profs']) && $_POST['profs'] != "---") {
        echo "<div class='formSem'>";
            semana();
        echo "</div>";
    }

    echo "</div>";

    if (isset($_POST['semana']) && $_POST['semana'] != "---") {
        echo "<div class='formHora'>";
            horarios($_POST['semana']);
        
    }

    

    echo "<div class='fCajaConf'>";

    echo "<div class='fchecks'>";
    echo "<label><input type='checkbox' name='limpiar'>Limpiar Campos</label>";
    if (isset($_POST['semana']) && $_POST['semana'] != "---"){
        echo "<label><input type='checkbox' name='generar'>Generar turnos</label>";
    }
    echo "</div>";

    echo "<div class='fBtn'>";
    if (isset($_POST['semana']) && $_POST['semana'] != "---") {
        echo "<button class='fGesBTNg' type='submit'>Generar Turnos</button>";
    } else {
        echo "<button class='fGesBTNs' type='submit'>Siguiente</button>";
    }
    echo "</div>";

    echo "<div class='mensajes'>";
        if (isset($mensaje)) {
            switch ($mensaje) {
                case '1':
                    echo "<p class='menOk'>¡Genial! Se generaron los turnos correctamente</p>";
                    break;
                case '2':
                    echo "<p class='menErr'>¡Error! No se generaron los turnos correctamente</p>";
                    break;
                case '3':
                    echo "<p class='menErr'>¡Error! No se insertaron horarios para generar la grilla de turnos</p>";
                    break;
                case '4':
                    echo "<p class='menErr'>¡Error! Se ha seleccionado el checkbox de limpiar campos a la vez de generar grilla. </p>";
                    break;
            }
            
        } 
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
}

#endregion

#region guardarTurnos

function guardarTurnos($array,$prof,$serv){
    if($array != null){

        $insert = "";
        $con = conectar();

        for ($i = 0; $i < count($array); $i++) {
            $max = count($array) - 1;
            if ($i == $max) {
                $insert = $insert  . "('$array[$i]',1,null,$prof,$serv)"; // el ultimo value va a ser sin ,
            } else {
                $insert = $insert  . "('$array[$i]',1,null,$prof,$serv),"; // desde el primer a anteultimo value van con ,
            }

        }

        $sql = "insert into turnos (tur_fecha,est_id,usu_id,prof_id,serv_id) values $insert;";

        mysqli_query($con, $sql);

        if (mysqli_affected_rows($con) > 0) {
            $mensaje = 1; // Se guardo satisfactoriamente
        } else {
            $mensaje = 2; // No se pudo guardar
        }
    } else{
        $mensaje = 3; // No hay datos para guardar
    }

        return $mensaje;

}

#endregion

/* ----------------------- Usuario ----------------------- */

#region profxServ

    function profxServ($idServ){
        $profesionales = array();

        $query3 = mysqli_query(conectar(), 'select DISTINCT turnos.prof_id,profesionales.prof_nombre, profesionales.prof_apellido from turnos inner join profesionales on turnos.prof_id = profesionales.prof_id where est_id = 1 and serv_id = ' .$idServ .';');
        while ($data2 = mysqli_fetch_assoc($query3)) {
            array_push($profesionales, $data2);
        }

        echo "<label class='tlabel'>Seleccione al profesional";
        echo "<select class='fselect' required name='profs' id='SLTSRV'>";
        echo "<option  value='";
        if (isset($_POST['profs']) && $_POST['profs'] != "---") {
            echo $_POST['profs'];
        } else {
            echo "---";
        }
        echo "'>";
        if (isset($_POST['profs']) && $_POST['profs'] != "---") {
            foreach ($profesionales as $data3) {
                if ($data3['prof_id'] == $_POST['profs']) {
                    echo $data3['prof_nombre'] . " " . $data3['prof_apellido'];
                    break;
                }
            }
        } else {
            echo "---";
        }
        echo "</option>";
        foreach ($profesionales as $data3) {
            if ($data3['prof_id'] != $_POST['profs']) {
                echo "<option  value='" . $data3['prof_id'] . "'>" . $data3['prof_nombre'] . " " . $data3['prof_apellido'] . "</option>";
            }
        }
        echo "</select>";
        echo "</label>";
    }

#endregion

#region turnosxProfs

    function turnosxProfs($serv, $prof){

        $profesionales = array();

        $query3 = mysqli_query(conectar(), "select tur_id, tur_fecha from turnos where serv_id = $serv and prof_id = $prof and est_id = 1;");
        while ($data2 = mysqli_fetch_assoc($query3)) {
            array_push($profesionales, $data2);
        }

        

        echo "<label class='tlabel'>Seleccione el turno";
        echo "<select class='fselect' name='turid' id='SLTSRV'>";
        echo "<option  value='";
        if (isset($_POST['turid']) && $_POST['turid'] != "---") {
            echo $_POST['turid'];
        } else {
            echo "---";
        }
        echo "'>";
        if (isset($_POST['turid']) && $_POST['turid'] != "---") {
            foreach ($profesionales as $data3) {
                if ($data3['tur_id'] == $_POST['turid']) {
                    echo $data3['tur_fecha'];
                    break;
                }
            }
        } else {
            echo "---";
        }
        echo "</option>";
        foreach ($profesionales as $data3) {
            if ($data3['tur_id'] != $_POST['turid']) {
                echo "<option  value='" . $data3['tur_id'] . "'>" . $data3['tur_fecha']. "</option>";
            }
        }
       
        echo "</select>";
        echo "</label>";


    }

#endregion

#region formularioReservas
    function formularioReservas($mensaje){
        echo "<div class='rTurnos'>";
        echo " <h2 class='titulos'>Reservación de turnos</h2>";
        echo "<form method='POST' class='fTurnosRes'>";

        if (isset($_POST['limpiar'])) {
            $_POST['cat'] = "---";
            $_POST['serv'] = "---";
            $_POST['profs'] = "---";
            $_POST['turid'] = "---";
        }

        echo "<div class='cajaSelects'>";
        echo "<div class='formCat'>";
        categoria();
        echo "</div>";

        if (isset($_POST['cat']) && $_POST['cat'] != "---") {
            echo "<div class='formServ'>";
            servicio($_POST['cat']);
            echo "</div>";
        }

        if (isset($_POST['serv']) && $_POST['serv'] != "---") {
            echo "<div class='formProf'>";
            profxServ($_POST['serv']);
            echo "</div>";
        }

        if (isset($_POST['profs']) && $_POST['profs'] != "---") {
            echo "<div class='formSem'>";
            turnosxProfs($_POST['serv'], $_POST['profs']);
            echo "</div>";
        }

        echo "</div>";
    
        echo "<div class='formHora'>";
        echo "<div class='fCajaConf'>";

        echo "<div class='fchecks'>";
/*         if(isset($_POST['profs'])){
        echo "<p class='menOk'> Estas a punto de reservar el siguiente turno" ."</p>";
        }  */

        echo "<label><input type='checkbox' name='limpiar'>Limpiar Campos</label>";
        if (isset($_POST['profs']) && $_POST['profs'] != "---") {
            echo "<label><input type='checkbox' name='generar'>Confirmar Turno</label>";
        }
        echo "</div>";

        echo "<div class='fBtnRes'>";
        if (isset($_POST['profs']) && $_POST['profs'] != "---") {
            echo "<button class='fGesBTNg' type='submit'>Reservar</button>";
        } else {
            echo "<button class='fGesBTNs' type='submit'>Siguiente</button>";
        }
        echo "</div>";

        echo "<div class='mensajes'>";
        if (isset($mensaje)) {
            switch ($mensaje) {
                case '5':
                    echo "<p class='menOk'>Deberia redirigir a misturnos.php .</p>";
                    break;
                case '6':
                    echo "<p class='menErr'>¡Error! No se pudo reservar el turno correctamente, intentalo nuevamente. </p>";
                    break;
                case '7':
                    echo "<p class='menErr'>¡Error! No se ha seleccionado una fecha para la reservacion del turno, seleccione una fecha. </p>";
                    break;
                case '8':
                    echo "<p class='menErr'>¡Error! Se ha seleccionado limpiar campos y reservar turnos a la vez. </p>";
                    break;
            }
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

    }
#endregion

#region reservarTurno

function reservarTurno($turid,$usu){
    if ($turid != null) {

        $con = conectar();

        mysqli_query($con, "update turnos set est_id = 2, usu_id = $usu where tur_id = $turid");

        if (mysqli_affected_rows($con) > 0) {
            $mensaje = 5; // Turno reservado correctamente
        } else {
            $mensaje = 6; // No se pudo reservar el turno
        }
    } else {
        $mensaje = 7; // No se ha seleccionado una fecha para poder generar el turno
    }

    return $mensaje;
}

#endregion













?>