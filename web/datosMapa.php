<?php
include_once '../lib/helphers.php';
    $x = $_GET['x'];
    $y = $_GET['y'];
    $id_solicitud = $_GET['id'];

    if ($id_solicitud == 1) {
        // include_once '../view/solicitudSenal/malEstado/create.php';
        redirect(getUrl("Solicitud", "Solicitud", "getCreateSenialMalEstado",array("x"=> $x, "y" => $y)));
    } else if ($id_solicitud == 2) {
        // include_once '../view/solicitudVial/create.php';
        redirect(getUrl("Solicitud", "Solicitud", "GetCreateVia",array("x"=> $x, "y" => $y)));
    } else if ($id_solicitud == 4) {
        redirect(getUrl("Solicitud", "Solicitud", "getCreateAccidente",array("x"=> $x, "y" => $y)));
    } else if ($id_solicitud == 5) {
        redirect(getUrl("Solicitud", "Solicitud", "getCreateNuevaSenial",array("x"=> $x, "y" => $y)));
    } else if ($id_solicitud == 3) {
        redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorMalEstado",array("x"=> $x, "y" => $y)));
    } else if ($id_solicitud == 6) {
        redirect(getUrl("Solicitud", "Solicitud", "getCreateReductorNuevo",array("x"=> $x, "y" => $y)));
    }
//  redirect(getUrl("Solicitud","Solicitud","getSolicitud",array("x"=> $x, "y" => $y)));
?>

