<script src="<?= base_url('js/raty/lib/jquery.raty.min.js') ?>"></script>
<div id="result" class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
        <div id="barra-info" class="mayus row">
            <div class="resultado-texto col-md-10 col-sm-10 hidden-xs">
                <span >Chefs disponibles en <?= isset($comunaNombre) ? $comunaNombre : 'todas las comunas'; ?></span>
                <span class=" hidden-sm">para el día: <?= isset($fecha) ? $fecha : 'sin fecha'?></span>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4">
                <form action="<?= base_url('') ?>">
                    <div class="constraint-select">
                        <select name="ordenar" class="ordenar">
                            <?php $orden = $this->session->userdata('orden'); ?>
                            <option value="">Ordenar</option>
                            <option value="1" <?php if ($orden && $orden == 1) { echo 'selected'; } ?>>Alfabeticamente</option>
                            <option value="2" <?php if ($orden && $orden == 2) { echo 'selected'; } ?>>Precio</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <!--div class="row">
            <div id="display-tags" class="col-xs-6 col-xs-offset-2 hidden-sm hidden-md">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default filtro-tags2">
                        <div class="panel-heading filtro-tags2" role="tab" id="headingOne">
                            <h6 class="especialidades2">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Especialidades
                                </a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <?php foreach ($tags as $tag) : ?>
                                <?php
                                $tagsSession = $this->session->userdata('tag') ? $this->session->userdata('tag') : array();
                                $checked = in_array($tag['idMetaKey'], $tagsSession) ? 'checked' : '';
                                
                                ?>
                                <div class="tag-row">
                                    <label for="tag<?= $tag['idMetaKey']; ?>2"><?= $this->functions->meta_a_ui($tag['nombreMeta']); ?></label>
                                    <input 
                                        type="checkbox" 
                                        name="tags" 
                                        <?= $checked; ?> 
                                        id="tag<?= $tag['idMetaKey']; ?>2" 
                                        value="<?= $tag['idMetaKey']; ?>2"
                                        <?= $tag['idMetaKey'] == $this->session->userdata('tagSeleccionado') ? 'disabled' : ''; ?>
                                        />
                                </div>
                                <script>
                                    $("#tag<?= $tag['idMetaKey']; ?>2").click(function() {
                                        var url = '';
                                        $.blockUI({ message: $('#mensaje-carga') }); 
                                        if ($(this).is(':checked')){
                                            console.log('entra');
                                            url = "<?= base_url('chefs/filtroTag/agregar'); ?>";                                            
                                        }
                                        else{
                                            console.log('quita D:');
                                            url = "<?= base_url('chefs/filtroTag/quitar'); ?>";   
                                        }
                                        $.post(url, {tags: $(this).val()}).done(function(data) {
                                            $('#result').html(data);
                                            $.unblockUI();
                                        });
                                    });
                                </script>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>                
            </div>
        </div-->
        <div id="result-container" class="row">
            <div id="filtro-tags" class="col-md-3 col-sm-3 hidden-xs">
                <div><span class="mayus titulo-info">Especialidades</span></div>
                <div id="display-tags">
                    <?php foreach ($tags as $tag) : ?>
                        <?php
                        $tagsSession = $this->session->userdata('tag') ? $this->session->userdata('tag') : array();
                        $checked = in_array($tag['idMetaKey'], $tagsSession) ? 'checked' : '';
                        
                        ?>
                        <div class="tag-row">
                            <label for="tag<?= $tag['idMetaKey']; ?>"><?= $this->functions->meta_a_ui($tag['nombreMeta']); ?></label>
                            <input 
                                type="checkbox" 
                                name="tags" 
                                <?= $checked; ?> 
                                id="tag<?= $tag['idMetaKey']; ?>" 
                                value="<?= $tag['idMetaKey']; ?>"
                                <?= $tag['idMetaKey'] == $this->session->userdata('tagSeleccionado') ? 'disabled' : ''; ?>
                                />
                        </div>
                        <script>
                            $("#tag<?= $tag['idMetaKey']; ?>").click(function() {
                                var url = '';
                                $.blockUI({ message: $('#mensaje-carga') }); 
                                if ($(this).is(':checked'))
                                    url = "<?= base_url('chefs/filtroTag/agregar'); ?>";
                                else
                                    url = "<?= base_url('chefs/filtroTag/quitar'); ?>";
                                $.post(url, {tags: $(this).val()}).done(function(data) {
                                    $('#result').html(data);
                                    $.unblockUI();
                                });
                            });
                        </script>
                    <?php endforeach; ?>
                </div>
                <!--<div class="vermas">
                    <span>ver+</span>
                </div>-->
            </div>
            <div id="resultados" class="col-md-9 col-sm-9 col-xs-12">
                <?php if (empty($chefs)): ?>
                    <div id="no-chefs">
                        <h3>No existen chefs que se ajusten a su criterio de búsqueda</h3>
                    </div>
                <?php else: ?>
                    <ul class="">
                        <?php foreach ($chefs as $chef): ?>
                            <li class="">
                                <div class="col-md-12 col-sm-12 col-xs-12 one-chef">
                                    <!--div class="preview-chef"-->
                                    <div class="">
                                        <a href="<?= base_url('chefs/verDatosChef/' . $chef['idUsuario']); ?>">                                        
                                            <!--div class="overflowauto"-->
                                            <div class="row">
                                                <!--div class="main-dish"-->
                                                <div class="col-md-8 col-sm-8 col-xs-8 no-padding">
                                                    <img class="img-responsive white-border" src="<?= isset($chef['fotos']['23']) ? base_url('images/' . $chef['fotos']['23']) : ''; ?>" alt="foto plato 1"/>
                                                </div>
                                                <!--div class="second-dish"-->
                                                <div class="col-md-3 col-sm-3 col-xs-3 no-padding mini-dish">
                                                    <div>
                                                        <img class="img-responsive white-border" src="<?= isset($chef['fotos']['24']) ? base_url('images/' . $chef['fotos']['24']) : ''; ?>" alt="foto plato 2"/>
                                                    </div>
                                                    <div>
                                                        <img class="img-responsive white-border" src="<?= isset($chef['fotos']['25']) ? base_url('images/' . $chef['fotos']['25']) : ''; ?>" alt="foto plato 3"/>
                                                    </div>                                                
                                                </div>
                                                <!--div class="third-dish"-->
                                                <!--div class="col-md-3 no-padding">
                                                    <img class="img-responsive white-border" src="<?= isset($chef['fotos']['25']) ? base_url('images/' . $chef['fotos']['25']) : ''; ?>" alt="foto plato 3"/>
                                                </div-->
                                            </div>
                                            <div class="row">
                                                <!--div class="preview-left-bot overflowauto"-->
                                                <div class="col-md-11 col-sm-11 col-xs-11 bg-white-t">
                                                    <div class="avatar-preview col-md-4 col-sm-4 no-padding ">
                                                        <?
                                                        if ($chef['avatar'] == '')
                                                            $imgChef = '10-top-celebrity-chefs.jpg';
                                                        else
                                                            $imgChef = $chef['avatar'];
                                                        ?>
                                                        <img class="img-responsive avatar-preview-chef white-border" src="<?= base_url('avatar/' . $imgChef); ?>" alt="miniatura avatar chef" />
                                                    </div>
                                                    <div class="preview-nombre col-md-4 col-sm-4 col-xs-4 no-padding ">
                                                        <?= ucwords($chef['nombre'] . " " . $chef['apellidoPaterno'] . (!empty($chef['apellidoMaterno']) ? " " . $chef['apellidoMaterno'][0] : '')) . "."; ?>
                                                        <div id="barra-general<?= $chef['idUsuario']; ?>" class="barra-raty"></div>
                                                    </div>
                                                    <!--div id="grafica-review<?= $chef['idUsuario']; ?>" class="review-prev col-md-4">
                                                        <div id="barra-general<?= $chef['idUsuario']; ?>"></div>
                                                    </div-->
                                                    <script>
                                                        $(function() {
                                                            $("#barra-general<?= $chef['idUsuario']; ?>").raty({
                                                                path: "<?= base_url('js/raty/img') ?>",
                                                                width: false,
                                                                score: <?= $chef['porcentGral'] * 5 / 100; ?>,
                                                                readOnly: true,
                                                                size: 24
                                                            });
                                                        });
                                                    </script>                                                
                                                    <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-5 col-xs-offset-1 no-padding ">
                                                        <div class="precio-preview bg-rojo">
                                                            <span class="preview-clp mayus">Valores desde </span>
                                                            <br>
                                                            <div class="preview-valor">
                                                                <? //is_numeric($chef['precio_persona']) ? number_format($chef['precio_persona'], 0, ',', '.') : 0; 

                                                                ?>
                                                                <span>
                                                                    $ <?= is_numeric($chef['precio_persona']) ? number_format($chef['precio_persona'], 0, ',', '.') : 0;
                                                                    ?>
                                                                </span>                                                        
                                                                <div class="por-persona">por persona</div>
                                                            </div>
                                                        </div>
                                                    </div>                          
                                                </div>                  
                                            </div>
                                        </a>
                                    </div>                                
                                </div>                            
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>    
</div>
<script>
    $(document).ready(function() {
        $("ul.pagination").quickPagination({pageSize: "10"});
    });

    $(document).ready(function() {
        $('.ordenar').change(function() {
            $.post("<?= base_url('chefs/ordenar') ?>", {ordenar: $(this).val()}).done(function(data) {
                $('#result').html(data);
            });
        });
    });

    var win = $(window),
            fxel = $(".buscador"),
            eloffset = fxel.offset().top;

    win.scroll(function() {
        if (eloffset < win.scrollTop() && win.width() > 767) {
            fxel.addClass("fixed");
            $('.magic-fixed').css('display', 'block');
        } else {
            fxel.removeClass("fixed");
            $('.magic-fixed').css('display', 'none');
        }
    });

    $(function() {
        $("#agenda").datetimepicker({
            minDate: 0,
            lang: 'es',
            scrollTime: false,
        });
    });

    $(function() {
        $('.nombrechef-buscador').autocomplete({
            source: "<?= base_url('chefs/autocompleteNombre'); ?>"
        });
    });
</script>