<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?= base_url('images/favicon.ico'); ?>" />
        <title>Club de la Cocina</title>		<!-- aquí va php que indique el titulo segun la pagina en la que se encuentre -->
        <script type="text/javascript">
        function setTitle( text ) {
            document.title = text;
        }
        </script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PXHM7G7');</script>
        <!-- End Google Tag Manager -->
        <link rel="canonical" href="http://www.clubdelacocina.cl">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="chef a domicilo, cocina en casa, clases de cocina, chef privado">
        <meta name="description" content="Lo mejor de un restaurante, en tu casa. Conoce las más deliciosas recetas de nuestros chefs y aprende a prepararlas, en tu casa, con tu gente. Arma tu evento con nosotros!">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>">
        <link href="<?= base_url('css/style2.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?= base_url('css/paginator.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?= base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="<?= base_url('css/jquery-ui-1.9.2.custom.min.css'); ?>" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="<?= base_url('css/magnific-popup.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/jquery.datetimepicker.css') ?>">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.quick.pagination.min.js'); ?>"></script>
        <script src="<?= base_url('js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>
        <script src="<?= base_url('js/moment.min.js'); ?>"></script>
        <script src="<?= base_url('js/i18n/datepicker-es.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.magnific-popup.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.contentcarousel.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.slides.min.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.datetimepicker.js'); ?>"></script>
        <script src="<?= base_url('js/jquery.blockUI.js'); ?>"></script>
        <script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>

        <?php $img = base_url('images/logo.png'); ?>
        <?php if(isset($datosChef) && !empty($datosChef)): ?>
        <?php 
            $urlChef = $datosChef['link'] !== '' ? 'chef/'.$datosChef['link'] : 'chefs/verDatosChef/' . $datosChef['idUsuario'];
            $descripcion = '¡Próximamente sus preparaciones estarán en Club de la Cocina!';
            $largoExperiencias = sizeof($experiencias);
            $contador = 1;
            foreach ($experiencias as $experiencia) {
                if($contador == 1){
                    $descripcion = $experiencia['nombre'];
                } else {
                    $descripcion .= $experiencia['nombre'];
                }
                if($contador < $largoExperiencias) {
                    $descripcion .= ', ';
                }
                
                $contador++;
            }
        ?>
        <meta property="og:title" content="Club de la Cocina - <?= ucwords($datosChef['nombre'] . ' ' . $datosChef['apellidoPaterno']) ?>" />
        <meta property="og:url" content="<?= base_url($urlChef); ?>" />
		<meta property="og:description" content="<?= $descripcion; ?>" />
        <?php endif; ?>
	<meta property="og:image" content="<?= $img ?>" />
    </head>
        <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/579236045f1699a469a98524/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXHM7G7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <div id="super-wrapper">
            <div id="wrapper-header">
                <!--div class="magic-fixed"></div-->
                <div id="header">
                    <div class="header-top mayus margin-header bg-color-header">
                        <div class="row">
                            <div id="logo" class="col-md-3 col-sm-3 col-xs-7">
                                <nav class="navbar navbar-default header-nav">
                                                 <ul class="navbar-nav navbar-left">
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
                                                     <li>
                                                        <a href="<?= base_url('home/contacto') ?>" id="social-logo"><img class="img-responsive" src="<?= base_url('images/email.png'); ?>" alt="Contacto Club de la Cocina" />
                                                        </a>
                                                     </li> 
                                                </ul>
                                </nav> 
                                <a href="<?= base_url() ?>"><img class="img-responsive" src="<?= base_url('images/logo provisorio-01.jpg'); ?>" alt="Club de la Cocina"/></a>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-5">
                                <nav class="navbar navbar-default header-nav">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <button id="header-nav-collapse" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>  
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <!--li class="float-left"><a class="navbar-padding" href="<?= base_url('home/page/22') ?>" style="text-shadow: 0.7px 0.7px 0.7px white;margin-right: 10px;font-size: 18px;color: #FFFFFF;">Cotizar Evento</a></li-->

                                                <li class="float-left"><a class="navbar-padding" href="https://plus.google.com/collection/kgXMWB" target="_blank">Prensa</a></li>
                                                <li class="float-left"><a class="navbar-padding" href="<?= base_url('home/page/2') ?>">¿Cómo Funciona?</a></li>
                                                <li class="float-left"><a class="navbar-padding" href="<?= base_url('home/page/23') ?>">Corporativo</a></li>    
                                            </ul>
                                            <?php if (isset($this->session->userdata['username'])): ?>
                                                <ul class="logged nav navbar-nav navbar-right">
                                                    <li>
                                                        <div id="username-header" class="hidden-sm">
                                                            <?= $this->session->userdata('username'); ?>
                                                        </div>                                                        
                                                    </li>
                                                    <li>
                                                        <a class="navbar-padding" href="<?= base_url() ?>mipanel">
                                                            <div><i class="material-icons" style="font-size:18px;color:#FF6600">face</i><!--span class="hidden-md hidden-sm">para elegir</span--></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="navbar-padding" href="<?= base_url() ?>login/logout">
                                                            <div><i class="material-icons" style="font-size:18px;color:#FF6600">highlight_off</i></div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--div id="username-header"><span><?= $this->session->userdata('username'); ?></span></div-->
                                            <?php else : ?>
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li>
                                                        <a class="simple-ajax-popup" href="<?= base_url('login'); ?>">
                                                            <ul>
                                                                <!-- <li><span>Ingresa <span class="hidden-sm">al Club</span></span></li> -->
                                                                <li><span><i class="material-icons" style="font-size:26px;color:rwhite" alt="Ingresa al Club">exit_to_app</i></span></li>
                                                            </ul>
                                                        </a>
                                                    </li>
                                                </ul>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </nav>                                
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('.simple-ajax-popup').magnificPopup({
                                        type: 'ajax',
                                    });
                                });
                            </script>
                        </div>                        
                    </div>
                    <div class="header-bot">
                        <?php if ($this->router->class !== 'comprar'): ?>
                            <div class="buscador interior">
                                <span id="encuentra-resultado" class="mayus resultado SueEllen"><h1>RESERVA UN CHEF</h1></span>
                                <?php echo form_open('chefs/busquedaForm', array('class' => 'overflowauto')); ?>
                                <?php
                                $comunas = $this->meta_usuario_model->getMetasExistentesEnChef(3);
                                $tagsBuscar = $this->meta_usuario_model->getMetasExistentesEnChef(4);
                                ?>
                                <div>
                                    <!--div class="input-buscador float-left hidden-sm hidden-xs">
                                        <input type="text" placeholder="¿Para cuándo?" name="agenda" id="agenda" class="fecha-buscador"/>
                                    </div-->
                                    <!--div class="input-buscador float-left hidden-sm hidden-xs">
                                        <div class="constraint-select SueEllen">
                                            <select name="comuna">
                                                <option value="">¿DÓNDE?</option>
                                                <?php foreach ($comunas as $comuna): ?>
                                                    <option value="<?= $comuna['idMeta'] ?>"><?= $this->functions->meta_a_ui($comuna['nombreMeta']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div -->
                                <!--    <div class="input-buscador float-left hidden-sm hidden-xs">
                                        <input type="text" placeholder="NOMBRE CHEF" id="nombre_chef" name="nombre_chef" class="input_autocomplete"/>  
                                    </div>  -->
 
                                    <div class="submit-buscador float-left">
                                        <input type="submit" class="enviar-buscador" value="VER CHEFS"/>
                                    </div>
                    
                                    <div class="input-buscador float-left">
                                        <input type="submit" value="COTIZAR" formaction="/home/page/22" />  
                                    </div>
                                    <input type="hidden" name="bool_hora" value="0" id="bool_hora"/>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        <?php else: ?>
                        <div class="">
                            <div id="banner-pasos">Confirma las caracter&iacute;sticas de tu evento</div>                        
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="main-container" class="centerbox">
                <div id="content">
                    <div class="container-fluid">
