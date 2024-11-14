<div class='hr'>
<h4>SIGNOS VITALES</h4>
<table  style="width:100%" >
<thead>
<tr class="trbgc" >
<td ><strong>FR</strong></td>
<td ><strong>FC</td>
<td ><strong>FT</strong></td>
<td ><strong>TA</strong></td> 
</tr>
    </thead>
    <tbody>
    <?php

	 foreach($query->result() as $row)

		 ?>
       <tr >
	   	<td><?=$row->fr?></td>
		<td><?=$row->fc?></td>
		<td><?=$row->tempo;?></td>
		<td><?=$row->ta?> / <?=$row->hg?></td>
		 </tr>
	
    </tbody>
</table>

<table  style="width:100%" >
	<tr>
		<?php if($row->peso) { ?>
		<td><strong>Peso:</strong> <?=$row->peso?> lb - <?= $row->kg ?> kg</td>
		<?php } if($row->talla){ ?>
		<td><strong>Talla(metro):</strong> <?=$row->talla?> <strong>INC:</strong> <?=$row->talla_imc?> </td>
		<?php  }  ?>
		
			<?php  if($row->pulso) { ?>
			<td>
		<strong>Pulso</strong> <?=$row->pulso?> 
		</td>
			<?php } 
		if($row->presion_media) {?>
			<td>
		<strong>Presión media</strong> <?=$row->presion_media?> 
		</td>
			<?php } if($row->signo_v_sat_ox) {?>
			<td>
		<strong>Sat O2(%)</strong> <?=$row->signo_v_sat_ox?>
		</td>
		<?php } ?>
		
		</tr>
</table>


<table  style="width:100%" >

	   <tr>
		<td><strong>Motivo de la Emergencia</strong><br/> <?=$row->motivo_emergencia?></td>
		</tr>
		
		<tr>
		<td><strong>Hallazgo Positivo</strong><br/> <?=$row->hallazgo?> </td>
		</tr>
</table>



</div>


<div class="footer">
<?php 
 $user_name = $this->db->select('name')->where('id_user', $created_by)->get('users')->row('name');
 echo "Dr./Dra. $user_name";
 

?>
</div>