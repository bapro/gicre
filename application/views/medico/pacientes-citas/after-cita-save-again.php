<?php
if($perfil=="Admin"){
	$controller="admin";
	$function='appointments';
} else {
	$controller="medico";
	$function='';
}
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
<?php
if($centro_type=="privado"){
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("$controller/patient_billing_/privado/$id_rdv/$id_dd/$id_cm/$id_seguro")?>" >Si</a>
<?php
} else{
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("$controller/patient_billing_/centro/$id_rdv/$id_dd/$id_cm/$id_seguro")?>">Si</a>
<?php
} 
?>
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
