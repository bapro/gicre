
<?php


if($query_list_k->result() !=NULL){

	?>
<table  class="table table-striped kardex-orden-medica" style="width:100%"  >
<thead>
    <tr style="background:#428bca;">
	<th style="color:white"><strong>#</strong></th>
	   <th style="color:white"><strong>Fecha y hora</strong></th>
	   <th style="color:white">Insumo</th>
	    <th style="color:white">Frecuencia</th> 
		<th style="color:white">Cantidad</th> 
		<th style="color:white">Via</th> 
		  <th style="color:white"><strong>Dosis</strong></th>
       <th style="color:white">Mas</th>
		<th style="color:white"></th>
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query_list_k->result() as $row)

	 {
		$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));
		   //$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
		   
		   if(is_numeric($row->medica)){		
		$medica=$this->hospitalization_emgergency->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name'); 
		 }else{
			$medica=$row->medica; 
		 }
		   
		   
		 ?>
       <tr >
	   <td class='id_i_m' ><?=$row->id;?></td>
	   <td class='medica-kardex' ><?=$medica?></td>
		<td class='medfecha'><?=$fecha;?></td>
		
		<td class='frecuencia'><?=$row->frecuencia?></td>
		<td class='cantidad'><?=$row->cantidad?></td>
		<td class='via'><?=$row->via?></td>
		<td  class='dosis'><?=$row->dosis;?></td>
		 <td title='Presentation: <?=$row->presentacion?> &#013 Nota: <?=$row->nota?> &#013 Operator: <?=$op?>' ><i class="fa fa-plus"></i></td>
	<td><input type="radio"  class="copy-a-kadez-record" name='copy-me' /></td>

      </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
 <?php
	 }else{
		echo "<em>No hay medicamento en el orden medica...</em>";
	
	 }

	 ?>
