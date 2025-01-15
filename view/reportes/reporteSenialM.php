<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">


    <form action="<?php echo getUrl("Reportes", "Reportes", "postReporteSeniM"); ?>" method="post">
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
                                    <label for="">Tipo de diagrama</label>
                                    <select name="diagrama" id="diagrama" class="form-control">
                                        <option value="">Seleccione el tipo de diagrama...</option>
                                        <option value="bar">Barra</option>
                                        <option value="pie">Circular</option>
                                        <option value="line">Lineal</option>
                                    </select>

                                </div>
                             
                               

                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="startDate">Tipo de reporte</label>
                                    <select name="tipo_reporte" id="tipo_reporte" class="form-control">
                                    <option value="">Seleccione el tipo de reporte...</option>
                                    <option value="senial">Señales</option>
                                        <option value="estado">Estado</option>
                                        <option value="danio">Daño</option>
                                        </select>
                                </div>
                             

                            </div>
                            
                            <div class="mt-5">
                                <input type="submit" id="btnReporteSeniM" value="Enviar" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->


    </form>
</div>