
<style>
 #fac { border-collapse: collapse; witdh:100%;font-size: 11px}
    .header-div, p, span { font-size: 11px }
    td { border-right: none; border-left: none;padding: 1em; }
  
</style>
<br/>


<table id='fac'>

<?php
$tot=0;
 $sqltp = "SELECT * FROM h_c_procedimiento_tarif  WHERE autoNomber=$id";
        $tarif_proced= $this->clinical_history->query($sqltp);
 foreach($tarif_proced->result() as $r)
{
$time = date("d-m-Y H:i:s", strtotime($r->time_created));

$fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$r->procedimiento)->get('tarifarios_test')->row_array();	

 if($r->precio){
	 $precio=$r->precio;
 }else{
	 $precio=$fac_val['monto'];
 }
 $tot += $precio;
 if (is_numeric($r->procedimiento)){
	 $procedimiento = $fac_val['procedimiento'] ;
 }else{
	 $procedimiento = $r->procedimiento; 
 }

?>
<tr>
<td><?=$procedimiento?></td>
<td>RD$<?=number_format($precio,2)?></td>
</tr>

<?php } ?>
<tr>
<td style='text-align:right'><strong>Total</strong> </td><td><strong>RD$<?=number_format($tot,2)?></strong></td>
</tr>

</table>


<br/><br/>
<div >
<table class='r-b' align="center" >
<tr>
<td style="text-align:center">
<?php

$sello='<td style="border:none"><img  style="width:160px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
$firma_doc="$id_user-1.png";

$signature = "assets/update/$firma_doc";
if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<div style="font-size:11px" ><strong>Firma autorizada y sello del medico</strong></div>
<br/><br/>
<?php $docInfo="Dr $author, Exeq. $exequatur, $especialidad";?>
<strong><?=$docInfo?></strong>
</td>
<?=$sello?>
</tr>

</table>
</div>
