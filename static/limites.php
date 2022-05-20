<?php 
#phpinfo();
#die();
session_start();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$pd_ur = array();
$ti = mysqli_query($conexion, "SELECT * FROM potencia_lim ");
  while ($t = mysqli_fetch_assoc($ti)) {
  	$pd_ur["MARGINAL"] = $t['P_MARGINAL'];
  	$pd_ur["CRITICO"] = $t['P_CRITICO'];
  	$pd_ur["HOURS"] = $t['P_HOURS'];
  	#echo "Metername: ".$t['METER_NAME'];
  }
#echo "<br>";echo "<pre>"; ;print_r($pd_ur);echo "</pre>";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>:: CLYFSA :: DASHBOARD | LIMITES</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
		          <span class="align-middle">CLYFSA</span>
		        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Map
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="mod.php">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">PD</span>
			            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="limites.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Límites</span>
			            </a>
					</li>
					
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>

				
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
			                	<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $_SESSION['username']; ?></span>
			              	</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="../src/php/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Límites</h1>

					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Límites de Potencia</h5>
							<!--<h6 class="card-subtitle text-muted">MARGINAL | CRÍTICO</h6>-->
						</div>
						<div class="card-body">
							<form action="change_limit.php" method="POST">

							<div class="row d-none d-xxl-flex">
								<div class="col-md-3 text-center">
									<div class="card bg-light py-2 py-md-3 border">
										<div class="card-body btn btn-warning">
											MARGINAL<br>
											<input type="number" name="marginal" class="col-md-1 text-center" style="width: 80px;" value="<?php echo $pd_ur['MARGINAL']; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="card bg-light py-2 py-md-3 border">
										<div class="card-body btn btn-danger">
											CRÍTICO<br>
											<input type="number" name="critico" class="col-md-1 text-center" style="width: 80px;" value="<?php echo $pd_ur['CRITICO']; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="card bg-light py-2 py-md-3 border">
										<div class="card-body btn btn-primary">
											HORAS<br>
											<input type="number" name="hours" class="col-md-1 text-center" style="width: 80px;" value="<?php echo $pd_ur['HOURS']; ?>">
										</div>
									</div>
								</div>
								
							</div>
							<!-- /.row -->
							<div class="row d-none d-xxl-flex">
								<div class="col-md-3 text-center">
									
										<div class="card-body">
											
										</div>
									
								</div>
								<div class="col-md-3 text-center">
									
										<div class="card-body">
											<button type="submit" class="btn btn-pill btn-secondary"><h3 style="color: #ffffff; margin: 10px;">Actualizar</h3></button>
										</div>
									
								</div>
								<div class="col-md-3 text-center">
									
										<div class="card-body">
											
										</div>
									
								</div>
								
							</div>
							</form>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>CLYFSA</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>
<script>
if(document.getElementById('ftnt_topbar_script')) {
    document.getElementById('ftnt_topbar_script').remove()
} else {
   var pluginHolder = document.createElement('div');
   document.body.appendChild(pluginHolder);
}