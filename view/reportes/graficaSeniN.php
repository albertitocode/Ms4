

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

 -->
<div class="mt-5">
    <h3 class="display-4">Reporte nuevas señales</h3>
</div>
 <div class="content">
 

 <div class="card" style="width: 50rem;">
      <div class="card-body">
      <button class="btn btn-success "id="downloadExcel">Descargar</button>

        <canvas id="chartis"></canvas>
        
        <script>
          var ctx = document.getElementById("chartis").getContext("2d");
          var mychart = new Chart(ctx, {
            type: "<?= $tipo_dia ?>",
            data: {
              labels: ['<?=  $nombres['nombre_1'] ?>', '<?= $nombres['nombre_2'] ?>', '<?= $nombres['nombre_3'] ?>', '<?= $nombres['nombre_4'] ?>', '<?= $nombres['nombre_5'] ?>'],
              datasets: [{
                label: "<?= $nombre_reporte ?>",
                data: [<?= $dato1 ?>, <?= $dato2 ?>, <?=$dato3 ?>, <?= $dato4 ?>,  <?=$dato5 ?>],
                backgroundColor: [
                  'rgba(255, 99, 132, 0.4)',
                  'rgba(255, 159, 64, 0.4)',
                  'rgba(255, 205, 86, 0.4)',
                  'rgba(75, 192, 192, 0.4)',
                  
                  'rgba(153, 102, 255, 0.4)'
                  
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
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
    const dataValues = [<?= $dato1 ?>, <?= $dato2 ?>, <?=$dato3 ?>, <?= $dato4 ?>,  <?=$dato5 ?>];

    const labels = ['<?=  $nombres['nombre_1'] ?>', '<?= $nombres['nombre_2'] ?>', '<?= $nombres['nombre_3'] ?>', '<?= $nombres['nombre_4'] ?>', '<?= $nombres['nombre_5'] ?>'];
        
        // Obtener el gráfico como imagen
        const canvas = document.getElementById("chartis");
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
</html>