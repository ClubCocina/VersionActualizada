<script>
    $(function() {
            //clic en un enlace de la lista
            $('#masreviews').on('click', function(e) {
                    //prevenir en comportamiento predeterminado del enlace
                    e.preventDefault();
                    //obtenemos el id del elemento en el que debemos posicionarnos
                    var strAncla = $(this).attr('href');
         
                    //utilizamos body y html, ya que dependiendo del navegador uno u otro no funciona
                    $('body,html').stop(true, true).animate({
                            //realizamos la animacion hacia el ancla
                            scrollTop: $(strAncla).offset().top
                    }, 1000);
            });
    });
</script>
<div class="row">
    <div class="col-md-10 col-sm-10 col-xs-12 margin-center">
        <div id="nombre-chef" class="row">
            <div class="col-md-10 col-sm-10 col-xs-8">
                <div class="social-buttons-title"><?= ucwords($datosChef['nombre'] . ' ' . $datosChef['apellidoPaterno']) ?></div>
            </div>        
            <div class="col-md-2 col-sm-2 col-xs-4">
                <div class="social-buttons">
                    <a href="   
            http://facebook.com/sharer.php?u=<?= urlencode(base_url($chefLink))?>"><i class="fa fa-facebook"></i></a>
                    <a href="   
            https://twitter.com/intent/tweet?text=<?= urlencode(base_url($chefLink))?>"><i class="fa fa-twitter"></i></a>        
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-10 col-xs-12 margin-center">
        <!--img id="slide-chef" class="img-responsive" src="<?= isset($fotos['23']) ? base_url('images/' . $fotos['27']) : ''; ?>" alt="Imagen Portada"/-->
        <div id="slide-chef" style='background-image: url(<?= isset($fotos['23']) ? base_url('images/' . $fotos['27']) : ''; ?>);'>
            <!--div class="col-md-offset-9 col-md-3 col-sm-offset-9 col-sm-3 col-xs-12 foto-avatar-chef"-->
            <div class="foto-avatar-chef">
                <img class="img-responsive" src="<?= base_url('avatar/' . $datosChef['avatar']); ?>" /> 
            </div> 
        </div>
    </div>
</div>
<div id="contenido-chef" class="row">
    <div id="infochef" class="col-md-7 col-sm-7 col-xs-6 margin-center">
        <div id="contenedor-central" class="">
            <div id="metas">
                <div class="titulo-tags white">Especialidades</div>
                <div>
                    <?php if (!empty($tagsChef)): ?>
                    <!--ul>
                        <?php foreach ($tagsChef as $tagChef): ?>
                            <li class="display-tags">
                                <a href="<?= base_url('chefs/busquedaForm/' . $tagChef['idMetaKey']); ?>"><?= $this->functions->meta_a_ui($tagChef['nombreMeta']); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul-->
                    <?php foreach ($tagsChef as $tagChef): ?>
                        <a class="btn btn-default tags-btn" href="<?= base_url('chefs/busquedaForm/' . $tagChef['idMetaKey']); ?>"><?= $this->functions->meta_a_ui($tagChef['nombreMeta']); ?></a>                        
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div id="descripcion" class="hidden-xs">
                <?php foreach($descripcionesChef as $descripcion): ?>
                <span class="titulo-descripcion"><?=$this->functions->meta_a_ui($descripcion['nombreMeta']); ?></span>
                <p><?= $descripcion['dato']; ?></p>
                <br>
                <?php endforeach; ?>
            </div>
            
        </div><!-- Fin contenido central -->


    </div>

    <!-- Columna derecha con detalles respecto al servicio que entrega el chef -->
    <div id="cont-derecha" class="col-md-3 col-sm-3 col-xs-6">        
        <div id="precio" class="bg-rojo">
            <span class="preview-clp">Desde</span>
            <br>
            <div class="preview-valor">
                <span>
                    $ <? //is_numeric($parametrosChef['4']) ? number_format(($parametrosChef['4']), 0, ',', '.') : 0; 
                        $comensales = explode('-', $parametrosChef['5']);
                        echo number_format($parametrosChef['4'] * $minTiempo / $comensales[1], 0, ',', '.');
                    ?>
                </span>
                <span class="por-persona">por persona</span>
            </div>
            <div class="desc-precio">
                <p>Incluye todos los ingredientes necesarios para la experiencia.</p>
            <!--    <p>Tiempo total de la experiencia dependerá del número de comensales.</p>  -->
            </div>
        </div>
        <div id="invitados-comunas" class="bg-rojo white overflowauto">
        <!--    <div>REQUISITOS DEL CHEF</div>  -->
            <div id="maxpersonas">
                <span class="preview-clp">Rango de Comensales</span>
                <br>
                <div class="info">
                    <img src="<?= base_url('images/max-invitados.png'); ?>"/>
                    <span>De <?= str_replace('-', ' a ', $parametrosChef['5']) ?> </span>
                </div>
            </div>
        <!--    <div id="comunas">
                <span class="preview-clp mayus">DONDE COCINA</span>
                <div class="info"><img src="<?= base_url('images/comunas.png'); ?>" class="float-left"/>
                    <?php if (isset($comunas)): ?>
                        <ul class="float-left">
                            <?php foreach ($comunas as $comuna) : ?>
                            <li><?= $this->functions->meta_a_ui($comuna); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>  -->
        </div>
        <div class="bg-rojo-oscuro-btn">
            <!-- <input class="btn-comprar" type="submit" value="Cotizar"> -->
            <button class="btn-comprar" onclick="javascript: document.location.href='http://www.clubdelacocina.cl/home/page/22'">Cotizar</button>
        </div>
    </div>

    <!-- Experiencias -->
    <div id="experiencias-chef" class="clear">
        <h3 class="menu-chef">Menú del Chef</h3>
        <!-- Mostrar experiencias -->
        <?php $this->load->view('detallechef/experiencias'); ?>
    </div>
    
    <!-- Mostrar Graficos de Evaluación -->
    <?php //$this->load->view('detallechef/reviews'); ?>

    <!-- Mostrar comentarios realizados al Chef -->
    <?php $this->load->view('detallechef/comentarios'); ?>
</div>
<?php 
    // Make the call to the DB to get the title text. See OP post for example
    $title_text = ucwords($datosChef['nombre'] . ' ' . $datosChef['apellidoPaterno']);

    // Use body onload to set the title of the page
    print "<body onload=\"setTitle( '$title_text' )\"   >";
?>