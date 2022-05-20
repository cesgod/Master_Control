<?php
	session_start();
	include 'conexion.php';

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}


	$p = mysqli_query($conexion, "SELECT * FROM potencia_lim ");
	  while ($t = mysqli_fetch_assoc($p)) {
	  	$marg = $t['P_MARGINAL'];
	  	$crit = $t['P_CRITICO'];
	  	$hr = $t['P_HOURS'];
	  }

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

	<title>:: CLYFSA :: DASHBOARD | PDs</title>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<style type="text/css">
  		.ALTA{
  			--bs-table-bg:  #d48311;
  			color: #FFFFFF;
  		}
  		.MUY_ALTA{
  			--bs-table-bg: #d90d5b;
  			color: #FFFFFF;
  		}
  		.MEDIA{
  			--bs-table-bg: #c1d411;
  			color: #000000;
  		}
  	</style>

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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>

					<li class="sidebar-item">
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
							<a class="btn btn-info" href="upload_manual.php" >Agregar PD +</a>
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
								<table border="0" cellspacing="5" cellpadding="5">
							        <tbody><tr>
							            <td>Minimum date:</td>
							            <td><input type="text" id="min" name="min"></td>
							        </tr>
							        <tr>
							            <td>Maximum date:</td>
							            <td><input type="text" id="max" name="max"></td>
							        </tr>
							    </tbody></table>
								<table class="table table-hover my-0" id="table_id">
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
                                            <th class="">Nivel</th>
                                            <th class="d-none d-xl-table-cell">Elaborado</th>
                                            <th class="d-none d-xl-table-cell">Informe Nº</th>
                                            <th class="d-none d-xl-table-cell">Nº de Plano</th>
                                            <th class="d-none d-xl-table-cell">Fecha Entrega</th>
                                            <th class="d-none d-md-table-cell">Observación</th>
                                            <th class="d-none d-md-table-cell">Estado ASTEC</th>
                                            <th class="d-none d-md-table-cell">Estado DEPROP</th>
                                            <th class="d-none d-md-table-cell">Estado DEOM</th>
                                            <th class="d-none d-md-table-cell">Estado FINAL</th>
                                            <th class="d-none d-md-table-cell">Cargar</th>
                                            <th class="d-none d-md-table-cell">Prioridad</th>

										
										</tr>
									</thead>
									<tbody>
										<?php 
										error_reporting(E_ALL ^ E_WARNING);
										include 'conexion.php';
										$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
										if ($conexion->connect_error) {
										 die("La conexion falló: " . $conexion->connect_error);
										}
										$pd_ur = array();
										$ti = mysqli_query($conexion, "SELECT * FROM pd_ur ");
										  while ($t = mysqli_fetch_assoc($ti)) {
										  	$pd_ur["MeterName"][] = $t['METER_NAME'];
										  	$pd_ur["Codigo"][] = $t['CODIGO'];
										  	$pd_ur["Informe"][] = $t['INFORME'];
										  	$pd_ur["Plano"][] = $t['PLANO'];
										  	$pd_ur["Potencia Nominal"][] = $t['POTENCIA_NOMINAL'];
										  	$pd_ur["PotenciaMax"][] = $t['POTENCIA_MAX'];
										  	$pd_ur["Porcentaje"][] = $t['PORCENTAJE'];
										  	$pd_ur["TimeStamp"][] = $t['TIME_STAMP'];
										  	$pd_ur["Username"][] = $t['ELABORADO'];
										  	$pd_ur["FechaEntrega"][] = $t['FECHA_ENTREGA'];
										  	$pd_ur["Observacion"][] = $t['OBSERVACION'];
										  	$pd_ur["Estado"][] = $t['ESTADO_ASTEC'];
										  	$pd_ur["Estado_Dep"][] = $t['ESTADO_DEPROP'];
										  	$pd_ur["Estado_Deom"][] = $t['ESTADO_DEOM'];
										  	$pd_ur["Estado_final"][] = $t['ESTADO_FINAL'];
										  	$pd_ur["Prioridad"][] = $t['PRIORIDAD'];
										  	#echo "Metername: ".$t['METER_NAME'];
										  }		
										$ti = mysqli_query($conexion, "SELECT * FROM planos ");
										  while ($t = mysqli_fetch_assoc($ti)) {
										  	$pd_ur["Planos"][] = $t['DIR'];
										  }			
										  #var_dump($pd_ur['Planos']);			      
										#echo "<br>Data: ";echo "<pre>"; ;print_r($output);echo "</pre>";
										#die();
										$nid=0;
										$class = "";
										
										if(empty($pd_ur["MeterName"])){
										    $limit=0;
										}else{
											$limit=count($pd_ur["MeterName"]);
										}
										    
											for ($i=0; $i < $limit; $i++) { 
												$nid=$i+1;
												if ($pd_ur["Estado_final"][$i] != 'FINALIZADO') {
													if (floatval($pd_ur["Porcentaje"][$i])>=$marg and  floatval($pd_ur["Porcentaje"][$i])<$crit){
														$class =  'class="table-warning"';
													}elseif (floatval($pd_ur["Porcentaje"][$i])>$crit) {
														$class =  'class="table-danger"';
													}
												}else{
													
													$class =  'class="table-success"';
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
															if (floatval($pd_ur["Porcentaje"][$i])>=$marg and  floatval($pd_ur["Porcentaje"][$i])<$crit){
																echo '<td><span class="btn btn-square btn-warning">Marginal</span></td>';
															}elseif (floatval($pd_ur["Porcentaje"][$i])>$crit) {
																echo '<td><span class="btn btn-square btn-danger">Crítico</span></td>';
															}
															
												echo '

												<td class="d-none d-md-table-cell">'.$pd_ur["Username"][$i].'</td>
												<td class="d-none d-md-table-cell"><a href="informes/'.$pd_ur["Informe"][$i].'.pdf" target="_blank">'.$pd_ur["Informe"][$i].'</a></td>
												<td class="d-none d-md-table-cell">';







												echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#planos'.$i.'" style="width: 100%;">
												             '.$pd_ur["Planos"][$i].'
												            </button>
															<div class="modal fade" id="planos'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<form action="#" method="POST">
																			<div class="modal-header">
																				<h5 class="modal-title">Lista de Planos</h5>
																				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
																			</div>
																			';
												$path = "planos/".$pd_ur["Planos"][$i];
												#echo "Path: ".$path;
												$file=0;
												$files = scandir('planos/'.$pd_ur["MeterName"][$i]);
												if(count($files) > 0) {
												  
												
													$files = array_diff(scandir($path), array('.', '..'));
													$pl_s = '';

													echo "<br><div style='padding: 20px; margin: 20px;'>";
														
													foreach($files as $file){
														$fname = strval($file);
														$ps = mysqli_query($conexion, "SELECT * FROM `planos_single` WHERE NAME = '$fname'");
														
														while ($l = mysqli_fetch_assoc($ps)) {
															$pl_s = $l['STATUS'];
														}	
														#echo "STATUS: ".$file."<br>";
														if ($pl_s 	==	"SOLVED") {
															echo "
													  		<br>
													  		<div class='alert alert-success alert-outline-coloured alert-dismissible' role='alert'>
																
																<div class='alert-icon'>
																	<i data-feather='activity'></i>
																</div>
																<div class='alert-message'>
																	 Estado del Plano <strong><a href='$path/$file'>$file</a></strong><div style='float: right;'><input type='checkbox' class='form-check-input'  style='width: 30px; height: 30px;' checked disabled></div>
																</div>
															</div>";
															$pl_s = '';
														}else{
															 echo "
															  		<br>
															  		<div class='alert alert-secondary alert-outline-coloured alert-dismissible' role='alert'>
																		
																		<div class='alert-icon'>
																			<i data-feather='activity'></i>
																		</div>
																		<div class='alert-message'>
																			 Estado del Plano <strong><a href='$path/$file'>$file</a></strong><div style='float: right;'><input type='checkbox' class='form-check-input'  style='width: 30px; height: 30px;' disabled></div>
																		</div>
																	</div>";
														}
													}
													echo "</div>";
												}
													echo '
																				<input type="hidden" name="metername" value="'.$pd_ur["MeterName"][$i].'">
																				<br>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																				</div>
																			</form>	
																		</div>
																	</div>
																</div>
														</td>';









												echo '
												<td class="d-none d-md-table-cell">'.$pd_ur["FechaEntrega"][$i].'</td>
												<td class="d-none d-md-table-cell">'.$pd_ur["Observacion"][$i].'</td>
												<td class="d-none d-md-table-cell">'.$pd_ur["Estado"][$i].'</td>
												<td class="d-none d-md-table-cell">'.$pd_ur["Estado_Dep"][$i].'</td>
												<td class="d-none d-md-table-cell">'.$pd_ur["Estado_Deom"][$i].'</td>
												<td class="d-none d-md-table-cell">'.$pd_ur["Estado_final"][$i].'</td>
												<td class="d-none d-xl-table-cell">
													<form action="upload.php" method="POST">
														<input type="hidden" value="'.$pd_ur["MeterName"][$i].'" name="position">
														<button type="submit" class="btn btn-info">Cargar Informe</button>
													</form>	
												
												</td>';
												if (($pd_ur["Prioridad"][$i])!= ""){
													echo '<td class="d-none d-md-table-cell '.$pd_ur["Prioridad"][$i].'">
													'.$pd_ur["Prioridad"][$i].'
															<button type="button" class="btn btn-success" data-toggle="modal" data-target="#centeredModalPrimary_'.$i.'">
												             <i class="align-middle mr-2" data-feather="edit"></i> 
												            </button>
															<div class="modal fade" id="centeredModalPrimary_'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<form action="change_prior.php" method="POST">
																			<div class="modal-header">
																				<h5 class="modal-title">Centered modal</h5>
																				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
																			</div>
																			<select id="dropdown" name="prioridad">
																			  <option value="MEDIA">MEDIA</option>
																			  <option value="ALTA">ALTA</option>
																			  <option value="MUY_ALTA">MUY_ALTA</option>
																			</select>
																			<input type="hidden" name="metername" value="'.$pd_ur["MeterName"][$i].'">
																			<br>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																				<button type="submit" class="btn btn-primary">Guardar</button>
																			</div>
																		</form>	
																	</div>
																</div>
															</div>
													</td>';
												}else {
													echo '<td class="d-none d-md-table-cell '.$pd_ur["Prioridad"][$i].'">
															<button type="button" class="btn btn-success" data-toggle="modal" data-target="#centeredModalPrimary_'.$i.'">
												             <i class="align-middle mr-2" data-feather="edit"></i> 
												            </button>
															<div class="modal fade" id="centeredModalPrimary_'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<form action="change_prior.php" method="POST">
																			<div class="modal-header">
																				<h5 class="modal-title">Centered modal</h5>
																				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
																			</div>
																			<select id="dropdown" name="prioridad">
																			  <option value="MEDIA">MEDIA</option>
																			  <option value="ALTA">ALTA</option>
																			  <option value="MUY_ALTA">MUY_ALTA</option>
																			</select>
																			<input type="hidden" name="metername" value="'.$pd_ur["MeterName"][$i].'">
																			<br>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																				<button type="submit" class="btn btn-primary">Guardar</button>
																			</div>
																		</form>	
																	</div>
																</div>
															</div>
													</td>';
												}
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
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Gráficos</h1>

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Gráfico de Prioridades</h5>
									<h6 class="card-subtitle text-muted">Lista de prioridades</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="miGrafico"></canvas> 
									</div>
								</div>
							</div>
						</div>
						

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Gáfico de Estados</h5>
									<h6 class="card-subtitle text-muted">Lista de estados</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="status_bar"></canvas>
									</div>
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
<!--
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script>
-->

	</script>
 <!-- Page level custom scripts -->
 	 <script type="text/javascript" src="data.js"></script>
 	 <script type="text/javascript" src="status.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
     <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

     <script>
         $(document).ready(function() {
            $('#table_id').DataTable( {
            	"scrollX": true,
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

     <script type="text/javascript">
     	var minDate, maxDate;
 
		// Custom filtering function which will search data in column four between two values
		$.fn.dataTable.ext.search.push(
		    function( settings, data, dataIndex ) {
		        var min = minDate.val();
		        var max = maxDate.val();
		        var date = new Date( data[12] );
		        console.log( date[12]);
		        console.log(min);
		 
		        if (
		            ( min === null && max === null ) ||
		            ( min === null && date <= max ) ||
		            ( min <= date   && max === null ) ||
		            ( min <= date   && date <= max )
		        ) {
		            return true;
		        }
		        return false;
		    }
		);
		 
		$(document).ready(function() {
		    // Create date inputs
		    minDate = new DateTime($('#min'), {
		        format: 'MMMM Do YYYY'
		    });
		    maxDate = new DateTime($('#max'), {
		        format: 'MMMM Do YYYY'
		    });
		 
		    // DataTables initialisation
		    var table = $('#table_id').DataTable();
		 
		    // Refilter the table
		    $('#min, #max').on('change', function () {
		        table.draw();
		    });
		});
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