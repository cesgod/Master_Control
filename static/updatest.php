<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
#$status = array();
#$name   = $_POST['status']; // ID

foreach($_POST['status'] as $name) {
	#echo $name;
    $upda = "UPDATE planos_single SET STATUS = 'SOLVED' WHERE NAME ='".$name."'  ";
	mysqli_query($conexion, $upda);
}






header('Location: deom-review.php');
 ?>