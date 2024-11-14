<?php
if($isSeguroTitle==11){
	$display='style="display:none"';
	$req=";display:none";
}else{
	$display='';	
	$req='';
}
foreach($query->result() as $row)
 
 	$id_hosp_ = encrypt_url($row->id);
	$id_doc_ = encrypt_url($row->doc); 
	$id_cent_ = encrypt_url($row->centro);

?>
<div class="modal-header  alert alert-info" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>

<h4 class="modal-title">EDITAR DATOS DE LA HOSPITALIZACION</h4>
<hr/>


<?=$patHeader?>

</div>
<div class="modal-body" id="">
<div id="erBoxHosp" style='color:red'></div>
<form method="post" class="form-horizontal" id="send_data_hospitalizacion_update" >

<input  type="hidden"  name="id_user" value="<?=$id_user?>"  >
<input  type="hidden"  name="id_hosp" value="<?=$id_hosp?>"  >

<input  type="hidden"  name="id_seguro" value="<?=$isSeguroTitle?>"  >
	<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control hospitalizacion1 required"  style="width:100%" name="hosp_centro" id="hosp_centro" >
<?php 

foreach($centro_medico as $ce){
	
	if($row->centro == $ce->id_m_c) {
		echo "<option value=".$ce->id_m_c." selected>".$ce->name."</option>";
	} else {
		echo "<option value=".$ce->id_m_c.">".$ce->name."</option>";
	}
	}
 ?>



 </select>
 <div id="load-time"></div>
 </div>
 </div>
<?php 
if($perfil=="Medico"){

 	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	echo"<input name='hosp_esp' type='hidden' value='$area'/>";
	echo"<input name='hosp_doctor' type='hidden' value='$id_user'/>";
 } else { ?>

<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Especialidad</label>
<div class="col-sm-5 esp">
<select class="form-control hospitalizacion1 required reload"  style="width:100%" id="hosp_esp" name="hosp_esp1"  onChange="getDocHosp(this.value);"  >
 <?php
 foreach($especialidades as $esp){
	
	if($row->esp == $esp->id_ar) {
	echo '<option value="'.$esp->id_ar.'" selected>'.$esp->title_area.'</option>';
	} else {
		echo '<option value="'.$esp->id_ar.'">'.$esp->title_area.'</option>';
	}
}


?>
</select>

</div>
 </div>
  <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Doctor</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion1 required reload"  style="width:100%"  name="hosp_doctor" id="hosp_doctor"  >
<?php


foreach($doctors as $doc){
	
	if($row->doc == $doc->id_user) {
	echo '<option value="'.$doc->id_user.'" selected>'.$doc->name.'</option>';
	} else {
		echo '<option value="'.$doc->id_user.'">'.$doc->name.'</option>';
	}
}


?>
</select>

</div>
</div>
	<?php
	}
	?>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Causa</label>
<div class="col-sm-8">
<input class="form-control  required "   name="hosp_causa" id="causa-title4" value="<?=$row->causa?>" />

<input class="form-control"  id="titleId" type="hidden" value="4" />
</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Via de ingreso</label>
<div class="col-sm-6 centrom">
<input class="form-control  required" name="hosp_ingreso" id="hosp-ingreso" value="<?=$row->via?>">

 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Sala</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion1 required reload"  id="hosp_sala" name="hosp_sala"  >
<?php 


foreach($querySala->result() as $rowSala){
	
	if($row->sala == $rowSala->sala) {
	echo '<option value="'.$rowSala->sala.'" selected>'.$rowSala->sala.'</option>';
	} else {
		echo '<option value="'.$rowSala->sala.'">'.$rowSala->sala.'</option>';
	}
}


?>
</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Servicio</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion1 required reload"   name="hosp_servicio" id="hosp_servicio"  >
<?php 


foreach($queryServ->result() as $rowServ){
	
	if($row->servicio == $rowServ->servicio) {
	echo '<option value="'.$rowServ->servicio.'" selected>'.$rowServ->servicio.'</option>';
	} else {
		echo '<option value="'.$rowServ->servicio.'">'.$rowServ->servicio.'</option>';
	}
}



?>
</select>

</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4"><span style="color:red">*</span> Cama</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion1 required reload"  name="hosp_cama" id="hosp_cama"  >
<?php 


foreach($queryCama->result() as $rowCama){
	
	if($row->cama == $rowCama->id) {
	echo '<option value="'.$rowCama->id.'" selected>'.$rowCama->num_cama.'</option>';
	} else {
		echo '<option value="'.$rowCama->id.'">'.$rowCama->num_cama.'</option>';
	}
}



?>
</select>
</div>
</div>
 <div class="form-group" <?=$display?>>
<label class="control-label col-sm-4"><span style="color:red<?=$req?>">*</span>  Autorizacion de ingreso</label>
<div class="col-sm-6">
<input class="form-control"  name="hosp_auto" id="hosp_auto" value="<?=$row->hosp_auto?>" >

</div>
</div>

 <div class="form-group" <?=$display?>>
<label class="control-label col-sm-4"><span style="color:red<?=$req?>">*</span>  Autorizado por</label>
<div class="col-sm-6">
<input class="form-control "  name="hosp_auto_por" id="hosp_auto_por" value="<?=$row->hosp_auto_por?>" >

</div>
</div>
<div class="form-group">
<div class="col-sm-12 col-sm-offset-3" >
  <input type="hidden"  value="4" id="orientation"/>
<table>
<tr>	
 <td><button type="submit" id='save-hosp' style="float:right" class="btn btn-success btn-sm " ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button> <span class='save-spiner'></span></td>
 <td><a target="_blank" class="btn btn-primary btn-sm "  href="<?php echo base_url("printings/print_hosp1/$row->id/$row->id_patient/$isSeguroTitle/$row->doc/$row->centro")?>" style="cursor:pointer" title="Imprimir  "><i  class="fa">&#xf02f;</i> Imprimir</a> </td>
 <td><a class="btn btn-primary btn-sm " href="<?php echo base_url("hospitalizacion/hospitalizacion_historial/$id_hosp_/$id_doc_/$id_cent_")?>" style="cursor:pointer" title="Hospitalizacion  " ><i class="fa fa-hospital-o" aria-hidden="true"></i> Hospitalizacion</a> </td>
</tr>
</table>
</div>
</div>
</div>
<?php
$data['isSeguroTitle'] =$isSeguroTitle;
$data['id_p_ai'] = encrypt_url($id_p_a);
$data['id_useri'] = encrypt_url($id_user);
?>
</form>
 <script src="<?=base_url();?>assets/js/autocomplete.js"></script> 
<?php $this->load->view('hospitalizacion/create_new_hosp_footer', $data);?>



