<!--<input id="filter" type="text">-->
<input id="doct_tarif" class="form-control" type="hidden" value="<?=$doct_tarif?>">
<input id="myInput" class="form-control" type="text" placeholder="Buscar Seguro...">

<?php

$perfil=$this->db->select('perfil')->where('id_user',$user_name)->get('users')->row('perfil');

foreach($seguro_doc_tarif_grouped as $do)
{
if($do->logo==""){
$seguro_logo="";
$mas="";

} else{
$seguro_logo='<img  width="70" class="mt-0" src="'.base_url().'/assets/img/seguros_medicos/'.$do->logo.'"  />';	
$mas='<i class="fa fa-plus" aria-hidden="true" title="Ver detalles"></i> Mas';	
}
if($do->id_seguro !=11){
?>

<ul class="list-unstyled mt-3 list-group">


<li class="list-group-item ">
<div class="flex align-items-center">
<i class="fa fa-square" style="font-size:8px"></i>
<?=$seguro_logo?>
<small class="p-1"><?php echo $do->title; ?></small>
</div>
</li>

  <li class="list-group-item"><strong>Plan</strong></li>
<?php
$sqlf ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlf);
foreach($queryp->result() as $row)
{
	
//$planname=$this->db->select('name')->where('id',$row->plan)->get('seguro_plan')->row('name');
$doc_segu_plan=$this->db->select('id,plan')->where('id_seguro',$do->id_seguro)->where('id_doctor',$do->id_doctor)->where('plan',$row->id)
->get('codigo_contrato')->row_array();

if(isset($doc_segu_plan['plan'])){
$chk='<i class="fa fa-check-circle"></i>';
$id=$doc_segu_plan['plan']."-".$do->id_seguro;	
$color='';
$point='';
$class='get-this-seguro-plan text-primary text-decoration-none';	

}else{
	$color='red';
	$chk='<i class="fa fa-times"></i>';
	$id=$do->id_seguro;
	$class='get-this-seguro text-danger text-decoration-none';
}

?>	
<li  class="ps-4 list-group-item"><a  id="<?=$id?>" title="Mostrar los tarifarios <?=$id?>-<?=$do->id_seguro?>" style='cursor:pointer;color:<?=$color?>;' class="<?=$class?>"><small><?=$chk?> <?=$row->name?></small> <span class='find-plan-id' style='display:none'><?=$row->id?></span></a></li>

<?php
}	


?>

</ul>
<?php

}else{
?>


<!--<p style='color:red'><em>Estamos trabajando, esta parte un momento par favor..</em></p>-->
<ul class="list-unstyled mt-3 list-group">

<li class="list-group-item ">
<div class="flex align-items-center">
<i class="fa fa-square" style="font-size:8px"></i>
<small class="p-1">SEGURO <?php echo $do->title; ?></small>
</div>
</li>
<?php
$sqlct ="SELECT id_centro from doctor_agenda_test where id_doctor=$do->id_doctor group by id_centro";
$queryct = $this->db->query($sqlct);
foreach($queryct->result() as $rowct)
{
$centro_as=$this->db->select('centro_medico')->where('id_doctor',$user_name)->get('doctor_centro_medico')->row('centro_medico');
$centro_plan=$this->db->select('id,plan')->where('id_doctor',$do->id_doctor)->where('id_seguro',$do->id_seguro)->where('plan',$rowct->id_centro)->get('codigo_contrato')->row_array(); 
$centro_name=$this->db->select('name')->where('id_m_c',$rowct->id_centro)->get('medical_centers')->row('name'); 
//if($centro_plan !=NULL){
if($rowct->id_centro==$centro_plan['plan']){
//$idc=$centro_plan['id'];

$idc=$centro_plan['plan']."-".$do->id_seguro;	


$chk='<i class="fa fa-check-circle"></i>';
$color='';
$class='get-this-seguro-plan';	
}else{
$chk='<i class="fa fa-times" aria-hidden="true" ></i>';
$color='red';
$class='get-this-seguro';
$idc=$do->id_sm;
}

if($centro_as !=$rowct->id_centro && $USER_PERFIL=='Asistente Medico'){
	$show_centro_as='none';
}else{
$show_centro_as='';	

}
?>	
<li class="ps-4 list-group-item" ><a  id="<?=$idc?>" title="Mostrar los tarifarios <?=$do->id_seguro?>" style='cursor:pointer;color:<?=$color?>;text-transform:lowercase' class='<?=$class?>'><?=$chk?> <?=$centro_name?> <span class='find-plan-id' style='display:none'><?=$rowct->id_centro?></span> </a></li>

<?php
//}
//echo "id:". $centro_plan['id']; echo "<br/>"; echo $centro_plan['plan'];echo "<br/><hr/>";
//echo $do->id_doctor; echo "<br/>"; echo $do->id_seguro; echo "<br/>"; echo $rowct->id_centro;
}	


?>

</ul>
<?php
}



}

?>

<script>

//=======================================================================================

 $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });










//=======================================================================================







</script>