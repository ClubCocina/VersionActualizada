
<div class="row">
<!--    <div class="mensaje-imagen-home">
        <img src="<?= base_url('images/mensaje-imagen-home.png'); ?>" />
    </div>  -->
    <!--div id="slide-home" class="float-left col-md-8"-->
    <div class="col-md-10 col-sm-10 col-xs-12 margin-center">
        <div id="carousel-home" class="carousel slide" data-ride="carousel" data-interval="3000">
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
            <!--comienzo Link fotos -->
            <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="<?= base_url('home/page/22')?>"> 
                                <img src="<?= base_url('slides/chef_a_domicilio.jpg'); ?>" alt="Chefs a Domicilio - Club de la Cocina" class="img-slide">
                                <div class="carousel-caption">
                             <!--      <h4>First Thumbnail label</h4>
                                        <p>el texto de prueba 1</p> -->
                                </div>
                            </a>    
                        </div>
                        <div class="item">
                            <a href="<?= base_url('home/ver_experiencias')?>"> 
                                <img src="<?= base_url('slides/lo_mejor_de_un_restaurant.jpg'); ?>" alt="Chef en Casa - Club de la Cocina" class="img-slide">
                                <div class="carousel-caption">
                                <!--    <h4>Second Thumbnail label</h4>
                                        <p>el texto de prueba 2</p>  -->
                                </div>
                            </a>    
                        </div>
                         <div class="item">
                            <a href="<?= base_url('home/page/23')?>"> 
                                <img src="<?= base_url('slides/la_mejor_gastronomia.jpg'); ?>" alt="Eventos empresas - Cotizar" class="img-slide">
                                <div class="carousel-caption">
                                <!--   <h4>Second Thumbnail label</h4>
                                        <p>el texto de prueba 2</p>  -->
                                </div>
                            </a>    
                        </div> 
            </div> 
            <!--Fin link fotos -->          
       <!--     <div class="carousel-inner" role="listbox">
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
            </div>  -->
        </div>
    </div>
 <!--   <div class="col-md-3 col-sm-3 col-xs-12">
        <div id="conteo-home" class="bg-rojo">
            <div class="contadores">Click para ver</div>
            <div id="row-conteo" class="row">
                <div id="nrochefs" class="col-md-5 col-sm-5 col-xs-5 hidde-icons">
                    <a class="experiencias-home" href="<?= base_url('home/ver_experiencias')?>">
                        <div class="row">
                            <div class="col-md-7 col-xs-7 hidden-sm">
                                <img id="gorro-chef" class="img-responsive" src="<?= base_url('images/gorroChef.png'); ?>" alt="imagen conteo chef"/>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <div class="conteo"><?= $nro_chefs; ?></div>
                                <div class="contados">Chefs <span class="hidden-sm">para elegir</span></div>
                            </div>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 hidde-icons">                    
                    <a class="experiencias-home" href="<?= base_url('home/ver_experiencias')?>">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 hidden-sm">
                                <img class="img-responsive" src="<?= base_url('images/imagenPlato.png'); ?>" alt="imagen conteo platos"/>
                            </div>
                            <div id="experiencias-conteo" class="col-md-5 col-sm-5 col-xs-5">
                                <div class="conteo"><?= $nro_experiencias; ?></div>
                                <div class="contados">Experiencias <span class="hidden-sm">para disfrutar</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row video-home">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/-s6J1HuuFAk"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>  -->      
</div>
<div class="row">
    <div class="col-md-10 col-sm-10 col-xs-12 margin-center">
        <div id="carrusel-home-cont"class="bg-color-general">
            <span class="mayus SueEllen"><h1>Los chefs del Club</h1></span>
            <div id="all-chefs" class="row">
                <?php 
                if (empty($chefsCarrusel)) {
                    echo "No hay chefs";
                }
                ?>
                <?php if (!empty($chefsCarrusel)): ?>
                    <?php foreach ($chefsCarrusel as $chef): ?>
                        <?php
                        if ($chef['avatar'] == ''){                            
                            $imgChef = '10-top-celebrity-chefs.jpg';
                            echo "no se carga la imagen del chef";
                        }
                        else{                            
                            $imgChef = $chef['avatar'];
                        }
                        $urlChef = $chef['link'] !== '' ? 'chef/'.$chef['link'] : 'chefs/verDatosChef/' . $chef['idUsuario'];
                        ?>
                        <div class="col-md-2 col-sm-2 col-xs-6 avatar">
                            <div class="front">
                                <img class="img-responsive img-chef" src="<?= base_url('avatar/' . $imgChef); ?>" alt="avatar chef" />
                            </div>
                            <div class="back col-md-12 col-sm-12 col-xs-12">
                                <h2 class="nombre-chef-carrusel"><a href="<?= base_url($urlChef); ?>"><?= $chef['nombre'] . ' ' . $chef['apellidoPaterno']; ?></a></h2>
                                <p class="show-chef-text">
                                    <?= isset($chef['dato']) && $chef['dato'] != '' ? $chef['dato'] : '' ?>
                                </p>
                                <a class="datos-chef-hidden" href="<?= base_url($urlChef); ?>">¡Conoce las experiencias!</a>
                                <a class="btn btn-danger btn-experiencias" href="<?= base_url($urlChef); ?>">Ver Chef</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>


    </div>
            <!--pagina comentarios  -->
            <div class="container">
                <div class="jumbotron col-md-10 col-sm-10">
                    <h1>Nuestros Clientes dicen...</h1>      
                    <!--p>Aca una bajada si aplica</p-->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="contenido-jumbo">
                              <!--h2>Heading</h2-->
                              <p>"Excelente! El chef y su ayudante cumplieron con mis expectativas. Disfruté mi cumpleaños en mi casa con una comida original y bien servida."<span style="font-style: italic;"> Maida</span> </p>
                              <!--p><a class="btn btn-secondary" href="#" role="button">View details »</a></p-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contenido-jumbo">
                              <!--h2>Heading</h2-->
                              <p>"Simplemente increíble!!! La Chef fue a mi casa y nos cocinó demasiado rico. Además dejaron todo impecable. Al otro día mi cocina estaba limpia y ordenada!!" <span style="font-style: italic;"> Andrea</span> </p>
                              <!--p><a class="btn btn-secondary" href="#" role="button">View details »</a></p-->
                            </div>
                       </div>
                        <div class="col-md-4">
                            <div class="contenido-jumbo">
                              <!--h2>Heading</h2-->
                              <p>"Una buenísima opción para aprender cocina en la comodidad de tu casa!! La comida exquisita, la clase entretenida y el Chef muy buena onda!"<span style="font-style: italic;"> Felipe</span> </p>
                              <!--p><a class="btn btn-secondary" href="#" role="button">View details »</a></p-->
                            </div>
                        </div>
                      </div>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg mayus" href="https://www.facebook.com/pg/clubdelacocina/reviews/?ref=page_internal" target="_blank" role="button">Revisa más comentarios</a>
                        </p>
                </div>
                <!--ul>
                    <li><p class="descripcion-fantasia experiencia-calif"><i class="material-icons" style="font-size:18px;color:yellow">grade</i> lo pasamos caballo - Pedro</p></li>  
                    <li> <p class="descripcion-fantasia experiencia-calif"><i class="material-icons" style="font-size:18px;color:orange">thumb_up</i>lo pasamos chancho - Feña</p></li>  
                </ul-->
            </div>

           <!-- fin pagina comentarios--> 


</div>
<script>
    $(window).load(function(){
        $('.img-chef').ready(function(){
            var altura = document.getElementsByClassName('img-chef')[0].offsetHeight;
            var width = document.getElementsByClassName('img-chef')[0].offsetWidth;
            var backs = document.getElementsByClassName('back');        
            var imgsChef = document.getElementsByClassName('img-chef');
            for(var i = 0; i < backs.length; i++){
                backs[i].style.height = altura+'px';
                backs[i].style.width = width+'px';
                imgsChef[i].style.height = altura+'px';
            }
        });

        $('.img-slide').last().ready(function(){
            var carruselHeight = document.getElementById('carousel-home').offsetHeight;
            var conteo = document.getElementById('conteo-home').offsetHeight;
            var addHeight = parseInt((carruselHeight - conteo)/2);
            var rowConteo = document.getElementById('row-conteo');
            
            rowConteo.style.padding = addHeight+'px 0px';
        });
    });
    
    
</script>
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