<?php

#region Select categoria
function categoria()
{

    $query = mysqli_query(conectar(), 'select DISTINCT serv_nombre from servicios;');

    echo "<p>Seleccione la categoria</p>";
    echo "<select required name='cat' id='SLTCAT'>";
        echo "<option value='";
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
            echo "<option value='" .$data['serv_nombre'] ."'>" .$data['serv_nombre'] ."</option>";
        } 
    echo "</select>";


}
#endregion

#region Select Servicio
    function servicio($cat)
    {

        $query2 = mysqli_query(conectar(), 'select * from servicios where serv_nombre = "' . $cat . '" ');

        echo "<p>Seleccione el servicio</p>";
        echo "<select required name='serv' id='SLTSRV'>";
            echo "<option value='";
                            if (isset($_POST['serv']) && $_POST['serv'] != "---") {
                                echo $_POST['serv'];
                            } else {
                                echo "---";
                            }
            echo "'>";
                     if (isset($_POST['serv']) && $_POST['serv'] != "---") {
                        while ($data2 = mysqli_fetch_assoc($query2)) {
                            if ($data2['serv_id'] == $_POST['serv']) {
                                echo $data2['serv_desc'];
                                break;
                            }
                        }
                    } else {
                        echo "---";
                    }
            echo "</option>";
            while ($data2 = mysqli_fetch_assoc($query2)) { 
                echo "<option value='" .$data2['serv_id'] ."'>";
                  echo $data2['serv_desc']; 
                echo  "</option>";
            } 
        echo "</select>";

    }
    #endregion

#region Select Profesional
    function profesional()
    {

        $query3 = mysqli_query(conectar(), 'select * from profesionales');

        echo "<p>Seleccione al profesional</p>";
        echo "<select required name='profs' id='SLTSRV'>";
            echo "<option value='";
                    if (isset($_POST['profs']) && $_POST['profs'] != "---") {
                        echo $_POST['profs'];
                    } else {
                        echo "---";
                    }
            echo "'>";
                   if (isset($_POST['profs']) && $_POST['profs'] != "---") {
                       while ($data3 = mysqli_fetch_assoc($query3)) {
                           if ($data3['prof_id'] == $_POST['profs']) {
                               echo $data3['prof_nombre'] . " " . $data3['prof_apellido'];
                               break;
                           }
                       }
                   } else {
                       echo "---";
                   }
            echo "</option>";
            while ($data3 = mysqli_fetch_assoc($query3)) { 
                echo "<option value='".$data3['prof_id'] ."'>" .$data3['prof_nombre'] . " " . $data3['prof_apellido'] ."</option>";
            }
        echo "</select>";

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

        echo "<p>Seleccione una semana</p>";
        echo "<select required name='semana' id='SLTSRV'>";
            echo "<option value='";
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
                echo "<option value='" .$semana ."'>" .$semana ."</option>";
            }
        echo "</select>";

    }
    #endregion

#region Horarios
function horarios($fecha)
    {
        $horarios = array(' 08:00:00', ' 10:00:00', ' 12:00:00', ' 14:00:00', ' 16:00:00', ' 18:00:00');
        $conn = conectar();
        $semana = generarSemana($fecha);
        $iSemana = $semana[0] . $horarios[0];
        $fSemana = $semana[count($semana) - 1]  .$horarios[5];
        $tebd = array();
        $qserv = $_POST['serv'];
        $qprof = $_POST['profs'];
        $sql = "select tur_fecha from turnos where prof_id = $qprof and serv_id = $qserv and tur_fecha BETWEEN '$iSemana' and '$fSemana';";
        $query = mysqli_query($conn,$sql);
        while($info = mysqli_fetch_assoc($query)){
            array_push($tebd,$info['tur_fecha']);
        }
            
        echo "<table>";
        echo "<tr>";
        echo "<th>Horario</th>";
        foreach ($semana as $dia) {
            $evaluar = $dia; // Fecha en formato 'Año-Mes-Día'
            $objEvaluar = new DateTime($evaluar);
            $diaSemana = $objEvaluar->format('N'); // Devuelve un número del 1 al 7, donde 1 es lunes y 7 es domingo
            switch ($diaSemana) {
                case 2:
                    echo '<th>Martes</th>';
                    break;
                case 3:
                    echo '<th>Miércoles</th>';
                    break;
                case 4:
                    echo '<th>Jueves</th>';
                    break;
                case 5:
                    echo '<th>Viernes</th>';
                    break;
                case 6:
                    echo '<th>Sábado</th>';
                    break;
            }
        }
        echo "</tr>";
        foreach ($horarios as $hora) {
            echo "<tr>";
            echo "<td> $hora </td>";
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
                        echo "<td><input type='checkbox' name='horario[]' value='$dia$hora'></td>";
                    }else{
                        echo "<td></td>";
                    }
                } 
            echo "</tr>";
        }
        echo "</table>";
    }
#endregion

#region generarTurnos
function generarTurnos()
{

    echo "<form method='POST'>";

    if (isset($_POST['limpiar'])) {
        $_POST['cat'] = "---";
        $_POST['serv'] = "---";
        $_POST['profs'] = "---";
        $_POST['semana'] = "---";
        $_POST['horario'] = "---";
    }

    categoria();

    if (isset($_POST['cat']) && $_POST['cat'] != "---") {
        servicio($_POST['cat']);
    }

    if (isset($_POST['serv']) && $_POST['serv'] != "---") {
        profesional();
    }

    if (isset($_POST['profs']) && $_POST['profs'] != "---") {
        semana();
    }

    if (isset($_POST['semana']) && $_POST['semana'] != "---") {
        horarios($_POST['semana']);
    }

    echo "<label><input type='checkbox' name='limpiar'>Limpiar Campos</label>";

    if (isset($_POST['semana']) && $_POST['semana'] != "---") {
        echo "<label><input type='checkbox' name='generar'>Generar turnos</label>";
        echo "<button type='submit'>Generar Turnos</button>";
    } else {
        echo "<button type='submit'>Siguiente</button>";
    }

    echo "</form>";
}

#endregion

#region guardarTurnos

function guardarTurnos($array,$prof,$serv){

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

        return $mensaje;

}

#endregion


















?>