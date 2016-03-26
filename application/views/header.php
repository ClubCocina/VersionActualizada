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
        <link rel="canonical" href="http://www.clubdelacocina.cl">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="chef, cocina">
        <meta name="description" content="Los mejores chef en tu casa, con tu gente.">
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>">
        <link href="<?= base_url('css/style2.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?= base_url('css/paginator.css'); ?>" rel="stylesheet" media="screen" />
        <link href="<?= base_url('css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="<?= base_url('css/jquery-ui-1.9.2.custom.min.css'); ?>" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="<?= base_url('css/magnific-popup.css') ?>">
        <link rel="stylesheet" href="<?= base_url('css/jquery.datetimepicker.css') ?>">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
    <body>
        <div id="super-wrapper">
            <div id="wrapper-header" class="bg-color-general">
                <!--div class="magic-fixed"></div-->
                <div id="header">
                    <div class="header-top mayus">
                        <div class="row">
                            <div id="logo" class="col-md-3 col-sm-3 col-xs-6">
                                <a href="<?= base_url() ?>"><img class="img-responsive" src="<?= base_url('images/logo.png'); ?>" alt="logo club cocina"/></a>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-6">
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
                                                <li class="float-left"><a href="<?= base_url('home/page/2') ?>">¿Cómo Funciona?</a></li>
                                                <li class="float-left"><a href="<?= base_url('home/page/4') ?>">Preguntas Frecuentes</a></li>
                                                <li class="float-left"><a href="<?= base_url('home/contacto') ?>">Contacto</a></li>        
                                            </ul>
                                            <?php if (isset($this->session->userdata['username'])): ?>
                                                <ul class="logged nav navbar-nav navbar-right">
                                                    <li>
                                                        <a href="<?= base_url() ?>mipanel">
                                                            <div>Panel de Control</div>
                                                        </a>
                                                    </li>
                                                    <li>|</li>
                                                    <li>
                                                        <a href="<?= base_url() ?>login/logout">
                                                            <div>Salir</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div id="username-header"><span><?= $this->session->userdata('username'); ?></span></div>
                                            <?php else : ?>
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li>
                                                        <a class="simple-ajax-popup" href="<?= base_url('login'); ?>">
                                                            <ul>
                                                                <li><span>Ingresa <span class="hidden-sm">al Club</span></span></li>
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
                                <span class="mayus resultado SueEllen"><h1>ENCUENTRA TU CHEF</h1></span>
                                <?php echo form_open('chefs/busquedaForm', array('class' => 'overflowauto')); ?>
                                <?php
                                $comunas = $this->meta_usuario_model->getMetasExistentesEnChef(3);
                                $tagsBuscar = $this->meta_usuario_model->getMetasExistentesEnChef(4);
                                ?>
                                <div>
                                    <div class="input-buscador float-left">
                                        <input type="text" placeholder="¿Para cuándo?" name="agenda" id="agenda" class="fecha-buscador"/>
                                    </div>
                                    <div class="input-buscador float-left hidden-xs">
                                        <div class="constraint-select">
                                            <select name="comuna">
                                                <option value="">¿DÓNDE?</option>
                                                <?php foreach ($comunas as $comuna): ?>
                                                    <option value="<?= $comuna['idMeta'] ?>"><?= $this->functions->meta_a_ui($comuna['nombreMeta']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-buscador float-left hidden-sm hidden-xs">
                                        <input type="text" placeholder="NOMBRE DEL CHEF" id="nombre_chef" name="nombre_chef" class="input_autocomplete"/>
                                    </div>
                                    <div class="submit-buscador float-left">
                                        <input type="submit" class="enviar-buscador" value="BUSCAR"/>
                                    </div>
                                    <input type="hidden" name="bool_hora" value="0" id="bool_hora"/>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        <?php else: ?>
                        <div id="banner-pasos">Confirma las caracter&iacute;sticas de tu evento</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="main-container" class="centerbox">
                <div id="content">
                    <div class="container-fluid">
