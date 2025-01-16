<?php
include_once '../model/Solicitud/SolicitudModel.php';

class SolicitudController
{
    public function getSolicitud()
    {
        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));
        include_once '../view/solicitudes/registrar.php';
    }
    // public function buscarSolicitud()
    // {
    //     $obj = new SolicitudModel();

    //     $id_solicitud = $_POST['id_solicitud'];


    //     $x = $_GET['x'];
    //     $y = $_GET['y'];

    //     if ($id_solicitud == 1) {
    //         // include_once '../view/solicitudSenal/malEstado/create.php';
    //         redirect(getUrl("Solicitud", "Solicitud", "getCreateSenialMalEstado",array("x"=> $x, "y" => $y)));
    //     } else if ($id_solicitud == 2) {
    //         // include_once '../view/solicitudVial/create.php';
    //         redirect(getUrl("Solicitud", "Solicitud", "GetCreateVia",array("x"=> $x, "y" => $y)));
    //     } else if ($id_solicitud == 4) {
    //         redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente",array("x"=> $x, "y" => $y)));
    //     } else if ($id_solicitud == 5) {
    //         redirect(getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial",array("x"=> $x, "y" => $y)));
    //     } else if ($id_solicitud == 3) {
    //         redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado",array("x"=> $x, "y" => $y)));
    //     } else if ($id_solicitud == 6) {
    //         redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorNuevo",array("x"=> $x, "y" => $y)));
    //     }
    // }


    public function postSolicitud()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudes/consultar.php';
    }

    public function obtenerSolicitudes()
    {
        $obj = new SolicitudModel();

        $id_solicitud = $_POST['id_solicitud'];

        if ($id_solicitud == 1) {
            // include_once '../view/solicitudSenal/malEstado/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getSenialMalEstado"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Solicitud", "Solicitud", "getVias"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Solicitud", "Solicitud", "getAccidentes"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Solicitud", "Solicitud", "getSenialNueva"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Solicitud", "Solicitud", "getReductorMalEstado"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Solicitud", "Solicitud", "getReductorNuevo"));
        }



    }

    //Empieza señales
    //Empieza señales nuevas

    public function getSenialNueva()
    {

        $obj = new SolicitudModel();

        $rol = $_SESSION['rol'];
        switch ($rol) {
            case 2:

                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_nueva_direccion) ,se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono,
tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_seniales_nuevas s JOIN 
seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  ON s.usuario_id=usu.usuario_id
 JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id JOIN
  estados e ON s.estado_id = e.estado_id ORDER BY s.solicitud_senial_nueva_id ASC";
                $solicitud_seniales_nuevas = pg_fetch_all($obj->consult($sql));


                break;
            case 4:
                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_nueva_direccion) ,se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono,
tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_seniales_nuevas s JOIN 
seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  ON s.usuario_id=usu.usuario_id
 JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id JOIN
  
  estados e ON s.estado_id = e.estado_id 
  WHERE s.estado_id = 4
  ORDER BY s.solicitud_senial_nueva_id ASC";
                $solicitud_seniales_nuevas = pg_fetch_all($obj->consult($sql));

                break;


            case 5:
                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_nueva_direccion) ,se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono,
tip.tipo_solicitud_nombre, e.estado_nombre FROM solicitud_seniales_nuevas s JOIN 
seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  ON s.usuario_id=usu.usuario_id
 JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id JOIN
  estados e ON s.estado_id = e.estado_id
   WHERE s.estado_id = 5 ORDER BY s.solicitud_senial_nueva_id ASC";
                $solicitud_seniales_nuevas = pg_fetch_all($obj->consult($sql));

                break;


        }


        if ($solicitud_seniales_nuevas) {
            include_once '../view/solicitudSenal/nueva/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";
        }

    }






    public function getCreateNuevaSenial()
    {
        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];
        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/nueva/create.php';
    }

    public function postCreateNuevaSenial()
    {

        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados
        $coordi_x = $_POST['coordenada_x_seniN'];
        $coordi_y = $_POST['coordenada_y_seniN'];

        $senial_id = $_POST['senial_id'];
        $solicitud_senial_nueva_descripcion = $_POST['solicitud_senial_nueva_descripcion'];
        $solicitud_senial_nueva_direccion = $coordi_x . " " . $coordi_y;

        $usuario_id = $_SESSION['id'];

        //validaciones 
        $validacion = true;
        $campos = array(

            'senial_id' => 'Es requerido llenar el campo señal'

        );

        // foreach ($campos as $campo => $mensaje) {
        //     $c=trim($$campo);
        //     if (empty($c)) {

        //         $_SESSION['errores'][] = $mensaje;
        //         $validacion = false;
        //     } else {

        //     }
        // }
        if (isset($_POST['solicitud_nueva_senial_descripcion'])) {
            $solicitud_senial_nueva_descripcion = $_POST['solicitud_nueva_senial_descripcion'];

        } else {
            $solicitud_senial_nueva_descripcion = "Sin descripción";

        }



        $sql = "INSERT INTO solicitud_seniales_nuevas (solicitud_senial_nueva_descripcion,senial_id,usuario_id,tipo_solicitud_id,estado_id,solicitud_senial_nueva_direccion)
         VALUES('$solicitud_senial_nueva_descripcion',$senial_id,$usuario_id,5,3,ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial"));
        }


    }
    //Termina señales nuevas

    //Empieza Señal en mal estado


    public function getSenialMalEstado()
    {

        $obj = new SolicitudModel();
        $rol = $_SESSION['rol'];
        switch ($rol) {
            case 2:
                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_mal_estado_direccion), se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, 
                usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                solicitud_seniales_mal_estado s JOIN seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  
                ON s.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id
                 JOIN estados e ON s.estado_id = e.estado_id JOIN danios da ON s.danio_id=da.danio_id ORDER BY s.solicitud_senial_mal_estado_id ASC";
                $solicitud_seniales_mal_estado = pg_fetch_all($obj->consult($sql));


                break;

            case 4:
                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_mal_estado_direccion), se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, 
                usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                solicitud_seniales_mal_estado s JOIN seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  
                ON s.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id
                 JOIN estados e ON s.estado_id = e.estado_id JOIN danios da ON s.danio_id=da.danio_id  WHERE s.estado_id = 4 ORDER BY s.solicitud_senial_mal_estado_id ASC";
                $solicitud_seniales_mal_estado = pg_fetch_all($obj->consult($sql));

                break;



            case 5:
                $sql = "SELECT s.*, ST_AsText(s.solicitud_senial_mal_estado_direccion), se.senial_nombre, usu.usuario_nombre_1, usu.usuario_apellido_1, 
                usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                solicitud_seniales_mal_estado s JOIN seniales se ON s.senial_id=se.senial_id JOIN usuarios usu  
                ON s.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON s.tipo_solicitud_id = tip.tipo_solicitud_id
                 JOIN estados e ON s.estado_id = e.estado_id JOIN danios da ON s.danio_id=da.danio_id  WHERE s.estado_id = 5 ORDER BY s.solicitud_senial_mal_estado_id ASC";
                $solicitud_seniales_mal_estado = pg_fetch_all($obj->consult($sql));



        }

        if ($solicitud_seniales_mal_estado) {
            include_once '../view/solicitudSenal/malEstado/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";

        }
    }

    public function getNombreSenial()
    {
        $obj = new SolicitudModel();
        if (isset($_POST['categoria_senial_id'])) {

            $tipo_senial = $_POST['tipo_senial_id'];
            $categoria_senial = $_POST['categoria_senial_id'];
            echo $tipo_senial;
            echo $categoria_senial;

            $sql = "SELECT * from seniales WHERE tipo_senial_id=$tipo_senial AND categoria_senial_id=$categoria_senial";
            $senial = $obj->consult($sql);


            $i = 0;
            if (pg_num_rows($senial) > 0) {
                $senial = pg_fetch_all($senial);
                foreach ($senial as $senia) {
                    print_r($senia);

                    if ($i == 0) {
                        echo "<option value=''>Seleccione...</option>";
                        $i = 1;
                    }

                    echo "<option value='" . $senia['senial_id'] . "'>" . $senia['senial_nombre'] . "</option>";

                }

            } else {

                echo "error";
            }




        }

    }

    public function getImgCategoriaSenial()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_seniales";
        $imgs = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/ayuda.php';

    }

    public function getImgTipoSenial()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM categoria_seniales";
        $imgs = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/ayuda.php';

    }
    public function getImgSenial()
    {
        $obj = new SolicitudModel();

        $sql = "SELECT * FROM seniales";
        $imgs = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/ayuda.php';

    }


    public function getCreateSenialMalEstado()
    {
        $obj = new SolicitudModel();
        $x = $_GET['x'];
        $y = $_GET['y'];

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudSenal/malEstado/create.php';
    }
    public function postCreateSenialMalEstado()
    {

        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados
        $senial_id = $_POST['senial_id'];
        $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];
        $coordi_x = $_POST['coordenada_x_seniM'];
        $coordi_y = $_POST['coordenada_y_seniM'];
        $solicitud_direccion = $coordi_x . " " . $coordi_y;




        if (isset($_FILES['solicitud_senial_imagen']) && $_FILES['solicitud_senial_imagen']['error'] === 0) {
            $img = $_FILES['solicitud_senial_imagen']['name'];

            // Usar una ruta absoluta para evitar problemas con rutas relativas
            $ruta = "assets/img/img_solicitudes/$img";

            move_uploaded_file($_FILES['solicitud_senial_imagen']['tmp_name'], $ruta);

        } else {
            $img = "Sin imagen";
        }




        if (isset($_POST['solicitud_senial_mal_estado_descripcion'])) {
            $solicitud_senial_descripcion = $_POST['solicitud_senial_mal_estado_descripcion'];

        } else {
            $solicitud_senial_descripcion = "Sin descripción";

        }



        //validaciones 
        $validacion = true;
        $campos = array(

            'senial_id' => 'Es requerido llenar el campo señal',
            'danio_id' => 'Es requerido llenar el campo daño',
        );

        foreach ($campos as $campo => $mensaje) {
            if (empty($_POST[$campo])) {
                $_SESSION['errores'][] = $mensaje; // Guardamos el error en sesión
                $validacion = false; // Marcamos que la validación falló
            }
        }

        $sql = "INSERT INTO solicitud_seniales_mal_estado (senial_id,solicitud_senial_mal_estado_descripcion,
        danio_id,usuario_id,solicitud_senial_mal_estado_imagen,
        tipo_solicitud_id,estado_id,solicitud_senial_mal_estado_direccion) VALUES($senial_id,'$solicitud_senial_descripcion',$danio_id,
        $usuario_id,'$img',1,3,ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";
        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateSenialMalEstado"));
        }




        // $categoria_reduc_id = $_POST[''];
        // $categoria_reduc_nombre = $_POST[''];
        // $tipo_reduc_id = $_POST[''];

        // $sql = "INSERT INTO  VALUES()";
        // $ejecutar = $obj->insert($sql);
        // if ($ejecutar) {
        //     redirect(getUrl("Solicitud", "Solicitud", ""));
        // } else {
        //     echo "Se ha presentado un error al insertar";
        // }


    }



    //termina señales en mal estado
//termina señales

    //Empieza reductor

    public function getNombreReductor()
    {
        echo "si";
        $obj = new SolicitudModel();
        if (isset($_POST['categoria_reductor_id'])) {

            $categoria_reductor = $_POST['categoria_reductor_id'];
            echo $categoria_reductor;

            $sql = "SELECT * from reductores WHERE categoria_reductor_id=$categoria_reductor";
            $reductores = $obj->consult($sql);


            $i = 0;
            if (pg_num_rows($reductores) > 0) {
                $reductores = pg_fetch_all($reductores);
                foreach ($reductores as $reductor) {
                    print_r($reductor);

                    if ($i == 0) {
                        echo "<option value=''>Seleccione...</option>";
                        $i = 1;
                    }

                    echo "<option value='" . $reductor['reductor_id'] . "'>" . $reductor['reductor_nombre'] . "</option>";

                }

            } else {

                echo "error";
            }




        }

    }
    //Empieza reductores en mal estado



    public function getReductorMalEstado()
    {

        $obj = new SolicitudModel();

        $rol = $_SESSION['rol'];
        switch ($rol) {
            case 2:
                $sql = "SELECT r.*, 
                ST_AsText(r.solicitud_reductores_mal_estado_direccion), 
                re.reductor_nombre, 
                usu.usuario_nombre_1, 
                usu.usuario_apellido_1, 
                usu.usuario_telefono, 
                da.danio_nombre, 
                tip.tipo_solicitud_nombre, 
                e.estado_nombre 
         FROM solicitud_reductores_mal_estado r 
         JOIN reductores re ON r.reductor_id = re.reductor_id 
         JOIN usuarios usu ON r.usuario_id = usu.usuario_id 
         JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
         JOIN estados e ON r.estado_id = e.estado_id 
         JOIN danios da ON r.danio_id = da.danio_id 
         ORDER BY r.solicitud_reductores_mal_estado_id ASC";


                $solicitud_reductores_mal_estado = pg_fetch_all($obj->consult($sql));



                break;
            case 4:
                $sql = "SELECT r.*, 
               ST_AsText(r.solicitud_reductores_mal_estado_direccion) , 
               re.reductor_nombre, 
               usu.usuario_nombre_1, 
               usu.usuario_apellido_1, 
               usu.usuario_telefono, 
               da.danio_nombre, 
               tip.tipo_solicitud_nombre, 
               e.estado_nombre 
                FROM solicitud_reductores_mal_estado r 
                JOIN reductores re ON r.reductor_id = re.reductor_id 
                JOIN usuarios usu ON r.usuario_id = usu.usuario_id 
                JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
                JOIN estados e ON r.estado_id = e.estado_id 
                JOIN danios da ON r.danio_id = da.danio_id 
                 WHERE r.estado_id = 4
                ORDER BY r.solicitud_reductores_mal_estado_id ASC";

                $solicitud_reductores_mal_estado = pg_fetch_all($obj->consult($sql));


                break;

            case 5:
                $sql = "SELECT r.*, 
               ST_AsText(r.solicitud_reductores_mal_estado_direccion) , 
               re.reductor_nombre, 
               usu.usuario_nombre_1, 
               usu.usuario_apellido_1, 
               usu.usuario_telefono, 
               da.danio_nombre, 
               tip.tipo_solicitud_nombre, 
               e.estado_nombre 
                FROM solicitud_reductores_mal_estado r 
                JOIN reductores re ON r.reductor_id = re.reductor_id 
                JOIN usuarios usu ON r.usuario_id = usu.usuario_id 
                JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
                JOIN estados e ON r.estado_id = e.estado_id 
                JOIN danios da ON r.danio_id = da.danio_id 
                 WHERE r.estado_id = 5
                ORDER BY r.solicitud_reductores_mal_estado_id ASC";

                $solicitud_reductores_mal_estado = pg_fetch_all($obj->consult($sql));

                break;


        }



        if ($solicitud_reductores_mal_estado) {
            include_once '../view/solicitudReductor/malEstado/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";

        }
    }
    public function getCreateReductorMalEstado()
    {
        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/malEstado/create.php';


    }
    public function postCreateReductorMalEstado()
    {
        $obj = new SolicitudModel();

        $coordi_x = $_POST['coordenada_x_reduM'];
        $coordi_y = $_POST['coordenada_y_reduM'];
        

        $direccion = $coordi_x. " ". $coordi_y;
        $danio_id = $_POST['danio_id'];
        $usuario_id = $_SESSION['id'];
        $reductor_id = $_POST['reductor_id'];
        $categoria_reductor_id = $_POST['categoria_reductor_id'];

        if (isset($_FILES['solicitud_reductor_imagen']) && $_FILES['solicitud_reductor_imagen']['error'] === 0) {
            $img = $_FILES['solicitud_reductor_imagen']['name'];

            // Usar una ruta absoluta para evitar problemas con rutas relativas
            $ruta = "assets/img/img_solicitudes/$img";

            move_uploaded_file($_FILES['solicitud_reductor_imagen']['tmp_name'], $ruta);

        } else {
            $img = "Sin imagen";
        }
        
        if (isset($_POST['solicitud_reductor_mal_estado_descripcion'])) {
            $solicitud_reductores_mal_estado_descripcion = $_POST['solicitud_reductor_mal_estado_descripcion'];

        } else {
            $solicitud_reductores_mal_estado_descripcion = "Sin descripción";

        }
        $validacion = true;
        $campos = array(
            'danio_id' => 'El campo daño es requerido',
            'reductor_id' => 'El campo reductor es requerido',
            'categoria_reductor_id' => 'El campo categoria es requerido'

        );


        foreach ($campos as $campo => $mensaje) {
            $c = trim($$campo);
            if (empty($c)) {

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }

        $sql = "INSERT INTO solicitud_reductores_mal_estado (solicitud_reductores_mal_estado_descripcion,solicitud_reductores_mal_estado_imagen,reductor_id,
        danio_id,usuario_id,tipo_solicitud_id,estado_id,solicitud_reductores_mal_estado_direccion) VALUES('$solicitud_reductores_mal_estado_descripcion',
        '$img',$reductor_id,$danio_id,$usuario_id,3,3,ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";
        // var_dump($sql);

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado"));
        }





    }
    //Termina reductores en mal estado

    //Empieza nuevos reductores


    public function getReductorNuevo()
    {

        $obj = new SolicitudModel();

        $rol = $_SESSION['rol'];
        switch ($rol) {
            case 2:

                $sql = "SELECT r.*,ST_AsText(r.solicitud_reductor_nuevo_direccion), re.reductor_nombre, usu.usuario_nombre_1,
                  usu.usuario_apellido_1, usu.usuario_telefono, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                  solicitud_reductores_nuevos r JOIN reductores re ON r.reductor_id=re.reductor_id JOIN usuarios usu 
                   ON r.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
                   JOIN estados e ON r.estado_id = e.estado_id ORDER BY r.solicitud_reductor_nuevo_id ASC";
                $solicitud_reductores_nuevos = pg_fetch_all($obj->consult($sql));

                break;
            case 4:
                $sql = "SELECT r.*,ST_AsText(r.solicitud_reductor_nuevo_direccion), re.reductor_nombre, usu.usuario_nombre_1,
                usu.usuario_apellido_1, usu.usuario_telefono, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                solicitud_reductores_nuevos r JOIN reductores re ON r.reductor_id=re.reductor_id JOIN usuarios usu 
                 ON r.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
                 JOIN estados e ON r.estado_id = e.estado_id
                  WHERE r.estado_id = 4
                   ORDER BY r.solicitud_reductor_nuevo_id ASC";
                $solicitud_reductores_nuevos = pg_fetch_all($obj->consult($sql));

                break;


            case 5:
                $sql = "SELECT r.*,ST_AsText(r.solicitud_reductor_nuevo_direccion), re.reductor_nombre, usu.usuario_nombre_1,
                  usu.usuario_apellido_1, usu.usuario_telefono, tip.tipo_solicitud_nombre, e.estado_nombre FROM 
                  solicitud_reductores_nuevos r JOIN reductores re ON r.reductor_id=re.reductor_id JOIN usuarios usu 
                   ON r.usuario_id=usu.usuario_id JOIN tipo_solicitudes tip ON r.tipo_solicitud_id = tip.tipo_solicitud_id 
                   JOIN estados e ON r.estado_id = e.estado_id
                    WHERE r.estado_id = 5
                     ORDER BY r.solicitud_reductor_nuevo_id ASC";
                $solicitud_reductores_nuevos = pg_fetch_all($obj->consult($sql));
                break;


        }


        if ($solicitud_reductores_nuevos) {
            include_once '../view/solicitudReductor/nuevo/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";
        }
    }
    public function getCreateReductorNuevo()
    {
        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];
        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        include_once '../view/solicitudReductor/nuevo/create.php';


    }
    public function postCreateReductorNuevo()
    {
        $obj = new SolicitudModel();

        //añadir campo fecha
        //agregar los cambios de estados

        // $senial_id = $_POST['senial_id'];
        $coordi_x = $_POST['coordenada_x_reduN'];
        $coordi_y = $_POST['coordenada_y_reduN'];

        
      
        $direccion = $coordi_x. " ". $coordi_y;
        $solicitud_reductor_nuevo_imagen = $_POST['solicitud_reductor_nuevo_imagen'];
        // var_dump($solicitud_reductor_nuevo_imagen);
        $usuario_id = $_SESSION['id'];
        $reductor_id = $_POST['reductor_id'];
        $categoria_reductor_id = $_POST['categoria_reductor_id'];

        $validacion = true;
        $campos = array(
            'reductor_id' => 'El campo reductor es requerido',
            'categoria_reductor_id' => 'El campo categoria es requerido'
        );


        foreach ($campos as $campo => $mensaje) {
            $c = trim($$campo);
            if (empty($c)) {

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }
          
        if (isset($_POST['solicitud_reductor_nuevo_descripcion'])) {
            $solicitud_reductor_nuevo_descripcion = $_POST['solicitud_reductor_nuevo_descripcion'];

        } else {
            $solicitud_reductor_nuevo_descripcion = "Sin descripción";

        }


        $sql = "INSERT INTO solicitud_reductores_nuevos(solicitud_reductor_nuevo_descripcion,
        solicitud_reductor_nuevo_imagen,reductor_id,usuario_id,tipo_solicitud_id,estado_id,
        solicitud_reductor_nuevo_direccion) VALUES('$solicitud_reductor_nuevo_descripcion',
        '$solicitud_reductor_nuevo_imagen',$reductor_id,$usuario_id,6,3,
        ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";
        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);
            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorNuevo"));
        }


    }
    //Termina nuevos reductores
//Termina Reductor


    //Empieza Vias

    public function GetCreateVia()
    {

        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios WHERE tipo_solicitud_id=2";
        $danios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));



        include_once '../view/solicitudVial/create.php';


    }



    public function PostCreateVia()
    {

        $obj = new SolicitudModel();

        $coordi_x = $_POST['coordenada_x_via'];
        $coordi_y = $_POST['coordenada_y_via'];
        $direccion = $coordi_x . " " . $coordi_y;
        $danio = $_POST['danio_id'];
        $usuario = $_SESSION['id'];

        if (isset($_FILES['solicitud_via_imagen']) && $_FILES['solicitud_via_imagen']['error'] === 0) {
            $img = $_FILES['solicitud_via_imagen']['name'];

            // Usar una ruta absoluta para evitar problemas con rutas relativas
            $ruta = "assets/img/img_solicitudes/$img";

            move_uploaded_file($_FILES['solicitud_via_imagen']['tmp_name'], $ruta);

        } else {
            $img = "Sin imagen";
        }

        if ($_POST['solicitud_via_mal_estado_descripcion'] == "") {
            $descripcion = "Sin descripción";
        } else {
            $descripcion = $_POST['solicitud_via_mal_estado_descripcion'];
        }


        //VALIDACIONES
        $validacion = true;
        $campos = array(
            'danio' => 'El campo daño es requerido'
        );

        // Bucle para validar los campos
        foreach ($campos as $campo => $mensaje) {
            $c = trim($$campo);
            if (empty($c)) {

                $_SESSION['errores'][] = $mensaje;
                $validacion = false;
            }

        }

        // function validarNumeros($input){
        //     $patron = "/^[0-9]+$/";
        //     return preg_match($patron,$input)===1;

        // }

        $sql = "INSERT INTO solicitud_vias_mal_estado (solicitud_via_mal_estado_descripcion, solicitud_via_mal_estado_imagen, danio_id, usuario_id, 
        tipo_solicitud_id, estado_id,solicitud_via_mal_estado_direccion) VALUES( '$descripcion', '$img', $danio,  $usuario,  2, 3, ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);

            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetCreateVia") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "getCreateVia"));
        }






        // if ($ejecutar) {


        // } else {
        //     echo "Se ha presentado un error al insertar";


        // }


    }

    public function getVias()
    {

        $obj = new SolicitudModel();
        $rol = $_SESSION['rol'];
        switch ($rol) {
            case 2:
                $sql = "SELECT v.*, ST_AsText(v.solicitud_via_mal_estado_direccion), usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre 
                FROM solicitud_vias_mal_estado v 
                JOIN usuarios usu ON v.usuario_id = usu.usuario_id 
                JOIN tipo_solicitudes tip ON v.tipo_solicitud_id = tip.tipo_solicitud_id 
                JOIN estados e ON v.estado_id = e.estado_id 
                JOIN danios da ON v.danio_id = da.danio_id
                ORDER BY v.solicitud_via_mal_estado_id ASC";

                $vias = pg_fetch_all($obj->consult($sql));

                break;
            case 4:
                $sql = "SELECT v.*, ST_AsText(v.solicitud_via_mal_estado_direccion), usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre 
                FROM solicitud_vias_mal_estado v 
                JOIN usuarios usu ON v.usuario_id = usu.usuario_id 
                JOIN tipo_solicitudes tip ON v.tipo_solicitud_id = tip.tipo_solicitud_id 
                JOIN estados e ON v.estado_id = e.estado_id 
                JOIN danios da ON v.danio_id = da.danio_id
                WHERE v.estado_id = 4
                ORDER BY v.solicitud_via_mal_estado_id ASC";

                $vias = pg_fetch_all($obj->consult($sql));


                break;

            case 5:
                $sql = "SELECT v.*, ST_AsText(v.solicitud_via_mal_estado_direccion), usu.usuario_nombre_1, usu.usuario_apellido_1, usu.usuario_telefono, da.danio_nombre, tip.tipo_solicitud_nombre, e.estado_nombre 
                FROM solicitud_vias_mal_estado v 
                JOIN usuarios usu ON v.usuario_id = usu.usuario_id 
                JOIN tipo_solicitudes tip ON v.tipo_solicitud_id = tip.tipo_solicitud_id 
                JOIN estados e ON v.estado_id = e.estado_id 
                JOIN danios da ON v.danio_id = da.danio_id
                 WHERE v.estado_id = 5
                ORDER BY v.solicitud_via_mal_estado_id ASC";

                $vias = pg_fetch_all($obj->consult($sql));
                break;


        }



        if ($vias) {
            include_once '../view/solicitudVial/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";

        }

    }
    //termina vias
//Empieza pqrs
    public function getCreatePQRS()
    {

        $obj = new SolicitudModel();

        $sql = "SELECT * FROM tipo_pqrs";
        $tipo_pqrs = pg_fetch_all($obj->consult($sql));



        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));





        include_once '../view/solicitudPQRS/create.php';


    }

    public function PostCreatePQRS()
    {

        $obj = new SolicitudModel();
        $descripcion = $_POST['descripcion_pqrs'];
        $archivo = $_POST['adjuncion_pqrs'];
        $usuario = $_SESSION['id'];
        $tipo_p = $_POST['tipo_pqrs_id'];

        //VALIDACIONES
        $validacion = true;
        // $campos = array(
        //     'tipo_pqrs_id' => 'El campo tipo pqrs es requerido',
        //     'descripcion_pqrs' => 'El campo descripcion es requerido'
        // );

        // // Bucle para validar los campos
        // foreach ($campos as $campo => $mensaje) {
        //     $c = trim($$campo);
        //     if (empty($c)) {

        //         $_SESSION['errores'][] = $mensaje;
        //         $validacion = false;
        //     }

        // }



        $sql = "INSERT INTO pqrs ( tipo_pqrs_id, pqrs_descripcion, usuario_id, pqrs_archivo) VALUES(  '$tipo_p','$descripcion', '$usuario', '$archivo')";

        if ($validacion == true) {
            $ejecutar = $obj->insert($sql);

            if ($ejecutar) {
                echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "GetcreatePQRS") . "';
                    }
                });
            </script>";
            } else {
                echo "Se ha presentado un error al insertar";
            }
        } else {
            redirect(getUrl("Solicitud", "Solicitud", "GetcreatePQRS"));
        }






        // if ($ejecutar) {


        // } else {
        //     echo "Se ha presentado un error al insertar";


        // }


    }

    //Empieza Accidentes
    public function GetCreateAccidente()
    {

        $obj = new SolicitudModel();

        $x = $_GET['x'];
        $y = $_GET['y'];

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        // $sql = "SELECT * FROM tipos_via";
        // $vias = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM orientaciones";
        $orientaciones = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_choques";
        $choques = pg_fetch_all($obj->consult($sql));


        include_once '../view/solicitudAccidente/create.php';


    }

    public function getDetalleChoque()
    {
        echo "si";
        $obj = new SolicitudModel();
        if (isset($_POST['tipo_choque'])) {
            $tipo_choque = $_POST['tipo_choque'];

            $sql = "SELECT * from choque_detalles WHERE tipo_choque_id=$tipo_choque";
            $detalleChoques = $obj->consult($sql);


            $i = 0;
            if (pg_num_rows($detalleChoques) > 0) {
                $detalleChoques = pg_fetch_all($detalleChoques);
                foreach ($detalleChoques as $det_choque) {
                    print_r($det_choque);

                    if ($i == 0) {
                        echo "<option value=''>Seleccione...</option>";
                        $i = 1;
                    }

                    echo "<option value='" . $det_choque['choque_detalle_id'] . "'>" . $det_choque['choque_detalle_descripcion'] . "</option>";

                }

            } else {

                echo "error";
            }




        }
    }

    public function PostCreateAccidente()
    {
        $obj = new SolicitudModel();

        // $barrio = $_POST['barrio'];

        $tipo_choque = $_POST['tipo_choque'];

        $id_usuario = $_SESSION['id'];
        $coordi_x = $_POST['coordenada_x_acci'];
        $coordi_y = $_POST['coordenada_y_acci'];
        $direccion = $coordi_x . " " . $coordi_y;


        if (isset($_FILES['solicitud_accidente_imagen']) && $_FILES['solicitud_accidente_imagen']['error'] === 0) {
            $img = $_FILES['solicitud_accidente_imagen']['name'];

            // Usar una ruta absoluta para evitar problemas con rutas relativas
            $ruta = "assets/img/img_solicitudes/$img";

            move_uploaded_file($_FILES['solicitud_accidente_imagen']['tmp_name'], $ruta);

        } else {
            $img = "Sin imagen";
        }


        if (isset($_POST['lesionados'])) {
            $lesionados = $_POST['lesionados'];
        } else {
            $lesionados = "Sin lesionados";
        }

        if (isset($_POST['observacion'])) {
            $descripcion = $_POST['observacion'];
        } else {
            $descripcion = "Sin descripción";
        }

        if ($_POST['detalle_choque'] == "") {
            $choque_detalle_nombre = "Sin detalles";
        } else {
            $detalle = $_POST['detalle_choque'];
            $sql = "SELECT * FROM choque_detalles WHERE choque_detalle_id = $detalle";
            $choque_detalle = pg_fetch_all($obj->consult($sql));

            foreach ($choque_detalle as $choque) {
                $choque_detalle_nombre = $choque['choque_detalle_descripcion'];
            }
        }

        $validacion = true;




        $sql = "INSERT INTO solicitud_accidentes (tipo_choque_id,
        solicitud_accidente_imagen,solicitud_accidente_descripcion,solicitud_accidente_lesionados,estado_id,usuario_id,tipo_solicitud_id,detalle_choque_nombre,solicitud_accidente_direccion) VALUES (
     $tipo_choque, '$img','$descripcion','$lesionados', 3, $id_usuario, 4, '$choque_detalle_nombre',ST_SetSRID(ST_GeomFromText('POINT ($coordi_x $coordi_y)'), 4326))";
        if ($direccion == " ") {
            echo "error";
        } else {
            if ($validacion == true) {
                $ejecutar = $obj->insert($sql);

                if ($ejecutar) {
                    echo "<script>
                Swal.fire({
                    title: '¡Gracias!',
                    text: 'Tu solicitud se ha registrado correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "getSolicitud") . "';
                    }
                });
            </script>";
                } else {
                    echo "Se ha presentado un error al insertar";
                }
            } else {
                redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente"));
            }
        }









    }

    public function getAccidentes()
    {

        $obj = new SolicitudModel();
        $rol = $_SESSION['rol'];


        switch ($rol) {
            case 2:
                $sql = "SELECT sa.*, 
        ST_AsText(sa.solicitud_accidente_direccion), 
        tc.tipo_choque_nombre, 
        e.estado_nombre, 
        tip.tipo_solicitud_nombre, 
        e.estado_nombre, 
        usu.usuario_nombre_1, 
        usu.usuario_apellido_1, 
        usu.usuario_telefono 
 FROM solicitud_accidentes sa 
 JOIN tipo_choques tc ON sa.tipo_choque_id = tc.tipo_choque_id 
 JOIN usuarios usu ON sa.usuario_id = usu.usuario_id 
 JOIN tipo_solicitudes tip ON sa.tipo_solicitud_id = tip.tipo_solicitud_id 
 JOIN estados e ON sa.estado_id = e.estado_id 
 ORDER BY sa.solicitud_accidente_id ASC";


                $accidentes = pg_fetch_all($obj->consult($sql));



                break;
            case 4:
                $sql = "SELECT sa.*, 
        ST_AsText(sa.solicitud_accidente_direccion), 
        tc.tipo_choque_nombre, 
        e.estado_nombre, 
        tip.tipo_solicitud_nombre, 
        e.estado_nombre, 
        usu.usuario_nombre_1, 
        usu.usuario_apellido_1, 
        usu.usuario_telefono 
 FROM solicitud_accidentes sa 
 JOIN tipo_choques tc ON sa.tipo_choque_id = tc.tipo_choque_id 
 JOIN usuarios usu ON sa.usuario_id = usu.usuario_id 
 JOIN tipo_solicitudes tip ON sa.tipo_solicitud_id = tip.tipo_solicitud_id 
 JOIN estados e ON sa.estado_id = e.estado_id 
  WHERE sa.estado_id = 4
 ORDER BY sa.solicitud_accidente_id ASC";


                $accidentes = pg_fetch_all($obj->consult($sql));


                break;

            case 5:
                $sql = "SELECT sa.*, 
        ST_AsText(sa.solicitud_accidente_direccion), 
        tc.tipo_choque_nombre, 
        e.estado_nombre, 
        tip.tipo_solicitud_nombre, 
        e.estado_nombre, 
        usu.usuario_nombre_1, 
        usu.usuario_apellido_1, 
        usu.usuario_telefono 
 FROM solicitud_accidentes sa 
 JOIN tipo_choques tc ON sa.tipo_choque_id = tc.tipo_choque_id 
 JOIN usuarios usu ON sa.usuario_id = usu.usuario_id 
 JOIN tipo_solicitudes tip ON sa.tipo_solicitud_id = tip.tipo_solicitud_id 
 JOIN estados e ON sa.estado_id = e.estado_id 
  WHERE sa.estado_id = 5
 ORDER BY sa.solicitud_accidente_id ASC";


                $accidentes = pg_fetch_all($obj->consult($sql));

                break;


        }





        // $sql = "SELECT sa.*, tc.tipo_choque_id, e.estado_nombre, u.usuario_num_identificacion FROM solicitud_accidentes sa,
        //  tipo_choques tc, estados e, usuarios u WHERE tc.tipo_choque_id=sa.tipo_choque_id AND e.estado_id=sa.estado_id AND 
        //  u.usuario_id=sa.usuario_id ORDER BY sa.solicitud_accidente_id ASC";
        // //$sql="SELECT*FROM usuario";
        // $accidentes = $obj->consult($sql);

        if ($accidentes) {
            include_once '../view/solicitudAccidente/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                    }
                });
            </script>";

        }

    }
    //Termina accidentes

    public function solicitudDetalleMalEstado()
    {
        $obj = new SolicitudModel();

        $id_soli = $_POST['id_soli'];
        $name = $_POST['name_soli'];

        $name_id = $_POST['name_camp_id'];
        $elemento_vial = $_POST['elemento_vial'];
        $id_elemento = $elemento_vial . "_id";
        $tabla_elemento = $elemento_vial . "es";
        $nombre_elemento = $elemento_vial . "_nombre";

        $sql = "SELECT * FROM $name WHERE $name_id = $id_soli";
        $solicitudes = pg_fetch_all($obj->consult($sql));
        $solicitud = $solicitudes;


        foreach ($solicitud as $sol) {
            $elemento_v = $sol[$id_elemento];
            $tipo_solicitudes = $sol['tipo_solicitud_id'];
            $usuarios = $sol['usuario_id'];
            $estados = $sol['estado_id'];
            $danios = $sol['danio_id'];


        }

        $sql = "SELECT * FROM $tabla_elemento WHERE $id_elemento = $elemento_v";
        $element = pg_fetch_all($obj->consult($sql));

        foreach ($element as $ele) {
            $nombre_ele = $ele[$nombre_elemento];
        }

        $sql = "SELECT * FROM tipo_solicitudes WHERE tipo_solicitud_id=$tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        foreach ($tipo_solicitudes as $tipo_solicitud) {
            $id_tipo_soli = $tipo_solicitud['tipo_solicitud_id'];
            $nombre_tipo_soli = $tipo_solicitud['tipo_solicitud_nombre'];
        }

        $sql = "SELECT * FROM usuarios WHERE usuario_id=$usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        foreach ($usuario as $usu) {
            $id_usuario = $usu['usuario_num_identificacion'];
            $rol_usuario = $usu['usuario_rol'];
        }



        $sql = "SELECT * FROM danios WHERE danio_id=$danios";
        $danio = pg_fetch_all($obj->consult($sql));

        foreach ($danio as $dani) {
            $nombre_danio = $dani['danio_nombre'];
        }

        $sql = "SELECT * from estados WHERE estado_id=$estados";
        $estado = pg_fetch_all($obj->consult($sql));

        foreach ($estado as $estadito) {
            $nombre_estado = $estadito['estado_nombre'];
        }
        // $sql = "SELECT tipo_solicitud_id From $name";
        if ($name == "solicitud_seniales_mal_estado") {
            include_once '../view/solicitudes/detalleSM.php';
        } else if ($name == "solicitud_reductores_mal_estado") {
            include_once '../view/solicitudes/detalleRM.php';
        } else if ($name == "solicitud_vias_mal_estado") {
            include_once '../view/solicitudes/detalleVM.php';
        } else if ($name == "solicitud_accidentes  ") {
            $name_id = "solicitud_acccidente_id";
        }

    }
    public function solicitudDetalleNueva()
    {
        $obj = new SolicitudModel();

        $id_soli = $_POST['id_soli'];
        $name = $_POST['name_soli'];
        $name_id = $_POST['name_camp_id'];
        $elemento_vial = $_POST['elemento_vial'];
        $id_elemento = $elemento_vial . "_id";
        $tabla_elemento = $elemento_vial . "es";
        $nombre_elemento = $elemento_vial . "_nombre";
        $sql = "SELECT * FROM $name WHERE $name_id = $id_soli";
        $solicitudes = pg_fetch_all($obj->consult($sql));
        $solicitud = $solicitudes;


        foreach ($solicitud as $sol) {
            $elemento_v = $sol[$id_elemento];
            $tipo_solicitudes = $sol['tipo_solicitud_id'];
            $usuarios = $sol['usuario_id'];
            $estados = $sol['estado_id'];

        }

        $sql = "SELECT * FROM $tabla_elemento WHERE $id_elemento = $elemento_v";
        $element = pg_fetch_all($obj->consult($sql));

        foreach ($element as $ele) {
            $nombre_ele = $ele[$nombre_elemento];
        }

        $sql = "SELECT * FROM tipo_solicitudes WHERE tipo_solicitud_id=$tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        foreach ($tipo_solicitudes as $tipo_solicitud) {
            $id_tipo_soli = $tipo_solicitud['tipo_solicitud_id'];

            $nombre_tipo_soli = $tipo_solicitud['tipo_solicitud_nombre'];
        }

        $sql = "SELECT * FROM usuarios WHERE usuario_id=$usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        foreach ($usuario as $usu) {
            $id_usuario = $usu['usuario_num_identificacion'];
            $rol_usuario = $usu['usuario_rol'];

        }


        $sql = "SELECT * from estados WHERE estado_id=$estados";
        $estado = pg_fetch_all($obj->consult($sql));

        foreach ($estado as $estadito) {
            $nombre_estado = $estadito['estado_nombre'];
        }
        // $sql = "SELECT tipo_solicitud_id From $name";
        if ($name == "solicitud_seniales_nuevas") {
            include_once '../view/solicitudes/detalleSN.php';
        } else if ($name == "solicitud_reductores_nuevos") {
            include_once '../view/solicitudes/detalleRN.php';
        }


    }
    public function solicitudDetalleAccidente()
    {
        $obj = new SolicitudModel();

        $id_soli = $_POST['id_soli'];
        $sql = "SELECT * FROM solicitud_accidentes WHERE solicitud_accidente_id= $id_soli";
        $accidentes = pg_fetch_all($obj->consult($sql));


        foreach ($accidentes as $acci) {
            $tipo_choque = $acci['tipo_choque_id'];
            $tipo_solicitudes = $acci['tipo_solicitud_id'];
            $usuarios = $acci['usuario_id'];
            $estados = $acci['estado_id'];

        }

        $sql = "SELECT * FROM tipo_choques WHERE tipo_choque_id = $tipo_choque";
        $tipo_choq = pg_fetch_all($obj->consult($sql));

        foreach ($tipo_choq as $tipo_ch) {
            $nombre_tipo_choque = $tipo_ch['tipo_choque_nombre'];
        }

        $sql = "SELECT * FROM tipo_solicitudes WHERE tipo_solicitud_id=$tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        foreach ($tipo_solicitudes as $tipo_solicitud) {
            $nombre_tipo_soli = $tipo_solicitud['tipo_solicitud_nombre'];
        }

        $sql = "SELECT * FROM usuarios WHERE usuario_id=$usuarios";
        $usuario = pg_fetch_all($obj->consult($sql));

        foreach ($usuario as $usu) {
            $id_usuario = $usu['usuario_num_identificacion'];
        }


        $sql = "SELECT * from estados WHERE estado_id=$estados";
        $estado = pg_fetch_all($obj->consult($sql));

        foreach ($estado as $estadito) {
            $nombre_estado = $estadito['estado_nombre'];
        }
        // $sql = "SELECT tipo_solicitud_id From $name";

        include_once '../view/solicitudes/detalleAcc.php';



    }
    public function cambiarEstado()
    {
       

        $obj = new SolicitudModel();
        $id_rol = $_SESSION['rol'];
        $accion = $_POST['accion'];
        $estado = $_POST['estado_id'];
        $id_soli = $_POST['solicitud_id'];
        $tipo_soli = $_POST['tipo_solicitud_id'];


        if ($accion == 'Autorizar') {
            if ($estado + 1 < 7) {
                $estado = $estado + 1;


            }
        } else if ($accion == 'Rechazar') {
            if ($estado - 1 > 4) {
                $estado = $estado - 1;

            }

        } else if ($accion == 'Revisar') {
            $estado = 4;

        }
        switch ($tipo_soli) {
            case 1:
                $sql = "UPDATE solicitud_seniales_mal_estado SET estado_id = $estado WHERE solicitud_senial_mal_estado_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'Señal en mal estado'.";
                }

                break;
            case 2:
                $sql = "UPDATE solicitud_vias_mal_estado SET estado_id = $estado WHERE solicitud_via_mal_estado_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'via en mal estado'.";
                }
                break;
            case 3:
                $sql = "UPDATE solicitud_reductores_mal_estado SET estado_id = $estado WHERE solicitud_reductores_mal_estado_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'reductor en mal estado'.";
                }
                break;
            case 4:
                $sql = "UPDATE solicitud_accidentes SET estado_id = $estado WHERE solicitud_accidente_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'Señal en mal estado'.";
                }
                break;
            case 5:
                $sql = "UPDATE solicitud_seniales_nuevas SET estado_id = $estado WHERE solicitud_senial_nueva_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'Señal nueva'.";
                }
                break;
            case 6:
                $sql = "UPDATE solicitud_reductores_nuevos SET estado_id = $estado WHERE solicitud_reductor_nuevo_id = $id_soli";
                $ejecutar = $obj->update($sql);  // $conn es tu conexión a la base de datos
                if ($ejecutar) {
                    echo "<script>
                    Swal.fire({
                        title: '¡Gracias!',
                        text: 'Tu cambio de estado de solicitud se ha registrado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        // Redirigimos al usuario después de que cierre la alerta
                        if (result.isConfirmed) {
                            window.location.href = '" . getUrl("Solicitud", "Solicitud", "postSolicitud") . "';
                        }
                    });
                </script>";
                } else {
                    echo "Error al actualizar la solicitud 'reductor nuevo'.";
                }
                break;

        }



    }
    public function getPqrs(){
        $obj = new SolicitudModel();

        $sql = "SELECT pq.*, tp.tipo_pqrs_nombre, usu.usuario_nombre_1, usu.usuario_num_identificacion  FROM pqrs pq JOIN tipo_pqrs tp ON pq.tipo_pqrs_id=tp.tipo_pqrs_id JOIN usuarios usu ON pq.usuario_id=usu.usuario_id";
        $pqrs = pg_fetch_all($obj->consult($sql));

        

        if ($pqrs) {
            include_once '../view/solicitudPQRS/consult.php';

        } else {

            echo "<script>
                Swal.fire({
                    title: '¡Lo sentimos!',
                    text: 'No hay solicitudes Registradas',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    // Redirigimos al usuario después de que cierre la alerta
                    if (result.isConfirmed) {
                        window.location.href = 'http://localhost:8080/plantillaMvc/web/index.php';
                    }
                });
            </script>";

        }
    }

}
?>