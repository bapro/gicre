<?php
$sql ="SELECT patients.ID AS patient_id, NEC_PRO FROM patients LIMIT 10 " ;
 
 
$query= $this->db->query($sql);

foreach($query->result() as $row) {
	
	$historial_id= $this->db->select('historial_id')->where('historial_id',$row->NEC_PRO)->get('h_c_enfermedad_actual')->row('historial_id');
	
	
if($historial_id= $row->NEC_PRO){
	$sql_update="UPDATE h_c_enfermedad_actual
 SET historial_id =$row->patient_id
 WHERE historial_id = $row->NEC_PRO"; 	

$query= $this->db->query($sql_update);
}
}
 ?>