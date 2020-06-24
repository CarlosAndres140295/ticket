<?php
ini_set('display_errors', '0');
error_reporting(E_ALL);

class clienteVO
    {

	var $id_cliente;
    var $nombre;
    var $apellido;
    var $direccion;
	var $genero;
    var $telefono;
    var $tipo_documento;
    var $documento;
    var $contrato;
    var $ip;
    var $router;
    var $estado;
    var $torre;
    var $observacion;
    var $fecha;
    var $municipio;
    var $finstalacion;
   	var $mac;
   	var $tipo_conexion;
   	var $caja_nap;
   	var $puerto_nap;
   	var $fnacimiento;
   	var $mac_router;
   	var $canal;
   	var $mensualidad;
   	var $derechos;
   	var $ssid;
   	var $passwordssid;
   	var $antena;
   



		function getid_cliente()
		{
		return $this->id_cliente;
		}
		function setid_cliente($id_cliente2)
		{
		$this->id_cliente=$id_cliente2;
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

		 function getdireccion()
	    {
		return $this->direccion;
		}
		function setdireccion($direccion2)
		{
		$this->direccion=$direccion2;
		}

		 function getdocumento()
	    {
		return $this->documento;
		}
		function setdocumento($documento2)
		{
		$this->documento=$documento2;
		}

	    function getgenero()
	    {
		return $this->genero;
		}
		function setgenero($genero2)
		{
		$this->genero=$genero2;
		}

		function getclase_auto()
	    {
		return $this->clase_auto;
		}
		function setclase_auto($clase_auto2)
		{
		$this->clase_auto=$clase_auto2;
		}

	    function gettelefono()
	    {
	    return $this->telefono;
	    }
	    function settelefono($telefono2)
	    {
	    $this->telefono=$telefono2;
	    }


	    function getestado()
	    {
		return $this->estado;
		}
		function setestado($estado2)
		{
		$this->estado=$estado2;
		}



	    function getcontrato()
	    {
		return $this->contrato;
		}
		function setcontrato($contrato2)
		{
		$this->contrato=$contrato2;
		}

		function getip()
	    {
		return $this->ip;
		}
		function setip($ip2)
		{
		$this->ip=$ip2;
		}

		function getrouter()
	    {
		return $this->router;
		}
		function setrouter($router2)
		{
		$this->router=$router2;
		}


		function gettipo_documento()
	    {
		return $this->tipo_documento;
		}
		function settipo_documento($tipo_documento2)
		{
		$this->tipo_documento=$tipo_documento2;
		}

		function getmunicipio()
	    {
		return $this->municipio;
		}
		function setmunicipio($municipio2)
		{
		$this->municipio=$municipio2;
		}

		function gettorre()
	    {
		return $this->torre;
		}
		function settorre($torre2)
		{
		$this->torre=$torre2;
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

		function getid_servicio_valor()
	    {
		return $this->id_servicio_valor;
		}
		function setid_servicio_valor($id_servicio_valor2)
		{
		$this->id_servicio_valor=$id_servicio_valor2;
		}

		function getfinstalacion()
	    {
		return $this->finstalacion;
		}
		function setfinstalacion($finstalacion2)
		{
		$this->finstalacion=$finstalacion2;
		}

		function getmac()
	    {
		return $this->mac;
		}
		function setmac($mac2)
		{
		$this->mac=$mac2;
		}

		function gettipo_conexion()
	    {
		return $this->tipo_conexion;
		}
		function settipo_conexion($tipo_conexion2)
		{
		$this->tipo_conexion=$tipo_conexion2;
		}

		function getcaja_nap()
	    {
		return $this->caja_nap;
		}
		function setcaja_nap($caja_nap2)
		{
		$this->caja_nap=$caja_nap2;
		}


		function getpuerto_nap()
	    {
		return $this->puerto_nap;
		}
		function setpuerto_nap($puerto_nap2)
		{
		$this->puerto_nap=$puerto_nap2;
		}

		function getfnacimiento()
	    {
		return $this->fnacimiento;
		}
		function setfnacimiento($fnacimiento2)
		{
		$this->fnacimiento=$fnacimiento2;
		}

		function getmac_router()
	    {
		return $this->mac_router;
		}
		function setmac_router($mac_router2)
		{
		$this->mac_router=$mac_router2;
		}



		function getcanal()
	    {
		return $this->canal;
		}
		function setcanal($canal2)
		{
		$this->canal=$canal2;
		}

		function getmensualidad()
	    {
		return $this->mensualidad;
		}
		function setmensualidad($mensualidad2)
		{
		$this->mensualidad=$mensualidad2;
		}


		function getderechos()
	    {
		return $this->derechos;
		}
		function setderechos($derechos2)
		{
		$this->derechos=$derechos2;
		}

		function getssid()
	    {
		return $this->ssid;
		}
		function setssid($ssid2)
		{
		$this->ssid=$ssid2;
		}


		function getpasswordssid()
	    {
		return $this->passwordssid;
		}
		function setpasswordssid($passwordssid2)
		{
		$this->passwordssid=$passwordssid2;
		}


		function getantena()
	    {
		return $this->antena;
		}
		function setantena($antena2)
		{
		$this->antena=$antena2;
		}




}

?>

