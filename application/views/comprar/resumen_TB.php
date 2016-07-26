<div id="resumen-TB" class="float-left">
    <table>
        <tr><th colspan="2" class="titulo-tb">Detalle de Pago</th></tr>
        <tr><td class="frst-col">Fin Tarjeta</td><td><?= $TBK_FINAL_NUMERO_TARJETA[1]; ?></td></tr>
        <tr class="even"><td class="frst-col">Tipo de Pago</td><td><?= $TBK_TIPO_PAGO[1]; ?></td></tr>
        <tr><td class="frst-col">Nro. Orden</td><td><?= $TBK_ORDEN_COMPRA[1]; ?></td></tr>
        <tr class="even"><td class="frst-col">Descripción</td><td>Servicio de chef a domicilio</td></tr>
        <tr><td class="frst-col">Nombre Comercio</td><td>Club de la Cocina</td></tr>  
        <tr class="even"><td class="frst-col">URL Comercio</td><td>http://www.clubdelacocina.cl</td></tr>
        <tr><td class="frst-col">Monto Transacción</td><td>$<?= number_format($TBK_MONTO[1]/100, 0, ',', '.'); ?></td></tr>
        <tr class="even"><td class="frst-col">Fecha</td><td><?= date('d/m/Y', time());?></td></tr>
        <tr><td class="frst-col">Nombre Comprador</td><td><?= $comprador; ?></td></tr>
        <tr class="even"><td class="frst-col">Código Autorización</td><td><?= $TBK_CODIGO_AUTORIZACION[1]; ?></td></tr>
        <tr><td class="frst-col">Tipo Transacción</td><td><?= 'Venta'; ?></td></tr>
        <tr class="even"><td class="frst-col">Nro.Cuotas</td><td><?= $TBK_NUMERO_CUOTAS[1]; ?></td></tr>
        <tr><td class="frst-col">Tipo Cuota</td><td><?= $tipoCuota; ?></td></tr>
    </table>
</div>

<!-- Google Code for Test Conversiones Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 959054721;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "mvo3COik_WAQgYeoyQM";
if (<? echo $TBK_MONTO[1]/100 ?>) {
        var google_conversion_value = <? echo $TBK_MONTO[1]/100 ?>;;
    }
var google_conversion_currency = "CLP";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/959054721/?label=mvo3COik_WAQgYeoyQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>