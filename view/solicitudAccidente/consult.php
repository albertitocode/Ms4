
<style>
        .card-scroll {
            
            overflow-x: auto;  /* Habilita el scroll vertical */
        }
    </style>
<div 
class="mt-5">
    <h3 class="display-4">Consultar solicitudes</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Accidente</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="<?php echo getUrl("Solicitud", "Solicitud", "postSolicitud"); ?>">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Accidente</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-x-scroll">
            <div class="card-header">
                <div class="card-tittle">
                    Consulta Accidentes
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-3 mt-4">
                        <input type="text" name="buscar" id="buscar" class="form-control"
                            placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscar", false, "ajax"); ?>'>
                    </div> -->
                    <?php
                    if (!empty($accidentes)) {
                    ?>
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Direccion</th>
                                    <th>Imagen</th>
                                    <th>Tipo de choque</th>
                                    <th>Choque detalle</th>
                                    <th>Tipo de solicitud</th>
                                    <th>Estado</th>
                                    <th>Lesionados</th>
                                    <th>Usuario</th>
                                    <th>Telefono usuario</th>
                                    
                    
                                   

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($accidentes as $accidente) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>";
                                echo "<form action='".getUrl("Solicitud", "Solicitud", "solicitudDetalleAccidente")."' method='post'>";
                                echo "<input type='hidden'  name='id_soli' value=" .$accidente['solicitud_accidente_id'] . "> ";
                                echo "<button type ='submit 'class='btnV'>Acción 3</button>";
                                echo "</form>";
                                echo "</td> ";
                                echo "<td>" . $accidente['solicitud_accidente_id'] . "</td>";
                                echo "<td>" . $accidente['solicitud_accidente_fecha_creacion'] . "</td>"; //cambiar el nombre en la db
                                echo "<td>" . $accidente['solicitud_accidente_descripcion'] . "</td>";
                                echo "<td>" . $accidente['st_astext'] . "</td>";
                                echo "<td>" . $accidente['solicitud_accidente_imagen'] . "</td>";
                                echo "<td>" . $accidente['tipo_choque_nombre'] . "</td>";
                                echo "<td>" . $accidente['detalle_choque_nombre'] . "</td>";
                                echo "<td>" . $accidente['tipo_solicitud_nombre'] . "</td>";
                                echo "<td>" . $accidente['estado_nombre'] . "</td>";
                                echo "<td>" . $accidente['solicitud_accidente_lesionados'] . "</td>";
                                echo "<td>" . $accidente['usuario_nombre_1'] ."  ". $accidente['usuario_apellido_1'] ."</td>";
                                echo "<td>" . $accidente['usuario_telefono'] . "</td>";
                                
                            
                                

                                // if($usu['estado_id']==1){
                                //     $clase='btn btn-danger';
                                //     $texto='Inhabilitar';
                                // }else if($usu['estado_id']==2){
                                //     $clase='btn btn-success';
                                //     $texto='Habilitar';
                                // }
                                // echo"<td>";
                                //      if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' data-url='".getUrl("Usuarios","Usuarios","posUpdateStatus",false,"ajax")."' data-id='".$usu['estado_id']."' data-user='".$usu['usuario_id']."'>$texto</button>";

                                // echo "</td>";//arreglar

                                // //     echo"<td>"
                                // //         ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id" =>$usu['usu_id']))."'>"
                                // //             ."<button class='btn btn-primary'>Editar</button>"
                                // //         ."</a>";
                                // //     "</td>";
                                // //     echo"<td>"
                                // //     ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usu_id" =>$usu['usu_id']))."'>"
                                // //         ."<button class='btn btn-danger'>Elimminar</button>"
                                // //     ."</a>";
                                // // "</td>";
                                // echo "</tr>";
                            }
                        } 
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>