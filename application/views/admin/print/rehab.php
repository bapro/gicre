<br/>
<?php 
foreach($showRehabilidad as $row)
{
?>
<table  style="width:100%;" border="1">

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Iniciacion de la marcha (inmediatamente despues de decir que ande) </strong></td>
<td><?=$row->marcha_inicio;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Movimiento del pie derecho.</strong></td>
<td><?=$row->long_mov_der;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Movimiento del pie izquierdo.</strong></td>
<td><?=$row->long_mov_izq;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Simetria del pase.</strong></td>
<td><?=$row->long_simetria;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Fluidez del paso </strong></td>
<td><?=$row->long_fluidez;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Trayectoria (Observar trazado que realiza UN pie por 3 metros) </strong></td>
<td><?=$row->long_traject;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Tronco</strong></td>
<td><?=$row->long_tronco;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Postula Al Caminar</strong></td>
<td><?=$row->long_postura;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Equilibrio Sentado </strong></td>
<td><?=$row->equi_sentado;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Levantarse</strong></td>
<td><?=$row->equi_levantarse;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Intentos para levantarse</strong></td>
<td><?=$row->equi_intentos;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Equilibrio en bipedestacion inmediata (Primeros 5 segundos) </strong></td>
<td><?=$row->equi_biped1;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Equilibrio  en Bipedestacion</strong></td>
<td><?=$row->equi_biped2;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Empujar</strong></td>
<td><?=$row->equi_emp;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Oyos Cerrados</strong></td>
<td><?=$row->equi_ojos;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Vuelta de 360 grados</strong></td>
<td><?=$row->equi_vuelta;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Sentarse</strong></td>
<td><?=$row->equi_sentarse;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Riesgo de caida</strong></td>
<td><?=$row->eval_balsys;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Movimiento  del pie izquierdo.</strong></td>
<td><?=$row->eval_movim;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Evaluacion Monopodal</strong></td>
<td><?=$row->eval_monop;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Intensidad Del Dolor</strong></td>
<td><?=$row->criteria_intens;?></td>
</tr>
<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Cuidados Personales</strong></td>
<td><?=$row->criteria_cuidado1;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Levantar Peso</strong></td>
<td><?=$row->levantar_peso;?></td>
</tr>


<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Caminar</strong></td>
<td><?=$row->criteria_caminar;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Estar Sentado</strong></td>
<td><?=$row->criteria_estar_sent;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Dormir</strong></td>
<td><?=$row->criteria_dormir;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Actividad Sexual</strong></td>
<td><?=$row->criteria_sexual;?></td>
</tr>

<tr style="background:rgb(228,228,228);color:white">
<td style="text-align:right"><strong>Vida Social</strong></td>
<td><?=$row->criteria_vida;?></td>
</tr>

<?php
}
?>

</table>     

