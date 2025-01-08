<?php
include 'conexion.php'; // Asegúrate de que contiene la conexión

if (isset($_GET['xx']) && isset($_GET['yy'])) {
    $xx = floatval($_GET['xx']);
    $yy = floatval($_GET['yy']);
    
    $radio = 0.005; 
    
    $sql = "
        SELECT id, nombre, ST_AsText(geom) AS geom
        FROM lugares
        WHERE ST_DWithin(geom, ST_SetSRID(ST_Point($xx, $yy), 4326), $radio)
        ORDER BY ST_Distance(geom, ST_SetSRID(ST_Point($xx, $yy), 4326)) 
        LIMIT 1;
    ";

    $result = consultar($sql);

        echo json_encode($result); // Devuelve el punto encontrado como JSON
    
} else {
    echo "Coordenadas no válidas.";
}
?>
