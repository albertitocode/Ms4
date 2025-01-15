

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
    <h3 class="display-4">Reporte accidentes</h3>
</div>
 <div class="content">
 

 <div class="card" style="width: 50rem;">
      <div class="card-body">
      <button class="btn btn-success ">Descargar</button>

        <canvas id="chartis"></canvas>
        
        <script>
          var ctx = document.getElementById("chartis").getContext("2d");
          var mychart = new Chart(ctx, {
            type: "<?= $tipo_dia ?>",
            data: {
              labels: ['<?=  $nombres['nombre_1'] ?>', '<?= $nombres['nombre_2'] ?>', '<?= $nombres['nombre_3'] ?>', '<?= $nombres['nombre_4'] ?>', '<?= $nombres['nombre_5'] ?>'],
              datasets: [{
                label: 'Solicitudes realizadas',
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
        </script>

      </div>
    </div>
 </div>
</html>