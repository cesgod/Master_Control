<?php
	session_start();
	include 'conexion.php';
	error_reporting( error_reporting() & ~E_NOTICE );
	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$data = array();
	
	$d = mysqli_query($conexion, "SELECT * FROM pd_ur ");
	  while ($t = mysqli_fetch_assoc($d)) {
	  	if ($t['PRIORIDAD'] == 'MEDIA') {
	  		$media = $media +1;
	  	}elseif ($t['PRIORIDAD'] == 'ALTA') {
		  	$alta = $alta +1;
	  	}elseif ($t['PRIORIDAD'] == 'MUY_ALTA') {
		  	$muyalta = $muyalta +1;
		}
	  }
	
	$data[0][0] = $media;
	$data[0][1] = $alta;
	$data[0][2] = $muyalta;
	$data[1][0] = 'MEDIA';
	$data[1][1] = 'ALTA';
	$data[1][2] = 'MUY ALTA';
	echo json_encode($data);
	#echo json_encode($valoresp);

?>