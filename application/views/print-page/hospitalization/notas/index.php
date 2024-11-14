
 <div class='hr'>

<table style="width:100%;font-size:13px" >

<tr>
<td><strong>Peso </strong> <?=$signos['peso'];?> lb / <?=$signos['kg'];?> kg</td>

<td colspan="2"><strong>Tension arterial</strong><br/><?=$signos['ta'];?> mm / <?=$signos['hg'];?> hg</td>

</tr>

<tr>

<td><strong>Talla </strong><?=$signos['talla'];?> m
<?php
if($signos['talla_imc']){
	echo " | ".$signos['talla_imc']." inc";
}
 ?> 
 </td>
<td><strong>Frequencia respiratoria</strong> <?=$signos['fr'];?></td>
<td colspan="2"><strong>Tempo.</strong> <?=$signos['tempo'];?> &#8451 </td>

</tr>


<tr>

<td><strong>Frequencia cardiaca</strong> <?=$signos['fc'];?></td>
<td colspan="2"><strong>Pulso.</strong> <?=$signos['pulso'];?> PM </td>

</tr>
</table>
</div>
<br/>
 <div class='hr'>

 <table style="width:100%;font-size:13px" >

<tr>
<td><strong>Nombre de la nota </strong> <br/> <?=$notas['nombre_nota'];?></td>
</tr>
<tr>
<td><strong>Descripción de la nota</strong> <br/>  <?=$notas['description_nota'];?></td>

</tr>
</table>
 </div>
<div class="footer">
<?php 
if($area){
echo "Dr. $doctor, Exeq. $exequatur, $area, Página {PAGENO} de {nb}";
}else{
	echo "Enfermera  $doctor, Página {PAGENO} de {nb}";
}
?>
</div>
</body>
</html>