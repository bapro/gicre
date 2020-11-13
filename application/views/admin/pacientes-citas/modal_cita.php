<?php
$name=($this->session->userdata['admin_name']);

function rand_string( $length ) {
$chars = "0123456789";
return substr(str_shuffle($chars),0,$length);

}
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<div class="modal fade" id="NewC" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h3>Crear Nueva Cita </h3>
<h4 id="erBox" style="color:red"></h4>
<h4 id="exitosend" class='alert alert-success' style="display:none">Enviando los datos...</h4>
</div>
<div  style=" height:74vh; overflow-y: auto;" id="background_" >
<br/>
<div id="userText" class="form-horizontal"  > 
<form method="post" id="send_data_cita" >
<input  type="hidden" name="creadted_by" id="creadted_by"  value="<?=$name?>"  >
<input  type="hidden" id="nec" name="nec" value="NEC-<?php echo rand_string(4);?>"  >
<input  type="hidden" name="id_patient" id="id_patient"  value="<?=$idpatient?>"  >
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
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
<label class="control-label col-sm-3">Centro medico</label>
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
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2"  name="especialidad" id="especialidad1" onChange="getDoc(this.value);" > 
 <option value="">Selecionne</option>
 <?php 

 foreach($especialidades as $esp)
 { 
 echo '<option value="'.$esp->id_ar.'">'.$esp->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">

<select class="form-control select2"  name="doctor" id="doctor_dropdown1" disabled >

</select>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta</label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" id="fecha_propuesta1" name="fecha_propuesta"  readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro"  readonly />
</div>
</div>
 <button type="submit" style="margin-left:153px" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>

</form>
</div>
</div>
</div>
 </div>
    </div>
</div>

<div class="modal fade" id="EditC" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
</div>
 </div>
    </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>

  $('.select2').select2({ 
  placeholder: "SELECCIONAR",
    allowClear: true, 
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
$('#send_data_cita').on('submit', function(event) {
event.preventDefault();
var id_patient = $("#id_patient").val();
var nec = $("#nec").val();
var causa = $("#causa1").val();
var centro_medico = $("#centro_medico1").val();
var especialidad = $("#especialidad1").val();
var doctor_dropdown = $("#doctor_dropdown1").val();
var fecha_propuesta = $("#fecha_propuesta1").val();
var mirror_pro = $("#mirror_pro").val();
var creadted_by = $("#creadted_by").val();

// AJAX code to send data to php file.
$.ajax({
type: "POST",
url: "<?php echo site_url('admin/add_new_cita');?>",
data: {nec:nec,id_patient:id_patient,causa:causa,centro_medico:centro_medico,especialidad:especialidad,doctor:doctor_dropdown,fecha_propuesta:fecha_propuesta,filter_date:mirror_pro,creadted_by:creadted_by},
dataType: "JSON",

}).done(function(msg) {

});

//$('.chosen-select').val('').trigger('chosen:updated');
$("#erBox").hide();
$('#exitosend').fadeIn('slow').delay(5000).fadeOut('slow');
setTimeout(function() {
window.location.href="<?php echo base_url('admin/save_'); ?>?id_patient="+id_patient;
}, 1000);
});
//------------------------------------------
 $('#EditC').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
</script>