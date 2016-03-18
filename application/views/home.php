
<div class="row">
<!--    <div class="mensaje-imagen-home">
        <img src="<?= base_url('images/mensaje-imagen-home.png'); ?>" />
    </div>  -->
    <!--div id="slide-home" class="float-left col-md-8"-->
    <div class="col-md-8">
        <div id="carousel-home" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <?php for ($i=0; $i < sizeof($slides) ; $i++) { ?>
                    <?php if ($i == 0) { ?>
                        <li data-target="#carousel-home" data-slide-to="<?= $i ?>" class="active"></li>
                    <? } 
                    else {?>
                        <li data-target="#carousel-home" data-slide-to="<?= $i ?>"></li>
                    <? }
                } ?>          
            </ol>            
            <div class="carousel-inner" role="listbox">
                <? 
                    $flag = true;
                ?>
                <?php foreach ($slides as $slide) { ?>
                    <?php if ($flag) { ?>
                        <div class="item active">
                            <img src="<?= base_url('slides/' . $slide); ?>" class="img-slide">
                        </div>
                    <? $flag = false;
                    }
                    else {?> 
                        <div class="item">
                            <img src="<?= base_url('slides/' . $slide); ?>">
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div id="conteo-home" class="bg-rojo">
            <div class="overflowauto conteo-top row">
                <div id="nrochefs" class="cuadro-conteo col-md-6">
                    <div class="float-left img-conteo">
                        <img src="<?= base_url('images/gorroChef.png'); ?>" alt="imagen conteo chef"/>
                    </div>
                    <div class="float-left">
                        <div class="conteo"><?= $nro_chefs; ?></div>
                        <div class="contados">Chefs<br> para elegir</div>
                    </div>
                </div>
                <a href="<?= base_url('home/ver_experiencias')?>">
                    <div id="nroplatos" class="cuadro-conteo col-md-6">
                        <div class="float-left img-conteo">
                            <img src="<?= base_url('images/imagenPlato.png'); ?>" alt="imagen conteo platos"/>
                        </div>
                        <div class="float-left">
                            <div class="conteo"><?= $nro_experiencias; ?></div>
                            <div class="contados">Experiencias <br>para disfrutar</div>
                        </div>
                    </div>
                </a>
            </div>
        <!--    <div id="header-video-home"><span>¿Cómo funciona?</span></div>   -->
            <div id="video-home" class="row">
                <div class="col-md-12">

                    <iframe width="346" height="195" src="//www.youtube.com/embed/-s6J1HuuFAk" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>    
</div>
<div id="carrusel-home-cont"class="bg-color-general">
    <span class="mayus SueEllen"><h1>Los chefs del Club</h1></span>
    <div id="carrusel-home" class="ca-container centerbox">
        <?php if (!empty($chefsCarrusel)): ?>
            <div class="ca-wrapper">
                <?php foreach ($chefsCarrusel as $chef): ?>
                    <div class="ca-item">
                        <div class="carruselhome-chef">
                            <div class="ca-avatar-home">

                                <?
                                if ($chef['avatar'] == '')
                                    $imgChef = '10-top-celebrity-chefs.jpg';
                                else
                                    $imgChef = $chef['avatar'];
                                ?>
                                <?php $urlChef = $chef['link'] !== '' ? 'chef/'.$chef['link'] : 'chefs/verDatosChef/' . $chef['idUsuario']; ?>
                                <a href="<?= base_url($urlChef); ?>"><img src="<?= base_url('avatar/' . $imgChef); ?>" alt="avatar chef" /></a>
                            </div>
                            <div class="ca-nombre-home bg-rojo"><a href="<?= base_url($urlChef); ?>"><?= $chef['nombre'] . ' ' . $chef['apellidoPaterno']; ?></a></div>
                            <div class="ca-descripcion-home overflowauto"><?= isset($chef['dato']) && $chef['dato'] != '' ? $chef['dato'] : '' ?></div>
                            <div class="link-preparaciones float-right">
                                <a href="<?= base_url($urlChef); ?>">Conoce las experiencias</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    $('#carrusel-home').contentcarousel({
        navigationAt: 4
    });
    $('#slide-home').slidesjs({
        width: 628,
        height: 336,
        play: {
            active: false,
            // [boolean] Generate the play and stop buttons.
            // You cannot use your own buttons. Sorry.
            effect: "slide",
            // [string] Can be either "slide" or "fade".
            interval: 1700,
            // [number] Time spent on each slide in milliseconds.
            auto: true,
            // [boolean] Start playing the slideshow on load.
            swap: true,
            // [boolean] show/hide stop and play buttons
            pauseOnHover: false,
            // [boolean] pause a playing slideshow on hover
            restartDelay: 2500
                    // [number] restart delay on inactive slideshow
        },
        navigation: {
            active: false,
        }
    });
</script>
<?php 
    // Make the call to the DB to get the title text. See OP post for example
    $title_text = "Encuentra tu Chef";

    // Use body onload to set the title of the page
    print "<body onload=\"setTitle( '$title_text' )\"   >";
?>