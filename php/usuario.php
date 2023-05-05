<?php 
$servername="";
$username="root";
$password="";
$dbname="";

$conn=mysqli_connect($servername,$username,$password,$dbname)or die ("No se pudo conectar a la $bd");



?>

<?php
Class Usuarios {

private $id;
private $nombre;
private $apellido;
private $correo;
private $tel;
private $pass;
private $rol;

public __construct($id,$nomb,$ape,$correo,$tel,$pass,$rol){
$this->id=$id;
$this->nombre=$nomb;
$this->apellido=$ape;
$this->correo=$correo;
$this->tel=$tel;
$this->pass=$pass;
$this->rol=$rol;

}

public function registracion(){

$consulta=" insert into usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,usu_rol) values ('$this->nombre','$this->apellido','$this->correo','$this->tel','$this->pass',$this->rol);";

mysqli_query($conn,$consulta);



}






}


?>