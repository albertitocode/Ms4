<?php
include_once '../model/Usuarios/UsuariosModel.php';
include_once '../model/Reportes/ReportesModel.php';

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

$reportes = reportes();

// $usus = usuarios();


if ($_SESSION['rol']==3){



?>
<script src="../web/assets/js/global.js"></script>
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
    <img src="../web/assets/img/carrusel1.png" class="d-block w-100" alt="...">
    <!-- <a href="" class="btn-click">Click Aquí</a> -->
  </div>
  <div class="carousel-item">
    <img src="../web/assets/img/carusel/carusel2.png" class="d-block w-100" alt="...">
    <a href=<?php getUrl("Solicitud","Solicitud","getSolicitud")?> class="btn-click">Click Aquí</a>
  </div>
  <div class="carousel-item">
    <img src="../web/assets/img/carusel/carusel3.png" class="d-block w-100" alt="...">
    <a href=<?php getUrl("Solicitud","Solicitud","getSolicitud");?> class="btn-click">Click Aquí</a>
  </div>
</div>
</div>

 <?php }else{ ?> 
<div class="container">
  
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">

      <div>
        <!--   -->
        <h6 class="op-7 mb-2">"Life's too short to wast a second"</h6>
        <h6 class="op-7 mb-2"> <?= $_SESSION['primer nombre'] . " " . $_SESSION['primer apellido'] ?></h6>
      </div>
     
      <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
                <!-- <h5>Modo Oscuro y Claro</h5>
                <a id="toggleButton" class="btn btn-primary btn-round">Cambiar a Modo Oscuro</a> -->
                 
                <!-- <button id='toggleButton'>Cambiar a Modo Oscuro</button> -->
              </div> 
    </div>

    <div class="row">
      <div class="col-sm-6 col-md-6">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Usuarios registrados</p>

                  <h4 class="card-tittle"><?= $reportes['Usuarios'] ?></h4>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div

                  class="icon-big text-center icon-secondary bubble-shadow-small">
                  <!-- class="icon-big text-center icon-info bubble-shadow-small"                         -->
                  <!-- <i class="fas fa-user-check"></i> -->
                  <i class="far fa-check-circle"></i>

                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Solicitudes registradas</p>
                  <h4 class="card-title"><?= $reportes['Solicitudes'] ?><h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Sales</p>
                          <h4 class="card-title">$ 1,345</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
      <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Order</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
    </div>

   
    <div class="card" style="width: 50rem;">
      <div class="card-body">
      <button class="btn btn-success " id="downloadExcel">Descargar</button>

        <canvas id="chartPrincipal"></canvas>
        <script>
          var ctx = document.getElementById("chartPrincipal").getContext("2d");
          var mychart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: ['Señales en mal estado', 'Nuevas señales', 'Reductores en mal estado', 'Nuevos reductores', 'Accidentes', 'Vias en mal estado'],
              datasets: [{
                label: 'Solicitudes realizadas',
                data: [<?= $reportes['SenialM'] ?>, <?=$reportes['SenialN'] ?>, <?= $reportes['ReductorM']  ?>, <?= $reportes['ReductorN']  ?>,  <?=$reportes['Accidente']  ?>, <?= $reportes['Vias']  ?>],
                
                backgroundColor: [
                  'rgba(255, 99, 132, 0.4)',
                  'rgba(255, 159, 64, 0.4)',
                  'rgba(255, 205, 86, 0.4)',
                  'rgba(75, 192, 192, 0.4)',
                  'rgba(54, 162, 235, 0.4)',
                  'rgba(153, 102, 255, 0.4)'
                  
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)'
                  
                ],
                borderWidht:1
              }]

            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtzero: true
                  }
                }]
              }
            }
          });
          document.getElementById('downloadExcel').addEventListener('click', async function () {
    console.log("Me metí a la funcion");
    const dataValues = [<?= $reportes['SenialM'] ?>, <?=$reportes['SenialN'] ?>, <?= $reportes['ReductorM']  ?>, <?= $reportes['ReductorN']  ?>,  <?=$reportes['Accidente']  ?>, <?= $reportes['Vias']  ?>];

    const labels = ['Señales en mal estado', 'Nuevas señales', 'Reductores en mal estado', 'Nuevos reductores', 'Accidentes', 'Vias en mal estado'];
        
        // Obtener el gráfico como imagen
        const canvas = document.getElementById("chartPrincipal");
        const imageData = canvas.toDataURL("image/png"); // Convertir a Base64

        // Crear un libro de trabajo ExcelJS
        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet("Reporte");

        // Agregar datos al Excel
        worksheet.addRow(["Filtros", "Total"]); // Encabezados
        labels.forEach((label, index) => {
            worksheet.addRow([label, dataValues[index]]);
        });

        // Insertar la imagen en el Excel
        const imageId = workbook.addImage({
            base64: imageData,
            extension: 'png',
        });

        // Posicionar la imagen (columna A, fila 10, por ejemplo)
        worksheet.addImage(imageId, {
            tl: { col: 0.2, row: labels.length + 3 },
            ext: { width: 500, height: 300 },
        });

        // Descargar el archivo
        const buffer = await workbook.xlsx.writeBuffer();
        const blob = new Blob([buffer], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "Reporte_con_grafico.xlsx";
        link.click();
    });
        </script>

      </div>

    </div>
    <!--Grafica con lightweight-charts -->


    <!-- <div class="card" style="width: 70rem;">
                 <div class="card-body">
                  <div id="chart"></div>
                 <script>
    // Crear el gráfico
    const chart = LightweightCharts.createChart(document.getElementById('chart'), {
        layout: {
            backgroundColor: '#ffffff',
            textColor: '#000000',
        },
        grid: {
            vertLines: {
                color: '#e0e0e0',
            },
            horzLines: {
                color: '#e0e0e0',
            },
        },
        crossHair: {
            mode: LightweightCharts.CrosshairMode.Normal,
        },
    });

    // Definir los datos para el gráfico de barras
    const barSeries = chart.addBarSeries({
        upColor: '#4caf50',   // Color para las barras ascendentes
        downColor: '#f44336', // Color para las barras descendentes
        borderVisible: false,
    });

    // Datos de ejemplo para el gráfico
    const data = [
        { time: '2024-01-01', open: 10, high: 15, low: 5, close: 12 },
        { time: '2024-01-02', open: 12, high: 20, low: 10, close: 18 },
        { time: '2024-01-03', open: 18, high: 22, low: 15, close: 20 },
        { time: '2024-01-04', open: 20, high: 25, low: 18, close: 22 },
        { time: '2024-01-05', open: 22, high: 30, low: 20, close: 28 },
    ];

    // Establecer los datos en la serie de barras
    barSeries.setData(data);
</script>
                 </div>   
            </div> -->
    <!-- <style>
        #chart {
            position: relative;
            width: 600px;
            height: 400px;
        }
    </style>   -->

    <!-- Fin de Grafica con lightweight-charts -->

    <!-- Boton para resteblecer todos los localStorage -->
    <!-- <button id="resetButton">Restablecer Datos</button>

<script>
document.getElementById('resetButton').addEventListener('click', function() {
    localStorage.clear();
    alert("Datos restablecidos.");
});
</script> -->

    <!--Fin de boton para reestablecer los localStorage-->
  </div>
</div>
 <?php } ?> 