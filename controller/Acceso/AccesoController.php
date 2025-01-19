<?php
include_once '../model/Acceso/AccesoModel.php';
include_once '../model/Usuarios/UsuariosModel.php';
require '../PHPMailer/PHPMailerAutoload.php';

//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\SMTP;
//  use PHPMailer\PHPMailer\Exception;

//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\SMTP;
//  use PHPMailer\PHPMailer\Exception;


class AccesoController
{

    public function login()
    {
        $obj = new UsuariosModel();

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM usuarios WHERE usuario_correo='$user' AND usuario_contrasenia='$pass'";
        $usuarios = pg_fetch_all($obj->consult($sql));
        if ($usuarios) {
        
                foreach ($usuarios as $usu) {
                    // if(password_verify($pass,$usu['usu_clave'])){
                    $_SESSION['id'] = $usu['usuario_id'];
                    $_SESSION['primer nombre'] = $usu['usuario_nombre_1'];
                    $_SESSION['segundo nombre'] = $usu['usuario_nombre_2'];
                    $_SESSION['primer apellido'] = $usu['usuario_apellido_1'];
                    $_SESSION['segundo apellido'] = $usu['usuario_apellido_2'];
                    $_SESSION['correo'] = $usu['usuario_correo'];
                    $_SESSION['rol'] = $usu['rol_id'];
                    //$_SESSION['rol nombre']=$usu['rol_nombre'];
                    $_SESSION['telefono'] = $usu['usuario_telefono'];
                    $_SESSION['direccion'] = $usu['usuario_direccion'];
                    $_SESSION['contrasenia'] = $usu['usuario_contrasenia'];
                    // $_SESSION['tipo_documento_nombre']=$usu['tipo_documento_nombre'];
                    $_SESSION['tipo_documento_id'] = $usu['tipo_documento_id'];
                    $_SESSION['numero_documento'] = $usu['usuario_num_identificacion'];
                    $_SESSION['foto'] = $usu['foto_perfil'];

                    if ($usu['estado_id'] == 2) {
                        //     echo "<script>
                        //     swal({
                        //         title: '¡Lo sentimos!',
                        //         text: 'Estas eliminado del sistema',
                        //         icon: 'success',
                        //         Button: 'OK'
                        //     });

                        // </script>";
                        echo "Error";
                        redirect('../web/login.php');
                    } else {
                        $_SESSION['auth'] = 'ok';

                        redirect('../web/index.php');
                    }
                }
            
        } else {
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: '¡Ups!',
                text: 'Usuario y/o contraseña incorrecta.',
                icon: 'error',
                 timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = 'http://localhost:8080/plantillaMvc/web/index.php';
                
            });
        </script>";
        echo "</body>";
        }
        if (isset($_POST['registro'])) {
            redirect('../view/usuarios/create.php');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login.php');
    }



    public function obtenerCodigo()
    {
        $obj = new AccesoModel();
        include_once '../view/reestablecerContrasenia/obtenerCodigo.php';
    }
    public function postObtenerCodigo()
    {
        $obj = new AccesoModel();

        if (empty($_POST['correo_usuario'])) {
            redirect(getUrl2("Acceso","Acceso","obtenerCodigo"));
        } else {
            $correo = $_POST['correo_usuario'];
        }

        $sql = "SELECT * FROM usuarios WHERE usuario_correo = '$correo' limit 1";
        $usu = pg_fetch_all($obj->consult($sql));

        if ($usu) {

            $codigo = generarCodigo();
            foreach ($usu as $us) {
                $id_usuario =  $us['usuario_id'];
                // var_dump($codigo);

                $sql = "INSERT INTO reestablecerContrasenia (id_usuario,reestablecerContrasenia_codigo,fecha_expiracion) VALUES ($id_usuario,$codigo,NOW() + interval '1 hour')";
                // var_dump($sql);
                $reestablecer = $obj->insert($sql);

                if ($reestablecer) {
                    $mailer = new PHPMailer;
                    $nombre_usuario = $us['usuario_nombre_1'];

                    try {
                        // $mailer->SMTPDebug = 2;
                        $mailer->isSMTP();
                        $mailer->Host = 'smtp.gmail.com';
                        // $mailer->Host = 'mail.ejip.co.id';
                        $mailer->SMTPAuth = true;
                        $mailer->Username = 'gakgroup20.08@gmail.com';
                        $mailer->Password = 'lbwx kwji mtvf iydp';
                        $mailer->SMTPSecure = 'tls';
                        $mailer->Port = 587;
                        $mailer->isHTML(true);

                        $mailer->setFrom('hgustavo1407@gmail.com', 'GEOCALI');
                        $mailer->addAddress($correo, $nombre_usuario);
                        $mailer->Subject = 'Reestablecer contrasenia';
                        $mailer->Body = 'Hola ' . $nombre_usuario . ', <br> Hemos recibido tu solicitud para restablecer la contraseña. <br> Para seguir con este proceso te pediremos que escribas este codigo: ' . $codigo . '<br> Para que puedas cambiar tu contraseña, ah este codigo se deshabilitará en 5 minutos';
                        $mailer->AltBody = 'Hola querido ' . $nombre_usuario . ' sabemos que tienes problemas para iniciar sesion, escribe el siguiente codigo para poder ingresar: ' . $codigo . ' ';

                        $mailer->send();
                        // if (!$mailer->send()) {
                        //     echo "El mensaje no pudo ser enviado. Error: {$mailer->ErrorInfo}";
                        // } else {

                            echo "exito";
                            redirect(getUrl2("Acceso", "Acceso", "enviarCodigo"));
                    // }
                    } catch (Exception $e) {
                        echo "El mensaje no pudo ser enviado. Error: {$mailer->ErrorInfo}";
                    }
                } else {
                    echo "Error1 ";
                }
            }
        } else {
            
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: '¡Ups!',
                text: 'El correo que ingresaste no se encuentra registrado en el sistema.',
                icon: 'error',
                 timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = '" . getUrl2("Acceso", "Acceso", "obtenerCodigo") . "';
                
            });
        </script>";
        echo "</body>";
        }
    }
    public function enviarCodigo()
    {
        $obj = new AccesoModel();

        include_once '../view/reestablecerContrasenia/enviarCodigo.php';
    }
    public function postEnviarCodigo()
    {
        $obj = new AccesoModel();

        if (isset($_POST['codigo_acceso'])) {
            echo "trae";
        } else {
            echo "no trae";
        }
        $confirm = "no auth";
        $codigo_acceso = $_POST['codigo_acceso'];
        
        $sql = "SELECT * FROM reestablecerContrasenia WHERE reestablecerContrasenia_codigo=$codigo_acceso";
        // var_dump($sql);
        $acceso = pg_fetch_all($obj->consult($sql));

        if ($acceso) {
            foreach ($acceso as $acc) {
                $id = $acc['id_usuario'];
            }

            $confirm = "confirm";
            //$sql = "SELECT * FROM usuarios WHERE usuario_id=$id";
            // var_dump($sql);
            //$usuario_acceso = $obj->consult($sql);
            redirect(getUrl2("Acceso", "Acceso", "getContrasenia",array("id"=> $id, "confirm" => $confirm)));

        } else {
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: '¡Oh!',
                text: 'Parece que el codigo que estás ingresando no es el mismo que te mandamos.',
                icon: 'error',
                 timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = '" . getUrl2("Acceso", "Acceso", "enviarCodigo") . "';
                
            });
        </script>";
        echo "</body>";
        }
    }

    public function getContrasenia()
    {
        $obj = new AccesoModel();

        $id =$_GET['id'];
        $confirm = $_GET['confirm'];

        if($confirm =='confirm'){
          $sql = "SELECT * FROM usuarios WHERE usuario_id=$id";
            // var_dump($sql);
            $usuario_acceso = $obj->consult($sql);
            $acceso=$id;
            include_once '../view/reestablecerContrasenia/contrasenia.php';
        }else{
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: 'Ah!',
                text: 'Parece que el codigo que estás ingresando no es el mismo que te mandamos.',
                icon: 'error',
                 timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = '" . getUrl2("Acceso", "Acceso", "enviarCodigo") . "';
                
            });
        </script>";
        echo "</body>";

        }
    }
    public function postContrasenia(){
        $obj = new AccesoModel();

        $id = $_POST['id'];
        $contrasenia = $_POST['contrasenia_1'];

        $sql = "SELECT * FROM usuarios WHERE usuario_id=$id";
        $cambio_clave = pg_fetch_all($obj->consult($sql));

        $sql = "UPDATE usuarios set usuario_contrasenia='$contrasenia' WHERE usuario_id=$id";
        // var_dump($sql);
        $nueva_contrasenia = $obj->update($sql);
        if($nueva_contrasenia){
            foreach($cambio_clave as $clave){
                $nombre_us = $clave['usuario_nombre_1'];
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: 'Yess!',
                text: ' $nombre_us Hemos actualizado tu contraseña, serás redirigido al login para que puedas iniciar sesión ',
                icon: 'succes',
                 timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = 'http://localhost:8080/plantillaMvc/web/index.php';
                
            });

        </script>";
    }
        echo "</body>";
        }else{
            echo "<link rel='stylesheet' href='assets/css/estilos.css' />";
            
            echo "<body>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
            Swal.fire({
                title: 'Ups!',
                text: 'No hemos logrado actualizar tu contraseña, por favor intentalo de nuevo'
                icon: 'error',
                 timer: 5000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                  window.location.href = '" . getUrl2("Acceso", "Acceso", "obtenerCodigo") . "';
                
            });
        </script>";
        echo "</body>";
        }
        
    }
}
