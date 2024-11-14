<?php
if($perfil=="Admin"){
	$controller="admin";
	$function='appointments';
} else {
	$controller="medico";
	$function='';	
}

if($centro_type=="privado"){
	$typc="privado";
}else{
	$typc="centro";
}

$typ = encrypt_url($typc);	
$id_apB= encrypt_url($id_rdv);	
$docB= encrypt_url($id_dd);	
$centB= encrypt_url($id_cm);
$segB= encrypt_url($id_seguro);	
$idpaB= encrypt_url($idpatient);	



?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-md">

<!-- Modal content-->
<div class="modal-content" >
<div class="modal-header" id="background_">
<h3 class="modal-title" align="center" >Desea realizar factura a este paciente ?</h3>
</div>
<div class="modal-body">
<div style="text-align:center" >
<!--href="<?php echo base_url("$controller/patient/$idpatient/$id_cm")?>"-->
<a  class="btn btn-primary btn-sm" id="return-to-patient-data" >  No</a>

<a  class="btn btn-default btn-sm" href="<?php echo base_url("$controller/patient_billing_/$typ/$id_apB/$docB/$centB/$segB/$idpaB")?>" >Si</a>

</div>

</div>

</div>
</div>
</div>


<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})

$("#return-to-patient-data").on('click',function(){
	//window.history.go(-1);
	window.location.href="<?php echo base_url(); ?><?=$controller?>/<?=$function?>";
	});


</script>
