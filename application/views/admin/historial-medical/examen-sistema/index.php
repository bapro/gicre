<?php

$name=($this->session->userdata['admin_name']);
?>
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>
<div id="show_all2"></div>
<div id="hide_all2" style="margin-left:200px">

<input type="hidden" id="inserted_by" value="<?=$name?>"> 

 <h4  class="h4 his_med_title">Examen por sistema</h4>
<br/>
<div class="col-xs-3" id="hide_empty_select"  >

<?php if ($count_examensis > 0)
{
?>
<div class="input-group" >
<span class="success-send input-group-addon"><span  ><b><?=$count_examensis?></b> </span>regitros (s)</span> 

<select class="form-control" id="id_exs" >
<option hidden>navegador</option>
<?php 

 foreach($examensis as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	
  
?>
<option title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_exs;?>'>Registro # <?=$row->id_exs;?> </option>

<?php
}
?>

</select> 

</div>
<?php
}

?>

</div>

<span  style="display:none" id="reset3">
<div class="btn-group">
<button class="btn btn-primary btn-xs" type="button" id="show_on_sis"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>
</form>
<button type="button" title="Imprimir" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/'.$historial_id)?>"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</span>
<br/><br/>

<p id="flash2"></p>
<div id="show_form_after_select2"></div>
<div id="hide_form_after_select2">
 <div  style="overflow-x:auto;">
  <hr class="title-highline-top"/>
<table  class="table"  cellspacing="0" style="width:80%;margin-left:70px">
<!--row 1-->
<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema neurológico</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sisneuro" style="width:100%">
<option></option>
<?php 

foreach($neuro as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="neurologico"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema cardiovascular</label>
<div class="col-md-7">
<select class="form-control select-examsis" style="width:100%" id="siscardio" >
<option></option>
<?php 

foreach($cardiov as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="cardiova"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema urogenital</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_uro" style="width: 100%">
<option></option>
<?php 

foreach($urogenial as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="urogenital"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema músculo esquelético</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sis_mu_e" style="width: 100%">
<option></option>
<?php 

foreach($musculo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="musculoes"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>
<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema nervioso</label>
<div class="col-md-7">
<textarea class="form-control" id="nervioso"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema linfatico</label>
<div class="col-md-7">
<textarea class="form-control" id="linfatico"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>

<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema respiratorio</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_resp" style="width:100%">
<option></option>
<?php 

foreach($resp as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="respiratorio"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_resp"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema genitourinario</label>
<div class="col-md-7">
<textarea class="form-control" id="genitourinario"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_genit"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema digestivo</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_diges" style="width:100%">
<option></option>
<?php 

foreach($digest as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="digestivo"></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dig"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3">Sistema endocrino</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_endo" style="width:100%">
<option></option>
<?php 

foreach($endocrino as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="endocrino"  ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_endo"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Relativo a</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_rela" style="width:100%">
<option></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="otros_ex_sis" ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_otros"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="dorsales"    ></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dor"> 
</div>
</div>
</td>
</tr>
<tr>
</table>
</div>
</div>


</div>




