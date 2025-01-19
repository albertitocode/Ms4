<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">

    </div>
    <?php
    if (isset($_SESSION['errores'])) {
        echo "<div class='alert alert-danger' role='alert'>";
        foreach ($_SESSION['errores'] as $error) {
            echo $error . "<br>";
        }
        echo "</div>";
        unset($_SESSION['errores']);
    }

    ?>
    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdateUsuarios"); ?>" method="post" id="formUsu">
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
                    <a href="#">Actualizar usuarios</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Actualizacion Usuarios
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="col-md-3 mt-4">
                            <label for="">Número de documento</label>
                            <input type="text" name="id_data" id="id_data" class="form-control"
                                placeholder="Ingrese el número de documento aquí"
                                data-url='<?php echo getUrl("Usuarios", "Usuarios", "buscarUsuario", false, "ajax"); ?>'>
                        </div>
                        <div class="row" id="datos">
                        <input type="hidden" name="identificador_update" value="1">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>