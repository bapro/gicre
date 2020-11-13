<style>
input.form-control{border:none}
</style>
<div class="modal-header" id="background_">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<?php foreach($VerSolicitud as $row)
	 
	 {
		 ?>
<a href="<?= base_url("/admin/confirmar_solicitud/$row->id_patient/$row->nec") ?>" class="btn btn-primary btn-xs"  >Confirmar</a>

<hr/>

<h4 class="modal-title">Ver solicitud (<?=$row->nec ?>)</h4>
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
<input type="text" class="form-control" value="<?= $row->fecha_propuesta ?>"  disabled>
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
<label class="control-label col-sm-4">Telefono residencial:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->tel_resi ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Telefono celular:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="<?= $row->tel_cel ?>" disabled>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Centro medico:</label>
<div class="col-sm-8" >
<?php 
	$medical_centers=$this->db->select('name')->where('id_m_c',$row->centro )
   ->get('medical_centers')->row_array();?>
<a href="<?php echo site_url('admin/centro_medico/'.$row->centro);?>" ><?=$medical_centers['name']?></a>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Especialidad:</label>
<div class="col-sm-8">
		<?php 
	$area=$this->db->select('title_area')->where('id_ar',$row->area )
   ->get('areas')->row_array();?>
   <input type="text" class="form-control" value="<?=$area['title_area'];?>" disabled>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Doctor:</label>
<div class="col-sm-8">
<?php 
	$doc=$this->db->select('name')->where('id_user',$row->doctor )
   ->get('users')->row('name');?>
<a href="<?php echo site_url('admin/doctor/'.$row->doctor);?>" ><?=$doc;?></a>

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

</div>
</div>
<?php
	 }
	 
?>
