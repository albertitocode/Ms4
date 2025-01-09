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
        <h4 class="display-4">Mapa</h4>
    </div>
    <div class="card-body">
        <div class="contenedor">

            <div class="mscross" style="overflow: hidden; width: 500px; height: 400px;
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
                            <!-- <p align="left">

                                <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[0]" id="check1"
                                        value="Poligonos"><label for="check1">Mapa</label></li> -->

                            <p align="left">

                                <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[0]" id="check2"
                                        value="Puntos"><label for="check2">Puntos</label></li>

                            <!-- <p align="left">


                                <li><input CHECKED onClick="chgLayers()" type="checkbox" name="layer[2]" id="check3"
                                        value="Two"><label for="check3">Lineas</label></li>
¿ -->
                        </ul>



                    </form>

                </div>


            </div>



            <script type="text/javascript">
                //<![CDATA[

                myMap1 = new msMap(document.getElementById("dc_main"), 'standardRight');
                myMap1.setCgi('/cgi-bin/mapserv.exe');
                myMap1.setMapFile('/ms4w/Apache/htdocs/plantillaMvc/web/cali.map');
                myMap1.setFullExtent(-76.5928, -76.4613, 3.33181);
                myMap1.setLayers( 'Cinco Six Puntos' );
                // $map=Mymap1;
                myMap2 = new msMap(document.getElementById("dc_main2"), 'standardRight');

                myMap2.setActionNone();
                myMap2.setFullExtent(-76.5928, -76.4613, 3.33181);
                myMap2.setMapFile('/ms4w/Apache/htdocs/plantillaMvc/web/cali.map');
                myMap2.setLayers( 'Cinco Six Puntos' );
                myMap1.setReferenceMap(myMap2);


                myMap1.redraw();
                myMap2.redraw();


                var infola = new msTool('crear punto', infolay, 'misc/img/seleccionar.png', investiguen);
                myMap1.getToolbar(0).addMapTool(infola);

                var consult = new msTool('Consultar info', consulta, 'misc/img/consultar.png', queryMap);
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

                        consultar1.onreadystatechange = function () {
                            if (consultar1.readyState == 4) {
                                var result = consultar1.responseText;
                                alert(result); //resultado de consulta
                                window.location.href = "../web/datosMapa.php?x=" + xx + "&y=" + yy;
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

                        // Envía una solicitud AJAX al servidor para obtener los datos.
                        consultar2 = new objectoAjax();

                        consultar2.open("GET", "procesar.php?xx=" + xx + "&yy=" + yy, true);

                        consultar2.onreadystatechange = function () {
                            if (consultar2.readyState == 4) {
                                var result = consultar2.responseText;
                                const data = JSON.parse(result);
                                if (data.length > 0) {
                                    // Extraer la información del primer objeto (en caso de que haya más de uno)
                                    const info = data[0];
                                    const id = info.solicitud_accidente_id;
                                    const nombre = info.detalle_choque_nombre;
                                    const geom = info.solicitud_accidente_direccion;
                                    // Extraer las coordenadas del campo
                                    const coords = geom.replace('POINT(', '').replace(')', '').split(' ');
                                    const lat = coords[1];
                                    const lon = coords[0];

                                    // Crear el contenido para la modal
                                    const modalContent = `
                                                    <strong>ID:</strong> ${id} <br>
                                                    <strong>Nombre:</strong> ${nombre} <br>
                                                    <strong>Coordenadas:</strong> Lat: ${lat}, Lon: ${lon}
                                                `;

                                    // Mostrar la información en el cuerpo de la modal
                                    document.getElementById("modalContent").innerHTML = modalContent;

                                    // Mostrar la modal
                                    const infoModal = new bootstrap.Modal(document.getElementById("infoModal"));
                                    infoModal.show();
                                }

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