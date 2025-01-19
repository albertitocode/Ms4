<style type="text/css">
    .mscross {
        border: 1px solid #7ea3bf;
        /* color: #000000; */
    }

    .mscross_report_title {
        color: #000000;
    }

    .mscross_report_attr_name {
        color: #000000;
        font-weight: normal;
    }

    .mscross_report_attr_value {
        color: #115aa4;
        font-weight: bold;
    }

    .mscross_reference_zoombox {
        color: #115aa4;
        background: #000000;
        font-weight: bold;
        border: 1px solid #000000;
    }



    .maintable {
        border: 1px solid #7ea3bf;
        /* maintable */
    }


    a#francobollo {
        position: fixed;
        left: 0;
        top: 0;
        display: block;
        height: 80px;
        width: 80px;
        /* background: url(logo_sm_144x35.jpg) top left no-repeat; */
        text-indent: -999em;
        text-decoration: none;
        z-index: 100;
    }



    TD A:hover {
        BACKGROUND-COLOR: #ffffcc;
    }

    LAYER {
        BORDER-RIGHT: #008080 thin inset;
        BORDER-TOP: #008080 thin inset;
        FONT-SIZE: 11px;
        PADDING-BOTTOM: 5px;
        BORDER-LEFT: #33aaaa thin inset;
        PADDING-TOP: 5px;
        BORDER-BOTTOM: #33aaaa thin inset;
        FONT-STYLE: normal;
        FONT-FAMILY: Arial, Helvetica, sans-serif;
        WHITE-SPACE: nowrap;
        BACKGROUND-COLOR: #ff9999;
        FONT-VARIANT: normal
    }

    #layer1 {
        position: absolute;
        width: 562px;
        height: 258px;
        z-index: 200;
        left: 50px;
        top: 50px;
        border-radius: 5px;

    }

    #layer2 {
        position: absolute;
        width: 141px;
        height: 5px;
        z-index: 101;
        left: 1081px;
        top: 216px;
        background-color: #CCCCCC;
        margin-left: 15px;
        justify-content: center;
    }

    body {

        justify-content: center;
        align-items: center;

        background-size: cover;
        background-position: center;


    }

    #l2 {
        margin-left: 10px;
        border-color: aquamarine;

    }

    .mapa {
        justify-content: center;
        display: block;
    }

    .contenedor {
        justify-content: center;
        display: flex;
        z-index: 1;

    }

    h2 {
        text-align: center;
    }

    .mscross {
        background-color: rgb(209, 211, 239);
    }


    .checkbox ul {
        list-style-type: none;
    }

    .checkbox ul li label {
        display: inline-block;
        background: #2b3241;
        border: 1px solid #b1b2cf;
        color: #b1b2cf;
        border-radius: 25px;
        transition: .2s all ease;
        padding: 8px 12px;
    }

    .checkbox label:hover {
        border: 1px solid #868ffd;
    }

    .checkbox ul li label:hover {
        border: 1px solid #868ffd;
    }

    .checkbox ul li input[type="checkbox"]:checked+label {
        border: 1px solid #868ffd;
        background: #868ffd;
        color: #fff;
    }

    .checkbox ul li input[type="checkbox"] {
        opacity: 0;
    }

    .custom-spacing {
        line-height: 2.9; /* Ajusta el valor según lo necesites */
    }
</style>


</head>



<div class="card">
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm"> <!-- Aquí añadimos 'modal-sm' para hacerla más pequeña -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Información del Punto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p id="modalContent">Cargando información...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="card-header">
        <h1 class="">INGRESE LA UBICACIÓN DE LA SOLICITUD EN EL MAPA</h1>
        
    </div>
    <div class="card-body">
        <div class="contenedor">

            <div class="mscross" style="overflow: hidden; width: 500px; height: 400px;
    -moz-user-select: none; position: relative; border-radius: 15px;" id="dc_main">

            </div>
            <div class="custom-spacing">
                <span class="d-block ms-2  text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono <img src='../mapa/misc/img/alpha_button_fullExtent.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                    <strong>Mostar cali </strong> que se encuentra al lado izquierdo de este mensaje
                                    se enfocará el mapa de cali automaticamente<br> <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-3" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
                <span class="d-block ms-2 text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono <img src='../mapa/misc/img/alpha_button_pan.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                     <strong>Mover mapa</strong> que se encuentra al lado izquierdo de este mensaje
                                    podras mover el mapa haciendo click sobre el y arrastrandolo a tu preferencia<br>  <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-2" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
                <span class="d-block ms-2 text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono <img src='../mapa/misc/img/alpha_button_zoombox.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                    <strong>Área a acercar</strong> que se encuentra al lado izquierdo de este mensaje 
                                    podras seleccionar un área del mapa para acercar<br>  <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-2" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
                <span class="d-block ms-2 text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono  <img src='../mapa/misc/img/alpha_button_zoomin.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                     <strong>Acercar</strong> que se encuentra al lado izquierdo de este mensaje
                                    el mapa se acercará automaticamente sin moverlo ni presionar sobre el<br>  <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-2" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
                <span class="d-block ms-2 text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono  <img src='../mapa/misc/img/alpha_button_zoomOut.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                    <strong>Alejar</strong> que se encuentra al lado izquierdo de este mensaje
                                    el mapa se alejara automaticamente sin moverlo ni presionar sobre el<br> <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-2" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
                <span class="d-block ms-2 text-primary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="click"
                    data-bs-html="true" data-bs-content="Si presionas sobre este icono  <img src='../mapa/misc/img/consultar.png' alt='Icono Mundo' style='width: 5px; height: 5px;'> 
                                    <strong>Consultar puntos solicitud</strong> que se encuentra al lado izquierdo de este mensaje 
                                    podras presionar sobre uno de los simbolos del mapa y consultar información sobre una solicitud<br> <a href='<?php echo getUrl("Solicitud", "Solicitud", "getImgCategoriaSenial"); ?>' 
                                    target='_blank'>Ver más</a>">
                    <i class="bi bi-info-circle mt-4" style="font-size: 1rem; cursor: pointer;"></i>
                </span>
            </div>

            <div id="l2">

                <div id="Layer1">
                    <div style="overflow: auto; width: 140px; height: 140px; -moz-user-select: none;
         position: relative; z-index: 200; border-radius: 15px; margin-left: 15px; " id="dc_main2"> </div>
                </div>

                <div id="Layer2">
                    <form name="select_layers" class="checkbox">
                        <ul>
                            <!-- <p align="left">

                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[0]" value="Cinco">
                                <strong>Cinco</strong>
                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[1]" value="Six">
                                <strong>Six</strong>
                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[2]" value="One">
                                <strong>One</strong>     -->
                            <!-- <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[0]" value="Puntos1">
                                <strong>Puntos</strong>

                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[1]" value="Puntos2">
                                <strong>Puntos 2</strong>

                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[2]" value="Puntos3">
                                <strong>Puntos 3</strong>
                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[3]" value="Puntos4">
                                <strong>Puntos 4</strong>

                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[4]" value="Puntos5">
                                <strong>Puntos 5</strong>

                            <p align="left">
                                <input CHECKED onClick="chgLayers()" type="checkbox" name="layer[5]" value="Puntos6">
                                <strong>Puntos 6</strong>
                        </ul>
 -->



                    </form>

                </div>


            </div>



            <script type="text/javascript">
                //<![CDATA[

                myMap1 = new msMap(document.getElementById("dc_main"), 'standardRight');
                myMap1.setCgi('/cgi-bin/mapserv.exe');
                myMap1.setMapFile('/ms4w/Apache/htdocs/plantillaMvc/mapa/cali.map');
                myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
                myMap1.setLayers('Cinco Six One Two');
                // $map=Mymap1;
                myMap2 = new msMap(document.getElementById("dc_main2"), 'standardRight');

                myMap2.setActionNone();
                myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
                myMap2.setMapFile('/ms4w/Apache/htdocs/plantillaMvc/mapa/cali.map');
                myMap2.setLayers('Cinco Six One Two');
                myMap1.setReferenceMap(myMap2);


                myMap1.redraw();
                myMap2.redraw();


                var infola = new msTool('crear punto', infolay, '../mapa/misc/img/seleccionar.png', investiguen);
                myMap1.getToolbar(0).addMapTool(infola);

                chgLayers();

                function chgLayers() {
                    var list = "Layers ";
                    var objForm = document.forms[0];
                    for (i = 0; i < document.forms[0].length; i++) {

                        if (objForm.elements["layer[" + i + "]"].checked) {
                            list = list + objForm.elements["layer[" + i + "]"].value + " ";
                        }
                    }
                    myMap1.setLayers(list);
                    myMap1.redraw();
                }
                var seleccionado = false;

                function infolay(e, map) {
                    myMap1.getTagMap().style.cursor = "crosshair";
                    seleccionado = true;
                }

                function objectoAjax() {
                    var xmlhttp = false;

                    try {
                        xmlhttp = new ActiveXObject("Msxm2.XMLHttpRequest");
                    } catch (e) {
                        try {
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (E) {
                            xmlhttp = false;
                        }
                    }

                    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                        xmlhttp = new XMLHttpRequest();
                        return xmlhttp;

                    }
                }


                var select = false;

                function consulta(e, map) {
                    map.getTagMap().style.cursor = "crosshair";
                    select = true;
                }
                function investiguen(event, map, x, y, xx, yy) {
                    if (seleccionado) {
                        alert("Click sobre las coordenadas : x " + x + "y: " + y + "y reales : x" + xx +
                            "y: " + yy);
                        //document.getElementById("boton1").click();

                        consultar1 = new objectoAjax();

                        //    function enviar() {
                        //          x;
                        //          y;
                        //          xx;
                        //          yy;
                        //     

                        //    }


                        //    

                        consultar1.open("GET", "datosMapa.php?x=" + xx + "&y=" + yy, true);

                        consultar1.onreadystatechange = function() {
                            if (consultar1.readyState == 4) {
                                var result = consultar1.responseText;
                                alert(result); //resultado de consulta
                                window.location.href = "datosMapa.php?x=" + xx + "&y=" + yy + "&id=" + <?php echo $id_solicitud ?>;
                            }

                        }
                        consultar1.send(null);
                        seleccionado = false;
                        map.getTagMap().style.cursor = "default";
                    }



                }

               
            </script>
        </div>

    </div>
</div>