<div style="overflow-x:auto" >
<table class="table fixed" align="center" id="center-it" style="font-size:10px;background:#E0E5E6;" >
<tr style="background:#38a7bb;color:white">
<th>#</th>
<th>CENTRO MEDICO</th>
<th> MEDICO</th>
<th> ARS</th>
<th>FECHA PROPUESTA</th>

</tr>
<?php
$cpt="";
$i = 1;
foreach($citas as $row_citas)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E8F6F9";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_citas->id_patient)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$is_billed=$this->db->select('id_rdv,idfacc')->where('id_rdv',$row_citas->id_apoint)->get('factura2')->row_array();
$idfacc=$is_billed['idfacc'];


$centro=$this->db->select('name,type')->where('id_m_c',$row_citas->centro )->get('medical_centers')->row_array();
$medico=$this->db->select('name')->where('id_user',$row_citas->doctor)->get('users')->row('name');
$type=$centro["type"];
?>

<tr bgcolor="<?=$colorBg?>">
<td class="numero"><?php echo $i; $i++;?></td>
<?php if($is_billed["id_rdv"]==0) 
{
?>
<td>
<?php echo $centro["name"];?> <strong>(<?php echo $centro["type"];?>)</strong> <button class="btn btn-primary btn-xs facturar" id="<?=$row_citas->id_apoint;?>" ><span style="display:none"><?php echo $centro["type"];?></span>Facturar</button>
</td>
<?php
} else {
?>
<td>
<?php echo $centro["name"];?> 

<strong>(<?php echo $centro["type"];?>)</strong> <a target="_blank" href="<?php echo base_url("medico/bill/$idfacc/$type")?>">VER FACTURA</a></td>
<?php
} 
?>
<td><?php echo $medico;?></td>
<td><?php echo $seguro_title;?></td>
<td  style="display:none"></td>
<td  class="id-seguro"  style="display:none"><?php echo $seguro_medico;?></td>
<td><?php echo $row_citas->fecha_propuesta;?> </td>

</tr>

<?php
}
?>
</table>
</div>

<script>

//decite what to bill medico or centro

$('.facturar').click(function() {
	//$('html, body').animate({ scrollTop: $(document).height() }, 425);
$("#factura_patient_nombres").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var id = $(this).attr('id');
var seg_id= $(this).closest("tr").find(".id-seguro").text();
var ident = $(this).text();
var numero =$(this).parent().siblings(":first").text();
$.ajax({
type: "POST",
url: "<?=base_url('medico/get_patient_for_billing')?>",
data: {id:id,ident:ident,seg_id:seg_id,numero:numero},
cache: true,
success:function(data){
$("#hide2").slideUp();	
$("#factura_patient_nombres").html(data);
  
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#factura_patient_nombres').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});

return false;
});
</script>