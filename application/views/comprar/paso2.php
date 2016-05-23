<div class="col-xs-12 col-sm-10 col-sm-offset-1">
    <div id="pasos">
        <ul class="centerbox">
            <li>Detalles de tu evento</li>
            <li class="paso-activo">Ubicaci&oacute;n del evento</li>
            <li>Realizar pago</li>
            <li>Comprobante</li>
        </ul>
    </div>
    <div id="ingreso-datos" class="bg-color-general">
        <div class="mayus titulo-ingreso centerbox">
            <div id="donde-sera">¿D&Oacute;NDE SER&Aacute; TU EVENTO?</div>
            <div class="subtitulo-ubicacion">Especifica el lugar donde será realizado el evento</div>
        </div>
        <?= form_open('comprar/ingresoDatos'); ?>
        <div class="row">
            <div class="centerbox">
                <div id="ingreso-izq">
                    <div class="form-group col-sm-7">
                        <div class="">Comuna</div>
                        <select name="comuna" class="form-control">
                            <option value="">Seleccione</option>
                            <?php foreach ($comunas as $comuna): ?>
                                <?php $selected = $comuna['idMetaKey'] === $this->session->userdata('comuna') ? TRUE : FALSE; ?>
                                <option value="<?= $comuna['idMetaKey'] ?>" <?= set_select('comuna', $comuna['idMetaKey'], $selected); ?>><?= $this->functions->meta_a_ui($comuna['nombreMeta']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="error-validacion"><?= form_error('comuna') ?></div>                
                        <br>
                        <div class="form-inline">
                            <div class="form-group">
                                <div>Teléfono de contacto</div>
                                <select name="codigo" class="form-control">
                                    <option>2</option>
                                    <option>9</option>
                                </select>
                                <input type="text" name="nrocontacto" class="form-control" value='<?= set_value('nrocontacto'); ?>' maxlength="8" placeholder="8 dígitos"/>
                                <div class="error-validacion"><?= form_error('nrocontacto') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ingreso-der">
                    <div class="form-inline col-sm-7">
                        <div class="form-group">
                            <div>Dirección</div>
                            <input type="text" name="calle" class="form-control" placeholder="Calle" value='<?= set_value('calle'); ?>'/>
                        
                            <input type="text" name="nrocasa" placeholder="N°" class="form-control" value='<?= set_value('nrocasa'); ?>'/>
                        
                            <input type="text" name="nrodepto" placeholder="N° Casa/Dpto" class="form-control" value='<?= set_value('nrodepto'); ?>'/>
                        
                            <div class="error-validacion"><?= form_error('calle') ?></div>
                            <div class="error-validacion error-nro"><?= form_error('nrocasa') ?></div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
        <div class="row">
            <div id="avanzar-compra" class="col-xs-offset-7 col-sm-offset-10">
                <input id="siguiente" type="submit" class="" value="Siguiente">
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
