<?php
include_once '../model/Acceso/AccesoModel.php';
include_once '../model/Usuarios/UsuariosModel.php';
// include_once '../vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

class AccesoController
{

        public function login(){
            $obj = new UsuariosModel();

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM usuarios WHERE usuario_correo='$user' AND usuario_contrasenia='$pass'";
        $usuarios = $obj->consult($sql);
        if ($usuarios) {
            if (pg_num_rows($usuarios) > 0) {
                $usuarios = pg_fetch_all($usuarios);
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
                            
                        }else{
                        $_SESSION['auth']='ok';
                        
                        redirect('../web/index.php');
                    }
                }
            } else {
                $_SESSION['error'] = "El correo y/o Contraseña no se encuentran";
                redirect('login.php');
            }
        } else {
            $_SESSION['error'] = "El correo y/o Contraseña no se encuentran";
            redirect('login.php');
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



    // public function ObtenerCodigo()
    // {
    //     $obj = new AccesoModel();
    //     include_once '../view/reestablecerContrasenia/obtenerCodigo.php';
    // }
    // public function postObtenerCodigo()
    // {
    //     $obj = new AccesoModel();

    //     if(empty($_POST['correo_usuario'])){
    //         echo "Vacio";
    //     }else{
    //         $correo = $_POST['correo_usuario'];
    //     }
        
        

    //     $sql = "SELECT * FROM usuarios WHERE usuario_correo = '$correo'";
    //     $usu = pg_fetch_all($obj->consult($sql));
       
    //            if ($usu) {

    //         $codigo = generarCodigo();
    //         foreach($usu as $us)
    //         {
    //         $id_usuario =  $us['usuario_id']; 
    //         var_dump($codigo);

    //         $sql = "INSERT INTO reestablecerContrasenia (id_usuario,reestablecerContrasenia_codigo,fecha_expiracion) VALUES ($id_usuario,$codigo,NOW() + interval '1 hour')";
    //         var_dump($sql);
    //         $reestablecer = $obj->insert($sql);

    //         if ($reestablecer) {
    //             $mailer = new PHPMailer(true);
    //             $nombre_usuario = $us['usuario_nombre_1'];
            
    //             try {
    //                 $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
    //                 $mailer->isSMTP();
    //                 $mailer->Host = 'smtp.gmail.com';
    //                 $mailer->SMTPAuth = true;
    //                 $mailer->Username = 'gakgroup20.08@gmail.com';
    //                 $mailer->Password = 'lbwx kwji mtvf iydp';
    //                 $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //                 $mailer->Port = 587;
    //                 $mailer->isHTML(true);

    //                 $mailer->setFrom('hgustavo1407@gmail.com', 'Tura');
    //                 $mailer->addAddress($correo, $nombre_usuario);
    //                 $mailer->Subject = 'Reestablecer contrasenia';
    //                 $mailer->Body = 'Hola señorita ' . $nombre_usuario . 'sabemos que tienes problemas para iniciar sesion, escribe el siguiente codigo para poder ingresar: ' . $codigo . ' este codigo se deshabilitará en 5 minutos';
    //                 $mailer->AltBody = 'Hola querido ' . $nombre_usuario . 'sabemos que tienes problemas para iniciar sesion, escribe el siguiente codigo para poder ingresar: ' . $codigo . ' ';

    //                 $mailer->send();
    //                 echo "exito";
    //                 redirect(getUrl2("Acceso","Acceso","enviarCodigo"));
    //             } catch (Exception $e) {
    //                 echo "El mensaje no pudo ser enviado. Error: {$mailer->ErrorInfo}";
    //             }
    //         }else {
    //             echo "Error1 ";
    //         }

    //     }
        
    //     } else {
    //         echo "Error2";
    //     }
    // }
    // public function enviarCodigo(){
    //     $obj = new AccesoModel();

    //     include_once '../view/reestablecerContrasenia/enviarCodigo.php';  
    // }
    // public function postEnviarCodigo()
    // {
    //     $obj = new AccesoModel();

    //     if(isset($_POST['codigo_acceso'])){
    //         echo "trae";
    //     }else{
    //         echo "no trae";
    //     }
    //     $codigo_acceso = $_POST['codigo_acceso'];
        
    //     $sql = "SELECT * FROM reestablecerContrasenia WHERE reestablecerContrasenia_codigo=$codigo_acceso";
    //     var_dump($sql);
    //     $acceso = pg_fetch_all($obj->consult($sql));

    //     if ($acceso) {
    //         foreach($acceso as $acc){
    //             $id = $acc['id_usuario'];
    //         }
            
    //         $sql = "SELECT * FROM usuarios WHERE usuario_id=$id";
    //         var_dump($sql);
    //         $usuario_acceso = $obj->consult($sql);

    //         if ($usuario_acceso){
    //             if(pg_num_rows($usuario_acceso)>0){
    //                 $usuario_acceso = pg_fetch_all($usuario_acceso);
    //                 foreach($usuario_acceso as $usu){
    //                     // if(password_verify($pass,$usu['usu_clave'])){
    //                         $_SESSION['id']=$usu['usuario_id'];
    //                         $_SESSION['primer nombre']=$usu['usuario_nombre_1'];
    //                         $_SESSION['segundo nombre'] = $usu['usuario_nombre_2'];
    //                         $_SESSION['primer apellido']=$usu['usuario_apellido_1'];
    //                         $_SESSION['segundo apellido']=$usu['usuario_apellido_2'];
    //                         $_SESSION['correo']=$usu['usuario_correo'];
    //                         $_SESSION['rol']=$usu['rol_id'];
    //                         $_SESSION['rol nombre']=$usu['rol_nombre'];
    //                         $_SESSION['telefono']=$usu['usuario_telefono'];
    //                         $_SESSION['direccion']=$usu['usuario_direccion'];
    //                         $_SESSION['contrasenia']=$usu['usuario_contrasenia'];
    //                         $_SESSION['tipo_documento_nombre']=$usu['tipo_documento_nombre'];
    //                         $_SESSION['tipo_documento_id']=$usu['tipo_documento_id'];
    //                         $_SESSION['numero_documento']=$usu['usuario_num_identificacion'];
    //                         $_SESSION['foto']=$usu['foto_perfil'];

    //                         // if($usu['estado_id']==2){
    //                         //     echo "<script>
    //                         //     swal({
    //                         //         title: '¡Lo sentimos!',
    //                         //         text: 'Estas eliminado del sistema',
    //                         //         icon: 'success',
    //                         //         Button: 'OK'
    //                         //     });

    //                         // </script>";
    //                         // echo "Error";
    //                         // redirect('../web/login.php');

    //                         // }else{
    //                         $_SESSION['auth']='ok';

    //                         redirect('../web/index.php');
    //                         // }
    //                 } 
    //                 }else{
    //                     $_SESSION['error']="El correo y/o Contraseña no se encuentran";
    //                    redirect('login.php');
    //                 }

    //         }else{
    //             echo  "No se encontraron coincidencias";
    //         }
    //     } else {
    //         echo  "No se econtró coincidencia con algun codigo";
    //     }
    // }

    // public function getIndex(){

    //     $obj = new UsuariosModel();

    //     $sql = "SELECT COUNT(*) AS total FROM usuarios";
    //     $total_usuarios= pg_fetch_all($obj->consult($sql));

    //     redirect('../web/index.php');
    // }
}
