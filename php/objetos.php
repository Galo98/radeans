<?php

class Objetos
{

    #region Select Categoria
    public static function categoria()
    {

        $query = mysqli_query(conectar(), 'select DISTINCT serv_nombre from servicios;');

?>
        <select name="categoria" id="">
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?php echo $data['serv_nombre']; ?>"><?php echo $data['serv_nombre']; ?></option>
            <?php } ?>
        </select>
    <?php

    }
    #endregion

    #region Select Servicio
    static public function Servicio()
    {

        $query = mysqli_query(conectar(), 'select * from servicios where serv_nombre =;');

    ?>
        <select name="categoria" id="">
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?php echo $data['serv_nombre']; ?>"><?php echo $data['serv_nombre']; ?></option>
            <?php } ?>
        </select>
<?php


    }
    #endregion


}


?>