<hr/>
<?php

foreach($print_cond as $row)

	?>

<table style="width:90%;font-size:13px;" class="r-b" >

<?php
$queryo = $this->db->query("SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia");
$rowone = $queryo->row_array();;
if($rowone['diagno_def'] !=""){
?>
<tr >
<td><strong>Diagnostico(s) Presuntivo o Definitivo (CIE10) </strong></td>
</tr>
<tr>
<td>
<?php
$sql ="SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia";
$query = $this->db->query($sql);
$i = 1;
foreach($query->result() as $dr){

$diagno_def=$this->db->select('description')
->where('idd',$dr->diagno_def)
->get('cied')->row('description');

echo $i;
$i++;
?>-<?=$diagno_def;?><br/>
<?php
}
?>


</td>
</tr>
<?php
}

if($otros_diagnos !=""){?>
<tr>
<td><strong>OTRO DIAGNOSTICO</strong></td>
</tr>
<tr>
<td><?=$otros_diagnos?></td>
</tr>
<?php
}

?>

<tr >
<td><strong>PLAN </strong></td>
</tr>
<tr>
<td><?=nl2br($row->plan);?></td>
</tr>
<?php
if($procedimiento !=""){
?>
<tr >
<td><strong>PROCEDIMIENTO</strong>
</td>
</tr>
<tr>
<td>
<?=nl2br($procedimiento) ;?>
</td>
</tr>
<?php }
if($row->evolucion !=""){
?>
<tr >
<td><strong>Evolucion (Paciente subsecuente) </strong></td>
</tr>
<tr>
<td><?=$row->evolucion;?></td>
</tr>
<?php
}
?>
<tr >
<td><strong>ESTADO </strong></td>
</tr>
<tr>
<td>
<?php
if($row->conclusion_radio =="Mejoria"){
		$selected="checked='checked'";
		}
		else
		{
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Mejoria' $selected /> Mejoria";
echo "<br/>";

if($row->conclusion_radio =="Empeorando"){
		       $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Empeorando' $selected /> Empeorando";
echo "<br/>";

	if($row->conclusion_radio =="No mejoria"){
		    $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='No mejoria' $selected /> No mejoria";


	?>


</td>
</tr>
</table>



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
</tr>
</table>
</div>
