<div class="row">
<div class="col p-1">
                    <span class="anchor" id="formUserEdit"></span>
                    <!-- <hr class="my-1"> -->

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                        <!-- <h5 class="mb-1"> -->
                            Nuevo cliente
                        <!-- </h5> -->
                        </div>
                        <form class="form" role="form" autocomplete="off" id="form_cliente">

                        <div class="card-body">
                        <div class>
                        <h5 class="lead">Datos del cliente</h5>
                        <hr>
                        </div>
                            <div class="form-row">
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="nombre">Tipo de documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="C.C">Cedula de Ciudadania</option>
                                    <option value="C.T">Cedula Extranjera</option>
                                    <option value="NIT">NIT</option>
                                </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="documento">Documento</label>
                                <input type="text" class="form-control" placeholder="" id="documento">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" placeholder="" id="nombre">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" placeholder="" id="apellido">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="genero">Genero</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-control" id="genero">
                                    <option value="">Seleccionar</option>
                                    <option value="C.C">Hombre</option>
                                    <option value="C.T">Mujer</option>
                                    <option value="NIT">Empresa</option>
                                </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" placeholder="" id="telefono">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" placeholder="" id="direccion">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 p-1">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" placeholder="" id="email">
                                </div>
                            </div>
                            <br>
                            <!-- DATOS DEL SERVICIO -->
                            <div class>
                            <h5 class="lead">Datos del servicio</h5>
                            <hr>
                            </div>
                                <!-- <div class="form-group row">
                                    <label class="col-lg-2 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" value="Jane">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Bishop">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="email@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="url" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" size="0">
                                            <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                            <option value="Alaska">(GMT-09:00) Alaska</option>
                                            <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                            <option value="Arizona">(GMT-07:00) Arizona</option>
                                            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                            <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="janeuser">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div> -->
                                <hr>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-danger" value="Cancelar">
                                        <input type="button" class="btn btn-success" value="Guardar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                <!--/col-->
</div>