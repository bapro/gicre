<?php

$id_rdv=$this->db->select('id_rdv')->where('paciente',$historial_id) ->where('medico',$user_id) ->where('filter_date',date('Y-m-d'))->order_by('id_rdv','desc') ->limit(1)->get('factura2')->row('id_rdv');
if($id_rdv){
	$id_rdv=$id_rdv;
}else{
	$id_rdv=0;
}


$id_apoint=$this->db->select('id_apoint')->where('id_patient',$historial_id)->where('doctor',$user_id)->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('id_apoint');


$id_segu=$this->db->select('seguro_medico')->where('id_p_a',$historial_id)->get('patients_appointments')->row('seguro_medico');
$type=$this->db->select('type')->where('id_m_c',$centro_medico)->get('medical_centers')->row('type');


$area1 = encrypt_url($areaid);
$historial_id1 = encrypt_url($historial_id);
$user_id1 = encrypt_url($user_id);
$centro_medico1 = encrypt_url($centro_medico);
$zero = encrypt_url(0);

?>

<!--IN THE CASE THERE IS NO APPOINTMENT FOR TODAY IN THE BILLING TABLE 
$id_rdv=0;
SHOWING MODAL AFTER SAVE AND ASK DOCTOR IF HE OR SHE WANTS TO BILL THE PATIENT-->
<div id="HistSaveModal" class="text-center custom_model modal fade" tabindex="-1" role="dialog" aria-labelledby="HistSaveModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="alert alert-success">
<h2>Datos se guadan con exito  <i class="fa fa-check" style="font-size:24px"></i></h2>
</div>

</div>
<div class="modal-body">
<p>¿ Desea facturar paciente ?</p>
<button type="button" class="btn no-email">No</button>  
<a class="btn btn-primary" href="<?php echo site_url("medico/patient_billing_/$type/$id_apoint/$user_id/$centro_medico/$id_segu")?>" >Si</a>

</div>
</div>

<script>

// CALL THIS FUNCTION AFTER SAVING THE HISTORIAL

function pressBtnHist(response){
if(response.status == 1){
$('.required-menu').html('<p class="alert alert-danger text-center">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
$(".tab-enf-act").addClass("fa fa-asterisk").css('color','red').css('font-size','20px');
} 
else if(response.status == 2){
$('.required-menu').html('<p class="alert alert-danger text-center">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
$(".tab-enf-act").addClass("fa fa-asterisk").css('color','red').css('font-size','20px');
}
else if(response.status == 3 || response.status ==4){
$('.required-menu').html('<p class="alert alert-danger text-center">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
$(".tab-con-diag").addClass("fa fa-asterisk").css('color','red').css('font-size','20px');
}
 
else{
$('#save_ant_gen').prop("disabled",true);
$("#save_ant_gen").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
if(<?=$id_rdv?>==0){
	// THERE IS NO BILL FOR TODAY SHOW MODAL TO CONFIRM SAVING AND THE OPTION TO BILL THE PATIENT
$('#HistSaveModal').modal({
backdrop: 'static',
keyboard: false
})
} else{	
// RELOAD THE PAGE AFTER SAVING THE HISTORIAL
	stayInHist();
}
	
}
}




$(".no-email").click(function() {

stayInHist();

});

// AFTE SAVING THE HISTORIAL REMAIN IN THE CURRENT PAGE
function stayInHist(){
var historial_id1 = "<?=$historial_id1?>";
var user_id1 = "<?=$user_id1?>";
var centro1 = "<?=$centro_medico1?>";
var zero="<?=$zero?>";

 window.location.href = '<?php echo site_url('medico/historial_medical');?>/' + historial_id1 + "/" + user_id1 + "/" + centro1 + "/" + zero + "/" + user_id1;

	
}



</script>