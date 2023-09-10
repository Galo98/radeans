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

?>