<div class="col-sm-12 showdown searchb" style="text-align:center">
<?php 
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$now =number_format($now,3);?>
<div style="overflow-x:auto" >
<span style="font-size:14px;color:green"><i>resultados (<?=$now?> segundos)</i></span>

<table class="table fixed" style="border-bottom:1px solid #38a7bb">
<tr style="background:#A9E4EF;">
<th>Foto</th><th>NEC</th><th>Nombres</th><th>Cedula</th><th>NO. AFILIADO</th><th>TIPO AFILIADO</th><th>TEL</th><th>DIRECCION</th><th>EMAIL</th>
</tr>
<tr>
<td style="width:17%;">
<?php
$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient_data as $pat)
 $num_af=$this->db->select('input_name')->where('patient_id',$pat->id_p_a )->where('input_name !=','')
 ->get('saveinput')->row('input_name');

if($pat->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat->ced1)
->where('SEQ_CED',$pat->ced2)
->where('VER_CED',$pat->ced3)
->get('fotos')->row('IMAGEN');
echo '<img style="width:130px;" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($pat->photo==""){
echo "No hay Foto";	
}
else{
	?>
<img  style="width:130px;" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat->photo; ?>"  />
<?php

}
?>
</td>
<td><?=$pat->nec1;?></td>
<td><!--<a target="_blank" href="<?php echo base_url("$controller/patient/$pat->id_p_a")?>" ><a>--><?=$pat->nombre?></td>
<td><?=$pat->cedula;?></td>
<td> <?php echo $num_af;?></td>
<td> <?php echo $pat->afiliado;?></td>
<td> <?=$pat->tel_cel?> / <?=$pat->tel_resi?></td>
 <td> <?=$pat->calle?>, <?=$pat->barrio?></td>
<td>   <?=$pat->email?></td>
 
</tr>

</table>


<div id="load_patient_citas"></div>
<br/><br/><br/><br/><br/><br/>
</div>

<script>
$(document).ready(function() {
	
load_patient_citas();
function load_patient_citas()
{
var id_p_a = "<?=$pat->id_p_a?>";
var id_user = "<?=$id_user?>";
var perfil = "<?=$perfil?>";
$("#load_patient_citas").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('emergency/load_patient_emergency')?>",
data: {id_p_a:id_p_a,id_user:<?=$id_user?>},
cache: true,
success:function(data){
$("#load_patient_citas").html(data);
  
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#load_patient_citas").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}




	
});
	


</script>