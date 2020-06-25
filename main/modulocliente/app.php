<?php 
	header('Content-Type: application/json');

	include '../../class/conexion.php';
	include 'clienteDAO.php';

	$conexion = new conexion();

	$cliente=new clienteDAO($conexion);

	$parametro=$_POST['parametro'];

	if ($parametro=='tipo_documento') {
		# code...
			$valores=$cliente->ListarTipoDocumento();

			retornar($valores);
	}

		if ($parametro=='genero') {
		# code...
			$valores=$cliente->ListarGenero();

			retornar($valores);
	}

	function retornar($valores)
	{
		# code...
		echo json_encode($valores);
	}
	// echo ($valores);
	// console.log($valores);
	// exit();

?>