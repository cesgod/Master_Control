
<?php
include '../../static/conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
session_destroy();
mysqli_close($conexion); 
header('Location: ../../static/login.php');
?>