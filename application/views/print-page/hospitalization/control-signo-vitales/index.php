<div class='hr'>
<table  style="width:100%" >
<thead>
<tr class="trbgc" >
   <td ><strong>Operador</strong></td>
	   <td ><strong>Fecha</td>
	   <td ><strong>Sat</strong></td>
	    <td ><strong>TA</strong></td> 
		<td ><strong>FC</strong></td> 
		  <td ><strong>FR</strong></td>
       <td ><strong>Glicemia</strong></td>
	   <td ><strong>Pulso.</strong></td>
		<td ><strong>Temp.</strong></td>
		<td ><strong>Diuresis/Dep</strong></td>
		
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query->result() as $row)

	 {
		$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
		  $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
		 ?>
       <tr >
	   	<td><?=$op?></td>
		<td><?=$fecha?></td>
		<td><?=$row->csv_sat;?></td>
		<td><?=$row->csv_ta1?>/<?=$row->csv_ta2?></td>
		<td><?=$row->csv_fc?></td>
		<td><?=$row->csv_fr;?></td>
		<td><?=$row->csv_glicemia;?></td>
		<td><?=$row->csv_pulso;?></td>
		<td><?=$row->csv_temperatura;?></td>
		<td>
		<?=$row->csv_diuresis;?>/<?=$row->csv_dep;?> 
		</td>
		
	   </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
</div>


<div class="footer">
<?php
 $user_name = $this->db->select('name')->where('id_user', $this->session->userdata('user_id'))->get('users')->row('name');
 echo "Usuario $user_name, Página {PAGENO} de {nb}";
 
 
 ?>
</div>