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
   
    <form action="<?php echo getUrl2("Acceso", "Acceso", "postContrasenia"); ?>" method="post" id="formContra">
     
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card align-items-center">
                    <div class="card-header">
                        <div class="card-tittle">
                           <h4> Nueva contraseña</h4>
                        </div>
                    </div>
                    <div class="card-body">
          
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group">
                                <label for="contrasenia_1">Digite aqui tu nueva contraseña</label>
                                <input type="text" name="contrasenia_1" id="contrasenia_1" class="form-control" placeholder="Codigo">
                                <span class="text-danger" id="error_contrasenia_1" ></span>
                            </div>
                            <div class="form-group">
                                <label for="contrasenia_2">Confirma tu nueva contraseña</label>
                                <input type="text" name="contrasenia_2" id="contrasenia_2" class="form-control" placeholder="Codigo">
                                <span class="text-danger" id="error_contrasenia_2" ></span>
                            </div>
                           
                        </div>
                        
                        <div class="mt-5">
                            <input type="submit" value="Enviar" id="btnContrasenia" class="btn btn-success">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</body>
</html>


