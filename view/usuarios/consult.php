
<style>
        .card-scroll {
            
            overflow-x: auto;  /* Habilita el scroll vertical */
        }
    </style>
<div 
class="mt-5">
    <h3 class="display-4">Consultar Usuarios</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Usuarios</h3>
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
            <a href="#">Usuarios</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Consutar usuarios</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-x-scroll">
            <div class="card-header">
                <div class="card-tittle">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mt-4">
                        <input type="text" name="buscar" id="buscar" class="form-control"
                            placeholder="Buscar por nombre o correo" data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscar", false, "ajax"); ?>'>
                    </div>
                    <?php
                    if (!empty($usuarios)) {
                    ?>
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Primer nombre</th>
                                    <th>Segundo nombre</th>
                                    <th>Primer apelldio</th>
                                    <th>Segundo apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Estado</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Rol</th>
                                    <th>Telefono</th>
                                    <th>Tipo de documento</th>
                                    <th>Numero de documento</th>
                                    <th>Habilitar/Inhabilitar</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($usuarios as $usu) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>" . $usu['usuario_id'] . "</td>";
                                echo "<td>" . $usu['usuario_nombre_1'] . "</td>";
                                echo "<td>" . $usu['usuario_nombre_2'] . "</td>";
                                echo "<td>" . $usu['usuario_apellido_1'] . "</td>";
                                echo "<td>" . $usu['usuario_apellido_2'] . "</td>";
                                echo "<td>" . $usu['usuario_fecha_nacimiento'] . "</td>";
                                echo "<td>" . $usu['estado_nombre'] . "</td>";
                                echo "<td>" . $usu['usuario_correo'] . "</td>";
                                echo "<td>" . $usu['usuario_contrasenia'] . "</td>";
                                echo "<td>" . $usu['rol_nombre'] . "</td>";
                                echo "<td>" . $usu['usuario_telefono'] . "</td>";
                                echo "<td>" . $usu['tipo_documento_nombre'] . "</td>";
                                echo "<td>" . $usu['usuario_num_identificacion'] . "</td>";
                                

                                if($usu['estado_id']==1){
                                    $clase='btn btn-danger';
                                    $texto='Inhabilitar';
                                }else if($usu['estado_id']==2){
                                    $clase='btn btn-success';
                                    $texto='Habilitar';
                                }
                                echo"<td>";
                                     if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' data-url='".getUrl("Usuarios","Usuarios","posUpdateStatus",false,"ajax")."' data-id='".$usu['estado_id']."' data-user='".$usu['usuario_id']."'>$texto</button>";

                                echo "</td>";//arreglar

                                //     echo"<td>"
                                //         ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id" =>$usu['usu_id']))."'>"
                                //             ."<button class='btn btn-primary'>Editar</button>"
                                //         ."</a>";
                                //     "</td>";
                                //     echo"<td>"
                                //     ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usu_id" =>$usu['usu_id']))."'>"
                                //         ."<button class='btn btn-danger'>Elimminar</button>"
                                //     ."</a>";
                                // "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "está vacio";
                        }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>