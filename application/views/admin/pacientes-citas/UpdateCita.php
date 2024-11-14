<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<?php
foreach($FindCita as $edit_cit)
?>
<h3 class="modal-title">Edita Cita : <?=$edit_cit->nec?></h3>
<p id="erBox11" style="color:red"></p>
</div>

<div  id="background_">
<form method="post" class="form-horizontal" id="send_data_cita" action="<?php echo site_url('cita/saveUpdateCita');?>">
<input type="hidden" name="update_by" value="<?=$name?>"/>
<input type="hidden" name="id_patient" value="<?=$edit_cit->id_patient?>">
<input type="hidden" name="id_cita" value="<?=$edit_cit->id_apoint?>">
<input type="hidden" name="nec" value="<?=$edit_cit->nec?>"/>
<input type="hidden" name="cancelar" value="<?=$cancelar?>"/>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-6">
<select class="form-control select2 causa"  name="causa" id="causa11" >
<?php
foreach($causa as $ca){
	
	if($edit_cit->causa == $ca->title) {
	echo '<option value="'.$ca->title.'" selected>'.$ca->title.'</option>';
	} else {
		echo '<option value="'.$ca->title.'">'.$ca->title.'</option>';
	}
}
?>
</select>
</div>

</div>
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-6">
<select class="form-control select2"   name="centro_medico" id="centro_medico11" > 
<?php
foreach($centro_medico as $ce){
	
	if($edit_cit->centro == $ce->id_m_c) {
		echo "<option value=".$ce->id_m_c." selected>".$ce->name."</option>";
	} else {
		echo "<option value=".$ce->id_m_c.">".$ce->name."</option>";
	}
	}
?>
 </select>
 <div id="load-time-es"></div>
 </div>
 </div>
 <?php if($perfil=="Medico"){ 
 
 
 ?>
 <input type="hidden" class="form-control" name="especialidad" value="<?=$especialidades_doc?>" >
<input type="hidden" class="form-control" id="doctor_dropdown11" name="doctor" value="<?=$id_user?>" >

 <?php } else {
?>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2"  name="especialidad" id="especialidad11" > 
<?php
foreach($especialidades as $esp){
	
	if($edit_cit->area == $esp->id_ar) {
		echo "<option value=".$esp->id_ar." selected>".$esp->title_area."</option>";
	}
}
?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">

<select class="form-control select2"  name="doctor" id="doctor_dropdown11"  >
<?php
foreach($doctors as $doc){
	
	if($edit_cit->doctor == $doc->id_user) {
		echo "<option value=".$doc->id_user." selected>".$doc->name."</option>";
	}
}
?>
</select>
<div id="load-time1"></div>
</div>
</div>

 <?php }  ?> 
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-5" >

<div class="input-group date" id="fechaPro11">
<input type="text" class="form-control required"  name="fecha_propuesta" value="<?=$edit_cit->fecha_propuesta?>" id="fecha_propuesta11"  />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden" value='<?=$edit_cit->weekday?>' id="weekday11" name="fecha_filter"  />
</div>
<div class="col-sm-7 col-md-offset-3" >
<p id='horario-info11'></p>
</div>
</div>
 <button type="submit" id="btn-twice11" style="margin-left:153px" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>
<br/><br/>
</form>

</div>
<script>
$('#btn-twice11').click(function(e) { 
if($("#centro_medico11").val() == "" ){
$("#centro_medico11").focus();
$("#erBox11").html("Vuelve a selecionar un centro medico");
return false;
} 

if($("#especialidad11").val() == "" ){
$("#especialidad11").focus();
$("#erBox11").html("Selecione una especialidad");
return false;
} 

if($('#doctor_dropdown11').val() == ""){
$("#doctor_dropdown11").focus();
$("#erBox11").html("Selecione un doctor");
return false;
} 


if($('#fecha_propuesta11').val() == ""){
$("#fecha_propuesta11").focus();
$("#erBox11").html("Ingrese la fecha de la cita");
return false;
}


});
//---------------------------------------------------------------------
$("#especialidad11").change(function(){
	getDocEs();
	});
function getDocEs() {
$("#load-time1").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#fecha_propuesta11").prop("disabled",true);
$("#doctor_dropdown11").prop("disabled",true);
$('#doctor_dropdown11').val(null).trigger('change');
var id_centro= $("#centro_medico11").val();
var id_es=$("#especialidad11").val();
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:id_es,id_centro:id_centro},
	success: function(data){
	$("#doctor_dropdown11").prop("disabled",false);
	$("#fecha_propuesta11").prop("disabled",false);
	$("#doctor_dropdown11").html(data);
	$("#doctor_dropdown11").prop("disabled",false);
	$("#load-time1").hide();
	},
	});
}
//---------------------------------------------------------------------
$("#centro_medico11").change(function(){
	loadEsp();
	});
	
function loadEsp(){
$("#load-time-es").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#centro_medico11").val();
$('#fecha_propuesta11').prop("disabled",false);
$('#especialidad11').prop("disabled",true);
$('#especialidad11').val(null).trigger('change');	
$('#fecha_propuesta11').val("");
$( "#horario-info11").html("");
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#especialidad11").prop("disabled",false);
	$("#especialidad11").html(data);
	$("#load-time-es").hide();
	$('#especialidad11').prop("disabled",false);
	},

	}); 

}
//--------------------------------------------------------------------------
  $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   allowClear: true,
 escapeMarkup: function (markup) { return markup; },
   //tags: true, 
  language: {

    noResults: function() {

      return "No hay.";        
    },
   
  }
});

  $('.causa').select2({
tags: true	  

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



	$('#fechaPro11').datetimepicker({
    format: 'DD-MM-YYYY',
	//minDate: new Date(),
	locale:'es',
	  widgetPositioning: {
         horizontal: 'auto',
        vertical: 'bottom'
        }
}).on('dp.change', function(e) {
    $('#weekday11').val(e.date.format('dddd'));
   $("#horario-info11").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
   var day=$('#weekday11').val();
	var doc=$('#doctor_dropdown11').val();
	var fecha_propuesta1 =$('#fecha_propuesta11').val();
	var centro_medico=$('#centro_medico11').val();

	var id_patient="<?=$edit_cit->id_patient?>";
	$.ajax({
	type: "POST",
	url: "<?=base_url('cita/daySelected')?>",
	data: {day:day,doc:doc,fecha_propuesta1:fecha_propuesta1,centro_medico:centro_medico,id_patient:id_patient},
	cache: true,
	success:function(data){ 
	$( "#horario-info11").html(data).css('color','red'); 

	}  
	});
	
});





</script>