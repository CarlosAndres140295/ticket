<?php

// session_start();

// include '../../recursos/configuracion.php';
include 'usuarioVO.php';
include 'empleadoVO.php';
include 'tipo_documentoVO.php';
include 'claseautoVO.php';
include 'equipoVO.php';
include 'clienteVO.php';
include 'servicioVO.php';

class usuarioDAO{

function __construct($conexion)
{
$this->conexion=$conexion;
}




function login($usuario,$clave)
{

// $encontrado=false;

// $sql2="SELECT * FROM principal.acceso a, principal.usuario b, principal.genero c, principal.departamento d, principal.acceso_departamento e
// 	WHERE a.acce_usuario='$usuario' 
// 	AND a.acce_activo ='SI' 
// 	AND a.usua_id=b.usua_id
// 	AND b.gene_id=c.gene_id
// 	AND a.acce_id=e.acce_id
// 	AND e.depa_id=d.depa_id";

$sql="SELECT * FROM principal.acceso a, principal.usuario b, principal.genero c
		WHERE a.acce_usuario='$usuario' 
		AND a.acce_activo ='SI' 
		AND a.usua_id=b.usua_id
		AND b.gene_id=c.gene_id";

// echo $sql;exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

if (password_verify($clave,$row["acce_password"])) {


return $row;
}

}

}

return 0;

}


public function verificarusuario($usuario)
{
$sql="SELECT acce_id FROM principal.acceso WHERE acce_usuario='".$usuario."'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{

return 1;
}else{
return 0;  
}

}

public function verificardocumento2($tipo,$documento){
$sql="SELECT usua_id FROM principal.usuario WHERE usua_nit='$documento' AND tipo_nit_id='$tipo'";
// echo($sql);exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
return 1;
}else{
return 0;  
}

}


 function verificardocumentocliente($tipo,$documento){
$sql="SELECT clien_id FROM principal.cliente WHERE clien_nit='$documento' AND tipo_nit_id='$tipo'";

 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{

return 1;
}else{
return 0;  
}

}

// ------------------------------------------------------------------------------------------------------

public function verificarcodigoclienteunico($codigo){
$sql="SELECT clien_id FROM principal.cliente WHERE clien_contrato='$codigo'";
 // echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
return 1;
}else{
return 0;  
}
}

// ----------------------------------------------------------------------------------------------------------

public function verificaripclienteunico($ip){
$sql="SELECT serv_id FROM principal.servicio WHERE clien_direccion_ip='$ip'";
// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
return 1;
}else{
return 0;  
}
}
// ----------------------------------------------------------------------------------------------------------

public function verificarmacrouterclienteunico($mac){
$sql="SELECT clirou_id FROM principal.cliente_router WHERE clien_mac_router='$mac'";
// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
return 1;
}else{
return 0;  
}
}

// ----------------------------------------------------------------------------------------------------------

public function verificarmacclienteunico($mac){
$sql="SELECT clien_id FROM principal.servicio WHERE clien_direccion_mac='$mac'";
// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
return 1;
}else{
return 0;  
}
}
// ----------------------------------------------------------------------------------------------------------
public function verificardocumentoclienteestudio($tipo,$documento){
$sql="SELECT temp_id FROM principal.cliente_temporal 
	  WHERE temp_nit='$documento' 
	  AND tipo_nit_id='$tipo'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{

return 1;
}else{
return 0;  
}

}




public function capturarid($usuarioVO)
{

$sql="SELECT usua_id FROM principal.usuario WHERE tipo_nit_id='".$usuarioVO->gettipo_documento()."' AND 
usua_nit='".$usuarioVO->getdocumento()."'";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{

$id=$row["usua_id"];

}
return $id;
} 

return 0;  

}

public function capturaridservicio($servicioVO)
{
$sql="SELECT id_servicio FROM principal.servicio WHERE nombre='".$servicioVO->getnombre()."'";
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$id=$row["id_servicio"];
}
return $id;
}else
{
return false;  
}
}

// -----------------------------------------------------------------------------
public function seleccionardocumentousuario($id)
{
$sql="SELECT usua_nit FROM principal.usuario WHERE usua_id='".$id."'"; 
// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$documento=$row["usua_nit"];
}
return $documento;
}else
{
return false;  
}
}
// -----------------------------------------------------------------------------

public function restablecercontrasena($documento,$id)
{
$sql="UPDATE principal.acceso
SET acce_password='$documento'
WHERE usua_id='$id'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}
// ----------------------------------------------------------------------------------------------------

public function capturaridcliente($clienteVO)
{
# code...

$sql="SELECT id_cliente FROM principal.cliente WHERE id_tipo_documento='".$clienteVO->gettipo_documento()."'
AND documento='".$clienteVO->getdocumento()."'";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();
if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{

$id=$row["id_cliente"];


}

return $id;
}else
{
return false;  
}
}


public function registradocliente($clienteVO)
{

$lista=array();

$sql="INSERT INTO principal.cliente(tipo_nit_id,
									clien_nit,
									clien_nombre,
									clien_apellido,
									gene_id,
									clien_direccion,
									clien_telefono,
									clien_contrato,
									muni_id,
									clien_fechaderegistro,
									clien_direccion_ip,
									rou_id,
									clien_torre,
									clien_fecha_instalacion,
									clien_direccion_mac,
									clien_observacion,
									clien_activo,
									clien_tipo_conexion,
									clien_fecha_nacimiento,
									clien_moroso, 
									clien_mac_router)
VALUES(
'".$clienteVO->gettipo_documento()."',
'".$clienteVO->getdocumento()."',
'".$clienteVO->getnombre()."',
'".$clienteVO->getapellido()."',
'".$clienteVO->getgenero()."',
'".$clienteVO->getdireccion()."',
'".$clienteVO->gettelefono()."',
'".$clienteVO->getcontrato()."',
'".$clienteVO->getmunicipio()."',
'".$clienteVO->getfecha()."',
'".$clienteVO->getip()."',
'".$clienteVO->getrouter()."',
'".$clienteVO->gettorre()."',
'".$clienteVO->getfinstalacion()."',
'".$clienteVO->getmac()."',
'".$clienteVO->getobservacion()."',
'SI',
'".$clienteVO->gettipo_conexion()."',
'".$clienteVO->getfnacimiento()."',
'NO', 
'".$clienteVO->getmac_router()."'
) RETURNING Currval('principal.cliente_clien_id_seq')";


  // echo $sql;exit();

$rs=$this->conexion->consulta($sql);



$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}

}

public function registradocliente2($clienteVO)
{

$lista=array();

$sql="INSERT INTO principal.cliente(tipo_nit_id,
									clien_nit,
									clien_nombre,
									clien_apellido,
									gene_id,
									clien_direccion,
									clien_telefono,
									clien_contrato,
									muni_id,
									clien_fechaderegistro,
									clien_observacion,
									clien_activo,
									clien_fecha_nacimiento,
									clien_moroso)
									 
									
VALUES(
'".$clienteVO->gettipo_documento()."',
'".$clienteVO->getdocumento()."',
'".$clienteVO->getnombre()."',
'".$clienteVO->getapellido()."',
'".$clienteVO->getgenero()."',
'".$clienteVO->getdireccion()."',
'".$clienteVO->gettelefono()."',
'".$clienteVO->getcontrato()."',
'".$clienteVO->getmunicipio()."',
'".$clienteVO->getfecha()."',
'".$clienteVO->getobservacion()."',
'SI',
'".$clienteVO->getfnacimiento()."',
'NO'
) RETURNING Currval('principal.cliente_clien_id_seq')";


     // echo $sql;//exit();

$rs=$this->conexion->consulta($sql);



$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}

}

public function registradoclienteservicio($clienteVO,$id)
{

$lista=array();

$sql="INSERT INTO principal.servicio(clien_id,
									clien_direccion_ip,
									torre_id,
									clien_fecha_instalacion,
									clien_direccion_mac,
									clien_tipo_conexion,
									serv_canal,
									serv_mensualidad,
									serv_derechos,
									ante_id,
									serv_ssid,
									serv_pass
									)
VALUES(
'".$id."',
'".$clienteVO->getip()."',
'".$clienteVO->gettorre()."',
'".$clienteVO->getfinstalacion()."',
'".$clienteVO->getmac()."',
'".$clienteVO->gettipo_conexion()."',
'".$clienteVO->getcanal()."',
'".$clienteVO->getmensualidad()."',
'".$clienteVO->getderechos()."',
'".$clienteVO->getantena()."',
'".$clienteVO->getssid()."',
'".$clienteVO->getpasswordssid()."'
) RETURNING Currval('principal.servicio_serv_id_seq1')";


    // echo $sql;exit();

$rs=$this->conexion->consulta($sql);



$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}

}

public function registradoclienterouter($clienteVO,$id)
{

$lista=array();

$sql="INSERT INTO principal.cliente_router(serv_id,
									rou_id,
									clien_mac_router)
VALUES(
'".$id."',
'".$clienteVO->getrouter()."',
'".$clienteVO->getmac_router()."'
) RETURNING Currval('principal.cliente_router_clirou_id_seq')";


   // echo $sql;exit();

$rs=$this->conexion->consulta($sql);



$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}

}

public function seleccinar_departamentos($id)
{
$lista=array();

$sql="SELECT a.depa_id FROM principal.acceso_departamento a, principal.departamento d
WHERE  a.acce_id='$id'
AND a.depa_id=d.depa_id 
AND acce_depa_activo='SI'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;

// return $lista;
}
else {
return 0;
}

}


public function registradoclientefotosestudio($cliente_id,$foto)
{

$sql="INSERT INTO principal.foto_temporal(foto_temp_nombre,temp_id)
			VALUES('$foto','$cliente_id')";

  // echo $sql;exit();

$rs=$this->conexion->consulta($sql);

$afectados=$this->conexion->filasafectadas();

if($afectados){

return true;
}
else{
return false;
}
}

public function registradoclientefotos($cliente_id,$foto)
{

$sql="INSERT INTO principal.foto(foto_nombre,clien_id)
			VALUES('$foto','$cliente_id')";

   // echo $sql;
   // exit();

$rs=$this->conexion->consulta($sql);

$afectados=$this->conexion->filasafectadas();

if($afectados){

return true;
}
else{
return false;
}
}


public function registradofotosrespuesta($tick_id,$foto)
{

$sql="INSERT INTO principal.documento_respuesta(dore_nombre_ruta,tick_id)
			VALUES('$foto','$tick_id')";

  // echo $sql;exit();

$rs=$this->conexion->consulta($sql);

$afectados=$this->conexion->filasafectadas();

if($afectados){

return true;
}
else{
return false;
}
}

//-----------------------------------------------------------------------------------------------------------
public function registradoclienteestudio($clienteVO)
{

$sql="INSERT INTO principal.cliente_temporal(tipo_nit_id,temp_nit,temp_nombre,
temp_apellido,gene_id,temp_direccion,temp_telefono,
muni_id,temp_observacion,temp_fecha_registro,temp_estado,temp_fecha_nacimiento)
VALUES(
'".$clienteVO->gettipo_documento()."',
'".$clienteVO->getdocumento()."',
'".$clienteVO->getnombre()."',
'".$clienteVO->getapellido()."',
'".$clienteVO->getgenero()."',
'".$clienteVO->getdireccion()."',
'".$clienteVO->gettelefono()."',
'".$clienteVO->getmunicipio()."',
'".$clienteVO->getobservacion()."',
'".$clienteVO->getfecha()."',
'En Espera',
'".$clienteVO->getfnacimiento()."'
)RETURNING Currval('principal.cliente_temporal_temp_id_seq')";

// echo $sql;exit();



$rs=$this->conexion->consulta($sql);



$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}
}

//-------------------------------------------------------------------------------------------------

public function registrando_documento_ticket($id_ticket,$ruta)
{

$sql="INSERT INTO principal.documento_ticket(docu_nombre_ruta,tick_id)
VALUES(
'$ruta',
'$id_ticket'
)";

// echo($sql);exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}

// -------------------------------------------------------------------------------------------------

public function registrandoticket($falla_id,$clien_id,$fecha,$hora,$depa_id,$usua_id,$observacion)
{
$sql="INSERT INTO principal.ticket(clien_id,usua_id,falla_id,tick_fecha_inicio,tick_hora_inicio,depa_id,tick_observacion,tick_estado)
VALUES(
'".$clien_id."',
'".$usua_id."',
'".$falla_id."',
'".$fecha."',
'".$hora."',
'".$depa_id."',
'".$observacion."',
'Abierto'
)RETURNING Currval('principal.ticket_tick_id_seq')";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}
}

//------------------------------------------------------------------------------------------------------

// -------------------------------------------------------------------------------------------------

public function registrandoticket2($falla_id,
									$clien_id,
									$fecha_inicial,
									$hora_inicial,
									$fecha_final,
									$hora_final,
									$depa_id,
									$usua_id,
									$observacion,
									$usua_id_cerrado)
{

$lista=array();

$sql="INSERT INTO principal.ticket( clien_id,
									usua_id,
									falla_id,
									tick_fecha_inicio,
									tick_hora_inicio,
									depa_id,
									tick_observacion,
									tick_estado,
									tick_fecha_fin,
									tick_hora_fin,
									tick_indisponibilidad, 
									usua_id_cerrado)
									VALUES(
									'".$clien_id."',
									'".$usua_id."',
									'".$falla_id."',
									'".$fecha_inicial."',
									'".$hora_inicial."',
									'".$depa_id."',
									'".$observacion."',
									'Cerrado', 
									'".$fecha_final."',
									'".$hora_final."',
									'0',
									$usua_id_cerrado
									) RETURNING Currval('principal.ticket_tick_id_seq')";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}

return $lista;
}
else{
return false;
}
}
//---------------------------------------------------------------

public function actualizandocorreo($cliente,$correo)
{
$sql="UPDATE principal.cliente
SET clien_correo='$correo'
WHERE clien_id='$cliente'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}

//------------------------------------------------------------------------------------------------------

public function cerrandoticket($fecha_final,$hora_final,$tick_id,$tick_estado,$tick_indisponibilidad,$usua_id_cerrado)
{
$sql="UPDATE principal.ticket
SET tick_fecha_fin='$fecha_final',
tick_indisponibilidad='$tick_indisponibilidad', 
tick_hora_fin='$hora_final',
tick_estado='$tick_estado',
usua_id_cerrado='$usua_id_cerrado'
WHERE tick_id='$tick_id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}
// ------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------

public function cerrandoticketempresa($fecha_inicial,$hora_inicial,$fecha_final,$hora_final,$tick_id,$tick_estado,$tick_indisponibilidad,$usua_id_cerrado)
{
$sql="UPDATE principal.ticket
		SET tick_fecha_inicio='$fecha_inicial',
			tick_hora_inicio='$hora_inicial',
			tick_fecha_fin='$fecha_final',
			tick_indisponibilidad='$tick_indisponibilidad', 
			tick_hora_fin='$hora_final',
			tick_estado='$tick_estado',
			usua_id_cerrado='$usua_id_cerrado'
		WHERE tick_id='$tick_id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}
// ------------------------------------------------------------------------------------------------
public function registrandocomentario($tick_id,$comentario,$comentario_fecha_hora,$comentario_hora)
{
$sql="INSERT INTO principal.comentario(tick_id,comen_comentario,comen_fecha_hora,comen_hora)
values(
'$tick_id',
'$comentario',
'$comentario_fecha_hora',
'$comentario_hora')";


$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}



public function actualizarticket($depa_id,$tick_id)
{
$sql="UPDATE principal.ticket
SET depa_id='$depa_id'
WHERE tick_id='$tick_id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}

public function guardarcomentario($tick_id,$comentario)
{

$sql="INSERT INTO principal.comentario(tick_id,comen_comentario)
values(
'$tick_id',
'$comentario')";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}



public function guardarmensaje($para,$envia,$asunto,$mensaje,$fecha)
{

$sql="INSERT INTO principal.chat(chat_id_recibe,chat_id_remite,chat_motivo,chat_mensaje,chat_fecha,chat_estado)
values(
'$para',
'$envia',
'$asunto',
'$mensaje',
'$fecha',
'SinLeer')";

// echo($sql);exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}


public function guardarusuario($usuarioVO)
{

$sql="INSERT INTO principal.usuario(usua_nit,usua_nombre,usua_apellido,gene_id,usua_direccion,usua_telefono,
tipo_nit_id,usua_email,usua_fecha_registro)
values(
'".$usuarioVO->getdocumento()."',
'".$usuarioVO->getnombre()."',
'".$usuarioVO->getapellido()."',
'".$usuarioVO->getgenero()."',
'".$usuarioVO->getdireccion()."',
'".$usuarioVO->gettelefono()."',
'".$usuarioVO->gettipo_documento()."',
'".$usuarioVO->getcorreo()."',
'".$usuarioVO->getfecha_registro()."')";


//echo $sql;exit();


$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}


public function traeridusuario($usuarioVO)
{

$sql="SELECT usua_id FROM principal.usuario WHERE tipo_nit_id='".$usuarioVO->gettipo_documento()."' AND 
usua_nit='".$usuarioVO->getdocumento()."'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}

public function traerid($nombre)
{

$sql="SELECT usua_id FROM principal.usuario WHERE usua_nombre='$nombre'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$id=$row['usua_id'];

}
return $id;
}
else {
return 0;
}
}


public function listarservicioscanalmunicipio()
{
$lista=array();

$sql="SELECT * FROM principal.servicio_canal_municipio a, principal.servicio s, principal.canal c,
principal.municipio m 
WHERE a.serv_id=s.serv_id
AND a.canal_id=c.canal_id
AND a.muni_id=m.muni_id
ORDER BY a.scm_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}

public function listarmodulotorre($tabla,$campo)
{
$lista=array();

$sql="SELECT * FROM principal.torre a, principal.municipio b
WHERE a.muni_id=b.muni_id 
ORDER BY $campo DESC
";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}

public function listarservicios($tabla,$campo)
{
$lista=array();

$sql="SELECT * FROM principal.$tabla 
-- ORDER BY $campo DESC
";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}


/////////////////////////////////////////////////////////////
public function listarusuariosparaestudio()
{
$lista=array();

$sql="SELECT a.usua_id,a.usua_nombre,a.usua_apellido FROM principal.usuario a
left join principal.acceso b
on a.usua_id=b.usua_id
where b.usua_id is null ";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}
/////////////////////////////////////////////////////////////
public function listarusuarios()
{
$lista=array();

$sql="SELECT * FROM 
principal.usuario a, principal.genero c,principal.tipo_nit t
WHERE a.usua_id !='".$_SESSION['DATOS']['usua_id']."'
AND a.tipo_nit_id=t.tipo_nit_id 
AND a.gene_id=c.gene_id";

$SQL2="SELECT * 
FROM principal.usuario a 
FULL OUTER JOIN principal.acceso b 
ON a.usua_id=b.usua_id
AND a.usua_id!='".$_SESSION['DATOS']['usua_id']."'
RIGHT JOIN principal.tipo_nit C
ON a.tipo_nit_id=c.tipo_nit_id";

 //echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}
///////////////////////////////////////////////////////////////

public function listarmensajes($id)
{
$lista=array();

$sql="SELECT * FROM principal.chat WHERE chat_id_recibe='$id' ORDER BY chat_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}



public function actualizarusuario($usuarioVO)
{

$sql="UPDATE principal.usuario
SET usua_nombre='".$usuarioVO->getnombre()."',
usua_apellido='".$usuarioVO->getapellido()."', 
usua_nit='".$usuarioVO->getdocumento()."',
usua_telefono='".$usuarioVO->gettelefono()."', 
usua_email='".$usuarioVO->getcorreo()."',
usua_direccion='".$usuarioVO->getdireccion()."', 
gene_id='".$usuarioVO->getgenero()."' 
WHERE usua_id='".$usuarioVO->getid_user()."'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}


//-------------------------------------------------------------
public function actualizarcliente($clienteVO)
{

$sql="UPDATE principal.cliente
SET 
tipo_nit_id='".$clienteVO->gettipo_documento()."',
clien_nombre='".$clienteVO->getnombre()."',
clien_apellido='".$clienteVO->getapellido()."', 
clien_nit='".$clienteVO->getdocumento()."',
clien_telefono='".$clienteVO->gettelefono()."', 
clien_direccion='".$clienteVO->getdireccion()."',
clien_contrato='".$clienteVO->getcontrato()."', 
gene_id='".$clienteVO->getgenero()."',
muni_id='".$clienteVO->getmunicipio()."' ,
clien_observacion='".$clienteVO->getobservacion()."',
clien_fecha_nacimiento='".$clienteVO->getfnacimiento()."'
WHERE clien_id='".$clienteVO->getid_cliente()."'";

echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}
//-------------------------------------------------------------
public function actualizarclientesoporte($clienteVO)
{

$sql="UPDATE principal.servicio
SET 
torre_id='".$clienteVO->gettorre()."',
clien_direccion_ip='".$clienteVO->getip()."'
WHERE clien_id='".$clienteVO->getid_cliente()."'";

  // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}

public function actualizarclienteobservacion($clienteVO)
{

$sql="UPDATE principal.cliente
SET clien_observacion='".$clienteVO->getobservacion()."'
WHERE clien_id='".$clienteVO->getid_cliente()."'";

// echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}


//-------------------------------------------------------------
//-------------------------------------------------------------
#
public function actualizarclienterecepcion($clienteVO)
{

$sql="UPDATE principal.cliente
SET 
tipo_nit_id='".$clienteVO->gettipo_documento()."',
clien_nombre='".$clienteVO->getnombre()."',
clien_apellido='".$clienteVO->getapellido()."', 
clien_nit='".$clienteVO->getdocumento()."',
clien_telefono='".$clienteVO->gettelefono()."', 
clien_direccion='".$clienteVO->getdireccion()."',
gene_id='".$clienteVO->getgenero()."',
muni_id='".$clienteVO->getmunicipio()."' ,
clien_observacion='".$clienteVO->getobservacion()."',
clien_fecha_nacimiento='".$clienteVO->getfnacimiento()."'
WHERE clien_id='".$clienteVO->getid_cliente()."'";

// echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
	$sql2="UPDATE principal.servicio
			SET 
			clien_fecha_instalacion='".$clienteVO->getfinstalacion()."'
			WHERE clien_id='".$clienteVO->getid_cliente()."'";
			$rs=$this->conexion->consulta($sql2);

	$afectados2=$this->conexion->filasafectadas();

	if ($afectados2) {
		# code...
	return true;

	}
}else
{
return false;
}

} #FIN DE LA FUNCION


//-------------------------------------------------------------
public function actualizarclientefacturacion($clienteVO,$id)
{

$sql="UPDATE principal.servicio
SET 
serv_canal='".$clienteVO->getcanal()."',
serv_mensualidad='".$clienteVO->getmensualidad()."',
serv_derechos='".$clienteVO->getderechos()."'
WHERE serv_id=$id";

 // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}

//-------------------------------------------------------------

//-------------------------------------------------------------
public function actualizarclienteinstalacion($clienteVO,$id)
{

$sql="UPDATE principal.servicio
SET 
clien_tipo_conexion='".$clienteVO->gettipo_conexion()."',
clien_direccion_mac='".$clienteVO->getmac()."',
clien_caja_nap='".$clienteVO->getcaja_nap()."',
clien_puerto_nap='".$clienteVO->getpuerto_nap()."',
ante_id='".$clienteVO->getantena()."',
serv_ssid='".$clienteVO->getssid()."',
serv_pass='".$clienteVO->getpasswordssid()."'
WHERE serv_id=$id";

   // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}

//-------------------------------------------------------------

public function actualizarclienteinstalacionrouter($clienteVO,$id)
{

$sql="UPDATE principal.cliente_router
SET 
rou_id='".$clienteVO->getrouter()."',
clien_mac_router='".$clienteVO->getmac_router()."'
WHERE serv_id=$id";

// echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}
//-------------------------------------------------------------

public function actualizarclientefacturacioncontrato($clienteVO)
{

$sql="UPDATE principal.cliente
SET 
clien_contrato='".$clienteVO->getcontrato()."'
WHERE clien_id='".$clienteVO->getid_cliente()."'";

 // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}

//-------------------------------------------------------------
public function actualizarclienteservicio($clienteVO,$id)
{

$sql="UPDATE principal.servicio
SET 
clien_direccion_ip='".$clienteVO->getip()."',
clien_torre='".$clienteVO->gettorre()."',
clien_fecha_instalacion='".$clienteVO->getfinstalacion()."',
clien_direccion_mac='".$clienteVO->getmac()."',
clien_tipo_conexion='".$clienteVO->gettipo_conexion()."',
clien_caja_nap='".$clienteVO->getcaja_nap()."',
clien_puerto_nap='".$clienteVO->getpuerto_nap()."',
serv_canal='".$clienteVO->getcanal()."',
serv_mensualidad='".$clienteVO->getmensualidad()."',
serv_derechos='".$clienteVO->getderechos()."'
WHERE serv_id='".$id."'";

  // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}

//-------------------------------------------------------------
public function actualizarclienterouter($clienteVO,$id)
{

$sql="UPDATE principal.cliente_router
SET 

rou_id='".$clienteVO->getrouter()."',
clien_mac_router='".$clienteVO->getmac_router()."'
WHERE clirou_id='".$id."'";

 // echo $sql;  exit;
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}

}
//---------------------------------------------------------


public function actualizarclaveusuario($nueva,$id)
{

$sql="UPDATE principal.acceso
SET acce_password='$nueva' 
WHERE usua_id='$id'";

// echo($sql), exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;

}

}


public function  listartipodocumento()
{
# code...
$lista=array();

$sql="SELECT * FROM principal.tipo_nit WHERE tipo_nit_activo ='SI'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}

public function  listarmunicipios()
{
# code...
$lista=array();

$sql="SELECT * FROM principal.municipio WHERE muni_activo='SI' ORDER BY muni_nombre ASC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}

public function listartorre($id)
{
# code...
$lista=array();

$sql="SELECT * FROM principal.torre t
WHERE t.muni_id=(SELECT muni_id FROM principal.municipio WHERE muni_nombre='$id')
AND t.torre_activo='SI'
ORDER BY t.torre_nombre ASC";

 // echo $sql;exit();



$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}

public function listartorre2($id)
{
# code...
$lista=array();

$sql="SELECT * FROM principal.torre t
WHERE t.muni_id='$id'
AND t.torre_activo='SI'
ORDER BY t.torre_nombre ASC";

 // echo $sql;exit();



$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}

public function  listarantenas()
{
# code...
$lista=array();

$sql="SELECT * FROM principal.moduloantena WHERE ante_activo='SI' ORDER BY ante_nombre ASC";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}

public function  listarrouter()
{
# code...
$lista=array();

$sql="SELECT * FROM principal.router WHERE rou_activo='SI' ORDER BY rou_nombre ASC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{
$lista[]=$row;
}

return $lista;
}
else {
return 0;
}
}


public function  listartipoacceso()
{
# code...
$lista=array();

$sql="SELECT * FROM principal.tipo_acceso";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}

return $lista;
}
else {
return 0;
}
}


public function  listardepartamentos()
{

$lista=array();

$sql="SELECT * FROM principal.departamento"; //echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}

return $lista;
}
else {
return 0;
}
}



public function   listartiposerviciocotizacion($id)
{

$lista=array();

$sql="SELECT *
FROM principal.servicio_canal_municipio a, principal.servicio s, principal.canal c, principal.municipio m
WHERE a.serv_id=s.serv_id
AND a.canal_id=c.canal_id
AND a.muni_id=m.muni_id
AND a.scm_activo='SI'
AND a.muni_id='$id'";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{

$lista[]=$row;

}

return $lista;
}
else {
return 0;
}
}
//----------------------------------------------------------------------------------------------------------
public function   listarusuarioaux()
{

$lista=array();

$sql="SELECT * FROM principal.usuario";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{



$lista[]=$row;

}

return $lista;
}
else {
return 0;
}
}


//----------------------------------------------------------------------------------------------------------
public function   listartipofalla()
{

$lista=array();

$sql="SELECT *
FROM principal.tipo_falla
WHERE falla_activo='SI'
ORDER BY falla_nombre ASC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{
while ($row=$this->conexion->extraerRegistros())
{



$lista[]=$row;

}

return $lista;
}
else {
return 0;
}
}


//--------------------------------------------------------------------------------------------------------

public function listarclientesreporte()
{
$lista=array();
$sql="SELECT a.clien_id,a.clien_nit,a.clien_nombre,a.clien_apellido,a.clien_direccion,a.clien_telefono,a.clien_contrato,a.clien_moroso,b.muni_nombre,d.tipo_nit_abreviacion,a.clien_fecha_moroso,a.clien_aplicacion_activo
		FROM principal.cliente a, principal.municipio b, 
		principal.genero c, principal.tipo_nit d 
		WHERE a.muni_id=b.muni_id
		AND a.gene_id=c.gene_id
		AND a.tipo_nit_id=d.tipo_nit_id
		AND a.clien_activo='SI'
		ORDER BY a.clien_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//---------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------------------------

public function listarclientes()
{
$lista=array();
$sql="SELECT a.clien_id,a.clien_nit,a.clien_nombre,a.clien_apellido,a.clien_direccion,a.clien_telefono,a.clien_contrato,s.clien_direccion_ip,a.clien_moroso,a.clien_fecha_moroso,
		s.clien_direccion_mac, s.clien_torre,b.muni_nombre,d.tipo_nit_abreviacion
		FROM principal.cliente a,
		 principal.municipio b, 
		principal.genero c,
		 principal.tipo_nit d, 
		 principal.servicio s
		WHERE a.muni_id=b.muni_id
		AND a.gene_id=c.gene_id
		AND a.tipo_nit_id=d.tipo_nit_id
		AND a.clien_id=s.clien_id
		AND a.clien_activo='SI'
		ORDER BY a.clien_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//---------------------------------------------------------------------------------------

public function listarclientesretirados()
{
$lista=array();
$sql="SELECT *  FROM principal.cliente a, principal.municipio b, principal.genero c, principal.tipo_nit d 
WHERE a.muni_id=b.muni_id
AND a.gene_id=c.gene_id
AND a.tipo_nit_id=d.tipo_nit_id
AND a.clien_activo='NO'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//---------------------------------------------------------------------------------------

public function listadodeservicios($estado,$acce_id)
{
$lista=array();
$sql="SELECT * FROM principal.ticket a, principal.cliente b, principal.tipo_falla c, principal.departamento d, principal.usuario e, principal.municipio m
	WHERE  a.depa_id IN (SELECT depa_id FROM principal.acceso_departamento WHERE acce_id='$acce_id' AND acce_depa_activo='SI')
	AND a.clien_id=b.clien_id
	AND a.falla_id=c.falla_id
	AND a.depa_id=d.depa_id
	AND a.usua_id=e.usua_id
	AND b.muni_id=m.muni_id
	AND a.tick_estado='$estado'
	ORDER BY a.tick_id desc";

	// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//--------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------

public function listadodeserviciosrecepcion($estado,$acce_id)
{
$lista=array();
$sql="SELECT * FROM principal.ticket a, principal.cliente b, principal.tipo_falla c, principal.departamento d, principal.usuario e, principal.municipio m
	WHERE a.clien_id=b.clien_id
	AND a.falla_id=c.falla_id
	AND a.depa_id=d.depa_id
	AND a.usua_id=e.usua_id
	AND b.muni_id=m.muni_id
	AND a.tick_estado='$estado'
	ORDER BY a.tick_id desc";

	 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//--------------------------------------------------------------------------------------
public function listarclientesestudio()
{
$lista=array();
$sql="SELECT *  FROM principal.cliente_temporal a, principal.municipio b, principal.genero c, principal.tipo_nit d 
WHERE a.muni_id=b.muni_id
AND a.gene_id=c.gene_id
AND a.tipo_nit_id=d.tipo_nit_id
AND a.temp_estado!='Aprobado' 
ORDER BY a.temp_id ASC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function seleccionarclientesestudio($id)
{
$lista=array();
$sql="SELECT *  FROM principal.cliente_temporal a, principal.municipio b, principal.genero c, principal.tipo_nit d 
WHERE a.muni_id=b.muni_id
AND a.gene_id=c.gene_id
AND a.tipo_nit_id=d.tipo_nit_id
AND temp_id='$id'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}





public function seleccionarclienteservicio($id)
{

$lista=array();

$sql="SELECT *
FROM principal.cliente a, principal.vehiculo b ,principal.clase_auto c, principal.tipo_documento d 
WHERE b.id_vehiculo='$id' 
AND b.id_cliente=a.id_cliente 
AND a.id_tipo_documento=d.id_tipo_documento 
AND b.id_clase_auto=c.id_clase_auto";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;


}
return $lista;
}else{
return 0;
}

}

//-----------------------------------------------------------------------------------------

public function informacionusuario($id){

$lista=array();

$sql="SELECT *
FROM principal.usuario a, principal.tipo_nit b, principal.genero c
WHERE a.usua_id='$id'
AND a.tipo_nit_id=b.tipo_nit_id
AND a.gene_id=c.gene_id";

 // echo($sql);exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//-----------------------------------------------------------------------------------------
public function verificarusuario2($id){

$lista=array();

$sql="SELECT * FROM principal.acceso WHERE usua_id='$id'";

 // echo($sql);exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//-----------------------------------------------------------------------------------------

public function info_reporte_ticket($id,$finicio,$ffinal){

$lista=array();

$sql="SELECT *
FROM principal.ticket a, principal.tipo_falla f,principal.departamento d,principal.comentario c
WHERE a.clien_id='$id'
AND a.falla_id=f.falla_id
AND a.depa_id=d.depa_id
AND a.tick_id=c.tick_id
AND a.tick_fecha_inicio BETWEEN '$finicio' AND '$ffinal'

-- AND a.tick_estado='Cerrado'
 ";

  // echo $sql;exit;
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
// $_SESSION['DATOSDELCLIENTE']=$row;
}
return $lista;
}else{
return 0;
}
}

//-----------------------------------------------------------------------------------------
public function informacioncliente($id){

$lista=array();

$sql="SELECT *
FROM principal.cliente a, principal.tipo_nit b, principal.genero c, principal.municipio d, 
	 principal.servicio s, principal.cliente_router cr,principal.router r, principal.moduloantena mo, principal.torre t
WHERE a.clien_id='$id'
AND a.tipo_nit_id=b.tipo_nit_id
AND a.muni_id=d.muni_id
AND a.gene_id=c.gene_id
AND a.clien_id=s.clien_id
AND s.serv_id=cr.serv_id
AND cr.rou_id=r.rou_id
AND s.ante_id=mo.ante_id 
AND s.torre_id=t.torre_id 
LIMIT 1";

 // echo $sql;exit;
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
$_SESSION['DATOSDELCLIENTE']=$row;
}
return $lista;
}else{
return 0;
}
}

//-----------------------------------------------------------------------------------------

public function informacionfotoscliente($id){

$lista=array();

$sql="SELECT *
FROM principal.cliente a, principal.foto f
WHERE a.clien_id='$id'
AND a.clien_id=f.clien_id";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
}
return $lista;
}else{
return 0;
}
}
// ---------------------------------------------------------------


public function TraerEstadoMoroso($id){

$lista=array();

$sql="SELECT *
FROM principal.cliente_moroso
WHERE clien_id='$id'
ORDER BY moro_id ASC LIMIT 1 ";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
}
return $lista;
}else{
return 0;
}
}

// --------------------------------------------------------------
public function listarfotos($id){

$lista=array();

$sql="SELECT * FROM principal.foto f
WHERE f.clien_id='$id' 
ORDER BY f.foto_id DESC
LIMIT 4";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function Historial_Moroso($clp){

$lista=array();

$sql="SELECT * FROM principal.factura
WHERE clien_contrato='$clp' 
ORDER BY fact_fecha_emision ASC
LIMIT 2";

// echo $sql;exit;

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listarfotosrespuesta($id){

$lista=array();

$sql="SELECT * FROM principal.documento_respuesta f
WHERE f.tick_id='$id' 
ORDER BY f.dore_id DESC
LIMIT 4";

// echo($sql);exit;

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listarfotosestudio($id){

$lista=array();

$sql="SELECT f.foto_temp_id as foto_id, f.foto_temp_nombre as foto_nombre FROM principal.foto_temporal f
WHERE f.temp_id='$id' 
ORDER BY f.temp_id DESC
LIMIT 4";
 // echo $sql; exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listardocumentoticket($id){

$lista=array();

$sql="SELECT * FROM principal.documento_ticket f
WHERE f.tick_id='$id'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function listardocumentoticket2($id){

$lista=array();

$sql="SELECT * FROM principal.documento_ticket f
WHERE f.tick_id='$id'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);
if($cantidad>0){
while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function informacionclientetemp($id)
{
$lista=array();

$sql="SELECT *
FROM principal.cliente_temporal a, principal.tipo_nit b, principal.genero c, principal.municipio d
WHERE temp_id='$id'
AND a.tipo_nit_id=b.tipo_nit_id
AND a.muni_id=d.muni_id
AND a.gene_id=c.gene_id";


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;
$_SESSION['DATOSDELCLIENTE']=$row;

}
return $lista;
}else{
return 0;
}
}


public function traerfotostemporales($id)
{
$lista=array();

$sql="SELECT *
FROM principal.foto_temporal 
WHERE temp_id='$id'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function informacionticketespecifico($id)
{
$lista=array();

$sql="SELECT * FROM 
principal.cliente a, principal.tipo_nit b, principal.genero c, principal.municipio d,
principal.ticket e, principal.tipo_falla f, principal.departamento g, principal.usuario u,
principal.router r, principal.servicio s, principal.cliente_router cr
WHERE e.tick_id='$id'
AND a.tipo_nit_id=b.tipo_nit_id
AND a.muni_id=d.muni_id
AND a.gene_id=c.gene_id
AND e.clien_id=a.clien_id 
AND e.falla_id=f.falla_id
AND e.depa_id=g.depa_id
AND a.clien_id=s.clien_id
AND s.serv_id=cr.serv_id
AND cr.rou_id=r.rou_id
AND e.usua_id=u.usua_id";

 // echo($sql);exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function informacionticketespecificoreporte($id)
{
$lista=array();

$sql="SELECT * FROM 
principal.cliente a, principal.tipo_nit b, principal.genero c, principal.municipio d, principal.ticket e, principal.tipo_falla f,
principal.departamento g, principal.usuario u, principal.comentario k
WHERE e.tick_id='$id'
AND a.tipo_nit_id=b.tipo_nit_id
AND a.muni_id=d.muni_id
AND a.gene_id=c.gene_id
AND e.clien_id=a.clien_id 
AND e.falla_id=f.falla_id
AND e.depa_id=g.depa_id
AND e.usua_id=u.usua_id
AND e.tick_id=k.tick_id";

 // echo($sql);exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function informacionmensaje($id)
{
$lista=array();

$sql="SELECT * FROM principal.chat a, principal.usuario b, principal.tipo_acceso c, principal.departamento d , principal.acceso e  
WHERE a.chat_id='$id'
AND a.chat_id_remite=b.usua_id
AND b.usua_id=e.usua_id
AND e.tipo_id=c.tipo_id
AND e.depa_id=d.depa_id";

// echo($sql);exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function informacionticketanexo($id)
{
$lista=array();

$sql="SELECT * FROM 
principal.ticket e, principal.comentario h
WHERE e.tick_id='$id'
AND e.tick_id=h.tick_id";

 // echo($sql);exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function informacionticketcomentario($id)
{
$lista=array();

$sql="SELECT * FROM 
principal.ticket e, principal.comentario h
WHERE e.tick_id='$id'
AND e.tick_id=h.tick_id
ORDER BY comen_fecha_hora DESC";

 // echo($sql);exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function informacionticket($id,$fecha)
{
$lista=array();

$sql="SELECT * FROM 
principal.ticket a, principal.usuario b, principal.cliente c, principal.tipo_falla d, principal.departamento e 
WHERE a.clien_id='$id' 
AND a.clien_id=c.clien_id
AND a.usua_id=b.usua_id
AND a.falla_id=d.falla_id
AND a.depa_id=e.depa_id
-- AND a.tick_fecha_inicio='$fecha'
AND a.tick_estado='Abierto'
ORDER BY a.tick_id DESC
LIMIT 5";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
}
return $lista;
}else{
return 0;
}
}

// 
public function buscarcorreocliente($id)
{
$lista=array();

$sql="SELECT clien_correo FROM principal.cliente c
WHERE c.clien_id='$id'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
}
return $lista;
}else{
return 0;
}
}
// 

public function informacionservicio($id)
{
$lista=array();

$sql="SELECT *
FROM principal.ticket a,principal.tipo_falla b,principal.departamento c,
principal.usuario d 
WHERE a.clien_id='$id'
AND a.usua_id=d.usua_id
AND a.falla_id=b.falla_id
AND a.depa_id=c.depa_id
ORDER BY a.tick_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}




public function guardaracceso($usuario,$tipo,$usua_id,$password)
{

$sql="INSERT INTO principal.acceso(acce_usuario,acce_password,tipo_id,usua_id,acce_activo)
VALUES(
'$usuario', 
'$password', 
'$tipo',
'$usua_id',
'SI')";

 // echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}


public function actualizaracceso($usuario,$tipo_acceso,$usua_id)
{

$sql=" UPDATE principal.acceso SET 
	   acce_usuario='$usuario',
	   tipo_id='$tipo_acceso'
	   WHERE  usua_id='$usua_id'";


// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function actualizancocorreocliente($id,$correo)
{

$sql=" UPDATE principal.cliente SET 
	   clien_correo='$correo'
	   WHERE  clien_id='$id'";


// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function guardarservicio($tabla,$campos,$campo2,$nombre)
{
$sql="INSERT INTO principal.$tabla($campos,$campo2)
values(
'$nombre',
'SI')";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function guardarmodulotorre($tabla,$campos,$campo2,$campo3,$campo4,$valor,$valor2,$valor3,$valor4)
{
$sql="INSERT INTO principal.$tabla($campos,$campo2,$campo3,$campo4)
values(
'$valor',
'$valor2',
'$valor3',
'$valor4')";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function actualizarservicio($tabla,$campo,$valor,$campo2,$id)
{
$sql="UPDATE principal.$tabla SET 
	   $campo='$valor'
	   WHERE  $campo2='$id'";

	   // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}


public function guardarprograma($tabla,$campo,$campo2,$campo3,$estado,$campo4,$valor,$valor2,$valor3,$valor4)
{
$sql="INSERT INTO principal.$tabla($campo,$campo2,$campo3,$estado,$campo4)
values(
'$valor','$valor2','$valor3','SI',$valor4)";

// echo $sql;
// exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}


public function eliminarusuario($id)
{
$sql=" UPDATE principal.acceso SET acce_activo='NO' WHERE acce_id='".$id."'";


$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}
}

public function actualizarestadomensaje($id)
{

$sql=" UPDATE principal.chat SET chat_estado='Leido' WHERE chat_id='$id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;

}
}


public function eliminarservicio($tabla,$campo,$campo2,$id)
{
# code...
$sql=" UPDATE principal.$tabla SET $campo='NO' WHERE $campo2='$id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function eliminarcliente($id)
{
# code...
$sql="UPDATE principal.cliente SET clien_activo='NO' WHERE clien_id='$id'";

$sql2="UPDATE principal.servicio SET clien_direccion_ip='',clien_direccion_mac='' WHERE clien_id='$id'";



$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
// return true;

$rs=$this->conexion->consulta($sql2);
$afectados2=$this->conexion->filasafectadas();

if ($afectados2) {
	return true;
}else{
	return false;

}

}
else{
return false;
}

}

public function morosocliente($id,$estado,$fecha)
{
# code...
$sql="INSERT INTO principal.cliente_moroso(moro_fecha,moro_estado,clien_id)
			VALUES('$fecha','$estado','$id')";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function morosocliente2($id,$estado,$fecha)
{
# code...
$sql="UPDATE principal.cliente SET clien_fecha_moroso='$fecha', clien_moroso='$estado' WHERE clien_id='$id'";

// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

public function eliminarestudio($id)
{
# code...
$sql=" UPDATE principal.cliente_temporal SET temp_estado='No Aprobado' WHERE temp_id='$id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////
public function estudiovisitado($nit,$nombre,$apellido,$direccion,$telefono,$municipio,$genero,$tipo_nit,$id,$observacion,$usua_id)
{
# code...
$sql=" UPDATE principal.cliente_temporal SET
		temp_nit=$nit, 
		temp_nombre='$nombre',
		temp_apellido='$apellido',
		temp_direccion='$direccion',
		temp_telefono='$telefono',
		muni_id=$municipio,
		gene_id=$genero,
		tipo_nit_id=$tipo_nit,   
		temp_estado='Visitado',
		temp_observacion='$observacion',
		usua_id_visito='$usua_id'  
		WHERE temp_id='$id'";

// echo $sql;exit;

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////

public function activarservicio($tabla,$campo,$campo2,$id)
{
# code...
$sql=" UPDATE principal.$tabla SET $campo='SI' WHERE $campo2='$id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

public function reactivarticket($id)
{
# code...
$sql=" UPDATE principal.ticket SET tick_estado='Abierto'  WHERE tick_id='$id'";

//echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////

public function activarusuario($tabla,$campo,$campo2,$id)
{
# code...
$sql=" UPDATE principal.$tabla SET $campo='SI' WHERE $campo2='$id'";

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////

public function buscarclienteticket($documento,$campo,$tabla,$condicion)
{
$lista=array();

$sql="SELECT *
FROM principal.$tabla a, principal.genero b, principal.municipio c, principal.tipo_nit d
WHERE $campo LIKE '%$documento%'
AND a.gene_id=b.gene_id
AND a.muni_id=c.muni_id
AND a.tipo_nit_id=d.tipo_nit_id
$condicion";

//echo($sql);exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$lista[]=$row;

}
return $lista;
}else{
return 0;
}

}


public function ventadeldia($fechainicio,$fechafin)
{

$sql="";


$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados){
return true;
}
else{
return false;
}

}





public function cantidadnotificacionabiertos($depa_id)
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket
WHERE depa_id='$depa_id' 
AND tick_estado='Abierto'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$cantidad=$row["cantidad"];
// echo $cantidad;exit();
}
return $cantidad;
}else{
return 0;
}

}

public function cantidadnotificacion($estado,$acce_id)
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket
WHERE depa_id IN (SELECT depa_id FROM principal.acceso_departamento WHERE acce_id='$acce_id' AND acce_depa_activo='SI') 
AND tick_estado='$estado'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$cantidad=$row["cantidad"];
// echo $cantidad;exit();
}
return $cantidad;
}else{
return 0;
}

}

public function cantidadnotificacioncerradosrecepcion()
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket
WHERE tick_estado='Cerrado'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$cantidad=$row["cantidad"];
// echo $cantidad;exit();
}
return $cantidad;
}else{
return 0;
}

}

public function listarticketcerradosrecepcion()
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket
WHERE tick_estado='Cerrado'
LIMIT 5";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){

$cantidad=$row["cantidad"];
// echo $cantidad;exit();
}
return $cantidad;
}else{
return 0;
}

}

public function listamisdepartamentos($acce_id)
{

$lista=array();

$sql="SELECT * FROM principal.departamento a, principal.acceso_departamento b
WHERE b.acce_id='$acce_id' 
AND b.depa_id=a.depa_id
AND b.acce_depa_activo='SI'";



$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if ($cantidad>0)
{

while ($row=$this->conexion->extraerRegistros())
{


$lista[]=$row;

}
return $lista;
}
else {
return 0;
}

}

public function cantidadchat($id)
{

$sql="SELECT COUNT(chat_id) AS cantidad FROM principal.chat
WHERE chat_id_recibe='$id' 
AND chat_estado='SinLeer'";



$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}



public function cantidadclientesininfo($estado)
{

$sql="SELECT COUNT(clien_id) AS cantidad FROM principal.cliente
WHERE clien_estado_2='$estado'";


// echo $sql;exit;
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}


public function cantidadcliente()
{

$sql="SELECT COUNT(clien_id) AS cantidad FROM principal.cliente WHERE clien_activo='SI'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}

public function cantidadclienteretirados()
{

$sql="SELECT COUNT(clien_id) AS cantidad FROM principal.cliente WHERE clien_activo='NO'";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}

public function cantidadusuarios()
{

$sql="SELECT COUNT(b.usua_id) AS cantidad 
FROM  principal.acceso b 
WHERE b.acce_activo='SI'";



$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}

public function cantidadservicioscerrados()
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket WHERE tick_estado='Cerrado'";

// echo($sql);
//exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}




public function cantidadserviciosabiertos()
{

$sql="SELECT COUNT(tick_id) AS cantidad FROM principal.ticket WHERE tick_estado='Abierto'";

//  echo($sql);
// exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$cantidad=$row["cantidad"];
}
return $cantidad;
}else{
return 0;
}

}

public function verificarmodulotorre($tabla,$campo,$campo2,$campo3,$valor,$valor2,$valor3)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$valor'
AND $campo2='$valor2'
AND $campo3='$valor3'";


 // echo $sql;exit();      

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}


public function verificarservicio2($tabla,$campo,$nombre)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$nombre'";  

 // echo $sql;exit();      

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}

public function verificarmunicipio($tabla,$campo,$nombre)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$nombre'
AND muni_activo='SI'";        

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}


public function verificarrouter($tabla,$campo,$nombre)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$nombre'
AND rou_activo='SI'";        

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}


public function verificar($tabla,$campo,$nombre,$estado)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$nombre'
AND $estado='SI'";        

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}

public function verificarprograma($tabla,$campo,$campo2,$campo3,$estado,$valor,$valor2,$valor3)
{
# code...
$sql="SELECT * FROM principal.$tabla 
WHERE $campo='$valor'
AND $campo2='$valor2'
AND $campo3='$valor3'
AND $estado='SI'";    
// echo $sql;exit();
$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas();

if ($cantidad>0){

return 1;

}else{

return 0;  

}
}

public function solicitudespordia($fecha)
{
$lista=array();

$sql="SELECT *
FROM principal.ticket a,principal.cliente b, principal.tipo_falla c,principal.departamento d, principal.usuario e, principal.municipio f
WHERE a.tick_fecha_inicio='$fecha'
AND a.clien_id=b.clien_id
AND a.falla_id=c.falla_id
AND a.depa_id=d.depa_id
AND a.usua_id=e.usua_id
AND b.muni_id=f.muni_id";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){
$lista[]=$row;
}
return $lista;
}else{
return 0;
}
}

public function listarsolicitudes($acce_id)
{
$lista=array();

$sql="SELECT *
FROM principal.ticket a,principal.cliente b, principal.tipo_falla c,principal.usuario d
WHERE a.depa_id IN (SELECT depa_id FROM principal.acceso_departamento WHERE acce_id='$acce_id' AND acce_depa_activo='SI')
AND a.clien_id=b.clien_id
AND a.falla_id=c.falla_id
AND a.usua_id=d.usua_id
AND a.tick_estado='Abierto'
ORDER BY a.tick_id DESC
LIMIT 5";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listarsolicitudescerradas($acce_id)
{
$lista=array();

$sql="SELECT *
FROM principal.ticket a,principal.cliente b, principal.tipo_falla c,principal.usuario d
WHERE a.depa_id IN (SELECT depa_id FROM principal.acceso_departamento WHERE acce_id='$acce_id' AND acce_depa_activo='SI') 
AND a.clien_id=b.clien_id
AND a.falla_id=c.falla_id
AND a.usua_id=d.usua_id
AND a.tick_estado='Cerrado'
ORDER BY a.tick_id DESC
LIMIT 5";

// echo $sql; exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function listarsolicitudescerradasrecepcion()
{
$lista=array();

$sql="SELECT *
FROM principal.ticket a,principal.cliente b, principal.tipo_falla c,principal.usuario d
WHERE a.clien_id=b.clien_id
AND a.falla_id=c.falla_id
AND a.usua_id=d.usua_id
AND a.tick_estado='Cerrado'
ORDER BY a.tick_id DESC
LIMIT 5";

// echo $sql; exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listarchat($id)
{
$lista=array();

$sql="SELECT *
FROM principal.chat a,principal.usuario b
WHERE a.chat_id_recibe='$id'
AND a.chat_id_remite=b.usua_id
AND a.chat_estado='SinLeer'
ORDER BY a.chat_id DESC";
// echo $sql; exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listaestadocliente($estado)
{
$lista=array();

$sql="SELECT * FROM principal.cliente a
WHERE a.clien_estado_2='$estado'";
// echo $sql; exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function listarchat2($id)
{
$lista=array();

$sql="SELECT *
FROM principal.chat a,principal.usuario b
WHERE a.chat_id_recibe='$id'
AND a.chat_id_remite=b.usua_id
ORDER BY a.chat_id DESC";

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


//---------------------------------------------------------------------------------

public function seleccionartipofalla($id)
{
$lista=array();

$sql="SELECT falla_nombre
FROM principal.tipo_falla WHERE falla_id='$id'";

//echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//---------------------------------------------------------------------------------

public function traeracceso($id)
{
$lista=array();

$sql="SELECT acce_id FROM principal.acceso WHERE usua_id='$id'";

//echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//---------------------------------------------------------------------------------

public function verificardepartamento($acceso,$depa)
{
$lista=array();

$sql="SELECT acce_depa_id,acce_depa_activo FROM principal.acceso_departamento 
	  WHERE acce_id='$acceso'
	  AND depa_id='$depa'
	  AND acce_depa_activo='SI'
	  LIMIT 1 ";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//---------------------------------------------------------------------------------
public function verificar_acceso_departamento($depa,$acceso)
{

$sql="SELECT * FROM principal.acceso_departamento WHERE depa_id='$depa' AND acce_id='$acceso' AND acce_depa_activo='SI'";

// echo $sql;exit();


$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//---------------------------------------------------------------------------------

public function verificar_acceso_depa($depa,$acceso)
{

$sql="INSERT INTO principal.acceso_departamento(acce_id,depa_id,acce_depa_activo)
			VALUES('$acceso','$depa','SI')";

 // echo $sql;exit();


$rs=$this->conexion->consulta($sql);

$afectados=$this->conexion->filasafectadas();

if($afectados){

return true;
}
else{
return false;
}
}

//--------------------------------------------------------------------------------

public function solicitudespormes($municipio,$fechainicio,$fechafin,$estado,$falla_id)
{
$lista=array();

$sql="SELECT clien_nombre, clien_apellido, muni_nombre,falla_nombre, 
	  usua_nombre, usua_apellido, depa_nombre FROM
	  principal.ticket a,principal.cliente b, principal.tipo_falla c,
	  principal.departamento d, principal.usuario e, principal.municipio f
	  WHERE a.tick_fecha_inicio BETWEEN '$fechainicio' AND '$fechafin'
	  AND a.clien_id=b.clien_id
	  AND a.falla_id=c.falla_id
	  AND a.falla_id='$falla_id'
	  AND a.depa_id=d.depa_id
 	  AND a.usua_id=e.usua_id
	  AND b.muni_id=f.muni_id
	  AND a.tick_estado='$estado'
	  AND b.muni_id='$municipio'
	  ORDER BY a.tick_fecha_inicio ASC";

	//  echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}


public function solicitudespormes2($municipio,$fechainicio,$fechafin,$falla_id)
{
$lista=array();

$sql="SELECT clien_nombre, clien_apellido, muni_nombre,falla_nombre, 
	  usua_nombre, usua_apellido, depa_nombre FROM
	  principal.ticket a,principal.cliente b, principal.tipo_falla c,
	  principal.departamento d, principal.usuario e, principal.municipio f
	  WHERE a.tick_fecha_inicio BETWEEN '$fechainicio' AND '$fechafin'
	  AND a.clien_id=b.clien_id
	  AND a.falla_id=c.falla_id
	  AND a.falla_id='$falla_id'
	  AND a.depa_id=d.depa_id
 	  AND a.usua_id=e.usua_id
	  AND b.muni_id=f.muni_id
	  AND b.muni_id='$municipio'
	  ORDER BY a.tick_fecha_inicio ASC";

	 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function solicitudespormes4($municipio,$fechainicio,$fechafin,$falla_id)
{
$lista=array();

$sql="SELECT clien_nombre, clien_apellido, muni_nombre,falla_nombre, 
	  usua_nombre, usua_apellido, depa_nombre FROM
	  principal.ticket a,principal.cliente b, principal.tipo_falla c,
	  principal.departamento d, principal.usuario e, principal.municipio f
	  WHERE a.tick_fecha_inicio BETWEEN '$fechainicio' AND '$fechafin'
	  AND a.clien_id=b.clien_id
	  AND a.falla_id=c.falla_id
	  AND a.falla_id='$falla_id'
	  AND a.depa_id=d.depa_id
 	  AND a.usua_id=e.usua_id
	  AND b.muni_id=f.muni_id
	  AND b.muni_id='$municipio'
	  ORDER BY a.tick_fecha_inicio ASC";

	  //echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function solicitudespormes3($fechainicio,$fechafin)
{
$lista=array();


	  //echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

public function solicitudespormes5($fechainicio,$fechafin,$municipio)
{
$lista=array();

$sql="SELECT clien_nombre, clien_apellido, muni_nombre,falla_nombre, 
	  usua_nombre, usua_apellido, depa_nombre FROM
	  principal.ticket a,principal.cliente b, principal.tipo_falla c,
	  principal.departamento d, principal.usuario e, principal.municipio f
	  WHERE a.tick_fecha_inicio BETWEEN '$fechainicio' AND '$fechafin'
	  AND a.clien_id=b.clien_id
	  AND a.falla_id=c.falla_id
	  AND a.depa_id=d.depa_id
 	  AND a.usua_id=e.usua_id
	  AND b.muni_id=f.muni_id
	  AND b.muni_id='$municipio'
	  ORDER BY a.tick_fecha_inicio ASC";

	  echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//-------------------------------------------------------------
public function solicitudespormesfinal($sql)
{
$lista=array();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//----------------------------------------------------------------



//-------------------------------------------------------------
public function ConsultaReporteTipoDeConexion($sql)
{
$lista=array();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//----------------------------------------------------------------
public function solicitudespormesusuario($sql)
{
$lista=array();


 

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//---------------------------------------------------------------
public function solicitudespormesusuarioticket($sql)
{
$lista=array();


 

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}
//----------------------------------------------------------------

public function solicitudreportedeip($municipio)
{
$lista=array();

$sql="SELECT *
	  FROM
	  principal.cliente b, principal.municipio f, principal.router r, principal.servicio s, principal.cliente_router cr 
	  WHERE b.muni_id='$municipio'
	  AND b.muni_id=f.muni_id
	  AND b.clien_id=s.clien_id
	  AND s.serv_id=cr.serv_id
	  AND cr.rou_id=r.rou_id
	  AND b.clien_activo='SI'
	  ORDER BY s.clien_direccion_ip ASC";

	 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//-------------------------------------------------------------
public function solicitudreportedeiptodo()
{
$lista=array();

$sql="SELECT *
	  FROM
	  principal.cliente b, principal.municipio f, principal.router r, principal.servicio s, principal.cliente_router cr 
	  WHERE b.muni_id=f.muni_id
	  AND b.clien_id=s.clien_id
	  AND s.serv_id=cr.serv_id
	  AND cr.rou_id=r.rou_id
	  AND b.clien_activo='SI'
	  ORDER BY s.clien_direccion_ip ASC";

	 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//-------------------------------------------------------------

//-------------------------------------------------------------
public function solicitudreportedeestudiostodo($sql)
{
$lista=array();



	// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$cantidad=$this->conexion->cuentaFilas($rs);

if($cantidad>0){

while($row=$this->conexion->extraerRegistros()){


$lista[]=$row;

}
return $lista;
}else{
return 0;
}
}

//-------------------------------------------------------------
public function eliminartemp($id)
{
$sql="UPDATE principal.cliente_temporal
SET temp_estado='Aprobado'
WHERE temp_id='$id'";

// echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}

//-------------------------------------------------------------
public function quitardepartamentoacceso($id)
{
$sql="UPDATE principal.acceso_departamento
SET acce_depa_activo='NO'
WHERE acce_depa_id='$id'";

 // echo $sql;exit();

$rs=$this->conexion->consulta($sql);
$afectados=$this->conexion->filasafectadas();

if($afectados)
{
return true;
}
else
{
return false;
}
}




}

?>
