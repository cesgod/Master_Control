<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}



/* create new name file */

$pd   = $_POST['pd']; // ID
$codigo   = $_POST['codigo']; // observacion
$pnominal   = $_POST['pnominal']; // observacion
$dmaxima   = $_POST['dmaxima']; // observacion
$pdecarga   = $_POST['pdecarga']; // observacion
$obs   = $_POST['observacion']; // informe
$uname=$_SESSION['username'];
$ndate= date('Y/m/d');


$upda = "INSERT INTO `pd_ur` (`ID`, `CODIGO`, `METER_NAME`, `PORCENTAJE`, `POTENCIA_NOMINAL`, `POTENCIA_MAX`, `TIME_STAMP`, `ELABORADO`, `INFORME`, `FECHA_ENTREGA`, `OBSERVACION`, `DEPARTAMENTO`, `ESTADO_ASTEC`, `ESTADO_DEPROP`, `ESTADO_DEOM`, `ESTADO_FINAL`, `PLANO`, `ELABORADO_DEPROP`, `TIME_STAMP_DEPROP`, `OBSERVACION_DEPROP`,`PRIORIDAD`) VALUES (NULL, '".$codigo."', '".$pd."', '".$pdecarga."', '".$pnominal."', '".$dmaxima."', '', '".$uname."', '', '".$ndate."', '".$obs."', 'ASTEC', 'SIN_INICIAR', '', '', '', '', '', '', '', 'MEDIA')";
mysqli_query($conexion, $upda);
$insertnp = "INSERT INTO `planos` (`ID`,`DIR`, `METER`, `TIME_STAMP`) VALUES (NULL, '".$pd."', '".$pd."', '".$ndate."')";
mysqli_query($conexion, $insertnp);
echo "Name already exist<br>";
	
/* move the file */




header('Location: index.php')
 ?>