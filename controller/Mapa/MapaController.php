<?php
include_once '../model/Mapa/MapaModel.php';

class MapaController
{

    public function abrirMapaPuntos()
    {
        $obj = new MapaModel();
        include_once '../mapa/maqueta4.php';
    }
    public function consultMapa()
    {

        $obj = new MapaModel();
        $sql = "SELECT * from tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        $salude = $_GET['x'];

        include_once '../mapa/consultMapa.php';
    }

    public function abrirMapaAccidentes()
    {


        $obj = new MapaModel();
        $prueba = 5;
        $prueba2 = $_GET['x'];
        $id_solicitud = $_POST['id_consult_mapa'];

        $sql = "SELECT * from tipo_solicitudes";
        $tipo_solicitud = pg_fetch_all($obj->consult($sql));

        if ($id_solicitud == 0) {
            $puntos = 'Todos';
        } else if ($id_solicitud == 1) {
            $puntos = 'Puntos6';
        } else if ($id_solicitud == 2) {
            $puntos = 'Puntos4';
        } else if ($id_solicitud == 3) {
            $puntos = 'Puntos2';
        } else if ($id_solicitud == 4) {
            $puntos = 'Puntos1';
        } else if ($id_solicitud == 5) {
            $puntos = 'Puntos5';
        } else if ($id_solicitud == 6) {
            $puntos = 'Puntos3';
        }

        include_once '../mapa/maquetaAccidentes.php';
    }

    public function filtrarMapa()
    {


        $obj = new MapaModel();
        $prueba = 5;

        $id_tipo_soli = $_POST['tipo_solicitud_mapa'];

        include_once '../mapa/maquetaAccidentes.php';
    }

    public function mapaRegistro()
    {
        $obj = new MapaModel();


        $id_solicitud = $_POST['id_solicitud'];

        include_once '../mapa/mapaRegistro.php';
    }

    public function consultarPuntos($x, $y, $idis)
    {
        $obj = new MapaModel();

        if ($x !== null && $y !== null) {
            $xx = floatval($_GET['x']);
            $yy = floatval($_GET['y']);
            $id = $idis;
            $radio = 0.005;
            switch ($id) {

                case 1:
                    $sql = "
                    SELECT sm.solicitud_senial_mal_estado_id,ts.tipo_solicitud_nombre,sm.solicitud_senial_mal_estado_descripcion,sm.solicitud_senial_mal_estado_fecha_creacion, ST_AsText(sm.solicitud_senial_mal_estado_direccion) AS solicitud_senial_mal_estado 
                    FROM solicitud_seniales_mal_estado sm JOIN tipo_solicitudes ts ON sm.tipo_solicitud_id=ts.tipo_solicitud_id
                    WHERE ST_DWithin(sm.solicitud_senial_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                    ORDER BY ST_Distance(sm.solicitud_senial_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                    LIMIT 1;
                ";
                    break;
                case 2:
                    $sql = "
                    SELECT vm.solicitud_via_mal_estado_id,ts.tipo_solicitud_nombre,vm.solicitud_via_mal_estado_descripcion,vm.solicitud_via_mal_estado_fecha_creacion, ST_AsText(vm.solicitud_via_mal_estado_direccion) AS solicitud_via_mal_estado
                    FROM solicitud_vias_mal_estado vm JOIN tipo_solicitudes ts ON vm.tipo_solicitud_id=ts.tipo_solicitud_id
                    WHERE ST_DWithin(solicitud_via_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                    ORDER BY ST_Distance(solicitud_via_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                    LIMIT 1;
                ";
                    break;
                case 3:
                    $sql = "
                        SELECT rm.solicitud_reductores_mal_estado_id,ts.tipo_solicitud_nombre,rm.solicitud_reductores_mal_estado_descripcion,rm.solicitud_senial_mal_estado_fecha_creacion, ST_AsText(rm.solicitud_reductores_mal_estado_direccion) AS solicitud_reductor_mal_estado
                        FROM solicitud_reductores_mal_estado rm JOIN tipo_solicitudes ts ON rm.tipo_solicitud_id=ts.tipo_solicitud_id
                        WHERE ST_DWithin(solicitud_reductores_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                        ORDER BY ST_Distance(solicitud_reductores_mal_estado_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                        LIMIT 1;
                    ";
                    break;
                case 4:
                    $sql = "
                        SELECT acc.solicitud_accidente_id,acc.solicitud_accidente_descripcion,ts.tipo_solicitud_nombre,acc.solicitud_accidente_fecha_creacion, ST_AsText(acc.solicitud_accidente_direccion) AS solicitud_accidente
                        FROM solicitud_accidentes acc JOIN tipo_solicitudes ts ON acc.tipo_solicitud_id=ts.tipo_solicitud_id
                        WHERE ST_DWithin(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                        ORDER BY ST_Distance(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                        LIMIT 1;
                    ";
                    break;
                case 5:
                    $sql = "
                        SELECT sn.solicitud_senial_nueva_id,sn.solicitud_senial_nueva_descripcion,ts.tipo_solicitud_nombre,sn.solicitud_senial_nueva_fecha_creacion, ST_AsText(sn.solicitud_senial_nueva_direccion) AS solicitud_senial_nueva
                        FROM solicitud_seniales_nuevas sn JOIN tipo_solicitudes ts ON sn.tipo_solicitud_id=ts.tipo_solicitud_id
                        WHERE ST_DWithin(solicitud_senial_nueva_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                        ORDER BY ST_Distance(solicitud_senial_nueva_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                        LIMIT 1;
                    ";
                    break;
                    case 6:
                        $sql = "
                            SELECT rn.solicitud_reductor_nuevo_id,rn.solicitud_reductor_nuevo_descripcion,ts.tipo_solicitud_nombre,rn.solicitud_reductor_nuevo_fecha_creacion, ST_AsText(rn.solicitud_reductor_nuevo_direccion) AS solicitud_reductor_nuevo
                            FROM solicitud_reductores_nuevos rn JOIN tipo_solicitudes ts ON rn.tipo_solicitud_id=ts.tipo_solicitud_id
                            WHERE ST_DWithin(solicitud_reductor_nuevo_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
                            ORDER BY ST_Distance(solicitud_reductor_nuevo_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
                            LIMIT 1;
                        ";
                        break;

            }
            // $sql = "
            //     SELECT solicitud_accidente_id,detalle_choque_nombre, ST_AsText(solicitud_accidente_direccion) AS solicitud_accidente_direccion
            //     FROM solicitud_accidentes
            //     WHERE ST_DWithin(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326), $radio)
            //     ORDER BY ST_Distance(solicitud_accidente_direccion, ST_SetSRID(ST_Point($x, $y), 4326)) 
            //     LIMIT 1;
            // ";

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
