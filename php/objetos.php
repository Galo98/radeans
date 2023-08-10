<?php

class Objetos
{

    #region Select Categoria
    public static function categoria()
    {

        $query = mysqli_query(conectar(), 'select DISTINCT serv_nombre from servicios;');

?>
        <p>Seleccione la categoria</p>
        <select name="cat" id="SLTCAT">
            <option value="<?php if (isset($_POST['cat']) && $_POST['cat'] != " ") {
                                echo $_POST['cat'];
                            } else {
                                echo "---";
                            }
                            ?>"><?php if (isset($_POST['cat']) && $_POST['cat'] != " ") {
                                    echo $_POST['cat'];
                                } else {
                                    echo "---";
                                }
                                ?></option>
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?php echo $data['serv_nombre']; ?>"><?php echo $data['serv_nombre']; ?></option>
            <?php } ?>
        </select>
    <?php

    }
    #endregion

    #region Select Servicio
    static public function servicio($cat)
    {

        $query2 = mysqli_query(conectar(), 'select * from servicios where serv_nombre = "' . $cat . '" ');

    ?>
        <p>Seleccione el servicio</p>
        <select name="serv" id="SLTSRV">
            <option value="<?php
                            if (isset($_POST['serv']) && $_POST['serv'] != " ") {
                                echo $_POST['serv'];
                            } else {
                                echo "---";
                            }
                            ?>"><?php
                                if (isset($_POST['serv']) && $_POST['serv'] != " ") {
                                    echo $_POST['serv'];
                                } else {
                                    echo "---";
                                }
                                ?></option>
            <?php while ($data2 = mysqli_fetch_assoc($query2)) { ?>
                <option value="<?php echo $data2['serv_desc']; ?>"><?php echo $data2['serv_desc']; ?></option>
            <?php } ?>
        </select>
    <?php


    }
    #endregion

    #region Select Profesional
    static public function profesional()
    {

        $query3 = mysqli_query(conectar(), 'select * from profesionales');

    ?>
        <p>Seleccione al profesional</p>
        <select name="profs" id="SLTSRV">
            <?php while ($data3 = mysqli_fetch_assoc($query3)) { ?>
                <option value="<?php echo $data3['prof_id']; ?>"><?php echo $data3['prof_nombre'] . " " . $data3['prof_apellido']; ?></option>
            <?php } ?>
        </select>
    <?php


    }
    #endregion

    #region Select Semana
    static public function semana()
    {

        $fechas = Fechas::generarSabados();

    ?>
        <p>Seleccione una semana</p>
        <select name="semana" id="SLTSRV">
            <?php foreach ($fechas as $semana) { ?>
                <option value="<?php echo $semana; ?>"><?php echo $semana; ?></option>
            <?php } ?>
        </select>
    <?php


    }
    #endregion

    #region Select Semana
    static public function horarios($fecha)
    {

        $semana = Fechas::generarSemana($fecha);

    ?>
        <p>Marque los horarios segun la semana del <?php echo $fecha;?></p>
        <select name="semana" id="SLTSRV">
            <?php foreach ($semana as $dias) { ?>
                <option value="<?php echo $dias; ?>"><?php echo $dias; ?></option>
            <?php } ?>
        </select>
<?php


    }
    #endregion

}

class Fechas
{

    #region generarSabados
    static public function generarSabados()
    {
        $sabados = array();

        // Obtener el primer día del mes actual
        $primerDiaDelMes = new DateTime('first day of this month');

        // Obtener el último día del mes actual
        $ultimoDiaDelMes = new DateTime('last day of this month');

        // Iterar a través de los días para encontrar los sábados
        $fechaActual = $primerDiaDelMes;
        while ($fechaActual <= $ultimoDiaDelMes) {
            if ($fechaActual->format('N') == 6) { // 6 representa el sábado
                $sabados[] = $fechaActual->format('Y-m-d');
            }
            $fechaActual->modify('+1 day'); // Mover al siguiente día
        }

        $fechaActual = new DateTime();
        $mesSiguiente = $fechaActual->modify('+1 month');

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
    static public function generarSemana($fecha)
    {
        $sieteDiasPrevios = array();

        // Crear un objeto DateTime a partir de la fecha dada
        $fechaObj = new DateTime($fecha);

        // Iterar para obtener siete días previos
        for ($i = 0; $i < 7; $i++) {
            $sieteDiasPrevios[] = $fechaObj->format('Y-m-d');
            $fechaObj->modify('-1 day'); // Mover al día anterior
        }

        return array_reverse($sieteDiasPrevios); // Invertir el orden para tener los más cercanos primero
    }
    #endregion


}

?>