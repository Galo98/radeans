<?php 

function conectar(){
$servername="localhost";
$username="root";
$password="4216"; /* Cambiar antes de comitear */
$dbname="radeans";

$conn=mysqli_connect($servername,$username,$password,$dbname)or die ("No se pudo conectar a la $dbname");

return $conn;
}

?>