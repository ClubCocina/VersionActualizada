<div id="menuchef">
    <div id="nuestras-experiencias" class="row">
        <div class="col-md-4">
	       <span>Nuestras experiencias</span>
        </div>
        <div class="col-md-8">
            <span id="ordenar-por">Ordenar por: </span>
            <div class="btn-group" data-toggle="buttons">
                <label id="mas-nuevo" class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Más nuevo
                </label>
                <label id="mas-viejo" class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Más antiguo
                </label>
                <label id="a-z" class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option1" autocomplete="off"> A-Z
                </label>
                <label id="z-a" class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Z-A
                </label>
                <label id="mayor-precio" class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Mayor precio
                </label>
                <label id="menor-precio"class="btn btn-warning btn-select">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Menor precio
                </label>
            </div>
        </div>
    </div>
	<br>
    <ul id="lista">
    	<?php foreach ($experiencias as $experiencia) { ?>
        <li class="overflowauto" id="<?= str_replace(" ", "_", $experiencia['nombre']);?>">
            <span id="id-exp" class="hidden"><?= $experiencia['idExperiencia']?></span>
        	<h2 class="titulo-fantasia SueEllen mayus">
    			<a href="<?= base_url('chef/'.$experiencia['chef'][0]['link']).'#'.str_replace(" ", "_", $experiencia['nombre'])?>"><?= $experiencia['nombre']; ?></a>
    	        <span class="social-buttons">
    	            <a href="   
    	    http://facebook.com/sharer.php?u=<?= base_url('chef/'.$experiencia['chef'][0]['link']).'#'.str_replace(" ", "_", $experiencia['nombre'])?>"><i class="fa fa-facebook"></i></a>
    	            <a href="   
    	    https://twitter.com/intent/tweet?text=<?= base_url('chef/'.$experiencia['chef'][0]['link']).'#'.str_replace(" ", "_", $experiencia['nombre'])?>"><i class="fa fa-twitter"></i></a>        
    	        </span>
    	    </h2>

    	    <div class="float-left texto-fantasia margin-bottom">
    	        <div class="texto-fantasia-wrapper">
    	            <div class="img-experiencia overflowauto">
                        <img src="<?= base_url('images/experiencias/' . $experiencia['imagen']); ?>" alt="imagen experiencia <?= $experiencia['nombre'] ?>"/>
                    </div>
    	            <p class="descripcion-fantasia"><?= $experiencia['descripcion']; ?></p><br>
    	            <?php foreach ($experiencia['platos'] as $plato){ ?>
    	                <span class="titulo-plato mayus"><?= $plato['nombre']; ?></span>
    	                <p class="texto-plato"><?= $plato['descripcion']; ?></p><br>
    	            <?php } ?>
    	        </div>
    	    </div>
    	    <div class="float-left info-actividad bg-rojo margin-bottom">
        		
        		<div class="float-left info-actividad bg-rojo">
                    <a href="<?= base_url('chef/'.$experiencia['chef'][0]['link']);?>">
                        <img class="avatar-chef" src="<?= base_url('avatar/' . $experiencia['chef'][0]['avatar']); ?>" /> 
                        <span class="mayus titulo-info nombre-chef-avatar">
                            <?= $experiencia['chef'][0]['nombre'].' '.$experiencia['chef'][0]['apellidoPaterno'] ?>
                        </span>
                    </a>
                    <? 
                        $comensales = explode('-', $experiencia['metasChef'][1]['dato']);
                        $icero = $comensales[0];
                        $iuno = $comensales[1];
                        $comensales_default = min($icero, $iuno) < 6 && max($icero, $iuno) > 6 ? 6 : (max($icero, $iuno) < 6 ? max($icero, $iuno) : min($icero, $iuno));
                        if ($this->session->userdata('fecha') && $this->session->userdata('boolHora')) {
                            $fecha_default = date('d/m/Y H:i', strtotime($this->session->userdata('fecha')));
                        } else if ($this->session->userdata('fecha')) {
                            $fecha_default = date('d/m/Y', strtotime($this->session->userdata('fecha')));
                        } else {
                            $fecha_default = '';
                        }
                        $diasMinimos = new DateInterval('P3D');
                        $inicio_calendario = date_add(date_create(), $diasMinimos);
                    ?>
                    <!--Form experiencia -->
                    <form class="form-compra" action="<?= base_url('chefs/verDatosChef/' . $experiencia['chef'][0]['idUsuario']); ?>" method="POST">
                        <div class="datos-info">
                            <div class="overflowauto row-detalle">
                                <div class="titulo-datos">¿Cuántos Comen?</div>
                                <div class="row-info cantidad-invitados prompt-input">
                                    <input id="invitados<?= $experiencia['idExperiencia']; ?>"
                                           name="invitados<?= $experiencia['idExperiencia']; ?>"
                                           class="spinner-invitados ui-spinner-input spinner-growth"
                                           type="number"
                                           step="1"
                                           min="<?= min($icero, $iuno); ?>"
                                           max="<?= max($icero, $iuno); ?>"
                                           value="<?= set_value('invitados' . $experiencia['idExperiencia'], $comensales_default); ?>"            
                                     /> 
                                </div>
                            </div>
                
                            <div class="overflowauto row-detalle">
                                <div class="titulo-datos">Fecha y Hora (llegada del chef)</div>
                                <div class="row-info horario-evento prompt-input">
                                    <input id="horario<?= $experiencia['idExperiencia']; ?>"
                                           name="horario<?= $experiencia['idExperiencia']; ?>"
                                           class="input-vista-chef input-normal ui-corner-all datepick"
                                           value="<?= set_value('horario' . $experiencia['idExperiencia'], $fecha_default); ?>"
                                           placeholder="dd/mm/aaaa h:m"
                                           required
                                           />
                                    <input type="hidden" name="bool_hora<?= $experiencia['idExperiencia']; ?>" id="bool_hora<?= $experiencia['idExperiencia']; ?>" value="<?= set_value('bool_hora', $this->session->userdata('boolHora') !== FALSE ? '1' : '0'); ?>" />
                                    <script>
                                        var horas = [];
                                        $(function() {
                                            $("#horario<?= $experiencia['idExperiencia']; ?>").datetimepicker({
                                                onGenerate: function(ct) {
                                                    if (horas.length !== 0) {
                                                        this.setOptions({
                                                            allowTimes: horas
                                                        });
                                                        horas = [];
                                                    }
                                                    var diasSemana = filtroDias<?= $experiencia['idExperiencia']; ?>();
                                                    for (var index in diasSemana) {
                                                        $(this).find(diasSemana[index]).addClass('xdsoft_disabled');
                                                    }
                                                    var fecha = ct.toISOString();
                                                    $.post('<?= base_url('chefs/diasNoDisponiblesMes'); ?>', {
                                                        fecha: fecha,
                                                        idChef: <?= $experiencia['chef'][0]['idUsuario']; ?>
                                                    }).done(function(data) {
                                                        var diasMes = eval(data);
                                                        for (var index in diasMes) {
                                                            var fecha = new Date(diasMes[index].fecha);
                                                            var fecha_local = new Date(fecha.valueOf() + fecha.getTimezoneOffset() * 60000);
                                                            $('[data-date="' + fecha_local.getDate() + '"][data-month="' + fecha_local.getMonth() + '"]')
                                                                    .addClass('xdsoft_disabled');
                                                        }
                                                    });
                                                    $('.xdsoft_time_variant').css('margin-top', '0px');
                                                },
                                                onSelectDate: function(current_time, $input) {
                                                    var fecha = $input[0].value;
                                                    var dtp = this; //datetimepicker
                                                    $.post('<?= base_url('chefs/horasDisponibles'); ?>', {
                                                        fecha: fecha,
                                                        idChef: <?= $experiencia['chef'][0]['idUsuario']; ?>
                                                    }).done(function(data) {
                                                        horas = eval(data);
                                                        var horaPre = new Date('1970/01/01 ' + horas[0]);
                                                        console.log(horaPre);
                                                        console.log(current_time);
                                                        dtp.setOptions({
                                                            timepicker: true,
                                                            allowTimes: horas,
                                                            defaultDate: current_time,
                                                            defaultTime: horaPre
                                                        });
                                                    });
                                                },
                                                onSelectTime: function(ct) {
                                                    $('#bool_hora<?= $experiencia['idExperiencia']; ?>').val('1');
                                                    this.setOptions({
                                                        format: 'd/m/Y H:i',
                                                        defaultTime: ct,
                                                        value: parseDateValue(ct)
                                                    });
                                                },
                                                onChangeDateTime: function(ct) {
                                                    if ($('#bool_hora<?= $experiencia['idExperiencia']; ?>').val() === '1') {
                                                        this.setOptions({
                                                            value: parseDateValue(ct)
                                                        });
                                                    }
                                                },
                                                onShow: function(ct) {
                                                        <?php if (form_error('bool_hora' . $experiencia['idExperiencia']) != '' OR $this->session->userdata('fecha')): ?>
                                                        var fecha = ct.toISOString();
                                                        var dtp = this; //datetimepicker
                                                        $.post('<?= base_url('chefs/horasDisponibles'); ?>', {
                                                            fecha: fecha,
                                                            idChef: <?= $experiencia['chef'][0]['idUsuario']; ?>
                                                        }).done(function(data) {
                                                            var horas = eval(data);
                                                            dtp.setOptions({
                                                                timepicker: true,
                                                                allowTimes: horas,
                                                                defaultDate: ct
                                                            });
                                                        });
                                                        <?php endif; ?>
                                                },
                                                format: '<?= $this->session->userdata('boolHora') ? 'd/m/Y H:i' : 'd/m/Y' ?>',
                                                minDate: '<?= $inicio_calendario->format('Y/m/d') ?>',
                                                lang: 'es',
                                                dayOfWeekStart: 1,
                                                todayButton: false,
                                                lazyInit: true,
                                                timepicker: false,
                                                defaultSelect: false,
                                                roundTime: 'floor',
                                                allowBlank: true,
                                                defaultDate: '<?= $this->session->userdata('fecha') !== FALSE ? date('d/m/Y', strtotime($this->session->userdata('fecha'))) : ''; ?>',
                                                defaultTime: '<?= $this->session->userdata('boolHora') ? date('H:i', strtotime($this->session->userdata('fecha'))) : ''; ?>'
                                            });
                                        });
                                        function filtroDias<?= $experiencia['idExperiencia']; ?>() {
                                            var diasSemana = {
                                                1: '.xdsoft_day_of_week1',
                                                2: '.xdsoft_day_of_week2',
                                                3: '.xdsoft_day_of_week3',
                                                4: '.xdsoft_day_of_week4',
                                                5: '.xdsoft_day_of_week5',
                                                6: '.xdsoft_day_of_week6',
                                                7: '.xdsoft_day_of_week0'
                                            };
                                            var diasChef = eval(<?= json_encode($experiencia['diasDisponibles']); ?>);
                                            for (var index in diasChef) {
                                                delete diasSemana[diasChef[index].idDiaAgenda];
                                            }
                                            var aux = <?= json_encode($experiencia['diasDisponibles']); ?>;
                                            for (var i=0; i<aux.length; i++ ){
                                                 console.log("#horario<?= $experiencia['idExperiencia']; ?> "+aux[i].idDiaAgenda);
                                            }
                                            return diasSemana;
                                        };
                                    </script>
                                </div>
                            </div>
                            <div class="overflowauto row-detalle">
                                <div class="titulo-datos">Tiempo que el chef estar&aacute; en tu casa</div>
                                <div class="row-info horario-evento">
                                    <input id="duracion<?= $experiencia['idExperiencia']; ?>"
                                           name="duracion<?= $experiencia['idExperiencia']; ?>"
                                           class="input-vista-chef duracion no-padding"
                                           readOnly
                                           value="<?= set_value('duracion' . $experiencia['idExperiencia'], gmdate('H:i', $experiencia['tiempo' . $comensales_default] * 60 * 60)); ?>"
                                           /><span class="input-vista-chef duracion no-upper">Horas</span>
                                </div>
                            </div>
                            <div class="overflowauto row-detalle">
                                <div class="titulo-datos">Precio por persona</div>
                                <div class="row-info total-evento">
                                    <input type="text"
                                           id="precioporpersona<?= $experiencia['idExperiencia']; ?>"
                                           name="precioporpersona<?= $experiencia['idExperiencia']; ?>"
                                           class="input-vista-chef total no-padding precio-persona"
                                           readonly
                                           value="<?= set_value('precioporpersona' . $experiencia['idExperiencia'], number_format($experiencia['metasChef'][0]['dato'] * $experiencia['tiempo' . $comensales_default] / $comensales_default, 0, ',', '.')); ?>"
                                           />
                                </div>
                            </div>
                            <div class="overflowauto">
                                <div class="titulo-datos">Total</div>
                                <div class="row-info total-evento">
                                    <input type="text"
                                           id="total<?= $experiencia['idExperiencia']; ?>"
                                           name="total<?= $experiencia['idExperiencia']; ?>"
                                           class="input-vista-chef total no-padding"
                                           readonly
                                           value="<?= set_value('total' . $experiencia['idExperiencia'], number_format($experiencia['metasChef'][0]['dato'] * $experiencia['tiempo' . $comensales_default], 0, ',', '.')); ?>"
                                           />
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $experiencia['idExperiencia']; ?>">
                            <input type="hidden" name="fecha<?= $experiencia['idExperiencia']; ?>" id="fecha<?= $experiencia['idExperiencia']; ?>" />
                        </div>
                        <?php if (form_error('invitados' . $experiencia['idExperiencia']) != '' OR form_error('horario' . $experiencia['idExperiencia']) != '' OR form_error('fecha' . $experiencia['idExperiencia']) != '' OR form_error('bool_hora' . $experiencia['idExperiencia']) != ''): ?>
                            <div class="compra-error">
                                <?php
                                echo form_error('invitados' . $experiencia['idExperiencia'], '<p>!', '¡</p>');
                                echo form_error('horario' . $experiencia['idExperiencia'], '<p>!', '¡</p>');
                                echo form_error('fecha' . $experiencia['idExperiencia'], '<p>!', '¡</p>');
                                echo form_error('bool_hora' . $experiencia['idExperiencia'], '<p>!', '¡</p>');
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="bg-rojo-oscuro-btn">
                            <?php $disabled = is_numeric($experiencia['metasChef'][0]['dato']) ? '' : 'disabled'; ?>
                            <input <?= $disabled; ?> class="btn-comprar btn-exp" type="submit" value="Confirmar reserva"/>
                        </div>
                    </form>
                    <div></div>
                    <div></div>
                </div>
                <script>
                    //$('#invitados<?= $experiencia['idExperiencia']; ?>').onchange = function() {
                    document.getElementById('invitados<?= $experiencia['idExperiencia']; ?>').onchange = function() {
                        console.log('entra en el onchange');
                        var total = 0;
                        var participantes = Number($(this).val());
                        switch (participantes) {
                            case 2:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo2'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo2'] ?>;
                                break;
                            case 3:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo3'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo3'] ?>;
                                break;
                            case 4:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo4'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo4'] ?>;
                                break;
                            case 5:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo5'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo5'] ?>;
                                break;
                            case 6:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo6'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo6'] ?>;
                                break;
                            case 7:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo7'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo7'] ?>;
                                break;
                            case 8:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo8'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo8'] ?>;
                                break;
                            case 9:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo9'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo9'] ?>;
                                break;
                            case 10:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo10'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo10'] ?>;
                                break;
                            case 11:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo11'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo11'] ?>;
                                break;
                            case 12:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo12'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo12'] ?>;
                                break;
                            case 13:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo13'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo13'] ?>;
                                break;
                            case 14:
                                $('#duracion<?= $experiencia['idExperiencia']; ?>').val('<?= gmdate('H:i', $experiencia['tiempo14'] * 60 * 60); ?>');
                                total = <?= $experiencia['metasChef'][0]['dato'] * $experiencia['tiempo14'] ?>;
                                break;

                        }
                        $('#total<?= $experiencia['idExperiencia']; ?>').val(formatoTotal(Math.round(total)));
                        var ppp = parseInt(total / participantes);
                        $('#precioporpersona<?= $experiencia['idExperiencia']; ?>').val(formatoTotal(ppp));
                    }
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.form-compra').submit(function(event) {
                            event.preventDefault();
                            var form = $(this);
                            var url = form.attr('action');
                            $.post(url + "/ajax", form.serialize()).done(function(data) {
                                try {
                                    var resp = JSON.parse(data);
                                    if (resp.login) {
                                        $.magnificPopup.open({
                                            items: {
                                                src: '<?= base_url('login'); ?>'
                                            },
                                            type: 'ajax'
                                        }, 0);
                                    }
                                    else {
                                        window.location.href = resp.url;
                                    }
                                } catch (e) {
                                    $('#content').html(data);
                                }
                            });
                        });
                    });
                    

                    $(".spinner-invitadosKK").spinner({
                        <?
                            $comensales = explode('-', $experiencia['metasChef'][1]['dato']);
                            $icero = $comensales[0];
                            $iuno = $comensales[1];
                        ?>
                        min: <?= min($icero, $iuno); ?>,
                        max: <?= max($icero, $iuno); ?>
                    });

                    function formatoTotal(total) {
                        var numero = String(total).split('');
                        var tmp = [];
                        var cnt = 1;
                        for (i = numero.length - 1; i >= 0; i--) {
                            tmp[cnt] = numero[i];
                            if ((numero.length - i) % 3 === 0 && i !== 0) {
                                cnt++;
                                tmp[cnt] = '.';
                            }
                            cnt++;
                        }
                        var totalParsed = tmp.reverse();
                        return totalParsed.join('');
                    }
                </script>
    	    </div>
    	    <br>
    	</li>
        <?php } ?>
    </ul>
</div>
<script>

    function sortZtoA(ul) {
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if ($(a).find("h2 a").text() < $(b).find("h2 a").text()){
                return 1;
            }
            if ($(a).find("h2 a").text() > $(b).find("h2 a").text()){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }

    function sortAtoZ(ul) {
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if ($(a).find("h2 a").text() > $(b).find("h2 a").text()){
                return 1;
            }
            if ($(a).find("h2 a").text() < $(b).find("h2 a").text()){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }

    function sortMayorPrecio(ul) {        
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if ($(a).find(".precio-persona").val() < $(b).find(".precio-persona").val()){
                return 1;
            }
            if ($(a).find(".precio-persona").val() > $(b).find(".precio-persona").val()){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }

    function sortMenorPrecio(ul) {        
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if ($(a).find(".precio-persona").val() > $(b).find(".precio-persona").val()){
                return 1;
            }
            if ($(a).find(".precio-persona").val() < $(b).find(".precio-persona").val()){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }

    function sortMasNuevo(ul) {        
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if (parseInt($(a).find("#id-exp").text()) < parseInt($(b).find("#id-exp").text())){
                return 1;
            }
            if (parseInt($(a).find("#id-exp").text()) > parseInt($(b).find("#id-exp").text())){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }
    
    function sortMasViejo(ul) {        
        var ul = document.getElementById(ul);
        var lis = ul.getElementsByTagName("LI");
        var vals = [];

        for(var i = 0; i < lis.length; i++){
            vals.push(lis[i]);
        }

        vals.sort(function(a, b){
            if (parseInt($(a).find("#id-exp").text()) > parseInt($(b).find("#id-exp").text())){
                return 1;
            }
            if (parseInt($(a).find("#id-exp").text()) < parseInt($(b).find("#id-exp").text())){
                return -1;
            }

            return 0;
        });

        $('#lista').append(vals);

    }
    window.onload = function() {
        document.getElementById('z-a').onclick = function(){
            sortZtoA("lista");
        }
        document.getElementById('a-z').onclick = function(){
            sortAtoZ("lista");
        }
        document.getElementById('mayor-precio').onclick = function(){
            sortMayorPrecio("lista");
        }
        document.getElementById('menor-precio').onclick = function(){
            sortMenorPrecio("lista");
        }
        document.getElementById('mas-nuevo').onclick = function(){
            sortMasNuevo("lista");
        }
        document.getElementById('mas-viejo').onclick = function(){
            sortMasViejo("lista");
        }

    }
</script>