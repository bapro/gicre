<!--<input id="filter" type="text">-->
<input id="myInput" class="form-control" type="text" placeholder="Buscar Seguro...">
<table>
<tbody id="myTable">
<?php

$perfil=$this->db->select('perfil')->where('id_user',$user_name)->get('users')->row('perfil');

foreach($seguro_doc_tarif_grouped as $do)
{
if($do->logo==""){
$seguro_logo="";
$mas="";

} else{
$seguro_logo='<img  style="width:60px;" src="'.base_url().'/assets/img/seguros_medicos/'.$do->logo.'"  />';	
$mas='<i class="fa fa-plus" aria-hidden="true" title="Ver detalles"></i> Mas';	
}
if($do->id_seguro !=11){
?>

<tr>
<td style='font-size:12px'>
<!--<p style='text-transform:uppercase;text-align:left;font-zise:12px'><?=$i;$i++;?>- <?php echo $seguro_logo; ?> <?=$do->title?> -<a id="<?=$do->id_sm?>" title="Mostrar los tarifarios" href="" class="get-this-seguro"> <?php echo $seguro_logo; ?> <?=$do->title?></a> - <a data-toggle="modal" data-target="#EditSeguroMedico" title="Ver los detalles sobre <?=$do->title?>" href="<?php echo base_url('admin/EditSeguroMedico/'.$do->id_sm)?>"><?=$mas?></a></p>-->
<p style='text-transform:uppercase;text-align:left;' title='<?=$do->title?>'><i class='fa fa-square' style="font-size:8px"></i> <?php echo $seguro_logo; ?> <span style='font-size:10px'><?=$do->title?></span></p>
Plan
<ul>
<?php
$sqlf ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlf);
foreach($queryp->result() as $row)
{
	
//$planname=$this->db->select('name')->where('id',$row->plan)->get('seguro_plan')->row('name');
$doc_segu_plan=$this->db->select('id,plan')->where('id_seguro',$do->id_seguro)->where('id_doctor',$do->id_doctor)->where('plan',$row->id)
->get('codigo_contrato')->row_array();
if($row->id==$doc_segu_plan['plan']){
$chk='<i class="fa fa-check-circle"></i>';
$id=$doc_segu_plan['id'];	
$color='';
$point='';
$class='get-this-seguro-plan';	
}else{
	$color='red';
	$chk='<i class="fa fa-times" aria-hidden="true" ></i>';
	$id=$do->id_seguro;
	$class='get-this-seguro';
}
?>	
<li  style='list-style-type: none;'><a  id="<?=$id?>" title="Mostrar los tarifarios <?=$id?>" style='cursor:pointer;color:<?=$color?>;' class="<?=$class?>"><?=$chk?> <?=$row->name?> <span class='find-plan-id' style='display:none'><?=$row->id?></span></a></li>

<?php
}	


?>

</ul>
<?php

}else{
?>
<p style='text-transform:uppercase;text-align:left;font-zise:9px'><?=$do->title?></p>
Centro(s)
<!--<p style='color:red'><em>Estamos trabajando, esta parte un momento par favor..</em></p>-->
<ul  style='font-size:12px'>
<?php
$sqlct ="SELECT id_centro from doctor_agenda_test where id_doctor=$do->id_doctor group by id_centro";
$queryct = $this->db->query($sqlct);
foreach($queryct->result() as $rowct)
{
$centro_as=$this->db->select('centro_medico')->where('id_doctor',$user_name)->get('doctor_centro_medico')->row('centro_medico');
$centro_plan=$this->db->select('id,plan')->where('id_doctor',$do->id_doctor)->where('id_seguro',$do->id_seguro)->where('plan',$rowct->id_centro)->get('codigo_contrato')->row_array(); 
$centro_name=$this->db->select('name')->where('id_m_c',$rowct->id_centro)->get('medical_centers')->row('name'); 
if($rowct->id_centro==$centro_plan['plan']){
$idc=$centro_plan['id'];
$chk='<i class="fa fa-check-circle"></i>';
$color='';
$class='get-this-seguro-plan';	
}else{
$chk='<i class="fa fa-times" aria-hidden="true" ></i>';
$color='red';
$class='get-this-seguro';
$idc=$do->id_sm;
}

if($centro_as !=$rowct->id_centro && $perfil=='Asistente Medico'){
	$show_centro_as='none';
}else{
$show_centro_as='';	

}
?>	
<li  style='list-style-type: none;display:'><a  id="<?=$idc?>" title="Mostrar los tarifarios" style='cursor:pointer;color:<?=$color?>;text-transform:lowercase' class='<?=$class?>'><?=$chk?><?=$centro_name?> <span class='find-plan-id' style='display:none'><?=$rowct->id_centro?></span> </a></li>

<?php
//echo "id:". $centro_plan['id']; echo "<br/>"; echo $centro_plan['plan'];echo "<br/><hr/>";
//echo $do->id_doctor; echo "<br/>"; echo $do->id_seguro; echo "<br/>"; echo $rowct->id_centro;
}	


?>

</ul>
<?php
}

?>
</td>
</tr>
<?php

}

?>
</tbody>
</table>
<script>

//=======================================================================================

 $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });



$('.get-this-seguro-plan').click(function(){
var id = $(this).attr('id');

$("#show_other").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var user = <?=$user_name?>;
var id_doctor = <?=$do->id_doctor?>;
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/seguro_plan_tarif')?>",
data: {id:id,id_doctor:id_doctor,user:user},
 success:function(data){
 
 $('#show_other').html(data);

/*var x = $("#go_up").position(); //gets the position of the div element...
window.scrollTo(x.left, x.top);*/
},

});

});






//=======================================================================================
$('.get-this-seguro').click(function(){
var id_seguro = $(this).attr('id');

var idPlan=$(this).find('span.find-plan-id').text();

launchMe(id_seguro,idPlan);

});



function launchMe(id_seguro,idPlan){
$("#show_other").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var id_doctor = <?=$do->id_doctor?>;
var user = <?=$user_name?>;

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/seguro_tarif_sin_plan')?>",
data: {id_seguro:id_seguro,id_doctor:id_doctor,user:user,idPlan:idPlan},
 success:function(data){
 
 $('#show_other').html(data);
},
 
});
}






</script>