
<style type="text/css">
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
        bor
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

    video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        object-fit: cover;
        z-index: -1;
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
</style>


</head>



<video autoplay muted loop>
    <source src="misc\img\fondoC.mp4" type="video/mp4">
</video>


<div class="mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="display-4">Mapa</h4>
                </div>
                <div class="card-body">
                    <div class="contenedor">

                    <div class="mscross" style="overflow: hidden; width: 950px; height: 700px;
    -moz-user-select: none; position: relative; border-radius: 15px;" id="dc_main">

                    </div>


                    <div id="l2">
                        <div id="Layer1">
                            <div style="overflow: auto; width: 140px; height: 140px; -moz-user-select: none;
         position: relative; z-index: 200; border-radius: 15px; margin-left: 15px; " id="dc_main2"> </div>
                        </div>

                        <div id="Layer2">
                            <form name="select_layers" class="checkbox">
                                <ul>
                                    <p align="left">

                                        <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[0]"
                                                id="check1" value="Cinco"><label for="check1">Poligonos</label></li>

                                    <p align="left">

                                        <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[1]"
                                                id="check2" value="Puntos"><label for="check2">Puntos</label></li>

                                    <p align="left">


                                        <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[2]"
                                                id="check3" value="Two"><label for="check3">Lineas</label></li>
                                    <p>

                                </ul>



                            </form>

                        </div>
                        <div style="background-color: #868ffd;">
                            <form method="post" action="maq.php">
                                <!-- <input type=IMAGE name="image" src="<?php echo $urlImage; ?>" border=1> -->
                            </form>
                            <b> Coordenadas en pixeles:</b> <?php echo $_POST['image_x'] . " , " . $_POST['image_y']; ?>
                            <br><b>Coordenadas mapa:</b><?php echo $map_pt[0] . " , " . $map_pt[1]; ?>
                            </p>
                        </div>

                    </div>



                    <script type="text/javascript">
                        //<![CDATA[

                        myMap1 = new msMap(document.getElementById("dc_main"), 'standardRight');
                        myMap1.setCgi('/cgi-bin/mapserv.exe');
                        myMap1.setMapFile('/ms4w/Apache/htdocs/cali.map');
                        myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
                        myMap1.setLayers('Cinco Six One Two Puntos');
                        // $map=Mymap1;
                        myMap2 = new msMap(document.getElementById("dc_main2"));
                        myMap2.setActionNone();
                        myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
                        myMap2.setMapFile('/ms4w/Apache/htdocs/cali.map');
                        myMap2.setLayers('Cinco Six One Two Puntos');
                        myMap1.setReferenceMap(myMap2);


                        myMap1.redraw(); myMap2.redraw();
                       

                        var infola = new msTool('crear punto', infolay, 'misc/img/coordenada.png', investiguen);
                        myMap1.getToolbar(0).addMapTool(infola);

                        var consult = new msTool('Consultar info', consulta, 'misc/img/coordenada.png', queryMap);
                        myMap1.getToolbar(0).addMapTool(consult);

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
                            myMap2.redraw();

                        }
                        var seleccionado = false;
                        function infolay(e, map) {
                            map.getTagMap().style.cursor = "crosshair";
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

                        function investiguen(event, map, x, y, xx, yy) {
                            if (seleccionado) {
                                alert("Click sobre las coordenadas : x " + x + "y: " + y + "y reales : x" + xx +
                                    "y: " + yy);
                                //document.getElementById("boton1").click();

                                consultar1 = new objectoAjax();


                                consultar1.open("GET", "Insertar_punto.php?x=" + xx + "&y=" + yy, true);

                                consultar1.onreadystatechange = function () {
                                    if (consultar1.readyState == 4) {
                                        var result = consultar1.responseText;
                                        alert(result); //resultado de consulta

                                    }
                                }
                                consultar1.send(null);
                                seleccionado = false;
                                map.getTagMap().style.cursor = "default";
                            }



                        }
                        var select = false;
                        function consulta(e, map) {
                            map.getTagMap().style.cursor = "crosshair";
                            select = true;
                        }
                        function queryMap(event, map, x, y, xx, yy) {
                            if (select) {
                                var coordenadas = xx + " " + yy;
                                alert("Click en las coordenadas: " + coordenadas);

                                // Envía una solicitud AJAX al servidor para obtener los datos.
                                consultar2 = new objectoAjax();

                                consultar2.open("GET", "procesar.php?xx=" + xx + "&yy=" + yy, true);

                                consultar2.onreadystatechange = function () {
                                    if (consultar2.readyState == 4) {
                                        var result = consultar2.responseText;
                                        alert(result); // Mostrar el resultado de la consulta
                                    }
                                };
                                consultar2.send(null);
                                select = false;
                                map.getTagMap().style.cursor = "default";
                            }
                        }



                    </script>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>