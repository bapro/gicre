
<style>
 #fac { border-collapse: collapse; witdh:100%;font-size: 11px}
    .header-div, p, span { font-size: 11px }
    td { border-right: none; border-left: none;padding: 1em; }
  
</style>
<br/>
<?php

 if($id_cd >0){
foreach($print_cond as $row)
 ?>
<div class="header-div"><strong>SIGNOPSIS</strong> </div>
<span><?=$signopsis?></span>

<?php
$queryo = $this->db->query("SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia");
$rowone = $queryo->row_array();;
if($rowone['diagno_def'] !=""){
?>

<div class="header-div"><strong>CONCLUSION DIAGNOSTICA </strong> </div>

<?php
$sql ="SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia";
$query = $this->db->query($sql);
$i = 1;
foreach($query->result() as $dr){

$diagno_def=$this->db->select('description')
->where('idd',$dr->diagno_def)
->get('cied')->row('description');
?>
<span><?php echo $i;$i++;?>-<?=$diagno_def;?></span>
<br/><br/>
<?php
}

}

if($otros_diagnos !=""){?>

<div class="header-div"><strong>OTRO DIAGNOSTICO</strong> </div>

<span><?=$otros_diagnos?></span>
<br/><br/>
<?php
}
 }else{
$conclucion_diag=$this->db->select('conclucion_diag')->where('autoNomber',$id)->where('id_cd',0)->get('h_c_procedimiento_tarif')->row('conclucion_diag');
?>
<div class="header-div"><strong>CONCLUSION DIAGNOSTICA </strong> </div>

<span><?=$conclucion_diag?></span>
<?php	 
	 
 }

 if($tarif_proced->result() !=NULL)
{?>

<table id='fac'>

<?php
$tot=0;
 foreach($tarif_proced->result() as $r)
{
$time = date("d-m-Y H:i:s", strtotime($r->time_created));
if($id_cd >0){
 $fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$r->id_tarif)->get('tarifarios')->row_array();
}else{
$fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$r->procedimiento)->get('tarifarios')->row_array();	
}
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
<?php } ?>

<br/><br/>
<div >
<table class='r-b' align="center" >
<tr>
<td style="text-align:center">
<?php
$firma_doc="$id_doc-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}

$sello_doc=$this->db->select('sello')->where('doc',$id_doc)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}


?>
<hr />
<div style="font-size:11px" title="sdfsdf"><strong>Firma autorizada y sello del medico</strong></div>
<br/><br/>
<strong><?=$docInfo?></strong>
</td>
<?=$sello?>
</tr>

</table>
</div>
