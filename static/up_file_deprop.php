<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$informes = array();
$ti = mysqli_query($conexion, "SELECT * FROM pd_ur ");
  while ($t = mysqli_fetch_assoc($ti)) {
  	$informes[] = $t['PLANO'];
  	
  	#echo "Metername: ".$t['METER_NAME'];
  }
#echo "<br>";echo "<pre>"; ;print_r($pd_ur);echo "</pre>";
 ?>
<?php

/* create new name file */

$pos   = $_POST['position']; // ID
$filename   = $_POST['filename']; // observacion
$obs   = $_POST['observacion']; // informe
$extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["file"]["tmp_name"];
$destination  = "planos/{$basename}";


$limitf = count($informes);
for ($i=0; $i < $limitf; $i++) { 
	if ($informes[$i] == $filename) {
		$upda = "UPDATE pd_ur SET PLANO = '".$filename."', OBSERVACION_DEPROP = '".$obs."', DEPARTAMENTO = 'DEPROP', ESTADO_DEOM = 'SIN_INICIAR', ESTADO_DEPROP = 'FINALIZADO', ELABORADO_DEPROP = '".$_SESSION['username']."' WHERE METER_NAME ='".$pos."'  ";
		mysqli_query($conexion, $upda);
		echo "Name already exist<br>";
	}else{
		move_uploaded_file( $source, $destination );
		$upda = "UPDATE pd_ur SET PLANO = '".$filename."', OBSERVACION_DEPROP = '".$obs."', DEPARTAMENTO = 'DEPROP', ESTADO_DEOM = 'SIN_INICIAR', ESTADO_DEPROP = 'FINALIZADO', ELABORADO_DEPROP = '".$_SESSION['username']."' WHERE METER_NAME ='".$pos."'  ";
		mysqli_query($conexion, $upda);
		echo "Stored in: {$destination}";
	}
}
/* move the file */



header('Location: deprop-review.php')
 ?>