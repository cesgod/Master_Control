<?php
	session_start();

?>
<?php 
#phpinfo();
#die();
include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

#$pos=$_POST['position'];
$pd_ur = array();

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

	<title>:: CLYFSA :: DASHBOARD | CARGA DE PDs</title>

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
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="carga_pds.php">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">PD</span>
			            </a>
					</li>

					<li class="sidebar-item">
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

					<h1 class="h3 mb-3">Carga de PDs</h1>

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Carga de datos de PD</h5>
									<h6 class="card-subtitle text-muted">Detalles</h6>
								</div>
								<div class="row">
									<div class="col-12 col-xl-12">
										<div class="card">
											
										</div>
									</div>
								</div>	
								<div class="card-body">
									<form action="up_file_manual.php" method="POST" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">PD</label>
											<input type="text" name="pd" class="form-control" placeholder="PD" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<label class="form-label">CODIGO</label>
											<input type="text" name="codigo" class="form-control" placeholder="CODIGO" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<label class="form-label">POTENCIA NOMINAL</label>
											<input type="number" name="pnominal" class="form-control" placeholder="POTENCIA NOMINAL" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<label class="form-label">DEMANDA MAXIMA</label>
											<input type="number" name="dmaxima" class="form-control" placeholder="DEMANDDA MAXIMA" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<label class="form-label">% DE CARGA</label>
											<input type="text" name="pdecarga" class="form-control" placeholder="% DE CARGA" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<label class="form-label">OBSERVACION</label><br>
											<textarea name="observacion" style="width: 500px;"></textarea>
										</div>
										
										
										<button type="submit" class="btn btn-primary">Enviar</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.php" class="text-muted"><strong>CLYFSA</strong></a> &copy;
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