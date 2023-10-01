<?php

/* ----------------------- Admin ----------------------- */

#region Select Estados

function traerEstados($id,$desc){
    $con = conectar();

    $estados = mysqli_query($con,"select * from estados;");
    echo " <select name='ediEst'class='fselect' >"; 
    if(isset($id)){
        echo " <option value='" . $id . "'>" . $desc . "</option> ";
    }
    while($estado = mysqli_fetch_assoc($estados)){
        if($estado['est_id'] != $id){
            echo " <option value='". $estado['est_id']."'>" .$estado['est_desc'] ."</option> ";
        }
    }
    echo "</select> ";
}

#endregion

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
                                foreach($servicios as $data2) {
                                    if ($data2['serv_id'] == $_POST['serv']) {
                                        echo $data2['serv_id'];
                                        break;
                                    }
                                }
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
            $arrDias = explode('-',$evaluar);
            $nDia = $arrDias['2'];
            $objEvaluar = new DateTime($evaluar);
            $diaSemana = $objEvaluar->format('N'); // Devuelve un número del 1 al 7, donde 1 es lunes y 7 es domingo
            switch ($diaSemana) {
                case 2:
                    echo "<th class='tabGesTh'>Martes " . $nDia ."</th>";
                    break;
                case 3:
                    echo "<th class='tabGesTh'>Miércoles " . $nDia ."</th>";
                    break;
                case 4:
                    echo "<th class='tabGesTh'>Jueves " . $nDia ."</th>";
                    break;
                case 5:
                    echo "<th class='tabGesTh'>Viernes " . $nDia ."</th>";
                    break;
                case 6:
                    echo "<th class='tabGesTh'>Sábado " . $nDia ."</th>";
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

#region listadoDeTurnos
    function listadoDeTurnos($orden){
        $fechaActual = date('Y-m-d');
        if($orden == null) $orden = "turnos.tur_fecha like '$fechaActual%' and turnos.usu_id != null ASC";
        $con = conectar();

        $turnos = mysqli_query($con,"select turnos.*,estados.est_desc,usuarios.usu_nombre,usuarios.usu_apellido,profesionales.prof_nombre,profesionales.prof_apellido,servicios.serv_nombre,servicios.serv_desc from turnos left join estados on estados.est_id = turnos.est_id left join usuarios on usuarios.usu_id = turnos.usu_id left join profesionales on profesionales.prof_id = turnos.prof_id left join servicios on servicios.serv_id = turnos.serv_id order by $orden;");

        echo "<table class='tabla' id='tabla'>";
            echo "<thead>";
                echo "<tr style='width: 1250px'>";
                    echo "<th class='columna' style='width: 70px'>Marca</th>";
                    echo "<th class='columna' style='width: 200px' >Fecha</th>";
                    echo "<th class='columna' style='width: 110px' >Estado</th>";
                    echo "<th class='columna' style='width: 220px' >Usuario</th>";
                    echo "<th class='columna' style='width: 220px' >Profesional</th>";
                    echo "<th class='columna' style='width: 120px' >Categoria</th>";
                    echo "<th class='columna' style='width: 200px' >Servicio</th>";
                    echo "<th class='columna' style='width: 110px' >Acciones</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody class='tabCuerpo'>";
            
            while($turno = mysqli_fetch_assoc($turnos)){
                $fecTur = explode(" ",$turno['tur_fecha']);
                $fecTur = $fecTur[0];
                if($turno['usu_nombre'] == null){
                    $input = "<input type='checkbox' class='checkLis' name='eliTur[]' value='".$turno['tur_id']."'>";
                    $usua = "---";
                }else{
                    $input = "<i class='fa-solid fa-square-xmark' style='color: #f66151;'></i>";
                    $usua = $turno['usu_nombre'] . " " . $turno['usu_apellido'];
                }
                if(isset($_GET['edi']) && $_GET['edi'] === $turno['tur_id']){
                    echo "<tr id='edi' style='width: 1250px'>";
                }else{
                    echo "<tr style='width: 1250px'>";
                }
                    echo "<td style='width: 70px'> $input </td>";
                    echo "<td style='width: 200px'>" .$turno['tur_fecha'] ."</td>";
                    if(isset($_GET['edi']) && $_GET['edi'] === $turno['tur_id']){
                            echo "<td style='width: 110px'>";
                                traerEstados($turno['est_id'],$turno['est_desc']);
                            echo "</td>";
                            echo " <input type='hidden' name='ediID' value='" .$_GET['edi'] ."' > ";
                    }else{
                        echo "<td style='width: 110px'>" .$turno['est_desc'] ."</td>";
                    }
                    echo "<td style='width: 220px'>" .$usua ."</td>";
                    echo "<td style='width: 220px'>" .$turno['prof_nombre'] ." " . $turno['prof_apellido'] ."</td>";
                    echo "<td style='width: 120px'>" .$turno['serv_nombre'] ."</td>";
                    echo "<td style='width: 200px'>" .$turno['serv_desc'] ."</td>";
                     
                        if(isset($_GET['edi']) && $_GET['edi'] === $turno['tur_id']){
                            echo "<td style='width: 110px'>
                                <div class='btnGroup'>
                                    <button class='btnListaEdi' type='submit'><i class='fa-regular fa-floppy-disk' style='color: #ffffff;'></i></button>
                                    <a class='btnLista del' href='listado.php'> <i class='fa-solid fa-ban' style='color: #ffffff;'></i> </a>
                                </div> 
                            </td>";
                        }else{
                            echo "<td style='width: 110px'>
                                <div class='btnGroup'>";
                            if($fechaActual === $fecTur && $turno['est_id'] == 2){
                                echo "<a class='btnLista ate' href='listado.php?ate=" . $turno['tur_id'] . "'> <i class='fa-solid fa-clipboard-user' style='color: #ffffff;'></i></i></a>";
                            }
                            echo "<a class='btnLista act' href='listado.php?edi=".$turno['tur_id'] ."'> <i class='fa-solid fa-pencil' style='color: #ffffff;'></i></a>
                                    <a class='btnLista del' href='listado.php?eliFor=".$turno['tur_id']."'> <i class='fa-regular fa-trash-can' style='color: #ffffff;'></i> </a>
                                </div> 
                            </td>";
                        }
                    
                echo "</tr>";
            }
            echo "</tbody>";
        echo "</table>";

    }
#endregion

#region eliTurSelec
function eliTurSelec($turnos)
{
    $con = conectar();

    if (is_array($turnos)) {

        $idEliTur = implode(",", $turnos);
        $result = mysqli_query($con, "delete from turnos where tur_id in ($idEliTur)");
    } else {
        $result = mysqli_query($con, "delete from turnos where tur_id = $turnos");
    }



    if (mysqli_affected_rows($con) > 0) {
        $err = 1;
    } else {
        if ($result) {
            $err = 2;
        } else {
            $err = 3;
        }
    }

    return $err;
}
#endregion

#region actualizarEstado
function actEstado($id,$estado){
    $con = conectar();

    $result = mysqli_query($con,"update turnos set est_id = $estado where tur_id = $id");

    if (mysqli_affected_rows($con) > 0) {
        $err = 1;
    } else {
        if ($result) {
            $err = 2;
        } else {
            $err = 3;
        }
    }

    return $err;
}
#endregion

#region turnoAtendido
function turnoAtendido($id){
    $con = conectar();

    $result = mysqli_query($con,"update turnos set est_id = 5 where tur_id = $id");

    if (mysqli_affected_rows($con) > 0) {
        $err = 1;
    } else {
        if ($result) {
            $err = 2;
        } else {
            $err = 3;
        }
    }

    return $err;
}
#endregion

/* ----------------------- Usuario ----------------------- */

#region profxServ

    function profxServ($idServ){
        $profesionales = array();
        $con = conectar();
        $query3 = mysqli_query($con, 'select DISTINCT turnos.prof_id,profesionales.prof_nombre, profesionales.prof_apellido from turnos inner join profesionales on turnos.prof_id = profesionales.prof_id where est_id = 1 and serv_id = ' .$idServ .';');
        while ($data2 = mysqli_fetch_assoc($query3)) {
            array_push($profesionales, $data2);
        }

        echo "<label class='tlabel'>Seleccione al profesional";
        echo "<select class='fselect' required name='profs' id='SLTSRV'>";
        if(mysqli_affected_rows($con) > 0){
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
        }else{
            echo " <option value='---'>No hay turnos disponibles</option> ";
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

#region verificarTurno

function verificarTurno($usu,$turno){

    $conn = conectar();
    $datos = mysqli_query($conn, "select turnos.tur_fecha ,servicios.serv_desc, profesionales.prof_nombre, profesionales.prof_apellido  from turnos inner join servicios on  servicios.serv_id = turnos.serv_id inner join profesionales on profesionales.prof_id = turnos.prof_id where usu_id = $usu and est_id = 2 and tur_fecha = (select tur_fecha from turnos where tur_id = $turno);");
    
    if(mysqli_affected_rows($conn) > 0){
        $error = [9];
        $datosTurnos = mysqli_fetch_assoc($datos);
        foreach ($datosTurnos as $dato) {
            array_push($error,$dato);
        }
        return $error;       
        // Posicion 0 codigo de error = 9
        // Posicion 1 codigo de error = fecha
        // Posicion 2 codigo de error = servicio
        // Posicion 3 codigo de error = prof_nombre
        // Posicion 4 codigo de error = prof_apellido
    }

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
        echo "<label><input type='checkbox' name='limpiar'>Limpiar Campos</label>";

        if(isset($_POST['turid']) && $_POST['turid'] != "---"){
            $err = verificarTurno($_SESSION['id'],$_POST['turid']);
            $mensaje = $err[0];
        }

        if (!isset($err) && isset($_POST['turid']) && $_POST['turid'] != "---") {
            echo "<label><input type='checkbox' name='generar'>Confirmar Turno</label>";
        }
        echo "</div>";

        echo "<div class='fBtnRes'>";
        if (!isset($err) && isset($_POST['turid']) && $_POST['turid'] != "---") {
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
                case '9':
                    echo "<p class='menErr'>¡Error! Se ha seleccionado una fecha y horario en la que ya has reservado un turno. </p>";
                    echo "<p class='menOk'>Detalle del turno reservado</p>";
                    echo "<p class='menOk'>Turno: ". $err[1] ."</p>";
                    echo "<p class='menOk'>Servicio: ". $err[2] ."</p>";
                    echo "<p class='menOk'>Profesional: ". $err[3] ." " .$err[4] ."</p>";                
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
            /* $mensaje = 5; // Turno reservado correctamente */
            header('Location: ../misturnos.php');
        } else {
            $mensaje = 6; // No se pudo reservar el turno
        }
    } else {
        $mensaje = 7; // No se ha seleccionado una fecha para poder generar el turno
    }

    return $mensaje;
}

#endregion

/* ----------------------- MisTurnos ----------------------- */

#region slideTurnos

function slideTurnos($usu, $mensaje){
    if(!isset($mensaje)){
        $mensaje = 0;
    }
    $con = conectar();
    $cont = 0;
    $turnosReservados = mysqli_query($con, "select turnos.tur_id, turnos.tur_fecha, servicios.serv_nombre, servicios.serv_desc, profesionales.prof_nombre, profesionales.prof_apellido, profesionales.prof_foto from turnos inner join servicios on servicios.serv_id = turnos.serv_id inner join profesionales on profesionales.prof_id = turnos.prof_id where usu_id = $usu and est_id = 2;");

    echo "<h1 class='titulos'>Turnos reservados</h1>";
            echo "<div class='sliderCards'>";
                echo "<div class='slider-containerCards'>";
                    echo "<div class='cajaContenidosCard'> ";
                        while($dato = mysqli_fetch_assoc($turnosReservados)){
                            $fyh = explode(" ",$dato['tur_fecha']);
                            $fecha = $fyh[0];
                            $fCom = explode("-",$fyh[0]);
                            $hora = $fyh[1];
                            $hCom = explode(":",$fyh[1]);
                            echo " <form method='POST'>";
                                echo "<div class='card'>";
                                    echo "<p class='nombreP'>". $dato['prof_nombre']." " .$dato['prof_apellido'] ."</p>";
                                    echo "<div class='fotoP' style='background-image: url(/img/001.png);'></div>";
                                    echo "<p class='servP'> Servicio: " .$dato['serv_desc'] ."</p>";
                                    echo "<p class='fecTur'> Día: " .$fCom[2] ."/" .$fCom[1] ."</p>";
                                    echo "<p class='fecTur'> Hora: " .$hCom[0] .":" .$hCom[1] ." hs" ."</p>";
                                    echo "<input type='hidden' name='idtur' value='" .$dato['tur_id'] ."'> ";
                                    echo "<input type='submit' class='cancTurBTN' value='cancelar'> ";
                                echo "</div>";
                            echo "</form>";
                            $cont ++;
                        }
                    echo "</div>";
                echo "</div>";
                if($cont > 1){
                echo "<i class='prev-slide fa-solid fa-angle-left' style='display:flex;' onclick='prevSlide()'></i>";
                echo "<i class='next-slide fa-solid fa-angle-right' style='display:flex;' onclick='nextSlide()'></i>";
                }
            echo "</div>";
            if(isset($mensaje)){
            echo " <div class='mensajes'>";
                switch($mensaje){
                    case 10:
                        echo "<p class='titulos'>Turno cancelado con exito!</p>";
                        break;
                    case 11:
                        echo "<p class='subtitulos'>No se pudo cancelar el turno, vuelva a intentarlo mas tarde.</p>";
                        break;
                }
                echo "</div>";
            }
}

#endregion

#region cancelarTurno

function cancelarTurno($idTurno){

    $con = conectar();

    mysqli_query($con,"update turnos set est_id = 1, usu_id = null where tur_id = $idTurno");

    if(mysqli_affected_rows($con) > 0){
        $mensaje = 10;
    }else{
        $mensaje = 11;
    }

    return $mensaje;
}

#endregion







?>