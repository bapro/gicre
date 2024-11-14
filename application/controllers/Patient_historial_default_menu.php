<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_historial_default_menu extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
	$this->load->model('model_general');
		 $this->load->library("search_patient_photo");
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->load->library("get_table_data_by_id");
		  $this->load->library("load_history_resume");
		   $this->load->library('form_validation'); 
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
	$this->load->library('auto_complete_input');
	$this->load->library("create_forms");
		$this->PERFIL =$this->session->userdata('user_perfil');
		$this->clinical_history = $this->load->database('clinical_history', TRUE);
		   if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
		
	}

 function get_patient_id()
{
$id_apoint = $this->input->post("id_apoint");
$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');
echo $id_patient;
}

 function indications()
{
	$id_apoint = $this->input->post("id_apoint");
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_centro', $citasData['centro']);
	 $this->showPatientInfo($citasData['id_patient']);
	 
	 	 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
	 
	$this->load->view('clinical-history/indications/tabs/index', $data); 
	
}

 function showPatientInfo($id_p_a){
	 
	 [$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id]= $this->get_table_data_by_id->getPatientInfo($id_p_a);
   $data['get_patient_info_by_id']=$get_patient_info_by_id;
  $data['get_patient_seguro_info_by_id']=$get_patient_seguro_info_by_id;
	 $patient_age = $this->model_general->calculatePatientAge($get_patient_info_by_id['date_nacer']);
	 $data['patient_age'] = $patient_age['age_complete'];
	 $data['patient_photo']=
	$array_values_for_photo = array(
							'id_p_a' =>$id_p_a,
							'cedula' =>$get_patient_info_by_id['cedula'],
							'image_class' => "rounded-circle",
							'style'=>"style='width:40%'"
							
							);
							$data['patient_photo']= $this->search_patient_photo->search_patient($array_values_for_photo); 
							$this->load->view('patient/patient-info', $data);
	 
 }
 
 function loadPatientData(){
	$id_apoint = $this->input->post("id_apoint"); 
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$this->showPatientInfo($citasData['id_patient']);

 }
 
 
 
 function reporteGeneral()
{
	$id_apoint = $this->input->post("id_apoint");
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_patient', $citasData['id_patient']);
	$this->session->set_userdata('id_centro', $citasData['centro']);
	$data['general_repo_data'] = 0;
	
 // $this->showPatientInfo($citasData['id_patient']);
	$lastIdGr= $this->clinical_history->select('id')->where('historial_id', $citasData['id_patient'])->where('inserted_by', $this->ID_USER)->order_by('id','desc')->limit(1)->get('h_c_enfermedad_actual')->row('id');	
  $data['lastIdGr']=$lastIdGr;
  
  	 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
  
	$this->load->view('clinical-history/general-report/form', $data);
 $data['idpatient']=$citasData['id_patient'];	
	$this->load->view('clinical-history/general-report/folder/form', $data);

}


 function refraction()
{
	$id_apoint = $this->input->post("id_apoint");
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_patient', $citasData['id_patient']);
	$this->session->set_userdata('id_centro', $citasData['centro']);
	$data['data_refraccion'] = 0;
	
 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
 	
	$this->load->view('clinical-history/ophtalmology/refraction/form', $data); 

}
 function orden_medica()
{
	$id_apoint = $this->input->post("id_apoint");
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_patient', $citasData['id_patient']);
	$this->session->set_userdata('id_centro', $citasData['centro']);
	$data['orden_medica_data'] = 0;
	
	 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
	
	$this->load->view('clinical-history/medical-order/forms', $data); 

}








 function largeModalResumenHist()
{
$id_apoint = $this->input->post("id_apoint");

	$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');		
	
 [$con_diags, $list_cie10, $current_disease, $signo_vitales] = $this->load_history_resume->history_summary($id_patient);
 if($con_diags){
 $data['id_user']=$this->ID_USER;
		$query=$this->evolution_list($id_patient);
		$data['query']=$query;
		$data['con_diags']=$con_diags;
		$data['list_cie10']=$list_cie10;
		$data['current_disease']=$current_disease;
		$data['signo_vitales']=$signo_vitales;
		$is_today_saved=$this->clinical_history->select('inserted_time')
		->where("DATE(inserted_time)",date('Y-m-d'))
		->where('id_patient',$id_patient)
		->get('h_c_conclusion_diagno_evolution')->row('inserted_time');
		$data['is_today_saved']=date("Y-m-d",strtotime($is_today_saved));
		$data['show_evolution']='resume';
		$data['active']='active';
		$data['show']='show';
		$data['ident']='-r';
		$this->load->view('clinical-history/resume/form', $data);
 }else{
	echo "<div class='alert alert-danger'>No tiene historia clinica</div>"; 
 }
	
}



 function largeModalFollowUp()
{
	
$id_apoint = $this->input->post("id_apoint");

	$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');	
	[$con_diags, $list_cie10, $current_disease, $signo_vitales, $doc_area] = $this->load_history_resume->history_summary($id_patient);
	 if($con_diags){
		$data['id_user']=$this->ID_USER;
		$query=$this->evolution_list($id_patient);
		$data['query']=$query;
		$data['con_diags']=$con_diags;
		$data['list_cie10']=$list_cie10;
		$data['current_disease']=$current_disease;
		//$data['current_disease_id']=$current_disease['id'];
		$data['doc_area_id']=$doc_area;
		$data['signo_vitales']=$signo_vitales;
		$is_today_saved=$this->clinical_history->select('inserted_time')
		->where("DATE(inserted_time)",date('Y-m-d'))
		->where('id_patient',$id_patient)
		->get('h_c_conclusion_diagno_evolution')->row('inserted_time');
		$data['is_today_saved']=date("Y-m-d",strtotime($is_today_saved));
		$data['show_evolution']='followup';
		$data['id_patient']=$id_patient;
		$data['active']='';
		$data['show']='';
		$data['ident']='-f';
		$this->load->view('clinical-history/follow-up/content', $data);
	 }else{
		echo "<div class='alert alert-danger'>No tiene historia clinica</div>";  
	 }
	
}


	public function evolution_list($id_patient){
	$sql="SELECT * FROM h_c_conclusion_diagno_evolution WHERE id_patient='$id_patient' && id_user=$this->ID_USER ORDER BY id DESC ";
		$query= $this->clinical_history->query($sql);
		return $query;
	}


  function patientDocumentos()
{
	$id_apoint = $this->input->post("id_apoint");
	$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');
	$data['idpatient']=$id_patient;
$this->load->view('patient/documentos', $data);

}

 function largeModalSurgeryDescription1()
{
	$id_apoint = $this->input->post("id_apoint");

	 $data['id_user']=$this->ID_USER;
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint', $id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_patient', $citasData['id_patient']);
	 $data['idpatient']=$citasData['id_patient'];
	 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
$data['desc_surgery_data']=0; 
$this->load->view('clinical-history/description-surgery/form', $data); 
$this->load->view('clinical-history/description-surgery/patient-images/form', $data);
$this->load->view('clinical-history/description-surgery/footer');
$this->load->view('clinical-history/reset-form_alert-success'); 
}



 function largeModalCardiovasEval()
{
	$id_apoint = $this->input->post("id_apoint");

	 $data['id_user']=$this->ID_USER;
	$citasData=$this->db->select('centro, id_patient')->where('id_apoint', $id_apoint)->get('rendez_vous')->row_array();
	$this->session->set_userdata('id_patient', $citasData['id_patient']);
	 $data['idpatient']=$citasData['id_patient'];
	 [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($citasData['centro']);
$data['result_centro_medicos']='<option value="' . $citasData['centro'].'" >' . $get_centro_info_by_id['name'] . '</option>';
$data['data_eva_cardio']=0; 
$this->load->view('clinical-history/cardiovascular-evaluation/form', $data); 

}





}