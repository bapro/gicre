<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_emergency_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation');
         $this->load->library('hospitalization_lib'); 		 
		 $this->load->library("create_forms");
		 $this->load->library("get_table_data_by_id");
		  $this->load->model('emgergency_patients_data_model');
		 $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_CENTRO =$this->session->userdata('id_centro');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login/backTologin');
}
	
		
	}






	function showForm()
	{
	$id=$this->input->post('id_cita');
	$data['id_emgerg'] = $id;

	if($id > 0){
	$result_emgergency=$this->hospitalization_emgergency->select('*')->where('id',$id)->get('emergency_data')->row_array();
	[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil($result_emgergency['centro']);
	$data['result_emgergency']=$result_emgergency;
	}else{
	[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil(0);	
	}

	$data['result_centro_medicos'] = $result_centro_medicos;

	$this->load->view('patient/emergency/create-emergency-form', $data);
}







 
public function add_new_emergency()
{
 $fecha_alta=$this->hospitalization_emgergency->select('fecha_alta')->where('id_patient',$this->ID_PATIENT)->get('emergency_data')->row('fecha_alta');
 

 
 if($fecha_alta=='0000-00-00 00:00:00' && $this->input->post('id')==0){
 $response['status'] =3;
$response['message'] = 'Paciente esta en emergencia, todavia no le dieron alta!'; 	
}
elseif($this->input->post('emerg_centro') =='' || $this->input->post('emerg_causa') ==''|| $this->input->post('emerg_ingreso') =='' || $this->input->post('emerg_refered_by') ==''){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
} 

else{ 
 $savedas = array(
'centro'=> $this->input->post('emerg_centro'),
'causa' =>$this->input->post('emerg_causa'),
'via' =>$this->input->post('emerg_ingreso'),
'id_patient' =>$this->session->userdata('ID_PATIENT'),
'refered_by' => $this->input->post('emerg_refered_by'),
'fecha_alta' => '0000-00-00 00:00:00',
'inserted' => $this->input->post('em_inserted_by'),
'updated' => $this->input->post('em_updated_by'),
'seen' =>0,
'alta' => 0,
'timeinserted' =>$this->input->post('em_inserted_time'),
'timeupdated' =>$this->input->post('em_updated_time'),
'canceled' =>0
   );
   if($this->input->post('id')==0){
$this->hospitalization_emgergency->insert("emergency_data",$savedas);
   }else{
	$this->hospitalization_emgergency->where('id', $this->input->post('id'));
	$this->hospitalization_emgergency->update('emergency_data',$savedas); 
   }
if($this->hospitalization_emgergency->affected_rows() > 0){
$response['message'] = 'Realizado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);
}


 
 public function loadPatientTable(){
	$this->load->view('patient/emergency/load-patient-emergency'); 
 }
 
  public function emergencyPatientTable(){
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
$query = $this->hospitalization_emgergency->query("SELECT * FROM emergency_data WHERE id_patient = $this->ID_PATIENT && canceled = 0 ORDER BY id DESC");

    $data = [];
    foreach ($query->result() as $row) {
	if($row->fecha_alta =='0000-00-00 00:00:00'){
		$fecha_egreso = "<em class='text-danger' >pendiente</em>";
	}else{
		$fecha_alta=date("d-m-Y H:i:s", strtotime($row->fecha_alta));
		$fecha_egreso = "<em class='text-success' >$fecha_alta</em>";	
	}
			//$doctor=$this->db->select('name')->where('id_user',$row->inserted)->get('users')->row('name');
		$centro=$this->db->select('name')->where('id_m_c',$row->centro)->get('medical_centers')->row('name');
		
		
		//$button_update ='<button  type="button"    data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editPatientHosp"  class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></button>';
			$button_update ='<button type="button"   id="'.$row->id.'" class="btn btn-sm btn-primary update-this-emergency"><i class="bi bi-pencil"></i></button>';
			
			if($row->inserted==$this->ID_USER){
			$button_delete ='<button type="button"   id="'.$row->id.'" class="btn btn-danger btn-sm "><i class="bi bi-x-square "></i></button>';
			}else{
			$button_delete='';
			}
		
	 $sub_array = array();
	  $sub_array[] = date("d-m-Y H:i:s", strtotime($row->timeinserted));
	  $sub_array[] = $fecha_egreso;
	  $sub_array[] = $centro;
      //$sub_array[] = $doctor;
	  $sub_array[] = $row->causa;
	  $sub_array[] = $row->via;
	  $sub_array[] = $row->refered_by;
	  $sub_array[] = $button_update ." ". $button_delete;
      $data[] = $sub_array;
    }

    $rowesult = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($rowesult);
    exit();
}
 
 
 //----------LIST HOSPITALIZATION---------------
 
 
 function fetch_patient_data()
 {
  $id_patient = $this->input->post('id_patient');
  
  $output = array(

   'patient_data'   => $this->emgergency_patients_data_model->fetch_patient_data($id_patient)
  );
  echo json_encode($output);
 }
 
 function fetch_patients()
 {
	  $id_centro = $this->input->post('centro');
	  $origine = $this->input->post('origine');
	  $sql ="SELECT  id_patient FROM  emergency_data WHERE centro=$id_centro AND alta=$origine GROUP BY id_patient";
$query= $this->hospitalization_emgergency->query($sql);
	  
	  
	 $results = '';
$results = '<option value=""></option>';
foreach($query->result() as $row) {
	$nombre=$this->db->select('nombre')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('nombre');
	 $results .= '<option value="'.$row->id_patient .'" >#'.$row->id_patient .' ' . $nombre . '</option>';	
	
} 
$output = array(

   'patient_list'   => $results
  );
  echo json_encode($output);
 }
   
  function fetch_patients_emergency_data()
 {
  sleep(1);
  $centro = $this->input->post('centro');
   $patient = $this->input->post('patient');
   $origine = $this->input->post('origine');
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->emgergency_patients_data_model->count_all($centro, $origine, $patient);
  $config['per_page'] = 10;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['first_link'] = 'Primero';        
    $config['last_link'] = 'Ultimo';        
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['first_tag_close'] = '</span></li>';        
    $config['prev_link'] = '&laquo';        
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = '&raquo';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['last_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->emgergency_patients_data_model->fetch_data($config["per_page"], $start, $centro, $origine, $patient)
  );
  echo json_encode($output);
 }
 
 
 
 
 function autoCompleteInputHospMed()
{
$input_name=$this->input->post('input_name');
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$data['field_name_in_table']= 'sub_groupo';
$data['input_name']=  $input_name;
$data['div_result']=  $this->input->post('div_result');
if($input_name=='hospOrdenMedicaMed'){
	$search='medica';
}elseif($input_name=='hospOrdenMedicaEstEst'){
	$search='estudio';
}else{
$search='laboratorio';	
}
$sql ="SELECT sub_groupo FROM  centros_tarifarios_test WHERE groupo LIKE '" . $search . "%' AND sub_groupo LIKE '" . $keyword . "%' AND centro_id=$this->ID_CENTRO GROUP BY sub_groupo LIMIT 0,20";
$data['query']=$this->db->query($sql); 
if($input_name=='searchLabOrdMedByName'){
 $this->load->view('clinical-history/indications/laboratory/search-lab-by-name', $data); 
}else{
$this->load->view('clinical-history/auto-complete-field-results', $data);
}


    }


}
 
 
 
  function autoCompleteForms()
{
$keyword=$this->input->post('keyword');
$field_name_in_table=$this->input->post('field_name_in_table');
$table=$this->input->post('table');
if(!empty($keyword)) {
$data['field_name_in_table']= $field_name_in_table;
$data['input_name']=  $this->input->post('input_name');
$data['div_result']=  $this->input->post('div_result');

$sql ="SELECT $field_name_in_table FROM $table WHERE $field_name_in_table LIKE '" . $keyword . "%' GROUP BY $field_name_in_table LIMIT 0,30";
$data['query']=$this->hospitalization_emgergency->query($sql); 

$this->load->view('clinical-history/auto-complete-field-results', $data);



    }


}
 
 
 
}