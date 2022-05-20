<?php
session_start();
include 'conexion.php';
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
$path = "planos/".$_POST['position'];
$pos   = $_POST['position']; // ID
$obs = $_POST['observacion'];
function makeDir($path)
{
     $ret = mkdir($path); // use @mkdir if you want to suppress warnings/errors
     return $ret === true || is_dir($path);
     echo "string";
}
makeDir($path);


 
// Count total files
$fileCount = count($_FILES['upload']['name']);

// Iterate through the files
for($i = 0; $i < $fileCount; $i++){

   $file = $_FILES['upload']['name'][$i];

   // Upload file to $path
   move_uploaded_file($_FILES['upload']['tmp_name'][$i], $path."/".$file);
   $insertnp = "INSERT INTO `planos_single` (`ID`,`METER_NAME`, `NAME`, `STATUS`) VALUES (NULL, '".$pos."', '".$file."', 'UNSOLVED')";
   mysqli_query($conexion, $insertnp);

}

$upda = "UPDATE pd_ur SET PLANO = '".$pos."', OBSERVACION_DEPROP = '".$obs."', DEPARTAMENTO = 'DEPROP', ESTADO_DEOM = 'SIN_INICIAR', ESTADO_DEPROP = 'FINALIZADO', ELABORADO_DEPROP = '".$_SESSION['username']."' WHERE METER_NAME ='".$pos."'  ";
      mysqli_query($conexion, $upda);
echo "Upload complete";
#$path    = './';
$file="";
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
  echo "<a href='$path/$file'>$file</a>";
}
header('Location: deprop-review.php');
?>
