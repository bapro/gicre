<div class="row">

<h5 class="h5"><i>No se encuentro en el padron </i></h5>

 
<hr id="hr_ad"/>

 <div class="col-md-4">
<img  style="display:inline-block; width:100%; height:auto;" src="<?= base_url();?>/assets/img/user.png"  />

 </div>
  <div class="col-md-8">
 <h1 class="h1 alert alert-info">Crear <?=$memberoption?></h1> 
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
<div class="form-group">
<label  class="control-label col-sm-3" for="nombre"> NOMBRES</label>
<div class="col-sm-9">
<input  type="text" class="form-control" id="nombre" name="nombre" value=""  >
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" for="cedula"> CEDULA</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$cedula?>"  >
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
<textarea class="form-control" id="direccion" name="direccion" ></textarea>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" for="mesa"> MESA</label>
<div class="col-sm-5">
<input  type="text" class="form-control" id="mesa" name="mesa" value=""  >
<input  type="hidden" class="form-control"  name="photo" value=""  >
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
 <div class="col-md-4 col-md-offset-3">
    <input  id="save-member" type="submit" value="GUARDAR" class="btn btn-primary btn-sm" />
  </div>
 
</form>  
</div>

</div>
<br/><br/><br/>
<div class="footersoto">
  <p>Frank Soto Alcalde</p>
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