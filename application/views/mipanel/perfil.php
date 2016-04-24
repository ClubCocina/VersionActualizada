<div>
    <?php $this->load->view('mipanel/menu') ?>
    <div id="form-panel" class="col-xs-10 col-xs-offset-1">
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('mipanel/perfil'); ?>
        <div class="row bg-color-general row-margin-bottom">
            <div id="container-form">
                <div id="datos-configuracion" class="col-xs-12 col-sm-6">
                    <div class="campo-conf">
                        <label for="nombre" >Nombre</label><br>
                        <input type="text" name="nombre" id="nombre" value="<?= set_value('nombre', $usuario['nombre']); ?>">
                    </div>
                    <div class="campo-conf">
                        <label for="aPaterno">Apellido Paterno</label><br>
                        <input type="text" name="aPaterno" id="aPaterno" class="apellido"  value="<?= set_value('aPaterno', $usuario['apellidoPaterno']); ?>">
                    </div>
                    <div class="campo-conf">
                        <label for="aMaterno">Apellido Materno</label><br>
                        <input type="text" name="aMaterno" id="aMaterno" class="apellido"  value="<?= set_value('aMaterno', $usuario['apellidoMaterno']); ?>">
                    </div>
                    <div class="campo-conf">
                        <label for="mail">Email</label><br>
                        <input type="text" name="mail" id="mail" value="<?= set_value('mail', $usuario['mail']); ?>">
                    </div>
                    <div class="campo-conf">
                        <label for="direccion">Dirección</label><br>
                        <input type="text" name="direccion" id="direccion">
                    </div>
                    <div class="campo-conf">
                        <label for="password">Contraseña</label><br>
                        <input type="password" name="password" id="password" value="<?= set_value('password', ''); ?>">
                    </div>
                    <div class="campo-conf">
                        <label for="passwordVerificacion">Repetir Contraseña</label><br>
                        <input type="password" name="passwordVerificacion" id="passwordVerificacion" value="<?= set_value('passwordVerificacion', ''); ?>">
                    </div>
                    <div class="campo-conf">
                        <div class="medio-div">
                            <label for="comuna">Comuna</label>
                            <input type="text" name="comuna" id="comuna">
                        </div>
                        <div class="">
                            <label for="dia">Fecha de nacimiento</label>
                            <input type="text" id="fechanac">
                            <input type="hidden" name="fechanac" id="altfecha">
                        </div>
                    </div>
                </div>
                <div id="avatar-configuracion" class="col-xs-12 col-sm-6">
                    <div class="container-imagen">
                        <div id="titulo-avatar" class="">AVATAR</div>
                        <img class="img-responsive" src="<?= base_url('avatar/' . $usuario['avatar']); ?>" />
                    </div>
                    <div class="avatar-uploader">
                        <input class="upload-file" type="file" name="avatar" value="Editar foto">
                    </div>
                    <div class="guardar">
                        <input type="submit" value="Guardar Cambios" class="btn-guardar">
                    </div>
                </div>

                <div class="error-form-panel">
                    <?= isset($error) ? $error : '' ?>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
    <script>
        $(function() {
            $("#fechanac").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                altField: "#altfecha",
                altFormat: 'yy-mm-dd',
                firstDay: 1,
                minDate: -365 * 80,
                maxDate: -365 * 15,
                yearRange: "-80:-15"
            });
            $("#fechanac").datepicker("option", $.datepicker.regional["es"]);
        });
    </script>
</div>