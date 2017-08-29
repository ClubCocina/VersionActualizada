        </div>
    </div>
</div>
<!--div id="wrapper-footer"-->
<div id="container-footer" class="container-fluid">
            <div class="row">
                <div id="footer" class="bg-color-general mayus col-md-10 col-sm-10 col-xs-12 margin-center">
                            <!-- Begin MailChimp Signup Form -->
                    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
                    <style type="text/css">
                    </style>
                    <div id="mc_embed_signup">
                    <form action="//clubdelacocina.us11.list-manage.com/subscribe/post?u=ba52aedb3826e25b8ae2856f6&amp;id=8a857b65f9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                        <label for="mce-EMAIL">Ent&eacute;rate de nuestras novedades</label>
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="direcci&oacute;n email" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ba52aedb3826e25b8ae2856f6_8a857b65f9" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="SUSCRIBIR" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    </div>

                    <!--End mc_embed_signup--> 
                    <div class="SueEllen suscripcion"><label>¿Tienes consultas? LL&aacute;manos al +56 9 9999 2896</label>
                    </div>
                        <nav class="navbar navbar-default header-nav suscripcion">
                            <label>Siguenos!</label>
                                                 <ul class="redes-sociales">
                                                    <li>
                                                        <a href="https://www.instagram.com/clubdelacocinacl/" target="_blank" id="social-logo"><img class="img-responsive" src="<?= base_url('images/logo.insta.png'); ?>" alt="Instagram Club de la Cocina" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/Club-de-la-Cocina-687305784636215/" target="_blank" id="social-logo"><img class="img-responsive" src="<?= base_url('images/fb-logo.png'); ?>" alt="Facebook Club de la Cocina" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/clubdelacocina" target="_blank" id="social-logo"><img class="img-responsive" src="<?= base_url('images/twitter-logo.png'); ?>" alt="Twitter Club de la Cocina" />
                                                        </a>
                                                    </li>
                                                </ul>
                        </nav>
                </div>
            </div>
</div>

<div id="container-footer" class="container-fluid">
    <div class="row">
        <div id="footer" class="bg-color-general mayus col-md-10 col-sm-10 col-xs-12 margin-center">
            <div id="links-paginas" class="centerbox">
                <?php $pages = $this->page_model->getPage(); ?>
                <?php foreach ($pages as $page) : ?>
                    <div class="col-md-2 col-sm-2 col-xs-12 link-page">
                        <a href="<?= base_url('home/page/' . $page['idPage']); ?>"><?= $page['titulo']; ?></a>
                    </div>
                <?php endforeach; ?>
                <!--ul>
                    <?php foreach ($pages as $page) : ?>
                        <li class="float-left"><a href="<?= base_url('home/page/' . $page['idPage']); ?>"><?= $page['titulo']; ?></a></li>
                    <?php endforeach; ?>
                    <li class="float-left"><a href="<?= base_url('home/contacto'); ?>">Contacto</a></li>
                </ul-->
            </div>
        </div>
    </div>
</div>
<?php
$periodos = $this->periodos_model->get();
$inicios = array();
$fines = array();
foreach ($periodos as $periodo) {
    $inicios[] = (int) $periodo['inicio'];
    $fines[] = (int) $periodo['fin'];
}
$minTime = min($inicios);
$maxTime = max($fines);
?>

<?php
date_default_timezone_set('America/Santiago');
$diasMinimos = new DateInterval('P3D');
$inicio_calendario = date_add(date_create(), $diasMinimos);
?>

<script>
    $(function() {
        var diasSemana = {
            1: '.xdsoft_day_of_week1',
            2: '.xdsoft_day_of_week2',
            3: '.xdsoft_day_of_week3',
            4: '.xdsoft_day_of_week4',
            5: '.xdsoft_day_of_week5',
            6: '.xdsoft_day_of_week6',
            7: '.xdsoft_day_of_week0'
        };
        $.post('<?= base_url('home/fechasCalendarioBusqueda'); ?>', {
        }).done(function(data) {
            var diasMes = eval(data);
            for (var index in diasMes) {
                delete diasSemana[diasMes[index].idDiaAgenda];
            }
        });

        var horas = [];

        $("#agenda").datetimepicker({
            onGenerate: function(ct) {
                if (horas.length !== 0) {
                    this.setOptions({
                        allowTimes: horas
                    });
                    horas = [];
                }
                for (var index in diasSemana) {
                    $(this).find(diasSemana[index]).addClass('xdsoft_disabled');
                }
                var fecha = ct.toISOString();
                $.post('<?= base_url('home/diasNoDisponibles'); ?>', {
                    fecha: fecha
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
            onSelectDate: function(current_time) {
                var fecha = current_time.toISOString();
                var dtp = this; //datetimepicker
                $.post('<?= base_url('home/horariosCalendarioBusqueda'); ?>', {
                    fecha: fecha
                }).done(function(data) {
                    horas = eval(data);
                    if ($('#bool_hora').val() !== '1') {
                        dtp.setOptions({
                            timepicker: true,
                            allowTimes: horas,
                            defaultDate: current_time
                        });
                    } else {
                        dtp.setOptions({
                            allowTimes: horas
                        });
                    }
                });
            },
            onSelectTime: function(ct) {
                $('#bool_hora').val('1');
                this.setOptions({
                    format: 'd/m/Y H:i',
                    defaultTime: ct,
                    value: parseDateValue(ct)
                });
            },
            onChangeDateTime: function(ct) {
                if ($('#bool_hora').val() === '1') {
                    this.setOptions({
                        value: parseDateValue(ct)
                    });
                }
            },
            format: 'd/m/Y',
            minDate: '<?= $inicio_calendario->format('Y/m/d') ?>',
            lang: 'es',
            dayOfWeekStart: 1,
            todayButton: false,
            lazyInit: true,
            timepicker: false,
            defaultSelect: false,
            roundTime: 'floor',
            allowBlank: true
        });
    });
    $(function() {
        $('.input_autocomplete').autocomplete({
            source: "<?= base_url('chefs/autocompleteNombre'); ?>"
        });
    });

    function parseDateValue(value) {
        dt = value.toISOString();
        return moment(dt).format('DD/MM/YYYY HH:mm');
    }
</script>
<div id="mensaje-carga" style="display:none;"> 
    <img src="<?= base_url('images/cargando.gif'); ?>" alt="cargando" /><span>Cargando...</span>
</div> 
</div><div id="fb-root"></div>
<script src="http://connect.facebook.net/es_LA/all.js"></script>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-58231904-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

</script>
</body>
</html>