<?php 

function conectar(){
$servername="localhost";
$username="root";
$password="1234"; /* Cambiar antes de comitear */
$dbname="radeans";

$conn=mysqli_connect($servername,$username,$password,$dbname)or die ("No se pudo conectar a la $dbname");

return $conn;
}

?>