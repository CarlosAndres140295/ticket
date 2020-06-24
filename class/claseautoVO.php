<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

class claseautoVO
    {

	var $id_clase_auto;
    var $nombre;


	function getid_clase_auto()
	{
	return $this->id_clase_auto;
	}
	function setid_clase_auto($id_clase_auto2)
	{
	$this->id_clase_auto=$id_clase_auto2;
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

