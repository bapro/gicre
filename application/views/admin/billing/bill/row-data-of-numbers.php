<?php if($perfil=="Admin"){$controller="admin";} else {$controller="medico";} ?>
<div class="col-sm-12 showdown searchb" style="text-align:center">

<div style="overflow-x:auto" >
<span style="font-size:14px;color:green"><i>resultados (<?=$now?> segundos)</i></span>
<table class="table" style="border-bottom:1px solid #38a7bb">
<tr>
<td style="width:20%">
<?php
$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient_data as $pat)
 $num_af=$this->db->select('input_name')->where('patient_id',$pat->id_p_a )
 ->get('saveinput')->row('input_name');

if($pat->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat->ced1)
->where('SEQ_CED',$pat->ced2)
->where('VER_CED',$pat->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="170"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($pat->photo==""){
	
}
else{
	?>
<img  width="170" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat->photo; ?>"  />
<?php

}
?>
</td>
<td>
<table >
<tr><td><strong>Nombres</strong> <a target="_blank" href="<?php echo base_url("$controller/patient/$pat->id_p_a")?>" ><?=$pat->nombre?><a></td></tr>
<tr><td><strong>Cedula</strong> <?=$pat->cedula;?></td></tr>
<tr><td><strong>NO. AFILIADO</strong> <?php echo $num_af;?></td></tr>
<tr><td><strong>TIPO AFILIADO</strong> <?php echo $pat->afiliado;?></td></tr>
<tr><td><strong>TEL.</strong> <?=$pat->tel_cel?> / <?=$pat->tel_resi?></td></tr>
<tr><td><strong>DIRECCION</strong> <?=$pat->calle?>, <?=$pat->barrio?></td></tr>
<tr><td><strong>EMAIL</strong> <?=$pat->email?></td></tr>
<tr><td><strong>CITAS</strong> <span style='color:green'><?=$count?></span></td></tr>
<tr></tr>
</table>
</td>
</tr>
</table>
<button style="display:none;float:right" class="btn-sm btn-primary refresh-fac" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>

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
var controller = "<?=$controller?>";
$("#load_patient_citas").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/load_patient_citas')?>",
data: {id_p_a:id_p_a,id_user:id_user,controller:controller},
cache: true,
success:function(data){
$("#load_patient_citas").html(data);
  
} 
});
}	
	


$(".refresh-fac").click(function(){
load_patient_citas();	
});	
   

$('#center-it').DataTable( {
"language": {
"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
},
"aaSorting": [ [0,'desc'] ],

} );
} );


</script>