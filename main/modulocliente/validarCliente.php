<?php 
	header('Content-Type: application/json');

	if (!isset($_POST)) {
		# code...
		echo json_encode('Error');
		exit();

	}

	$tipo=$_POST['tipo_documento'];
	$documento=$_POST['documento'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$genero=$_POST['genero'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['$direccion'];
	$email=$_POST['$email'];






	echo json_encode('Error');

 ?>