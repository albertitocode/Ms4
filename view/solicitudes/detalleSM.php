<div class="mt-5">
    <h3 class="display-4">Solicitud</h3>
</div>
<div class="page-header">
    <h3 class="fw-bold mb-3">Señales</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="<?php echo getUrl("Solicitud", "Solicitud", "getSenialMalEstado"); ?>">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <!-- <li class="nav-item">
            <a href="#">Señal en mal estado</a>
        </li> -->
    </ul>
</div>
<form action="<?php echo getUrl("Solicitud", "Solicitud", "cambiarEstado"); ?>" method="post">

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="card-tittle">
                    Señal en mal estado
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php

                    foreach ($solicitud as $soli) {


                        echo "<div class='col-md-6 col-lg-4'>";
                        echo "  <div class='form-group'>";
                        echo "      <label for=''>Id</label>";
                        echo "       <p>" . $soli['solicitud_senial_mal_estado_id'] . "</p>";
                        echo "   </div>";
                        echo "  <div class='form-group'>";
                        echo "      <label for=''>Fecha</label>";
                        echo "       <p>" . $soli['solicitud_senial_mal_estado_fecha_creacion'] . "</p>";
                        echo "  </div>";
                        echo "  <div class='form-group'>";
                        echo "      <label for='' class='fw-bold'>Señal</label>";
                        echo "       <p>" . $nombre_ele . "</p>";
                        echo "  </div>";
                        echo "  <div class='form-group'>";
                        echo "      <label for='' class='fw-bold'>Estado</label>";
                        echo "       <p>" . $nombre_estado . "</p>";
                        echo "  </div>";
                        echo "</div>";


                        echo " <div class='col-md-6 col-lg-4'>";
                        echo "    <div class='form-group'>";
                        echo "       <label for='tipo_senal_id'>Tipo de solicitud</label>";
                        echo "       <p>" . $nombre_tipo_soli . "</p>";
                        echo "    </div>";
                        echo "    <div class='form-group'>";
                        echo "       <label for=''> Direccion </label>";
                        echo "       <p>" . $soli['solicitud_senial_mal_estado_direccion'] . "</p>";
                        echo "    </div>";
                        echo "    <div class='form-group'>";
                        echo "       <label for=''> Id creador </label>";
                        echo "       <p>" . $id_usuario . "</p>";
                        echo "    </div>";
                        echo "</div>";
                        echo "<div class='col-md-6 col-lg-4'>";
                        echo "    <div class='form-group'>";
                        echo "       <label for=''>Descripcion</label>";
                        echo "       <p>" . $soli['solicitud_senial_mal_estado_descripcion'] . "</p>";
                        echo "    </div>";
                        echo "    <div class='form-group'>";
                        echo "       <p>" . $nombre_danio . "</p>";
                        echo "    </div>";
                        echo "    <div class='form-group'>";
                        echo "       <label for='image' class='d-block'>Imagen de la señal dañada</label>";
                        echo "       <img src=" . $soli['solicitud_senial_mal_estado_imagen'] . " class='img-fluid' data-toggle='modal' data-target='#imageModal' ";
                        echo "       onClick='setImage(" . "../web/assets/img/calva.jpg" . ")'";

                        echo "    </div>";

                        echo "</div>";

                        echo "<div class='modal fade' id='imageModal' tabindex='-1' role='dialog' aria-labelledby='imageModalLabel' aria-hidden='true'>";
                        echo "  <div class='modal-dialog' role='document'>";
                        echo "     <div class='modal-content'>";
                        echo "       <div class='modal-header'>";
                        echo "          <h5 class='modal-tittle' id='imageModalLabel'>Img</h5>";
                        echo "         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        echo "           <span aria-hidden='true'>&times;</span>";
                        echo "         </button>";
                        echo "       </div>";
                        echo "       <div class='modal-body'>";
                        echo "        <img id='modalImage' src='' alt='' class='img-fluid'>";
                        echo "       </div>";
                        echo "     </div>";
                        echo "  </div>";
                        echo "</div>";
                    }
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script>
                        function setImage(src) {
                            document.getElementById('modalImage').src = src;
                        }
                    </script>
                </div>
                <div class="col-md-6 col-lg-4">



                 
                <?php if ($_SESSION["rol"] != 2 && $estados!=2) { ?>
                            <input type="submit" name="accion" class="btn btn-success" value="Autorizar">
                            <input type="submit" name="accion" class="btn btn-danger" value="Rechazar">

                        <?php } else if ($_SESSION["rol"] == 2 && $estados==3) { ?>
                                <input type="Submit" name="accion" class="btn btn-success" value="Revisar">

                        <?php } ?>
                        <?php
                        echo "<input type='hidden' value='$estados' name='estado_id'>";
                        echo "<input type='hidden' value='" . $soli['solicitud_senial_mal_estado_id'] . "' name='solicitud_id'>";
                        echo "<input type='hidden' value='$id_tipo_soli' name='tipo_solicitud_id'>";

                        ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>