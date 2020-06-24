<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

class tipo_documentoVO
    {

	var $id_tipo_documento;
    var $nombre;



	function getid_tipo_documento()
	{
	return $this->id_tipo_documento;
	}
	function setid_tipo_documento($id_tipo_documento2)
	{
	$this->id_tipo_documento=$id_tipo_documento2;
	}


    function getnombre()
    {
	return $this->nombre;
	}
	function setnombre($nombre2)
	{
	$this->nombre=$nombre2;
	}





	}





?>

