<?php 
$this->padron_database = $this->load->database('padron',TRUE);
foreach ($search->result() as $row) 
	$nombres=$row->nombres;
	$telefono=$row->telefono;
	$cedula=$row->cedula;
	$direccion=$row->direccion;
	$mesa=$row->mesa;
	$id=$row->id;
	$sector=$row->sector;
$recinto=$row->recinto;

$vced1 = substr($row->cedula, 0, 3);
$vced2 = substr($row->cedula, 3, 7);
$vced3 = substr($row->cedula, -1);
?>
<style>
td,th{text-align:left;font-size:11px}
</style>
<h2 style="color:green">Editar</h2> 
 <div class="row" style='font-size:11px'>

 <div class="col-md-2">
 <?php
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($row->photo==""){
$readonlyag="";
?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-10">
  <form id="second_form" method="post" action="<?php echo site_url("alcalde/save_edit_member");?>" class="form-horizontal">
<table class="table" style='font-size:11px'>
<input  type="hidden" class="form-control" name="table" value="<?=$table?>" >
<input  type="hidden" class="form-control" name="id" value="<?=$id?>" >
<tr>
<th> NOMBRES</th>
<td>
<input  type="text" class="form-control" id="nombres" name="nombres" value="<?=$nombres?>" >
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$cedula?>" >
</td>
</tr>
<tr>
<th> TELEFONO</th>
<td>
<input  type="text" class="form-control" id="telefono" name="telefono" value="<?=$telefono?>" >
</td>
</tr>
<tr>
<th> DIRECCION</th>
<td>
<textarea class="form-control" id="direccion" name="direccion" ><?=$direccion?></textarea>

</td>
</tr>
<tr>
<th> MESA</th>
<td>
<input  type="text" class="form-control" id="mesa" name="mesa" value="<?=$mesa?>" >
</td>
</tr>

<tr>
<th> SECTOR</th>
<td>
  <input  type="text" class="form-control" id="sector" name="sector" value="<?=$sector?>" >
</td>
</tr>
<tr>
<th> RECINTO</th>
<td>
  <input  type="text" class="form-control" id="recinto" name="recinto" value="<?=$recinto?>" >
</td>
</tr>
<tr>
<td>
   <input  id="save-member" type="submit" value="GUARDAR" class="btn btn-primary btn-sm" />
</td>
<td>
</td>
</tr>
</table>
</form>
</div>

<script>
//$('.patient-cedula').val("");


$('form[id="second_form"]').validate({
  rules: {
	 nombres:'required',
	 cedula:'required',
	telefono:'required',
	direccion:'required',
	mesa:'required',
	sector:'required'
 
  },
  messages: {
	nombres: 'este campo es requerido',
	cedula: 'este campo es requerido',
    telefono: 'este campo es requerido',
	direccion: 'este campo es requerido',
	mesa: 'este campo es requerido',
   sector: 'este campo es requerido'
	
  },
  submitHandler: function(form) {
    form.submit();
  }
});



</script>