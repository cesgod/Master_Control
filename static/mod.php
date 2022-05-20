<?php 
#phpinfo();
#die();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$marginal 	= 0;
$critical 	= 0;
$hours		= 0;
$ti = mysqli_query($conexion, "SELECT * FROM potencia_lim ");
  while ($t = mysqli_fetch_assoc($ti)) {
  	$marginal = $t['P_MARGINAL']/100;
  	$critical = $t['P_CRITICO']/100;
  	$hours = $t['P_HOURS'];
  }


ini_set('max_execution_time', '600');
error_reporting(E_ALL ^ E_NOTICE); 
if (isset($_POST['date'])) {
	$date = array();
	$date=$_POST['date'];
	$date=date('Y-m-d', strtotime('-1 day', strtotime($date)));
	$time = strtotime($date);

	$time = date('Y-m-d',$time);
	#echo "Time: ". $time;
	$ntime = array();
	$ntime ['Ntime']  = $time;
	
	#$fp = fopen('/var/www/html/virtualenvs/Cl/soap/datepd.json', 'w');
	$fp = fopen('datepd.json', 'w');
	fwrite($fp, json_encode($ntime));
	fclose($fp);
	#die();
	
	$command = escapeshellcmd('/var/www/html/app/static/back/sobrecargapd.py');
	$output = shell_exec($command);

}

$stringvs = file_get_contents("/var/www/html/app/static/back/sobrecargapd.json");

				    
if ($stringvs === false) {
  echo "No content<br>";
}

$outputs = json_decode($stringvs, true);
if ($outputs === null) {
    // deal with error...
  echo "Parse error<br>";
}
$max01=0;
$maxts1=0;
$cont=0;
$a=0;
#print_r($outputs);
$myArrays[$a] = $outputs;
$limitt = count($myArrays[0][0]);
$limit = count($myArrays[0]);
$limits = count($myArrays[0][0]['Potencia']);
#echo "Limit 1: ".$limitt;
#echo "<br>Limit 2: ".$limit;
#echo "<br>Limit 3: ".$limits;
#echo "<br>Hours: ".$hours;
#echo "<br>Limit II: ".$limits;
#echo "<br>Limit III: ".$limitt;
#echo "<pre>"; print_r($myArrays);echo "</pre>";
#die();
$hcont=0;
$dib=0;
$dwhd=0;
$tcont=0;
$arrayn=array();
$arraydates=array();
$pmax=0;
$timemax="";
$percent = 0;
$diast = ($limits/2)/96;
for ($i=0; $i < $limit; $i++) { 
	$arrayn['P_Nominal'][] = intval($myArrays[0][$i]['Potencia Nominal']);
#echo $myArrays[0][$i]." - ";
	#$pmax=floatval($myArrays[0][$i]['Potencia'][1]);
	$limits = count($myArrays[0][$i]['Potencia']);
	for ($j=1; $j < $limits; $j+=2) { 
		
		#if ($j%2 != 0) {
		#$j=$j+1;	
			#echo "Potencia Position: ".$j."<br>";
			$asdf=$j%2;
			$tcont=$tcont+1;
			$carga = floatval($myArrays[0][$i]['Potencia'][$j]);
			#echo "Value: ".$carga."<br>";
			if ($carga > (intval($myArrays[0][$i]['Potencia Nominal'])* $critical) ) {
				#$percentc = (intval($carga)*100);
				$div=intval($myArrays[0][$i]['Potencia Nominal']);
				#$percentc = ($percent / $div);
				$hcontc=$hcontc+1;
				#$arraydates["Carga"][] = $carga." - ".$myArrays[0][$i]['Potencia'][$j-1];
				if ($carga>$pmax) {
					$pmax=$carga;
					#print("Carga: ".$carga."<br>");
					#print("Maxima: ".$pmax."<br>");
					$timemax=$myArrays[0][$i]['Potencia'][$j-1];
				}
				
				#$arraydates["Porcentaje"][] = $myArrays[0][$i]['MeterName']." - ".$percent."% - ".intval($myArrays[0][$i]['Potencia Nominal'])." - ".floatval($myArrays[0][$i]['Potencia'][$j])." - ".$myArrays[0][$i]['Potencia'][$j-1];
				#echo "<br>Cont: ".$hcont."<br>";	
				#echo "Position II: ".$j."<br>";
				
			} elseif ($carga > (intval($myArrays[0][$i]['Potencia Nominal'])* $marginal) ) {
				$percent = (intval($carga)*100);
				$div=intval($myArrays[0][$i]['Potencia Nominal']);
				$percent = ($percent / $div);
				$hcont=$hcont+1;
				#$arraydates["Carga"][] = $carga." - ".$myArrays[0][$i]['Potencia'][$j-1];
				if ($carga>$pmax) {
					$pmax=$carga;
					#print("Carga: ".$carga."<br>");
					#print("Maxima: ".$pmax."<br>");
					$timemax=$myArrays[0][$i]['Potencia'][$j-1];
				}
				
				#$arraydates["Porcentaje"][] = $myArrays[0][$i]['MeterName']." - ".$percent."% - ".intval($myArrays[0][$i]['Potencia Nominal'])." - ".floatval($myArrays[0][$i]['Potencia'][$j])." - ".$myArrays[0][$i]['Potencia'][$j-1];
				#echo "<br>Cont: ".$hcont."<br>";	
				#echo "Position II: ".$j."<br>";
				
			}
			if ($tcont>=96) {
				$dib=$dib+1;
				$tcont=0;
				
			#$newdate= strtotime($myArrays[0][$i]);
			#$newdate= gmdate("d-m-Y H:i",$newdate);
			#$arrayn['date'][] = $myArrays[0][$i];
			#$cont=$cont+1;
		#echo " - ".$newdate." - ";	
		#}
		
		}	
		
	}
	if (($hcontc/4)>=$hours) {
		$dwhd=$dwhd+1;
		
		$arraydates["MeterName"][] = $myArrays[0][$i]['MeterName'];
		$arraydates["Codigo"][] = $myArrays[0][$i]['Codigo'];
		$arraydates["Potencia Nominal"][] = $myArrays[0][$i]['Potencia Nominal'];
		$percent = intval($pmax*100/intval($myArrays[0][$i]['Potencia Nominal']));
		#echo ("<br>".($pmax*100)."<br>");
		$arraydates["Porcentaje"][] = $percent;
		$arraydates["TimeStamp"][] = $timemax;
		$arraydates["PotenciaMax"][] = $pmax;
		$arraydates["Horas"][] = $hcontc;
		#$arraydates["hours"][] = $hcont;
		$hcont=0;
		
	}elseif (($hcont/4)>=$hours) {
		$dwhd=$dwhd+1;
		
		$arraydates["MeterName"][] = $myArrays[0][$i]['MeterName'];
		$arraydates["Codigo"][] = $myArrays[0][$i]['Codigo'];
		$arraydates["Potencia Nominal"][] = $myArrays[0][$i]['Potencia Nominal'];
		$percent = intval($pmax*100/intval($myArrays[0][$i]['Potencia Nominal']));
		#echo ("<br>".($pmax*100)."<br>");
		$arraydates["Porcentaje"][] = $percent;
		$arraydates["TimeStamp"][] = $timemax;
		$arraydates["PotenciaMax"][] = $pmax;
		$arraydates["Horas"][] = $hcont;
		#$arraydates["hours"][] = $hcont;
		$hcont=0;
	}
	$pmax=0;
	$hcontc=0;
	$hcont=0;
	#$arrayn["Meter"] => $myArrays[0][$i]['MeterName'];
	#$arrayn["dwhd"] => $dwhd;
	  $arrayn['MeterName'][] = $myArrays[0][$i]['MeterName'];
	  $arrayn['Potencia'][] = $dwhd;

	  #$dwhd = 0;
  
#die();	
#}else {
#	$arrayn['data'][] = $myArrays[0][$i];
#	if ($myArrays[0][$i]>$max01) {
#		$max01 = $myArrays[0][$i];
#		$i=$i-1;
#		$maxts1 = $myArrays[0][$i];
#		$i=$i+1;
#	}
#	$cont=0;
#}
}
#echo "<br>Days: ".$diast;
#echo "<br>Data: ";echo "<pre>"; ;print_r($arrayn);echo "</pre>";
#echo "<br>Data: ";echo "<pre>"; ;print_r($arraydates);echo "</pre>";
#echo "<br>Days whd: ".$dwhd;

$fp = fopen('pds.json', 'w');
	fwrite($fp, json_encode($arraydates));
	fclose($fp);

#die();
header('Location: carga_pds.php')
 ?>