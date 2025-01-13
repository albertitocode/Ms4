
 <!-- include_once '../lib/helphers.php';
 include_once '../view/partials/scripts.php'; -->




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GEOCALI</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../web/assets/js/global.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/estilos.css" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />

    

    <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.js"></script>

  </head>
  <style>
.card{
    margin-top: 20%;
    flex-direction: column;
}
</style>
<body>
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
    <form action="<?php echo getUrl2("Acceso", "Acceso", "postObtenerCodigo"); ?>" method="post" id="formCorreoRecu">
        <!-- <div class="page-header">
            <h3 class="fw-bold mb-3">Registrate</h3>
        </div> -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card align-items-center">
                    <div class="card-header">
                        <div class="card-tittle">
                           <h4> Recuperacion de contraseña</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group">
                                <label for="correo_usuario">Digite aqui su correo</label>
                                <input type="text" name="correo_usuario" id="correo_usuario" class="form-control" placeholder="Correo">
                                <span class="text-danger" id="error_correo_usuario"></span>

                            </div>
                           
                           
                        </div>
                        
                        <div class="mt-5">
                            <input type="submit" id="btnEnviarCorreo" value="Enviar" class="btn btn-success" disabled>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>


