<style>
input.form-control{border:none}
</style>
<div class="modal-header">
<?php foreach($query->result() as $row)
$number_cita=$this->db->select('id_patient')->where('doctor',$row->doctor)->where('id_patient',$row->id_patient)->where('cancelar',0)->get('rendez_vous');
$frecuencia=$number_cita->num_rows();
$pat=$this->db->select('nombre,tel_resi,tel_cel,email,frecuencia,seguro_medico,photo,ced1,ced2,ced3')->where('id_p_a',$row->id_patient)
->get('patients_appointments')->row_array();


$area=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row('title_area');

	$doc=$this->db->select('name,link_pago,link_video_conf')->where('id_user',$row->doctor)
   ->get('users')->row_array();
 ?>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

<div class='container' >
<h4 class="modal-title">Ver solicitud (<?=$row->nec?>)</h4>
</div>
<div  style=" height:74vh; overflow-y: auto;"  >
<div id="userText" class="form-horizontal"  > 
<div class="form-group" >
<label class="control-label col-sm-4">Foto:</label>
<div class="col-sm-8">
<?php
$this->padron_database = $this->load->database('padron',TRUE);
if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img  style="width:16%;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  style="width:16%;" src="'.base_url().'/assets/img/user.png"  />';	
}
//echo '<img style="width:16%;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($pat['photo']==""){
$readonlyag="";
?>
<img  style="width:16%;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="width:16%;" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat['photo']; ?>"  />
<?php

}
?>
</div>
</div>


<div class="form-group" id="background_">
<label class="control-label col-sm-4">Nombre:</label>
<div class="col-sm-8">
<?= $pat['nombre'] ?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Fecha solicitud:</label>
<div class="col-sm-8">
<?=$row->fecha_propuesta?>
</div>
</div>
<div class="form-group" id="background_">
<label class="control-label col-sm-4">Frecuencia:</label>
<div class="col-sm-8">
<?php
if($frecuencia == 1){
	 $frecuencia_text="1.ª vez";
  } else{
	$frecuencia_text="$frecuencia veces"; 
 } 
echo $frecuencia_text;
 ?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Email:</label>
<div class="col-sm-8">
<?=$pat['email'] ?>
</div>
</div>

<div class="form-group" id="background_" style='color:red'>
<label class="control-label col-sm-4">Telefono celular:</label>
<div class="col-sm-8">
<?=$pat['tel_cel'] ?>
</div>
</div>


<div class="form-group" >
<label class="control-label col-sm-4">Telefono residencial:</label>
<div class="col-sm-8">
<?=$pat['tel_resi'] ?>
</div>
</div>

<div class="form-group" id="background_">
<label class="control-label col-sm-4">Centro medico:</label>
<div class="col-sm-8" >
<?php 
	$medical_centers=$this->db->select('name')->where('id_m_c',$row->centro )
   ->get('medical_centers')->row('name');
   echo $medical_centers ;?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Especialidad:</label>
<div class="col-sm-8">
<?php 
echo $area;
?>
</div>
</div>

<div class="form-group" id="background_">
<label class="control-label col-sm-4">Doctor:</label>
<div class="col-sm-8">
<?php 

   echo $doc['name'];
   ?>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Seguro Medico:</label>
<div class="col-sm-8">
<?php 
	$seguro_name=$this->db->select('title')->where('id_sm',$pat['seguro_medico'])
   ->get('seguro_medico')->row('title');
   echo $seguro_name;
   ?>
</div>
</div>


<div class="form-group"  style='background:#FFAA8D'>
<label class="control-label col-sm-4">Causa:</label>
<div class="col-sm-8" style='text-transform:uppercase'>
<?php echo $row->causa ?>
</div>
</div>




</div>

  <div>
  <strong>
 Una vez usted confirme la cita el paciente recibirá un correo electrónico con la confirmación de la misma.<br/>
  </strong></div>
<form  class="form-horizontal" method="post"  action="<?php echo site_url("admin_medico/confirmar_solicitud");?>" > 
<input type="hidden" name="id_apoint" value="<?=$row->id_apoint?>"/>
<input type="hidden" name="patient" value="<?=$pat['nombre']?>"/>
<input type="hidden" name="centro" value="<?=$medical_centers?>"/>
<input type="hidden" value="<?=$row->nec?>" name="patient-nec"/>
<input type="hidden" value="<?=$user_id?>" name="user-id"/>
<input type="hidden" value="<?=$row->doctor?>" name="doc-id"/>
<input type="hidden" value="<?=$pat['email'] ?>" name="patient-email"/>
<input type="hidden" value="<?=$area ?>" name="doctor-area"/>
<input type="hidden" value="<?=$row->centro?>" name="centro-id"/>
<input type="hidden" value="1" name="direction"/>
<input type="hidden" value="<?=$pat['tel_cel'] ?>" name="patient-phone"/>
<hr/>
<textarea placeholder="Usd puede escribir nota al paciente, por ejemplo en que periodo estara disponible por la cita." class="form-control" id="background_" name="medico-text" rows="4" cols="55"></textarea><br/>
<div class="form-group">
<label class="control-label col-sm-3">Fecha Propuesta</label>
<div class="col-sm-4" >
<div class="input-group form_datetime2" >
<input type="text" class="form-control" style='border:1px solid #38a7bb' value="<?=$row->fecha_propuesta?>" name="fecha-doctor"/>
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3">Link de Video de Conferencia</label>
<div class="col-sm-8">
<input type="text" class="form-control" style='border:1px solid #38a7bb' name="link-zoom" placeholder='entrar el link de Conferencia' value="<?=$doc['link_video_conf']?>" />

</div>
</div>
<div class="form-group" >
<?php if($row->centro ==50){
	echo "<span style='color:red'>El paciente debe pagar el centro</span>";
} else{	?>
<label class="control-label col-sm-3">Link de Pago:</label>
<div class="col-sm-8">
<?php

?>
<input type="text" class="form-control" style='border:1px solid #38a7bb' name="link-pago" placeholder='entrar el link del pago' value="<?=$doc['link_pago']?>" />
<?php 
$val=$this->db->select('price,name')->where('id_doctor',$row->doctor)->get('products')->row_array();
if($val['price']){
	$price=$val['price'];
	$servicio=$val['name'];
echo "<label>$servicio : $$price USD</label>";	
}else{
$link='href="https://www.admedicall.com/medico/payment_received"';	
echo "<span style='color:red'>El servicio online no tiene precio<br/> <u><a $link>Crearlo antes de confirmar</a></ul></span>";	
}
?>
</div>
<?php } ?>
</div>
<div class="form-group">
<div class="col-sm-4" >
<button class="btn btn-primary btn-xs" type="submit">Confirmar</button>
</div>
</div>
<br/><br/>
</form>
</div>
</div>
<script>
$('.form_datetime2').datetimepicker({
      format: 'DD-MM-YYYY'
	  });
</script>