<br/>
<?php 

foreach($dermato as $row)

?>

<table style="width:100%;font-size:13px;" >

<tr >
<td style="text-align:right"><strong>Tipografía </strong></td>
<td>(<?=$row->derma_tipo;?>)<br/><?=$row->derma_tipo_text?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Morfología </strong></td>
<td>(<?=$row->derma_morfologia;?>)<br/><?=$row->derma_morfologia_text?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Resto de la piel y anexos </strong></td>
<td>(<?=$row->derma_resto;?>)<br/><?=$row->derma_resto_text?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Interrogatorio </strong></td>
<td>(<?=$row->derma_intero;?>)<br/><?=$row->derma_intero_text?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Otros Datos </strong></td>
<td>(<?=$row->derma_otros_datos;?>)<br/><?=$row->derma_otros_datos_text?></td>
</tr>


<tr >
<td style="text-align:right"><strong>Diagnostico Dermatologico Inicial</strong></td>
<td><?=$row->derma_diagno_der_ini;?></td>
</tr>

</table>
</html>