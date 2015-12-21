<div id="menuchef">
	<h1 id="nombre-chef">Nuestras experiencias</h1>
	<br>
	<?php foreach ($experiencias as $experiencia) { ?>
	<li class="overflowauto" id="<?= str_replace(" ", "_", $experiencia['nombre']);?>">
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
	            <div class="img-experiencia overflowauto"><img src="<?= base_url('images/experiencias/' . $experiencia['imagen']); ?>" alt="imagen experiencia <?= $experiencia['nombre'] ?>"/></div>
	            <p class="descripcion-fantasia"><?= $experiencia['descripcion']; ?></p><br>
	            <?php foreach ($experiencia['platos'] as $plato){ ?>
	                <span class="titulo-plato mayus"><?= $plato['nombre']; ?></span>
	                <p class="texto-plato"><?= $plato['descripcion']; ?></p><br>
	            <?php } ?>
	        </div>
	    </div>
	    <div class="float-left info-actividad bg-rojo margin-bottom">
    		<a href="<?= base_url('chef/'.$experiencia['chef'][0]['link']);?>">
	    		<div class="foto-ver-chef">
		            <img src="<?= base_url('avatar/' . $experiencia['chef'][0]['avatar']); ?>" /> 
		        </div>
    		</a>
    		<a href="<?= base_url('chef/'.$experiencia['chef'][0]['link']);?>">
		        <h1 class="mayus titulo-info bg-rojo-oscuro">
		        	<?= $experiencia['chef'][0]['nombre'].' '.$experiencia['chef'][0]['apellidoPaterno'] ?>
		        </h1>
    		</a>
	        <div id="precio" class="bg-rojo">
	            <span class="preview-clp mayus">Desde</span>
	            <br>
	            <div class="preview-valor">
	                <span>
	                    $ <? //is_numeric($parametrosChef['4']) ? number_format(($parametrosChef['4']), 0, ',', '.') : 0; 
	                        $comensales = explode('-', $experiencia['metasChef'][1]['dato']);
	                        echo number_format($experiencia['metasChef'][0]['dato'] * $experiencia['minTiempo'] / $comensales[1], 0, ',', '.');
	                    ?>
	                </span>
	                <span class="por-persona">por persona</span>
	            </div>
	            <div class="desc-precio">
	                <p>Incluye todos los ingredientes necesarios para la experiencia.</p>
	            </div>
	        </div>
	        <div id="cant-personas"  class="bg-rojo">
                <h3 class="preview-clp mayus">RANGO DE COMENSALES</h3>
                <br>
                <div class="info">
                    <img src="<?= base_url('images/max-invitados.png'); ?>"/>
                    <span>De <?= str_replace('-', ' a ', $experiencia['metasChef'][1]['dato']) ?> Personas</span>
                </div>
            </div>
	    </div>
	    <br>
	</li>
    <?php } ?>
</div>