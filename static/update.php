<?php

$date=$_POST['date'];
$date=date('Y-m-d', strtotime('-1 day', strtotime($date)));
$time = strtotime($date);

$time = date('Y-m-d',$time);
echo "Time: ". $time;
header('Location: carga_pds.php');

?>