
<?php

 foreach($showSelectContP1 as $row)

?>

<table   style="background:#E6E6FA;width:100%">
<tr style="text-transform:uppercase">
<td><strong>Fecha de la consulta</strong></td>
<td><strong>Semana de amenorrea</strong></td>
<td><strong>Peso (lb)</strong></td>
<td><strong>[Tension Arterial Max.Min.]-[(mm Hg)]</strong></td>
<td><strong>[Alt. Ulterina]-[Present Pubis.FondoCef]-[Pelv.Tr]</strong></td>
<td><strong>F.C.F.([lat.-min] - [Mov.Fetal])</strong></td>
<td><strong>[Edema]-[Varices]</strong></td>
<td><strong>Otros</strong></td>
<td><strong>Evolucion</strong></td>

</tr>
<?php
 foreach($showSelectContP1 as $row)
{

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));		
?>
<tr style="background:white">
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
[  <?=$row->tension?>  ] - [  <?=$row->tension11?>  ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>



</tr>


<?php
}


//--second row-------------------------------------------------------------------------------------------------------------->


 foreach($showSelectContP2 as $row)
{
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>

<tr>
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>


<td>
<?=$row->otros?>
</td>

<td>
<?=$row->evolucion?>
</td>


</tr>



<?php
}

//--third row-------------------------------------------------------------------------------------------------------------->


 foreach($showSelectContP3 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>

<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>



</tr>



<?php
}
//fourth----------------------------------------------
 foreach($showSelectContP4 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
	
?>	

<tr>
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>


</tr>
 <?php
}

//fifth----------------------------------------------
 foreach($showSelectContP5 as $row)
{

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>



</tr>
 <?php
}

//sixfth----------------------------------------------
 foreach($showSelectContP6 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
	
?>
<tr>
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
 [ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
 [ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
 [ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
 [ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>



</tr>

 <?php
}

//seventth----------------------------------------------
 foreach($showSelectContP7 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
 [ <?=$row->tension?> ] - [ <?=$row->tension11?> ]
</td>



<td>
 [ <?=$row->alt?> ] - [<?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
 [ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
 [ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>



</tr>

 <?php
}

//eighth----------------------------------------------
 foreach($showSelectContP8 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>	

<tr>
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>


<td>
 [ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>

</tr>

 <?php
}

//nineth----------------------------------------------

 foreach($showSelectContP9 as $row)
{
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));			
?>

<tr  style="background:white">
<td>
<?=$row->fecha?>
</td>

<td>
<?=$row->semana?>
</td>


<td>
<?=$row->peso?>
</td>

<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->alt?> ] - [ <?=$row->alt11?> ] - [ <?=$row->alt111?> ]

</td>




<td>
[ <?=$row->tension?> ] - [ <?=$row->tension11?> ]

</td>



<td>
[ <?=$row->edema?> ] - [ <?=$row->edema11?> ]

</td>





<td>
<?=$row->otros?>
</td>


<td>
<?=$row->evolucion?>
</td>


</tr>

 <?php
}

		
?>	
 </table>

 



