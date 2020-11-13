<br/>
<?php 

foreach($show_examsis_by_id as $rown)

?>
	

<table style="width:100%;font-size:13px;"  >

<tr >
<td style="text-align:right"><strong>Sistema neurológico </strong></td>
<td><?=$rown->sisneuro;?>  (<?=$rown->neurologico?>)</td>

<td style="text-align:right"><strong>Sistema cardiovascular </strong></td>
<td><?=$rown->siscardio;?>  (<?=$rown->cardiova?>)</td>
</tr>



<tr >
<td style="text-align:right"><strong>Sistema urogenital </strong></td>
<td><?=$rown->sist_uro;?>  (<?=$rown->urogenital?>)</td>

<td style="text-align:right"><strong>Sistema músculo esquelético</strong></td>
<td><?=$rown->sis_mu_e;?> (<?=$rown->cardiova?>)
</td>
</tr>



<tr >
<td style="text-align:right"><strong>Sistema nervioso</strong></td>
<td><?=$rown->nervioso;?></td>


<td style="text-align:right"><strong>Sistema linfatico</strong></td>
<td><?=$rown->linfatico;?></td>
</tr>



<tr >
<td style="text-align:right"><strong>Sistema respiratorio</strong></td>
<td><?=$rown->sist_resp;?>  (<?=$rown->respiratorio;?>)</td>


<td style="text-align:right"><strong>Sistema genitourinario</strong></td>
<td><?=$rown->genitourinario;?></td>
</tr>




<tr >
<td style="text-align:right"><strong>Sistema digestivo</strong></td>
<td><?=$rown->sist_diges;?>  (<?=$rown->digestivo;?>)</td>


<td style="text-align:right"><strong>Sistema endocrino</strong></td>
<td><?=$rown->sist_endo;?></td>
</tr>




<tr >
<td style="text-align:right"><strong>Relativo a</strong></td>
<td><?=$rown->sist_rela;?>  (<?=$rown->otros_ex_sis;?>)</td>


<td style="text-align:right"><strong>Columna dorsal</strong></td>
<td><?=$rown->dorsales;?></td>
</tr>
</table>