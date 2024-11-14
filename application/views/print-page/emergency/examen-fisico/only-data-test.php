
<div >

 <?php
  foreach($signos_vitales->result() as $rowsv)
if($rowsv->fr == "" && $rowsv->fc == "" && $rowsv->tempo == "" && $rowsv->ta=="" && $rowsv->hg=="" && $rowsv->peso==0 && $rowsv->presion_media=="" && $rowsv->talla==""){
	
}else {
	
	 
	 ?>
	  <strong>SIGNOS VITALES</strong>
 <br/> <br/>
	 <table  style="width:100%" >

<tr class="trbgc" >

 <?php
 if($rowsv->fr){
		  echo "<td ><strong>FR:</strong> $rowsv->fr</td> ";
	  }
	  
	 if($rowsv->fc){
		  echo "<td ><strong>FC:</strong> $rowsv->fc</td> ";
	  }  
	  
	 if($rowsv->tempo){
		  echo "<td ><strong>FT:</strong> $rowsv->tempo</td> ";
	  }  


	  if($rowsv->ta){
		 echo "<td ><strong>T. A.(mm):</strong> $rowsv->ta</td> ";
	  }
	  
	   if($rowsv->hg){
		    echo "<td ><strong>T. A.(hg):</strong> $rowsv->hg</td> ";
		
	  }
	  
	  ?>

</tr>
	 
	
	<tr>
		<?php if($rowsv->peso) { ?>
		<td><strong>Peso:</strong> <?=$rowsv->peso?> lb - <?= $rowsv->kg ?> kg</td>
		<?php } if($rowsv->talla){ ?>
		<td><strong>Talla(metro):</strong> <?=$rowsv->talla?> <strong>INC:</strong> <?=$rowsv->imc?> </td>
		<?php  }  ?>
		
			<?php  if($rowsv->pulso) { ?>
			<td>
		<strong>Pulso</strong> <?=$rowsv->pulso?> 
		</td>
			<?php } 
		if($rowsv->presion_media) {?>
			<td>
		<strong>Presión media</strong> <?=$rowsv->presion_media?> 
		</td>
			<?php } if($rowsv->signo_v_sat_ox) {?>
			<td>
		<strong>Sat O2(%)</strong> <?=$rowsv->signo_v_sat_ox?>
		</td>
		<?php } ?>
		
		</tr>
</table>
<?php }  ?> 
</div>