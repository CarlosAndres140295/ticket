<!doctype html>
<html>
<head>
	<title>Bienvenido</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../recursos/alertify/alertify.min.css">
		<link rel="stylesheet" type="text/css" href="../recursos/fontawesome/css/all.min.css">
</head>
	<body class="bg-light">
	 <div class="container-fluid">
		<div class="">
		   <section id="menu">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
			  <a class="navbar-brand" href="index.php"><img src="../images/img.jpg" class="rounded-circle" style="width: 50px;height: 50px;"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Tablero<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCliente" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
			          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuCliente">
				          <a class="dropdown-item" href="#">Agregar nuevo cliente <span><i class="fa fa-user-plus"></i></span></a>
				          <a class="dropdown-item" href="#">Ver listado de clientes <span><i class="fa fa-users"></i></span></a>
				          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
			        </div>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Servicios</a>
			      </li>
			      <li class="nav-item float-right">
			        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Manteniento</a>
			      </li>
			    <!-- </ul> -->
			  <!-- </div> -->

			  <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
			    <!-- <ul class="navbar-nav"> -->
			       <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuPerfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Usuario
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuPerfil">
			          <a class="dropdown-item" href="#">Cuenta <span><i class="fa fa-user"></i></span></a>
			          <a class="dropdown-item" href="#">Contraseña <span><i class="fa fa-key"></i></span></a>
			          <a class="dropdown-item" href="#">Salir <span><i class="fa fa-power-off"></i></span></a>
			        </div>
			      </li>
			    </ul>
			  </div>
			</nav>
		</section>
		</div>
     </div>

     <div class="container-fluid">
		<!-- <div class="container"> -->
			<div id="respuestas">
				<?php include 'indicadores/indicadores.php' ?>
			</div>
		<!-- </div> -->
     </div>
		<script src="../js/jquery.js"></script>
		<!-- <script src="../js/popper.js"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../recursos/alertify/alertify.min.js"></script>

</body>
