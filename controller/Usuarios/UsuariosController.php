<?php

include_once '../model/Usuarios/UsuariosModel.php';
class UsuariosController
{
    // public function test(){
    //     echo"Funciona maifren";
    // }


    public function getCreate()
    {
        $obj = new UsuariosModel();

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_via";
        $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM roles";
        $roles = pg_fetch_all($obj->consult($sql));


        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));


        if (isset($_POST['registro'])) {
            include_once '../view/usuarios/newUser.php';
        } else {
            include_once '../view/usuarios/create.php';
        }
    }
    public function postCreate()
    {

        $obj = new UsuariosModel();
        $usu_nombre_1 = $_POST['usuario_nombre_1'];
        $usu_nombre_2 = $_POST['usuario_nombre_2'];
        $usu_apellido_1 = $_POST['usuario_apellido_1'];
        $usu_apellido_2 = $_POST['usuario_apellido_2'];
        $usu_correo = $_POST['usuario_correo'];
        $usu_contrasenia = $_POST['usuario_contrasenia'];
        // $rol=$_POST['rol'];
        $usu_telefono = $_POST['usuario_telefono'];
        $tipo_documento = $_POST['tipo_documento_id'];
        $numero_documento = $_POST['usuario_num_identificacion'];
        $usu_fecha_nac = $_POST['usuario_fecha_nacimiento'];
        $tipo_via = $_POST['tipo_via'];
        $num_via = $_POST['num_via'];
        $letra1 = $_POST['letra1'];

        $orientacion = $_POST['orientacion'];
        $numero2 = $_POST['numero2'];
        $letra2 = $_POST['letra2'];
        $numero3 = $_POST['numero3'];
        $barrio = $_POST['barrio'];

        $foto_perfil = '../web/assets/img/imagen_usuario.png';
        if (isset($_POST['rol'])) {

            $rol = $_POST['rol'];
        } else {
            $rol = 3;
        }

        if (isset($_POST['bis'])) {
            $bis = $_POST['bis'];
        } else {
            $bis = "";
        }
        $direccion = "$tipo_via $num_via$letra1 $bis $orientacion #$numero2$letra2-$numero3, barrio $barrio";


        $validacion = true;

        $campos = array(

            'usuario_nombre_1' => 'Primer nombre requerido',
            'usuario_apellido_1' => 'Primer apellido requerido',
            'usuario_correo' => 'Correo electrónico requerido',
            'usuario_apellido_2' => 'Segundo apellido requerido',
            'usuario_fecha_nacimiento' => 'Fecha de nacimiento requerido',
            'usuario_telefono' => 'Teléfono requerido',
            'tipo_documento_id' => 'Tipo de documento requerido',
            'usuario_num_identificacion' => 'Número de documento requerido',
            'tipo_via' => "Tipo de vía requerido",
            'num_via' => "Número de vía requerido",
            'orientacion' => "Orientación requerido",
            'numero2' => "Número complemento 2 requerido",
            'numero3' => "Número complemento 3 requerido",
            'barrio' => "Barrio requerido",
            'usuario_contrasenia' => 'Contraseña requerido',
            'rol' => 'Rol requerido'
        );

        foreach ($campos as $campo => $mensaje) {
            if (empty($_POST[$campo])) {
                $_SESSION['errores'][] = $mensaje; // Guardamos el error en sesión
                $validacion = false; // Marcamos que la validación falló
            }
        }



        // // $id= $obj->autoIncrement("usu_id","usuarios");
        // $usu_clave = password_hash($usu_contrasenia, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (tipo_documento_id, usuario_num_identificacion, usuario_nombre_1,
         usuario_nombre_2, usuario_apellido_1, usuario_apellido_2,usuario_fecha_nacimiento, usuario_contrasenia, usuario_correo,
          usuario_telefono, usuario_direccion, rol_id, estado_id,foto_perfil) VALUES ($tipo_documento, $numero_documento, 
          '$usu_nombre_1', '$usu_nombre_2', '$usu_apellido_1', '$usu_apellido_2','$usu_fecha_nac', '$usu_contrasenia', '$usu_correo',
           $usu_telefono, '$direccion', $rol, 1,$foto_perfil)";
        if ($validacion) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Felicidades!',
                    text: 'El usuario ha sido registrado exitosamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Usuarios", "Usuarios", "getUsuarios") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Usuarios", "Usuarios", "getCreate"));
        }
    }

    public function getUsuarios()
    {
        $obj = new UsuariosModel();


        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN tipo_documentos t ON u.tipo_documento_id=t.tipo_documento_id JOIN estados e ON u.estado_id=e.estado_id order by u.usuario_id asc";
        $usuarios = pg_fetch_all($obj->consult($sql));
        include_once '../view/usuarios/consult.php';
    }

    public function buscar()
    {
        $obj = new UsuariosModel();

        $buscar = $_POST['buscar'];

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, rol r, tipo_documento t WHERE u.rol_id =r.rol_id AND u.tipo_documento=t.tipo_documento_id AND (u.usu_nombre_1 LIKE '%$buscar%' OR u.usu_nombre_2 LIKE '%$buscar%' OR u.usu_apellido_1 LIKE '%$buscar%' OR u.usu_apellido_2 LIKE '%$buscar%' OR u.usu_correo LIKE '%$buscar%' OR t.tipo_documento_nombre LIKE '%$buscar%' OR r.rol_nombre LIKE '%$buscar%') ORDER BY u.usu_id ASC";

        $usuarios = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscar.php';
    }
    public function buscarUsuario()
    {
        $obj = new UsuariosModel();

        $id_datos = $_POST['id_data'];

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, roles r, tipo_documentos t WHERE u.rol_id =r.rol_id AND u.tipo_documento_id=t.tipo_documento_id AND u.usuario_id=$id_datos";
        $_SESSION['id_datos'] = $id_datos;
        $usuario = pg_fetch_all($obj->consult($sql));
        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));
        $sql = "SELECT * FROM roles";
        $roles = pg_fetch_all($obj->consult($sql));




        if ($usuario) {

            $_SESSION['usuario_data'] = $usuario;

            include_once '../view/usuarios/buscarUsuarios.php';
        } else {
            echo "<br>";
            echo "<br>";

            echo "No se encuentra id asociado";
        }
    }

    public function posUpdateStatus()
    {
        $obj = new UsuariosModel();


        $user = $_POST['user'];
        $estado = $_POST['id'];

        $StatusModify = $estado;

        if ($estado == 1) {
            $StatusModify = 2;
        } else if ($estado == 2) {
            $StatusModify = 1;
        }


        $sql = "UPDATE usuarios SET estado_id=$StatusModify WHERE usuario_id=$user";

        $ejecutar = $obj->update($sql);
        if ($ejecutar) {

            $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id  JOIN tipo_documentos t ON u.tipo_documento_id=t.tipo_documento_id JOIN estados e ON u.estado_id=e.estado_id order by u.usuario_id asc";
            $usuarios = pg_fetch_all($obj->consult($sql));

            include_once '../view/usuarios/buscar.php';
        } else {
            echo "No se pudo actualizar";
        }
    }
    public function getPerfilAdmin()
    {
        $obj = new UsuariosModel();

        $rol_id = $_SESSION['rol'];
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM roles WHERE rol_id=$rol_id";
        $roles = pg_fetch_all($obj->consult($sql));
        foreach ($roles as $rol) {
            $rol_id = $rol['rol_id'];

            $rol_nombre = $rol['rol_nombre'];
        }

        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));
        foreach ($roles as $rol) {
            $rol_id = $rol['rol_id'];

            $rol_nombre = $rol['rol_nombre'];
        }
        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT u.*,r.rol_nombre, t.tipo_documento_nombre FROM usuarios u, roles r, tipo_documentos t WHERE u.rol_id =r.rol_id AND u.tipo_documento_id=t.tipo_documento_id AND u.usuario_id=$id";

        $usuario = pg_fetch_all($obj->consult($sql));
        foreach ($usuario as $usu) {
            $usu_telefono=$usu['usuario_telefono'];
        }
        if ($usuario) {
            $_SESSION['usuario_data_perfil'] = $usuario;
            include_once '../view/usuarios/perfil.php';
        }else{
            echo "Usuario no encontrado";
        }
    }
    public function getUpdateUsuarios()
    {
        $obj = new UsuariosModel();


        $rol_id = $_SESSION['rol'];
        $sql = "SELECT * FROM roles WHERE rol_id=$rol_id";
        $roles = pg_fetch_all($obj->consult($sql));
        foreach ($roles as $rol) {
            $rol_nombre = $rol['rol_nombre'];
        }

        $sql = "SELECT * FROM tipo_documentos";
        $tipo_documento = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        if ($_SESSION['rol'] == 1) {
            include_once '../view/usuarios/update.php';
        } else {
            include_once '../view/usuarios/perfil.php';
        }
    }
    public function postUpdateUsuarios()
    {

        $obj = new UsuariosModel();
        // dd($_POST);
        $identificador = $_POST['identificador_update'];


       


        $usu_nombre_1 = $_POST['usuario_nombre_1'];
        $usu_nombre_2 = $_POST['usuario_nombre_2'];
        $usu_apellido_1 = $_POST['usuario_apellido_1'];
        $usu_apellido_2 = $_POST['usuario_apellido_2'];
        $usu_correo = $_POST['usuario_correo'];
        $usu_contrasenia = $_POST['usuario_confirmar_contrasenia'];
        $rol = $_POST['rol_id'];
        $usu_telefono = $_POST['usuario_telefono'];
        $tipo_documento = $_POST['tipo_documento_id'];
        $numero_documento = $_POST['usuario_num_identificacion'];

        $campos = array(
            'usuario_nombre_1' => $usu_nombre_1,
            'usuario_nombre_2' => $usu_nombre_2,
            'usuario_apellido_1' => $usu_apellido_1,
            'usuario_apellido_2' => $usu_apellido_2,
            'usuario_correo' => $usu_correo,
            'usuario_contrasenia' => $usu_contrasenia,
            'rol_id' => $rol,
            'usuario_telefono' => $usu_telefono,
            'tipo_documento_id' => $tipo_documento,
            'usuario_num_identificacion' => $numero_documento
        );

        $campos_a_actualizar = array();
        if ($identificador == 1) {

            $id = $_SESSION['id_datos'];
            $usuario_bd = $_SESSION['usuario_data'][0];


        } else if ($identificador == 2) {
            $id = $_SESSION['id'];
            $usuario_bd = $_SESSION['usuario_data_perfil'][0];

        }
        // Validaciones y actualizaciones
        foreach ($campos as $campo => $valor) {
            // Validar si el valor no está vacío y es diferente al valor actual en la base de datos
            if (!empty($valor) && $valor != $usuario_bd[$campo]) {
                if (is_numeric($valor)) {
                    $campos_a_actualizar[] = "$campo=" . intval($valor);
                } else {
                    $campos_a_actualizar[] = "$campo='" . addslashes($valor) . "'";
                }
            }
        }


        if (!empty($campos_a_actualizar)) {
            $sql = "UPDATE usuarios SET " . implode(", ", $campos_a_actualizar) . " WHERE usuario_id=$id";

            $ejecutar = $obj->update($sql);

            if ($ejecutar) {
                if ($identificador == 1) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Éxito!',
                        text: 'Los datos se actualizaron correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Usuarios", "Usuarios", "getUpdateUsuarios") . "';
                        }
                    });
                </script>";
        
        
                } else if ($identificador == 2) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Éxito!',
                        text: 'Los datos se actualizaron correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Usuarios", "Usuarios", "getPerfilAdmin") . "';
                        }
                    });
                </script>";
        
                }

              

            } else {
                echo "Se ha presentado un error al actualizar.";
            }
        } else {
            if ($identificador == 1) {
                echo "<script>
                Swal.fire({
                    title: 'Sin cambios',
                    text: 'No se detectaron cambios en los datos para actualizar.',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Usuarios", "Usuarios", "getUpdateUsuarios") . "';
                    }
                });
            </script>";
    
    
            } else if ($identificador == 2) {
                echo "<script>
                Swal.fire({
                    title: 'Sin cambios',
                    text: 'No se detectaron cambios en los datos para actualizar.',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Usuarios", "Usuarios", "getPerfilAdmin") . "';
                    }
                });
            </script>";
    
            }

           
        }
        unset($_SESSION['usuario_data']);
        unset($_SESSION['usuario_data_perfil']);


    }
    public function updateStatus()
    {
        $obj = new UsuariosModel();

        // $id=$_POST['usuario_id'];

        $sql = "SELECT u.estado_id,u.usuario_id,u.usuario_nombre_1,u.usuario_num_identificacion,u.usuario_apellido_1,u.usuario_correo,r.rol_nombre, e.estado_nombre FROM usuarios u JOIN roles r ON u.rol_id =r.rol_id   JOIN estados e ON u.estado_id=e.estado_id";
        $usuarios = pg_fetch_all($obj->consult($sql));

        include_once '../view/usuarios/buscar.php';
    }


}
