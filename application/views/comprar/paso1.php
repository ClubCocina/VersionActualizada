<div class="col-xs-10 col-xs-offset-1">
    <div id="pasos">
        <ul class="centerbox">
            <li class="paso-activo">Detalles de tu evento</li>
            <li>Ubicación del evento</li>
            <li>Realizar pago</li>
            <li>Comprobante</li>
        </ul>
    </div>
    <div id="confirmacion-datos" class="bg-color-general">
        <!-- <div class="chef-confirmacion mayus">Confirma las caracter&iacute;sticas de tu evento</div>  -->
        <div id="menuchef">
            <ul>
                <?php foreach ($experiencias as $experiencia) : ?>
                    <li class="overflowauto menu-paso1 centerbox">
                        <div class="row">
                            <div class="texto-fantasia col-xs-10 col-md-5">
                                <h2 class="titulo-fantasia SueEllen mayus"><?= $nombreChef . ' - ' . $experiencia['nombre']; ?></h2>
                                <div class="texto-fantasia-wrapper">
                                 <!--   <p class="descripcion-fantasia"><?= $experiencia['descripcion']; ?></p> <br> -->
                                    <?php foreach ($experiencia['platos'] as $plato): ?>
                                        <span class="titulo-plato mayus"><?= $plato['nombre']; ?></span>
                                        <p class="texto-plato"><?= $plato['descripcion']; ?></p><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="info-actividad bg-rojo col-xs-10 col-md-3">
                                <div id="titulo-info-confirmacion" class="mayus titulo-info bg-rojo-oscuro">Detalle de tu cotizaci&oacute;n</div>
                                <div class="datos-info">
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Chef</div>
                                        <div class="row-info">
                                            <input type="text" class="input-vista-chef" disabled value="<?= $nombreChef; ?>">
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Experiencia</div>
                                        <div class="row-info">
                                            <div class="input-vista-chef experiencia"><?= $experiencia['nombre']; ?></div>
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">¿Cuántos comen?</div>
                                        <div class="row-info cantidad-invitados">
                                            <input type="text" class="input-vista-chef" disabled value="<?= $invitados; ?>">
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Fecha y hora</div>
                                        <div class="row-info horario-evento">
                                            <input type="text" class="input-vista-chef" disabled value="<?= $horario; ?>">
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Tiempo que el Chef estará en tu casa</div>
                                        <div class="row-info horario-evento">
                                            <input type="text" class="input-vista-chef" disabled value="<?= gmdate('H:i', $duracion * 60 * 60); ?> Horas">
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Precio por persona</div>
                                        <div class="row-info total-evento">
                                            <input type="text" class="input-vista-chef total" readonly value="<?= number_format($total / $invitados, 0, ',', '.'); ?>" />                                
                                        </div>
                                    </div>
                                    <div class="overflowauto row-detalle">
                                        <div class="titulo-datos">Total</div>
                                        <div class="row-info total-evento">
                                            <input type="text" class="input-vista-chef" disabled value="<?= number_format($total, 0, ',', '.'); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="row">
            <div id="avanzar-compra" class="col-xs-offset-7 col-sm-10">
                <form action="<?= base_url('comprar/confirmaServicio'); ?>" method="POST">
                    <input type="hidden" value="siguiente" name="siguiente" />
                    <input type="submit" id="siguiente" value="Siguiente" />
                </form>
            </div>
        </div>
    </div>
</div>
