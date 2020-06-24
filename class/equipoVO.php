<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

class equipoVO
    {

	var $id_servicio_valor;
    var $id_servicio;
    var $id_clase;
    var $nombre;
	var $clase;
    var $valor;
 //    var $modelo;
 //    var $correo;
 //    var $id_servicio;
 //    var $id_tipo;

		function getid_servicio_valor()
		{
		return $this->id_servicio_valor;
		}
		function setid_servicio_valor($id_servicio_valor2)
		{
		$this->id_servicio_valor=$id_servicio_valor2;
		}


	    function getid_servicio()
	    {
		return $this->id_servicio;
		}
		function setid_servicio($id_servicio2)
		{
		$this->id_servicio=$id_servicio2;
		}



	    function getid_clase()
	    {
		return $this->id_clase;
		}
		function setid_clase($id_clase2)
		{
		$this->id_clase=$id_clase2;
		}


	    function getnombre()
	    {
		return $this->nombre;
		}
		function setnombre($nombre2)
		{
		$this->nombre=$nombre2;
		}

		function getclase()
	    {
		return $this->clase;
		}
		function setclase($clase2)
		{
		$this->clase=$clase2;
		}


		function getvalor()
	    {
		return $this->valor;
		}
		function setvalor($valor2)
		{
		$this->valor=$valor2;
		}

		// function getmodelo()
	 //    {
		// return $this->modelo;
		// }
		// function setmodelo($modelo2)
		// {
		// $this->modelo=$modelo2;
		// }

		// function getmonitorvalor()
	 //    {
		// return $this->monitorvalor;
		// }
		// function setmonitorvalor($monitorvalor2)
		// {
		// $this->monitorvalor=$monitorvalor2;
		// }

		// function getmonitoestado()
	 //    {
		// return $this->monitoestado;
		// }
		// function setmonitoestado($monitoestado2)
		// {
		// $this->monitoestado=$monitoestado2;
		// }



	}





?>

