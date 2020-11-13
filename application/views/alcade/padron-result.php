 <?php
$this->padron_database = $this->load->database('padron',TRUE);

?>
 <div class="row">

<h5 class="h5"><i>Resultado encuentrado en le padron en <span style="color:green">(<?=$now?> segundos)</span></i></h5>

 
<hr id="hr_ad"/>

 <div class="col-md-4">
 <?php


foreach($photo as $ph)

?>
<tr>
<td>
<?php
if($photo != null){
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($ph->IMAGEN) .'" />';
}
else{
echo "No hay foto por este paciente";	
}

foreach($query_padron as $row)
?>

 </div>
  <div class="col-md-8">
<?php
 if($memberoption=="Supervisor")
{
$table="savesupervisor";
}else if($memberoption=="Municipe"){
$table="savemunicipe";	

}else{
$table="savecoordinador";
}
 ?>
<form id="second_form" method="post" action="<?php echo site_url("alcalde/$table");?>" class="form-horizontal">

 <h1 class="h1 alert alert-info">Crear <?=$memberoption?>   <input  id="save-member" type="submit" value="GUARDAR" class="btn btn-primary btn-sm" /></h1> 

<div class="form-group">
<label  class="control-label col-sm-3" for="nombre"> NOMBRES</label>
<div class="col-sm-9">
<input  type="text" class="form-control" id="nombre" name="nombre" value="<?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>"  >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" for="cedula"> CEDULA</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?>"  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" for="telefono"> TELEFONO</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="telefono" name="telefono" value=""  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" for="direccion"> DIRECCION</label>
<div class="col-sm-9">
<?php
$municipio=$this->padron_database->select('DESCRIPCION,COD_PROVINCIA')->where('COD_MUNICIPIO',$row->COD_MUNICIPIO)->get('municipio')->row_array();
$provincia=$this->padron_database->select('DESCRIPCION')->where('COD_PROVINCIA',$municipio['COD_PROVINCIA'])->get('provincia')->row('DESCRIPCION');

 ?>
<textarea class="form-control" id="direccion" name="direccion" ><?=$municipio['DESCRIPCION'];?>, <?=$provincia?>, <?=$row->CALLE;?></textarea>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" for="mesa"> MESA</label>
<div class="col-sm-5">
<input  type="text" class="form-control" id="mesa" name="mesa" value=""  >
<input  type="hidden" class="form-control"  name="photo" value="padron"  >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" for="sector"> SECTOR</label>
<div class="col-sm-5">

<input  type="text" class="form-control" id="sector" name="sector"  >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" for="recinto">RECINTO</label>
<div class="col-sm-5">

<input  type="text" class="form-control" id="recinto" name="recinto"  >
</div>
</div>
</form> 

  <br/><br/>  <br/><br/>
</div>
</div>
</div>




<script>
//$('.patient-cedula').val("");



$('form[id="second_form"]').validate({
  rules: {
	telefono:'required',
	direccion:'required',
	mesa:'required',
	sector:'required',
 
  },
  messages: {
    telefono: 'este campo es requerido',
	direccion: 'este campo es requerido',
	mesa: 'este campo es requerido',
   sector: 'este campo es requerido',
	
  },
  submitHandler: function(form) {
    form.submit();
  }
});



</script>