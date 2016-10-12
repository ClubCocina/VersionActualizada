<div class="col-xs-12 col-sm-10 col-sm-offset-1">
    <div id="pasos">
        <ul class="centerbox">
            <li>Detalles de tu evento</li>
            <li>Ubicaci&oacute;n del evento</li>
            <li>Realizar pago</li>
            <li class="paso-activo">Comprobante</li>
        </ul>
    </div>
    <div id="pasofinal" class="">
        <div class="mayus titulo-ingreso centerbox">
            <div>¡Listo! El Chef que has escogido está reservado para el evento. Pronto nos pondremos en contacto.</div>
            <div>Mientras tanto, ¡puedes compartirlo con tus amigos en las redes sociales!
                <span>
                    <a href="http://facebook.com/sharer.php?u=<?= urlencode(base_url($chefLink).'#'.str_replace(" ", "_", $experiencia['nombre']))?>" class="gap-region-comuna"><i class="fa fa-facebook fa-2x"></i></a>
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode(base_url($chefLink).'#'.str_replace(" ", "_", $experiencia['nombre']))?>" class="gap-region-comuna"><i class="fa fa-twitter fa-2x"></i></a>        
                </span>
            </div>
        </div>
        <div id="detalles">
            <div id="resumen-TB" class="">
                <div class="info-actividad">
                    <table>
                        <tr>
                            <th class="titulo-tb" colspan="2">Detalle de Compra</th>
                        </tr>
                        <tr>
                            <td class="frst-col">CHEF</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= $nombreChef ?></div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="frst-col">EXPERIENCIA</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= $experiencia['nombre'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="frst-col">¿CUÁNTOS COMEN?</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= $invitados; ?></div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="frst-col">FECHA</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= date('d/m/Y', strtotime($actividad['fecha'])); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="frst-col">HORARIO</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= date('H:i', strtotime($horario)); ?> HRS.</div>
                            </td>
                        </tr>
                    <!--    <tr class="datos-confirm">
                            <td class="titulo-datos">TIEMPO QUE EL CHEF ESTARÁ EN TU CASA</td>
                            <td class="row-info">
                                <div class="input-finalizacompra"><?= gmdate('H:i', $experiencia['tiempo' . $invitados] * 60 * 60); ?> HRS.</div>
                            </td>
                        </tr>  -->
                        <tr class="even">
                            <td class="frst-col">DIRECCIÓN</td>
                            <td class="row-info"><div class="input-finalizacompra"><?= $actividad['direccion']; ?></div></td>
                        </tr>
                        <tr>
                            <td class="frst-col">COMUNA</td>
                            <td class="row-info"><div class="input-finalizacompra"><?= $comuna['nombreMeta']; ?></div></td>
                        </tr>
                        <!-- <tr>
                            <td class="titulo-datos">COMUNA</td>
                            <td class="row-info"><div class="input-finalizacompra"><?= ''//comuna;                 ?></div></td>
                        </tr> -->
                        <tr class="even">
                            <td class="frst-col">TELÉFONO</td>
                            <td class="row-info"><div class="input-finalizacompra"><?= $actividad['nroContacto']; ?></div></td>
                        </tr>
                        <tr>
                            <td class="frst-col">PRECIO POR PERSONA</td>
                            <td class="row-info">
                                <div class="input-finalizacompra">$ <?= number_format($total / $invitados, 0, ',', '.'); ?></div>
                            </td>
                        </tr>
                        <tr class="even">
                            <td class="frst-col">TOTAL</td>
                            <td class="row-info">
                                <div class="input-finalizacompra">$ <?= number_format($total, 0, ',', '.'); ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php $this->load->view('comprar/resumen_TB'); ?>
            <div id="finalizar-compra" class="float-left">
                <div class="success-grp">
                    <a href="<?= base_url('mipanel/perfil'); ?>" id="fin-ver-perfil"><input type="submit" class="boton-fin" value="Ver mi perfil"/></a>
                    <a href="<?= base_url('mipanel/reservas'); ?>" id="fin-ver-reservas"><input type="submit" class="boton-fin" value="Ver mis reservas"/></a>
                    <form action="<?= base_url('comprar/finalizarCompra'); ?>" method="POST" class="form-finalizar">
                        <input type="hidden" value="finalizar" name="siguiente" />
                        <input type="submit" id="fin-volver-home" class="boton-fin" value="Volver al Home" />
                    </form>
                </div>
            </div>
        </div>
     <!--   <div id="aviso-terminos-condiciones"><p>En caso de requerir devoluciones o reembolsos primero revisa los "Términos y Condiciones" y cualquier duda contactanos a <a href="mailto:hola@clubdelacocina.cl">hola@clubdelacocina.cl</a></p></div>  -->
    </div>
</div>
