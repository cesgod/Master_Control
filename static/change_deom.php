<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


#$prioridad = $_POST['prioridad'];
$metername = $_POST['metername'];
$estado_proc = $_POST["estado_proc"];

echo "Meter: ".$metername;
echo "Prioridad: ".$estado_proc;
#die();

#echo "<br>";echo "<pre>"; ;print_r($pd_ur);echo "</pre>";



$upda = "UPDATE pd_ur SET ESTADO_DEOM = '".$estado_proc."' WHERE METER_NAME = '".$metername."' ";
mysqli_query($conexion, $upda);
echo "Name already exist<br>";

/* move the file */




header('Location: deom-review.php')
 ?>