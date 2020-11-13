
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title ">Crear Nueva Cita (<?php echo $nec?>)
</h4>

</div>

<h4 id="erBox" style="color:red"></h4>
<h4 id="exitosend" class='alert alert-success' style="display:none">Enviando los datos...</h4>
<div id="refresh_form_cita"></div>

<script>
refresh_form_cita();
 function refresh_form_cita()
{
$("#refresh_form_cita").fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

var id_p_a = "<?=$id_p_a?>";
var id_user = "<?=$id_user?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/refresh_form_cita')?>",
data: {id_p_a:id_p_a,id_user:id_user},
cache: true,
success:function(data){
$("#refresh_form_cita").html(data);
  
} 
});
}



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
	*/
</script>
