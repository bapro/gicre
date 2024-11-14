<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hospitalization_test extends CI_Controller {
public function __construct()
{
parent::__construct();
	
		$this->load->model('model_alergy');
		
		$this->load->model('model_general');
		$this->load->model('model_hospitalization');
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->ID_USER = $this->session->userdata('user_id');
		$this->load->library("create_forms");
		$this->load->library('form_validation');
		$this->load->library('hospitalization_lib');
		$this->load->library("header_user");
		$this->PERFIL= $this->session->userdata('user_perfil');
			$this->load->library('auto_complete_input');
		$this->clinical_history = $this->load->database('clinical_history', TRUE);
		$this->USER_CONTROLLER = 'medico';
		
		$this->table_insumo ='hosp_peticion';
        $this->table_insumo_link ='hosp_peticion_link';
		
		
		
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		//$this->load->library("pagination");
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
}

public function header_users(){
$this->session->set_userdata('USER_CONTROLLER', 'medico');
		$data['perfil'] = $this->session->userdata('user_perfil');
		$data['user_name'] = $this->session->userdata('user_name');
		$data['user_perfil'] = $this->session->userdata('user_perfil');
		 $this->load->view('header-nurse', $data);

}

public function patients_record($val){
	$vald=decrypt_url($val);
	 $title = ($vald==0) ? 'Listado de Pacientes Ingresados' : 'Listado de Pacientes Egresados';
	 if($this->PERFIL=='Enfermera' || $this->PERFIL=='Auditoria Medico'){
		$this->header_users();
	 }else{
	$this->header_user->headerMedico($this->ID_USER);
	 }
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);

		$value = array(
			'desde' => 0,
			'hasta' => 0,
			'centro' => 0,
			'table_title' => $title,
			'origine'=>$vald,
			'result_centro_medicos' => $result_centro_medicos
		);

 $data['desde']=$value['desde'];
 $data['hasta']=  $value['hasta'];
  $data['centro']= $value['centro'];
 $data['table_title']= $value['table_title'];
  $data['origine']= $value['origine'];
  //$data['result_centro_medicos']= $value['result_centro_medicos'];
 $data['hosp_pat_created_by']=$this->ID_USER; 
$data['hosp_pat_updated_by']= $this->ID_USER;
$data['hosp_pat_created_time'] = date("Y-m-d H:i:s"); 
$data['hosp_pat_updated_time'] =date("Y-m-d H:i:s");
	
$data['creation_hosp_pat_info'] ='';
		$data['table_insumo']=$this->table_insumo;
$data['table_insumo_link']=$this->table_insumo_link;
$data['id_hospit']=0;
[$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita(0);
$data['filter_by_centro']= $result_centro_medicos_cita;
  	$this->load->view('hospitalization/patient/admitted-test', $data);  

}




}