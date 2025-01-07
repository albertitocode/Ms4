<?php foreach ($usuario as $usu) { ?>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_nombre_1">Primer nombre</label>
            <input type="text" name="usuario_nombre_1" id="usuario_nombre_1" class="form-control"
                value="<?= $usu['usuario_nombre_1'] ?>">

        </div>
        <div class="form-group"> <label for="usuario_apellido_1">Primer apellido</label>
            <input type="text" name="usuario_apellido_1" id="usuario_apellido_1" class="form-control"
                value="<?= $usu['usuario_apellido_1'] ?>">
                <span class="small-text text-danger"
                id="error_usuario_apellido_1"></span>
        </div>
        <div class="form-group">
            <label for="usuario_correo">Correo</label>
            <input type="text" name="usuario_correo" id="usuario_correo" class="form-control"
                value="<?= $usu['usuario_correo'] ?>">
        </div>

    </div>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_nombre_2">Segundo nombre</label>
            <input type="text" name="usuario_nombre_2" id="usuario_nombre_2" class="form-control"
                value="<?= $usu['usuario_nombre_2'] ?>">
        </div>
        <div class="form-group">
            <label for="usuario_apellido_2">Segundo apellido</label>
            <input type="text" name="usuario_apellido_2" id="usuario_apellido_2" class="form-control"
                value="<?= $usu['usuario_apellido_2'] ?>">
        </div>
        <div class="form-group">
            <label for="usuario_contrasenia">Contraseña</label>
            <input type="password" name="usuario_contrasenia" id="usuario_contrasenia" class="form-control"
                value="<?= $usu['usuario_apellido_1'] ?>">
        </div>

    </div>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_telefono">Telefono</label>
            <input type="text" name="usuario_telefono" id="usuario_telefono" class="form-control"
                value="<?= $usu['usuario_telefono'] ?>">
        </div>
        <div class="form-group">
            <label for="tipo_documento_id">Tipo de documento</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control">
                <?php
                // Mostrar el tipo de documento seleccionado actualmente
                echo "<option value='" . $usu['tipo_documento_id'] . "' selected>" . $usu['tipo_documento_nombre'] . "</option>";

                // Listar las demás opciones disponibles
                foreach ($tipo_documento as $tpd) {
                    echo "<option value='" . $tpd['tipo_documento_id'] . "'>" . $tpd['tipo_documento_nombre'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="usuario_num_identificacion">Numero documento</label>
            <input name="usuario_num_identificacion" id="usuario_num_identificacion" class="form-control"
                value="<?= $usu['usuario_num_identificacion'] ?>">
        </div>
        <div class="form-group">
            <label for="rol_id">Rol</label>
            <select name="rol_id" id="" class="form-control">
                <?php
                echo "<option value='" . $usu['rol_id'] . "' selected>" . $usu['rol_nombre'] . "</option>";

                foreach ($roles as $ro) {
                    echo "<option  value='" . $ro['rol_id'] . "'>" . $ro['rol_nombre'] . "</option>";

                }
                ?>
            </select>
        </div>
    </div>
    <div class="mt-5">
        <input type="submit" value="Enviar" class="btn btn-success" name="enviar">

    </div>

<?php } ?>