<?php
	session_start();

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

	<title>:: CLYFSA :: DASHBOARD | CRM ASTEC</title>


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
				<a class="sidebar-brand" href="crm_dash.php">
          <span class="align-middle">CLYFSA</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Map
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_dash.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="crm_astec.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">ASTEC</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_deom.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">DEOM</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_deprop.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">DEPROP</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">PD's</span>
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
			                	<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php #echo $_SESSION['username']; ?></span>
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
							<h3><strong>CRM </strong> ASTEC</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">CLYFSA</a></li>
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">CRM ASTEC</li>
								</ol>
							</nav>
						</div>
					</div>
					

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Ultimos Projectos</h5>
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
								<table class="table table-hover my-0 display nowrap" id="table_id">
									<thead>
										<tr>
											<th class="d-none d-xl-table-cell">Plano N°</th>
                                            <th class="d-none d-xl-table-cell">Nº de ODT</th>
                                            <th class="d-none d-xl-table-cell">Actividades</th>
                                            <th class="d-none d-xl-table-cell">Descripcion</th>
                                            <th class="d-none d-xl-table-cell">Direccion</th>
                                            <th class="d-none d-xl-table-cell">Ejecutado por</th>
                                            <th class="d-none d-xl-table-cell">Inicio</th>
                                            <th class="d-none d-xl-table-cell">Fin</th>
                                            <th class="d-none d-xl-table-cell">Estado Ejecución %</th>
                                            <th class="d-none d-xl-table-cell">HHP INICIAL</th>
                                            <th class="d-none d-xl-table-cell">HHP FINAL</th>
                                            <th class="d-none d-xl-table-cell">Fecha de Fiscalizacion</th>
                                            <th class="d-none d-xl-table-cell">Estado Fiscalización</th>
                                            <th class="d-none d-xl-table-cell">Elaborado por:</th>
                                            <th class="d-none d-xl-table-cell">Cierre Periodo</th>
                                            <th class="d-none d-xl-table-cell">Observacion 1</th>
                                            <th class="d-none d-xl-table-cell">Observacion 2</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										include 'conexion.php';
										$db_n = "crm_clyfsa";
										$conexion = new mysqli($host_db, $user_db, $pass_db, $db_n);
										if ($conexion->connect_error) {
										 die("La conexion falló: " . $conexion->connect_error);
										}
										$data = array();
										$values = mysqli_query($conexion, "SELECT * FROM astec ");
										while ($fila = $values->fetch_assoc()) {
										    $data[] = $fila;
										}
										#echo "<br>Data: ";echo "<pre>"; ;print_r($data);echo "</pre>";
										 ?>
										 <?php
                                                $lim =  count($data);
                                                $lim1 =  count($data[0]);
                                                #echo $lim1;
                                                for($i=0; $i<$lim; $i++ ){
                                                    echo "<tr>";
                                                    foreach ($data[$i] as $value){
                                                        echo " <td>".$value."</td>";
                                                    }
                                                    #for($j=0; $j<$lim1; $j++ ){
                                                    #        echo " <td>".$tabled[$i][$j]."</td>";
                                                    #    
                                                    #}     

                                                    echo "</tr>";
                                                }
                                               
                                            ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
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
		        var date = new Date( data[6] );
		 
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