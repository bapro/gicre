<h4  class="h4 his_med_title">Examen por sistema (<b><?=$count_examensis?> regitro(s)</b>)</h4>
<?php if ($count_examensis > 0)
{

$i = 1;
 foreach($examensis as $row)
{

$user_c28=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c29=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>
<div class="pagination">
<a  data-toggle="modal" data-target="#ver_exasis" href="<?php echo base_url("admin_medico/show_examsis_by_id/$row->id_exs/$user_id")?>">
<?php echo $i; $i++;  ?>
</a>
<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro</h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c28?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c29?>, <?=$updated_time?></li>
</ul>
</div>


</div>
<?php
}

}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

 <div  style="overflow-x:auto;">

<hr class="prenatal-separator"/>
<table  class="table"  cellspacing="0" style="width:80%;margin-left:70px">
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema neurológico</label>
<div class="col-md-7">
<select class="form-control select2" id="sisneuro" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($neuro as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="neurologico"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema cardiovascular</label>
<div class="col-md-7">
<select class="form-control select2" style="width:100%" id="siscardio" >
<option value="">Ningúno</option>
<?php 

foreach($cardiov as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="cardiova"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>-->
</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" ><font style="color:red"><strong>*</strong></font> Sistema urogenital</label>
<div class="col-md-7">
<select class="form-control select2" id="sist_uro" style="width: 100%">
<option value="">Ningúno</option>
<?php 

foreach($urogenial as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="urogenital"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema músculo esquelético</label>
<div class="col-md-7">
<select class="form-control select2" id="sis_mu_e" style="width: 100%">
<option value="">Ningúno</option>
<?php 

foreach($musculo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="musculoes"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>-->
</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema nervioso</label>
<div class="col-md-7">
<textarea class="form-control" id="nervioso"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema linfatico</label>
<div class="col-md-7">
<textarea class="form-control" id="linfatico"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>-->
</div>
</td>
</tr>

<tr>

<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema respiratorio</label>
<div class="col-md-7">
<select class="form-control select2" id="sist_resp" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($resp as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="respiratorio"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_resp"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema genitourinario</label>
<div class="col-md-7">
<textarea class="form-control" id="genitourinario"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_genit"> 
</div>-->
</div>
</td>
</tr>
<tr>

<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Sistema digestivo</label>
<div class="col-md-7">
<select class="form-control select2" id="sist_diges" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($digest as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="digestivo"></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dig"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3">Sistema endocrino</label>
<div class="col-md-7">
<select class="form-control select2" id="sist_endo" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($endocrino as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="endocrino"  ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_endo"> 
</div>-->
</div>
</td>
</tr>
<tr>

<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Relativo a</label>
<div class="col-md-7">
<select class="form-control select2" id="sist_rela" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="otros_ex_sis" ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_otros"> 
</div>-->
</div>
</td>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="dorsales"    ></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dor"> 
</div>-->
</div>
</td>
</tr>
<tr>
</table>
</div>
<script>
$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
$(".select2").select2({
tags: true
});
</script>