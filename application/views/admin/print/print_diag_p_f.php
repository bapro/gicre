
<style>
 #fac { border-collapse: collapse; witdh:100%;font-size: 11px}
    p { font-size: 11px }
    td { border-right: none; border-left: none;padding: 1em; }
  
</style>

<?php

foreach($print_cond as $row)
$sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

$queryo = $this->db->query("SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia");
$rowone = $queryo->row_array();;
if($rowone['diagno_def'] !=""){
?>

<h5>CONCLUCION DIAGNOSTICA </h5>

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
<p><?php echo $i;$i++;?>-<?=$diagno_def;?><p/>
<?php
}

}

if($otros_diagnos !=""){?>

<h5>OTRO DIAGNOSTICO</h5>

<p><?=$otros_diagnos?></p>

<?php
}


 if($tarif_proced->result() !=NULL)
{?>
<br/></br>
<h5>COTIZACION DE PROCEDIMENTOS</h5>
<table id='fac'>

<?php
$tot=0;
 foreach($tarif_proced->result() as $r)
{
$time = date("d-m-Y H:i:s", strtotime($r->time_created));
 $fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$r->id_tarif)->get('tarifarios')->row_array();
 $tot += $fac_val['monto'];
?>
<tr>
<td><?=$fac_val['procedimiento']?></td>
<td>RD$<?=number_format($fac_val['monto'],2)?></td>
</tr>

<?php } ?>
<tr>
<td style='text-align:right'><strong>Total</strong> </td><td><strong>RD$<?=number_format($tot,2)?></strong></td>
</tr>

</table>
<?php } ?>

<br/>
<div class="footer-firma">
<table class='r-b' align="center" >
<tr>
<td style="text-align:center">
<?php
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<span style="font-size:11px" title="sdfsdf"><strong>Firma autorizada y sello del medico</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>
