<?php 

    function CierreTurnos($op){
        $con = conectar();

        $result = mysqli_query($con, "update turnos set est_id = case when est_id = 1 then 6 when est_id = 2 then 4 else est_id end where tur_fecha < CURRENT_DATE();");

        if($op != null){
            if (mysqli_affected_rows($con) > 0) {
                $err = 1;
            } else {
                if($result){
                    $err = 2;
                }else{
                    $err = 3;
                }
            }
        return $err;
        }
        
    }

    function vaciadoTurnos($op){
        $con = conectar();

        $result = mysqli_query($con, "delete from turnos where est_id = 6");

            if ($op != null) {
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

    }


    function eliTurSelec($turnos){
        $con = conectar();
        if(is_array($turnos)){
        $idEliTur = implode(",", $turnos);
        $result = mysqli_query($con, "delete from turnos where tur_id in ($idEliTur)");
        var_dump("IDS " . $idEliTur);
        var_dump($result);
        }else{
            $result = mysqli_query($con, "delete from turnos where tur_id = $turnos");
            var_dump($turnos);
        }

            

        if (mysqli_affected_rows($con) > 0) {
                $err = 1;
            } else {
                if ($result) {
                    $err = 2;
                } else {
                    $err = 3;
                }
            
            return $err;
        }
    }



?>