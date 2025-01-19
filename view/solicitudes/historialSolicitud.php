
<style>
        .card-scroll {
            
            overflow-x: auto;  /* Habilita el scroll vertical */
        }
    </style>
<div 
class="mt-5">
    <h3 class="display-4">Seguimiento solicitudes realizadas</h3>
</div>
<div class="page-header">
    <!-- <h3 class="fw-bold mb-3">Solicitudes realizadas</h3> -->
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="window.location.href = 'http://localhost:8080/plantillaMvc/web/index.php';">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Historial solicitudes realizadas</a>
        </li>
    
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-x-scroll">
            <div class="card-header">
                <div class="card-tittle">
                    Historial
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-3 mt-4">
                        <input type="text" name="buscar" id="buscar" class="form-control"
                            placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscar", false, "ajax"); ?>'>
                    </div> -->
                    <?php
                    
                    ?>
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th>Fecha de creación</th>
                                    <th>Tipo de solicitud</th>
                                    <th>Estado</th>
                                    <th>Nombre</th>
                                    <!-- <th></th> -->
                                    

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($historial_solicitud as $histo) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>" . $histo['fecha_creacion'] . "</td>";
                                echo "<td>" . $histo['tipo_solicitud_nombre'] . "</td>";
                                echo "<td>" . $histo['estado_nombre'] . "</td>";
                                echo "<td>" . $histo['usuario_nombre_1'] ."  ". $histo['usuario_apellido_1'] . "</td>";
                                
                                echo "</tr>";
                            }
                      
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>