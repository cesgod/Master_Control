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

$pos=$_POST['position'];
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
											<table class="table">
												<thead>
													<tr>
			                                            <th class="d-none d-xl-table-cell">ID</th>
			                                            <th class="d-none d-xl-table-cell">PD</th>
			                                            <th class="d-none d-xl-table-cell">CODIGO</th>
			                                            <th class="d-none d-xl-table-cell">INFORME Nº</th>
			                                            <th class="d-none d-xl-table-cell">Potencia Nominal</th>
			                                            <th class="d-none d-xl-table-cell">Demanda Máxima</th>
			                                            <th class="d-none d-xl-table-cell">% de Carga</th>
			                                            <th class="d-none d-xl-table-cell">TimeStamp</th>
			                                            <th class="">Estado</th>
			                                            <th class="d-none d-xl-table-cell">Elaborado</th>
			                                            <th class="d-none d-xl-table-cell">Informe Nº</th>
			                                            <th class="d-none d-xl-table-cell">Fecha Entrega</th>
			                                            <th class="d-none d-md-table-cell">Observación</th>
													</tr>
												</thead>
												<tbody>
													<?php 
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
														$marginal = $t['P_MARGINAL'];
														$critical = $t['P_CRITICO'];
														$hours = $t['P_HOURS'];
													}
													#var_dump("Marginal: ",$marginal," Critico: ",$critical);
													$obs="";
													$pd_ur = array();
													$ti = mysqli_query($conexion, "SELECT * FROM pd_ur WHERE METER_NAME ='".$pos."' ");
													  while ($t = mysqli_fetch_assoc($ti)) {
													  	$pd_ur["MeterName"][] = $t['METER_NAME'];
													  	$pd_ur["Codigo"][] = $t['CODIGO'];
													  	$pd_ur["Informe"][] = $t['INFORME'];
													  	$pd_ur["Potencia Nominal"][] = $t['POTENCIA_NOMINAL'];
													  	$pd_ur["PotenciaMax"][] = $t['POTENCIA_MAX'];
													  	$pd_ur["Porcentaje"][] = $t['PORCENTAJE'];
													  	$pd_ur["TimeStamp"][] = $t['TIME_STAMP'];
													  	$pd_ur["Username"][] = $t['ELABORADO'];
													  	$pd_ur["FechaEntrega"][] = $t['FECHA_ENTREGA'];
													  	$pd_ur["Observacion"][] = $t['OBSERVACION'];
													  	$obs=$t['OBSERVACION'];
													  	$nname=$t['METER_NAME'];
													  	#echo "Metername: ".$t['METER_NAME'];
													  }									      
													#echo "<br>Data: ";echo "<pre>"; ;print_r($output);echo "</pre>";
													#die();
													$nid=0;
													$class = "";

													    $limit=count($pd_ur["MeterName"]);
														for ($i=0; $i < $limit; $i++) { 
															$nid=$i+1;
															if (floatval($pd_ur["Porcentaje"][$i])>=$marginal and  floatval($pd_ur["Porcentaje"][$i])<$critical){
																$class =  'class="table-warning"';
															}elseif (floatval($pd_ur["Porcentaje"][$i])>=$critical) {
																$class =  'class="table-danger"';
															}
															echo '
																	<tr '.$class.'>
																		<td class="d-none d-md-table-cell">'.$nid.'</td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["MeterName"][$i].'</td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["Codigo"][$i].'</td>
																		<td class="d-none d-md-table-cell"><a href="informes/'.$pd_ur["Informe"][$i].'.pdf" target="_blank">'.$pd_ur["Informe"][$i].'</a></td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["Potencia Nominal"][$i].'</td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["PotenciaMax"][$i].'</td>
																		<td class="d-none d-md-table-cell">'.intval($pd_ur["Porcentaje"][$i]).'%</td>
																		<td class="d-none d-xl-table-cell">'.$pd_ur["TimeStamp"][$i].'</td>';
																		#$cat= rand(1,3);
																		if (floatval($pd_ur["Porcentaje"][$i])>=$marginal and  floatval($pd_ur["Porcentaje"][$i])<$critical){
																			echo '<td><span class="btn btn-square btn-warning">Marginal</span></td>';
																		}elseif (floatval($pd_ur["Porcentaje"][$i])>$critical) {
																			echo '<td><span class="btn btn-square btn-danger">Crítico</span></td>';
																		}
																		
																		echo '

																		<td class="d-none d-md-table-cell">'.$pd_ur["Username"][$i].'</td>
																		<td class="d-none d-md-table-cell"><a href="informes/'.$pd_ur["Informe"][$i].'.pdf" target="_blank">'.$pd_ur["Informe"][$i].'</a></td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["FechaEntrega"][$i].'</td>
																		<td class="d-none d-md-table-cell">'.$pd_ur["Observacion"][$i].'</td>
																		
																		';
														}

													 ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>	
								<div class="card-body">
									<form action="up_file.php" method="POST" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Observación</label><br>
											<textarea name="observacion" style="width: 500px;"><?php echo $obs;?></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Nombre del Informe</label>
											<input type="text" name="filename" class="form-control" placeholder="Informe" pattern="[^()/><\][\\\x22,;|]+" style="width: 500px;">
										</div>
										<div class="mb-3">
											<input type="hidden" value="<?php echo $nname;?>" name="position">
											<label class="form-label w-100">Cargar Informe</label>
											<input type="file" name="file" size="100">
											<small class="form-text text-muted">Seleccione el archivo.</small>
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