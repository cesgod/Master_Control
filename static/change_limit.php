<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


$marginal = $_POST['marginal'];
$critico = $_POST['critico'];
$hours = $_POST['hours'];

#echo "<br>";echo "<pre>"; ;print_r($pd_ur);echo "</pre>";



$upda = "UPDATE potencia_lim SET P_MARGINAL = '".$marginal."', P_CRITICO = '".$critico."', P_HOURS = '".$hours."'  ";
mysqli_query($conexion, $upda);
echo "Name already exist<br>";

/* move the file */




header('Location: limites.php')
 ?>