<?php
include_once '../model/Mapa/MapaModel.php';

class MapaController
{
    public function abrirMapa()
    {
        $obj = new MapaModel();
        include_once '../view/mapa/maqueta4.php';
    }

    public function consultarPuntosAccidente($x, $y)
    {
        $obj = new MapaModel();

        if ($x !== null && $y !== null) {
            $xx = floatval($_GET['x']);
            $yy = floatval($_GET['y']);
            
            $radio = 0.005; 
            
            $sql = "
                SELECT solicitud_accidente_id,detalle_choque_nombre, ST_AsText(solicitud_accidente_direccion) AS solicitud_accidente_direccion
                FROM solicitud_accidentes
                WHERE ST_DWithin(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                ORDER BY ST_Distance(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                LIMIT 1;
            ";
        
            $result = pg_fetch_all($obj->consult($sql));
            if ($result) {
                echo json_encode($result);
            } else {
                echo json_encode(array('error' => 'No se encontraron datos.'));
            }
        } else {
            echo json_encode(array('error' => 'Coordenadas no válidas.'));
        }
    }

    

}
?>