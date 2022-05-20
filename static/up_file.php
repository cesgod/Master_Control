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
  	$informes[] = $t['INFORME'];
  	
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
$destination  = "informes/{$basename}";


$limitf = count($informes);
for ($i=0; $i < $limitf; $i++) { 
	if ($informes[$i] == $filename) {
		$upda = "UPDATE pd_ur SET INFORME = '".$filename."', OBSERVACION = '".$obs."', DEPARTAMENTO = 'ASTEC', ESTADO_ASTEC = 'FINALIZADO', ESTADO_DEPROP = 'SIN_INICIAR' WHERE METER_NAME ='".$pos."'  ";
		mysqli_query($conexion, $upda);
		echo "Name already exist<br>";
	}else{
		move_uploaded_file( $source, $destination );
		$upda = "UPDATE pd_ur SET INFORME = '".$filename."', OBSERVACION = '".$obs."', DEPARTAMENTO = 'ASTEC', ESTADO_ASTEC = 'FINALIZADO', ESTADO_DEPROP = 'SIN_INICIAR' WHERE METER_NAME ='".$pos."'  ";
		mysqli_query($conexion, $upda);
		echo "Stored in: {$destination}";
	}
}
/* move the file */




header('Location: index.php')
 ?>