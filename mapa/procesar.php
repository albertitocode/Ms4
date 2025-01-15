<?php
include_once '../controller/Mapa/MapaController.php';
$controller = new MapaController();

if (isset($_GET['xx']) && isset($_GET['yy'])) {
    $x = floatval($_GET['xx']);
    $y = floatval($_GET['yy']);
    $idis = $_GET['id'];
    $controller->consultarPuntos($x, $y,$idis);
} else {
    echo json_encode(array('error' => 'Coordenadas no válidas'));
}
?>