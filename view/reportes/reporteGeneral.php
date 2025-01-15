<?php



$reportes = reportes();
?>

<div class="mt-5">

    <strong>Graficos generales</strong>
</div>
<div class="container">
    <div class="row">
      
    

   <div class="col-md-6 col-lg-4">
    <div class="card" style="width: 30rem;">
      <div class="card-body">
      <button class="btn btn-success " id="downloadExcel">Descargar</button>

        <canvas id="grafica1"></canvas>
        <script>
          var ctx = document.getElementById("grafica1").getContext("2d");
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
        const canvas = document.getElementById("grafica1");
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
    <div class="card" style="width: 30rem;">
      <div class="card-body">
      <button class="btn btn-success " id="downloadExcel">Descargar</button>

        <canvas id="grafica3"></canvas>
        <script>
          var ctx = document.getElementById("grafica3").getContext("2d");
          var mychart = new Chart(ctx, {
            type: "line",
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
        const canvas = document.getElementById("grafica3");
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
    </div>
    <div class="col-md-6 col-lg-4">
    </div>
    <div class="col-md-6 col-lg-4">
    <div class="card" style="width: 20rem; height:30rem;">
      <div class="card-body">
      <button class="btn btn-success " id="downloadExcel">Descargar</button>

        <canvas id="grafica2"></canvas>
        <script>
          var ctx = document.getElementById("grafica2").getContext("2d");
          var mychart = new Chart(ctx, {
            type: "pie",
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
        const canvas = document.getElementById("grafica2");
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
    </div>
    <div class="row">

    
    </div>

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
</div>