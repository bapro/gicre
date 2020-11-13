<?php
$medico="medico";
$centro="centro";

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
<a  class="btn btn-primary btn-sm" onclick="window.history.go(-1);">  No</a>
<?php
if($centro_type=="privado"){
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("admin/patient_billing_/$medico/$id_rdv/$id_dd/$id_cm/$id_seguro")?>" >Si</a>
<?php
} else{
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("admin/patient_billing_/$centro/$id_rdv/$id_dd/$id_cm/$id_seguro")?>">Si</a>
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

$("#click-yes").on('click',function(){
	$("#choose-one").slideDown();
	
	});


</script>
