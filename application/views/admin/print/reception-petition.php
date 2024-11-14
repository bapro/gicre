<br/>
<table style="width:100%;"  class='im-bg' >
    <tr>
	   <td  style="border-top:none"><strong>CANTIDAD</strong></td>
	   <td  style="border-top:none"><strong>TIPO</strong></td> 
	   <td  style="border-top:none"><strong>NOMBRE</strong></td>
	    <td  style="border-top:none"><strong>DOSIS</strong></td>
	    <td  style="border-top:none"><strong>VIA</strong></td> 
		<td  style="border-top:none"><strong>FECHA/HORA SOLICITUD</strong></td> 
		<td  style="border-top:none"><strong>USUARIO SOLICITUD</strong></td> 
		<td  style="border-top:none"><strong>FECHA DESPACHO</strong></td> 
		<td  style="border-top:none"><strong>USUARIO FARMACIA</strong></td> 
	 </tr>
   
    <?php

	 foreach($query4->result() as $row)
     {
    $med_data=$this->db->select('user_dispatcher, date_time_dispatched')->where('id_med',$row->id_i_m)->get('dispatched_drug')->row_array();
	$op=$this->db->select('name')->where('id_user',$row->med_operator)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->med_operator_time));
	$fecha_dispatched = date("d-m-Y H:i:s", strtotime($med_data['date_time_dispatched']));
	$op_dispatched=$this->db->select('name')->where('id_user',$med_data['user_dispatcher'])->get('users')->row('name');
	$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
	if($row->new_cant){
	$cant=$row->new_cant;	
	}else{
	$cant=$row->cantidad;	
	}
	 ?>
	<tr >
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
	
	 foreach($query5->result() as $row)
     {
	  $insumo_data=$this->db->select('user_dispatcher, date_time_dispatched')->where('id_med',$row->id)->get('dispatched_drug')->row_array();
	$op=$this->db->select('name')->where('id_user',$row->insumo_operator)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->insumo_operator_time));
	$med=$this->db->select('name')->where('id',$row->insumo)->get('emergency_medicaments')->row('name');
	$fecha_dispatched = date("d-m-Y H:i:s", strtotime($insumo_data['date_time_dispatched']));
	$op_dispatched=$this->db->select('name')->where('id_user',$insumo_data['user_dispatcher'])->get('users')->row('name');
	
	 ?>
	<tr >
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

