
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title ">Crear Nueva Cita (<?php echo $nec?>)
</h4>

</div>
<div class="modal-body" id="background_">
<h4 id="erBox" style="color:red"></h4>
<h4 id="exitosend" class='alert alert-success' style="display:none">Enviando los datos...</h4>
<form method="post" class="form-horizontal" id="send_data_cita" action="<?php echo site_url('medico/add_new_cita');?>">
<input  type="hidden" name="creadted_by" id="creadted_by"  value="<?=$name?>"  >
<input  type="hidden" id="nec" name="nec" value="<?php echo $nec?>"  >
<input  type="hidden" name="id_patient" id="id_patient"  value="<?=$id_patient?>"  >
<input  type="hidden" name="seguro_id" id="seguro_id"  value="<?=$seguro_id?>"  >
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-6">
<select class="form-control select2"  name="causa" id="causa1" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $ca)
{ 
echo '<option value="'.$ca->id.'">'.$ca->title.'</option>';
}
?>

</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-6">
<select class="form-control select2"   name="centro_medico" id="centro_medico1" > 
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
<input type="hidden" class="form-control" name="especialidad" value="<?=$especialidades?>" >
<input type="hidden" class="form-control" name="doctor" value="<?=$id_user?>" >

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-9" >
<div class="input-group date form_pro col-md-8 "  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" name="fecha_propuesta" id="fecha_propuesta1" readonly>
<!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>--><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" />

</div>

</div>
 <button type="submit" style="margin-left:153px" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>

</form>
</div>
 
<script>

  $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   tags: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

$('.send_cit').click(function(e) {  
if($("#causa1").val() == "" ){
$("#causa1").focus();
$("#erBox").html("Selecionne una causa.");
return false;
} 
if($('#centro_medico1').val() == ""){
$("#centro_medico1").focus();
$("#erBox").html("Selecionne un centro medico");
return false;
}

if($("#especialidad1").val() == "" ){
$("#especialidad1").focus();
$("#erBox").html("Selecionne una especialidad");
return false;
} if($('#doctor_dropdown1').val() == ""){
$("#doctor_dropdown1").focus();
$("#erBox").html("Selecionne un doctor");
return false;
} 


if($('#fecha_propuesta1').val() == ""){
$("#fecha_propuesta1").focus();
$("#erBox").html("Ingrese la fecha de la cita");
return false;
}


});



//----------------------------------save new cita ------------------------

/*

$('#send_data_cita').on('submit', function(event) {
event.preventDefault();
var id_patient = $("#id_patient").val();
var nec = $("#nec").val();
var causa = $("#causa1").val();
var centro_medico = $("#centro_medico1").val();
var especialidad = $("#especialidad1").val();
var doctor_dropdown = $("#doctor_dropdown1").val();
var fecha_propuesta = $("#fecha_propuesta1").val();
//alert(fecha_propuesta);
var mirror_pro = $("#mirror_pro").val();
var creadted_by = $("#creadted_by").val();

// AJAX code to send data to php file.
$.ajax({
type: "POST",
url: "<?php echo site_url('admin_medico/add_new_cita');?>",
data: {nec:nec,id_patient:id_patient,causa:causa,centro_medico:centro_medico,especialidad:especialidad,doctor:doctor_dropdown,fecha_propuesta:fecha_propuesta,filter_date:mirror_pro,creadted_by:creadted_by},
dataType: "JSON",

}).done(function(msg) {

});

//$('.chosen-select').val('').trigger('chosen:updated');
$("#erBox").hide();
$('#exitosend').fadeIn('slow').delay(5000).fadeOut('slow');
setTimeout(function() {
window.location.href="<?php echo base_url('admin_medico/redirect_after_save_cita_again'); ?>?id_patient="+id_patient;
//location.reload(); 
}, 1000);
});
*/

		$('.form_pro').datetimepicker({
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy - hh:ii:s",
        linkField: "mirror_pro",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
    });
	$(".form_pro").datetimepicker( "setDate", new Date());





  $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    }
</script>
