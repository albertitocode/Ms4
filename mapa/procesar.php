<?php
include_once '../controller/Mapa/MapaController.php';
$controller = new MapaController();

if (isset($_GET['xx']) && isset($_GET['yy'])) {
    $x = floatval($_GET['xx']);
    $y = floatval($_GET['yy']);
    $controller->consultarPuntosAccidente($x, $y);
} else {
    echo json_encode(array('error' => 'Coordenadas no válidas'));
}
?>