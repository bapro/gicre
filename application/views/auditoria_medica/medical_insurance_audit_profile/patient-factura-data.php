
<table  class="table"  style="font-size:12px" width="100%;" border="0">
<tr style="background:#38a7bb;color:white">
<th>FOTO</th>
<th>PACIENTE</th>
<th class="col-xs-1">CEDULA</th>
<th >NSS</th>
<th >PLAN</th>
<th class="col-xs-1" >TIPO DE AFILIADO</th>
<th class="col-xs-1" >NO. AUTORIZACION</th>
<th class="col-xs-2" >AUTORIAZADO POR</th>
<th class="col-xs-2" >MONTO</th>
<th class="col-xs-1" >PROCEDIMIENTO </th>

</tr>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
 foreach($patient_factura_data as $row)

{
//$pat_id=$this->db->select('paciente')->where('codigoprestado',$row->codigoprestado)
//->get('factura2')->row_array();
 $paciente=$this->db->select('id_p_a,nombre,cedula,afiliado,plan,photo,ced1,ced2,ced3')->where('id_p_a',$row->paciente)
->get('patients_appointments')->row_array();

 $nss=$this->db->select('inputf')->where('patient_id',$row->paciente)
->get('saveinput')->row('inputf');

$seguron=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');

$id_pro=$this->db->select('service')->where('id2',$row->idfacc)->get('factura')->row('service');
$procedimiento=$this->db->select('procedimiento')->where('id_tarif',$id_pro)->get('tarifarios')->row('procedimiento');

$causa=$this->db->select('causa')->where('patient',$row->paciente)->get('medical_insurance_audit_profile')->row('causa');



if ( $row->validate==1 ) {

$colorBg = "#B2FB9B";

} 
else {

$colorBg = "white";
}
?>
<tr bgcolor="<?=$colorBg ;?>" id="find-tot">
<td>
<?php

if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="50" height="50"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>
</td>
<td style="text-transform:uppercase"><?=$paciente['nombre'];?></td>
<td><?=$paciente['cedula'];?></td>
<td><?=$nss?></td>
<td><?=$paciente['plan'];?></td>
<td><?=$paciente['afiliado'];?></td>
<td style="color:red"><?=$row->numauto;?><input type="hidden" value="<?=$row->numauto?>"/></td>
<td style="text-transform:uppercase"><?=$row->autopor;?></td>
<td class="get_totp_patient">RD$ <?=number_format("$row->totpagseg",2)?></td>
<td>
<span id="loadit2"></span>

<?php if ( $row->validate==1) {
echo $procedimiento;
}
	else {
	?>
 <a class="get-this-one" id="<?=$row->idfacc?>"  style="cursor:pointer"  ><?=$procedimiento;?></a>
<?php } ?>
</td>

</td>
</tr>
<?php
}

?>
   
</table>
<?php
$condition = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "'";
$query_citas=$this->db->select('validate')->where($condition)->where('medico',$medico)->where('validate',0)
->get('factura2');
$rsut= $query_citas->num_rows();

if($rsut==0){
?>
<form target="_blank" method="get" action="<?php echo base_url("auditoria_medica/medical_insurance_audit_profile_print_view")?>" >
<input type="hidden"  name ="desde" value = "<?=$desde?>"/>
<input type="hidden" name ="hasta" value = "<?=$hasta?>"/>
<input type="hidden" name ="medico" value = "<?=$medico?>"/>
<button class="btn btn-primary btn-sm" type="submit" class="generate-report">Generar Reporte</button>
</form>
<?php
}
?>
<script>
$('.get-this-one').click(function() {
var y = $(window).scrollTop();
 $('html, body').animate({ scrollTop: y + 450 });
$("#get_patient_historial").fadeIn().html('<span class="load" style="position:absolute"><img style="width:30px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var get_id_fac = $(this).attr('id');
var procedimiento = $(this).text();
$('.show-validation').show();
var dess ="<?=$desde?>"; 
var hass ="<?=$hasta?>";
var medico = "<?=$medico?>";
$.get( "<?php echo base_url();?>auditoria_medica/get_patient_historial?get_id_fac="+get_id_fac+"&dess="+dess+"&hass="+hass+"&medico="+medico+"&procedimiento="+procedimiento, function( data ){
//$("#loadit2").hide();
$("#get_patient_historial").html( data ); 
}); 
 
});
</script>
