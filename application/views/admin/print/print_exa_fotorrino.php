<br/>
<?php

 foreach($show_exam_ot_by_id->result() as $rows)
?>
<table style="font-size:13px;width:100%"  >

<tr >
<td style="text-align:right"><strong>Oido Izquerdo :</strong></td>
<td><?=nl2br($rows->oido1);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Oido Derecho :</strong></td>
<td><?=nl2br($rows->oido2);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Nariz :</strong></td>
<td><?=nl2br($rows->nariz);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Boca :</strong></td>
<td><?=nl2br($rows->boca);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Cuello  :</strong></td>
<td><?=$rows->otorrino_cuello1;?><br/><?=nl2br($rows->otorrino_cuello2);?></td>
</tr>
</table>
<?php
if($ExamFisById !=NULL){
foreach($ExamFisById as $row)
?>
<br/><br/>
<table class="table" style="width:100%;font-size:13px" border="1">
<tr style="background:rgb(192,192,192);color:white;border-bottom:none">
<td style="text-align:center" colspan="4"><strong>Signos vitales</strong></td>

<td colspan="2" style="text-align:center;"><strong>Aspecto General</strong></td>
</tr>

<tr>
<td style="color:white;border:none" colspan="3"></td>

<td colspan="2"  style="text-align:center;border-top:none;border-bottom:none"></td>
</tr>
<tr>
<td style="text-align:right"><strong>Peso </strong></td>
<td><?=$row->peso;?> lb</td>
<td><?=$row->kg;?> kg</td>

<td colspan="2" style="text-align:CENTER"><strong>Tension arterial</strong><br/><?=$row->ta;?> mm / <?=$row->hg;?> hg</td>
<td >

<?php
if($row->radio =="SANO"){
		       $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO' $selected /> sano";
?>

</td>
</tr>

<tr>
<td style="text-align:right"><strong>Talla </strong></td>
<td><?=$row->talla;?></td>
<td><strong>Fr</strong> <?=$row->fr;?></td>
<td colspan="2"><strong>Tempo.</strong> <?=$row->tempo;?> &#8451 </td>
<td >
<?php
if($row->radio =="AGUDAMENTE ENFERMA"){
		      $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA' $selected /> agudamente enferma";
?></td>
</tr>


<tr>
<td style="text-align:right"><strong>IMC </strong></td>
<td><?=$row->imc;?></td>
<td><strong>Fc</strong> <?=$row->fc;?></td>
<td colspan="2"><strong>Pulso.</strong> <?=$row->pulso;?> PM </td>
<td >
<?php
if($row->radio =="CRONICAMENTE ENFERMA"){
		      $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' $selected /> cronicamente enferma";
?></td>
</tr>
</table>

<?php
}
?>



