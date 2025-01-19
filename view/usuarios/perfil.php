<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">

    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdateUsuarios"); ?>" method="post" id="formUsu">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Mi perfil</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Usuarios</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Perfil

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="row justify-content-center align-items-center">
                            <style>
                                .img {
                                    width: 150px;
                                    /* Cambia este valor según lo necesites */
                                    height: auto;
                                    /* Mantiene la proporción */
                                }
                            </style>
                            <div class="avatar-xxl ">
                                <img src="<?= $_SESSION['foto'] ?>" alt="image profile"
                                    class="avatar- rounded-circle avatar-xxl" />
                            </div>
                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-6 col-lg-4">

                                        <div class="form-group mb-3">



                                            <div class="form-group">
                                                <label for="usuario_nombre_1">Primer nombre</label>
                                                <input type="text" name="usuario_nombre_1" id="" class="form-control"
                                                    value="<?= $_SESSION['primer nombre'] ?>" readonly>

                                            </div>
                                            <div class="form-group">
                                                <label for="usuario_nombre_2">Segundo nombre</label>
                                                <input type="text" name="usuario_nombre_2" id="usuario_nombre_2"
                                                    class="form-control" value="<?= $_SESSION['segundo nombre'] ?>"
                                                    readonly>
                                                <span class="small-text text-danger" id="error_usuario_nombre_2"></span>
                                            </div>


                                            <div class="form-group">
                                                <label for="usuario_correo">correo</label>
                                                <input type="text" name="usuario_correo" id="" class="form-control"
                                                    value="<?= $_SESSION['correo'] ?>" data-url='<?php
                                                      echo getUrl("Usuarios", "Usuarios", "validarCorreo", false, "ajax"); ?>'>
                                                <span class="small-text text-danger" id="error_usuario_correo"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="usuario_telefono">Telefono</label>
                                                <input type="text" name="usuario_telefono" id="usuario_telefono"
                                                    class="form-control" value="<?= $usu_telefono ?>">
                                                <span class="small-text text-danger" id="error_usuario_telefono"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">

                                        <div class="form-group mb-3">
                                            <div class="form-group">
                                                <label for="tipo_documento_id">Tipo de documento</label>
                                                <select name="tipo_documento_id" id="tipo_documento_id"
                                                    class="form-control" disabled>
                                                    <?php
                                                    foreach ($usuarios as $usu) {
                                                        echo "<option value='" . $usu['tipo_documento_id'] . "' selected>" . $usu['tipo_documento_nombre'] . "</option>";
                                                    }

                                                    foreach ($tipo_documento as $tipo_d) {
                                                        echo "<option  value='" . $tipo_d['tipo_documento_id'] . "'>" . $tipo_d['tipo_documento_nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <span class="small-text text-danger"
                                                    id="error_tipo_documento_id"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="usuario_apellido_1">Primer apellido</label>
                                                <input type="text" name="usuario_apellido_1" id="" class="form-control"
                                                    value="<?= $_SESSION['primer apellido'] ?>" readonly>
                                            </div>


                                            <div class="form-group">
                                                <label for="usuario_nueva_contrasenia"> Nueva Contraseña</label>
                                                <input type="password" name="usuario_nueva_contrasenia"
                                                    id="usuario_nueva_contrasenia" class="form-control"
                                                    placeholder="Nueva Contraseña">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_nueva_contrasenia"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="usuario_confirmar_contrasenia">Confirmar Contraseña</label>
                                                <input type="password" name="usuario_confirmar_contrasenia"
                                                    id="usuario_confirmar_contrasenia" class="form-control"
                                                    placeholder="Confirmar Contraseña">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_confirmar_contrasenia"></span>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-4">

                                        <div class="form-group mb-3">
                                            <div class="form-group">
                                                <label for="usuario_num_identificacion">Numero documento</label>
                                                <input type="text" name="usuario_num_identificacion" id=""
                                                    class="form-control" value="<?= $_SESSION['numero_documento'] ?>"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="usuario_apellido_2">Segundo apellido</label>
                                                <input type="text" name="usuario_apellido_2" id="" class="form-control"
                                                    value="<?= $_SESSION['segundo apellido'] ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="usuario_direccion">Direccion </label>
                                                <input type="text" name="usuario_direccion" id="" class="form-control"
                                                    value="<?= $_SESSION['direccion'] ?>" readonly>
                                            </div>



                                            <div class="form-group">
                                                <label for="rol_id">Rol</label>
                                                <select name="rol_id" id="rol_id" class="form-control" disabled>
                                                    <?php
                                                    foreach ($usuarios as $usu) {
                                                        echo "<option value='" . $usu['rol_id'] . "' selected>" . $usu['rol_nombre'] . "</option>";
                                                    }

                                                    foreach ($roles as $rol) {
                                                        echo "<option  value='" . $rol['rol_id'] . "'>" . $rol['rol_nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <span class="small-text text-danger"
                                                    id="error_tipo_documento_id"></span>
                                            </div>
                                            <input type="hidden" name="identificador_update" value="2">
                                        </div>
                                    </div>



                                </div>


                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <input type="submit" id="btnSubmit" class="btn btn-success" value="Enviar">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>