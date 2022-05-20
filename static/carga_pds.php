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
$ti = mysqli_query($conexion, "SELECT * FROM pd_ur ");
  while ($t = mysqli_fetch_assoc($ti)) {
  	$pd_ur[] = $t['METER_NAME'];
  	#echo "Metername: ".$t['METER_NAME'];
  }
$p = mysqli_query($conexion, "SELECT * FROM potencia_lim ");
  while ($t = mysqli_fetch_assoc($p)) {
  	$marg = $t['P_MARGINAL'];
  	$crit = $t['P_CRITICO'];
  	$hr = $t['P_HOURS'];
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

	<title>:: CLYFSA :: DASHBOARD | CARGA DE PDs</title>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	

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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="mod.php">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">PD</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="limites.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Límites</span>
			            </a>
					</li>
					
				</ul>

				<!--<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components? Check out our premium version.
						</div>
						<a href="https://adminkit.io/pricing" target="_blank" class="btn btn-primary btn-block">Upgrade to Pro</a>
					</div>
				</div>-->
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

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Seguimiento de PDs</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">CLYFSA</a></li>
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">Seguimiento de PDs</li>
								</ol>
							</nav>
						</div>
						<div>
							<form action="mod.php" method="POST">
								<input type="date" name="date" required>
								<button type="submit" class="btn btn-info" >ACTUALIZAR FECHA</button>
							</form>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Sales</h5>
												<h1 class="mt-1 mb-3">2.382</h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Visitors</h5>
												<h1 class="mt-1 mb-3">14.212</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Earnings</h5>
												<h1 class="mt-1 mb-3">$21.300</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Orders</h5>
												<h1 class="mt-1 mb-3">64</h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-right">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-right">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-right">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>-->

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								
								<table class="table table-hover my-0" id="table_id">
									<thead>
										<tr>
											<th class="d-none d-xl-table-cell">ID</th>
                                            <th class="d-none d-xl-table-cell">PD</th>
                                            <th class="d-none d-xl-table-cell">CODIGO</th>
                                            <th class="d-none d-xl-table-cell">Potencia Nominal</th>
                                            <th class="d-none d-xl-table-cell">Demanda Máxima</th>
                                            <th class="d-none d-xl-table-cell">% de Carga</th>
                                            <th class="d-none d-xl-table-cell">TimeStamp</th>
                                            <th class="">Nivel</th>
                                       
                                            <th class="d-none d-md-table-cell">Cargar</th>

										
										</tr>
									</thead>
									<tbody>

										<?php 
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
										$nid=0;
										$class = "";
										if(empty($output["MeterName"])){
										    $limit=0;
										}else{
											$limit=count($output["MeterName"]);
										}
										$pdlim = count($pd_ur);
										#echo "<br>LimitDB: ".$pdlim."<br>";
										#echo "<br>LimitJson: ".$limit."<br>";
										$otg=0;
									
											for ($i=0; $i < $limit; $i++) { 	
												foreach ($pd_ur as $value)
												{
												    // strpos can return 0 as a first matched position, 0 == false but !== false
												    if (strpos($output["MeterName"][$i], $value) !== false)
												    {
												        $otg=1;
												        #echo "<br>First: ".$output["MeterName"][$i];
												        #echo "<br>Second: ".$value;
												    }
												} 
												#for ($j=0; $j < $pdlim; $j++) { 
												if ($otg != 1){
													$nid=$i+1;
													if (floatval($output["Porcentaje"][$i])>=$marg and  floatval($output["Porcentaje"][$i])<=$crit){
														$class =  'class="table-warning"';
													}elseif (floatval($output["Porcentaje"][$i])>$crit) {
														$class =  'class="table-danger"';
													}
													echo '
															<tr '.$class.'>
																<td class="d-none d-md-table-cell">'.$nid.'</td>
																<td class="d-none d-md-table-cell">'.$output["MeterName"][$i].'</td>
																<td class="d-none d-md-table-cell">'.$output["Codigo"][$i].'</td>
																<td class="d-none d-md-table-cell">'.$output["Potencia Nominal"][$i].'</td>
																<td class="d-none d-md-table-cell">'.$output["PotenciaMax"][$i].'</td>
																<td class="d-none d-md-table-cell">'.intval($output["Porcentaje"][$i]).'%</td>
																<td class="d-none d-xl-table-cell">'.$output["TimeStamp"][$i].'</td>';
																#$cat= rand(1,3);
																if (floatval($output["Porcentaje"][$i])>=$marg and  floatval($output["Porcentaje"][$i])<=$crit){
																	echo '<td><span class="btn btn-square btn-warning">Marginal</span></td>';
																}elseif (floatval($output["Porcentaje"][$i])>$crit) {
																	echo '<td><span class="btn btn-square btn-danger">Crítico</span></td>';
																} else{
																	echo '<td><span class="btn btn-square btn-danger"> </span></td>';
																}
																
																echo '																	
																<td class="d-none d-xl-table-cell">
																	<form action="uploadnew.php" method="POST">
																		<input type="hidden" value="'.$output["MeterName"][$i].'" name="position">
																		<button type="submit" class="btn btn-success">Cargar</button>
																	</form>	
																</td>
															
																';
												}
												echo "</tr>";
												$otg=0;	
												#}
											}

										 ?>
										
									
									</tbody>
								</table>
								
							</div>
						</div>
						
						<!--<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>-->
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
	
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
     <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

     <script>
         $(document).ready(function() {
            $('#table_id').DataTable( {
            	"scrollX": false,
				"iDisplayLength": 20,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
     </script>

    

</body>

</html>
<script>
if(document.getElementById('ftnt_topbar_script')) {
    document.getElementById('ftnt_topbar_script').remove()
} else {
   var pluginHolder = document.createElement('div');
   document.body.appendChild(pluginHolder);
}