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
<a  class="btn btn-primary btn-sm " id="click-yes">  Si</a>
</div>
<div style="text-align:center;display:none;" id="choose-one">
<br/>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("admin/patient_billing/$medico")?>" >Para Medico ?</a>

<a  class="btn btn-default btn-sm" href="<?php echo base_url("admin/patient_billing/$centro")?>"> Para Centro Medico ?</a>
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
