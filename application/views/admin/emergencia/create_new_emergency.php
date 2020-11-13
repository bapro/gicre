<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title ">Crear Nueva Emergencia </h4>
<p id="erBoxm"></p>
</div>

<div class="modal-body" id="background_">
<form method="post" id=""  class="form-horizontal" action="<?php echo site_url('emergency/emergency_management');?>">
<input  type="hidden" name="id_patient" id="id_patient"  value="<?=$id_p_a?>"  >
<input  type="hidden" name="creadted_by" id="creadted_by"  value="<?=$id_user?>"  >
<input  type="hidden" name="operation"   value="0"  >

 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-6">
<select class="form-control emergencia"   name="centro_medico" id="centro_medico" > 

 <?php 

 foreach($centro_medico as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time-centro-es"></div>
 </div>
 </div>

<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control emergencia required"   name="em_name" id="em_name" >
<option value=""></option>
<?php
foreach($queryc->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
	
</select>

</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-3">Paciente Referido Por</label>
<div class="col-sm-6 centrom">
<select class="form-control emergencia required" name="paciente_referido" id="paciente_referido" >
 <option value="" ></option>
 <?php
foreach($queryrp->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
 </select>
 <div id="load-time"></div>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Medio De Llegado</label>
<div class="col-sm-6">
<select class="form-control emergencia required"  id="medio_llegado" name="medio_llegado"  >
 <option value=""></option>
  <?php
foreach($queryml->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Enviado A</label>
<div class="col-sm-6">
<select class="form-control enviad_a required"   name="enviado_a" id="enviado_a"  >
<option value=""></option>
<option value='1'>Triaje</option>
<option value='2'>Emergencia General</option>
<option value='3'>Emergencia Pediatría</option>
<option value='4'>Quirofano</option>
<option value='5'>Emergencia Obstétrica Y Ginecología</option>
<option value='6'>Reanimación</option>
</select>

</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-3">Estado De Paciente</label>
<div class="col-sm-6">
<select class="form-control emergencia required"  name="estado_paciente" id="estado_paciente"  >
<option value=""></option>
 <?php
foreach($queryep->result() as $row){

echo "<option  value='$row->id_em_c'>$row->em_name</option>";

}
?>
</select>
</div>
</div>
 <button type="submit" id="btn-twice1" style="margin-left:153px" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>
<div id="load-text"><em><i></i></em></div>
</form>

</div>
<?php $this->session->set_userdata('enviado_a', $this->input->post('enviado_a'));?>
<script>

$('.emergencia').select2({ 
placeholder: "SELECCIONAR",
tags: true

});

$('.enviad_a').select2({ 
placeholder: "SELECCIONAR"

});

  $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    }



	
	
	
$('#btn-twice1').on('click', function(){

if($("#centro_medico").val() == "" ){
$("#centro_medico").focus();
$("#erBoxm").html("Selecionne un centro.").css("color","red");
return false;
}


if($("#em_name").val() == "" ){
$("#em_name").focus();
$("#erBoxm").html("Selecionne una causa.").css("color","red");
return false;
} 
if($('#paciente_referido').val() == ""){
$("#paciente_referido").focus();
$("#erBoxm").html("Selecionne el paciente referido").css("color","red");
return false;
}

if($("#medio_llegado").val() == "" ){
$("#medio_llegado").focus();
$("#erBoxm").html("Selecionne el medio llegado").css("color","red");
return false;
}
if($('#enviado_a').val() == ""){
$("#enviado_a").focus();
$("#erBoxm").html("Selecionne a qui se lo envia").css("color","red");
return false;
} 


if($('#estado_paciente').val() == ""){
$("#estado_paciente").focus();
$("#erBoxm").html("Ingrese el estado del paciente").css("color","red");
return false;
} 
});
	
	
</script>