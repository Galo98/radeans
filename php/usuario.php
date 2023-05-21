<?php 
function conectar(){
$servername="localhost";  // cual ?
$username="root";
$password="";
$dbname="radeans";

$conn=mysqli_connect($servername,$username,$password,$dbname)or die ("No se pudo conectar a la $bdname");

return $conn;
}

?>

<?php
Class Usuarios{

private $id;
private $nombre;
private $apellido;
private $correo;
private $correo2;
private $tel;
private $pass;
private $pass2;
private $rol;

public function __construct($id,$nomb,$ape,$correo,$correo2,$tel,$pass,$pass2,$rol){
$this->id=$id;
$this->nombre=$nomb;
$this->apellido=$ape;
$this->correo=$correo;
$this->correo2=$correo2;
$this->tel=$tel;
$this->pass=$pass;
$this->pass2=$pass2;
$this->rol=$rol;

}

public function registracion(){

    $mensaje="";

$consulta=" INSERT INTO usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,usu_rol) values ('$this->nombre','$this->apellido','$this->correo','$this->tel','$this->pass',$this->rol);";


$conexion=conectar();

mysqli_query($conexion,$consulta);

if (mysqli_affected_row($conexion)>0){

    $mensaje="Hola Bienvenida a Radeans".$this->nombre."  ".$this->apellido."  "."a sido Registrada con Éxito";

}
else{
    $mensaje= "Disculpe no se ha podido Registrar corectamente,Vuelva a Intentarlo";
}
return $mensaje;

}

public function validacion(){

    if ($this->correo === $this->correo2){

if( $this->pass === $this->pass2){
    $conn=conectar();
   mysqli_query( $conn,"select usu_correo from usuarios where usu_correo='$this->correo';");
   if (mysqli_affected_row($conn)>0){

    $mensaje="El correo ya existe";
}
else{
    $mensaje= $this->registracion();
}

}

    }
    else{
        echo "Los correos no coinciden";
    }
}






}


