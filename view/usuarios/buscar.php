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
           
            ?>