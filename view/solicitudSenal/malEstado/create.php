<div class="mt-2">
    <h4 class="display-4">Señales viales en mal Estado</h4>
</div>


<div class="mt-5">
    
  
    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateSenialMalEstado"); ?>" method="post"
        id="formMalaSenial" enctype="multipart/form-data">
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
                    <a href="#">Registro Solicitudes</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="alert alert-danger d-none" role="alert" id="errorSenialMalEstado">

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
                            Registro Solicitud Señal en mal estado
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="categoria_senal_id">Categoria de la señal</label>
                                    <span class="ms-2 text-primary" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="click" data-bs-html="true" data-bs-content="Por favor, ingresa la <strong>Categoria de la señal</strong> 
                                    que se encuentra en mal estado.<br> Si no sabes cuáles son las categorías, 
                                    consúltalas en el siguiente enlace <br> <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                                        <i class="bi bi-info-circle" style="font-size: 1rem; cursor: pointer;"></i>
                                    </span>


                                    <select name="categoria_senial_id" id="categoria_senial_id" class="form-control"
                                        data-url='<?php echo
                                            getUrl(
                                                "Solicitud",
                                                "Solicitud",
                                                "getNombreSenial",
                                                false,
                                                "ajax"
                                            ); ?>'>
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($categoria_senal as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_senial_id'] . "'>" . $categoria['categoria_senial_nombre'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                    <span class="text-danger" id="error_categoria_senial_id"></span>
                                </div>
                                <div class="form-group">
                                    <label for="danio_id"> Daño</label>
                                    <span class="ms-2 text-primary" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="click" data-bs-html="true"
                                        data-bs-content="Este es otro ejemplo de popover">
                                        <i class="bi bi-info-circle" style="font-size: 1rem; cursor: pointer;"></i>
                                    </span>
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
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="tipo_senal_id">Tipo de señal</label>
                                    <select name="tipo_senial_id" id="tipo_senial_id" class="form-control" data-url='<?php echo
                                        getUrl(
                                            "Solicitud",
                                            "Solicitud",
                                            "getNombreSenial",
                                            false,
                                            "ajax"
                                        ); ?>'>
                                        <option value="">Seleccione señal...</option>
                                        <?php
                                        foreach ($tipo_senal as $tipo) {
                                            echo "<option  value='" . $tipo['tipo_senial_id'] . "'>" . $tipo['tipo_senial_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_tipo_senial_id"></span>
                                </div>
                                <div class="form-group">
                                    <label for="solicitud_senial_mal_estado_descripcion"> Describa el daño</label>
                                    <input type="text" name="solicitud_senial_descripcion"
                                        id="solicitud_senial_descripcion" class="form-control"
                                        placeholder="Describa el estado de la señal">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group mb-3 d-none" id="senal">
                                    <label for="senial_id">Nombre de la señal</label>
                                    <select name="senial_id" id="senial_id" class="form-control">
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($seniales as $senial) {
                                            echo "<option  value='" . $senial['senial_id'] . "'>" . $senial['senial_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_senial_id"></span>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="d-block">Imagen de la señal dañada</label>
                                    <input type="file" name="solicitud_senial_imagen" accept="image/png, image/jpeg, image/jpg" class="form-control">
                                    <br>
                                    <span class="text-danger" id="error_solicitud_senial_imagen"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->

        <div class="mt-5">
            <input type="submit" id="btnSenialM" value="Enviar" class="btn btn-success" disabled>
        </div>
    </form>
</div>