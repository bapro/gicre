
<div id="counseling-content">
<?php 
$sql_cnsling2 ="SELECT *  FROM  h_c_counsellig WHERE id_patient=0";
$query_cnsling2=$this->db->query($sql_cnsling2);
$data['query_cnsling']=$query_cnsling2;
$data['action_id']=0;
$data['user_id']=$user_id;
$data['idpatient']=$idpatient;
$this->load->view('admin/historial-medical1/counseling/form', $data);

?>
</div>
