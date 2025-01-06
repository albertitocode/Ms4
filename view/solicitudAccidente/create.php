<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">

    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateAccidente"); ?>" method="post" id="formAccidente" enctype="multipart/form-data">

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

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-tittle">
                            Registro Accidente
                        </div>
                    </div>
                    <div class="card-body">


                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="row">
                            <div class="alert alert-danger d-none" role="alert" id="errorAccidente">

                            </div>
                           
                            <div class="col-md-12">
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
                                <div class="row">

                                    <div class="col-md-6 col-lg-6">

                                    <div class="form-group mb-3">
                                            <label for="" class="fw-bold">Tipo de choque</label>
                                            <select name="tipo_choque" id="tipo_choque" class="form-select" data-url='<?php echo getUrl("Solicitud", "Solicitud", "getDetalleChoque", false, "ajax"); ?>'>

                                                <option value="">Seleccione...</option>
                                                <?php
                                                foreach ($choques as $choque) {
                                                    echo "<option  value='" . $choque['tipo_choque_id'] . "'>" . $choque['tipo_choque_nombre'] . "</option>";
                                                }

                                                ?>
                                            </select>
                                            <span class=" text-danger" id="error_tipo_choque"></span>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="observacion" class="fw-bold">Observación</label>
                                            <textarea name="observacion" id="solicitud_via_mal_estado_descripcion"
                                                class="form-control" placeholder="Describa el accidente"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                       

                                        <div class="form-group mb-3 d-none" id="detalle">
                                            
                                            <label for="detalle_choque">Detalle de choque</label>
                                            <select name="detalle_choque" id="detalle_choque" class="form-control" >
                                            <option value="">Detalle del choque...</option>
                                                <?php
                                                foreach ($detallesChoques as $detalle) {
                                                    echo "<option value='" . $detalle['choque_detalle_id'] . "'>" . $detalle['choque_detalle_descripcion'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                            <span class=" text-danger" id="error_detalle_choque"></span>
                                
                                        </div>
                                        
                                   
                                        <div class="form-group mt-4">
                                            <label for="bis" class="fw-bold">¿Hay lesionados?</label>
                                            <input type="checkbox" id="lesionados" name="lesionados"
                                                value="Con lesionados">

                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="imagen" class="fw-bold">Imagen</label>
                                            <input type="file" name="solicitud_accidente_imagen" class="form-control" accept="image/png, image/jpeg, image/jpg">
                                            <span class="text-danger" id="error_solicitud_accidente_imagen"></span>

                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de envío -->
                                <div class="mt-3 text-center">
                                    <input type="submit" class="btn btn-success" id="btnAccidente" disabled value="Enviar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>