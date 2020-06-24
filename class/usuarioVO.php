<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

class usuarioVO
    {

	var $id_user;
    var $documento;
    var $usuario;
    var $nombre;
    var $apellido;
    var $edad;
	var $genero;
    var $telefono;   
    var $direccion;
    var $pass;
    var $correo;
    var $cargo;
    var $departamento;
    var $id_tipo;
    var $tipo_documento;
    var $fecha_registro;
    

		function getid_user()
		{
		return $this->id_user;
		}
		function setid_user($id_user2)
		{
		$this->id_user=$id_user2;
		}

		function getdocumento()
		{
		return $this->documento;
		}
		function setdocumento($documento2)
		{
		$this->documento=$documento2;
		}

		function getusuario()
		{
		return $this->usuario;
		}
		function setusuario($usuario2)
		{
		$this->usuario=$usuario2;
		}

	    function getnombre()
	    {
		return $this->nombre;
		}
		function setnombre($nombre2)
		{
		$this->nombre=$nombre2;
		}

	     function getapellido()
	    {
		return $this->apellido;
		}
		function setapellido($apellido2)
		{
		$this->apellido=$apellido2;
		}

		 function getedad()
	    {
		return $this->edad;
		}
		function setedad($edad2)
		{
		$this->edad=$edad2;
		}

	     function getgenero()
	    {
		return $this->genero;
		}
		function setgenero($genero2)
		{
		$this->genero=$genero2;
		}

	    function gettelefono()
	    {
	    return $this->telefono;
	    }
	    function settelefono($telefono2)
	    {
	    $this->telefono=$telefono2;
	    }

	     function getdireccion()
	    {
	    return $this->direccion;
	    }
	    function setdireccion($direccion2)
	    {
	    $this->direccion=$direccion2;
	    }


	    function getcargo()
	    {
		return $this->cargo;
		}
		function setcargo($cargo2)
		{
		$this->cargo=$cargo2;
		}

		function getdepartamento()
	    {
		return $this->departamento;
		}
		function setdepartamento($departamento2)
		{
		$this->departamento=$departamento2;
		}



	    function getcorreo()
	    {
		return $this->correo;
		}
		function setcorreo($correo2)
		{
		$this->correo=$correo2;
		}


		function getpass()
	    {
		return $this->pass;
		}
		function setpass($pass2)
		{
		$this->pass=$pass2;
		}

		function getid_tipo()
	    {
		return $this->id_tipo;
		}
		function setid_tipo($id_tipo2)
		{
		$this->id_tipo=$id_tipo2;
		}

		function gettipo_documento()
	    {
		return $this->tipo_documento;
		}
		function settipo_documento($tipo_documento2)
		{
		$this->tipo_documento=$tipo_documento2;
		}

	    function getfecha_registro()
	    {
		return $this->fecha_registro;
		}
		function setfecha_registro($fecha_registro2)
		{
		$this->fecha_registro=$fecha_registro2;
		}



	}





?>

