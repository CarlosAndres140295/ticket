<?php
require_once "recursos/configuracion.php";

class conexion{

  private $conexion;
  private $resultado;

   function __construct(){
    if(!isset($this->conexion)){
    $this->conexion = pg_connect("host=localhost port=5432 dbname=netics user=netics_all password=5633433")
    or die ("error para conectarse a la base de datos");
    }
}
public function consulta($sql){
  $this->resultado=pg_query($this->conexion,$sql);
  }

public function extraerRegistros(){
  if($fila=pg_fetch_array($this->resultado))
    {
    return $fila;
    }
    else
    {
    return false;
    }
    }

  public function cuentaFilas(){
    return pg_num_rows($this->resultado);
    }

    public function filasafectadas(){
      if(pg_affected_rows($this->resultado))
        {
        return true;
        }
        else
        {
        return false;
        }
      }


    public function cerrar(){
      if(isset($this->conexion)){
        return pg_close($this->conexion);
        }

      }

}

?>