<p class=" h4 his_med_title"  >Antecedentes Obstetricos</p>
<div class="col-xs-12" style="border-bottom:1px solid rgb(205,205,205);padding:20px" >

<table>
<tr>

<td >
<div class="col-xs-6">
<span id="load-re-ssr" style='font-size:25px'><b><?=$count_obs?></b> </span>regitros 
<select class="form-control" id="id_obs" >
<option value="" hidden>navegador2 </option>
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
</div>

</td>

<td>
<?php
 foreach($obs as $row)
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insed_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
$upda_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));	
echo "<span style='color:black;position:absolute'>Registro # <b style='font-size:25px;'>$row->idobs</b> | Insertado por : $row->inserted_by | Fecha de inserción : $insed_time<br/>
<span id='hide_update2' >Cambiado por : $row->updated_by | fecha de cambio : $upda_time </span>
</span>";

?>
</td>
</tr>
</table>
</div>
