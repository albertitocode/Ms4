<!-- Sidebar -->

<div class="sidebar" onload="loadColor();">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" onload="loadColor();">
      <a href="../web/index.php" class="logo align-items-center">
        <img
          src="assets/img/logo2.png"
          alt="navbar brand"
          class="navbar-brand"
          height="150"
          width="150" />
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
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">

        <li class="nav-item active">

          <a href="../web/index.php">
            <i class="fas fa-home"></i>
            <p>Inicio</p>

          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fas fa-bars"></i>
          </span>
          <h4 class="text-section">Menu</h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#solicitudes">
            <i class="fas fa-th-list"></i>
            <p>Solicitudes</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="solicitudes">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo getUrl("Solicitud", "Solicitud", "getSolicitud"); ?>">
                  <span class="sub-item">Registrar</span>
                </a>
              </li>
              <li>
                <a href="<?php echo getUrl("Solicitud", "Solicitud", "postSolicitud"); ?>">
                  <span class="sub-item">Consultar</span>
                </a>
              </li>
            </ul>
          </div>

        </li>
        <!-- <li class="nav-item">
          <a data-bs-toggle="collapse" href="#usuarios">
            <i class="fas fa-user"></i>
            <p>Usuarios</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="usuarios">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo getUrl("Usuarios", "Usuarios", "getUsuarios"); ?>">
                  <span class="sub-item">Consultar</span>
                </a>
              </li>
              <li>
                <a href="<?php echo getUrl("Usuarios", "Usuarios", "getCreate"); ?>">
                  <span class="sub-item">Registrar</span>
                </a>
              </li>
              <li>
                <a href="<?php echo getUrl("Usuarios", "Usuarios", "getUpdateUsuarios"); ?>">
                  <span class="sub-item">Actualizar usuarios</span>
                </a>
              </li>
            </ul>
          </div>



        </li> -->

        <!-- termina accidente -->

        <!-- empieza sñal -->

        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarLayouts">
            <i class="fas fa-comment"></i>
            <p>PQRS</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo getUrl("Solicitud", "Solicitud", "GetCreatePQRS"); ?>">
                  <span class="sub-item">Crear pqrs</span>
                </a>
              </li>
              <li>
                <!-- <a href="icon-menu.html">
                  <span class="sub-item">Icon Menu</span>
                </a> -->
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#maps">
            <i class="fas fa-map-marker-alt"></i>
            <p>Mapa</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="maps">
            <ul class="nav nav-collapse">
              <li>
              <a href="<?php echo getUrl("Mapa", "Mapa", "abrirMapaAccidentes")?>">
              <span class="sub-item">Ver Mapa</span>
                </a>
              </li>
              <!-- <li>
                <a href="maps/jsvectormap.html">
                  <span class="sub-item">Jsvectormap</span>
                </a>
              </li> -->
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#charts">
            <i class="far fa-chart-bar"></i>
            <p>Reportes</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo getUrl("Reportes","Reportes","getReporte") ?>">
                  <span class="sub-item">Reportes generales</span>
                </a>
              </li>
              <li>
              <a href="<?php echo getUrl("Reportes","Reportes","getReporte") ?>">
                  <span class="sub-item">Reportes personalizados</span>
                </a>
              </li>
            </ul>
          </div>
        </li>  
        <!-- <li class="nav-item">
          <a href="widgets.html">
            <i class="fas fa-user-plus"></i>
            <p>Widgets</p>
            <span class="badge badge-success">4</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../documentation/index.html">
            <i class="fas fa-file"></i>
            <p>Manuales</p>
            <span class="badge badge-secondary">1</span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#charts">
            <i class="fas fa-cog"></i>
            <p>Configuracion</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
              <li>
                <a href="charts/charts.html">
                  <span class="sub-item">Chart Js</span>
                </a>
              </li>
              <li>
                <a href="charts/sparkline.html">
                  <span class="sub-item">Sparkline</span>
                </a>
              </li>
            </ul>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->