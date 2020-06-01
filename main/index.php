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
	 <div class="container-fluid bg-dark">
		   <section id="menu">
			<?php include 'menu.php'; ?>
		</section>

     </div>

     <div class="container-fluid">
		<!-- <div class="container"> -->
			<div id="respuestas">
				<br>
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
