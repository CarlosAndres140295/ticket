<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top ">
			  <a class="navbar-brand" href="index.php">
				  <img src="../images/img.jpg" class="rounded-circle" style="width: 30px;height: 30px;"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Tablero<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuCliente" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
			          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuCliente">
				          <a class="dropdown-item" href="#" onclick="AgregarCliente()">Agregar nuevo cliente <span><i class="fa fa-user-plus"></i></span></a>
				          <a class="dropdown-item" href="#" onclick="ListarClientes()">Ver listado de clientes <span><i class="fa fa-users"></i></span></a>
				          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
			        </div>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Servicios</a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Manteniento</a>
			      </li>
			    <!-- </ul> -->
			  <!-- </div> -->

			  <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
			    <!-- <ul class="navbar-nav"> -->
			       <li class="nav-item dropdown active">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuPerfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Usuario
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuPerfil">
			          <a class="dropdown-item" href="#">Cuenta <span><i class="fa fa-user"></i></span></a>
			          <a class="dropdown-item" href="#">Contraseña <span><i class="fa fa-key"></i></span></a>
			          <a class="dropdown-item" href="#">Salir <span><i class="fa fa-power-off"></i></span></a>
			        </div>
			      </li>
			    </ul>
			  </div>
			</nav>