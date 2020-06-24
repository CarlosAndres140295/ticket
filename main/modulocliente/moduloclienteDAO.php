<?php 
	/**
	 * 
	 */
	class mdouloclienteDAO
	{
		
		function __construct($conexion)
		{
			# code...
			$this->conexion=$conexion;
		}

		public function ListarTipoDocumento()
		{
			$lista=array();

			$sql="SELECT * FROM principal.tipo_documento WHERE tipo_activo='SI'";

			$rs=$this->conexion->consulta($sql);
			$cantidad=$this->conexion->cuentaFilas();

			if ($cantidad){
			while ($row=$this->conexion->extraerRegistros())
			{
			$lista[]=$row;
			}
			return $lista;
			} 

			return 0;  

			}
	}
 ?>