<!doctype html>
<html>
<head>
	<title>Bienvenido</title>
		<meta charset="utf-8">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
	<body>
	 <div class="container my-5">

	   <div class="row align-items-center">
			
		<!-- <div class="col-xs-1 col-md-3"></div> -->

		<div class="col">
		
		<h2 class="text-center"><img src="images/img.jpg" alt="" class="rounded-circle"></h2>
		<h1 class="text-center lead">Netics de Colombia</h1>
			<div id="respuesta"></div>
		   <div class="panel panel-default card">

		     <div class="card-header panel-heading center-block">
             Por favor inicie sesión 
		     </div>

			   <div class="panel-body card-body">
			   <form role="form" method="POST"  id="credenciales" action="">
				<div class="form-group">
				<div class="input-group">
			  	<div class="input-group-addon">
				<span id="" class="glyphicon glyphicon-user"></span></div>
				
				<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingrese su usuario">
				</div>
				</div>

				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span id="iconoclave" class="glyphicon glyphicon-eye-open" onClick="verClave()" style="cursor:pointer"></span></div>
			    <input type="password" id="clave" name="clave" class="form-control" placeholder="Ingrese su contraseña">
			    </div>
			    </div>
				<input  type="button" value="Iniciar sesión" id="enviar" class="btn btn-success"  >
			   </form>
			   </div>
		   </div>

		 </div>

	   <!-- <div class="col-xs-1 col-md-3"></div> -->

	   </div>
     </div>
		<script src="js/jquery.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/alertify.min.js"></script>
        <link rel="stylesheet" href="css/alertify.min.css">
   		<script src="js/jqueryUMI.js"></script>
   		<script src="js/alertify.min.js"></script>

	<script>
	var visto=true;
	function verClave(){
		if(visto)
		{
		$('#clave').attr('type','text');
		$('#iconoclave').removeClass('glyphicon glyphicon-eye-open');
		$('#iconoclave').addClass('glyphicon glyphicon-eye-close');
		}
		else
		{
		$('#clave').attr('type','password');
		$('#iconoclave').removeClass('glyphicon glyphicon-eye-close');
		$('#iconoclave').addClass('glyphicon glyphicon-eye-open');

		}
		visto=!visto;;
	}

	</script>
</body>
