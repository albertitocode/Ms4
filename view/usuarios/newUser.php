<?php
include_once '../lib/helphers.php';
include_once '../view/partials/scripts.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GEO CALI</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta charset="UTF-8">

    <link rel="icon" href="assets/img/logo1.png" type="image/x-icon" />
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.js"></script>
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />



    <!-- Enlace a SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.7/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Enlace a SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.7/dist/sweetalert2.all.min.js"></script>


</head>
<style>
    b {
        color: red;
    }

    .small-text {
        font-size: 12px;
    }

    body {

        background: linear-gradient(to bottom, #004594, #2c5c93);
        display: flex;
        height: 98vh;
        width: 100%;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        box-sizing: border-box;

    }
</style>

<body>
    <!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


    <div class="mt-5">


        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate", "", "ajax"); ?>" method="post"
            id="formUsu">
            <!-- <div class="page-header">
            <h3 class="fw-bold mb-3">Registrate</h3>
        </div> -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-tittle">
                                <h4> Registro de Usuarios</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><b>Los campos con un * son obligatorios</b></p>

                            <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">


                                        <div class="row">
                                            <?php if (isset($_SESSION['new_User'])) {
                                                echo "<script>
         Swal.fire({
             title: '¡Felicidades!',
             text: 'El usuario ha sido registrado exitosamente',
             icon: 'success',
             confirmButtonText: 'Aceptar'
         }).then((result) => {
             // Redirigimos al usuario después de que cierre la alerta
             if (result.isConfirmed) {
                 window.location.href = '" . getUrl("Usuarios", "Usuarios", "getUsuarios") . "';
             }
         });
     </script>";

                                                // Limpiar la variable de sesión para que no se muestre de nuevo
                                                unset($_SESSION['new_User']);
                                            }
                                            ?>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group">

                                                    <label for="usuario_nombre_1">Primer nombre <b>*</b></label>

                                                    <input type="text" name="usuario_nombre_1" id="usuario_nombre_1"
                                                        class="form-control" placeholder="Nombre 1">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_nombre_1"></span>
                                                </div>


                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="usuario_nombre_2">Segundo nombre</label>

                                                    <input type="text" name="usuario_nombre_2" id="usuario_nombre_2"
                                                        class="form-control" placeholder="Nombre 2">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_nombre_2"></span>


                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="usuario_apellido_1">Primer apellido <b>*</b></label>
                                                    <input type="text" name="usuario_apellido_1" id="usuario_apellido_1"
                                                        class="form-control" placeholder="Apellido 1">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_apellido_1"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="usuario_apellido_2">Segundo apellido</label>
                                                    <input type="text" name="usuario_apellido_2" id="usuario_apellido_2"
                                                        class="form-control" placeholder="Apellido 2">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_apellido_2"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="tipo_documento_id">Tipo de documento <b>*</b></label>
                                                    <select name="tipo_documento_id" id="tipo_documento_id"
                                                        class="form-control">
                                                        <option value="">Seleccione...</option>
                                                        <?php
                                                        foreach ($tipo_documento as $tipo_d) {
                                                            echo "<option  value='" . $tipo_d['tipo_documento_id'] . "'>" . $tipo_d['tipo_documento_nombre'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="small-text text-danger"
                                                        id="error_tipo_documento_id"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="usuario_num_identificacion">Número documento
                                                        <b>*</b></label>
                                                    <input type="text" name="usuario_num_identificacion"
                                                        id="usuario_num_identificacion" class="form-control"
                                                        placeholder="Documento">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_num_identificacion"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="usuario_correo">Correo Electrónico <b>*</b></label>
                                                    <input type="text" name="usuario_correo" id="usuario_correo"
                                                        class="form-control" placeholder="Correo" data-url='<?php 
         echo getUrl("Usuarios","Usuarios","validarCorreo", false, "ajax");?>'>
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_correo"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group ">
                                                    <label for="usuario_fecha_nacimiento">Fecha de nacimiento
                                                        <b>*</b></label>
                                                    <input type="date" name="usuario_fecha_nacimiento"
                                                        id="usuario_fecha_nacimiento" class="form-control">
                                                    <span class="small-text  text-danger"
                                                        id="error_usuario_fecha_nacimiento"></span>
                                                </div>



                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="usuario_telefono">Teléfono <b>*</b></label>
                                                    <input type="text" name="usuario_telefono" id="usuario_telefono"
                                                        class="form-control" placeholder="Teléfono celular">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_telefono"></span>

                                                </div>
                                            </div>


                                            <div class="col-md-8 col-lg-8">


                                                <div class="form-group">

                                                    <label for="direccion" class="fw-bold">Dirección</label>
                                                    <div class="row ">
                                                        <div class="col-6 col-md-4">
                                                            <select name="tipo_via" id="tipo_via"
                                                                class="form-select mt-1">
                                                                <option value=""> <b>*</b>Tipo de vía...</option>
                                                                <?php

                                                                foreach ($vias as $via) {
                                                                    echo "<option  value='" . $via['tipo_via_nombre'] . "'>" . $via['tipo_via_nombre'] . "</option>";
                                                                }

                                                                ?>
                                                            </select>
                                                            <span class="small-text text-danger"
                                                                id="error_tipo_via"></span>

                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <input type="text" name="num_via" id="num_via"
                                                                class="form-control" placeholder=" *Número vía">
                                                            <span class="small-text text-danger"
                                                                id="error_num_via"></span>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <select name="letra1" id="letra1" class="form-select mt-1">
                                                                <option value="">Letra...</option>
                                                                <?php
                                                                foreach ($letras as $letra) {
                                                                    echo "<option  value='" . $letra['letra_via'] . "'>" . $letra['letra_via'] . "</option>";
                                                                }

                                                                ?>
                                                            </select>



                                                        </div>
                                                        <div class="col-6 col-md-4 text-center">
                                                            <label for="bis" class="fw-bold mt-3">¿Es Bis?</label>
                                                            <input type="checkbox" id="bis" name="bis" value="Bis">
                                                            <span class="small-text text-danger" id="error_bis"></span>
                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <select name="orientacion" id="orientacion"
                                                                class="form-select mt-1">
                                                                <option value=""> <b>*</b>Orientación...</option>
                                                                <?php
                                                                foreach ($orientaciones as $orientacion) {
                                                                    echo "<option  value='" . $orientacion['orientacion_nombre'] . "'>" . $orientacion['orientacion_nombre'] . "</option>";
                                                                }

                                                                ?>
                                                            </select>
                                                            <span class="small-text text-danger"
                                                                id="error_orientacion"></span>

                                                        </div>

                                                        <div class="col-6 col-md-4">
                                                            <input type="text" name="numero2" id="numero2"
                                                                class="form-control" placeholder="*#">
                                                            <span class="small-text text-danger"
                                                                id="error_numero2"></span>

                                                        </div>
                                                        <div class="col-6 col-md-4">
                                                            <select name="letra2" id="letra2" class="form-select mt-1">
                                                                <option value="">Letra...</option>
                                                                <?php
                                                                foreach ($letras as $letra) {
                                                                    echo "<option  value='" . $letra['letra_via'] . "'>" . $letra['letra_via'] . "</option>";
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-6 col-md-4 ">
                                                            <input type="text" name="numero3" id="numero3"
                                                                class="form-control" placeholder=" *#">
                                                            <span class="small-text text-danger"
                                                                id="error_numero3"></span>

                                                        </div>
                                                        <div class="col-6 col-md-4 ">
                                                            <select name="barrio" id="barrio" class="form-select mt-1">
                                                                <option value=""> <b>*</b>Barrio...</option>
                                                                <?php
                                                                foreach ($barrios as $barrio) {
                                                                    echo "<option  value='" . $barrio['barrio_nombre'] . "'>" . $barrio['barrio_nombre'] . "</option>";
                                                                }

                                                                ?>
                                                            </select>
                                                            <span class="small-text text-danger"
                                                                id="error_barrio"></span>

                                                        </div>
                                                        <span id="direccion">Direccion:</span>

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-4 col-lg-4">


                                                <div class="form-group">
                                                    <label for="usuario_contrasenia">Contraseña <b>*</b></label>
                                                    <input type="password" name="usuario_contrasenia"
                                                        id="usuario_contrasenia" class="form-control"
                                                        placeholder="Clave" autocomplete="new-password">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_contrasenia"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="usuario_confirmar_contrasenia">Confirmar Contraseña
                                                        <b>*</b></label>

                                                    <input type="password" name="usuario_confirmar_contrasenia"
                                                        id="usuario_confirmar_contrasenia" class="form-control"
                                                        placeholder="Confirmar Contraseña">
                                                    <span class="small-text text-danger"
                                                        id="error_usuario_confirmar_contrasenia"></span>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="mt-5">
                                        <input type="submit" id="btnSubmit" value="Enviar" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>

</body>

</html>