<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">


    <form action="<?php echo getUrl("Reportes", "Reportes", "postReporte"); ?>" method="post"
        id="formReductorM">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Reporte</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?php echo getUrl("Reportes", "Reportes", "getReporte"); ?>">
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

            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Reportes
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="categoria_reductor_id">Tipo de solicitud</label>
                                    <select name="categoria_reductor_id" id="categoria_reductor_id" class="form-control">
                                        <option value="">Seleccione el tipo de solicitud...</option>
                                        <?php
                                    foreach ($tipo_solicitudes as $tipo_s) {
                                        echo "<option  value='" . $tipo_s['tipo_solicitud_id'] . "'>" . $tipo_s['tipo_solicitud_nombre'] . "</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tipo de diagrama</label>
                                    <select name="diagrama" id="diagrama" class="form-control">
                                        <option value="">Seleccione categoria...</option>
                                        <option value="barra">Barra</option>
                                        <option value="circ">Circ</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="startDate">Fecha de Inicio:</label>
                                    <input type="date" id="fecha_inicio" class="form-control" min="01-01-2025">
                                </div>
                                <div class="form-group">
                                    <label for="endDate">Fecha de Fin:</label>
                                    <input type="date" id="fecha_fin" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="">Reporte</label>
                                    <select name="reporte" id="reporte" class="form-control">
                                        <option value="">Seleccione el tipo de reporte...</option>
                                        <option value="estado">Estado de las Solicitudes</option>
                                        <option value="">Total de solicitudes por cada tipo</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-5">
                                <input type="submit" id="btnReportes" value="Enviar" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->


    </form>
</div>