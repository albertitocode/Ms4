<script src="../web/assets/js/global.js"></script>
<div class="main-header" onload="loadColor();">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <!-- <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav> -->

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                
                
                <li class="nav-item">
                 
           <a id="toggleButton"  class="btn rounded-fill" >
              <i id="dl-icon" class="bi bi-moon-fill"></i>

           </a>
        </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                  
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="<?=$_SESSION['foto']?>"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <!-- <span class="op-7">Hi,</span> -->
                      <span class="fw-bold"><?=$_SESSION['primer nombre']?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn" id="menuUser">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="<?=$_SESSION['foto']?>"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?=$_SESSION['primer nombre']." ".$_SESSION['primer apellido']?></h4>
                            <p class="text-muted"><?=$_SESSION['correo']?></p>
                            <a

                            <?php  if($_SESSION['rol']!=1){   ?>
                              href="<?php echo getUrl("Usuarios","Usuarios","getUpdateUsuarios");?>"
                              class="btn btn-xs btn-secondary btn-sm"
                              >Mi perfil</a
                            >
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <?php    
                         if ($_SESSION['rol'] == 1){
                        
                         ?>
                        <a class="dropdown-item" href="<?php echo getUrl("Usuarios","Usuarios","getPerfilAdmin");?>">My Perfil</a>
                         <?php
                         }
                          if($_SESSION['rol']!=1){   
                        ?>
                        <a class="dropdown-item" href="<?php echo getUrl("Solicitud","Solicitud","getHistorial") ?>">Seguimiento solicitudes</a>
                        <?php } ?>
                        <!-- <a class="dropdown-item" href="#">Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Account Setting</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?php echo getUrl("Acceso","Acceso","logout");?>">Cerrar sesion</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>