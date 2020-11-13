<?=$count_obs?>
<!--
<div class="col-xs-12" >
<div class="col-xs-4" >
<div class="input-group" >
 <span  class="input-group-addon"><span style="color:green;font-size:20px"><b><?=$count_obs?></b></span> registro (s)</span> 
 <select class="form-control" id="id_obs" >
<option value="" hidden>Navegador</option>
<?php 

 foreach($obs_nav as $row)

 {
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
?>
<option value="<?=$row->idobs;?>"># (<?=$row->idobs;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php 
 }
 ?>

</select>

 <span class="input-group-addon" id="hide_new">
 
 <div class="btn-group">
<button type="button" style="background:green;color:white" id="obstetricohide"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>

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

</div>
-->