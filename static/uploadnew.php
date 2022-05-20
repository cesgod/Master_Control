<?php 
session_start();
date_default_timezone_set('America/Santiago');
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
$stringv = file_get_contents("pds.json");

    if ($stringv === false) {
      echo "No content<br>";
    }

$output = json_decode($stringv, true);
    if ($output === null) {
        // deal with error...
      echo "Parse error<br>";
    }
      
#echo "<br>Data: ";echo "<pre>"; ;print_r($output);echo "</pre>";
#die();
$uname=$_SESSION['username'];
$ndate= date('Y/m/d');
$pos=$_POST['position'];
echo "Name: ".$pos;



$nid=0;
$ncod="";
$nmetername="";
$nporcentaje="";
$nnominal="";
$nmax="";
$nts="";
$limit=count($output["MeterName"]);


	for ($i=0; $i < $limit; $i++) { 
		if ($pos == $output["MeterName"][$i]){
			$ncod = $output["Codigo"][$i];
			$nmetername = $output["MeterName"][$i];
			$nporcentaje = $output["Porcentaje"][$i];
			$nnominal = $output["Potencia Nominal"][$i];
			$nmax = $output["PotenciaMax"][$i];
			$nts = $output["TimeStamp"][$i];
		}
	}


#phpinfo();
#die();

echo "-".$ncod."-".$nmetername."-".$nporcentaje."-".$nnominal."-".$nmax."-".$nts."-".$uname."-".$ndate;
#die();
$insertnr = "INSERT INTO `pd_ur` (`ID`,`CODIGO`, `METER_NAME`, `PORCENTAJE`, `POTENCIA_NOMINAL`, `POTENCIA_MAX`, `TIME_STAMP`, `ELABORADO`, `INFORME`, `FECHA_ENTREGA`, `OBSERVACION`, `DEPARTAMENTO`, `ESTADO_ASTEC` , `ESTADO_DEPROP`, `PLANO`, `ELABORADO_DEPROP`, `TIME_STAMP_DEPROP`, `OBSERVACION_DEPROP`, `PRIORIDAD`, `ESTADO_DEOM`, `ESTADO_FINAL`) VALUES (NULL, '".$ncod."', '".$nmetername."', '".$nporcentaje."', '".$nnominal."', '".$nmax."', '".$nts."', '".$uname."', '', '".$ndate."', '','', 'SIN_INICIAR','', '', '', '', '', 'MEDIA', '', '')";
mysqli_query($conexion, $insertnr);
#echo "<br>";echo "<pre>"; ;print_r($pd_ur);echo "</pre>";
$insertnp = "INSERT INTO `planos` (`ID`,`DIR`, `METER`, `TIME_STAMP`) VALUES (NULL, '".$nmetername."', '".$nmetername."', '".$ndate."')";
mysqli_query($conexion, $insertnp);
#die();
header('Location: index.php');

 ?>