<?php
include_once '../lib/helphers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/login/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="shortcut icon" href="" type="image/x-icon">
  <title>GEO CALI</title>
  <link rel="icon" href="assets/img/logo1.png" type="image/x-icon" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../web/assets/js/global.js"></script>
</head>

<body>
  <main > 
     <section class="principal">  
     <!-- <div class="row">  -->
        <!-- <div class="col-md-12 d-flex "> -->
          <!-- <img class="imagen-central" src="assets/img/logo1.png"> -->
        <!-- </div> -->
     
        <!-- <div class="col-md-6 d-flex justify-content-center align-items-center"> -->
          <div class="texto">
            <h1>Bienvenido a nuestra aplicacion de movilidad</h1>
            <!-- <p><br>Agregar descripcion</p> -->
          </div>
          <!-- </div> -->
          <!-- <div class="col-md-6"> -->
            <!-- <div class="d-flex justify-content-center align-items-center h-100"> -->
              

              


              
              
             
          <div class="formulario">
            <h3>Iniciar Sesión</h3>
            <img src="assets/img/logo1.png" class='logo'>

           
            <form action="<?php echo getUrl("Acceso", "Acceso", "login", false, "ajax"); ?>" method="post" id="formLogin">
            <label for="uname"><b>Correo</b></label>
              <div class="inputbox mb-3">
                <i class='bx bxs-user'></i>
                <input type="email" class="form-control" name="user" id="user">
                <span class="small-text text-danger" id="error_usuario_email"></span><br>
              </div>
              

              <label for="psw"><b>Contraseña</b></label>
              <div class="inputbox mb-3">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" class="form-control" name="pass" id="pass">
                <span class="small-text text-danger" id="error_usuario_contrasena"></span><br>
              
              </div>
              <a href="<?php echo getUrl("Acceso", "Acceso", "ObtenerCodigo", false, "ajax"); ?>">
                  <p>Olvidó su contraseña?</p>
                </a>

              <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                
              <form action="<?php echo getUrl("Usuarios", "Usuarios", "getCreate", "", "ajax"); ?>" method="post" id="form2">
                <button type="submit" class="btn btn-primary w-100" name="registro">Registrarme</button>
              </form>
            </div>
            
            <!-- </div> -->
          <!-- </div> -->
        <!-- </div>  -->
      <!-- </div> -->
    </section>
  </main>
  <footer>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet nostrum ad aspernatur odio. Quasi optio expedita mollitia excepturi cum, maiores ullam necessitatibus, eos iste inventore magnam. Vel saepe harum quisquam.
      Deserunt cumque dolorum voluptatem quis provident optio askjbdkjbskdjbkjsbdkjsbJOIjeionlñoIIiouaishdfnujkadkbjadkvbkabvlkbriusbvjkjbrslkhbjkljhsfioejoidnhvkjfheliuhnldn.</p>
  </footer>
  <script src="assets/login/scrip.js"></script>
</body>

</html>