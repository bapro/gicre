
<?=$money_device?>
<?php

$i=1;
 foreach($billings as $rf){
	 
$crt1=$this->db->select('name')->where('id_user',$rf->created_by)->get('users')->row('name');
$updt1=$this->db->select('name')->where('id_user',$rf->updated_by)->get('users')->row('name');


 $inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));	 
	 
	 


if($centro_type=="privado") {
	
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios_test')->row('procedimiento');
	
} else {	 
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios_test')->row('sub_groupo');
}


 ?>
<tr class="align-middle">

<td style="width:330px;font-size:14px">
<?php
echo $service;
?>
<input type="hidden" class="each-factura-id" value="<?=$rf->idfac?>" />
</td>
<td>
<input type="text" class="form-control cantidad hide-fac-int form-control-sm" style="width:80px"  value='<?=$rf->cantidad?>' >
<span class="editSpan cantidad-n"><?=$rf->cantidad?></span>
</td>
<td>
<span class="editSpan preciouni-n"><?=$money_device?><?=$rf->preciouni?></span>

<div class="input-group input-group-sm hide-fac-int">
<span class="input-group-text" id="basic-addon2"><?=$money_device?></span>
<input type="text" class="form-control precio" aria-describedby="basic-addon2" value="<?=$rf->preciouni?>" onkeypress='return onlyfloat(event);'>
</div>

</td>
<td>
<span class="subtotal-n"><?=$money_device?><?=$rf->subtotal?></span>
<input type="hidden" class="form-control row-total"  aria-describedby="basic-addon3" value='<?=$rf->subtotal?>' >
<!--<div class="input-group input-group-sm hide-fac-int">
<span class="input-group-text" id="basic-addon3"><?=$money_device?></span> 
<input type="text" class="form-control row-total"  aria-describedby="basic-addon3" value='<?=$rf->subtotal?>' >

</div>-->
</td>

<?php if($seguro_id !=11){?>
<td >
<span class="editSpan descuento-n"><?=$money_device?><?=$rf->totalpaseg?></span>
<div class="input-group input-group-sm hide-fac-int">
<span class="input-group-text change-span-device" id="basic-addon4"><?=$money_device?></span>
<input type="text" class="form-control total-pag-seg"  aria-describedby="basic-addon4"  value='<?=$rf->totalpaseg?>' >

</div>
</td>
<?php } else{ ?>
<input type="hidden" class="form-control total-pag-seg" value="0.00">
<?php }  ?>

<td>
<span class="editSpan descuento-n"><?=$money_device?><?=$rf->descuento?></span>
<div class="input-group input-group-sm hide-fac-int">
<span class="input-group-text" id="basic-addon4"><?=$money_device?></span>
<input type="text" class="form-control descuento"  aria-describedby="basic-addon4" value='<?=$rf->descuento?>' onkeypress='return onlyfloat(event);'>
</div>

</td>
<td>
<span class="totpapat-n"><?=$money_device?><?=$rf->totpapat?></span>
<input type="hidden" class="form-control total-pag-pa" aria-describedby="basic-addon6" value="<?=$rf->totpapat?>">
<!--
<div class="input-group input-group-sm hide-fac-int">
<span class="input-group-text change-span-device" id="basic-addon6"><?=$money_device?></span>
<input type="text" class="form-control total-pag-pa" aria-describedby="basic-addon6" value="<?=$rf->totpapat?>">
</div>-->

</td>
<td><button class="btn btn-sm button_edit_tarifarios" type="button" id="<?=$rf->idfac?>" ><i class="bi bi-pencil text-success"></i> </button></td>
<td>

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
<tr style="background:#d5d370;font-size:14px" class="not-this-tr">

<th style="text-align:right">TOTAL</th>
<!--
<th><?=$cant?></th>
<th><?=$money_device?><?=$pun?></th>-->
<th></th>
<th></th>

<th><?=$money_device?><span id="table-grand-total" ><?=$sbt?></span></th>
<?php if($seguro_id !=11) {?>
<th><?=$money_device?><span id="seguro-grand-total"><?=$tps?></span></th>
<?php } ?>
<th><?=$money_device?><span id="descuento-grand-total"><?=$descu?></span></th>
<th><?=$money_device?><span id="tot-paciente-grand-total"><?=$tpat?></span></th>
<th colspan="3"></th>
</tr>

<script>
$("#show-num-fac").val(<?=$count?>);
$(".hide-fac-int").hide();

   $('.button_edit_tarifarios').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".button_edit_tarifarios").hide();

       
		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".hide-fac-int").show();
		

    });
	

</script>

