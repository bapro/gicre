<script>
 $('.select2').select2({ 
  tags: true
});
$('#save_enf_act_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var id_enf  = $("#id_enf").val();

var enf_motivo = $("#enf_motivo1").val();
var enf_signopsis = $("#enf_signopsis1").val();
var enf_laboratorios = $("#enf_laboratorios1").val();
var enf_estudios = $("#enf_estudios1").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpEnfermedad')?>",
data: {id_enf:id_enf,updated_by:updated_by,enf_motivo:enf_motivo,enf_signopsis:enf_signopsis,enf_laboratorios:enf_laboratorios,enf_estudios:enf_estudios},

cache: true,
  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_enf_act').slideDown();
	$(".save_enf_act_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});




//-----------------------------------------------------------

$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_enf_act").on('click', function (e) {
	$('.show_modif_enf_act').hide();
	$(".save_enf_act_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
})



</script>