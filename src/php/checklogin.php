
<?php
session_start();
?>

<?php

include '../../static/conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$userid = $_POST['userid'];
$password = $_POST['password'];
$password = hash('sha256', $password);
 
$sql = "SELECT * FROM $tbl_name WHERE USERID = '$userid'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
if ($password==$row['PASSWORD']) { 

 
    $_SESSION['loggedin'] = true;
    $_SESSION['userid'] = $userid;
    $_SESSION['lvl'] = $row['LVL'];
    $_SESSION['start'] = time();
    $_SESSION['username'] =  $row['USERNAME'];
    $_SESSION['expire'] = $_SESSION['start'] + (20 * 6000);

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=inicio.php>Panel de Control</a>"; 
    
    if ($_SESSION['lvl']=='0') {
      #$_SESSION["database"]="asdf";
      header('Location: ../../static/index.php');
    }elseif ($_SESSION['lvl']=='1') {
      #$_SESSION["database"]="thedash";
      header('Location: ../../static/carga_pds.php');
     }elseif ($_SESSION['lvl']=='2') {
      #$_SESSION["database"]="thedash";
      header('Location: ../../static/deprop-review.php');
    }elseif ($_SESSION['lvl']=='3') {
      #$_SESSION["database"]="thedash";
      header('Location: ../../static/deom-review.php');
    }elseif ($_SESSION['lvl']=='4') {
      #$_SESSION["database"]="thedash";
      header('Location: ../../static/fiscal-review.php');
    }elseif ($_SESSION['username']=='30880140' or $_SESSION['username']=='30880358') {
      $_SESSION["database"]="private";
      header('Location: ../../examples/valuespb.php');
    } elseif ($_SESSION['username']=='ocampos') {
      $_SESSION["database"]="ocampos_dia";
      header('Location: ../../examples/values_o.php');
    } elseif ($_SESSION['username']<>'clyfsa' and $_SESSION['username']<>'30880306') {
      $_SESSION["database"]="asdf";
      header('Location: ../../examples/valuesb.php');
    }
  }else { 
    header('Location: ../../static/login.php');//redirecciona a la pagina del usuario
   }
 mysqli_close($conexion); 
 ?>