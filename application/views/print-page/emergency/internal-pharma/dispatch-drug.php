<br/>
<table  align="left" style="width:100%" class='r-b' >
	<thead>
   <tr class="trbgc">
   <th><strong>#</strong></th>
	   <td  ><strong>Cantidad</strong></td>
	   <td  ><strong>Tipo</strong></td> 
	   <td  ><strong>Nombre</strong></td>
	    <td  ><strong>Dosis</strong></td>
	    <td  ><strong>Vía</strong></td> 
		<td  ><strong>Fecha/Hora Solicitud</strong></td> 
		<td  ><strong>Usuario Solicitud</strong></td> 
		<td  ><strong>Fecha Despacho</strong></td> 
		<td  ><strong>Usuario Farmacia</strong></td>  
	 </tr>
   	</thead>
	 <tbody>
    <?php

	 foreach($query4->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));
	$fecha_dispatched = date("d-m-Y H:i:s", strtotime($row->drug_dispatched_time));
	$op_dispatched=$this->db->select('name')->where('id_user',$row->drug_dispatched_user)->get('users')->row('name');
	if(is_numeric($row->medica)){		
		$med=$this->hospitalization_emgergency->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name'); 
		 }else{
			$med=$row->medica; 
		 }
	if($row->new_cant){
	$cant=$row->new_cant;	
	}else{
	$cant=$row->cantidad;	
	}
	 ?>
	 <tr>
	 <td><?=$row->id;?></td>
	<td><?=$cant;?></td>
	<td>MEDICAMENTOS</td>
	<td><?=$med;?></td>
     <td><?=$row->dosis;?></td>
	<td><?=$row->via?></td>
	<td><?=$fecha?></td>
	<td><?=$op?></td>
    <td><?=$fecha_dispatched?></td>
	<td><?=$op_dispatched?></td>
	
       </tr>

	 <?php
	 }
	 echo " </tbody>";

	 foreach($query5->result() as $row)
     {
	  $insumo_data=$this->db->select('user_dispatcher, date_time_dispatched')->where('id_med',$row->id)->get('dispatched_drug')->row_array();
	$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
		$med=$this->db->select('sub_groupo')->where('id_c_taf',$row->insumo)->get('centros_tarifarios_test')->row('sub_groupo');
	
	
	$fecha_dispatched = date("d-m-Y H:i:s", strtotime($row->drug_dispatched_time));
	$op_dispatched=$this->db->select('name')->where('id_user',$row->drug_dispatched_user)->get('users')->row('name');
	 ?>
	<tr >
	 <td><?=$row->id;?></td>
	<td><?=$row->cantidad;?></td>
	<td>INSUMO</td>
	<td><?=$med;?></td>
    <td>---</td>
	<td>---</td>
	<td><?=$fecha?></td>
	<td><?=$op?></td>
	<td><?=$fecha_dispatched?></td>
	<td><?=$op_dispatched?></td>	
       </tr>

	 <?php
	 }
	
	 ?>


</table>

