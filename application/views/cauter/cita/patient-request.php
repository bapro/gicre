<style>
input.form-control{border:none;}
label.control-label{text-transform:uppercase}
</style>
<div class="modal-header" id="background_">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<?php foreach($VerSolicitud as $row)
	 
$ci=$this->db->select('nec,fecha_propuesta,doctor,area')->where('id_patient',$row->id_p_a )
   ->get('rendez_vous')->row_array();
   $nec=$ci['nec'];
   
   ?>

<a href="<?= base_url("/cauter/confirmar_solicitud/$row->id_p_a/$nec") ?>" class="btn btn-primary btn-xs"  >Confirmar</a>

<hr/>

<h4 class="modal-title">Ver solicitud (<?=$nec ?>)</h4>
</div>
<div  style=" height:74vh; overflow-y: auto;" id="background_" >
<div id="userText" class="form-horizontal"  > 

<div class="form-group">
<label class="control-label col-sm-4">Nombre:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->nombre ?>"   disabled>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4">Fecha solicitud:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?=$ci['fecha_propuesta'] ?>"  disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Frecuencia:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->frecuencia ?>"  disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Email:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->email ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Telefono celular:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->tel_cel ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Telefono residencial:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->tel_resi ?>" disabled>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Doctor:</label>
<div class="col-sm-8">
<?php 
	$doc=$this->db->select('name')->where('id_user',$ci['doctor'] )
   ->get('users')->row('name');?>
  <input type="text" class="form-control" value="<?=$doc;?> " disabled>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Especialidad:</label>
<div class="col-sm-8">
		<?php 
	$area=$this->db->select('title_area')->where('id_ar',$ci['area'])
   ->get('areas')->row_array();?>
   <input type="text" class="form-control" value="<?=$area['title_area'];?>" disabled>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4">Seguro Medico:</label>
<div class="col-sm-8">
<?php 
	$seguro_name=$this->db->select('title')->where('id_sm',$row->seguro_medico )
   ->get('seguro_medico')->row_array();?>
   <input type="text" class="form-control" value="<?=$seguro_name['title'];?>" disabled>
</div>
</div>
<?php 
foreach($GET_NAMEF as $get_input)
{
?>
<div class="form-group">

<label class="control-label col-sm-4" ><?=$get_input->inputf;?></label>
<div class="col-sm-3">
<input  type="text"  class="form-control" value="<?=$get_input->input_name;?>" disabled>
<input  type="hidden"  class="form-control" value="<?=$get_input->inputf;?>" disabled>
</div>
</div>
<?php
}
?>
</div>
</div>
