<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <div id="contacto" class="bg-color-general">
            <div class="titulo-contacto">Llámanos al <a href="tel:+56957832786">+56 9 5783 2786</a> o déjanos un mensaje</div>
            <?= form_open('home/contacto') ?>
            <div class="col-sm-6 col-xs-12">
                <div class="contacto-fields">
                    <div class="label">Nombre *</div>
                    <div>
                        <input type="text" name="nombre"/>
                        <div class="error-validacion"><?= form_error('nombre') ?></div>
                    </div>
                </div>
                <div class="contacto-fields">
                    <div class="label">Correo *</div>
                    <div>
                        <input type="text" name="mail"/>
                        <div class="error-validacion"><?= form_error('mail') ?></div>
                    </div>
                </div>
                <div class="contacto-fields">
                    <div class="label">Asunto</div>
                    <div>
                        <input type="text" name="asunto"/>
                        <div class="error-validacion"><?= form_error('asunto') ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div>Mensaje *</div>
                <textarea name="mensaje"></textarea>
                <div class="error-validacion"><?= form_error('mensaje') ?></div>
            </div>
            <?= isset($mensaje) ? $mensaje : ''; ?>
            <div class="boton-contacto">
                <input class="enviar-contacto" type="submit" value="Enviar Mensaje" />
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
