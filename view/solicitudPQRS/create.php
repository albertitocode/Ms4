<div class="mt-2">
    <h4 class="display-4">PQRS</h4>
</div>


<div class="mt-5">

    <form action="<?php echo getUrl("Solicitud", "Solicitud", "PostCreatePQRS"); ?>" method="post" id="formPqrs">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registro</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="../web/index.php">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">PQRS</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="alert alert-danger d-none" role="alert" id="errorPQRS">

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
                            Registro Solicitud Nueva PQRS
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="tipo_pqrs">Tipo PQRS</label>
                                    <select name="tipo_pqrs_id" class="form-control">
                                        <option value="">Seleccione el tipo...</option>
                                        <?php
                                        foreach ($tipo_pqrs as $_pqrs) {
                                            echo "<option  value='" . $_pqrs['tipo_pqrs_id'] . "'>" . $_pqrs['tipo_pqrs_nombre'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                    <span class="small-text text-danger" id="error_tipo_pqrs_id"></span>
                                </div>



                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="descripcion_pqrs"> Describa el motivo</label>
                                    <textarea type="text" name="descripcion_pqrs" id="descripicon_pqrs" class="form-control" placeholder="Motivo de su PQRS"></textarea>
                                    <span class="small-text text-danger" id="error_descripcion_pqrs"></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="adjuncion_pqrs">Archivo adjuntado (Opcional)</label>
                                    <input type="file" name="adjuncion_pqrs" class="form-control">
                                    <span class="small-text text-danger" id="error_adjuncion_pqrs"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        

        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success" id="btnPQRS">
        </div>
    </form>
</div>