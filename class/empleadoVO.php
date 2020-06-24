<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
  class empleadoVO{
    var $idempleado;
    var $documento;
    var $nombre;
    var $apellido;
    var $genero;
    var $telefono;
    var $direccion;
    var $email;
    var $cargo;

    function getidempleado()
    {
    return $this->idempleado;
    }
    function setidempleado($idempleado2)
    {
    $this->idempleado=$idempleado2;
    }

    function getdocumento()
    {
    return $this->documento;
    }
    function setdocumento($documento2)
    {
    $this->documento=$documento2;
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


    function getemail()
    {
    return $this->email;
    }
    function setemail($email2)
    {
    $this->email=$email2;
    }


    function getcargo()
    {
    return $this->cargo;
    }
    function setcargo($cargo2)
    {
    $this->cargo=$cargo2;
    }
  }
 ?>
