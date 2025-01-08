<?php
    session_start();
    function redirect($url){
        echo "<script type='text/javascript'>"
        ."window.location.href='$url'"
        ."</script>";
    }
    function dd($var){
        echo "<pre>";
        die(print_r($var));
    }
    function getUrl($modulo, $controlador, $funcion,$parametros=false,$pagina=false){
        if($pagina==false){
            $pagina="index";
        }
    
        $url= "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
        if ($parametros != false) {
            foreach ($parametros as $key => $value) {
                $url.="&$key=$value";
            }
        }
        return $url;
    }
    function getUrl2($modulo, $controlador, $funcion,$parametros=false,$pagina=false){
        if($pagina==false){
            $pagina="ajax";
        }
    
        $url= "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
        if ($parametros != false) {
            foreach ($parametros as $key => $value) {
                $url.="&$key=$value";
            }
        }
        return $url;
    }
    function resolve(){
        $modulo=ucwords($_GET['modulo']);
        $controlador=ucwords($_GET['controlador']);
        $funcion=$_GET['funcion'];
        
    
        if(is_dir("../controller/$modulo")){
            if (file_exists("../controller/$modulo/".$controlador."Controller.php")){
                    include_once "../controller/$modulo/".$controlador."Controller.php";
                    $nombreClase = $controlador."Controller";
                    $objClase = new $nombreClase();
                        if(method_exists($objClase,$funcion)){
                            $objClase->$funcion();
                        }else{
                            echo "La funcion especificada no existe";
                        }
            }else{
            echo "El modulo especificado no existe";
            }
        }
    }
    function validarCampoLetras($input){
        $patron="/^[a-zA-Z\s]+$/";
        return preg_match($patron,$input)===1;
    }
    function validarNumeros($input){
        $patron="/^[0-9]+$/";
        return preg_match($patron,$input)===1;
    }
    function validarCorreo($input){
        $patron="/^([a-zA-Z0-9_.-]+)@([a-zA-Z]+)\.([a-zA-Z]{2,})$/";
        return preg_match($patron,$input) == 1;
    }
    function validarContrasenia($input){
        $patron="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[.*_@-]).{8,}$/";
        return preg_match($patron,$input) == 1;
    }
    //revisar expresion regular
    function validacionGeneral($input){
        $patron = '/^(?=(?:[^a-zA-Z]ñÑ*[a-zA-ZñÑ]){10})([a-zA-ZnÑ0-9_()$?"¿]*[a-zA-ZñÑ][a-zA-ZñÑ0-9_()$?"¿]*)*$/';
        return preg_match($patron,$input) == 1;
    }
    function generarCodigo() {
        $longitud = 6;
        $min = pow(10, $longitud - 1);
        $max = pow(10, $longitud) - 1;
        return mt_rand($min, $max);
    }

?>