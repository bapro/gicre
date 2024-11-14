<?php
$i=1;
 foreach($billings as $rf){
	 
$crt1=$this->db->select('name')->where('id_user',$rf->created_by)->get('users')->row('name');
$updt1=$this->db->select('name')->where('id_user',$rf->updated_by)->get('users')->row('name');


 $inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));	 
	 
	 
	 
//if($identificar=="privado") {
	
//$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
	
//} else {	 
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
//}
 ?>
<tr>

<td style="width:330px;font-size:14px">
<?php
echo $service;
?>

</td>
<td>
<?=$rf->cantidad?>
</td>
<td>
RD$ <?=$rf->preciouni?>

</td>
<td>
RD$ <?=$rf->subtotal?>

</td>
<td>
RD$ <?=$rf->totalpaseg?>

</td>
<td>
RD$ <?=$rf->descuento?>

</td>
<td>
RD$ <?=$rf->totpapat?>

</td>
<td><button class="btn btn-sm button_edit_tarifarios" type="button" id="<?=$rf->idfac?>" ><i class="fa fa-pencil"></i> </button></td>
<td>
<button type="button" class="btn btn-sm  button_delete_tarifarios" id="<?=$rf->idfac?>"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" ><i class="bi bi-trash text-danger"></i></button>
</td>
<td><i class="fa fa-info-circle" title="Creado por <?=$crt1?> (<?=$inserted_time?>) &#013 Modificado por <?=$updt1?> (<?=$updated_time?>) "></i> </td>

</tr>
<?php
 }
 
 $this->db->select("SUM(cantidad) as cant");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$cant=$this->db->get()->row()->cant;
//----------------------------------------------
  $this->db->select("SUM(preciouni) as pu");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$pu=$this->db->get()->row()->pu;
$pun=number_format($pu,2);

//-----------------------------------------------

$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;
$sbt=number_format($sbt,2);


//-----------------------------------------------

$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;
$tps=number_format($tps,2);

//-----------------------------------------------

$this->db->select("SUM(descuento) as descu");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$descu=$this->db->get()->row()->descu;
$descu=number_format($descu,2);


//-----------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);
 ?>
<tr style="background:#d5d370;font-size:14px">
<th style="text-align:right">TOTAL</th>
<th><?=$cant?></th><th>RD$ <?=$pun?></th><th>RD$ <?=$sbt?></th><th>RD$ <?=$tps?></th><th>RD$ <?=$descu?></th><th>RD$ <?=$tpat?></th><th colspan="3"></th>
</tr>

<script>
$("#show-num-fac").html(<?=$count?> +" factura(s)");
</script>

