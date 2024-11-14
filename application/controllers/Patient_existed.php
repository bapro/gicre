<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_existed extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_medico');
  $this->load->model('model_admin');
  $this->load->model('model_emergencia');
 $this->load->model('navigation/account_demand_model');

}

public function redirecting()
{

$str=$this->input->get('str');
$nombre=$this->input->get('nombre');
$seguro=$this->input->get('seguro');
$date_nacer=$this->input->get('date_nacer');
$date_nacer_format=$this->input->get('date_nacer_format');
$planUpdate =$this->input->get('planUpdate');
$afiliadoUpdate =$this->input->get('afiliadoUpdate');


 $sexo =$this->input->get('sexo');
 $form_phonecel =$this->input->get('form_phonecel');
 $estado_civil =$this->input->get('estado_civil');
 $nacionalidad =$this->input->get('nacionalidad');
 $provincia =$this->input->get('provincia');
$municipio_dropdown =$this->input->get('municipio_dropdown');



	//get patient id from seguro input name
$patient_id= $this->db->select('patient_id')->where('input_name',$str)->get('saveinput')->row('patient_id');	

//GET PATIENT INFO IN CITA TABLE

$patData= $this->db->select('centro, doctor, inserted_by, update_by, created_time, update_time, id_apoint')
->where('id_patient',$patient_id)
->order_by('id_apoint','ASC')->limit(1)
->get('rendez_vous')->row_array();
if($patData){
$id_cm=$patData['centro'];
$doc=$patData['doctor'];

$inserted_by=$patData['inserted_by'];
$update_by=$patData['update_by'];

$created_time=$patData['created_time'];
$update_time=$patData['update_time'];
}else{
$patDataFac= $this->db->select('centro_medico, medico, inserted_by, updated_by, inserted_time, update_date')
->where('paciente',$patient_id)
->get('factura2')->row_array();

$id_cm=$patDataFac['centro_medico'];
$doc=$patDataFac['medico'];

$inserted_by=$patDataFac['inserted_by'];
$update_by=$patDataFac['updated_by'];

$created_time=$patDataFac['inserted_time'];
$update_time=$patDataFac['update_date'];	
	
}

$query = $this->db->get_where('patients_appointments',array('id_p_a'=>$patient_id));
if($query->num_rows() == 0){
	
	if($seguro==11){
	$planId=0;
}else{
	if($planUpdate){
$planId=$planUpdate;
	}else{
		$planId=0;
	}

}
	
	
 $saveInputs= array(
'id_p_a' =>$patient_id,
'nombre'  => $nombre,
'nec1'  => "NEC-$patient_id",
'date_nacer' => $date_nacer,
'date_nacer_format' => $date_nacer_format,
'sexo' => $sexo,
'tel_cel'=> $form_phonecel,
'estado_civil' => $estado_civil,
'nacionalidad'=> $nacionalidad,
'seguro_medico'=> $seguro,
'afiliado'  => $afiliadoUpdate,
'plan'  => $planId,
'provincia'=> $provincia,
'municipio' => $municipio_dropdown,
'inserted_by'=>$inserted_by,
'insert_date'=>$created_time,
'updated_by'=>$update_by,
'update_date'=>$update_time
	);
  $this->db->insert("patients_appointments",$saveInputs);
} 

redirect("medico/patient_data/$patient_id/$id_cm/$doc");

}	












}