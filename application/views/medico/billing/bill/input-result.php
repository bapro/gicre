<style>
table, th, td {
   font-size:14px
}
#center-it td  {
text-align:left; 
    vertical-align:left;
  }
.loadf {
position: fixed; /* or absolute */
top: 50%;
left: 50%;
z-index:900000
}
span.load {
font-size:90px;
}
.glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg);}
    to { -webkit-transform: rotate(360deg);}
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg);}
    to { transform: scale(1) rotate(360deg);}
}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}
td.shrink {
  white-space: nowrap;
  width: 1px;
}

</style>
<div class="tab-content " >
<?php
 if(!empty($necpatient ))  
{ 


?>
<div class="col-sm-12 tab-content showdown searchb" id="hide1">
<div style="overflow-x:auto" >
<span style="font-size:14px;color:green"><i><?=$co?> resultados (<?=$now?> segundos)</i></span>
<table class="table fixed" align="center" id="center-it" style="font-size:10px;background:#E0E5E6;" >
<tr style="background:#38a7bb;color:white">
<th>FOTO</th>
<th class="col-xs-3">NOMBRES</th>
<th>CEDULA</th>
<th>NEC</th>
<th>NO. AFILIADO</th>
<th>TIPO AFILIADO</th>
<th class="col-xs-4">TEL.</th>
<th >DIRECCION</th>
<th style="width:4px">EMAIL</th>
<th>CITAS</th>

</tr>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";
foreach($necpatient as $row)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E8F6F9";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}

$nec=$this->db->select('nec')->where('id_patient',$row->id_p_a )
 ->get('rendez_vous')->row('nec');
 $num_af=$this->db->select('input_name')->where('patient_id',$row->id_p_a )
 ->get('saveinput')->row('input_name');
//$cantidad_citas=$this->db->select('id_patient')->where('id_patient',$row->id_p_a)->get('rendez_vous');
$id_user=$this->session->userdata['medico_id'];
$sql ="SELECT id_patient FROM rendez_vous where id_patient= $row->id_p_a && doctor=$id_user";
$cantidad_citas = $this->db->query($sql);







 
?>

<tr bgcolor="<?=$colorBg?>">
<td>
<?php

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($row->photo==""){
	
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
</td>
<td  style="text-transform:uppercase;cursor:pointer"><?=$row->nombre;?>    </td>
<td ><?=$row->cedula;?></td>
<td ><?=$nec;?></td>
<td id="num_af"><?php echo $num_af;?></td>
<td id="tipoaf"><?php echo $row->afiliado;?></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>
<td id="id_user" style="display:none"><?=$id_user?></td>
<td ><button class="btn btn-primary btn-xs get-citas" id="<?=$row->id_p_a;?>" ><?=$cantidad_citas->num_rows();?></button></td>

</tr>

<?php
}
?>
</table>
</div>
</div>


</div>
<div  id="data_of_number_of_patients_citas"></div>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:20%">Paciente no encontrado</i> '; 
}	
?>
<script>

$('.get-citas').click(function() {
var id_p_a = $(this).attr('id');
var cita_number = $(this).text();
$('html, body').animate({ scrollTop: $(document).height() }, 425);


$("#data_of_number_of_patients_citas").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');


$.ajax({
type: "POST",
url: "<?=base_url('medico/data_of_number_of_patients_citas')?>",
data: {id_p_a:id_p_a,cita_number:cita_number},
cache: true,
success:function(data){
$("#hide1").slideUp();
$("#data_of_number_of_patients_citas").html(data);
   
} 
});

return false;
});


</script>

 