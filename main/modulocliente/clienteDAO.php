<?php 
	/**
	 * 
	 */
	class clienteDAO
	{
		
		function __construct($conexion)
		{
			# code...
			$this->conexion=$conexion;
		}

		public function ListarTipoDocumento()
		{
			$lista=array();

			$sql="SELECT * FROM principal.tipo_documento WHERE tido_activo='SI'";

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

			public function ListarGenero()
		{
			$lista=array();

			$sql="SELECT * FROM principal.genero WHERE gene_activo='SI'";

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