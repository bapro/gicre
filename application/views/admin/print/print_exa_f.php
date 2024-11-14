<br/>

<?php

foreach($ExamFisById as $row)
?>

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
<td><?=$row->talla;?> m
<?php
if($row->pulgada_exf){
	echo " | $row->pulgada_exf inc";
}
 ?> 
 </td>
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


<table style="width:100%;font-size:13px;"  >

<tr >
<td style="text-align:right"><strong>Neurologico </strong></td>
<td><?=$row->neuro_s;?>  <?=$row->neuro_text?></td>
</tr>


<tr >
<td style="text-align:right"><strong>Cabeza </strong></td>
<td><?=$row->cabeza;?>  <?=$row->cabeza_text?></td>
</tr>



<tr >
<td style="text-align:right"><strong>Cuello </strong></td>
<td><?=$row->cabeza;?>  <?=$row->cuello_text?></td>
</tr>



<tr >
<td style="text-align:right"><strong>Abdomen Inspección </strong></td>
<td><strong>Forma</strong>: <?=$row->abd_insp;?> <br/>
<strong>Auscultación</strong>: <?=$row->ausc;?> <br/>
<strong>Percusión</strong> : <?=$row->perc?><br/>
<strong>Palpación</strong> : <?=$row->palpa?><br/>
<strong>Palpación</strong> : <?=$row->palpa?><br/>
</td>
</tr>


<tr >
<td style="text-align:right"><strong>Extremidades Superiores </strong></td>
<td><?=$row->ext_sup;?>  <?=$row->ext_sup_text?></td>
</tr>
</table>



<table style="width:100%;font-size:13px;"  >

<tr >
<td style="text-align:right"><strong>Normal </strong></td>
<td>Cuad. Inf. Externo <span><?=$row->cuad_inf_ext1?></span> </td>

<td style="text-align:right"><strong>Normal </strong></td>
<td>Cuad. Sup. Externo  <span><?=$row->cuad_inf_ext2?></span> </td>
</tr>


<tr >
<td style="text-align:right"><strong>Mama Izquierda </strong></td>
<td>Cuad. Sup. Externo <span><?=$row->mama_izq1?></span> </td>

<td style="text-align:right"><strong>Mama Derecha </strong></td>
<td>Cuad. Sup. Externo  <span><?=$row->mama_izq2?></span> </td>
</tr>



<tr >
<td style="text-align:right"><strong></strong></td>
<td>Cuad. Sup. Externo <span><?=$row->cuad_sup_ext1?></span> </td>

<td style="text-align:right"><strong></strong></td>
<td>Cuad. Sup. Externo  <span><?=$row->cuad_sup_ext2?></span> </td>
</tr>



<tr >
<td style="text-align:right"><strong></strong></td>
<td>Cuad. Inf. Externo <span><?=$row->cuad_inf_ext11?></span></td>

<td style="text-align:right"><strong></strong></td>
<td>Cuad. Inf. Externo  <span><?=$row->cuad_inf_ext22?></span></td>
</tr>


<tr >
<td style="text-align:right"><strong></strong></td>
<td>Region Retroareolar <span><?=$row->region_retro1?></span></td>

<td style="text-align:right"><strong></strong></td>
<td>Region Retroareolar  <span><?=$row->region_retro2?></span></td>
</tr>


<tr >
<td style="text-align:right"><strong></strong></td>
<td>Region Areola-Pezon <span><?=$row->region_areola_pezon1?></span></td>

<td style="text-align:right"><strong></strong></td>
<td>Region Areola-Pezon  <span><?=$row->region_areola_pezon2?></span></td>
</tr>



<tr >
<td style="text-align:right"><strong></strong></td>
<td>Region Axilar <span><?=$row->region_ax1?></span></td>

<td style="text-align:right"><strong></strong></td>
<td>Region Axilar  <span><?=$row->region_ax2?></span></td>
</tr>



<tr >
<td style="text-align:right"><strong>Torax: Corazón y pulmones</strong></td>
<td><?=$row->torax?> <span><?=$row->torax_text?></span></td>

<td style="text-align:right"><strong>Extremidades Inferiores</strong></td>
<td><?=$row->ext_inf?><span><?=$row->ext_inft?></span></td>
</tr>

</table>
<br/><br/>
<h4>Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual</h4>
<table style="width:100%">

<tr >
<td style="text-align:right"><strong>Especuloscopia</strong></td>
<td>
Si
<?php
if($row->especuloscopia =="Si"){
		        $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='especuloscopiaex' value='Si' $selected />";
?>

&nbsp; No&nbsp;
<?php
if($row->especuloscopia =="No"){
		        $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='especuloscopiaex' value='No' $selected />";
?>
</td>

<td style="text-align:right"><strong>Tacto Bimanual</strong></td>
<td>
Si
<?php
if($row->tacto_bima =="Si"){
		        $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='tacto_bimaex' value='Si' $selected />";
?>
 &nbsp; No
<?php
if($row->tacto_bima =="No"){
		        $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='tacto_bimaex' value='No' $selected />";
?>
</td>
</tr>


<tr >
<td style="text-align:right"><strong>Cervix</strong></td>
<td><?=$row->cervix?> <span><?=$row->cervix_text?></span></td>

<td style="text-align:right"><strong>Tacto rectal</strong></td>
<td><?=$row->rectal?><span><?=$row->rectal_text?></span></td>
</tr>

<tr >
<td style="text-align:right"><strong>Utero</strong></td>
<td><?=$row->utero_text?></td>

<td style="text-align:right"><strong>Genital masculino</strong></td>
<td><?=$row->genitalm?><span><?=$row->genitalm_text?></span></td>
</tr>



<tr >
<td style="text-align:right"><strong>Anexos</strong></td>
<td>Derecho: <?=$row->anexo_derecho_text?> - Izquerdo: <?=$row->anexo_iz_text?></td>

<td style="text-align:right"><strong>Genital femenino</strong></td>
<td><?=$row->genitalf?><span><?=$row->genitalf_text?></span></td>
</tr>




<tr >
<td style="text-align:right"><strong>Inspeccion Vulvar</strong></td>
<td><?=$row->inspection_vulval?><span><?=$row->inspection_vulval_text?></span></td>

<td style="text-align:right"><strong>Tacto vaginal</strong></td>
<td><?=$row->vagina?><span><?=$row->vagina_text?></span></td>
</tr>
</table>
