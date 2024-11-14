<div class="modal-body" id="">
<div id="show-error"></div>
<form method="post" class="form-horizontal" id="send_data_cita" >
<input  type="hidden" name="creadted_by" id="creadted_by"  value="<?=$name?>"  >
<input  type="hidden" id="nec" name="nec" value="<?php echo $nec?>"  >
<input  type="hidden" name="id_patient" id="id_patient"  value="<?=$id_patient?>"  >
<input  type="hidden" name="seguro_id" id="seguro_id"  value="<?=$seguro_id?>"  >
<input  type="hidden" name="id_user" id="id_user"  value="<?=$id_user?>"  >
<div class="form-group">
<!--<button id="ref-form" type="button" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>-->
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-6">
<select class="form-control select2 causa"  name="causa" id="causa1" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $ca)
{ 
echo '<option value="'.$ca->title.'">'.$ca->title.'</option>';
}
?>

</select>
</div>

</div>
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-6">
<select class="form-control select2"   name="centro_medico" id="centro_medico" > 
 <option value="">Selecionne</option>
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
 <?php if($perfil=="Medico"){ 
 
 
 ?>
 <input type="hidden" class="form-control" name="especialidad" value="<?=$especialidades_doc?>" >
<input type="hidden" class="form-control" id="doctor_dropdown" name="doctor" value="<?=$id_user?>" >

 <?php } else {
?>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2"  name="especialidad" id="especialidad1" onChange="getDoc(this.value);" disabled> 

 </select>
 <div id="load-time"></div>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">

<select class="form-control select2 id_doc_change"  name="doctor" id="doctor_dropdown"  disabled>

</select>
</div>
</div>

 <?php }  ?> 
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-5" >

<div class="input-group date" id="fechaPro">
<input type="text" class="form-control required"  name="fecha_propuesta" id="fecha_propuesta1" disabled />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden"  id="weekday" name="fecha_filter"  />
</div>
<div class="col-sm-7 col-md-offset-3" >
<p id='horario-info'></p>
</div>
</div>
 <button type="submit" id="btn-twice" style="margin-left:153px" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>
<div id="load-text"><em><i></i></em></div>
</form>
<?php 

$esp_id_d=$this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');

 ?>
 <input type="hidden" class="form-control"  id="esp_id_d" value="<?=$esp_id_d?>"  />
</div>
<script>
/*$('#ref-form').on('click', function(event) {
	refresh_form_cita();
	});*/
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
  placeholder: "SELECCIONAR",
    tags: true
  /*escapeMarkup: function (markup) { return markup; },
   //tags: true, 
  language: {

    noResults: function() {

      return "No hay : <a target='_blank'  href='<?php echo site_url("$controller/diseases")?>'>Agregar</a>";        
    },
   
  }*/
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




$('#send_data_cita').on('submit', function(event){
event.preventDefault();
if($("#causa1").val() == "" ){
$("#causa1").focus();
$("#erBox").html("Selecionne una causa.");
} 
else if($('#centro_medico').val() == ""){
$("#centro_medico").focus();
$("#erBox").html("Selecionne un centro medico");
}

else if($("#especialidad1").val() == "" ){
$("#especialidad1").focus();
$("#erBox").html("Selecionne una especialidad");

}
else if($('#doctor_dropdown').val() == ""){
$("#doctor_dropdown").focus();
$("#erBox").html("Selecionne un doctor");

} 


else if($('#fecha_propuesta1').val() == ""){
$("#fecha_propuesta1").focus();
$("#erBox").html("Ingrese la fecha de la cita");

} 

else if($('#hora_de_cita').val() == ""){
$("#hora_de_cita").focus();
$("#erBox").html("Cual es la hora de la cita?");

}

else{
$('#btn-twice').prop("disabled",true);
//$("#btn-twice").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');	
$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>cita/add_new_cita",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
	if($("#esp_id_d").val()==87){
	window.location.href="<?php echo base_url(); ?>medico/index";	
	}else{
window.location.href="<?php echo base_url(); ?>admin_medico/redirect_after_save_cita";
	}
}  
});
}
});




$('#fechaPro').datetimepicker({
format: 'DD-MM-YYYY',
//minDate: new Date(),
locale:'es',
widgetPositioning: {
horizontal: 'auto',
vertical: 'bottom'
}
}).on('dp.change', function(e) {
$('#weekday').val(e.date.format('dddd'));
$("#horario-info").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var day=$('#weekday').val();
var doc=$('#doctor_dropdown').val();
var fecha_propuesta1 =$('#fecha_propuesta1').val();
var centro_medico=$('#centro_medico').val();
var id_patient="<?=$id_patient?>";
$.ajax({
type: "POST",
url: "<?=base_url('cita/daySelected')?>",
data: {day:day,doc:doc,fecha_propuesta1:fecha_propuesta1,centro_medico:centro_medico,id_patient:id_patient},
cache: true,
success:function(data){ 
$( "#horario-info").html(data).css('color','red'); 

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
  
});

});


$("#centro_medico").change(function(){
$("#load-time-centro-es").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#centro_medico").val();
$('#fecha_propuesta1').prop("disabled",false);
$('#especialidad1').val(null).trigger('change');
//$('#doctor_dropdown').val(null).trigger('change');
$('#fecha_propuesta1').val("");
$( "#horario-info").html("");
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#especialidad1").prop("disabled",false);
	$("#especialidad1").html(data);
	$("#load-time-centro-es").hide();
	},

	}); 

});


$("#doctor_dropdown").change(function(){
$('#fecha_propuesta1').prop("disabled",false);	

$('#fecha_propuesta1').val("");
$( "#horario-info").text(""); 

});
</script>