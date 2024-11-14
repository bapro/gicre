
<div id="urology-content">
<?php 
$sql_uro ="SELECT *  FROM  h_c_urology WHERE id_patient=0";
$query_uro=$this->db->query($sql_uro);
$data['query_uro']=$query_uro;
$data['ExamFisById']=$query_uro;
$data['action_id']=0;
$data['user_id']=$user_id;
$data['idpatient']=$idpatient;
$birthday=$this->db->select('date_nacer')->where('id_p_a',$idpatient)->get('patients_appointments')->row('date_nacer');
$this->load->view('getPatientAge');	
$data['edad']=getPatientAge($birthday);

$this->load->view('admin/historial-medical1/urology/examen-fisico/form', $data);

?>
</div>
