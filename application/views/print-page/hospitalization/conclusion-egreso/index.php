<div class='hr'>
<?php  
 foreach ($query->result() as $row)	
 if ($row->diagnostico_autopsia ==''){
	$autopsia="";
	}
	else
	{
	$autopsia="autopsia";
	}
 ?>
<table class='r-b'  >

<tr>
<td  style="text-align:left"><strong>Resumen de los hallazgos:</strong> <?=$row->resumen_hallasgos;?>
 </td>
</tr>

<tr>
<td  style="text-align:left"><strong>Resumen de la intervenciones:</strong> <?=$row->resumen_intervenciones;?>
</td>
</tr>

<tr>
<td  style="text-align:left"><strong>Condición de alta:</strong> <?=$row->condicion_alta;?>
</td>
</tr>

<tr>
<td  style="text-align:left"><strong>Causa de egreso:</strong> <?=$row->causa_egreso;?>
</td>
</tr>

<tr>
<td  style="text-align:left"><strong>Destino/Referimiento:</strong> <?=$row->destino_referimiento;?>
</td>
</tr>
<?php if($autopsia=="autopsia"){ ?>
<tr>
<td  style="text-align:left"><strong>Diagnostico de autopsia:</strong> <?=$autopsia?> <?=$row->diagnostico_autopsia;?>
</td>
</tr>
<?php } ?>

<tr>
<td  style="text-align:left">

<?php
   if ($row->infeccion_herida ==1){
	echo "<strong>Infección Herida</strong>";
	}
	
	if ($row->morta_post ==1){
	echo ", <strong>Mortalidad Postoperatoria (10 D)</strong>";
	}
	
	  if ($row->morta_int ==1){
	
	echo ", <strong>Mortalidad Intraoperatoria (6 hr)</strong>.";
	}
 ?>

</td>
</tr>

<tr>
<td  style="text-align:left"><strong>Diagnóstico(s):</strong> <?=$autopsia?> <?=$row->diag_alta_diag1;?>
</td>
</tr>
<tr>
<td  style="text-align:left"><strong>Procedimiento(s) realizado(s):</strong> <?=$autopsia?> <?=$row->coneg_proced;?>
</td>
</tr>
</table>
</div>
<div class="footer">
<?php echo "Egresado por dr $doctor, Exeq. $exequatur, $area, Página {PAGENO} de {nb}";?>
</div>