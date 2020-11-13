<div class="tab-content " >
<div class="col-sm-12 showdown searchb" style="text-align:center">
<br/>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
foreach($citas as $pat)

 $patient=$this->db->select('id_p_a,photo,nombre,ced1,ced2,ced3')->where('id_p_a',$pat->id_patient )->get('patients_appointments')->row_array();
 ?>

<div class="wrapper">
    <div id="one">
<?php
$id=$patient['id_p_a'];

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="140"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
	
}
else{
	?>
<img  width="140" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
	</div>
    <div id="two"> <h5 class="h5" style="text-transform:uppercase">paciente : <a target="_blank" href="<?php echo base_url("medico/patient/$id")?>" ><?=$patient['nombre']?><a></h5></div>
  </div>
</div>
<div class="col-sm-12 tab-content showdown searchb" style="text-align:center" >
<h5 class="h5"  id="cita_number"><?=$cita_number?><a style="cursor:pointer" id="show2"> CITA(S)</a></h5> 
<div id="hide2">
<div id="row_data_of_numbers"></div>
</div>

</div>

</div>
<div  id="factura_patient_nombres"></div>
<script>
$(document).ready(function(){
row_data_of_numbers();
function row_data_of_numbers()
{
var id_p_a = "<?=$pat->id_patient?>";
$("#row_data_of_numbers").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('medico/row_data_of_numbers')?>",
data: {id_p_a:id_p_a},
cache: true,
success:function(data){
$("#row_data_of_numbers").html(data);
  
} 
});
}

})



$('#show2').click(function() {
row_data_of_numbers();
$('#hide2').toggle();
	
});



</script>