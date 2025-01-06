<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">


    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateReductorMalEstado"); ?>" method="post"
        id="formReductorM" enctype="multipart/form-data">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registro</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?php echo getUrl("Solicitud", "Solicitud", "getSolicitud"); ?>">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Solicitudes</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Reductores en mal estado</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="alert alert-danger d-none" role="alert" id="errorReductorMalEstado">

            </div>
            <?php
            if (isset($_SESSION['errores'])) {
                echo "<div class='alert alert-danger' role='alert'>";
                foreach ($_SESSION['errores'] as $error) {
                    echo $error . "<br>";
                }
                echo "</div>";
                unset($_SESSION['errores']);
            }

            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Registro Solicitud Reductor
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="categoria_reductor_id">Categoria del reductor</label>
                                    <select name="categoria_reductor_id" id="categoria_reductor_id" class="form-control" data-url='<?php echo
                                        getUrl(
                                            "Solicitud",
                                            "Solicitud",
                                            "getNombreReductor",
                                            false,
                                            "ajax"
                                        ); ?>'>
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($categoria_reductores as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_reductor_id'] . "'>" . $categoria['categoria_reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_categoria_reductor_id"></span>
                                </div>
                                <div class="form-group">
                                    <label for="danio_id"> Daño</label>
                                    <select name="danio_id" id="" class="form-control">
                                        <option value="">Seleccione daño...</option>
                                        <?php
                                        foreach ($danio as $dani) {
                                            echo "<option  value='" . $dani['danio_id'] . "'>" . $dani['danio_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_danio_id"></span>
                                </div>
                               
                            </div>
                            <div class="col-md-6 col-lg-6">
                            <div class="form-group mb-3 d-none" id="reduct">
                                    <label >Nombre del Reductor</label>
                                    <select name="reductor_id" id="reductor_id" class="form-control">
                                        <option value="">Seleccione reductor...</option>
                                        <?php
                                        foreach ($reductores as $reductor) {
                                            echo "<option  value='" . $reductor['reductor_id'] . "'>" . $reductor['reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_reductor_id"></span>
                                </div>

                                <div class="form-group">
                                    <label> Describa el daño</label>
                                    <input type="text" name="solicitud_reductores_mal_estado_descripcion" id=""
                                        class="form-control" placeholder="Describa el estado de la señal">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="d-block">Imagen del reductor dañado</label>
                                    <input type="file" name="solicitud_reductor_imagen" accept="image/png, image/jpeg, image/jpg" class="form-control">
                                    <span class="text-danger" id="error_solicitud_reductor_imagen"></span>

                                </div>
                            
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->

        <div class="mt-5">
            <input type="submit" value="Enviar" id="btnReductorM" disabled class="btn btn-success" disabled>
        </div>
    </form>
</div>