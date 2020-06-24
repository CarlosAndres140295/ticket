<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

class servicioVO
    {

	var $id_clase_auto;
	var $clase_auto;
	var $id_servicio;
    var $nombre;
    var $precio;
    var $observacion;
    var $fecha;
    var $marca;
    var $placa;
    var $color;



	function getid_clase_auto()
	{
	return $this->id_clase_auto;
	}
	function setid_clase_auto($id_clase_auto2)
	{
	$this->id_clase_auto=$id_clase_auto2;
	}

	function getclase_auto()
	{
	return $this->clase_auto;
	}
	function setclase_auto($clase_auto2)
	{
	$this->clase_auto=$clase_auto2;
	}


    function getid_servicio()
    {
	return $this->id_servicio;
	}
	function setid_servicio($id_servicio2)
	{
	$this->id_servicio=$id_servicio2;
	}

    function getnombre()
    {
	return $this->nombre;
	}
	function setnombre($nombre2)
	{
	$this->nombre=$nombre2;
	}

	function getprecio()
    {
	return $this->precio;
	}
	function setprecio($precio2)
	{
	$this->precio=$precio2;
	}

	function getobservacion()
    {
	return $this->observacion;
	}
	function setobservacion($observacion2)
	{
	$this->observacion=$observacion2;
	}

	function getfecha()
    {
	return $this->fecha;
	}
	function setfecha($fecha2)
	{
	$this->fecha=$fecha2;
	}

	function getmarca()
    {
	return $this->marca;
	}
	function setmarca($marca2)
	{
	$this->marca=$marca2;
	}


	function getplaca()
    {
	return $this->placa;
	}
	function setplaca($placa2)
	{
	$this->placa=$placa2;
	}

	function getcolor()
    {
	return $this->color;
	}
	function setcolor($color2)
	{
	$this->color=$color2;
	}






	}





?>

