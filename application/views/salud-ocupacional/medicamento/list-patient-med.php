 <?php 
	foreach($result->result() as $row)
	 $num_aff = $this->db->select('input_name, inputf')->where('patient_id',$row->id_p_a)->get('saveinput')->row_array();
	?>
<table  class="table table-striped " cellspacing="0">
   <thead>
     <tr style="background:#428bca;color:white">
	   <th>#</th><th>Ficha</th><th>Nombres</th>
	   <th>Cedula</th><th>Sex</th><th>TUR</th><th>Area</th><th>Edad</th>
	   <th>Seguro Medico</th> <th><?=$num_aff['inputf']?></th>
	   <th>Quitar</th>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $emp=$this->db->select('clock,employee_name,gbl_shift,title')->where('id_p_a',$row->id_p_a)->get('employees')->row_array();
    $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));	 
	 $seguro=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
	
	 ?>
        <tr>
		<td><?=$row->id;?></td>
		<td><?=$emp['clock'];?></td>
		<td><?=$emp['employee_name'];?></td>
		<td><?=$row->cedula;?></td>
		<td><?=substr($row->sexo, 0,3);?>.</td>
		<td><?=$emp['gbl_shift'];?></td>
		<td><?=$emp['title'];?></td>
		<td><?=getPatientAge($row->date_nacer)?></td>
		<td><?=$seguro?></td>
		<td><?=$num_aff['input_name']?></td>
        <td></td>

      </tr>
		
	
    </tbody>    
</table>