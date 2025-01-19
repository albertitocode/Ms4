
<style>
        .card-scroll {
            
            overflow-x: auto;  /* Habilita el scroll vertical */
        }
    </style>
<div 
class="mt-5">
    <h3 class="display-4">Consultar Usuarios</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Actualizacion</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Usuarios</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Lista PQRS</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-x-scroll">
            <div class="card-header">
                <div class="card-tittle">
                    PQRS
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                 
                   
                        <table class="table table-striped table hover ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo de pqrs</th>
                                    <th>Descripcion</th>
                                    <th>id usuario relacionado</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pqrs as $pq) {
                                // $clase="";
                                // $texto="";
                                echo "<tr>";
                                echo "<td>" . $pq['pqrs_id'] . "</td>";
                                echo "<td>" . $pq['tipo_pqrs_nombre'] . "</td>";
                                echo "<td>" . $pq['pqrs_descripcion'] . "</td>";
                                echo "<td>" . $pq['usuario_num_identificacion'] . "</td>";

                                
                        
                                echo "</tr>";
                            }
                      
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>