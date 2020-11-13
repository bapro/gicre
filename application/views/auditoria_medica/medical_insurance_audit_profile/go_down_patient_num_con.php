<hr id="hr_ad"/>
<div style="overflow-x:auto;">

<div id="patient-factura-data"></div>

<input type="hidden" id="dess" value="<?=$desde?>"/>  <input id="hass" type="hidden" value="<?=$hasta?>"/>
</div>
<br/>

<script>

$(document).ready(function(){

patient_factura_data();

function patient_factura_data()
{
var dess =$('#dess').val();
var hass =$('#hass').val();
var medico = "<?=$medico?>";


$.ajax({
type: "POST",
url: "<?=base_url('auditoria_medica/patient_factura_data')?>",
data: {dess:dess,hass:hass,medico:medico},
cache: true,
success:function(data){ 
$("#patient-factura-data").html(data);
}  
});
}
	

});





//------------------------------------------------------------------------------------------------------------------

$('.get-this-one').click(function() {
$("#loadit2").fadeIn().html('<span class="load" style="position:absolute"><img style="width:30px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var get_id_fac = $(this).attr('id');
$('.show-validation').show();
var dess =$('#dess').val();
var hass =$('#hass').val();
var medico = "<?=$medico?>";

$.get( "<?php echo base_url();?>admin/get_patient_historial?get_id_fac="+get_id_fac+"&dess="+dess+"&hass="+hass+"&medico="+medico, function( data ){
$("#loadit2").hide();
$("#get_patient_historial").html( data ); 
}); 
 
});


</script>