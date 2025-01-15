<?php

include_once '../model/Reportes/ReportesModel.php';



class ReportesController{


    public function getReporte(){


        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reportes.php';
    }

    public function selectReporte(){


        $obj = new ReportesModel();

        // echo "<script>";
        //         echo "console.log('Si metió')";
        //     echo "</script>";

        $id_solicitud = $_POST['id_reporte'];
        // if(isset($id_solicitud)){
        //     echo "<script>";
        //         echo "console.log('Si metió')";
        //     echo "</script>";

        // }
        

        if ($id_solicitud == 1) {
            // include_once '../view/solicitudSenal/malEstado/create.php';
            redirect(getUrl("Reportes", "Reportes", "getReporteSenialMalEstado"));
        } else if ($id_solicitud == 2) {
            // include_once '../view/solicitudVial/create.php';
            redirect(getUrl("Reportes", "Reportes", "getReporteVia"));
        } else if ($id_solicitud == 4) {
            redirect(getUrl("Reportes", "Reportes", "getReporteAccidente"));
        } else if ($id_solicitud == 5) {
            redirect(getUrl("Reportes", "Reportes", "getReporteNuevaSenial"));
        } else if ($id_solicitud == 3) {
            redirect(getUrl("Reportes", "Reportes", "getReporteReductorMalEstado"));
        } else if ($id_solicitud == 6) {
            redirect(getUrl("Reportes", "Reportes", "getReporteReductorNuevo"));
        }
    }
    public function getReporteSenialMalEstado()
    {
        $obj = new ReportesModel();

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteSenialM.php';
    }
    public function postReporteSeniM(){

        $obj = new ReportesModel();

        $tipo_report = $_POST['tipo_reporte'];

        $tipo_dia = $_POST['diagrama'];

       if($tipo_report=='senial'){
         $sql = "SELECT COUNT(*) as totalSeniM1 FROM solicitud_seniales_mal_estado WHERE senial_id=1";
         $totaldato1 = pg_fetch_row($obj->consult($sql));
            $dato1 = $totaldato1[0];
         $sql = "SELECT COUNT(*) as totalSeniM2 FROM solicitud_seniales_mal_estado WHERE senial_id=2";
         $totaldato2 = pg_fetch_row($obj->consult($sql));         
         $dato2 = $totaldato2[0];
         $sql = "SELECT COUNT(*) as totalSeniM3 FROM solicitud_seniales_mal_estado WHERE senial_id=3";
         $totaldato3 = pg_fetch_row($obj->consult($sql));
         $dato3 = $totaldato3[0];
         $sql = "SELECT COUNT(*) as totalSeniM4 FROM solicitud_seniales_mal_estado WHERE senial_id=4";
         $totaldato4 = pg_fetch_row($obj->consult($sql));
         $dato4 = $totaldato4[0];
         $sql = "SELECT COUNT(*) as totalSeniM5 FROM solicitud_seniales_mal_estado WHERE senial_id=5";
         $totaldato5 = pg_fetch_row($obj->consult($sql));
         $dato5 = $totaldato5[0];


         $nombres = array (
            'nombre_1' => 'Pare',
            'nombre_2' => 'No estacionar',
            'nombre_3' => 'Prohibido girae',
            'nombre_4' => 'Limite de velocidad',
             'nombre_5' => 'Line de pare'
         );

         $nombre_reporte = 'Señales';
       }else if($tipo_report=='estado'){
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado WHERE estado_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=4";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=5";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=6";
        $totaldato4 = pg_fetch_row($obj->consult($sql));
        $dato4 = $totaldato4[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=7";
        $totaldato5 = pg_fetch_row($obj->consult($sql));
        $dato5 = $totaldato5[0];

        $nombres = array (
            'nombre_1' => 'Pendiente',
            'nombre_2' => 'En revision',
            'nombre_3' => 'En proceso',
            'nombre_4' => 'Completada',
             'nombre_5' => 'Rechazada'
         );
         $nombre_reporte = 'Estados';
       }else if($tipo_report=='danio'){
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado WHERE danio_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=5";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_mal_estado  WHERE estado_id=6";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
      

        $nombres = array (
            'nombre_1' => 'Deforme',
            'nombre_2' => 'Vandalizada',
            'nombre_3' => 'Despintada'
         );
         $nombre_reporte = 'Daños';
       }

        
       include_once '../view/reportes/graficaSeniM.php';

    }
    public function getReporteNuevaSenial()
    {
        $obj = new ReportesModel();

        $sql = "SELECT * FROM categoria_seniales";
        $categoria_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_seniales";
        $tipo_senal = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM seniales";
        $seniales = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteSenialN.php';
    }
    public function postReporteSeniN(){

            $obj = new ReportesModel();
    
            $tipo_report = $_POST['tipo_reporte'];
    
            $tipo_dia = $_POST['diagrama'];
    
           if($tipo_report=='senial'){
             $sql = "SELECT COUNT(*) as totalSeniN1 FROM solicitud_seniales_nuevas WHERE senial_id=1";
             $totaldato1 = pg_fetch_row($obj->consult($sql));
                $dato1 = $totaldato1[0];
             $sql = "SELECT COUNT(*) as totalSeniM2 FROM solicitud_seniales_nuevas WHERE senial_id=2";
             $totaldato2 = pg_fetch_row($obj->consult($sql));         
             $dato2 = $totaldato2[0];
             $sql = "SELECT COUNT(*) as totalSeniN3 FROM solicitud_seniales_nuevas WHERE senial_id=3";
             $totaldato3 = pg_fetch_row($obj->consult($sql));
             $dato3 = $totaldato3[0];
             $sql = "SELECT COUNT(*) as totalSeniN4 FROM solicitud_seniales_nuevas WHERE senial_id=4";
             $totaldato4 = pg_fetch_row($obj->consult($sql));
             $dato4 = $totaldato4[0];
             $sql = "SELECT COUNT(*) as totalSeniN5 FROM solicitud_seniales_nuevas WHERE senial_id=5";
             $totaldato5 = pg_fetch_row($obj->consult($sql));
             $dato5 = $totaldato5[0];
    
    
             $nombres = array (
                'nombre_1' => 'Pare',
                'nombre_2' => 'No estacionar',
                'nombre_3' => 'Prohibido girae',
                'nombre_4' => 'Limite de velocidad',
                 'nombre_5' => 'Line de pare'
             );
    
             $nombre_reporte = 'Señales';
           }else if($tipo_report=='estado'){
            $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_nuevas WHERE estado_id=3";
            $totaldato1 = pg_fetch_row($obj->consult($sql));
               $dato1 = $totaldato1[0];
            $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_nuevas  WHERE estado_id=4";
            $totaldato2 = pg_fetch_row($obj->consult($sql));         
            $dato2 = $totaldato2[0];
            $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_nuevas WHERE estado_id=5";
            $totaldato3 = pg_fetch_row($obj->consult($sql));
            $dato3 = $totaldato3[0];
            $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_nuevas WHERE estado_id=6";
            $totaldato4 = pg_fetch_row($obj->consult($sql));
            $dato4 = $totaldato4[0];
            $sql = "SELECT COUNT(*) as totalSeniM FROM solicitud_seniales_nuevas  WHERE estado_id=7";
            $totaldato5 = pg_fetch_row($obj->consult($sql));
            $dato5 = $totaldato5[0];
    
            $nombres = array (
                'nombre_1' => 'Pendiente',
                'nombre_2' => 'En revision',
                'nombre_3' => 'En proceso',
                'nombre_4' => 'Completada',
                 'nombre_5' => 'Rechazada'
             );
             $nombre_reporte = 'Estados';
           }
    
            
           include_once '../view/reportes/graficaSeniN.php';
    
        
    }
    public function getReporteReductorMalEstado()
    {
        $obj = new ReportesModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios where tipo_solicitud_id=1";
        $danio = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteReductorM.php';


    }
    public function postReporteReduM(){

        $obj = new ReportesModel();

        $tipo_report = $_POST['tipo_reporte'];

        $tipo_dia = $_POST['diagrama'];

       if($tipo_report=='reduct'){
         $sql = "SELECT COUNT(*) as totalRedu1 FROM solicitud_reductores_mal_estado WHERE reductor_id=2";
         $totaldato1 = pg_fetch_row($obj->consult($sql));
            $dato1 = $totaldato1[0];
         $sql = "SELECT COUNT(*) as totalRedu2 FROM solicitud_reductores_mal_estado WHERE reductor_id=3";
         $totaldato2 = pg_fetch_row($obj->consult($sql));         
         $dato2 = $totaldato2[0];
         $sql = "SELECT COUNT(*) as totalRedu3 FROM solicitud_reductores_mal_estado WHERE reductor_id=4";
         $totaldato3 = pg_fetch_row($obj->consult($sql));
         $dato3 = $totaldato3[0];
         $sql = "SELECT COUNT(*) as totalRedu4 FROM solicitud_reductores_mal_estado WHERE reductor_id=5";
         $totaldato4 = pg_fetch_row($obj->consult($sql));
         $dato4 = $totaldato4[0];
         $sql = "SELECT COUNT(*) as totalRedu5 FROM solicitud_reductores_mal_estado WHERE reductor_id=6";
         $totaldato5 = pg_fetch_row($obj->consult($sql));
         $dato5 = $totaldato5[0];


         $nombres = array (
            'nombre_1' => 'Bache reductivo',
            'nombre_2' => 'Reductor modular tipo A',
            'nombre_3' => 'Reductor modular tipo B',
            'nombre_4' => 'Señal de velcidad maxima',
             'nombre_5' => 'Señal de advertencia de reductor'
         );

         $nombre_reporte = 'Reductores';
       }else if($tipo_report=='estado'){
        $sql = "SELECT COUNT(*) as totalRedu1 FROM solicitud_reductores_mal_estado WHERE estado_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalRedu2 FROM solicitud_reductores_mal_estado  WHERE estado_id=4";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalRedu3 FROM solicitud_reductores_mal_estado  WHERE estado_id=5";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
        $sql = "SELECT COUNT(*) as totalRedu4 FROM solicitud_reductores_mal_estado  WHERE estado_id=6";
        $totaldato4 = pg_fetch_row($obj->consult($sql));
        $dato4 = $totaldato4[0];
        $sql = "SELECT COUNT(*) as totalRedu5 FROM solicitud_reductores_mal_estado  WHERE estado_id=7";
        $totaldato5 = pg_fetch_row($obj->consult($sql));
        $dato5 = $totaldato5[0];

        $nombres = array (
            'nombre_1' => 'Pend3ente',
            'nombre_2' => 'En re4ision',
            'nombre_3' => 'En proceso',
            'nombre_4' => 'Comp4etada',
             'nombre_5' => 'Rechazada'
         );
         $nombre_reporte = 'Estados';
    //    }else if($tipo_report=='danio'){
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado WHERE danio_id=3";
    //     $totaldato1 = pg_fetch_row($obj->consult($sql));
    //        $dato1 = $totaldato1[0];
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado  WHERE estado_id=5";
    //     $totaldato2 = pg_fetch_row($obj->consult($sql));         
    //     $dato2 = $totaldato2[0];
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado  WHERE estado_id=6";
    //     $totaldato3 = pg_fetch_row($obj->consult($sql));
    //     $dato3 = $totaldato3[0];
      

    //     $nombres = array (
    //         'nombre_1' => 'Deforme',
    //         'nombre_2' => 'Vandalizada',
    //         'nombre_3' => 'Despintada'
    //      );
    //      $nombre_reporte = 'Daños';
       }

        
       include_once '../view/reportes/graficaReduM.php';
    }
    public function getReporteReductorNuevo()
    {
        $obj = new ReportesModel();

        $sql = "SELECT * FROM categoria_reductores";
        $categoria_reductores = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT  * FROM reductores";
        $reductores = pg_fetch_all($obj->consult($sql));

        include_once '../view/reportes/reporteReductorN.php';


    }
    public function postReporteReductorNuevo(){
        $obj = new ReportesModel();

        $tipo_report = $_POST['tipo_reporte'];

        $tipo_dia = $_POST['diagrama'];

       if($tipo_report=='reduct'){
         $sql = "SELECT COUNT(*) as totalRedu1 FROM solicitud_reductores_nuevos WHERE reductor_id=2";
         $totaldato1 = pg_fetch_row($obj->consult($sql));
            $dato1 = $totaldato1[0];
         $sql = "SELECT COUNT(*) as totalRedu2 FROM solicitud_reductores_nuevos WHERE reductor_id=3";
         $totaldato2 = pg_fetch_row($obj->consult($sql));         
         $dato2 = $totaldato2[0];
         $sql = "SELECT COUNT(*) as totalRedu3 FROM solicitud_reductores_nuevos WHERE reductor_id=4";
         $totaldato3 = pg_fetch_row($obj->consult($sql));
         $dato3 = $totaldato3[0];
         $sql = "SELECT COUNT(*) as totalRedu4 FROM solicitud_reductores_nuevos WHERE reductor_id=5";
         $totaldato4 = pg_fetch_row($obj->consult($sql));
         $dato4 = $totaldato4[0];
         $sql = "SELECT COUNT(*) as totalRedu5 FROM solicitud_reductores_nuevos WHERE reductor_id=6";
         $totaldato5 = pg_fetch_row($obj->consult($sql));
         $dato5 = $totaldato5[0];


         $nombres = array (
            'nombre_1' => 'Bache reductivo',
            'nombre_2' => 'Reductor modular tipo A',
            'nombre_3' => 'Reductor modular tipo B',
            'nombre_4' => 'Señal de velcidad maxima',
             'nombre_5' => 'Señal de advertencia de reductor'
         );

         $nombre_reporte = 'Reductores';
       }else if($tipo_report=='estado'){
        $sql = "SELECT COUNT(*) as totalRedu1 FROM solicitud_reductores_nuevos WHERE estado_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalRedu2 FROM solicitud_reductores_nuevos  WHERE estado_id=4";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalRedu3 FROM solicitud_reductores_nuevos  WHERE estado_id=5";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
        $sql = "SELECT COUNT(*) as totalRedu4 FROM solicitud_reductores_nuevos  WHERE estado_id=6";
        $totaldato4 = pg_fetch_row($obj->consult($sql));
        $dato4 = $totaldato4[0];
        $sql = "SELECT COUNT(*) as totalRedu5 FROM solicitud_reductores_nuevos  WHERE estado_id=7";
        $totaldato5 = pg_fetch_row($obj->consult($sql));
        $dato5 = $totaldato5[0];

        $nombres = array (
            'nombre_1' => 'Pend3ente',
            'nombre_2' => 'En re4ision',
            'nombre_3' => 'En proceso',
            'nombre_4' => 'Comp4etada',
             'nombre_5' => 'Rechazada'
         );
         $nombre_reporte = 'Estados';
    //    }else if($tipo_report=='danio'){
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado WHERE danio_id=3";
    //     $totaldato1 = pg_fetch_row($obj->consult($sql));
    //        $dato1 = $totaldato1[0];
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado  WHERE estado_id=5";
    //     $totaldato2 = pg_fetch_row($obj->consult($sql));         
    //     $dato2 = $totaldato2[0];
    //     $sql = "SELECT COUNT(*) as totalReduM FROM solicitud_reductores_mal_estado  WHERE estado_id=6";
    //     $totaldato3 = pg_fetch_row($obj->consult($sql));
    //     $dato3 = $totaldato3[0];
      

    //     $nombres = array (
    //         'nombre_1' => 'Deforme',
    //         'nombre_2' => 'Vandalizada',
    //         'nombre_3' => 'Despintada'
    //      );
    //      $nombre_reporte = 'Daños';
       }

        
       include_once '../view/reportes/graficaReduN.php';
    
    }

    public function getReporteVia()
    {

        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM danios WHERE tipo_solicitud_id=2";
        $danios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM estados";
        $estado = pg_fetch_all($obj->consult($sql));




        include_once '../view/reportes/reporteVia.php';


    }
    public function postReporteVia(){

        $obj = new ReportesModel();

        $tipo_report = $_POST['tipo_reporte'];

        $tipo_dia = $_POST['diagrama'];

        if($tipo_report =='via'){
                $sql = "SELECT COUNT(*) as totalvias FROM solicitud_vias_mal_estado WHERE danio_id=1";
                $totaldato1 = pg_fetch_row($obj->consult($sql));
                   $dato1 = $totaldato1[0];
                $sql = "SELECT COUNT(*) as totalvias FROM solicitud_vias_mal_estado  WHERE danio_id=2";
                $totaldato2 = pg_fetch_row($obj->consult($sql));         
                $dato2 = $totaldato2[0];
                $sql = "SELECT COUNT(*) as totalvias FROM solicitud_vias_mal_estado  WHERE danio_id=4";
                $totaldato3 = pg_fetch_row($obj->consult($sql));
                $dato3 = $totaldato3[0];
              
        
                $nombres = array (
                    'nombre_1' => 'Hueco',
                    'nombre_2' => 'Bache',
                    'nombre_3' => 'Piel de cocodrilo'
                 );
                 $nombre_reporte = 'Daños';

       }else if($tipo_report =='estado'){
        $sql = "SELECT COUNT(*) as totalRedu1 FROM solicitud_reductores_nuevos WHERE estado_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalRedu2 FROM solicitud_reductores_nuevos  WHERE estado_id=4";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalRedu3 FROM solicitud_reductores_nuevos  WHERE estado_id=5";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
        $sql = "SELECT COUNT(*) as totalRedu4 FROM solicitud_reductores_nuevos  WHERE estado_id=6";
        $totaldato4 = pg_fetch_row($obj->consult($sql));
        $dato4 = $totaldato4[0];
        $sql = "SELECT COUNT(*) as totalRedu5 FROM solicitud_reductores_nuevos  WHERE estado_id=7";
        $totaldato5 = pg_fetch_row($obj->consult($sql));
        $dato5 = $totaldato5[0];

        $nombres = array (
            'nombre_1' => 'Pendiente',
            'nombre_2' => 'En revision',
            'nombre_3' => 'En proceso',
            'nombre_4' => 'Completada',
             'nombre_5' => 'Rechazada'
         );
         $nombre_reporte = 'Estados';

       }

        
       include_once '../view/reportes/graficaVia.php';

    }

    public function getReporteAccidente()
    {

        $obj = new ReportesModel();

        $sql = "SELECT * FROM tipo_solicitudes";
        $tipo_solicitudes = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM barrios";
        $barrios = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM letras_via";
        $letras = pg_fetch_all($obj->consult($sql));

        $sql = "SELECT * FROM tipo_choques";
        $choques = pg_fetch_all($obj->consult($sql));


        include_once '../view/reportes/reporteAccidentes.php';


    }
    public function postReporteAcci(){

        $obj = new ReportesModel();

        $tipo_report = $_POST['tipo_reporte'];

        $tipo_dia = $_POST['diagrama'];

       if($tipo_report=='tipo_choque'){
         $sql = "SELECT COUNT(*) as totalAcci1 FROM solicitud_accidentes WHERE tipo_choque_id=1";
         $totaldato1 = pg_fetch_row($obj->consult($sql));
            $dato1 = $totaldato1[0];
         $sql = "SELECT COUNT(*) as totalAcci2 FROM solicitud_accidentes WHERE tipo_choque_id=2";
         $totaldato2 = pg_fetch_row($obj->consult($sql));         
         $dato2 = $totaldato2[0];
         $sql = "SELECT COUNT(*) as totalAcci3 FROM solicitud_accidentes WHERE tipo_choque_id=3";
         $totaldato3 = pg_fetch_row($obj->consult($sql));
         $dato3 = $totaldato3[0];
         $sql = "SELECT COUNT(*) as totalAcci4 FROM solicitud_accidentes WHERE tipo_choque_id=4";
         $totaldato4 = pg_fetch_row($obj->consult($sql));
         $dato4 = $totaldato4[0];
         $sql = "SELECT COUNT(*) as totalAcci5 FROM solicitud_accidentes WHERE tipo_choque_id=5";
         $totaldato5 = pg_fetch_row($obj->consult($sql));
         $dato5 = $totaldato5[0];


         $nombres = array (
            'nombre_1' => 'Colision entre vehiculos',
            'nombre_2' => 'Colision con objeto fijo',
            'nombre_3' => 'Atropello',
            'nombre_4' => 'Volcamiento',
             'nombre_5' => 'Otro'
         );

         
       }else{
        $sql = "SELECT COUNT(*) as totalAcci1 FROM solicitud_accidentes WHERE estado_id=3";
        $totaldato1 = pg_fetch_row($obj->consult($sql));
           $dato1 = $totaldato1[0];
        $sql = "SELECT COUNT(*) as totalAcci2 FROM solicitud_accidentes WHERE estado_id=4";
        $totaldato2 = pg_fetch_row($obj->consult($sql));         
        $dato2 = $totaldato2[0];
        $sql = "SELECT COUNT(*) as totalAcci3 FROM solicitud_accidentes WHERE estado_id=5";
        $totaldato3 = pg_fetch_row($obj->consult($sql));
        $dato3 = $totaldato3[0];
        $sql = "SELECT COUNT(*) as totalAcci4 FROM solicitud_accidentes WHERE estado_id=6";
        $totaldato4 = pg_fetch_row($obj->consult($sql));
        $dato4 = $totaldato4[0];
        $sql = "SELECT COUNT(*) as totalAcci5 FROM solicitud_accidentes WHERE estado_id=7";
        $totaldato5 = pg_fetch_row($obj->consult($sql));
        $dato5 = $totaldato5[0];

        $nombres = array (
            'nombre_1' => 'Pendiente',
            'nombre_2' => 'En revision',
            'nombre_3' => 'En proceso',
            'nombre_4' => 'Completada',
             'nombre_5' => 'Rechazada'
         );
       }
        
       include_once '../view/reportes/graficaAcci.php';

    }
   
    public function reporteGeneral(){
        
        
         function reportes(){
            $obj = new ReportesModel();    
            $ho=5;
          
            $sql = "SELECT COUNT(*) AS totalAcci FROM solicitud_accidentes";
          $totalAcci = pg_fetch_row($obj->consult($sql));
          $Accidente = $totalAcci[0];
          
          $sql = "SELECT COUNT(*) AS totalSeniM FROM solicitud_seniales_mal_estado";
          $totalSeniM = pg_fetch_row($obj->consult($sql));
          $totalSm = $totalSeniM[0];
          // $totalSM = $totalSeniM['totalSeniM'];
          
          $sql = "SELECT COUNT(*) AS totalReducM FROM solicitud_reductores_mal_estado";
          $totalReduM = pg_fetch_row($obj->consult($sql));
          $ReductorM = $totalReduM[0];
          
          $sql = "SELECT COUNT(*) AS totalSeniN FROM solicitud_seniales_nuevas";
          $totalSeniN = pg_fetch_row($obj->consult($sql));
          $SenialN = $totalSeniN[0];
          
          $sql = "SELECT COUNT(*) AS totalReduN FROM solicitud_reductores_nuevos";
          $totalReduN = pg_fetch_row($obj->consult($sql));
          $ReductorN = $totalReduN[0];
          
          $sql = "SELECT COUNT(*) AS totalVia FROM solicitud_vias_mal_estado ";
          $totalVia= pg_fetch_row($obj->consult($sql));
          $Via = $totalVia[0];
          
          // $obj = new UsuariosModel();
          
          $sql = "SELECT COUNT(*) AS total FROM usuarios";
          $total_usuarios = pg_fetch_row($obj->consult($sql));
          $total_usus = $total_usuarios[0];
          
          // $sql = "SELECT COUNT(*) AS solicitudes FROM tipo_solicitudes";
          // $tipo_solicitudes = pg_fetch_row($obj->consult($sql));
          $total_soli[0] = $totalVia[0] + $totalReduN[0] + $totalSeniN[0] + $totalReduM[0] + $totalSeniM[0] +  $totalAcci[0];
          
          return array(
           'Accidente' => $Accidente,
           'SenialM' => $totalSm,
           'SenialN' => $SenialN,
           'ReductorM' => $ReductorM,
           'ReductorN' => $ReductorN,
           'Vias' => $Via,
           'Usuarios' => $total_usus,
           'Solicitudes' => $total_soli[0]
          );
          
          
          }
        include_once '../view/reportes/reporteGeneral.php';
    }

  
}
?>