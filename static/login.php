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

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">SISTEMA WEB</h1>
							<p class="lead">
								Seguimiento de PDs sobrecargados
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/logo/logo_clip.png" alt="Charles Hall" class="img-fluid" width="132" height="132" />
									</div>
									<form method="POST" action="../src/php/checklogin.php">
										<div class="mb-3">
											<label class="form-label">Correo electrónico</label>
											<input class="form-control form-control-lg" type="email" name="userid" placeholder="Ingresar correo electrónico" />
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Ingresar Contraseña" />
											<!--<small>
            <a href="pages-reset-password.html">Forgot password?</a>
          </small>-->
										</div>
										<div>
											<label class="form-check">
            <!--<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
            <span class="form-check-label">
              Remember me next time
            </span>-->
          </label>
										</div>
										<div class="text-center mt-3">
											<button class="btn btn-lg btn-primary" type="submit">Ingresar</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

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