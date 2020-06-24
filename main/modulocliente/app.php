<?php 
	header('Content-Type: application/json');

	include '../../class/conexion.php';
	include 'moduloclienteDAO.php';

	$conexion = new conexion();

	$cliente=new moduloclienteDAO($conexion);

	$valores=$cliente->ListarTipoDocumento();

	echo json_encode($valores);
	// echo ($valores);
	// console.log($valores);
	// exit();

?>