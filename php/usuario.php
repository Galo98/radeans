<?php

class Usuarios
{

    #region Atributos
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $correo2;
    private $tel;
    private $pass;
    private $pass2;
    private $rol;
    #endregion

    #region Constructor
    public function __construct($id, $nomb, $ape, $correo, $correo2, $tel, $pass, $pass2, $rol)
    {
        $this->id = $id;
        $this->nombre = $nomb;
        $this->apellido = $ape;
        $this->correo = $correo;
        $this->correo2 = $correo2;
        $this->tel = $tel;
        $this->pass = $pass;
        $this->pass2 = $pass2;
        $this->rol = $rol;
    }
    #endregion

    #region Registracion
    public function registracion()
    {

        $mensaje = "";

        $consulta = " INSERT INTO usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,rol_id) values ('$this->nombre','$this->apellido','$this->correo','$this->tel','$this->pass',$this->rol);";
        $conexion = conectar();

        mysqli_query($conexion, $consulta);

        if (mysqli_affected_rows($conexion) > 0) {

            $mensaje = "Hola Bienvenid@ a Radeans " . $this->nombre . " " . $this->apellido .   " a sido registrad@ con Éxito";
        } else {
            $mensaje = "Disculpe no se ha podido Registrar corectamente, Vuelva a Intentarlo";
        }
        return $mensaje;
    }
    #endregion

    #region Validacion
    public function validacion()
    {
        if($this->correo2 !== null){
            if ($this->correo === $this->correo2) {
                if ($this->pass === $this->pass2) {
                    $conn = conectar();
                    mysqli_query($conn, "select usu_correo from usuarios where usu_correo='$this->correo';");
                    if (mysqli_affected_rows($conn) > 0) {
                        $mensaje = "El correo ya existe";
                    } else {
                        $mensaje = $this->registracion();
                    }
                } else {
                    $mensaje = "Las contraseñas no coinciden";
                }
            } else {
                $mensaje = "Los correos no coinciden";
            }
        } else{
            $conn = conectar();
            $select = mysqli_query($conn,"select * from usuarios where usu_correo = '$this->correo';");
            if(mysqli_affected_rows($conn) > 0){
                $datos = mysqli_fetch_assoc($select);
                if($datos['usu_pass'] == $this->pass){
                    session_start();
                    $_SESSION['id'] = $datos['usu_id'];
                    $_SESSION['nom'] = $datos['usu_nombre'];
                    $_SESSION['ape'] = $datos['usu_apellido'];
                    $_SESSION['correo'] = $datos['usu_correo'];
                    $_SESSION['tel'] = $datos['usu_tel'];
                    $_SESSION['rol'] = $datos['rol_id'];

                    header('location: index.php');
                    exit();

                } else{
                    $mensaje = "Contraseña erronea";
                }
            }else{
                $mensaje = "Correo no registrado";
            }
        }


        return $mensaje;
    }
    #endregion

    #region verificarEmail
    public static function verificarEmail($email){
        $con = conectar();

        $dato = mysqli_query($con,"select * from usuarios where usu_correo = '$email'");
        
        if(mysqli_affected_rows($con) > 0){
            $retorno = [1,mysqli_fetch_assoc($dato)['usu_correo']];
        }else{
            $retorno = [2,"El email ingresado no coincide con un usuario registrado"];
        }
        return $retorno;
    }

    #endregion

    #region envioMailRecupero
    public static function envioMailRecupero($mail){
        $numeroAleatorio = mt_rand(100000, 999999);
        $_SERVER['codVali'] = $numeroAleatorio;
        $asunto = "Recuperación de contraseña";
        $mensaje = "<div style='width:400px;height:100%;border:1px solid #3f429c;min-height:50px;background-color:rgba(115,134,204,0.4);color:white;display:flex; flex-direction:column; justify-content:center; align-items:center; gap:20px;font-family: "."'Exo 2' , sans-serif; padding:10px'>
                            <img src='../img/g12.png' style='width:60px;height:30%;'>
                            <h1 style='font-weight: 600;'>Gracias por confiar en radeans.</h1>
                            <p style='font-weight: 400;'>Se ha solicitado la recuperacion de contraseña.</p>
                            <p style='font-weight: 400;'>Si has sido tu haz click en el siguiente boton, si no has sido tu ignora este mensaje.</p>
                            <a href=' http://radeans.com.ar/recuperar.php?RC=$numeroAleatorio' style='color: #fff;font-size: 1.3rem;font-weight: 600;border: none;outline: none;background-color: #FF5D00;border: 3px solid #c74c04;border-radius: 16px;padding: 12px;cursor: pointer;text-decoration: none;'>RECUPERAR CONTRASEÑA</a>
                            <p style='font-weight: 600;'>Gracias por elegirnos.</p>
                        </div>";
        $header = "From: radeans.com.ar@gmail.com" . "\r\n";
        $header .= "Reply-To: noreply@example.com" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $envio = mail($mail, $asunto, $mensaje, $header);

        if($envio){
            $msj = 1;
        }else{
            $msj = 2;
        }

        return $msj;
    }
    #endregion

}
