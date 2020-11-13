<div class="col-xs-12" style="border-bottom: 1px solid rgb(205,205,205)" >
<p class=" h4 his_med_title"  >Antecedentes de Salud Sexual y Reproductiva </p> 
<br/>
<div class="col-xs-5" >
<div class="input-group" >
 <span  class="input-group-addon"><span style="color:green;font-size:20px"><b><?=$count_ssr?></b></span> registro (s)</span> 
 <select class="form-control" id="id_ssr" >
<option value="" hidden>Navegador</option>
<?php 

 foreach($ssr_nav as $row)

 {
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->date_time)));	
?>
<option value="<?=$row->idssr;?>"># (<?=$row->idssr;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php 
 }
 ?>

</select>

 <span class="input-group-addon hide-this-info" id="hide_new">
 
 <div class="btn-group">
<button type="button" style="background:green;color:white" class="ssr-new" id="ssrhide"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>

<button style="background:green;color:white" type="button" title="Imprimir" class="dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu" >
<li><a target="_blank"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</span>
</div>

</div>
<div class="col-xs-7 hide-this-info" >

<?php

foreach($ssr as $row)
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insed_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->date_time)));	
$upda_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->update_time)));	
echo "<span style='color:black;position:absolute'>Registro # <b style='font-size:25px;'>$row->idssr</b> | Insertado por : $row->inserted_by | Fecha de inserción : $insed_time<br/>
<span id='hide_update' >Cambiado por : $row->updated_by | fecha de cambio : $upda_time </span>
</span><br/><br/><br/>";

?>
</div>
<br/><br/><br/>
</div>