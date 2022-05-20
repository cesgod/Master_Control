<?php
	session_start();
	include 'conexion.php';
	#error_reporting( error_reporting() & ~E_NOTICE );
	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}
	$status = array();
	$ASTEC_SIN_INICIAR=0;
	$DEPROP_SIN_INICIAR=0;
	$DEOM_SIN_INICIAR=0;	
	$ASTEC_EN_PROCESO=0;
	$DEPROP_EN_PROCESO=0;
	$DEOM_EN_PROCESO=0;
	$ASTEC_FINALIZADO=0;
	$DEPROP_FINALIZADO=0;
	$DEOM_FINALIZADO=0;
	$d = mysqli_query($conexion, "SELECT * FROM pd_ur ");
	  while ($t = mysqli_fetch_assoc($d)) {
	  	if ($t['ESTADO_ASTEC'] == 'SIN_INICIAR') {
	  		$ASTEC_SIN_INICIAR = $ASTEC_SIN_INICIAR+1;
	  	}elseif ($t['ESTADO_ASTEC'] == 'EN_PROCESO') {
		  	$ASTEC_EN_PROCESO = $ASTEC_EN_PROCESO+1;
	  	}elseif ($t['ESTADO_ASTEC'] == 'FINALIZADO') {
		  	$ASTEC_FINALIZADO = $ASTEC_FINALIZADO+1;
	  	}
	  	if ($t['ESTADO_DEPROP'] == 'SIN_INICIAR') {
	  		$DEPROP_SIN_INICIAR = $DEPROP_SIN_INICIAR+1;
	  	}elseif ($t['ESTADO_DEPROP'] == 'EN_PROCESO') {
		  	$DEPROP_EN_PROCESO = $DEPROP_EN_PROCESO+1;
	  	}elseif ($t['ESTADO_DEPROP'] == 'FINALIZADO') {
		  	$DEPROP_FINALIZADO = $DEPROP_FINALIZADO+1;
	  	}
	  	if ($t['ESTADO_DEOM'] == 'SIN_INICIAR') {
	  		$DEOM_SIN_INICIAR = $DEOM_SIN_INICIAR+1;
	  	}elseif ($t['ESTADO_DEOM'] == 'EN_PROCESO') {
		  	$DEOM_EN_PROCESO = $DEOM_EN_PROCESO+1;
	  	}elseif ($t['ESTADO_DEOM'] == 'FINALIZADO') {
		  	$DEOM_FINALIZADO = $DEOM_FINALIZADO+1;
	  	
		}	  
	}
	$status[0][0] = $ASTEC_SIN_INICIAR;
	$status[0][1] = $DEPROP_SIN_INICIAR;
	$status[0][2] = $DEOM_SIN_INICIAR;
	$status[1][0] = $ASTEC_EN_PROCESO;
	$status[1][1] = $DEPROP_EN_PROCESO;
	$status[1][2] = $DEOM_EN_PROCESO;
	$status[2][0] = $ASTEC_FINALIZADO;
	$status[2][1] = $DEPROP_FINALIZADO;
	$status[2][2] = $DEOM_FINALIZADO;
	$status[3][0] = 'ASTEC';
	$status[3][1] = 'DEPROP';
	$status[3][2] = 'DEOM';
	echo json_encode($status);
	#echo json_encode($valoresp);
?>